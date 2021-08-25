<?php

namespace App\Http\Controllers;

use Anand\LaravelPaytmWallet\Facades\PaytmWallet;
use App\Models\Order;
use Illuminate\Http\Request;

class PaytmController extends Controller
{
    public function paytmPaymentView($product, $amount)
    {
        return view('paytmPayment')->with(['amount' => $amount, 'product' => $product]);
    }

    public function makePayment(Request $request, $product, $amount)
    {
        $this->validate($request, [
            'full_name' => 'required|min:3',
            'email' => 'required|email',
            'mobile' => 'required|numeric|min:10',
        ]);

        $order = Order::create([
            'name' => $request->full_name,
            'mobile_number' => $request->mobile,
            'email' => $request->email,
            'product' => $product,
            'amount' => $amount,
            'order_id' => $request->mobile . "_" . rand(1, 1000)
        ]);

        $payment = PaytmWallet::with('receive');

        $payment->prepare([
            'order' => $order->order_id,
            'user' => $order->name,
            'mobile_number' => $order->mobile_number,
            'email' => $order->email,
            'amount' => $amount,
            'callback_url' => env('PAYTM_CALLBACK_URL')
        ]);

        return $payment->receive();
    }

    public function paymentCallback()
    {
        $transaction = PaytmWallet::with('receive');

        if ($transaction->isSuccessful()) {

            return redirect(route('paytmPaymentView'))->with('message', "Your payment is successfull.");
        } else if ($transaction->isFailed()) {

            return redirect(route('paytmPaymentView'))->with('message', "Your payment is failed.");
        } else if ($transaction->isOpen()) {

            return redirect(route('paytmPaymentView'))->with('message', "Your payment is processing.");
        }
    }
}
