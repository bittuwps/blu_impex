<?php

$conf_main['base_path'] = 'http://www.angelsbasket.com';
$conf_main['expire_time'] = time() + 60 * 60 * 24 * 30; //1 month
$conf_main['domain_name'] = 'angelsbasket.com';

//DB Configurations
$conf_db['db_server'] = "";
$conf_db['db_name'] = "";
$conf_db['db_username'] = "";
$conf_db['db_password'] = "";
$conf_db['db_user_table_name'] = "";
$conf_db['db_user_field_id'] = "";
$conf_db['db_user_field_name'] = "";
$conf_db['db_user_field_username'] = "";
$conf_db['db_user_field_password'] = "";
$conf_db['db_user_field_email'] = "";
$conf_db['db_user_field_social_network_type'] = "";
$conf_db['password_md5'] = true;


/** Facebook configurations */
$conf_facebook['appId'] = '817027225110673';
$conf_facebook['secret'] = '1f71e71363ecdd769dabb1984189cba3';

$conf_facebook['redirect_uri'] = 'http://www.wetravelsolo.in/web/users/facebook_callback/?type=facebook';
$conf_facebook['fields'] = 'id,name,first_name,last_name,email,gender';
$conf_facebook['permissions'] = 'email,publish_stream,user_status';

/** Google configurations */
$conf_google['return_url'] = 'http://www.angelsbasket.com/users/facebook_callback/?type=google';
