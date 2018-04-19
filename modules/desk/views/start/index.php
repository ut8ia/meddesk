<?php
/* @var $this yii\web\View */

use  yii2fullcalendar\yii2fullcalendar;
$events=[];
?>


<div class="row">
    <!-- /.col -->
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-body no-padding">
                <?= yii2fullcalendar::widget([
//                    'events' => $events,
                    'themeSystem'=>'standard',
                    'options' => [
                        'lang' => 'uk',
                        //... more options to be defined here!
                    ],
                    'clientOptions' => [
                        'id' => 'meetform_patientmeets',
                        'weekends' => false,
                        'weekNumbers' => false,
                        'selectable' => false,
                        'defaultView' => 'month',
                        'eventBackgroundColor'=> Yii::$app->params['fc']['default']['bg'],
                        'eventBorderColor'=> Yii::$app->params['fc']['default']['border'],
                        'eventTextColor'=> Yii::$app->params['fc']['default']['text'],
                    ],
                ]);

                ?>
            </div>
        </div>
    </div>
</div>