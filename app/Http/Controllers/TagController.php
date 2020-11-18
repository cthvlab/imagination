<?php

namespace App\Http\Controllers;
use App\Models\Dream;
use App\Models\Tag;
use Illuminate\Http\Request;
use Validator;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::latest()->withCount('dreams')->paginate(16);
		
	
		
        return view('tags.index', compact('tags'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      	$validator = Validator::make($request->all(), [
			'name' => 'required|unique:tags|max:55',
			'ip' => 'required'
         ]);

     if ($validator->fails()) {
		
		$exist_tag = Tag::where('name', '=', $request->input('name'))->first();
		
		if (!empty($exist_tag)) {
		return response()->json(['tag_id' => $exist_tag->id]); }
		
		} else {
		
			$data = Tag::create($request->all());
			return response()->json(['tag_id' => $data->id]);
		
		}

		
		
			return redirect()->route('tags.index')->with('success', 'Tag created successfully.');
		
		
    }
	
	
	
	
	

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag, Dream $dream )
    {
		$dreams = $tag->dreams()->paginate(8);		
        return view('tags.show', compact('tag', 'dreams'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('tags.edit', compact('tag'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required|unique:tags|max:55'          
        ]);
        $tag->update($request->all());

        return redirect()->route('tags.index')
            ->with('success', 'Tag updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()->route('tags.index')
            ->with('success', 'Tag deleted successfully');
    }
}
