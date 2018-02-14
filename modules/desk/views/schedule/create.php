<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\Schedule */

$this->title = Yii::t('desk', 'Create Schedule');
$this->params['breadcrumbs'][] = ['label' => Yii::t('desk', 'Schedules'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="schedule-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
