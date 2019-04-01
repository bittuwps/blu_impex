<?php $this->load->view('includes/face_header'); ?>

<style type="text/css">

  @import url("<?php echo resource_url(); ?>fancybox/jquery.fancybox.css");

</style>

<script src="<?php echo resource_url(); ?>fancybox/jquery.fancybox.pack.js"></script>

<style>

  .percent_bar{

    font-weight:bold;font-size:16px;color:#f00;padding-left:30px;

  }

  .cont_div{border:4px solid #e4e4e4}

  .item_selected{

    border-color:#0f0 !important;

  }

  #list ul li{list-style:none;}

  .pagination {

    display: inline-block;

    margin-left: 15px;

  }

  .pagination a {

    color: black;

    float: left;

    padding: 6px 12px;

    text-decoration: none;

    border:1px solid #ddd;

  }

  .pagination a.active {

    background-color: #4CAF50;

    color: white;

  }

  .pagination a:hover:not(.active) {background-color: #ddd;}

</style>



<!-- Upload Form -->

<div style="float:left;margin: 0px 10px;">

  <?php echo form_open_multipart(''); ?>

  <table width="100%"  border="0" cellspacing="5" cellpadding="5">

    <tr>

      <td>

        <input type="file" name="file[]" id="files" multiple autocomplete="off">

        <input type="button" name="upload" id="upload" value="Upload" style="display:none;" />

      </td>

    </tr>

  </table>

  <?php echo form_close(); ?>

</div>

<!-- Upload Form Ends-->



<!-- Search Form -->

<div style="float:right;padding-top:5px;">

  <?php echo form_open('', 'method="get"'); ?>

  <input type="text" name="search_keyword" value="<?php echo $this->input->post('search_keyword'); ?>" placeholder="Search"  /><input type="submit" name="search_sbt" value="Search"  />

  <?php echo form_close(); ?>

</div>

<!-- Search Form Ends-->

<div style="clear:both;"></div>

<!--Progress Container -->

<div id="list"></div>

<!--Progress Container Ends-->



<div id="loaded_items">

  <?php

  $start = 0;

  if (@$_GET['start']) {

    $start = @$_GET['start'];

  }

  $keyword = "";

  if ($this->input->get_post('search_keyword') != '') {

    $keyword = $this->input->get_post('search_keyword');

  }



  $exclude_files = array("");

  $ifiles = Array();

  $file_object = array();

  $dir = UPLOAD_DIR . "/product_images/thumb/";

  $handle = opendir($dir);

  $number_to_display = '48';

  

  while (false !== ($file = readdir($handle))) {

    if ($file != "." && $file != ".." && !in_array($file, $exclude_files)) {

      if (($keyword != '' && strstr($file, $keyword)) || $keyword == '') {

        $fileTime = filemtime(UPLOAD_DIR . "/product_images/" . $file);

        $ifiles[] = array(

            'name' => $file,

            'time' => $fileTime

        );

      }

    }

  }



  //sorting by time;

  //trace($ifiles);

  function sortArray($a1, $a2) {

    if ($a1['time'] == $a2['time'])

      return 0;

    return ($a1['time'] > $a2['time']) ? -1 : 1;

  }

  usort($ifiles, "sortArray");



  //closedir($handle);

  $total_files = count($ifiles);

  $req_pages = round($total_files / $number_to_display);

  ?>

  <div style="padding-top:10px;padding-bottom:5px;text-align:center;">

    <span style='color:red; padding-left:15px; float: left;'>Total (<?php echo $total_files; ?>) Images</span>

    <input type="submit" name="del_sbt" value="Delete" id="del_sbt" class="button" />

    <input type="submit" name="sel_sbt" value="Select" id="sel_sbt" class="button" />

  </div>

  <div class="content-frame-body content-frame-body-left">

    <div class="gallery" id="links">

      <?php

      for ($z = 0; $z < $number_to_display; $z++) {

        //$vf = $z + ($start + $number_to_display);

        $vf = $z + ($start);

        if (isset($ifiles[$z])) {

          $val = $ifiles[$vf];

          ?>

          <a class="gallery-item cont_div" href="<?php echo base_url(); ?>uploaded_files/product_images/<?php echo $val['name']; ?>" title="Nature Image 1" data-rel="gallery">

            <div class="image">                              

              <img src="<?php echo get_image('product_images', $val['name'], '150', '150', 'AR'); ?>" alt="<?php echo $val['name']; ?>" data-imgname="<?php echo $val['name']; ?>" data-class="item_image" />                   

              <ul class="gallery-item-controls">

                <li><label> <input type="checkbox" name="delete[]" value="<?php echo $val['name']; ?>" class="del_items icheckbox" /></label>

                </li>

              </ul>                                                                    

            </div>

            <div class="meta">

              <strong><?php echo substr($val['name'], 0, 15) . '...'; ?></strong>

            </div>                                

          </a>

          <?php

        }

      }

      ?>

    </div>

  </div>

  <div class="pagination">

    <?php

    for ($x = 0; $x < $req_pages; $x++) {

      $disp = $x * $number_to_display;

      $cls = ($start == $disp) ? 'active' : '';

      ?>  

      <a class="paginate_button <?php echo $cls; ?>" href="?start=<?php echo $disp; ?>"><?php echo $x + 1; ?></a>

      <?php

    }

    ?>  

  </div>

</div>

<!-- Media List from Library Ends-->

<script type="text/javascript" src="<?php echo base_url(); ?>assets/sitepanel_new/js/uploader.js"></script>

</body>

</html>