<?php

class Global_model extends CI_Model {
    public function get_detail($table, $id) {
        return $this->db->get_where($table, array('id' => $id))->row_array();
    }
    public function tampil_data($table) {
        return $this->db->get($table);
    }
    public function input_data($table, $data) {
        return $this->db->insert($table, $data);
        echo "berhasil";
    }
    public function update_data($table, $id, $params) {
        $this->db->where('id', $id);
        return $this->db->update($table, $params);
    }
    public function delete_data($table, $id) {
        return $this->db->delete($table, array('id' => $id));
    }
}