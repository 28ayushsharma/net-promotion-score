<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NpsForms extends Model
{
    //protected $table = 'fees_received';
    protected $fillable = ["title","question","user_id"];
}
