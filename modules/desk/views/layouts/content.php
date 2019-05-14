<?php
use yii\widgets\Breadcrumbs;
use dmstr\widgets\Alert;

?>
<div class="content-wrapper">
    <section class="content-header">


        <h1><?= $this->blocks['content-header'] ?: '&nbsp' ?></h1>
        <?=
        Breadcrumbs::widget(
            [
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]
        )
        ?>
    </section>

    <section class="content">
        <?= Alert::widget() ?>
        <?= $content ?>
    </section>
</div>

<footer class="main-footer">
    <?= date('Y-m-d H:m:s', time()); ?>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <!--    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">-->
    <!--        <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>-->
    <!--    </ul>-->
    <!-- Tab panes -->
    <div class="tab-content">
        <!-- Home tab content -->
        <div class="tab-pane active" id="control-sidebar-settings-tab">
            <!-- /.control-sidebar-menu -->
            <h3 class="control-sidebar-heading">Skins</h3>
            <ul class="list-unstyled clearfix">
                <li style="float:left; width: 33.33333%; padding: 5px;"><a href="/desk/profile/set-theme?theme=skin-blue"
                                                                           data-skin="skin-blue"
                                                                           style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)"
                                                                           class="clearfix full-opacity-hover">
                        <div>
                            <span style="display:block; width: 20%; float: left; height: 7px; background: #367fa9"></span><span
                                    class="bg-light-blue"
                                    style="display:block; width: 80%; float: left; height: 7px;"></span></div>
                        <div>
                            <span style="display:block; width: 20%; float: left; height: 20px; background: #222d32"></span><span
                                    style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span>
                        </div>
                    </a>
                    <p class="text-center no-margin">Blue</p></li>
                <li style="float:left; width: 33.33333%; padding: 5px;"><a href="/desk/profile/set-theme?theme=skin-black"
                                                                           data-skin="skin-black"
                                                                           style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)"
                                                                           class="clearfix full-opacity-hover">
                        <div style="box-shadow: 0 0 2px rgba(0,0,0,0.1)" class="clearfix"><span
                                    style="display:block; width: 20%; float: left; height: 7px; background: #fefefe"></span><span
                                    style="display:block; width: 80%; float: left; height: 7px; background: #fefefe"></span>
                        </div>
                        <div>
                            <span style="display:block; width: 20%; float: left; height: 20px; background: #222"></span><span
                                    style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span>
                        </div>
                    </a>
                    <p class="text-center no-margin">Black</p></li>
                <li style="float:left; width: 33.33333%; padding: 5px;"><a href="/desk/profile/set-theme?theme=skin-purple"
                                                                           data-skin="skin-purple"
                                                                           style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)"
                                                                           class="clearfix full-opacity-hover">
                        <div><span style="display:block; width: 20%; float: left; height: 7px;"
                                   class="bg-purple-active"></span><span class="bg-purple"
                                                                         style="display:block; width: 80%; float: left; height: 7px;"></span>
                        </div>
                        <div>
                            <span style="display:block; width: 20%; float: left; height: 20px; background: #222d32"></span><span
                                    style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span>
                        </div>
                    </a>
                    <p class="text-center no-margin">Purple</p></li>
                <li style="float:left; width: 33.33333%; padding: 5px;"><a href="/desk/profile/set-theme?theme=skin-green"
                                                                           data-skin="skin-green"
                                                                           style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)"
                                                                           class="clearfix full-opacity-hover">
                        <div><span style="display:block; width: 20%; float: left; height: 7px;"
                                   class="bg-green-active"></span><span class="bg-green"
                                                                        style="display:block; width: 80%; float: left; height: 7px;"></span>
                        </div>
                        <div>
                            <span style="display:block; width: 20%; float: left; height: 20px; background: #222d32"></span><span
                                    style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span>
                        </div>
                    </a>
                    <p class="text-center no-margin">Green</p></li>
                <li style="float:left; width: 33.33333%; padding: 5px;"><a href="/desk/profile/set-theme?theme=skin-red"
                                                                           data-skin="skin-red"
                                                                           style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)"
                                                                           class="clearfix full-opacity-hover">
                        <div><span style="display:block; width: 20%; float: left; height: 7px;"
                                   class="bg-red-active"></span><span class="bg-red"
                                                                      style="display:block; width: 80%; float: left; height: 7px;"></span>
                        </div>
                        <div>
                            <span style="display:block; width: 20%; float: left; height: 20px; background: #222d32"></span><span
                                    style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span>
                        </div>
                    </a>
                    <p class="text-center no-margin">Red</p></li>
                <li style="float:left; width: 33.33333%; padding: 5px;"><a href="/desk/profile/set-theme?theme=skin-yellow"
                                                                           data-skin="skin-yellow"
                                                                           style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)"
                                                                           class="clearfix full-opacity-hover">
                        <div><span style="display:block; width: 20%; float: left; height: 7px;"
                                   class="bg-yellow-active"></span><span class="bg-yellow"
                                                                         style="display:block; width: 80%; float: left; height: 7px;"></span>
                        </div>
                        <div>
                            <span style="display:block; width: 20%; float: left; height: 20px; background: #222d32"></span><span
                                    style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span>
                        </div>
                    </a>
                    <p class="text-center no-margin">Yellow</p></li>
                <li style="float:left; width: 33.33333%; padding: 5px;"><a href="/desk/profile/set-theme?theme=skin-blue-light"
                                                                           data-skin="skin-blue-light"
                                                                           style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)"
                                                                           class="clearfix full-opacity-hover">
                        <div>
                            <span style="display:block; width: 20%; float: left; height: 7px; background: #367fa9"></span><span
                                    class="bg-light-blue"
                                    style="display:block; width: 80%; float: left; height: 7px;"></span></div>
                        <div>
                            <span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc"></span><span
                                    style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span>
                        </div>
                    </a>
                    <p class="text-center no-margin" style="font-size: 12px">Blue Light</p></li>
                <li style="float:left; width: 33.33333%; padding: 5px;"><a href="/desk/profile/set-theme?theme=skin-black-light"
                                                                           data-skin="skin-black-light"
                                                                           style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)"
                                                                           class="clearfix full-opacity-hover">
                        <div style="box-shadow: 0 0 2px rgba(0,0,0,0.1)" class="clearfix"><span
                                    style="display:block; width: 20%; float: left; height: 7px; background: #fefefe"></span><span
                                    style="display:block; width: 80%; float: left; height: 7px; background: #fefefe"></span>
                        </div>
                        <div>
                            <span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc"></span><span
                                    style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span>
                        </div>
                    </a>
                    <p class="text-center no-margin" style="font-size: 12px">Black Light</p></li>
                <li style="float:left; width: 33.33333%; padding: 5px;"><a href="/desk/profile/set-theme?theme=skin-purple-light"
                                                                           data-skin="skin-purple-light"
                                                                           style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)"
                                                                           class="clearfix full-opacity-hover">
                        <div><span style="display:block; width: 20%; float: left; height: 7px;"
                                   class="bg-purple-active"></span><span class="bg-purple"
                                                                         style="display:block; width: 80%; float: left; height: 7px;"></span>
                        </div>
                        <div>
                            <span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc"></span><span
                                    style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span>
                        </div>
                    </a>
                    <p class="text-center no-margin" style="font-size: 12px">Purple Light</p></li>
                <li style="float:left; width: 33.33333%; padding: 5px;"><a href="/desk/profile/set-theme?theme=skin-green-light"
                                                                           data-skin="skin-green-light"
                                                                           style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)"
                                                                           class="clearfix full-opacity-hover">
                        <div><span style="display:block; width: 20%; float: left; height: 7px;"
                                   class="bg-green-active"></span><span class="bg-green"
                                                                        style="display:block; width: 80%; float: left; height: 7px;"></span>
                        </div>
                        <div>
                            <span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc"></span><span
                                    style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span>
                        </div>
                    </a>
                    <p class="text-center no-margin" style="font-size: 12px">Green Light</p></li>
                <li style="float:left; width: 33.33333%; padding: 5px;"><a href="/desk/profile/set-theme?theme=skin-red-light"
                                                                           data-skin="skin-red-light"
                                                                           style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)"
                                                                           class="clearfix full-opacity-hover">
                        <div><span style="display:block; width: 20%; float: left; height: 7px;"
                                   class="bg-red-active"></span><span class="bg-red"
                                                                      style="display:block; width: 80%; float: left; height: 7px;"></span>
                        </div>
                        <div>
                            <span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc"></span><span
                                    style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span>
                        </div>
                    </a>
                    <p class="text-center no-margin" style="font-size: 12px">Red Light</p></li>
                <li style="float:left; width: 33.33333%; padding: 5px;"><a href="/desk/profile/set-theme?theme=skin-yellow-light"
                                                                           data-skin="skin-yellow-light"
                                                                           style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)"
                                                                           class="clearfix full-opacity-hover">
                        <div><span style="display:block; width: 20%; float: left; height: 7px;"
                                   class="bg-yellow-active"></span><span class="bg-yellow"
                                                                         style="display:block; width: 80%; float: left; height: 7px;"></span>
                        </div>
                        <div>
                            <span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc"></span><span
                                    style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7"></span>
                        </div>
                    </a>
                    <p class="text-center no-margin" style="font-size: 12px">Yellow Light</p></li>
            </ul>
            <!-- /.control-sidebar-menu -->
        </div>
        <!-- /.tab-pane -->
        <!-- /.tab-pane -->
    </div>
</aside><!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class='control-sidebar-bg'></div>