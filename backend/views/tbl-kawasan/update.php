<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TblKawasan */

$this->title = 'Ubah Data kawasan ';
$this->params['breadcrumbs'][] = ['label' => 'Ubah Data Kawasan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Ubah';
?>
<div class="tbl-kawasan-update">
    <div class="panel panel-success">
        <div class="panel-heading">
            Data Kawasan
        </div>
        <div class="panel-body">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
            
        </div>
    </div>

</div>
