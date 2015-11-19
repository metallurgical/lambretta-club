<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	// both admin and user
	// can login using this
	// function
	public function index () {

		$this->load->view('login');

		if ( $this->input->post() ) {

			$formData = $this->input->post();

			// member login
			$table = 'members';
			$where = array(
					'member_username' => $formData['member_username'],
					'member_password' => $formData['member_password']
				);
			$member = $this->seat_model->get_specified_row( $table, $where );

			if ( !empty( $member ) ) {

				$array = array(
					'user_id'       => $member['member_id'],
					'user_category' => 'member',
					'user_name'     => $member['member_name'],
					'user_username' => $member['member_username'],
					'user_email'    => $member['member_email'],
					'user_pic'		=> $member['member_profile_picture'],
					'user_created'  => $member['member_date_created']
				);				
				$this->session->set_userdata( $array );
				redirect('member');
			}
			else {

				// admin login
				$table = 'admin';
				$where = array(
						'admin_username' => $formData['member_username'],
						'admin_password' => $formData['member_password']
				);
				$admin = $this->seat_model->get_specified_row( $table, $where );

				if ( !empty( $admin ) ) {

					$array = array(
							'user_id'       => $admin['admin_id'],
							'user_category' => 'admin'
						);				
					$this->session->set_userdata( $array );
					redirect('admin/articles');
				}
				else {

					$messageType = 'login_failed';
					$this->seat_model->display_message( $messageType );
				}

				
			}
		}
	}

	public function register () {

		$this->load->view('register');

		if ( $this->input->post() ) {

			$formData = $this->input->post();
			$name     =$_FILES['member_pic']['name'];
			$size     =$_FILES['member_pic']['size'];
			$type     =$_FILES['member_pic']['type'];
			$tmp_name =$_FILES['member_pic']['tmp_name'];

			$config['upload_path'] = './assets/uploads/profile/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';	
			$this->load->library('upload', $config);
			$this->upload->do_upload( 'member_pic' );

			$table = 'members';
			$arrayData = array(
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
					'member_married'           => $formData['member_married'],
					'member_profile_picture'   => $name,
					'member_date_created'      => date('Y-m-d H:i:s')
				);
	
			
			$member_id = $this->seat_model->insert_data( $arrayData, $table );

			if ( $member_id ) {

				$messageType = 'register';
				$this->seat_model->display_message( $messageType );
			}
		}

	}

	public function logout () {
		$this->session->sess_destroy();
		redirect('login');
	}
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */