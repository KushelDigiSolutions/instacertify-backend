<?php

namespace App\Http\Controllers\Api;

use Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'password' => 'min:8',
            'email' => 'required|email|max:255|unique:users'
        ]);
        if ($validator->fails()) {
            return $this->errorResponse($validator->messages());
        }

        $user = new User;
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        if ($request->mobile_number) {
            $user->mobile_number = $request->mobile_number;
        }
        $user->email = $request->email;
        $user->user_type = 'user';
        $user->password = Hash::make($request->password);


        $field[0]['first_name'] = $request->name;
        $field[0]['email'] = $request->email;
        $field[0]['last_name'] = $request->last_name;
        $field[0]['authentication']['force_password_reset'] = false;
        $field[0]['authentication']['new_password'] = $request->password;

        $dataa = json_encode($field);

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.bigcommerce.com/stores/suzeuussqe/v3/customers",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_POSTFIELDS => $dataa,
            CURLOPT_HTTPHEADER => [
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
            $result = json_decode($response, true);
            // return $result;
        }
        $user->bigcommerce_customer_id = $result['data'][0]['id'];
        if ($result['data'][0]['id']) {
            $user->save();
        } else {
            return $this->errorResponse("Error Found");
        }

        return $this->successResponse($user, "User Registration Successfully");
    }

}
