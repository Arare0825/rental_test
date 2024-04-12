<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $hid = Auth::user();

        $items = DB::table('items')
        ->where('hid',$hid->hid)
        // ->where('visible',0)
        ->orderBy('sort','desc')
        ->get();
        // dd($items);

        return view('item.index',compact('items'));
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
        // dd($request->);

        $id = Auth::id();
        $hid = DB::table('hotels')
        ->select('hid')
        ->where('id',$id)
        ->first();


        // dd($hid->hid);
        if(! $request->unvisible){
            $unvisible = 0;
        }else{
            $unvisible = 1;
        }

        // dd($unvisible);

        DB::table('items')->insert([
            'hid' => $hid->hid,
            'item_name' => $request->item_name,
            'stock' => $request->stock,
            'sort' => $request->sort,
            'visible' => $unvisible,
            'image' => null,
        ]);

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd($id);

        // $item = DB::table('items')->where('id',$id)->first();

        // return response()->json(['item' => $item]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //
    }
}
