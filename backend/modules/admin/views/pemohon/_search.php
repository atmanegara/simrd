<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblDetailPemohonSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-detail-pemohon-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
       'options'=>[ 'class'=>'form-group']
    ]); ?>


    <?= $form->field($model, 'nama_pemohon')->label(false)->textInput([
        'placeholder'=>'Pencarian'
    ]) ?>


    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Reset',['index'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
