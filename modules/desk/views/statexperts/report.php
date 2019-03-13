<?php

use app\modules\desk\models\Meets;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\Experts */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('desk', 'Experts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$expertData = Yii::$app->formatter->asObject(
    [
        'object' => $model,
        'view' => 'short'
    ]);

$expertGroup = $model->expertGroups;
if (is_array($expertGroup)) {
    $expertGroupData = Yii::$app->formatter->asObject(
        [
            'object' => $expertGroup[0],
            'view' => 'default'
        ]);
} else {
    $expertGroupData = '';
}


$expertPlaces = $model->places;
if (is_array($expertPlaces)) {
    $placeData = Yii::$app->formatter->asObject(
        [
            'object' => $expertPlaces[0],
            'view' => 'default'
        ]);
} else {
    $placeData = '';
}


$rows = '';
$meets = Meets::find()
    ->where(['=', 'expert_id', $model->id])
    ->andWhere(['=','status',Meets::STATUS_DONE])
    ->all();
$c = 1;
if (is_array($meets)) {

    foreach ($meets as $meet) {

        $is_amb = 'Амбулаторний';
        if(isset($meet->course_id)){
            $is_amb = 'Курс №'.$meet->courses->number;
        }

        /** @var $meet Meets */
        $rows .= '<tr style="border:solid 1px #222">'
            . '<td>' . $c . '</td>'
            . '<td>' . $meet->patients->surname . ' '.$meet->patients->name .' '.$meet->patients->patronymic . '</td>'
            . '<td>' . $meet->patients->card_number . '</td>'
            . '<td>' . Yii::t('desk',$meet->patients->sex) . '</td>'
            . '<td>' . $meet->patients->birthdate . '</td>'
            . '<td> Так </td>'
            . '<td>' . $meet->patients->cityOrigin->type . '</td>'
            . '<td>' . $meet->patients->address . '</td>'
            . '<td>' . $is_amb . '</td>'
            . '</tr>';
        $c++;
    }
}


?>
<div class="experts-view">

    <h3 class="text-center">Відомість обліку відвідувань</h3>

    <div class="row">
        <div class="col-lg-6 pull-right">Спеціальність: <?= $expertGroupData ?> </div>
        <div class="col-lg-6 pull-left"> ПІБ Фахівця : <?= $expertData ?></div>
    </div>
    <div class="row">
        <div class="col-lg-6 pull-left"> Дата : <?= Yii::$app->time->date2front(date(time())) ?></div>
        <div class="col-lg-6 pull-right"> Кабінет : <?= $placeData ?></div>

    </div>

    <div class="row">
        <div class="col-lg-12">
            <br><br>
            <table class="" style="width:100%;border: solid 1px #444;">
                <tr>
                    <td>№ з/п</td>
                    <td>ПІБ</td>
                    <td>№ картки</td>
                    <td>Стать</td>
                    <td>Вік</td>
                    <td>Первинне</td>
                    <td>Мешканець</td>
                    <td>Адреса</td>
                    <td>Амб\реаб</td>
                </tr>

                <?= $rows ?>
            </table>

        </div>
    </div>


</div>
