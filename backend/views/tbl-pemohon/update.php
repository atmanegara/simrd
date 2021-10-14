<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TblPemohon */

$this->title = 'Ubah Data Pemohon: ' . $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Data Pemohon', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-pemohon-update">

    <div class="panel panel-danger">
        <div class="panel-heading">
            Data Pemohon
        </div>
        <div class="panel-body">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
            
        </div>
    </div>
</div>
