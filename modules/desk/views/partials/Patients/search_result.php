<?= $model->surname . " "
. strtoupper(mb_substr($model->name, 0, 1)) . ". "
. strtoupper(mb_substr($model->patronymic, 0, 1)) . "."
. " (" . Yii::$app->time->date2front($model->birthdate) . ")";
?>