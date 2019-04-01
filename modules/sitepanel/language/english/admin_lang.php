<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/*
  |--------------------------------------------------------------------------
  | Global
  |--------------------------------------------------------------------------
 */

$lang['activate'] = "Record has been activated successfully.";
$lang['deactivate'] = "Record has been de-activated successfully.";
$lang['deleted'] = "Record has been deleted successfully.";
$lang['successupdate'] = "Record has been updated successfully.";
$lang['order_updated'] = "The Selected Record(s) has been re-ordered.";
$lang['password_incorrect'] = "The Old Password is incorrect";
$lang['recordexits'] = "Record address already exists.";
$lang['success'] = "Record added successfully.";
$lang['paysuccess'] = "Payment added successfully.";
$lang['admin_logout_msg'] = "Logout successfully ..";
$lang['admin_mail_msg'] = "Mail sent Successfully...";
$lang['forgot_msg'] = "Email Id does not exist in database";
$lang['admin_reply_msg'] = "Enquiry reply sent Successfully...";
$lang['pic_uploaded'] = 'Photos has been uploaded successfully.';
$lang['pic_uploaded_err'] = 'Please upload at least one photo.';
$lang['pic_delete'] = 'Photo has been deleted successfully.';

$lang['child_to_deactivate'] = "The selected record(s) has some sub-category/product.Please de-activate them first";
$lang['child_to_activate'] = "The selected record(s) has some sub-category/product.Please activate them first";
$lang['child_to_delete'] = "The selected record(s) has some sub-category/product.Please delete them first";


$lang['marked_paid'] = "The selected record(s) has been marked as Paid";
$lang['payment_succeeded'] = "The payment has been made successfully.";
$lang['payment_failed'] = "The payment has been canceled.";
$lang['email_sent'] = "The Email has been sent successfully to the selected Users/Members.";

$lang['add_coupan'] = "Coupan has been added Successfully!";


$lang['top_menu_list'] = array("Dashboard" => "sitepanel/dashbord",
    "Members Management" => array(
        "Members" => "sitepanel/members",
    ),
    "Product Management" => array(
        "Manage Categories" => "sitepanel/category/",
        "Manage Products" => "sitepanel/products/",
        //"Manage Catalog" => "sitepanel/fullset/",
        //"Manage Attributes" => "sitepanel/attributes",
        //"Stock Report" => "sitepanel/products/report",
        //"Manage Colors" => "sitepanel/color/",
        //"Manage Sizes" => "sitepanel/size/",
    //"Bulk Order Enquiry" => "sitepanel/enquiry/index/4",
    //"Manage Product Enquiry" => "sitepanel/product_enquiry",
    ),
    //"Orders Management" => array(
        //"Order Management" => "sitepanel/orders",
    //),
    "Blog Management" => array(
        "Blogs" => "sitepanel/blog"
    ),
    "Manage Enquiry" => array(
        "Enquiry" => "sitepanel/enquiry/index/3",
        //"Product Enquiry" => "sitepanel/enquiry/index/4",
    ),

    "Newsletter" => array(
        "Newsletter" => "sitepanel/newsletter",
    ),
    "Other Management" => array(
        "Static Pages" => "sitepanel/staticpages",
        "Manage FAQ" => "sitepanel/faq",
        "Manage Testimonials" => "sitepanel/testimonial",
        "Manage Banners" => "sitepanel/banners",
        //"Manage Zip Location" => "sitepanel/zip_location",
        "Manage Brands" => "sitepanel/brands",
        "Manage  Meta Tags" => "sitepanel/meta",
        "Admin Settings" => "sitepanel/setting",
        "Admin Password" => "sitepanel/setting/change_pass"
    ),
);


$lang['top_menu_icon'] = array(
    "Dashboard" => "dashboard",
    "Product Management" => "cubes",
    "Members Management" => "group",
    "Orders Management" => "shopping-cart",
    "Blog Management" => "list-alt",
    "Blogs" => "list",
    "Manage Enquiry" => "pencil-square-o",
    "Enquiry" => "pencil-square-o",
    "Newsletter" => "newspaper-o",
    "Other Management" => "tasks",
    "Members" => "user",
    "Manage Categories" => "sitemap",
    "Manage Products" => "list",
    "Manage Product Enquiry" => "list",
    "Order Management" => "shopping-cart",
    "Enquiry/Feedback" => "question-circle",
    //"Product Enquiry" => "question-circle",
    "Static Pages" => "paperclip",
    "Manage Banners" => "file-image-o",
    "Manage Locations" => "map-marker",
    "Manage State" => "location",
    "Manage City" => "location",
    "Manage FAQ" => "question",
    "Manage  Meta Tags" => "code",
    "Admin Settings" => "wrench",
    "Admin Password" => "lock",
    "Manage Testimonials" => "commenting",
    "Manage Blogs" => "blog",
    "Manage Zip Location" => "zip",
    "Manage Colors" => "paint-brush",
    "Manage Sizes" => "text-height",
    "Manage Brands"=>"list",
    "Stock Report"=>"stock",
    "Manage Pickup Points"=>"",
);

/* Location: ./application/modules/sitepanel/language/admin_lang.php */