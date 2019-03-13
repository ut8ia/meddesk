<?php
/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\Patients */

?>

<table>
    <tr>
        <td>
            <h3 class="text-center"> <?= $model->card_number ?> </h3>
        </td>
        <td>
            <h2 class="text-center">
                <b><?= ucfirst($model->surname) ?></b>
                <?= ucfirst($model->name) ?>
                <?= ucfirst($model->patronymic) ?>
            </h2>
        </td>
    </tr>
    <tr>
        <td>
            <h2 class="text-center"> <?= $model->card_number ?> </h2>
        </td>
        <td>
            <h1 class="text-center">
                <b><?= ucfirst($model->surname) ?></b><br>
                <?= ucfirst($model->name) ?>
                <?= ucfirst($model->patronymic) ?>
            </h1>
        </td>
    </tr>
</table>
