<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\PickupPoint;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ProductController extends Controller
{
    public function create(){
        $categories=Category::all();
        $warehouses=Warehouse::all();
        $pickup_points=PickupPoint::all();
        $brands=Brand::all();
        $subcategories=SubCategory::all();
        $products=Product::all();
        return view('backend.product.create',compact('categories','warehouses','pickup_points','brands','subcategories'));
    }

    // get child category where sub cate id = 
    public function childCategory($id){
        $child_category=ChildCategory::where('subcategory_id',$id)->get();
        return response()->json($child_category);
    }

    public function store(Request $request){

       $request->validate([
        'name'=>['required','max:10'],
        'code'=>['required','unique:products,code'],
        'category_id'=>['required'],
        'subcategory_id'=>['required'],
        'brand_id'=>['required'],
        'unit'=>['required'],
        'selling_price'=>['required'],
        'warehouse_id'=>['required'],
        'color'=>['required'],
        'size'=>['required'],
        'description'=>['required'],
       ],[
        'code.required'=>'Category Code Is Required!',
        'category_id.required'=>'Category Name Is Required!',
        'brand_id.required'=>'Brand Name Is Required!',
        'warehouse_id.required'=>'Warehouse Name Is Required!',
       ]);

       if($request->thumbnail != ''){
            $request->validate([
                'thumbnail'=>['mimes:png,jpg,gif,svg','max:3048']
            ]);
            $thumbnail=$request->thumbnail;
            $tEx=$thumbnail->extension();
            $tName=uniqid().'thumbnail'.'.'.$tEx;
            $manager = new ImageManager(new Driver());
            $image = $manager->read($thumbnail);
            $image->resize(500,500);
            $image->save(public_path('uploads/product/thumbnail/').$tName);
       }
       
       if(!empty($request->images)){
        $imagePaths = [];
            $request->validate([
                'images'=>['mimes:png,jpg,gif,svg','max:3048']
            ]);
            foreach($request->images as $image){
                $sImage=$image->extension();
                $sName=uniqid().'gallery'.'.'.$sImage;
                $manager2 = new ImageManager(new Driver());
                $image2 =$manager2->read($image);
                $image2->save(public_path('uploads/product/thumbnail/').$sName);
                array_push($imagePaths,$sName);
              
            }
       }

        Product::create([
            'name'=>$request->name,
            'user_id'=>Auth::user()->id,
            'code'=>$request->code,
            'category_id'=>$request->category_id,
            'subcategory_id'=>$request->subcategory_id,
            'childcategory_id'=>$request->childcategory_id,
            'brand_id'=>$request->brand_id,
            'unit'=>$request->unit,
            'purchase_price'=>$request->purchase_price,
            'selling_price'=>$request->selling_price,
            'discount_price'=>$request->discount_price,
            'warehouse_id'=>$request->warehouse_id,
            'stock_quentity'=>$request->stock_quentity,
            'color'=>$request->color,
            'size'=>$request->size,
            'tags'=>$request->tags,
            'description'=>$request->description,
            'thumbnail'=>$tName,
            'images'=>json_encode($imagePaths),
            'feature'=>$request->feature,
            'today_deal'=>$request->today_deal,
            'status'=>$request->status,
       ]);

       return back()->with('success','Product Add Successfully');
        
    }

    public function index(){
        
        // return DB::table('products')
        // ->leftjoin('users','products.user_id','=','users.id')
        // ->leftJoin('categories','categories.id','=','products.category_id')
        // ->select('users.name as user_name','products.*','categories.category_name')
        // ->get();
        $products=Product::with('categories','subCategories','childCategories','brands','wareHouses')->paginate(20);
        return view('backend.product.index',compact('products'));
    }
}
