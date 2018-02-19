<?php
/* @var $this yii\web\View */

?>
<div class="row">

    <div class="col-md-3">

        <!-- Profile Image -->
        <div class="box box-primary">
            <div class="box-body box-profile">
                <img class="profile-user-img img-responsive img-circle" src="<?= Yii::$app->user->identity->getImageIcon() ?>" alt="User profile picture">

                <p class="text-muted text-center"></p>

                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <b><?= Yii::$app->user->identity->surname ?></b>
                    </li>
                    <li class="list-group-item">
                        <b><?= Yii::$app->user->identity->name ?></b>
                    </li>
                    <li class="list-group-item">
                        <b><?= Yii::$app->user->identity->patronymic ?></b>
                    </li>
                </ul>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </div>
    <div class="col-lg-9"
        <!-- About Me Box -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Налаштування</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>