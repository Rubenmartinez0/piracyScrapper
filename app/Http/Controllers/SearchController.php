<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SearchController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        //dd($request->all());

        $validator = Validator::make($request->all(), [
            'searchTerm' => ['required','string', 'max:255'],
    
        ]);
        //dd($validator->data->query);
        if ($validator->passes()) {
            $results['searchTerm'] = $request->searchTerm;
          
            if($request->web1 == '1'){
                $results['weblist'][0] = "nene";
                $results['weblist'][1] = "nena";
            }
        }
  
        
        return view('/', compact('results'));
    }
}
