<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<!--<div class="alert alert-info">
  <strong>Info !</strong> Gunakan Email Yang Aktif/Valid
</div>-->
<div class="site-contact">

    <div class="panel panel-primary">
        <div class="panel panel-heading"> Form Kontak</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                            <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                            <?= $form->field($model, 'email') ?>

                            <?= $form->field($model, 'subject') ?>

                            <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                            <?=
                            $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                                'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                            ])
                            ?>

                            <div class="form-group">
<?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                            </div>

<?php ActiveForm::end(); ?>
                        </div>

                    </div>

                </div>
                <div class="col-lg-6">
                    <div class="row">
                       <div class="col-lg-12">
                          <div class="panel panel-info">
                              <div class="panel-heading">
                                  Informasi !!
                              </div>
                              <div class="panel-body">
                                  <p>
                                  Gunakan Email Yang valid/Aktif                                      
                                  </p>
                                  
                                  <p>
                                  Mohon Saran dan Kritik yang membangun                                      
                                  </p>
                                  
                                  <p>
Dukungan anda semangat kami
                                  </p>
                                  
                              </div>
                          </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-warning">
                                <div class="panel-heading">
                                    Kontak Informasi
                                </div>
                                <div class="panel-body">
                                    <p>
                                        Telp : (0517)123 456 789
                                    </p>
                                                                        <p>
                                        WA : +6281314151617
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                        
                </div>
            </div>
        </div>
    </div>

</div>
