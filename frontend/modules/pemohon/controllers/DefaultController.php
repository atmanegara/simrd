<?php

namespace frontend\modules\pemohon\controllers;

use yii\web\Controller;

/**
 * Default controller for the `pemohon` module
 */
class DefaultController extends Controller {

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex() {
        $pengumuman = " DiBeritahukan kepada calon pemohon/Pemohon lama, untuk segara bayar pajak";
        return $this->render('index', [
                    'pengumuman' => $pengumuman
        ]);
    }

}
