<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
/**
 * The global CI helpers
 */
if (!function_exists('CI')) {
    function CI()
    {
        if (!function_exists('get_instance')) {
            return false;
        }
        $CI = &get_instance();
        return $CI;
    }
}
if (!function_exists('getDateFormat')) {
    function getDateFormat($date, $format, $seperator1 = ",")
    {
        switch ($format) {
            case 1: // (Ymd)->(dmY) 06 Dec, 2010
                $arr_date = explode($seperator1, $date);
                $arr_date = strtotime($arr_date[0]);
                $ret_date = date("d M" . $seperator1 . " Y", $arr_date);
                break;
            case 2: // (Ymd)->(dmY) 06 December, 2010
                $arr_date = explode($seperator1, $date);
                $arr_date = strtotime($arr_date[0]);
                $ret_date = date("d F" . $seperator1 . " Y", $arr_date);
                break;
            case 3: // (Ymd)->(dmY) Mon Dec 06, 2010
                $arr_date = explode($seperator1, $date);
                $arr_date = strtotime($arr_date[0]);
                $ret_date = date("D M d" . $seperator1 . " Y", $arr_date);
                break;
            case 4: // (Ymd)->(dmY) Monday December 06, 2010
                $arr_date = explode($seperator1, $date);
                $arr_date = strtotime($arr_date[0]);
                $ret_date = date("l F d" . $seperator1 . " Y", $arr_date);
                break;
            case 5: // (Ymd)->(dmY) Monday December 06, 2010, 03:04:00
                $arr_time1 = explode(" ", $date);
                $arr_date = strtotime($date);
                $ret_date = date("l F d" . $seperator1 . " Y" . $seperator1 . " h:i:s", $arr_date);
                break;
            case 6: // (Ymd)->(dmY) Monday December 06, 2010, 15:03:PM
                $arr_time1 = explode(" ", $date);
                $arr_date = strtotime($date);
                $ret_date = date("l F d" . $seperator1 . " Y" . $seperator1 . " H:i:A", $arr_date);
                break;
            case 7: // (Ymd)->(dmY) Monday December 06, 2010, 15:03:PM
                $arr_time1 = explode(" ", $date);
                $arr_date = strtotime($date);
                $ret_date = date("d M" . $seperator1 . " Y" . $seperator1 . " H:i:A", $arr_date);
                break;
            case 8: // (Ymd)->(dmY) Monday December 06, 2010, 03:04:00
                $arr_time1 = explode(" ", $date);
                $arr_date = strtotime($date);
                $ret_date = date("d M" . $seperator1 . " Y" . $seperator1 . " h:i", $arr_date);
                break;
            case 9: // (Ymd)->(dmY) Monday December 06, 2010
                $arr_date = explode($seperator1, $date);
                $arr_date = strtotime($arr_date[0]);
                $ret_date = date("M d" . $seperator1 . " Y", $arr_date);
                break;
            case 10: // (Ymd)->(dmY) Monday December 06, 2010
                $arr_date = explode($seperator1, $date);
                $arr_date = strtotime($arr_date[0]);
                $ret_date = date("M d" . $seperator1 . " Y [l]", $arr_date);
                break;
            case 11: // (Ymd)->(dmY) Monday December 06, 2010
                $arr_date = explode($seperator1, $date);
                $arr_date = strtotime($arr_date[0]);
                $ret_date = date("d-M-Y", $arr_date);
                break;
        }
        return $ret_date;
    }
}
if (!function_exists('humanTiming')) {
    function humanTiming($time)
    {
        $CI = CI();
        $p = "";
        $currtent_time = strtotime($CI->config->item('date_time_format'));
        $diff = (int) abs($currtent_time - $time);
        $tokens = array(
            31536000 => 'year',
            2592000 => 'month',
            604800 => 'week',
            86400 => 'day',
            3600 => 'hour',
            60 => 'minute',
            1 => 'second',
        );
        foreach ($tokens as $unit => $text) {
            if ($diff < $unit) {
                continue;
            }
            $numberOfUnits = round($diff / $unit);
            return $p = $numberOfUnits . ' ' . $text . (($numberOfUnits > 1) ? 's' : '');
        }
        return ($p == '' ? '1 seconds' : $p);
    }
}
/* * **********************************************************
1.Convert Nested Array to Single Array
2.If $key is not empty then key will be preserved but
value will be overwrite if occur more than once
 * ********************************************************** */
if (!function_exists('array_flatten')) {
    function array_flatten($array, $return, $key = '')
    {
        if (is_array($array)) {
            foreach ($array as $ky => $val) {
                $key = ($key !== '' ? $ky : '');
                $return = array_flatten($val, $return, $key);
            }
        } else {
            if ($key != '') {
                $return[$key] = $array;
            } else {
                $return[] = $array;
            }
        }
        return $return;
    }
}
/*
find one array
$arr1 =  array('0'=>'1','1'=>'2')
$arr2 =  = array('1' =>'Boarding Job','2' =>'Night Job','3'=>'Daily Job');
$result ==> Boarding Job,Night Job
 */
function getArrayValueBykey($arr1, $arr2)
{
    $res = array();
    if (is_array($arr1) && is_array($arr2)) {
        foreach ($arr1 as $key => $val) {
            if ($val != "") {
                $res[] = $arr2[$val];
            }
        }
    }
    return $res;
}
if (!function_exists('getAge')) {
    function getAge($dob)
    {
        $age = 31536000; //days secon 86400X365
        $birth = strtotime($dob); // Start as time
        $current = strtotime(date('Y')); // End as time
        if ($current > $birth) {
            $finalAge = round(($current - $birth) / $age) + 1;
        }
        return $finalAge;
    }
}
//$in_string = " hi  this dkmphp  net india  wenlink india  development fun company php delhi";
//$spam_word_arr = array('php','net','fun');
if (!function_exists('check_spam_words')) {
    function check_spam_words($spam_word_arr, $in_string)
    {
        $is_spam_found = false;
        if (is_array($spam_word_arr) && $in_string != "") {
            foreach ($spam_word_arr as $val) {
                if (preg_match("/\b$val\b/i", $in_string)) {
                    $is_spam_found = true;
                    break;
                }
            }
        }
        return $is_spam_found;
    }
}
if (!function_exists('file_ext')) {
    function file_ext($file)
    {
        $file_ext = strtolower(strrchr($file, '.'));
        $file_ext = substr($file_ext, 1);
        return $file_ext;
    }
}
if (!function_exists('applyFilter')) {
    function applyFilter($type, $val)
    {
        switch ($type) {
            case 'NUMERIC_GT_ZERO':
                $val = preg_replace("~^0*~", "", trim($val));
                return preg_match("~^[1-9][0-9]*$~i", $val) ? $val : 0;
                break;
            case 'NUMERIC_WT_ZERO':
                return preg_match("~^[0-9]*$~i", trim($val)) ? $val : -1;
                break;
        }
    }
}
if (!function_exists('removeImage')) {
    function removeImage($cfgs)
    {
        if ($cfgs['source_dir'] != '' && $cfgs['source_file'] != '') {
            $pathImage = UPLOAD_DIR . "/" . $cfgs['source_dir'] . "/" . $cfgs['source_file'];
            if (file_exists($pathImage)) {
                unlink($pathImage);
            }
        }
    }
}
if (!function_exists('trace')) {
    function trace()
    {
        list($callee) = debug_backtrace();
        $arguments = func_get_args();
        $total_arguments = count($arguments);
        echo '<fieldset style="background: #fefefe !important; border:3px red solid; padding:5px; font-family:Courier New,Courier, monospace;font-size:12px">';
        echo '<legend style="background:lightgrey; padding:6px;">' . $callee['file'] . ' @ line: ' . $callee['line'] . '</legend><pre>';
        $i = 0;
        foreach ($arguments as $argument) {
            echo '<br/><strong>Debug #' . (++$i) . ' of ' . $total_arguments . '</strong>: ';
            if ((is_array($argument) || is_object($argument)) && count($argument)) {
                print_r($argument);
            } else {
                var_dump($argument);
            }
        }
        echo '</pre>' . PHP_EOL;
        echo '</fieldset>' . PHP_EOL;
    }
}
if (!function_exists('find_paging_segment')) {
    function find_paging_segment($debug = false)
    {
        $ci = CI();
        $segment_array = $ci->uri->segments;
        if ($debug) {
            trace($ci->uri->segments);
        }
        $key = array_search('pg', $segment_array);
        return $key + 1;
    }
}
if (!function_exists('make_missing_folder')) {
    function make_missing_folder($dir_to_create = "")
    {
        if (empty($dir_to_create)) {
            return;
        }
        $dir_path = UPLOAD_DIR;
        $subdirs = explode("/", $dir_to_create);
        foreach ($subdirs as $dir) {
            if ($dir != "") {
                $dir_path = $dir_path . "/" . $dir;
                if (!file_exists($dir_path)) {
                    //echo $dir_path;
                    mkdir($dir_path, 0755);
                } else {
                    chmod($dir_path, 0755);
                }
            }
        }
    }
}
if (!function_exists('char_limiter')) {
    function char_limiter($str, $len, $suffix = '...')
    {
        $str = strip_tags($str);
        if (strlen($str) > $len) {
            $str = substr($str, 0, $len) . $suffix;
        }
        return $str;
    }
}
if (!function_exists('redirect_top')) {
    function redirect_top($url = '')
    {
        if (!strpos($url, 'ttp://') && !strpos($url, 'ttps://')) {
            $url = base_url() . $url;
        }
        if ($url == ''):
        ?>
      <script>
        top.$.fancybox.close();
        window.top.location.reload();
      </script>
      <?php
else:
        ?>
      <script>
        top.$.fancybox.close();
        window.top.location.href = "<?php echo $url ?>";
      </script>
    <?php
endif;
        exit;
    }
}
if (!function_exists('confirm_js_box')) {
    function confirm_js_box($txt = 'remove')
    {
        $var = "onclick=\"return confirm('Are you sure you want to $txt this record');\" ";
        return $var;
    }
}
if (!function_exists('make_select_box')) {
    function make_select_box($varg = array(), $result = array())
    {
        $ci = CI();
        $var = "";
        $varg['default_text'] = !array_key_exists('default_text', $varg) ? "Select" : $varg['default_text'];
        $varg['id'] = !array_key_exists('id', $varg) ? $varg['name'] : $varg['id'];
        $opt_val_fld = !array_key_exists('opt_val_fld', $varg) ? $varg['opt_val_fld'] : 'key';
        $opt_txt_fld = !array_key_exists('opt_txt_fld', $varg) ? $varg['opt_txt_fld'] : 'value';
        $is_associative_array = !array_key_exists('associative', $varg) ? false : $varg['associative'];
        $var .= '<select name="' . $varg['name'] . '" id="' . $varg['id'] . '" ' . $varg['format'] . '>';
        if ($varg['default_text'] != "") {
            $var .= '<option value="" selected="selected">' . $varg['default_text'] . '</option>';
        }
        foreach ($result as $key => $val) {
            if (is_array($val) && !empty($val)) {
                if (is_array($varg['current_selected_val'])) {
                    $select_element = in_array($val[$opt_val_fld], $varg['current_selected_val']) ? "selected" : "";
                } else {
                    $select_element = ($varg['current_selected_val'] == $val[$opt_val_fld]) ? "selected" : "";
                }
                $var .= '<option value="' . $val[$opt_val_fld] . '" ' . $select_element . '>' . ucfirst($val[$opt_txt_fld]) . '</option>';
            } else {
                $opt_val_fld = $opt_val_fld === 'key' ? $key : $val;
                $opt_txt_fld = $opt_txt_fld === 'key' ? $key : $val;
                if (is_array($varg['current_selected_val'])) {
                    $select_element = in_array($opt_val_fld, $varg['current_selected_val']) ? "selected" : "";
                } else {
                    $select_element = ($varg['current_selected_val'] == $opt_val_fld) ? "selected" : "";
                }
                $var .= '<option value="' . $opt_val_fld . '" ' . $select_element . '>' . $opt_txt_fld . '</option>';
            }
        }
        $var .= '</select>';
        return $var;
    }
}
function CountrySelectBox($varg = array())
{
    $CI = CI();
    $var = "";
    /*   * ********************************************************
    default_text         =>Default Option Text
    name         =>             Dropdn name
    id         =>             Dropdn id (default to name)
    format              =>    all extra attributes for the dpdn(style,class,event...)
    opt_val_fld     =>      DpDn option value field to be fetched from database
    opt_txt_fld     =>      DpDn option text field to be fetched from database
     * ********************************************************* */
    $varg['default_text'] = !array_key_exists('default_text', $varg) ? "Select Country" : $varg['default_text'];
    $varg['id'] = !array_key_exists('id', $varg) ? $varg['name'] : $varg['id'];
    $opt_val_fld = !array_key_exists('opt_val_fld', $varg) ? "name" : $varg['opt_val_fld'];
    $opt_txt_fld = !array_key_exists('opt_txt_fld', $varg) ? "name" : $varg['opt_txt_fld'];
    $var .= '<select name="' . $varg['name'] . '" id="' . $varg['id'] . '" ' . $varg['format'] . '>';
    if ($varg['default_text'] != "") {
        $var .= '<option value="" selected="selected">' . $varg['default_text'] . '</option>';
    }
    $contry_res = $CI->db->query("SELECT * FROM wl_countries WHERE 1")->result_array();
    foreach ($contry_res as $key => $val) {
        if (is_array($varg['current_selected_val'])) {
            $select_element = in_array($val[$opt_val_fld], $varg['current_selected_val']) ? "selected" : "";
        } else {
            $select_element = ($varg['current_selected_val'] == $val[$opt_val_fld]) ? "selected" : "";
        }
        $var .= '<option value="' . $val[$opt_val_fld] . '" ' . $select_element . '>' . ucfirst($val[$opt_txt_fld]) . '</option>';
    }
    $var .= '</select>';
    return $var;
}
if (!function_exists('city_options')) {
    function city_options($data_type = "", $selected_val = "")
    {
        $CI = CI();
        $qryStr = "";
        if ($data_type == "collection") {
            $qryStr = "AND is_data_collection = '1'";
        }
        if ($data_type == "operational") {
            $qryStr = "AND is_data_available = '1'";
        }
        $city_res = $CI->db->query("SELECT * FROM tbl_city WHERE 1 " . $qryStr)->result_array();
        //echo_sql();
        $var = "";
        foreach ($city_res as $key => $val) {
            $sel = ($val['id'] == $selected_val) ? 'selected' : '';
            $var .= '<option value="' . $val['id'] . '" ' . $sel . '>' . ucfirst($val['title']) . '</option>';
        }
        //echo $var; die;
        return $var;
    }
}
if (!function_exists('get_content')) {
    function get_content($tbl = "wl_auto_respond_mails", $pageId)
    {
        $CI = CI();
        if ($pageId > 0) {
            $res = $CI->db->get_where($tbl, array('id' => $pageId))->row();
            if (is_object($res)) {
                return $res;
            }
        }
    }
}
if (!function_exists('get_site_email')) {
    function get_site_email()
    {
        $CI = CI();
        $CI->db->select('*');
        $CI->db->from('tbl_admin');
        $CI->db->where('admin_id', '1');
        $query = $CI->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        }
    }
}
if (!function_exists('category_link')) {
    function category_link($parent)
    {
        $ci = CI();
        $record_count = 0;
        $p = $ci->db->query("SELECT * FROM  wl_categories WHERE parent_id='$parent' and status='1'");
        $rsrow = $p->num_rows();
        if ($rsrow > 0) {
            $link_url = base_url() . "category/index/" . $parent;
        } else {
            $link_url = base_url() . "products/index/" . $parent;
        }
        return $link_url;
    }
}
function timeDiff($firstTime, $lastTime)
{
    $time = $lastTime;
    // convert to unix timestamps
    $firstTime = strtotime($firstTime);
    $lastTime = strtotime($lastTime);
    $rt = "";
    // perform subtraction to get the difference (in seconds) between times
    $timeDiff = $firstTime - $lastTime;
    // return the difference
    if ($timeDiff > 60) {
        if ($timeDiff > 60 && $timeDiff < 1440) {
            $timeDiff = $timeDiff / 60;
            $rt = ceil($timeDiff) . ' minutes ago';
        } elseif ($timeDiff > 1440 && $timeDiff < 86400) {
            $timeDiff = $timeDiff / (60 * 60);
            $rt = 'about ' . ceil($timeDiff) . ' hours ago';
        } elseif ($timeDiff > 86400 && $timeDiff < 172800) {
            $timeDiff = $timeDiff / (60 * 60 * 2);
            $tm = explode(' ', $time);
            $rt = "yesterday"; // at " . $tm[1];
        } else {
            $timeDiff = $timeDiff / (24 * 60 * 60);
            $rt = ceil($timeDiff) . " days ago";
        }
    } else {
        $rt = $timeDiff . " seconds ago";
    }
    return $rt;
}
if (!function_exists('my_array_column')) {
    function my_array_column(array $input, $columnKey, $indexKey = null)
    {
        $array = array();
        foreach ($input as $value) {
            if (!isset($value[$columnKey])) {
                trigger_error("Key \"$columnKey\" does not exist in array");
                return false;
            }
            if (is_null($indexKey)) {
                $array[] = $value[$columnKey];
            } else {
                if (!isset($value[$indexKey])) {
                    trigger_error("Key \"$indexKey\" does not exist in array");
                    return false;
                }
                if (!is_scalar($value[$indexKey])) {
                    trigger_error("Key \"$indexKey\" does not contain scalar value");
                    return false;
                }
                $array[$value[$indexKey]] = $value[$columnKey];
            }
        }
        return $array;
    }
}
//Find Product ID in Coupon Session Array
function findKey($array, $keySearch)
{ // check whether input is an array
    if (is_array($array)) {
        foreach ($array as $key => $item) {
            if (isset($item[$keySearch]) || findKey($item, $keySearch) === true) {
                return $key;
            }
        }
    }
}
//Send SMS
function sendSms($mobile)
{
    $otp = substr(str_shuffle('1234567890'), 0, 6);
    $message = $otp . ' is your one time password to confirm the order - DMagine.';
    $payload = file_get_contents('http://sms.truevaluemobi.com/api/pushsms.php?username=Mayank&password=DMagine@3108&sender=DMAGIN&message=' . $message . '&numbers=' . $mobile . '&unicode=false&flash=false');
    //echo $payload;
    //save to database
    $ci = CI();
    $p = $ci->db->query("INSERT INTO wl_otp set mobile_number = '" . $mobile . "', otp = '" . $otp . "'");
    //end
    echo $otp;
}
//encryption
function encrypt($plainText, $key)
{
    $secretKey = hextobin(md5($key));
    $initVector = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
    $openMode = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', 'cbc', '');
    $blockSize = mcrypt_get_block_size(MCRYPT_RIJNDAEL_128, 'cbc');
    $plainPad = pkcs5_pad($plainText, $blockSize);
    if (mcrypt_generic_init($openMode, $secretKey, $initVector) != -1) {
        $encryptedText = mcrypt_generic($openMode, $plainPad);
        mcrypt_generic_deinit($openMode);
    }
    return bin2hex($encryptedText);
}
function decrypt($encryptedText, $key)
{
    $secretKey = hextobin(md5($key));
    $initVector = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
    $encryptedText = hextobin($encryptedText);
    $openMode = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', 'cbc', '');
    mcrypt_generic_init($openMode, $secretKey, $initVector);
    $decryptedText = mdecrypt_generic($openMode, $encryptedText);
    $decryptedText = rtrim($decryptedText, "\0");
    mcrypt_generic_deinit($openMode);
    return $decryptedText;
}
//*********** Padding Function *********************
function pkcs5_pad($plainText, $blockSize)
{
    $pad = $blockSize - (strlen($plainText) % $blockSize);
    return $plainText . str_repeat(chr($pad), $pad);
}
//********** Hexadecimal to Binary function for php 4.0 version ********
function hextobin($hexString)
{
    $length = strlen($hexString);
    $binString = "";
    $count = 0;
    while ($count < $length) {
        $subString = substr($hexString, $count, 2);
        $packedString = pack("H*", $subString);
        if ($count == 0) {
            $binString = $packedString;
        } else {
            $binString .= $packedString;
        }
        $count += 2;
    }
    return $binString;
}
function getBrand()
{
    $ci = CI();
    $p = $ci->db->query("SELECT * FROM wl_brands WHERE status = '1'")->result_array();
    ?>
  <div class="container">
    <!--<h3 class="section-title">Our Sponsers</h3>-->
    <div id="brands-carousel" class="logo-slider wow fadeInUp">
      <div class="logo-slider-inner">
        <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
          <?php
foreach ($p as $bval) {
        ?>
            <div class="item "><a href="#" class="image"> <img data-echo="<?php echo get_image('brands', $bval['brand_image'], '', '', 'R'); ?>" src="<?php echo get_image('brands', $bval['brand_image'], '166', '100', 'R'); ?>" alt=""> </a> </div>
            <!--/.item-->
            <?php
}
    ?>
        </div>
        <!-- /.owl-carousel #logo-slider -->
      </div>
      <!-- /.logo-slider-inner -->
    </div>
  </div>
  <?php
}
if (!function_exists('cur_url')) {
    function cur_url()
    {
        CI()->load->helper('url');
        $currentURL = current_url();
        $currentURL = str_replace(base_url(), '', $currentURL);
        return str_replace('.html', '', $currentURL);
    }
}
if ( ! function_exists('last_qry'))
{
    function last_qry($die=true)
    {
        echo CI()->db->last_query();
        if($die) 
        die ;
    }
}
function set_flash($msg, $key='tmp_flash') {
	$ci =&get_instance();
	$ci->session->set_userdata($key,$msg);
}
function get_flash($key='tmp_flash') {
	$ci =&get_instance();
	$msg=$ci->session->userdata($key); 
	$ci->session->unset_userdata($key);
	return $msg;
}
function set_err($msg){
	set_flash('<div class="alert alert-danger alert-msg" onclick="$(this).fadeOut();">'.$msg.'</div><div class="clearfix"></div>');
}
function set_success($msg){
	set_flash('<div class="alert alert-success alert-msg" onclick="$(this).fadeOut();" >'.$msg.'</div><div class="clearfix"></div>');
}
function pr($arr){
    echo "<pre>"; print_r($arr); echo "</pre>";
}
function dd($arr){
    pr($arr); die ;
}
function is_post(){
    return (CI()->input->server('REQUEST_METHOD') == 'POST') ? true : false;
}
function show_err($cnt,$errs){
    if(empty($errs)){
        return '';
    }
    $resp="<script> $(document).ready(function(){";
        foreach ($errs as $k => $r) {
            $resp.='$("'.$cnt.'").find("input[name='.$k.']").closest("div").append(\'<div class="field-err">'.$r.'</div>\');';
        }
    $resp.="});</script>";
    return $resp;
}

function str_short($string='',$len=0) {
	$string=strip_tags($string);	
	$tmp=substr($string,0,$len);	
	if(strlen($string)<=$len) {return $string;}	
	return trim($tmp).((strlen($string)<=$len)?'':'...');
}

function h($data) {
	return htmlspecialchars($data);
}

function tbl_cols($tbl,$is_val=TRUE){
    $CI =CI();
    $tbl=$CI->db->query("describe $tbl")->result_array();
    $cols=array();
    if($is_val){
        foreach ($tbl as $key => $col) {
            $cols[$col['Field']]='';
        }
    }else{
        foreach ($tbl as $key => $col) {
            array_push($cols, $col['Field']);
        }
    }
    return $cols;
}

function filter_arr($arr,$keys){
    $new_arr=array();
    foreach ($arr as $key => $val) {
        if(in_array($key, $keys)){
            $new_arr[$key]=$val;
        }
    }
    return $new_arr;
}

if (!function_exists('set_g')) {
    function set_g($field,$default=''){
        if(!isset($_GET[$field]) || empty(@$_GET[$field])){
            return $default;
        }
        return $_GET[$field];
    }
}

function send_enquiry(){
    $CI=CI();
    $post=$CI->input->post();
    $posted_data=filter_arr($post,tbl_cols('wl_enquiry',false));
    $posted_data['post_date']=date('Y-m-d H:i:s');
    $posted_data['en_url']=@$_SERVER['HTTP_REFERER'];
    $CI->users_model->safe_insert('wl_enquiry',$posted_data);
    $subject = utf8_encode('Webpulseindia.com ' . ' - ' . 'Enquiry from '.$CI->admin_info->site_domain);
    $htmlContent = "
        Customer Details:
        Url: ".$posted_data['en_url']." <br />
        Your Name: " . $post['first_name'] . " <br />
        Mobile: " . $post['mobile_number'] . " <br />
        Email: " . $post['email'] . " <br />
        Location: " . $post['address'] . " <br />
        Message: " . $post['message'];
    $emails=array($CI->admin_info->site_email,$CI->admin_info->admin_email,'bittu.wps@gmail.com');
    foreach($emails as $r=>$v){
        $mail_conf = array(
            'subject' => $subject,
            'to_email' => $v,
            'from_email' => $CI->admin_info->admin_email,
            'from_name' => $CI->config->item('site_name'),
            'body_part' => $htmlContent,
        );
        $CI->dmailer->mail_notify($mail_conf);
    }
}

function subdomain_name(){
    //Check if it is subdomain
    $CI=CI();
    $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $uri_segments = explode('/', $uri_path);
    $st = $uri_segments[1];
    if (strstr($st, '.html')) {
        $st = substr($st, 0, -5);
    }
    $stArray = $CI->db->query("SELECT meta_id, page_url FROM wl_meta_tags WHERE is_fixed='L' AND page_url='" . $st . "'")->row_array();
    //last_qry(FALSE);
    //dd($stArray);
    if (is_array($stArray) & !empty($stArray)) {
        return "Manufacturer in ".ucwords(locationName($st));
    }else{
        return "Manufacturer in Delhi";
    }
}

function location_name() {
    //Check if it is subdomain
    $CI = CI();
    $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $uri_segments = explode('/', $uri_path);
    $st = $uri_segments[1];
    if (strstr($st, '.html')) {
        $st = substr($st, 0, -5);
    }
    $stArray = $CI->db->query("SELECT meta_id, page_url FROM wl_meta_tags WHERE is_fixed='L' AND page_url='" . $st . "'")->row_array();
    if (is_array($stArray) & !empty($stArray)) {
        return ucwords(locationName($st));
    } else {
        return 'Delhi';
    }
}