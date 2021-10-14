<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace backend\modules\admin\controllers;
use Yii;
use Mpdf\Mpdf;
use yii\web\Controller;

/**
 * Description of Laporan
 *
 * @author amandit
 */
class LaporanController extends Controller{
    //put your code here
    
    
    public function actionIndexsp()
            //Index Surat Permohonan
    {
          $searchModel = new \backend\models\TblDetailPemohonSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
//         $model = \backend\models\TblDetailPemohon::find()->all();
        return $this->render('indexsp',
                ['searchModel' => $searchModel,
            'dataProvider' => $dataProvider]);
    }
     public function actionCetaksp()
    {
              $nokartu = Yii::$app->request->post('nokartu'); //7;
        $mpdf = new Mpdf(); //('', 'A4', 11, 'Times New Roman', 0, 0, 0, 0, 0, 0,0);
        $query = (new \yii\db\Query())
                ->select('tbl_pemohon.nik_npwp, tbl_pemohon.nama, tbl_pemohon.jabatan, tbl_pemohon.alamat,
tbl_jenis_reklame.jenis,tbl_detail_pemohon.banyak, tbl_detail_pemohon.waktu_mulai, tbl_detail_pemohon.waktu_akhir, tbl_detail_pemohon.lokasi,
tbl_detail_pemohon.teks,tbl_registrasi.nokartu,tbl_registrasi.tglreg')
                ->from('tbl_pemohon')
                ->innerJoin('tbl_detail_pemohon','tbl_pemohon.id = tbl_detail_pemohon.id_pemohon')
                ->innerJoin('tbl_jenis_reklame','tbl_jenis_reklame.id = tbl_detail_pemohon.id_reklame')
                ->innerJoin('tbl_registrasi','tbl_detail_pemohon.nokartu=tbl_registrasi.nokartu')
                ->where(['tbl_detail_pemohon.nokartu'=>$nokartu])
                ->one();
      $dtl_reklame = (new \yii\db\Query())
              ->select('A.ukuran1,A.satuan1,A.ukuran2,A.satuan2,A.sisi')
              ->from('dtl_pemohon_reklame A')
              ->where(['A.nokartu'=>$nokartu])
              ->all();
        $mpdf->WriteHTML(
                $this->renderPartial('cetaksp', array(
            'hasil'=>$query,
                'dtl_reklame'=>$dtl_reklame
        )));
        
//                        ));
        $mpdf->Output();
    }
    
     public function actionCetakskpd()
    {
        
     
        $id = Yii::$app->request->post('id'); //7;
//        $sql = "select tbl_detail_pemohon.waktu_mulai, tbl_detail_pemohon.waktu_akhir, tbl_detail_pemohon.ukuran1, tbl_detail_pemohon.satuan1,
//tbl_detail_pemohon.ukuran2, tbl_detail_pemohon.satuan2, tbl_detail_pemohon.banyak, tbl_detail_pemohon.lokasi, tbl_detail_pemohon.teks,
//tbl_detail_pemohon.sisi, tbl_detail_pemohon.banyak,
//tbl_jenis_reklame.jenis,
//tbl_pemohon.nik_npwp, tbl_pemohon.nama, tbl_pemohon.alamat,
//tbl_kawasan.nama nama_kawasan, tbl_kawasan.persen,
//tbl_skpd.bunga, tbl_skpd.kenaikan,tbl_skpd.subtotal,
//tbl_sewa.harga_dasar, tbl_sewa.masa_pajak
//from tbl_detail_pemohon inner join tbl_pemohon on tbl_detail_pemohon.id_pemohon=tbl_pemohon.id
//inner join tbl_jenis_reklame on tbl_detail_pemohon.id_reklame=tbl_jenis_reklame.id
//inner join tbl_skpd on tbl_detail_pemohon.id=tbl_skpd.id_detail_pemohon 
//inner join tbl_kawasan on tbl_skpd.id_kawasan = tbl_kawasan.id
//inner join tbl_sewa on tbl_skpd.id_sewa=tbl_sewa.id
//where tbl_skpd.id =$id";
//        
//        $query = Yii::$app->db->createCommand($sql)->queryAll();
 $query = (new \yii\db\Query())
         ->select('tbl_detail_pemohon.nokartu,tbl_detail_pemohon.waktu_mulai, tbl_detail_pemohon.waktu_akhir, 
              tbl_detail_pemohon.banyak, tbl_detail_pemohon.lokasi, tbl_detail_pemohon.teks,
 tbl_detail_pemohon.banyak,tbl_jenis_reklame.jenis,tbl_pemohon.nik_npwp, tbl_pemohon.nama, tbl_pemohon.alamat,
tbl_kawasan.nama nama_kawasan, tbl_kawasan.persen,tbl_skpd.bunga, tbl_skpd.kenaikan,tbl_skpd.subtotal,tbl_sewa.harga_dasar, tbl_sewa.masa_pajak')
         ->from('tbl_detail_pemohon')
         ->innerJoin('tbl_jenis_reklame','tbl_detail_pemohon.id_reklame=tbl_jenis_reklame.id')
         ->innerJoin('tbl_skpd','tbl_detail_pemohon.id=tbl_skpd.id_detail_pemohon')
         ->innerJoin('tbl_kawasan','tbl_skpd.id_kawasan = tbl_kawasan.id')
         ->innerJoin('tbl_sewa','tbl_skpd.id_sewa=tbl_sewa.id')
         ->innerJoin('tbl_pemohon','tbl_detail_pemohon.id_pemohon=tbl_pemohon.id')
         ->where(['tbl_skpd.id'=>$id])
         ->one();
 $dtl_reklame = (new \yii\db\Query())
         ->select('A.ukuran1,A.satuan1,A.ukuran2,A.satuan2,A.sisi')
         ->from('dtl_pemohon_reklame A')
         ->where(['A.nokartu'=>$query['nokartu']])
         ->all();
         $mpdf = new Mpdf();//mPDF();
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->WriteHTML($this->renderPartial('cetakskpd',
                [
                    'dtl_reklame'=>$dtl_reklame,
                 'hasil'=>$query   
                ]));
        $mpdf->Output();
    //    return $this->renderPartial('cetak', array('hasil'=>$query));
    }
 
     public function actionIndexskpd()
    {
        $searchModel = new \backend\models\TblSkpdSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
//         $model = \backend\models\TblDetailPemohon::find()->all();
        return $this->render('indexskpd',
                ['searchModel' => $searchModel,
            'dataProvider' => $dataProvider]);
    }
}
