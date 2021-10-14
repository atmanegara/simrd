<?php
use yii\widgets\DetailView;
?>
<div class="container">
  <div class="page-header">
    <h1 id="timeline">Timeline</h1>
  </div>
    <div class="row">
    <div class="col-md-8">
  <ul class="timeline">
    <li>
      <div class="timeline-badge">  
          <a class="btn btn-warning btn-flat btn-xs">Proses</a>
      </div>
      <div class="timeline-panel">
         <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 11 hours ago via Twitter</small></p>
<!--        <div class="timeline-heading">
          <h4 class="timeline-title">Data Kelengkapan masih di proses</h4>
          <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 11 hours ago via Twitter</small></p>
        </div>-->
        <div class="timeline-body">
            <p>
            Data kelengkapan permohonan masih dalam proses
            </p>    
        </div>
      </div>
    </li>
    <li>
      <div class="timeline-badge">  
          <a class="btn btn-danger btn-flat btn-xs">Batal</a>
      </div>
      <div class="timeline-panel">
         <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 11 hours ago via Twitter</small></p>
        <div class="timeline-body">
            <p>Permohonan pajak dibatalkan karena kelengkapan berkas tidak memenuhi syarat<br>
            untuk informasi lengkap persyaratan permohonan pajak bisa klik disini 
            </p>
        </div>
      </div>
    </li>
    <li>
      <div class="timeline-badge">  
          <a class="btn btn-primary btn-flat btn-xs">Diterima</a>
      </div>
      <div class="timeline-panel">
         <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 11 hours ago via Twitter</small></p>
        <div class="timeline-body">
            <p>Permohonan pajak anda diterima, silahkan datang ke BPPRD untuk membayar pajak<br>
            untuk informasi lengkap mengenai pajak silahkan klik disini 
            </p>
        </div>
      </div>
    </li>
  </ul>
      </div>
         <div class="col-md-4">
      <?=
      DetailView::widget([
          'model'=>$query,
          'attributes'=>[
              'nik_npwp:text:NIK / NPWPD',
              'nama:text:Nama',
              'jenis:text:Jenis'
          ]
      ])
?>

    </div>
</div>
  
   
</div>