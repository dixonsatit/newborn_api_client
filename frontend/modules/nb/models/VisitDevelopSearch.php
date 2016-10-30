<?php

namespace frontend\modules\nb\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\nb\models\VisitDevelop;

/**
 * VisitDevelopSearch represents the model behind the search form about `frontend\modules\nb\models\VisitDevelop`.
 */
class VisitDevelopSearch extends VisitDevelop
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['visit_id', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['age_group', 'develop_no', 'lastupdate'], 'safe'],
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
        $query = VisitDevelop::find();

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
            'lastupdate' => $this->lastupdate,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'age_group', $this->age_group])
            ->andFilterWhere(['like', 'develop_no', $this->develop_no]);

        return $dataProvider;
    }
}
