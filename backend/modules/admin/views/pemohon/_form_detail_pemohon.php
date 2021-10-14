<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use backend\models\TblJenisReklame;
use yii\helpers\Json;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\TblDetailPemohon */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="tbl-detail-pemohon-form">


    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    Data Pribadi Pemohon
                </div>
                <div class="panel-body">

                    <?=
                    yii\widgets\DetailView::widget([
                        'model' => $modelpemohon,
                        'attributes' => [
                            'nik_npwp:text:NIK / NPWPD',
                            'nama:text:Nama',
                            'alamat:text:Alamat',
                        ]
                    ])
                    ?>

                </div>
            </div>

        </div>

    </div>

    <?php
                 
    $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ;
    $this->title = "Detail Pemohon";
    ?>
    <div class="panel panel-danger">
        <div class="panel-heading">
            Data Reklame
        </div>
        <div class="panel-body" id="tambah">
            <div class="row">
                <div class="col-md-2">
                    <label>Jenis Reklame</label>
                </div>
                <div class="col-md-1">
                    <label>:</label>
                </div>
                <div class="col-md-8">
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
                    $form->field($model, 'id_reklame')->label(false)->widget(Select2::className(), [
                        'data' => $data,
                        'options' => [
                            'placeholder' => 'Masukkan Jenis Reklame',
                            'onchange' => 'rubah(this.value)',
                            'options' => $dropdownlist_options
                        ],
                        'pluginOptions' => [
                            'allowClear' => true
                        ]
                    ]);
                    ?>
                </div>
            </div>   
            <div class="box box-info">
                <div class="box-header">
                    <strong>Detail Reklame</strong>
                </div>
                <div class="box-body">
            <div class="row">
                    <?php
                    $items = [
                        'm' => 'Meter (M)'
                            ]
                    ?>
                <div class="col-md-2">
                    <?= $form->field($modeldtlreklame, 'ukuran1')->label('Ukuran 1')->textInput(['placeholder' => 'Masukkan  Panjang']); ?>
                </div>
                <div class="col-md-2">
                    <?= $form->field($modeldtlreklame, 'satuan1')->label('Satuan 1')->dropDownList($items); ?>     </div>
                <div class="col-md-2">
                    <?= $form->field($modeldtlreklame, 'ukuran2')->label('Ukuran 2')->textInput(['placeholder' => 'Masukkan  Panjang']); ?>
                </div>
                <div class="col-md-2">
                    <?= $form->field($modeldtlreklame, 'satuan2')->label('Satuan 2')->dropDownList($items); ?>     </div>

                <div class="col-md-2">
                    <?= $form->field($modeldtlreklame, 'sisi')->label('Sisi')->textInput(['placeholder' => 'Jumlah Sisi']) ?>
                </div>
                <div class="row">
                    <div class="col-md-12">
                          <div class="col-md-2">
                              <p>
                    <?=
                    yii\bootstrap\Html::button('Simpan',[
                    //    'name'=>'tambah',
                        'class' => 'btn btn-info',
                          'onClick' => 'tambah()'
                    ])
                            
                    ?>
                                  
                              </p>
                </div>
                    </div>
                </div>
              
            </div>
                             <div class="row">
                <div class="col-md-12">
                    <?php
                       yii\widgets\Pjax::begin(['id' => 'itemsgridtable']);
                    ?>
                            <?=
                    yii\grid\GridView::widget([
                        'dataProvider' => $dataProvider,
                        'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],
                            'ukuran1:text:Ukuran 1',
                            'satuan1:text:Satuan 1',
                            'ukuran2:text:Ukuran 2',
                            'satuan2:text:Satuan 2',
                            'sisi:text:Sisi',
                                ['class' => 'yii\grid\ActionColumn',
                                'template' => '{hapus}',
                                'buttons' => [
                                    'hapus' => function($url,$model) {
                        
                        $id= $model['id'];
                        $url = \yii\helpers\Url::to(['hapus','id'=>$id]);
                        return yii\bootstrap\Html::button('Hapus',[
                                                    'class' => 'btn btn-danger',
                            'data'=>[
                                'id'=>$id
                            ],
                                                    'onclick'=>'hapus($(this).data("id"))'
                                        ]);
                                    }
                                ]
                            ],
                        ]
                    ])
                    ?>
<?php
yii\widgets\Pjax::end(); ?>
                </div>

            </div>
   
                </div>
            </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-6">

                            <?=
                            $form->field($model, 'waktu_mulai')->label('Tanggal Awal')->widget(DatePicker::classname(), [
                                'options' => ['placeholder' => 'Masukkan tanggal awal ...'],
                                'pluginOptions' => [
                                    'autoclose' => true
                                ]
                            ])

//textInput(['placeholder'=>'Banyaknya']) 
                            ?>         </div>
                        <div class="col-md-6">
                            <?=
                            $form->field($model, 'waktu_akhir')->label('Tanggal Akhir')->widget(DatePicker::classname(), [
                                'options' => [
                                    'placeholder' => 'Masukkan tanggal akhir ...'],
                                'pluginOptions' => [
                                    'autoclose' => true
                                ]
                            ])
                            ?>    
                        </div>
                    </div>
                </div>
            <div class="row">
                <div class="col-md-2">
                    <label>Banyak</label>
                </div>
                <div class="col-md-1">
                    <label>:</label>
                </div>
                <div class="col-md-8">
                    <?= $form->field($model, 'banyak')->label(false)->textInput([
                        'readonly'=>true,
                        'placeholder' => 'Banyaknya']) ?>
                   <?= $form->field($model, 'nokartu')->label(false)->hiddenInput(['placeholder' => 'Banyaknya']) ?>
                </div>
                <div class="col-md-2">
                    <label>Lokasi</label>
                </div>
                <div class="col-md-1">
                    <label>:</label>
                </div>
                <div class="col-md-8">
                    <?=
                    $form->field($model, 'lokasi')->label(false)->textarea()
///textInput(['maxlength' => true])
                    ?>

                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <label>Teks / Gambar</label>
                </div>
                <div class="col-md-1">
                    <label>:</label>
                </div>
                <div class="col-md-6">
<?= $form->field($model, 'teks')->label(false)->textInput(['maxlength' => true]) ?>


                </div>

            </div>
            <div class="row">
                <div class="col-md-2">
                    <label>Upload berkas</label>
                </div>
                <div class="col-md-1">
                    <label>:</label>
                </div>
                <div class="col-md-6">
                    
                    <?=
                    $form->field($model, 'imageFile[]')->label(false)->widget(kartik\file\FileInput::className(), [
                        'options' => [
                            'accept' => ['pdf', 'jpg', 'png', 'jpeg'],
                            'multiple' => 'true'
                        ],
                        'pluginOptions' => [
                            'initialPreview'=>$dataimg,
                                           
                                  'initialPreviewAsData'=>true,
                            'overwriteInitial'=>false,
                            'initialPreviewConfig' =>$imgpreviewconfig, 
                               'maxFileSize'=>2800,
                            'showUpload' => false,
                            'allowedFileExtensions' => ['pdf','jpg', 'png', 'jpeg'],
                        ]
                    ])
                    ?>
                </div>
            </div>
            <hr width="75%">
            <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
<!--                <button type="button" class="btn btn-primary" onclick="tambah()">Tambah reklame</button>-->
            </div>  
        </div>

<?php 
ActiveForm::end(); 
?>
        
    </div>
</div>
<script>
    
    function tambah() {
      
        var ukuran1 = $("#dtlpemohonreklame-ukuran1").val();
        var satuan1 = $("#dtlpemohonreklame-satuan1").val();
        var ukuran2 = $("#dtlpemohonreklame-ukuran2").val();
        var satuan2 = $("#dtlpemohonreklame-satuan2").val();
        var nokartu = $("#tbldetailpemohon-nokartu").val();
        var sisi = $("#dtlpemohonreklame-sisi").val();
    
        $.ajax({
            url: '<?= \yii\helpers\Url::to(['pemohon/insertdetail']) ?>',
            type: 'GET',
            data: {
                ukuran1: ukuran1,
                satuan1: satuan1,
                ukuran2: ukuran2,
                satuan2: satuan2,
               nokartu: nokartu,
                sisi: sisi,
            },
            success: function (data) {
            
                     $.pjax.reload({container:"#itemsgridtable"});
                     $('#tbldetailpemohon-banyak').val(data);
                     }
                 });
    }
    function ambildata($id)
    {
        $.ajax({
            url: '<?= \yii\helpers\Url::to(['tbl-detail-pemohon/getpemohon']) ?>', //'tbl-detail-pemohon/getpemohon',
            type: 'GET',
            data: {
                kode: $id
            },
            success: function (data) {
                var response = JSON.parse(data);
                $("#nama_pemohon").val(response.nama);
                $("#jabatan_pemohon").val(response.jabatan);
                $("#alamat_pemohon").val(response.alamat);
            }
        });
    }
       function hapus(id){
        var nokartu = $("#tbldetailpemohon-nokartu").val();
       
        $.get('<?= \yii\helpers\Url::to(['hapusitem'])?>',{
            id:id,
            nokartu:nokartu
        })
                .done(function(data){
              //     alert(nokartu);
                    $.pjax.reload({container:"#itemsgridtable"});
          $('#tbldetailpemohon-banyak').val(data);
                })
                
                .fail(
            function(){
                alert('gagal')
            }    
            )   
    }
    
 
    function rubah(id) {
//        alert($("#tbldetailpemohon-id_reklame").find('option:selected').data('id'));
        var satuan = $("#tbldetailpemohon-id_reklame").find('option:selected').data('id');
//        alert(satuan);
        if (satuan === 'Per 100 Lembar' || satuan === 'Per Buah') {
            $("#tbldetailpemohon-ukuran2").prop('disabled', true);
            $("#tbldetailpemohon-satuan2").prop('disabled', true);
            $("#tbldetailpemohon-ukuran1").prop('disabled', true);
            $("#tbldetailpemohon-satuan1").prop('disabled', true);
            $("#tbldetailpemohon-satuan1").prop('disabled', true);
            $("#tbldetailpemohon-sisi").prop('disabled', true);
            $("#banyaknya").text(satuan);
        } else {
            $("#tbldetailpemohon-ukuran2").prop('disabled', false);
            $("#tbldetailpemohon-satuan2").prop('disabled', false);
            $("#tbldetailpemohon-ukuran1").prop('disabled', false);
            $("#tbldetailpemohon-satuan1").prop('disabled', false);
            $("#tbldetailpemohon-satuan1").prop('disabled', false);
            $("#tbldetailpemohon-sisi").prop('disabled', false);
            $("#banyaknya").text('');
        }
    }
</script>
