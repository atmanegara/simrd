<?php

use yii\grid\GridView;
use yii\widgets\Pjax;
?>
<?php echo $this->render('../tbl-skpd/_search', ['model' => $searchModel]); ?>

<?php Pjax::begin(); ?>   
<?=

GridView::widget([
    'dataProvider' => $dataProvider,
    //  'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
//        'id',
//        'id_detail_pemohon',
        [
              'attribute'=>'id_detail_pemohon',
              'header'=>'Teks',
              'value'=>function($model){
                    $teks = \backend\models\TblDetailPemohon::findOne($model['id_detail_pemohon']);
                    return $teks['teks'];
              }
        ],
        [
            'header' => 'Nama Pemohon',
            'value' => function($model) {
                return $model->nama;
            }
        ],
        [
            'header' => 'Nama Kawasan',
            'value' => function($model) {
                return $model->nama_kawasan;
            }
        ],
        // 'id_kawasan',
        //  'id_sewa',
        'subtotal',
        ['class' => 'yii\grid\ActionColumn',
            'template' => '{download}',
            'buttons' => [
                'download' => function ($url, $model) {
                    $id = $model->id;
//    $url = yii\helpers\Url::to(['cetak'],'id'=>$id);
                    return \yii\helpers\Html::a('Download', ['cetak'], [
                                'class' => 'btn btn-primary',
                                'data' => [
                                    'params' => ['id' => $id],
                                    'method' => 'post'
                        ]]);
                }
            ]
        ],
    ],
]);
?>
<?php Pjax::end(); ?>