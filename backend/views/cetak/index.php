<?php 
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Alert;
?>
<?php 
//Alert::widget([
//'options' => ['class' => 'alert-info'],
//'body' => Yii::$app->session->getFlash('postDeleted'),
//]);?>

<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
      //  'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
              'attribute'=>'id_pemohon',
              'header'=>'Nama Pemohon',
              'value'=>function($model){
                    $pemohon = \backend\models\TblPemohon::findOne($model['id_pemohon']);
                    return $pemohon['nama'];
              }
            ],
            'ukuran1',
            'satuan1',

//            'id',
//            'id_pemohon',
//            'id_reklame',
//            'ukuran1',
//            'satuan1',
            // 'ukuran2',
            // 'satuan2',
            // 'banyak',
            // 'waktu_mulai',
            // 'waktu_akhir',
            // 'lokasi',
            // 'teks',
            // 'path_gambar',
            // 'status',
            // 'status_reklame',

            ['class' => 'yii\grid\ActionColumn',
                'template'=>'{download}',
                'buttons'=>[
                    'download'=> function ($url,$model)
{
    $id = $model->id;
//    $url = yii\helpers\Url::to(['cetak'],'id'=>$id);
    return \yii\helpers\Html::a('Download',['cetak'],[
        'class'=>'btn btn-primary',
        'data'=>[
            'params'=>['id'=>$id],
         'method'=>'post'   
        ]    ]);
                    }
                ]
                ],
        ],
    ]); ?>
<?php Pjax::end(); ?>