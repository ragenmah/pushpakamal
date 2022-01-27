<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Notice;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Slider;
use DB;
use App\Models\About;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB as FacadesDB;

class FrontendController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $body_class = '';
        $data = Slider::where('deleted_at', null)->take(7)->get();
        $word = null;
        $district = $this->getlocation();
        $scroll = false;
        $notices = Notice::orderBy('id', 'desc')->take(1)->get();
        $premiumList = Slider::where('updated_at', '>=', Carbon::now()->subdays(30))->take(5)->get();
        $companyDetails = FacadesDB::select('select * from settings');
        return view('frontend.index', compact('body_class', 'data', 'word', 'district', 'scroll', 'notices', 'premiumList', 'companyDetails'));
    }


    public function search(Request $request)
    {
        $body_class = '';
        $data = Slider::where('deleted_at', null)->take(6)->get();
        $search = $request->all();

        //Price 
        $query = Slider::WhereBetween('price', [$search['priceStart'], $search['priceEnd']])->where('property_status', 1);

        //Enter Words
        if (isset($search['keyword'])) {
            $query = $query->Where('address', 'LIKE', '%' . $search['keyword'] . '%')
                ->orWhere('road_description', 'LIKE', '%' . $search['keyword'] . '%')
                ->orWhere('main_road_distance', 'LIKE', '%' . $search['keyword'] . '%')
                ->orWhere('code', 'LIKE', '%' . $search['keyword'] . '%')
                ->orWhere('address', 'LIKE', '%' . $search['keyword'] . '%')
                ->orWhere('code', 'LIKE', '%' . $search['keyword'] . '%')
                ->orWhere('property_type', 'LIKE', '%' . $search['keyword'] . '%')
                ->orWhere('phone', 'LIKE', '%' . $search['keyword'] . '%')
                ->orWhere('main_road_distance', 'LIKE', '%' . $search['keyword'] . '%')
                ->orWhere('road_description', 'LIKE', '%' . $search['keyword'] . '%')
                ->orWhere('face_towards', 'LIKE', '%' . $search['keyword'] . '%')
                ->orWhere('land_area', 'LIKE', '%' . $search['keyword'] . '%')
                ->orWhere('property_status', 'LIKE', '%' . $search['keyword'] . '%');
        }

        //Location
        if (isset($search['property_location']) && $search['property_location'] != 'Select Location') {
            $query = $query->orWhere('address', 'LIKE', '%' . $search['property_location'] . '%')
                ->orWhere('face_towards', 'LIKE', '%' . $search['property_location'] . '%')
                ->orWhere('main_road_distance', 'LIKE', '%' . $search['property_location'] . '%')
                ->orWhere('road_description', 'LIKE', '%' . $search['property_location'] . '%')
                ->orWhere('property_status', 'LIKE', '%' . $search['property_location'] . '%');
        }

        //Property Type 
        if (isset($search['property_type']) && $search['property_type'] != 'Select Property Type') {
            $query = $query->Where('property_type', 'LIKE', '%' . $search['property_type'] . '%');
        }

        $dataSearched = $query->orderBy('id', 'desc')->paginate(20);


        // Your Eloquent query executed by using get()
        // dd(DB::getQueryLog()); // Show results of log

        //Recent Property Call
        $recentproperty = Slider::orderBy('id', 'asc')->take(5)->get();

        $district = $this->getlocation();
        $companyDetails = FacadesDB::select('select * from settings');


        return view('frontend.search', compact('body_class', 'dataSearched', 'search', 'district', 'recentproperty', 'companyDetails'));
    }
    /**
     * Privacy Policy Page
     *
     * @return \Illuminate\Http\Response
     */
    public function privacy()
    {
        $body_class = '';

        return view('frontend.privacy', compact('body_class'));
    }

    /**
     * Terms & Conditions Page
     *
     * @return \Illuminate\Http\Response
     */
    public function terms()
    {
        $body_class = '';

        return view('frontend.terms', compact('body_class'));
    }

    public function pricing()
    {
        $companyDetails = FacadesDB::select('select * from settings');

        return view('frontend.pricing.pricing', compact('companyDetails'));
    }

    public function showproperty($id)
    {
        $slider = Slider::with('galleries')->findOrFail($id);
        $slider->visit++;
        $slider->save();
        $district = $this->getlocation();
        $recentproperty = Slider::where('visit', '>=', 5)->orderBy('visit', 'DESC')->take(5)->get();
        $postedat = $slider->created_at->diffForHumans();
        $companyDetails = FacadesDB::select('select * from settings');

        return view('frontend.includes.property-detail', compact('slider', 'recentproperty', 'district', 'postedat', 'companyDetails'));
    }

    public function getlocation()
    {
        return  [
            [
                "id" => 1,
                "name" => "Bhojpur",
                "province_id" => "1"
            ],
            [
                "id" => 2,
                "name" => "Dhankuta",
                "province_id" => "1"
            ],
            [
                "id" => 3,
                "name" => "Ilam ",
                "province_id" => "1"
            ],
            [
                "id" => 4,
                "name" => "Jhapa ",
                "province_id" => "1"
            ],
            [
                "id" => 5,
                "name" => "Khotang ",
                "province_id" => "1"
            ],
            [
                "id" => 6,
                "name" => "Morang ",
                "province_id" => "1"
            ],
            [
                "id" => 7,
                "name" => "Okhaldhunga ",
                "province_id" => "1"
            ],
            [
                "id" => 8,
                "name" => "Panchthar ",
                "province_id" => "1"
            ],
            [
                "id" => 9,
                "name" => "Sankhuwasabha ",
                "province_id" => "1"
            ],
            [
                "id" => 10,
                "name" => "Solukhumbu ",
                "province_id" => "1"
            ],
            [
                "id" => 11,
                "name" => "Sunsari ",
                "province_id" => "1"
            ],
            [
                "id" => 12,
                "name" => "Taplejung ",
                "province_id" => "1"
            ],
            [
                "id" => 13,
                "name" => "Terhathum ",
                "province_id" => "1"
            ],
            [
                "id" => 14,
                "name" => "Udayapur",
                "province_id" => "1"
            ],
            [
                "id" => 15,
                "name" => "\tBara",
                "province_id" => "2"
            ],
            [
                "id" => 16,
                "name" => "Dhanusha",
                "province_id" => "2"
            ],
            [
                "id" => 17,
                "name" => "Mahottari",
                "province_id" => "2"
            ],
            [
                "id" => 18,
                "name" => "Parsa",
                "province_id" => "2"
            ],
            [
                "id" => 19,
                "name" => "Rautahat",
                "province_id" => "2"
            ],
            [
                "id" => 20,
                "name" => "Saptari",
                "province_id" => "2"
            ],
            [
                "id" => 21,
                "name" => "Sarlahi",
                "province_id" => "2"
            ],
            [
                "id" => 22,
                "name" => "Siraha",
                "province_id" => "2"
            ],
            [
                "id" => 23,
                "name" => "Bhaktapur",
                "province_id" => "3"
            ],
            [
                "id" => 24,
                "name" => "Chitwan ",
                "province_id" => "3"
            ],
            [
                "id" => 25,
                "name" => "Dhading ",
                "province_id" => "3"
            ],
            [
                "id" => 26,
                "name" => "Dolakha ",
                "province_id" => "3"
            ],
            [
                "id" => 27,
                "name" => "Kathmandu ",
                "province_id" => "3"
            ],
            [
                "id" => 28,
                "name" => "Kavrepalanchok ",
                "province_id" => "3"
            ],
            [
                "id" => 29,
                "name" => "Lalitpur ",
                "province_id" => "3"
            ],
            [
                "id" => 30,
                "name" => "Makwanpur ",
                "province_id" => "3"
            ],
            [
                "id" => 31,
                "name" => "Nuwakot ",
                "province_id" => "3"
            ],
            [
                "id" => 32,
                "name" => "Ramechhap ",
                "province_id" => "3"
            ],
            [
                "id" => 33,
                "name" => "Rasuwa ",
                "province_id" => "3"
            ],
            [
                "id" => 34,
                "name" => "Sindhuli ",
                "province_id" => "3"
            ],
            [
                "id" => 35,
                "name" => "Sindhupalchok ",
                "province_id" => "3"
            ],
            [
                "id" => 36,
                "name" => "Baglung",
                "province_id" => "4"
            ],
            [
                "id" => 37,
                "name" => "Gorkha",
                "province_id" => "4"
            ],
            [
                "id" => 38,
                "name" => "Kaski",
                "province_id" => "4"
            ],
            [
                "id" => 39,
                "name" => "Lamjung",
                "province_id" => "4"
            ],
            [
                "id" => 40,
                "name" => "Manang",
                "province_id" => "4"
            ],
            [
                "id" => 41,
                "name" => "Mustang",
                "province_id" => "4"
            ],
            [
                "id" => 42,
                "name" => "Myagdi",
                "province_id" => "4"
            ],
            [
                "id" => 43,
                "name" => "Nawalpur",
                "province_id" => "4"
            ],
            [
                "id" => 44,
                "name" => "Parbat",
                "province_id" => "4"
            ],
            [
                "id" => 45,
                "name" => "Syangja",
                "province_id" => "4"
            ],
            [
                "id" => 46,
                "name" => "Tanahun",
                "province_id" => "4"
            ],
            [
                "id" => 47,
                "name" => "Arghakhanchi",
                "province_id" => "5"
            ],
            [
                "id" => 48,
                "name" => "Banke",
                "province_id" => "5"
            ],
            [
                "id" => 49,
                "name" => "Bardiya",
                "province_id" => "5"
            ],
            [
                "id" => 50,
                "name" => "Dang Deukhuri",
                "province_id" => "5"
            ],
            [
                "id" => 51,
                "name" => "Eastern Rukum",
                "province_id" => "5"
            ],
            [
                "id" => 52,
                "name" => "Gulmi",
                "province_id" => "5"
            ],
            [
                "id" => 53,
                "name" => "Kapilvastu",
                "province_id" => "5"
            ],
            [
                "id" => 54,
                "name" => "Parasi",
                "province_id" => "5"
            ],
            [
                "id" => 55,
                "name" => "Palpa",
                "province_id" => "5"
            ],
            [
                "id" => 56,
                "name" => "Pyuthan",
                "province_id" => "5"
            ],
            [
                "id" => 57,
                "name" => "Rolpa",
                "province_id" => "5"
            ],
            [
                "id" => 58,
                "name" => "Rupandehi",
                "province_id" => "5"
            ],
            [
                "id" => 59,
                "name" => "Dailekh",
                "province_id" => "6"
            ],
            [
                "id" => 60,
                "name" => "Dolpa",
                "province_id" => "6"
            ],
            [
                "id" => 61,
                "name" => "Humla",
                "province_id" => "6"
            ],
            [
                "id" => 62,
                "name" => "Jajarkot",
                "province_id" => "6"
            ],
            [
                "id" => 63,
                "name" => "Jumla",
                "province_id" => "6"
            ],
            [
                "id" => 64,
                "name" => "Kalikot",
                "province_id" => "6"
            ],
            [
                "id" => 65,
                "name" => "Mugu",
                "province_id" => "6"
            ],
            [
                "id" => 66,
                "name" => "Salyan",
                "province_id" => "6"
            ],
            [
                "id" => 67,
                "name" => "Surkhet",
                "province_id" => "6"
            ],
            [
                "id" => 68,
                "name" => "Western Rukum",
                "province_id" => "6"
            ],
            [
                "id" => 69,
                "name" => "Achham",
                "province_id" => "7"
            ],
            [
                "id" => 70,
                "name" => "Baitadi",
                "province_id" => "7"
            ],
            [
                "id" => 71,
                "name" => "Bajhang",
                "province_id" => "7"
            ],
            [
                "id" => 72,
                "name" => "Bajura",
                "province_id" => "7"
            ],
            [
                "id" => 73,
                "name" => "Dadeldhura",
                "province_id" => "7"
            ],
            [
                "id" => 74,
                "name" => "Darchula",
                "province_id" => "7"
            ],
            [
                "id" => 75,
                "name" => "Doti",
                "province_id" => "7"
            ],
            [
                "id" => 76,
                "name" => "Kailali",
                "province_id" => "7"
            ],
            [
                "id" => 77,
                "name" => "Kanchanpur",
                "province_id" => "7"
            ]
        ];
    }

    public function showabout()
    {
        $abouts = About::latest('created_at')->first();
        $companyDetails = FacadesDB::select('select * from settings');
        return view('frontend.abouts.about', compact('abouts', 'companyDetails'));
    }

    public function showSale()
    {
        $status = "Sale";
        // $dataSale = Slider::where('property_type', '!=', "Rent")->take(9)->get();
        $data = Slider::where('property_status', '=', 1)->paginate(9);
        $district = $this->getlocation();
        $recentproperty = Slider::where('visit', '>=', 5)->orderBy('visit', 'DESC')->take(5)->get();
        $companyDetails = FacadesDB::select('select * from settings');
        return view('frontend.properties.saleorrent', compact('status', 'data', 'district', 'recentproperty', 'companyDetails'));
    }
    public function showRent()
    {
        $status = "Rent";
        $data = Slider::where('property_status', '=', 2)->paginate(9);
        $district = $this->getlocation();
        $recentproperty = Slider::where('visit', '>=', 5)->orderBy('visit', 'DESC')->take(5)->get();
        $companyDetails = FacadesDB::select('select * from settings');

        return view('frontend.properties.saleorrent', compact('status', 'data', 'district', 'recentproperty', 'companyDetails'));
    }
    public function showProperties()
    {
        $status = "Properties";
        $data = Slider::where('deleted_at', null)->paginate(9);
        $district = $this->getlocation();
        $recentproperty = Slider::where('visit', '>=', 5)->orderBy('visit', 'DESC')->take(5)->get();
        $companyDetails = FacadesDB::select('select * from settings');

        return view('frontend.properties.saleorrent', compact('status', 'data', 'district', 'recentproperty', 'companyDetails'));
    }

    public function showPopularProperties()
    {
        $status = "Popular";
        $data = Slider::where('visit', '>=', 5)->orderBy('visit', 'DESC')
            ->paginate(9);
        $district = $this->getlocation();
        $recentproperty = Slider::orderBy('id', 'desc')->take(5)->get();
        $companyDetails = FacadesDB::select('select * from settings');

        return view('frontend.properties.saleorrent', compact('status', 'data', 'district', 'recentproperty', 'companyDetails'));
    }
    public function showRecentProperties()
    {
        $status = "Recent";
        $data = Slider::orderBy('id', 'DESC')
            // ->take(9)
            // ->get()
            ->paginate(9);
        $district = $this->getlocation();
        $recentproperty = Slider::where('visit', '>=', 5)->orderBy('visit', 'DESC')->take(5)->get();
        $companyDetails = FacadesDB::select('select * from settings');

        return view('frontend.properties.saleorrent', compact('status', 'data', 'district', 'recentproperty', 'companyDetails'));
    }
    public function sort(Request $request)
    {
        $sortBy = $request->all();
        $propertyType = \App\Models\PropertyType::where('deleted_at', null)
            ->orderBy('property_type')
            ->get();
        //  print_r($sortBy);
        foreach ($propertyType as $type) {

            if (strtoupper($type->property_type) == strtoupper($sortBy['sortby'])) {

                $data = Slider::where('property_type', '=', $sortBy['sortby'])->orderBy('id', 'DESC')->paginate(9);
                return json_encode($data);
                break;
            }
        }


        switch (strtoupper($sortBy['sortby'])) {
            case "LATEST":
                if (strtoupper($sortBy['sortFor']) == "FOR SALE")
                    $data = Slider::where('property_status', '=', 1)->orderBy('id', 'DESC')->paginate(9);
                else if (strtoupper($sortBy['sortFor']) == "FOR RENT")
                    $data = Slider::where('property_status', '=', 2)->orderBy('id', 'DESC')->paginate(9);
                else
                    $data = Slider::orderBy('id', 'DESC')->paginate(9);
                // return response()->json([
                //     'sortdata' => $sortBy['sortFor']
                // ]);
                return json_encode($data);
                break;
            case "OLDEST":
                if (strtoupper($sortBy['sortFor']) == "FOR SALE")
                    $data = Slider::where('property_status', '=', 1)->orderBy('id', 'ASC')->paginate(9);
                else if (strtoupper($sortBy['sortFor']) == "FOR RENT")
                    $data = Slider::where('property_status', '=', 2)->orderBy('id', 'ASC')->paginate(9);
                else
                    $data = Slider::orderBy('id', 'ASC')->paginate(9);
                return json_encode($data);
                break;
            case "HIGHPRICE":
                // $maxPrice = Slider::orderBy('id', 'desc')->value('price'); 
                $maxPrice = Slider::max('price');
                if (strtoupper($sortBy['sortFor']) == "FOR SALE")
                    $data = Slider::where('property_status', '=', 1)->where('price', '<=', $maxPrice)->orderBy('id', 'DESC')->paginate(9);
                else if (strtoupper($sortBy['sortFor']) == "FOR RENT")
                    $data = Slider::where('property_status', '=', 2)->where('price', '<=', $maxPrice)->orderBy('id', 'DESC')->paginate(9);
                else
                    $data = Slider::where('price', '<=', $maxPrice)->orderBy('id', 'DESC')->paginate(9);
                return json_encode($data);
                break;
            case "LOWPRICE":
                $minPrices = Slider::min('price');
                if (strtoupper($sortBy['sortFor']) == "FOR SALE")
                    $data = Slider::where('property_status', '=', 1)->where('price', '>=', $minPrices)->orderBy('id', 'ASC')->paginate(9);
                else if (strtoupper($sortBy['sortFor']) == "FOR RENT")
                    $data = Slider::where('property_status', '=', 2)->where('price', '>=', $minPrices)->orderBy('id', 'ASC')->paginate(9);
                else
                    $data = Slider::where('price', '>=', $minPrices)->orderBy('id', 'ASC')->paginate(9);
                return json_encode($data);
                break;
            default:
                break;
        }
    }
}
