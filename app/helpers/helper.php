<?php

use App\Models\Log;


define('PAGINATION_COUNT', 10);

function uploadImage($folder,$image){
    $image->store('/', $folder);
    $filename = $image->hashName();
    return  $filename;
}

function replaceurl($url){
    return   str_replace('http://127.0.0.1:8000/', '',  $url);
}
function logsHelper($title){
    //Create Row in Logs
    $Logs = new Log();
    $Logs->user_id= auth()->user()->id;
    $Logs->title =auth()->user()->name . ' ' .$title;
    $Logs->save();
    //End Create Row in Logs
    return  $Logs;
}
