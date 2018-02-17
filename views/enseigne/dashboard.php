<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use qrcode\qrlib;

$this->title = 'Tableau de bord';
//return Yii::$app->response->redirect(Url::to(['user/index']));
  

?>


 <div class="pageheader">
                        <div class="media">
                            <div class="pageicon pull-left">
                                <i class="fa fa-home"></i>
                            </div>
                            <div class="media-body">
                                <ul class="breadcrumb">
                                    <li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
                                    <li>Tableau de bord
                                     </li>

                                </ul>
                                <h4>Tableau de bord </h4>
                            </div>
                        </div><!-- media -->
                    </div>
                    <div class="contentpanel">

<div class="criteres-form">
    <div class="contentpanel">  
                    <div class="row">
                   <!-- panel -->
                            
                             <div class="col-md-3">
                                <div class="panel panel-primary noborder">
                                    <div class="panel-heading noborder">
                                        <div class="panel-btns" style="display: none;">
                                            
                                        </div><!-- panel-btns -->
                                        <div class="panel-icon"><i class="fa fa-users"></i></div>
                                        <div class="media-body">
                                            <h5 class="md-title nomargin"> Passages Totaux </h5>
                                            <h1 class="mt5"> <?= $passage->Count() ?> </h1>
                                        </div><!-- media-body -->
                                        <hr>
                                        <div class="clearfix mt20">
                                <a href="<?=   Url::to(['statistiques/index']) ?>" style='color:white;'>
                    Plus d'informations <i class="fa fa-arrow-circle-right"></i>
                </a>

                                            </div>
                                        </div>

                                        
                                    </div><!-- panel-body -->
                                </div><!-- panel -->
                                <div class="col-md-3">
                                <div class="panel panel-success-alt noborder">
                                    <div class="panel-heading noborder">
                                        <div class="panel-btns" style="display: none;">
                                            
                                        </div><!-- panel-btns -->
                                        <div class="panel-icon"><span class="fa fa-plus  "></div>
                                        <div class="media-body">
                                            <h5 class="md-title nomargin">Nouveaux inscrits </h5>
                                            <h1 class="mt5"> <?= $nouveaux->Count() ?> </h1>
                                        </div><!-- media-body -->
                                        <hr>
                                        <div class="clearfix mt20">
                                <a href="<?=   Url::to(['statistiques/index']) ?>" style='color:white;'>
                    Plus d'informations <i class="fa fa-arrow-circle-right"></i>
                </a>

                                            </div>
                                        </div>

                                        
                                    </div><!-- panel-body -->
                                </div><!-- panel -->
                                <div class="col-md-3">
                                <div class="panel panel-warning-alt noborder">
                                    <div class="panel-heading noborder">
                                        <div class="panel-btns" style="display: none;">
                                            
                                        </div><!-- panel-btns -->
                                        <div class="panel-icon"><i class="fa fa-rotate-left"></i></div>
                                        <div class="media-body">
                                            <h5 class="md-title nomargin"> Clients connus </h5>
                                            <h1 class="mt5"> <?php 
if($connus)
{
                                            echo $connus;
                                            }
                                            else
                                            {
                                                echo '0';
                                            } ?> </h1>
                                        </div><!-- media-body -->
                                        <hr>
                                        <div class="clearfix mt20">
                                <a href="<?=   Url::to(['statistiques/index']) ?>" style='color:white;'>
                    Plus d'informations <i class="fa fa-arrow-circle-right"></i>
                </a>

                                            </div>
                                        </div>

                                        
                                    </div><!-- panel-body -->
                                </div><!-- panel -->
                                <div class="col-md-3">
                                <div class="panel panel-danger-alt noborder">
                                    <div class="panel-heading noborder">
                                        <div class="panel-btns" style="display: none;">
                                            
                                        </div><!-- panel-btns -->
                                        <div class="panel-icon"><i class="fa fa-dollar"></i></div>
                                        <div class="media-body">
                                            <h5 class="md-title nomargin">Coût de la fidelité ( % du CA) </h5>
                                            <h1 class="mt5">0 </h1>
                                        </div><!-- media-body -->
                                        <hr>
                                        <div class="clearfix mt20">
                                <a href="<?=   Url::to(['statistiques/index']) ?>" style='color:white;'>
                    Plus d'informations <i class="fa fa-arrow-circle-right"></i>
                </a>

                                            </div>
                                        </div>

                                        
                                    </div><!-- panel-body -->
                                </div><!-- panel -->
                            </div>
                               </div>   </div>   
                              </p>
                              <div class="col-md-12">
                 <div class="panel panel-primary">
                     <div class="panel-heading">
                          <div class="panel-btns" style="display: none;">
                              <a href="#" class="panel-minimize tooltips" data-toggle="tooltip" title="" data-original-title="Minimize Panel"><i class="fa fa-minus"></i></a>
                              <a href="#" class="panel-close tooltips" data-toggle="tooltip" title="" data-original-title="Close Panel"><i class="fa fa-times"></i></a>
                          </div><!-- panel-btns -->
                           <h4 class="panel-title">Les 20 derniers passages</h4>
                          
                      </div>
                      <div class="panel-body">
<?php Pjax::begin();$totaux->setPagination(['pageSize' => 5]); ?>    <?= GridView::widget([
        'dataProvider' => $totaux,
        'columns' => [
           
        'date_conso'
           ,

            [
                'attribute' =>'enseigne_has_customer_id',
                'label' => ' Prénom',
                'value' =>'enseigneHasCustomer.customer.first_name',
               
             ],
              [
                'attribute' =>'enseigne_has_customer_id',
                'label' => ' Nom',
                'value' =>'enseigneHasCustomer.customer.last_name',
               
             ],
              [
                'attribute' =>'enseigne_has_customer_id',
                'label' => ' Email',
                'value' =>'enseigneHasCustomer.customer.email',
               
             ],
              [
                'attribute' =>'enseigne_has_customer_id',
                'label' => ' Portable',
                'value' =>'enseigneHasCustomer.customer.phone',
               
             ],
             
              [
                'attribute' =>'point_de_vente_id',
                'label' => ' Point de Vente',
                'value' =>'pointdevente.nom',
               
             ],
              [
                'attribute' =>'type_operation',
                'label' => 'Operation',
                'value' =>'type_operation',
               
             ],
              [ 'label' => ' Total Points à la fin du passage',
                'attribute' => 'Total',
                'enableSorting' => true,
                'contentOptions' => ['style' => 'width: 15%;'],
                'headerOptions' => ['style' => 'color:#337ab7'],
                'format' => 'raw',
                'vAlign'=>'middle',
                'value' => function($model) {

              
                $somme = $model->points_avant+$model->points;
                return $somme; 
        }
        ]
         
         
   

        ]
    ]); ?>

<?php Pjax::end(); ?></div></div></div>
        <div class="col-md-12">
                 <div class="panel panel-primary">
                     <div class="panel-heading">
                          <div class="panel-btns" style="display: none;">
                              <a href="#" class="panel-minimize tooltips" data-toggle="tooltip" title="" data-original-title="Minimize Panel"><i class="fa fa-minus"></i></a>
                              <a href="#" class="panel-close tooltips" data-toggle="tooltip" title="" data-original-title="Close Panel"><i class="fa fa-times"></i></a>
                          </div><!-- panel-btns -->
                           <h4 class="panel-title">Les 10 dernières récompenses</h4>
                          
                      </div>
                      <div class="panel-body">
<?php Pjax::begin();$recompenses->setPagination(['pageSize' => 5]); ?>    <?= GridView::widget([
        'dataProvider' => $recompenses,
        'columns' => [
           
        'date_conso'
           ,

            [
                'attribute' =>'enseigne_has_customer_id',
                'label' => ' Prénom',
                'value' =>'enseigneHasCustomer.customer.first_name',
               
             ],
              [
                'attribute' =>'enseigne_has_customer_id',
                'label' => ' Nom',
                'value' =>'enseigneHasCustomer.customer.last_name',
               
             ],
              [
                'attribute' =>'offer_id',
                'label' => ' Récompense',
                'value' =>'offer.title',
               
             ],
              [
                'attribute' =>'points',
                'label' => ' Points',
               
               
             ],
             
            
               [
                'attribute' => 'Points ',
                'label' => ' Points restants après la récompense',
                'enableSorting' => false,
                'contentOptions' => ['style' => 'width: 15%;'],
                'headerOptions' => ['style' => 'color:#337ab7'],
                'format' => 'raw',
                'vAlign'=>'middle',
                'value' => function($model) {

              
                $sous = $model->points_avant-$model->points;
                return $sous; 
        }
        ],
              [
                'attribute' =>'point_de_vente_id',
                'label' => ' Point de Vente',
                'value' =>'pointdevente.nom',
               
             ],
         
         
   

        ],
    ]); ?>

<?php Pjax::end(); ?></div></div>
 </div>
  </div>
                    
    </div>