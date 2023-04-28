<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class background extends Model
{
    use HasFactory;
    protected $table ="background";
    protected $fillable =['title','type','start','end','info1','info2','info3','content'];

    protected $appends = ['start_id','end_id'];

    public function getStartIdAttribute(){
        return Carbon::parse($this->attributes['start'])->translatedFormat('d F Y');
    }

    public function getEndIdAttribute(){
        if($this->attributes['end']){
            return Carbon::parse($this->attributes['end'])->translatedFormat('d F Y');
        }
        else{
            return'Present';
        }
    }
}
