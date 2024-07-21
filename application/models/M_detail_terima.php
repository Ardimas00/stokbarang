<?php
class M_detail_terima extends CI_Model {
    protected $_table = 'detail_terima';

    public function __construct() {
        parent::__construct();
    }

    public function tambah_batch($data) {
        // Perform batch insert into the database table
        // $data should be an array of arrays, each representing a row to be inserted
        return $this->db->insert_batch($this->_table, $data);
    }

    public function lihat_no_terima($no_terima) {
        return $this->db->get_where($this->_table, ['no_terima' => $no_terima])->result();
    }

    public function hapus($no_terima) {
        return $this->db->delete($this->_table, ['no_terima' => $no_terima]);
    }
}
