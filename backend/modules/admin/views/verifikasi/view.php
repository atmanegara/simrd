<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
use kartik\switchinput\SwitchInput;
/* @var $this yii\web\View */
/* @var $model backend\models\TblKawasan */

$this->title ="Data Verifikasi Pemohon";
$this->params['breadcrumbs'][] = ['label' => 'Data Verifikasi Pemohon', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-kawasan-view">

    <p>
        <?= Html::a('Kembali', ['index'], ['class' => 'btn btn-primary']) ?>
        <?php /*echo  Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) */ ?>
    </p>
    <div class="panel panel-success">
        <div class="panel-heading">
            Data Pemohon
        </div>
        <div class="panel-body">
            <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'id_pemohon',
             'nama_pemohon:text:Nama Pemohon',
            'nama_reklame:text:Nama Reklame',
            'teks:text:Judul',
            'nama_kawasan:text:Kawasan',
          'npwp_d:text:NPWP-D',
            'bunga:text:Bunga',
            'kenaikan:text:Kenaikan',
            'sisi:text:Sisi',
            'subtotal:text:Subtotal',
//            'persen',
        ],
    ]) ?>
  <?php 
$form= ActiveForm::begin([
    'method'=>'post',
    'action'=>['verifikasi/statusverifikasi']
]);
  ?>
    <?= $form->field($model,'id')->label(false)->hiddenInput(); ?>
    <?= $form->field($model,'status')->label('Status Verifikasi')->widget(SwitchInput::classname(),[
     //   'value' => -1,
        'tristate' => true,
    'indeterminateValue' => -1, // set indeterminate as -1 default is null
    'indeterminateToggle' => ['label'=>'<i class="glyphicon glyphicon-remove-sign"></i>'],
    'pluginOptions' => [
        'onText'=>'Setuju',
        'offText'=>'Batal',
        'labelText'=>'<i class="glyphicon glyphicon-stop"></i>'
    ]
    ]); ?>
    <?= Html::submitButton('Simpan',['class'=>'btn btn-info']); ?>
    <?php ActiveForm::end(); ?>
    
        </div>
    </div>
</div>
