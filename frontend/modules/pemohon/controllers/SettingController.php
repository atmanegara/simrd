<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace frontend\modules\pemohon\controllers;

use Yii;
use yii\web\Controller;

/**
 * Description of SettingController
 *
 * @author amandit
 */
class SettingController extends Controller {

    //put your code here


    public function actionIndex() {

        $id = Yii::$app->session->get('__id', '0');
        $status = 'Y';
        $model = \backend\models\TblPemohon::find()
                ->where(['id_user' => $id])
                ->one();

        if (count($model) <= 0) {
            $model = [];
            $status = 'N';
        }

        return $this->render('index', [
                    'model' => $model,
                    'id' => $id,
                    'status' => $status
        ]);
    }

    public function actionCreate() {
        $model = new \backend\models\TblPemohon();

        if ($model->load(Yii::$app->request->post())) {
            $id_user = Yii::$app->session->get('__id');
            $model->id_user = $id_user;
            if ($model->save()) {

                \Yii::$app->session->setFlash('success', 'Data Sukses Disimpan');
                $id_pemohon = $model->getPrimaryKey();

                Yii::$app->session->set('id_pemohon', $id_pemohon);
                return $this->redirect(['index']);
            }
        }
        return $this->render('create', [
                    'model' => $model
        ]);
    }

    public function actionUpdate($id) {
        $model = \backend\models\TblPemohon::find()
                ->where(['id_user' => $id])
                ->one();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                \Yii::$app->session->setFlash('success', 'Data Sukses Disimpan');
                return $this->redirect(['index']);
            }
        } else {
            return $this->render('update', [
                        'model' => $model
            ]);
        }
    }

}
