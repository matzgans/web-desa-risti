<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keterangan Kelahiran</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            margin: 0;
            padding: 0;
            background-color: #fff;
            text-align: justify;
            font-size: 16px;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            position: relative;
            text-align: center;
            line-height: 1.5;
        }

        .header .logo {
            position: absolute;
            top: 0;
            left: 0;
            z-index: 20;
        }

        .header .logo img {
            width: 80px;
            height: 80px;
        }

        .header h2 {
            font-size: 18px;
            text-transform: uppercase;
            margin: 0;
        }

        .header p {
            font-size: 13px;
            margin: 0;
        }

        /* Mengatur jarak antara gambar dan teks agar tidak bertumpuk */
        .header .header-text {
            padding-left: 0px;
            /* Beri padding kiri agar teks tidak menutupi gambar */
        }

        .content h3 {
            margin: 0px;
            margin-top: 5px;
            text-decoration: underline;
            text-align: center;
            font-size: 16px;
        }

        .content p {
            margin: 0px;
            text-align: center;
            font-size: 16px;
            margin-top: 4px;
            margin-bottom: 30px;
        }

        .content .table {
            margin-left: 30px;
            margin-top: 20px;
            margin-bottom: 20px;
        }



        .footer .table {
            margin-top: 30px;
            width: 55%;
            margin-left: 60%;
        }

        .footer .table .text-table {
            text-align: center;
            margin-right: 80px;
            font-size: 16px;
        }

        .footer .table .text-table .kepala-desa {
            font-weight: bold;
            margin: 0px;
        }

        .footer .table .text-table .nama-kepala-desa {
            font-weight: bold;
            margin: 0px;
            margin-top: 50;
            text-decoration: underline;
        }

        .footer .table .text-table .nip {
            margin: 0px;
        }
    </style>
</head>

<body>

    <div class="container">
        <!-- Header Section -->
        <div class="header">
            <div class="logo">
                <img src="../public/landing/images/logo-gorut.png" alt="Logo kabgor">
            </div>
            <div class="header-text">
                <h2>Pemerintah Kabupaten Gorontalo</h2>
                <h2>Kecamatan Bilato</h2>
                <h2>Desa Katialada</h2>
                <p>Jalan Trans Sulawesi No. 01 Desa Katialada Kecamatan Bilato, Kode Pos 96585</p>
            </div>
        </div>
        <hr>
        <div class="content">
            <h3>SURAT KETERANGAN KELAHIRAN</h3>
            <p>NOMOR : {{ $no_surat }}</p>

            <div class="text-pendahuluan">Yang bertanda tangan dibawah ini :</div>
            <div class="table">
                <table>
                    <tr>
                        <td style="padding-right: 50px">Nama Lengkap</td>
                        <td>:</td>
                        <td style="font-weight: bold;">{{ ucfirst($kepala_desa) }}</td>
                    </tr>
                    <tr>
                        <td style="padding-right: 50px">Jabatan</td>
                        <td>:</td>
                        <td>Kepala Desa</td>
                    </tr>
                    <tr>
                        <td style="padding-right: 50px">Alamat</td>
                        <td>:</td>
                        <td>Desa Katialada Kecamatan Bilato
                            Kab.Gorontalo
                        </td>
                    </tr>

                </table>

            </div>
            <div class="text-pendahuluan-lanjutan">Dengan Ini Menerangkan Bahwa
                pada :
            </div>
            <div class="table">
                <table>
                    <tr>
                        <td style="padding-right: 95px">Hari</td>
                        <td>:</td>
                        <td>{{ ucfirst($day) }}</td>
                    </tr>
                    <tr>
                        <td style="padding-right: 95px">Tanggal</td>
                        <td>:</td>
                        <td>{{ ucfirst($date) }}</td>
                    </tr>
                    <tr>
                        <td style="padding-right: 95px">Di</td>
                        <td>:</td>
                        <td>{{ ucfirst($place) }}
                        </td>
                    </tr>

                </table>
            </div>
            <div style="margin: 0%;">Telah lahir seorang anak Laki-Laki yang diberi
                nama :
            </div>
            <h2 style="text-align: center; margin: 0%;">{{ ucfirst($kid_name) }}</h2>
            <div style="margin: 0%;">Dari Seorang:
            </div>
            <div class="table">
                <table>
                    <tr>
                        <td style="padding-right: 95px">Ibu</td>
                        <td>:</td>
                        <td>{{ ucfirst($mothers_name) }}</td>
                    </tr>
                    <tr>
                        <td style="padding-right: 95px">Ayah</td>
                        <td>:</td>
                        <td>{{ ucfirst($fathers_name) }}</td>
                    </tr>
                    <tr>
                        <td style="padding-right: 95px">Alamat</td>
                        <td>:</td>
                        <td>{{ ucfirst($address) }}</td>
                    </tr>
                    <tr>
                        <td style="padding-right: 95px">Anak Ke</td>
                        <td>:</td>
                        <td>{{ ucfirst($kid_no) }}
                        </td>
                    </tr>

                </table>
            </div>
            <div class="text-pendahuluan-lanjutan">Demikian Surat Kelahiran ini dibuat atas dasar yang sebenarnya.
            </div>


        </div>
        <div class="footer">
            <div class="table">
                <table>
                    <tr>
                        <td>Dikeluarkan di</td>
                        <td>:</td>
                        <td>Katialada</td>
                    </tr>
                    <tr>
                        <td>Pada Tanggal</td>
                        <td>:</td>
                        <td>{{ date('d-m-Y') }}</td>
                    </tr>
                </table>

                <div class="text-table">
                    <p class="kepala-desa">Kepala Desa Katialada</p>
                    <p class="nama-kepala-desa">{{ ucfirst($kepala_desa) }}</p>
                    <p class="nip">NIP : 19791209 201001 1 003</p>
                </div>
            </div>
        </div>


    </div>

</body>

</html>
