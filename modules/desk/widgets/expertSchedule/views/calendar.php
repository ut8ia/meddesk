<?php

use  yii2fullcalendar\yii2fullcalendar;

/**
 * @var $events array
 */
?>


<div class="box box-primary">
    <div class="box-body no-padding">
        <?= yii2fullcalendar::widget([
            'events' => $events,
            'options' => [
                'lang' => 'uk',
                //... more options to be defined here!
            ],
            'clientOptions' => [
                'id' => 'meetform_expertmeets',
                'weekends' => false,
                'weekNumbers' => false,
                'selectable' => false,
                'defaultView' => 'agendaWeek'
            ],
            'header' => [
                'center' => 'title',
                'left' => 'prev,next today',
                'right' => 'month,agendaWeek,agendaDay'
            ]
        ]);

        ?>
    </div>
</div>
