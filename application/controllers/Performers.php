<?php
	class Performers extends CI_Controller {
		public function register (){
			$this->Session_model->session_index_page();
			$this->P_register_model->index();
		}
		public function register_attempt(){
			$this->Session_model->session_index_page();
			$this->P_register_model->register();
		}
		public function profile(){
			$this->Session_model->session_check();		
			$this->Session_model->user_type_check_performer();
			$templates['title'] = 'Profile';

			$this->load->view('inc/header-performer', $templates);
			$this->load->view('performer/profile');
			$this->load->view('inc/footer');
		}
		public function bookings(){
			$this->Session_model->session_check();		
			$this->Session_model->user_type_check_performer();

			$this->P_booking_model->index();
		}
		public function event_info (){
			$this->Session_model->session_check();
			$this->Session_model->user_type_check_performer();
			
			$this->P_package_model->get_event_info();
		}
		public function event_status_approve (){
			$this->Session_model->session_check();
			$this->Session_model->user_type_check_performer();
			
			$this->Event_model->event_status_approve();
		}
		public function event_status_decline (){
			$this->Session_model->session_check();
			$this->Session_model->user_type_check_performer();
			
			$this->Event_model->event_status_decline();
		}
		public function pricing(){
			$this->Session_model->session_check();		
			$this->Session_model->user_type_check_performer();
			
			$this->P_pricing_model->index();
		}
		public function pricing_validate(){
			$this->Session_model->session_check();
			$this->Session_model->user_type_check_performer();

			$this->P_pricing_model->pricing_validate();
		}
		public function package(){
			$this->Session_model->session_check();		
			$this->Session_model->user_type_check_performer();

			$this->P_package_model->index();
		}
		public function package_edit_page(){
			$this->Session_model->session_check();		
			$this->Session_model->user_type_check_performer();

			$this->P_package_model->package_edit_page();
		}
		public function package_update(){
			$this->Session_model->session_check();		
			$this->Session_model->user_type_check_performer();

			$this->P_package_model->package_update();
		}
		public function p_package_delete(){
			$this->Session_model->session_check();		
			$this->Session_model->user_type_check_performer();

			$this->P_package_model->p_package_delete();
		}
		public function package_info_page(){
			$this->Session_model->session_check();		
			$this->Session_model->user_type_check_performer();

			$this->P_package_model->package_info_page();
		}
		public function gallery(){
			$this->Session_model->session_check();		
			$this->Session_model->user_type_check_performer();

			$this->P_gallery_model->index();
		}
		public function chat(){
			$this->Session_model->session_check();		
			$this->Session_model->user_type_check_performer();

			$this->P_chat_model->index();
		}
		public function chat_message(){
			$this->Session_model->session_check();		
			$this->Session_model->user_type_check_performer();

			$this->P_chat_model->chat_message();
		}
		public function send_search_message (){
			$this->Session_model->session_check();		
			$this->Session_model->user_type_check_performer();

			$this->P_chat_model->send_search_message();			
		}
		public function file_check(){
			$allowed_mime_type_arr = array('image/gif','image/jpeg','image/pjpeg','image/png','image/x-png');
			$mime = get_mime_by_extension($_FILES['userfile']['name']);
			if(isset($_FILES['userfile']['name']) && $_FILES['userfile']['name']!=""){
				if($_FILES['userfile']['error'] != 0){
					$this->form_validation->set_message('file_check', 'Image File Exceed 2MB');
					return false;
				}
				// if($width > 5000 && $height > 5000){
				// 	$this->form_validation->set_message('file_check', 'Image Dimension Exceed 5000 x 5000');
				// 	return false;
				// }
				if(in_array($mime, $allowed_mime_type_arr)){
					return true;
				}else{
					$this->form_validation->set_message('file_check', 'Please select only gif/jpg/png file.');
					return false;
				}
			}else{
				$this->form_validation->set_message('file_check', 'Please choose a file image to upload.');
				return false;
			}
		}		
		public function file_check_group_photo(){
			$allowed_mime_type_arr = array('image/gif','image/jpeg','image/pjpeg','image/png','image/x-png');
			$mime = get_mime_by_extension($_FILES['userfile']['name']);
			if(isset($_FILES['userfile']['name']) && $_FILES['userfile']['name']!=""){
				if($_FILES['userfile']['error'] != 0){
					$this->form_validation->set_message('file_check_group_photo', 'Image File Exceed 2MB');
					return false;
				}
				// if($width > 5000 && $height > 5000){
				// 	$this->form_validation->set_message('file_check_group_photo', 'Image Dimension Exceed 5000 x 5000');
				// 	return false;
				// }
				if(in_array($mime, $allowed_mime_type_arr)){
					return true;
				}else{
					$this->form_validation->set_message('file_check_group_photo', 'Please select only gif/jpg/png file.');
					return false;
				}
			}else{
				$this->form_validation->set_message('file_check_group_photo', 'Please choose a file image to upload.');
				return false;
			}
		}		
		public function file_check_video_1(){
			$allowed_mime_type_arr = array('video/mp4');
			$mime = get_mime_by_extension($_FILES['video1']['name']);
			if(isset($_FILES['video1']['name']) && $_FILES['video1']['name']!=""){
				if($_FILES['video1']['error'] != 0){
					$this->form_validation->set_message('file_check_video_1', 'The video file is corrupted. Cannot proceed');
					return false;
				}
				if(in_array($mime, $allowed_mime_type_arr)){
					if($_FILES['video1']['size'] <= 200000000){
						return true;
					}else{
						$this->form_validation->set_message('file_check_video_1', 'Video file size exceed 200mb, please select another video.');
						return false;
					}
				}else{
					$this->form_validation->set_message('file_check_video_1', 'Please select only mp4 file.');
					return false;
				}
			}else{
				$this->form_validation->set_message('file_check_video_1', 'Please choose a video file.');
				return false;
			}
		}	
		public function file_check_video_2(){
			$allowed_mime_type_arr = array('video/mp4');
			$mime = get_mime_by_extension($_FILES['video2']['name']);
			if(isset($_FILES['video2']['name']) && $_FILES['video2']['name']!=""){
				if($_FILES['video2']['error'] != 0){
					$this->form_validation->set_message('file_check_video_2', 'The video file is corrupted. Cannot proceed');
					return false;
				}
				if(in_array($mime, $allowed_mime_type_arr)){
					if($_FILES['video2']['size'] <= 200000000){
						return true;
					}else{
						$this->form_validation->set_message('file_check_video_2', 'Video file size exceed 200mb, please select another video.');
						return false;
					}
				}else{
					$this->form_validation->set_message('file_check_video_2', 'Please select only mp4 file.');
					return false;
				}
			}else{
				$this->form_validation->set_message('file_check_video_2', 'Please choose a video file.');
				return false;
			}
		}	
		public function file_check_video_3(){
			$allowed_mime_type_arr = array('video/mp4');
			$mime = get_mime_by_extension($_FILES['video3']['name']);
			if(isset($_FILES['video3']['name']) && $_FILES['video3']['name']!=""){
				if($_FILES['video3']['error'] != 0){
					$this->form_validation->set_message('file_check_video_3', 'The video file is corrupted. Cannot proceed');
					return false;
				}
				if(in_array($mime, $allowed_mime_type_arr)){
					if($_FILES['video3']['size'] <= 200000000){
						return true;
					}else{
						$this->form_validation->set_message('file_check_video_3', 'Video file size exceed 200mb, please select another video.');
						return false;
					}
				}else{
					$this->form_validation->set_message('file_check_video_3', 'Please select only mp4 file.');
					return false;
				}
			}else{
				$this->form_validation->set_message('file_check_video_3', 'Please choose a video file.');
				return false;
			}
		}	
		function alpha_dash_space($str){
			if(!preg_match("/^([-a-z_. ])+$/i", $str)){
				$this->form_validation->set_message('alpha_dash_space', 'First name only accept letters');
				return FALSE;
			}else{
				return TRUE;
			}
		} 
		public function contact_number_duplicate_verification (){
			if($this->input->post('number2') == $this->input->post('number1')){
				$this->form_validation->set_message('contact_number_duplicate_verification', 'Duplicated Contact Number');
				return FALSE;
			}else{
				return TRUE;
			}
		}
	}