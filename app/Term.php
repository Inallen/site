<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    protected $fillable = [
        'term_title',
        'term_slug',
    ];

    protected $table = 'terms';

    public function termTaxonomy()
    {
        return $this->hasOne('App\TermTaxonomy', 'term_id');
    }
}
