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
        $this->db->where("MD5(id)",$id);
        $hasil = $this->db->get()->result();
        // jika "id" ditemukan
        if(count($hasil) == 1){
            $this->db->where("MD5(id)",$id);
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
    function set_post($nama,$alamat,$telepon,$email,$username,$password) {
        // Cek data
        $this->db->from("tb_pelanggan");
        $this->db->where("telepon = '$telepon' OR email = '$email'");
        $hasil = $this->db->get()->result();
        // jika "id" tidak ditemukan
        if(count($hasil) == 0){
            // Buat id Otomatis
            // Ambil data Id terakhir
            $this->db->select("id");
            $this->db->from("tb_pelanggan");
            $this->db->order_by("id","DESC");
            $this->db->limit("1");

            // Ambil data id+1
            $id = $this->db->get()->row()->id+1;

            // Buat data otomatis
            date_default_timezone_set("Asia/Jakarta");
            $kode = "PLG".date("ymdHis");
            // Simpan Data Menggunakan Array
            $data = array("id" => $id, "kode" => $kode, "nama" => $nama, "alamat" => $alamat, "telepon" => $telepon, "email" => $email, "username" => $username, "password" => MD5($password));

            $this->db->insert("tb_pelanggan", $data);

            $status = "1";
        }
        // jika "id" ditemukan
        else {
            $status = "0";
        }
        return $status;
    }
    function set_put($nama,$alamat,$telepon,$email,$username,$password,$id) {
        // Cek data berdasarkan parameter "id"
        $this->db->select("id");
		$this->db->from("tb_pelanggan");
        $this->db->where("(telepon = '$telepon' OR email = '$email') AND MD5(id) != '$id'");
        $hasil = $this->db->get()->result();

        // jika "id" tidak ditemukan
        if(count($hasil) == 0){
            // Simpan Data Menggunakan Array
            $data = array("nama" => $nama, "alamat" => $alamat, "telepon" => $telepon, "email" => $email, "username" => $username, "password" => MD5($password));

            $this->db->where("MD5(id)",$id);
            $this->db->update("tb_pelanggan", $data);

            $status = "1";

        }
        // jika "id" ditemukan
        else {
            $status = "0";
        }
        return $status;

    }

}

?>