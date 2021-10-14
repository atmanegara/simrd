
<?php
use kartik\date\DatePicker;

$form = \yii\bootstrap\ActiveForm::begin()
        ?>

<?= $form->field($model, 'id_reklame')->label(false)->hiddenInput() ?>
<?= $form->field($model, 'id_pemohon')->label(false)->hiddenInput() ?>
<?= $form->field($model,'jenis')->textInput([
    'readOnly'=>true
])?>
<?= $form->field($model,'lokasi')->textInput([
    'readOnly'=>true
])?>
<?= $form->field($model,'teks')->textInput([
    'readOnly'=>true
])?>
<?= $form->field($model,'waktu_mulai')->label('Waktu Mulai (Sebelumnya)')->textInput([
    'disabled'=>true
])?>
<?= $form->field($model,'waktu_akhir')->label('Waktu Akhir (Sebelumnya)')->textInput([
    'disabled'=>true
])?>
<?php
echo '<label class="control-label">Pilih Tanggal </label>';
echo DatePicker::widget([
    'model' => $model,
    'attribute' => 'waktu_mulai',
    'attribute2' => 'waktu_akhir',
    'options' => ['placeholder' => 'Start date'],
    'options2' => ['placeholder' => 'End date'],
    'type' => DatePicker::TYPE_RANGE,
    'form' => $form,
    'pluginOptions' => [
        'format' => 'yyyy-mm-dd',
        'autoclose' => true,
    ]
]);
?>

<?= yii\bootstrap\Html::submitButton('Simpan',[
    'class'=>'btn btn-info'
]) ?>
<?php
$form->end();
?>

