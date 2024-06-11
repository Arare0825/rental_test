<?php

namespace App\Http\Controllers;

use App\Models\Tv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ManualController extends Controller
{
    public function index()
    {

        $hid = Auth::user()->hid;

        $items = DB::table('items')
        ->where('hid',$hid)
        ->where('visible',0)
        ->orderBy('sort','desc')
        ->get();

        //ユーザー名からIDの取得
        $user = DB::table('hotels')->select('id')->where('hid',$hid)->first();
        $hotelInfo = DB::table('hotel_info')->where('hid',$user->id)->first();

        // dd($items);
        return view('manual.index',compact('items','hotelInfo'));
    }
}
