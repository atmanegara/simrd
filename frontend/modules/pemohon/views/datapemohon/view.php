<?php

use yii\widgets\DetailView;

?>

<div class="panel panel-danger">
    <div class="panel-heading">Informasi Penting</div>
    <div class="panel-body">
        Nomor Kartu <font style="font-weight: 100%"><?= $model['nokartu'] ?></font> Harap Dicetak/difoto/dicatat,
        Kemudian Lakukan Konfirmasi dengan menelpon ke Admin Dinas BPPRD 
    </div>    
</div>
<p>
    <?=
    \yii\bootstrap\Html::a('Kembali', ['index'], [
        'class' => 'btn btn-info'
    ])
    ?>
     <?= 
    \yii\bootstrap\Html::a('Perpanjang',['update','nokartu'=>$model['nokartu']],[
        'class'=>'btn btn-warning'
    ])
        ?>
</p>

<?=
DetailView::widget([
    'model' => $model,
    'attributes' => [
        'nik_npwp:text:NIK/NPWP',
        'nama:text:Nama',
        'alamat:text:Alamat',
        'jenis:text:Reklame',
        'teks:text:Judul',
        'banyak:text:banyak',
        'nokartu:text:No Kartu',
        [
            'label'=>'Status Reklame',
            'format'=>'html',
            'value'=>function($model)
{
    switch ($model['status_reklame']){
        case '0':
            $status_reklame = 'Berhenti';
            break;
        case '1':
            $status_reklame = 'Baru';
            break;
        case '2':
            $status_reklame = 'perpanjang';
            break;
        
    }
    return '<span class="label label-warning">'.$status_reklame . '</span>';
            }
        ],
        [
          'label'=>'Status Permohonan',
            'format'=>'html',
           'value'=>function($model) {
//                        $status_reklame = $data['status_reklame'] == 0 ? 'Proses' : 'Tidak Aktif';
                switch ($model['status']){
                    case '0':
                        $status = 'Permohonan Pengajuan Dibatal';
                        break;
                    case '1':
                        $status = 'Proses pengajuan Permohonan';
                        break;
                    case '2':
                        $status = 'Pengajuan Permohonan Disetujui';
break;                
                }
                        return '<span class="label label-info">' . $status . '</span>';
                    }
        ],
        'ket:text:Keterangan'
    ]
])
?>
<table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Ukuran 1</th>
                <th>Satuan 1</th>
                <th>Ukuran 2</th>
                <th>Satuan 2</th>
            </tr>
        </thead>
        <tbody>
<?php
$no=1;
//var_dump($model);
foreach ($queryx as $value) {
  ?>

            <tr>
                <td><?=$no;?></td>
                <td><?=$value['ukuran1'] ?></td>
                <td><?=$value['satuan1'] ?></td>
                <td><?=$value['ukuran2'] ?></td>
                <td><?=$value['satuan2'] ?></td>
            </tr>    
    

<?php
$no++;
}
?>
                </tbody>
    </table>

 <table border="1" >
        <tbody>
               <tr>
            <?php
foreach($query as $value)
{
    ?>
           

                <td>
                    <p>
                    <?= \yii\helpers\Html::img(\yii\helpers\Url::to('@img/'.$value['path_gambar']),[
                        'style'=>'width:350px;height:350px'
                    ]) ?>
                    </p>
                </td>
        
<?php
}
?>    </tr>
    
    </tbody>
    </table>
