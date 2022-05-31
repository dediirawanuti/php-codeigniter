package com.uti.pumkm.ui.barang;

import android.app.ProgressDialog;
import android.content.Context;
import android.os.Bundle;
import android.support.design.widget.Snackbar;
import android.support.v4.app.Fragment;
import android.support.v7.widget.DefaultItemAnimator;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;

import com.uti.pumkm.R;

import java.util.ArrayList;
import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;
import retrofit2.Retrofit;
import retrofit2.converter.gson.GsonConverterFactory;

/**
 * A simple {@link Fragment} subclass.
 * Use the {@link BarangFragment#newInstance} factory method to
 * create an instance of this fragment.
 */
public class BarangFragment extends Fragment {
//    deklarasi variabel view
    View vw;

//    deklarasi variabel komponen
    ImageView img_tambah;
    RecyclerView rcv_data;

//    deklarasi konstanta API
    static final String APIPelanggan = "https://tisia.bppwlampung.com/Server/index.php/Pelanggan";

//    deklarasi variabel List dan Array Adapter
    List<ModelBarang> list = new ArrayList<>();
    AdapterBarang adp;

    // TODO: Rename parameter arguments, choose names that match
    // the fragment initialization parameters, e.g. ARG_ITEM_NUMBER
    private static final String ARG_PARAM1 = "param1";
    private static final String ARG_PARAM2 = "param2";

    // TODO: Rename and change types of parameters
    private String mParam1;
    private String mParam2;

    public BarangFragment() {
        // Required empty public constructor
    }

    /**
     * Use this factory method to create a new instance of
     * this fragment using the provided parameters.
     *
     * @param param1 Parameter 1.
     * @param param2 Parameter 2.
     * @return A new instance of fragment BarangFragment.
     */
    // TODO: Rename and change types and number of parameters
    public static BarangFragment newInstance(String param1, String param2) {
        BarangFragment fragment = new BarangFragment();
        Bundle args = new Bundle();
        args.putString(ARG_PARAM1, param1);
        args.putString(ARG_PARAM2, param2);
        fragment.setArguments(args);
        return fragment;
    }

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        if (getArguments() != null) {
            mParam1 = getArguments().getString(ARG_PARAM1);
            mParam2 = getArguments().getString(ARG_PARAM2);
        }
    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
//        Buat variabel View
        vw = inflater.inflate(R.layout.fragment_barang, container, false);

//        definisi variabek komponen
        img_tambah = vw.findViewById(R.id.img_tambah);
        rcv_data = vw.findViewById(R.id.rcv_data);

//        definisi variabel List dan Array Adapter
        adp = new AdapterBarang(getContext(), list);

//        setup recycler view
        RecyclerView.LayoutManager rcv_layout = new LinearLayoutManager(getContext());
        rcv_data.setLayoutManager(rcv_layout);
        rcv_data.setItemAnimator(new DefaultItemAnimator());
        rcv_data.setAdapter(adp);

//        panggil method tampil pelanggan
        tampil_pelanggan();


//        baut event
        img_tambah.setOnClickListener(view -> {

        });

        rcv_data.setOnClickListener(view -> {

        });

        return vw;
    }

//    buat method tampil_pelanggan
    void tampil_pelanggan() {
//        deklarasi variable komponen "Progress Dialog"
        ProgressDialog pd;
//        setup progress dialog
        pd = new ProgressDialog(getContext());
//        progress dialog tidak dapat di cancel
        pd.setCancelable(false);
//        isi teks progress dialog
        pd.setMessage("Mohon Tunggu ...");
//        tampilkan progress dialog
        pd.show();

//        Menggunakan retrofit untuk pemanggilan data
//        definisi Retrofit
        Retrofit rf = new Retrofit.Builder().baseUrl(APIPelanggan).addConverterFactory(GsonConverterFactory.create()).build();
//        Panggil interface barang
        Barang br = rf.create(Barang.class);
//        Panggil method "tampil" dari interface "Barang"
        Call<ResponseBarang> cl = br.tampil();

//        dekripsikan isi variabel "cl"
        cl.enqueue(new Callback<ResponseBarang>() {
//            ketika data berhasil diambil
            @Override
            public void onResponse(Call<ResponseBarang> call, Response<ResponseBarang> response) {
//                tutup progress dialog
                pd.dismiss();
//                tampilkan data pelanggan ke dalam list
                list = response.body().getPelanggan();
//                mengisi data adapter dari list
                adp = new AdapterBarang(getActivity(), list);
//                tampilkan isi adapter ke dalam recyclerview
                rcv_data.setAdapter(adp);
            }
//            ketika data gagal diambil
            @Override
            public void onFailure(Call<ResponseBarang> call, Throwable t) {
//                hilangkan progress dialog
                pd.dismiss();
//                tampilkan pesan
                Snackbar.make(vw, "Data Gagal diambil !! Cek Koneksi Internet Anda !!", Snackbar.LENGTH_SHORT).show();
            }
        });

    }
}