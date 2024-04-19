<?php

namespace App\Http\Controllers;

use App\Models\Manage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ManageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $hid = Auth::id();
        $hotelInfo = null;

        $hotelInfo = DB::table('hotel_info')->where('hid',$hid)->first();

        // dd($hotelInfo->allday_active);
        return view('manage.index',compact('hotelInfo'));
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
    public function store(Request $request)
    {

        // dd($request);

        if (isset($request->check)){
            $check = 1;
        }else{
            $check = 0;
        }
        // dd($check);

        $hid = Auth::id();
        $info = null;
        $info = DB::table('hotel_info')->select('hid')->where('hid',$hid)->first();

        // dd($info);

        if(! is_null($info)){
            DB::table('hotel_info')->update([
                'hid' => $hid,
                'open_time' => $request->startTime,
                'close_time' => $request->endTime,
                'allday_active' => $check,
                'explain_text_ja' => $request->explaineJa,
                'explain_text_en' => $request->explaineEN,
                'order_text_ja' => $request->orderJa,
                'order_text_en' => $request->orderEn,
            ]);
        } else{
            DB::table('hotel_info')->insert([
                'hid' => $hid,
                'open_time' => $request->startTime,
                'close_time' => $request->endTime,
                'allday_active' => $check,
                'explain_text_ja' => $request->explaineJa,
                'explain_text_en' => $request->explaineEN,
                'order_text_ja' => $request->orderJa,
                'order_text_en' => $request->orderEn,
            ]);
    
    
        } 


        // dd($request);

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Manage  $manage
     * @return \Illuminate\Http\Response
     */
    public function show(Manage $manage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Manage  $manage
     * @return \Illuminate\Http\Response
     */
    public function edit(Manage $manage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Manage  $manage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Manage $manage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Manage  $manage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manage $manage)
    {
        //
    }
}
