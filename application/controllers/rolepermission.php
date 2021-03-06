<?php

/**
 This code belongs to Joash Gomba (The developer).
The code cannot be reproduced without the express written permission of the developer.
The code can only be changed, enhanced or modified for the sole purpose of adding features or customizing the eLogFrame system.
Contravention of any of the above stated rules will constitute a violation of copyright laws.
**/
class Rolepermission extends CI_Controller {

   function __construct()
   {
       parent::__construct();
       $this->load->model('rolepermissionmodel');
   }

   public function index()
   {
       if (!$this->erkanaauth->try_session_login()) {
       	redirect('login','refresh');
       }
       $data = array(
           'rows' => $this->db->get('rolepermission'),
       );
       $this->load->view('rolepermission/index', $data);
   }

   public function add()
   {
       if (!$this->erkanaauth->try_session_login()) {
       	redirect('login','refresh');
       }
       $data = array();
       $this->load->view('rolepermission/add',$data);
   }

   public function add_validate()
   {
       if (!$this->erkanaauth->try_session_login()) {
       	redirect('login','refresh');
       }
       $this->load->library('form_validation');
       $this->form_validation->set_rules('role', 'Role', 'trim|required');
       $this->form_validation->set_rules('permission', 'Permission', 'trim|required');
       if ($this->form_validation->run() == false) {
           $this->add();
       } else {
           $data = array(
               'role' => $this->input->post('role'),
               'permission' => $this->input->post('permission'),
           );
           $this->db->insert('rolepermission', $data);
           redirect('rolepermission','refresh');
       }
   }

   public function edit($id)
   {
       if (!$this->erkanaauth->try_session_login()) {
       	redirect('login','refresh');
       }
       if(!is_numeric($id)) {
       	redirect('rolepermission','refresh');
       }
       $row = $this->db->get_where('rolepermission', array('id' => $id))->row();
       if(empty($row)) {
       	redirect('rolepermission','refresh');
       }
       $data = array(
           'row' => $row,
       );
       $this->load->view('rolepermission/edit', $data);
   }

   public function edit_validate($id)
   {
       if (!$this->erkanaauth->try_session_login()) {
       	redirect('login','refresh');
       }
       $this->load->library('form_validation');
       $this->form_validation->set_rules('role', 'Role', 'trim|required');
       $this->form_validation->set_rules('permission', 'Permission', 'trim|required');
       if ($this->form_validation->run() == false) {
           $this->edit($id);
       } else {
           $data = array(
               'role' => $this->input->post('role'),
               'permission' => $this->input->post('permission'),
           );
           $this->db->where('id', $id);
           $this->db->update('rolepermission', $data);
           redirect('rolepermission','refresh');
       }
   }

   public function delete($id)
   {
       if (!$this->erkanaauth->try_session_login()) {
       	redirect('login','refresh');
       }
       if(!is_numeric($id)) {
       	redirect('rolepermission','refresh');
       }
       $this->db->delete('rolepermission', array('id' => $id));
       redirect('rolepermission','refresh');
   }

}
