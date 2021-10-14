<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblPemohonSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Pemohon';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-pemohon-index">

   
    <p>
        <?= Html::a('Data Baru', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="panel panel-danger">
        <div class="panel-heading">
            Data Pemohon
        </div>
        <div class="panel-body">
<?php Pjax::begin(); ?>   
 <?php echo $this->render('_search', ['model' => $searchModel]); ?>

 <?= GridView::widget([
        'dataProvider' => $dataProvider,
    //    'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

     //       'id',
            'nik_npwp:text:NIK/NPWPD',
            'nama:text:Nama',
            'jabatan:text:Jabatan',
            'alamat:text:Alamat',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?>            
        </div>
    </div>
</div>
