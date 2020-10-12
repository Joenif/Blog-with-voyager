<?php

function image_format($filename, $format='') {
    // Get image extension 
    if (!empty($format)) {
        $ext = pathinfo($filename, PATHINFO_EXTENSION);

        // Remove the image extension from the image
        $name = rtrim($filename, '.'.$ext);
    
        // Merge the original name + format and extension 
        $image = $name . '-' . $format . '.' . $ext;
        
    }
    else $image = $filename;
    
    return $image;  
    
}

function userPost($id) {
    $posts = App\Posts::find($id);

    return $posts->author_id;
}