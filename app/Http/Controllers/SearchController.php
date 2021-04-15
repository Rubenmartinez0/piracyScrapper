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
        $portals = Portal::whereNotNull('searchUrl')->get();
        return view('index', compact('portals'));
    }



   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $portals = Portal::whereNotNull('searchUrl')->get();
        
        $validator = Validator::make($request->all(), [
            'searchTerm' => ['required','string', 'min:1', 'max:255'],
        ]);
        
        if ($validator->passes()) {
             $portalsToQuery = Portal::whereIn('id', $request->portalsToQuery)->get();
             $query = $request->searchTerm;

            foreach($portalsToQuery as $portal){

                if($portal->homeUrl == 'https://movidy.mobi/'){
                    $query = trim($query);
                    
                    $queryaux = str_replace(' ', '%20', $query);
                    $url = 'https://movidy.mobi/search?query='.$queryaux;
                    $portal->link = $url;
                }

                if($portal->homeUrl == 'https://imdb.com/'){
                    $query = trim($query);
                    
                    $queryaux = str_replace(' ', '+', $query);
                    $url = 'https://imdb.com/find?q='.$queryaux;
                    $portal->link = $url;
                }

                if($portal->homeUrl == 'https://eztv.re/'){
                    $query = trim($query);
                    
                    $queryaux = str_replace(' ', '-', $query);
                    $url = 'https://eztv.re/search/'.$queryaux;
                    $portal->link = $url;
                }

                if($portal->homeUrl == 'https://yts.unblockit.club/'){
                    $query = trim($query);
                    
                    $queryaux = str_replace(' ', '%20', $query);
                    $url = 'https://yts.unblockit.club/browse-movies/shutter%20island/all/all/0/latest/0/all';
                    $url = str_replace('*query*', $queryaux, $url);
                    $portal->link = $url;
                }
            }
        }else{
            return view('index', compact('query'))->with('message', 'Failed to search');
        }
        //dd($portalsToQuery);
        return view('index', compact('query', 'portals', 'portalsToQuery'));
    }
}
