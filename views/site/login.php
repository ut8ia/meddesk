<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\modules\desk\models\forms\LoginForm */

use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="login-box">
    <div class="login-logo">
        <a href="https://adminlte.io/themes/AdminLTE/index2.html"><b>Med</b>DESK</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg"><?= Yii::t('app', 'Sign in to start your session'); ?></p>


        <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            'fieldConfig' => [
                'template' => "{input}",
            ],
        ]); ?>

        <div class="form-group has-feedback">
            <?=
            $form->field($model, 'username')
                ->textInput([
                    'placeholder' => 'email',
                    'class' => 'form-control',
                    'type' => 'email'
                ]) ?>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>

        <div class="form-group has-feedback">
            <?=
            $form->field($model, 'password')
                ->textInput([
                    'class' => 'form-control',
                    'placeholder' => 'password',
                    'type' => 'password'
                ]) ?>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
            <div class="col-xs-8">
                <div class="checkbox icheck">
                    <label class="">
                        <div class="icheckbox_square-blue" style="position: relative;" aria-checked="false"
                             aria-disabled="false">

                            <?= $form->field($model, 'rememberMe')->input(
                                'checkbox',
                                [
                                    'style' => "position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"
                                ]
                            ) ?>

                            <ins class="iCheck-helper"
                                 style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins>
                        </div>
                        <?= Yii::t('app', 'Remember Me'); ?>
                    </label>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div>
            <!-- /.col -->
        </div>


        <?php ActiveForm::end(); ?>

        <!-- /.social-auth-links -->
        <!--        <a href="#">I forgot my password</a><br>-->
        <!--        <a href="https://adminlte.io/themes/AdminLTE/pages/examples/register.html" class="text-center">Register a newmembership</a>-->

    </div>
    <!-- /.login-box-body -->
</div>

