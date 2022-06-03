package com.uti.pumkm.ui.barang;

import android.view.Display;

import java.util.List;

public class ResponseBarang {
//    deklrasi variabel
    String Pesan;
    List<ModelBarang> pelanggan;

//    buat method
//    untuk ambil response berisi "pesan"
    String getPesan() {
        return Pesan;
    }

//    untuk ambil response tampil data
    List<ModelBarang> getPelanggan() {
        return pelanggan;
    }
}
