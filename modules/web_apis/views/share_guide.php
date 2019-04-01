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

      <div style="width: 100%; margin-top: 10px; background-color: #FFCCDD; padding: 5px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">New API List - 28th Dec 2015</a>
      </div>

      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets for My Joined Trips</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service for My Joined Trips</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/share/joinedTrips)</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>userId</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>maxUpdatedDate (Y-m-d H:i:s)</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
          </table>
        </div>
      </div>
      
      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets for Upload a Image</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service for Upload a Image</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/share/uploadImage)</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>image1</b></td>
              <td><b>Mandatory - Use POST Method (Multipart)</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>customers_id</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
          </table>
        </div>
      </div>
      
      
      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets for Upload Image Details</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service for Upload Image Details</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/share/shareImage)</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>userId</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>title</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>imgIds (comma saperated i.e. 1,3,4)</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>tripId</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>friendsIds  (comma saperated i.e. 1,3,4)</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
          </table>
        </div>
      </div>
      
      
      <div style="width: 100%; margin-top: 10px; background-color: #FFCCDD; padding: 5px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">New API List - 29th Dec 2015</a>
      </div>

      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets for Upload Video</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service for Upload Video</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/share/shareVideo)</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>userId</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>title</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>video1 (multipart)</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>tripId</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>friendsIds  (comma saperated i.e. 1,3,4)</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
          </table>
        </div>
      </div>
      
      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets for Sharing Story</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service for Sharing Story</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/share/shareStory)</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>userId</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>blogTitle</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>description</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>image1 (multipart)</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
          </table>
        </div>
      </div>
      
      <div style="width: 100%; margin-top: 10px; background-color: #FFCCDD; padding: 5px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">New API List - 30th Dec 2105</a>
      </div>
      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets for List of Sharing Story</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service for List of Sharing Story</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/share/getshareStory)</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>customers_id</b></td>
              <td><b>Non-Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>maxUpdatedDate</b></td>
              <td><b>Non-Mandatory - Use POST Method</b></td>
            </tr>
          </table>
        </div>
      </div>
      
      <div style="width: 100%; margin-top: 10px; background-color: #FFCCDD; padding: 5px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">New API List - 12th Jan 2016</a>
      </div>

      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets to Post comment on Story</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service to Post comment on Story</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/share/shareStoryComments)</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>userId</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>storyId</b></td>
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
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets to Like a Story</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service to Like a Story</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/share/likeStory)</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>userId</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>storyId</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
          </table>
        </div>
      </div>
      
      <div style="width: 100%; margin-top: 10px; background-color: #FFCCDD; padding: 5px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">New API List - 14th Jan 2016</a>
      </div>

      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets to Get Shared Videos</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service to Get Shared Videos</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/share/getshareVideo)</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>customers_id</b></td>
              <td><b>Non-Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>maxUpdatedDate</b></td>
              <td><b>Non-Mandatory - Use POST Method</b></td>
            </tr>
          </table>
        </div>
      </div>
      
      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets to Get Shared Images</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service to Get Shared Images</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/share/getshareImages)</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>customers_id</b></td>
              <td><b>Non-Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>maxUpdatedDate</b></td>
              <td><b>Non-Mandatory - Use POST Method</b></td>
            </tr>
          </table>
        </div>
      </div>
      
      <div style="width: 100%; margin-top: 10px; background-color: #FFCCDD; padding: 5px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">New API List - 15th Jan 2016</a>
      </div>

      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets to Get Story Comments</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service to Get Story Comments</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/share/getStorycomments)</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>storyId</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>maxUpdatedDate</b></td>
              <td><b>Non-Mandatory - Use POST Method</b></td>
            </tr>
          </table>
        </div>
      </div>
      
      <div style="width: 100%; margin-top: 10px; background-color: #FFCCDD; padding: 5px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">New API List - 16th Jan 2016</a>
      </div>

      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets to Increase Views of Story</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service to Increase Views of Story</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/share/increaseViewStory)</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>storyId</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>userId</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
          </table>
        </div>
      </div>
      
      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets to Post comment on Video</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service to Post comment on video</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/share/shareVideoComments)</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>userId</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>videoId</b></td>
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
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets to Get Video Comments</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service to Get Video Comments</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/share/getVideoComments)</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>videoId</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>maxUpdatedDate</b></td>
              <td><b>Non-Mandatory - Use POST Method</b></td>
            </tr>
          </table>
        </div>
      </div>
      
      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets to Post comment on Image</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service to Post comment on Image</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/share/shareImageComments)</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>userId</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>imageId</b></td>
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
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets to Get Image Comments</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service to Get Image Comments</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/share/getImageComments)</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>imageId</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>maxUpdatedDate</b></td>
              <td><b>Non-Mandatory - Use POST Method</b></td>
            </tr>
          </table>
        </div>
      </div>
      
      
      <div style="width: 100%; margin-top: 10px; background-color: #FFCCDD; padding: 5px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">New API List - 19th Jan 2016</a>
      </div>

      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets to Like/Dislike Video</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service to Like/Dislike Video</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/share/likeVideo)</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>videoId</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>userId</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
          </table>
        </div>
      </div>
      
      
      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets to Like/Dislike Images</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service to Like/Dislike Images</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/share/likeImage)</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>imageId</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>userId</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
          </table>
        </div>
      </div>
      
      <div style="width: 100%; margin-top: 10px; background-color: #FFCCDD; padding: 5px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">New API List - 29th Jan 2016</a>
      </div>
      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets for Editing Story</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service for Editing Story</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/share/editShareStory)</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>storyId</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>userId</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>blogTitle</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>description</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>image1 (multipart)</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
          </table>
        </div>
      </div>
      
      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets for Editing Video</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service for Editing Video</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/share/editshareVideo)</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>videoId</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>userId</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>title</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>tripId</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>friendsIds</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>video1 (multipart)</b></td>
              <td><b>Non-Mandatory - Use POST Method</b></td>
            </tr>
          </table>
        </div>
      </div>
      
      <div style="width: 100%; margin-top: 10px; background-color: #FFCCDD; padding: 5px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">New API List - 5th Feb 2016</a>
      </div>
      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets for Sharing Trip Idea</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service for Sharing Trip Idea</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/share/shareTripIdea)</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>userId</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>name</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>description</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>image1 (multipart)</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>image Path is uploaded_files/share/tripidea/    and (for thumb place thumb as well)</b></td>
              <td></td>
            </tr>
          </table>
        </div>
      </div>
      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets to Get Unique Trip Idea</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service to Get Unique Trip Idea</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/share/getshareTripIdea)</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>customers_id</b></td>
              <td><b>Non-Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>maxUpdatedDate</b></td>
              <td><b>Non-Mandatory - Use POST Method</b></td>
            </tr>
          </table>
        </div>
      </div>
      
      <div style="width: 100%; margin-top: 10px; background-color: #FFCCDD; padding: 5px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">New API List - 6th Feb 2016</a>
      </div>
      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets to Like Unique Trip</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service Like Unique Trip</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/share/likeUniqueTrip)</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>userId</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>uniqueTripId</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
          </table>
        </div>
      </div>
      
      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets to Comment Unique Trip</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service to Comment Unique Trip</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/share/shareUniqueTripComments)</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>userId</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>uniqueTripId</b></td>
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
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets to Join Unique Trip</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service to Join Unique Trip</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/share/shareUniqueTripJoin)</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>userId</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>uniqueTripId</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
          </table>
        </div>
      </div>
      
      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets to Vote Unique Trip</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service to Vote Unique Trip</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/share/shareUniqueTripVote)</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>userId</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>uniqueTripId</b></td>
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
          </table>
        </div>
      </div>
      
      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets to Edit Image</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service to Edit Image</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/share/editShareImage)</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>imageId</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>image1</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
          </table>
        </div>
      </div>
      
      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets to Delete Story</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service to Delete Story</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/share/deleteStory)</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>storyId</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>userId</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
          </table>
        </div>
      </div>
      
      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets to Delete Video</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service to Delete Video</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/share/deleteVideo)</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>storyId</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>userId</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
          </table>
        </div>
      </div>
      
      <div style="width: 100%; margin-top: 10px; background-color: #FFCCDD; padding: 5px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">New API List - 8th Feb 2016</a>
      </div>
      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets to Delete Image</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service to Delete Image</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/share/deleteImage)</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>imageId</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>userId</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
          </table>
        </div>
      </div>
      
      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets for Editing Trip Idea</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service for Editing Trip Idea</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/share/editTripIdea)</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>userId</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>tripId</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>name</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>description</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>image1 (multipart)</b></td>
              <td><b>Non-Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>image Path is uploaded_files/share/tripidea/    and (for thumb place thumb as well)</b></td>
              <td></td>
            </tr>
          </table>
        </div>
      </div>
      
      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets for Comments of Trip Idea</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service for Comments of Trip Idea</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/share/getTripIdeaComments)</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>uniqueTripId</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>maxUpdatedDate</b></td>
              <td><b>Mandatory - Use POST Method</b></td>
            </tr>
          </table>
        </div>
      </div>
      
      <div style="width: 100%; margin-top: 10px; background-color: #FFCCDD; padding: 5px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">New API List - 2nd April 2016</a>
      </div>      
      <div style="width: 100%; margin-top: 10px;">
        <a href="javascript:void(0);" class="api_name button" style="margin-bottom: 5px;">Paramets for Featured Trips</a>
        <div class="details dn" style="width: 100%; min-height: 90px; margin-top: 5px;">
          <table border="0" width="100%" align="left" cellpadding="5" cellspacing="1" style="background-color: #CCCCCC">
            <tr>
              <td colspan="2">
                <b>Web Service for Featured Trips</b>
                <br />
                Use Parameters as explained below (Use Post Method Only for better results) :
              </td>
            </tr>
            <tr bgcolor="#FCFCFC">
              <td><b>Parameter Name</b></td>
              <td><b>How to Use (URL : <?php echo site_url(); ?>web_apis/utility/get_featured_trips)</b></td>
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