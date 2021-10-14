<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TblBiaya */

$this->title = 'Create Tbl Biaya';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Biayas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-biaya-create">

  
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
