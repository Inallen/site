<?php

namespace App\Utils\Traits;


trait TermTaxonomyParser
{
    protected $termTaxonomies;

    protected $termTaxonomyOptions = array();

    protected $taxonomies = array();

    public function getTaxonomyOptions($termTaxonomies, $prefix = '')
    {
        foreach ($termTaxonomies as $termTaxonomy) {
            $this->termTaxonomyOptions[$termTaxonomy->id] = $prefix . $termTaxonomy->term->term_title;
            if ($termTaxonomy->childTermTaxonomies->count() > 0) {
                $this->getTaxonomyOptions($termTaxonomy->childTermTaxonomies, $prefix . '&nbsp;&nbsp;&nbsp;' );
            }
        }
        return $this->termTaxonomyOptions;
    }

    public function getTaxonomies($taxonomies)
    {
        foreach ($taxonomies as $taxonomy) {
            $this->taxonomies[] = $taxonomy;
            if ($taxonomy->childTermTaxonomies->count() > 0) {
                $this->getTaxonomies($taxonomy->childTermTaxonomies);
            }
        }
        return $this->taxonomies;
    }
}
