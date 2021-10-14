<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace backend\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use backend\models\TblDetailPemohon;
use backend\models\TblDetailPemohonSearch;
use backend\models\TblPemohon;
use yii\web\UploadedFile;
use Mpdf\Mpdf;
use yii\data\SqlDataProvider;

/**
 * Description of PemohonController
 *
 * @author amandit
 */
class PemohonController extends Controller {

    //put your code here

    public function actionIndex() {
        $searchModel = new TblDetailPemohonSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate() {
        $model = new TblPemohon();

        if ($model->load(Yii::$app->request->post())) {

            $model->save();
            return $this->redirect(['createdetailpemohon', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    public function actionInsertdetail() {
        // $xid = isset('name') ;
        //  $detailpemohon = Yii::$app->request->get('TblDetailPemohon');
        $ukuran1 = Yii::$app->request->get('ukuran1');
        $satuan1 = Yii::$app->request->get('satuan1');
        $ukuran2 = Yii::$app->request->get('ukuran2');
        $satuan2 = Yii::$app->request->get('satuan2');
        $sisi = Yii::$app->request->get('sisi');
        $nokartu = Yii::$app->request->get('nokartu');
        $query = "insert into temp(ukuran1,satuan1,ukuran2,satuan2,sisi,nokartu)"
                . "values(:ukuran1,:satuan1,:ukuran2,:satuan2,:sisi,:nokartu)";
        $param = [
            ':ukuran1' => $ukuran1,
            ':satuan1' => $satuan1,
            ':ukuran2' => $ukuran2,
            ':satuan2' => $satuan2,
            ':sisi' => $sisi,
            ':nokartu' => $nokartu
        ];

        Yii::$app->db->createCommand($query)
                ->bindValues($param)
                ->execute();
        $count = (new \yii\db\Query())
                ->select('*')
                ->from('temp')
                ->where(['nokartu' => $nokartu])
                ->count();
        echo $count;
        //return $this->redirect(['createdetailpemohon','id'=>20]);
//            $provider = new \yii\data\ActiveDataProvider([
//                'query' => $query,
//                'pagination' => [
//                    'pageSize' => 5
//                ]
//            ]);
    }

    public function actionHapusitem($id, $nokartu) {
        $model = \backend\models\Temp::findOne($id)->delete();

        $count = (new \yii\db\Query())
                ->select('*')
                ->from('temp')
                ->where(['nokartu' => $nokartu])
                ->count();

        echo $count;
    }

    public function actionCreatedetailpemohon($id) {
        $model = new TblDetailPemohon();
        $modeldtlreklame = new \backend\models\DtlPemohonReklame();
        $modelimg = new \backend\models\TblGambar();
        $modelpemohon = TblPemohon::find()
                ->where(['id' => $id])
                ->one();

        //   $noid = rand(1, 999);
        $nokartux = 'RKL' . date('dmY') . $id;
        $model->nokartu = $nokartux;
        if ($model->load(Yii::$app->request->post())) {
              if ($model->validate()) {
                  
    //        return var_dump($model->imageFile);
            $noid = rand(1, 999);
            $nokartu = 'RKL' . date('dmY') . $noid;
            $model->nokartu = $nokartu;
            //Detail Pemohon
            $model->id_pemohon = $id;
            $waktu_awal = Yii::$app->formatter->asDate($model->waktu_mulai, 'yyyy-MM-dd');
            $waktu_akhir = Yii::$app->formatter->asDate($model->waktu_akhir, 'yyyy-MM-dd');
            $model->waktu_mulai = $waktu_awal;
            $model->waktu_akhir = $waktu_akhir;
            $model->save(false);
            $id = $model->getPrimaryKey();
            //
            $query = (new \yii\db\Query())
                    ->select('*')
                    ->from('temp')
                    ->where(['nokartu' => $nokartux])
                    ->all();
            if (count($query) > 0) {

                foreach ($query as $value) {
                    $modeldtlreklame->id = NULL;
                    $modeldtlreklame->isNewRecord = true;
                    $modeldtlreklame->id_detail_pemohon=$id;
                    $modeldtlreklame->ukuran1 = $value['ukuran1'];
                    $modeldtlreklame->satuan1 = $value['satuan1'];
                    $modeldtlreklame->ukuran2 = $value['ukuran2'];
                    $modeldtlreklame->satuan2 = $value['satuan2'];
                    $modeldtlreklame->sisi = $value['sisi'];
                    $modeldtlreklame->nokartu = $nokartu;
                    $modeldtlreklame->save();
                }
            }
               $modelimg->path_gambar = UploadedFile::getInstances($model, 'imageFile');
                 
            if (empty($modelimg->path_gambar)) {
                $path = '';
                $modelimg->nokartu = $nokartu;
            $modelimg->path_gambar = $path;
            $modelimg->save(false);
            } else {
             //   $modelimg->path_gambar = UploadedFile::getInstances($model, 'imageFile');
                foreach ($modelimg->path_gambar as $file) {
                    $path = $file->baseName . '.' . $file->extension;
                    $file->saveAs($_SERVER['DOCUMENT_ROOT'] . Yii::$app->params['pathUpload'] . $file->baseName . '.' . $file->extension);
                    $modelimg->id=null;
                    $modelimg->isNewRecord=true;
                    $modelimg->nokartu = $nokartu;
            $modelimg->path_gambar = $path;
            $modelimg->save(false);
                    
                }
            }
            $id_detail_pemohon = $model->getPrimaryKey();
            
            $sql = "insert into tbl_registrasi (nokartu,tglreg,cara)"
                    . "values(:nokartu,:tglreg,:cara)";
            $param = [
                ':nokartu' => $nokartu,
                ':tglreg' => Yii::$app->formatter->asDate(date('dmY'), 'yyyy-MM-dd'),
                ':cara' => 2  //Manual
            ];
            Yii::$app->db->createCommand($sql, $param)->execute();
            $sql = "delete from temp where nokartu=:nokartu";
            $param = [
                ':nokartu' => $nokartu,
            ];
            Yii::$app->db->createCommand($sql, $param)->execute();
            return $this->redirect(['view', 'id' => $model->id]);
        } }
            $query = (new \yii\db\Query())
                    ->select('*')
                    ->from('temp')
                    ->where(['nokartu' => $nokartux]);

            $provider = new \yii\data\ActiveDataProvider([
                'query' => $query,
                'pagination' => [
                    'pageSize' => 5
                ]
            ]);
            $dataimg = [];
            $imgpreviewconfig = [];
            // return var_dump($provider);
            return $this->render('createdetailpemohon', [
                        'model' => $model,
                        'modelpemohon' => $modelpemohon,
                        'dataProvider' => $provider,
                        'dataimg' => $dataimg,
                        'imgpreviewconfig' => $imgpreviewconfig,
                        'modeldtlreklame'=>$modeldtlreklame
            ]);
        
    }

    public function actionUpdate($id_pemohon, $nokartu) {
        $model = TblDetailPemohon::findOne(['nokartu' => $nokartu]);
        $modeldtlreklame =\backend\models\DtlPemohonReklame::findOne(['nokartu' => $nokartu]);
//          $modeldtlreklame =new \backend\models\DtlPemohonReklame();
   
        $modelimg = new \backend\models\TblGambar();
        $modelpemohon = TblPemohon::find()
                ->where(['id' => $id_pemohon])
                ->one();

        if ($model->load(Yii::$app->request->post())) {

            $model->id_pemohon = $id_pemohon;
         //   $noid = rand(1, 999);
            $nokartu = $model->nokartu;// 'RKL' . date('dmY') . $id_pemohon; //date('dmYhms') . $noid;
            $waktu_awal = Yii::$app->formatter->asDate($model->waktu_mulai, 'yyyy-MM-dd');
            $waktu_akhir = Yii::$app->formatter->asDate($model->waktu_akhir, 'yyyy-MM-dd');
            $model->waktu_mulai = $waktu_awal;
            $model->waktu_akhir = $waktu_akhir;
            $model->save(false);
       //     return var_dump($model->imageFile);
                $modelimg->path_gambar = UploadedFile::getInstances($model, 'imageFile');
            if (empty($modelimg->path_gambar)) {
                $path = '';
            } else {
                //      return var_dump($model->imageFile);
                $sql = "delete from tbl_gambar where nokartu=:nokartu";
                $param =[
                    ':nokartu'=>$nokartu
                ];
                Yii::$app->db->createCommand($sql,$param)->execute();
                foreach ($modelimg->path_gambar as $file) {
                    $path = $file->baseName . '.' . $file->extension;
                    $file->saveAs($_SERVER['DOCUMENT_ROOT'] . Yii::$app->params['pathUpload'] . $file->baseName . '.' . $file->extension);
            $modelimg->id=null;
            $modelimg->isNewRecord=true;
                    $modelimg->nokartu = $nokartu;
            $modelimg->path_gambar = $path;
            $modelimg->save(false);
                    }
            }
              $sql = "delete from dtl_pemohon_reklame where nokartu=:nokartu";
            $param = [
                ':nokartu' => $nokartu,
            ];
            Yii::$app->db->createCommand($sql, $param)->execute();
            $modeldtlreklame =new \backend\models\DtlPemohonReklame();
          
            $query = (new \yii\db\Query())
                    ->select('*')
                    ->from('temp')
                    ->where(['nokartu' => $nokartu])
                    ->all();
            if (count($query) > 0) {

                foreach ($query as $value) {
                    $modeldtlreklame->id = NULL;
                    $modeldtlreklame->isNewRecord = true;
                    $modeldtlreklame->id_detail_pemohon = $model->id;
                    $modeldtlreklame->ukuran1 = $value['ukuran1'];
                    $modeldtlreklame->satuan1 = $value['satuan1'];
                    $modeldtlreklame->ukuran2 = $value['ukuran2'];
                    $modeldtlreklame->satuan2 = $value['satuan2'];
                    $modeldtlreklame->sisi = $value['sisi'];
                    $modeldtlreklame->nokartu = $nokartu;
                    $modeldtlreklame->save();
                }
            }
              $sql = "delete from temp where nokartu=:nokartu";
            $param = [
                ':nokartu' => $nokartu,
            ];
            Yii::$app->db->createCommand($sql, $param)->execute();
//                  $model->save();
//            $id_detail_pemohon = $model->getPrimaryKey();
            return $this->redirect(['view', 'id' => $model->id]);
        }//}
            $count = (new \yii\db\Query())
                    ->select('*')
                    ->from('temp')
                    ->where(['nokartu' => $nokartu])
                    ->count();
            if ($count == 0) {
                $sql = "insert into temp(ukuran1,satuan1,ukuran2,satuan2,sisi,nokartu)"
                        . " select ukuran1,satuan1,ukuran2,satuan2,sisi,nokartu from dtl_pemohon_reklame"
                        . " where nokartu=:nokartu";
                $param = [
                    ':nokartu' => $nokartu
                ];
                \Yii::$app->db->createCommand($sql, $param)->execute();
                $query = (new \yii\db\Query())
                        ->select('*')
                        ->from('temp')
                        ->where(['nokartu' => $nokartu]);
            } else {
                $query = (new \yii\db\Query())
                        ->select('*')
                        ->from('temp')
                        ->where(['nokartu' => $nokartu]);
            }
            $provider = new \yii\data\ActiveDataProvider([
                'query' => $query,
                'pagination' => [
                    'pageSize' => 5
                ]
            ]);
            $query = (new \yii\db\Query())
                    ->select('tbl_gambar.path_gambar,tbl_gambar.id')
                    ->from('tbl_gambar')
                     ->where(['tbl_gambar.nokartu' => $nokartu])
                    ->all();

            $dataimg = [];
            $imgpreviewconfig = [];
            if (count($query) > 0) {
                foreach ($query as $data) {
                    $dataimg[] = \yii\helpers\Url::to('@img/' . $data['path_gambar']);
                    $imgpreviewconfig[] = [
                        'caption' => $data['path_gambar'],
                        'url' => \yii\helpers\Url::to(['hapusbyid', 'id' => $data['id']]),
                    ];
                }
            }

            return $this->render('updatedetailpemohon', [
                        'model' => $model,
                        'dataProvider' => $provider,
                        'dataimg' => $dataimg,
                        'modelpemohon' => $modelpemohon,
                        'imgpreviewconfig' => $imgpreviewconfig,
                'modeldtlreklame'=>$modeldtlreklame
            ]);
        
    }

    public function actionHapusbyid($id) {
        $modelx = \backend\models\TblGambar::find()
                ->where(['id' => $id])
                ->all();
        foreach ($modelx as $value) {
            //  return var_dump($value['path_gambar']);
            $path_file = $_SERVER['DOCUMENT_ROOT'] . Yii::$app->params['pathUpload'] . $value['path_gambar'];
            chmod($path_file, 0777);
            unlink($path_file);
        }
        $model = \backend\models\TblGambar::findOne($id)->delete();
        $query = (new \yii\db\Query())
                ->select('tbl_gambar.path_gambar,tbl_gambar.id')
                ->from('tbl_gambar')
                ->where(['tbl_gambar.id' => $id])
                ->all();

        $imgpreviewconfig = [];

        foreach ($query as $data) {
            //   $dataimg[] = \yii\helpers\Url::to('@img/'.$data['path_gambar']);
            $imgpreviewconfig[] = [
                'caption' => $data['path_gambar'],
                'width' => '100px',
                'url' => '', //\yii\helpers\Url::to(['hapusbyid','id'=>$data['id']]),
            ];
        }

        return \yii\helpers\Json::encode($imgpreviewconfig);
    }

    public function actionView($id) {
        $model = TblDetailPemohon::find()
                ->select('tbl_detail_pemohon.*,tbl_pemohon.nama as nama_pemohon,tbl_pemohon.nik_npwp,tbl_jenis_reklame.jenis as nama_reklame, '
                        . 'tbl_registrasi.nokartu,tbl_registrasi.tglreg,tbl_gambar.path_gambar')
                ->leftJoin('tbl_pemohon', 'tbl_detail_pemohon.id_pemohon=tbl_pemohon.id')
                ->leftJoin('tbl_jenis_reklame', 'tbl_detail_pemohon.id_reklame=tbl_jenis_reklame.id')
                ->leftJoin('tbl_registrasi', 'tbl_detail_pemohon.nokartu=tbl_registrasi.nokartu')
                ->leftJoin('tbl_gambar', 'tbl_detail_pemohon.nokartu=tbl_gambar.nokartu')
                 ->where(['tbl_detail_pemohon.id' => $id])
                ->one();
        $query = \backend\models\DtlPemohonReklame::find()
                ->where(['id_detail_pemohon'=>$id])
                ->all();
        return $this->render('view', [
                    'model' => $model,
            'query'=>$query
        ]);
    }

    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    //Cetak Surat Permohonan (SP)

    public function actionCetaksp($id) {
        $mpdf = new Mpdf();
//         $query = TblDetailPemohon::find()       
//                ->select('tbl_detail_pemohon.*,tbl_pemohon.nama as nama_pemohon,tbl_pemohon.nik_npwp,tbl_jenis_reklame.jenis as nama_reklame, '
//                        . 'tbl_registrasi.nokartu,tbl_registrasi.tglreg')
//                ->innerJoin('tbl_pemohon','tbl_detail_pemohon.id_pemohon=tbl_pemohon.id')
//                ->innerJoin('tbl_jenis_reklame','tbl_detail_pemohon.id_reklame=tbl_jenis_reklame.id')
//                ->innerJoin('tbl_registrasi','tbl_detail_pemohon.id=tbl_registrasi.id_detail_pemohon')
//         ->where(['tbl_detail_pemohon.id'=>$id])
//                 ->one();
        $sql = "select tbl_pemohon.nik_npwp, tbl_pemohon.nama, tbl_pemohon.jabatan, tbl_pemohon.alamat,
tbl_jenis_reklame.jenis, tbl_detail_pemohon.ukuran1,tbl_detail_pemohon.satuan1, tbl_detail_pemohon.ukuran2, tbl_detail_pemohon.satuan2,
tbl_detail_pemohon.banyak, tbl_detail_pemohon.waktu_mulai, tbl_detail_pemohon.waktu_akhir, tbl_detail_pemohon.lokasi,
tbl_detail_pemohon.teks,tbl_registrasi.nokartu,tbl_registrasi.tglreg from tbl_pemohon 
join tbl_detail_pemohon on tbl_pemohon.id = tbl_detail_pemohon.id_pemohon
join tbl_jenis_reklame on tbl_jenis_reklame.id = tbl_detail_pemohon.id_reklame 
join tbl_registrasi on tbl_detail_pemohon.id = tbl_registrasi.id_detail_pemohon
where tbl_detail_pemohon.id = :id
";
        $param = [
            ':id' => $id
        ];
        $query = Yii::$app->db->createCommand($sql, $param)->queryAll();
        $mpdf->WriteHTML(
                $this->renderPartial('rpt_skp_d', array(
                    'hasil' => $query
        )));

//                        ));
        $mpdf->Output();
    }

    protected function findModel($id) {
        if (($model = TblDetailPemohon::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionCreateold() {
        $model = new TblDetailPemohon();

        if ($model->load(Yii::$app->request->post())) {

            //Detail Pemohon
            $model->id_pemohon = $model->id_pemohon;

            $waktu_awal = Yii::$app->formatter->asDate($model->waktu_mulai, 'yyyy-MM-dd');
            $waktu_akhir = Yii::$app->formatter->asDate($model->waktu_akhir, 'yyyy-MM-dd');
            $model->waktu_mulai = $waktu_awal;
            $model->waktu_akhir = $waktu_akhir;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
                        'modelpemohon' => array('nama' => '',
                            'alamat' => '',
                            'jabatan' => '')
            ]);
        }
    }

}
