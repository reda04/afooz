<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Filter;
use app\models\PointDeVente;

/**
 * Filtersearch represents the model behind the search form about `app\models\Filter`.
 */
class Filtersearch extends Filter
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['filter_id', 'point_de_vente_id', 'enseigne_id'], 'integer'],
            [['name', 'statut', 'operation', 'requete'], 'safe'],
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
        if(Yii::$app->user->identity->role->role == 'admin' || PointDeVente::find()->where(['enseigne_enseigne_id'=>Yii::$app->user->identity->enseigneEnseigne->enseigne_id])->count() == count(unserialize(Yii::$app->user->identity->userPermissions->pointsdeventes)) )
        {
             $query = Filter::find()->where(['enseigne_id'=>Yii::$app->user->identity->enseigneEnseigne->enseigne_id]);
      
        }
        else
        {
             $query = Filter::find()->where(['point_de_vente_id'=>\yii\helpers\ArrayHelper::getColumn(unserialize(Yii::$app->user->identity->userPermissions->pointsdeventes),'point_de_vente_id')]);
           
        }
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
            'point_de_vente_id' => $this->point_de_vente_id,
            'enseigne_id' => $this->enseigne_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'statut', $this->statut])
            ->andFilterWhere(['like', 'operation', $this->operation])
            ->andFilterWhere(['like', 'requete', $this->requete]);

        return $dataProvider;
    }
}
