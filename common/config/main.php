<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
         //Setting module
      'modules' => [
        'pemohon' => [  //Modulepemohon
            'class' => 'frontend\modules\pemohon\Module',
        ],
          'admin' => [ //Module Semua Admin
            'class' => 'backend\modules\admin\Module',
        ],
    ],
    'components' => [
 
         'onesignal'=>[
            'class'=>'common\components\Pushonesignal'
        ],
        'terbilang'=>[
            'class'=>'common\components\Terbilang'
        ],
              'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];
