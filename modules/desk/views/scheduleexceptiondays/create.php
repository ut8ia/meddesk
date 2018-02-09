<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\ScheduleExceptionDays */

$this->title = Yii::t('app', 'Create Schedule Exception Days');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Schedule Exception Days'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="schedule-exception-days-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
