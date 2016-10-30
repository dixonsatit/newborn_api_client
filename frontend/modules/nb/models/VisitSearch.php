<?php

namespace frontend\modules\nb\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\nb\models\Visit;

/**
 * VisitSearch represents the model behind the search form about `frontend\modules\nb\models\Visit`.
 */
class VisitSearch extends Visit
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['visit_id', 'patient_id', 'age', 'bp_max', 'bp_min', 'created_by', 'updated_by', 'created_at', 'updated_at', 'milk', 'milk_milk_powder', 'milk_powder'], 'integer'],
            [['seq', 'hospcode', 'hn', 'date', 'clinic', 'pttype', 'age_type', 'result', 'referin', 'referout', 'inp_id', 'tsh_pku', 'tsh_pku_date', 'tsh_pku_time', 'tsh_pku_result', 'oae', 'oae_date', 'oae_abr', 'oae_right', 'oae_left', 'oae_result', 'ivh_ult_brain', 'ivh_date', 'ivh_result', 'rop', 'rop_date', 'rop_result', 'rop_hosp_appointment', 'lastupdate', 'ga', 'hc', 'length', 'af', 'x', 'foster_name', 'vaccine', 'vaccine_other', 'disease', 'complication', 'procedure_code', 'summary'], 'safe'],
            [['head_size', 'height', 'weight', 'waist'], 'number'],
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
    public function search($params,$person_id)
    {
        $query = Visit::find()->byPersonId($person_id);

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
            'visit_id' => $this->visit_id,
            'patient_id' => $this->patient_id,
            'date' => $this->date,
            'age' => $this->age,
            'head_size' => $this->head_size,
            'height' => $this->height,
            'weight' => $this->weight,
            'waist' => $this->waist,
            'bp_max' => $this->bp_max,
            'bp_min' => $this->bp_min,
            'tsh_pku_date' => $this->tsh_pku_date,
            'tsh_pku_time' => $this->tsh_pku_time,
            'oae_date' => $this->oae_date,
            'oae_abr' => $this->oae_abr,
            'ivh_date' => $this->ivh_date,
            'rop_date' => $this->rop_date,
            'lastupdate' => $this->lastupdate,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'milk' => $this->milk,
            'milk_milk_powder' => $this->milk_milk_powder,
            'milk_powder' => $this->milk_powder,
        ]);

        $query->andFilterWhere(['like', 'seq', $this->seq])
            ->andFilterWhere(['like', 'hospcode', $this->hospcode])
            ->andFilterWhere(['like', 'hn', $this->hn])
            ->andFilterWhere(['like', 'clinic', $this->clinic])
            ->andFilterWhere(['like', 'pttype', $this->pttype])
            ->andFilterWhere(['like', 'age_type', $this->age_type])
            ->andFilterWhere(['like', 'result', $this->result])
            ->andFilterWhere(['like', 'referin', $this->referin])
            ->andFilterWhere(['like', 'referout', $this->referout])
            ->andFilterWhere(['like', 'inp_id', $this->inp_id])
            ->andFilterWhere(['like', 'tsh_pku', $this->tsh_pku])
            ->andFilterWhere(['like', 'tsh_pku_result', $this->tsh_pku_result])
            ->andFilterWhere(['like', 'oae', $this->oae])
            ->andFilterWhere(['like', 'oae_right', $this->oae_right])
            ->andFilterWhere(['like', 'oae_left', $this->oae_left])
            ->andFilterWhere(['like', 'oae_result', $this->oae_result])
            ->andFilterWhere(['like', 'ivh_ult_brain', $this->ivh_ult_brain])
            ->andFilterWhere(['like', 'ivh_result', $this->ivh_result])
            ->andFilterWhere(['like', 'rop', $this->rop])
            ->andFilterWhere(['like', 'rop_result', $this->rop_result])
            ->andFilterWhere(['like', 'rop_hosp_appointment', $this->rop_hosp_appointment])
            ->andFilterWhere(['like', 'ga', $this->ga])
            ->andFilterWhere(['like', 'hc', $this->hc])
            ->andFilterWhere(['like', 'length', $this->length])
            ->andFilterWhere(['like', 'af', $this->af])
            ->andFilterWhere(['like', 'x', $this->x])
            ->andFilterWhere(['like', 'foster_name', $this->foster_name])
            ->andFilterWhere(['like', 'vaccine', $this->vaccine])
            ->andFilterWhere(['like', 'vaccine_other', $this->vaccine_other])
            ->andFilterWhere(['like', 'disease', $this->disease])
            ->andFilterWhere(['like', 'complication', $this->complication])
            ->andFilterWhere(['like', 'procedure_code', $this->procedure_code])
            ->andFilterWhere(['like', 'summary', $this->summary]);

        return $dataProvider;
    }
}
