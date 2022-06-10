<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Pelanggan</title>

    <!-- css internal -->
    <style>
        .area_tombol {
            display: flex;
            width: 100%;
            justify-content: center;
        }
        .btn_ubah {
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
        <button class="btn_ubah" onclick="ubah()">
            Ubah
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
                <span style="display : none" id ="err_nama"></span>
            </section>
            <!-- Label Alamat -->
            <section class="area_object">
                <label class="label_object" id="lbl_alamat">
                    Alamat Pelanggan :
                </label>
                <input class="input_object" type="text" id="txt_alamat" maxlength="255">
                <span style="display : none" id ="err_alamat"></span>
            </section>
            <!-- Label Telepon -->
            <section class="area_object">
                <label class="label_object" id="lbl_telepon">
                    Telepon Pelanggan :
                </label>
                <input class="input_object" type="text" id="txt_telepon" maxlength="13">
                <span style="display : none" id ="err_telepon"></span>
            </section>
            <!-- Label Email -->
            <section class="area_object">
                <label class="label_object" id="lbl_email">
                    Email Pelanggan :
                </label>
                <input class="input_object" type="email" id="txt_email" maxlength="255">
                <span style="display : none" id ="err_email"></span>
            </section>
            <!-- Label Username -->
            <section class="area_object">
                <label class="label_object" id="lbl_username">
                    Username Pelanggan :
                </label>
                <input class="input_object" type="text" id="txt_username" maxlength="50">
                <span style="display : none" id ="err_username"></span>
            </section>
            <!-- Label Password -->
            <section class="area_object">
                <label class="label_object" id="lbl_password">
                    Password Pelanggan :
                </label>
                <input class="input_object" type="password" id="txt_password">
                <span style="display : none" id ="err_password"></span>
            </section>

        </section>

        <!-- Ambil CDN jquery -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script>
            // variabel warna
            let merah = "#FF0000";
            let abu = "#333333";
            let id;

            // fungsi yang dijalankan pada saat halaman di load
            $(function () {
                id = '<?php echo $id_hash; ?>';

                // tampilkan isi "array" ke dalam komponen
                $("#txt_nama").val('<?php echo $nama ?>');
                $("#txt_telepon").val('<?php echo $telepon ?>');
                $("#txt_alamat").val('<?php echo $alamat ?>');
                $("#txt_email").val('<?php echo $email ?>');
                $("#txt_username").val('<?php echo $username ?>');
                $("#txt_password").val('<?php echo $password ?>');

            })

            function batal() {
                // alihkan ke halaman "Pelamggan"
                location.href="<?php echo site_url("pelanggan")?>";

            }

            function ubah() {
                // $(".label_object").css("color","#FFCC00");
                // $(".label_object").css("font-size","24px");
                // $("#lbl_nama").html("Isi nama pelanggan");
                // $("#txt_nama").val("Ini Isininya pelanggan");

                // $("#lbl_nama").css("color","#FF0000");
                // $("#txt_nama").css("border","1px solid #FF0000");

                // jika "txt_nama" tidak diisi
                if ($("#txt_nama").val() == "") {
                    
                    $("#lbl_nama").css("color", merah);
                    $("#txt_nama").css("border","1px solid "+merah);
                    
                    // tampilkan pesan error
                    $("#err_nama").show();
                    $("#err_nama").html("Nama harus diisi !");
                    $("#err_nama").css("color", merah);

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

                    $("#lbl_nama").css("color", abu);
                    $("#txt_nama").css("border","1px solid "+abu);

                    // hilangkan pesan error
                    $("#err_nama").hide();

                    // isi variable "act_nama" = 1
                    act_nama = 1;
                }

                // jika "txt_alamat" tidak diisi
                if($("#txt_alamat").val() == "") {
                    
                    $("#lbl_alamat").css("color", merah);
                    $("#txt_alamat").css("border", "1 px solid "+merah);

                    // tampilkan pesan error
                    $("#err_alamat").show();
                    $("#err_alamat").html("Alamat Harus Diisi !");
                    $("#err_alamat").css("color", merah);

                    // isi variabel "act_alamat"
                    act_alamat = 0;
                }
                else {

                    $("#lbl_alamat").css("color", abu);
                    $("#txt_alamat").css("border", "1px solid "+abu);

                    // hilangkan pesan error
                    $("#err_alamat").hide();

                    // isi variabel "act_alamat"
                    act_alamat = 1;
                }

                // jika "txt_telepon" tidak diisi
                if($("#txt_telepon").val() == "") {
                    
                    $("#lbl_telepon").css("color", merah);
                    $("#txt_telepon").css("border", "1 px solid "+merah);

                    // tampilkan pesan error
                    $("#err_telepon").show();
                    $("#err_telepon").html("Telepon Harus Diisi !");
                    $("#err_telepon").css("color", merah);

                    // isi variabel "act_telepon"
                    act_telepon = 0;
                }
                else {

                    $("#lbl_telepon").css("color", abu);
                    $("#txt_telepon").css("border", "1px solid "+abu);

                    // hilangkan pesan error
                    $("#err_telepon").hide();

                    // isi variabel "act_telepon"
                    act_telepon = 1;
                }

                // jika "txt_email" tidak diisi
                if($("#txt_email").val() == "") {
                    
                    $("#lbl_email").css("color", merah);
                    $("#txt_email").css("border", "1 px solid "+merah);

                    // tampilkan pesan error
                    $("#err_email").show();
                    $("#err_email").html("Email Harus Diisi !");
                    $("#err_email").css("color", merah);

                    // isi variabel "act_email"
                    act_email = 0;
                }
                else {

                    $("#lbl_email").css("color", abu);
                    $("#txt_email").css("border", "1px solid "+abu);

                    // hilangkan pesan error
                    $("#err_email").hide();

                    // isi variabel "act_email"
                    act_email = 1;
                }

                // jika "txt_username" tidak diisi
                if($("#txt_username").val() == "") {
                    
                    $("#lbl_username").css("color", merah);
                    $("#txt_username").css("border", "1 px solid "+merah);

                    // tampilkan pesan error
                    $("#err_username").show();
                    $("#err_username").html("username Harus Diisi !");
                    $("#err_username").css("color", merah);

                    // isi variabel "act_username"
                    act_username = 0;
                }
                else {

                    $("#lbl_username").css("color", abu);
                    $("#txt_username").css("border", "1px solid "+abu);

                    // hilangkan pesan error
                    $("#err_username").hide();

                    // isi variabel "act_username"
                    act_username = 1;
                }
                // jika "txt_password" tidak diisi
                if($("#txt_password").val() == "") {
                    
                    $("#lbl_password").css("color", merah);
                    $("#txt_password").css("border", "1 px solid "+merah);

                    // tampilkan pesan error
                    $("#err_password").show();
                    $("#err_password").html("password Harus Diisi !");
                    $("#err_password").css("color", merah);

                    // isi variabel "act_password"
                    act_password = 0;
                }
                else {

                    $("#lbl_password").css("color", abu);
                    $("#txt_password").css("border", "1px solid "+abu);

                    // hilangkan pesan error
                    $("#err_password").hide();

                    // isi variabel "act_password"
                    act_password = 1;
                }

                // jika seluruh komponen terisi
                if (act_nama == 1 && act_alamat == 1 && act_telepon == 1 && act_email == 1 && act_username == 1 && act_password == 1) {
                    
                    // proses penyimpanan data pelanggan dengan AJAX 
                    $.ajax({
                        type: "POST",
                        url: "<?php echo site_url("Pelanggan/ubah"); ?>",
                        data: "nama_plg="+$("#txt_nama").val()+"&alamat_plg="+$("#txt_alamat").val()+"&telepon_plg="+$("#txt_telepon").val()+"&email_plg="+$("#txt_email").val()+"&username_plg="+$("#txt_username").val()+"&password_plg="+$("#txt_password").val()+"&id_plg="+id,

                        success: function (response) {

                            // buat variabel untuk ambil array response
                            let str = response.split("&bull;");
                            
                            alert(str[0]);

                            // jika str[1] bernilai = 1 (berhasil disimpan)
                            if(str[1] == "1") {
                                
                            // redirect ke halaman "pelanggan_tampil"
                            location.href="<?php echo site_url("Pelanggan") ?>";
                            }
                        }
                    });

                }
            }
        </script>
    
</body>
</html>