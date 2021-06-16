<?php  

	class Blog_mdl extends CI_Model
	{
		// Read
		public function bloglist()
		{
			$this->db->select('blog.*, COUNT(likecount.id) as `c_like`');
			$this->db->from('blog');
			$this->db->join('likecount', 'blog.blogid = likecount.blogid', 'left');
			$this->db->group_by('blog.blogid');
			$this->db->where('tourguideid', $this->session->userdata('id'));
			$sql = $this->db->get('');

			return $sql->result();
		}

		public function indexbloglist()
		{
			$this->db->select('*');
			$this->db->from('blog');
			$this->db->order_by('postdate', 'DESC');
			$this->db->limit(4);
			$sql = $this->db->get('');

			return $sql->result();
		}

		public function showall()
		{
			$this->db->select('blog.*, tourguide.tourguidename');
			$this->db->from('blog');
			$this->db->join('tourguide', 'blog.tourguideid = tourguide.tourguideid');
			$this->db->order_by('postdate', 'DESC');
			$sql = $this->db->get('');

			return $sql->result();
		}

		// CREATE (STORE)
		public function store($date)
		{
			$image = $date.'_'.str_replace(' ', '_', $_FILES['image']['name']);
			$title = $this->input->post('title');
			$description = $this->input->post('description');
			$tourguideid = $this->input->post('tourguideid');

			$data = array(
				'image' => $image, 
				'title' => $title, 
				'description' => $description, 
				'tourguideid' => $tourguideid
			);

			$result = $this->db->insert('blog', $data);
			return $result;
		}

		// get UPDATE item
		public function edit($id)
		{
			$this->db->select('*');
			$this->db->from('blog');
			$this->db->where('blogid', $id);
			$sql = $this->db->get('');

			return $sql->result();
		}
		// UPDATE
		public function update($date)
		{
			if ($_FILES['image']['name']) {
				$image = $date.'_'.str_replace(' ', '_', $_FILES['image']['name']);
			} else {
				$image = $this->input->post('oldimage');
			}
			
			$id = $this->input->post('blogid');
			$title = $this->input->post('title');
			$description = $this->input->post('description');

			$editdata = array(
				'image' => $image, 
				'title' => $title, 
				'description' => $description
			);
			$this->db->where('blogid', $id);
			$this->db->update('blog', $editdata);
		}

		// DELETE
		public function delete($id)
		{
			$this->db->where('blogid', $id);
			$this->db->delete('blog');
		}

		public function search()
		{
			$this->db->select('blog.*, tourguide.tourguidename');
			$this->db->from('blog');
			$this->db->join('tourguide', 'blog.tourguideid = tourguide.tourguideid');
			if ($this->input->post('keyword') && $this->input->post('month')) {
				
				$this->db->where('month(postdate)', $this->input->post('month'));
				$this->db->where('year(postdate)', $this->input->post('year'));
				$this->db->like('title', $this->input->post('keyword'), 'both'); 
				$this->db->or_like('tourguidename', $this->input->post('keyword'), 'both'); 

			}elseif ($this->input->post('keyword')) {
				
				$this->db->like('title', $this->input->post('keyword'), 'both'); 
				$this->db->or_like('tourguidename', $this->input->post('keyword'), 'both'); 
			
			} elseif ($this->input->post('month')) {

				$this->db->where('month(postdate)', $this->input->post('month'));
				$this->db->where('year(postdate)', $this->input->post('year'));

			}
			$this->db->order_by('postdate', 'DESC');
			$sql = $this->db->get('');

			return $sql->result();
		}

		public function show($id)
		{
			$this->db->select('blog.*, tourguide.tourguidename');
			$this->db->from('blog');
			$this->db->join('tourguide', 'blog.tourguideid = tourguide.tourguideid');
			$this->db->where('blogid', $id);
			$sql = $this->db->get('');

			return $sql->result();
		}

		public function checklike($id, $userid)
		{
			$this->db->select('*');
			$this->db->from('likecount');
			$this->db->where('blogid', $id);
			$this->db->where('userid', $userid);
			$sql = $this->db->get('');

			return $sql->result();	
		}

		public function like($id, $userid)
		{
			$data = array(
				'blogid' => $id, 
				'userid' => $userid
			);

			$result = $this->db->insert('likecount', $data);
			return $result;
		}

		public function unlike($id, $userid)
		{
			$this->db->where('blogid', $id);
			$this->db->where('userid', $userid);
			$this->db->delete('likecount');
		}

		public function countlike($id)
		{
			$this->db->select('*');
			$this->db->from('likecount');
			$this->db->where('blogid', $id);
			$sql = $this->db->get('');

			return $sql->result();	
		}

		public function likelist($userid)
		{
			$this->db->select('blog.blogid, blog.image, blog.title, tourguide.tourguidename');
			$this->db->from('blog');
			$this->db->join('likecount', 'blog.blogid = likecount.blogid');
			$this->db->join('user', 'user.userid = likecount.userid');
			$this->db->join('tourguide', 'blog.tourguideid = tourguide.tourguideid');
			$this->db->where('likecount.userid', $userid);
			$this->db->order_by('blog.postdate', 'DESC');
			$sql = $this->db->get('');

			return $sql->result();
		}
	}
?>