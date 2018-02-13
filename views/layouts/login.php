<?php
/* @var $this \yii\web\View */
/* @var $content string */

use app\modules\desk\assets\FontsAsset;
use dmstr\web\AdminLteAsset;
use yii\bootstrap\BootstrapPluginAsset;
use yii\web\JqueryAsset;
use yii\helpers\Html;
use hiqdev\assets\icheck\iCheckAsset;

JqueryAsset::register($this);
AdminLteAsset::register($this);
BootstrapPluginAsset::register($this);
iCheckAsset::register($this);
FontsAsset::register($this);

$this->title .= ' - ' . Yii::t('app', 'rehabilitation desk') . $this->title;
$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?= Html::csrfMetaTags() ?>
    <link rel="icon" href="/img/design/favicon.ico" type="image/x-icon"/>
    <?php $this->head() ?>
</head>
<body class="hold-transition login-page">

<?= $content ?>

<?php $this->endBody() ?>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>

</body>
</html>
<?php $this->endPage() ?>

