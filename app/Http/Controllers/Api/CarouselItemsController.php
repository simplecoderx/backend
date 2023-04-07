<?php

namespace App\Http\Controllers\Api;

use App\Models\CarouselItems; //import the mode, importing base on file
use App\Http\Controllers\Controller;
use App\Http\Requests\CarouselItemsRequest;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class CarouselItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CarouselItems::all();
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(CarouselItemsRequest $request)
    {
        // Retrieve the validated input data...
        $validated = $request->validated();

        $carouselItem = CarouselItems::create(
            $validated
            // [
            // 'carousel_name'=> $request->carousel_name, 
            // 'image_path'=> $request->image_path,
            // 'description'=> $request->description,
            //  'user_id'=> $request->user_id,

            // ]
        );

        return $carouselItem;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // return CarouselItems::find($id); 
        return CarouselItems::findOrFail($id);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(CarouselItemsRequest $request, string $id)
    {
        // Retrieve the validated input data...
        $validated = $request->validated();

        $carouselItem = CarouselItems::findOrFail($id);

        $carouselItem->update($validated);

        return $carouselItem;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $carouselItem = CarouselItems::find($id);

        $carouselItem->delete();

        return $carouselItem;
    }
}
