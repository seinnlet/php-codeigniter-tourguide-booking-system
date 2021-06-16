<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_mdl extends CI_Model {

	public function booking()
	{
		$this->db->select('booking.bookingid, booking.bookdate, booking.status, tour.duration, tour.name as `tourname`, tour.tourprice, user.username, tourguide.tourguidename, region.regionname, region.country, tourtype.name as `tourtypename`');
		$this->db->from('booking');
		$this->db->join('tour', 'booking.tourid = tour.tourid');
		$this->db->join('user', 'booking.userid = user.userid');
		$this->db->join('tourguide', 'tour.tourguideid = tourguide.tourguideid');
		$this->db->join('region', 'tour.regionid = region.regionid');
		$this->db->join('tourtype', 'tour.tourtypeid = tourtype.tourtypeid');
		
		$this->db->where('bookdate >=', $this->input->post('fromdate'));
		$this->db->where('bookdate <=', $this->input->post('todate'));

		if ($this->input->post('tourtype') != "null") {
			$this->db->where('tourtype.name', $this->input->post('tourtype'));
		}

		if ($this->input->post('region') != "null") {
			$this->db->where('region.regionname', $this->input->post('region'));
		}

		if ($this->input->post('status') != "null") {
			$this->db->where('booking.status', $this->input->post('status'));
		}

		// sort
		if ($this->input->post('sort') == 'date') {
			$this->db->order_by('booking.bookdate');
		} elseif ($this->input->post('sort') == 'tourtype') {
			$this->db->order_by('booking.bookingid');
			$this->db->order_by('tourtype.name');
		} elseif ($this->input->post('sort') == 'region') {
			$this->db->order_by('booking.bookingid');
			$this->db->order_by('region.regionname');
		} else {
			$this->db->order_by('booking.bookingid');
		}
		
		$sql = $this->db->get('');
		
		return $sql->result();
	}

	public function request()
	{
		$this->db->select('request.requestid, request.duration, request.startdate, request.status, user.username, user.country as `usercountry`, tourguide.tourguidename, tourguide.feesperday, region.regionname, region.country');
		$this->db->from('request');
		$this->db->join('tourguide', 'request.tourguideid = tourguide.tourguideid');
		$this->db->join('user', 'request.userid = user.userid');
		$this->db->join('region', 'tourguide.regionid = region.regionid');

		$this->db->where('startdate >=', $this->input->post('fromdate'));
		$this->db->where('startdate <=', $this->input->post('todate'));

		if ($this->input->post('region') != "null") {
			$this->db->where('region.regionname', $this->input->post('region'));
		}

		if ($this->input->post('status') != "null") {
			$this->db->where('request.status', $this->input->post('status'));
		}

		$sql = $this->db->get('');
		
		return $sql->result();
	}

	public function tourbookinglist()
	{
		$this->db->select('bookingid');
		$this->db->from('booking');
		$this->db->where('status', 'completed');
		$sql = $this->db->get('');
		
		return $sql->result();
	}

	public function tourguidebookinglist()
	{
		$this->db->select('requestid');
		$this->db->from('request');
		$this->db->where('status', 'completed');
		$sql = $this->db->get('');
		
		return $sql->result();
	}

	public function toptourlist()
	{
		$this->db->select('tour.tourid, tour.name, tour.tourprice, tour.transportationid, tour.status as `tourstatus`, tourguide.tourguidename, COUNT(booking.bookingid) as `count`, region.regionname, region.country');
		$this->db->from('booking');
		$this->db->join('tour', 'booking.tourid = tour.tourid');
		$this->db->join('tourguide', 'tour.tourguideid = tourguide.tourguideid');
		$this->db->join('region', 'tour.regionid = region.regionid');
		$this->db->where('booking.status', 'completed');
		$this->db->or_where('booking.status', 'booked');
		$this->db->limit(5);
		$this->db->group_by('booking.tourid');
		$this->db->order_by('COUNT(booking.bookingid)', 'DESC');
		$sql = $this->db->get('');
		
		return $sql->result();
	}

	public function toptourguidelist()
	{
		$this->db->select('tourguide.tourguideid, tourguide.tourguidename, tourguide.profilepicture, tourguide.description, region.regionname, region.country, ROUND(AVG(rate.rating),1) as `average`');
		$this->db->from('rate');
		$this->db->join('tourguide', 'rate.tourguideid = tourguide.tourguideid');
		$this->db->join('region', 'tourguide.regionid = region.regionid');
		$this->db->limit(5);
		$this->db->group_by('rate.tourguideid');
		$this->db->order_by('AVG(rate.rating)', 'DESC');
		$sql = $this->db->get('');

		return $sql->result();
	}

	public function individualbookinglist()
	{
		$this->db->select('bookingid');
		$this->db->from('booking');
		$this->db->join('tour', 'booking.tourid = tour.tourid');
		$this->db->join('tourguide', 'tour.tourguideid = tourguide.tourguideid');
		$this->db->where('tourguide.tourguideid', $this->session->userdata('id'));
		$this->db->where('booking.status', 'completed');
		$sql = $this->db->get('');
		
		return $sql->result();	
	}

	public function individualrequestlist()
	{
		$this->db->select('requestid');
		$this->db->from('request');
		$this->db->where('tourguideid', $this->session->userdata('id'));
		$this->db->where('status', 'completed');
		$sql = $this->db->get('');
		
		return $sql->result();	
	}

	public function topindividualtourlist()
	{
		$this->db->select('tour.tourid, tour.name, tour.tourprice, tour.transportationid, tour.status as `tourstatus`, tourguide.tourguidename, COUNT(booking.bookingid) as `count`');
		$this->db->from('booking');
		$this->db->join('tour', 'booking.tourid = tour.tourid');
		$this->db->join('tourguide', 'tour.tourguideid = tourguide.tourguideid');
		$this->db->where('tourguide.tourguideid', $this->session->userdata('id'));
		$this->db->where('booking.status', 'completed');
		$this->db->or_where('booking.status', 'booked');
		$this->db->limit(5);
		$this->db->group_by('booking.tourid');
		$this->db->order_by('COUNT(booking.bookingid)', 'DESC');
		$sql = $this->db->get('');
		
		return $sql->result();
	}

	public function topbloglist()
	{
		$this->db->select('blog.*, COUNT(likecount.id) as `c_like`');
		$this->db->from('blog');
		$this->db->join('likecount', 'blog.blogid = likecount.blogid', 'left');
		$this->db->group_by('blog.blogid');
		$this->db->where('tourguideid', $this->session->userdata('id'));
		$this->db->limit(5);
		$this->db->order_by('COUNT(likecount.id)', 'DESC');
		$sql = $this->db->get('');

		return $sql->result();
	}

}

/* End of file Report_mdl.php */
/* Location: ./application/models/Report_mdl.php */