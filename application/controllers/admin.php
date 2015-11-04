<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
        

        public function index () {
		$this->load->view('admin/dashboard');
	}

	public function member () {

		$crud = new grocery_CRUD();
                $state = $crud->getState();
                $data['page_header_title'] = ucfirst($this->uri->segment(2)) . " Management";
                $crud->set_table('members');
                $output = $crud->render();
                $output->data = $data;
                $this->load->view('CRUD', $output);
	}

	public function event () {

		$crud = new grocery_CRUD();
                $state = $crud->getState();
                $data['page_header_title'] = ucfirst($this->uri->segment(2)) . " Management";
                $crud->set_table('events');
                $output = $crud->render();
                $output->data = $data;
                $this->load->view('CRUD', $output);
	}

        public function joinedEvent () {                        

                
                $table     = 'event_join';                
                $tableNameToJoin = array('events','members');
                $tableRelation   = array(
                        'event_join.event_id = events.event_id',
                        'event_join.member_id = members.member_id'
                        );
                $data['members'] = $this->seat_model->get_all_rows($table,$where = false, $tableNameToJoin, $tableRelation);
                $this->load->view('admin/joinedEvent', $data, FALSE);
    

        }

        public function articles () {

                $crud = new grocery_CRUD();
                $state = $crud->getState();
                $data['page_header_title'] = ucfirst($this->uri->segment(2)) . " Management";
                $crud->set_table('articles');
                $crud->set_field_upload('article_pic_title','assets/uploads/files');
                $crud->set_field_upload('article_file_1','assets/uploads/files');
                $crud->set_field_upload('article_file_2','assets/uploads/files');
                $output = $crud->render();
                $output->data = $data;
                $this->load->view('CRUD', $output);
        }



	
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */