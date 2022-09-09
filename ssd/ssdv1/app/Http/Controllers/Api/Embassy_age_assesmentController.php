<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAgeAssesmentRequest;
use App\Models\Embassy_age_assesment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Embassy_age_assesmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fetch_age_assesment = Embassy_age_assesment::all();
        return response()->json([
            'status' => true,
            'message'=> "Successfully fetched age assessment details",
            'age_assesment' => $fetch_age_assesment
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAgeAssesmentRequest $request)
    {
        $age_assesment = Embassy_age_assesment::create($request->all());

        return  response()->json([
            'status' => true,
            'message' => "Successfully created age assessment",
            'age_assesment' => $age_assesment

        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Embassy_age_assesment  $embassy_age_assesment
     * @return \Illuminate\Http\Response
     */
    public function show($user_id)
    {
        $user = Embassy_age_assesment::where('user_id', $user_id)->get();

        return  response()->json([
            'status' => true,
            'message' => "Successfully fetched age assessment by id",
            'age_assesment' => $user

        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Embassy_age_assesment  $embassy_age_assesment
     * @return \Illuminate\Http\Response
     */
    public function edit(Embassy_age_assesment $embassy_age_assesment)
    {
       //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Embassy_age_assesment  $embassy_age_assesment
     * @return \Illuminate\Http\Response
     */

    public function update(StoreAgeAssesmentRequest $request, $user_id)
    {
         $data_update = Embassy_age_assesment::where('user_id', $user_id)->update($request->all());


        //response message
        return response()->json([
            'status' => true,
            'message'=>"Successfully updated age assessment",
            'data'   => $data_update
        ], 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Embassy_age_assesment  $embassy_age_assesment
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id)
    {
        $user = Embassy_age_assesment::where('user_id', $user_id)->delete();

         //response message
         return response()->json([
            'status' => true,
            'message'=>"Successfully deleted age assessment",
        ], 200);
    }
}
