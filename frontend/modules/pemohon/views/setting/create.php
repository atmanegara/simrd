<?php

use yii\bootstrap\ActiveForm;
?>
<?php
$form = ActiveForm::begin();
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel panel-heading">Update Akun</div>

            <div class="panel-body">

                <?=
                $form->field($model, 'nik_npwp')->label('NIK / NPWPD')->textInput([
                    'placeholder' => 'Masukkan NIK / NPWP'
                ])
                ?>
                <?=
                $form->field($model, 'nama')->label('Nama')->textInput([
                    'placeholder' => 'Masukkan Nama'
                ])
                ?>
                <?=
                $form->field($model, 'jabatan')->label('Jabatan')->textInput([
                    'placeholder' => 'Masukkan Jabatan'
                ])
                ?>
                <?=
                $form->field($model, 'alamat')->label('Alamat')->textInput([
                    'placeholder' => 'Masukkan Alamat'
                ])
                ?>
                <?=
                $form->field($model,'nope')->label('No. Telp')->textInput([
                    'placeholder'=>'Masukkan No Telp'
                ])
        ?>
                <div class="form-group">
                    <?=
                    \yii\bootstrap\Html::submitButton('Simpan', [
                        'class' => 'btn btn-primary'
                    ])
                    ?>

                </div>

            </div>

        </div> 
    </div>
</div>
<?php ActiveForm::end() ?>  
