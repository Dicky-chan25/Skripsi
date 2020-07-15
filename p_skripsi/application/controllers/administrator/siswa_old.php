<?php

class Siswa extends CI_Controller
{
    public function index()
    {
        $data['data_siswa'] = $this->siswa_model->tampil_data('data_siswa')->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/siswa',$data);
        $this->load->view('templates_administrator/footer');
    }
    public function detail($id)
    {
        $data['data_siswa'] = $this->siswa_model->tampil_data('data_siswa')->result();
        $data['detail'] = $this->siswa_model->ambil_id_siswa($id);
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/siswa_detail',$data);
        $this->load->view('templates_administrator/footer');
    }
    public function tambah_siswa()
    {
        $data['data_siswa'] = $this->siswa_model->tampil_data('data_siswa')->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/siswa_form',$data);
        $this->load->view('templates_administrator/footer');
    }
    public function tambah_siswa_aksi()
    {
        $this->_rules();
        if ($this->form_validation->run()== FALSE)
        {
            $this->tambah_siswa();
        }else 
        {
            $name           = $this->input->post('name');
            $email          = $this->input->post('email');
            $nisn           = $this->input->post('nisn');
            $kelamin        = $this->input->post('kelamin');
            $tempat_lahir   = $this->input->post('tempat_lahir');
            $tanggal_lahir  = $this->input->post('tanggal_lahir');
            $agama          = $this->input->post('agama');
            $alamat         = $this->input->post('alamat');
            $image          = $_FILES['image'];
            if ($image=''){}else
            {
                $config['upload_path'] = './assets/img/siswa';
                $config['allowed_types'] = 'jpg|png|gif|tiff';

                $this->load->library('upload',$config);
                if(!$this->upload->do_upload('image'))
                {
                    echo "Gagal Upload"; die();
                }else
                {
                    $image=$this->upload->data('file_name');
                }
            }
            $data = array(
                'name'          => $name,
                'email'         => $email,
                'nisn'          => $nisn,
                'kelamin'       => $kelamin,
                'tempat_lahir'  => $tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'agama'         => $agama,
                'alamat'        => $alamat,
                'image'         => $image
            );

            $this->siswa_model->insert_data($data,'data_siswa');
            $this->session->set_flashdata('pesan',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Siswa Berhasil di Tambahkan!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          </div>');
            redirect('administrator/siswa');
        }
    }
    public function _rules()
    {
        $this->form_validation->set_rules('name','Name','required',                     ['required'=> 'Nama wajib diisi']);
        $this->form_validation->set_rules('email','Email','required',                   ['required'=> 'Email wajib diisi']);
        $this->form_validation->set_rules('nisn','Nisn','required',                     ['required'=> 'NISN wajib diisi']);
        $this->form_validation->set_rules('kelamin','Jenis Kelamin','required',         ['required'=> 'Jenis Kelamin wajib diisi']);
        $this->form_validation->set_rules('tempat_lahir','Tempat Lahir','required',     ['required'=> 'Tempat Lahir wajib diisi']);
        $this->form_validation->set_rules('tanggal_lahir','Tanggal Lahir','required',   ['required'=> 'Tanggal Lahir wajib diisi']);
        $this->form_validation->set_rules('agama','Agama','required',                   ['required'=> 'Agama wajib diisi']);
        $this->form_validation->set_rules('alamat','Alamat','required',                 ['required'=> 'Alamat wajib diisi']);
    }
    public function update($id)
    {
        $where = array('id_siswa' => $id);
        $data['data_siswa']=$this->siswa_model->edit_data($where,'data_siswa')->result();
        $data['detail'] = $this->siswa_model->ambil_id_siswa($id);
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/siswa_update',$data);
        $this->load->view('templates_administrator/footer');
    }
    public function update_aksi()
    {
        $this->_rules();
        if($this->form_validation->run() == FALSE)
        {
            $this->update();
        }else
        {
        $id             = $this->input->post('id_siswa');
        $name           = $this->input->post('name');
        $email          = $this->input->post('email');
        $password       = $this->input->post('password');
        $nisn           = $this->input->post('nisn');
        $kelamin        = $this->input->post('kelamin');
        $tempat_lahir   = $this->input->post('tempat_lahir');
        $tanggal_lahir  = $this->input->post('tanggal_lahir');
        $agama          = $this->input->post('agama');
        $alamat         = $this->input->post('alamat');
        $kelas          = $this->input->post('kelas');
        $hp             = $this->input->post('hp');
        $rtrw           = $this->input->post('rtrw');
        $kel            = $this->input->post('kel');
        $kec            = $this->input->post('kec');
        $kab            = $this->input->post('kab');
        $prov           = $this->input->post('prov');
        $kode_p         = $this->input->post('kode_p');
        $wali_murid     = $this->input->post('wali_murid');
        $hp_wali_murid  = $this->input->post('hp_wali_murid');
        $image          = $_FILES['userfile']['name'];
        if ($image)
            {
                $config['upload_path'] = './assets/img/siswa';
                $config['allowed_types'] = 'jpg|png|gif|tiff';

                $this->load->library('upload',$config);

                if($this->upload->do_upload('userfile'))
                {
                    $userfile = $this->upload->data('file_name');
                    $this->db->set('image', $userfile);
                }else
                {
                    echo "Gagal Upload"; die();
                }
            }
            $data = array(
                'name'          => $name,
                'email'         => $email,
                'password'      => $password,
                'nisn'          => $nisn,
                'kelamin'       => $kelamin,
                'tempat_lahir'  => $tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'agama'         => $agama,
                'alamat'        => $alamat,
                'kelas'         => $kelas, 
                'hp'            => $hp,
                'rtrw'          => $rtrw,
                'kel'           => $kel,
                'kec'           => $kec,
                'kab'           => $kab,
                'prov'          => $prov,
                'kode_p'        => $kode_p,
                'wali_murid'    => $wali_murid,
                'hp_wali_murid' => $hp_wali_murid
            );
            $where = array(
                'id_siswa' => $id
            );

            $this->siswa_model->update_data($where,$data,'data_siswa');
            $this->session->set_flashdata('pesan',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Siswa Berhasil di Ubah!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          </div>');
            redirect('administrator/siswa');
        }
    }
    public function delete($id)
    {
        $where = array('id_siswa' => $id);
        $this->siswa_model->hapus_data($where,'data_siswa');
        $this->session->set_flashdata('pesan',
        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Data Siswa Berhasil diHapus!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
      </div>');
        redirect('administrator/siswa');
    }

}