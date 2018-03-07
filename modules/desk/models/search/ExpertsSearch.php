<?php

namespace app\modules\desk\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\desk\models\Experts;

/**
 * ExpertsSearch represents the model behind the search form of `ut8ia\medicne\models\Experts`.
 */
class ExpertsSearch extends Experts
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'created_at', 'updated_at'], 'integer'],
            [['auth_key', 'password_hash', 'password_reset_token', 'email', 'status', 'surname', 'name', 'patronymic', 'short_info', 'info', 'slug'], 'safe'],
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
        $query = Experts::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['surname' => SORT_ASC]]
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
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'password_hash', $this->password_hash])
            ->andFilterWhere(['like', 'password_reset_token', $this->password_reset_token])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'surname', $this->surname])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'patronymic', $this->patronymic])
            ->andFilterWhere(['like', 'short_info', $this->short_info])
            ->andFilterWhere(['like', 'info', $this->info])
            ->andFilterWhere(['like', 'info', $this->info])
            ->andFilterWhere(['like', 'slug', $this->slug]);

        return $dataProvider;
    }
}
