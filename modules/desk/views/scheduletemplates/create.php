<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\ScheduleTemplates */

$this->title = Yii::t('desk', 'Create Schedule Templates');
$this->params['breadcrumbs'][] = ['label' => Yii::t('desk', 'Schedule Templates'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="schedule-templates-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
