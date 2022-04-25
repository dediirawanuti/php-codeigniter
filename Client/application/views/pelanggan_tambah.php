<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pelanggan</title>

    <!-- css internal -->
    <style>
        .area_tombol {
            display: flex;
            width: 100%;
            justify-content: center;
        }
        .btn_simpan {
            width: 150px;
            height: 40px;
            background: #FF0000;
            color: #FFFFFF;
            border-radius: 5px;
            margin-right: 5px;
            border : 1px solid #FF0000;
            cursor : pointer;
        }
        .btn_batal {
            width: 150px;
            height: 40px;
            background: #FF0000;
            color: #FFFFFF;
            border-radius: 5px;
            margin-left: 5px;
            border : 1px solid #FF0000;
            cursor : pointer;
        }
        .area_content {
            display: flex;
            width: 100%;
            flex-direction: column;
            margin-top: 2em;
        }
        .area_object {
            display: flex;
            width: 100%;
            flex-direction: column;
            margin-bottom: 5px;
        }
        .label_object {
            font: arial 1em;
            color: #333333;
            margin-bottom: 5px;
            width: 100%;
        }
        .input_object {
            font: Arial 1 em;
            color: #333333;
            margin-bottom: 10px;
            width: 10%;
            border-radius: 5px;
            border: 1px solid #999999;
        }
    </style>

</head>
<body>
    <!-- area tombol -->
    <nav class="area_tombol">
        <!-- tombol tambah -->
        <button class="btn_simpan" onclick="simpan()">
            Simpan
        </button>
        <!-- tombol batal -->
        <button class="btn_batal" onclick="batal()">
            Batal
        </button>
    </nav>
    <!-- area isi/content  -->
        <section class="area_object">
            <!-- Label Nama -->
            <section class="area_object">
                <label class="label_object" id="lbl_nama">
                    Nama Pelanggan :
                </label>
                <input class="input_object" type="text" id="txt_nama" maxlength="100">
            </section>
            <!-- Label Alamat -->
            <section class="area_object">
                <label class="label_object" id="lbl_alamat">
                    Alamat Pelanggan :
                </label>
                <input class="input_object" type="text" id="txt_alamat" maxlength="255">
            </section>
            <!-- Label Telepon -->
            <section class="area_object">
                <label class="label_object" id="lbl_telepon">
                    Telepon Pelanggan :
                </label>
                <input class="input_object" type="text" id="txt_teleppon" maxlength="13">
            </section>
            <!-- Label Email -->
            <section class="area_object">
                <label class="label_object" id="lbl_email">
                    Email Pelanggan :
                </label>
                <input class="input_object" type="email" id="txt_email" maxlength="255">
            </section>
            <!-- Label Username -->
            <section class="area_object">
                <label class="label_object" id="lbl_username">
                    Username Pelanggan :
                </label>
                <input class="input_object" type="text" id="txt_username" maxlength="50">
            </section>
            <!-- Label Password -->
            <section class="area_object">
                <label class="label_object" id="lbl_password">
                    Password Pelanggan :
                </label>
                <input class="input_object" type="password" id="txt_password">
            </section>

        </section>

        <!-- Ambil CDN jquery -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script>
            function batal() {
                // alihkan ke halaman "Pelamggan"
                location.href="<?php echo site_url("pelanggan")?>";

            }

            function simpan() {
                // $(".label_object").css("color","#FFCC00");
                // $(".label_object").css("font-size","24px");
                // $("#lbl_nama").html("Isi nama pelanggan");
                // $("#txt_nama").val("Ini Isininya pelanggan");

                // $("#lbl_nama").css("color","#FF0000");
                // $("#txt_nama").css("border","1px solid #FF0000");

                // jika "txt_nama" tidak diisi
                if ($("#txt_nama").val() == "") {
                    
                    $("#lbl_nama").css("color","#FF0000");
                    $("#txt_nama").css("border","1px solid #FF0000");
                    
                    // isi variable "act_nama" = 0
                    act_nama = 0;
                }
                // jika "txt_nama" diisi
                else {

                    // hapus semua "class" yang digunakan
                    // $("lbl_nama").removeClass();
                    // $("txt_nama").removeClass();

                    // set ke "default" class yang dipakai
                    // $("lbl_nama").addClass("label_object");
                    // $("txt_nama").addClass("input_object");

                    $("#lbl_nama").css("color","#333333");
                    $("#txt_nama").css("border","1px solid #333333");
                    // isi variable "act_nama" = 1
                    act_nama = 1;
                }
            }
        </script>
    
</body>
</html>