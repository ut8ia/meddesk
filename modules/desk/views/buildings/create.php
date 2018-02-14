<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\Buildings */

$this->title = Yii::t('desk', 'Create Buildings');
$this->params['breadcrumbs'][] = ['label' => Yii::t('desk', 'Buildings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="buildings-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
