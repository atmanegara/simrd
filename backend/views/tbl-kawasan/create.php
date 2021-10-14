<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TblKawasan */

$this->title = 'Data Baru Kawasan';
$this->params['breadcrumbs'][] = ['label' => 'Data Baru Kawasan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-kawasan-create">

    <div class="panel panel-success">
        <div class="panel-heading">
            Data Kawasan
        </div>
        <div class="panel-body">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

            
        </div>
    </div>   
</div>
