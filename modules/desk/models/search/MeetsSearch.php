<?php

namespace app\modules\desk\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\desk\models\Meets;

/**
 * MeetsSearch represents the model behind the search form of `app\modules\desk\models\Meets`.
 */
class MeetsSearch extends Meets
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'expert_id', 'expert_group_id', 'patient_id', 'place_id', 'course_id', 'for_excerpt'], 'integer'],
            [['status', 'text', 'comment', 'time_from', 'time_to'], 'safe'],
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

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['time_from'=>SORT_ASC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
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
            'time_from' => $this->time_from,
            'time_to' => $this->time_to,
        ]);

        $query->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'text', $this->text])
            ->andFilterWhere(['like', 'comment', $this->comment]);

        return $dataProvider;
    }
}
