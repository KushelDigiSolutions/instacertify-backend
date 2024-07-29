<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Admin\Equipment;
use App\Http\Controllers\Controller;
use \Validator;
use Carbon\Carbon;
use App\Models\Admin\Location;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\EquipmentCategory;

class EquipmentRentalController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:equipment-list', ['only' => ['index', 'show']]);
        $this->middleware('permission:equipment-create', ['only' => ['store']]);
        $this->middleware('permission:equipment-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:equipment-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $search_key = $request->search_key;
        $search_status = $request->search_status;
		
  
		$equipment = Equipment::where('is_delete', '0');
        if ($search_key) {
            $equipment = $equipment->where('title', 'like', '%' . $search_key . '%');
        } 
        if ($search_status == '1' || $search_status == '0') {
            $equipment = $equipment->where('is_active', $search_status);
        }

        $equipment = $equipment->orderBy('title', 'asc')->paginate(10);

        if ($request->ajax()) {
            return view('admin.equipment_rental.equipment.table', compact('equipment', 'search_key', 'search_status'));
        }

		$equipment = Equipment::where('is_delete', '0')->orderBy('id', 'desc')->paginate(10);
		
        return view('admin.equipment_rental.equipment.index', compact('equipment', 'search_key', 'search_status'), ['page_title' => 'Equipment List']);
    }

    public function create()
    {
        $equipment_categories = EquipmentCategory::select('id', 'name')->where('is_delete', '0')->orderBy('name', 'asc')->get();

        return view('admin.equipment_rental.equipment.create', compact('equipment_categories'), ['page_title' => 'Add Equipment']);
    }

    public function store(Request $request)
    {
        $equipment = new Equipment;
        $equipment->title = $request->title;
        $equipment->slug = Str::slug($request->title);
        $equipment->description = $request->description;
        $imag = null;
        $images = array();
        foreach ($request->file('images') as $image) {
            array_push($images, imageUpload($image, 'backend/admin/images/equipment_management/equipments'));
            $imag = $image;
        }
        if(!empty($images[0])){
            $imag = $images[0];
        }
        $equipment->images = $images;
        $equipment->terms = $request->terms;
        $equipment->start_date = $request->start_date;
        $equipment->store_address = $request->store_address;
        $equipment->location_frame = $request->location_frame;
        $equipment->category_ids = $request->category_ids;
        $equipment->price = $request->price;
        $equipment->security_price = $request->security_price;
        $equipment->delivery_price = $request->delivery_price;
        $equipment->stock = $request->stock;
        $equipment->tags = $request->tags;
        $equipment->seo_title = $request->seo_title;
        $equipment->seo_description = $request->seo_description;
        if ($equipment->save()) {
            if(!empty($request->tickettype)){
            foreach ($request->tickettype as $i => $vclass_type) {

                $vclassType = new VclassType();
                $vclassType->vclass_id = $equipment->id;
                // $vclassType->bigcommerce_id = 0;
                $vclassType->ticket_price = $request->ticket_price[$i];
                $vclassType->title = $vclass_type;
                $vclassType->tag = $request->ticket_tag[$i];
                $vclassType->name = substr($request->title, 0, 150) . ' - ' . $vclass_type;


                // $vclassType->bigcommerce_id =2;
                // $vclassType->save();
                $field['name'] = $vclassType->name;
                $field['type'] = "physical";
                $field['weight'] = 1;
                $field['price'] = (int) $request->ticket_price[$i];
                $field['custom_url']['url'] = $equipment->slug . '+' . strtolower($vclass_type);
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
                $vclassType->bigcommerce_id = $result['data']['id'];

                if($vclassType->bigcommerce_id){
                    $this->__createModifier("Start Date",$vclassType->bigcommerce_id);
                    $this->__createModifier("End Date",$vclassType->bigcommerce_id);
                    $this->__assignChannel($vclassType->bigcommerce_id);
                }


                if ($result['data']['id']) {
                    if ($imag && $vclassType->bigcommerce_id) {
                        $field1['is_thumbnail'] = true;
                        $field1['image_url'] = $imag;
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
                            return redirect()->route('admin.vclasss.index')->with('error', $err);
                            // echo "cURL Error #:" . $err;
                        } else {
                            $result1 = json_decode($response1, true);
							if(!empty($result1['data']['id'])){
                            	$vclassType->bigcommerce_image_id = $result1['data']['id'];
							}
                        }
                    }

                    $vclassType->save();
                }
            }}
        }

        return redirect()->route('admin.equipment.index')->with('success', 'Equipment Added Successfully!');
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
        $response1 = curl_exec($curl);
        $err = curl_error($curl);
    }

    public function show(Request $request, Equipment $equipment)
    {
        return view('admin.equipment_rental.equipment.show', compact('equipment'), ['page_title' => 'Show Equipment']);
    }

    public function edit(Equipment $equipment)
    {
        $equipment_categories = EquipmentCategory::select('id', 'name')->where('is_delete', '0')->orderBy('name', 'asc')->get();
      
        return view('admin.equipment_rental.equipment.edit', compact('equipment', 'equipment_categories'), ['page_title' => 'Edit Equipment']);
    }

    public function update(Request $request, Equipment $equipment)
    {
        $equipment->title = $request->title;
        $equipment->slug = Str::slug($request->title);
        $equipment->description = $request->description;
        $imag = null;
        $equipment->images = $request->oldImage;
        if ($request->has('images')) {
            $images = array();
            foreach ($request->file('images') as $image) {
                array_push($images, imageUpload($image, 'backend/admin/images/equipment_management/equipments'));
                $imag = $image;
            }
            if(!empty($request->oldImages)){
                $equipment->images = array_merge($request->oldImages,$images);
            }else{
                $equipment->images = $images;
            }
          
        }
        $equipment->terms = $request->terms;
        $equipment->start_date = $request->start_date;
        $equipment->store_address = $request->store_address;
        $equipment->location_frame = $request->location_frame;
        $equipment->category_ids = $request->category_ids;
        $equipment->price = $request->price;
        $equipment->security_price = $request->security_price;
        $equipment->delivery_price = $request->delivery_price;
        $equipment->stock = $request->stock;
        $equipment->tags = $request->tags;
        $equipment->seo_title = $request->seo_title;
        $equipment->seo_description = $request->seo_description;
        if ($equipment->save() ) {
            /* foreach ($request->tickettype as $i => $vclass_type) {

                if (!$request->bigcomm[$i]) {

                    $vclassType = new VclassType();
                    $vclassType->vclass_id = $equipment->id;
                    $vclassType->ticket_price = $request->ticket_price[$i];
                    $vclassType->title = $vclass_type;
                    $vclassType->tag = $request->ticket_tag[$i];
                    $vclassType->name = substr($equipment->title, 0, 150) . ' - ' . $vclass_type;


                    // $vclassType->bigcommerce_id =2;
                    // $vclassType->save();
                    $field['name'] = $vclassType->name;
                    $field['type'] = "physical";
                    $field['weight'] = 1;
                    $field['price'] = (int) $request->ticket_price[$i];
                    $field['custom_url']['url'] = $equipment->slug . '+' . strtolower($vclass_type);
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
                    $vclassType->vclass_id = $equipment->id;
                    $vclassType->ticket_price = $request->ticket_price[$i];
                    $vclassType->title = $vclass_type;
                    $vclassType->tag = $request->ticket_tag[$i];
                    $vclassType->name = substr($equipment->title, 0, 150) . ' - ' . $vclass_type;
                    $vclassType->save();

                    // $vclassType->bigcommerce_id =2;
                    // $vclassType->save();
                    $field['name'] = $vclassType->name;
                    $field['type'] = "physical";
                    $field['weight'] = 1;
                    $field['price'] = (int) $request->ticket_price[$i];
                    $field['custom_url']['url'] = $equipment->slug . '+' . strtolower($vclass_type);
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
            } */
        }

        return redirect()->route('admin.equipment.index')->with('success', 'Equipment Updated Successfully!');
    }

    public function destroy(Equipment $equipment)
    {
        $equipment->is_delete = '1';

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.bigcommerce.com/stores/suzeuussqe/v3/catalog/products/" . $equipment->bigcommerce_id,
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

        $equipment->save();

        return back()->with('error', 'Equipment Deleted Successfully!');
    }

    public function checkProductName(Request $request)
    {
        $existing = Equipment::where(['title' => $request->title, 'is_delete' => '0'])->first();
        if ($existing) {
            return response()->json(false);
        } else {
            return response()->json(true);
        }
    }

}
