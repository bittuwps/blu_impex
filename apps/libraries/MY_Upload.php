<?php

/**

 * CI-CMS Upload class overwrite

 * This file is part of CI-CMS

 * @package   CI-CMS

 * @copyright 2008 Hery.serasera.org

 * @license   http://www.gnu.org/licenses/gpl.html

 * @version   $Id$

 */

if (!defined('BASEPATH')) {

    exit('No direct script access allowed');

}

class MY_Upload extends CI_Upload
{

    private $CI;

    public function __construct()
    {

        parent::__construct();

        $this->CI = &get_instance();

    }

    /**

     * Verify that the filetype is allowed

     * using file extension instead of mime

     *

     * @access      public

     * @return      bool

     */

    public function is_allowed_filetype()
    {

        if (count($this->allowed_types) == 0 or !is_array($this->allowed_types)) {

            $this->set_error('upload_no_file_types');

            return false;

        }

        foreach ($this->allowed_types as $val) {

            if ("." . strtolower($val) == strtolower($this->file_ext)) {

                return true;

            }

        }

        return false;

    }

    public function my_upload($filed, $path)
    {

        $CI = $this->CI;

        $CI->load->library('upload');

        $config['upload_path'] = UPLOAD_DIR . '/' . $path . '/';

        $config['allowed_types'] = strtolower(file_ext($_FILES[$filed]['name']));

        $config['max_size'] = '0';

        $config['max_width'] = '0';

        $config['max_height'] = '0';

        $config['remove_spaces'] = true;

        $CI->upload->initialize($config);

        if (!$CI->upload->do_upload($filed)) {

            $error = array('error' => $CI->upload->display_errors());

        } else {

            $data1 = array('upload_data' => $CI->upload->data($filed));

            //Upload to old app folder

            /*if (isset($_FILES[$filed])) {

            $path1 = 'http://app.256gbserver.com/wts/web_apis/utility/saveImage';

            $filename = $_FILES[$filed]['tmp_name'];

            $handle = fopen($filename, "r");

            $data = fread($handle, filesize($filename));

            $POST_DATA = array(

            'file' => base64_encode($data),

            'folder' => $path,

            'filename'=>$data1['upload_data']['file_name']

            );

            $curl = curl_init();

            curl_setopt($curl, CURLOPT_URL, $path1);

            curl_setopt($curl, CURLOPT_TIMEOUT, 30);

            curl_setopt($curl, CURLOPT_POST, 1);

            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

            curl_setopt($curl, CURLOPT_POSTFIELDS, $POST_DATA);

            $response = curl_exec($curl);

            curl_close($curl);

            //echo $response;

            //exit;

            }*/

            return $data1;

        }

    }

    public function multipe_upload($path, $filname, $file_num)
    {

        $CI = $this->CI;

        $CI->load->library('upload');

        $uploadedFiles = array();

        $config['upload_path'] = UPLOAD_DIR . '/' . $path . '/';

        $config['remove_spaces'] = true;

        for ($i = 1; $i <= $file_num; $i++) {

            if (array_key_exists($filname . $i, $_FILES) && $_FILES[$filname . $i]['name'] != "") {

                $config['allowed_types'] = file_ext($_FILES[$filname . $i]['name']);

                $CI->upload->initialize($config);

                $upload = $CI->upload->do_upload($filname . $i);

                /* File failed to upload - continue */

                if ($upload === false) {

                    $uploadedFiles[$i] = '';

                    $error[$i] = array('error' => $CI->upload->display_errors());

                } else {

                    /* Get the data about the file */

                    $data = $CI->upload->data($filname . $i);

                    $uploadedFiles[$i] = $data;

                }

            }

        }

        return $uploadedFiles;

    }

    // --------------------------------------------------------------------

    /**

     * Prep Filename

     *

     * Prevents possible script execution from Apache's handling of files multiple extensions

     * http://httpd.apache.org/docs/1.3/mod/mod_mime.html#multipleext

     *

     * @param    string

     * @return    string

     */

    protected function _prep_filename($filename)
    {

        if (strpos($filename, '.') === false or $this->allowed_types == '*') {

            return $filename;

        }

        $parts = explode('.', $filename);

        $ext = array_pop($parts);

        $filename = array_shift($parts);

        foreach ($parts as $part) {

            if (!in_array(strtolower($part), $this->allowed_types) or $this->mimes_types(strtolower($part)) === false) {

                $filename .= '.' . $part . '_';

            } else {

                $filename .= '.' . $part;

            }

        }

        $filename .= random_string('alnum', 4) . '.' . $ext;

        return $filename;

    }

}
