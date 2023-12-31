<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $contactList = Contact::all();

        if(!empty($contactList))
        {
            return response()->json(['status'=>200, 'message' => 'Contact List', 'data' => $contactList],Response::HTTP_OK);
        } else {
            return response()->json(['status'=>422, 'message' => 'No Data Found', 'data' => []],Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactRequest $request)
    {
        //
        $requestData = $request->validated();

        $result = Contact::insert($requestData);

        if($result)
        {
            return response()->json(['status'=> 200, 'message' => 'Contact successfully saved', 'data' => []]);
        } else {
            return response()->json(['status'=> 422, 'message' => 'Unable to save', 'data' => []]);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
