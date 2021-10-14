<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta content="en-us" http-equiv="Content-Language" />
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
        <title>Untitled 1</title>
        <style type="text/css">
            .auto-style1 {
                margin-left: 40px;
            }
            .auto-style2 {
                text-align: left;
            }
        </style>
    </head>

    <body>

        <table style="width: 100%">
            <tr>
                <td>Perihal : Permohonan Ijin Pemasangan reklame</td>
                <td>Barabai,</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>Kepada Yth.</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>Bupati Hulu Sungai tengah</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>dp. Kepala Kantor Pelayanan Perijinan Terpadu<br />
                    Kab Hulu Sungai Tengah</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>di -<br />
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Barabai</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
        </table>
        <p>&nbsp;</p>
        <p><br />
            Saya yang bertanda tangan dibawah ini :</p>
        <table style="width: 100%">
            <tr>
                <td style="width: 148px">No Kartu Registrasi</td>
                <td style="width: 8px">:</td>
                <td><?php echo $hasil['nokartu']; ?></td>
            </tr>
            <tr>
                <td style="width: 148px">NIK / NPWP</td>
                <td style="width: 8px">:</td>
                <td><?php echo $hasil['nik_npwp']; ?></td>
            </tr>
            <tr>
                <td style="width: 148px">Nama</td>
                <td style="width: 8px">:</td>
                <td><?php echo $hasil['nama']; ?></td>
            </tr>
            <tr>
                <td style="width: 148px">Jabatan</td>
                <td style="width: 8px">:</td>
                <td><?php echo $hasil['jabatan']; ?></td>
            </tr>
            <tr>
                <td style="width: 148px">Alamat</td>
                <td style="width: 8px">:</td>
                <td><?php echo $hasil['alamat']; ?></td>
            </tr>
        </table>
        <p class="auto-style1">Dengan ini mengajukan permohonan Ijin pemasangfan reklame 
            atas perusahaan kami yaitu :</p>
        <table style="width: 100%">
            <tr>
                <td style="width: 145px">Jenis reklame</td>
                <td style="width: 7px">:</td>
                <td> <?php echo $hasil['jenis']; ?></td>
            </tr>
            <?php
            $ket = '';
            $no = 1;
            foreach ($dtl_reklame as $val) {
                $ket = 'Panjang ' . $val['ukuran1'] . ' ' . $val['satuan1'] . ' dan Lebar ' . $val['ukuran2'] . ' ' . $val['satuan2'] . ' dan ' . $val['sisi'] . ' Sisi';
                ?> 
            <tr>
                <?php
                if ($no == 1) {
                    ?>
                    
                        <td style="width: 145px">Ukuran</td>
                        <td style="width: 7px">:</td>
                        <?php
                    } else {
                        ?>
                        <td style="width: 145px"></td>
                        <td style="width: 7px"></td>

                        <?php
                    }
                    ?> <td>

                        <?= $no . '.' . ' ' . $ket; ?>
                    </td>
                </tr>
                <?php
                $no++;
            }
            ?>
            <tr>
                <td style="width: 145px">Banyaknya</td>
                <td style="width: 7px">:</td>
                <td><?php echo $hasil['banyak']; ?> buah</td>
            </tr>
            <tr>
                <td style="width: 145px">Waktu</td>
                <td style="width: 7px">:</td>
                <td> <?php echo $hasil['waktu_mulai'] . ' s/d ' . $hasil['waktu_akhir']; ?></td>
            </tr>
            <tr>
                <td style="width: 145px">Lokasi</td>
                <td style="width: 7px">:</td>
                <td><?php echo $hasil['lokasi']; ?></td>
            </tr>
            <tr>
                <td style="width: 145px">Teks/Gambar</td>
                <td style="width: 7px">:</td>
                <td><?php echo $hasil['teks']; ?></td>
            </tr>
        </table>
        <p>&nbsp;</p>
        <p>Demikian permohonan ini disampaikan, atas perkenaan Bapak kami ucapakan 
            Terima kasih</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <table style="width: 100%">
            <tr>
                <td style="width: 688px">&nbsp;</td>
                <td class="auto-style2">Pemohon,</td>
            </tr>
            <tr>
                <td style="width: 688px">&nbsp;</td>
                <td class="auto-style2">&nbsp;</td>
            </tr>
            <tr>
                <td style="width: 688px">&nbsp;</td>
                <td class="auto-style2">&nbsp;</td>
            </tr>
            <tr>
                <td style="width: 688px">&nbsp;</td>
                <td class="auto-style2">&nbsp;</td>
            </tr>
            <tr>
                <td style="width: 688px">&nbsp;</td>
                <td class="auto-style2"><?php echo $hasil['nama']; ?></td>
            </tr>
        </table>

        <p>Tembusan :</p>
        <table style="width: 100%">
            <tr>
                <td style="width: 4px">1.</td>
                <td>Kepala Dinas Perhubungan, Komunikasi &amp; Informatika<br />
                    di Barabai</td>
            </tr>
            <tr>
                <td style="width: 4px">2.</td>
                <td>Kepala Satpol PP Kab.HST.<br />
                    di Barabai</td>
            </tr>
        </table>

    </body>

</html>
