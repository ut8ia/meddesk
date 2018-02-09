<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\Meets */

$this->title = Yii::t('app', 'Create Meets');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Meets'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="meets-create">



    <?= $this->render('_form', [
        'model' => $model,
        'availablePlaces' => $availablePlaces,
        'availableExpertGroups' => $availableExpertGroups
    ]) ?>

</div>
