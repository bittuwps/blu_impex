<?php

    function disp_name($name,$limit=25){
        $name_arr=explode(' ', $name);
        $r_name='';
        $t_name='';
        if(sizeof($name_arr)==1){
            if(strlen($name_arr[0])>$limit){
                return substr($name_arr[0],0,($limit-3))." ...";
            }
            return $name;
        }
        foreach($name_arr as $val){
            $t_name.=$val;
            if(strlen($t_name)>$limit){
                $r_name.=' ...';
                break ;
            }else{
                $r_name.=$val." ";
                $t_name=$r_name;
            }
        }
        return $r_name;
    }

    function header_item($name){
        $s_name=disp_name($name,12);
        return str_replace('...','',$s_name);
    }

    function prd_images($prd_id,$limit=1){
        $ci=CI();
        $prds=$ci->db->query("select * from wl_products_media where `products_id`='$prd_id' limit $limit")->result_array();
        if($limit==1){
            return @$prds[0]['media'];
        }
        return $prds;
    }

    function captcha(){
        return '<div class="g-recaptcha" data-sitekey="6Lf8Q5oUAAAAABud-lARX8PP4EoF5YyReNP_3AO8" style="transform:scale(0.60);-webkit-transform:scale(0.760);transform-origin:0 0;-webkit-transform-origin:0 0;"></div>';
    }

    function validate_captcha(){
        $CI=CI();
        $post=$CI->input->post();
        if (isset($post['g-recaptcha-response']) && !empty($post['g-recaptcha-response'])){
            //your site secret key
            $secret = '6Lf8Q5oUAAAAAMd6hdtcuNAQhEt8xq9TdPqi8vhF';
            //get verify response data
            $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
            $responseData = json_decode($verifyResponse);
            dd($responseData);
            if ($responseData->success or true){
                return FALSE;
            }else{
                return 'Robot verification failed, please try again.';
            }
        }else{
            return 'Please click on the reCAPTCHA box.';
        }
    }

?>