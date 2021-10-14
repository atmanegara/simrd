<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\components\AccessRule;
/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
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
                        'actions' => ['login', 'error'],
                        'allow' => true,
                   //     'roles'=[]
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => [

                            \common\models\User::ROLE_PROGRAMMER,
                            \common\models\User::ROLE_GUEST,
                            \common\models\User::ROLE_ADMIN_PTSP,
                            \common\models\User::ROLE_ADMIN_BPPRD,
                            \common\models\User::ROLE_SUPER_ADMIN,
                            
                        ],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        //Query Jumlah Pemohon Pada Tahun n
        $sql = "select count(*) as jumlah from tbl_pemohon "
                . "inner join tbl_detail_pemohon on tbl_detail_pemohon.id_pemohon=tbl_pemohon.id "
                . "inner join tbl_registrasi on tbl_detail_pemohon.nokartu=tbl_registrasi.nokartu";
              //  . "where tbl_detail_pemohon.tahun=2018";
        $countpemohon = \Yii::$app->db->createCommand($sql)->queryScalar();
        return $this->render('index',[
            'jlhpemohon'=>$countpemohon
        ]);
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
