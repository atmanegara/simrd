<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use backend\models\RefTipePemohon;
$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <p><b>Registrasi Pemohon Informasi</b></p>
    <p>
        Formulir ini digunakan untuk registrasi pemohon.
        Dengan mendaftar di Sistem Informasi Pelayanan Perizinan Satu Pintu,
        pemohon mendapatkan kemudahan dalam mengajukan permohonan perizinan secara online.</p>
    <div class="panel panel-primary">
          <div class="panel-heading">Form Pendaftaran</div>
        <div class="panel-body"> 
            
            <div class="row">
                <div class="col-lg-6">
                    <?php $form = ActiveForm::begin(['id' => 'form-signup']); 
                //    $items= RefTipePemohon::gettipepemohon();
                    ?>
                    <?php // $form->field($model,'id_ref_tipe')->dropDownList($items,[
//                        'prompt'=>'--Pilih Tipe Pemohon--'
//                    ]) ?>
                    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'email') ?>

                   <?= $form->field($model, 'password')->passwordInput() ?>

                    
                    <div class="form-group">
                        <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
                
            </div>
        </div>
    </div>

</div>
