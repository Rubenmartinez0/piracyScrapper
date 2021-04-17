<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Portal;
use Goutte\Client;

use HeadlessChromium\BrowserFactory;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portals = Portal::whereNotNull(['searchUrl', 'spaceSubstitute'])->get();
        return view('index', compact('portals'));
    }


   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        // Get all the portals in database with searchUrl and spaceSubstitute attributes
        $portals = Portal::whereNotNull(['searchUrl', 'spaceSubstitute'])->get();
        
        $validator = Validator::make($request->all(), [
            'searchTerm' => ['required','string', 'min:1', 'max:255'],
        ]);
        
        if ($validator->passes()) {
             $portalsToQuery = Portal::whereIn('id', $request->portalsToQuery)->get();
             $query = $request->searchTerm;
             $query = trim($query);

            foreach($portalsToQuery as $portal){
                // Replace the space for the assignted string
                $queryaux = str_replace(' ', $portal->spaceSubstitute, $query);
                // Concat both strings and assign it to a new $portal attribute(link)
                $portal->link = $portal->searchUrl.$queryaux;
            }
        }else{
            return view('index', compact('query'))->with('message', 'Failed to search');
        }
        return view('index', compact('query', 'portals', 'portalsToQuery'));
    }
}
