<?php
use app\modules\desk\models\Patients;
use app\modules\desk\services\reports\common\Statistic;
use dosamigos\chartjs\ChartJs;
use app\modules\desk\services\reports\common\CommonReport;

$this->title = Yii::t('desk', 'Common statistic');
$this->params['breadcrumbs'][] = $this->title;
$this->blocks['content-header'] = $this->title;

$patients = Patients::find()->count();

$report = new CommonSexReport();
$report->makeReport();
$types = $report->getTypesCount();
$maleCount = $types[Patients::SEX_MALE];
$femaleCount = $types[Patients::SEX_FEMALE];

$labels = $report->getLabels();
$data = $report->getData();
$maleData = $data[Patients::SEX_MALE];
$femaleData = $data[Patients::SEX_FEMALE];
$commonData = $data['common'];

$statistic = new Statistic();
$statistic->makeReport();

?>
<div class="row">
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3><?= $patients ?></h3>
                <p>Пацієнтів</p>
            </div>
            <div class="icon">
                <i class="fa fa-child"></i>
            </div>
            <a href="#" class="small-box-footer">Детальніше<i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green">
            <div class="inner">
                <h3><?= $statistic->excerpts ?><sup style="font-size: 20px"></sup></h3>
                <p>Виписок</p>
            </div>
            <div class="icon">
                <i class="fa fa-file"></i>
            </div>
            <a href="#" class="small-box-footer">Детальніше<i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3><?= $statistic->meets ?></h3>
                <p>Прийомів</p>
            </div>
            <div class="icon">
                <i class="fa fa-check"></i>
            </div>
            <a href="#" class="small-box-footer">Детальніше<i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-red">
            <div class="inner">
                <h3><?= $statistic->courseListPlanned ?></h3>
                <p>Заплановані на курс</p>
            </div>
            <div class="icon">
                <i class="fa fa-arrow-circle-right"></i>
            </div>
            <a href="#" class="small-box-footer">Детальніше<i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-3">
        <div class="box box-primary">
            <div class="box-body no-padding">
                <?= ChartJs::widget([
                    'type' => 'doughnut',
                    'options' => [
                        'height' => 480,
                        'width' => 300
                    ],
                    'data' => [
                        'labels' => [Patients::SEX_MALE, Patients::SEX_FEMALE],
                        'datasets' => [
                            [
                                'label' => "Розподіл за статевою ознакою",
                                'backgroundColor' => ['blue', 'red'],
                                'data' => [$maleCount, $femaleCount]
                            ],
                        ]
                    ]
                ]);

                ?>
            </div>
        </div>
    </div>
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
                                'label' => Patients::SEX_FEMALE,
                                'backgroundColor' => "rgba(179,181,198,0.2)",
                                'borderColor' => "rgba(179,181,198,1)",
                                'pointBackgroundColor' => "rgba(179,181,198,1)",
                                'pointBorderColor' => "#fff",
                                'pointHoverBackgroundColor' => "#fff",
                                'pointHoverBorderColor' => "rgba(179,181,198,1)",
                                'data' => $femaleData
                            ],
                            [
                                'label' => Patients::SEX_MALE,
                                'backgroundColor' => "rgba(255,99,132,0.2)",
                                'borderColor' => "rgba(255,99,132,1)",
                                'pointBackgroundColor' => "rgba(255,99,132,1)",
                                'pointBorderColor' => "#fff",
                                'pointHoverBackgroundColor' => "#fff",
                                'pointHoverBorderColor' => "rgba(255,99,132,1)",
                                'data' => $maleData
                            ],
                            [
                                'label' => 'Common',
                                'backgroundColor' => "rgba(255,199,132,0.2)",
                                'borderColor' => "rgba(255,199,132,1)",
                                'pointBackgroundColor' => "rgba(255,199,132,1)",
                                'pointBorderColor' => "#fff",
                                'pointHoverBackgroundColor' => "#fff",
                                'pointHoverBorderColor' => "rgba(255,199,132,1)",
                                'data' => $commonData
                            ]
                        ]
                    ]
                ]);
                ?>
            </div>
        </div>
    </div>
</div>