<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Therapist;

/**
 * TherapistSearch represents the model behind the search form about `app\models\Therapist`.
 */
class TherapistSearch extends Therapist
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tp_id', 'of_id', 'tp_age', 'tp_exp', 'tp_skills'], 'integer'],
            [['tp_name', 'imgname', 'img'], 'safe'],
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
        $query = Therapist::find();

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
            'tp_id' => $this->tp_id,
            'of_id' => $this->of_id,
            'tp_age' => $this->tp_age,
            'tp_exp' => $this->tp_exp,
            'tp_skills' => $this->tp_skills,
        ]);

        $query->andFilterWhere(['like', 'tp_name', $this->tp_name])
            ->andFilterWhere(['like', 'imgname', $this->imgname])
            ->andFilterWhere(['like', 'img', $this->img]);

        return $dataProvider;
    }
}
