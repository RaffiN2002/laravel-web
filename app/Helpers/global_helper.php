<?php

use App\Models\metadata;

function get_meta_value($metakey){
    $data = metadata::where('metakey',$metakey)->first();
    if($data){
        return $data->metavalue;
    }
}