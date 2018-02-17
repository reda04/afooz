<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Criteres;

/**
 * Criteresearch represents the model behind the search form about `app\models\Criteres`.
 */

class Criteresearch extends Criteres
{
    /**
     * @inheritdoc
     */

    // public group_id;
    public $operator;
    public function rules()
    {
        return [
            [['Critere_id'], 'integer'],
            [['Nom', 'Result', 'value', 'type','operator'], 'safe'],
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
        $query=Criteres::find();
        $query2 = Criteres::find()->innerJoinWith('operateurOperateurs', true);
        
        $query->union($query2, false);

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
            'Critere_id' => $this->Critere_id,
        ]);

        $query->andFilterWhere(['like', 'Nom', $this->Nom])
            ->andFilterWhere(['like', 'Result', $this->Result])
            ->andFilterWhere(['like', 'value', $this->value])
            ->andFilterWhere(['like', 'operator', $this->operateurOperateurs])
            ->andFilterWhere(['like', 'type', $this->type]);

        return $dataProvider;
    }
}
