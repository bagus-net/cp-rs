@extends('layout.main')

@section('content')
    <section id="main-container" class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h3 class="column-title">Tentang Kami</h3>
                    <div class="row">
                        <div class="col">
                            <h5 class="">VISI</h5>
                            <p>Mewujudkan Masyarakat di wilayah Kerja Puskesmas Cerme yang Sehat dan Sejahtera</p>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <h5 class="">MISI</h5>
                            <ul>
                                <li>Meningkatkan kualitas pelayanan kesehatan ibu hamil, ibu bersalin, bayi baru lahir dan
                                    balita.</li>
                                <li>Meningkatkan kualitas pelayanan poli gizi, pemantauan status gizi masyarakat dan
                                    penanggulangan stunting.</li>
                                <li>Meningkatkan cakupan TB, HIV, Hipertensi, Diabetes Mellitus, Usia Produktif, dan
                                    pelayanan ODGJ Berat serta penyakit menular dan tidak menular lainnya.</li>
                                <li>Meningkatkan pemenuhan dan manajemen sarana, alat kesehatan, obat-obatan dan bahan habis
                                    pakai serta pemenuhan standar akreditasi puskesmas.</li>

                            </ul>
                        </div>
                    </div>

                </div>

                <div class="col-lg-6 mt-5 mt-lg-0">
                    <title>Jumlah SDM Tenaga Kesehatan di Puskesmas Cerme</title>
                    <style>
                        table {
                            width: 100%;
                            border-collapse: collapse;
                        }
                        th, td {
                            border: 1px solid #ddd;
                            padding: 8px;
                            text-align: left;
                        }
                        th {
                            background-color: #f2f2f2;
                        }
                    </style>
                </head>
                <body>
                    <h2>Jumlah SDM Tenaga Kesehatan di Puskesmas Cerme</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>JABATAN</th>
                                <th>JUMLAH SDM</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>DOKTER UMUM</td>
                                <td>3</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>DOKTER GIGI</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>APOTEKER</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>ASISTEN APOTEKER</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>PERAWAT</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>PERAWAT DI INDUK</td>
                                <td>21</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>PERAWAT DI PONKESDES & PUSTU</td>
                                <td>16</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>PERAWAT GIGI</td>
                                <td>2</td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>BIDAN</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>BIDAN DI INDUK</td>
                                <td>18</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>BIDAN DI PONKESDES & PUSTU</td>
                                <td>16</td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td>PENYULUH KESEHATAN MASYARAKAT</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>9</td>
                                <td>ANALIS LABORATORIUM</td>
                                <td>3</td>
                            </tr>
                            <tr>
                                <td>10</td>
                                <td>AHLI GIZI</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>11</td>
                                <td>SANITARIAN</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>12</td>
                                <td>REKAM MEDIS</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>13</td>
                                <td>PENGELOLA KEUANGAN</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>14</td>
                                <td>PENGELOLA PELAYANAN KESEHATAN</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>15</td>
                                <td>ADMINISTRASI</td>
                                <td>6</td>
                            </tr>
                            <tr>
                                <td>16</td>
                                <td>DRIVER AMBULANCE</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>17</td>
                                <td>PENJAGA MALAM</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>18</td>
                                <td>CLEANING SERVICE</td>
                                <td>3</td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align: right;">TOTAL</td>
                                <td>98</td>
                            </tr>
                        </tbody>
                    </table>
                </body>
                    {{-- <iframe width="560" height="315" src="https://www.youtube.com/embed/yfwblKqp7jg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe> --}}
                </div>

                <div class="col mt-4">
                    <h3 class="column-title">Tata Nilai</h3>
                    <div class="row">
                        <div class="col">
                            <p>Tata Nilai Puskesmas Cerme “APIK”</p>
                            <p>
                                <strong>
                                    1. Amanah
                                </strong> <br>
                                Amanah mempunyai arti bahwa semua upaya pelayanan kita kepada masyarakat harus dilaksanakan
                                sesuai tanggungjawab dan prosedur yang berlaku (melaksanakan tugas sesuai dengan
                                prosedur/SOP)
                            </p>
                            <p>
                                <strong>
                                    2. Profesionalisme
                                </strong> <br>
                                Profesional mempunyai arti memiliki kompetensi sesuai tugas pokok dan fungsinya/tupoksi
                                (kompetensi petugas)
                            </p>
                            <p>
                                <strong>
                                    3. Inovatif
                                </strong> <br>
                                Inovatif mempunyai arti kemampuan untuk mengeluarkan ide-ide yang kreatif untuk
                                mengembangkan dan meningkatkan mutu pelayanan Puskesmas (kegiatan inovasi Puskesmas)
                            </p>
                            <p>
                                <strong>
                                    4. Komunikatif
                                </strong> <br>
                                Komunikatif mempunyai arti bahwa semua kegiatan upaya Puskesmas harus selalu di
                                komunikasikan kepada masyarakat maupun pelanggan Puskesmas.
                            </p>

                            {{-- <p>
                            Selanjutnya pada tahun 2019 Rumah Sakit Graha Hermine Telah terakreditasi Madya dengan 16 Standar pelayanan dengan Keputusan komisi Akreditasi Rumah Sakit (KARS) No: KARS-SERT/593/V/2019 tanggal 20 Mei 2019.
                        </p> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h5 class="">Motto</h5>

                    <h7 class=""> <strong><em>Puskesmas Cerme <br> “ Pelayanan Terbaik dari Hati “</em></strong></h7>
                </div>
            </div>
            <div class="col mt-4">
                <h3 class="column-title">HAK & KEWAJIBAN PASIEN</h3>
                <div class="row">
                    <div class="col">
                        <h5 class="">Hak - Hak Pasien</h5>
                        <ul>
                            <li>Memperoleh layanan yang manusiawi, adil, jujur, dan tanpa diskriminasi.</li>
                            <li>Memperoleh layanan kesehatan yang bermutu sesuai dengan standar profesi dan standar prosedur
                                operasional.</li>
                            <li>Meminta konsultasi tentang penyakit yang dideritanya kepada Dokter, Dokter Gigi dan petugas
                                kesehatan lain yang mempunyai Surat Izin Praktik (SIP) di Puskesmas Cerme</li>
                            <li>Mendapatkan privasi dan kerahasiaan penyakit yang diderita termasuk data-data medisnya.</li>
                            <li>Mendapatkan informasi yang meliputi diagnosis dan tata cara tindakan medis, tujuan tindakan
                                medis, alternative tindakan, risiko dan komplikasi yang mungkin terjadi, dan prognosis
                                terhadap tindakan yang dilakukan serta perkiraan biaya pengobatan.</li>
                            <li>Memberikan persetujuan atau menolak atas tindakan yang akan dilakukan oleh Tenaga Kesehatan
                                terhadap penyakit yang dideritanya.</li>
                            <li>Didampingi keluarganya dalam keadaan kritis.</li>
                            <li>Menjalankan ibadah sesuai agama atau kepercayaan yang dianutnya selama hal tersebut tidak
                                mengganggu pasien lainnya</li>
                            <li>Memperoleh keamanan dan keselamatan dirinya selama dalam perawatan di Puskesmas Cerme.</li>
                            <li>Mengajukan usul, saran, perbaikan atas perlakuan Puskesmas Cerme terhadap dirinya.</li>
                            <li>Mendapatkan perlindungan atas rahasia kedokteran termasuk kerahasiaan rekam medik.</li>
                            <li>Memberikan persetujuan atau menolak untuk menjadi bagian dalam suatu penelitian kesehatan.
                            </li>
                            <li>Menyampaikan keluhan atau pengaduan atas pelayanan yang yamg tidak sesuai dengan standar
                                pelayanan melalui kotak saran yang tersedia, SMS atau telepon.</li>

                        </ul>

                        {{-- <p>
                            Selanjutnya pada tahun 2019 Rumah Sakit Graha Hermine Telah terakreditasi Madya dengan 16 Standar pelayanan dengan Keputusan komisi Akreditasi Rumah Sakit (KARS) No: KARS-SERT/593/V/2019 tanggal 20 Mei 2019.
                        </p> --}}

                    </div>
                </div>
            </div>


            <div class="col">
                <h5 class="">Kewajiban Pasien</h5>
                <ul>
                    <li>Mematuhi peraturan yang berlaku di Puskesmas Cerme.</li>
                    <li>Menggunakan fasilitas Puskesmas Cerme secara bertanggungjawab.</li>
                    <li>Menghormati hak-hak pasien lain, pengunjung, dan hak Tenaga Kesehatan serta petugas lainnya yang
                        bekerja di Puskesmas Cerme.</li>
                    <li>Memberikan informasi yang jujur, lengkap, dan akurat sesuai kemampuan dan pengetahuannya tentang
                        masalah kesehatannya.</li>
                    <li>Memberikan informasi mengenai jaminan kesehatan yang dimilikinya.</li>
                    <li>Mematuhi rencana terapi yang direkomendasikan oleh Tenaga Kesehatan di Puskesmas Cerme dan disetujui
                        oleh Pasien yang bersangkutan setelah mendapatkan penjelasan sesuai ketentuan peraturan perundang-
                        undangan.</li>
                    <li>Menerima segala konsekuensi atas keputusan pribadinya untuk menolak rencana terapi yang
                        direkomendasikan oleh Tenaga Kesehatan dan/atau tidak mematuhi petunjuk yang diberikan oleh Tenaga
                        Kesehatan dalam rangka penyembuhan penyakit atau masalah kesehatannya.</li>
                    <li>Memberikan imbalan jasa atas pelayanan yang diterima.</li>

                </ul>

                {{-- <p>
                            Selanjutnya pada tahun 2019 Rumah Sakit Graha Hermine Telah terakreditasi Madya dengan 16 Standar pelayanan dengan Keputusan komisi Akreditasi Rumah Sakit (KARS) No: KARS-SERT/593/V/2019 tanggal 20 Mei 2019.
                        </p> --}}

            </div>
        </div>
        </div>
        </div><!-- Content row end -->



        </div><!-- Container end -->
    </section><!-- Main container end -->
@endsection
