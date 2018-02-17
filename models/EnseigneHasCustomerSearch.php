<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EnseigneHasCustomer;

/**
 * EnseigneHasCustomerSearch represents the model behind the search form about `app\models\EnseigneHasCustomer`.
 */
class EnseigneHasCustomerSearch extends EnseigneHasCustomer
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['enseigne_id', 'enseigne_has_customer_id', 'customer_id'], 'integer'],
            [['created_at', 'number_points_sum'], 'safe'],
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
        $query = EnseigneHasCustomer::find();

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
            'enseigne_id' => $this->enseigne_id,
            'enseigne_has_customer_id' => $this->enseigne_has_customer_id,
            'customer_id' => $this->customer_id,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'number_points_sum', $this->number_points_sum]);

        return $dataProvider;
    }
}
