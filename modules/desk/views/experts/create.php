<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\Experts */

$this->title = Yii::t('desk', 'Create Experts');
$this->params['breadcrumbs'][] = ['label' => Yii::t('desk', 'Experts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="experts-create">



    <?= $this->render('_form', [
        'model' => $model,
        'availablePlaces' => $availablePlaces,
        'availableExpertGroups' => $availableExpertGroups
    ]) ?>

</div>
