<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Enseigne;

/**
 * Enseignesearch represents the model behind the search form about `app\models\Enseigne`.
 */
class Enseignesearch extends Enseigne
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['enseigne_id','register_required_phone', 'Type_commerce_ID'], 'integer'],
            [['users.last_name','users.first_name','name', 'contact_email', 'average_purchase_value', 'description', 'facebook', 'twitter', 'google_plus', 'trip_advisor', 'instagram', 'youtube', 'website', 'logo', 'register_required_name', 'register_required_email', 'default_optin', 'pts_register', 'passage_or_amount', 'clean_points', 'clean_points_param', 'register_to_use_points', 'delay_before_checkin', 'ipad_pin', 'ipad_pin_reward', ], 'safe'],
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
     *joinwith('user')
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Enseigne::find();
/*$query->joinwith(['Slide']);
$query->joinwith(['Language']);
$query->joinwith(['Typecommerce']);*/
        // add conditions that should always apply here


        $dataProvider = new ActiveDataProvider([
            'query'=>$query,
            'sort' => [
        'defaultOrder' => [
            'enseigne_id' => SORT_DESC,
            
        ]
    ],

        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
      
        $query->orFilterWhere(['like', 'name', $this->name])
            ->orFilterWhere(['like', 'contact_email', $this->name])
                ->orFilterWhere(['like', 'phone_number', $this->name]);
               
  
        return $dataProvider;
    }
}