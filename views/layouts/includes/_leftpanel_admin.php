<?php
use yii\helpers\Url;

$logo=\Yii::$app->user->identity->enseigneEnseigne->logo;
/*$model = enseigne::find()
    ->where('enseigne_id ='.$userid)
    ->one();
*/

?>
<div class="leftpanel" style="position:fixed;z-index:1;top:60px;bottom:0;overflow-y:auto;overflow:hidden;">
                    <div class="media profile-left">
                        <a class="pull-left profile-thumb " href="<?=   Url::to(['enseigne/dashboard']) ?>">
                            <img class="img-circle" src=<?= Url::to('@web'.str_replace('/basic/web','',Yii::$app->user->identity->enseigneEnseigne->logo ))?>  style="border-color:white" alt="">
                        </a>
                        <div class="media-body">
                              <h4 ><?= Yii::$app->user->identity->enseigneEnseigne->name ?></h4>
                              <small class="text-muted" > <?= Yii::$app->user->identity->first_name.' '. Yii::$app->user->identity->last_name ?></small>
                        </div>
                    </div><!-- media -->
                    <h5 class="leftpanel-title">Navigation</h5>
                    <ul class="nav nav-pills nav-stacked">
                        <li class=<?php if( Yii::$app->controller->id=='enseigne' and Yii::$app->controller->action->id=='dashboard'  ){echo '"active"';}?>>  <a href="<?= Url::to(['site/index'])  ?>"><i class="fa fa-home"></i> <span>Tableau de bord</span></a></li>
                        
      <?php

                  if (Yii::$app->user->identity->userPermissions->base_clients || Yii::$app->user->identity->userPermissions->gestion_ciblages)
                    {
                      $clients = '<li class=';
                      if (Yii::$app->controller->id == 'customer')
                        {
                          $clients.= '"parent active"';
                        }
                      elseif (Yii::$app->controller->id == 'filter')
                        {
                          $clients.= '"parent active"';
                        }
                      else
                        {
                          $clients.= '"parent "';
                        }

                      $clients.= '><a href="#"><i class="fa fa-cloud"></i> <span>Clients</span></a> <ul class="children">';
                      if (Yii::$app->user->identity->userPermissions->base_clients)
                        {
                          if (Yii::$app->controller->id == 'customer')
                            {
                              $clients.= '<li class="active"><a href="' . Url::to(['customer/index']) . '" ><i class="fa  fa-angle-double-right"> </i><span>  Base clients</span></a></li>';
                            }
                          else
                            {
                              $clients.= '<li><a href="' . Url::to(['customer/index']) . '" ><i class="fa  fa-angle-double-right"> </i><span>  Base clients</span></a></li>';
                            }
                        }

                      if (Yii::$app->user->identity->userPermissions->gestion_ciblages)
                        {
                          if (Yii::$app->controller->id == 'filter')
                            {
                              $clients.= '<li class="active"><a href="' . Url::to(['filter/index']) . '" ><i class="fa  fa-angle-double-right"> </i><span>  Ciblage</span></a></li>';
                            }
                          else
                            {
                              $clients.= '<li><a href="' . Url::to(['filter/index']) . '" ><i class="fa  fa-angle-double-right"> </i><span>  Ciblage</span></a></li> ';
                            }
                        }

                      $clients.= '</ul></li>';
                      echo $clients;
                    }

                  if (Yii::$app->user->identity->userPermissions->envoi_emails || Yii::$app->user->identity->userPermissions->envoi_sms || Yii::$app->user->identity->userPermissions->envoi_notifications_pushs)
                    {
                      $marketing = '<li class=';
                      if (Yii::$app->controller->id == 'newsletter')
                        {
                          $marketing.= '"parent active"';
                        }
                      elseif (Yii::$app->controller->id == 'sms')
                        {
                          $marketing.= '"parent active"';
                        }
                      else
                        {
                          $marketing.= '"parent "';
                        }

                      $marketing.= '><a href="#"><i class="fa fa-envelope"></i> <span>Campagnes marketing</span></a> <ul class="children">';
                      if (Yii::$app->user->identity->userPermissions->envoi_emails)
                        {
                          if (Yii::$app->controller->id == 'newsletter')
                            {
                              $marketing.= '<li class="active"><a href="' . Url::to(['newsletter/index']) . '" ><i class="fa  fa-angle-double-right"> </i><span>  Emails</span></a></li>';
                            }
                          else
                            {
                              $marketing.= '<li><a href="' . Url::to(['newsletter/index']) . '" ><i class="fa  fa-angle-double-right"> </i><span>  Emails</span></a></li>';
                            }
                        }

                      if (Yii::$app->user->identity->userPermissions->envoi_sms)
                        {
                          if (Yii::$app->controller->id == 'sms')
                            {
                              $marketing.= '<li class="active"><a href="' . Url::to(['sms/index']) . '" ><i class="fa  fa-angle-double-right"> </i><span>  SMS</span></a></li>';
                            }
                          else
                            {
                              $marketing.= '<li><a href="' . Url::to(['sms/index']) . '" ><i class="fa  fa-angle-double-right"> </i><span>  SMS</span></a></li> ';
                            }
                        }

                      if (Yii::$app->user->identity->userPermissions->envoi_notifications_pushs)
                        {
                          $marketing.= '<li><a href="#"><i class="fa  fa-angle-double-right"></i><span>  Notifications Push</span></a></li>';
                        }

                      $marketing.= '</ul></li>';
                      echo $marketing;
                    }

                  if (Yii::$app->user->identity->userPermissions->messages_automatiques)
                    {
                      $message = ' <li ><a href="#"><i class="fa fa-send"></i> <span>Messages Automatiques</span></a></li>';
                      echo $message;
                    }

                  if (Yii::$app->user->identity->userPermissions->statistiques)
                    {
                      if (Yii::$app->controller->id == 'statistiques')
                        {
                          $statistiques = '<li class="active"><a href="' . Url::to(['statistiques/index']) . '" ><i class="glyphicon glyphicon-stats"> </i><span>  Statistiques</span></a></li>';
                        }
                      else
                        {
                          $statistiques = '<li><a href="' . Url::to(['statistiques/index']) . '" ><i class="glyphicon glyphicon-stats"> </i><span>  Statistiques</span></a></li> ';
                        }

                      echo $statistiques;
                    }

                  if (Yii::$app->user->identity->userPermissions->description_enseigne || Yii::$app->user->identity->userPermissions->modification_logo || Yii::$app->user->identity->userPermissions->slides || Yii::$app->user->identity->userPermissions->offres_de_fidelite || Yii::$app->user->identity->userPermissions->parrainage || Yii::$app->user->identity->userPermissions->fidelisation)
                    {
                      if (Yii::$app->controller->id == 'enseigne' and Yii::$app->controller->action->id != 'dashboard')
                        {
                          $reglages = '<li class="parent  active" ><a href="#"><i class="fa  fa-cog"></i> <span>Réglages</span></a>';
                        }
                      elseif (Yii::$app->controller->id == 'slide')
                        {
                          $reglages = '<li class="parent  active" ><a href="#"><i class="fa  fa-cog"></i> <span>Réglages</span></a>';
                        }
                      elseif (Yii::$app->controller->id == 'offer')
                        {
                          $reglages = '<li class="parent active" ><a href="#"><i class="fa  fa-cog"></i> <span>Réglages</span></a>';
                        }
                      elseif (Yii::$app->controller->id == 'sponsorship')
                        {
                          $reglages = '<li class="parent  active" ><a href="#"><i class="fa  fa-cog"></i> <span>Réglages</span></a>';
                        }
                      else
                        {
                          $reglages = '<li class="parent " ><a href="#"><i class="fa  fa-cog"></i> <span>Réglages</span></a>';
                        }

                      $reglages.= ' <ul class="children">';
                      if (Yii::$app->user->identity->userPermissions->description_enseigne)
                        {
                          if (Yii::$app->controller->action->id == 'desc')
                            {
                              $reglages.= '<li class="active"><a href="' . Url::to(['enseigne/desc']) . '" ><i class="fa  fa-angle-double-right"> </i><span> Description</span></a></li>';
                            }
                          else
                            {
                              $reglages.= '<li><a href="' . Url::to(['enseigne/desc']) . '" ><i class="fa  fa-angle-double-right"> </i><span>  Description</span></a></li> ';
                            }
                        }

                      if (Yii::$app->user->identity->userPermissions->modification_logo)
                        {
                          if (Yii::$app->controller->action->id == 'logo')
                            {
                              $reglages.= '<li class="active"><a href="' . Url::to(['enseigne/logo']) . '" ><i class="fa  fa-angle-double-right"> </i><span> Logo</span></a></li>';
                            }
                          else
                            {
                              $reglages.= '<li><a href="' . Url::to(['enseigne/logo']) . '" ><i class="fa  fa-angle-double-right"> </i><span>  Logo</span></a></li> ';
                            }
                        }

                      if (Yii::$app->user->identity->userPermissions->slides)
                        {
                          if (Yii::$app->controller->id == 'slide')
                            {
                              $reglages.= '<li class="active"><a href="' . Url::to(['slide/index']) . '" ><i class="fa  fa-angle-double-right"> </i><span> Slides</span></a></li>';
                            }
                          else
                            {
                              $reglages.= '<li><a href="' . Url::to(['slide/index']) . '" ><i class="fa  fa-angle-double-right"> </i><span>  Slides</span></a></li> ';
                            }
                        }

                      if (Yii::$app->user->identity->userPermissions->offres_de_fidelite)
                        {
                          if (Yii::$app->controller->id == 'offer')
                            {
                              $reglages.= '<li class="active"><a href="' . Url::to(['offer/index']) . '" ><i class="fa  fa-angle-double-right"> </i><span> Offres de fidélité</span></a></li>';
                            }
                          else
                            {
                              $reglages.= '<li><a href="' . Url::to(['offer/index']) . '" ><i class="fa  fa-angle-double-right"> </i><span>  Offres de fidélité</span></a></li> ';
                            }
                        }

                      if (Yii::$app->user->identity->userPermissions->fidelisation)
                        {
                          if (Yii::$app->controller->action->id == 'fidelisation')
                            {
                              $reglages.= '<li class="active"><a href="' . Url::to(['enseigne/fidelisation']) . '" ><i class="fa  fa-angle-double-right"> </i><span> Options de fidélisation</span></a></li>';
                            }
                          else
                            {
                              $reglages.= '<li><a href="' . Url::to(['enseigne/fidelisation']) . '" ><i class="fa  fa-angle-double-right"> </i><span>  Options de fidélisation</span></a></li> ';
                            }
                        }

                      if (Yii::$app->user->identity->userPermissions->parrainage)
                        {
                          if (Yii::$app->controller->id == 'sponsorship')
                            {
                              $reglages.= '<li class="active"><a href="' . Url::to(['sponsorship/create']) . '" ><i class="fa  fa-angle-double-right"> </i><span> Parrainage</span></a></li>';
                            }
                          else
                            {
                              $reglages.= '<li><a href="' . Url::to(['sponsorship/create']) . '" ><i class="fa  fa-angle-double-right"> </i><span>  Parrainage</span></a></li> ';
                            }
                        }

                      $reglages.= '   </ul>';
                      echo $reglages;
                    }

                  
                      if (Yii::$app->controller->id == 'pointdevente')
                        {
                          echo ' <li class="active" > <a href="' . Url::to(['pointdevente/index']) . '" ><i class="fa   fa-bank"></i> <span>Points de ventes</span></a></li>';
                        }
                      else
                        {
                          echo ' <li > <a href="' . Url::to(['pointdevente/index']) . '" ><i class="fa   fa-bank"></i> <span>Points de ventes</span></a></li>';
                        }
                  

                  if (Yii::$app->user->identity->userPermissions->gestion_des_droits)
                    {
                      echo ' <li  > <a href="' . Url::to(['userpermissions/index']) . '" ><i class="fa   fa-lock"></i> <span>Gestion des droits</span></a></li>';
                    } 

        ?>

                               
                               
                                <li ><a href="#"><i class="fa  fa-question"></i> <span>Aide et tutoriaux</span></a></li>
                                    
                       
                    </ul>
                    
                </div>
              