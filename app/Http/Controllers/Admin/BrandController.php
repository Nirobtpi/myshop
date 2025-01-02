<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class BrandController extends Controller
{
    public function index(){
        $brands=Brand::orderBy('id','desc')->paginate('3');
        return view('backend.category.Brand.index',compact('brands'));
    }
    public function add(){
        return view('backend.category.Brand.add-brand');
    }

    public function store(Request $request){
        $request->validate([
            'brand_name'=>['required','unique:brands,brand_name'],
            'brand_logo'=>['mimes:png,jpg,svg,jpeg','max:2048'],
        ]);

        $slug=strtolower(str_replace(' ','-',$request->brand_name).'-'.random_int(1111,9999));

        if($request->brand_logo !=''){

            $brand_logo=$request->brand_logo;
            $brand_logo_ex=$brand_logo->extension();
            $brandLogoName='brand'.rand(1111,9999).'.'.$brand_logo_ex;
            $manager = new ImageManager(new Driver());
            $brandimage = $manager->read($brand_logo);
            $brandimage->save(public_path('uploads/brands/').$brandLogoName);

            Brand::create([
                'brand_name'=>$request->brand_name,
                'brand_slug'=>$slug,
                'brand_logo'=>$brandLogoName,
            ]);
            
        }else{
            Brand::create([
                'brand_name'=>$request->brand_name,
                'brand_slug'=>$slug,
            ]);
        }

        return redirect()->route('brand.index')->with('store','Brand Store Successfully');
    }
}
