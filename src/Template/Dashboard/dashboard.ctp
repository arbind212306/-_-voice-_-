<?php
$session = $this->request->session();
$session_data =  $session->read();
$user_name = $session_data["Auth"]["User"]["name"];
$user_id = $session_data["Auth"]["User"]["id"];
$dashboard = $this->Url->build(['controller'=>'Dashboard' ,'action'=>'dashboard']);
$report  = $this->Url->build(['controller'=>'MyVoiceControl' ,'action'=>'report']);
$profile = $this->Url->build(['controller'=>'MyVoiceControl' ,'action'=>'profiles',$user_id]);

$url_harassment = $this->Url->build(['category' => 1,'controller' => 'MyVoiceControl', 'action'=>'report']);
$url_ethics = $this->Url->build(['category' => 4,'controller' => 'MyVoiceControl', 'action'=>'report']);
$url_disciplinary = $this->Url->build(['category' => 7,'controller' => 'MyVoiceControl', 'action'=>'report']);
$url_total = $this->Url->build(['category' => 'all','controller' => 'MyVoiceControl', 'action'=>'report']);
$accepted = $this->Url->build(['case_status' => 2,'controller' => 'MyVoiceControl', 'action'=>'report']);
$rejected = $this->Url->build(['case_status' => 3,'controller' => 'MyVoiceControl', 'action'=>'report']);
$pending = $this->Url->build(['case_status' => 1,'controller' => 'MyVoiceControl', 'action'=>'report']);
$closed = $this->Url->build(['case_status' => 15,'controller' => 'MyVoiceControl', 'action'=>'report']);
$high = $this->Url->build(['severity' => 'High','controller' => 'MyVoiceControl', 'action'=>'report']);
$low = $this->Url->build(['severity' => 'Low','controller' => 'MyVoiceControl', 'action'=>'report']);
$medium = $this->Url->build(['severity' => 'Medium','controller' => 'MyVoiceControl', 'action'=>'report']);
//pr($city);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MyVoice | Dashboard</title>
    <!-- Bootstrap -->
    <?= $this->Html->css('bootstrap.css') ?>
    <?= $this->Html->css('style.css') ?>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <!--<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<nav class="navbar navbar-default navbar-white navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </button>
            <a class="navbar-brand" href="#"><?php echo $this->Html->image('logo.png')?></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
<!--                <li class="hidden-sm hidden-md hidden-lg"><a href="dashboard.html">Dashboard</a></li>
                <li class="hidden-sm hidden-md hidden-lg"><a href="statistics.html">Statistics</a></li>
                <li class="hidden-sm hidden-md hidden-lg"><a href="reports.html">Reports</a></li>
                <li class="hidden-sm hidden-md hidden-lg"><a href="employee-records.html">Employee Records</a></li>
                <li class="hidden-sm hidden-md hidden-lg"><a href="profile.html">Profile</a></li>-->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <?php echo $user_name; ?><span class="caret"></span></a>
                    <ul class="dropdown-menu">

                        <?php $changepassword= $this->Url->build(['controller' => 'Users', 'action' => 'changepassword',$user_id]);?>

                        <li><a href="<?= $changepassword ?>">Change Password</a></li>
                        <li role="separator" class="divider"></li>
                        <?php $logout= $this->Url->build(['controller' => 'Users', 'action' => 'logout']);?>
                        <li><a href="<?= $logout; ?>">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="container-fluid margin-top-60">
    <div class="row">
        <div class="col-sm-2 hidden-xs">
            <div class="fixed-side-pane">
                <ul>
                    <li class="active"><a href="<?= $dashboard ?>">Dashboard</a></li>
                    <li><a href="<?= $report ?>">Complaints</a></li>
                    <li><a href="<?= $profile ?>">Profile</a></li>
                </ul>

                <div class="company-logo">
                    <div class="p-b-10"><small class="text-muted">Developed By</small></div>
                    <div><?= $this->Html->image('logo-quatrro.png') ?></div>
                </div>
            </div>
        </div>
        <div class="col-sm-10">
            <div class="container-fluid">
                <div class="panel-block bg-transparent" id="reports">
                    <h2 class="panel-block-title">Dashboard</h2>
                </div>
                <div class="panel-block">
                    <div class="row panel-block-row">
                        <a href="<?= $url_total ?>">
                        <div class="col-md-2"><label class="panel-block-label totalharss"><span class="circle"></span>Complaints</label></div>
                        <div class="col-md-2"><p class="panel-block-label totalharss"><?= $totalCase ?></p></div>
                        </a>
                        <a href="<?= $accepted ?>">
                        <div class="col-md-2"><label class="panel-block-label totalharss"><span class="circle"></span>Accepted</label></div>
                        <div class="col-md-2"><p class="panel-block-label totalharss"><?= $totalAccepted ?></p></div>
                        </a>
                        <a href="<?= $high ?>">
                        <div class="col-md-2"><label class="panel-block-label totalharss"><span class="circle"></span>High</label></div>
                        <div class="col-md-2"><p class="panel-block-label totalharss"><?= $highSeverity ?></p></div>
                        </a>
                    </div>
                    <div class="row panel-block-row">
                        <a href="<?= $url_harassment ?>">
                        <div class="col-md-2"><label class="panel-block-label harss"><span class="circle"></span>Harassment</label></div>
                        <div class="col-md-2"><p class="panel-block-label harss"><?= $totalHarassment ?></p></div>
                        </a>
                        <a href="<?= $rejected ?>">
                        <div class="col-md-2"><label class="panel-block-label harss"><span class="circle"></span>Rejected</label></div>
                        <div class="col-md-2"><p class="panel-block-label harss"><?= $totalRejected ?></p></div>
                        </a>
                        <a href="<?= $medium ?>">
                        <div class="col-md-2"><label class="panel-block-label harss"><span class="circle"></span>Medium</label></div>
                        <div class="col-md-2"><p class="panel-block-label harss"><?= $mediumSeverity ?></p></div>
                        </a>
                    </div>
                    <div class="row panel-block-row">
                        <a href="<?= $url_ethics ?>">
                        <div class="col-md-2"><label class="panel-block-label etchic"><span class="circle"></span>Business Ethics</label></div>
                        <div class="col-md-2"><p class="panel-block-label etchic"><?= $totalBusinessEthics ?></p></div>
                        </a>
                        <a href="<?= $pending ?>">
                        <div class="col-md-2"><label class="panel-block-label etchic"><span class="circle"></span>Pending</label></div>
                        <div class="col-md-2"><p class="panel-block-label etchic"><?= $totalPending ?></p></div>
                        </a>
                        <a href="<?= $low ?>">
                        <div class="col-md-2"><label class="panel-block-label etchic"><span class="circle"></span>Low</label></div>
                        <div class="col-md-2"><p class="panel-block-label etchic"><?= $lowSeverity ?></p></div>
                        </a>
                    </div>
                    <div class="row panel-block-row">
                        <a href="<?= $url_disciplinary ?>">
                        <div class="col-md-2"><label class="panel-block-label disp"><span class="circle"></span>Disciplinary</label></div>
                        <div class="col-md-2"><p class="panel-block-label disp"><?= $toatlDisiplinary ?></p></div>
                        </a>
                        <a href="<?= $closed ?>">
                        <div class="col-md-2"><label class="panel-block-label disp"><span class="circle"></span>Closed</label></div>
                        <div class="col-md-2"><p class="panel-block-label disp"><?= $totalClosed ?></p></div>
                        </a>
                    </div>
                </div>
                <div class="m-t-30 panel-block" style="background: #f1f1f1; padding: 10px;  color: #222222;">
                    <form method="POST" action="<?= $this->Url->build(['controller'=>'Dashboard' ,'action'=>'dashboard']); ?>">
                        <div class="row panel-block-row">
                            <div class="col-md-2 text-center" >
                                <label class="panel-block-label" id="year-text">View For Year</label>
                            </div>
                            <div class="col-md-3 text-center" >
                                <select class="form-control" name="yearpicker" id="yearpicker">
                                    <option value="">Select year</option>
                                    <option value="all" <?php if(empty($year)) echo 'selected=selected' ?>>All</option>
                                    <?php // if($year){ ?>
                                    <!--<option value="<?= $year ?>" <?php if(!empty($year) && $year === $year)echo 'selected=selected' ?>><?= $year ?></option>-->
                                    <?php //} ?> 
                                </select>
                            </div>
                        </div>    
                    </form>   
                </div>

                <div class="m-t-30 panel-block" >
                    <div id="chart-container"></div>
                </div>
                <div class="m-t-30 panel-block" >
                    <div id="chart5"></div>
                </div>
                <div class="m-t-30 panel-block" >
                    <div id="chart6"></div>
                </div>
                <div class="m-t-30 panel-block" >
                    <div id="chart2"></div>
                </div>
                <div class="m-t-30 panel-block" >
                    <div id="chart3"></div>
                </div>
                <div class="m-t-30 panel-block" >
                    <div id="chart4"></div>
                </div> 
                
<!--                <div class="m-t-30 panel-block" >
                    <div><h5 id="title5">Category Vs Location</h5></div>
                        <div id="chart6"></div>
                </div>-->
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<!--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>-->
<?php echo $this->Html->script(['jquery-2.1.4.min.js', 'bootstrap.min','fusion/fusioncharts','fusion/jquery-fusioncharts','fusion/fusioncharts.theme.fusion']); ?>
</body>
</html>
<!-- Script for first graph -->
<script>
var harss = <?= $harass ?>;
var ethic = <?= $ethic ?>;
var disp  = <?= $disp ?>;
var other = <?= $other ?>;
const dataSource = {
  "chart": {
    "caption": "Complaints Trend",
    "yaxisname": "Number of Complaints",
    "xaxisname": "Months",
    "showhovereffect": "1",
    "drawcrossline": "1",
    "exportEnabled": "1",
    "plottooltext": "<b>$dataValue</b> $seriesName case in $label",
    "theme": "fusion"
  },
  "categories": [
    {
      "category": [
        {
          "label": "January"
        },
        {
          "label": "February"
        },
        {
          "label": "March"
        },
        {
          "label": "April"
        },
        {
          "label": "May"
        },
        {
          "label": "June"
        }
        ,
        {
          "label": "July"
        }
        ,
        {
          "label": "August"
        },
        {
          "label": "September"
        },
        {
          "label": "October"
        },
        {
          "label": "November"
        },
        {
          "label": "December"
        }
      ]
    }
  ],
  "dataset": [
    {
      "seriesname": "Harassment",
      "data": harss,
      "color": "#f15a6d"
    },
    {
      "seriesname": "Ethics",
      "data": ethic,
      "color": "#16a9bb"
    },
    {
      "seriesname": "Disciplinary",
      "data": disp,
      "color": "#0eb890"
    },
    {
      "seriesname": "Other",
      "data": other,
      "color": "#ff9900"
    }
  ]
};

FusionCharts.ready(function() {
   var myChart = new FusionCharts({
      type: "msline",
      renderAt: "chart-container",
      width: "100%",
      height: "100%",
      dataFormat: "json",
      dataSource
   }).render();
});
</script>
<!-- Script for first graph ends here -->

<!-- Script for fourth graph starts here -->
<script>
$("#chart2").insertFusionCharts({
   type: "pie3d",
   width: "100%",
   height: "50%",
   dataFormat: "json",
   dataSource: {
  "chart": {
    "caption": "Complaints Category",
    "showvalues": "1",
    "showpercentintooltip": "0",
//    "enablemultislicing": "1",
    "exportEnabled": "1",
    "theme": "fusion"
  },
  "data": [
    {
      "label": "Harassment",
      "value": "<?= $totalHarassment ?>",
      "color": "#f15a6d",
      "link": "<?= $this->Url->build(['controller' => 'MyVoiceControl', 'action' => 'report']) ?>" + "?category=1"
    },
    {
      "label": "Business Ethics",
      "value": "<?= $totalBusinessEthics ?>",
      "color": "#16a9bb",
      "link": "<?= $this->Url->build(['controller' => 'MyVoiceControl', 'action' => 'report']) ?>" + "?category=4"
    },
    {
      "label": "Disciplinary",
      "value": "<?= $toatlDisiplinary ?>",
      "color": "#0eb890",
      "link": "<?= $this->Url->build(['controller' => 'MyVoiceControl', 'action' => 'report']) ?>" + "?category=7"
    },
    {
      "label": "Others",
      "value": "<?= $countOthers ?>",
      "color": "#ff9900",
      "link": "<?= $this->Url->build(['controller' => 'MyVoiceControl', 'action' => 'report']) ?>" + "?category=20"
    }
  ]
}
});
</script>
<!-- script for Fifth graph -->
<script>
$("#chart3").insertFusionCharts({
   type: "pie3d",
   width: "100%",
   height: "35%",
   dataFormat: "json",
   dataSource: {
  "chart": {
    "caption": "Complaints Severity",
    "showvalues": "1",
    "showpercentintooltip": "0",
    "enablemultislicing": "1",
    "exportEnabled": "1",
    "theme": "fusion"
  },
  "data": [
    {
      "label": "High",
      "value": "<?= $highSeverity ?>",
      "color": "#f15a6d",
      "link": "<?= $this->Url->build(['controller' => 'MyVoiceControl', 'action' => 'report']) ?>" + "?severity=High"
    },
    {
      "label": "Medium",
      "value": "<?= $mediumSeverity ?>",
      "color": "#0eb890",
      "link": "<?= $this->Url->build(['controller' => 'MyVoiceControl', 'action' => 'report']) ?>" + "?severity=Medium"
    },
    {
      "label": "Low",
      "value": "<?= $lowSeverity ?>",
      "color": "#ff9900",
      "link": "<?= $this->Url->build(['controller' => 'MyVoiceControl', 'action' => 'report']) ?>" + "?severity=Low"
    }
  ]
}
});
</script>

<!-- script for Sixth graph -->
<script>
$("#chart4").insertFusionCharts({
   type: "pie3d",
   width: "100%",
   height: "25%",
   dataFormat: "json",
   dataSource: {
  "chart": {
    "caption": "Complaints Status",
    "showvalues": "1",
    "showpercentintooltip": "0",
    "enablemultislicing": "1",
    "exportEnabled": "1",
    "theme": "fusion"
  },
  "data": [
    {
      "label": "Accepted",
      "value": "<?= $totalAccepted ?>",
      "color": "#16a9bb", 
      "link": "<?= $this->Url->build(['controller' => 'MyVoiceControl', 'action' => 'report']) ?>" + "?case_status=2"
    },
    {
      "label": "Pending",
      "value": "<?= $totalPending ?>",
      "color": "#ff9900",
      "link": "<?= $this->Url->build(['controller' => 'MyVoiceControl', 'action' => 'report']) ?>" + "?case_status=7"
    },
    {
      "label": "Rejected",
      "value": "<?= $totalRejected ?>",
      "color": "#e23d40",
      "link": "<?= $this->Url->build(['controller' => 'MyVoiceControl', 'action' => 'report']) ?>" + "?case_status=16"
    },
    {
      "label": "Closed",
      "value": "<?= $totalClosed ?>",
      "color": "#17bb94",
      "link": "<?= $this->Url->build(['controller' => 'MyVoiceControl', 'action' => 'report']) ?>" + "?case_status=15"
    }
  ]
}
});
</script>
<!-- script for second graph location vs complaint -->
<script>
var harssCity = <?= $harassCity ?>;  
var ethicCity = <?= $ethicCity ?>;
var displinaryCity = <?= $displinaryCity ?>;
var otherCity = <?= $otherCity ?>;
$("#chart5").insertFusionCharts({
   type: "mscolumn3d",
   width: "100%",
   height: "20%",
   dataFormat: "json",
   dataSource: {
  "chart": {
    "caption": "Location Vs Category",
    "xaxisname": "Location",
    "yaxisname": "Total number of Complaints",
    "formatnumberscale": "1",
    "exportEnabled": "1",
    "plottooltext": "<b>$dataValue</b> <b>$seriesName</b> in $label",
    "theme": "fusion"
  },
  "categories": [
    {
      "category": [
        {
          "label": "Gurgaon"
        },
        {
          "label": "Thane"
        },
        {
          "label": "Chennai"
        },
        {
          "label": "USA"
        }
      ]
    }
  ],
  "dataset": [
    {
      "seriesname": "Harassment",
      "data": harssCity,
      "color": "#f15a6d"
    },
    {
      "seriesname": "Disciplinary",
      "data": displinaryCity,
      "color": "#0eb890"
    },
    {
      "seriesname": "Business Ethics",
      "data": ethicCity,
      "color": "#16a9bb"
    },
    {
      "seriesname": "Others",
      "data": otherCity,
      "color": "#ff9900"
    }
  ]
},
   "events": {
      "dataPlotClick": function(ev, props) {
//          console.log(props);
        var city = props.categoryLabel;
        var category = props.datasetName;
        if(category === 'Harassment'){
            var q = 1;
        }
        if(category === 'Disciplinary'){
            var q = 7;
        }
        if(category === 'Business Ethics'){
            var q = 4;
        }
        if(category === 'Others'){
            var q = 20;
        }
        var query = '?category='+q+'&city='+city;
        window.location.href = "<?= $this->Url->build(["controller" => "MyVoiceControl","action" => "report"]);?>"+query;
      }
    }
});
</script>
<!-- script for Third graph i.e., staus vs complaint -->
<script>
    var getsatus = <?= $getSatatus ?>;
    var getHarassStatus = <?= $getHarassStatus ?>;
    var getEthicStatus = <?= $getEthicSattus ?>;
    var getDisplinarySttaus = <?= $getDisplinarySattus ?>;
    var getOtherStatus = <?= $getOtherSattus ?>;
    $("#chart6").insertFusionCharts({
   type: "mscolumn3d",
   width: "100%",
   height: "20%",
   dataFormat: "json",
   dataSource: {
  "chart": {
    "caption": "Status Vs Complaints",
    "xaxisname": "Satus",
    "yaxisname": "Total number of Complaint",
    "labelDisplay": "rotate",
    "slantLabel": "1",
    "formatnumberscale": "1",
    "exportEnabled": "1",
    "plottooltext": "<b>$dataValue</b> <b>$seriesName</b> case $label",
    "theme": "fusion"
  },
  "categories": [
    {
      "category": getsatus
    }
  ],
  "dataset": [
    {
      "seriesname": "Harassment",
      "data": getHarassStatus,
      "color": "#f15a6d",
      "items": [{"id":'1'}]
    },
    {
      "seriesname": "Disciplinary",
      "data": getDisplinarySttaus,
      "color": "#0eb890",
      "items": [{"id":'7'}]
    },
    {
      "seriesname": "Business Ethics",
      "data": getEthicStatus,
      "color": "#16a9bb",
      "items": [{"id":'4'}]
    },
    {
      "seriesname": "Others",
      "data": getOtherStatus,
      "color": "#ff9900",
      "items": [{"id":'20'}]
    }
  ]
},
   "events": {
      "dataPlotClick": function(ev, props) {
        var case_status = props.categoryLabel;
        var category = props.datasetName;
        //code for checking category
        if(category === 'Harassment'){
            var q = 1;
        }
        if(category === 'Disciplinary'){
            var q = 7;
        }
        if(category === 'Business Ethics'){
            var q = 4;
        }
        if(category === 'Others'){
            var q = 20;
        }
        //code for checking case status
        switch(case_status){
            case 'Filed': 
                var r = 1;
                break;
            case 'Accepted':  
                 var r = 2;
                 break;
            case 'Not Applicable':  
                 var r = 4;
                 break;
            case 'Panel Assigned':  
                 var r = 5;
                 break;
            case 'Inquiry Letter Issued':  
                 var r = 6;
                 break;
            case 'Respondent Response Pending':  
                 var r = 7;
                 break;
            case 'Respondent Response Received':  
                 var r = 8;
                 break;
            case 'Investigation In Progress':  
                 var r = 9;  
                 break;
            case 'Investigation Closed':  
                 var r = 10;
                 break;
            case 'Inquiry Report In Progress':  
                 var r = 11;
                 break;
            case 'Inquiry Report Closed':  
                 var r = 12;
                 break;
            case 'Implementation of Recommendations In Progress':  
                 var r = 13;
                 break;
            case 'Implementation of Recommendations Closed':  
                 var r = 14;
                 break;
            case 'Closed':  
                 var r = 15;
                 break;
            case 'Rejected':  
                 var r = 16;
                 break;
            case 'Action Closed':  
                 var r = 17; 
                 break;
        }
        
        var query = '?category='+q+'&case_status='+r;
        window.location.href = "<?= $this->Url->build(["controller" => "MyVoiceControl","action" => "report"]);?>"+query;
      }
    }
});

$(document).ready(function(){
    //query for generating years
        var year = '<?= $year ?>';
        for (i = new Date().getFullYear(); i > 2017; i--)
        {
            var option = '<option value="'+i+'" >'+i+'</option>';
//            $('#yearpicker').append($('<option />').val(i).html(i));
            $('#yearpicker').append(option);
        }
        if(year !== ''){
            $('#yearpicker').val(year);
        }
        $('#yearpicker').on('change', function(){
            this.form.submit();
        });
});

//var myEventListener = function (eventObj, eventArgs) {
//   console.log(eventObj.eventType + " was raised by the chart whose ID is " + eventObj.sender.id);
//};
</script>
<style>
    .totalharss {
        color : #f15a6d !important;
        font-size: 13px;
    }
    .totalharss .circle {
        background-color: #f15a6d;
    }
    .harss {
        color : #16a9bb !important;
        font-size: 13px;
    }
    .harss .circle {
        background-color: #16a9bb;
    }
    .etchic {
        color : #ff9900  !important;
        font-size: 13px;
    }
    .etchic .circle {
        background-color:  #ff9900;
    }
    .disp {
        color : #0eb890  !important;
        font-size: 13px;
    }
    .disp .circle {
        background-color:  #0eb890;
    }
    
    /*style for first graph*/
    #chart-container {
        height: 500px;
    }
    .raphael-group-1110-creditgroup {
        display: none;
    }
    .raphael-group-49-creditgroup {
        display: none;
    }
    .raphael-group-190-background {
        display: none;
    }
    .raphael-group-207-creditgroup {
        display: none;
    }
    .raphael-group-342-creditgroup {
        display: none;
    }
    .raphael-group-500-creditgroup {
         display: none;
    }
    .raphael-group-717-creditgroup {
         display: none;
    }
    
    #chart2 {
/*        height: 500px !important;
        width: 60% !important;*/
    }
/*    #chart2 {
        margin-left: 5%;
    }
    
    #chart3 {
        margin-left: 5%;
    }
    
    #chart4 {
        margin-left: 5%;
    }*/
    
    #chart5 {
        height: 500px;
    }
    
    #yearpicker {
        margin-left: -14%;
    }
    
    #year-text {
       margin-top:7%;
    }
</style>
