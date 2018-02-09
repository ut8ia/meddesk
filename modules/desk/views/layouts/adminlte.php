<?php
/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AdminAppAsset;
use yii\helpers\Html;
use app\modules\desk\assets\CommonFormsAsset;
use app\modules\desk\assets\JsonRpcAsset;
use dmstr\web\AdminLteAsset;


AdminAppAsset::register($this);
CommonFormsAsset::register($this);
JsonRpcAsset::register($this);
AdminLteAsset::register($this);

$this->title .= ' - ' . Yii::t('app', 'rehabilitation desk') . $this->title;
$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');

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
    <body class="hold-transition skin-blue sidebar-mini">
    <?php $this->beginBody() ?>
    <div class="wrapper">

        <?= $this->render(
            'header.php',
            ['directoryAsset' => $directoryAsset]
        ) ?>

        <?= $this->render(
            'left.php',
            ['directoryAsset' => $directoryAsset]
        )
        ?>

        <?= $this->render(
            'content.php',
            ['content' => $content, 'directoryAsset' => $directoryAsset]
        ) ?>

    </div>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>