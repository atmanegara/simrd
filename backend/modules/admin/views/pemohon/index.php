<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblDetailPemohonSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Pemohon';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-detail-pemohon-index">

    

    <p>
        <?= Html::a('Buat Pemohon Baru', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="panel panel-success">
        <div class="panel-heading">
            Daftar Pemohon
        </div>
        <div class="panel-body">
<?php Pjax::begin(); ?> 
            <p>
                 <?= $this->render('_search', ['model' => $searchModel]); ?>
            </p>
<?= GridView::widget([
        'dataProvider' => $dataProvider,
     //   'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nokartu:text:No Kartu Registrasi',
          
          [
              'attribute'=>'id_pemohon',
              'header'=>'Nama Pemohon',
              'value'=>function($model)
{
    $pemohon = \backend\models\TblPemohon::findOne($model['id_pemohon']);
    
    return $pemohon['nama'];
              }
          ],  
                  'nama_reklame:text:Jenis Reklame',
          //  'ukuran1',
           // 'satuan1',

            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{view} {update} {delete}',
                'buttons'=>[
                    'view'=>function($url,$model)
          {
              $id = $model['id'];
              
              return \yii\bootstrap\Html::a('View',['view','id'=>$id],
                      ['class'=>'btn btn-info']);
                    },

                    'update'=>function($url,$model)
          {
              $nokartu = $model['nokartu'];
              $id_pemohon = $model['id_pemohon'];
              return \yii\bootstrap\Html::a('Ubah',['update','id_pemohon'=>$id_pemohon,'nokartu'=>$nokartu],
                      ['class'=>'btn btn-warning']);
                    },

                    'delete'=>function($url,$model)
          {
              $id = $model['id'];
              
              return \yii\bootstrap\Html::a('Hapus',['delete','id'=>$id],
                      ['class'=>'btn btn-danger',
                            'data' => [
                'confirm' => 'Apakah anda yakin ingin menghapus item ini?',
                'method' => 'post',
            ]]);
                    },                            
                ]
                ],
        ],
    ]); ?>
<?php Pjax::end(); ?>            
        </div>
    </div>
</div>
