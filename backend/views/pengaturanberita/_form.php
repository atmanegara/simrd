<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TblBiaya */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
    <div class="col-md-3">
<?= yii\bootstrap\Html::button('page 1',[
    'onclick'=>'muncul()',
    'class'=>'btn btn-primary'
]) ?>
        
    </div>
    <div class="col-md-3">
        
    </div>
    <div class="col-md-3">
        
    </div>
</div>
<div class="tbl-biaya-form" id="page">

</div>

<script>
function muncul()
{
  $("#page").html("<?= $this->render('_form_1', [
        'model' => $model,
    ]) ?>");
}
</script>
    