<?php
ob_start();
use Cake\Routing\Router;
use Cake\View\Helper\UrlHelper;
 $url_remarkreject = $this->Url->build($this->request->here(), true);
 $id = $_GET['id'];
 $url_pdf = $this->Url->build(['controller' => 'MyVoiceControl', 'action' => 'generatePdf',$id]);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Complaint Confirmation | My Voice</title>
    
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

    <?= $this->Html->css('bootstrap.css') ?>
    <?= $this->Html->css('style.css') ?>
   
</head>
<body>
<nav class="navbar navbar-default navbar-white navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </button>
            <a class="navbar-brand" href="#">
 <?= $this->Html->image('logo.png') ?>
</>        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hello, Anonymous<span class="caret"></span></a>
                    <ul class="dropdown-menu">
<?php $exit = $this->Url->build(['controller' => 'Users', 'action' => 'login']);?>

                        <li><a href="<?php echo $exit ;?>">Exit</a></li>
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
                <!-- <div class="p-a-10"><a href="#" class="btn btn-default btn-block p-a-10" data-toggle="modal" data-target="#email_verification"><i class="fa fa-floppy-o"></i> Save Draft</a></div>
                <div class="p-a-10"><a href="" class="btn btn-default btn-block p-a-10"><i class="fa fa-trash"></i> Delete Report</a></div> -->
                <div class="company-logo">
                    <div class="p-b-10"><small class="text-muted">Developed By</small></div>
                    <div> <?= $this->Html->image('logo-quatrro.png') ?>
                       </div>
                </div>
            </div>
        </div>
 <div class="col-sm-10">
 <div class="container-fluid" id="concern-form">
<div class="concern-form-section " >
                    <div class="panel-block" style="">
                        <div class="row">
                            <div class="col-md-8 col-sm-12  col-xs-12">
                                <div>
                                    <h3 class="text-muted success"><b>Your complaint has been raised.</b></h3>
                                </div>
                                <div class="m-t-30">
                                    <h4 class="text-muted">The complaint ID is <strong style="color: #e23d40" "><?= $_GET['complaint_id'];  ?></strong></h4>
                                </div>
                                <div class="m-t-30">
                                    <p>Thank you for writing to us and sharing your complaint. Our panel will review your concern within 48 hours and based on the nature of the complaint will assign it to the relevant team to take it forward. We are committed to ensure a safe, ethical work environment for everyone. We are happy to see that you have chosen to raise a concern as it shows your confidence in us.</p>
                                </div>
                                
                            </div>
                            <div class="col-md-4">
                                <div class="p-a-20 text-center complaint-image">
                                    <?= $this->Html->image('complaint%20box.svg') ?>
                                </div>
                            </div>
                        </div>
                    </div>
					
					 <div class="panel-block form-navigation margin-bottom-30 bg-transparent">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 text-center p-t-10">
                            <button type= "button" class="btn btn-dark p-a-10 hidden" id="btn-previous"><i class="fa fa-angle-left fa-lg p-r-20"></i> Step Back</button>
                        </div>
                        <form method='POST' action='<?= $url_pdf ?>'>
                        <div class="col-md-4 col-sm-4  p-t-10">
                            <input type="hidden" name="last_compalint_id" value="<?= $id ?>">
                            <button type= "submit" class="btn btn-dark p-a-10" id="btn-download"><i class="fa fa-file-pdf-o fa-lg p-r-20"></i> Download PDF</button>
                        </div>
                        </form>
                        <div class="col-md-4 text-center p-t-10">
                           
                            <a href="user-profile.html" class="btn btn-dark p-a-10 hidden" id="btn-concerns"><i class="fa fa-file-o fa-lg p-r-20"></i> Show Concerns</a>
                        </div>
                    </div>
                </div>
            </div>
					
					
					
                </div>
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
				
				
				
				<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
              <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
			  <?= $this->Html->script('bootstrap.min.js') ?>
<?= $this->Html->script('custom.js') ?>
</body>
</html>
