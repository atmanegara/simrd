<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use Mpdf\Mpdf;
use common\components\AccessRule;

class CetakController extends Controller{
    public function behaviors()
{
    return [
        'access' => [
            'class' => AccessControl::className(),
             'ruleConfig' => [
                       'class' => AccessRule::className(),
                   ],
            'rules' => [
               [
                    'allow' => true,
                   'actions' => ['index'],
                //    'roles' => ['cetak'],
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
        $mpdf = new Mpdf(); //('', 'A4', 11, 'Times New Roman', 0, 0, 0, 0, 0, 0,0);
        $sql = "select tbl_pemohon.nik_npwp, tbl_pemohon.nama, tbl_pemohon.jabatan, tbl_pemohon.alamat,
tbl_jenis_reklame.jenis, tbl_detail_pemohon.ukuran1,tbl_detail_pemohon.satuan1, tbl_detail_pemohon.ukuran2, tbl_detail_pemohon.satuan2,
tbl_detail_pemohon.banyak, tbl_detail_pemohon.waktu_mulai, tbl_detail_pemohon.waktu_akhir, tbl_detail_pemohon.lokasi,
tbl_detail_pemohon.teks from tbl_pemohon 
join tbl_detail_pemohon on tbl_pemohon.id = tbl_detail_pemohon.id_pemohon
join tbl_jenis_reklame on tbl_jenis_reklame.id = tbl_detail_pemohon.id_reklame where tbl_detail_pemohon.id = $id
";
        $query = Yii::$app->db->createCommand($sql)->queryAll();
        
        $mpdf->WriteHTML(
                $this->renderPartial('rpt_skp_d', array(
            'hasil'=>$query
        )));
        
//                        ));
        $mpdf->Output();
    }
   
     public function actionIndex()
    {
         $searchModel = new \backend\models\TblDetailPemohonSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
//         $model = \backend\models\TblDetailPemohon::find()->all();
        return $this->render('index',
                ['searchModel' => $searchModel,
            'dataProvider' => $dataProvider]);
    }
}
