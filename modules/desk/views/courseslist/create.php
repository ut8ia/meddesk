<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\CoursesList */

$this->title = Yii::t('app', 'Create Courses List');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Courses Lists'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="courses-list-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
