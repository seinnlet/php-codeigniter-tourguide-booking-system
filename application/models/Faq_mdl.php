<?php  

	class Faq_mdl extends CI_Model
	{
		// Read
		public function faqlist()
		{
			$this->db->select('*');
			$this->db->from('faq');
			$sql = $this->db->get('');

			return $sql->result();
		}

		// CREATE (STORE)
		public function store()
		{
			$question = $this->input->post('question');
			$answer = $this->input->post('answer');

			$data = array(
				'question' => $question, 
				'answer' => $answer
			);

			$result = $this->db->insert('faq', $data);
			return $result;
		}

		// get UPDATE item
		public function edit($id)
		{
			$this->db->select('*');
			$this->db->from('faq');
			$this->db->where('id', $id);
			$sql = $this->db->get('');

			return $sql->result();
		}
		// UPDATE
		public function update()
		{
			$id = $this->input->post('editid');
			$question = $this->input->post('editquestion');
			$answer = $this->input->post('editanswer');

			$editdata = array(
				'question' => $question, 
				'answer' => $answer
			);
			$this->db->where('id', $id);
			$this->db->update('faq', $editdata);
		}

		// DELETE
		public function delete($id)
		{
			$this->db->where('id', $id);
			$this->db->delete('faq');
		}

	}
?>