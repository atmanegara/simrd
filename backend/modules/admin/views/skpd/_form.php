<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\TblSkpd */
/* @var $form yii\widgets\ActiveForm */
?>
<script>
    $(document).ready(function () {
        $("#tblskpd-id_detail_pemohon").load(function () {
            alert("tes");
        });
    });
</script>
<div class="tbl-skpd-form">

    <?php $form = ActiveForm::begin(); ?>




    <div class="row">
        <div class="col-md-12">


            <div class="panel panel-info">
                <div class="panel-heading">
                    Data Pemohon
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-2">
                            <label>No Kartu Registrasi</label>
                        </div>
                        <div class="col-md-1">
                            <label>:</label>
                        </div>
                        <div class="col-md-8">
                            <?php
                            $datadetailpemohon = backend\models\TblDetailPemohon::getAllTulisan();
                            ?>
                            <?=
                            $form->field($model, 'nokartu')->label(false)->widget(Select2::className(), [
                                'data' => $datadetailpemohon,
//        'language'=>
                                'options' => [
                                    'placeholder' => 'Pilih No Kartu Registasi',
                                    'onchange' => 'ambilidreklame(this.value)',
                                ],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ]);
                            ?>
                        </div>

                    </div>
                    <div class="row">     
                        <div class="col-md-2">
                            <label>Nama</label>
                        </div>
                        <div class="col-md-1">
                            <label>:</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="nama_pemohon" value='<?= $modeldata['nama']; ?>' disabled>
                            <?php // $form->field($modelpemohon, 'nama', ['options' => ['id' => 'nama_pemohon']])->label(false)->textInput() ?>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label>Alamat</label>
                        </div>
                        <div class="col-md-1">
                            <label>:</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="alamat_pemohon" value="<?= $modeldata['alamat']; ?>" disabled>
                            <?php //= $form->field($model, 'alamat_pemohon', ['options' => ['id' => 'alamat_pemohon']])->label(false)->textInput() ?>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label>NPWPD / NIK</label>
                        </div>
                        <div class="col-md-1">
                            <label>:</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="nik_pemohon" value="<?= $modeldata['nik_npwp']; ?>" disabled>
                            <?php //= $form->field($model, 'jabatan_pemohon', ['options' => ['id' => 'jabatan_pemohon']])->label(false)->textInput() ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <label>Jenis Reklame</label>
                        </div>
                        <div class="col-md-1">
                            <label>:</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="jenis_pemohon" value="<?= $modeldata['jenis']; ?>" disabled>
                            <?php //= $form->field($model, 'jabatan_pemohon', ['options' => ['id' => 'jabatan_pemohon']])->label(false)->textInput() ?>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" id="keterangan" value="<?= $modeldata['keterangan'] ?>" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label>Lokasi Reklame</label>
                        </div>
                        <div class="col-md-1">
                            <label>:</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="lokasi_pemohon" value="<?= $modeldata['lokasi']; ?>" disabled>
                            <?php //= $form->field($model, 'jabatan_pemohon', ['options' => ['id' => 'jabatan_pemohon']])->label(false)->textInput() ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label>Waktu Reklame</label>
                        </div>
                        <div class="col-md-1">
                            <label>:</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="tanggal_pemohon" value="<?= $modeldata['waktu_mulai'] . ' s/d ' . $modeldata['waktu_akhir']; ?>" disabled><br>
                            <?php //= $form->field($model, 'jabatan_pemohon', ['options' => ['id' => 'jabatan_pemohon']])->label(false)->textInput() ?>
                        </div>
                    </div> 
                </div>


            </div>
        </div>
    </div>     


    <?php //= $form->field($model, 'id_detail_pemohon')->textInput() ?>
    <div class="panel panel-info">
        <div class="panel-heading">
            Data Reklame
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-2">
                    <label>Kawasan</label>
                </div>
                <div class="col-md-1">
                    <label>:</label>
                </div>
                <div class="col-md-8">
                    <?php
                    $datakawasan = backend\models\TblKawasan::getAllKawasan();
                    $datakawasan2 = backend\models\TblKawasan::find()->all();
                    $no = 1;
                    foreach ($datakawasan2 as $index => $att) {

                        $dropdownlist_options[$no] = ['data-id' => $att['persen']];
                        $no++;
                    }
                    ?>
                    <?=
                    $form->field($model, 'id_kawasan')->label(false)->widget(Select2::className(), [
                        //   'attribute'=>'id_kawasan',
                        //  'model'=>$model,
                        'data' => $datakawasan,
//        'language'=>
                        'options' => [
                            'placeholder' => 'Pilih kawasan',
                            'onchange' => 'rubahKawasan();',
                            'options' => $dropdownlist_options
                        ],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
//                'pluginEvents' =>[
//                    "select2:select" => "function() {
//                     alert( this.val()); }"
//                ]
                    ]);
                    ?>
                </div>

            </div>
            <div class="row">
                <div class="col-md-2">
                    <label>Sewa Reklame</label>
                </div>
                <div class="col-md-1">
                    <label>:</label>
                </div>
                <div class="col-md-8">
                    <?=
                    $form->field($model, 'id_sewa')->label(false)->widget(Select2::className(), [
                        'data' => $modelsewa,
//        'language'=>
                        'options' => [
                            'placeholder' => 'Pilih Sewa',
                            'onchange' => 'rubahAngka(this.value);'
                        ],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
//                'pluginEvents' =>[
//                    "select2:select" => "function() {
//                     alert( this.val()); }"
//                ]
                    ]);
                    ?>
                </div>

            </div>


            <?php //= $form->field($model, 'id_kawasan')->textInput()  ?>

            <?php //= $form->field($model, 'id_sewa')->textInput()  ?>
            <div class="row">
                <div class="form-group col-md-3">
                    <label for="nama_program" id="satuan1">Satuan (M)</label>
                    <input type="text" class="form-control" id="ukuran1" name="satuan" placeholder="Besaran panjang" value="<?= $modeldata['ukuran1'] ?>" disabled="true">
                </div>
                <div class="form-group col-md-3">
                    <label for="nama_program" id="satuan2">Satuan (M)</label>
                    <input type="text" class="form-control" id="ukuran2" name="satuan" placeholder="Besaran lebar" value="<?= $modeldata['ukuran2'] ?>" disabled="true">
                </div>
                <div class="form-group col-md-3">
                    <label for="nama_program">Satuan (bh)</label>
                    <input type="text" class="form-control" id="banyak" name="satuan" placeholder="Besaran banyak" value="<?= $modeldata['banyak'] ?>" disabled="true">
                </div>
                <div class="form-group col-md-3">
                    <label for="nama_program">Satuan (sisi)</label>
                    <input type="text" class="form-control" id="sisi" name="satuan" placeholder="Besaran sisi" value="<?= $modeldata['sisi'] ?>" disabled="true">
                </div>
                <div class="form-group col-md-3">
                    <label for="nama_program">Satuan (Rp)</label>
                    <input type="text" class="form-control" id="sewa_dasar" name="satuan" placeholder="Besaran rupiah" value="<?= $modeldata['harga_dasar'] ?>" disabled="true">
                </div>
                <div class="form-group col-md-3">
                    <label for="nama_program">Satuan (hr)</label>

                    <input type="text" class="form-control" id="hari" onchange="hitung()" name="kali" placeholder="Besaran hari" value="<?= $model->isNewRecord ? '' : $model->kali ?>"> 
                    <?=
                    $form->field($model, 'kali')->label(false)->hiddenInput([
                        'onchange' => 'alert(this.value)'
                    ])
                    ?>
                </div>
                <div class="form-group col-md-3">
                    <label for="nama_program">Satuan (%)</label>
                    <input type="text" class="form-control" id="persen" name="satuan" placeholder="Besaran %" value="<?= $modeldata['persen'] ?>" disabled="true">
                </div>
                <div class="form-group col-md-3">
<!--                    <label>SUB TOTAL :  </label>
                    <label id="nilai">0</label>-->
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <label>Sub Total</label>
                </div>
                <div class="col-md-1">
                    <label>:</label>
                </div>
                <div class="col-md-8">
                    <?= $form->field($model, 'subtotal')->label(false)->textInput(['placeholder' => 'Sub Total', 'readonly' => true]) ?>
                </div>
            </div>
            <?php //= $form->field($model, 'npwp_d')->label(false)->hiddenInput() ?> 
            <div class="row">

                <div class="col-md-2">
                    <label>Bunga dan Kenaikan</label>
                </div>
                <div class="col-md-1">
                    <label>:</label>
                </div>

                <div class="col-md-4">
                    <?= $form->field($model, 'bunga')->label(false)->textInput(['placeholder' => 'Bunga']) ?>

                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'kenaikan')->label(false)->textInput(['placeholder' => 'Kenaikan']) ?>

                </div>

            </div>  
            <div class="row">
                <div class="col-md-2">
                    <label>No. Urut</label>
                </div>
                <div class="col-md-1">
                    <label>:</label>
                </div>
                <div class="col-md-8">
                    <?= $form->field($model, 'no_urut')->label(false)->textInput() ?>
                </div>
            </div>


            <?= $form->field($model, 'id_detail_pemohon')->hiddenInput()  ?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
    <script>

        var sewa = [];
        var idsewa = [];
        var ket;
        function ambilidreklame(nokartu)
        {
    //    var id = id;
            var url = '<?= yii\helpers\Url::to(['get-all-pemohon']) ?>';
            $.post(url, {
                nokartu: nokartu
            },
                    function (data, response)
                    {
                        var hasil = '<option value="#">----Pilih Jumlah-----</option>';
                        sewa = [];
                        idsewa = [];
                        var response = JSON.parse(data);
                        if (response[0].masa_pajak.toLowerCase().indexOf("hari") >= 0) {
                            $("#hari").attr("disabled", false);
                        } else {
                            $("#hari").attr("disabled", true);
                        }
    //        alert(response[0].masa_pajak);
                        for (var i = 0, max = response.length; i < max; i++) {
                            hasil += '<option value="' + response[i].id + '">' + response[i].masa_pajak + '</option>';
                            sewa[i] = response[i].harga_dasar;
                            idsewa[i] = response[i].id;

                        }
                        $('#tblskpd-id_sewa').html(hasil);
                    });

            $.ajax({
                url: '<?= \yii\helpers\Url::to(['get-detail-pemohon']) ?>', //'tbl-detail-pemohon/getpemohon',
                type: 'GET',
                data: {
                    nokartu: nokartu
                },
                success: function (data) {
                    var response = JSON.parse(data);
                    $("#nama_pemohon").val(response.nama);
                    $("#alamat_pemohon").val(response.alamat);
                    $("#nik_pemohon").val(response.nik_npwp);
                    $("#jenis_pemohon").val(response.jenis);
                    $("#lokasi_pemohon").val(response.lokasi);
                    $("#tanggal_pemohon").val(response.waktu_mulai + " s/d " + response.waktu_akhir);
                    $("#ukuran1").val(response.ukuran1);
                    $("#ukuran2").val(response.ukuran2);
                    $("#tblskpd-id_detail_pemohon").val(response.id_detail_pemohon);
                    ket = response.keterangan;
                    $("#keterangan").val(response.keterangan);
                    if (response.satuan1 === "cm") {
                        var ukuran1 = response.ukuran1 / 100;
                        $("#ukuran1").val(ukuran1);
                    } else {
    //                    
                    }
                    if (response.satuan2 === "cm") {
                        var ukuran2 = response.ukuran2 / 100;
                        $("#ukuran2").val(ukuran2);
                    } else {
                    }
    //                $("#satuan1").text("Satuan ("+response.satuan1+")");
    //                $("#satuan2").text("Satuan ("+response.satuan2+")");

                    $("#satuan1").text("Satuan (M)");
                    $("#satuan2").text("Satuan (M)");
                    $("#banyak").val(response.banyak);
                    $("#sisi").val(response.sisi);
                    $("#tblskpd-npwp_d").val(response.nik_npwp);

                }
            });
            hitung();
            //   alert()
        }
        function rubahAngka(id) {
            for (var i = 0, max = idsewa.length; i < max; i++) {
                if (idsewa[i] == id) {
                    $("#sewa_dasar").val(sewa[i]);
                }
            }
            hitung();
    //    alert(id);
        }

        function rubahKawasan() {
    //    $("#tblskpd-id_kawasan").change(function(){ 
            //alert($(this).find('option:selected').data('id'));
            $("#persen").val($("#tblskpd-id_kawasan").find('option:selected').data('id'));
            hitung();
    //    });
    //    alert('tes');
        }


        function rubahKawasanold(id) {
            $.ajax({
                url: '<?= \yii\helpers\Url::to(['get-kawasan']) ?>', //'tbl-detail-pemohon/getpemohon',
                type: 'GET',
                data: {
                    id: id
                },
                success: function (data) {
    //                alert(data);
                    var response = JSON.parse(data);
                    $("#persen").val(response.persen);
                }
            });
        }
        function hitung() {
            var ukuran1;
            var ukuran2;
            var banyak;
            var sisi;
            var harga_dasar;
            var hari;
            var persen;

            ukuran1 = parseFloat($("#ukuran1").val());
            ukuran2 = parseFloat($("#ukuran2").val());
            banyak = parseFloat($("#banyak").val());
            sisi = parseFloat($("#sisi").val());
            harga_dasar = parseFloat($("#sewa_dasar").val());
            persen = parseFloat($("#persen").val());
            hari = parseFloat($("#hari").val());

            if (!ukuran1) {
                ukuran1 = 1;
            }
            if (!ukuran2) {
                ukuran2 = 1;
            }
            if (!banyak) {
                banyak = 0;
            }
            if (!sisi) {
                sisi = 1;
            }
            if (!harga_dasar) {
                harga_dasar = 0;
            }
            if (!persen) {
                persen = 0;
            }
            if (!hari) {
                hari = 1;
            }
            if (ket == "Lembar") {
                banyak = banyak / 100;
            }
            var hasil = ukuran1 * ukuran2 * banyak * sisi * harga_dasar * persen * hari / 100;
            $("#nilai").text(hasil);
            $("#tblskpd-subtotal").val(parseInt(hasil));
        }
    </script>
