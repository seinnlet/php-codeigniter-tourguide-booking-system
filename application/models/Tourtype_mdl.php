<?php  

	class Tourtype_mdl extends CI_Model
	{
		// Read
		public function tourtypelist()
		{
			$this->db->select('*');
			$this->db->from('tourtype');
			$sql = $this->db->get('');

			return $sql->result();
		}

		// CREATE (STORE)
		public function store()
		{
			$tourtypename = $this->input->post('name');

			$data = array(
				'name' => $tourtypename
			);

			$result = $this->db->insert('tourtype', $data);
			return $result;
		}

		// get UPDATE item
		public function edit($id)
		{
			$this->db->select('*');
			$this->db->from('tourtype');
			$this->db->where('tourtypeid', $id);
			$sql = $this->db->get('');

			return $sql->result();
		}
		// UPDATE
		public function update()
		{
			$tourtypeid = $this->input->post('editid');
			$tourtypename = $this->input->post('editname');

			$editdata = array(
				'name' => $tourtypename
			);
			$this->db->where('tourtypeid', $tourtypeid);
			$this->db->update('tourtype', $editdata);
		}

		// DELETE
		public function delete($id)
		{
			$this->db->where('tourtypeid', $id);
			$this->db->delete('tour');

			$this->db->where('tourtypeid', $id);
			$this->db->delete('tourtype');
		}

	}
?>