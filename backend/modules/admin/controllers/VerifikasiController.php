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

/**
 * Description of VerifikasiController
 *
 * @author amandit
 */
class VerifikasiController extends Controller{
    //put your code here
    
      public function actionIndex()
    {
       $query = TblDetailPemohon::find()
         ->select('tbl_detail_pemohon.*,'
                       . 'tbl_pemohon.nama as nama_pemohon,'
                       . 'tbl_jenis_reklame.jenis as nama_reklame,'
                       . 'tbl_skpd.npwp_d,tbl_skpd.bunga,tbl_skpd.kenaikan,tbl_skpd.sisi,tbl_skpd.subtotal,tbl_skpd.kali,'
                       . 'tbl_kawasan.nama as nama_kawasan')
               ->innerJoin('tbl_pemohon','tbl_detail_pemohon.id_pemohon=tbl_pemohon.id')
               ->innerJoin('tbl_jenis_reklame','tbl_detail_pemohon.id_reklame=tbl_jenis_reklame.id')
               ->innerJoin('tbl_skpd','tbl_detail_pemohon.id=tbl_skpd.id_detail_pemohon')
               ->innerJoin('tbl_kawasan','tbl_skpd.id_kawasan=tbl_kawasan.id');
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
        $query = TblDetailPemohon::find()
               ->select('tbl_detail_pemohon.*,'
                       . 'tbl_pemohon.nama as nama_pemohon,'
                       . 'tbl_jenis_reklame.jenis as nama_reklame,'
                       . 'tbl_skpd.npwp_d,tbl_skpd.bunga,tbl_skpd.kenaikan,tbl_skpd.sisi,tbl_skpd.subtotal,tbl_skpd.kali,'
                       . 'tbl_kawasan.nama as nama_kawasan')
               ->innerJoin('tbl_pemohon','tbl_detail_pemohon.id_pemohon=tbl_pemohon.id')
               ->innerJoin('tbl_jenis_reklame','tbl_detail_pemohon.id_reklame=tbl_jenis_reklame.id')
               ->innerJoin('tbl_skpd','tbl_detail_pemohon.id=tbl_skpd.id_detail_pemohon')
               ->innerJoin('tbl_kawasan','tbl_skpd.id_kawasan=tbl_kawasan.id')
                ->where(['tbl_detail_pemohon.id'=>$id])
        ->one();
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
