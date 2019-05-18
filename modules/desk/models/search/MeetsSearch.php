<?php

namespace app\modules\desk\models\search;

use app\modules\desk\helpers\DateFilter;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\desk\models\Meets;

/**
 * MeetsSearch represents the model behind the search form of `app\modules\desk\models\Meets`.
 */
class MeetsSearch extends Meets
{
    public $patient_name;
    public $expert_name;
    public $time_filter_to;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'expert_id', 'expert_group_id', 'patient_id', 'place_id', 'course_id', 'for_excerpt'], 'integer'],
            [['status', 'text', 'comment', 'time_from', 'time_to', 'time_filter_to'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }


    public function formatParams()
    {
        $this->patient_name = Yii::$app->formatter
            ->asObject([
                'object' => $this->patients,
                'view' => 'search_result'
            ]);

        $this->expert_name = Yii::$app->formatter
            ->asObject([
                'object' => $this->experts,
                'view' => 'search_result'
            ]);
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Meets::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['id' => SORT_DESC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'expert_id' => $this->expert_id,
            'expert_group_id' => $this->expert_group_id,
            'patient_id' => $this->patient_id,
            'place_id' => $this->place_id,
            'course_id' => $this->course_id,
            'for_excerpt' => $this->for_excerpt,
        ]);

        DateFilter::apply($query,$this->time_from,$this->time_filter_to ,'time_from');

        $query->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'text', $this->text])
            ->andFilterWhere(['like', 'comment', $this->comment]);

        return $dataProvider;
    }
}
