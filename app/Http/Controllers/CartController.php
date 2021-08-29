<?php

namespace App\Http\Controllers;

use App\Handle\LanguageHandle;
use App\Models\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CartController extends Controller
{
    private function validateCaptcha($g_recaptcha)
    {
        $client = new Client();
        $response = $client->post(
            'https://www.google.com/recaptcha/api/siteverify',
            ['form_params' =>
                [
                    'secret' => env('GOOGLE_RECAPTCHA_SECRET'),
                    'response' => $g_recaptcha
                ]
            ]
        );
        $body = json_decode($response->getBody(), true);
        return $body['success'];
    }

    public function store(Request $request)
    {
        if (!Cart::count()) {
            return back()->with('notify', ["type" => 'danger', 'message' => LanguageHandle::____("Cart not found!")]);
        }

        $data = $request->only('g-recaptcha-response', 'name', 'number_phone', 'email', 'address');

        $validator = Validator::make($data, [
            'g-recaptcha-response' => 'required',
            'name' => 'required:max:500',
            'number_phone' => 'required:max:50',
            'address' => 'required:max:500',
            'email' => 'required:max:199'
        ]);

        if ($validator->fails()) {
            return back()->with('notify', ["type" => 'danger', 'message' => LanguageHandle::____($validator->errors()->first())]);
        }

        $captcha = $this->validateCaptcha($data['g-recaptcha-response']);
        if (!$captcha) {
            return back()->with('notify', ['message' => LanguageHandle::____('Captcha error!'), 'type' => 'danger']);
        }
        $data['order_id'] = time() . '_' . mb_strtoupper(Str::random(4)) . '_' . mb_strtoupper(Str::random(4));
        $data['orders'] = json_encode(Cart::content()->toarray());
        Order::create($data);
        Cart::destroy();
        return redirect()->route('order-success', ['order_id' => $data['order_id']]);
    }
}
