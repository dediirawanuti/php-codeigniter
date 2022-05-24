<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Data Pelanggan</title>

    <!-- buat Css internal -->
    <style>
        .area_tombol {
            display: flex;
            width: 100%;
            justify-content: center;
        }
        .btn_tambah {
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
        table {
            width: 100%;
            margin-top: 1em;
            border-collapse: collapse;
        }
        th {
            height: 40px;
            background: #E5EFC1;
            border: 1px solid #000000;
        }
        td {
            height: 30px;
            background: #FFFFFF;
            border: 1px solid #000000;
        }
        .kanan {
            text-align: right;
        }
        .tengah {
            text-align: center;
        }
        .area_aksi {
            display: flex;
            width: 100%;
            justify-content: center;
            flex-direction: column;
        }
        .btn_ubah {
            width: 96%;
            height: 35px;
            margin: 5px 2%;
            background: #FF0000;
            color: #FFFFFF;
            border-radius: 5px;
            border : 1px solid #FF0000;
            cursor : pointer;
        }
        .btn_hapus {
            width: 96%;
            height: 35px;
            margin: 0 2% 5px 2%;
            background: #39AEA9;
            color: #FFFFFF;
            border-radius: 5px;
            border : 1px solid #FFFFFF;
            cursor : pointer;
        }
    </style>
</head>
<body>
    
    <!-- area tombol -->
    <nav class="area_tombol">
        <!-- tombol tambah -->
        <button class="btn_tambah" onclick="tambah()">
            Tambah
        </button>
        <!-- tombol batal -->
        <button class="btn_batal" onclick="batal()">
            Batal
        </button>
    </nav>

    <!-- tabel -->
    <table>
        <tr>
            <th style="width: 10%;">Aksi</th>
            <th style="width: 20%;">Nama</th>
            <th style="width: 30%;">Alamat</th>
            <th style="width: 15%;">Telepon</th>
            <th style="width: 15%;">Email</th>
            <th style="width: 10%;">Username</th>
        </tr>


        <!-- looping data -->
        <?php
            foreach($pelanggan as $dt) {
        ?>
        <tr>
            <td class="tengah">
                <section class="area_aksi">
                    <button class="btn_ubah">
                        Ubah
                    </button>
                    <button class="btn_hapus" onclick="hapus('<?php echo $dt->nama; ?>', '<?php echo md5($dt->id); ?>')">
                        Hapus
                    </button>
                </section>
            </td>
            <td>
                <?php echo $dt->nama; ?>
            </td>
            <td>
                <?php echo $dt->alamat; ?>
            </td>
            <td class="tengah">
                <?php echo $dt->telepon; ?>
            </td>
            <td>
                <?php echo $dt->email; ?>
            </td>
            <td class="tengah">
                <?php echo $dt->username; ?>
            </td>
        </tr>
        <?php
            }
        ?>

    </table>

    <!-- fungsi java script -->
    <script>
        // fungsi batal
        function batal() {
            // alihkan ke halaman ini
            location.href="<?php echo site_url("pelanggan"); ?>"
        }

        // fungsi tambah
        function tambah() {
            // alihkan ke halaman ini
            location.href="<?php echo site_url("pelanggan/tambah"); ?>"
        }
        // fungsi hapus
        function hapus(nama, id) {
            if(confirm("Data "+nama+" Ingin Dihapus ?") == true) {
                // alert("Hapus Data");
                // alihkan ke halaman "Pelanggan" fungsi "hapus"
                location.href="<?php echo site_url("pelanggan/hapus"); ?>"+"/"+id;

            }
            // else {
            //     alert("Batal")
            // }
        }

    </script>

</body>
</html>