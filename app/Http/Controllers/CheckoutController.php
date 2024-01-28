<?php

namespace App\Http\Controllers;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Cart;
use Session;




class CheckoutController extends Controller
{
    private $customer, $order, $orderDetail, $sslCommerzPaymentController;

    public function index()
    {
        if (Session::get('customer_id'))
        {
            $this->customer = Customer::find(Session::get('customer_id'));
        }
        return view('website.checkout.index',['customer' => $this->customer]);
    }

    public function newOrder(Request $request)
    {
        if (Session::get('customer_id'))
        {
            $this->customer = Customer::find(Session::get('customer_id'));
        }
        else
        {
            $this->customer = Customer::where('email', $request->email)->orWhere('mobile', $request->mobile)->first();

            if (!$this->customer)
            {
                $this->customer = Customer::newCustomer($request);
            }
            Session::put('customer_id',$this->customer->id);
            Session::put('customer_name',$this->customer->name);
        }


        if ($request->payment_method == 'Cash')
        {
            $this->order = Order::customerNewOrder($request, $this->customer->id);
            OrderDetail::newOrderDetail($this->order->id);
            return redirect('/complete-order')->with('message','Congratulation.. your order info post successfully. Please wait we will contact with you very soon.');

        }

        $this->sslCommerzPaymentController = new SslCommerzPaymentController();
        $this->sslCommerzPaymentController->index($request, $this->customer);
    }


    public function completeOrder()
    {
        return view('website.checkout.complete-order');
    }
}
