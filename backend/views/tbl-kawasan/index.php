<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblKawasanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Kawasan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-kawasan-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Buat Data Baru Kawasan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="panel panel-success">
        <div class="panel-heading">
            Data Kawasan
        </div>
        <div class="panel-body">
        <?php Pjax::begin(); ?>  
             <?= $this->render('_search', ['model' => $searchModel]); ?>

        <?= GridView::widget([
        'dataProvider' => $dataProvider,
      //  'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

       //     'id',
            'nama',
            'keterangan',
            'persen',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?>
        </div>
    </div>
</div>
