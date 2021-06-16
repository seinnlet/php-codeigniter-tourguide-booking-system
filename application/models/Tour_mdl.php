<?php  

	class Tour_mdl extends CI_Model
	{
		// Read
		public function tourlist()
		{
			$this->db->select('tour.*, region.*, tourtype.name as `tourtypename`');
			$this->db->from('tour');
			$this->db->join('region', 'tour.regionid = region.regionid');
			$this->db->join('tourtype', 'tour.tourtypeid = tourtype.tourtypeid');
			$this->db->where('tourguideid', $this->session->userdata('id'));
			$this->db->order_by('created_at', 'DESC');
			$sql = $this->db->get('');

			return $sql->result();
		}

		public function individualtour($id) 
		{
			$this->db->select('tour.*, region.*, tourtype.name as `tourtypename`');
			$this->db->from('tour');
			$this->db->join('region', 'tour.regionid = region.regionid');
			$this->db->join('tourtype', 'tour.tourtypeid = tourtype.tourtypeid');
			$this->db->where('tourguideid', $id);
			$this->db->where('tour.status', 'approved');
			$this->db->order_by('created_at', 'DESC');
			$sql = $this->db->get('');

			return $sql->result();
		}

		public function alltourlist()
		{
			$this->db->select('tour.*, region.*, tourtype.name as `tourtypename`, tourguide.tourguidename');
			$this->db->from('tour');
			$this->db->join('region', 'tour.regionid = region.regionid');
			$this->db->join('tourtype', 'tour.tourtypeid = tourtype.tourtypeid');
			$this->db->join('tourguide', 'tour.tourguideid = tourguide.tourguideid');
			$this->db->order_by("tour.created_at", "desc");
			$sql = $this->db->get('');

			return $sql->result();
		}

		public function showall()
		{
			$this->db->select('tour.*, region.*, tourtype.name as `tourtypename`, tourguide.tourguidename');
			$this->db->from('tour');
			$this->db->join('region', 'tour.regionid = region.regionid');
			$this->db->join('tourtype', 'tour.tourtypeid = tourtype.tourtypeid');
			$this->db->join('tourguide', 'tour.tourguideid = tourguide.tourguideid');
			$this->db->where("tour.status", "approved");
			$this->db->order_by("tour.created_at", "desc");
			$sql = $this->db->get('');

			return $sql->result();
		}

		public function todaytourlist()
		{
			$this->db->select('tour.tourid, tour.name, tour.image, tour.transportation, tour.transportationid, tour.created_at, tour.status, tourguide.tourguidename');
			$this->db->from('tour');
			$this->db->join('tourguide', 'tour.tourguideid = tourguide.tourguideid');
			$this->db->where('DATE(created_at)', date('Y-m-d'));
			$this->db->where('status', 'appending');
			$sql = $this->db->get('');

			return $sql->result();
		}

		public function indextourlist()
		{
			$this->db->select('tour.*, region.*, tourtype.name as `tourtypename`');
			$this->db->from('tour');
			$this->db->join('region', 'tour.regionid = region.regionid');
			$this->db->join('tourtype', 'tour.tourtypeid = tourtype.tourtypeid');
			$this->db->where("tour.status", "approved");
			$this->db->limit(6);
			$sql = $this->db->get('');

			return $sql->result();
		}

		public function regionlist()
		{
			$this->db->select('*');
			$this->db->from('region');
			$sql = $this->db->get('');

			return $sql->result();
		}
		public function tourtypelist()
		{
			$this->db->select('*');
			$this->db->from('tourtype');
			$sql = $this->db->get('');

			return $sql->result();
		}
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
			$tourname = $this->input->post('tourname');
			$tourguideid = $this->input->post('tourguideid');
			$tourtypeid = $this->input->post('tourtype');
			if ($this->input->post('rdotransportation') == "Manage") {
				$transportation = $this->input->post('transportation');
				$transportationid = NULL;
			} else {
				$transportationid = $this->input->post('transportationid');
				$transportation = NULL;
			}
			
			$tourprice = $this->input->post('tourprice');
			$noofpeoplelimit = $this->input->post('noofpeoplelimit');			
			$durationhour = $this->input->post('durationhour');
			$description = $this->input->post('description');
			$tourroute = $this->input->post('tourroute');
			$restriction = $this->input->post('restriction');
			$meetingpoint = $this->input->post('meetingpoint');
			$endpoint = $this->input->post('endpoint');
			$regionid = $this->input->post('region');
			// $image = $this->input->post('image');
			$image = $_FILES['image']['name'];

			$data = array(
				'name' => $tourname, 
				'tourguideid' => $tourguideid,
				'tourtypeid' => $tourtypeid,
				'transportationid' => $transportationid,
				'transportation' => $transportation,
				'tourprice' => $tourprice,
				'noofpeoplelimit' => $noofpeoplelimit,
				'duration' => $durationhour,
				'image' => $image,
				'description' => $description,
				'tourroute' => $tourroute,
				'restriction' => $restriction,
				'meetingpoint' => $meetingpoint,
				'endingpoint' => $endpoint,
				'regionid' => $regionid,
				'status' => 'appending'
			);

			$result = $this->db->insert('tour', $data);
			return $result;
		}

		// get UPDATE item
		public function edit($id)
		{
			$this->db->select('*');
			$this->db->from('tour');
			$this->db->where('tourid', $id);
			$sql = $this->db->get('');

			return $sql->result();
		}
		// UPDATE
		public function update()
		{
			$tourid = $this->input->post('tourid');
			$tourname = $this->input->post('tourname');
			$tourtypeid = $this->input->post('tourtype');
			if ($this->input->post('transportation')) {
				$transportation = $this->input->post('transportation');
				$transportationid = NULL;
			} else {
				$transportationid = $this->input->post('transportationid');
				$transportation = NULL;
			}
			$tourprice = $this->input->post('tourprice');
			$noofpeoplelimit = $this->input->post('noofpeoplelimit');			
			$duration = $this->input->post('duration');
			$description = $this->input->post('description');
			$tourroute = $this->input->post('tourroute');
			$restriction = $this->input->post('restriction');
			$meetingpoint = $this->input->post('meetingpoint');
			$endpoint = $this->input->post('endpoint');
			$regionid = $this->input->post('region');
			// $image = $this->input->post('image');
			if (isset($_FILES['image'])) {
				$image = $_FILES['image']['name'];
				$image = str_replace(' ', '_', $image);
			}
			if ($_FILES['image']['name'] == ""){
				$image = $this->input->post('oldimage');
			}
			

			$editdata = array(
				'name' => $tourname, 
				'tourtypeid' => $tourtypeid,
				'transportationid' => $transportationid,
				'transportation' => $transportation,
				'tourprice' => $tourprice,
				'noofpeoplelimit' => $noofpeoplelimit,
				'duration' => $duration,
				'image' => $image,
				'description' => $description,
				'tourroute' => $tourroute,
				'restriction' => $restriction,
				'meetingpoint' => $meetingpoint,
				'endingpoint' => $endpoint,
				'regionid' => $regionid
			);

			$this->db->where('tourid', $tourid);
			$this->db->update('tour', $editdata);
		}

		public function approve($id, $staffid)
		{
			$editdata = array(
				'staffid' => $staffid,
				'status' => 'approved'
			);

			$this->db->where('tourid', $id);
			$this->db->update('tour', $editdata);
		}

		// DELETE
		public function delete($id)
		{
			$this->db->where('tourid', $id);
			$this->db->delete('booking');

			$this->db->where('tourid', $id);
			$this->db->delete('tour');
		}

		// DETAIL 
		public function detail($id, $status, $tid)
		{
			if ($status == 'appending') {
				if ($tid == 't_c') {
					$this->db->select('tour.*, region.*, tourtype.name as `tourtypename`, tourguide.tourguidename');
					$this->db->from('tour');
					$this->db->join('region', 'tour.regionid = region.regionid');
					$this->db->join('tourtype', 'tour.tourtypeid = tourtype.tourtypeid');
					$this->db->join('tourguide', 'tour.tourguideid = tourguide.tourguideid');
					$this->db->where('tourid', $id);
					$sql = $this->db->get('');
				} else {
					$this->db->select('tour.*, region.*, tourtype.name as `tourtypename`, tourguide.tourguidename, transportation.name as `transportationname`, transportation.transportationtype');
					$this->db->from('tour');
					$this->db->join('region', 'tour.regionid = region.regionid');
					$this->db->join('tourtype', 'tour.tourtypeid = tourtype.tourtypeid');
					$this->db->join('transportation', 'tour.transportationid = transportation.id');
					$this->db->join('tourguide', 'tour.tourguideid = tourguide.tourguideid');
					$this->db->where('tourid', $id);
					$sql = $this->db->get('');
				}


			} else {
				if ($tid == 't_c') {
					$this->db->select('tour.*, region.*, tourtype.name as `tourtypename`, staff.staffname, tourguide.tourguidename');
					$this->db->from('tour');
					$this->db->join('region', 'tour.regionid = region.regionid');
					$this->db->join('tourtype', 'tour.tourtypeid = tourtype.tourtypeid');
					$this->db->join('staff', 'tour.staffid = staff.staffid');
					$this->db->join('tourguide', 'tour.tourguideid = tourguide.tourguideid');
					$this->db->where('tourid', $id);
					$sql = $this->db->get('');
				} else {
					$this->db->select('tour.*, region.*, tourtype.name as `tourtypename`, staff.staffname, tourguide.tourguidename, transportation.name as `transportationname`, transportation.transportationtype');
					$this->db->from('tour');
					$this->db->join('region', 'tour.regionid = region.regionid');
					$this->db->join('tourtype', 'tour.tourtypeid = tourtype.tourtypeid');
					$this->db->join('transportation', 'tour.transportationid = transportation.id');
					$this->db->join('staff', 'tour.staffid = staff.staffid');
					$this->db->join('tourguide', 'tour.tourguideid = tourguide.tourguideid');
					$this->db->where('tourid', $id);
					$sql = $this->db->get('');
				}
			}

			return $sql->result();
		}

		// show 
		public function show($id)
		{
			$this->db->select('tour.transportationid');
			$this->db->from('tour');
			$this->db->where('tourid', $id);
			$check = $this->db->get('');

			foreach ($check->result() as $valuecheck) {
			 	$transportationid = $valuecheck->transportationid;
			 } 

			if (!$transportationid) {
				$this->db->select('tour.*, region.*, tourtype.name as `tourtypename`, tourguide.tourguidename, tourguide.description as `tourguidedescription`, tourguide.profilepicture');
				$this->db->from('tour');
				$this->db->join('region', 'tour.regionid = region.regionid');
				$this->db->join('tourtype', 'tour.tourtypeid = tourtype.tourtypeid');
				$this->db->join('tourguide', 'tour.tourguideid = tourguide.tourguideid');
				$this->db->where('tourid', $id);
				$sql = $this->db->get('');
			} else {
				$this->db->select('tour.*, region.*, tourtype.name as `tourtypename`, tourguide.tourguidename, tourguide.description as `tourguidedescription`, tourguide.profilepicture, transportation.name as `transportationname`, transportation.transportationtype, transportation.facility');
				$this->db->from('tour');
				$this->db->join('region', 'tour.regionid = region.regionid');
				$this->db->join('tourtype', 'tour.tourtypeid = tourtype.tourtypeid');
				$this->db->join('transportation', 'tour.transportationid = transportation.id');
				$this->db->join('tourguide', 'tour.tourguideid = tourguide.tourguideid');
				$this->db->where('tourid', $id);
				$sql = $this->db->get('');
			}

			return $sql->result();
		}

		// search
		public function search()
		{
			$this->db->select('tour.*, region.*, tourtype.name as `tourtypename`');
			$this->db->from('tour');
			$this->db->join('region', 'tour.regionid = region.regionid');
			$this->db->join('tourtype', 'tour.tourtypeid = tourtype.tourtypeid');

			if($this->input->post('keyword')) {

				$this->db->like('tour.name', $this->input->post('keyword'), 'both'); 
				$this->db->or_like('regionname', $this->input->post('keyword'), 'both');
				$this->db->or_like('tourtype.name', $this->input->post('keyword'), 'both');

			} 
			if ($this->input->post('tourtype')) {
				
				$this->db->where('tour.tourtypeid', $this->input->post('tourtype'));

			}
			if ($this->input->post('region')) {
				
				$this->db->where('tour.regionid', $this->input->post('region'));

			}

			$this->db->where('tour.status', 'approved');
			$sql = $this->db->get('');

			return $sql->result();

		}

		public function checkbookingdate($id)
		{
			$this->db->select('tour.tourguideid');
			$this->db->from('tour');
			$this->db->where('tourid', $id);
			$check = $this->db->get('');

			foreach ($check->result() as $valuecheck) {
			 	$tourguideid = $valuecheck->tourguideid;
			 } 

			$this->db->select('booking.bookdate, tour.duration');
			$this->db->from('booking');
			$this->db->join('tour', 'booking.tourid = tour.tourid');
			$this->db->join('tourguide', 'tour.tourguideid = tourguide.tourguideid');
			$this->db->where('booking.status', 'booked');
			$this->db->where('tour.tourguideid', $tourguideid);
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
			$this->db->where('request.tourguideid', $tourguideid);
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

		public function getDatesFromRange($start, $end, $format = 'Y-m-d') { 
      
			// Declare an empty array 
			$array = array(); 
			  
			// Variable that store the date interval 
			// of period 1 day 
			$interval = new DateInterval('P1D'); 

			$realEnd = new DateTime($end); 
			$realEnd->add($interval); 

			$period = new DatePeriod(new DateTime($start), $interval, $realEnd); 

			// Use loop to store date into array 
			foreach($period as $date) {                  
			    $array[] = $date->format($format);  
			} 

			// Return the array elements 
			return $array; 
		} 

	}
?>