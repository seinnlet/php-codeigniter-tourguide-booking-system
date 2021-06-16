<?php  

	class Transportation_mdl extends CI_Model
	{
		// Read
		public function transportationlist()
		{
			$this->db->select('*');
			$this->db->from('transportation');
			$sql = $this->db->get('');

			return $sql->result();
		}

		// CREATE (STORE)
		public function store()
		{
			$name = $this->input->post('name');
			$transportationtype = $this->input->post('type');
			$facility = $this->input->post('facility');

			$data = array(
				'name' => $name, 
				'transportationtype' => $transportationtype, 
				'facility' => $facility
			);

			$result = $this->db->insert('transportation', $data);
			return $result;
		}

		// get UPDATE item
		public function edit($id)
		{
			$this->db->select('*');
			$this->db->from('transportation');
			$this->db->where('id', $id);
			$sql = $this->db->get('');

			return $sql->result();
		}
		// UPDATE
		public function update()
		{
			$id = $this->input->post('editid');
			$name = $this->input->post('editname');
			$transportationtype = $this->input->post('edittype');
			$facility = $this->input->post('editfacility');

			$editdata = array(
				'name' => $name, 
				'transportationtype' => $transportationtype, 
				'facility' => $facility
			);
			$this->db->where('id', $id);
			$this->db->update('transportation', $editdata);
		}

		// DELETE
		public function delete($id)
		{
			$this->db->where('transportationid', $id);
			$this->db->delete('tour');

			$this->db->where('id', $id);
			$this->db->delete('transportation');
		}

	}
?>