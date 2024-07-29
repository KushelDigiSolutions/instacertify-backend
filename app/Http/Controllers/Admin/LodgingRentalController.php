<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Aminities;
use App\Models\Admin\Features;
use App\Models\Admin\RoomTypes;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Admin\Vclass;
use App\Http\Controllers\Controller;
use \Validator;
use Carbon\Carbon;
use App\Models\Admin\Location;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\States;
use App\Models\Admin\Lodging;
use App\Models\Admin\LodgingCategory;

class LodgingRentalController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:lodging-list', ['only' => ['index', 'show']]);
        $this->middleware('permission:lodging-create', ['only' => ['store']]);
        $this->middleware('permission:lodging-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:lodging-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $search_key = $request->search_key;
        $search_status = $request->search_status;
		
  
		$vclasss = Lodging::where('is_delete', '0');
        if ($search_key) {
            $vclasss = $vclasss->where('title', 'like', '%' . $search_key . '%');
        } 
        if ($search_status == '1' || $search_status == '0') {
            $vclasss = $vclasss->where('is_active', $search_status);
        }

        $vclasss = $vclasss->orderBy('title', 'asc')->paginate(10);

        if ($request->ajax()) {
            return view('admin.lodging_rental.vlodging.table', compact('vclasss', 'search_key', 'search_status'));
        }

		$vclasss = Lodging::where('is_delete', '0')->orderBy('id', 'desc')->paginate(10);
        return view('admin.lodging_rental.vlodging.index', compact('vclasss', 'search_key', 'search_status'), ['page_title' => 'Vclass List']);
    }

    public function create()
    {
        $vclass_categories = LodgingCategory::select('id', 'name')->where('is_delete', '0')->orderBy('name', 'asc')->get();
        $aminities = Aminities::select('id', 'name')->where('is_delete', '0')->orderBy('name', 'asc')->get();
        $features = Features::select('id', 'name')->where('is_delete', '0')->orderBy('name', 'asc')->get();
        $states = States::select('id', 'name')->where('is_delete', '0')->orderBy('name', 'asc')->get();
        $rooms = RoomTypes::select('id', 'name')->where('is_delete', '0')->orderBy('name', 'asc')->get();

        return view('admin.lodging_rental.vlodging.create', compact('vclass_categories','states','aminities','features','rooms'), ['page_title' => 'Add Lodging']);
    }

    public function store(Request $request)
    {
        $vclass = new Lodging;
        $vclass->title = $request->title;
        $vclass->slug = Str::slug($request->title);
        $vclass->description = $request->description;
        $imag = null;
        $images = array();
        foreach ($request->file('images') as $image) {
            array_push($images, imageUpload($image, 'backend/admin/images/lodging_rental/vclasss/'));
            $imag = $image; 
        }
        if(!empty($images[0])){
            $imag = $images[0];
        }
        $vclass->images = $images;
        $vclass->state_id = $request->state_id;
        $vclass->location = $request->location;
        $vclass->location_iframe = $request->location_iframe;
        $vclass->category_ids = $request->category_ids;
        $vclass->room_type_id = $request->room_type_id;
        $vclass->check_in = $request->check_in;
        $vclass->check_out = $request->check_out;
        $vclass->price = $request->price;
        $vclass->room_capacity = $request->room_capacity;
        $vclass->location = $request->location;
        $vclass->aminities_ids = $request->amanities;
        $vclass->feature_ids = $request->features;
       
        $vclass->seo_title = $request->seo_title;
        $vclass->seo_description = $request->seo_description;

        if ($vclass->save()) {
            $field['name'] = $request->title."rs";
            $field['type'] = "physical";
            $field['weight'] = 1;
            $field['price'] = (int) $request->price;
            $field['custom_url']['url'] = $vclass->slug;
            $field['custom_url']['is_customized'] = true;
            $dataa = json_encode($field);

            $curl = curl_init();

            curl_setopt_array($curl, [
                CURLOPT_URL => "https://api.bigcommerce.com/stores/suzeuussqe/v3/catalog/products",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_POSTFIELDS => $dataa,
                CURLOPT_HTTPHEADER => [
                    "Accept: application/json",
                    "Content-Type: application/json",
                    "X-Auth-Token: b4rd5x5aimj4zwv6arra5bdle8qoi8w"
                ],
            ]);
            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
                dd($err);
                echo "cURL Error #:" . $err;
            } else {
                $result = json_decode($response, true);
            }

            if ($result['data']['id']) {
					
                Lodging::where('id',$vclass->id)->update(['bigcommerce_id'=>$result['data']['id']]);

                
                if ($imag && $result['data']['id']) {
                    $field1['is_thumbnail'] = true;
                    $field1['image_url'] = $imag;
                    $dataa1 = json_encode($field1);

                    $curl = curl_init();

                    curl_setopt_array($curl, [
                        CURLOPT_URL => " https://api.bigcommerce.com/stores/suzeuussqe/v3/catalog/products/".$result['data']['id']. "/images",
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => "",
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 30,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => "POST",
                        CURLOPT_SSL_VERIFYPEER => false,
                        CURLOPT_POSTFIELDS => $dataa1,
                        CURLOPT_HTTPHEADER => [
                            "Accept: application/json",
                            "Content-Type: application/json",
                            "X-Auth-Token: b4rd5x5aimj4zwv6arra5bdle8qoi8w"
                        ],
                    ]);

                    $response1 = curl_exec($curl);
                    $err = curl_error($curl);

                    curl_close($curl);

                    if ($err) {
                        return redirect()->route('admin.vclasss.index')->with('error', $err);
                        // echo "cURL Error #:" . $err;
                    } else {
                        $result1 = json_decode($response1, true);
                        if(!empty($result1['data']['id'])){
                            $vclass->bigcommerce_image_id = $result1['data']['id'];
                        }
                    }
                }
            }
        }

        return redirect()->route('admin.lodging.index')->with('success', 'Lodging Added Successfully!');
    }

    public function show(Request $request, Lodging $lodging)
    {
        $categories = LodgingCategory::select('id', 'name')->where('is_delete', '0')->whereIn('id', $lodging->category_ids )->orderBy('name', 'asc')->get();
        $roomType = RoomTypes::select('id', 'name')->where('is_delete', '0')->where('id', $lodging->room_type_id )->orderBy('name', 'asc')->get();
        $aminities = Aminities::select('id','image', 'name')->where('is_delete', '0')->whereIn('id', $lodging->aminities_ids )->orderBy('name', 'asc')->get();
        $states = States::select('id', 'name')->where('is_delete', '0')->where('id', $lodging->state_id )->orderBy('name', 'asc')->get();
        $features = Features::select('id', 'name','image')->where('is_delete', '0')->whereIn('id', $lodging->feature_ids )->orderBy('name', 'asc')->get();
        $orders = [];

        return view('admin.lodging_rental.vlodging.show', compact('lodging','orders','categories','roomType','aminities','states','features'), ['page_title' => 'Show Lodging']);
    }

    public function edit(Lodging $lodging)
    {
        $lodging_categories = LodgingCategory::select('id', 'name')->where('is_delete', '0')->orderBy('name', 'asc')->get();
        $aminities = Aminities::select('id', 'name')->where('is_delete', '0')->orderBy('name', 'asc')->get();
        $features = Features::select('id', 'name')->where('is_delete', '0')->orderBy('name', 'asc')->get();
        $states = States::select('id', 'name')->where('is_delete', '0')->orderBy('name', 'asc')->get();
        $rooms = RoomTypes::select('id', 'name')->where('is_delete', '0')->orderBy('name', 'asc')->get();

        return view('admin.lodging_rental.vlodging.edit', compact('lodging', 'lodging_categories','states','aminities','features','rooms'), ['page_title' => 'Edit Lodging']);
    }

    public function update(Request $request, Lodging $lodging)
    {
        $lodging->title = $request->title;
        $lodging->slug = Str::slug($request->title);
        $lodging->description = $request->description;
        $imag = null;
        if ($request->has('images')) {
            $images = array();
            foreach ($request->file('images') as $image) {
                array_push($images, imageUpload($image, 'backend/admin/images/lodging_rental/vclasss/'));
                $imag = $image;
            }
            if(!empty($request->oldImages)){
                $lodging->images = array_merge($request->oldImages,$images);
            }else{
                $lodging->images = $images;
            }
          
        }
        
        $lodging->state_id = $request->state_id;
        $lodging->location = $request->location;
        $lodging->location_iframe = $request->location_iframe;
        $lodging->category_ids = $request->category_ids;
        $lodging->room_type_id = $request->room_type_id;
        $lodging->check_in = $request->check_in;
        $lodging->check_out = $request->check_out;
        $lodging->price = $request->price;
        $lodging->room_capacity = $request->room_capacity;
        $lodging->location = $request->location;
        $lodging->aminities_ids = $request->amanities;
        $lodging->feature_ids = $request->features;
       
        $lodging->seo_title = $request->seo_title;
        $lodging->seo_description = $request->seo_description;
        if ($lodging->save() && !empty($request->tickettype)) {
            foreach ($request->tickettype as $i => $vclass_type) {

                if (!$request->bigcomm[$i]) {

                    $vclassType = new VclassType();
                    $vclassType->vclass_id = $vclass->id;
                    $vclassType->ticket_price = $request->ticket_price[$i];
                    $vclassType->title = $vclass_type;
                    $vclassType->tag = $request->ticket_tag[$i];
                    $vclassType->name = substr($vclass->title, 0, 150) . ' - ' . $vclass_type;


                    // $vclassType->bigcommerce_id =2;
                    // $vclassType->save();
                    $field['name'] = $vclassType->name;
                    $field['type'] = "physical";
                    $field['weight'] = 1;
                    $field['price'] = (int) $request->ticket_price[$i];
                    $field['custom_url']['url'] = $vclass->slug . '+' . strtolower($vclass_type);
                    $field['custom_url']['is_customized'] = true;

                    $dataa = json_encode($field);

                    $curl = curl_init();

                    curl_setopt_array($curl, [
                        CURLOPT_URL => "https://api.bigcommerce.com/stores/suzeuussqe/v3/catalog/products",
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => "",
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 30,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => "POST",
                        CURLOPT_SSL_VERIFYPEER => false,
                        CURLOPT_POSTFIELDS => $dataa,
                        CURLOPT_HTTPHEADER => [
                            "Accept: application/json",
                            "Content-Type: application/json",
                            "X-Auth-Token: b4rd5x5aimj4zwv6arra5bdle8qoi8w"
                        ],
                    ]);

                    $response = curl_exec($curl);
                    $err = curl_error($curl);

                    curl_close($curl);

                    if ($err) {
                        // dd($err);
                        // echo "cURL Error #:" . $err;
                    } else {
                        $result = json_decode($response, true);
                    }

                    $vclassType->bigcommerce_id = $result['data']['id'];


                    if($vclassType->bigcommerce_id){
                        $this->__createModifier("Check-in",$vclassType->bigcommerce_id);
                        $this->__createModifier("Checkout",$vclassType->bigcommerce_id);
                        $this->__createModifier("Adults",$vclassType->bigcommerce_id);
                        $this->__createModifier("Children",$vclassType->bigcommerce_id);
                        $this->__createModifier("Infants",$vclassType->bigcommerce_id);
                        $this->__assignChannel($vclassType->bigcommerce_id);
                    }

                    if ($imag && $vclassType->bigcommerce_id) {
                        $field1['image_file'] = $imag;
                        $dataa1 = json_encode($field1);

                        $curl = curl_init();

                        curl_setopt_array($curl, [
                            CURLOPT_URL => " https://api.bigcommerce.com/stores/suzeuussqe/v3/catalog/products/" . $vclassType->bigcommerce_id . "/images",
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_ENCODING => "",
                            CURLOPT_MAXREDIRS => 10,
                            CURLOPT_TIMEOUT => 30,
                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                            CURLOPT_CUSTOMREQUEST => "POST",
                            CURLOPT_SSL_VERIFYPEER => false,
                            CURLOPT_POSTFIELDS => $dataa1,
                            CURLOPT_HTTPHEADER => [
                                "Accept: application/json",
                                "Content-Type: application/json",
                                "X-Auth-Token: b4rd5x5aimj4zwv6arra5bdle8qoi8w"
                            ],
                        ]);

                        $response1 = curl_exec($curl);
                        $err = curl_error($curl);

                        curl_close($curl);

                        if ($err) {
                            // dd($err);
                            // echo "cURL Error #:" . $err;
                        } else {
                            $result2 = json_decode($response1, true);
                            $vclassType->bigcommerce_image_id = $result2['data']['id'];
                        }
                    }

                    $vclassType->save();

                } else {
                    $vclassType = VclassType::where('bigcommerce_id', $request->bigcomm[$i])->first();
                    $vclassType->vclass_id = $vclass->id;
                    $vclassType->ticket_price = $request->ticket_price[$i];
                    $vclassType->title = $vclass_type;
                    $vclassType->tag = $request->ticket_tag[$i];
                    $vclassType->name = substr($vclass->title, 0, 150) . ' - ' . $vclass_type;
                    $vclassType->save();

                    // $vclassType->bigcommerce_id =2;
                    // $vclassType->save();
                    $field['name'] = $vclassType->name;
                    $field['type'] = "physical";
                    $field['weight'] = 1;
                    $field['price'] = (int) $request->ticket_price[$i];
                    $field['custom_url']['url'] = $vclass->slug . '+' . strtolower($vclass_type);
                    $field['custom_url']['is_customized'] = true;
                    $dataa = json_encode($field);

                    $curl = curl_init();

                    curl_setopt_array($curl, [
                        CURLOPT_URL => "https://api.bigcommerce.com/stores/suzeuussqe/v3/catalog/products/" . $request->bigcomm[$i],
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => "",
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 30,
                        CURLOPT_SSL_VERIFYPEER => false,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => "PUT",
                        CURLOPT_POSTFIELDS => $dataa,
                        CURLOPT_HTTPHEADER => [
                            "Accept: application/json",
                            "Content-Type: application/json",
                            "X-Auth-Token: b4rd5x5aimj4zwv6arra5bdle8qoi8w"
                        ],
                    ]);

                    $response = curl_exec($curl);
                    $err = curl_error($curl);

                    curl_close($curl);

                    if ($err) {
                        echo "cURL Error #:" . $err;
                    } else {
                        //  $result = json_decode($response, true);
                    }

                    $field2['image_url '] = $imag;


                    $dataa2 = json_encode($field2);

                    $curl = curl_init();

                    curl_setopt_array($curl, [
                        CURLOPT_URL => "https://api.bigcommerce.com/stores/suzeuussqe/v3/catalog/products/" . $request->bigcomm[$i] . "/images/" . $vclassType->bigcommerce_image_id,
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => "",
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 30,
                        CURLOPT_SSL_VERIFYPEER => false,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => "PUT",
                        CURLOPT_POSTFIELDS => $dataa2,
                        CURLOPT_HTTPHEADER => [
                            "Accept: application/json",
                            "Content-Type: application/json",
                            "X-Auth-Token: b4rd5x5aimj4zwv6arra5bdle8qoi8w"
                        ],
                    ]);

                    $response = curl_exec($curl);
                    $err = curl_error($curl);

                    curl_close($curl);
                }
            }
        }

        return redirect()->route('admin.lodging.index')->with('success', 'Vclass Updated Successfully!');
    }

    private function __assignChannel($productId){

        $field1[0]['product_id'] = $productId;
        $field1[0]['channel_id'] = 1;
        $data = json_encode($modifier);

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.bigcommerce.com/stores/suzeuussqe/v3/catalog/products/channel-assignments",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "PUT",
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => [
                "Accept: application/json",
                "Content-Type: application/json",
                "X-Auth-Token: b4rd5x5aimj4zwv6arra5bdle8qoi8w"
            ],
        ]);
        $response1 = curl_exec($curl);
        $err = curl_error($curl);
    }

    private function __createModifier($modifier,$productId){

        $field1['type'] = "text";
        $field1['required'] = true;
        $field1['display_name'] = $imag;
        $data = json_encode($modifier);

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.bigcommerce.com/stores/suzeuussqe/v3/catalog/products/" . $productId. "/modifiers",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => [
                "Accept: application/json",
                "Content-Type: application/json",
                "X-Auth-Token: b4rd5x5aimj4zwv6arra5bdle8qoi8w"
            ],
        ]);

    }

    public function destroy(Lodging $lodging)
    {
        $lodging->is_delete = '1';

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.bigcommerce.com/stores/suzeuussqe/v3/catalog/products/" . $lodging->bigcommerce_id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "DELETE",
            CURLOPT_HTTPHEADER => [
                "Accept: application/json",
                "Content-Type: application/json",
                "X-Auth-Token: b4rd5x5aimj4zwv6arra5bdle8qoi8w"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {

        }

        $lodging->save();

        return back()->with('error', 'Vclass Deleted Successfully!');
    }


    public function toggleActive($id)
    {
        $lodging = Lodging::findOrFail($id);
        $lodging->update(['is_active' => !$lodging->is_active]);
        return response()->json(['status' => 'success', 'is_active' => $lodging->is_active , 'id' => $lodging->id]);
    }

    public function checkProductName(Request $request)
    {
        $existing = Lodging::where(['title' => $request->title, 'is_delete' => '0'])->first();
        if ($existing) {
            return response()->json(false);
        } else {
            return response()->json(true);
        }
    }

}
