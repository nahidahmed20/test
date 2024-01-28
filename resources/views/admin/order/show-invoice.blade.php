@extends('admin.master')

@section('body')


    <style>
    .invoice-box {
    width: 100%;
    margin: auto;
    padding: 30px;
    border: 1px solid #eee;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
    font-size: 16px;
    line-height: 24px;
    font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    color: #555;
    }

    .invoice-box table {
    width: 100%;
    line-height: inherit;
    text-align: left;
    }

    .invoice-box table td {
    padding: 5px;
    vertical-align: top;
    }

    .invoice-box table tr td:nth-child(2) {
    text-align: right;
    }

    .invoice-box table tr.top table td {
    padding-bottom: 20px;
    }

    .invoice-box table tr.top table td.title {
    font-size: 45px;
    line-height: 45px;
    color: #333;
    }

    .invoice-box table tr.information table td {
    padding-bottom: 40px;
    }

    .invoice-box table tr.heading td {
    background: #eee;
    border-bottom: 1px solid #ddd;
    font-weight: bold;
    }

    .invoice-box table tr.details td {
    padding-bottom: 20px;
    }

    .invoice-box table tr.item td {
    border-bottom: 1px solid #eee;
    }

    .invoice-box table tr.item.last td {
    border-bottom: none;
    }

    .invoice-box table tr.total td:nth-child(2) {
    border-top: 2px solid #eee;
    font-weight: bold;
    }

    @media only screen and (max-width: 600px) {
    .invoice-box table tr.top table td {
    width: 100%;
    display: block;
    text-align: center;
    }

    .invoice-box table tr.information table td {
    width: 100%;
    display: block;
    text-align: center;
    }
    }

    /** RTL **/
    .invoice-box.rtl {
    direction: rtl;
    font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }

    .invoice-box.rtl table {
    text-align: right;
    }

    .invoice-box.rtl table tr td:nth-child(2) {
    text-align: left;
    }
    </style>

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Order Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Admin Order</a></li>
                <li class="breadcrumb-item active" aria-current="page">Show Invoice</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->


    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card card-body">
                <div class="invoice-box">
                    <table cellpadding="0" cellspacing="0">
                        <tr class="top">
                            <td colspan="4">
                                <table>
                                    <tr>
                                        <td class="title">
                                            <img
                                                src="http://localhost/ecom-batch-9/public/website/assets/images/logo/logo.svg"
                                                style="width: 100%; max-width: 300px"
                                            />
                                        </td>

                                        <td>
                                            Invoice #: 00{{$order->id}}<br />
                                            Order Date: {{$order->order_date}}<br />
                                            Invoice Date: {{date('Y-m-d')}}
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>

                        <tr class="information">
                            <td colspan="4">
                                <table>
                                    <tr>
                                        <td>
                                            <h3><b>Shipping Info</b></h3>
                                            {{$order->customer->name}}<br />
                                            {{$order->customer->mobile}}<br />
                                            {{$order->customer->email}}<br />
                                            {{$order->delivery_address}}<br />
                                        </td>

                                        <td>
                                            <h3><b>Company Info</b></h3>
                                            Acme Corp.<br />
                                            John Doe<br />
                                            john@example.com
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>

                        <tr class="heading">
                            <td colspan="3">Payment Method</td>

                            <td>{{$order->payment_method}}</td>
                        </tr>

                        <tr class="details">
                            <td colspan="3">{{$order->payment_method}}</td>

                            <td>{{$order->order_total}}</td>

                        <tr class="heading">
                            <td>Item Info</td>
                            <td>Unit Price</td>
                            <td align="right">Quantity</td>
                            <td align="right">Total Price</td>
                        </tr>
                        </tr>

                        @php($sum = 0)
                        @foreach($order->orderDetails as $orderDetail)
                        <tr class="item">
                            <td>{{$orderDetail->product_name}}</td>
                            <td>{{$orderDetail->product_price}}</td>
                            <td align="right">{{$orderDetail->product_quantity}}</td>
                            <td align="right">{{$total = $orderDetail->product_price*$orderDetail->product_quantity}}</td>
                        </tr>
                        @php($sum = $sum + $total)
                        @endforeach
                        <tr class="total">
                            <td colspan="3"></td>
                            <td>Total: {{$sum}}</td>
                        </tr>
                        <tr class="total">
                            <td colspan="3"></td>
                            <td>Tax Total: {{$tax = $sum*0.15}}</td>
                        </tr>
                        <tr class="total">
                            <td colspan="3"></td>
                            <td>Shipping Total: {{$shipping = 100}}</td>
                        </tr>
                        <tr class="total">
                            <td colspan="3"></td>
                            <td>Total Payable: {{$sum + $tax + $shipping}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->



@endsection


