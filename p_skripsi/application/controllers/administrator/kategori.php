<?php

class Kategori extends CI_Controller
{
    public function index()
    {
        $data['kategori'] = $this->kategori_model->tampil_data()->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/kategori',$data);
        $this->load->view('templates_administrator/footer');
    }
    public function input()
    {
        $data = array(
            'id_jurusan' => set_value('id_jurusan'),
            'kode_jurusan' => set_value('kode_jurusan'),
            'nama_jurusan' => set_value('nama_jurusan'),
        );

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/jurusan_form',$data);
        $this->load->view('templates_administrator/footer');

    }

    public function input_aksi()
    {
        $this->_rules();

        if($this->form_validation->run()== FALSE)
        {
            $this->input();
        } else
        {
            $data = array(
                'kode_jurusan' => $this->input->post('kode_jurusan',TRUE),
                'nama_jurusan' => $this->input->post('nama_jurusan',TRUE),
            );
            $this->kategori_model->input_data($data);
            $this->session->set_flashdata('pesan',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Jurusan Berhasil di Tambahkan!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          </div>');
            redirect('administrator/kategori');
        }
    }
    public function _rules()
    {
        $this->form_validation->set_rules('kode_jurusan','kode_jurusan','required');
        $this->form_validation->set_rules('nama_jurusan','nama_jurusan','required');
    }
    public function update($id)
    {
        $where = array('id_jurusan' => $id);
        $data['kategori']=$this->kategori_model->edit_data($where,'kategori')->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/jurusan_update',$data);
        $this->load->view('templates_administrator/footer');
    }
    public function update_aksi()
    {
        $id= $this->input->post('id_jurusan');
        $kode_jurusan= $this->input->post('kode_jurusan');
        $nama_jurusan= $this->input->post('nama_jurusan');

        $data= array(
            'kode_jurusan' => $kode_jurusan,
            'nama_jurusan' => $nama_jurusan
        );
        $where = array(
            'id_jurusan' => $id
        );
        $this->kategori_model->update_data($where,$data,'kategori');
        $this->session->set_flashdata('pesan',
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Jurusan Berhasil di Ubah!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
      </div>');
        redirect('administrator/kategori');
    }
    public function delete($id)
    {
        $where = array('id_jurusan' => $id);
        $this->kategori_model->hapus_data($where,'kategori');
        $this->session->set_flashdata('pesan',
        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Data Jurusan Berhasil diHapus!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
      </div>');
        redirect('administrator/kategori');
    }
}

?>