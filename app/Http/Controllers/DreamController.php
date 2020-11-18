<?php

namespace App\Http\Controllers;

use App\Models\Dream;
use App\Models\Tag;
use Illuminate\Http\Request;
use Cookie;
use Validator;


class DreamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dreams = Dream::latest()->paginate(8);		
		$tags = Tag::All();
	
        return view('dreams.index', compact('dreams', 'tags'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Dreams $dream)
    {
		$tags = Tag::All();
        return view('dreams.create', compact('dream', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Dream $dream)
    {


		
		$validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
			'ip' => 'required'
         ]);
		 
	
		

		 if ($validator->fails()) {
			
			
			return response()->json(['errors'=>$validator->errors()]);

			
			} else {
			
				$dream = Dream::create($request->all());
				$dream->tags()->sync($request->input('tag'));			
				
			
			}	
		
		
		
		

        return redirect()->route('dreams.index')
            ->with('success', 'Dream created successfully.');
    }

    
    public function show(Dream $dream)
    {
		$next = Dream::where('id', '>', $dream->id)->first();
		$prew = Dream::where('id', '<', $dream->id)->first();
        return view('dreams.show', compact('dream', 'next', 'prew'));
    }

   
    public function edit(Dream $dream)	
    {	
		$tags = Tag::All();
        return view('dreams.edit', compact('dream', 'tags'));
    }
 
 
    public function update(Request $request, Dream $dream)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
			'ip' => 'required',
			'image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:5048'
        ]);
		
		
		$requestData = $request->all();
			
			if ($request->file('image')) {
			
				$imageName = time().'.'.$request->file('image')->extension(); 
				$request->file('image')->move(public_path('images'), $imageName);				
				$requestData['image'] = $imageName;
			}
		
			
		
        $dream->update($requestData);

	
		$dream->tags()->sync($request->input('tag'));
		

        return redirect()->route('dreams.index')
            ->with('success', 'Dream updated successfully');
    }


    public function destroy(Dream $dream)
    {
        $dream->delete();

        return redirect()->route('dreams.index')
            ->with('success', 'Dream deleted successfully');
    }
	
	
	

	 
}
