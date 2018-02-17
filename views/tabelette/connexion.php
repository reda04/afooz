<?php
use yii\helpers\Url;
use yii\helpers\Html;
use kartik\form\ActiveForm;

$logo=\Yii::$app->user->identity->enseigneEnseigne->logo;
/*$model = enseigne::find()
    ->where('enseigne_id ='.$userid)
    ->one();
*/

?>
  

<div class="locked">
            <div class="lockedpanel">
                <div class="loginuser">
                    <img src=<?= Url::to('@web'.str_replace('/basic/web','',Yii::$app->user->identity->enseigneEnseigne->logo ))?> class="img-circle " alt="" style=" 
    height: auto; 
    width: auto; 
    max-width: 80px; 
    max-height: 80px;

">
                </div>
                <div class="logged">
                  <h4><?= ucfirst(Yii::$app->user->identity->enseigneEnseigne->name).'  '. ucfirst($pointdevente->nom) ?></h4>
                    <h3><?= Yii::$app->user->identity->first_name.' '. Yii::$app->user->identity->last_name ?></h3>
                    <small class="text-muted"><?= Yii::$app->user->identity->email  ?></small>
                </div>
  <?php 
    $form = ActiveForm::begin(
       [ 'action' => Url::to(['tabelette/acceuil','id'=>$pointdevente->point_de_vente_id])
       ,
      'options' => [

                "id"=>"unlock",
             ],
             ]

             
     
    ); 
    ?>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <?php
                        if( $con_type=='ipad')
                        {

                        echo '<input type="password" name="ipad" class="form-control" placeholder="Entrez Vôtre Pin IPAD" required>';
                        }
                        else
                        {
                          echo '<input type="password" name="password" class="form-control" placeholder="Entrez Vôtre Mot de passe" required>';
                        }



                       
                        ?>
                    </div><!-- input-group -->
                    <button class="btn btn-success btn-block">Dévrouillez</button>
                </form>
            </div><!-- lockedpanel -->
        </div>
        <?php 
    $form = ActiveForm::end(
     
    ); 
    ?>