<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\PropertyType;

class BackendController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //Total no of Properties 
        $total_prop=Slider::count();

      //Sold Out Properties
        $total_sales=Slider::where('property_status',0)->count();

      //For Sale(Active) Properties
      $total_active=Slider::where('property_status',1)->count();

      //Property type Count
      $total_commercial=Slider::where('property_type','Commercial')->count();
      $total_residental=Slider::where('property_type','Residental')->count();

        return view('backend.index',compact('total_prop','total_sales','total_active','total_commercial','total_residental'));
    }

//ajax call for cost analysis

    public function getPropertyDetails()
    {
      $property_details=Slider::all();
      echo json_encode($property_details);
    }
}
