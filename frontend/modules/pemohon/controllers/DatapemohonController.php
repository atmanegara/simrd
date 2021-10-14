<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace frontend\modules\pemohon\controllers;

/**
 * Description of datapemohon
 *
 * @author ACER
 */
use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\httpclient\Client;

class DatapemohonController extends Controller {

    public function actionDahsbor($id) {
        return $this->render('view', [
                    'id' => $id
        ]);
    }

    public function actionIndex() {
        $id = Yii::$app->session->get('id_pemohon');
        $kata = Yii::$app->request->post('kata');
        $query = (new \yii\db\Query())
                ->select('A.id as id_pemohon, A.nik_npwp,A.nama,A.jabatan,A.alamat,'
                        . 'B.id_reklame,B.banyak,B.waktu_mulai,B.waktu_akhir,'
                        . 'B.lokasi,B.teks,B.`status`,B.status_reklame,C.jenis,D.nokartu,D.tglreg')
                ->from('tbl_pemohon A')
                ->innerJoin('tbl_detail_pemohon B', 'A.id=B.id_pemohon')
                ->innerJoin('tbl_jenis_reklame C', 'B.id_reklame=C.id')
                ->innerJoin('tbl_registrasi D', 'B.nokartu = D.nokartu')
                ->groupBy('B.nokartu');
        if (!is_null($kata)) {
            $query->having(['A.id' => $id])
                    ->andHaving(['like', 'D.nokartu', $kata]);
        } else {
            $query->having(['A.id' => $id]);
        }
        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 5
            ],
        ]);
        return $this->render('index', [
                    'dataProvider' => $dataProvider
        ]);
    }
    public function actionInsertdetailreklame()
    {
        $request = Yii::$app->request;
        $ukuran1 = $request->post('ukuran1');
        $satuan1 = $request->post('satuan1');
        $ukuran2 = $request->post('ukuran2');
        $satuan2 = $request->post('satuan2');
        $sisi = $request->post('sisi');
        $nokartu = $request->post('nokartu');
     $model = new \backend\models\Temp();
     $model->id = null;
    $model->isNewRecord=true;
    $model->ukuran1 = $ukuran1;
    $model->satuan1 = $satuan1;
    $model->ukuran2 = $ukuran2;
    $model->satuan2 = $satuan2;
    $model->sisi = $sisi;
    $model->nokartu = $nokartu;
    $model->save();
            $count = (new \yii\db\Query())->select('*')->from('temp')->where(['nokartu'=>$nokartu])
                    ->count();
        echo $count;
    }
    public function actionHapus($id){
    
        $model = \backend\models\Temp::findOne($id);
        $nokartu = $model['nokartu'];
        $model->delete();
        
        $count = (new \yii\db\Query())
                ->select('*')
                ->from('temp')
                ->where(['nokartu'=>$nokartu])
                ->count();
        echo $count;
    }
    public function actionCreate() {
        $modelimg = new \backend\models\TblGambar();
        $modeldtlpemohon = new \backend\models\TblDetailPemohon();
        $dtlpemohonreklame = new \backend\models\DtlPemohonReklame();
        $id = Yii::$app->session->get('__id', '0');
        $id_pemohon = \backend\models\TblPemohon::find()->where(['id_user' => $id])->one();
        if (count($id_pemohon) <= 0) {
            \Yii::$app->session->setFlash('info', 'Isi identitas pribadi terlebih dahulu di menu Data Pribadi Pemohon');
            return $this->redirect(['index']);
        }
          $nokartux = 'RKL' . date('dmY') . $id_pemohon['id'];  
          $modeldtlpemohon->nokartu = $nokartux;
        if ($modeldtlpemohon->load(Yii::$app->request->post())) {
            if ($modeldtlpemohon->validate()) {

                $noid = rand(1, 999);
                $nokartu = 'RKL' . date('dmY') . $noid;       
                if (count($modeldtlpemohon->imageFile)==0) {
                    $modeldtlpemohon->path_gambar = '';
                    $modelimg->nokartu=$nokartu;
                    $modelimg->path_gambar='';
                         $modelimg->save();
                } else {
                    $modelimg->path_gambar = UploadedFile::getInstances($modeldtlpemohon, 'imageFile');
                  // return var_dump($modelimg->path_gambar);
                    foreach ($modelimg->path_gambar as $file) {
                     $path = $file->baseName . '.' . $file->extension;
                           $modelimg->id= Null;  
                    $modelimg->isNewRecord= true;
                    $modelimg->nokartu=$nokartu;
                    $modelimg->path_gambar=$path;
                     $modelimg->save();
                    $img = $_SERVER['DOCUMENT_ROOT'] . Yii::$app->params['pathUpload'] . $file->baseName . '.' . $file->extension;
                          $file->saveAs($img);
                    }
                }
                $id_pemohon = $id_pemohon['id'];
                $modeldtlpemohon->id_pemohon = $id_pemohon;
                $modeldtlpemohon->nokartu=$nokartu;
                $waktu_mulai= \Yii::$app->formatter->asDate($modeldtlpemohon->waktu_mulai, 'yyyy-MM-dd');
                $waktu_akhir= \Yii::$app->formatter->asDate($modeldtlpemohon->waktu_akhir, 'yyyy-MM-dd');
               $modeldtlpemohon->waktu_mulai=$waktu_mulai;
               $modeldtlpemohon->waktu_akhir=$waktu_akhir;
                $modeldtlpemohon->save();
                $id_detail_pemohon = $modeldtlpemohon->getPrimaryKey();

                $temp = (new \yii\db\Query())
                        ->select('*')
                        ->from('temp')
                        ->where(['nokartu'=>$nokartux])
                        ->all();
                     if (count($temp)>0)
                     {
                         foreach ($temp as $value) {
                           $dtlpemohonreklame->id=Null;
                           $dtlpemohonreklame->isNewRecord=true;
                           $dtlpemohonreklame->ukuran1=$value['ukuran1'];
                           $dtlpemohonreklame->satuan1=$value['satuan1'];
                           $dtlpemohonreklame->ukuran2=$value['ukuran2'];
                           $dtlpemohonreklame->satuan2=$value['satuan2'];
                           $dtlpemohonreklame->sisi=$value['sisi'];
                           $dtlpemohonreklame->id_detail_pemohon = $id_detail_pemohon;
                           $dtlpemohonreklame->nokartu = $nokartu;
                         $dtlpemohonreklame->save();
                         }   
                     }
                  $sql = "delete from temp where nokartu=:nokartu";
          $param =[
              ':nokartu'=>$nokartux
          ];
          Yii::$app->db->createCommand($sql,$param)->execute();
                $sql = "insert into tbl_registrasi (nokartu,tglreg,cara)"
                        . "values(:nokartu,:tglreg,:cara)";
                $param = [
                    ':nokartu' => $nokartu,
                    ':tglreg' => date('dmY'),
                    ':cara' => 1 //Online
                ];
                Yii::$app->db->createCommand($sql, $param)->execute();
//$response = \Yii::$app->onesignal->pushmsg('Pemohon Baru','ini pemohon baru reg '.$nokartu);
                return $this->redirect(['view',
                            'nokartu' => $nokartu,
                    
                ]);
            }
        } 
            $query = (new \yii\db\Query())
                    ->select('*')
                    ->from('temp')
                    ->where(['nokartu'=>$nokartux]);
            $dataProvider = new \yii\data\ActiveDataProvider([
                'query'=>$query,
                'pagination'=>
                [
                    'pageSize'=>5
                ]
            ]);
             return $this->render('create', [
                        'modeldtlpemohon' => $modeldtlpemohon,
                 'dataProvider'=>$dataProvider,
                     'nokartu'=>$nokartux,
                 'dtlpemohonreklame'=>$dtlpemohonreklame,
            ]);
        
    }

    public function actionView($nokartu) {
$model = (new \yii\db\Query())
        ->select("A.id as id_pemohon, A.nik_npwp,A.nama,A.jabatan,A.alamat,
B.id_reklame,B.banyak,B.waktu_mulai,B.waktu_akhir,
B.lokasi,B.teks,B.`status`,B.status_reklame,B.ket ,C.nokartu,C.tglreg,D.jenis")
        ->from('tbl_pemohon A')
        ->innerJoin('tbl_detail_pemohon B','A.id=B.id_pemohon')
        ->innerJoin('tbl_registrasi C','C.nokartu=B.nokartu')
        ->innerJoin('tbl_jenis_reklame D','B.id_reklame=D.id')
        ->innerJoin('dtl_pemohon_reklame E','E.id_detail_pemohon=B.id')
        ->where(['C.nokartu'=> $nokartu])
        ->one();
        
$query = \backend\models\TblGambar::findAll(['nokartu'=>$nokartu]);
$queryx = \backend\models\DtlPemohonReklame::findAll(['nokartu'=>$nokartu]);
        return $this->render('view', [
                    'model' => $model,
                    'query'=>$query,
                    'queryx'=>$queryx
        ]);
    }
    
    public function actionBatal($nokartu)
    {
        $model = (new \yii\db\Query())
                ->select('status_reklame')
                ->from('tbl_detail_pemohon')
                ->Where([
                    'nokartu'=>$nokartu,
                    'status'=>'2'])
               // ->orWhere(['status'=>'2'])
                ->count();
       if ($model>0){
         
           echo 'false';
          Yii::$app->session->setFlash('danger', 'Tidak Bisa dihapus');
          return $this->redirect(['index']);
       }else{
       //   $sql = "update tbl_detail_pemohon set status_reklame=0 where nokartu=:nokartu";
            $sql = "delete from tbl_detail_pemohon where nokartu=:nokartu";
          $param =[
              ':nokartu'=>$nokartu
          ];
          Yii::$app->db->createCommand($sql,$param)->execute();
       Yii::$app->session->setFlash('danger', 'Data Sudah ada');
       echo 'true';
       }
    }
public function actionUpdate($nokartu)
{
    $model = \backend\models\TblDetailPemohon::find()
            ->alias('A')
            ->select('A.banyak,A.id,A.id_pemohon,A.nokartu,A.id_reklame,B.jenis,A.waktu_mulai,A.waktu_akhir,A.lokasi,A.teks,B.jenis   ')
            ->innerJoin('tbl_jenis_reklame B','A.id_reklame=B.id')
            ->one();
    
    if ($model->load(Yii::$app->request->post())){
        $id = $model->id;
        $id_pemohon = $model->id_pemohon;
        $id_reklame = $model->id_reklame;
        $banyak     = $model->banyak;
//        $waktu_mulai = $model->waktu_mulai;
//        $waktu_akhir = $model->waktu_akhir;
                   $waktu_mulai= \Yii::$app->formatter->asDate($model->waktu_mulai, 'yyyy-MM-dd');
                $waktu_akhir= \Yii::$app->formatter->asDate($model->waktu_akhir, 'yyyy-MM-dd');
     
        $lokasi = $model->lokasi;
        $teks = $model->teks;
        $status = '1';
        $status_reklame = '2';
        $nokartuold = $model->nokartu;
         $noid = rand(1, 999);
         $nokartu = 'RKL' . date('dmY') . $noid;       
        $model = new \backend\models\TblDetailPemohon();
                $model->id= null;
                $model->isNewRecord=true;
        $model->id_pemohon = $id_pemohon;
        $model->id_reklame = $id_reklame;
        $model->banyak = $banyak;
        $model->waktu_mulai = $waktu_mulai;
        $model->waktu_akhir = $waktu_akhir;
        $model->lokasi = $lokasi;
        $model->teks = $teks;
        $model->status = $status;
        $model->status_reklame = $status_reklame;
        $model->nokartu = $nokartu;
        $model->nokartu_old=$nokartuold;
        if ($model->save())
        {
              $id_detail_pemohon = $model->getPrimaryKey();
             // return var_dump($id_detail_pemohon);
            $query = (new \yii\db\Query())
                    ->select('id_detail_pemohon,ukuran1,satuan1,ukuran2,satuan2,sisi,nokartu')
                    ->from('dtl_pemohon_reklame')
                    ->where(['nokartu'=>$nokartuold])
                    ->all();
            foreach ($query as  $value) {
                
            
            $model = new \backend\models\DtlPemohonReklame();
                 $model->isNewRecord=true;
            $model->id=null;
                  $model->id_detail_pemohon=$id_detail_pemohon;//$value['id_detail_pemohon'];
            $model->ukuran1=$value['ukuran1'];
            $model->satuan1=$value['satuan1'];
            $model->ukuran2=$value['ukuran2'];
            $model->satuan2=$value['satuan2'];
            $model->sisi=$value['sisi'];
            $model->nokartu=$nokartu;
            $model->save();
       
            }
              $sql = "insert into tbl_registrasi (nokartu,tglreg,cara)"
                        . "values(:nokartu,:tglreg,:cara)";
                $param = [
                    ':nokartu' => $nokartu,
                    ':tglreg' => date('dmY'),
                    ':cara' => 1 //Online
                ];
                Yii::$app->db->createCommand($sql, $param)->execute();
            return $this->redirect(['view','nokartu'=>$nokartu]);
        }
          //  return var_dump($model->getErrors());
      
    }
    
    return $this->render('update',[
        'model'=>$model
    ]);
}
}
