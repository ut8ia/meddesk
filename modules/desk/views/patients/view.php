<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\Patients */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('desk', 'Patients'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patients-view">



    <p>
        <?= Html::a(Yii::t('desk', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'surname',
            'patronymic',
            'card_number',
            'sex',
            'birthdate',
            'region_id',
            'city',
            'city_id',
            'district',
            'district_a',
            'user_id',
        ],
    ]) ?>

</div>
