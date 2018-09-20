

<div class="container-fluid margin-top-60 margin-bottom-30">
    <div class="row">
        <div class="col-sm-2 hidden-xs">
            <div class="fixed-side-pane">
<?php foreach ($individual_accuser_detail as $individual_accuser_details): ?>
                       <?php   endforeach; ?>
<?php $id= h(@$individual_accuser_details->id) ?>
                <ul>
<?php $accuser_url=$this->Url->build(['controller'=>'Supervisor','action'=>'ComplaintDetailsAccuser',$id]);?>
<?php $dashboard=$this->Url->build(['controller'=>'Supervisor','action'=>'dashboard']);?>
<?php $accusation_url=$this->Url->build(['controller'=>'Supervisor','action'=>'ComplaintDetailsAccusationNature',$id]);?> 
<?php $witness_url=$this->Url->build(['controller'=>'Supervisor','action'=>'ComplaintDetailsWitness',$id]);?> 
<?php $ComplaintDetailsPersonalNote=$this->Url->build(['controller'=>'Supervisor','action'=>'ComplaintDetailsPersonalNote',$id]);?>
<?php $ComplaintDetailsPanelFormation=$this->Url->build(['controller'=>'Supervisor','action'=>'ComplaintDetailsPanelFormation',$id]);?>
<?php $ComplaintDetailsSubmitForm=$this->Url->build(['controller'=>'Supervisor','action'=>'ComplaintDetailsSubmitForm',$id]);?>
  <?php $ComplaintDetailsRespondent=$this->Url->build(['controller'=>'Supervisor','action'=>'ComplaintDetailsRespondent',$id]);?>
<?php $url_sub_category = $this->Url->build(['controller' => 'Supervisor', 'action'=> 'getSubcate']); ?>
  
                   <li class=""><a  href="<?= $accuser_url;?>">Complainant</a></li>
                      <li><a href="<?= $ComplaintDetailsRespondent ;?>">Respondent</a></li>
   <li><a href="<?php echo $witness_url ;?>">Witnesses</a></li>
                    <li class="active"><a href="<?php echo $accusation_url; ?>">Nature of Complaint</a></li>
                    <li><a href="<?= $ComplaintDetailsPersonalNote; ?>"> Notes</a></li>
                    <li><a href="<?= $ComplaintDetailsPanelFormation; ?>">Panel Formation</a></li>
                    <li><a href="<?= $ComplaintDetailsSubmitForm ; ?>">Submit Form</a></li>
                </ul>
                <div class="p-a-10"><a href="<?= $dashboard ;?>" class="btn btn-default btn-block p-a-10"><i class="fa fa-long-arrow-left"></i> Go Back</a></div>
                <div class="company-logo">
                    <div class="p-b-10">
                        <small class="text-muted">Developed By</small>
                    </div>
                    <div><?= $this->Html->image('logo.png') ?></div>
                </div>
            </div>
        </div>
        <div class="col-sm-10">
            <div class="container-fluid">
                <div class="panel-block bg-transparent">

                    <h3 class="panel-block-title"><?= h(@$individual_accuser_details->c_title) ?></h3>
                </div>
                <div class="panel-block" style="background:none;">
                    <div class="row panel-block-row panel-block-row-link">
                        <div class="col-md-3"><label class="panel-block-label">Complaint Id</label></div>
                        <div class="col-md-7"><p class="panel-block-label"><?= h(@$individual_accuser_details->complaint_id) ?></p></div>
                        <div class="col-md-2"><p class="panel-block-label"></p></div>
                    </div>
                    <div class="row panel-block-row panel-block-row-link">
                        <div class="col-md-3"><label class="panel-block-label">Filed On</label></div>
                        <div class="col-md-7"><p class="panel-block-label"><?= h(@$individual_accuser_details->complaint_id_genrate_date) ?></p></div>
                        <div class="col-md-2"><p class="panel-block-label"></p></div>
                    </div>
                    <div class="row panel-block-row panel-block-row-link">
                        <div class="col-md-3"><label class="panel-block-label">Current Status</label></div>
                        <div class="col-md-7"><p class="panel-block-label"><?= h(@$individual_accuser_details->status) ?></p></div>
                        <div class="col-md-2"><p class="panel-block-label"></p></div>
                    </div>
                   
                </div>
                <div class="row panel-block">
                    <div class="col-xs-12 panel-group margin-bottom-0" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-custom">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="panel-title pointer" data-toggle="collapse" data-parent="#accordion" href="#detail_report" aria-expanded="true" aria-controls="collapseOne">
                                            <h4 class="panel-block-title">Employee Report</h4>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="panel-title pointer text-right" data-toggle="collapse" data-parent="#accordion" href="#detail_report" aria-expanded="true" aria-controls="collapseOne">
                                            <i class="fa fa-chevron-down"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="detail_report" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">
                                    <div class="row p-t-20 margin-bottom-30">
                                        <div class="col-xs-12">
                                            <h3 class="panel-block-title">01. Issue</h3>
                                             <ul class="emp-report-list" style="margin: 10px 0 0 0px;">
                                                <li> Employee has categorized the issue as <?= @h($individual_accuser_details->c_subject ) ?>.</li>
                                                <li> Employee is filling the report on behalf of 
<?php $collegus= @h($individual_accuser_details->c_option) ?>
<?php if($collegus == 'No') {?>
self.
<?php } else { ?>
Colleague.
<?php } ?>
</li>                                      <li> Employee has tried to resolve this issue prior to filling the report, <?= @h($individual_accuser_details->c_tried_r_own ) ?>.  </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row p-t-20 margin-bottom-30">
                                        <div class="col-xs-12">
                                            <h3 class="panel-block-title">02. Context</h3>
                                            <div class="row panel-block-row p-t-20">
                                                <div class="col-md-3"><label class="panel-block-label">Employee</label></div>
                                                <div class="col-md-8"><p class="panel-block-label"><?= @h($individual_accuser_details->name) ?></p></div>
                                            </div>
                                            <div class="row panel-block-row">
                                                <div class="col-md-3"><label class="panel-block-label">City</label></div>
                                                <div class="col-md-8"><p class="panel-block-label"><?= @h($individual_accuser_details->city) ?></p></div>
                                            </div>
                                            <div class="row panel-block-row">
                                                <div class="col-md-3"><label class="panel-block-label">Work Location</label></div>
                                                <div class="col-md-8"><p class="panel-block-label"><?= @h($individual_accuser_details->work_location) ?></p></div>
                                            </div>
                                            <div class="row panel-block-row">
                                                <div class="col-md-3"><label class="panel-block-label">Business Unit</label></div>
                                                <div class="col-md-8"><p class="panel-block-label"><?= @h($individual_accuser_details->bu) ?></p></div>
                                            </div>
                                            <div class="row panel-block-row">
                                                <div class="col-md-3"><label class="panel-block-label">Employee ID</label></div>
                                                <div class="col-md-8"><p class="panel-block-label"><?= @h($individual_accuser_details->empid) ?></p></div>
                                            </div>
                                            <div class="row panel-block-row">
                                                <div class="col-md-3"><label class="panel-block-label">Email ID</label></div>
                                                <div class="col-md-8"><p class="panel-block-label"><?= @h($individual_accuser_details->email) ?></p></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-t-20 margin-bottom-30">
                                        <div class="col-xs-12">
                                            <h3 class="panel-block-title">03. Statement</h3>
                                            <div class="p-t-20">
                                                <p><?= @h($individual_accuser_details->concern_details ) ?></p>  <div class="p-t-20">
                                                  <!-- <img src="images/audio.png"> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 p-t-20">
                                            <h4 class="panel-block-title">Attachments</h4>
                                            <div class="row m-t-20">
                                                <div class="col-xs-12">
                                                   <ul class="list-group">
  <?php foreach ($individual_user_detail_images as $individual_user_detail_image): ?>
                                                        <li class="list-group-item border-none p-a-20">
                                                            <div class="row">
                                                                <div class="col-md-3 p-t-5"><?= h(@$individual_user_detail_image->image) ?></div>
                                                                <div class="col-md-6 p-t-5"></div>
                                                                <div class="col-md-3"></div>
                                                            </div>
                                                        </li>
                                <?php   endforeach; ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p-t-20 margin-bottom-30">
                                        <div class="col-xs-12">
                                            <h3 class="panel-block-title">04. Witnesses</h3>
<?php foreach ($witness_user_detail as $witness_user_details): ?>
                                            <div class="row panel-block-row p-t-20">
                                                <div class="col-md-3"><label class="panel-block-label">Witness 1</label></div>
                                                <div class="col-md-8"><p class="panel-block-label"><?= h(@$witness_user_details->wi_name) ?></p></div>
                                            </div>
                                            <div class="row panel-block-row">
                                                <div class="col-md-3"><label class="panel-block-label">City</label></div>
                                                <div class="col-md-8"><p class="panel-block-label"><?= h(@$witness_user_details->wi_city) ?></p></div>
                                            </div>
                                            <div class="row panel-block-row">
                                                <div class="col-md-3"><label class="panel-block-label">Work Location</label></div>
                                                <div class="col-md-8"><p class="panel-block-label"><?= h(@$witness_user_details->wi_location) ?></p></div>
                                            </div>
                                            <div class="row panel-block-row">
                                                <div class="col-md-3"><label class="panel-block-label">Business Unit</label></div>
                                                <div class="col-md-8"><p class="panel-block-label"><?= h(@$witness_user_details->wi_bu) ?></p></div>
                                            </div>
                                            <div class="row panel-block-row">
                                                <div class="col-md-3"><label class="panel-block-label">Employee ID</label></div>
                                                <div class="col-md-8"><p class="panel-block-label"><?= h(@$witness_user_details->wi_empid) ?></p></div>
                                            </div>
                                            <div class="row panel-block-row">
                                                <div class="col-md-3"><label class="panel-block-label">Email ID</label></div>
                                                <div class="col-md-8"><p class="panel-block-label"><?= h(@$witness_user_details->wi_email_id) ?></p></div>
                                            </div>
                                        </div>
 <?php   endforeach; ?>
<?php foreach ($accused_detail as $accused_details): ?>
                      
                                    <div class="row p-t-20 margin-bottom-30">
                                        <div class="col-xs-12">
                                            <h3 class="panel-block-title">05. Respondent</h3>
                                            <div class="row panel-block-row p-t-20">
                                                <div class="col-md-3"><label class="panel-block-label">Accused Name </label></div>
                                                <div class="col-md-8"><p class="panel-block-label"><?= h(@$accused_details->accused_name) ?></p></div>
                                            </div>
                                            <div class="row panel-block-row">
                                                <div class="col-md-3"><label class="panel-block-label">City</label></div>
                                                <div class="col-md-8"><p class="panel-block-label"><?= h(@$accused_details->accused_city) ?></p></div>
                                            </div>
                                            <div class="row panel-block-row">
                                                <div class="col-md-3"><label class="panel-block-label">Work Location</label></div>
                                                <div class="col-md-8"><p class="panel-block-label"><?= h(@$accused_details->accused_location) ?></p></div>
                                            </div>
                                            <div class="row panel-block-row">
                                                <div class="col-md-3"><label class="panel-block-label">Business Unit</label></div>
                                                <div class="col-md-8"><p class="panel-block-label"><?= h(@$accused_details->accused_bu) ?></p></div>
                                            </div>
                                            <div class="row panel-block-row">
                                                <div class="col-md-3"><label class="panel-block-label">Employee ID</label></div>
                                                <div class="col-md-8"><p class="panel-block-label"><?= h(@$accused_details->accused_empid) ?></p></div>
                                            </div>
                                            <div class="row panel-block-row">
                                                <div class="col-md-3"><label class="panel-block-label">Email ID</label></div>
                                                <div class="col-md-8"><p class="panel-block-label"><?= h(@$accused_details->accused_email) ?></p></div>
                                            </div>
                                        </div>
 <?php   endforeach; ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-t-20 p-b-20">
                <p>You have been assigned as the My Voice Manager in charge for this case</p>

                <div class="panel-divider"></div>
            </div>
            <div class="container-fluid">
                <div class="panel-block">
<h5 style="color:red;"><?php //echo $this->Flash->render(); ?>   </h5>
                  <?= $this->Form->create('Users',['url' => ['controller' => 'Supervisor', 'action' => 'ComplaintDetailsAccusationNature',$id]]);?>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="category_concern">Category</label>
                                     <select onchange="return getval();" name="category_concern" class="form-control" id="category_concern">
                                        <?php
                        if(!empty($catdata)){
                            //pr($catdata);die();
                            echo '<option value="0" >Choose an option</option>';
                            foreach($catdata as $key=>$value){
                                echo '<option value="'.$key.'" >'.$value['name'].'</option>'; 
                            }
                        }
                        ?>
                                        
                                    </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                            <label for="category_concern_sub">SubCategory</label>
                                <select name="category_concern_sub" class="form-control" id="category_concern_sub">
                                 <?php
                        if(!empty($catdata)){
                            //pr($catdata);die();
                            echo '<option value="0" >Choose an option</option>';
                            foreach($data as $key=>$value){
                                echo '<option value="'.$key.'" >'.$value['name'].'</option>'; 
                            }
                        }
                        ?> 
                                    </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="severity">Severity</label>
                                    <?php $severity=array('High'=>'High','Medium'=>'Medium','Low'=>'Low'); 
echo $this->Form->select('severity',$severity,['class'=>'form-control','id'=>'severity','label' => 'Severity','empty'=>'Choose an option']); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 text-right">
                            <div class="form-group">
   <?= $this->Form->button('Submit',['escape' => false,'type' => 'submit','class'=>'btn btn-dark']) ?>
                           
                            </div>
                        </div>
                    </div>
                  <?= $this->Form->end() ?>
            </div>
          </div>
        </div>
    </div>
</div>
<script type="text/javascript">
function getval()
{
var sel=$('#category_concern').val();
$.ajax({
    url:'<?= $url_sub_category; ?>',
    method:'POST',
    data:{'sel':sel},
    success:function(data){
        var d=$.parseJSON(data);
        /*var html='';
        $(d).each(function(i,u){
            $(u).each(function(j,k){
                console.log(j);
                console.log(k);
                html+='<option value="'+j+'" >'+k+'</option>';
            });
            
        });*/
        $('#category_concern_sub').html(d.html);
    }
});
}
</script>

