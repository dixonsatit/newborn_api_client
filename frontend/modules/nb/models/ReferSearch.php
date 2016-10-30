<?php

namespace frontend\modules\nb\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\nb\models\Refer;

/**
 * ReferSearch represents the model behind the search form about `frontend\modules\nb\models\Refer`.
 */
class ReferSearch extends Refer
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'hospcode', 'patient_id', 'visit_id', 'refer_to', 'status', 'irefer_id', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['refer_hospital_name'], 'safe'],
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
    public function search($params,$type='in')
    {
        $query = Refer::find()->joinWith(['person','hospital']);

        if($type=='in') {
            $query->byReferToHospcode();
        }else{
            $query->byHospcode();
        }

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
            'hospcode' => $this->hospcode,
            'patient_id' => $this->patient_id,
            'visit_id' => $this->visit_id,
            'refer_to' => $this->refer_to,
            'status' => $this->status,
            'irefer_id' => $this->irefer_id,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'refer_hospital_name', $this->refer_hospital_name]);

        return $dataProvider;
    }
}
