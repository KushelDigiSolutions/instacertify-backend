<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Admin\Vclass;
use App\Http\Controllers\Controller;
use \Validator;
use Carbon\Carbon;
use App\Models\Admin\Location;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\Vclasss;
use App\Models\Admin\VclassCategory;

class VclassController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:vclasses-list', ['only' => ['index', 'show']]);
        $this->middleware('permission:vclasses-create', ['only' => ['store']]);
        $this->middleware('permission:vclasses-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:vclasses-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $search_key = $request->search_key;
        $search_status = $request->search_status;
		
  
		$vclasss = Vclass::where('is_delete', '0');
        if ($search_key) {
            $vclasss = $vclasss->where('title', 'like', '%' . $search_key . '%');
        } 
        if ($search_status == '1' || $search_status == '0') {
            $vclasss = $vclasss->where('is_active', $search_status);
        }

        $vclasss = $vclasss->orderBy('title', 'asc')->paginate(10);

        if ($request->ajax()) {
            return view('admin.vclass_management.vclass.table', compact('vclasss', 'search_key', 'search_status'));
        }

		$vclasss = Vclass::where('is_delete', '0')->orderBy('id', 'desc')->paginate(10);
        return view('admin.vclass_management.vclass.index', compact('vclasss', 'search_key', 'search_status'), ['page_title' => 'Class List']);
    }

    public function create()
    {
        $vclass_categories = VclassCategory::select('id', 'name')->where('is_delete', '0')->orderBy('name', 'asc')->get();

        return view('admin.vclass_management.vclass.create', compact('vclass_categories'), ['page_title' => 'Add Vclass']);
    }

    public function store(Request $request)
    {
		
        $vclass = new Vclass;
        $vclass->title = $request->title;
        $vclass->slug = Str::slug($request->title);
        $vclass->prerequisites = $request->prerequisites;
        $vclass->description = $request->description;
        $imag = null;
        $images = array();
        foreach ($request->file('images') as $image) {
            array_push($images, imageUpload($image, 'backend/admin/images/vclass_management/vclass'));
           
        }
        if(!empty($images[0])){
            $imag = $images[0];
        }
        $vclass->images = $images;
		if(!empty($request->file('banner'))){
			 $images1 = array();
			foreach ($request->file('banner') as $image1) {
				array_push($images1, imageUpload($image1, 'backend/admin/images/vclass_management/vclass'));
				$imag1 = $image1;
			}
			$vclass->banner = $images1;
		}
		$vclass->video = $request->video;
		$vclass->location = $request->location;	
        $vclass->category_ids = $request->category_ids;
        $vclass->class_length = $request->class_length;
        $vclass->start_date = $request->start_date;
        $vclass->end_date = $request->end_date;
		$vclass->price = $request->price;
		$vclass->iframe = $request->iframe;
		$vclass->total_student = $request->total_student;
        $vclass->seo_title = $request->seo_title;
        $vclass->seo_description = $request->seo_description;
        $vclass->single_day = $request->single_day;
        $vclass->all_day = $request->all_day;
		$vclass->is_active = $request->is_active;
        $vclass->instruct_name = !empty($request->instruct_name)?$request->instruct_name: "";
        $vclass->instruct_bio = !empty($request->instruct_bio)?$request->instruct_bio: "";
        
		if(!empty($request->file('instruct_pic'))){
			 $images2 = array();
			foreach ($request->file('instruct_pic') as $image2) {
				array_push($images2, imageUpload($image2, 'backend/admin/images/vclass_management/instructors'));
				$imag2 = $image2;
			}
			$vclass->instruct_pic = $images2;
		}
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
					
					Vclass::where('id',$vclass->id)->update(['bigcommerce_id'=>$result['data']['id']]);

					
                    if ($imag && $result['data']['id']) {
                        $field1['is_thumbnail'] = true;
                        $field1['image_url'] = $imag;
                        $dataa1 = json_encode($field1);

                        $curl = curl_init();

                        curl_setopt_array($curl, [
                            CURLOPT_URL => "https://api.bigcommerce.com/stores/suzeuussqe/v3/catalog/products/".$result['data']['id']. "/images",
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
                          //  	$vclassType->bigcommerce_image_id = $result1['data']['id'];
							}
                        }
                    }
                }
            
        }
        return redirect()->route('admin.vclasses.index')->with('success', 'Vclass Added Successfully!');
    }

    public function show(Request $request, Vclass $vclass)
    {
        $vclass_categories = VclassCategory::select('id', 'name')->where('is_delete', '0')->whereIn('id', $vclass->category_ids )->orderBy('name', 'asc')->get();
     
        return view('admin.vclass_management.vclass.show', compact('vclass','vclass_categories'), ['page_title' => 'Show Vclass']);
    }

    public function edit(Vclass $vclass)
    {
        $vclass_categories = VclassCategory::select('id', 'name')->where('is_delete', '0')->orderBy('name', 'asc')->get();
        // Model Not found hence commented out
        // $vclassyype = VclassType::where('vclass_id', $vclass->id)->orderBy('name', 'asc')->get();
        $vclassyype = "";
        // Swapin 

        return view('admin.vclass_management.vclass.edit', compact('vclass', 'vclass_categories', 'vclassyype'), ['page_title' => 'Edit Vclass']);
    }

    public function update(Request $request, Vclass $vclass)
    {
        $vclass->title = $request->title;
        $vclass->slug = Str::slug($request->title);
        // Commented by swapin No SQLSTATE[42S22]: Column not found: 1054 Unknown column 'short_description' in 'field list'
        // $vclass->short_description = $request->short_description;
        // Swapin End
        $vclass->description = $request->description;
        $imag = null;
        if ($request->has('images')) {
            $images = array();
            foreach ($request->file('images') as $image) {
                array_push($images, imageUpload($image, 'backend/admin/images/vclass_management/vclasss'));
                $imag = $image;
            }
            if(!empty($request->oldImages)){
                $vclass->images = array_merge($request->oldImages,$images);
            }else{
                $vclass->images = $images;
            }
          
        }

        if(!empty($request->file('banner'))){
            $images1 = array();
           foreach ($request->file('banner') as $image1) {
               array_push($images1, imageUpload($image1, 'backend/admin/images/vclass_management/vclass'));
               $imag1 = $image1;
           }
           if(!empty($request->oldBanner)){
                $vclass->banner = array_merge($request->oldBanner,$images1);
            }else{
                $vclass->banner = $images1;
            }
       }

       if(!empty($request->file('instruct_pic'))){
                $images2 = array();
            foreach ($request->file('instruct_pic') as $image2) {
                array_push($images2, imageUpload($image2, 'backend/admin/images/vclass_management/instructors'));
                $imag2 = $image2;
            }
            if(!empty($request->oldInstructor)){
                $vclass->instruct_pic = array_merge($request->oldInstructor,$images2);
            }else{
                $vclass->instruct_pic = $images2;
            }
        }
        $vclass->instruct_name = !empty($request->instruct_name)?$request->instruct_name: "";
        $vclass->instruct_bio = !empty($request->instruct_bio)?$request->instruct_bio: "";
        $vclass->total_student = $request->number_of_tickets;
        $vclass->location = $request->location;
        if ($request->has('single_day')) {
            $vclass->date = $request->date;
            $vclass->single_day = '1';
        } else {
            $vclass->start_date = $request->start_date;
            $vclass->end_date = $request->end_date;
            $vclass->single_day = '0';
        }
        if (!$request->has('all_day')) {
            $vclass->all_day = '0';
        } else {
            $vclass->all_day = '1';
        }
        $vclass->video = $request->video;
        $vclass->category_ids = $request->category_ids;
        $vclass->seo_title = $request->seo_title;
        $vclass->seo_description = $request->seo_description;
        if ($vclass->save() && !empty($request->tickettype)) {
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

        return redirect()->route('admin.vclasses.index')->with('success', 'Vclass Updated Successfully!');
    }

    public function makeDel($id)
    {
        //dd($vclass);
        $vclass = Vclass::findOrFail($id);
       

        // $curl = curl_init();

        // curl_setopt_array($curl, [
        //     CURLOPT_URL => "https://api.bigcommerce.com/stores/suzeuussqe/v3/catalog/products/" . $vclass->bigcommerce_id,
        //     CURLOPT_RETURNTRANSFER => true,
        //     CURLOPT_ENCODING => "",
        //     CURLOPT_MAXREDIRS => 10,
        //     CURLOPT_TIMEOUT => 30,
        //     CURLOPT_SSL_VERIFYPEER => false,
        //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //     CURLOPT_CUSTOMREQUEST => "DELETE",
        //     CURLOPT_HTTPHEADER => [
        //         "Accept: application/json",
        //         "Content-Type: application/json",
        //         "X-Auth-Token: b4rd5x5aimj4zwv6arra5bdle8qoi8w"
        //     ],
        // ]);

        // $response = curl_exec($curl);
        // $err = curl_error($curl);

        // curl_close($curl);

        // if ($err) {
        //     echo "cURL Error #:" . $err;
        // } else {

        // }

       $vclass->delete();
        

        return back()->with('error', 'Vclass Deleted Successfully!');
    }

    public function checkProductName(Request $request)
    {
        $existing = Vclass::where(['title' => $request->title, 'is_delete' => '0'])->first();
        if ($existing) {
            return response()->json(false);
        } else {
            return response()->json(true);
        }
    }

    public function toggleActive($id)
    {
        $vclass = Vclass::findOrFail($id);
        $vclass->update(['is_active' => !$vclass->is_active]);

        return response()->json(['status' => 'success', 'is_active' => $vclass->is_active , 'id' => $vclass->id]);
    }


    public function duplicateVclass($id)
{
    // Find the original Vclass
    $originalVclass = Vclass::find($id);

    //dd($originalVclass);

    // Create a new instance of Vclass and copy the data
    $newVclass = new Vclass;
    //dd($originalVclass->toArray());
    $newVclass->fill($originalVclass->toArray());

    // Append "Copy of" to the title
    $newVclass->title = "Copy of " . $newVclass->title;

    $newVclass->instruct_pic = $newVclass->instruct_pic;

    // Save the new instance
    $newVclass->save();

    // Redirect or do anything else as needed
    return redirect()->route('admin.vclasses.index')->with('success', 'Vclass duplicated Successfully!');
}


}
