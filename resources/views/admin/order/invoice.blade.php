@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')

@php
$noofproduct = 0;
$totalamm = 0;
$totalqunatity = 0;
$taxamm = 0;
$discount = 0;
$extra_discount = 0;
$shippingcharge = 0;
@endphp
<!--<li class="search-box">
    <button type="submit" class="btn btn-info btn-mini pull-right printbtn" onclick="printResultHandler()">Print</button>
</li>-->
<div class="row invoice" id="print_div" style="margin-top:20px;">
        <div class="col-sm-12">
            <div class="col-sm-6">
                <div class="logo"><img src="{{ asset('/frontend/img/front_logo.png') }}" style="width:200px;margin-bottom:20px;">
                <!-- <span style="display:block;font-size:20px;font-weight:500;margin-top:-25px;margin-left:82px;">Utkarsh Electricals</span> -->
                </div>
            </div>
             <div class="col-sm-6">
                <h3 style="margin-top: 20px;"><b>Tax Invoice/Bill of Supply/Cash Memo</b></h3>
            </div>
        </div>
         
        <div class="col-sm-12">
            <table class="table details">
                <tr>
                    <td style="border: none;">
                        <p style="margin: 0;"><strong>Sold By:</strong></p>
                        <p style="margin: 0;">Utkarsh Electricals<br/>76/17-A, Gurudwara Road, Naka</br> Bandra West,</br> Hindola, Lucknow-226004</p>
                    </td>
                    <td align="right" style="border: none;">
                        <p style="margin: 0;"><strong>Buyer Details:</strong></p>
                        <p style="margin: 0;"><strong>Name:</strong> {{ $booking->name }} </p>
                        <p style="margin: 0;"><strong>Email:</strong> {{ $booking->email }}</p>
                        <p style="margin: 0;"><strong>Mobile:</strong>  {{ $booking->mobile }}</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><div class="spacer20"></div></td>
                </tr>
                <!--<tr>
                    <td colspan="2" align="right" style="border: none;">
                        <p style="margin: 0;"><strong>Billing Address:</strong></p>
                        <p style="margin: 0;"><?=$booking->name?></p>
                        <p style="margin: 0;">Kolkata Chiriamore Type school lane </br>Kolkata 700052</p>
                    </td>
                </tr>-->

                <tr>
                    <td style="border: none;">
                        <p style="margin: 0;"><strong>GST Registration No.</strong> 27ABAFM853G1Z9</p>
                    </td>
                    <!--<td align="right" style="border: none;">
                        <p style="margin: 0;"><strong>Shipping Address:</strong></p>
                        <p style="margin: 0;"><?=$booking->name?></p>
                        <p style="margin: 0;">Kolkata Chiriamore Type school lane </br>Kolkata 700052</p>
                        <p style="margin: 0;"><?=$booking->mobile?></p>
                    </td>-->
                </tr>
                <tr>
                    <td colspan="2"><div class="spacer20"></div></td>
                </tr>
                <tr>
                    <td style="border: none;">
                        <p style="margin: 0;"><strong>Order No:</strong> {{ $booking->unique_code }}</p>
                        <p style="margin: 0;"><strong>Order Date: </strong> {{ Carbon\Carbon::parse($booking->order_date_time)->format('d-M-Y') }}</p>
                    </td>

                    <td align="right" style="border: none;">
                        <p style="margin: 0;"><strong>Invoice No:</strong> IN- {{$booking->id}}</p>
                        <p style="margin: 0;"><strong>Invoice Date: </strong> {{ Carbon\Carbon::parse($booking->order_date_time)->format('d-M-Y') }} </p>
                    </td>
                </tr> 
                <!--<tr>
                    <td colspan="2"><div class="spacer20"></div></td>
                </tr> 
                 <tr>
                    <td  style="border: none;">
                        <p style="margin: 0;"><strong>Payment Method:</strong> Cod</p>
                    </td>

                    <td align="right" style="border: none;">
                        <p style="margin: 0;"><strong>Shipping Method:</strong> Shiprocket</p>
                    </td>
                </tr> -->     
            </table>
        </div>

        <div class="clearfix"></div>
        <div class="col-sm-12">
            <table class="table table-striped table-bordered table-hover table-full-width">
                <thead>
                    <tr style="background-color: black;">
                        <th>Sr No</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Tax Per Product</th>
                        <th>Total Tax</th>
                        <th>Price Per Produuct</th>
                        <th>Unit Cost</th>
                    </tr>
                </thead>

                <tbody>
                        @if(!empty($booking->bookingProduct))
                        @php $slno = 1; @endphp
                        @foreach($booking->bookingProduct as $key => $n)
                        @php
                        $totalamm += ($n->price * $n->quantity);
                        if($n->price >=1000){
                                 $taxamm += (($n->price/112) *12) * $n->quantity;
                            } else {
                            $taxamm += (($n->price/105)*5) * $n->quantity;
                        }
                        @endphp
                            <tr>
                                <td>{{ $slno }}</td>
                                <td>{{ $n->product_name }} </br>
                                @if( ($n->quantity * $n->price) >=1000 ) {{ 'GST 12 %' }}
                                @elseif( ($n->quantity * $n->price) < 1000 ) {{ 'GST 5 %' }}
                                @endif
                                </td>
                                <td>{{ $n->quantity }}  &nbsp Pc(s)</td>
                                <td>@if( ($n->quantity * $n->price) >=1000 ) {{ number_format((($n->price/112)*12),2) }}
                                    @else {{ number_format((($n->price/105)*5),2)  }}  @endif
                                </td>
                                <td>@if( ($n->quantity * $n->price) >=1000 ) {{ number_format(($n->quantity * (($n->price/112)*12)),2) }}
                                    @else {{ number_format(($n->quantity * (($n->price/105)*5)),2)  }}  @endif
                                </td>
                                <td>{{ $n->price }}</td>
                                <td>@if( ($n->quantity * $n->price) >=1000 )  {{ number_format(($n->quantity * (($n->price*100)/112)),2) }}
                                    @else {{ number_format(($n->quantity * (($n->price*100)/105)),2) }} @endif
                                </td>
                            
                            </tr>
                        @php $slno++ ; @endphp    
                        @endforeach
                        @endif    
                    <tr>
                        <td colspan="5"></td>
                        <td>Basic Amount</td>
                        <td>{{ number_format($totalamm - $taxamm  - $shippingcharge,2) }}</td>
                    </tr>
                    <tr>
                        <td colspan="5"></td>
                        <td>Tax Amount (GST) <span style="position: absolute;right: 14%;"> + </span> </td>
                        <td>{{ number_format($taxamm,2) }}</td>
                    </tr>
                    @if($booking->shipping_state==22)
                    <tr>
                        <td colspan="5"></td>
                        <td>Tax Amount (CGST) </td>
                        <td>{{ number_format(($taxamm/2),2) }}</td>
                    </tr>
                    <tr>
                        <td colspan="5"></td>
                        <td>Tax Amount (SGST)  </td>
                        <td>{{ number_format(($taxamm/2),2) }}</td>
                    </tr>
                    @else
                    <tr>
                        <td colspan="5"></td>
                        <td>Tax Amount (IGST)  </td>
                        <td>{{ number_format($taxamm,2) }}</td>
                    </tr>
                    @endif
                    <tr>
                        <td colspan="5"></td>
                        <td>Discount Amount <span style="position: absolute;right: 14%;"> - </span></td>
                        <td>{{ $booking->discount_amount }}</td>
                    </tr>
                    
                    <tr>
                        <td colspan="5"></td>
                        <td>Shipping Charge <span style="position: absolute;right: 14%;"> + </span> <br></td>
                        <td>{{ $booking->shipping_charge }}</td>
                    </tr>
                    <tr>
                        <td colspan="5"></td>
                        <td>Total Payable</td>
                        <td>{{ $booking->total_amount }}</td>
                    </tr>
                    <tr>
                        <td colspan="5"></td>
                        <td>Total Paid</td>
                        <td>{{ $booking->total_amount }}</td>
                    </tr>
                    <tr>
                        <td colspan="5"></td>
                        <td>Total Remaining</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td colspan="7">
                            Amount In Word : <b>{{ convert_number_to_words($booking->total_amount) .' rupees only' }}</b>
                        </td>
                    </tr>
                    {{-- <tr>
                        <td colspan="5" align="right">
                            For Mashroo:
                            <br/>
                            <br/>
                            <br/>
                        </td>
                    </tr> --}}
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

<!-- print view-->
<div class="header" style="display:none; border-bottom: 4px solid #12A4A3;" id="print_head">
    <style rel="stylesheet" media="print" type="text/css">
        @media print {
            .btn{
                display:none!important;
            }
        }
    </style>
</div>

<div id="bill_footer" style="display:none;">
    <table class="table">
        
    </table>
</div>
@endsection
@push('scripts')
<script type="text/javascript">
    function printResultHandler() {
        //Get the HTML of div
        var print_header = document.getElementById("print_head").innerHTML;
        var divElements = document.getElementById("print_div").innerHTML;
        var print_footer = document.getElementById("bill_footer").innerHTML;

        //Get the HTML of whole page
        var oldPage = document.body.innerHTML;
        //Reset the page's HTML with div's HTML only
        document.body.innerHTML =
                "<html><head><title></title></head><body><font size='2'>" +
                divElements + "</font>" + print_footer + "</body>";
        //Print Page
        window.print();
        //Restore orignal HTML
        document.body.innerHTML = oldPage;
        //bindUnbind();
    }
</script>
@endpush