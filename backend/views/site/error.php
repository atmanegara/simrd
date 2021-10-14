<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = $name;
?>
<section class="content">

    <div class="error-page">
        <h2 class="headline text-info"><i class="fa fa-warning text-yellow"></i></h2>

        <div class="error-content">
            <?php
            switch ($exception->statusCode) {
                case '400':
                    echo $this->render('error400');
                    break;
                case '403':
                    echo $this->render('error403');
                    break;
                case '404':
                    echo $this->render('error404');
                    break;
                case '500':
                    echo $this->render('error500');
                    break;
                case '503':
                    echo $this->render('error503');
                    break;

            }
            ?>
      
        </div>
    </div>

</section>
