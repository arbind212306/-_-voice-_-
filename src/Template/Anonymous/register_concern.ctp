<?php
ob_start();
use Cake\Routing\Router;
use Cake\View\Helper\UrlHelper;
 $url_remarkreject= $this->Url->build(['controller' => 'Anonymous', 'action' => 'witns']);?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register Anonymous Concern | My Voice</title>
    <!-- Bootstrap -->
  <?= $this->Html->css('bootstrap.css') ?>
    <?= $this->Html->css('style.css') ?>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

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
            <a class="navbar-brand" href="#"><?= $this->Html->image('logo.png') ?>
</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden-sm hidden-md hidden-lg border-bottom"><a href="index.html"><i class="fa fa-floppy-o"></i> Save Draft</a></li>
                <li class="hidden-sm hidden-md hidden-lg border-bottom"><a href="index.html"><i class="fa fa-trash"></i> Delete Report</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hello, Anonymous<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="index.html">Exit</a></li>
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
                <div class="p-a-10"><a href="#" class="btn btn-default btn-block p-a-10" data-toggle="modal" data-target="#email_verification"><i class="fa fa-floppy-o"></i> Save Draft</a></div>
                <div class="p-a-10"><a href="" class="btn btn-default btn-block p-a-10"><i class="fa fa-trash"></i> Delete Report</a></div>
                <div class="company-logo">
                    <div class="p-b-10"><small class="text-muted">Developed By</small></div>
                    <div> <?= $this->Html->image('logo-quatrro.png') ?>
 </div>
                </div>
            </div>
        </div>

		
        <div class="col-sm-10">
            
            <!------------- Form OPen -->
            <?= $this->Form->create('Users',['url' => ['controller' => 'Anonymous', 'action' => 'anonymousConcern','type' => 'file','enctype'=>'multipart/form-data']]);?>
            <div class="container-fluid" id="concern-form">
                <div class="concern-form-section active" data-section-order="1">
                    <div class="panel-block bg-transparent">
                        <h2 class="panel-block-title">Basic Details</h2>
                    </div>
                    <div class="panel-block">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="subject_title"></label>
<?php echo $this->Form->control('c_title', ['label' => 'Subject Title','type'=>'text','class'=>'form-control','id'=>'subject_title']);?>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="concern_regarding">What is this concern regarding? *</label>
                                    <?php $corn_regarding=array('Harassment'=>'Harassment','Disciplinary'=>'Disciplinary','Business Ethics'=>'Business Ethics','Others'=>'Others'); 
echo $this->Form->select('c_subject',$corn_regarding,['class'=>'form-control','id'=>'concern_regarding','label' => 'What is this concern regarding? *','empty'=>'Choose an option']); ?>    
                                <span id="check_concern_regarding"></span>
</div>
                            </div>
                            <div class="col-md-6" id="other">
                                <div class="form-group">
                                    <label for="other_concern">If others, please specify</label>
                                   <?php echo $this->Form->control('other_issue', ['label' => false,'type'=>'text','class'=>'form-control','id'=>'other_concern']); ?>
<span id="check_other_concern"></span>                                
</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="colleague_complaint">Are You Registering This Complaint On Behalf Of Your Colleague? *</label>
                                  <?php $colleague_complaint=array("Yes"=>"Yes","No"=>"No");
echo $this->Form->select('c_option',$colleague_complaint,['class'=>'form-control','id'=>'colleague_complaint','label' => 'Are You Registering This Complaint On Behalf Of Your Colleague? *','empty'=>'Choose an option']); ?> 
<span id="check_colleague_complaint"></span>                                
</div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="resolve_complaint">Have You Tried To Resolve This Issue On Your Own? *</label>
                                   <?php $resolve_complaint=array("Yes"=>"Yes","No"=>"No"); 
echo $this->Form->select('c_tried_r_own',$resolve_complaint,['class'=>'form-control','id'=>'resolve_complaint','label' => 'Have You Tried To Resolve This Issue On Your Own? *','empty'=>'Choose an option']);?>  
<span id="check_resolve_complaint"></span>                                
</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="concern-form-section hidden" data-section-order="2">
                    <div class="panel-block bg-transparent">
                        <h2 class="panel-block-title">Work Details</h2>
                    </div>
                    <div class="panel-block">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="business_unit"></label>
                                    <?php echo $this->Form->control('bu', ['label' => 'Business Unit','type'=>'text','class'=>'form-control','id'=>'business_unit']);?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="city"></label>
                                    <?php echo $this->Form->control('city', ['label' => 'City','type'=>'text','class'=>'form-control','id'=>'city']); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="work_location"></label>
                                  <?php echo $this->Form->control('work_location', ['label' => 'Work Location','type'=>'text','class'=>'form-control','id'=>'work_location']); ?>
                                </div>
                            </div>
                        </div>
                        <hr/>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name"></label>
                                    <?php echo $this->Form->control('name', ['label' => 'Name','type'=>'text','class'=>'form-control','id'=>'work_location']); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="employee_id"></label>
                                    <?php echo $this->Form->control('empid', ['label' => 'Employee ID','type'=>'text','class'=>'form-control','id'=>'employee_id']); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email"></label>
                                   <?php echo $this->Form->control('email', ['label' => 'Email *','type'=>'text','class'=>'form-control','id'=>'email']); ?>
                          <span id="check_email"></span>                                
                               </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone_number"></label>
                                 <?php echo $this->Form->control('mobile', ['label' => 'Phone Number','type'=>'text','class'=>'form-control','id'=>'phone_number']); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="additional_notes">Additional Notes</label>
                                   <?php echo $this->Form->textarea('notes', ['label' => 'Additional Notes','class'=>'form-control','id'=>'additional_notes']); ?>
                                    <small class="text-muted">If you would like to, please share some of the details about your job description, your colleagues, etc, to give us some context of your work environment.</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="concern-form-section hidden" data-section-order="3">
                    <div class="panel-block bg-transparent">
                        <h2 class="panel-block-title">Complaint</h2>
                    </div>
                    <div class="panel-block">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="concern_details">Please explain your concern to us. Know that anything you say is completely confidential so please feel free to be specific about your concern and elaborate the issue. You may also attach any pertinent documents that you feel we should know about.</label>
                                   <?php echo $this->Form->textarea('concern_details', ['label' => false,'class'=>'form-control','id'=>'concern_details']); ?>
<span id="check_concern_details"></span>                                
</div>
                            </div>
                        </div>


 <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-1 text-center">
                                            <div class="recording-icon">
                                                
 <?= $this->Html->image('mic.svg') ?>

                                            </div>
                                        </div>
                                        <div class="col-md-8 text-center">
                                            <div class="recording-icon">

                                            </div>
                                        </div>
                                        <div class="col-md-3 text-right">
                                            <div class="recording-icon inline-block">
                                                
<?= $this->Html->image('pause%201.svg') ?>

                                            </div>
                                            <div class="recording-icon inline-block">
                                                
<?= $this->Html->image('play%201.svg') ?>
                                            </div>
                                            <div class="recording-icon inline-block">
                                                
<?= $this->Html->image('stop%201.svg') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr/>















                        <!---- <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-1 text-center">
                                            <div class="recording-icon">
                                            <?= $this->Html->image('mic.svg') ?>
                                                 </div>
                                        </div>
                                        <div class="col-md-8 text-center">
                                            <div class="recording-icon">

                                            </div>
                                        </div>
                                        <div class="col-md-3 text-right">
                                            <div class="recording-icon inline-block">
                                                <?= $this->Html->image('pause%201.svg') ?>
                                                     </div>
                                            <div class="recording-icon inline-block">
                                             <?= $this->Html->image('play%201.svg') ?>
                                                </div>
                                            <div class="recording-icon inline-block">
                                             <?= $this->Html->image('stop%201.svg') ?>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <hr/>
                        <div class="row">
                            <div class="col-xs-6">
                                <h4 class="m-t-7">Attachments</h4>
                            </div>
                            <div class="col-xs-6 text-right">
<label class="btn btn-dark p-a-10" onclick="$('#chooseFile').click()">+ Choose File</label>
                               
                             <?php echo $this->Form->input('attach_data[]',['lable'=>false,'type' => 'file','multiple'=>'multiple','class'=>'hidden','id'=>'chooseFile']); ?>
                            </div>
                        </div>
                        <div class="row m-t-20">
                            <div class="col-xs-12">
                                <ul class="list-group" id="fileview">
                                                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="concern-form-section hidden" data-section-order="4">
                    <div class="panel-block bg-transparent">
                        <h2 class="panel-block-title">Witnesses</h2>
                    </div>
                    <div class="panel-block">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Please feel free to add a list of witnesses who may be able to support your claim.</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#myModal">+ Add Witness</button>
                            </div>
                        </div>
                        <div class="row m-t-20">
                            <div class="col-xs-12">
                                <ul class="list-group" id="witness">
                                   
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="concern-form-section hidden" data-section-order="5">
                    <div class="panel-block bg-transparent">
                        <h2 class="panel-block-title">Confirm</h2>
                    </div>
                    <div class="panel-block">
                        <div class="row">
                            <div class="col-md-3">
                             <?= $this->Html->image('captcha.jpg') ?>
                                
                            </div>
                            <div class="col-md-9">
                                <label for="captcha">Enter the captcha</label>
                                <input type="text" id="captcha" name="captcha" class="form-control">
                            </div>
                        </div>
                        <div class="row m-t-30">
                            <div class="col-xs-12">
                                <label><input type="checkbox"> I confirm that I have carefully read and accepted the <a href="#" class="text-blue">terms and conditions</a> for this action</label>
                            </div>
                        </div>
  
  <?php echo $this->Form->control('first_access', ['label' => '','type'=>'hidden','class'=>'form-control','id'=>'','value'=>@$time1]); ?>
<?php echo $this->Form->control('complaint_id_status', ['label' => '','type'=>'hidden','class'=>'form-control','id'=>'','value'=>'1']); ?>
	
	<?php echo $this->Form->control('confirmed', ['label' => '','type'=>'hidden','class'=>'form-control','id'=>'','value'=>'1']); ?>
	<?php echo $this->Form->control('status', ['label' => '','type'=>'hidden','class'=>'form-control','id'=>'','value'=>'new']); ?>

<?php echo $this->Form->control('user_type', ['label' => '','type'=>'hidden','class'=>'form-control','id'=>'','value'=>'Accuser']); ?>
<?php $a = (string) microtime();
$password = "My".substr($a, 2, 8);?>
<?php echo $this->Form->control('password', ['label' => false,'type'=>'hidden','class'=>'form-control','id'=>'','value'=>$password ]); ?>
<?php echo $this->Form->control('pass', ['label' => false,'type'=>'hidden','class'=>'form-control','id'=>'','value'=>$password ]); ?>



  <div class="row">                         
      <div class="col-xs-10 text-right" >
	
                               <?= $this->Form->button('Submit',['escape' => false,'type' => 'submit','class'=>'btn btn-dark ']) ?>
                            </div>                
  </div>
                    </div>
                </div>
				
				
				
				
                
                <div class="panel-block form-navigation margin-bottom-30 bg-transparent">
                    <div class="row">
                        <div class="col-md-4 text-center p-t-10">
                            <button type="button" class="btn btn-dark p-a-10 hidden" id="btn-previous"><i class="fa fa-angle-left fa-lg p-r-20"></i> Step Back</button>
                        </div>
                        <div class="col-md-4 text-center p-t-10">
						
                            <button  type="button" class="btn btn-dark p-a-10 hidden" id="btn-download"><i class="fa fa-file-pdf-o fa-lg p-r-20"></i> Download PDF</button>
                        </div>
                        <div class="col-md-4 text-center p-t-10">
                            <button  type="button" class="btn btn-dark p-a-10" id="btn-proceed">Proceed <i class="fa fa-angle-right fa-lg p-l-20"></i> </button>
                            <a href="user-profile.html" class="btn btn-dark p-a-10 hidden" id="btn-concerns"><i class="fa fa-file-o fa-lg p-r-20"></i> Show Concerns</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <?= $this->Form->end() ?>

         <!------------- Form end -->
        
        
    </div>
</div>

    
	
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Witness</h4>
            </div>
			
            <div class="modal-body bg-light">
		<?= $this->Form->create("Witns", ['url' => ['controller' => 'Anonymous', 'action' => 'witns']]); ?>
               
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="witness_name"></label>
								<?php
								echo $this->Form->input('wi_name',['label' => 'Name','id'=>'witness_name','type'=>'text','class'=>'form-control']);
          ?>                           
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="witness_bu"></label>
								<?php
          echo $this->Form->input('wi_bu',['label' => 'Business Unit','name'=>'wi_bu','type'=>'text','id'=>'witness_bu','class'=>'form-control']); ?>

                                
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="witness_city"></label>
								<?php
          echo $this->Form->input('wi_city',['label' => 'City','type'=>'text','id'=>'witness_city','class'=>'form-control']); ?>

                                </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="witness_work"></label>
                               <?php
          echo $this->Form->input('wi_location',['label' => 'Work Location','type'=>'text','id'=>'witness_work','class'=>'form-control']); ?>
 
								
								
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="witness_emp_id"></label>
                                <?php
          echo $this->Form->input('wi_empid',['label' => 'Employee ID','type'=>'text','id'=>'witness_emp_id','class'=>'form-control']); ?>
 <?php
          echo $this->Form->input('a_useremail',['label' =>false,'type'=>'hidden','id'=>'a_useremail','class'=>'form-control']); ?>
                            </div>
                        </div>
                      <div class="col-md-6">
                            <div class="form-group">
                                <label for="witness_email"></label>
<?php
          echo $this->Form->input('wi_email_id',['label' => 'Email Id','name'=>'wi_email_id','type'=>'text','id'=>'witness_email','class'=>'form-control']); ?>
                                
                            </div>
                        </div>
                         </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                
<label for="witness_relation"></label>
                                
								<?php
          echo $this->Form->input('relationship',['label' => 'Relationship','id'=>'witness_relation','type'=>'text','class'=>'form-control']); ?>
                            </div>
                        </div>
                    </div>
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <?= $this->Form->button('Add Witness',['escape' => false,'type' => 'submit','class'=>'btn btn-dark ','id'=>'wit','data-dismiss'=>'modal']) ?>
				
            </div>
			 <?= $this->Form->end() ?>
        </div>
		 
    </div>
</div>
	



<div class="modal fade" id="email_verification" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Email Verification</h4>
            </div>
            <div class="modal-body bg-light">
                <form id="email_form">
                    <p>In order to save / submit your application as Anonymous, we will need to verify your email id. Please click on the verification link sent to your entered email id in order to complete the action.</p>
                    <p>You will also be provided with a temporary username and password for you to return to, or track the progress of your application</p>
                    <hr/>
                    <div class="form-group">
                        <label for="email_address">Email Address*</label>
                        <input type="email" class="form-control" id="email_address" name="email">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-dark">Proceed</button>
            </div>
        </div>
    </div>
</div>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<<?= $this->Html->script('bootstrap.min.js') ?>
<script type="text/javascript">
    $(document).ready(function(){
var scntDiv = $('#fileview');
        var i = $('#fileview li').size() + 1;
        $('#chooseFile').change(function(e){
            var fileName = e.target.files[0].name;
			var month = new Array();
    month[0] = "January";
    month[1] = "February";
    month[2] = "March";
    month[3] = "April";
    month[4] = "May";
    month[5] = "June";
    month[6] = "July";
    month[7] = "August";
    month[8] = "September";
    month[9] = "October";
    month[10] = "November";
    month[11] = "December";
			 var d = new Date();
    var n = month[d.getMonth()];
    var cdate = d.getDate();
			
			
            //alert('The file "' + fileName +  '" has been selected.');
			jQuery('ul#fileview').append('<li class="list-group-item border-none p-a-20" id="imgdelete"><div class="row" name="_' + i +'"><div class="col-md-3 p-t-5">'+ fileName +'</div><div class="col-md-6 p-t-5">Uploaded on '+cdate+' th '+n+'</div><div class="col-md-3"><button class="btn btn-default status-retracted" id="deletebtn" onclick="myFunction()">Delete</button></div></div></li>'); 		
i++;
                return false;				
	});


$(document.body).on("click","#deletebtn", function (e) {
e.preventDefault();
   if( i > 2 ) {
                        $(this).parents('li').remove();
                
                }
                return false;
});

    });
</script>
<?= $this->Html->script('custom.js') ?>




<script type="text/javascript">
$ = jQuery;
 $(document).ready(function () {

$(document.body).on("click","#wit", function (e) {
e.preventDefault();
//alert("kkk0000");
        var witness_name = $("#witness_name").val();
        var witness_bu = $("#witness_bu").val();
        var witness_city = $("#witness_city").val();
        var witness_work = $("#witness_work").val();

		 var witness_emp_id = $("#witness_emp_id").val();
        var witness_email = $("#witness_email").val();
var a_useremail = $("#a_useremail").val();
		 var witness_relation = $("#witness_relation").val();




        //---------------------------------------------------
        $.ajax({
            type: "POST",
            url: "<?= $url_remarkreject ;?>",
            data: 'witness_name=' + witness_name + '&witness_bu=' + witness_bu + '&witness_city=' + witness_city + '&witness_work=' + witness_work +
			'&witness_emp_id=' + witness_emp_id + '&witness_email=' + witness_email + '&a_useremail=' + a_useremail + '&witness_relation=' + witness_relation,
            success: function (response)
            {
                //alert('Your Witness record Successfully inserted');

jQuery('ul#witness').append('<li class="list-group-item border-none p-a-20"><div class="row"><div class="col-md-3 p-t-5">'+witness_name+'</div><div class="col-md-3 p-t-5">' + witness_city + '</div><div class="col-md-3 p-t-5">' + witness_emp_id + '</div><div class="col-md-3"><button class="btn btn-default status-retracted">Remove</button></div></div></li>'); 
            }
        });
        //---------------------------------------------------
    });
	});
</script>


<script>
$(document).ready(function(){
   
$('#email').keyup(function(){
    $('#a_useremail').val(this.value);
});
  });
</script>

</body>
</html>

