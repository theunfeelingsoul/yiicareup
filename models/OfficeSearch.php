<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Office;

/**
 * OfficeSearch represents the model behind the search form about `app\models\Office`.
 */
class OfficeSearch extends Office
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['Onum', 'Oname', 'leader', 'url', 'apeal', 'tel', 'fax', 'email', 'location', 'area', 'service', 'imgname'], 'safe'],
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
        $query = Office::find();

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
            'user_id' => Yii::$app->user->identity->id,
        ]);

        $query->andFilterWhere(['like', 'Oname', $this->Oname])
            ->andFilterWhere(['like', 'leader', $this->leader])
            ->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'apeal', $this->apeal])
            ->andFilterWhere(['like', 'tel', $this->tel])
            ->andFilterWhere(['like', 'fax', $this->fax])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'area', $this->area])
            ->andFilterWhere(['like', 'service', $this->service])
            ->andFilterWhere(['like', 'imgname', $this->imgname]);

        return $dataProvider;
    }
}
