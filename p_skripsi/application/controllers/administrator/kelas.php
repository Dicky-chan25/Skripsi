<?php

class Kelas extends CI_Controller {
    public function index() {
        $data['kelas'] = $this->global_model->tampil_data('kelas')->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/kelas',$data);
        $this->load->view('templates_administrator/footer');
    }
    public function tambah_kelas() {
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/tambah_kelas');
        $this->load->view('templates_administrator/footer');
    }
    public function proses_tambah_kelas() {
        $this->form_validation->set_rules('tingkat','Tingkat Kelas','required',['required'=>'Tingkat Kelas wajib diisi!']);
        $this->form_validation->set_rules('nama','Nama Kelas','required',['required'=>'Nama Kelas wajib diisi!']);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates_administrator/header');
            $this->load->view('templates_administrator/sidebar');
            $this->load->view('administrator/tambah_kelas');
            $this->load->view('templates_administrator/footer');
        } else {
            $formdata = array(
                'tingkat' => $this->input->post('tingkat'),
                'nama' => $this->input->post('nama')
            );
            $input = $this->global_model->input_data('kelas', $formdata);
            if ($input == "berhasil") {
                $this->session->set_flashdata('sweetalert',
                    'Toast.fire({ icon: "success", title: "Berhasil menambah data kelas"})'
                );
                redirect('administrator/kelas');
            } else {
                $this->session->set_flashdata('sweetalert',
                    'Toast.fire({ icon: "error", title: "Gagal menambah data kelas"})'
                );
                $this->load->view('templates_administrator/header');
                $this->load->view('templates_administrator/sidebar');
                $this->load->view('administrator/tambah_kelas');
                $this->load->view('templates_administrator/footer');
            }
        }
    }
    
    public function update($id) {
        if ($id == '') {
            redirect('administrator/kelas');
        } else {
            $data['kelas'] = $this->global_model->get_detail('kelas', $id);
        
            if(isset($data['kelas']['id'])) {
                $this->load->library('form_validation');

                $this->form_validation->set_rules('tingkat','Tingkat','required',['required'=>'Tingkat kelas wajib diisi!']);
                $this->form_validation->set_rules('nama','Nama','required',['required'=>'Nama Kelas wajib diisi!']);
            
                if($this->form_validation->run()) {   
                    $params = array(
                        'tingkat' => $this->input->post('tingkat'),
                        'nama' => $this->input->post('nama'),
                    );
                    $this->global_model->update_data('kelas', $id, $params);
                    $this->session->set_flashdata('sweetalert',
                        'Toast.fire({ icon: "success", title: "Berhasil mengubah data kelas"})'
                    );
                    redirect('administrator/kelas');
                } else {
                    $data['_view'] = 'administrator/edit_kelas';
                    $this->load->view('templates_administrator/header');
                    $this->load->view('templates_administrator/sidebar');
                    $this->load->view('administrator/edit_kelas', $data);
                    $this->load->view('templates_administrator/footer');
                }
            } else {
                redirect('administrator/kelas');
            }
        }
    }
    
    public function delete($id) {
        if ($id == '') {
            redirect('administrator/kelas');
        } else {
            $data['kelas'] = $this->global_model->get_detail('kelas', $id);
        
            if(isset($data['kelas']['id'])) {
                $this->global_model->delete_data('kelas', $id);
                $this->session->set_flashdata('sweetalert',
                    'Toast.fire({ icon: "success", title: "Berhasil menghapus data kelas"})'
                );
                redirect('administrator/kelas');
            } else {
                $this->session->set_flashdata('sweetalert',
                    'Toast.fire({ icon: "error", title: "Data tidak ditemukan"})'
                );
                redirect('administrator/kelas');
            }
        }
    }
}