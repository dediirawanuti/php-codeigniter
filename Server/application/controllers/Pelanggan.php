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
		// buat / ambil parameter untuk hapus data
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
		
	}

	// public "post (simpan data)"
	public function service_post() {
		// panggil file model (MPelanggan)
		$this->load->model("mpelanggan","mdl",TRUE);
		// buat / ambil parameter untuk simpan data
		$nama =$this->post("nama_plg");
		$alamat =$this->post("alamat_plg");
		$telepon =$this->post("telepon_plg");
		$email =$this->post("email_plg");
		$username =$this->post("username_plg");
		$password =$this->post("password_plg");

		// panggil fungsi "set post"
		$hasil = $this->mdl->set_post($nama,$alamat,$telepon,$email,$username,$password);

		// jika hasil = "1"
		if($hasil == "1") {
			$this->response(array("status" => "1", "Pesan" => "Data Berhasil disimpan !"),200);
			
		}
		// jika hasil != "1"
		else {
			$this->response(array("status" => "0", "Pesan" => "Data Gagal disimpan !"),200);

		}

	}

	// public "put (update data)"
	public function service_put() {
		// panggil file model (MPelanggan)
		$this->load->model("mpelanggan","mdl",TRUE);
		// buat / ambil parameter untuk update data
		$nama =$this->put("nama_plg");
		$alamat =$this->put("alamat_plg");
		$telepon =$this->put("telepon_plg");
		$email =$this->put("email_plg");
		$username =$this->put("username_plg");
		$password =$this->put("password_plg");
		$id = $this->put("id_plg");

		// panggil fungsi "set put"
		$hasil = $this->mdl->set_put($nama, $alamat, $telepon, $email, $username, $password, $id);

		// jika hasil = "1"
		if($hasil == "1") {
			$this->response(array("status" => "1", "Pesan" => "Data Berhasil Diubah !"),200);
			
		}
		// jika hasil != "1"
		else {
			$this->response(array("status" => "0", "Pesan" => "Data Gagal Diubah !"),200);

		}
	}

}

?>
