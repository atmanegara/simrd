<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\TblSkpd */

$this->title = "Data Pemohon SKP-D";
$this->params['breadcrumbs'][] = ['label' => 'Data Pemohon SKP-D', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-skpd-view">

    <p>
        <?= Html::a('Kembali', ['index'], ['class' => 'btn btn-info']) ?>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Cetak SKP-D', ['/admin/laporan/cetakskpd'],[
            'class'=>'btn btn-info',
            'data'=>[
                'params'=>['id'=>$model->id],
                'method'=>'post'
            ]
        ]) ?>
    </p>
    <div class="panel panel-success">
        <div class="panel-heading">
            Form Pemohon
        </div>
        <div class="panel-body">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
          //  'nama_pemohon:text:Nama Pemohon',
           // 'nama_reklame:text:Nama Reklame',
          //  'nama_kawasan:text:Kawasan',
          'npwp_d:text:NPWP-D',
            'bunga:text:Bunga',
            'kenaikan:text:Kenaikan',
            'sisi:text:Sisi',
            'subtotal:text:Subtotal',
          //  'no_urut',
        ],
    ]) ?>
            
        </div>
    </div>

</div>
