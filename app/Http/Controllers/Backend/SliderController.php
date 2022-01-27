<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Gallery;
use App\Models\PropertyType;
use Illuminate\Support\Str;
use Flash;
use Log;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    public function __construct()
    {
        // Page Title
        $this->module_title = 'Properties';

        // module name
        $this->module_name = 'sliders';

        // directory path of the module
        $this->module_path = 'sliders';

        // module icon
        $this->module_icon = 'c-icon fa fa-book';

        // module model name, path
        $this->module_model = "App\Models\Slider";
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

         $sliders=$module_model::paginate();
         return view('backend.'.$module_name.'.index',compact('module_title', 'module_name',  'module_path', 'module_icon', 'module_action', 'module_name_singular','sliders'));
        
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

        $row_count =  $module_model::count(); 
        $properties=PropertyType::all();
        return view('backend.'.$module_name.'.create',compact('module_title', 'module_name',  'module_path', 'module_icon', 'module_action', 'module_name_singular','row_count','properties'));


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

       $data=$request->validate([
          
           'image' => 'required|mimes:jpeg,jpg,png,bmp|max:20480',
           'property_description'=>'required',
           'land_area'=>'required',
           'price'=>'required',
           'address'=>'required',
           'code'=>'required|unique:sliders',
           'property_type'=>'required',
           'phone'=>'required',
           'face_towards'=>'required',
           'main_road_distance'=>'required',
           'road_description'=>'required',
           'property_status'=>'required',
           'negotiable_status'=>'required',
           'floors'=>'sometimes',
           'bedrooms'=>'sometimes',
           'kitchens'=>'sometimes',
           'living_rooms'=>'sometimes',
           'bathrooms'=>'sometimes',
           'gallery' => 'required',
           'gallery.*' => 'mimes:jpeg,jpg,png|max:20480'

           
           
       ]);

       $image = $request->file('image');
       $slug = str_slug($request->code);
       if(isset($image)){

           $currentdate = Carbon::now()->toDateString();
           $imagename = $slug.'-'.$currentdate.'-'.uniqid().'-'.$image->getClientOriginalExtension();
           if(!file_exists('uploads/slider'))
           {
               mkdir('uploads/slider',0777,true);
           }
           $image->move('uploads/slider',$imagename);
       } else{
           $imagename = 'default.png';
       }

       
       $slider = new Slider();
       $slider->property_description = $request->property_description;
       $slider->land_area = $request->land_area;
       $slider->price = $request->price;
       $slider->address = $request->address;
       $slider->code = $request->code;
       $slider->property_type = $request->property_type;
       $slider->phone = $request->phone;
       $slider->face_towards = $request->face_towards;
       $slider->main_road_distance = $request->main_road_distance;
       $slider->road_description = $request->road_description;
       $slider->property_status = $request->property_status;
       $slider->negotiable_status = $request->negotiable_status;
       $slider->floors = $request->floors;
       $slider->bedrooms = $request->bedrooms;
       $slider->kitchens = $request->kitchens;
       $slider->living_rooms = $request->living_rooms;
       $slider->bathrooms = $request->bathrooms;
       $slider->image = $imagename;
       $slider->save();
       $slider_id = $slider->id;

       if (!file_exists('uploads/gallery')) {
        mkdir('uploads/gallery', 0777, true);
    }


    $gallerys = $request->file('gallery');
    foreach ($gallerys as $gallery) {

        $basename = rand();

        $original =  $basename . '.' . $gallery->getClientOriginalExtension();

        $thumbnail =  $basename . '_thumb.' . $gallery->getClientOriginalExtension();

        Image::make($gallery)->fit(250, 250)->save(public_path('/uploads/gallery/' . $thumbnail));

        $gallery->move(public_path('uploads/gallery'), $original);
        Gallery::create([
            'slider_id' => $slider_id,
            'original' => '/uploads/gallery/' . $original,
            'thumbnail' => '/uploads/gallery/' . $thumbnail
        ]);
    }

 
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

        $slider=$module_model::with('galleries')->findOrFail($id);

        return view('backend.'.$module_name.'.show',compact('module_title', 'module_name',  'module_path', 'module_icon', 'module_action', 'module_name_singular','slider'));
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

        $slider=$module_model::with('galleries')->findOrFail($id);
        $properties=PropertyType::all();
        return view('backend.'.$module_name.'.edit',compact('module_title', 'module_name',  'module_path', 'module_icon', 'module_action', 'module_name_singular','slider','properties'));
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
            'image' => 'nullable|mimes:jpeg,jpg,png,bmp|max:20480',
            'property_description'=>'required',
            'land_area'=>'required',
            'price'=>'required',
            'address'=>'required',
            'code'=>'required',
            'property_type'=>'required',
            'negotiable_status'=>'required',
            'phone'=>'required',
            'face_towards'=>'required',
            'main_road_distance'=>'required',
            'road_description'=>'required',
            'property_status'=>'required',
            'floors'=>'sometimes',
            'bedrooms'=>'sometimes',
            'kitchens'=>'sometimes',
            'living_rooms'=>'sometimes',
            'bathrooms'=>'sometimes',
            'gallery' => 'nullable',
            'gallery.*' => 'nullable|mimes:jpeg,jpg,png|max:20480'
            

        ]);

        $image = $request->file('image');
        $slug = str_slug($request->code);
        $slider=$module_model::findOrFail($id);
        if(isset($image)){

            $currentdate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentdate.'-'.uniqid().'-'.$image->getClientOriginalExtension();
           
            if(!file_exists('uploads/slider'))
            {
                mkdir('uploads/slider',0777,true);
            }

            unlink('uploads/slider/'.$slider->image);

            $image->move('uploads/slider',$imagename);
        } else{
            $imagename = $slider->image;
        }
        $slider->property_description = $request->property_description;
        $slider->land_area = $request->land_area;
        $slider->price = $request->price;
        $slider->address = $request->address;
        $slider->code = $request->code;
        $slider->property_type = $request->property_type;
        $slider->phone = $request->phone;
        $slider->face_towards = $request->face_towards;
        $slider->main_road_distance = $request->main_road_distance;
        $slider->road_description = $request->road_description;
        $slider->property_status = $request->property_status;
        $slider->negotiable_status = $request->negotiable_status;
        $slider->floors = $request->floors;
        $slider->bedrooms = $request->bedrooms;
        $slider->kitchens = $request->kitchens;
        $slider->living_rooms = $request->living_rooms;
        $slider->bathrooms = $request->bathrooms;
        $slider->image = $imagename;
        $slider->save();
        $slider_id = $slider->id;

       

        if (!file_exists('uploads/gallery')) {
            mkdir('uploads/gallery', 0777, true);
        }
        $gallerys = $request->file('gallery');
   if(isset($gallerys)){
        foreach ($gallerys as $gallery) {
    
            $basename = rand();
    
            $original =  $basename . '.' . $gallery->getClientOriginalExtension();
    
            $thumbnail =  $basename . '_thumb.' . $gallery->getClientOriginalExtension();
    
            Image::make($gallery)->fit(250, 250)->save(public_path('/uploads/gallery/' . $thumbnail));
    
            $gallery->move(public_path('uploads/gallery'), $original);
            Gallery::create([
                'slider_id' => $slider_id,
                'original' => '/uploads/gallery/' . $original,
                'thumbnail' => '/uploads/gallery/' . $thumbnail
            ]);
        }
    

    }
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
       
        $slider = $module_model::findOrFail($id);

       $slider->delete();
        flash('<i class="fas fa-check"></i> '.Str::singular($module_title).' Successfully Deleted!')->important();
        return redirect()->route('backend.'.$module_name.'.index');

      

        
    }

    public function galleryDestroy($id)
    {
       $module='Gallery';
      
        $gallery = Gallery::find($id);
            
            File::delete([
                public_path($gallery->original),
                public_path($gallery->thumbnail),
            ]);

            $gallery->delete();
          
        flash('<i class="fas fa-check"></i> '.$module.' Successfully Deleted!')->important();
        return redirect()->back();
    }

     public function actualDelete($id){


        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_name_singular = Str::singular($this->module_name);
        $module_path = $this->module_path;
        $module_model = $this->module_model;


        $slider = $module_model::withTrashed()->findOrFail($id);

        $slider->forceDelete();
        flash('<i class="fas fa-check"></i> '.Str::singular($module_title).' Permanently Deleted!')->important();
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


}
