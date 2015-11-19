<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once("./dhtmlx/connector/scheduler_connector.php");
require_once("./dhtmlx/connector/db_phpci.php");
DataProcessor::$action_param ="dhx_editor_status";

//require_once("assets/codebase/connector/scheduler_connector.php");

class Member extends CI_Controller {

	public function index () {
		$config['base_url'] = site_url('member/index');
        $config['total_rows'] = $this->db->count_all('articles');
        $config['per_page'] = "2";
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        //config for bootstrap pagination class integration
        $config['full_tag_open'] = '<ul class="pagination pull-right">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        //call the model function to get the department data
        $data['articles'] = $this->seat_model->get_article_list($config["per_page"], $data['page']);           
        //print_r($data['articles']);
        $data['pagination'] = $this->pagination->create_links();

        //load the department_view
        $this->load->view('member/listArticles',$data);
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
					'member_username'          => $formData['member_username'],
					'member_password'          => $formData['member_password'],
					'member_email'             => $formData['member_email'],
					'member_ic'                => $formData['member_ic'],
					'member_name'              => $formData['member_name'],
					'member_gender'            => $formData['member_gender'],
					'member_address'           => $formData['member_address'],
					'member_phone'             => $formData['member_phone'],
					'member_type_of_lambretta' => $formData['member_type_of_lambretta'],
					'member_plate_no'          => $formData['member_plate_no'],
					'member_married'           => $formData['member_married']
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

	public function myEvent () {

		/*$member_id = $this->session->userdata('user_id');
		$crud = new grocery_CRUD();		
        $state = $crud->getState();
        $data['page_header_title'] = ucfirst($this->uri->segment(2)) . " Management";
        $crud->set_table('event_join');
        $crud->where( 'member_id', $member_id );
        $crud->set_relation( 'event_id', 'events', '{text} {event_description}');
        //$crud->set_relation( 'event_id', 'events', 'textw');
       $crud->columns( 'event_description','text');
        $output = $crud->render();
        $output->data = $data;
        $this->load->view('CRUD', $output);*/

		$member_id = $this->session->userdata('user_id');
		$table     = 'event_join';
        $where = array(
        		'member_id' => $member_id
        	);
		$tableNameToJoin = array('events');
		$tableRelation   = array('event_join.event_id = events.event_id');
		$data['members'] = $this->seat_model->get_all_rows($table,$where, $tableNameToJoin, $tableRelation);
        $this->load->view('member/myEvent', $data, FALSE);
    

	}

	public function deleteEvent () {

		$event_join_id = $this->uri->segment(3);
		$table         = 'event_join';
        $where = array(
        		'event_join_id' => $event_join_id
        	);
		$this->seat_model->delete_data($table, $where);
		$messageType = 'delete';

		if ( $this->session->userdata('user_category') == "member" ) {
			$go = 'member/myEvent';
		}
		else {
			$go = 'admin/joinedEvent';
		}
		
		$this->seat_model->display_message( $messageType, $go);
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

	/*public function listArticles () {

		

		//pagination settings
        $config['base_url'] = site_url('member/listArticles');
        $config['total_rows'] = $this->db->count_all('articles');
        $config['per_page'] = "2";
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        //config for bootstrap pagination class integration
        $config['full_tag_open'] = '<ul class="pagination pull-right">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        //call the model function to get the department data
        $data['articles'] = $this->seat_model->get_article_list($config["per_page"], $data['page']);           
        //print_r($data['articles']);
        $data['pagination'] = $this->pagination->create_links();

        //load the department_view
        $this->load->view('member/listArticles',$data);
	}*/

	public function viewArticles () {
		$article_id = $this->uri->segment(3);
		$data['article'] = $this->seat_model->get_specified_row( 'articles', array('article_id' => $article_id));
		$this->load->view('member/viewArticles', $data);
	}
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */