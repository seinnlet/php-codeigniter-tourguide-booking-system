<?php  

	class Region_mdl extends CI_Model
	{
		// Read
		public function regionlist()
		{
			$this->db->select('*');
			$this->db->from('region');
			$this->db->order_by('regionname', 'ASC');
			$sql = $this->db->get('');

			return $sql->result();
		}
		public function countrylist()
		{
			$this->db->select('*');
			$this->db->from('country');
			$sql = $this->db->get('');

			return $sql->result();
		}

		// CREATE (STORE)
		public function store()
		{
			$regionname = $this->input->post('regionname');
			$country = $this->input->post('country');

			$data = array(
				'regionname' => $regionname, 
				'country' => $country
			);

			$result = $this->db->insert('region', $data);
			return $result;
		}

		// get UPDATE item
		public function edit($id)
		{
			$this->db->select('*');
			$this->db->from('region');
			$this->db->where('regionid', $id);
			$sql = $this->db->get('');

			return $sql->result();
		}
		// UPDATE
		public function update()
		{
			$regionid = $this->input->post('regionid');
			$regionname = $this->input->post('editregionname');
			$country = $this->input->post('editcountry');

			$editdata = array(
				'regionname' => $regionname, 
				'country' => $country
			);
			$this->db->where('regionid', $regionid);
			$this->db->update('region', $editdata);
		}

		// DELETE
		public function delete($id)
		{
			$this->db->where('regionid', $id);
			$this->db->delete('tour');

			$this->db->where('regionid', $id);
			$this->db->delete('tourguide');

			$this->db->where('regionid', $id);
			$this->db->delete('region');
		}

	}
?>