<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Sms;

/**
 * smssearch represents the model behind the search form about `app\models\Sms`.
 */
class smssearch extends Sms
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sms_id', 'point_de_vente_id', 'filtre_id'], 'integer'],
            [['etat', 'sender', 'message', 'send_on'], 'safe'],
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
        $query = Sms::find();

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
            'sms_id' => $this->sms_id,
            'send_on' => $this->send_on,
            'point_de_vente_id' => $this->point_de_vente_id,
            'filtre_id' => $this->filtre_id,
        ]);

        $query->andFilterWhere(['like', 'etat', $this->etat])
            ->andFilterWhere(['like', 'sender', $this->sender])
            ->andFilterWhere(['like', 'message', $this->message]);

        return $dataProvider;
    }
}
