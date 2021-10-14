<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TblBiaya */

$this->title = 'Update Tbl Biaya: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Biayas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-biaya-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
