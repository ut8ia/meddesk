<?php

use app\modules\desk\models\Meets;
use app\modules\desk\models\Patients;
use app\modules\desk\services\reports\common\CommonReport;
use app\modules\desk\services\reports\common\ExpertMeetsCounters;
use app\modules\desk\services\reports\common\Statistic;
use dosamigos\chartjs\ChartJs;

$events = [];
$this->params['breadcrumbs'][] = $this->title;
$this->blocks['content-header'] = Yii::t('desk', 'Start page');


$report = new CommonReport();
$report->expert_id = Yii::$app->user->identity->id;
$report->makeReport();
$types = $report->getTypesCount();
$labels = $report->getLabels();
$data = $report->getData();
$outpatientMeets = isset($data[Meets::TYPE_CONSULTATION]) ? $data[Meets::TYPE_CONSULTATION] : [];
$courseMeets = isset($data[Meets::TYPE_COURSE]) ? $data[Meets::TYPE_COURSE] : [];
$commonData = isset($data['common']) ? $data['common'] : [];

$patients = Patients::find()->count();

$counters = new ExpertMeetsCounters();
$counters->expert_id = Yii::$app->user->identity->id;


$TotalDone = count($counters->getDone());
$outpatToday = Meets::find()
    ->where(['plan_from'=>Yii::$app->time->date2db(date('Y-m-d H:m:s', time()))])
    ->andWhere(['meet_type'=>Meets::TYPE_CONSULTATION])
->count();

$courseToday = Meets::find()
    ->where(['plan_from'=>Yii::$app->time->date2db(date('Y-m-d H:m:s', time()))])
    ->andWhere(['meet_type'=>Meets::TYPE_COURSE])
    ->count();
?>


<div class="box box-primary">
    <div class="box-body no-padding">
        <h1 class="text-center"><?= Yii::$app->time->date2front(date('Y-m-d H:m:s', time())) ?></h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-9">
        <div class="box box-primary">
            <div class="box-body no-padding">
                <?= ChartJs::widget([
                    'type' => 'line',
                    'options' => [
                        'height' => 200,
                        'width' => 400
                    ],
                    'data' => [
                        'labels' => $labels,
                        'datasets' => [
                            [
                                'label' => 'Амбулаторні',
                                'backgroundColor' => "rgba(179,181,198,0.2)",
                                'borderColor' => "rgba(179,181,198,1)",
                                'pointBackgroundColor' => "rgba(179,181,198,1)",
                                'pointBorderColor' => "#fff",
                                'pointHoverBackgroundColor' => "#fff",
                                'pointHoverBorderColor' => "rgba(179,181,198,1)",
                                'data' => $outpatientMeets
                            ],
                            [
                                'label' => 'На курсі',
                                'backgroundColor' => "rgba(255,199,132,0.2)",
                                'borderColor' => "rgba(255,199,132,1)",
                                'pointBackgroundColor' => "rgba(255,199,132,1)",
                                'pointBorderColor' => "#fff",
                                'pointHoverBackgroundColor' => "#fff",
                                'pointHoverBorderColor' => "rgba(255,199,132,1)",
                                'data' => $courseMeets
                            ],
                            [
                                'label' => 'Загальні',
                                'backgroundColor' => "rgba(255,99,132,0.2)",
                                'borderColor' => "rgba(255,99,132,1)",
                                'pointBackgroundColor' => "rgba(255,99,132,1)",
                                'pointBorderColor' => "#fff",
                                'pointHoverBackgroundColor' => "#fff",
                                'pointHoverBorderColor' => "rgba(255,99,132,1)",
                                'data' => $commonData
                            ]
                        ]
                    ]
                ]);
                ?>
            </div>
        </div>
    </div>
    <div class="col-lg-3">

        <div class="small-box bg-aqua">
            <div class="inner">
                <h3><?= $outpatToday ?></h3>
                <p>Амбулаторних сьогодні</p>
            </div>
            <div class="icon">
                <i class="fa fa-child"></i>
            </div>
            <a href="/desk/mypatients" class="small-box-footer">Детальніше<i class="fa fa-arrow-circle-right"></i></a>
        </div>

        <div class="small-box bg-yellow">
            <div class="inner">
                <h3><?= $courseToday ?></h3>
                <p>На курсі сьогодні</p>
            </div>
            <div class="icon">
                <i class="fa fa-file"></i>
            </div>
            <a href="#" class="small-box-footer">Детальніше<i class="fa fa-arrow-circle-right"></i></a>
        </div>

        <div class="small-box bg-green">
            <div class="inner">
                <h3><?= $TotalDone ?><sup style="font-size: 20px"></sup></h3>
                <p>Здійснено прийомів</p>
            </div>
            <div class="icon">
                <i class="fa fa-check"></i>
            </div>
            <a href="#" class="small-box-footer">Детальніше<i class="fa fa-arrow-circle-right"></i></a>
        </div>

    </div>
</div>
