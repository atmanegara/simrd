<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TblJenisReklame */

$this->title = 'Data Baru Jenis Reklame';
$this->params['breadcrumbs'][] = ['label' => 'Data Baru Jenis Reklame', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-jenis-reklame-create">

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
