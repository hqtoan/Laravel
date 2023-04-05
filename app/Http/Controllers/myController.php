<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Http\Response;
// use Illuminate\Http\Client\Response; 

class myController extends Controller
{
    public function XinChao()
    {
        echo "Chao cac ban";
    }

    public function KhoaHoc($ten)
    {
        echo "Chao cac ban ", $ten;
        return redirect()->route('MyRoute');
    }

    public function GetURL(Request $request)
    {
        // return $request ->path();
        // if($request->isMethod('post'))
        //     echo "Phương thức Get";
        // else
        //     echo "Không phải phương thức get";
        if($request->is('My*'))
            echo "Có My";
        else
            echo "Không có My";
    }

    public function postForm(Request $request)
    {
        // echo "Ten cua ban là: ";
        // echo $request->HoTen;


        //XEM LAI

        // if($request->has('HoTen'))
        //     echo "Co tham so";
        // else
        //     echo "khong co ";
    }

    public function setCookie()
    {
        $response = new Response();
        $response->withCookie('KhoaHoc','Laravel',0.1);
        echo "Da set cookie";
        return $response;
    }

    public function getCookie(Request $request)
    {
        echo "Cookie cua ban la: ";
        return $request->cookie('KhoaHoc');
    }


    public function postFile(Request $request)
    {
        if($request->hasFile('myFile'))
        {
            $file = $request->file('myFile');
            $file -> move('img','myFile.jpg');
        }
        else
        {
            echo "Khong co file";
        }
    }

    public function getJson()
    {
        $array = ['llllllll','aaaa'];
        return response()->json($array);
    }

    public function myView()
    {
        return view('view.KhoaPham');
    }

    public function Time($t)
    {
        return view('myView',['time'=>$t]);
    }
    
}