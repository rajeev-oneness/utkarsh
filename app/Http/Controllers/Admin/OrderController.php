<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Mail\OrderDispatched;
use App\Models\Booking;
use App\Models\Courier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class OrderController extends BaseController
{

	/**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function index(Request $request){

        // $order = Booking::orderBy('id','desc')->where('payment_mode',3)->orWhere('transaction_id','!=','')->get();

        $order = Booking::orderBy('id','desc')
                ->when($request->order_id, function($query) use ($request){
                    $query->where('unique_code', '=', $request->order_id);
                })
                ->when($request->member_name, function($query) use ($request){
                    $query->where('name', 'like', '%' . $request->member_name .'%');
                })
                ->when($request->order_date, function($query) use ($request){
                    $query->where('order_date_time', 'like', '%' . $request->order_date .'%');
                })
                ->when($request->status, function($query) use ($request){
                    $query->where('status', '=', $request->status);
                })
                ->paginate(50);
        
        //dd($order);

        $couriers = Courier::where('is_active',1)->get();

        $this->setPageTitle('Order', 'List of all Order');
        return view('admin.order.index', compact('order','couriers'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */

    public function delete($id){

        $response = Booking::find($id)->delete();

        if (!$response) {
            return $this->responseRedirectBack('Error occurred while deleting Order.', 'error', true, true);
        }
        return $this->responseRedirect('admin.orders.index', 'Order deleted successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function viewDetail($id)
    {
        $booking = Booking::findOrFail($id);

        $bookingProducts = DB::table('booking_products')->where('booking_id',$id)->get();

        $this->setPageTitle('Booking', 'Booking Detail: ');

        return view('admin.order.details', compact('booking','bookingProducts'));
    }
    public function mapView($id)
    {
        $booking = Booking::findOrFail($id);
        // dd($booking);

        return view('admin.order.mapview', compact('booking'));
    }

    /**
     * @param Request $request
     * @param $id ProductId
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */

    public function updatecourier(Request $request, $id){

        $booking = Booking::findOrFail($id);

        $booking->courier_name = $request->courier_name;
        $booking->pod_no = $request->pod_no;
        $booking->status = 2;
        $status = $booking->save();

        if (!$status) {
            return $this->responseRedirectBack('Error occurred while updating Courier.', 'error', true, true);
        }

        //Mail::to('satyapriyakundu.ots@gmail.com')->send(new OrderDispatched($booking));

        return $this->responseRedirectBack('Courier updated successfully' ,'success',false, false);
    }
    
    public function invoice($orderId, Request $request){
       
        $booking = Booking::findOrFail($orderId);
        
        view()->share('booking',$booking);

        if($request->has('download')){
            $pdf = PDF::loadView('admin.order.invoice');
            return $pdf->download('admin.order.invoice');
        }
        
        $this->setPageTitle('invoice', 'Booking Detail: ');
        return view('admin.order.invoice',compact('booking'));
    }

    public function date_wise_report(){
        $start_date = (isset($_GET['start_date']) && $_GET['start_date']!='')?$_GET['start_date']:'';
        $end_date = (isset($_GET['end_date']) && $_GET['end_date']!='')?$_GET['end_date']:'';

        if($start_date!='' && $end_date!=''){
            $orders = Booking::where('order_date_time','>=',$start_date)->where('order_date_time','<=',$end_date)->orderBy('id','asc')->get();
        }else{
            $orders = array();
        }

        

        $this->setPageTitle('Report', 'Date wise order report');
        return view('admin.order.date_wise_report', compact('orders'));
    }

     public function today_sales(){
        $today = date("Y-m-d");
        $orders = Booking::where('order_date_time', 'like',  $today.'%')->orderBy('id','asc')->get();

        $this->setPageTitle('Report', 'Today order report');
        return view('admin.order.today_sales', compact('orders'));
    }

    public function transaction_list(){
        $orders = Booking::where('transaction_id', '!=',  '')->orderBy('id','asc')->get();

        $this->setPageTitle('Report', 'Online Transactions');
        return view('admin.order.transaction_list', compact('orders'));
    }
}
