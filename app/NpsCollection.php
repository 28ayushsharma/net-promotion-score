<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NpsCollection extends Model
{
    protected $table = 'nps_collection';
    protected $fillable = ["user_id","nps_form_id","email","rating","remark","survey_token","submitted_on"];

    public function nps_form()
    {
        return $this->belongsTo('App\NpsForms','nps_form_id');
    }
}
