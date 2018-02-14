<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\Courses */

$this->title = Yii::t('desk', 'Create Courses');
$this->params['breadcrumbs'][] = ['label' => Yii::t('desk', 'Courses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="courses-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
