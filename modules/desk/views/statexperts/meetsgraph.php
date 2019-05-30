<?php

use app\modules\desk\models\Meets;

/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\Experts */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('desk', 'Experts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$report = new CommonReport();
$report->expert_id = Yii::$app->user->identity->id;
$report->makeReport();
$types = $report->getTypesCount();
$labels = $report->getLabels();
$data = $report->getData();
$outpatientMeets = isset($data[Meets::TYPE_CONSULTATION])?$data[Meets::TYPE_CONSULTATION]:[];
$courseMeets= isset($data[Meets::TYPE_COURSE])?$data[Meets::TYPE_COURSE]:[];
$commonData = isset($data['common'])?$data['common']:[];



?>
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
