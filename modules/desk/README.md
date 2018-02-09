# medicine module

apply migrations :
-
~~~
./yii migrate --migrationPath=modules/desk/migrations
~~~

config as module :
-
~~~
'modules' => [
        'desk' => [
            'class' => 'app\modules\desk\MedicineModule',
            'layoutPath' => '@app/modules/desk/views/layouts',
            'partialsPath' => '@app/modules/desk/views/partials/',
            'layout' => 'adminlte',
            'formsConfig' => [
                'enableClientValidation' => true,
                'options' => ['class' => 'form-horizontal', 'style' => 'padding-left:0px;'],
                'fieldConfig' => [
                    'template' => '<div class="col-lg-2">{label}</div><div class="col-lg-10">{input}{error}</div>',
                    'labelOptions' => ['class' => 'form-label'],
                    'inputOptions' => ['class' => 'form-control'],
                ],
            ],
            'usersClass' => app\models\User::class,
        ],
    ],
~~~
