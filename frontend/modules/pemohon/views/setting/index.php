<?php

use yii\widgets\DetailView;
use yii\bootstrap\Html;
?>

<div class="panel panel-primary">
    <div class="panel panel-heading">
        <p>
            AKUN PEMOHON
        </p>
    </div>
    <div class="panel-body">
        <p>
            <?php
            if ($status == 'Y') {
                echo Html::a('Ubah', ['update', 'id' => $id], [
                    'class' => 'btn btn-info'
                ]);
            } else {
                echo Html::a('Buat Baru', ['create', 'id' => $id], [
                    'class' => 'btn btn-warning',
                        //'disabled'=>'true'
                ]);
            }
            ?>
        </p>
        <?=
        DetailView::widget([
            'model' => $model,
            'attributes' => [
                'nik_npwp:text:NIK/NPWP',
                'nama:text:Nama',
                'jabatan:text:Jabatan',
                'alamat:text:Alamat',
                'nope:text:No Telp'
            ]
        ])
        ?>

    </div> 

</div>
