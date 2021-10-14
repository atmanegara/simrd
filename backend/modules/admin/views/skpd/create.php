<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TblSkpd */

$this->title = 'Data Baru SPD-D';
$this->params['breadcrumbs'][] = ['label' => 'Data Baru SKP-D', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-skpd-create">


    <?= $this->render('_form', [
        'model' => $model,
        'modeldata' => array('nama'=>'',
            'alamat'=>'',
            'nik_npwp'=>'',
            'jenis'=>'',
            'lokasi'=>'',
            'waktu_mulai'=>'',
            'waktu_akhir'=>'',
            'ukuran1'=>'',
            'ukuran2'=>'',
            'satuan1'=>'',
            'satuan2'=>'',
            'banyak'=>'',
            'sisi'=>'',
            'harga_dasar'=>'',
            'persen'=>'',
            'keterangan'=>''
            ),
        'modelkawasan' =>$modelkawasan,
        'modelsewa'=>$modelsewa
    ]) ?>

</div>
