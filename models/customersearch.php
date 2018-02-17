<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Customer;

/**
 * customersearch represents the model behind the search form about `app\models\Customer`.
 */
class customersearch extends Customer
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_id', 'active', 'optin_email', 'optin_sms', 'country_id'], 'integer'],
            [['first_name', 'last_name', 'email', 'create_date', 'last_update', 'gender', 'birthday', 'phone', 'comment', 'city', 'adress'], 'safe'],
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
        $query = Customer::find();
        $query->joinwith(['enseigneHasCustomers'])->where(['enseigne_id' => Yii::$app->user->identity->enseigneEnseigne->enseigne_id]);
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
            'customer_id' => $this->customer_id,
            'active' => $this->active,
            'create_date' => $this->create_date,
            'last_update' => $this->last_update,
            'birthday' => $this->birthday,
            'optin_email' => $this->optin_email,
            'optin_sms' => $this->optin_sms,
            'country_id' => $this->country_id,
        ]);

        $query->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'comment', $this->comment])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'adress', $this->adress]);

        return $dataProvider;
    }
}
