<?php
use yii\helpers\Url;
?>
<div class="leftpanel" style="position:fixed;z-index:1;top:60px;bottom:0;overflow-y:auto;overflow:hidden;">
                    <div class="media profile-left">
                        <a class="pull-left  profile-thumb" href="<?=   Url::to(['enseigne/index']) ?>">
                            <img class="img-circle" src="<?=   Url::to('@web/images/photos/default_enseigne.jpg') ?>" alt="">
                        </a>
                        <div class="media-body">
                            <h4 ><?= Yii::$app->user->identity->username  ?></h4>
                           
                        </div>
                    </div><!-- media -->
                    
                    <h5 class="leftpanel-title">Navigation</h5>
                    <ul class="nav nav-pills nav-stacked">
                        
                        </li>
                       
                                <li class=<?php if( Yii::$app->controller->id=='enseigne'){echo '"active"';}?>> <a href="<?= Url::to(['enseigne/index'])  ?>"><i class="fa  fa-angle-double-right"> </i><span> Enseignes </span></a></li>
                                <li style="display:none" class=<?php if( Yii::$app->controller->id=='user'){echo '"active"';}?>> <a href="<?= Url::to(['user/index'])  ?>"><i class="fa  fa-angle-double-right"> </i><span>  Comptes</span></a></li>
                                <li class=<?php if( Yii::$app->controller->id=='commerce'){echo '"active"';}?>><a href="<?= Url::to(['commerce/index'])  ?>"><i class="fa  fa-angle-double-right"></i><span>   Types de commerce</span></a></li>
                                <li class=<?php if( Yii::$app->controller->id=='criteres'){echo '"active"';}?>><a href="<?= Url::to(['criteres/index'])  ?>"><i class="fa  fa-angle-double-right"></i><span>   Gestion des Critères </span></a></li>
                                <li class=<?php if( Yii::$app->controller->id=='event'){echo '"active"';}?>><a href="<?= Url::to(['event/index'])  ?>"><i class="fa  fa-angle-double-right"></i><span>  Evenements déclencheurs</span></a></li>
                          
                                <li style="display:none" ><a href="?r=user/index"><i class="fa  fa-users"></i> <span>Gestion des utilisateurs </span></a></li>
                                <li style="display:none" ><a href="?r=enseigne/index"><i class="fa  fa-users"></i> <span>Gestion des Enseignes </span></a></li>
                                
                                <li style="display:none" ><a href="?r=enseigne/index"><i class="fa  fa-users"></i> <span> 
                       </span></a></li>     
                    </ul>
                    
                </div><!-- leftpane
                ageheader -->