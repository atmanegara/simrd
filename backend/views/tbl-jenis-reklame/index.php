<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblJenisReklameSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Jenis Reklame';
$this->params['breadcrumbs'][] = $this->title;
?>
<p>
<?= Html::a('Buat Data Baru Jenis Reklame', ['create'], ['class' => 'btn btn-success']) ?>
</p>

<div class="tbl-jenis-reklame-index">

    <div class="panel panel-success">
        <div class="panel-heading">
            Data Jenis Reklame
        </div>
        <div class="panel-body">
            <?php Pjax::begin(); ?>    
            <?= $this->render('_search', ['model' => $searchModel]); ?>

            <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    //      'id',
                    'jenis',
                    'keterangan',
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]);
            ?>
<?php Pjax::end(); ?>            
        </div>
    </div>
</div>
