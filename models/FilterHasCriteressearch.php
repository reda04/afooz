<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\FilterhasCriteres;

/**
 * FilterHasCriteressearch represents the model behind the search form about `app\models\FilterhasCriteres`.
 */
class FilterHasCriteressearch extends FilterhasCriteres
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['filter_id', 'operateur_has_criteres_id'], 'integer'],
            [['selected_value'], 'safe'],
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
        $query = FilterhasCriteres::find();

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
            'filter_id' => $this->filter_id,
            'operateur_has_criteres_id' => $this->operateur_has_criteres_id,
        ]);

        $query->andFilterWhere(['like', 'selected_value', $this->selected_value]);

        return $dataProvider;
    }
}
