<?php

namespace App\Http\Controllers\Api;

use App\Models\Prompt;
use App\Http\Controllers\Controller;
use App\Http\Requests\PromptsRequest;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;

class PromptsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Prompt::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function prompts(UserRequest $request)
    {
        // Retrieve the validated input data...
        $validated = $request->validated();

        $prompt = Prompt::create(
            $validated
            // [
            // 'carousel_name'=> $request->carousel_name, 
            // 'image_path'=> $request->image_path,
            // 'description'=> $request->description,
            //  'user_id'=> $request->user_id,

            // ]
            
        );

        return $prompt;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // return CarouselItems::find($id); 
        return Prompt::findOrFail($id);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Prompt::findOrFail($id);

        $user->delete();

        return $user;
    }
}
