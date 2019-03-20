<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TermTaxonomy extends Model
{
    protected $fillable = [
        'id',
        'term_id',
        'term_taxonomy',
        'term_slug',
        'term_taxonomy_parent',
        'count',
    ];

    protected $table = 'term_taxonomy';

    public function term()
    {
        return $this->belongsTo('App\Term', 'term_id');
    }

    public function childTermTaxonomies()
    {
        return $this->hasMany('App\TermTaxonomy', 'term_taxonomy_parent');
    }

    public function parentTermTaxonomy()
    {
        return $this->belongsTo('App\TermTaxonomy', 'term_taxonomy_parent');
    }
}
