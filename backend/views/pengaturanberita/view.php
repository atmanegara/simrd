<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\TblBiaya */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Biayas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-biaya-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php
//        echo Html::a('Delete', ['delete', 'id' => $model->id], [
//            'class' => 'btn btn-danger',
//            'data' => [
//                'confirm' => 'Are you sure you want to delete this item?',
//                'method' => 'post',
//            ],
//        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            'role:text:Kode hak Akses',
            [
            'attribute'=>'role',
            'label'=>'Status Hak user',
            'value'=>function($data){
            switch ($data->role) {
    case '20':
        $statushak = "Programmer"; 
        break;
    case '30':
        $statushak = "Admin PTSP"; 
        break;
    case '40':
        $statushak = "Admin BPPRD"; 
        break;
    case '99':
        $statushak = "Superadmin"; 
        break;

    default:
        $statushak="Tamu";
        break;
}
    return $statushak;
            }
        ],
        ],
    ]) ?>

</div>
