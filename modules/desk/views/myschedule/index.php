<?php

use  yii2fullcalendar\yii2fullcalendar;

/* @var $this yii\web\View */

$events = array();
//Testing
$event = new \yii2fullcalendar\models\Event();
$event->id = 1;
$event->title = 'Testing';
$event->start = date('Y-m-d\TH:i:s\Z');
$event->nonstandard = [
    'field1' => 'Something I want to be included in object #1',
    'field2' => 'Something I want to be included in object #2',
];
$events[] = $event;

$c = 19;
while ($c) {
    $event = new \yii2fullcalendar\models\Event();
    $event->id = 20 - $c;
    $event->title = 'Testing' . $c;
    $event->start = date('Y-m-d\TH:i:s\Z', strtotime('tomorrow ' . $c . ' hour'));
    $events[] = $event;
    $c--;
}
?>


<div class="box box-primary">
    <div class="box-body no-padding">
        <?= yii2fullcalendar::widget([
            'events' => $events,
            'options' => [
                'lang' => 'uk',
                //... more options to be defined here!
            ],
        ]);

        ?>
    </div>
</div>
