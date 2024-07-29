<?php

namespace App\Http\Controllers\Api;

use Hash;
use JWTAuth;
use App\Mail\Forgot;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;

class LoginController extends Controller
{

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|string|min:6',
            'email' => 'required|email'
        ]);
        if ($validator->fails()) {
            return $this->errorResponse($validator->messages());
        }
        if (!$token = auth()->attempt($validator->validated())) {
            return $this->errorResponse('Wrong Email!');
        }
        if ($request->user_type) {
            $user = User::where('email', $request->email)->where('user_type', $request->user_type)->first();
        } else {
            $user = User::where('email', $request->email)->first();
        }

        if ($user) {
            if (Hash::check($request->password, $user->password)) {

                $tokken = $this->createNewToken($token);
                $dataArray['access_token'] = $tokken->original['access_token'];
                $dataArray['token_type'] = $tokken->original['token_type'];
                $dataArray['user_info'] = $user;

                return $this->successResponse($dataArray, "User Login Successfully.");
            } else {
                return $this->errorResponse("Wrong Password!");
            }
        } else {
            return $this->errorResponse("Email Not Found.");
        }
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return $this->successResponse((object) [], "User successfully signed out");

    }
    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->createNewToken(auth()->refresh());
    }
    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function userProfile()
    {
        return $this->successResponse(auth()->user(), "User Details");
    }
    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function createNewToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }

    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => ['required', 'min:7', 'confirmed'],
            'password_confirmation' => ['required', 'min:7'],
            'code' => ['required'],
        ]);
        if ($validator->fails()) {
            return $this->errorResponse('Password Not Matched.');
        }

        if ($request->code) {
            $user = User::where('reset_code', $request->code)->first();
            if ($user) {

                $user->password = Hash::make($request->password);
                $user->reset_code = NULL;
                if ($user->save()) {
                    $field[0]['id'] = $user->bigcommerce_customer_id;
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
                        CURLOPT_CUSTOMREQUEST => "PUT",
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

                    return $this->successResponse((object) [], "Password has been successfully changed.");
                }
            } else {
                return $this->errorResponse('User Not Found.');
            }
        } else {
            return $this->errorResponse('Code Not Found.');
        }
    }

    public function forgotPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => [
                'required',
                'email',
            ],
        ]);
        if ($validator->fails()) {
            return $this->errorResponse('Wrong Email!');
        }
        $user = User::where('email', $request->email)->first();
        if ($user) {
            $random_string = Str::random(10);
            $user->reset_code = $random_string;
            if ($user->save()) {
                try {
                    Mail::to($user->email)->send(new Forgot($user->reset_code));
                } catch (\Exception $e) {

                }
            }
            return $this->successResponse((object) [], "Reset Password Link  has been Sent to the Email.");

        } else {
            return $this->errorResponse((object) [], "Email Not Found.");
        }
    }

    public function profileUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email'
        ]);
        if ($validator->fails()) {
            return $this->errorResponse($validator->messages());
        }
        $user = User::where('id', $request->user()->id)->first();
        if ($user) {
            if ($request->current_password) {
                $validator = Validator::make($request->all(), [
                    'current_password' => ['required', 'min:7'],
                    'password' => ['required', 'min:7', 'confirmed'],
                    'password_confirmation' => ['required', 'min:7'],

                ]);
                if ($validator->fails()) {
                    return $this->errorResponse($validator->messages());
                }
                if (Hash::check($request->current_password, $user->password)) {
                    //password change
                    $field[0]['id'] = $user->bigcommerce_customer_id;
                    $field[0]['authentication']['force_password_reset'] = false;
                    $field[0]['authentication']['new_password'] = $request->password;
                    $user->password = Hash::make($request->password);
                } else {
                    return $this->errorResponse("Invalid Old Password");
                }
            }
            $user->name = $request->name;
            $user->last_name = $request->last_name;
            $user->company = $request->company;
            $user->mobile_number = $request->phone_number;
            if ($request->has('profile_image')) {
                $user->avatar = imageUpload($request->file('profile_image'), 'backend/admin/images/users/avatar');
            }
            if ($user->save()) {


                $field[0]['id'] = $user->bigcommerce_customer_id;
                $field[0]['first_name'] = $request->name;
                $field[0]['last_name'] = $request->last_name;

                $dataa = json_encode($field);

                $curl = curl_init();

                curl_setopt_array($curl, [
                    CURLOPT_URL => "https://api.bigcommerce.com/stores/suzeuussqe/v3/customers",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "PUT",
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
                return $this->successResponse($user, "User Information Updated Successfully");
            } else {
                return $this->errorResponse("Error Occurs");
            }

        } else {
            return $this->errorResponse("User Not Found");
        }

    }
}
