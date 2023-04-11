<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
function unzip($file){ 
    $zip = zip_open($file); 
    if(is_resource($zip)){ 
        $tree = ""; 
        while(($zip_entry = zip_read($zip)) !== false){ 
            echo "Unpacking ".zip_entry_name($zip_entry)."\n"; 
            if(strpos(zip_entry_name($zip_entry), DIRECTORY_SEPARATOR) !== false){ 
                $last = strrpos(zip_entry_name($zip_entry), DIRECTORY_SEPARATOR); 
                $dir = substr(zip_entry_name($zip_entry), 0, $last); 
                $file = substr(zip_entry_name($zip_entry), strrpos(zip_entry_name($zip_entry), DIRECTORY_SEPARATOR)+1); 
                if(!is_dir($dir)){ 
                    @mkdir($dir, 0755, true) or die("Unable to create $dir\n"); 
                } 
                if(strlen(trim($file)) > 0){ 
                    $return = @file_put_contents($dir."/".$file, zip_entry_read($zip_entry, zip_entry_filesize($zip_entry))); 
                    if($return === false){ 
                        die("Unable to write file $dir/$file\n"); 
                    } 
                } 
            }else{ 
                file_put_contents($file, zip_entry_read($zip_entry, zip_entry_filesize($zip_entry))); 
            } 
        } 
    }else{ 
        echo "Unable to open zip file\n"; 
    } 
} 
unzip("archive.zip");
?>
</body>
</html>
