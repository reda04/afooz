<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Filtrerhascriteres';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="filtrerhascriteres-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Filtrerhascriteres', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'filter_id',
            'operateur_has_criteres_id',
            'selected_value',
   [
                'label' => 'Nom critère',
                'format' => 'text',
                'attribute'=>'Nom',
                'value' => function($model) {
                    if($model->operateurHasCriteres->critere->Nom!=NULL)
                    {
                   
                       return $model->operateurHasCriteres->critere->Nom;
                    }
                    else
                    {
                        return 'null';
                    }
                    
                },
            ],
               'selected_value',
   [
                'label' => 'opérateur',
                'format' => 'text',
                'attribute'=>'',
                'value' => function($model) {
                    if($model->operateurHasCriteres->operateur->operator!=NULL)
                    {
                   
                       return $model->operateurHasCriteres->operateur->operator;
                    }
                    else
                    {
                        return 'null';
                    }
                    
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

<?php Pjax::end(); ?></div>
