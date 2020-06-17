<?php

class Dashboard extends CI_Controller
{
    public function __construct()
    {
      parent::__construct();

        if (!isset($this->session->userdata['username']))
        {
            $this->session->set_flashdata('pesan',
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Anda Belum Login!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          </div>');
            redirect('menu_auth');
        }
    }
    public function index()
    {
        $data = $this->user_model->ambil_data($this->session->userdata['username']);
        $data = array(  'username' => $data->username, 
                        'role_id' => $data->role_id,
                    );

        $this->load->view('templates_siswa/header');
        $this->load->view('templates_siswa/sidebar');
        $this->load->view('siswa/dashboard',$data);
        $this->load->view('templates_siswa/footer');
    }
}