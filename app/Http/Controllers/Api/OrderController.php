<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Admin\Order;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function orderCreate()
    {
        $json = file_get_contents('php://input');
        $order_data = json_decode($json);
        $order_id = $order_data->data->id;

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.bigcommerce.com/stores/suzeuussqe/v2/orders/" . $order_id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_SSL_VERIFYPEER => false,
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
            $result = json_decode($response, true);
            $address = $result['billing_address'];
            $cart_id = $result['cart_id'];
            $user_id = $result['customer_id'];

            $user = User::where('bigcommerce_customer_id', $user_id)->first();
            if ($user) {
                $orderr = new Order();
                $orderr->user_id = $user_id;
                $orderr->bigcommerce_id = $order_id;
                $orderr->user_info = $address;
                $orderr->cart_id = $cart_id;
                $orderr->save();
            } else {
                $orderr = new Order();
                $orderr->bigcommerce_id = $order_id;
                $orderr->save();
            }
        }

    }
}
