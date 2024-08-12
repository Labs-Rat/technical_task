<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * ParametersImagesSearch represents the model behind the search form of `app\models\ParametersImages`.
 */
class ParametersImagesSearch extends ParametersImages
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'icon_type', 'parameter_id'], 'integer'],
            [['path', 'primary_name'], 'safe'],
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
        $query = ParametersImages::find();

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
            'id'           => $this->id,
            'icon_type'    => $this->icon_type,
            'parameter_id' => $this->parameter_id,
        ]);

        $query->andFilterWhere(['like', 'path', $this->path])
            ->andFilterWhere(['like', 'primary_name', $this->primary_name]);

        return $dataProvider;
    }
}
