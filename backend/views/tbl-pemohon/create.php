<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TblPemohon */

$this->title = 'Data Baru Pemohon';
$this->params['breadcrumbs'][] = ['label' => 'Data Pemohon', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-pemohon-create">

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
