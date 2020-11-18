<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Dream;
use App\Models\Tag;
use Cookie;
use Validator;
  
class AjaxController extends Controller
{
      public function store(Request $request, Dream $dream)
    {
		
		$validator = Validator::make($request->all(), [
		'name' => 'required',
		'description' => 'required',
		'ip' => 'required',
		'image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:5048'
         ]);
		 
		/*$tag = json_decode($request->input('tag'),true);*/
		$tag=$request->input('tag');

		 if ($validator->fails()) {			
			
			return response()->json(['errors'=>$validator->errors()]);

			
		} else {
			
			
			
		$requestData = $request->all();
			
			if ($request->file('image')) {
			
				$imageName = time().'.'.$request->file('image')->extension(); 
				$request->file('image')->move(public_path('images'), $imageName);				
				$requestData['image'] = $imageName;
			}
		
			$dream = Dream::create($requestData);
			$dream->tags()->sync($tag);			
			return response()->json(['id' => $dream->id]);
		
		}

    }
	
	  public function update(Request $request, Dream $dream)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);
        $dream->update($request->all());

	
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
	
	
	
	
	   public function tagstore(Request $request)
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

		
		
			
		
		
    }
	
	
	
	
	
}
