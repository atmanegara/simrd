<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblSkpdSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data SKP-D';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-skpd-index">


    <p>
<?= Html::a('Tambah Data Baru SKP-D', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="table-responsive">
        <div class="panel panel-success">
            <div class="panel-heading">
                Data SKP-D
            </div>
            <div class="panel-body">
                <p>
<?= $this->render('_search', ['model' => $searchModel]); ?>
                    
                </p>
            <?php Pjax::begin(); ?>    
            <?=
            GridView::widget([
                'tableOptions' => ['class' => 'table table-bordered'],
                'dataProvider' => $dataProvider,
                //   'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
//            'id',
//            'id_detail_pemohon',
                    [
                        'attribute' => 'id_detail_pemohon',
                        'header' => 'Teks',
                        'value' => function($model) {
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
                    'subtotal',
//            'id_kawasan',
//            'id_sewa',
//            'npwp_d',
                    // 'bunga',
                    // 'kenaikan',
                    // 'subtotal',
                    // 'no_urut',
                    // 'sisi',
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]);
            ?>
<?php Pjax::end(); ?>
                
            </div>
        </div>
    </div>
</div>