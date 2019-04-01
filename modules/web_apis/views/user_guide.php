<html>
  <head>
    <style type="text/css">
      td{font-family: sans-serif; font-size: 12px;}
      .dn{display: none;}
      .api_name{font-family:sans-serif; text-decoration: none; padding: 5px;}
      .details{padding: 5px;}
    </style>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.min.js"></script>    
    <title>WeTravelSolo App - Web Services</title>  
  </head>
  <body>

    <div class="api">
      <p style="font-size:24px; color:#303030; padding: 5px; text-align: center; border-bottom: solid 2px;">
        Web APIs for We Travel Solo App
      </p>      

      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets for Member Registration</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service for Registration</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/users/register_member)</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>user_type (1 = user/ 2 = crafter)</b></td>
              <td><b>Mandatory - Use Post Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>login_type (normal, facebook, gmail)</b></td>
              <td><b>Mandatory - Use Post Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>userName</b></td>
              <td><b>Mandatory - Use Post Method</b></td>
            </tr>            
            <tr bgcolor="#FCFCFC">
              <td><b>email</b></td>
              <td><b>Mandatory - Use Post Method</b></td>
            </tr>            
            <tr bgcolor="#FCFCFC">
              <td><b>password</b></td>
              <td><b>Mandatory - Use Post Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>first_name</b></td>
              <td><b>Mandatory - Use Post Method</b></td>
            </tr>            
            <tr bgcolor="#FCFCFC">
              <td><b>last_name</b></td>
              <td><b>Mandatory - Use Post Method</b></td>
            </tr>            
            <tr bgcolor="#FCFCFC">
              <td><b>dob</b></td>
              <td><b>Mandatory - Use Post Method</b></td>
            </tr>            
            <tr bgcolor="#FCFCFC">
              <td><b>gender</b></td>
              <td><b>Mandatory - Use Post Method</b></td>
            </tr>            
            <tr bgcolor="#FCFCFC">
              <td><b>profile_picture</b></td>
              <td><b>Mandatory - Use Post Method</b></td>
            </tr>            
            <tr bgcolor="#FCFCFC">
              <td><b>about_me</b></td>
              <td><b>Non Mandatory - Use Post Method</b></td>
            </tr>            
            <tr bgcolor="#FCFCFC">
              <td><b>phone_number</b></td>
              <td><b>Mandatory - Use Post Method</b></td>
            </tr>            
            <tr bgcolor="#FCFCFC">
              <td><b>address</b></td>
              <td><b>Mandatory - Use Post Method</b></td>
            </tr>            
            <tr bgcolor="#FCFCFC">
              <td><b>country</b></td>
              <td><b>Mandatory - Use Post Method</b></td>
            </tr>            
            <tr bgcolor="#FCFCFC">
              <td><b>state</b></td>
              <td><b>Mandatory - Use Post Method</b></td>
            </tr>            
            <tr bgcolor="#FCFCFC">
              <td><b>city</b></td>
              <td><b>Mandatory - Use Post Method</b></td>
            </tr>            
            <tr bgcolor="#FCFCFC">
              <td><b>zipcode</b></td>
              <td><b>Mandatory - Use Post Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>coupon_code</b></td>
              <td><b>Non Mandatory - Use Post Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>user_zone</b></td>
              <td><b>Non Mandatory - Use Post Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>device_id</b></td>
              <td><b>Non Mandatory - Use Post Method</b></td>
            </tr>
          </table>
        </div>
      </div>


      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets for Login</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service to for Login</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/users/login)</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>username</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>password</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>login_type (normal, facebook, gmail)</b></td>
              <td><b>Mandatory - Use Post Method</b></td>
            </tr>
          </table>
        </div>
      </div>

      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets to Check User Exists</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service to to Check User Exists</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/users/member_exists)</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>email</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>login_type</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
          </table>
        </div>
      </div>

      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets for Logout</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service to Get City</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/users/logout)</b></td>
            </tr>
          </table>
        </div>
      </div>

      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets for Forgot Password</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service to for Forgot Password</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/users/forgot_password)</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>email</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>action</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
          </table>
        </div>
      </div>

      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets for User Profile</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service to Get User profile</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/users/user_profile)</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>user_id</b></td>
              <td><b>Mandatory - Use GET Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>member_id</b></td>
              <td><b>Non Mandatory - Use GET Method</b></td>
            </tr>
          </table>
        </div>
      </div>

      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets for Travel Passion List</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service to Get Passion List</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/users/get_travel_passion)</b></td>
            </tr>
          </table>
        </div>
      </div>

      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets for User category List</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service to Get User Category List</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/users/get_user_category)</b></td>
            </tr>
          </table>
        </div>
      </div>

      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets for Edit Profile </a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service for Edit Profile</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>user_id
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/users/edit_account)</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>user_id</b></td>
              <td><b>Mandatory - Use Post Method</b></td>
            </tr>  
            <tr bgcolor="#FCFCFC">
              <td><b>first_name</b></td>
              <td><b>Mandatory - Use Post Method</b></td>
            </tr>            
            <tr bgcolor="#FCFCFC">
              <td><b>last_name</b></td>
              <td><b>Mandatory - Use Post Method</b></td>
            </tr>            
            <tr bgcolor="#FCFCFC">
              <td><b>dob</b></td>
              <td><b>Mandatory - Use Post Method</b></td>
            </tr>            
            <tr bgcolor="#FCFCFC">
              <td><b>gender</b></td>
              <td><b>Mandatory - Use Post Method</b></td>
            </tr>            
            <tr bgcolor="#FCFCFC">
              <td><b>about_me</b></td>
              <td><b>Non Mandatory - Use Post Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>relationship_status</b></td>
              <td><b>Mandatory - Use Post Method</b></td>
            </tr>            
            <tr bgcolor="#FCFCFC">
              <td><b>travel_passion</b></td>
              <td><b>Mandatory - Use Post Method</b></td>
            </tr>            
            <tr bgcolor="#FCFCFC">
              <td><b>user_category</b></td>
              <td><b>Mandatory - Use Post Method</b></td>
            </tr>            
            <tr bgcolor="#FCFCFC">
              <td><b>personal_weblink</b></td>
              <td><b>Non Mandatory - Use Post Method</b></td>
            </tr>            
            <tr bgcolor="#FCFCFC">
              <td><b>facebook_link</b></td>
              <td><b>Non Mandatory - Use Post Method</b></td>
            </tr>            
            <tr bgcolor="#FCFCFC">
              <td><b>linkedin_link</b></td>
              <td><b>Non Mandatory - Use Post Method</b></td>
            </tr>            
            <tr bgcolor="#FCFCFC">
              <td><b>twitter_link</b></td>
              <td><b>Non Mandatory - Use Post Method</b></td>
            </tr>       
            <tr bgcolor="#FCFCFC">
              <td><b>phone_number</b></td>
              <td><b>Mandatory - Use Post Method</b></td>
            </tr>            
            <tr bgcolor="#FCFCFC">
              <td><b>address</b></td>
              <td><b>Non Mandatory - Use Post Method</b></td>
            </tr>            
            <tr bgcolor="#FCFCFC">
              <td><b>country</b></td>
              <td><b>Mandatory - Use Post Method</b></td>
            </tr>            
            <tr bgcolor="#FCFCFC">
              <td><b>state</b></td>
              <td><b>Mandatory - Use Post Method</b></td>
            </tr>            
            <tr bgcolor="#FCFCFC">
              <td><b>city</b></td>
              <td><b>Mandatory - Use Post Method</b></td>
            </tr>            
            <tr bgcolor="#FCFCFC">
              <td><b>zipcode</b></td>
              <td><b>Non Mandatory - Use Post Method</b></td>
            </tr>
          </table>
        </div>
      </div>

      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets for Update Cover Photo</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service to Update Cover Photo</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/utility/update_cover_pic)</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>user_id</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>cover_pic</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
          </table>
        </div>
      </div>

      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets for Update Profile Picture</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service to Update Profile Picture</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/utility/update_profile_pic)</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>user_id</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>profile_pic</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
          </table>
        </div>
      </div>

      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets for Country</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service to Get Country</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/utility/get_country)</b></td>
            </tr>
          </table>
        </div>
      </div>

      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets for State</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service to Get State</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/utility/get_state)</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>country_id</b></td>
              <td><b>Mandatory - Use GET Method</b></td>
            </tr>
          </table>
        </div>
      </div>

      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets for City</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service to Get City</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/utility/get_city)</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>state_id</b></td>
              <td><b>Mandatory - Use GET Method</b></td>
            </tr>
          </table>
        </div>
      </div>

      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets for Trip Category</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service to Get Category</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/trips/get_trip_category)</b></td>
            </tr>
          </table>
        </div>
      </div>

      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets for Trip Themes</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service to Get Trip Themes</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/trips/get_trip_theme)</b></td>
            </tr>
          </table>
        </div>
      </div>

      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets for Trips</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service to Get Trips</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/trips/get_trips)</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Keyword</b></td>
              <td><b>Non Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>category_id</b></td>
              <td><b>Non Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>theme_id</b></td>
              <td><b>Non Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>zone</b></td>
              <td><b>Non Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>price</b></td>
              <td><b>Non Mandatory - Use POST Method (Like : 6000-12000)</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>weekend_search</b></td>
              <td><b>Non Mandatory - Use POST Method (send 'Y' if searching weekend trips)</b></td>weekend_search
            </tr>
          </table>
        </div>
      </div>

      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets for Trip Details</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service to Get Trip Details</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/trips/get_trip_details)</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>trip_id</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>user_id</b></td>
              <td><b>Non Mandatory - Use POST Method</b></td>
            </tr>
          </table>
        </div>
      </div>

      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets for Join Trip</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service to Join Trip</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/members/join_trip)</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>trip_id</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>member_id</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>            
            <tr bgcolor="#FCFCFC">
              <td><b>name</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>email</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>            
            <tr bgcolor="#FCFCFC">
              <td><b>phone</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>total_amount</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>            
            <tr bgcolor="#FCFCFC">
              <td><b>paymentType</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>coupon_code</b></td>
              <td><b>Non-Mandatory - Use POST Method</b></td>
            </tr>
          </table>
        </div>
      </div>

      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets to Like / Dislike a Trip</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service to Like / Dislike a Trip</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/trips/like_trip)</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>trip_id</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>user_id</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
          </table>
        </div>
      </div>

      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets to Thinking / Remove Thinking</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service to Thinking / Remove Thinking a Trip</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/trips/think_trip)</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>trip_id</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>user_id</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
          </table>
        </div>
      </div>

      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets to Get Trip Comment List</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service to Get Trip Comment List</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/trips/trip_comments)</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>trip_id</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
          </table>
        </div>
      </div>

      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets to Post Trip Comment</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service to Post Trip Comment</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/trips/post_trip_comment)</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>trip_id</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>user_id</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>comments</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
          </table>
        </div>
      </div>

      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets to Change Password</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service to Change Password</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/members/change_password)</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>user_id</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>old_password</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>new_password</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>confirm_password</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
          </table>
        </div>
      </div>

      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets to Send Friend Request</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service to Send Friend Request</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/members/send_friend_request)</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>sender_id</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>receiver_id</b></td>
              <td><b>Mandatory - Use Post Method</b></td>
            </tr>
          </table>
        </div>
      </div>


      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets to Accept Friend Request</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service to Accept Friend Request</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/members/accept_friend_request)</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>username</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>request_id</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
          </table>
        </div>
      </div>

      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets to Reject Friend Request</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service to Reject Friend Request</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/members/reject_friend_request)</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>username</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>request_id</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
          </table>
        </div>
      </div>

      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets to Cancel Friend Request</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service to Cancel Friend Request</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/members/cancel_friend_request)</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>request_id</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
          </table>
        </div>
      </div>

      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets to UnFriend</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service to Cancel UnFriend</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/members/unfriend_me)</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>member_id</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>user_id</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
          </table>
        </div>
      </div>

      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets for Friend List</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service for Friend List</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/members/my_friends)</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>user_id</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
          </table>
        </div>
      </div>

      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets for Member timeline</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service for Member timeline</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/members/mmeber_timeline)</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>user_id</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
          </table>
        </div>
      </div>

      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets to Create Bucket</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service to Create Bucket</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/members/create_bucket)</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>member_id</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>date</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>month</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>year</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>location</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>title</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>description</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
          </table>
        </div>
      </div>

      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets to Check Bucket</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service to Check Bucket</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/members/check_bucket)</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>member_id</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
          </table>
        </div>
      </div>

      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets to Get Same Bucket Users</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service to Get Same Bucket Users</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/members/bucket_search)</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>customers_id</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>date</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>location</b></td>
              <td><b>Non-Mandatory - Use POST Method</b></td>
            </tr>
          </table>
        </div>
      </div>

      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets for my Bucket List</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service for my Bucket List</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/members/my_bucket_list)</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>member_id</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
          </table>
        </div>
      </div>


      <div style="width: 100%; margin-top: 10px; background-color: #FFCCDD; padding: 5px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">New API List - 17 Nov 2105</a>
      </div>

      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets for Bucket Users List</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service for Bucket Users List</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/members/bucket_user_list)</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>customers_id</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>date</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>location</b></td>
              <td><b>Non-Mandatory - Use POST Method</b></td>
            </tr>
          </table>
        </div>
      </div>

      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets to Check Count of User Groups</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service to Check Count of User Groups</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/members/check_user_groupCount)</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>user_id</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
          </table>
        </div>
      </div>

      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets to Create Group</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service to Create Group</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/members/create_bucket_group)</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>bucket_id</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>member_id</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>group_image</b></td>
              <td><b>Non-Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>title</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
          </table>
        </div>
      </div>

      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets to Group Users</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service to Group Users</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/members/update_group_users)</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>group_id</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>member_id</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>users</b></td>
              <td><b>Mandatory - Use POST Method (comma separated like : 2,12,19)</b></td>
            </tr>
          </table>
        </div>
      </div>

      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets to Accept Group Request</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service to Accept Group Request</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/members/accept_group_request)</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>request_id</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
          </table>
        </div>
      </div>

      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets to Reject Group Request</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service to Reject Group Request</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/members/reject_group_request)</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>request_id</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
          </table>
        </div>
      </div>

      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets to My Created Groups</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service to My Created Groups</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/members/my_created_groups)</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>member_id</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
          </table>
        </div>
      </div>

      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets to My Joined Groups</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service to My Joined Groups</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/members/my_joined_groups)</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>member_id</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
          </table>
        </div>
      </div>

      <div style="width: 100%; margin-top: 10px; background-color: #FFCCDD; padding: 5px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">New API List - 18 Nov 2105</a>
      </div>

      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets to Delete Bucket</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service to My Delete Bucket</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/members/delete_bucket)</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>bucket_id</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
          </table>
        </div>
      </div>

      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets for Checking Group Created</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service Paramets for Checking Group Created</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/members/check_bucket_group)</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>bucket_id</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
          </table>
        </div>

        <div style="width: 100%; margin-top: 10px; background-color: #FFCCDD; padding: 5px;">
          <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">New API List - 19 Nov 2105</a>
        </div>

        <div style="width: 100%; margin-top: 10px;">
          <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets for Posting Message to Group</a>
          <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
            <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
              <tr>
                <td colspan="2">
                  <b>Web Service for Posting Message to Group</b>
                  <br />
                  Use Parameters as explained below (Use Post Method Only for better results) :
                </td>
              </tr>
              <tr bgcolor="#FCFCFC">
                <td><b>Parameter Name</b></td>
                <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/members/post_group_chat)</b></td>
              </tr>
              <tr bgcolor="#FCFCFC">
                <td><b>group_id</b></td>
                <td><b>Mandatory - Use POST Method</b></td>
              </tr>
              <tr bgcolor="#FCFCFC">
                <td><b>customers_id</b></td>
                <td><b>Mandatory - Use POST Method</b></td>
              </tr>
              <tr bgcolor="#FCFCFC">
                <td><b>message</b></td>
                <td><b>Mandatory - Use POST Method</b></td>
              </tr>
              <tr bgcolor="#FCFCFC">
                <td><b>dateTime</b></td>
                <td><b>Mandatory - Use POST Method</b></td>
              </tr>
            </table>
          </div>
        </div>

        <div style="width: 100%; margin-top: 10px;">
          <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets for list of Chat</a>
          <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
            <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
              <tr>
                <td colspan="2">
                  <b>Web Service for list of Chat</b>
                  <br />
                  Use Parameters as explained below (Use Post Method Only for better results) :
                </td>
              </tr>
              <tr bgcolor="#FCFCFC">
                <td><b>Parameter Name</b></td>
                <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/members/get_chat_list)</b></td>
              </tr>
              <tr bgcolor="#FCFCFC">
                <td><b>group_id</b></td>
                <td><b>Mandatory - Use POST Method</b></td>
              </tr>
              <tr bgcolor="#FCFCFC">
                <td><b>user_id</b></td>
                <td><b>Non-Mandatory - Use POST Method</b></td>
              </tr>
              <tr bgcolor="#FCFCFC">
                <td><b>timestamp (format Y-m-d H:i:s = '2015-11-19 11:51:17')</b></td>
                <td><b>Mandatory - Use POST Method</b></td>
              </tr>              
            </table>
          </div>
        </div>

        <div style="width: 100%; margin-top: 10px; background-color: #FFCCDD; padding: 5px;">
          <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">New API List - 23 Nov 2105</a>
        </div>
        <div style="width: 100%; margin-top: 10px;">
          <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets to get connect</a>
          <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
            <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
              <tr>
                <td colspan="2">
                  <b>Web Service to Get connect</b>
                  <br />
                  Use Parameters as explained below (Use Post Method Only for better results) :
                </td>
              </tr>
              <tr bgcolor="#FCFCFC">
                <td><b>Parameter Name</b></td>
                <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/utility/get_connect)</b></td>
              </tr>
              <tr bgcolor="#FCFCFC">
                <td><b>user_id</b></td>
                <td><b>Mandatory - Use POST Method</b></td>
              </tr>
              <tr bgcolor="#FCFCFC">
                <td><b>country</b></td>
                <td><b>Non-Mandatory - Use POST Method</b></td>
              </tr>
              <tr bgcolor="#FCFCFC">
                <td><b>state</b></td>
                <td><b>Non-Mandatory - Use Post Method</b></td>
              </tr>
              <tr bgcolor="#FCFCFC">
                <td><b>city</b></td>
                <td><b>Non-Mandatory - Use Post Method</b></td>
              </tr>
              <tr bgcolor="#FCFCFC">
                <td><b>category</b></td>
                <td><b>Non-Mandatory - Use Post Method</b></td>
              </tr>
              <tr bgcolor="#FCFCFC">
                <td><b>age_start</b></td>
                <td><b>Non-Mandatory - Use Post Method</b></td>
              </tr>
              <tr bgcolor="#FCFCFC">
                <td><b>age_end</b></td>
                <td><b>Non-Mandatory - Use Post Method</b></td>
              </tr>
              <tr bgcolor="#FCFCFC">
                <td><b>gender</b></td>
                <td><b>Non-Mandatory - Use Post Method</b></td>
              </tr>
            </table>
          </div>
        </div>
        <div style="width: 100%; margin-top: 10px;">
          <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets to get connect - Crafter</a>
          <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
            <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
              <tr>
                <td colspan="2">
                  <b>Web Service to Get connect - Crafter</b>
                  <br />
                  Use Parameters as explained below (Use Post Method Only for better results) :
                </td>
              </tr>
              <tr bgcolor="#FCFCFC">
                <td><b>Parameter Name</b></td>
                <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/utility/get_connect_crafter)</b></td>
              </tr>
              <tr bgcolor="#FCFCFC">
                <td><b>user_id</b></td>
                <td><b>Mandatory - Use POST Method</b></td>
              </tr>
              <tr bgcolor="#FCFCFC">
                <td><b>country</b></td>
                <td><b>Non-Mandatory - Use POST Method</b></td>
              </tr>
              <tr bgcolor="#FCFCFC">
                <td><b>state</b></td>
                <td><b>Non-Mandatory - Use Post Method</b></td>
              </tr>
              <tr bgcolor="#FCFCFC">
                <td><b>city</b></td>
                <td><b>Non-Mandatory - Use Post Method</b></td>
              </tr>
              <tr bgcolor="#FCFCFC">
                <td><b>category</b></td>
                <td><b>Non-Mandatory - Use Post Method</b></td>
              </tr>
              <tr bgcolor="#FCFCFC">
                <td><b>age_start</b></td>
                <td><b>Non-Mandatory - Use Post Method</b></td>
              </tr>
              <tr bgcolor="#FCFCFC">
                <td><b>age_end</b></td>
                <td><b>Non-Mandatory - Use Post Method</b></td>
              </tr>
              <tr bgcolor="#FCFCFC">
                <td><b>gender</b></td>
                <td><b>Non-Mandatory - Use Post Method</b></td>
              </tr>
            </table>
          </div>
        </div>

        <div style="width: 100%; margin-top: 10px; background-color: #FFCCDD; padding: 5px;">
          <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">New API List - 24 Nov 2105</a>
        </div>
        <div style="width: 100%; margin-top: 10px;">
          <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets to get Zone</a>
          <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
            <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
              <tr>
                <td colspan="2">
                  <b>Web Service to Get Zone</b>
                  <br />
                  Use Parameters as explained below (Use Post Method Only for better results) :
                </td>
              </tr>
              <tr bgcolor="#FCFCFC">
                <td><b>Parameter Name</b></td>
                <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/utility/get_zone)</b></td>
              </tr>
            </table>
          </div>
        </div>

        <div style="width: 100%; margin-top: 10px; background-color: #FFCCDD; padding: 5px;">
          <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">New API List - 25 Nov 2105</a>
        </div>
        <div style="width: 100%; margin-top: 10px;">
          <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets to Follow</a>
          <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
            <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
              <tr>
                <td colspan="2">
                  <b>Web Service to Follow</b>
                  <br />
                  Use Parameters as explained below (Use Post Method Only for better results) :
                </td>
              </tr>
              <tr bgcolor="#FCFCFC">
                <td><b>Parameter Name</b></td>
                <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/members/follow)</b></td>
              </tr>
              <tr bgcolor="#FCFCFC">
                <td><b>sender_id (user id)</b></td>
                <td><b>Mandatory - Use POST Method</b></td>
              </tr>
              <tr bgcolor="#FCFCFC">
                <td><b>receiver_id (whom to follow)</b></td>
                <td><b>Mandatory - Use Post Method</b></td>
              </tr>
            </table>
          </div>
        </div>

        <div style="width: 100%; margin-top: 10px;">
          <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Parameters for Terms & Conditions</a>
          <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
            <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
              <tr>
                <td colspan="2">
                  <b>Web Service for Terms & Conditions</b>
                  <br />
                  Use Parameters as explained below (Use Post Method Only for better results) :
                </td>
              </tr>
              <tr bgcolor="#FCFCFC">
                <td><b>Parameter Name</b></td>
                <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/utility/get_terms)</b></td>
              </tr>
            </table>
          </div>
        </div>

        <div style="width: 100%; margin-top: 10px;">
          <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Parameters for Privacy Policy</a>
          <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
            <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
              <tr>
                <td colspan="2">
                  <b>Web Service for Privacy Policy</b>
                  <br />
                  Use Parameters as explained below (Use Post Method Only for better results) :
                </td>
              </tr>
              <tr bgcolor="#FCFCFC">
                <td><b>Parameter Name</b></td>
                <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/utility/get_privacy)</b></td>
              </tr>
            </table>
          </div>
        </div>

        <div style="width: 100%; margin-top: 10px;">
          <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Parameters for Community Timeline</a>
          <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
            <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
              <tr>
                <td colspan="2">
                  <b>Web Service for Community Timeline</b>
                  <br />
                  Use Parameters as explained below (Use Post Method Only for better results) :
                </td>
              </tr>
              <tr bgcolor="#FCFCFC">
                <td><b>Parameter Name</b></td>
                <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/members/community_timeline)</b></td>
              </tr>
            </table>
          </div>
        </div>

        <div style="width: 100%; margin-top: 10px;">
          <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Parameters for Friend Timeline</a>
          <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
            <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
              <tr>
                <td colspan="2">
                  <b>Web Service for Friend Timeline</b>
                  <br />
                  Use Parameters as explained below (Use Post Method Only for better results) :
                </td>
              </tr>
              <tr bgcolor="#FCFCFC">
                <td><b>Parameter Name</b></td>
                <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/members/friends_timeline)</b></td>
              </tr>
              <tr bgcolor="#FCFCFC">
                <td><b>user_id</b></td>
                <td><b>Mandatory - Use Post Method</b></td>
              </tr>
            </table>
          </div>
        </div>

        <div style="width: 100%; margin-top: 10px; background-color: #FFCCDD; padding: 5px;">
          <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">New API List - 4th Dec 2105</a>
        </div>

        <div style="width: 100%; margin-top: 10px;">
          <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets for Posting Message to Friend</a>
          <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
            <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
              <tr>
                <td colspan="2">
                  <b>Web Service for Posting Message to Friend</b>
                  <br />
                  Use Parameters as explained below (Use Post Method Only for better results) :
                </td>
              </tr>
              <tr bgcolor="#FCFCFC">
                <td><b>Parameter Name</b></td>
                <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/members/post_member_chat)</b></td>
              </tr>
              <tr bgcolor="#FCFCFC">
                <td><b>sender_id</b></td>
                <td><b>Mandatory - Use POST Method</b></td>
              </tr>
              <tr bgcolor="#FCFCFC">
                <td><b>receiver_id</b></td>
                <td><b>Mandatory - Use POST Method</b></td>
              </tr>
              <tr bgcolor="#FCFCFC">
                <td><b>message</b></td>
                <td><b>Mandatory - Use POST Method</b></td>
              </tr>
              <tr bgcolor="#FCFCFC">
                <td><b>dateTime</b></td>
                <td><b>Mandatory - Use POST Method</b></td>
              </tr>
            </table>
          </div>
        </div>

        <div style="width: 100%; margin-top: 10px;">
          <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets for list of Member Chat</a>
          <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
            <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
              <tr>
                <td colspan="2">
                  <b>Web Service for list of Member Chat</b>
                  <br />
                  Use Parameters as explained below (Use Post Method Only for better results) :
                </td>
              </tr>
              <tr bgcolor="#FCFCFC">
                <td><b>Parameter Name</b></td>
                <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/members/get_member_chat_list)</b></td>
              </tr>
              <tr bgcolor="#FCFCFC">
                <td><b>sender_id</b></td>
                <td><b>Mandatory - Use POST Method</b></td>
              </tr>
              <tr bgcolor="#FCFCFC">
                <td><b>user_id</b></td>
                <td><b>Mandatory - Use POST Method</b></td>
              </tr>
              <tr bgcolor="#FCFCFC">
                <td><b>timestamp (format Y-m-d H:i:s = '2015-11-19 11:51:17')</b></td>
                <td><b>Mandatory - Use POST Method</b></td>
              </tr>              
            </table>
          </div>
        </div>

        <div style="width: 100%; margin-top: 10px;">
          <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets for list of Pending Users of Group</a>
          <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
            <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
              <tr>
                <td colspan="2">
                  <b>Web Service for list of Pending Users of Group</b>
                  <br />
                  Use Parameters as explained below (Use Post Method Only for better results) :
                </td>
              </tr>
              <tr bgcolor="#FCFCFC">
                <td><b>Parameter Name</b></td>
                <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/members/group_pending_user_list)</b></td>
              </tr>
              <tr bgcolor="#FCFCFC">
                <td><b>group_id</b></td>
                <td><b>Mandatory - Use POST Method</b></td>
              </tr>
              <tr bgcolor="#FCFCFC">
                <td><b>customers_id</b></td>
                <td><b>Mandatory - Use POST Method</b></td>
              </tr>
              <tr bgcolor="#FCFCFC">
                <td><b>bucket_id</b></td>
                <td><b>Mandatory - Use POST Method</b></td>
              </tr>              
            </table>
          </div>
        </div>

        <div style="width: 100%; margin-top: 10px;">
          <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets for list of Group Users</a>
          <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
            <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
              <tr>
                <td colspan="2">
                  <b>Web Service for list of Users of Group</b>
                  <br />
                  Use Parameters as explained below (Use Post Method Only for better results) :
                </td>
              </tr>
              <tr bgcolor="#FCFCFC">
                <td><b>Parameter Name</b></td>
                <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/members/get_group_members)</b></td>
              </tr>
              <tr bgcolor="#FCFCFC">
                <td><b>group_id</b></td>
                <td><b>Mandatory - Use POST Method</b></td>
              </tr>
            </table>
          </div>
        </div>

        <div style="width: 100%; margin-top: 10px;">
          <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets To exit Group</a>
          <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
            <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
              <tr>
                <td colspan="2">
                  <b>Web Service To exit Group</b>
                  <br />
                  Use Parameters as explained below (Use Post Method Only for better results) :
                </td>
              </tr>
              <tr bgcolor="#FCFCFC">
                <td><b>Parameter Name</b></td>
                <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/members/exit_group_member)</b></td>
              </tr>
              <tr bgcolor="#FCFCFC">
                <td><b>group_id</b></td>
                <td><b>Mandatory - Use POST Method</b></td>
              </tr>
              <tr bgcolor="#FCFCFC">
                <td><b>customers_id</b></td>
                <td><b>Mandatory - Use POST Method</b></td>
              </tr>
            </table>
          </div>
        </div>

        <div style="width: 100%; margin-top: 10px;">
          <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets To Update GCM</a>
          <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
            <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
              <tr>
                <td colspan="2">
                  <b>Web Service To Update GCM</b>
                  <br />
                  Use Parameters as explained below (Use Post Method Only for better results) :
                </td>
              </tr>
              <tr bgcolor="#FCFCFC">
                <td><b>Parameter Name</b></td>
                <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/users/update_device_ids)</b></td>
              </tr>
              <tr bgcolor="#FCFCFC">
                <td><b>customers_id</b></td>
                <td><b>Mandatory - Use POST Method</b></td>
              </tr>
              <tr bgcolor="#FCFCFC">
                <td><b>device_id</b></td>
                <td><b>Mandatory - Use POST Method</b></td>
              </tr>
            </table>
          </div>
        </div>
        
        <div style="width: 100%; margin-top: 10px; background-color: #FFCCDD; padding: 5px;">
          <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">New API List - 11th Dec 2105</a>
        </div>

        <div style="width: 100%; margin-top: 10px;">
          <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets for My Inbox Friend</a>
          <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
            <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
              <tr>
                <td colspan="2">
                  <b>Web Service for My Inbox</b>
                  <br />
                  Use Parameters as explained below (Use Post Method Only for better results) :
                </td>
              </tr>
              <tr bgcolor="#FCFCFC">
                <td><b>Parameter Name</b></td>
                <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/users/myInbox)</b></td>
              </tr>
              <tr bgcolor="#FCFCFC">
                <td><b>user_id</b></td>
                <td><b>Mandatory - Use POST Method</b></td>
              </tr>
              <tr bgcolor="#FCFCFC">
                <td><b>maxUpdatedDate (Y-m-d H:i:s)</b></td>
                <td><b>Mandatory - Use POST Method</b></td>
              </tr>
            </table>
          </div>
        </div>

      </div>



      <script type="text/javascript">
        $('.api_name').click(function () {
          $('.details').fadeOut(100);
          $(this).next('div .details').toggle('slow');
        });
      </script>  

  </body>
</html>