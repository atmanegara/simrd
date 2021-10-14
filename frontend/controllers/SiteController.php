<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

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
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
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
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
                           Yii::$app->session->set('id',10);
                           $id_user = Yii::$app->session->get('__id');
                           $pemohon = \backend\models\TblPemohon::find()
                                   ->where(['id_user'=>$id_user])
                                   ->one();
                           $id_pemohon = $pemohon['id'];
                               Yii::$app->session->set('id_pemohon', $id_pemohon); 
                     //           Yii::$app->session->set('id',10);
                           return $this->redirect(['/pemohon/default']);
                        //  return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        $sql = "select * from tbl_dinas where kode_dinas='PTSP'";
        $query = "select count(*) from tbl_dinas where kode_dinas='PTSP'";
         $count = Yii::$app->db->createCommand($query)->queryScalar();
         $model = Yii::$app->db->createCommand($sql)->queryOne();
//         $dataProvider = new \yii\data\SqlDataProvider([
//             'sql'=>$sql,
//             'totalCount'=>$count,
//             'pagination'=>[
//                 'pageSize'=>5
//             ],
//         ]);
        
        return $this->render('about',[
            'model'=>$model
        ]);
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
  
  return $this->redirect(['pemohon/default'])    ;              
//                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
    public function actionCarireg()
    {
        $nokartu = Yii::$app->request->post('nokartu');
         
                $query = (new \yii\db\Query())
                ->select('tbl_detail_pemohon.nokartu,tbl_detail_pemohon.status_reklame,'
                        . 'tbl_jenis_reklame.jenis,tbl_pemohon.nik_npwp,tbl_pemohon.nama')
                ->from('tbl_detail_pemohon')
                ->innerJoin('tbl_jenis_reklame','tbl_detail_pemohon.id_reklame=tbl_jenis_reklame.id')
                        ->innerJoin('tbl_pemohon','tbl_detail_pemohon.id_pemohon=tbl_pemohon.id')
                ->where(['tbl_detail_pemohon.nokartu'=>$nokartu])
                ->one();
             if($query)
             {
                return $this->render('lacakpajak',[
                    'query'=>$query
                ]);
                 }
                 Yii::$app->session->setFlash('danger','No kartu tidak ditemukan, Cek kembali');
            return $this->redirect(['index']);
            
    }
    
}
