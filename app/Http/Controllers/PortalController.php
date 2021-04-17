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
}
