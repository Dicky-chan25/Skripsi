<?php

class Siswa extends CI_Controller {
    public function index() {
        $data['siswa'] = $this->global_model->tampil_data('siswa')->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/siswa',$data);
        $this->load->view('templates_administrator/footer');
    }
    public function tambah_siswa() {
        $data['kelas'] = $this->global_model->tampil_data('kelas')->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/tambah_siswa', $data);
        $this->load->view('templates_administrator/footer');
    }
    public function proses_tambah_siswa() {
        $this->form_validation->set_rules('nama','Nama Siswa','required',['required'=>'Nama Siswa wajib diisi!']);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates_administrator/header');
            $this->load->view('templates_administrator/sidebar');
            $this->load->view('administrator/tambah_siswa');
            $this->load->view('templates_administrator/footer');
        } else {
            $foto = $_FILES['foto'];
            if ($foto != '') {
                $config['upload_path'] = './assets/foto';
                $config['allowed_types'] = 'jpg|png|jpeg|gif';
                $config['encrypt_name'] = TRUE;
                $config['remove_spaces'] = TRUE;
                $config['max_size'] = '1024';
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('foto')) {
                    $this->session->set_flashdata('sweetalert',
                        'Toast.fire({ icon: "error", title: "Gagal upload foto"}); window.history.back();'
                    );
                    redirect('administrator/siswa/tambah_siswa'); die();
                } else {
                    $foto = $this->upload->data('file_name');
                }
            }
            $formdata = array(
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'password' => md5($this->input->post('password')),
                'nisn' => $this->input->post('nisn'),
                'jk' => $this->input->post('jk'),
                'dob' => $this->input->post('dob'),
                'pob' => $this->input->post('pob'),
                'agama' => $this->input->post('agama'),
                'alamat' => $this->input->post('alamat'),
                'kelas_id' => $this->input->post('kelas_id'),
                'hp' => $this->input->post('hp'),
                'rt' => $this->input->post('rt'),
                'rw' => $this->input->post('rw'),
                'desa' => $this->input->post('desa'),
                'kecamatan' => $this->input->post('kecamatan'),
                'kabupaten' => $this->input->post('kabupaten'),
                'provinsi' => $this->input->post('provinsi'),
                'kodepos' => $this->input->post('kodepos'),
                'wali_murid' => $this->input->post('wali_murid'),
                'hp_wali_murid' => $this->input->post('hp_wali_murid'),
                'foto' => $foto
            );
            $input = $this->global_model->input_data('siswa', $formdata);
            if ($input == "berhasil") {
                $this->session->set_flashdata('sweetalert',
                    'Toast.fire({ icon: "success", title: "Berhasil menambah data siswa"})'
                );
                redirect('administrator/siswa');
            } else {
                $this->session->set_flashdata('sweetalert',
                    'Toast.fire({ icon: "error", title: "Gagal menambah data siswa"})'
                );
                $this->load->view('templates_administrator/header');
                $this->load->view('templates_administrator/sidebar');
                $this->load->view('administrator/tambah_siswa');
                $this->load->view('templates_administrator/footer');
            }
        }
    }
    
    public function update($id) {
        if ($id == '') {
            redirect('administrator/siswa');
        } else {
            $data['siswa'] = $this->global_model->get_detail('siswa', $id);
            $data['kelas'] = $this->global_model->tampil_data('kelas')->result();
        
            if(isset($data['siswa']['id'])) {
                $this->form_validation->set_rules('nama','Nama Siswa','required',['required'=>'Nama Siswa wajib diisi!']);
                if ($this->form_validation->run() == FALSE) {
                    $data['_view'] = 'administrator/edit_siswa';
                    $this->load->view('templates_administrator/header');
                    $this->load->view('templates_administrator/sidebar');
                    $this->load->view('administrator/edit_siswa', $data);
                    $this->load->view('templates_administrator/footer');
                } else {
                    $foto = $_FILES['foto'];
                    if ($foto['name'] != "") {
                        $config['upload_path'] = './assets/foto';
                        $config['allowed_types'] = 'jpg|png|jpeg|gif';
                        $config['encrypt_name'] = TRUE;
                        $config['remove_spaces'] = TRUE;
                        $config['max_size'] = '1024';
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('foto')) {
                            $this->session->set_flashdata('sweetalert',
                                'Toast.fire({ icon: "error", title: "Gagal upload foto"}); window.history.back();'
                            );
                            redirect('administrator/siswa/update/'.$id); die();
                        } else {
                            $foto = $this->upload->data('file_name');
                        }
                    } else {
                        $foto = '';
                    }
                    $formdata = array(
                        'nama' => $this->input->post('nama'),
                        'email' => $this->input->post('email'),
                        'password' => md5($this->input->post('password')),
                        'nisn' => $this->input->post('nisn'),
                        'jk' => $this->input->post('jk'),
                        'dob' => $this->input->post('dob'),
                        'pob' => $this->input->post('pob'),
                        'agama' => $this->input->post('agama'),
                        'alamat' => $this->input->post('alamat'),
                        'kelas_id' => $this->input->post('kelas_id'),
                        'hp' => $this->input->post('hp'),
                        'rt' => $this->input->post('rt'),
                        'rw' => $this->input->post('rw'),
                        'desa' => $this->input->post('desa'),
                        'kecamatan' => $this->input->post('kecamatan'),
                        'kabupaten' => $this->input->post('kabupaten'),
                        'provinsi' => $this->input->post('provinsi'),
                        'kodepos' => $this->input->post('kodepos'),
                        'wali_murid' => $this->input->post('wali_murid'),
                        'hp_wali_murid' => $this->input->post('hp_wali_murid'),
                    );
                    if ($foto != '') {
                        $formdata = array(
                            'nama' => $this->input->post('nama'),
                            'email' => $this->input->post('email'),
                            'password' => md5($this->input->post('password')),
                            'nisn' => $this->input->post('nisn'),
                            'jk' => $this->input->post('jk'),
                            'dob' => $this->input->post('dob'),
                            'pob' => $this->input->post('pob'),
                            'agama' => $this->input->post('agama'),
                            'alamat' => $this->input->post('alamat'),
                            'kelas_id' => $this->input->post('kelas_id'),
                            'hp' => $this->input->post('hp'),
                            'rt' => $this->input->post('rt'),
                            'rw' => $this->input->post('rw'),
                            'desa' => $this->input->post('desa'),
                            'kecamatan' => $this->input->post('kecamatan'),
                            'kabupaten' => $this->input->post('kabupaten'),
                            'provinsi' => $this->input->post('provinsi'),
                            'kodepos' => $this->input->post('kodepos'),
                            'wali_murid' => $this->input->post('wali_murid'),
                            'hp_wali_murid' => $this->input->post('hp_wali_murid'),
                            'foto' => $foto,
                        );
                    }
                    $input = $this->global_model->update_data('siswa', $id, $formdata);
                    if ($input == "berhasil") {
                        $this->session->set_flashdata('sweetalert',
                            'Toast.fire({ icon: "success", title: "Berhasil mengubah data siswa"})'
                        );
                        redirect('administrator/siswa');
                    } else {
                        $this->session->set_flashdata('sweetalert',
                            'Toast.fire({ icon: "error", title: "Gagal mengubah data siswa"})'
                        );
                        $this->load->view('templates_administrator/header');
                        $this->load->view('templates_administrator/sidebar');
                        $this->load->view('administrator/edit_siswa');
                        $this->load->view('templates_administrator/footer');
                    }
                }
            } else {
                redirect('administrator/siswa');
            }
        }
    }
    
    public function delete($id) {
        if ($id == '') {
            redirect('administrator/siswa');
        } else {
            $data['siswa'] = $this->global_model->get_detail('siswa', $id);
        
            if(isset($data['siswa']['id'])) {
                
                
                $ds = $this->global_model->get_detail('siswa', $id);
                if ($ds['foto'] != "default.jpg") {
                    $filename = explode(".", $ds['foto'])[0];
                    array_map('unlink', glob(FCPATH."./assets/foto/$filename.*"));
                    $this->global_model->delete_data('siswa', $id);
                } else {
                    $this->global_model->delete_data('siswa', $id);
                }

                $this->session->set_flashdata('sweetalert',
                    'Toast.fire({ icon: "success", title: "Berhasil menghapus data siswa"})'
                );
                redirect('administrator/siswa');
            } else {
                $this->session->set_flashdata('sweetalert',
                    'Toast.fire({ icon: "error", title: "Data tidak ditemukan"})'
                );
                redirect('administrator/siswa');
            }
        }
    }
}