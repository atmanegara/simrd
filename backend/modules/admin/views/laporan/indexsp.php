<?php 
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Alert;
?>
<?php 
$this->title="Data Pemohon";
?>
<div class="panel panel-success">
    <div class="panel-heading">
        Data Pemohon
    </div>
   
    <div class="panel-body">
    <?php Pjax::begin(); ?>   
             <?php echo $this->render('_searchsp', ['model' => $searchModel]); ?>

<?= GridView::widget([
        'dataProvider' => $dataProvider,
   //   'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'nokartu:text:No Kartu',
            [
              'attribute'=>'id_pemohon',
              'header'=>'Nama Pemohon',
              'value'=>function($model){
                    $pemohon = \backend\models\TblPemohon::findOne($model['id_pemohon']);
                    return $pemohon['nama'];
              }
            ],
            'nama_reklame:text:Nama Reklame',
            //'satuan1',


            ['class' => 'yii\grid\ActionColumn',
                'template'=>'{download}',
                'buttons'=>[
                    'download'=> function ($url,$model)
{
    $id = $model->nokartu;
//    $url = yii\helpers\Url::to(['cetak'],'id'=>$id);
    return \yii\helpers\Html::a('Download',['cetaksp'],[
        'class'=>'btn btn-primary',
        'data'=>[
            'params'=>['nokartu'=>$id],
         'method'=>'post'   
        ]    ]);
                    }
                ]
                ],
        ],
    ]); ?>
<?php Pjax::end(); ?>
    </div>
   
</div>
