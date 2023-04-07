<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
// use App\Models\UserResourceModel;
use App\Models\User;
use Illuminate\Http\Request;

class UserResourceController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::all();
    }

        /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sample = User::find($id);

        $sample->delete();

        return $sample;
    }
}
