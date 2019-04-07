<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailNps extends Model
{
    protected $table = 'emailed_nps';
    protected $fillable = ["user_id","nps_form_id","email","survey_token"];
}
