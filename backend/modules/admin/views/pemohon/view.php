<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\TblDetailPemohon */

$this->title = 'View Data Pemohon';
$this->params['breadcrumbs'][] = ['label' => 'View Data Pemohon', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-detail-pemohon-view">


    <p>
            <?= Html::a('Kembali ke Halaman Depan', ['index'], ['class' => 'btn btn-info']) ?>
     
        <?= Html::a('Update', ['update','id_pemohon'=>$model['id_pemohon'], 'nokartu' => $model['nokartu']], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model['id']], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
           <?= Html::a('Cetak Surat Permohonan', ['/admin/laporan/cetaksp'], [
               'class' => 'btn btn-info',
              
               'data'=>[
                    'params'=>['nokartu'=> $model['nokartu']],
                   'method'=>'post'
               ]
               ]) ?>
     
    </p>
    <div class="panel panel-info">
        <div class="panel-heading">
        List Data Pemohon
        </div>
        <div class="panel-body">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
          //  'id',
            'nokartu:text:No Kartu',
            'nama_pemohon:text:Nama Pemohon',
            'nama_reklame:text:Nama Reklame',
            'banyak:text:Banyak',
            'waktu_mulai:text:Tanggal Mulai Pemasangan',
            'waktu_akhir:text:Tanggal Akhir Pemasangan',
            'lokasi:text:Lokasi',
            'teks:text:Judul Reklame',
[
    'label'=>'Gambar',
        'format' => 'html', 
    'value'=>function($model){
        $linkimage = \yii\helpers\Url::to('@img/'.$model['path_gambar']);
        
        return \yii\bootstrap\Html::img($linkimage,[
            'width'=>'100px',
            'heigth'=>'100px'
        ]) ;
    }
],         
//  'path_gambar',
        [
            'label'=>'Status Pengajuan',
            'format'=>'html',
            'value'=>function($model)
{
    $status = backend\models\TblDetailPemohon::ketstatus($model['status']);
    return $status;
            }
        ] ,
                [
                'label'=>'Status Reklame',
                    'format'=>'html',
                    'value'=>function($model){
            $status_reklame = backend\models\TblDetailPemohon::ketstatusreklame($model['status_reklame']);
            return $status_reklame;
                    }
                ]
        ],
    ]) ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Ukuran 1</th>
                        <th>Satuan 1</th>
                        <th>Ukuran 2</th>
                        <th>Satuan 2</th>
                        <th>Sisi</th>
                    </tr>
                </thead>
                <tbody>
<?php 
$no=1;
foreach ($query as $value) {
    ?>
                                        <tr>
                        <td><?=$no?></td>
                        <td><?=$value['ukuran1']?></td>
                        <td><?=$value['satuan1']?></td>
                        <td><?=$value['ukuran2']?></td>
                        <td><?=$value['satuan2']?></td>
                        <td><?=$value['sisi']?></td>
                    </tr>

                    <?php
$no++;
                    } ?>
                </tbody>
            </table>

        </div>
    </div>

</div>
