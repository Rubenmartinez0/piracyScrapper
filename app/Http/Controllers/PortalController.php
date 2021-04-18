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
        
        $data = request()->validate([
            'name' => ['required','string', 'min:3', 'max:50', 'unique:portals'],
            'homeUrl' => ['required', 'url', 'string', 'max:50', 'unique:portals'],
            'searchUrl' => ['required', 'url', 'string', 'max:50', 'unique:portals'],
            'spaceSubstitute' => ['required', 'string', 'min:1', 'max:10'],
        ]);
        Portal::create($data);
        $insertsFile = fopen("createdPortalsSQL.txt", "a+") or die("Unable to open file!");
        $name = $data['name'];
        $homeUrl = $data['homeUrl'];
        $searchUrl = $data['searchUrl'];
        $spaceSubstitute = $data["spaceSubstitute"];
        //Write in file SQL query
        $text = "INSERT INTO piracyScrapper.portals (name, homeUrl, searchUrl, spaceSubstitute) VALUES ('".$name."','".$homeUrl."','".$searchUrl."','".$spaceSubstitute."');\n";
        fwrite($insertsFile, $text);
        fclose($insertsFile);
        //Write in file Laravel Seeder
        $insertsFileSeeders = fopen("insertsFileSeeders.txt", "a+") or die("Unable to open file!");
        $text = "'name' => '".$name."', 'homeUrl' => '".$homeUrl."', 'searchUrl' => '".$searchUrl."', 'spaceSubstitute' => '".$spaceSubstitute."'],\n";
        fwrite($insertsFileSeeders, $text);
        fclose($insertsFileSeeders);

        return redirect("/portals")->with('success','Portal "'. $request->name .'" created sucessfully.');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function editView(int $portalId)
    {
        $portal = Portal::where('id', '=', $portalId)->first();
        return view("/portal/edit", compact('portal'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $portalId)
    {
        
        $data = request()->validate([
            'name' => ['required','string', 'min:3', 'max:50', 'unique:portals,name,'.$portalId.',id'],
            'homeUrl' => ['nullable', 'url', 'string', 'max:50', 'unique:portals,homeUrl,'.$portalId.',id'],
            'searchUrl' => ['nullable', 'url', 'string', 'max:50', 'unique:portals,searchUrl,'.$portalId.',id'],
            'spaceSubstitute' => ['nullable', 'string', 'min:1', 'max:10'],
        ]);
        $portal = Portal::where('id', '=', $portalId)->first();
        $portal->update($data);

        return redirect("/portals")->with('success','Portal "'. $portal->name .'" EDITED sucessfully.');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(int $portalId)
    {
        $portal = Portal::where('id', '=', $portalId)->first();
        $portal->delete();
        return redirect("/portals")->with('success','Portal "'. $portal->name .'" deleted sucessfully.');
    }
}
