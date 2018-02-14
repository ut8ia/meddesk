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

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                'items' => [
                    ['label' => 'Menu ', 'options' => ['class' => 'header']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => 'Мій кабінет',
                        'icon' => 'star',
                        'url' => ['#'],
                        'items' => [
                            ['label' => 'Мої пацієнти', 'icon' => 'child', 'url' => ['/desk/mypatients'],],
                            ['label' => 'Приймання', 'icon' => 'heartbeat', 'url' => ['/desk/mymeets'],],
                            ['label' => 'Розклад прийому', 'icon' => 'calendar', 'url' => ['/desk/myschedule'],],
                            ['label' => 'Моя статистика', 'icon' => 'bar-chart', 'url' => ['/desk/mystatistics'],],
                            ['label' => 'Мої налаштування', 'icon' => 'gear', 'url' => ['/desk/profile'],],
                        ]
                    ],
                    [
                        'label' => 'Реєстратура',
                        'icon' => 'book',
                        'url' => ['#'],
                        'items' => [
                            ['label' => 'Пацієнти', 'icon' => 'child', 'url' => ['/desk/patients'],],
                            ['label' => 'Приймання', 'icon' => 'heartbeat', 'url' => ['/desk/meets'],],
                            ['label' => 'Розклад прийому', 'icon' => 'calendar', 'url' => ['/desk/schedule'],],
                            ['label' => 'Шаблони розкладу', 'icon' => 'calendar-check-o', 'url' => ['/desk/scheduletemplates'],]
                        ]
                    ],
                    [
                        'label' => 'Курси реабілітації',
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
                        'icon' => 'dashboard',
                        'url' => ['#'],
                        'items' => [
                            ['label' => 'Фахівці', 'icon' => 'user', 'url' => ['/desk/experts'],],
                            ['label' => 'Неробочі дні', 'icon' => 'calendar-o', 'url' => ['/desk/scheduleexceptiondays'],],
                        ]
                    ],
                    [
                        'label' => 'Статистика',
                        'icon' => 'bar-chart-o',
                        'url' => ['#'],
                        'items' => [
                            ['label' => 'Загальна', 'icon' => 'signal', 'url' => ['/desk/statcommon'],],
                            ['label' => 'По Фахівціям', 'icon' => 'user-plus', 'url' => ['/desk/statexperts'],],
                            ['label' => 'По Пацієнтам', 'icon' => 'child', 'url' => ['/desk/statpatients'],],
                        ]
                    ],
                    [
                        'label' => 'Налаштування',
                        'icon' => 'wrench',
                        'url' => ['#'],
                        'items' => [
                            ['label' => 'Групи фахівців', 'icon' => 'users', 'url' => ['/desk/expertgroups'],],
                            ['label' => 'Діагнози', 'icon' => 'dashboard', 'url' => ['/desk/diagnoses'],],
                            ['label' => 'Місця прийому', 'icon' => 'map-pin', 'url' => ['/desk/places'],],
                            ['label' => 'Будівлі', 'icon' => 'building', 'url' => ['/desk/buildings'],],
                            ['label' => 'Переклади', 'icon' => 'language', 'url' => ['/translatemanager/language/translate?LanguageSourceSearch[category]=desk&LanguageSourceSearch[message]=&LanguageSourceSearch[translation]=&language_id=' . Yii::$app->language],],
                        ]
                    ],
                    [
                        'label' => 'Tech',
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

//                    [
//                        'label' => 'Some tools',
//                        'icon' => 'share',
//                        'url' => '#',
//                        'items' => [
//                            ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
//                            ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
//                            [
//                                'label' => 'Level One',
//                                'icon' => 'circle-o',
//                                'url' => '#',
//                                'items' => [
//                                    ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
//                                    [
//                                        'label' => 'Level Two',
//                                        'icon' => 'circle-o',
//                                        'url' => '#',
//                                        'items' => [
//                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
//                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
//                                        ],
//                                    ],
//                                ],
//                            ],
//                        ],
//                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
