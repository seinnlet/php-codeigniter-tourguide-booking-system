<?php  

	class Booking_mdl extends CI_Model
	{
		// CREATE (STORE)
		public function store()
		{
			$tourid = $this->input->post('tourid');
			$userid = $this->session->userdata('id');
			$bookdate = $this->input->post('bookdate');
			$startingtime = $this->input->post('starttime');
			$meetingpoint = $this->input->post('meetinglocation');
			$nooftotalpeople = $this->input->post('nooftotalpeople');
			if ($this->input->post('checknoofchild')) {
				$noofchild = $this->input->post('noofchild');
			} else {
				$noofchild = 0;
			}
			$totalprice = $this->input->post('tourprice');
			$comment = $this->input->post('comment');
			
			$data = array(
				'tourid' => $tourid, 
				'userid' => $userid,
				'bookdate' => $bookdate,
				'startingtime' => $startingtime,
				'meetingpoint' => $meetingpoint,
				'nooftotalpeople' => $nooftotalpeople,
				'noofchild' => $noofchild,
				'totalprice' => $totalprice,
				'comment' => $comment,
				'status' => 'booked'
			);

			$result = $this->db->insert('booking', $data);
			
			$this->db->select('bookingid');
			$this->db->from('booking');
			$this->db->where('userid', $userid);
			$this->db->where('tourid', $tourid);
			$this->db->where('bookdate', $bookdate);
			$check = $this->db->get('');

			foreach ($check->result() as $valuecheck) {
			 	$bookingid = $valuecheck->bookingid;
			} 

			$name_on_card = sha1($this->input->post('name_on_card'));
			$cardnumber = sha1($this->input->post('cardnumber'));
			$expirymonth = $this->input->post('month');
			$expiryyear = $this->input->post('year');
			$cvc = $this->input->post('cvc');

			$paymentdata = array(
				'bookingid' => $bookingid, 
				'name_on_card' => $name_on_card, 
				'cardnumber' => $cardnumber, 
				'expirymonth' => $expirymonth, 
				'expiryyear' => $expiryyear, 
				'cvc' => $cvc 
			);

			$result2 = $this->db->insert('payment', $paymentdata);

			return $bookingid;
		}

		public function detail($id)
		{
			$this->db->select('booking.*, tour.*, region.regionname, region.country, tourguide.tourguideid, tourguide.tourguidename, tourguide.profilepicture, tourtype.name as `tourtypename`, user.username, user.phone as `userphone`, user.country as `usercountry`, user.email as `useremail`, booking.created_at as `bookeddate`, booking.status as `bookingstatus`');
			$this->db->from('booking');
			$this->db->join('tour', 'booking.tourid = tour.tourid');
			$this->db->join('tourguide', 'tour.tourguideid = tourguide.tourguideid');
			$this->db->join('user', 'booking.userid = user.userid');
			$this->db->join('region', 'tour.regionid = region.regionid');
			$this->db->join('tourtype', 'tour.tourtypeid = tourtype.tourtypeid');
			$this->db->where('booking.bookingid', $id);
			$sql = $this->db->get('');
			return $sql->result();
		}

		public function bookinglist($userid)
		{
			$this->db->select('booking.*, tour.name as `tourname`, tour.tourguideid, region.regionname, region.country, tour.duration');
			$this->db->from('booking');
			$this->db->join('tour', 'booking.tourid = tour.tourid');
			$this->db->join('user', 'booking.userid = user.userid');
			$this->db->join('region', 'tour.regionid = region.regionid');
			$this->db->where('user.userid', $userid);
			$this->db->order_by('booking.created_at', 'DESC');
			$sql = $this->db->get('');

			foreach ($sql->result() as $booking) {
				$bookingid = $booking->bookingid;
				$duration = $booking->duration;
				$bookdate = $booking->bookdate;
				$status = $booking->status;
				$todate = date('Y-m-d', strtotime($bookdate))." + ".($duration-1)." day";
                $todate = date('Y-m-d', strtotime($todate));

				if (date('Y-m-d') > $todate && $status == 'booked') {
					$editdata = array(
						'status' => 'completed'
					);

					$this->db->where('bookingid', $bookingid);
					$this->db->update('booking', $editdata);
				}
					
			}

			return $sql->result();
		}

		public function cancel($id)
		{
			$bookingid = $this->input->post('bookingid');
			$cancellationreason = $this->input->post('reason');

			$editdata = array(
				'status' => 'cancelled',
				'cancellationreason' => $cancellationreason
			);
			$this->db->where('bookingid', $bookingid);
			$this->db->update('booking', $editdata);
		}

		public function tourguidebookinglist()
		{
			$this->db->select('booking.*, tour.name as `tourname`, user.username, user.phone as `userphone`, tour.duration');
			$this->db->from('booking');
			$this->db->join('tour', 'booking.tourid = tour.tourid');
			$this->db->join('user', 'booking.userid = user.userid');
			$this->db->join('tourguide', 'tour.tourguideid = tourguide.tourguideid');
			$this->db->where('tourguide.tourguideid', $this->session->userdata('id'));
			$this->db->order_by('booking.created_at', 'DESC');
			$sql = $this->db->get('');

			foreach ($sql->result() as $booking) {
				$bookingid = $booking->bookingid;
				$duration = $booking->duration;
				$bookdate = $booking->bookdate;
				$status = $booking->status;
				$todate = date('Y-m-d', strtotime($bookdate))." + ".($duration-1)." day";
                $todate = date('Y-m-d', strtotime($todate));

				if (date('Y-m-d') > $todate && $status == 'booked') {
					$editdata = array(
						'status' => 'completed'
					);

					$this->db->where('bookingid', $bookingid);
					$this->db->update('booking', $editdata);
				}
					
			}

			return $sql->result();
		}

		public function todaybookinglist()
		{
			$this->db->select('booking.bookingid, booking.created_at, tour.duration, tour.name as `tourname`, user.username');
			$this->db->from('booking');
			$this->db->join('tour', 'booking.tourid = tour.tourid');
			$this->db->join('user', 'booking.userid = user.userid');
			$this->db->join('tourguide', 'tour.tourguideid = tourguide.tourguideid');
			$this->db->where('tourguide.tourguideid', $this->session->userdata('id'));
			$this->db->where('booking.status', 'booked');
			$this->db->where('DATE(booking.created_at)', date('Y-m-d'));
			$this->db->order_by('booking.created_at', 'DESC');
			$sql = $this->db->get('');
			
			return $sql->result();
		}

		public function showall()
		{
			$this->db->select('booking.bookingid, booking.bookdate, booking.status, tour.duration, tour.name as `tourname`, user.username, tourguide.tourguidename, region.regionname, region.country');
			$this->db->from('booking');
			$this->db->join('tour', 'booking.tourid = tour.tourid');
			$this->db->join('user', 'booking.userid = user.userid');
			$this->db->join('tourguide', 'tour.tourguideid = tourguide.tourguideid');
			$this->db->join('region', 'tour.regionid = region.regionid');
			$this->db->order_by('booking.created_at', 'DESC');
			$sql = $this->db->get('');
			
			return $sql->result();
		}

	}

?>