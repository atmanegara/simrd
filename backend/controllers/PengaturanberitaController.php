<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class PengaturanberitaController extends Controller{
    
       public function behaviors()
{
    return [
          'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        'access' => [
            'class' => AccessControl::className(),
            'rules' => [
               [
                    'allow' => true,
                   'actions' => ['index'],
                //    'roles' => ['cetak'],
                ],
                [
                    'allow' => true,
                    'actions' => ['update','create'],
                   // 'roles' => ['programmer'],
                ],
                [
                    'allow' => true,
                    'actions' => ['view'],
                   // 'roles' => ['createPost'],
                ],
//                [
//                    'allow' => true,
//                    'actions' => ['update'],
//                    'roles' => ['updatePost'],
//                ],
//                [
//                    'allow' => true,
//                    'actions' => ['delete'],
//                    'roles' => ['deletePost'],
//                ],
            ],
        ],
    ];
}

public function actionIndex()
{
    $query = (new \yii\db\Query())
            ->select('id,kode_about,uraian')
            ->from('ref_about');
    
    $dataProvider = new \yii\data\ActiveDataProvider([
        'query'=>$query,
        'pagination'=>[
            'pageSize'=>5
        ],
    
    ]);
    return $this->render('index',[
        'dataProvider'=>$dataProvider
    ]);
}
 /**
     * Displays a single TblDetailPemohon model.
     * @param integer $id
     * @return mixed
     */
public function actionView()
{
    $id = Yii::$app->request->get('id');
 return $this->render('view', [
            'model' => \common\models\User::findOne($id),
        ]);
}

public function actionUpdate()
{
       $id = Yii::$app->request->get('id');
    $model = \common\models\User::findOne($id);
    
    if($model->load(Yii::$app->request->post()))
    {
        $model->save();
        
        return $this->redirect(['view', 'id' => $model->id]);
    }else{
        return $this->render('update', [
                'model' => $model,
            ]);
    }
}

public function actionCreate()
{
    $model = new \backend\models\RefBerita();
    
    if ($model->load(Yii::$app->request->post()))
    {
        if($model->validate())
        {
            $model->save();
            return $this->redirect(['view','id'=>$model->id]);
        }else{
            Yii::$app->session->setFlash('danger','Gagal disimpan');
            return $this->render('create',[
                'model'=>$model
            ]);
        }
            
        
    }
    return $this->render('create',[
                'model'=>$model
            ]);
}
}
