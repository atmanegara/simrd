<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblBiaya */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-biaya-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput() ?>
    <?= $form->field($model, 'id')->label(false)->hiddenInput() ?>

<?php 
//
// const ROLE_PROGRAMMER=20; //PROGRAMMER
//    const ROLE_GUEST=10; //GUEST
//     const ROLE_ADMIN_PTSP=30; //ADMIN PTSP
//     const ROLE_ADMIN_BPPRD=40; //ADMIN BPPRD
$items=[
    '30'=>'Admin PTSP',
    '40'=>'Admin BPPRD',
    '99'=>'Super Admin',
    '20'=>'Programmer'
];
?>
    <?= $form->field($model, 'role')->dropDownList($items) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
