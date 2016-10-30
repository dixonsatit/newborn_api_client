<?php

namespace frontend\modules\nb\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\nb\models\VisitScreening;

/**
 * VisitScreeningSearch represents the model behind the search form about `frontend\modules\newborn7\models\VisitScreening`.
 */
class VisitScreeningSearch extends VisitScreening
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'hospcode', 'patient_visit'], 'integer'],
            [['type', 'check_date', 'result','oae_left','oae_right','ivh'], 'safe'],
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
    public function search($params,$visit_id,$type)
    {
        $query = VisitScreening::find()->byPatientVisit($visit_id,$type);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=>[
              'defaultOrder'=>[
                'check_date' => SORT_ASC
              ]
            ]
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
            'hospcode' => $this->hospcode,
            'patient_visit' => $this->patient_visit,
            'check_date' => $this->check_date
        ]);

        $query->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'result', $this->result])
            ->andFilterWhere(['like', 'oae_left', $this->result])
            ->andFilterWhere(['like', 'oae_right', $this->result]);

        return $dataProvider;
    }
}
