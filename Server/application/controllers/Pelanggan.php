<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// panggil library "Server"
require APPPATH."libraries/Server.php";

class Pelanggan extends Server {

    // public "get (baca data)"
	public function service_get() {
		// panggil file model (MPelanggan)
		$this->load->model("mpelanggan","mdl",TRUE);

		// tampilkan data
		// panggil fungsi "get_data"
		$hasil = $this->mdl->get_data();
		$this->response($hasil,200);
		// looping hasil
		foreach ($hasil as $data) {
			// $x = $data->y
			// x = variable
			// y = nama fiels pada tabel
			$id = $data->id;
			$kode = $data->kode;
			$nama = $data->nama;
			$alamat = $data->alamat;
			$telepon = $data->telepon;
			$email = $data->email;
			$username = $data->username;
			$password = $data->password;

			echo $kode;
		}

	}

	// public "delete (hapus data)"
	public function service_delete() {
		// panggil file model (MPelanggan)
		$this->load->model("mpelanggan","mdl",TRUE);
		// buat /ambil parameter untuk hapus data
		$id =$this->delete("id_plg");
		// panggil fungsi "set delete"
		$hasil = $this->mdl->set_delete($id);
		// jika hasil = "1"
		if($hasil == "1") {
			$this->response(array("status" => "1", "Pesan" => "Data Berhasil dihapus !"),200);
			
		}
		// jika hasil != "1"
		else {
			$this->response(array("status" => "0", "Pesan" => "Data Gagal dihapus !"),200);

		}


		// hapus data berdasarkan parameter "id"
		// $this->db->where("id",$id);
		// $hapus = $this->db->delete("tb_pelanggan");
		// // jika proses penghapusan
		// if ($hapus) {
		// 	$this->response(array("status" => "1", "Pesan" => "Data Berhasil dihapus !"),200);
		// }
		// // jika proses penghapusan gagal
		// else {
		// 	$this->response(array("status" => "0", "Pesan" => "Data Gagal dihapus !"),200);
		// }
		
	}

	// public "post (simpan data)"
	public function service_post() {
		
	}

	// public "put (update data)"
	public function service_put() {
		
	}

}

?>
