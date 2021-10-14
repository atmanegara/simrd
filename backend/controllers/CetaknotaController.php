<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace backend\controllers;
use Yii;
use yii\web\Controller;

use Mpdf\Mpdf; //mPDF;
use yii\filters\AccessControl;
use common\components\AccessRule;
/**
 * Description of CetaknotaController
 *
 * @author Zaky
 */
class CetaknotaController extends Controller {
   public function behaviors()
{
    return [
        'access' => [
            'class' => AccessControl::className(),
             'ruleConfig' => [
                       'class' => AccessRule::className(),
                   ],
             'only' => ['index','cetak'],//, 'update', 'delete'],
            'rules' => [
                [
                    'allow' => true,
                    'actions' => ['index'],
                 //   'roles' => ['@'],
                ],
                [
                    'allow' => true,
                    'actions' => ['cetak'],
                    'roles' => [
                        
                 \common\models\User::ROLE_ADMIN_PTSP,
                    \common\models\User::ROLE_ADMIN_BPPRD,
                                            \common\models\User::ROLE_PROGRAMMER

                    ],
                ],
//                [
//                    'allow' => true,
//                    'actions' => ['create'],
//                    'roles' => ['createPost'],
//                ],
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
    public function actionCetak()
    {
        
     
        $id = Yii::$app->request->post('id'); //7;
        $sql = "select tbl_detail_pemohon.waktu_mulai, tbl_detail_pemohon.waktu_akhir, tbl_detail_pemohon.ukuran1, tbl_detail_pemohon.satuan1,
tbl_detail_pemohon.ukuran2, tbl_detail_pemohon.satuan2, tbl_detail_pemohon.banyak, tbl_detail_pemohon.lokasi, tbl_detail_pemohon.teks,
tbl_detail_pemohon.sisi, tbl_detail_pemohon.banyak,
tbl_jenis_reklame.jenis,
tbl_pemohon.nik_npwp, tbl_pemohon.nama, tbl_pemohon.alamat,
tbl_kawasan.nama nama_kawasan, tbl_kawasan.persen,
tbl_skpd.bunga, tbl_skpd.kenaikan,tbl_skpd.subtotal,
tbl_sewa.harga_dasar, tbl_sewa.masa_pajak
from tbl_detail_pemohon inner join tbl_pemohon on tbl_detail_pemohon.id_pemohon=tbl_pemohon.id
inner join tbl_jenis_reklame on tbl_detail_pemohon.id_reklame=tbl_jenis_reklame.id
inner join tbl_skpd on tbl_detail_pemohon.id=tbl_skpd.id_detail_pemohon 
inner join tbl_kawasan on tbl_skpd.id_kawasan = tbl_kawasan.id
inner join tbl_sewa on tbl_skpd.id_sewa=tbl_sewa.id
where tbl_skpd.id =$id";
        
        $query = Yii::$app->db->createCommand($sql)->queryAll();
        $mpdf = new Mpdf();//mPDF();
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->WriteHTML($this->renderPartial('cetak', array('hasil'=>$query)));
        $mpdf->Output();
    //    return $this->renderPartial('cetak', array('hasil'=>$query));
    }
 
     public function actionIndex()
    {
        $searchModel = new \backend\models\TblSkpdSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
//         $model = \backend\models\TblDetailPemohon::find()->all();
        return $this->render('index',
                ['searchModel' => $searchModel,
            'dataProvider' => $dataProvider]);
    }
}
