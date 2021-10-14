<?php

/* @var $this yii\web\View */

$this->title = 'E-Pajak';
?>
<div class="site-index">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Perhatian !!
                </div>
                <div class="panel-body">
                    <p>
                            Bagi calon / pemohon lama harap diperhatian kelengkapan data yang di input dan dapat dipertanggung jawabkan

                    </p>                
                   
                </div>
            </div>
        </div>
        
    </div>
    <div class="row">
        <div class="col-md-5">
            <div class="panel panel-success">
                <div class="panel-heading">
                    Lacak Status Perizinan Anda
                </div>
                <div class="panel-body">
                        <?= 
 \yii\bootstrap\Html::beginForm(['/site/carireg'], 'post')               ?>
        <p>
           <?= \yii\bootstrap\Html::textInput('nokartu', Yii::$app->request->post('nokartu'),[
                    'class'=>'form-control',
               'placeholder'=>'Masukkan No Registrasi Pajak'
                ])?>
         
        </p>     
           <p>
               <?= \yii\bootstrap\Html::submitInput('Cari',[
                    'class'=>'btn btn-sm btn-success'
                ]) ?>
            
        </p>
                <?= \yii\bootstrap\Html::endForm() ?>
       
                </div>
            </div>
        </div>
       
        </div>
 
    </div>

