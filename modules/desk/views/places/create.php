<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\Places */

$this->title = Yii::t('desk', 'Create Places');
$this->params['breadcrumbs'][] = ['label' => Yii::t('desk', 'Places'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="places-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
