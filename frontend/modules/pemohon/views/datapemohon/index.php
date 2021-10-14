<?php

use yii\grid\GridView;
use yii\bootstrap\Html;
?>
<p>
    <?=
    Html::a('Permohonan Baru', ['create'], [
        'class' => 'btn btn-info'
    ])
    ?>
</p>
<div class="panel panel-primary">
    <div class="panel panel-heading">
        <p>
            Daftar Permohonan
        </p>
    </div>
    <div class="panel-body">
        <?php \yii\widgets\Pjax::begin(); ?>
        <?php
        \yii\bootstrap\ActiveForm::begin([
            'method' => 'post',
            'action' => ['index'],
            'options' => ['data-pjax' => true]
        ])
        ?>
        <div class="row">
            <div class="col-md-4">
                <p>
                    <?=
                    Html::input('text', 'kata', '', [
                        'class' => 'form-control',
                        'placeholder' => 'Masukan Nomor Kartu Registrasi '
                    ]);
                    ?>

                </p>
            </div>
            <div class="col-md-4">
                <p>
                    <?=
                    Html::submitButton('Cari', [
                        'class' => 'btn btn-primary'
                    ])
                    ?>
                </p>   
            </div>
 <div class="col-md-4">
                <p>
                    <?=
                    Html::a('reset',['index'], [
                        'class' => 'btn btn-primary'
                    ])
                    ?>
                </p>   
            </div>
        </div>
        <?php \yii\bootstrap\ActiveForm::end() ?>

<?php      //               \yii\widgets\Pjax::begin(['id'=>'gridviewpjax']); ?>
        <?=
        GridView::widget([
            'id'=>'xxx',
            'dataProvider' => $dataProvider,
            'columns' => [
                'nik_npwp:text:Nik/NPWPD',
                'nama:text:Nama',
                'alamat:text:Alamat',
                'jenis:text:Reklame',
                'teks:text:Judul',
                'nokartu:text:No Kartu',
                [
                    'header' => 'Status Pengajuan Reklame',
                    'content' => function($data) {
//                        $status_reklame = $data['status_reklame'] == 0 ? 'Proses' : 'Tidak Aktif';
                switch ($data['status']){
                    case '0':
                        $status_reklame = 'Permohonan dibatal';
                        break;
                    case '1':
                        $status_reklame = 'Proses Pengajuan Permohonan';
                        break;
                    case '2':
                        $status_reklame = 'Permohonan disetujui';
break;                
default :
     $status_reklame = 'Pengajuan';
                }
                        return '<span class="label label-info">' . $status_reklame . '</span>';
                    }
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{tampil} {batal}',
                    'buttons' => [
                        'tampil' => function($url, $model) {
                            $nokartu= $model['nokartu'];
                            return Html::a('Tampil', ['view', 'nokartu' => $nokartu], [
                                        'class' => 'btn btn-info'
                            ]);
                        },
                        'batal'=>function($url,$model)
                        {
                           $nokartu = $model['nokartu'];
                           return Html::button('Batal',[
                               'class'=>'btn btn-danger',
                               'data'=>[
                                   'id'=>$nokartu
                               ],
                               'onclick'=>'cekkartu($(this).data("id"))'
                           ]);
                        }
                    ]
                ]
            ]
        ]);
        ?>
        <?php \yii\widgets\Pjax::end() ?>
    </div> 

</div>

<script type="text/javascript">
function cekkartu(nokartu)
{
    var nokartu = nokartu;
    
    $.get('<?= yii\helpers\Url::to(['batal']) ?>',{
        nokartu : nokartu
    })
            .done(function(data){
            if (data=='true'){
        $.pjax.reload({container:"#xxx"});
       //     alert(nokartu);
            }else{
             
            }
        })
//        //alert(nokartu);
}
</script>