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

    protected $level;

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

    /**
     * @return integer
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @param integer $level
     */
    public function setLevel($level)
    {
        $this->level = $level;
    }


}
