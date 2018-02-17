<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use kartik\grid\DataColumn;
/* @var $this yii\web\View */
/* @var $searchModel app\models\Newslettersearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'SMS';

?>

<div class="pageheader">
    <div class="media">
        <div class="pageicon pull-left">
            <i class="glyphicon glyphicon-stats"></i>
        </div>
        <div class="media-body">
            <ul class="breadcrumb">
                <li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
                <li>Campagnes marketing </li>
                <li>SMS</li>
                <li><?= Html::encode($this->title) ?></li>
            </ul>
            <h4>Toutes les <?= Html::encode($this->title) ?></h4>
        </div>
    </div><!-- media -->
</div>


<?php // echo $this->render('_search', ['model' => $searchModel]); ?>




<div class="contentpanel">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-7">
                    <h5 class="lg-title">Network Performance</h5>
                    <p class="mb15">Duis autem vel eum iriure dolor in vulputate...</p>
                    <div id="bar-chart" style="position: relative;">
                        <svg height="250" version="1.1" width="383" xmlns="http://www.w3.org/2000/svg" style="overflow: hidden; position: relative; top: -0.68335px;">
                            <desc>Created with Raphaël 2.1.0</desc>
                            <defs></defs>

                                <text style="text-anchor: end; font: normal normal normal normal 12px sans-serif;" x="36.5" y="211" text-anchor="end" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" font-size="12px" font-family="sans-serif" font-weight="normal">
                                    <tspan dy="4">0</tspan>
                                </text>
                                <path style="" fill="none" stroke="#aaaaaa" d="M49,211H358" stroke-width="0.5"></path>

                                <text style="text-anchor: end; font: normal normal normal normal 12px sans-serif;" x="36.5" y="164.5" text-anchor="end" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" font-size="12px" font-family="sans-serif" font-weight="normal">
                                    <tspan dy="4">25</tspan>
                                </text>
                                <path style="" fill="none" stroke="#aaaaaa" d="M49,164.5H358" stroke-width="0.5"></path>

                                <text style="text-anchor: end; font: normal normal normal normal 12px sans-serif;" x="36.5" y="118" text-anchor="end" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" font-size="12px" font-family="sans-serif" font-weight="normal">
                                    <tspan dy="4">50</tspan>
                                </text>
                                <path style="" fill="none" stroke="#aaaaaa" d="M49,118H358" stroke-width="0.5"></path>

                                <text style="text-anchor: end; font: normal normal normal normal 12px sans-serif;" x="36.5" y="71.5" text-anchor="end" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" font-size="12px" font-family="sans-serif" font-weight="normal">
                                    <tspan dy="4">75</tspan>
                                </text>
                                <path style="" fill="none" stroke="#aaaaaa" d="M49,71.5H358" stroke-width="0.5"></path>

                                <text style="text-anchor: end; font: normal normal normal normal 12px sans-serif;" x="36.5" y="25" text-anchor="end" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" font-size="12px" font-family="sans-serif" font-weight="normal">
                                    <tspan dy="4">100</tspan>
                                </text>
                                <path style="" fill="none" stroke="#aaaaaa" d="M49,25H358" stroke-width="0.5"></path>



                                <text style="text-anchor: middle; font: normal normal normal normal 12px sans-serif;" x="335.92857142857144" y="223.5" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" font-size="12px" font-family="sans-serif" font-weight="normal" transform="matrix(1,0,0,1,0,7)">
                                    <tspan dy="4">2012</tspan>
                                </text>

                                <text style="text-anchor: middle; font: normal normal normal normal 12px sans-serif;" x="247.64285714285714" y="223.5" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" font-size="12px" font-family="sans-serif" font-weight="normal" transform="matrix(1,0,0,1,0,7)">
                                    <tspan dy="4">2010</tspan>
                                </text>

                                <text style="text-anchor: middle; font: normal normal normal normal 12px sans-serif;" x="159.35714285714286" y="223.5" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" font-size="12px" font-family="sans-serif" font-weight="normal" transform="matrix(1,0,0,1,0,7)">
                                    <tspan dy="4">2008</tspan>
                                </text>

                                <text style="text-anchor: middle; font: normal normal normal normal 12px sans-serif;" x="71.07142857142857" y="223.5" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" font-size="12px" font-family="sans-serif" font-weight="normal" transform="matrix(1,0,0,1,0,7)">
                                    <tspan dy="4">2006</tspan>
                                </text>

                                <rect x="54.517857142857146" y="155.2" width="15.05357142857143" height="55.80000000000001" r="0" rx="0" ry="0" fill="#0b62a4" stroke="#000" style="" stroke-width="0"></rect>
                                
                                <rect x="72.57142857142858" y="173.8" width="15.05357142857143" height="37.19999999999999" r="0" rx="0" ry="0" fill="#7a92a3" stroke="#000" style="" stroke-width="0"></rect>
                                
                                <rect x="98.66071428571428" y="71.5" width="15.05357142857143" height="139.5" r="0" rx="0" ry="0" fill="#0b62a4" stroke="#000" style="" stroke-width="0"></rect>
                               
                                <rect x="116.71428571428571" y="90.1" width="15.05357142857143" height="120.9" r="0" rx="0" ry="0" fill="#7a92a3" stroke="#000" style="" stroke-width="0"></rect>
                               
                                <rect x="142.80357142857142" y="118" width="15.05357142857143" height="93" r="0" rx="0" ry="0" fill="#0b62a4" stroke="#000" style="" stroke-width="0"></rect>
                               
                                <rect x="160.85714285714283" y="136.6" width="15.05357142857143" height="74.4" r="0" rx="0" ry="0" fill="#7a92a3" stroke="#000" style="" stroke-width="0"></rect>
                               
                                <rect x="186.94642857142858" y="71.5" width="15.05357142857143" height="139.5" r="0" rx="0" ry="0" fill="#0b62a4" stroke="#000" style="" stroke-width="0"></rect>
                                
                                <rect x="205" y="90.1" width="15.05357142857143" height="120.9" r="0" rx="0" ry="0" fill="#7a92a3" stroke="#000" style="" stroke-width="0"></rect>
                               
                                <rect x="231.08928571428572" y="118" width="15.05357142857143" height="93" r="0" rx="0" ry="0" fill="#0b62a4" stroke="#000" style="" stroke-width="0"></rect>
                               
                                <rect x="249.14285714285717" y="136.6" width="15.05357142857143" height="74.4" r="0" rx="0" ry="0" fill="#7a92a3" stroke="#000" style="" stroke-width="0"></rect>
                               
                                <rect x="275.2321428571429" y="71.5" width="15.05357142857143" height="139.5" r="0" rx="0" ry="0" fill="#0b62a4" stroke="#000" style="" stroke-width="0"></rect>
                               
                                <rect x="293.28571428571433" y="90.1" width="15.05357142857143" height="120.9" r="0" rx="0" ry="0" fill="#7a92a3" stroke="#000" style="" stroke-width="0"></rect>

                                <rect x="319.37500000000006" y="25" width="15.05357142857143" height="186" r="0" rx="0" ry="0" fill="#0b62a4" stroke="#000" style="" stroke-width="0"></rect>
                                
                                <rect x="337.4285714285715" y="43.599999999999994" width="15.05357142857143" height="167.4" r="0" rx="0" ry="0" fill="#7a92a3" stroke="#000" style="" stroke-width="0"></rect>
                            </svg>

                            
                        </div>
                  </div><!-- col-md-7 -->


                  <div class="col-md-5">
                    <h5 class="lg-title">Server Status</h5>
                    <p class="mb15">Summary of the status of your server.</p>

                  <?php for($i=0;$i<6;$i++){?>
                  <span class="sublabel">CPU Usage (40.05 - 32 cpus)</span>
                    <div class="progress progress-xs progress-metro">
                      <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"></div>
                  </div><!-- progress -->
                  <?php } ?>
                  

                 
              </div><!-- col-md-5 -->
      </div><!-- row -->
  </div><!-- panel-body -->
</div><!-- panel -->
</div>


</div><!-- row -->


<div class="row">
    <?php for($i=0;$i<3;$i++){?>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-body padding15">
                <h5 class="md-title mt0 mb10">Site Statistics</h5>
                <div id="basicFlotLegend" class="flotLegend">
                    <table style="font-size:smaller;color:#545454">
                        <tbody>
                            <tr>
                                <td class="legendColorBox">
                                    <div style="border:1px solid #ccc;padding:1px">
                                        <div style="width:4px;height:0;border:5px solid #03c3c4;overflow:hidden"></div>
                                    </div>
                                </td>
                                <td class="legendLabel">New Customer</td><td class="legendColorBox">
                                    <div style="border:1px solid #ccc;padding:1px">
                                        <div style="width:4px;height:0;border:5px solid #905dd1;overflow:hidden">*</div>
                                    </div>
                                </td>
                                <td class="legendLabel">Returning Customer</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div id="basicflot" class="flotChart" style="padding: 0px; position: relative;">
                    <canvas class="flot-base" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 314px; height: 200px;" width="314" height="200">
                    </canvas>
                    <div class="flot-text" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);">
                        <div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;">
                            <div style="position: absolute; max-width: 44px; top: 185px; left: 14px; text-align: center;" class="flot-tick-label tickLabel">0</div>
                            <div style="position: absolute; max-width: 44px; top: 185px; left: 62px; text-align: center;" class="flot-tick-label tickLabel">1</div>
                            <div style="position: absolute; max-width: 44px; top: 185px; left: 110px; text-align: center;" class="flot-tick-label tickLabel">2</div>
                            <div style="position: absolute; max-width: 44px; top: 185px; left: 159px; text-align: center;" class="flot-tick-label tickLabel">3</div>
                            <div style="position: absolute; max-width: 44px; top: 185px; left: 207px; text-align: center;" class="flot-tick-label tickLabel">4</div>
                            <div style="position: absolute; max-width: 44px; top: 185px; left: 255px; text-align: center;" class="flot-tick-label tickLabel">5</div>
                            <div style="position: absolute; max-width: 44px; top: 185px; left: 303px; text-align: center;" class="flot-tick-label tickLabel">6</div>
                        </div>
                        <div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;">
                            <div style="position: absolute; top: 173px; left: 6px; text-align: right;" class="flot-tick-label tickLabel">0</div>
                            <div style="position: absolute; top: 115px; left: 6px; text-align: right;" class="flot-tick-label tickLabel">5</div>
                            <div style="position: absolute; top: 58px; left: 0px; text-align: right;" class="flot-tick-label tickLabel">10</div>
                            <div style="position: absolute; top: 1px; left: 0px; text-align: right;" class="flot-tick-label tickLabel">15</div>
                        </div>
                    </div>
                    <canvas class="flot-overlay" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 314px; height: 200px;" width="314" height="200">

                    </canvas>
                </div>
            </div><!-- panel-body -->
            <div class="panel-footer">
                <div class="tinystat pull-left">
                    <div id="sparkline" class="chart mt5"><canvas style="display: inline-block; width: 59px; height: 30px; vertical-align: top;" width="59" height="30"></canvas></div>
                    <div class="datainfo">
                        <span class="text-muted">Average</span>
                        <h4>$9,201</h4>
                    </div>
                </div><!-- tinystat -->
                <div class="tinystat pull-right">
                    <div id="sparkline2" class="chart mt5"><canvas style="display: inline-block; width: 59px; height: 30px; vertical-align: top;" width="59" height="30"></canvas></div>
                    <div class="datainfo">
                        <span class="text-muted">Total</span>
                        <h4>$8,201</h4>
                    </div>
                </div><!-- tinystat -->
            </div><!-- panel-footer -->
        </div><!-- panel -->
    </div>
    <?php } ?>
    </div><!-- row -->
</div><!-- contentpanel -->

