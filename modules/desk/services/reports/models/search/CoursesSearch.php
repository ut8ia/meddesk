<?php

namespace app\modules\desk\services\reports\models\search;

use app\modules\desk\services\reports\models\Courses;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\desk\services\reports\models\Diagnoses;

/**
 * Class CoursesSearch
 * @package app\modules\desk\services\reports\models\search
 */
class CoursesSearch extends \app\modules\desk\services\reports\models\Courses
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['number'], 'safe'],
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
        $query = Courses::find()
        ->with('patients');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['number'=>SORT_ASC]]
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
        ]);


        return $dataProvider;
    }
}
