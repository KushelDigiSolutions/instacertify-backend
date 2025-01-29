<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Admin\Qco;
use App\Http\Controllers\Controller;
use \Validator;
use Carbon\Carbon;
use App\Models\Admin\Location;
use App\Models\Admin\QcoType;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\Qcos;
use App\Models\Admin\QcoCategory;

class QcoController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:qco-list', ['only' => ['index', 'show']]);
        $this->middleware('permission:qco-create', ['only' => ['store']]);
        $this->middleware('permission:qco-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:qco-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $search_key = $request->search_key;
        $search_status = $request->search_status;
		
  
		$qcos = Qco::where('is_delete', '0');
        if ($search_key) {
            $qcos = $qcos->where('title', 'like', '%' . $search_key . '%');
        } 
        if ($search_status == '1' || $search_status == '0') {
            $qcos = $qcos->where('is_active', $search_status);
        }

        $qcos = $qcos->orderBy('title', 'asc')->paginate(10);

        if ($request->ajax()) {
            return view('admin.qco_management.qco.table', compact('qcos', 'search_key', 'search_status'));
        }

		$qcos = qco::where('is_delete', '0')->orderBy('id', 'desc')->paginate(10);
        return view('admin.qco_management.qco.index', compact('qcos', 'search_key', 'search_status'), ['page_title' => 'qco List']);
    }

    public function create()
    {
        $qco_categories = QcoCategory::select('id', 'name')->where('is_delete', '0')->orderBy('name', 'asc')->get();

        return view('admin.qco_management.qco.create', compact('qco_categories'), ['page_title' => 'Add qco']);
    }

    public function store(Request $request)
    {
        $qco = new Qco;
        $qco->title = $request->title;
        $qco->slug = Str::slug($request->title);
        $qco->short_description = $request->short_description;
        $qco->description = $request->description;
        $imag = null;
        $images = array();
        foreach ($request->file('images') as $image) {
            array_push($images, imageUpload($image, 'backend/admin/images/qco_management/qcos'));
        }
        if(!empty($images[0])){
            $imag = $images[0];
        }
        $qco->images = $images;
        $qco->number_of_tickets = $request->number_of_tickets;
        // $qco->ticket_price = $request->ticket_price;
        $qco->location_iframe = $request->location_iframe;
        $qco->location = $request->location;
        if ($request->has('single_day')) {
            $qco->date = $request->date;
			$qco->start_date = $request->date;
            $qco->single_day = '1';
        } else {
			$qco->date = $request->start_date;
            $qco->start_date = $request->start_date;
            $qco->end_date = $request->end_date;
            $qco->single_day = '0';
        }
        if (!$request->has('all_day')) {
            $qco->start_time = $request->start_time;
            $qco->end_time = $request->end_time;
            $qco->all_day = '0';
        } else {
            $qco->all_day = '1';
        }
        $qco->category_ids = $request->category_ids;
        $qco->seo_title = $request->seo_title;
        $qco->seo_description = $request->seo_description;
        if ($qco->save()) {
            if(!empty($request->tickettype)){
            foreach ($request->tickettype as $i => $qco_type) {

                $qcoType = new QcoType();
                $qcoType->qco_id = $qco->id;
                // $qcoType->bigcommerce_id = 0;
                $qcoType->ticket_price = $request->ticket_price[$i];
                $qcoType->title = $qco_type;
                $qcoType->tag = $request->ticket_tag[$i];
                $qcoType->name = substr($request->title, 0, 150) . ' - ' . $qco_type;


                // $qcoType->bigcommerce_id =2;
                // $qcoType->save();
                $field['name'] = $qcoType->name;
                $field['type'] = "physical";
                $field['weight'] = 1;
                $field['price'] = (int) $request->ticket_price[$i];
                $field['custom_url']['url'] = $qco->slug . '+' . strtolower($qco_type);
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
                $qcoType->bigcommerce_id = $result['data']['id'];
                if ($result['data']['id']) {
                    if ($imag && $qcoType->bigcommerce_id) {
                        $field1['is_thumbnail'] = true;
                        $field1['image_url'] = $imag;
                        $dataa1 = json_encode($field1);

                        $curl = curl_init();

                        curl_setopt_array($curl, [
                            CURLOPT_URL => " https://api.bigcommerce.com/stores/suzeuussqe/v3/catalog/products/" . $qcoType->bigcommerce_id . "/images",
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
                            return redirect()->route('admin.qcos.index')->with('error', $err);
                            // echo "cURL Error #:" . $err;
                        } else {
                            $result1 = json_decode($response1, true);
							if(!empty($result1['data']['id'])){
                            	$qcoType->bigcommerce_image_id = $result1['data']['id'];
							}
                        }
                    }

                    $qcoType->save();
                }
            }}
        }

        return redirect()->route('admin.qcos.index')->with('success', 'qco Added Successfully!');
    }

    public function show(Request $request, Qco $qco)
    {
        return view('admin.qco_management.qco.show', compact('qco'), ['page_title' => 'Show qco']);
    }

    public function edit(Qco $qco)
    {
        $qco_categories = QcoCategory::select('id', 'name')->where('is_delete', '0')->orderBy('name', 'asc')->get();
        $qcoyype = QcoType::where('qco_id', $qco->id)->orderBy('name', 'asc')->get();

        return view('admin.qco_management.qco.edit', compact('qco', 'qco_categories', 'qcotype'), ['page_title' => 'Edit qco']);
    }

    public function update(Request $request, Qco $qco)
    {
        $qco->title = $request->title;
        $qco->slug = Str::slug($request->title);
        $qco->short_description = $request->short_description;
        $qco->description = $request->description;
        $imag = null;
        
        if ($request->has('images')) {
            $images = array();
            foreach ($request->file('images') as $image) {
                array_push($images, imageUpload($image, 'backend/admin/images/qco_management/qcos'));
                $imag = $image;
            }
            if(!empty($request->oldImages)){
                $qco->images = array_merge($request->oldImages,$images);
            }else{
                $qco->images = $images;
            }
          
        }
        $qco->number_of_tickets = $request->number_of_tickets;
        // $qco->ticket_price = $request->ticket_price;
        $qco->location_iframe = $request->location_iframe;
        $qco->location = $request->location;
        if ($request->has('single_day')) {
            $qco->date = $request->date;
            $qco->single_day = '1';
        } else {
            $qco->start_date = $request->start_date;
            $qco->end_date = $request->end_date;
            $qco->single_day = '0';
        }
        if (!$request->has('all_day')) {
            $qco->start_time = $request->start_time;
            $qco->end_time = $request->end_time;
            $qco->all_day = '0';
        } else {
            $qco->all_day = '1';
        }
        $qco->category_ids = $request->category_ids;
        $qco->seo_title = $request->seo_title;
        $qco->seo_description = $request->seo_description;
        if ($qco->save() && !empty($request->tickettype)) {
            foreach ($request->tickettype as $i => $qco_type) {

                if (!$request->bigcomm[$i]) {

                    $qcoType = new QcoType();
                    $qcoType->qco_id = $qco->id;
                    $qcoType->ticket_price = $request->ticket_price[$i];
                    $qcoType->title = $qco_type;
                    $qcoType->tag = $request->ticket_tag[$i];
                    $qcoType->name = substr($qco->title, 0, 150) . ' - ' . $qco_type;


                    // $qcoType->bigcommerce_id =2;
                    // $qcoType->save();
                    $field['name'] = $qcoType->name;
                    $field['type'] = "physical";
                    $field['weight'] = 1;
                    $field['price'] = (int) $request->ticket_price[$i];
                    $field['custom_url']['url'] = $qco->slug . '+' . strtolower($qco_type);
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

                    $qcoType->bigcommerce_id = $result['data']['id'];
                    if ($imag && $qcoType->bigcommerce_id) {
                        $field1['image_file'] = $imag;
                        $dataa1 = json_encode($field1);

                        $curl = curl_init();

                        curl_setopt_array($curl, [
                            CURLOPT_URL => " https://api.bigcommerce.com/stores/suzeuussqe/v3/catalog/products/" . $qcoType->bigcommerce_id . "/images",
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
                            $qcoType->bigcommerce_image_id = $result2['data']['id'];
                        }
                    }

                    $qcoType->save();

                } else {
                    $qcoType = QcoType::where('bigcommerce_id', $request->bigcomm[$i])->first();
                    $qcoType->qco_id = $qco->id;
                    $qcoType->ticket_price = $request->ticket_price[$i];
                    $qcoType->title = $qco_type;
                    $qcoType->tag = $request->ticket_tag[$i];
                    $qcoType->name = substr($qco->title, 0, 150) . ' - ' . $qco_type;
                    $qcoType->save();

                    // $qcoType->bigcommerce_id =2;
                    // $qcoType->save();
                    $field['name'] = $qcoType->name;
                    $field['type'] = "physical";
                    $field['weight'] = 1;
                    $field['price'] = (int) $request->ticket_price[$i];
                    $field['custom_url']['url'] = $qco->slug . '+' . strtolower($qco_type);
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
                        CURLOPT_URL => "https://api.bigcommerce.com/stores/suzeuussqe/v3/catalog/products/" . $request->bigcomm[$i] . "/images/" . $qcoType->bigcommerce_image_id,
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

        return redirect()->route('admin.qcos.index')->with('success', 'qco Updated Successfully!');
    }

    public function destroy(Qco $qco)
    {
        $qco->is_delete = '1';

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.bigcommerce.com/stores/suzeuussqe/v3/catalog/products/" . $qco->bigcommerce_id,
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

        $qco->save();

        return back()->with('error', 'qco Deleted Successfully!');
    }

    public function toggleActive($id)
    {
        $qco = Qco::findOrFail($id);
        $qco->update(['is_active' => !$qco->is_active]);

        return response()->json(['status' => 'success', 'is_active' => $qco->is_active , 'id' => $qco->id]);
    }

    public function checkProductName(Request $request)
    {
        $existing = Qco::where(['title' => $request->title, 'is_delete' => '0'])->first();
        if ($existing) {
            return response()->json(false);
        } else {
            return response()->json(true);
        }
    }
}
