<?php

namespace App\Http\Controllers\Admin;

use App\Illusion;
use App\Utils\Traits\TermTaxonomyParser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class IllusionController extends Controller
{
    use TermTaxonomyParser;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $illusions = Illusion::paginate(15);
        return view('admin.illusion.index',
            ['illusions' => $illusions]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.illusion.create',
            [
                'termTaxonomies' => $this->getAllTaxonomies(),
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateIllusion($request);
        $data = $request->all();
        $illusion = Illusion::create([
            'illusion_owner' => Auth::user()->id,
            'title' => $data['title'],
            'slug' => isset($data['slug']) ? $data['slug'] : null,
            'content' => $data['content'],
            'excerpt' => $data['excerpt'],
            'thumbnail' => $data['thumbnail'],
            'illusion_priority' => $data['illusion_priority'],
            'illusion_status' => $data['illusion_status'],
        ]);
        return Redirect::route('admin.illusion.index');
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

    protected function validateIllusion(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|unique:illusion|string',
            'content' => 'required|string',
            'excerpt' => 'nullable|string',
            'thumbnail' => 'nullable|url',
            'illusion_priority' => 'required|integer',
            'illusion_status' => 'required|integer',
        ]);
    }
}
