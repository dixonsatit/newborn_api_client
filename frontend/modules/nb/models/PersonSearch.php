<?php

namespace frontend\modules\nb\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\nb\models\Person;

/**
 * PersonSearch represents the model behind the search form about `frontend\modules\nb\models\Person`.
 */
class PersonSearch extends Person
{
    public $fullName;
    public $hospitalName;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hospcode', 'cid', 'pid', 'hid', 'prename', 'name', 'lname', 'hn', 'sex', 'birth', 'mstatus', 'occupation_old', 'occupation_new', 'race', 'nation', 'religion', 'education', 'fstatus', 'father', 'mother', 'couple', 'vstatus', 'movein', 'discharge', 'ddischarge', 'abogroup', 'rhgroup', 'labor', 'passport', 'typearea', 'd_update', 'fullName', 'hospitalName'], 'safe'],
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
        $query = Person::find()->joinWith(['hospital']);;

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['fullName'] = [
          'asc' => ['name'=>SORT_ASC,'lname'=>SORT_ASC],
          'desc' => ['name'=>SORT_DESC,'lname'=>SORT_DESC]
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }



        $query->andWhere('lib_hospital.name LIKE :hospname',[
          'hospname' => "%$this->hospitalName%"
        ]);

        $query->andWhere('person.name LIKE :fullName OR person.lname LIKE :fullName',[
          'fullName' => '%'.$this->fullName.'%'
        ]);

        // grid filtering conditions
        $query->andFilterWhere([
            'birth' => $this->birth,
            'movein' => $this->movein,
            'ddischarge' => $this->ddischarge,
            'd_update' => $this->d_update,
        ]);

        $query->andFilterWhere(['like', 'hospcode', $this->hospcode])
            ->andFilterWhere(['like', 'cid', $this->cid])
            ->andFilterWhere(['like', 'pid', $this->pid])
            ->andFilterWhere(['like', 'hid', $this->hid])
            ->andFilterWhere(['like', 'prename', $this->prename])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'lname', $this->lname])
            ->andFilterWhere(['like', 'hn', $this->hn])
            ->andFilterWhere(['like', 'sex', $this->sex])
            ->andFilterWhere(['like', 'mstatus', $this->mstatus])
            ->andFilterWhere(['like', 'occupation_old', $this->occupation_old])
            ->andFilterWhere(['like', 'occupation_new', $this->occupation_new])
            ->andFilterWhere(['like', 'race', $this->race])
            ->andFilterWhere(['like', 'nation', $this->nation])
            ->andFilterWhere(['like', 'religion', $this->religion])
            ->andFilterWhere(['like', 'education', $this->education])
            ->andFilterWhere(['like', 'fstatus', $this->fstatus])
            ->andFilterWhere(['like', 'father', $this->father])
            ->andFilterWhere(['like', 'mother', $this->mother])
            ->andFilterWhere(['like', 'couple', $this->couple])
            ->andFilterWhere(['like', 'vstatus', $this->vstatus])
            ->andFilterWhere(['like', 'discharge', $this->discharge])
            ->andFilterWhere(['like', 'abogroup', $this->abogroup])
            ->andFilterWhere(['like', 'rhgroup', $this->rhgroup])
            ->andFilterWhere(['like', 'labor', $this->labor])
            ->andFilterWhere(['like', 'passport', $this->passport])
            ->andFilterWhere(['like', 'typearea', $this->typearea]);

        return $dataProvider;
    }
}
