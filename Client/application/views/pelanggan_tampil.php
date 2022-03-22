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
            whidth: 150px;
            height: 40px;
            background: #FF0000;
            color: #FFFFFF;
            border-radius: 5px;
            margin-right: 5px;
            border : 1px solid #FF0000;
            cursor : pointer;
        }
        .btn_batal {
            whidth: 150px;
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
    </style>
</head>
<body>
    
    <!-- area tombol -->
    <nav class="area_tombol">
        <!-- tombol tambah -->
        <button class="btn_tambah">
            Tambah
        </button>
        <!-- tombol batal -->
        <button class="btn_batal">
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
        <tr>
            <td class="tengah">1</td>
            <td>1</td>
            <td>1</td>
            <td class="tengah">1</td>
            <td>1</td>
            <td class="tengah">1</td>
        </tr>


    </table>

</body>
</html>