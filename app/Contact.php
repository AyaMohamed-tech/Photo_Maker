<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'company_name',
        'activity_type',
        'contact_number',
        'email',
      ];
}
