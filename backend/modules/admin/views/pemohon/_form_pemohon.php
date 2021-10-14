    <?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use backend\models\TblJenisReklame;
use yii\jui\DatePicker;
use yii\helpers\Json;

/* @var $this yii\web\View */
/* @var $model backend\models\TblDetailPemohon */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="tbl-detail-pemohon-form">


<?php $this->title = "Detail Pemohon";
$form = ActiveForm::begin();
?>
    <div class="row">
        <div class="col-md-12">
        <div class="panel panel-warning">
            <div class="panel-heading">
                Data Pribadi Pemohon
            </div>
            <div class="panel-body">
                <?= $form->field($model, 'nik_npwp')->label('NIK / NPWPD')->textInput([
                    'placeholder'=>'Masukkan NIK / NPWPD'
                ]) ?>
                 <?= $form->field($model, 'nama')->label('Nama')->textInput([
                    'placeholder'=>'Masukkan Nama'
                ]) ?>
                 <?= $form->field($model, 'jabatan')->label('Jabatan')->textInput([
                    'placeholder'=>'Masukkan Jabatan'
                ]) ?>
                 <?= $form->field($model, 'nope')->label('No. Telp')->textInput( [
                    'placeholder'=>'Masukkan No Telp'
                ]) ?> <?= $form->field($model, 'alamat')->label('Alamat')->textInput( [
                    'placeholder'=>'Masukkan Alamat'
                ]) ?>
                <div class="form-group">
                    <?=         Html::submitButton('Simpan / Lanjutkan Isi Data Detail Pemohon',[
                        'class'=>'btn btn-primary'
                    ])
        ?>
                </div>
            </div>
        </div>

            
        </div>
    </div>
<?php ActiveForm::end();
?>
</div>
<script>
    function tambah(){
        var id_pemohon = $("#tbldetailpemohon-id_pemohon").val();
        var id_reklame = $("#tbldetailpemohon-id_reklame").val();
        var ukuran1 = $("#tbldetailpemohon-ukuran1").val();
        var satuan1 = $("#tbldetailpemohon-satuan1").val();
        var ukuran2 = $("#tbldetailpemohon-ukuran2").val();
        var satuan2 = $("#tbldetailpemohon-satuan2").val();
        var banyak = $("#tbldetailpemohon-banyak").val();
        var sisi = $("#tbldetailpemohon-sisi").val();
        var waktu_mulai = $("#tbldetailpemohon-waktu_mulai").val();
        var waktu_akhir = $("#tbldetailpemohon-waktu_akhir").val();
        var lokasi = $("#tbldetailpemohon-lokasi").val();
        var teks = $("#tbldetailpemohon-teks").val();
        
        $.ajax({
            url: '<?= \yii\helpers\Url::to(['tbl-detail-pemohon/insertdetail']) ?>', //'tbl-detail-pemohon/getpemohon',
            type: 'GET',
            data: {
            	id_pemohon : id_pemohon,
                id_reklame : id_reklame,
                ukuran1 : ukuran1,
                satuan1 : satuan1,
                ukuran2 : ukuran2,
                satuan2 : satuan2,
                banyak : banyak,
                sisi : sisi,
                waktu_mulai : waktu_mulai,
                waktu_akhir : waktu_akhir,
                lokasi : lokasi,
                teks : teks
            },
            success:function(data) {
//                var response = JSON.parse(data);
                if(data){
                    var answer = confirm("Data berhasil ditambahkan. Apakah ingin tambah lagi ?")
                    if (answer) {
                        clearReklame();
                    }
                    else {
                        window.location = "<?= \yii\helpers\Url::to(['tbl-detail-pemohon/']) ?>";
                    }
                }
//                $("#nama_pemohon").val(response.nama);
            }
        });
    }
    function clearReklame(){
        $("#tbldetailpemohon-id_reklame").val('').trigger('change');
        $("#tbldetailpemohon-ukuran1").val("");
        $("#tbldetailpemohon-ukuran2").val("");
        $("#tbldetailpemohon-banyak").val("");
        $("#tbldetailpemohon-sisi").val("");
        $("#tbldetailpemohon-waktu_mulai").val("");
        $("#tbldetailpemohon-waktu_akhir").val("");
        $("#tbldetailpemohon-lokasi").val("");
        $("#tbldetailpemohon-teks").val("");
    }
    function ambildata($id)
    {
        $.ajax({
            url: '<?= \yii\helpers\Url::to(['tbl-detail-pemohon/getpemohon']) ?>', //'tbl-detail-pemohon/getpemohon',
            type: 'GET',
            data: {
            	kode : $id
            },
            success:function(data) {
                var response = JSON.parse(data);
                $("#nama_pemohon").val(response.nama);
                $("#jabatan_pemohon").val(response.jabatan);
                $("#alamat_pemohon").val(response.alamat);
            }
        }); 
    }
    function rubah(id){
//        alert($("#tbldetailpemohon-id_reklame").find('option:selected').data('id'));
        var satuan = $("#tbldetailpemohon-id_reklame").find('option:selected').data('id');
//        alert(satuan);
        if(satuan==='Per 100 Lembar'||satuan==='Per Buah'){
            $("#tbldetailpemohon-ukuran2").prop('disabled', true);
            $("#tbldetailpemohon-satuan2").prop('disabled', true);
            $("#tbldetailpemohon-ukuran1").prop('disabled', true);
            $("#tbldetailpemohon-satuan1").prop('disabled', true);
            $("#tbldetailpemohon-satuan1").prop('disabled', true);
            $("#tbldetailpemohon-sisi").prop('disabled', true);
            $("#banyaknya").text(satuan);
        }else{
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
