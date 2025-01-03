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
        $brands=Brand::orderBy('id','desc')->paginate('6');
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

    public function distroy($id){
       $getBrand=Brand::findOrFail($id);

        if($getBrand->brand_logo !=''){
            unlink(public_path('uploads/brands/'.$getBrand->brand_logo));
        }
        $getBrand->delete();
        return back()->with('delete','Your file has been deleted.');
    }

    public function checkDelete(Request $request){
        $allItems=$request->deleteitems;
        foreach($allItems as $item){
           $singleItem= Brand::findOrFail($item);
            if($singleItem->brand_logo !=''){
                unlink(public_path('uploads/brands/'.$singleItem->brand_logo));
            }
            $singleItem->delete();
        }
        return back()->with('delete','Your file has been deleted.');
    }
    public function edit($id){
        $data=Brand::findOrFail($id);
        return view('backend.category.Brand.edit',compact('data'));
    }
    public function update(Request $request,$id){
        $slug=strtolower(str_replace(' ','-',$request->brand_name).'-'.random_int(1111,9999));
        if($request->brand_logo !=''){
            $getBrand=Brand::findOrFail($id);
            if($getBrand->brand_logo !=''){
                unlink(public_path('uploads/brands/'.$getBrand->brand_logo));
            }
            $request->validate([
                'brand_name'=>['required','unique:brands,brand_name,'.$id],
                'brand_logo'=>['mimes:png,jpg,svg,jpeg','max:2048'],
            ]);
            $photo=$request->brand_logo;
            $photo_ex=$photo->extension();
            $photoName=uniqid().'.'.$photo_ex;
            $manager = new ImageManager(new Driver());
            $imageRead = $manager->read($photo);
            $imageRead->resize(200);
            $imageRead->save(public_path('uploads/brands/').$photoName);

            Brand::findOrFail($id)->update([
                'brand_name'=>$request->brand_name,
                'brand_slug'=>$slug,
                'brand_logo'=>$photoName,
            ]);

        }else{
            $request->validate([
            'brand_name'=>['required','unique:brands,brand_name,'.$id],
            // 'brand_logo'=>['mimes:png,jpg,svg,jpeg','max:2048'],
            ]);

            Brand::findOrFail($id)->update([
                'brand_name'=>$request->brand_name,
                'brand_slug'=>$slug,
            ]);
        }
        return redirect()->route('brand.index')->with('update','Brand Update Successfully');
    }
}
