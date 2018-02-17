<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Consomation;

/**
 * Consomationsearch represents the model behind the search form about `app\models\Consomation`.
 */
class Consomationsearch extends Consomation
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['enseigne_has_customer_id', 'enseigne_id', 'point_de_vente_id', 'points', 'offer_id'], 'integer'],
            [['date_conso', 'type_operation', 'description'], 'safe'],
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
        $query = Consomation::find();

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
            'enseigne_has_customer_id' => $this->enseigne_has_customer_id,
            'enseigne_id' => $this->enseigne_id,
            'point_de_vente_id' => $this->point_de_vente_id,
            'date_conso' => $this->date_conso,
            'points' => $this->points,
            'offer_id' => $this->offer_id,
        ]);

        $query->andFilterWhere(['like', 'type_operation', $this->type_operation])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
