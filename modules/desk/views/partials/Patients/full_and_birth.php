<?= ucfirst($model->surname) . " "
. ucfirst($model->name). " "
. ucfirst($model->patronymic)
. " (" . Yii::$app->time->date2front($model->birthdate) . ")";
?>