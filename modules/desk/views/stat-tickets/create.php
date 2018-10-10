<?php


/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\Meets */

$this->title = Yii::t('desk', 'Create statistic Ticket');
$this->params['breadcrumbs'][] = ['label' => Yii::t('desk', 'Meets'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->blocks['content-header'] = Yii::t('desk', 'Create statistic Ticket');
?>
<div class="box box-success">


    <?= $this->render('_form', [
        'model' => $model,
        'availablePlaces' => $availablePlaces,
        'availableExpertGroups' => $availableExpertGroups
    ]) ?>

</div>
