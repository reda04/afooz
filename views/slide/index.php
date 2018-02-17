<?php

use yii\helpers\Html;

use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
use app\models\slide;
$enseigne_id=\Yii::$app->user->identity->enseigneEnseigne->enseigne_id;
$this->title = 'Slides';
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="slide-index">

   <div class="pageheader">
    <div class="media">
        <div class="pageicon pull-left">
            <i class="fa fa-picture-o"></i>
        </div>
        <div class="media-body">
            <ul class="breadcrumb">
                <li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
              <li>Réglages  </li>
                <li><?= Html::encode($this->title) ?></li>
            </ul>
            <h4><?= Html::encode($this->title) ?></h4>
        </div>
    </div><!-- media -->
</div><!-- pageheader -->
<div class="contentpanel">   
<div class=" col-md-12">
    <p class="lead">   Modifier les slides présentés sur les bornes iPad</p>  
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                       
                                        <h3 style='color:#3A87AD'>A quoi servent les slides ?</h3>
                                    
                                    
  
    <p style='color:black'>Les slides apparaissent sur l'écran de votre iPad et servent de support à vos différentes opérations marketing et commerciales.<br>
    La taille idéal d'un slide est 1080 pixels par 636 pixels. Seules les images fixes (jpg ou png) sont acceptées, les images animées (gif ou flash) ne fonctionneront pas.<br>Les slides ci-dessous sont les slides par défaut d'AFOZ. Pour utiliser vos propres images, cliquez sur "Ajouter un slide"</p>
</div>
</div>
<a href="<?= Url::to(['slide/create'])  ?>" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Ajouter un slide</a>

<div id="sortable">
<?php

$resSliders = slide::find()->where(['enseigne_enseigne_id' => $enseigne_id])->orderBy([
            'order'=>SORT_ASC,
             ])->all();

foreach($resSliders  as $slider)
{
echo'
<div id="slide_'.$slider->slide_id.'"  class="row">
        <div class="col-lg-6 col-lg-offset-3 col-sm-12 ui-state-default">
            <div class="panel panel-default">
                <div class="box-body border-radius-none">
                    <img style="width: 100%;height:250px;" src="' .\Yii::getAlias('@web').'/AFOZ-LOGOS-UPLOADS/Slides/'.$slider['filename']. '" alt="Slide">
                                    </div>
            </div>
        </div>
    </div>'; }
    ?>

</div>

<script type="text/javascript">
  
 $(document).ready(function () {
       
       jQuery("#sortable").sortable({
            placeholder: 'highlight', // classe à ajouter à l'élément fantome
            update: function() {  // callback quand l'ordre de la liste est changé
               
             var order = jQuery('#sortable').sortable('serialize');
              jQuery.post("<?php echo Url::to('setposition'); ?>",order);  
            }
        });
        jQuery( "#sortable" ).disableSelection();
    });
</script>
