<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Skillstimetable;

/**
 * SkillstimetableSearch represents the model behind the search form about `app\models\Skillstimetable`.
 */
class SkillstimetableSearch extends Skillstimetable
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'skid'], 'integer'],
            [['day_and_time', 'user_id', 'status'], 'safe'],
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
        $query = Skillstimetable::find();

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
            'skid' => $this->skid,
        ]);

        $query->andFilterWhere(['like', 'day_and_time', $this->day_and_time])
            ->andFilterWhere(['like', 'user_id', $this->user_id])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
