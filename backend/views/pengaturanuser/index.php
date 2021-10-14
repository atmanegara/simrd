<?php
use yii\grid\GridView;
use yii\helpers\Html;
//    const ROLE_PROGRAMMER=20; //PROGRAMMER
//    const ROLE_GUEST=10; //GUEST
//     const ROLE_ADMIN_PTSP=30; //ADMIN PTSP
//     const ROLE_ADMIN_BPPRD=40; //ADMIN BPPRD
//     const ROLE_SUPER_ADMIN=99; //SUPERADMIN
?>
<?=

GridView::widget(
       [ 'dataProvider'=>$dataProvider,
        'columns'=>[
            ['class' => 'yii\grid\SerialColumn'],
            'username:text',
            'email:text',
            'password_hash:text',
        [
            'attribute'=>'role',
            'header'=>'Status Hak user',
            'value'=>function($data){
            switch ($data->role) {
    case '20':
        $statushak = "Programmer"; 
        break;
    case '30':
        $statushak = "Admin PTSP"; 
        break;
    case '40':
        $statushak = "Admin BPPRD"; 
        break;
    case '99':
        $statushak = "Superadmin"; 
        break;

    default:
        $statushak="Tamu";
        break;
}
    return $statushak;
            }
        ],
            [
               'class'=>'yii\grid\ActionColumn',
                'template'=>'{view}{update}',
                'buttons'=>[
                    'view'=>function($url,$model)
{
    
    return \yii\helpers\Html::a('View', $url,[
        'class'=>'btn btn-info'
    ]);
                    },
                            'update'=>function($url,$model)
                    {
                        return Html::a('Setting', $url,[
                            'class'=>'btn btn-primary'
                        ]);
                            }
                ]
               ]
        ],
           
        ]
        )
?>
