<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Input;
class AutocompleteController extends Controller
{
     public function index()
    {
    	return view('customer.customer');
    }
    public function autocomplete(Request $request)
    {
    	$term=$request->term;
    	$data=Customer::where('name','LIKE','%'.$term.'%')
    	->take(10)
    	->get();
    	$results=array();
    	foreach ($data as $key => $v) 
    	{
   		   $results[]=['id'=>$v->id,'value'=>$v->name];
   		}
   	    return response()->json($results);

    }}
