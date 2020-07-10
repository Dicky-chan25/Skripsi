<?php

class Dashboard extends CI_Controller
{
    
    public function index() {
        if (count($this->session->userdata) != 1) {
            $data = $this->user_model->ambil_data($this->session->userdata['username']);
            $data = array (  
                'username' => $data->username, 
                'level' => $data->level,
            );
            $this->load->view('templates_administrator/header');
            $this->load->view('templates_administrator/sidebar');
            $this->load->view('administrator/dashboard',$data);
            $this->load->view('templates_administrator/footer');
        } else {
            $this->session->set_flashdata('pesan',
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Silahkan login terlebih dahulu.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            </div>');
            redirect('administrator/auth');
        }
    }
}