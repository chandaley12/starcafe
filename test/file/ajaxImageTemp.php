<?php

$data = array();
    //check with your logic
    if (isset($_FILES)) {
        $error = false;
        $files = array();

        $uploaddir = $target_dir;
        foreach ($_FILES as $file) {
            if (move_uploaded_file($file['tmp_name'], $uploaddir . basename( $file['name']))) {
                $files[] = $uploaddir . $file['name'];
            } else {
                $error = true;
            }
        }
        $data = ($error) ? array('error' => 'There was an error uploading your files') : array('files' => $files);
    } else {
        $data = array('success' => 'NO FILES ARE SENT','formData' => $_REQUEST);
    }

    echo json_encode($data);

 /*
$path = "./uploads/";
 
$valid_formats = array("jpg", "png", "gif", "bmp","jpeg");
$data   = array(); 
$data['success'] = false;
 
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
{
    $name = $_FILES['service_image']['name'];
    $size = $_FILES['service_image']['size'];
     
     
    if(strlen($name))
    {       
        list($txt, $ext) = explode(".", $name);
        if(in_array($ext,$valid_formats))
        {
            if($size < ( 1024*1024 )) // Image size max 1 MB
            {
                $actual_image_name = time()."-image.".$ext;
                $tmp = $_FILES['service_image']['tmp_name'];
                if(move_uploaded_file($tmp, $path.$actual_image_name))
                {       
                    $data['success'] = true;
                    $data['url']  = "http://starcafe.ddns.net/uploads/".$actual_image_name;   
                }
                else
                {
                    $data['success'] = false;
                    $data['error'] = "error";
                }
                     
            }
            else
                $data['error'] = "Image file size max 1 MB";
        }
        else
            $data['error'] = "Invalid file format..";
    }
    else
        $data['error'] = "Please select image..!";
}
 
echo json_encode($data);
 */
?>