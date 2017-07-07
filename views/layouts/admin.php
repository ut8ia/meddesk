<?php
/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AdminAppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use ut8ia\adminmenu\Adminmenu;
use ut8ia\adminmenu\AdminmenuAsset;
use ut8ia\medicine\assets\CommonFormsAsset;
use ut8ia\medicine\assets\JsonRpcAsset;

AdminAppAsset::register($this);
AdminmenuAsset::register($this);
CommonFormsAsset::register($this);
JsonRpcAsset::register($this);

$this->title .= ' - Admin zone' . $this->title;

?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <link rel="icon" href="/img/design/favicon.ico" type="image/x-icon"/>
        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>

    <div class="wrap">
        <?php
        NavBar::begin([
            'brandLabel' => '<img class="mainLogo" src="/img/design/logo.png">Ukrainian Child Rehabilitation Desk  ',
            'brandUrl' => '/desk/start',
            'options' => [
                'class' => 'navbar-inverse navbar-fixed-top',
            ],
        ]);
        if (Yii::$app->user->isGuest) {
            $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
        } else {
            $menuItems = [['label' => 'Home', 'url' => ['/site/index']],
                [
                    'label' => Yii::t('app', 'Logout') . ' (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ]
            ];
        }
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => $menuItems,
        ]);
        NavBar::end();
        ?>

        <div class="container">
            <div id="navigation" class="list-group col-md-2">
                <?php
                if (!Yii::$app->user->isGuest) {
                    echo Adminmenu::widget();
                }
                ?>

            </div>
            <div class=" col-md-10">
                <?=
                Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ])
                ?>

                <?= $content ?>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; uran <?= date('Y') ?></p>
            <p class="pull-right"></p>
        </div>
    </footer>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>