<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PickUpOrder;
use App\Models\City;
use App\Models\Customer;
use App\Models\Service;
use Yajra\DataTables\DataTables;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Date;
// use Illuminate\Support\Facades\Http;

class PickupOrderController extends Controller
{
    public function index(Request $request){
        // Paginator::useBootstrap('custom_pagination');
        $customer = Customer::where('id',$request->customer_id)->first();

        $data = PickUpOrder::where('POrderCustNo',$customer->CustNo)->orderBy('POrderDate', 'desc')->get();

        // $total = PickUpOrder::count();
        // $dataCity = City::all();
        // $dataService = Service::all();

        // return view('pickup-order',[
        //     'data' => $data,
        //     'dataCity' => $dataCity,
        //     'dataService' => $dataService,
        //     'total' => $total
        // ]);
        $response = [
            'error' => true,
            'message' => 'Data Pickup order!',
            'data' => $data
        ];

        return response()->json($response,200);
    }


    // public function insert(Request $request){
    //     $user = unserialize(session('user'));
    //     if(!$user){
    //         return redirect('/');
    //     }
    //     $cust = Customer::where('id',$user->customer_id)->first();
    //     $formattedTime = now()->format('Y-m-d H:i:s');
    //     $response = Http::get('https://api.ipify.org?format=json');
    //     $publicIP = $response->json('ip');

    //     // $customMsg = [
    //     //     'POrderRecvPerson.required' => 'Pengirim Harus Diisi!',
    //     //     'POrderDest.required' => 'Kota Harus Diisi!',
    //     //     'POrderRecvName.required' => 'Nama Dituju Harus Diisi!',
    //     //     'POrderRecvAddr.required' => 'Alamat Harus Diisi!',
    //     //     'POrderRecvTelp.required' => 'No Telpon Harus Diisi!',
    //     //     'POrderRecvTelp.numeric' => 'No Telpon harus berupa angka!',
    //     //     'POrderQty.required' => 'Jumlah Harus Diisi!',
    //     //     'POrderQty.numeric' => 'Jumlah harus berupa angka!',
    //     //     'POrderWeigh.requiredt' => 'Berat Harus Diisi!',
    //     //     'POrderIsi.required' => 'Isi Kiriman Harus Diisi!',
    //     //     'POrderService.required' => 'Layanan Harus Diisi!'
    //     // ];
    //     // $validated = $request->validate([
    //     //     'POrderRecvPerson' => 'required',
    //     //     'POrderDest' => 'required',
    //     //     'POrderRecvName' => 'required',
    //     //     'POrderRecvAddr' => 'required',
    //     //     'POrderRecvTelp' => 'required|numeric',
    //     //     'POrderQty' => 'required|numeric',
    //     //     'POrderWeight' => 'required',
    //     //     'POrderIsi' => 'required',
    //     //     'POrderService' => 'required'
    //     // ],$customMsg);

    //     // if($request->fails()){
    //     //     return;
    //     // }

    //     $dataPost = [
    //         'POrderCustNo' => $cust->CustNo,
    //         'POrderCustName' => $cust->CustName,
    //         'POrderCustAddr'=> $cust->CustAddr,
    //         'POrderDate' => $formattedTime,
    //         'POrderDest' => $request->POrderDest,
    //         'POrderRecvName' => $request->POrderRecvName,
    //         'POrderRecvAddr' => $request->POrderRecvAddr,
    //         'POrderRecvTelp' => $request->POrderRecvTelp,
    //         'POrderRecvPerson' => $request->POrderRecvPerson,
    //         'POrderQty' => $request->POrderQty,
    //         'POrderWeight' => $request->POrderWeight,
    //         'POrderIsi' => $request->POrderIsi,
    //         'POrderService' => $request->POrderService,
    //         'POrderDEO' => $user->name,
    //         'POrderLocation' => $user->UserLocation,
    //         'ip_address' => $publicIP
    //     ];
    //     $insertData = PickUpOrder::create($dataPost);
    //     session()->flash('success', 'Data pick up order berhasil ditambahkan');
    //     return redirect()->route('dashboard');

    // }
}
