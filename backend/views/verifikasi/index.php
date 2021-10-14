<table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Pemohon</th>
                <th>Jenis Reklame</th>
                <th>Lokasi</th>
                <th>Status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
<?php
$no=1;
foreach ($model as $models) {
    
    ?>
            <tr>
                <td><?=$models->nama_pemohon;?></td>
                <td><?=$models->nama_reklame;?></td>
                <td><?=$models->lokasi; ?></td>
                <td><?= $models->status==1 ? '<button type="button" class="btn bg-maroon btn-flat margin">Setuju</button>' : '<button type="button" class="btn bg-orange btn-flat margin">Gagal</button>'; ?></td>
                <td><?=yii\bootstrap\Html::a('Tampil', yii\helpers\Url::to(['view','id'=>$models->id]),[
                    'class'=>'btn btn-primary'
                ]);?></td>
            </tr>

<?php
}
?>
        </tbody>
    </table>
<?=
\yii\widgets\LinkPager::widget([
    'pagination'=>$pagination
])
?>