<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MPelanggan extends CI_Model {

    // Fungsi Baca Data
    function get_data() {

        // tampilkan data pelanggan
        // urutkan berdasarkan "kode" secara "asc"
        $this->db->from("tb_pelanggan");
        $this->db->order_by("kode","asc");
        // eksekusi query
        $query = $this->db->get() ->result();
        
        // return (kirim nilai) variables "query"
        return $query;
    }

}

?>