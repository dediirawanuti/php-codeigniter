package com.uti.pumkm.ui.barang;

import static com.uti.pumkm.ui.barang.BarangFragment.APIPelanggan;

import android.app.ProgressDialog;
import android.os.Bundle;
import android.support.design.widget.TextInputEditText;
import android.support.v4.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import com.uti.pumkm.R;

import butterknife.BindView;
import butterknife.ButterKnife;
import retrofit2.Call;
import retrofit2.Retrofit;
import retrofit2.converter.gson.GsonConverterFactory;

/**
 * A simple {@link Fragment} subclass.
 * Use the {@link TambahBarangFragment#newInstance} factory method to
 * create an instance of this fragment.
 */
public class TambahBarangFragment extends Fragment {

//    deklarasi komponen
    @BindView(R.id.edt_nama) TextInputEditText nama;
    @BindView(R.id.edt_alamat) TextInputEditText alamat;
    @BindView(R.id.edt_telepon) TextInputEditText telepon;
    @BindView(R.id.edt_email) TextInputEditText email;
    @BindView(R.id.edt_username) TextInputEditText username;
    @BindView(R.id.edt_password) TextInputEditText password;

//    deklarasi variabel
    View  vw;

//    deklarasi konstanta API
    static final String APIPelanggan = "https://tisia.bppwlampung.com/Server/index.php/";

    // TODO: Rename parameter arguments, choose names that match
    // the fragment initialization parameters, e.g. ARG_ITEM_NUMBER
    private static final String ARG_PARAM1 = "param1";
    private static final String ARG_PARAM2 = "param2";

    // TODO: Rename and change types of parameters
    private String mParam1;
    private String mParam2;

    public TambahBarangFragment() {
        // Required empty public constructor
    }

    /**
     * Use this factory method to create a new instance of
     * this fragment using the provided parameters.
     *
     * @param param1 Parameter 1.
     * @param param2 Parameter 2.
     * @return A new instance of fragment TambahBarangFragment.
     */
    // TODO: Rename and change types and number of parameters
    public static TambahBarangFragment newInstance(String param1, String param2) {
        TambahBarangFragment fragment = new TambahBarangFragment();
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
        vw = inflater.inflate(R.layout.fragment_tambah_barang, container, false);

//        Butterknife
        ButterKnife.bind(this, vw);

//        Panggil Method Simpan_Pelanggan
        simpan_palanggan();

        return vw;
    }

//    Buat method void simpan_palanggan
    void simpan_palanggan() {
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
        Call<ResponseBarang> cl = br.simpan(nama.getText().toString(), alamat.getText().toString(), telepon.getText().toString(), email.getText().toString(), username.getText().toString(), password.getText().toString());

    }
}