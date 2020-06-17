<?php

class Auth extends CI_Controller
{
    public function index ()
    {
        $this->load->view('templates_siswa/header');
        $this->load->view('siswa/login');
        $this->load->view('templates_siswa/footer');        
    }
    public function proses_login()
    {
        $this->form_validation->set_rules('username','username','required',['required'=>'Username wajib diisi!']);
        $this->form_validation->set_rules('password','password','required',['required'=>'Password wajib diisi!']);
        if($this->form_validation->run()==FALSE)
        {
        $this->load->view('templates_siswa/header');
        $this->load->view('siswa/login');
        $this->load->view('templates_siswa/footer'); 
        }else
        {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = $username;
            $pass = MD5($password);
            $cek = $this->login_admin_model->cek_login($user,$pass);
            if($cek->num_rows()>0)
            {
                foreach ($cek->result() as $ck)
                {
                    $sess_data['username']=$ck->username;
                    $sess_data['email']=$ck->email;
                    $sess_data['role_id']=$ck->role_id;

                    $this->session->set_userdata($sess_data);
                }
                if($sess_data['role_id']==3){
                    redirect('siswa/dashboard');
                }else
                {
                    $this->session->set_flashdata('pesan',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Mohon Maaf!</strong> Username atau Password yang Anda Masukan Salah.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  </div>');
                    redirect('siswa/auth');
                }
                
            }else
            {
                $this->session->set_flashdata('pesan',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Mohon Maaf!</strong> Username atau Password yang Anda Masukan Salah.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              </div>');
                redirect('siswa/auth');
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('menu_auth');
    }
}