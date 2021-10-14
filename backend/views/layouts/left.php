<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->username ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
<!--        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>-->
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                    'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Menu Utama', 'options' => ['class' => 'header']],
                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],'visible' => !Yii::$app->user->getIsGuest() && common\models\User::getRole(Yii::$app->user->getId())=='20'],
                    
                    ['label' => 'Pemohon', 'icon' => 'dashboard', 'url' => ['/admin/pemohon']],
                    ['label' => 'SKP-D', 'icon' => 'file-code-o', 'url' => ['/admin/skpd']],
                    ['label' => 'Laporan', 'icon' => 'dashboard', 'items'=>[
                        ['label'=>'Cetak Surat Permohonan','icon'=>'circle-o','url'=>['/admin/laporan/indexsp']],
                    ['label' => 'Cetak SKP-D', 'icon' => 'dashboard', 'url' => ['/admin/laporan/indexskpd']],
                        
                    ]],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    ['label' => 'verifikasi', 'url' => ['/admin/verifikasi']], //'visible' => !Yii::$app->user->isGuest],
                   [
                        'label' => 'Data Master',
                        'icon' => 'share',
                        'items' => [
                            ['label' => 'Data Kawasan', 'icon' => 'file-code-o', 'url' => ['/tbl-kawasan']],
                            ['label' => 'Data Jenis Reklame', 'icon' => 'file-code-o', 'url' => ['/tbl-jenis-reklame']],
                            ['label' => 'Data Biaya', 'icon' => 'file-code-o', 'url' => ['/tbl-biaya']],
                            ['label' => 'Pemohon', 'icon' => 'dashboard', 'url' => ['/tbl-pemohon']],
//                            ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
//                            [
//                                'label' => 'Level One',
//                                'icon' => 'circle-o',
//                                'url' => '#',
//                                'items' => [
//                                    ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
//                                    [
//                                        'label' => 'Level Two',
//                                        'icon' => 'circle-o',
//                                        'url' => '#',
//                                        'items' => [
//                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
//                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
//                                        ],
//                                    ],
//                                ],
//                            ],
                            
                        ],
                    ],
                    [
                              'label'=>'Setting',
                                'icon'=>'circle-o',
                                'url'=>'#',
                                'items'=>[
                                    ['label'=>'Pengaturan User','icon'=>'circle-o','url'=>['/pengaturanuser']],
                                     ['label'=>'Pengaturan Menu','icon'=>'circle-o','url'=>['/pengaturanmenu'],'visible' => !Yii::$app->user->getIsGuest() && common\models\User::getRole(Yii::$app->user->getId())=='20']
                                ]
                            ],
                ],
            ]
        ) ?>

    </section>

</aside>
