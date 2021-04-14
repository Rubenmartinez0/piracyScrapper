<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Portal;

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
                if($portal->homeUrl == "https://movidy.mobi/"){
                    $query = trim($query);
                    $query = str_replace(' ', '%20', $query);
                    //dd($query); 
                    $url = "https://movidy.mobi/"."search?query=".$query;
                    include('simple_html_dom.php');
                    $html = file_get_html("https://www.w3schools.com/php/default.asp");
                    
                    //$list = $html->find('div[class="title"]',0);
                    //$list = $html->find('figure[class="item ng-star-inserted"]',0);
                    //$list = $html->find('figcaption a')->plaintext;

                    $list = $html->find('div[class="w3-bar w3-left"]',0);
                    $resultado = [];
                    foreach($list->find('a') as $element){
                        array_push($resultado, $element->title);
                    }
                    dd($resultado);
                    
                   
                }
            }
            //dd($portalsToQuery[1]);
        }else{
            return view('index', compact('query'))->with('message', 'Failed to search');
        }
        //dd($portalsToQuery);
        return view('index', compact('query', 'portals', 'portalsToQuery'));
    }
}
