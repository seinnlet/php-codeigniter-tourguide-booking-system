<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Review_mdl extends CI_Model {

	public function store() 
	{
		$tourguideid = $this->input->post('tourguideid');
		$userid = $this->session->userdata('id');
		$rating = $this->input->post('stars');
		$feedback = $this->input->post('feedback');

		$data = array(
			'tourguideid' => $tourguideid, 
			'userid' => $userid,
			'rating' => $rating,
			'feedback' => $feedback
		);

		$result = $this->db->insert('rate', $data);

		if ($this->input->post('bookingid')) {
			$bookingid = $this->input->post('bookingid');
			$editdata = array(
				'reviewstatus' => 'rated'
			);

			$this->db->where('bookingid', $bookingid);
			$this->db->update('booking', $editdata);
		} else {
			$requestid = $this->input->post('requestid');
			$editdata = array(
				'reviewstatus' => 'rated'
			);

			$this->db->where('requestid', $requestid);
			$this->db->update('request', $editdata);
		}
		return $result;
	}

	public function getName($id)
	{
		$this->db->select('tourguidename');
		$this->db->from('tourguide');
		$this->db->where('tourguideid', $id);
		$sql = $this->db->get('');

		return $sql->result();
	}

	public function getavgrate($id)
	{
		$this->db->select('ROUND(AVG(rating),1) as avg_r');
		$this->db->from('rate');
		$this->db->where('tourguideid', $id);
		$sql = $this->db->get('');

		return $sql->result();
	}

	public function ratelist($id)
	{
		$this->db->select('user.username, user.profilepicture, rate.*');
		$this->db->from('rate');
		$this->db->join('user', 'rate.userid = user.userid');
		$this->db->where('tourguideid', $id);
		$this->db->order_by('date', 'DESC');
		$sql = $this->db->get('');

		return $sql->result();
	}

	public function todayratelist()
	{
		$this->db->select('user.username, user.profilepicture, rate.feedback, rate.rateid, rate.date');
		$this->db->from('rate');
		$this->db->join('user', 'rate.userid = user.userid');
		$this->db->where('tourguideid', $this->session->userdata('id'));
		$this->db->where('DATE(rate.date)', date('Y-m-d'));
		$this->db->order_by('date', 'DESC');
		$sql = $this->db->get('');

		return $sql->result();
	}

	public function show($id)
	{
		$this->db->select('user.username, user.profilepicture, rate.*');
		$this->db->from('rate');
		$this->db->join('user', 'rate.userid = user.userid');
		$this->db->where('rateid', $id);
		$sql = $this->db->get('');

		return $sql->result();
	}
}

/* End of file Review_mdl.php */
/* Location: ./application/models/Review_mdl.php */