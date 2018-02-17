 <?php
 use yii\helpers\Html;
  use yii\helpers\Url;?>
 <header>
            <div class="headerwrapper">
                <div class="header-left">
                    <a href="#" class="logo">
                        <img src= "<?=   Url::to('@web/images/twc.png') ?>" alt="" /> 
                    </a>
                    <div class="pull-right">
                        <a href="#" class="menu-collapse">
                            <i class="fa fa-bars"></i>
                        </a>
                    </div>
                </div><!-- header-left -->
                
                <div class="header-right">
                    
                    <div class="pull-right">
                        
            
                        
                        
                        <div class="btn-group btn-group-option">
                            <button type="button" class="btn btn-default dropdown-toggle !imprtant" data-toggle="dropdown">
                              <i class="fa fa-caret-down"></i>
                            </button>
                            <ul class="dropdown-menu pull-right" role="menu">
                             <li> 
<?php 


$originalId = Yii::$app->session->get('user.idbeforeswitch');
            if ($originalId) {
                echo  Html::beginForm(['/enseigne/return'], 'post').
                              '<i class="glyphicon glyphicon-user"> </i>'.Html::submitButton('Root',['class' => 'btn btn-link logout']). Html::endForm();
                              echo Html::beginForm(['/site/logout'], 'post').
                              '<i class="glyphicon glyphicon-log-out"> </i>'.Html::submitButton('Se déconnecter',['class' => 'btn btn-link logout']). Html::endForm();
                          }
                          else
                          {
                              echo   Html::beginForm(['/site/logout'], 'post').
                              '<i class="glyphicon glyphicon-log-out"> </i>'.Html::submitButton('Se déconnecter',['class' => 'btn btn-link logout']). Html::endForm();
                          }




                              ?></li>
                            </ul>
                        </div><!-- btn-group -->

                    </div><!-- pull-right -->
                    
                </div><!-- header-right -->
                
            </div><!-- headerwrapper -->
        </header>