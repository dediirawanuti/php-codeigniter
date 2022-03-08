<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// panggil library "Server"
require APPPATH."libraries/Server.php";

class Barang extends Server {

    // public "get (baca data)"
	public function service_get() {
		// panggil file model (MPelanggan)
		$this->load->model("mbarang","mdl",TRUE);

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
			$harga = $data->$harga;
			$satuan = $data->$satuan;
			$stok = $data->$stok;
			$foto = $data->$foto;

			echo $kode;
		}

	}

	// public "delete (hapus data)"
	public function service_delete() {
		
	}

	// public "post (simpan data)"
	public function service_post() {
		
	}

	// public "put (update data)"
	public function service_put() {
		
	}

}


?>