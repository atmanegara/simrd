<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TblJenisReklame */

$this->title = 'Ubah Data Jenis Reklame: ' . $model->jenis;
$this->params['breadcrumbs'][] = ['label' => 'Ubah Data Jenis Reklame', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Ubah';
?>
<div class="tbl-jenis-reklame-update">

     <div class="panel panel-success">
        <div class="panel-heading">
            Data Jenis Reklame
        </div>
        <div class="panel-body">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
            
        </div>
    </div>

</div>
