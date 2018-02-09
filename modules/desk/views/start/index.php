<?php
/* @var $this yii\web\View */

?>
<div class="jumbotron">
    <h2><?= Yii::$app->time->date ?></h2>
    <button class="btn btn-warning" type="button">Пацієнтів <span class="badge"><?= $patientsCount ?></span></button>
    <button class="btn btn-primary" type="button">Хлопчиків <span class="badge"><?= $patientsMale ?></span></button>
    <button class="btn btn-danger" type="button">Дівчат <span class="badge"><?= $patientsFemale ?></span></button>
    <br><br>
    <button class="btn btn-success" type="button">Прийомів <span class="badge"><?= $patientsMeets ?></span></button>
    <button class="btn btn-success" type="button">Пройшли курс <span class="badge"><?= $patientsMeets ?></span>
    </button>
    <button class="btn btn-info" type="button">Записів на прийоми <span class="badge"><?= $patientsMeets ?></span>
    </button>
    <br>
    <hr>
    <button class="btn btn-default" type="button">До мене на сьогодні <span class="badge"><?= $myPatientsToday ?></span>
    </button>

    <button class="btn btn-default" type="button">До мене на завтра <span class="badge"><?= $myPatientsTomorrow ?></span>
    </button>
    <br>
    <br>
    <a href="/desk/mymeets/">
        <button class="btn btn-success" type="button">Розпочати прийом зараз<span
                class="badge"></span>
        </button>
    </a>

</div>
