<?php

namespace app\modules\desk\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\desk\models\Buildings;

/**
 * BuildingsSearch represents the model behind the search form of `app\modules\desk\models\Buildings`.
 */
class BuildingsSearch extends Buildings
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'floors'], 'integer'],
            [['name', 'adress'], 'safe'],
            [['lattitude', 'longitude'], 'number'],
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
        $query = Buildings::find()->with('places');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
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
            'lattitude' => $this->lattitude,
            'longitude' => $this->longitude,
            'floors' => $this->floors,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'adress', $this->adress]);

        return $dataProvider;
    }
}
