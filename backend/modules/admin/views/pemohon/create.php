<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TblDetailPemohon */

$this->title = 'Data Pemohon Baru';
$this->params['breadcrumbs'][] = ['label' => 'Data Pemohon Baru', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-detail-pemohon-create">

      <?= $this->render('_form_pemohon', [
        'model' => $model,
         ]) ?>
    


</div>
