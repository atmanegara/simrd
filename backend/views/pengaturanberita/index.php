<?php
use yii\grid\GridView;
use yii\helpers\Html;
//    const ROLE_PROGRAMMER=20; //PROGRAMMER
//    const ROLE_GUEST=10; //GUEST
//     const ROLE_ADMIN_PTSP=30; //ADMIN PTSP
//     const ROLE_ADMIN_BPPRD=40; //ADMIN BPPRD
//     const ROLE_SUPER_ADMIN=99; //SUPERADMIN
?>

<?= yii\bootstrap\Html::a('Tambah Data Berita',['create'],[
    'class'=>'btn btn-info'
])?>
<?=GridView::widget(
       [ 'dataProvider'=>$dataProvider,
        'columns'=>[
            ['class' => 'yii\grid\SerialColumn'],
            'kode_about:text',
            'uraian:text',
            //'password_hash:text',
        [
               'class'=>'yii\grid\ActionColumn',
                'template'=>'{view}{update}',
               
               ]
        ],
           
        ]
        )
?>
