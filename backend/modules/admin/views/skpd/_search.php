<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblSkpdSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-skpd-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

  
    <?= $form->field($model, 'nama')->label('Nama')->textInput([
        'placeholder'=>'Pencarian'
    ]) ?>
    
    <?php //$form->field($model, 'nama_kawasan') ?>

    <?php //echo $form->field($model, 'id_sewa') ?>

    <?php //echo $form->field($model, 'npwp_d') ?>

    <?php // echo $form->field($model, 'bunga') ?>

    <?php // echo $form->field($model, 'kenaikan') ?>

    <?php // echo $form->field($model, 'subtotal') ?>

    <?php // echo $form->field($model, 'no_urut') ?>

    <?php // echo $form->field($model, 'sisi') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
