<?php

namespace App\Http\Controllers\Api;

use App\Models\Messages;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\MessagesRequest;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Messages::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MessagesRequest $request)
    {
        // Retrieve the validated input data...
         $validated = $request->validated();
         $message = Messages::create($validated);
         return $message;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MessagesRequest $request, string $id)
    {

        $validated = $request->validated();

        $message = Messages::create($validated);

        $message->update($validated);

        return $message;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
