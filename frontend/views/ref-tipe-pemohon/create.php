<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\RefTipePemohon */

$this->title = 'Create Ref Tipe Pemohon';
$this->params['breadcrumbs'][] = ['label' => 'Ref Tipe Pemohons', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ref-tipe-pemohon-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
