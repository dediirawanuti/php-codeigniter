package com.uti.pumkm.ui.barang;

import retrofit2.Call;
import retrofit2.http.Field;
import retrofit2.http.FormUrlEncoded;
import retrofit2.http.GET;
import retrofit2.http.POST;

public interface Barang {
//    buat variabel
    String url = "Pelanggan";

    @FormUrlEncoded
//    Get data (REST API)
    @GET(url)
    Call<ResponseBarang> tampil();

//    Post data (REST API)
    @POST(url)
    Call<ResponseBarang> simpan(
            @Field("nama_plg") String Nama,
            @Field("alamat_plg") String Alamat,
            @Field("telepon_plg") String Telepon,
            @Field("email_plg") String Email,
            @Field("username_plg") String Username,
            @Field("password_plg") String Password
    );


}