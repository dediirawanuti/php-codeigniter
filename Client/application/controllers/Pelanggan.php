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
		$hapus = json_decode($this->client->simple_delete(API_PELANGGAN, array("$id_plg" => $id)));

		// redirect("pelanggan");

	}

	function tambah() {
		echo "ini halaman tambah pelanggan";
	}
}
