<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblPemohonSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-pemohon-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

   <?= $form->field($model, 'nik_npwp')->label('Kata Cari')->textInput([
       'placeholder'=>'Pencarian'
   ]) ?>

    <?php // $form->field($model, 'nama') ?>

 
    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Reset',['index'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
