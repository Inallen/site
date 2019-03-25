<?php

namespace App\Http\Controllers\Admin;

use App\Term;
use App\TermTaxonomy;
use App\Utils\Traits\TermTaxonomyParser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class TermController extends Controller
{
    use TermTaxonomyParser;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->termTaxonomies = TermTaxonomy::where('term_taxonomy_parent', 0)
            ->where('term_taxonomy', 'category')
            ->get();

        return view('admin.term.index',
            [
                'termTaxonomies' => $this->getTaxonomies($this->termTaxonomies),
                'termOptions' => $this->getTaxonomyOptions($this->termTaxonomies)
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateTerm($request);
        $data = $request->all();
        DB::beginTransaction();
        try{
            $term = Term::create([
                'term_title' => $data['term_title'],
                'term_slug' => isset($data['term_slug']) ? $data['term_slug'] : null,
            ]);
            TermTaxonomy::create([
                'term_id' => $term->id,
                'term_taxonomy' => isset($data['term_taxonomy']) ? $data['term_taxonomy'] : 'category',
                'term_taxonomy_parent' => $data['term_taxonomy_parent'],
            ]);
            DB::commit();
        }catch (\Exception $e) {
            DB::rollBack();
        }
        return Redirect::route('admin.term.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    protected function validateTerm(Request $request)
    {
        $request->validate([
            'term_title' => 'required|string|max:255',
            'term_slug' => 'nullable|unique:terms|string|max:255',
            'term_taxonomy_parent' => 'nullable|integer',
        ]);
    }
}
