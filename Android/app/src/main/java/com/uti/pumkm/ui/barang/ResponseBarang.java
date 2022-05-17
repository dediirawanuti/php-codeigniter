package com.uti.pumkm.ui.barang;

import android.view.Display;

import java.util.List;

public class ResponseBarang {
//    deklrasi variabel
    String pesan;
    List<ModelBarang> pelanggan;

//    buat method
//    untuk ambil response berisi "pesan"
    String getPesan() {
        return pesan;
    }

//    untuk ambil response tampil data
    List<ModelBarang> getPelanggan() {
        return pelanggan;
    }
}
