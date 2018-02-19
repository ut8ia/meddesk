<?php
/* @var $this yii\web\View */

use  yii2fullcalendar\yii2fullcalendar;
$events=[];
?>


<div class="row">
    <div class="col-md-3">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h4 class="box-title">Draggable Events</h4>
            </div>
            <div class="box-body">
                <!-- the events -->
                <div id="external-events">
                    <div class="external-event bg-green">До мене на сьогодні :<?= $myPatientsToday ?></div>
                    <div class="external-event bg-yellow">До мене на завтра :<?= $myPatientsTomorrow ?></div>
                    <div class="external-event bg-aqua"></div>
                    <div class="external-event bg-light-blue"></div>
                    <div class="external-event bg-red"></div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
    <!-- /.col -->
    <div class="col-md-9">
        <div class="box box-primary">
            <div class="box-body no-padding">
                <?= yii2fullcalendar::widget([
//                    'events' => $events,
                    'options' => [
                        'lang' => 'uk',
                        //... more options to be defined here!
                    ],
                ]);

                ?>
            </div>
        </div>
    </div>
</div>