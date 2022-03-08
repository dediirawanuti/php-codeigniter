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
    function set_delete($id) {
        // hapus data berdasarkan parameter "id"
		$this->db->from("tb_pelanggan");
        $this->db->where("id",$id);
        $hasil = $this->db->get()->result();
        // jika "id" ditemukan
        if(count($hasil) == 1){
            $this->db->where("id",$id);
            $this->db->delete("tb_pelanggan");
            $status = "1";
        }
        // jika "id" tidak ditemukan
        else {
            $status = "0";
        }
        return $status;

		$hapus = $this->db->delete("tb_pelanggan");

    }

}

?>