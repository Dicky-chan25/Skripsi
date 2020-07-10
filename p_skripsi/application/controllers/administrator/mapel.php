<?php

class Mapel extends CI_Controller
{
    public function index()
    {
        $data['mapel'] = $this->mapel_model->tampil_data('mapel')->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/mapel',$data);
        $this->load->view('templates_administrator/footer');
    }
    public function tambahmapel()
    {
        $data['mapel'] = $this->mapel_model->tampil_data('mapel');
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/mapel_form',$data);
        $this->load->view('templates_administrator/footer');
    }
    public function tambah_mapel_aksi()
    {
        $this->_rules();
        if($this->form_validation->run()==FALSE)
        {
            $this->tambahmapel();
        }else
        {
            $nama_mapel = $this->input->post('nama_mapel');
            $data = array (
                'nama_mapel' => $nama_mapel,
            );
            $this->mapel_model->insert_data($data,'mapel');
            $this->session->set_flashdata('pesan',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Mata Pelajaran Berhasil di Tambahkan!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          </div>');
            redirect('administrator/mapel');
        }
    }
    public function _rules()
    {
        $this->form_validation->set_rules('nama_mapel','nama mapel','required',['required' => 'Nama Mata Pelajaran Wajib Disis']);
    }
    public function update($id)
    {
        $where = array('id_mapel' => $id);
        $data['mapel']=$this->mapel_model->edit_data($where,'mapel')->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/mapel_update',$data);
        $this->load->view('templates_administrator/footer');
    }
    public function update_aksi()
    {
        $id= $this->input->post('id_mapel');
        $nama_mapel= $this->input->post('nama_mapel');

        $data= array(
            'nama_mapel' => $nama_mapel
        );
        $where = array(
            'id_mapel' => $id
        );
        $this->mapel_model->update_data($where,$data,'mapel');
        $this->session->set_flashdata('pesan',
        '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Mata Pelajaran Berhasil di Ubah!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
      </div>');
        redirect('administrator/mapel');
    }
    public function delete($id)
    {
        $where = array('id_mapel' => $id);
        $this->mapel_model->hapus_data($where,'mapel');
        $this->session->set_flashdata('pesan',
        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Data Mata Pelajaran Berhasil diHapus!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
      </div>');
        redirect('administrator/mapel');
    }
}