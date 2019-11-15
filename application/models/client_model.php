<?php

    class Client_Model extends CI_Model {
        public function __construct(){
            $this->load->database();
        }       
        public function get_user_using_id1($id){
            $query = $this->db->get_where('users', array('user_id'=>$id));
            return $query->row_array();
        }
        public function get_users1(){
            $query= $this->db->get('users');
            return $query->result_array();
        }
        public function get_chats1(){
            $query= $this->db->get('chats');
            return $query->result_array();
        }
        public function get_name_only_users1(){
            $this->db->where('user_id !=', $this->session->userdata('user_id'));
            $this->db->select(array('user_id', 'fname', 'lname'));
            $query= $this->db->get('users');
            // echo $this->db->last_query();
            // die();
            return $query->result_array();            
        }
        public function send_message1(){
            $timestamp = date('Y-m-j H:i:s');
            $array = array(
                'id'=> null,
                'compose_from' => $this->session->userdata('user_id'),
                'send_to' => $this->input->post('userID'),
                'message' => $this->input->post('message'),
                'created_at'=> $timestamp,
                'updated_at'=> $timestamp
            );
            $query = $this->db->get_where('chats', array('send_to'=>$this->input->post('userID'), 'compose_from'=>$this->session->userdata('user_id'), 'created_at'=>$this->session->userdata('lastMessage'), 'message'=>$this->input->post('message')));
            $temp = $query->row_array();
            
// print_r($this->session->userdata());
// print_r($this->db->last_query());
// print_r($this->session->userdata());
// die;
            if($temp != NULL){
                return FALSE;
            }else{            
                $this->db->insert('chats', $array);
                $insert_id = $this->db->insert_id();
                
                $query2 = $this->db->get_where('chats', array('id'=>$insert_id));
                $temp = $query2->row_array();

                $this->session->unset_userdata('lastMessage');
                return $this->session->set_userdata('lastMessage', $temp['created_at']);
            }
        }
        public function get_user_data_and_chats1($id){
            
            // $query = $this->db->get_where('users', array('user_id'=>$id));
            // $data = $query->row_array();

                $data['user_chats'] = $this->get_user_chats($id);

                // return $data;

                echo '<pre>';
                print_r($data);
                echo '</pre>';
                die('here');

            // print_r($this->db->last_query());
        }
        public function get_users_chats1(){
            // chat_left_module
            $this->db->order_by('chats.created_at', 'DESC');
            $this->db->where('compose_from', $this->session->userdata('user_id'));
            $this->db->or_where('send_to', $this->session->userdata('user_id'));
            $this->db->group_by('send_to');
            $this->db->select('MAX(id) as id, users.*');
            $this->db->join('users', 'users.user_id = chats.send_to');
            $query = $this->db->get('chats');
            $data['user_data'] = $query->result_array();
            // print_r($this->db->last_query()); echo '<br>';

            $i = 0;
            foreach($data['user_data'] as $d){
                $this->db->select('MAX(id) as cid');
                $this->db->or_where(array('send_to'=>$this->session->userdata('user_id'), 'compose_from'=>$d['user_id']));
                $query = $this->db->get('chats');
                $temp = $query->row_array();
                $data['temp'][] = $temp;
                // print_r($this->db->last_query()); echo '<br>';


                $i++;
            }
            
            if(isset($data['temp'])){
                $i = 0;
                foreach($data['temp'] as $d){
                    $this->db->where('id', $d['cid']);
                    $query = $this->db->get('chats');
                    $temp = $query->row_array();
                    $data['user_message'][] = $temp;
                    $data['incoming_message_user_data'][] =  $this->get_user_using_id($data['user_message'][$i]['compose_from']);
                    echo $i++;
                    // print_r($this->db->last_query()); echo '<br>';
                }
            }


            return $data;

            // print_r($this->db->last_query());
            // echo '<pre>';
            // // print_r($data1);
            // print_r($data);
            // echo '</pre>';
            // die();
        }
        public function get_incoming_message1(){
            $this->db->where('send_to', $this->session->userdata('user_id'));
            $this->db->group_by('compose_from');
            $this->db->select('MAX(id) as id, users.*');
            $this->db->join('users', 'users.user_id = chats.compose_from');
            $query = $this->db->get('chats');
            $data['user_data'] = $query->result_array();
            // print_r($this->db->last_query());

            if($data['user_data'] != NULL){
                $i = 0;
                foreach($data['user_data'] as $d){
                    $this->db->select('MAX(id) as cid');
                    $this->db->or_where(array('send_to'=>$this->session->userdata('user_id'), 'compose_from'=>$d['user_id']));
                    $query = $this->db->get('chats');
                    $temp = $query->row_array();
                    $data['temp'][] = $temp;
                    $i++;
                    print_r($this->db->last_query());
                }
                
                if(isset($data['temp'])){
                    $i = 0;
                    foreach($data['temp'] as $d){
                        $this->db->where('id', $d['cid']);
                        $query = $this->db->get('chats');
                        $temp = $query->row_array();
                        $data['user_message'][] = $temp;
                        $i++;
                    }
                }
                return $data;
            }else{
                return false;
            }
            // print_r($this->db->last_query());
            // echo '<pre>';
            // echo $data['user_data'] != NULL;
            // print_r($data);
            // echo '</pre>';
            // die();
        }
        public function get_user_chats1($user_id){
            $this->db->order_by('created_at', 'ASC');
            $this->db->where(array('send_to'=>$user_id, 'compose_from'=>$this->session->userdata('user_id')));
            $this->db->or_where( array('compose_from'=>$user_id, 'send_to'=>$this->session->userdata('user_id')));
            $query = $this->db->get('chats');
            return $temp = $query->result_array();
            // echo '<pre>';
            // print_r($temp);
            // echo '</pre>';
            // die;
            
            // $query = $this->db->get_where('chats', array('compose_from'=>$user_id, 'send_to'=>$this->session->userdata('user_id')));
            // $return = $query->result_array();
            // echo '<pre>';
            // print_r($return);
            // echo '</pre>';

            // die;
        }
        public function get_recieve_user_chats1($user_id){
            // conversation
            $query = $this->db->get_where('chats', array('compose_from'=>$user_id, 'send_to'=>$this->session->userdata('user_id')));
            $return = $query->result_array();
            print_r($return);
            // die;
        }
        public function get_user_for_chat($user_id){
            $query = $this->db->get_where('users', array('user_id'=> $user_id));
            return $query->row_array();
        }
        public function validate_user_name_in_compose_search(){
            // validate name if it matched or not
            $userName = $this->input->post('userName');
            $userNameExplode = explode(", ",$this->input->post('userName'));
        //    print_r(count($userNameExplode) != 2);
        //     die();


            if($userName == NULL || count($userNameExplode) != 2){            
                return FALSE;
            }else{
                $query = $this->db->get_where('users', array('lname'=>$userNameExplode[0], 'fname'=>$userNameExplode[1]));
                $result = $query->row_array();
                if($result['lname'] != $userNameExplode[0] && $result['fname'] != $userNameExplode[1]){
                    return FALSE;
                }else{
                    return TRUE;
                }
            }
            // print_r($this->db->last_query());
        }
    }