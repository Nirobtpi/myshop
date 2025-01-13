<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cupon;
use Illuminate\Http\Request;

class CuponController extends Controller
{
    public function index(){
        $cuponCodes=Cupon::paginate();
        return view('backend.cupon.index',compact('cuponCodes'));
    }
}
