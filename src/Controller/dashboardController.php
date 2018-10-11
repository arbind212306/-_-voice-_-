<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
use Cake\Datasource\ConnectionManager;
use Cake\Http\Exception\NotFoundException;
use Cake\Event\Event;

class DashboardController extends AppController { 
    
    public function beforeFilter(Event $event) {
        $this->loadComponent('Flash');
        $this->loadComponent('Summary');

        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->Auth->allow(['login', 'logout']);
        $this->Auth->allow(['getSubcate']);
    }
    
    public function dashboard(){
      $this->loadModel('Hr');
      $year = '';
        if ($this->request->is('post')) {
            $year = $this->request->data['yearpicker'];
        }
        if (trim($year) === 'all') {
            $year = '';
        }
        $session = $this->request->session();
        $sessionData = $session->read();
        $role = $sessionData['Auth']['User']['role'];
      //code for total counting of cases
      $totalCase = $this->Hr->getTotalCases($year);
      $totalHarassment = $this->Hr->getTotalHarassmentCase($year);
      $totalBusinessEthics = $this->Hr->getTotalBusinessEthics($year);
      $toatlDisiplinary = $this->Hr->getTotalDisiplinary($year);
      $countOthers = $this->Hr->countOthers($year);
      //code for getting counting severity category wise
      $highSeverity = $this->Hr->getHighSeverity($year);
      $mediumSeverity = $this->Hr->getMediumSeverity($year);
      $lowSeverity = $this->Hr->getLowSeverity($year);  
      //code to get counting of total case status
      $totalAccepted = $this->Hr->geTotalAccepted($year);
      $totalRejected = $this->Hr->geTotalRejected($year);
      $totalPending = $this->Hr->geTotalPending($year);
      $totalClosed = $this->Hr->geTotalClosed($year);
      //code for getting counting of harasment cases month wise for plotting first graph
      $harass = $this->getharassmentdata($year);
      //code for getting counting of ethic cases month wise for plotting first graph
      $ethic = $this->getEthicData($year);
      //code for getting counting of displinary cases month wise for plotting first graph
      $disp  = $this->getDisplinaryData($year);
      //code for getting counting of other cases month wise for plotting first graph
      $other = $this->getOtherData($year);
      //code for getting harrassment count data of all city
      $harassCity = $this->getHarassDataOfCity($year);
      //code for getting ethic count data of all city
      $ethicCity = $this->getEthicDataOfCity($year);
      //code for getting displinary count data of all city
      $displinaryCity = $this->getDisplinaryDataOfCity($year);
      //code for getting displinary count data of all city
      $otherCity = $this->getOtherDataOfCity($year);
      //code to get all status
      $getSatatus = $this->getStatus();
      //code to get count of all harass data status wise
      $getHarassStatus = $this->getHarasssatatus($year);
      //code to get count of all ethic data status wise
      $getEthicSattus = $this->getEthicStatus($year);
      //code to get count of all displinary data status wise
      $getDisplinarySattus = $this->getDisplinaryStatus($year);
      //code to get count of all other data status wise
      $getOtherSattus = $this->getOtherStatus($year);
      //code to set the counting values of all cases, severity, case status etc.
      $this->set(compact('totalCase','totalHarassment','totalBusinessEthics','toatlDisiplinary',
                         'totalAccepted','totalRejected','totalPending','totalClosed',
                         'highSeverity','mediumSeverity','lowSeverity','countOthers'));
      //code to set the value for first graph
      $this->set(compact('harass','ethic','disp','other','year'));
      //code to set the value for fifth garph i.e., category vs location
      $this->set(compact('harassCity','ethicCity','displinaryCity','otherCity'));
      //code to set the value for last graph i.e., status vs complaint
      $this->set(compact('getSatatus','getHarassStatus','getEthicSattus','getDisplinarySattus','getOtherSattus'));
      
    }
    
    //method for getting counting of harasment month wise for first graph
    public function getharassmentdata($year=''){
//        $this->autoRender = false;
        $getJanuaryHarasmentCase = $this->Hr->getTotalMonthCase($year, $month = '01', $case_type = '1');
        $getFebruaryHarasmentCase = $this->Hr->getTotalMonthCase($year, $month = '02', $case_type = '1');
        $getMarchHarasmentCase = $this->Hr->getTotalMonthCase($year, $month = '03', $case_type = '1');
        $getAprilHarasmentCase = $this->Hr->getTotalMonthCase($year, $month = '04', $case_type = '1');
        $getMayHarasmentCase = $this->Hr->getTotalMonthCase($year, $month = '05', $case_type = '1');
        $getJuneHarasmentCase = $this->Hr->getTotalMonthCase($year, $month = '06', $case_type = '1');
        $getJulyHarasmentCase = $this->Hr->getTotalMonthCase($year, $month = '07', $case_type = '1');
        $getAugustHarasmentCase = $this->Hr->getTotalMonthCase($year, $month = '08', $case_type = '1');
        $getSeptemberHarasmentCase = $this->Hr->getTotalMonthCase($year, $month = '09', $case_type = '1');
        $getOctuberHarasmentCase = $this->Hr->getTotalMonthCase($year, $month = '10', $case_type = '1');
        $getNovemberHarasmentCase = $this->Hr->getTotalMonthCase($year, $month = '11', $case_type = '1');
        $getDecemberHarasmentCase = $this->Hr->getTotalMonthCase($year, $month = '12', $case_type = '1');
        $arr = [];
        $arr[] = ['value' => $getJanuaryHarasmentCase];
        $arr[] = ['value' => $getFebruaryHarasmentCase];
        $arr[] = ['value' => $getMarchHarasmentCase];
        $arr[] = ['value' => $getAprilHarasmentCase];
        $arr[] = ['value' => $getMayHarasmentCase];
        $arr[] = ['value' => $getJuneHarasmentCase];
        $arr[] = ['value' => $getJulyHarasmentCase];
        $arr[] = ['value' => $getAugustHarasmentCase];
        $arr[] = ['value' => $getSeptemberHarasmentCase];
        $arr[] = ['value' => $getOctuberHarasmentCase];
        $arr[] = ['value' => $getNovemberHarasmentCase];
        $arr[] = ['value' => $getDecemberHarasmentCase];
        if(!empty($arr)){
            $arr = json_encode($arr);
        }
        return $arr;
    }
    
    public function getEthicData($year=''){
//        $this->autoRender = false;
        $getJanuaryEthicsCase = $this->Hr->getTotalMonthCase($year, $month = '01', $case_type = '4');
        $getFebruaryEthicsCase = $this->Hr->getTotalMonthCase($year, $month = '02', $case_type = '4');
        $getMarchEthicsCase = $this->Hr->getTotalMonthCase($year, $month = '03', $case_type = '4');
        $getAprilEthicsCase = $this->Hr->getTotalMonthCase($year, $month = '04', $case_type = '4');
        $getMayEthicsCase = $this->Hr->getTotalMonthCase($year, $month = '05', $case_type = '4');
        $getJuneEthicsCase = $this->Hr->getTotalMonthCase($year, $month = '06', $case_type = '4');
        $getJulyEthicsCase = $this->Hr->getTotalMonthCase($year, $month = '07', $case_type = '4');
        $getAugustEthicsCase = $this->Hr->getTotalMonthCase($year, $month = '08', $case_type = '4');
        $getSeptemberEthicsCase = $this->Hr->getTotalMonthCase($year, $month = '09', $case_type = '4');
        $getOctuberEthicsCase = $this->Hr->getTotalMonthCase($year, $month = '10', $case_type = '4');
        $getNovemberEthicsCase = $this->Hr->getTotalMonthCase($year, $month = '11', $case_type = '4');
        $getDecemberEthicsCase = $this->Hr->getTotalMonthCase($year, $month = '12', $case_type = '4');
        $arr = [];
        $arr[] = ['value' => $getJanuaryEthicsCase];
        $arr[] = ['value' => $getFebruaryEthicsCase];
        $arr[] = ['value' => $getMarchEthicsCase];
        $arr[] = ['value' => $getAprilEthicsCase];
        $arr[] = ['value' => $getMayEthicsCase];
        $arr[] = ['value' => $getJuneEthicsCase];
        $arr[] = ['value' => $getJulyEthicsCase];
        $arr[] = ['value' => $getAugustEthicsCase];
        $arr[] = ['value' => $getSeptemberEthicsCase];
        $arr[] = ['value' => $getOctuberEthicsCase];
        $arr[] = ['value' => $getNovemberEthicsCase];
        $arr[] = ['value' => $getDecemberEthicsCase];
        if(!empty($arr)){
            $arr = json_encode($arr);
        }
        return $arr;
    }
    
    public function getDisplinaryData($year=''){
//        $this->autoRender = false;
        $getJanuaryDisciplinaryCase = $this->Hr->getTotalMonthCase($year, $month = '01', $case_type = '7');
        $getFebruaryDisciplinaryCase = $this->Hr->getTotalMonthCase($year, $month = '02', $case_type = '7');
        $getMarchDisciplinaryCase = $this->Hr->getTotalMonthCase($year, $month = '03', $case_type = '7');
        $getAprilDisciplinaryCase = $this->Hr->getTotalMonthCase($year, $month = '04', $case_type = '7');
        $getMayDisciplinaryCase = $this->Hr->getTotalMonthCase($year, $month = '05', $case_type = '7');
        $getJuneDisciplinaryCase = $this->Hr->getTotalMonthCase($year, $month = '06', $case_type = '7');
        $getJulyDisciplinaryCase = $this->Hr->getTotalMonthCase($year, $month = '07', $case_type = '7');
        $getAugustDisciplinaryCase = $this->Hr->getTotalMonthCase($year, $month = '08', $case_type = '7');
        $getSeptemberDisciplinaryCase = $this->Hr->getTotalMonthCase($year, $month = '09', $case_type = '7');
        $getOctuberDisciplinaryCase = $this->Hr->getTotalMonthCase($year, $month = '10', $case_type = '7');
        $getNovemberDisciplinaryCase = $this->Hr->getTotalMonthCase($year, $month = '11', $case_type = '7');
        $getDecemberDisciplinaryCase = $this->Hr->getTotalMonthCase($year, $month = '12', $case_type = '7');
        $arr = [];
        $arr[] = ['value' => $getJanuaryDisciplinaryCase];
        $arr[] = ['value' => $getFebruaryDisciplinaryCase];
        $arr[] = ['value' => $getMarchDisciplinaryCase];
        $arr[] = ['value' => $getAprilDisciplinaryCase];
        $arr[] = ['value' => $getMayDisciplinaryCase];
        $arr[] = ['value' => $getJuneDisciplinaryCase];
        $arr[] = ['value' => $getJulyDisciplinaryCase];
        $arr[] = ['value' => $getAugustDisciplinaryCase];
        $arr[] = ['value' => $getSeptemberDisciplinaryCase];
        $arr[] = ['value' => $getOctuberDisciplinaryCase];
        $arr[] = ['value' => $getNovemberDisciplinaryCase];
        $arr[] = ['value' => $getDecemberDisciplinaryCase];
        if(!empty($arr)){
            $arr = json_encode($arr);
        }
        return $arr;
    }
    
    public function getOtherData($year=''){
//        $this->autoRender = false;
        $getOtherJanuaryCase = $this->Hr->getTotalMonthCase($year, $month = '1', $case_type = '20');
        $getOtherFebruaryCase = $this->Hr->getTotalMonthCase($year, $month = '2', $case_type = '20');
        $getOtherMarchCase = $this->Hr->getTotalMonthCase($year, $month = '3', $case_type = '20');
        $getOtherAprilCase = $this->Hr->getTotalMonthCase($year, $month = '4', $case_type = '20');
        $getOtherMayCase = $this->Hr->getTotalMonthCase($year, $month = '5', $case_type = '20');
        $getOtherJuneCase = $this->Hr->getTotalMonthCase($year, $month = '6', $case_type = '20');
        $getOtherJulyCase = $this->Hr->getTotalMonthCase($year, $month = '7', $case_type = '20');
        $getOtherAugustCase = $this->Hr->getTotalMonthCase($year, $month = '8', $case_type = '20');
        $getOtherSeptemberCase = $this->Hr->getTotalMonthCase($year, $month = '9', $case_type = '20');
        $getOtherOctuberCase = $this->Hr->getTotalMonthCase($year, $month = '10', $case_type = '20');
        $getOtherNovemberCase = $this->Hr->getTotalMonthCase($year, $month = '11', $case_type = '20');
        $getOtherDecemberCase = $this->Hr->getTotalMonthCase($year, $month = '12', $case_type = '20');
        $arr = [];
        $arr[] = ['value' => $getOtherJanuaryCase];
        $arr[] = ['value' => $getOtherFebruaryCase];
        $arr[] = ['value' => $getOtherMarchCase];
        $arr[] = ['value' => $getOtherAprilCase];
        $arr[] = ['value' => $getOtherMayCase];
        $arr[] = ['value' => $getOtherJuneCase];
        $arr[] = ['value' => $getOtherJulyCase];
        $arr[] = ['value' => $getOtherAugustCase];
        $arr[] = ['value' => $getOtherSeptemberCase];
        $arr[] = ['value' => $getOtherOctuberCase];
        $arr[] = ['value' => $getOtherNovemberCase];
        $arr[] = ['value' => $getOtherDecemberCase];
        if(!empty($arr)){
            $arr = json_encode($arr);
        }
        return $arr;
    }
    
        
    
    public function getHarassDataOfCity($year=''){
        $harassGurgaon = $this->Hr->countCaseBasedOnLocation($year, $category = '1', $workLocation = 'Gurgaon');
        $harassThane = $this->Hr->countCaseBasedOnLocation($year, $category = '1', $workLocation = 'Thane');
        $harassChennai = $this->Hr->countCaseBasedOnLocation($year, $category = '1', $workLocation = 'Chennai');
        $harassUSA = $this->Hr->countCaseBasedOnLocation($year, $category = '1', $workLocation = 'USA');
        $arr[] = ['value' => $harassGurgaon];
        $arr[] = ['value' => $harassThane];
        $arr[] = ['value' => $harassChennai];
        $arr[] = ['value' => $harassUSA];
        $arr = json_encode($arr);
        return $arr;
    }
    
    public function getEthicDataOfCity($year=''){
        $ethicGurgaon = $this->Hr->countCaseBasedOnLocation($year, $category = '4', $workLocation = 'Gurgaon');
        $ethicThane = $this->Hr->countCaseBasedOnLocation($year, $category = '4', $workLocation = 'Thane');
        $ethicChennai = $this->Hr->countCaseBasedOnLocation($year, $category = '4', $workLocation = 'Chennai');
        $ethicUSA = $this->Hr->countCaseBasedOnLocation($year, $category = '4', $workLocation = 'USA');
        $arr[] = ['value' => $ethicGurgaon];
        $arr[] = ['value' => $ethicThane];
        $arr[] = ['value' => $ethicChennai];
        $arr[] = ['value' => $ethicUSA];
        $arr = json_encode($arr);
        return $arr;
    }
    
    public function getDisplinaryDataOfCity($year=''){
        $displinaryGurgaon = $this->Hr->countCaseBasedOnLocation($year, $category = '7', $workLocation = 'Gurgaon');
        $displinaryThane = $this->Hr->countCaseBasedOnLocation($year, $category = '7', $workLocation = 'Thane');
        $displinaryChennai = $this->Hr->countCaseBasedOnLocation($year, $category = '7', $workLocation = 'Chennai');
        $displinaryUSA = $this->Hr->countCaseBasedOnLocation($year, $category = '7', $workLocation = 'USA');
        $arr[] = ['value' => $displinaryGurgaon];
        $arr[] = ['value' => $displinaryThane];
        $arr[] = ['value' => $displinaryChennai];
        $arr[] = ['value' => $displinaryUSA];
        $arr = json_encode($arr);
        return $arr;
    }
    
    public function getOtherDataOfCity($year=''){
        $otherGurgaon = $this->Hr->countCaseBasedOnLocation($year, $category = '20', $workLocation = 'Gurgaon');
        $otherThane = $this->Hr->countCaseBasedOnLocation($year, $category = '20', $workLocation = 'Thane');
        $otherChennai = $this->Hr->countCaseBasedOnLocation($year, $category = '20', $workLocation = 'Chennai');
        $otherUSA = $this->Hr->countCaseBasedOnLocation($year, $category = '20', $workLocation = 'USA');  
        $arr[] = ['value' => $otherGurgaon];
        $arr[] = ['value' => $otherThane];
        $arr[] = ['value' => $otherChennai];
        $arr[] = ['value' => $otherUSA];
        $arr = json_encode($arr);
        return $arr;
    }
    
    public function getStatus(){
        $cstatus_table = TableRegistry::get("cstatus");
        $cquery = $cstatus_table->find('all')->where(array('status' => '1'))->toArray();
        $filed = $cquery[0]['name'];                 $caseaccepted = $cquery[1]['name'];
        $caserejected = $cquery[2]['name'];          $notApplicable = $cquery[3]['name'];
        $panelAssigned = $cquery[4]['name'];         $inqLettIssued = $cquery[5]['name'];
        $respondentpending = $cquery[6]['name'];     $respondentreceived = $cquery[7]['name'];
        $investigationProgress = $cquery[8]['name']; $investigationClosed = $cquery[9]['name'];
        $inqReportProgress = $cquery[10]['name'];    $inqReportClosed = $cquery[11]['name'];
        $implRecomProgress = $cquery[12]['name'];    $implRecomClosed = $cquery[13]['name'];
        $Closed = $cquery[14]['name'];               $actionClosed = $cquery[15]['name'];
        
        $arr[] = ['label' => $filed];
        $arr[] = ['label' => $caseaccepted];
        $arr[] = ['label' => $caserejected];
        $arr[] = ['label' => $notApplicable];
        $arr[] = ['label' => $panelAssigned];
        $arr[] = ['label' => $inqLettIssued];
        $arr[] = ['label' => $respondentpending];
        $arr[] = ['label' => $respondentreceived];
        $arr[] = ['label' => $investigationProgress];
        $arr[] = ['label' => $investigationClosed];
        $arr[] = ['label' => $inqReportProgress];
        $arr[] = ['label' => $inqReportClosed];
        $arr[] = ['label' => $implRecomProgress];
        $arr[] = ['label' => $implRecomClosed];
        $arr[] = ['label' => $Closed];
        $arr[] = ['label' => $actionClosed];
        if(!empty($arr)){
            $arr = json_encode($arr);
        }
        return $arr;
    }
    
    public function getHarasssatatus($year=''){
        $getHarassFiledCase = $this->Hr->geTotalStatusCategory($year, $status = 1, $category = 1);
        $getHarassAcceptedCase = $this->Hr->geTotalStatusCategory($year, $status = 2, $category = 1);
        $getHarassNotApplicableCase = $this->Hr->geTotalStatusCategory($year, $status = 4, $category = 1);
        $getHarassPanelAssignedCase = $this->Hr->geTotalStatusCategory($year, $status = 5, $category = 1);
        $getHarassInqLettIssuedCase = $this->Hr->geTotalStatusCategory($year, $status = 6, $category = 1);
        $getHarassRRPendingCase = $this->Hr->geTotalStatusCategory($year, $status = 7, $category = 1);
        $getHarassRRReceivedCase = $this->Hr->geTotalStatusCategory($year, $status = 8, $category = 1);
        $getHarassIIProgressCase = $this->Hr->geTotalStatusCategory($year, $status = 9, $category = 1);
        $getHarassICloseCase = $this->Hr->geTotalStatusCategory($year, $status = 10, $category = 1);
        $getHarassIRIProgressCase = $this->Hr->geTotalStatusCategory($year, $status = 11, $category = 1);
        $getHarassIRClosedCase = $this->Hr->geTotalStatusCategory($year, $status = 12, $category = 1);
        $getHarassIORIProgressCase = $this->Hr->geTotalStatusCategory($year, $status = 13, $category = 1);
        $getHarassIORIClosedCase = $this->Hr->geTotalStatusCategory($year, $status = 14, $category = 1);
        $getHarassClosedCase = $this->Hr->geTotalStatusCategory($year, $status = 15, $category = 1);
        $getHarassRejectedCase = $this->Hr->geTotalStatusCategory($year, $status = 16, $category = 1);
        $getActionClosedCase = $this->Hr->geTotalStatusCategory($year, $status = 17, $category = 1);
        $arr[] = ['value' => $getHarassFiledCase];
        $arr[] = ['value' => $getHarassAcceptedCase];
        $arr[] = ['value' => $getHarassNotApplicableCase];
        $arr[] = ['value' => $getHarassPanelAssignedCase];
        $arr[] = ['value' => $getHarassInqLettIssuedCase];
        $arr[] = ['value' => $getHarassRRPendingCase];
        $arr[] = ['value' => $getHarassRRReceivedCase];
        $arr[] = ['value' => $getHarassIIProgressCase];
        $arr[] = ['value' => $getHarassICloseCase];
        $arr[] = ['value' => $getHarassIRIProgressCase];
        $arr[] = ['value' => $getHarassIRClosedCase];
        $arr[] = ['value' => $getHarassIORIProgressCase];
        $arr[] = ['value' => $getHarassIORIClosedCase];
        $arr[] = ['value' => $getHarassClosedCase];
        $arr[] = ['value' => $getHarassRejectedCase];
        $arr[] = ['value' => $getActionClosedCase];
        $arr = json_encode($arr);
        return $arr;
    }
    
    public function getEthicStatus($year=''){
        $getEthicFiledCase = $this->Hr->geTotalStatusCategory($year, $status = 1, $category = 4);
        $getEthicAcceptedCase = $this->Hr->geTotalStatusCategory($year, $status = 2, $category = 4);
        $getEthicNotApplicableCase = $this->Hr->geTotalStatusCategory($year, $status = 4, $category = 4);
        $getEthicPanelAssignedCase = $this->Hr->geTotalStatusCategory($year, $status = 5, $category = 4);
        $getEthicInqLettIssuedCase = $this->Hr->geTotalStatusCategory($year, $status = 6, $category = 4);
        $getEthicRRPendingCase = $this->Hr->geTotalStatusCategory($year, $status = 7, $category = 4);
        $getEthicRRReceivedCase = $this->Hr->geTotalStatusCategory($year, $status = 8, $category = 4);
        $getEthicIIProgressCase = $this->Hr->geTotalStatusCategory($year, $status = 9, $category = 4);
        $getEthicICloseCase = $this->Hr->geTotalStatusCategory($year, $status = 10, $category = 4);
        $getEthicIRIProgressCase = $this->Hr->geTotalStatusCategory($year, $status = 11, $category = 4);
        $getEthicIRClosedCase = $this->Hr->geTotalStatusCategory($year, $status = 12, $category = 4);
        $getEthicIORIProgressCase = $this->Hr->geTotalStatusCategory($year, $status = 13, $category = 4);
        $getEthicIORIClosedCase = $this->Hr->geTotalStatusCategory($year, $status = 14, $category = 4);
        $getEthicClosedCase = $this->Hr->geTotalStatusCategory($year, $status = 15, $category = 4);
        $getEthicRejectedCase = $this->Hr->geTotalStatusCategory($year, $status = 16, $category = 4);
        $getEthicActionClosedCase = $this->Hr->geTotalStatusCategory($year, $status = 17, $category = 4);
        $arr[] = ['value' => $getEthicFiledCase];
        $arr[] = ['value' => $getEthicAcceptedCase];
        $arr[] = ['value' => $getEthicNotApplicableCase];
        $arr[] = ['value' => $getEthicPanelAssignedCase];
        $arr[] = ['value' => $getEthicInqLettIssuedCase];
        $arr[] = ['value' => $getEthicRRPendingCase];
        $arr[] = ['value' => $getEthicRRReceivedCase];
        $arr[] = ['value' => $getEthicIIProgressCase];
        $arr[] = ['value' => $getEthicICloseCase];
        $arr[] = ['value' => $getEthicIRIProgressCase];
        $arr[] = ['value' => $getEthicIRClosedCase];
        $arr[] = ['value' => $getEthicIORIProgressCase];
        $arr[] = ['value' => $getEthicIORIClosedCase];
        $arr[] = ['value' => $getEthicClosedCase];
        $arr[] = ['value' => $getEthicRejectedCase];
        $arr[] = ['value' => $getEthicActionClosedCase];
        $arr = json_encode($arr);
        return $arr;
    }
    
    public function getDisplinaryStatus($year=''){
        $getDiscplinaryFiledCase = $this->Hr->geTotalStatusCategory($year, $status = 1, $category = 7);
        $getDiscplinaryAcceptedCase = $this->Hr->geTotalStatusCategory($year, $status = 2, $category = 7);
        $getDiscplinaryNotApplicableCase = $this->Hr->geTotalStatusCategory($year, $status = 4, $category = 7);
        $getDiscplinaryPanelAssignedCase = $this->Hr->geTotalStatusCategory($year, $status = 5, $category = 7);
        $getDiscplinaryInqLettIssuedCase = $this->Hr->geTotalStatusCategory($year, $status = 6, $category = 7);
        $getDiscplinaryRRPendingCase = $this->Hr->geTotalStatusCategory($year, $status = 7, $category = 7);
        $getDiscplinaryRRReceivedCase = $this->Hr->geTotalStatusCategory($year, $status = 8, $category = 7);
        $getDiscplinaryIIProgressCase = $this->Hr->geTotalStatusCategory($year, $status = 9, $category = 7);
        $getDiscplinaryICloseCase = $this->Hr->geTotalStatusCategory($year, $status = 10, $category = 7);
        $getDiscplinaryIRIProgressCase = $this->Hr->geTotalStatusCategory($year, $status = 11, $category = 7);
        $getDiscplinaryIRClosedCase = $this->Hr->geTotalStatusCategory($year, $status = 12, $category = 7);
        $getDiscplinaryIORIProgressCase = $this->Hr->geTotalStatusCategory($year, $status = 13, $category = 7);
        $getDiscplinaryIORIClosedCase = $this->Hr->geTotalStatusCategory($year, $status = 14, $category = 7);
        $getDiscplinaryClosedCase = $this->Hr->geTotalStatusCategory($year, $status = 15, $category = 7);
        $getDiscplinaryRejectedCase = $this->Hr->geTotalStatusCategory($year, $status = 16, $category = 7);
        $getEthicActionClosedCase = $this->Hr->geTotalStatusCategory($year, $status = 17, $category = 4);
        $arr[] = ['value' => $getDiscplinaryFiledCase];
        $arr[] = ['value' => $getDiscplinaryAcceptedCase];
        $arr[] = ['value' => $getDiscplinaryNotApplicableCase];
        $arr[] = ['value' => $getDiscplinaryPanelAssignedCase];
        $arr[] = ['value' => $getDiscplinaryInqLettIssuedCase];
        $arr[] = ['value' => $getDiscplinaryRRPendingCase];
        $arr[] = ['value' => $getDiscplinaryRRReceivedCase];
        $arr[] = ['value' => $getDiscplinaryIIProgressCase];
        $arr[] = ['value' => $getDiscplinaryICloseCase];
        $arr[] = ['value' => $getDiscplinaryIRIProgressCase];
        $arr[] = ['value' => $getDiscplinaryIRClosedCase];
        $arr[] = ['value' => $getDiscplinaryIORIProgressCase];
        $arr[] = ['value' => $getDiscplinaryIORIClosedCase];
        $arr[] = ['value' => $getDiscplinaryClosedCase];
        $arr[] = ['value' => $getDiscplinaryRejectedCase];
        $arr[] = ['value' => $getEthicActionClosedCase];
        $arr = json_encode($arr);
        return $arr;
    }
    
    public function getOtherStatus($year=''){
        $getOtherFiledCase = $this->Hr->geTotalStatusCategory($year, $status = 1, $category = 20);
        $getOtherAcceptedCase = $this->Hr->geTotalStatusCategory($year, $status = 2, $category = 20);
        $getOtherNotApplicableCase = $this->Hr->geTotalStatusCategory($year, $status = 4, $category = 20);
        $getOtherPanelAssignedCase = $this->Hr->geTotalStatusCategory($year, $status = 5, $category = 20);
        $getOtherInqLettIssuedCase = $this->Hr->geTotalStatusCategory($year, $status = 6, $category = 20);
        $getOtherRRPendingCase = $this->Hr->geTotalStatusCategory($year, $status = 7, $category = 20);
        $getOtherRRReceivedCase = $this->Hr->geTotalStatusCategory($year, $status = 8, $category = 20);
        $getOtherIIProgressCase = $this->Hr->geTotalStatusCategory($year, $status = 9, $category = 20);
        $getOtherCloseCase = $this->Hr->geTotalStatusCategory($year, $status = 10, $category = 20);
        $getOtherIRIProgressCase = $this->Hr->geTotalStatusCategory($year, $status = 11, $category = 20);
        $getOtherIRClosedCase = $this->Hr->geTotalStatusCategory($year, $status = 12, $category = 20);
        $getOtherIORIProgressCase = $this->Hr->geTotalStatusCategory($year, $status = 13, $category = 20);
        $getOtherIORIClosedCase = $this->Hr->geTotalStatusCategory($year, $status = 14, $category = 20);
        $getOtherClosedCase = $this->Hr->geTotalStatusCategory($year, $status = 15, $category = 20); 
        $getOtherRejectedCase = $this->Hr->geTotalStatusCategory($year, $status = 16, $category = 20);
        $getOtherActionClosedCase = $this->Hr->geTotalStatusCategory($year, $status = 17, $category = 4);
        $arr[] = ['value' => $getOtherFiledCase];
        $arr[] = ['value' => $getOtherAcceptedCase];
        $arr[] = ['value' => $getOtherNotApplicableCase];
        $arr[] = ['value' => $getOtherPanelAssignedCase];
        $arr[] = ['value' => $getOtherInqLettIssuedCase];
        $arr[] = ['value' => $getOtherRRPendingCase];
        $arr[] = ['value' => $getOtherRRReceivedCase];
        $arr[] = ['value' => $getOtherIIProgressCase];
        $arr[] = ['value' => $getOtherCloseCase];
        $arr[] = ['value' => $getOtherIRIProgressCase];
        $arr[] = ['value' => $getOtherIRClosedCase];
        $arr[] = ['value' => $getOtherIORIProgressCase];
        $arr[] = ['value' => $getOtherIORIClosedCase];
        $arr[] = ['value' => $getOtherClosedCase];
        $arr[] = ['value' => $getOtherRejectedCase];
        $arr[] = ['value' => $getOtherActionClosedCase];
        $arr = json_encode($arr);
        return $arr;
    }
}