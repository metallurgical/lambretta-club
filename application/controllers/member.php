<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once("./dhtmlx/connector/scheduler_connector.php");
require_once("./dhtmlx/connector/db_phpci.php");
DataProcessor::$action_param ="dhx_editor_status";

//require_once("assets/codebase/connector/scheduler_connector.php");

class Member extends CI_Controller {

	public function index () {
		$this->load->view('member/dashboard');
	}

	public function profile () {

		$member_id = $this->session->userdata('user_id');
		$data['action'] = $this->uri->segment(3) ? $this->uri->segment(3) : 'view';

		$table = 'members';
		$where = array(
				'member_id' => $member_id
			);
		$data['member'] = $this->seat_model->get_specified_row( $table, $where );

		if ( $this->input->post() ) {

			$formData = $this->input->post();
			$tableToUpdate = 'members';
			$usingCondition = array(
					'member_id' => $member_id
				);
			$columnToUpdate = array(
					'member_username'     => $formData['member_username'],
					'member_password'     => $formData['member_password'],
					'member_email'        => $formData['member_email'],
					'member_ic'           => $formData['member_ic'],
					'member_name'         => $formData['member_name'],
					'member_gender'       => $formData['member_gender'],
					'member_address'      => $formData['member_address']
				);
	
			$this->seat_model->update_data($columnToUpdate, $tableToUpdate, $usingCondition);

			$messageType = 'update';
			$this->seat_model->display_message( $messageType );
		}

		$this->load->view('member/profile', $data );
	}

	public function event () {

		$this->load->view('member/event');
	}

	public function viewEvent () {
		   
		/*$res = mysqli_connect("localhost","root",""); 
		mysqli_select_db("lambretta");   
		$conn = new SchedulerConnector($res);   
		$conn->render_table("events","event_id","event_date_start,event_date_end,event_description");*/

		$connector = new SchedulerConnector($this->db, "PHPCI");
		$connector->configure("events", "event_id", "start_date, end_date, text, event_description");
		$connector->event->attach($this);
		$connector->render();
	}

	public function joinEvent () {

		$event_id = $this->input->post( 'event_id' );
		$member_id = $this->session->userdata('user_id');
		
		$event = $this->checkExistJoinEvent( $event_id, true );

		if ( $event == 1 ) {

			$msg = 1; // already exist
		}
		else {
			$table = 'event_join';
			$arrayData = array(
				'event_id' => $event_id,
				'member_id' => $member_id
			);
			$id = $this->seat_model->insert_data($arrayData,$table);

			if ( $id ) {

				$msg = 2; // insert
			}
		}

		echo $msg;
	}

	public function checkExistJoinEvent ( $event_id = false, $ajaxRequest = false ) {

		$member_id = $this->session->userdata('user_id');
		$table = "event_join";

		if ( $event_id != false ) {
			$e = $event_id;
		}
		else {
			$e = $this->input->post( 'event_id' );
		}

		$where = array(
				'event_id' => $e,
				'member_id' => $member_id
			);
		$event = $this->seat_model->get_all_rows('event_join', $where );

		if ( count( $event ) > 0 ) {
			$msg = 1; //exist
		}
		else {
			$msg = 2; // not exist
		}

		if ( $ajaxRequest == true ) {
			return $msg;
		}else {
			echo $msg;
		}

		
		
	}
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */