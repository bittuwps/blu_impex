<?php $this->load->view('includes/face_header'); ?>

<div class="page-content-wrap">
                
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel-heading" style="background-color: #CCCCCC;">
                                    <h3 class="panel-title"><strong> Personal Details : </strong></h3>
                                </div>
                            <div class="panel-body">
                                    
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr valign="top" >
                      <td width="19%" align="left" ><strong>  Name : </strong></td>
                      <td width="25%" align="left" >
					  <?php echo $mres['first_name'].' '.$mres['last_name'];?>
                     </td>
                      <td width="21%" align="left" ><strong>Register Date : </strong></td>
                      <td width="35%" align="left" > <?php echo $mres['account_created_date'];?>
					</td>
                    </tr>
                    <tr valign="top" >
                      <td align="left" ><strong>User Id : </strong></td>
                      <td align="left" ><?php echo $mres['user_name'];?></td>
                      <td align="left" ><strong>Password. :</strong></td>
                      <td align="left" ><?php echo $mres['password'];?></td>
                    </tr>

                    <tr valign="top" >
                      <td align="left" ><strong>Phone Number : </strong></td>
                      <td align="left" ><?php echo $mres['phone_number'];?></td>
                      <td align="left" ><strong>Mobile Number : </strong></td>
                      <td align="left" ><?php echo $mres['mobile_number'];?></td>
                    </tr>       
                  
                    <tr>
                      <td colspan="4">&nbsp;</td>
                    </tr>
                                        </table>
                                    </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel-heading" style="background-color: #CCCCCC;">
                                    <h3 class="panel-title">Billing Address</h3>
                                </div>
                            <div class="panel-body">
                                    
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr valign="top" >
                  <td width="19%" align="left" ><strong> Name : </strong></td>
                  <td width="25%" align="left" ><?php echo $res_bill['first_name'].' '.$res_bill['last_name'];?></td>
                  <td width="19%" align="left" ><strong> Name : </strong></td>
                  <td width="35%" align="left" ><?php echo $res_ship['first_name'].' '.$res_ship['last_name'];?></td>
                </tr>
                <tr valign="top" >
                  <td align="left" ><strong>  Address : </strong></td>
                  <td align="left" ><?php echo $res_bill['address'];?></td>
                  <td align="left" ><strong> Address : </strong></td>
                  <td align="left" ><?php echo $res_ship['address'];?></td>
                </tr>        
               <tr valign="top" >
                  <td align="left" ><strong>Land mark : </strong></td>
                  <td align="left" ><?php echo $res_bill['landmark'];?></td>
                  <td align="left" ><strong>Land mark : </strong></td>
                  <td align="left" ><?php echo $res_ship['landmark'];?></td>
                </tr>
               <tr valign="top" >
                  <td align="left" ><strong>Phone : </strong></td>
                  <td align="left" ><?php echo $res_bill['phone'];?></td>
                  <td align="left" ><strong>Phone : </strong></td>
                  <td align="left" ><?php echo $res_ship['phone'];?></td>
                </tr>
               <tr valign="top" >
                  <td align="left" ><strong>Mobile : </strong></td>
                  <td align="left" ><?php echo $res_bill['mobile'];?></td>
                  <td align="left" ><strong>Mobile : </strong></td>
                  <td align="left" ><?php echo $res_ship['mobile'];?></td>
                </tr>      
                <tr valign="top" >
                  <td align="left" ><strong> Postal code : </strong></td>
                  <td align="left" ><?php echo $res_bill['zipcode'];?></td>
                  <td align="left" ><strong> Postal code : </strong></td>
                  <td align="left" ><?php echo $res_ship['zipcode'];?></td>
                </tr>
                <tr valign="top" >
                  <td align="left" ><strong>Country  : </strong></td>
                  <?php $country_name = $this->db->query("SELECT country_name FROM tbl_country WHERE id='".$res_bill['country']."'")->row();?>
                  <td align="left" ><?php if(count($country_name)>0){ echo $country_name->country_name;}?></td>
                  <td align="left" ><strong>Country  : </strong></td>
                  <?php $country_name = $this->db->query("SELECT country_name FROM tbl_country WHERE id='".$res_ship['country']."'")->row();?>
                  <td align="left" ><?php if(count($country_name)>0){ echo $country_name->country_name;}?></td>
                </tr>
                <tr valign="top" >
                  <td align="left" ><strong>State/Province  :</strong></td>
                  <?php $state_name = $this->db->query("SELECT title FROM tbl_states WHERE id='".$res_bill['state']."'")->row();?>
                  <td align="left" ><?php if(count($state_name)>0){ echo $state_name->title;}?></td>
                  <td align="left" ><strong>State/Province  :</strong></td>
                  <?php $state_name = $this->db->query("SELECT title FROM tbl_states WHERE id='".$res_ship['state']."'")->row();?>
                  <td align="left" ><?php if(count($state_name)>0){ echo $state_name->title;}?></td>
                </tr>
                <tr valign="top" >
                  <td align="left" ><strong>City  : </strong></td>
                  <?php $city_name = $this->db->query("SELECT title FROM tbl_city WHERE id='".$res_bill['city']."'")->row();?>
                  <td align="left" ><?php if(count($state_name)>0){ echo $city_name->title;};?></td>
                  <td align="left" ><strong>City  : </strong></td>
                  <?php $city_name = $this->db->query("SELECT title FROM tbl_city WHERE id='".$res_ship['city']."'")->row();?>
                  <td align="left" ><?php if(count($state_name)>0){ echo $city_name->title;};?></td>
                </tr>
                <tr align="left" valign="top" >
                  <td colspan="4" align="left">&nbsp;</td>
  </tr>
                <tr align="left" valign="top" bgcolor="#FFFFFF" >
                  <td colspan="4" ><span class="b white"><strong> 


 </strong></span></td>
  </tr>
                                        </table>
                                        
                                    </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                                <div class="panel-heading" style="background-color: #CCCCCC;">
                                    <h3 class="panel-title">Shipping Address</h3>
                                </div>
                                <div class="panel-body">
                                    
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr valign="top" >
                  <td width="19%" align="left" ><strong> Name : </strong></td>
                  <td width="25%" align="left" ><?php echo $res_bill['first_name'].' '.$res_bill['last_name'];?></td>
                  <td width="19%" align="left" ><strong> Name : </strong></td>
                  <td width="35%" align="left" ><?php echo $res_ship['first_name'].' '.$res_bill['last_name'];?></td>
                </tr>
                <tr valign="top" >
                  <td align="left" ><strong>  Address : </strong></td>
                  <td align="left" ><?php echo $res_bill['address'];?></td>
                  <td align="left" ><strong> Address : </strong></td>
                  <td align="left" ><?php echo $res_ship['address'];?></td>
                </tr>        
               <tr valign="top" >
                  <td align="left" ><strong>Land mark : </strong></td>
                  <td align="left" ><?php echo $res_bill['landmark'];?></td>
                  <td align="left" ><strong>Land mark : </strong></td>
                  <td align="left" ><?php echo $res_ship['landmark'];?></td>
                </tr>
               <tr valign="top" >
                  <td align="left" ><strong>Phone : </strong></td>
                  <td align="left" ><?php echo $res_bill['phone'];?></td>
                  <td align="left" ><strong>Phone : </strong></td>
                  <td align="left" ><?php echo $res_ship['phone'];?></td>
                </tr>
               <tr valign="top" >
                  <td align="left" ><strong>Mobile : </strong></td>
                  <td align="left" ><?php echo $res_bill['mobile'];?></td>
                  <td align="left" ><strong>Mobile : </strong></td>
                  <td align="left" ><?php echo $res_ship['mobile'];?></td>
                </tr>      
                <tr valign="top" >
                  <td align="left" ><strong> Postal code : </strong></td>
                  <td align="left" ><?php echo $res_bill['zipcode'];?></td>
                  <td align="left" ><strong> Postal code : </strong></td>
                  <td align="left" ><?php echo $res_ship['zipcode'];?></td>
                </tr>
                <tr valign="top" >
                  <td align="left" ><strong>Country  : </strong></td>
                  <?php $country_name = $this->db->query("SELECT country_name FROM tbl_country WHERE id='".$res_bill['country']."'")->row();?>
                  <td align="left" ><?php if(count($country_name)>0){ echo $country_name->country_name;}?></td>
                  <td align="left" ><strong>Country  : </strong></td>
                  <?php $country_name = $this->db->query("SELECT country_name FROM tbl_country WHERE id='".$res_ship['country']."'")->row();?>
                  <td align="left" ><?php if(count($country_name)>0){ echo $country_name->country_name;}?></td>
                </tr>
                <tr valign="top" >
                  <td align="left" ><strong>State/Province  :</strong></td>
                  <?php $state_name = $this->db->query("SELECT title FROM tbl_states WHERE id='".$res_bill['state']."'")->row();?>
                  <td align="left" ><?php if(count($state_name)>0){ echo $state_name->title;}?></td>
                  <td align="left" ><strong>State/Province  :</strong></td>
                  <?php $state_name = $this->db->query("SELECT title FROM tbl_states WHERE id='".$res_ship['state']."'")->row();?>
                  <td align="left" ><?php if(count($state_name)>0){ echo $state_name->title;}?></td>
                </tr>
                <tr valign="top" >
                  <td align="left" ><strong>City  : </strong></td>
                  <?php $city_name = $this->db->query("SELECT title FROM tbl_city WHERE id='".$res_bill['city']."'")->row();?>
                  <td align="left" ><?php if(count($city_name)>0){ echo $city_name->title;}?></td>
                  <td align="left" ><strong>City  : </strong></td>
                  <?php $city_name = $this->db->query("SELECT title FROM tbl_city WHERE id='".$res_ship['city']."'")->row();?>
                  <td align="left" ><?php if(count($city_name)>0){ echo $city_name->title;}?></td>
                </tr>
                <tr align="left" valign="top" >
                  <td colspan="4" align="left">&nbsp;</td>
  </tr>
                <tr align="left" valign="top" bgcolor="#FFFFFF" >
                  <td colspan="4" ><span class="b white"><strong> 


 </strong></span></td>
  </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                    </div>
</div>

</body>
</html>