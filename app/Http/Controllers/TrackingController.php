<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tracking;
use Yajra\DataTables\DataTables;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Http;

class TrackingController extends Controller
{
    public function index(Request $request){
        try {
            $tracking = null;

            if (empty($request->id)) {
                $tracking = Tracking::all();
            } else {
                $tracking = Tracking::where('ConnoteNo',$request->id)->first();
            }
            $response = [
                'error' => false,
                'message' => 'Data Layanan!',
                'data' => $tracking
        ];
            return response()->json($response,200);
        } catch (\Throwable $th) {
            $response = [
                'error' => true,
                'message' => 'Kesalahan pada serverr!',
                'data' => null
            ];
            return response()->json($response,200);
        }
    }

}
