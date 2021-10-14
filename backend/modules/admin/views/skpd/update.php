<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TblSkpd */

$this->title = 'Ubah Data Pemohon SKP-D';
$this->params['breadcrumbs'][] = ['label' => 'Ubah Data Pemohon SKP-D', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-skpd-update">

    <?= $this->render('_form', [
        'model' => $model,
        'modeldata' =>$modeldata,
        'modelkawasan' => $modelkawasan,
        'modelsewa'=>$modelsewa
    ]) ?>

</div>
