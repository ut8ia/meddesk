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