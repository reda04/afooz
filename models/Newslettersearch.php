<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Newsletter;
use app\models\Pointdevente;

/**
 * Newslettersearch represents the model behind the search form about `app\models\Newsletter`.
 */
class Newslettersearch extends Newsletter
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['newsletter_id', 'point_de_vente_id'], 'integer'],
            [['send_on', 'title'], 'safe'],
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
      

        // add conditions that should always apply here
        $point = Pointdevente::find()->where(['enseigne_enseigne_id'=> Yii::$app->user->identity->enseigneEnseigne->enseigne_id])->one();
        $query = Newsletter::find()->where(['point_de_vente_id'=> $point]);

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
            'newsletter_id' => $this->newsletter_id,
            'send_on' => $this->send_on,
            'point_de_vente_id' => $this->point_de_vente_id,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title]);

        return $dataProvider;
    }
}
