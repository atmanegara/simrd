<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblSkpdSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-skpd-search">

    <?php $form = ActiveForm::begin([
        'action' => ['indexsp'],
        'method' => 'get',
    ]); ?>

  
    <?= $form->field($model, 'nama_pemohon')->label('Pencarian')->textInput([
        'placeholder'=>'Pencarian'
    ]) ?>
    

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Reset',['indexsp'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
