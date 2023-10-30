<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Auth;

class PandusiwiAPI extends Controller
{
    public function getCoverageArea(Request $request){
        $ch = curl_init();
        $baseUrl = "https://production.pandulogistics.com/pandu/restapi/basic/city/list";
        $params = [
            'city_name' => $request->city_name,
            'prov_name' => $request->prov_name
        ];
        $url = $baseUrl . '?' . http_build_query($params);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);

        $headers = [
            'api-key: 23bd2707-5774-48a9-bcab-42cc1ea1ac9c',
        ];
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            return 'cURL Error: ' . curl_error($ch);
        }

        curl_close($ch);

        return $response;
    }
    public function getTracking(Request $request){
        $ch = curl_init();
        $baseUrl = "https://production.pandulogistics.com/pandu/restapi/basic/tracking/list";
        $params = [
            'id' => $request->id
        ];
        $url = $baseUrl . '?' . http_build_query($params);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPGET, true);

        $headers = [
            'api-key: 23bd2707-5774-48a9-bcab-42cc1ea1ac9c',
        ];
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            return 'cURL Error: ' . curl_error($ch);
        }

        curl_close($ch);

        $res = [
            'error' => false,
            'message' => 'Get Tracking berhasil!',
            'data' => $response
        ];

        return response()->json($res,200);
    }
}
