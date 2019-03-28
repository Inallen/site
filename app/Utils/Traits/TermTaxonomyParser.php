<?php

namespace App\Utils\Traits;


use App\TermTaxonomy;

trait TermTaxonomyParser
{
    protected $termTaxonomies;

    protected $taxonomies = array();

    protected function getTaxonomies($taxonomies, $level = 0)
    {
        foreach ($taxonomies as $taxonomy) {
            $taxonomy->setLevel($level);
            $this->taxonomies[] = $taxonomy;
            if ($taxonomy->childTermTaxonomies->count() > 0) {
                $this->getTaxonomies($taxonomy->childTermTaxonomies, $level + 1);
            }
        }
        return $this->taxonomies;
    }

    protected function getAllTaxonomies() {
        $this->termTaxonomies = TermTaxonomy::where('term_taxonomy_parent', 0)
            ->where('term_taxonomy', 'category')
            ->get();
        return $this->getTaxonomies($this->termTaxonomies);
    }
}
