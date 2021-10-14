<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                        Mengapa e-Pajak</a>
                </h4>
            </div>
            <div id="collapse1" class="panel-collapse collapse in">
                <div class="panel-body">
                    Aplikasi ini dikembangkan untuk memudahkan calon pajak/pengguna pajak dalam melakukan permohonan pajak
                    Disamping itu aplikasi ini diharapkan mampu menjadi salah satu pendukung bagi pimpinan dalam mengambil keputusan terkait pembayar pajak.
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                  Definisi e-Pajak</a>
                </h4>
            </div>
            <div id="collapse2" class="panel-collapse collapse">
                <div class="panel-body">
                    e-Pajak adalah salah satu aplikasi berbasis web yang digunakan oleh Pemerintah Kabupaten Hulu Sungai Selatan
                     dengan mempedomani Permendagri NOMOR 28 TAHUN 2009 tentang Pajak dan Retribusi Daerah.
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                       Tujuan e-Pajak</a>
                </h4>
            </div>
            <div id="collapse3" class="panel-collapse collapse">
                <div class="panel-body">
                    <ul>
	<li>Untuk meningkatan kinerja aparatur;</li>
	<li>Meningkatkan Pelayanan;</li>
	
</ul>
                    
                </div>
            </div>
        </div>
           <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
                      Untuk Siapa e-Pajak</a>
                </h4>
            </div>
            <div id="collapse4" class="panel-collapse collapse">
                <div class="panel-body">
                    Aplikasi e-Pajak terdiri dari 2 buah modul, yaitu modul Pemohon dan Admin. 
                    Publik hanya diizinkan untuk mengakses modul Pemohon, sementara Pegawai di lingkungan Pemerintah kabupaten Hulu Sungai Tengah dapat mengakses penuh aplikasi dengan menggunakan akun yang telah diberikan
                </div>
            </div>
        </div>
    </div>
</div>
