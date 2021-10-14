<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use backend\models\TblDetailPemohon;

class VerifikasiController extends Controller{
    
    public function actionIndex()
    {
       $query = TblDetailPemohon::find()
               ->select('tbl_detail_pemohon.*,tbl_pemohon.nama as nama_pemohon,tbl_jenis_reklame.jenis as nama_reklame')
               ->innerJoin('tbl_pemohon','tbl_detail_pemohon.id_pemohon=tbl_pemohon.id')
               ->innerJoin('tbl_jenis_reklame','tbl_detail_pemohon.id_reklame=tbl_jenis_reklame.id');
       $count = $query->count();
       $pagination = new \yii\data\Pagination([
           'totalCount'=>$count,
           'defaultPageSize'=>5
       ]);
       
       $model = $query->offset($pagination->offset)
               ->limit($pagination->limit)
               ->all();
       return $this->render('index', [
           'model'=>$model,
           'pagination'=>$pagination
       ]);
    }
    
    public function actionView($id)
    {
        $query = TblDetailPemohon::findOne($id);
        
        return $this->render('view',[
            'model'=>$query
        ]);
    }
    
    public function actionStatusverifikasi()
    {
        $request = Yii::$app->request->post('TblDetailPemohon');
        $id = $request['id'];
        $status = $request['status'];
        
        $query = "update tbl_detail_pemohon set status=:status where id=:id";
        $param = [
            ':id'=>$id,
            ':status'=>$status
        ];
        $model = Yii::$app->db->createCommand($query,$param)->execute();
      return $this->redirect(['index']);
    }
    
   
}

