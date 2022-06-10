<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

	
	public function index()
	{
		// Panggil helper "url (unutk direct halaman)"
		$this->load->helper(array("url"));
		
		// panggil library "client (untuk baca "service_get" dari server)"
		$this->load->library(array("client"));


		// Tampilkan data "pelanggan" dari "service_get" server
		$data["pelanggan"] = json_decode($this->client->simple_get(API_PELANGGAN));

		// foreach ($data["pelanggan"] as $dt) {
		// 	echo $dt->kode."<br>";
		// 	echo $dt->nama."<br>";
		// 	echo $dt->email."<br>";
		// 	echo $dt->username."<br>";
		// 	echo $dt->password."<br>";

		// }

		$this->load->view('pelanggan_tampil', $data);
	}

	function hapus() {
		// Panggil helper "url (unutk direct halaman)"
		$this->load->helper(array("url"));
		
		// panggil library "client (untuk baca "service_get" dari server)"
		$this->load->library(array("client"));

		// echo $this->uri->segment(3);
		
		// ambil nilai hashing "md5(id)"
		$id = $this->uri->segment(3);

		// proses pengiriman data ke "service_delete" pada server
		$hapus = json_decode($this->client->simple_delete(API_PELANGGAN, array("id_plg" => $id)));

		// redirect("pelanggan");
		// echo $hapus->pesan;

		// tampil alert
		echo "<script>
			alert('".$hapus->pesan."')
		</script>";

		// redirect halaman 
		echo "<script>
		location.href='".site_url("pelanggan")."'
		</script>";

	}

	function tambah() {
		// Panggil helper "url (unutk direct halaman)"
		$this->load->helper(array("url"));
		
		// panggil library "client (untuk baca "service_post" dari server)"
		$this->load->library(array("client"));

		// tampilkan halaman tambah pelanggan 
		$this->load->view('pelanggan_tambah');	

		// Tampilkan data "pelanggan" dari "service_post" Server
		// $data["pelanggan"] = json_decode($this->client->simple_post(API_PELANGGAN));

	}

	function simpan() {
		// Panggil helper "url (unutk direct halaman)"
		$this->load->helper(array("url"));
		
		// panggil library "client (untuk baca "service_post" dari server)"
		$this->load->library(array("client"));

		// buat array untuk membaca data
		$data = array(
			"nama_plg" => $this->input->post("nama_plg"), "alamat_plg" => $this->input->post("alamat_plg"), "telepon_plg" => $this->input->post("telepon_plg"), "email_plg" => $this->input->post("email_plg"), "username_plg" => $this->input->post("username_plg"),"password_plg" => $this->input->post("password_plg")
		);

		// proses pengiriman data ke "service_post" pada server
		$simpan = json_decode($this->client->simple_post(API_PELANGGAN, $data));

		// tampilkan output
		$hasil = "$simpan->pesan&bull;$simpan->status";
		echo $hasil;

	}

	// buat fungsi detail (untuk menampilkan data pelanggan berdasarkan data yang di tampilkan)
	function detail() {
		// Panggil helper "url (unutk direct halaman)"
		$this->load->helper(array("url"));
		
		// panggil library "client (untuk baca "service_get" dari server)"
		$this->load->library(array("client"));

		// ambil nilai hashing MD5(id)
		$id = $this->uri->segment(3);

		// gunakan fungsi "get" untuk ambil data
		$hasil = json_decode($this->client->simple_get(API_PELANGGAN, array("id_plg" => $id)));

		foreach($hasil AS $data) {
			$tampil["id"] = $data->id_plg;
			$tampil["kode"] = $data->kd_plg;
			$tampil["nama"] = $data->nm_plg;
			$tampil["telepon"] = $data->tl_plg;
			$tampil["alamat"] = $data->al_plg;
			$tampil["email"] = $data->em_plg;
			$tampil["username"] = $data->us_plg;
			$tampil["password"] = $data->pw_plg;
			$tampil["id_hash"] = $id;
		}
		$this->load->view('pelanggan_ubah', $tampil);
	}

	function ubah() {
		// Panggil helper "url (unutk direct halaman)"
		$this->load->helper(array("url"));
		
		// panggil library "client (untuk baca "service_get" dari server)"
		$this->load->library(array("client"));

		// buat array untuk membaca data
		$data = array(
			"nama_plg" => $this->input->post("nama_plg"), "alamat_plg" => $this->input->post("alamat_plg"), "telepon_plg" => $this->input->post("telepon_plg"), "email_plg" => $this->input->post("email_plg"), "username_plg" => $this->input->post("username_plg"), "password_plg" => $this->input->post("password_plg"), "id_plg" => $this->input->post("id_plg")
		);

		// proses pengiriman data ke "service_post" pada server
		$ubah = json_decode($this->client->simple_put(API_PELANGGAN, $data));

		// tampilkan output
		$hasil = "$ubah->pesan&bull;$ubah->status";
		echo $hasil;

	}
}
