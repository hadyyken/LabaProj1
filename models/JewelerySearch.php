<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Jewelery;

/**
 * JewelerySearch represents the model behind the search form of `app\models\Jewelery`.
 */
class JewelerySearch extends Jewelery
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'edibility'], 'integer'],
            [['type', 'material'], 'safe'],
            [['price', 'size'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Jewelery::find();

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
            'edibility' => $this->edibility,
            'price' => $this->price,
            'size' => $this->size,
        ]);

        $query->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'material', $this->material]);

        return $dataProvider;
    }
}
