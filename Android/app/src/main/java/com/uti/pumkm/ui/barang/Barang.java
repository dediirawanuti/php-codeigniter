package com.uti.pumkm.ui.barang;

import retrofit2.Call;
import retrofit2.http.FormUrlEncoded;
import retrofit2.http.GET;

public interface Barang {
//    buat variabel
    String url = "Pelanggan";

//    @FormUrlEncoded
//    Get data (REST API)
    @GET(url)
    Call<ResponseBarang> tampil();
}