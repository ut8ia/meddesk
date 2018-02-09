<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\Excerpts */

$this->title = Yii::t('app', 'Create Excerpts');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Excerpts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="excerpts-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
