<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TblDetailPemohon */

$this->title = 'Data Detail Pemohon Baru';
$this->params['breadcrumbs'][] = ['label' => 'Data Detail Pemohon Baru', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-detail-pemohon-create">
 
      <?= $this->render('_form_detail_pemohon', [
        'model' => $model,
          'modelpemohon'=>$modelpemohon,
          'dataProvider'=>$dataProvider,
          'dataimg'=>$dataimg,
              'imgpreviewconfig'=>$imgpreviewconfig,
          'modeldtlreklame'=>$modeldtlreklame
         ]) ?>
    


</div>
