<?php

use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
use kartik\select2\Select2;
use \backend\models\TblJenisReklame;
use kartik\file\FileInput;
?>

<?php
$form = ActiveForm::begin([
            'method' => 'post',
            'options' => ['enctype' => 'multipart/form-data']
        ])
?>
<div class="row">

    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel panel-heading">
                Data Pajak/Retribusi
            </div>
            <div class="panel panel-body">
                <?php
                $data = TblJenisReklame::getAlljnsreklame();
                $data2 = TblJenisReklame::find()->all();
                $no = 1;
                foreach ($data2 as $value) {
                    $dropdownlist_options[$no] = ['data-id' => $value['keterangan']];
                    $no++;
                }
                ?>
                <?=
                $form->field($modeldtlpemohon, 'id_reklame')->label('Jenis Reklame')->widget(Select2::className(), [
                    'name' => 'id_reklame',
                    'data' => $data,
                    'value' => '',
                    'options' => [
                        'placeholder' => 'Masukkan Jenis Reklame',
                        // 'onchange'=>'alert(this.value)',
                        'options' => $dropdownlist_options
                    ],
                    'pluginOptions' => [
                        'tags' => true,
                        'allowClear' => true
                    ]
                ]);
                ?>
                <div class="row">
                    <div class="col-md-12">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            Data detail Reklame
                        </div>
                        <div class="panel-body">
                    <div class="col-md-2">
                        <?= $form->field($dtlpemohonreklame, 'ukuran1')->label('Ukuran')->textInput() ?>
 </div>
                    <div class="col-md-3">
                        <?= $form->field($dtlpemohonreklame, 'satuan1')->label('Satuan')->textInput() ?>

                    </div>
              <div class="col-md-2">

                        <?= $form->field($dtlpemohonreklame, 'ukuran2')->label('Ukuran')->textInput() ?>
                    </div>
                    <div class="col-md-3">

                        <?= $form->field($dtlpemohonreklame, 'satuan2')->label('Satuan')->textInput() ?>      
                    </div>
                    <div class="col-md-2">
                           <?= $form->field($dtlpemohonreklame, 'sisi')->label('Sisi')->textInput() ?>
                           <?= $form->field($modeldtlpemohon, 'nokartu')->label(false)->hiddenInput() ?>
                        
                    </div>         
                        </div>
                        <div class="panel-footer">
                        <?= Html::button('Simpan',[
                            'class'=>'btn btn-input',
                            'onClick'=>'tambah()'
                        ]) ?>
                            
                        </div>
                    </div>
                        
                    </div>
                </div>    
                <div class="row">
                    <div class="col-md-12">
                       <?php \yii\widgets\Pjax::begin([
                           'id'=>'gridtemp'
                       ]) ?>
 <?= 
                         \yii\grid\GridView::widget([
                             'dataProvider'=>$dataProvider,
                             'columns'=>[
                                 'ukuran1:text:Ukuran 1',
                                 'satuan1:text:Satuan 1',
                                 'ukuran2:text:Ukuran 2',
                                 'satuan2:text:Satuan 2',
                                 'sisi:text:Sisi',
                                 
                                [
                                    'class'=>'yii\grid\ActionColumn',
                                    'template'=>'{hapus}',
                                    'buttons'=>[
                                        'hapus'=>function($url,$model){
                                        $id = $model['id'];
                                         $url = \yii\helpers\Url::to(['hapus','id'=>$id]);
                             return \yii\helpers\Html::button('Hapus',[
                                 'class'=>'btn btn-danger',
                                 'data'=>[
                                     'id'=>$id
                                 ],
                              //   'onClick'=>'hapus('.$id.')'
                               'onClick'=>'hapus($(this).attr("data-id"))'
                             ]);
                                        }
                                    ]
                                ]
                             ]
                         ])
                        ?>
                        <?php \yii\widgets\Pjax::end(); ?>
                    </div>
                </div>
                <?= $form->field($modeldtlpemohon, 'banyak')->label('Banyak')->textInput([
                    'readonly'=>true
                ]) ?>
                <div class="row">
                    <div class="col-md-6">
                          <?= $form->field($modeldtlpemohon,'waktu_mulai')->label('Tanggal Awal')->widget(\kartik\date\DatePicker::className(),[
                   'options'=>[
                       ['placeholder'=>'Masukkan Tanggal Mulai Reklame'],
                       'pluignOptions'=>[
                           'format'=>'dd-M-yyyy',
                           'todayHighlight'=>true
                       ]
                   ] 
                ])?>
                    </div>
                    <div class="col-md-6">
                         <?= $form->field($modeldtlpemohon,'waktu_akhir')->label('Tanggal Akhir')->widget(\kartik\date\DatePicker::className(),[
                   'options'=>[
                       ['placeholder'=>'Masukkan Tanggal Akhir Reklame'],
                       'pluignOptions'=>[
                           'format'=>'dd-M-yyyy',
                           'todayHighlight'=>true
                       ]
                   ] 
                ])?>
                    </div>
                </div>
               
                
                <?= $form->field($modeldtlpemohon, 'teks')->label('Judul')->textInput() ?>
              <?= $form->field($modeldtlpemohon, 'lokasi')->label('Lokasi')->textInput() ?>
                <?= $form->field($modeldtlpemohon,'imageFile[]')->label('Upload Gambar')->widget(FileInput::className(),[
                    'options' => [
                        'multiple' => true,
                        'accept' => ['pdf', 'jpg', 'png', 'jpeg']
                        ],
                      'pluginOptions' => [
        'showUpload' => false,
                          ]
                ])?>
            </div>
            <div class="panel-footer">
                <?=
Html::submitButton('Simpan', [
    'class' => 'btn btn-flat btn-primary'
])
?>
            </div>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>

<script type="text/javascript">
    function tambah()
    {
        var ukuran1 = $('#dtlpemohonreklame-ukuran1').val();
        var satuan1 = $('#dtlpemohonreklame-satuan1').val();
        var ukuran2 = $('#dtlpemohonreklame-ukuran2').val();
        var satuan2 = $('#dtlpemohonreklame-satuan2').val();
        var sisi = $('#dtlpemohonreklame-sisi').val();
        var nokartu = $('#tbldetailpemohon-nokartu').val();
     //   $.pos
        $.post('<?= \yii\helpers\Url::to(['insertdetailreklame']) ?>',{
            ukuran1 : ukuran1,
            satuan1 : satuan1,
            ukuran2 : ukuran2,
            satuan2 : satuan2,
            sisi : sisi,
            nokartu:nokartu
        })
                .done(
                function(data)
        {
           // alert(data);
          $.pjax.reload({container:"#gridtemp"}); 
          $('#tbldetailpemohon-banyak').val(data);
        }
            
                )
                .fail(
            function(){
                alert('gagal')
            }    
            )
    }
    
    function hapus(id){
      
        $.get('<?= \yii\helpers\Url::to(['hapus'])?>',{
            id:id
        })
                .done(function(data){
                    $.pjax.reload({container:"#gridtemp"});
          $('#tbldetailpemohon-banyak').val(data);
                })
                
                .fail(
            function(){
                alert('gagal')
            }    
            )   
    }
</script>