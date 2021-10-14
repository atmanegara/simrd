<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\TblKawasan */

$this->title ='Data Kawasan';
$this->params['breadcrumbs'][] = ['label' => 'Data Kawasan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-kawasan-view">

    <p>
        <?= Html::a('Kembali', ['index'], ['class' => 'btn btn-info']) ?>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
             <?= Html::a('Tambah Data Baru Kawasan', ['create'], ['class' => 'btn btn-warning']) ?>
       </p>
       <div class="panel panel-success">
           <div class="panel-heading">
               Data Kawasan
           </div>
           <div class="panel-body">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'id',
            'nama',
            'keterangan',
            'persen',
        ],
    ]) ?>
               
           </div>
       </div>

</div>
