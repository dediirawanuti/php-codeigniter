package com.uti.pumkm.ui.barang;

import android.content.Context;
import android.support.annotation.NonNull;
import android.support.v7.widget.RecyclerView;
import android.view.Display;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import com.uti.pumkm.R;

import java.text.BreakIterator;
import java.text.StringCharacterIterator;
import java.util.List;

public class AdapterBarang extends RecyclerView.Adapter<AdapterBarang.ViewHolder> {

//    deklarasi variable
    Context context;
    List<ModelBarang> list;

//    buat konstruktor
    public AdapterBarang(Context ctx, List<ModelBarang> lst) {
//        isi nilai dari variabel
        this.context = ctx;
        this.list = lst;
    }

    @NonNull
    @Override
    public ViewHolder onCreateViewHolder(@NonNull ViewGroup viewGroup, int i) {
//        buat variabel
        View vw = LayoutInflater.from(viewGroup.getContext()).inflate(R.layout.content_barang, viewGroup, false);
        ViewHolder holder = new ViewHolder(vw);

        return holder;
    }

    @Override
    public void onBindViewHolder(@NonNull ViewHolder viewHolder, int i) {
//        deklarasi variabel class
        ModelBarang pelanggan = list.get(i);
//        definisi nilai dari komponen
        viewHolder.txt_kode.setText(pelanggan.getKode());
        viewHolder.txt_nama.setText(pelanggan.getNama());

    }

    @Override
    public int getItemCount() {

        return list.size();
    }

    public class ViewHolder extends RecyclerView.ViewHolder {
//        deklarasi variable komponen
//        diambil dari file "content_barang.xml"
        TextView txt_kode, txt_nama;

        public ViewHolder(@NonNull View itemView) {
            super(itemView);
//            definisi variabel komponen
            txt_kode = itemView.findViewById(R.id.txt_kode);
            txt_nama = itemView.findViewById(R.id.txt_nama);
        }
    }
}
