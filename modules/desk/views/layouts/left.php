<?php

use app\services\rbac\MenuHelper;
use app\services\rbac\Permissions;
use dmstr\widgets\Menu;

?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= Yii::$app->user->identity->getImageIcon() ?>" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->formatter->asObject(
                        [
                            'object' => Yii::$app->user->identity,
                            'view' => 'short'
                        ]);
                    ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <!--        <form action="#" method="get" class="sidebar-form">-->
        <!--            <div class="input-group">-->
        <!--                <input type="text" name="q" class="form-control" placeholder="Search..."/>-->
        <!--                <span class="input-group-btn">-->
        <!--                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>-->
        <!--                </button>-->
        <!--              </span>-->
        <!--            </div>-->
        <!--        </form>-->
        <!-- /.search form -->

        <?= Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                'items' => MenuHelper::allow([
                    ['label' => 'Menu ', 'options' => ['class' => 'header']],
//                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => 'Домівка',
                        'permission' => Permissions::PERMISSION_ALL,
                        'icon' => 'home',
                        'url' => ['/desk/start/'],
                    ],
                    [
                        'label' => 'Мій кабінет',
                        'permission' => Permissions::PERMISSION_ALL,
                        'icon' => 'star',
                        'url' => ['#'],
                        'items' => [
                            ['label' => 'Мої пацієнти', 'icon' => 'child', 'url' => ['/desk/mypatients'],],
                            ['label' => 'Мої Приймання', 'icon' => 'heartbeat', 'url' => ['/desk/mymeets'],],
//                            ['label' => 'Мій Розклад прийому', 'icon' => 'calendar', 'url' => ['/desk/myschedule'],],
                            ['label' => 'Моя статистика', 'icon' => 'bar-chart', 'url' => ['/desk/mystatistics'],],
                            ['label' => 'Мої налаштування', 'icon' => 'gear', 'url' => ['/desk/profile'],],
                        ]
                    ],
                    [
                        'label' => 'Реєстратура',
                        'permission' => Permissions::PERMISSION_SCHEDULE,
                        'icon' => 'book',
                        'url' => ['#'],
                        'items' => [
                            ['label' => 'Пацієнти', 'icon' => 'child', 'url' => ['/desk/patients'],],
                            ['label' => 'Приймання', 'icon' => 'heartbeat', 'url' => ['/desk/meets'],],
//                            ['label' => 'Розклад прийому', 'icon' => 'calendar', 'url' => ['/desk/schedule'],],
//                            ['label' => 'Шаблони розкладу', 'icon' => 'calendar-check-o', 'url' => ['/desk/scheduletemplates'],],
                            ['label' => 'Стат талони', 'icon' => 'calendar', 'url' => ['/desk/stat-tickets'],],
                        ]
                    ],
                    [
                        'label' => 'Курси реабілітації',
                        'permission' => Permissions::PERMISSION_MANAGE,
                        'icon' => 'th-list',
                        'url' => ['#'],
                        'items' => [
                            ['label' => 'Курси реабілатції', 'icon' => 'list', 'url' => ['/desk/courses'],],
                            ['label' => 'Записи на курс', 'icon' => 'indent', 'url' => ['/desk/courseslist'],],
                            ['label' => 'Виписки', 'icon' => 'file-pdf-o', 'url' => ['/desk/excerpts'],],
                        ]
                    ],
                    [
                        'label' => 'Адміністратор',
                        'permission'=>Permissions::PERMISSION_MANAGE,
                        'icon' => 'dashboard',
                        'url' => ['#'],
                        'items' => [
                            ['label' => 'Фахівці', 'icon' => 'user', 'url' => ['/desk/experts'],],
                            ['label' => 'Неробочі дні', 'icon' => 'calendar-o', 'url' => ['/desk/scheduleexceptiondays'],],
                        ]
                    ],
                    [
                        'label' => 'Статистика',

                        'permission'=>Permissions::PERMISSION_STATISTIC,
                        'icon' => 'bar-chart-o',
                        'url' => ['#'],
                        'items' => [
                            ['label' => 'Загальна', 'icon' => 'signal', 'url' => ['/desk/statcommon'],],
                            ['label' => 'По Фахівціям', 'icon' => 'user-plus', 'url' => ['/desk/statexperts'],],
                            ['label' => 'По Діагнозам', 'icon' => 'child', 'url' => ['/desk/statdiagnoses'],],
                        ]
                    ],
                    [
                        'label' => 'Налаштування',
                        'permission'=>Permissions::PERMISSION_SETTINGS,
                        'icon' => 'wrench',
                        'url' => ['#'],
                        'items' => [
                            ['label' => 'Групи консультації', 'icon' => 'tasks', 'url' => ['/desk/consultationgroups'],],
                            ['label' => 'Методи діагностики', 'icon' => 'tasks', 'url' => ['/desk/diagnosticgroups'],],
                            ['label' => 'Методи реабілітації', 'icon' => 'tasks', 'url' => ['/desk/rehabilitationgroups'],],
                            ['label' => 'Загалні групи фахівців', 'icon' => 'users', 'url' => ['/desk/expertgroups'],],
                            ['label' => 'Діагнози', 'icon' => 'dashboard', 'url' => ['/desk/diagnoses'],],
                            ['label' => 'Місця прийому', 'icon' => 'map-pin', 'url' => ['/desk/places'],],
                            ['label' => 'Будівлі', 'icon' => 'building', 'url' => ['/desk/buildings'],],
                            ['label' => 'Переклади', 'icon' => 'language', 'url' => ['/translatemanager/language/translate?LanguageSourceSearch[category]=desk&LanguageSourceSearch[message]=&LanguageSourceSearch[translation]=&language_id=' . Yii::$app->language],],
                        ]
                    ],
                    [
                        'label' => 'Tech',
                        'permission'=>Permissions::PERMISSION_DEBUG,
                        'icon' => 'dashboard',
                        'url' => ['#'],
                        'items' => [
                            ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                            ['label' => 'Debug page', 'icon' => 'dashboard', 'url' => ['/desk/dev'],],
                            ['label' => 'Techmeets', 'icon' => 'dashboard', 'url' => ['/desk/techmeets'],],
                            ['label' => 'Переклади', 'icon' => 'language', 'url' => ['/translatemanager'],
                                'items' => [
                                    ['label' => 'Поточна мова', 'icon' => 'circle-o', 'url' => ['/translatemanager/language/translate?language_id=' . Yii::$app->language],],
                                    ['label' => 'Мови', 'icon' => 'circle-o', 'url' => ['/translatemanager/language/list'],],
                                    ['label' => 'Скан', 'icon' => 'circle-o', 'url' => ['/translatemanager/language/scan'],],
                                    ['label' => 'Оптимізація', 'icon' => 'circle-o', 'url' => ['/translatemanager/language/optimizer'],],
                                    ['label' => 'Імпорт', 'icon' => 'circle-o', 'url' => ['/translatemanager/language/import'],],
                                    ['label' => 'Експорт', 'icon' => 'circle-o', 'url' => ['/translatemanager/language/export'],],
                                ]
                            ],
                        ]
                    ],
                ]),
            ]
        ) ?>

    </section>

</aside>
