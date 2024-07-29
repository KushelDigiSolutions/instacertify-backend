<?php

if (! function_exists('imageUpload')) {
    function imageUpload($file,$path) {
        if($file)
        {
            $image = $file;
            $name = rand().time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path($path);
            $image->move($destinationPath, $name);
        }
        else
        {
            $name='';
        }
        return $name;
    }
}
