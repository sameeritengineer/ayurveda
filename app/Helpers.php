<?php

    // common function for image uploading
    if (!function_exists('upload_image')) {
        function upload_image($uploadPath,$image) {
            $ext = $image->getClientOriginalExtension(); // Get the file extension
            // Generate a unique name based on the current time in microseconds
            $microtime = microtime(true); 
            $name = sprintf('%s.%s', str_replace('.', '', $microtime), $ext);
            $file_url = $uploadPath . $name;
            $image->move($uploadPath, $name);
            return $file_url;
        }
    }

?>