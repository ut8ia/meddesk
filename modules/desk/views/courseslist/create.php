<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\CoursesList */

$this->title = Yii::t('desk', 'Create Courses List');
$this->params['breadcrumbs'][] = ['label' => Yii::t('desk', 'Courses Lists'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="courses-list-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
