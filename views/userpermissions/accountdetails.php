<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii \helpers\Url;
use app\models\Pointdevente;
/* @var $this yii\web\View */
/* @var $model app\models\Enseigne */

$this->title = 'Information sur l\'utilisateur : ';
?>

    
 <?= DetailView::widget([
        'model' => $model,
        'class'=> '.table-striped',
        'attributes' => [
        ['attribute' => 'created_at',
            'label' => 'Date de création',
            'value' => function($model)
                {
                    return gmdate("d-m-y\tH:i:s", $model->created_at);
                },
        ],
            'role.name',
            'last_name',
            'first_name',
            'email',
            [
                    'attribute' => 'status',
                    'label' => 'Statut',
                     'format' => 'html',
                    'value' => function($model)
                {
                    if($model->status)
                    {
                        return '<span class="fa fa-check" style="color: #4C9900;padding-right: 5px;font-size: 15px;"></span>activé';

                    }
                    else
                    {

                        return  '<span class="fa fa-times" style="color: #CD0000;padding-right: 5px;font-size: 15px;"></span>désactivé ';
                    }
                },

            ]
            ,
             
            [
                    'attribute' => 'acl',
                    'label' => 'List de permissions : ',
                     'format' => 'html',
                    'value' => function($model)
                {
                   $s= '<table class="table table-bordered table-dark">
    <thead>
      <tr>
        <th>Partie</th>
        <th>Sous-Partie</th>
        <th>Etat de la permission</th>
        
      </tr>
    </thead>
    <tbody>
 <tr>

        <td >Ipad</td>
          <td>Accès aux informations de l\'ipad</td>
          <td>';

          if($model->userPermissions->ipad)
          {
            $s.='<span class="fa fa-check" style="color: #4C9900;padding-right: 5px;font-size: 15px;"> </span>';
          }
          else
          {
            $s.='<span class="fa fa-times" style="color: #CD0000;padding-right: 5px;font-size: 15px;"> </span>';
          }

          $s.='</td>
       
      </tr>
      <tr>

        <td rowspan=2>Bases Clients</td>
          <td>Accès à la base Clients</td>
          <td>';
          if($model->userPermissions->base_clients)
          {
            $s.='<span class="fa fa-check" style="color: #4C9900;padding-right: 5px;font-size: 15px;"> </span>';
          }
          else
          {
            $s.='<span class="fa fa-times" style="color: #CD0000;padding-right: 5px;font-size: 15px;"> </span>';
          }

          $s.='</td>
       
      </tr>
       <tr>

        
          <td>Gestion des ciblages</td>
          <td>';
          if($model->userPermissions->gestion_ciblages)
          {
            $s.='<span class="fa fa-check" style="color: #4C9900;padding-right: 5px;font-size: 15px;"></span>';
          }
          else
          {
            $s.='<span class="fa fa-times" style="color: #CD0000;padding-right: 5px;font-size: 15px;"></span>';
          }
          $s.='</td>
       
      </tr>
       <tr>
 <td rowspan=3>Campagnes Marketing</td>
          <td>Envoi d\'e-mails</td>
          <td>';
           if($model->userPermissions->envoi_emails)
          {
            $s.='<span class="fa fa-check" style="color: #4C9900;padding-right: 5px;font-size: 15px;"></span>';
          }
          else
          {
            $s.='<span class="fa fa-times" style="color: #CD0000;padding-right: 5px;font-size: 15px;"></span>';
          }
          $s.='</td>
       
      </tr>
       <tr>

          <td>Envoi de SMS</td>
          <td>';
           if($model->userPermissions->envoi_sms)
          {
            $s.='<span class="fa fa-check" style="color: #4C9900;padding-right: 5px;font-size: 15px;"></span>';
          }
          else
          {
            $s.='<span class="fa fa-times" style="color: #CD0000;padding-right: 5px;font-size: 15px;"></span>';
          }
          $s.='</td>
       
      </tr>
       <tr>

          <td>Envoi de notifications pushs</td>
          <td>';


 if($model->userPermissions->envoi_notifications_pushs)
          {
            $s.='<span class="fa fa-check" style="color: #4C9900;padding-right: 5px;font-size: 15px;"></span>';
          }
          else
          {
            $s.='<span class="fa fa-times" style="color: #CD0000;padding-right: 5px;font-size: 15px;"></span>';
          }
          $s.='</td>
      </tr>
      <tr>
 <td >Messages automatiques</td>
          <td>Réglage des messages automatiques</td>
          <td>';
           if($model->userPermissions->messages_automatiques)
          {
            $s.='<span class="fa fa-check" style="color: #4C9900;padding-right: 5px;font-size: 15px;"></span>';
          }
          else
          {
            $s.='<span class="fa fa-times" style="color: #CD0000;padding-right: 5px;font-size: 15px;"></span>';
          }
          $s.='</td>
       
      </tr>
       <tr>
 <td >Statistiques</td>
          <td>Accès aux statistiques</td>
          <td>';
           if($model->userPermissions->statistiques)
          {
            $s.='<span class="fa fa-check" style="color: #4C9900;padding-right: 5px;font-size: 15px;"></span>';
          }
          else
          {
            $s.='<span class="fa fa-times" style="color: #CD0000;padding-right: 5px;font-size: 15px;"></span>';
          }
          $s.='</td>
       
      </tr>
        <tr>
        <td rowspan=6>Réglages</td>
          <td>Description de l\'enseigne</td>
          <td>';
          if($model->userPermissions->description_enseigne)
          {
            $s.='<span class="fa fa-check" style="color: #4C9900;padding-right: 5px;font-size: 15px;"></span>';
          }
          else
          {
            $s.='<span class="fa fa-times" style="color: #CD0000;padding-right: 5px;font-size: 15px;"></span>';
          }
          $s.='</td>
       
      </tr>
      <tr>
     
        <td>Modification du logo</td>
     <td>';
     if($model->userPermissions->modification_logo)
          {
            $s.='<span class="fa fa-check" style="color: #4C9900;padding-right: 5px;font-size: 15px;"></span>';
          }
          else
          {
            $s.='<span class="fa fa-times" style="color: #CD0000;padding-right: 5px;font-size: 15px;"></span>';
          }
     $s.='</td>
      </tr>
      
        <tr>
   <td>Gestion des slides</td>
   <td>';
  if($model->userPermissions->slides)
          {
            $s.='<span class="fa fa-check" style="color: #4C9900;padding-right: 5px;font-size: 15px;"></span>';
          }
          else
          {
            $s.='<span class="fa fa-times" style="color: #CD0000;padding-right: 5px;font-size: 15px;"></span>';
          }
   $s.='</td>
     
      </tr>
         <tr>
   <td>Gestion des offres de fidélité</td>
   <td>';
  if($model->userPermissions->offres_de_fidelite)
          {
            $s.='<span class="fa fa-check" style="color: #4C9900;padding-right: 5px;font-size: 15px;"></span>';
          }
          else
          {
            $s.='<span class="fa fa-times" style="color: #CD0000;padding-right: 5px;font-size: 15px;"></span>';
          }
   $s.='</td>
     
      </tr>
         <tr>
   <td>Options de l\'enseigne</td>
   <td>';
  if($model->userPermissions->fidelisation)
          {
            $s.='<span class="fa fa-check" style="color: #4C9900;padding-right: 5px;font-size: 15px;"></span>';
          }
          else
          {
            $s.='<span class="fa fa-times" style="color: #CD0000;padding-right: 5px;font-size: 15px;"></span>';
          }
   $s.='</td>
     
      </tr>
       <tr>
   <td>Configuration du parrainage</td>
   <td>';
  if($model->userPermissions->parrainage)
          {
            $s.='<span class="fa fa-check" style="color: #4C9900;padding-right: 5px;font-size: 15px;"></span>';
          }
          else
          {
            $s.='<span class="fa fa-times" style="color: #CD0000;padding-right: 5px;font-size: 15px;"></span>';
          }
   $s.='</td>
     
      </tr>
      
      <tr>
 <td >Droits d\'accès</td>
          <td>Création d\'utilisateurs et affectation de droits</td>
          <td>';
  if($model->userPermissions->gestion_des_droits)
          {
            $s.='<span class="fa fa-check" style="color: #4C9900;padding-right: 5px;font-size: 15px;"></span>';
          }
          else
          {
            $s.='<span class="fa fa-times" style="color: #CD0000;padding-right: 5px;font-size: 15px;"></span>';
          }
          $s.='</td>
       
      </tr>

     
     
    </tbody>
  </table>
</div>';
return $s;
                },

            ]
            ,
            [
                    'attribute' => 'Point de vente : ',
                    'label' => 'Point de ventes affectés',
                     'format' => 'html',
                    'value' => function($model)
                {
                   /* $p ='<table class="table table-striped table-dark">
    <thead>
      <tr>
        <th>Point de vente </th>
        <th>Permissions</th>
        
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Ziraoui</td>
        <td><span class="fa fa-check" style="color: #4C9900;padding-right: 5px;font-size: 15px;"></span></td>
   
      </tr>
      <tr>
        <td>Ain Sebaa</td>
        <td><span class="fa fa-times" style="color: #CD0000;padding-right: 5px;font-size: 15px;"></span></td>
   
      </tr>
      ';*/
      $p='<table class="table table-bordered table-dark">
      <thead>
      <tr>
        <th>Point de vente </th>
        <th>Permissions</th>
        
      </tr>
    </thead>
    <tbody>
      ';
      $ens=Pointdevente::find()->where(['enseigne_enseigne_id'=>yii::$app->user->identity->enseigneEnseigne->enseigne_id])->all();
      for($i=0;$i<count($ens);$i++)
      {
        $p.='<tr>';
        $p.='<td>'.$ens[$i]['nom'].'</td>';
        $user_points = unserialize($model->userPermissions->pointsdeventes);
        for($z=0;$z<count($user_points);$z++)
        {
            if($ens[$i]['point_de_vente_id']==$user_points[$z]['point_de_vente_id'])
            {
              $p.='<td><span class="fa fa-check" style="color: #4C9900;padding-right: 5px;font-size: 15px;"></span></td>';
              break;
            }
            else
            {
               $p.='<td><span class="fa fa-times" style="color: #CD0000;padding-right: 5px;font-size: 15px;"></span></td>';
              break;
            }
           
        }
$p.='</tr>';
      }

      $p.='</table>';
      return $p;


      

                },

            ]

          
         
            
        
        ],
    ]) ?>
   
