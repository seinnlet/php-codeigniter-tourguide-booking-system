<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Request_mdl extends CI_Model {

	public function checkdate($id)
	{
		$this->db->select('booking.bookdate, tour.duration');
		$this->db->from('booking');
		$this->db->join('tour', 'booking.tourid = tour.tourid');
		$this->db->join('tourguide', 'tour.tourguideid = tourguide.tourguideid');
		$this->db->where('booking.status', 'booked');
		$this->db->where('tour.tourguideid', $id);
		$sql = $this->db->get('');

		$datearray = array();

		foreach ($sql->result() as $booking) {	
			$bookdate = $booking->bookdate;
			$duration = $booking->duration;
			$todate = date('Y-m-d', strtotime($bookdate))." + ".($duration-1)." day";
			$todate = date('Y-m-d', strtotime($todate));

			$datearray = array_merge($datearray, $this->Tour_mdl->getDatesFromRange($bookdate, $todate)); 
		} 

		$this->db->select('request.startdate, request.enddate');
		$this->db->from('request');
		$this->db->join('tourguide', 'request.tourguideid = tourguide.tourguideid');
		$this->db->where('request.tourguideid', $id);
		$this->db->where('request.status', 'accepted');
		$this->db->or_where('request.status', 'appending');
		$sql2 = $this->db->get('');

		foreach ($sql2->result() as $request) {	
			$startdate = $request->startdate;
			$enddate = $request->enddate;
			$datearray = array_merge($datearray, $this->Tour_mdl->getDatesFromRange($startdate, $enddate));
		}

		return $datearray;
	}

	public function store()
	{
		$tourguideid = $this->input->post('tourguideid');
		$userid = $this->session->userdata('id');
		$startdate = $this->input->post('fromdate');
		$enddate = $this->input->post('todate');
		$duration = $this->input->post('duration');
		$tourdescription = $this->input->post('description');
		$message = $this->input->post('message');
		$totalpeople = $this->input->post('nooftotalpeople');

		$data = array(
			'tourguideid' => $tourguideid, 
			'userid' => $userid,
			'startdate' => $startdate,
			'enddate' => $enddate,
			'duration' => $duration,
			'tourdescription' => $tourdescription,
			'message' => $message,
			'totalpeople' => $totalpeople,
			'status' => 'appending'
		);

		$result = $this->db->insert('request', $data);
		return $result;
	}

	public function requestlist($userid)
	{
		$this->db->select('*');
		$this->db->from('request');
		$this->db->join('tourguide', 'request.tourguideid = tourguide.tourguideid');
		$this->db->join('region', 'tourguide.regionid = region.regionid');
		$this->db->where('request.userid', $userid);
		$this->db->order_by('request.created_at', 'DESC');
		$sql = $this->db->get('');

		foreach ($sql->result() as $request) {
			$requestid = $request->requestid;
			$enddate = $request->enddate;
			$status = $request->status;
			
			if (date('Y-m-d') > $enddate && $status == 'accepted') {
				$editdata = array(
					'status' => 'completed'
				);

				$this->db->where('requestid', $requestid);
				$this->db->update('request', $editdata);
			}
				
		}
		
		return $sql->result();
	}

	public function detail($id)
	{
		$this->db->select('request.*, tourguide.tourguidename, user.username, user.country as `usercountry`, user.phone, user.email, region.*');
		$this->db->from('request');
		$this->db->join('tourguide', 'request.tourguideid = tourguide.tourguideid');
		$this->db->join('region', 'tourguide.regionid = region.regionid');
		$this->db->join('user', 'request.userid = user.userid');
		$this->db->where('request.requestid', $id);
		$sql = $this->db->get('');
		return $sql->result();
	}

	public function cancel($id)
	{
		if ($this->session->userdata('role') == 'user') {
			$editdata = array(
				'status' => 'cancelled by user'
			);
		} else {
			$reply = $this->input->post('reply');
			$editdata = array(
				'status' => 'cancelled by tour guide',
				'tourguidereply' => $reply
			);
		}
			
		$this->db->where('requestid', $id);
		$this->db->update('request', $editdata);
	}

	public function confirm($id) {
		$reply = $this->input->post('reply');
		$editdata = array(
			'status' => 'accepted',
			'tourguidereply' => $reply
		);
		$this->db->where('requestid', $id);
		$this->db->update('request', $editdata);
	}

	public function tourguiderequestlist()
	{
		$this->db->select('request.*, user.username, user.country as `usercountry`, user.phone');
		$this->db->from('request');
		$this->db->join('tourguide', 'request.tourguideid = tourguide.tourguideid');
		$this->db->join('user', 'request.userid = user.userid');
		$this->db->where('request.tourguideid', $this->session->userdata('id'));
		$this->db->order_by('request.created_at', 'DESC');
		$sql = $this->db->get('');

		foreach ($sql->result() as $request) {
			$requestid = $request->requestid;
			$enddate = $request->enddate;
			$status = $request->status;
			
			if (date('Y-m-d') > $enddate && $status == 'accepted') {
				$editdata = array(
					'status' => 'completed'
				);

				$this->db->where('requestid', $requestid);
				$this->db->update('request', $editdata);
			}
				
		}
		return $sql->result();
	}

	public function todayrequestlist()
	{
		$this->db->select('request.requestid, request.duration, request.created_at, user.username');
		$this->db->from('request');
		$this->db->join('tourguide', 'request.tourguideid = tourguide.tourguideid');
		$this->db->join('user', 'request.userid = user.userid');
		$this->db->where('request.tourguideid', $this->session->userdata('id'));
		$this->db->where('request.status', 'appending');
		$this->db->where('DATE(request.created_at)', date('Y-m-d'));
		$this->db->order_by('request.created_at', 'DESC');
		$sql = $this->db->get('');

		return $sql->result();
	}

	public function showall()
	{
		$this->db->select('request.requestid, request.duration, request.startdate, request.enddate, request.status, user.username, tourguide.tourguidename, region.regionname, region.country');
		$this->db->from('request');
		$this->db->join('tourguide', 'request.tourguideid = tourguide.tourguideid');
		$this->db->join('user', 'request.userid = user.userid');
		$this->db->join('region', 'tourguide.regionid = region.regionid');
		$this->db->order_by('request.created_at', 'DESC');
		$sql = $this->db->get('');

		return $sql->result();
	}
}

/* End of file request_mdl.php */
/* Location: ./application/models/request_mdl.php */