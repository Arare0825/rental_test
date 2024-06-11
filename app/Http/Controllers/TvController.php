<?php

namespace App\Http\Controllers;

use App\Models\Tv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class TvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($hid)
    {
        // dd($hid);

        $items = DB::table('items')
        ->where('hid',$hid)
        ->where('visible',0)
        ->orderBy('sort','desc')
        ->get();

        //ユーザー名からIDの取得
        $user = DB::table('hotels')->select('id')->where('hid',$hid)->first();
        $hotelInfo = DB::table('hotel_info')->where('hid',$user->id)->first();


        // dd($items);
        return view('tv.index',compact('items','hotelInfo'));
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

        $id = $request->id;
        // dd($request->room);
        $item = DB::table('items')->where('id',$id)->first();

        if($request->room){
            $room = $request->room;
        }else{
            $room = 999;
        }

        // dd($item);
        DB::table('orders')->insert([
            'hid' => $item->hid,
            'room' => $room,
            'item_name_ja' => $item->item_name,
            'quantity' => $request->quantity,
            'status' => 0,
            'created_at' => now(),
        ]);

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tv  $tv
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = DB::table('items')->where('id',$id)->first();

        return response()->json([
            'item' => $item,
        ]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tv  $tv
     * @return \Illuminate\Http\Response
     */
    public function edit(Tv $tv)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tv  $tv
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tv $tv)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tv  $tv
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tv $tv)
    {
        //
    }
}
