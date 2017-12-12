<?php

namespace ActivismeBe;

use Illuminate\Database\Eloquent\Model;

class Backer extends Model
{
    /**
     * Mass-assign velden voor de databank tabel. 
     * 
     * @var array
     */
    protected $fillable = ['firstname', 'lastname', 'email', 'street_name', 'huis_nr', 'postal_code', 'city'];
}
