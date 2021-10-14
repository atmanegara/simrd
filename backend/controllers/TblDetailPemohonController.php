<?php

namespace backend\controllers;

use Yii;
use backend\models\TblDetailPemohon;
use backend\models\TblDetailPemohonSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TblDetailPemohonController implements the CRUD actions for TblDetailPemohon model.
 */
class TblDetailPemohonController extends Controller
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
     * Lists all TblDetailPemohon models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblDetailPemohonSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblDetailPemohon model.
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
     * Creates a new TblDetailPemohon model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TblDetailPemohon();
            
        if ($model->load(Yii::$app->request->post())) {
            
//            $nama_pemohon = $model->nama_pemohon;
//            $alamat_pemohon = $model->alamat_pemohon;
//            $nik_npwp = $model->nik_npwp;
//            $jabatan_pemohon = $model->jabatan_pemohon;
//            
//            $modelPemohon = New \backend\models\TblPemohon();
//            $modelPemohon->nama = $nama_pemohon;
//            $modelPemohon->alamat = $alamat_pemohon;
//            $modelPemohon->nik_npwp = $nik_npwp;
//            $modelPemohon->jabatan = $jabatan_pemohon;
//           if ($modelPemohon->validate()){
//            $modelPemohon->save();
//               
//           }else{
//              return $this->render('create', [
//                'model' => $model,
//            ]);
// 
//           }
//             $idPemohon = $modelPemohon->getPrimaryKey();
            
             //Detail Pemohon
            $model->id_pemohon = $model->id_pemohon;
//            $waktu_awal = $model->waktu_mulai;
//            $waktu_akhir =  $model->waktu_akhir;
            $waktu_awal = Yii::$app->formatter->asDate($model->waktu_mulai, 'yyyy-MM-dd');
            $waktu_akhir = Yii::$app->formatter->asDate($model->waktu_akhir, 'yyyy-MM-dd');
            $model->waktu_mulai = $waktu_awal;
            $model->waktu_akhir = $waktu_akhir;
                    $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'modelpemohon' => array('nama'=>'',
                    'alamat'=>'',
                    'jabatan'=>'')
            ]);
        }
    }

    /**
     * Updates an existing TblDetailPemohon model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
//        $modelpemohon = \backend\models\TblPemohon::findOne(['id'=>$id]);
        $sql = "select a.id, a.nama, a.jabatan, a.alamat from tbl_pemohon a inner join tbl_detail_pemohon b on a.id=b.id_pemohon where b.id=:id";
        $param = [
            'id'=>$id,
        ];
        $modelpemohon = Yii::$app->db->createCommand($sql,$param)->queryOne();
        
         $waktu_awal = Yii::$app->formatter->asDate($model->waktu_mulai, 'yyyy-MM-dd');
            $waktu_akhir = Yii::$app->formatter->asDate($model->waktu_akhir, 'yyyy-MM-dd');
            $model->waktu_mulai = $waktu_awal;
            $model->waktu_akhir = $waktu_akhir;
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            
            return $this->render('update', [
                'model' => $model,
                'modelpemohon'=>$modelpemohon
            ]);
        }
    }

    /**
     * Deletes an existing TblDetailPemohon model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function beforeAction($action) {
        Yii::$app->request->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TblDetailPemohon model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TblDetailPemohon the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblDetailPemohon::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionGetpemohon($kode)
    {
//        $model = $this->findModel($kode);
//        $id_pemohon = isset($_REQUEST['id']) ? ($_REQUEST['id']) : '';
//        $sql = "select * from tbl_pemohon where id=1";        
//        $data = Yii::app()->db->createCommand($sql)->queryAll();
         $data= \backend\models\TblPemohon::findOne(['id'=>$kode]);
        return \yii\helpers\Json::encode($data);
        
    }
    public function actionInsertdetail($id_pemohon, $id_reklame, $ukuran1, $satuan1, $ukuran2, $satuan2, $banyak, $sisi, $waktu_mulai, $waktu_akhir, $lokasi, $teks){
//        $sql="insert into tbl_detail_pemohon (id_pemohon, id_reklame, ukuran1, satuan1, ukuran2, satuan2, banyak, waktu_mulai, waktu_akhir, lokasi, teks, sisi) values "
//                . "()";
        $detpem = new TblDetailPemohon;
        $detpem->id_pemohon = $id_pemohon;
        $detpem->id_reklame = $id_reklame;
        $detpem->ukuran1 = $ukuran1;
        $detpem->ukuran2 = $ukuran2;
        $detpem->satuan1 = $satuan1;
        $detpem->satuan2 = $satuan2;
        $detpem->banyak=$banyak;
        $detpem->sisi = $sisi;
        $detpem->waktu_mulai=$waktu_mulai;
        $detpem->waktu_akhir=$waktu_akhir;
        $detpem->lokasi=$lokasi;
        $detpem->teks=$teks;
        $detpem->save();
        return true;
    }
    
}
