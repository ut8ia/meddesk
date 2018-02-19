<?php
use dosamigos\chartjs\ChartJs;

?>
<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>150</h3>

                <p>Первинних прийомів</p>
            </div>
            <div class="icon">
                <i class="fa fa-child"></i>
            </div>
            <a href="#" class="small-box-footer">Детальніше<i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Повторних</p>
            </div>
            <div class="icon">
                <i class="fa fa-file"></i>
            </div>
            <a href="#" class="small-box-footer">Детальніше<i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>44</h3>

                <p>Прийома на курсі</p>
            </div>
            <div class="icon">
                <i class="fa fa-check"></i>
            </div>
            <a href="#" class="small-box-footer">Детальніше<i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3>65</h3>

                <p>Запланованих прийома</p>
            </div>
            <div class="icon">
                <i class="fa fa-arrow-circle-right"></i>
            </div>
            <a href="#" class="small-box-footer">Детальніше<i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-3">
        <div class="box box-primary">
            <div class="box-body no-padding">
                <?=

                ChartJs::widget([
                    'type' => 'doughnut',
                    'options' => [
                        'height' => 480,
                        'width' => 300
                    ],
                    'data' => [
                        'labels' => ["G80.1", "G80.2", "G80.3", "G80.4", "G80.5"],
                        'datasets' => [
                            [
                                'label' => "My First dataset",
                                'backgroundColor' => ['blue', 'red', 'yellow', 'green', 'aqua'],
                                'data' => [65, 20, 90, 81, 40]
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
                        'labels' => ["January", "February", "March", "April", "May", "June", "July"],
                        'datasets' => [
                            [
                                'label' => "Консультація",
                                'backgroundColor' => "rgba(179,181,198,0.2)",
                                'borderColor' => "rgba(179,181,198,1)",
                                'pointBackgroundColor' => "rgba(179,181,198,1)",
                                'pointBorderColor' => "#fff",
                                'pointHoverBackgroundColor' => "#fff",
                                'pointHoverBorderColor' => "rgba(179,181,198,1)",
                                'data' => [65, 59, 90, 81, 56, 55, 40]
                            ],
                            [
                                'label' => "Курс",
                                'backgroundColor' => "rgba(255,99,132,0.2)",
                                'borderColor' => "rgba(255,99,132,1)",
                                'pointBackgroundColor' => "rgba(255,99,132,1)",
                                'pointBorderColor' => "#fff",
                                'pointHoverBackgroundColor' => "#fff",
                                'pointHoverBorderColor' => "rgba(255,99,132,1)",
                                'data' => [28, 48, 40, 19, 96, 27, 100]
                            ]
                        ]
                    ]
                ]);
                ?>
            </div>
        </div>
    </div>

</div>