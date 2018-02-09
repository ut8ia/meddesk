<?php

namespace app\modules\desk\components;

use yii\base\Component;
use app\modules\desk\models\Meets;
use Yii;

class Expert extends Component
{
    public $id;
    public $expert_group_id;

    public $time_from;
    public $time_to;

    public function init()
    {
        $this->id = Yii::$app->user->id;
        $this->expert_group_id = Yii::$app->session->get('expert.expert_group_id');
        parent::init();
    }


    /**
     * @param null|array $where
     * @return mixed
     */
    public function findMeets($where = null)
    {
        return Meets::find()
            ->where(['expert_id' => $this->id])
            ->filterWhere($where)
            ->andFilterWhere(['status' => $this->expert_group_id])
            ->all();
    }


}