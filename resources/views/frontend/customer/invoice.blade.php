<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('fontend/css/style.css') }}">
    <title>Invoice</title>
</head>

<body>
    <div id="invoiceholder">
        <div id="invoice" class="effect2">

            <div id="invoice-top">
                <div class="logo"><img src="{{ asset('fontend/images/logo.png') }}" alt="Logo" />
                </div>
                <div class="title">
                    <h1>Invoice #<span class="invoiceVal invoice_num">ord-inv-{{ $order_summery->id }}</span></h1>
                    <p>Invoice Date: <span
                            id="invoice_date">{{ $order_summery->created_at->format('d-M-Y') }}</span><br>
                        GL Date: <span id="gl_date">{{ $order_summery->created_at->format('d-M-Y') }}</span>
                    </p>
                </div>
                <!--End Title-->
            </div>
            <!--End InvoiceTop-->

            <div id="invoice-mid">
                <div id="message">
                    <h2>Hello {{ auth()->user()->name }},</h2>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Provident non quo praesentium optio,
                        quibusdam reiciendis.</p>
                </div>
                <div class="clearfix">
                    <div class="col-left">
                        <div class="clientlogo"><img
                                src="https://cdn3.iconfinder.com/data/icons/daily-sales/512/Sale-card-address-512.png"
                                alt="Sup" /></div>
                        <div class="clientinfo">
                            <h2 id="supplier">Order No. <td>{{ $order_summery->id }}</td>
                            </h2>
                            <p><span id="address">Address: {{ $order_summery->customer_address }}</span><br><span
                                    id="city">City: {{ $order_summery->customer_city }}</span><br><span
                                    id="tax_num">Phone Number:{{ $order_summery->custome_phone_number }}</span><br>
                            </p>
                        </div>
                    </div>
                    <div class="col-right">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td><span>Total Amount</span><label
                                            id="currency">{{ $order_summery->grand_total }}</label></td>
                                    <td><span>Payment Method</span><label
                                            id="currency">{{ $order_summery->payment_method }}</label></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><span>Note</span>#<label
                                            id="note">{{ $order_summery->customer_notes }}</label></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--End Invoice Mid-->

            <div id="invoice-bot">
                <div id="table">
                    <table class="table-main">
                        <thead>
                            <tr class="tabletitle">
                                <th>Serial No</th>
                                <th>Item Name</th>
                                <th>Size</th>
                                <th>Color</th>
                                <th>Quentity</th>
                                <th>Price</th>
                                <th>Total Price</th>
                                <th>Grant Price</th>
                            </tr>
                        </thead>
                        @foreach ($order_summery->relationWithOrder_detils as $key => $item)
                            <tr class="list-item">
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    {{ $item->relationwithproduct->product_name }}
                                </td>
                                <td>
                                    {{ $item->relationwithsize->size_name }}
                                </td>
                                <td>
                                    {{ $item->relationeithcolor->color_name }}
                                </td>
                                <td>
                                    {{ $item->user_input_amout }}
                                </td>
                                <td>
                                    {{ $item->relationwithproduct->product_discounted_price }}
                                </td>
                                <td>
                                    {{ $item->relationwithproduct->product_discounted_price * $item->user_input_amout }}
                                </td>
                                <td>
                                    {{ $order_summery->grand_total }}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>

            </div>
            <!--End InvoiceBot-->
            <footer>
                <div id="legalcopy" class="clearfix">
                    <p class="col-right">Our mailing address is:
                        <span class="email"><a href="panda@gamil.com">panda@gamil.com</a></span>
                    </p>
                </div>
            </footer>
        </div>
        <!--End Invoice-->
    </div><!-- End Invoice Holder-->
</body>

</html>
