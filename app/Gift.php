<?php

namespace ActivismeBe;

use Illuminate\Database\Eloquent\Model;

class Gift extends Model
{
    /**
     * Mass-assign velpden voor de database tabel.
     *
     * @var array
     */
    protected $fillable = ['backer_id', 'amount', 'transaction_id'];
}
