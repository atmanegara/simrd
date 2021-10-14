<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;
        $auth->removeAll();
        
        // add "createPost" permission
        $createPost = $auth->createPermission('cetakSkpd');
        $createPost->description = 'Cetak SKP-D';
        $auth->add($createPost);

        // add "updatePost" permission
        $updatePost = $auth->createPermission('cetak');
        $updatePost->description = 'Cetak Nota Permohonan';
        $auth->add($updatePost);

        // add "author" role and give this role the "createPost" permission
        $author = $auth->createRole('author');
        $auth->add($author);
        $auth->addChild($author, $createPost); //hnya bisa cetak SKP-D

        // add "admin" role and give this role the "updatePost" permission
        // as well as the permissions of the "author" role
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $updatePost); //cetak Nota Permohonan
        $auth->addChild($admin, $author); // cetak SKP-D

        // Assign roles to users. 1 and 2 are IDs returned by IdentityInterface::getId()
        // usually implemented in your User model.
        $auth->assign($author, 2);
        $auth->assign($admin, 1);
    }
}