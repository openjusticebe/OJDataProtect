<?php

namespace App\Models;

class OrganisationUser extends BaseModel
{
    protected $table = 'organisation_user';


    public function organisation()
    {
        return $this->belongsTo('App\Models\Organisation');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
