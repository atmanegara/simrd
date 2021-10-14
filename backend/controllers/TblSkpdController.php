<?php

namespace backend\controllers;

use Yii;
use backend\models\TblSkpd;
use backend\models\TblSkpdSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
/**
 * TblSkpdController implements the CRUD actions for TblSkpd model.
 */
class TblSkpdController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all TblSkpd models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblSkpdSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblSkpd model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TblSkpd model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TblSkpd();
        $modelkawasan = \backend\models\TblKawasan::find()->all();

        if ($model->load(Yii::$app->request->post())) {
            $request = Yii::$app->request;
            $model->kali = $request->post('kali');
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'modelkawasan' =>$modelkawasan,
                'modelsewa'=> array()
            ]);
        }
    }
    

    /**
     * Updates an existing TblSkpd model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $sql = "select A.nama, A.alamat, A.nik_npwp, C.jenis,C.keterangan, B.lokasi, B.waktu_mulai, B.waktu_akhir,"
                . "B.ukuran1, B.ukuran2, B.satuan1, B.satuan2, B.banyak, B.sisi, E.harga_dasar, F.persen from tbl_detail_pemohon B "
                . "left join tbl_pemohon A on B.id_pemohon=A.id "
                . "left join tbl_jenis_reklame C on B.id_reklame=C.id "
                . "left join tbl_skpd D on D.id_detail_pemohon=B.id "
                . "left join tbl_sewa E on E.id = D.id_sewa "
                . "left join tbl_kawasan F on F.id=D.id_kawasan "
                . "where D.id=:id";
        $sql2 = "select A.id, A.nama, A.persen from tbl_kawasan A inner join "
                . "tbl_skpd B on A.id=B.id_kawasan where B.id=:id";
        $sql3 = "select C.id, C.masa_pajak, C.harga_dasar from tbl_detail_pemohon A "
                . "inner join tbl_jenis_reklame B on A.id_reklame=B.id "
                . "inner join tbl_sewa C on B.id=C.id_jenis_reklame "
                . "inner join tbl_skpd D on D.id_detail_pemohon=A.id "
                . "where D.id=:id";
        $param = [
            'id'=>$id,
        ];
        $modeldata = Yii::$app->db->createCommand($sql,$param)->queryOne();
        $modelkawasan =Yii::$app->db->createCommand($sql2,$param)->queryAll();
        $modelsewa =Yii::$app->db->createCommand($sql3, $param)->queryAll();
        $modelsewa2 = \yii\helpers\ArrayHelper::map($modelsewa, 'id', 'masa_pajak');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'modeldata' => $modeldata,
                'modelkawasan' => $modelkawasan,
                'modelsewa' => $modelsewa2
            ]);
        }
    }

    /**
     * Deletes an existing TblSkpd model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TblSkpd model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TblSkpd the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblSkpd::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /*
     * Ambil Data
     */
    
    public function actionGetAllPemohon()
    {
        $id= Yii::$app->request->post('id');
        
        $sql = "select C.id, C.masa_pajak, C.harga_dasar from tbl_detail_pemohon A "
                . "inner join tbl_jenis_reklame B on A.id_reklame=B.id "
                . "inner join tbl_sewa C on B.id=C.id_jenis_reklame "
                . "where A.id=:id";
        $param = [
            'id'=>$id,
        ];
        $data = Yii::$app->db->createCommand($sql,$param)->queryAll();
       
        return Json::encode($data);//$data;
    }
    public function actionGetDetailPemohon($id)
    {
        
        $sql = "select A.nama, A.alamat, A.nik_npwp, C.jenis, C.keterangan, B.lokasi, B.waktu_mulai, B.waktu_akhir,"
                . "B.ukuran1, B.ukuran2, B.satuan1, B.satuan2, B.banyak, B.sisi from tbl_detail_pemohon B "
                . "left join tbl_pemohon A on B.id_pemohon=A.id "
                . "left join tbl_jenis_reklame C on B.id_reklame=C.id "
//                . "left join tbl_sewa D on D.id_jenis_reklame=C.id "
                . "where B.id=:id";
        $param = [
            'id'=>$id,
        ];
        $data = Yii::$app->db->createCommand($sql,$param)->queryOne();
//       $data['sql']=$sql;
        return Json::encode($data);//$data;
    }
    
    public function actionGetKawasan($id){
        $sql = "select persen from tbl_kawasan where id=:id";
        $param = [
            'id'=>$id
        ];
        $data = \Yii::$app->db->createCommand($sql, $param)->queryOne();
        return Json::encode($data);
    }
}
