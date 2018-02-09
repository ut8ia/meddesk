<?php

namespace app\modules\desk\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\desk\models\DiagnosesAppointments;

/**
 * DiagnosesAppointments represents the model behind the search form of `app\modules\desk\models\DiagnosesAppointments`.
 */
class DiagnosesAppointmentsSearch extends DiagnosesAppointments
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'patient_id', 'expert_id', 'expert_group_id', 'diagnoses_id'], 'integer'],
            [['appointment_type', 'date', 'text'], 'safe'],
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
        $query = DiagnosesAppointments::find();

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
            'patient_id' => $this->patient_id,
            'expert_id' => $this->expert_id,
            'expert_group_id' => $this->expert_group_id,
            'diagnoses_id' => $this->diagnoses_id,
            'date' => $this->date,
        ]);

        $query->andFilterWhere(['like', 'appointment_type', $this->appointment_type])
            ->andFilterWhere(['like', 'text', $this->text]);

        return $dataProvider;
    }
}
