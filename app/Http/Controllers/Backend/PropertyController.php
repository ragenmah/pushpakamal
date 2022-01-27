<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Flash;
use Log;
use Auth;
use Carbon\Carbon;
use App\Models\PropertyType;

class PropertyController extends Controller
{

   public function __construct()
   {
         // Page Title
         $this->module_title = 'Properties';

         // module name
         $this->module_name = 'properties';
 
         // directory path of the module
         $this->module_path = 'properties';
 
         // module icon
         $this->module_icon = 'c-icon fa fa-book-open';
 
         // module model name, path
         $this->module_model = "App\Models\PropertyType";


   }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'List';

         $properties=$module_model::paginate();
         return view('backend.'.$module_name.'.index',compact('module_title', 'module_name',  'module_path', 'module_icon', 'module_action', 'module_name_singular','properties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'Create';

        return view('backend.'.$module_name.'.create',compact('module_title', 'module_name',  'module_path', 'module_icon', 'module_action', 'module_name_singular'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;

    $request->validate([
              
           'property_type'=>'required',
           'accomodation_status'=>'required',
           
       ]);

       $property=new PropertyType();
       $property->property_type=$request->property_type;
       $property->accomodation_status=$request->accomodation_status;
       $property->save();

       Flash::success("<i class='fas fa-check'></i> New '".Str::singular($module_title)."' Added")->important();
       return redirect()->route('backend.'.$module_name.'.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'Show';

        $property=$module_model::findOrFail($id);

        return view('backend.'.$module_name.'.show',compact('module_title', 'module_name',  'module_path', 'module_icon', 'module_action', 'module_name_singular','property'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!auth()->user()->can('edit_users')) {
            abort(404);
        }

        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'Edit';

        $property=$module_model::findOrFail($id);
       
        return view('backend.'.$module_name.'.edit',compact('module_title', 'module_name',  'module_path', 'module_icon', 'module_action', 'module_name_singular','property'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!auth()->user()->can('edit_users')) {
            abort(404);
        }

        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'Update';
   
        $this->validate($request, [
            'property_type'=>'required',
            'accomodation_status'=>'required',
        ]);

        $property=$module_model::findOrFail($id);
        $property->property_type=$request->property_type;
        $property->accomodation_status=$request->accomodation_status;
        $property->save();
        Flash::success("<i class='fas fa-check'></i> '".Str::singular($module_title)."' Updated Successfully")->important();
        return redirect()->route('backend.'.$module_name.'.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_name_singular = Str::singular($this->module_name);
        $module_path = $this->module_path;
        $module_model = $this->module_model;

        $module_action = 'destroy';
       
        $property = $module_model::findOrFail($id);

       $property->delete();
        flash('<i class="fas fa-check"></i> '.Str::singular($module_title).' Successfully Deleted!')->important();
        return redirect()->route('backend.'.$module_name.'.index');
    }


     /**
     * List of trashed ertries
     * works if the softdelete is enabled.
     *
     * @return Response
     */
    public function trashed()
    {
        
        $module_name = $this->module_name;
        $module_title = $this->module_title;
        $module_name_singular = Str::singular($this->module_name);
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;

        $module_action = 'List';
        $page_heading = $module_title;

        $$module_name = $module_model::onlyTrashed()->orderBy('deleted_at', 'desc')->paginate();

        Log::info(label_case($module_action).' '.label_case($module_name).' by User:'.auth()->user()->name);

        return view(
            "backend.$module_name.trash",
            compact('module_name', 'module_title', "$module_name", 'module_icon', 'page_heading', 'module_action')
        );
    }

     /**
     * Restore a soft deleted entry.
     *
     * @param Request $request
     * @param int     $id
     *
     * @return Response
     */
    public function restore($id)
    {
        $module_name = $this->module_name;
        $module_title = $this->module_title;
        $module_name_singular = Str::singular($this->module_name);
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;

        $module_action = 'Restore';

        $$module_name_singular = $module_model::withTrashed()->find($id);
        $$module_name_singular->restore();


        Flash::success("<i class='fas fa-check'></i> '".Str::singular($module_title)."' Successfully Restoreded!")->important();

        Log::info(label_case($module_action)." '$module_name': '".$$module_name_singular->name.', ID:'.$$module_name_singular->id." ' by User:".auth()->user()->name);

        return redirect("admin/$module_name");
    }

   /**
     * Permanent Delete.
     *
    
     * @param int     $id
     *
     * @return Response
     */

    public function actualDelete($id){


        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_name_singular = Str::singular($this->module_name);
        $module_path = $this->module_path;
        $module_model = $this->module_model;


        $property = $module_model::withTrashed()->findOrFail($id);

        $property->forceDelete();
        flash('<i class="fas fa-check"></i> '.Str::singular($module_title).' Permanently Deleted!')->important();
        return redirect()->route('backend.'.$module_name.'.index');


     }


}
