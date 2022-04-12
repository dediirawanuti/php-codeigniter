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
		$this->load->model("mbarang","mdl",TRUE);
		
		$id = $this->delete("id_brg");

		$hasil = $this->mdl->get_delete($id);

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
		$this->load->model("mbarang","mdl",TRUE);

		$kode = $this->post("kode_brg");
		$nama = $this->post("nama_brg");
		$harga = $this->post("harga_brg");
		$satuan = $this->post("satuan_brg");
		$stok = $this->post("stok_brg");
		$foto = $this->post("foto");

		$hasil = $this->mdl->set_post($kode, $nama, $harga, $satuan, $stok, $foto);
		
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
		$this->load->model("mbarang","mdl",TRUE);

		$kode = $this->post("kode_brg");
		$nama = $this->post("nama_brg");
		$harga = $this->post("harga_brg");
		$satuan = $this->post("satuan_brg");
		$stok = $this->post("stok_brg");
		$foto = $this->post("foto");
		$id = $this->post("id_brg");

		$hasil = $this->mdl->set_post($kode, $nama, $harga, $satuan, $stok, $foto, $id);

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