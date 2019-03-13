<?php
/* @var $this yii\web\View */
/* @var $model app\modules\desk\models\Patients */

?>
<table class="labelfont" style="margin-left: 5px;">
    <tr>
        <td>
            <!--- head -->
            <div class="pull-right">
                <b>ЗАТВЕРДЖЕНО</b><br>
                Наказ Міністерства охорони здоров'я України<br>
                14 Лютого 2012 року №110<br>
            </div>
        </td>
    </tr>
    <tr>
        <td style="border: solid 2px #000">
            <!--- main label --->
            <table>
                <tr class="text-center" style="border-bottom: solid 2px #000">
                    <td>
                        <!-- label head -->
                        <table>
                            <tr>
                                <td width="45%" style="border-right: solid 1px #999;" class="labelsmallfont">
                                    Найменування міністерства, іншого органу виконавчої влади, підприємства, установи,
                                    організації, до сфери управління якого належить заклад охорони здоров'я.
                                    <br>
                                    <br>
                                    Найменування та місцезнаходження (повна поштова адреса) закладу охорони здоров'я, де
                                    заповнюється форма :
                                    <b>
                                        ДЗ Український медичний центр раебілітації дітей з органічним ураженням нервової
                                        системи МОЗ України
                                    </b>
                                    <br>
                                    Код за ЕДРПОУ 20072556
                                </td>
                                <td width="10%"></td>
                                <td width="45%" style="border-left: solid 1px #999">
                                    <div style="margin-top:0px;border-bottom: solid 1px #999;">Медична документація
                                    </div>
                                    <br>
                                    Форма первинної облікової документації <b>№025/о</b><br>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr class="text-center" style="border-bottom: solid 2px #000">
                    <td>
                        <!-- table center -->
                        <br>
                        <div class="labelbigfont"> Медична картка амбулаторного хворого
                            № <b><?= $model->card_number ?></b></div>
                        Код хворого <?= $model->card_number ?>
                        дата заповнення картки
                         bns<span class="underlined">
                            <?= Yii::$app->time->date2front(date(time())) ?>
                        </span>
                        <br><br>
                    </td>
                </tr>
                <tr>
                    <td class="text-center">
                        <!-- table footer -->
                        <br><br>
                        <div>
                            <div class="labelheader text-center ">
                                <?= $model->surname ?>
                                <?= $model->name ?>
                                <?= $model->patronymic ?>
                            </div>
                            <div class="labelsmallfont text-center">(Прізвище, ім'я, по батькові )</div>
                        </div>
                        <br>
                        <div>Стать :<span class="underlined"><?= $model->getSexes()[$model->sex] ?></span>
                            Дата народження :<span
                                    class="underlined"><?= Yii::$app->time->date2front($model->birthdate) ?></span>

                        </div>
                        <br>
                        <div>
                            телефон :<span class="underlined"><?= $model->phone ?></span>
                            e-mail :<span class="underlined"><?= $model->email ?></span>
                        </div>
                        <br>
                        <div>Місце проживання :
                            <span class="underlined">
                                <?= $model->city ?> <?= $model->address ?>
                            </span>
                        </div>
                        <br>
                        <div>Диспансерна група так ____ ні ___</div>
                        <br>
                        <div>Контингент ________________ номер пільгового посвідчення ____________________</div>
                        <br>

                        <div>Взятий на облік ___________________ Знятий з обліку ___________________</div>
                        <br>
                    </td>
                </tr>
            </table>
            <!-- and main label -->
        </td>
    </tr>
</table>