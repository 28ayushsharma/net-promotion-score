<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NpsKey extends Model
{
    protected $table = 'nps_code_keys';
    protected $fillable = ["user_id","nps_form_id","nps_code_key"];

    public function nps_form()
    {
        return $this->belongsTo('App\NpsForms','nps_form_id');
    }
}
