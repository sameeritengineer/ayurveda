@php
    $address = json_decode($order->order_address);
    $shipping = json_decode($order->shpping_method);
    $coupon = json_decode($order->coupon);
@endphp
@extends('user.layouts.app')
@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Orders</h1>
        </div>
        <div class="section-body">
            <div class="invoice">
                @alert()
                <div class="invoice-print">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="invoice-title">
                                <h2></h2>
                                <div class="invoice-number">Order #{{ $order->invocie_id }}</div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <address>
                                        <strong>Billed To:</strong><br>
                                        <b>Name:</b> {{ $address->name }}<br>
                                        <b>Email: </b> {{ $address->email }}<br>
                                        <b>Phone:</b> {{ $address->phone }}<br>
                                        <b>Address:</b> {{ $address->address }},<br>
                                        {{ $address->city }}, {{ $address->state }}, {{ $address->zip }}<br>
                                        {{ $address->country }}
                                    </address>
                                </div>
                                <div class="col-md-6 text-md-right">
                                    <address>
                                        <strong>Billed To:</strong><br>
                                        <b>Name:</b> {{ $address->name }}<br>
                                        <b>Email: </b> {{ $address->email }}<br>
                                        <b>Phone:</b> {{ $address->phone }}<br>
                                        <b>Address:</b> {{ $address->address }},<br>
                                        {{ $address->city }}, {{ $address->state }}, {{ $address->zip }}<br>
                                        {{ $address->country }}
                                    </address>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <address>
                                        <strong>Payment Information:</strong><br>
                                        <b>Method:</b> {{ $order->payment_method }}<br>
                                        <b>Transaction Id: </b>{{ @$order->transaction->transaction_id }} <br>
                                        <b>Status: </b> {{ $order->payment_status === 1 ? 'Complete' : 'Pending' }}
                                    </address>
                                </div>
                                <div class="col-md-6 text-md-right">
                                    <address>
                                        <strong>Order Date:</strong><br>
                                        {{ date('d F, Y', strtotime($order->created_at)) }}<br><br>
                                    </address>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="section-title">Order Summary</div>
                            <p class="section-lead">All items here cannot be deleted.</p>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-md">
                                    <tr>
                                        <th data-width="40">#</th>
                                        <th>Item</th>
                                        {{-- <th>Variant</th>
                                        <th>Vendor Name</th> --}}
                                        <th class="text-center">Price</th>
                                        <th class="text-center">Quantity</th>
                                        <th class="text-right">Totals</th>
                                    </tr>
                                    @foreach ($order->orderProducts as $product)
                                        @php
                                            $variants = json_decode($product->variants);
                                        @endphp
                                        <tr>
                                            <td>{{ ++$loop->index }}</td>
                                            @if (isset($product->product->slug))
                                                <td><a target="_blank"
                                                        href="{{ route('product-detail', $product->product->slug) }}">{{ $product->product_name }}</a>
                                                </td>
                                            @else
                                                <td>{{ $product->product_name }}</td>
                                            @endif
                                            {{-- <td>
                                                @foreach ($variants as $key => $variant)
                                                    <b>{{ $key }}:</b> {{ $variant->name }} (
                                                    {{ $settings->currency_icon }}{{ $variant->price }} )
                                                @endforeach
                                            </td>
                                            <td>{{ $product->vendor->shop_name }}</td> --}}

                                            <td class="text-center">
                                                {{ '₹' . $product->unit_price }} </td>
                                            <td class="text-center">{{ $product->qty }}</td>
                                            <td class="text-right">
                                                {{ '₹' . $product->unit_price * $product->qty }}
                                            </td>
                                        </tr>
                                    @endforeach

                                </table>
                            </div>
                            <div class="row mt-4">
                                <div class="col-lg-8">
                                    <div class="col-md-4">
                                    </div>
                                </div>
                                <div class="col-lg-4 text-right">
                                    <div class="invoice-detail-item">
                                        <div class="invoice-detail-name">Subtotal</div>
                                        <div class="invoice-detail-value">
                                            {{ '₹' . $order->sub_total }}</div>
                                    </div>
                                    <div class="invoice-detail-item">
                                        <div class="invoice-detail-name">Shipping (+)</div>
                                        <div class="invoice-detail-value">
                                            {{ '₹' . @$shipping->cost }}</div>
                                    </div>
                                    <div class="invoice-detail-item">
                                        <div class="invoice-detail-name">Coupon (-)</div>
                                        <div class="invoice-detail-value">
                                            {{ '₹' . @$coupon->discount ? @$coupon->discount : 0 }}</div>
                                    </div>
                                    <hr class="mt-2 mb-2">
                                    <div class="invoice-detail-item">
                                        <div class="invoice-detail-name">Total</div>
                                        <div class="invoice-detail-value invoice-detail-value-lg">
                                            {{ '₹' . $order->amount }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="d-flex justify-content-end gap-2">
                    <!-- Print Button -->
                    <button class="btn btn-warning btn-icon icon-left print_invoice">
                        <i class="fas fa-print"></i> Print
                    </button>

                    <!-- Cancel Order Button -->
                    @if(in_array($order->order_status, ['pending', 'processed_and_ready_to_ship', 'dropped_off']) && !$order->cancelled_by_customer)
                        <a href="{{ route('user.cancel-order', $order->id) }}"
                           class="btn btn-danger btn-icon icon-left cancel"
                           onclick="return confirmCancel();">
                            <i class="fas fa-times"></i> Cancel Order
                        </a>
                    @endif

                    <!-- Order Cancelled Button -->
                    @if($order->cancelled_by_customer)
                        <button class="btn btn-danger btn-icon icon-left cancel" disabled>
                            <i class="fas fa-ban"></i> Order Cancelled
                        </button>
                    @endif
                </div>

            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        $('.print_invoice').on('click', function() {
            let printBody = $('.invoice-print');
            let originalContents = $('body').html();

            $('body').html(printBody.html());

            window.print();

            $('body').html(originalContents);

        })
    </script>
    <script>
        function confirmCancel() {
            // Show the confirm dialog box
            var confirmation = confirm("Are you sure you want to cancel this order?");

            // If the user clicks "OK", return true and the link will be followed
            if (confirmation) {
                return true;
            } else {
                // If the user clicks "Cancel", prevent the link from being followed
                return false;
            }
        }
    </script>
@endpush