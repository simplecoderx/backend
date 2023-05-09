<?php

namespace App\Http\Controllers\Api;

use App\Models\Transprompt;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

class TranslateController extends Controller
{
/**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Transprompt::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    /**
     * Store a newly created resource in storage.
     */
    public function storetransprompt(UserRequest $request)
    {
        // Retrieve the validated input data...
        $validated = $request->validated();

        $prompt = Transprompt::create(
            $validated
        );

        return $prompt;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Transprompt::findOrFail($id);
    }

   
    /**
     * Destroy the specified resource.
     */ 
    public function destroy(string $id)
    {
        $user = Transprompt::findOrFail($id);

        $user->delete();

        return $user;
    }
}
