<?php

class Utility extends Public_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model(array('users/users_model', 'sitepanel/service_model'));
  }

  /* INIT API - URL */

  public function get_init_url() {
    $data['CDN_PATH'] = "http://www.unyqorn.com";
    $data['is_active'] = true;
    $data['success'] = true;
    echo my_json_encode($data);
  }
  
  //get App version and update window.
  public function initApi() {
    $appV = $this->db->query("SELECT app_version_ios, app_version_android from wl_admin where admin_id = '1'")->row_array();
    $data['FORCE_UPDATE'] =false;
    $data['FORCE_UPDATE_CONTENT'] ="We've released a new version of the app.\nTo continue using Unyqorn please upgrade to the latest version.";
    $data['APP_VERSION_IOS'] =$appV['app_version_ios'];
    $data['APP_VERSION_ANDROID'] =$appV['app_version_android'];    
    echo json_encode($data);
  }
  

  public function error_log() {
    header('Content-Type: application/json');
    $postData = array();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $postData = json_decode(file_get_contents("php://input"));
      $postData = (array) $postData;
    }
    if (is_array($postData) && !empty($postData)) {
      date_default_timezone_set("Asia/Kolkata");
      $strQry = "";
      if (array_key_exists("APP_VERSION_CODE", $postData)) {

        $this->db->query("INSERT INTO wl_error_log SET deviceId = '" . $postData['DEVICE_ID'] . "', app_version_code = '" . $postData['APP_VERSION_CODE'] . "', app_version_name = '" . $postData['APP_VERSION_NAME'] . "', android_version = '" . $postData['ANDROID_VERSION'] . "', phone_model = '" . $postData['PHONE_MODEL'] . "', package_name = '" . $postData['PACKAGE_NAME'] . "', stack_trace = '" . $postData['STACK_TRACE'] . "', receive_date = '" . date('Y-m-d H:i:s') . "'");

        $data['message'] = "New Bug Registered!!!";
        $data['success'] = true;
        //}
      } else {
        $data['error'] = "Parameter Missing!!!";
        $data['success'] = false;
      }
    } else {
      $data['error'] = "Parameter Missing!!!";
      $data['success'] = false;
    }
    echo my_json_encode($data);
  }

  public function getServiceName() {

    header('Content-Type: application/json');
    $postData = array();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $postData = json_decode(file_get_contents("php://input"));
      $postData = (array) $postData;
    }
    if (is_array($postData) && !empty($postData)) {
      $serviceType = $postData['service_type'];
      
if($serviceType == 3)
{
  $serviceType =1;
}
      $condtion = "service_type='" . $serviceType . "' ";

      $res_array = $this->db->query("SELECT service_id, service_name, service_amount FROM wl_services WHERE $condtion")->result_array();
      //trace($res_array);
      //echo_sql();
      if (is_array($res_array) && !empty($res_array)) {
        $resArray = array();
        $sl = 0;
        foreach ($res_array as $key => $val) {
          $resArray[$sl]['service_id'] = $val['service_id'];
          $resArray[$sl]['service_name'] = $val['service_name'];
          $resArray[$sl]['service_amount'] = $val['service_amount'];

          $sl++;
        }
        $data['result'] = $resArray;
        $data['success'] = true;
      } else {
        $data['error'] = "No Service found!";
        $data['success'] = false;
      }
    } else {
      $data['error'] = "Parameter Missing!";
      $data['success'] = false;
    }
    echo my_json_encode($data);
  }

  public function getResumeServiceName() {
    header('Content-Type: application/json');
    $postData = array();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $postData = json_decode(file_get_contents("php://input"));
//      trace($postData);
      $postData = (array) $postData;
    }
    if (is_array($postData) && !empty($postData)) {
      $serviceType = $postData['service_type'];
      $resumeType = $postData['resume_type'];
      $duration = $postData['duration']; // if user want a new Resume

      $condtion = "serviceType='" . $serviceType . "' AND resumeType = '" . $resumeType . "'";
      if ($duration)
        $condtion .= " AND duration = '" . $duration . "'"; // if user want a new Resume

      $res_array = $this->db->query("SELECT serviceId, amount FROM wl_edit_resume WHERE $condtion")->result_array();
      //trace($res_array);
      //echo_sql();
      if (is_array($res_array) && !empty($res_array)) {
        $resArray = array();
        $sl = 0;
        foreach ($res_array as $key => $val) {
          $resArray[$sl]['service_id'] = $val['serviceId'];
          $resArray[$sl]['service_amount'] = $val['amount'];
          $sl++;
        }
        $data['result'] = $resArray;
        $data['success'] = true;
      } else {
        $data['error'] = "No Service found!";
        $data['success'] = false;
      }
    } else {
      $data['error'] = "Parameter Missing!";
      $data['success'] = false;
    }
    echo my_json_encode($data);
  }

  public function findYourService() {
    header('Content-Type: application/json');
    $postData = array();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $postData = json_decode(file_get_contents("php://input"));
      $postData = (array) $postData;
    }
    if (is_array($postData) && !empty($postData)) {

      $youAre = $postData['you_are_a'];
      $lookingFor = $postData['looking_for']; // comma seperated
      $duration = $postData['duration'];
      $essayFor = $postData['essay_for'];
      $resumeFor = $postData['resume_for']; // if resume selected

      $userId = $postData['user_id'];

      if ($youAre != "" && $lookingFor != "") {

        $this->db->query("INSERT INTO wl_find_your_service SET you_are_a = '" . $youAre . "', looking_for = '" . $lookingFor . "', duration = '" . $duration . "', essay_for = '" . $essayFor . "', resume_for = '" . $resumeFor . "', customers_id = '" . $userId . "'");

        $data['message'] = "Your enquiry has been posted successfully. We will get back soon!";
        $data['success'] = true;
      } else {
        $data['error'] = "Parameter Missing!";
        $data['success'] = false;
      }
    } else {
      $data['error'] = "Parameter Missing!";
      $data['success'] = false;
    }
    echo my_json_encode($data);
  }

  public function our_connects() {
    header('Content-Type: application/json');
    $postData = array();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $postData = json_decode(file_get_contents("php://input"));
      $postData = (array) $postData;
    }
    if (is_array($postData) && !empty($postData)) {

      $offset = ($postData['offset']) ? $postData['offset'] : 0;
      $limit = ($postData['limit']) ? $postData['limit'] : 10;

      $result = $this->db->query("SELECT name, designation, description, image FROM wl_team WHERE status = '1' LIMIT " . $offset . ", " . $limit)->result_array();

      $data['total_records'] = count_record("wl_team", "status = '1'");
      $data['result'] = $result;
      $data['message'] = "";
      $data['success'] = true;
    } else {
      $data['error'] = "Parameter Missing!";
      $data['success'] = false;
    }
    echo my_json_encode($data);
  }
  
  
  public function tips() {
    header('Content-Type: application/json');
    $postData = array();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $postData = json_decode(file_get_contents("php://input"));
      $postData = (array) $postData;
    }
    if (is_array($postData) && !empty($postData)) {

      $offset = ($postData['offset']) ? $postData['offset'] : 0;
      $limit = ($postData['limit']) ? $postData['limit'] : 10;

      $result = $this->db->query("SELECT post_date, article_title, blog_author, short_desc, article_desc, article_image FROM wl_blog WHERE status = '1' LIMIT " . $offset . ", " . $limit)->result_array();

      $data['total_records'] = count_record("wl_blog", "status = '1'");
      $data['result'] = $result;
      $data['message'] = "";
      $data['success'] = true;
    } else {
      $data['error'] = "Parameter Missing!";
      $data['success'] = false;
    }
    echo my_json_encode($data);
  }
  

  public function my_earning() {
    header('Content-Type: application/json');
    $postData = array();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $postData = json_decode(file_get_contents("php://input"));
      $postData = (array) $postData;
    }
    if (is_array($postData) && !empty($postData)) {

      $offset = ($postData['offset']) ? $postData['offset'] : 0;
      $limit = ($postData['limit']) ? $postData['limit'] : 10;
      $userId = $postData['user_id'];

      $result = $this->db->query("SELECT r.customers_id as user_id, u.email, u.first_name FROM wl_referals as r LEFT JOIN wl_users as u ON r.customers_id = u.customers_id WHERE u.status != '2' AND r.referal_id = '" . $userId . "' LIMIT " . $offset . ", " . $limit)->result_array();

      $data['total_records'] = count_record("wl_referals", "referal_id = '" . $userId . "'");
      $data['result'] = $result;
      $data['message'] = "";
      $data['success'] = true;
    } else {
      $data['error'] = "Parameter Missing!";
      $data['success'] = false;
    }
    echo my_json_encode($data);
  }
public function getDiscount(){
    $result=$this->db->query("select discount_value from wl_admin where admin_id='1'")->row();
    echo $result->discount_value;
}
public function getserviceprice(){
    $result=$this->db->query("SELECT service_amount FROM `wl_services`WHERE `service_id` ='1'")->row();
    
     $result2=$this->db->query("select discount_value from wl_admin where admin_id='1'")->row();
    echo $result->service_amount.",".$result2->discount_value;
}

public function getDocumentHtml() {
    $counter = $this->input->get_post('counter');
    $service_type = $this->input->get_post('service_type');

    $condtion = "service_type='" . $service_type . "' ";
    $var = '';
    

    $res_array = $this->db->query("SELECT service_id, service_name, service_amount FROM wl_services WHERE $condtion AND status = '1'")->result_array();

    if (is_array($res_array) && !empty($res_array)) {

      for ($i = 0; $i < $counter; $i++) {
        $j = $i + 1;
        $fnp = "$(this).find('option:selected').attr('data-amount')";
//        $fn = 'onchange="calculateAmount();"';
        $fn = 'onchange="calculateAmount('.$i.', ' . $fnp . '); calculate();" onclick="calculateAmount('.$i.', ' . $fnp . ');  calculate();"';
      
    
        $var .= '<div class="col-sm-5">
                    <div class="col-selector">
                      <div class="form-group">

                        <input type="text" class="form-control" readonly="" value="file' . $j . '">
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="col-selector">
                      <div class="form-group">

                        <select class="form-control word_limit" required name="service_ids[]" id="wordLimit_' . $i . '" ' . $fn . '>
                          <option value="">--Word Limit--</option>
                          ';
        
        foreach ($res_array as $k => $v) {
            if($k==0 )
            {
                $sel="selected";
            }
            else{
                $sel=" ";
            }
            
          $var .='<option value="' . $v['service_id'] . '" data-amount="' . $v['service_amount'] . '" '.$sel.'>' . $v['service_name'] . '
                  ';
               }
        

        $var .= '</select>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="col-selector">
                      <div class="form-group">
                        <input type="text" name="total_amount[]" id="serviceAmount_' . $i . '" class="form-control" readonly="" value="'.$res_array[0]['service_amount'].'">
                      </div>
                    </div>
                  </div>
                ';
      }

      echo $var;
    }
  }
  
  public function getResumePrice(){
      $resumeType = $this->input->get_post('resume_type');
      $resumeFor = $this->input->get_post('resume_for');
      $resumeDuration = $this->input->get_post('resume_duration');
      
//      $resumeAmount = get_db_field_value("wl_edit_resume", "amount", "WHERE serviceType='".$resumeFor."' AND resumeType = '".$resumeType."' AND duration = '".$resumeDuration."'");
      //echo_sql();
//      echo $resumeAmount;
      $res_array = $this->db->query("SELECT serviceId, amount FROM wl_edit_resume WHERE serviceType='".$resumeFor."' AND resumeType = '".$resumeType."' AND duration = '".$resumeDuration."'")->row_array();
      //trace($res_array);
      //echo_sql();
      if (is_array($res_array) && !empty($res_array)) {
//        $sl=0;
//           foreach ($res_array as $key => $val) {
//          $resArray[$sl]['service_id'] = $val['serviceId'];
//          $resArray[$sl]['service_amount'] = $val['amount'];
//          $sl++;
//       $data['result']=$resArray;
//    }
    
    echo my_json_encode($res_array);
  }
  }
  
  
}

/* End of file apis.php */
/* Location: .application/modules/apis/controllers/apis.php */