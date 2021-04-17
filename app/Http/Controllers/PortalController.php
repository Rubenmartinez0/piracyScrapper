<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portal;

class PortalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portals = Portal::all();
        return view('portal/index', compact('portals'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createView()
    {
        return view('portal/create');
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
        $data = request()->validate([
            'name' => ['required','string', 'min:3', 'max:255', 'unique'],
            'homeUrl' => ['nullable', 'regex:/^[a-zA-Z]+$/u', 'string', 'max:55'],
            'searchUrl' => ['nullable', 'regex:/^[a-zA-Z]+$/u', 'string', 'max:55'],
            'spaceSubstitute' => ['required', 'string', 'min:1', 'max:10'],
        ]);

        Portal::create($data);
        
        return redirect("/portal/index")->with('success','Portal "'. $request->name .'" created sucessfully.');
    }
}
