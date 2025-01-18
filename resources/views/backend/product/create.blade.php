@extends('layouts.admin-app')
@section('Current_page', 'Product')
@section('title', 'Product')
@push('css')
    <link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />


@endpush
@section('content')
<div class="row">
    <div class="col-md-12">
        <form action="{{ route('product.store') }}" id="product" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-7">

                    <div class="card card-primary card-outline mb-4">
                        <div class="card-header">
                            <div class="card-title">New Product</div>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <label for="name" class="form-label">Product Name<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="" id="name">
                                    @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <label for="code" class="form-label">Product Code<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="code" id="code">
                                    @error('code')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <label for="category_id" class="form-label">Category Name<span
                                            class="text-danger">*</span></label>
                                    <select name="category_id" class="form-control" id="category_id">
                                        <option >Choose Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <label for="subcategory_id" class="form-label">Sub Category Name<span
                                            class="text-danger">*</span></label>
                                    <select name="subcategory_id" class="form-control" id="subcategory_id">
                                        <option value="">Choose Category</option>
                                    </select>
                                    @error('subcategory_id')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <label for="childcategory_id" class="form-label">Child Category Name</label>
                                    <select name="childcategory_id" class="form-control" id="childcategory_id">
                                        <option value="">Choose Child Category</option>
                                    </select>
                                    @error('childcategory_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <label for="brand_id" class="form-label">Brand Name<span
                                            class="text-danger">*</span></label>
                                    <select name="brand_id" class="form-control" id="brand_id">
                                        <option selected="">Choose Brand</option>
                                        @foreach ($brands as $brand)
                                             <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                        @endforeach
                                       
                                    </select>
                                    @error('brand_id')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-12">
                                    <label for="unit" class="form-label">Unit<span class="text-danger">*</span></label>
                                    <input type="text" name="unit" class="form-control" id="unit">
                                    @error('unit')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-4">
                                    <label for="purchase_price" class="form-label">Purchases Price</label>
                                    <input class="form-control" type="text" name="purchase_price" id="purchase_price">
                                    @error('purchase_price')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-4">
                                    <label for="selling_price" class="form-label">Selling Price<span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="selling_price" id="selling_price">
                                    @error('selling_price')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-4">
                                    <label for="discount_price" class="form-label">Discount Price</label>
                                    <input class="form-control" type="text" name="discount_price" id="discount_price">
                                    @error('discount_price')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <label for="warehouse_id" class="form-label">Warehouse<span
                                            class="text-danger">*</span></label>
                                    <select name="warehouse_id" class="form-control" id="warehouse_id">
                                        <option selected="">Choose Warehouse</option>
                                        @foreach ($warehouses as $row)
                                            <option value="{{ $row->id }}">{{ $row->warehouse_name }}</option>
                                        @endforeach
                                        
                                    </select>
                                    @error('warehouse_id')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <label for="stock_quentity" class="form-label">Stock</label>
                                    <input class="form-control" type="text" name="stock_quentity" id="stock_quentity">
                                    @error('stock_quentity')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-4">
                                    <label for="color" class="form-label">Color</label>
                                    <input class="form-control multy" type="text" name="color[]" id="color">
                                    @error('color')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-4">
                                    <label for="size" class="form-label">Size</label>
                                    <input class="form-control multy" type="text" name="size[]" id="size">
                                    @error('size')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-4">
                                    <label for="tags" class="form-label">Tags</label>
                                    <input class="form-control multy" type="text" name="tags" data-role="tags" id="tags">
                                    @error('tags')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label for="description" class="form-label">Product Details</label>
                                    <textarea name="description" id="description"></textarea>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer"> <button type="submit" class="btn btn-primary">Add Product</button>
                        </div>

                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="card">
                        <div class="card-body shadow">
                            <div class="col-lg-12 mb-3">
                                <label for="thumbnail" class="form-label">Main Thumbnail</label>
                                <input class="form-control dropify" type="file" name="thumbnail" id="thumbnail">
                                @error('thumbnail')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-lg-12 mb-3">
                                <div class="row align-items-start">
                                    <div class="col-10">
                                        <label for="images" class="form-label">Add Image</label>
                                        <div id="more-image" class="mb-3">
                                            <div class="image-upload-field mb-4">
                                                <input class="form-control" type="file" name="images[]" />
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-2">
                                        <button type="button" class="add-field btn btn-sm btn-success">Add
                                            Image</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3 shadow p-3">
                                    <label for="feature" class="form-label">Feature Product</label><br>
                                    <input type="checkbox" id="feature" name="feature" checked data-toggle="toggle" data-width="100">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3 shadow p-3">
                                    <label for="today_deal " class="form-label">Today Deal</label><br>
                                    <input type="checkbox" id="today_deal " name="today_deal " checked data-toggle="toggle-2" data-width="100">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3 shadow p-3">
                                    <label for="status " class="form-label">Status</label><br>
                                    <input type="checkbox" id="status " name="status " checked data-toggle="toggle-3" data-width="100">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
        </form>
    </div>
</div>


</div>
</div>
@endsection
@push('js')
    <script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#description').summernote({
                height: 200,
            });

            $('.dropify').dropify();

            $('.add-field').on('click', function () {

                let newField = `
                      <div class="image-upload-field mb-4">
                         <input class="form-control" type="file" name="images[]" />
                        <button type="button" class="remove-field btn btn-danger mt-2">Remove</button>
                      </div>
                    `;
                $('#more-image').append(newField);
            });

            // Remove a field when "Remove" is clicked
            $('#more-image').on('click', '.remove-field', function () {
                $(this).closest('.image-upload-field').remove();
            });

           // get sub category  

           $('#category_id').on('change',function(){
                let id=$(this).val();
                $.ajax({
                    url:`product/sub-category/`+id,
                    type:'GET',
                    success:function(response){
                        // console.log(response);
                        const option=$('#subcategory_id');
                        option.empty();
                        option.append(`<option selected>Choose Sub Category</option>`);
                        response.forEach(subcategory => {
                         option.append(`<option value="${subcategory.id}">${subcategory.name}</option>`);
                        });
                    }
                });
           });

          // get child category id with sub-category id 

          $('#subcategory_id').on('change',function(){
            let id=$(this).val();

            $.ajax({
                url:`product/child-category/`+id,
                type:'GET',
                success:function(response){
                    // console.log(response);
                    let childCat=$('#childcategory_id');
                    childCat.empty();
                    childCat.append(`<option selected="">Choose Child Category</option>`);
                    response.forEach(child_cat => {
                        childCat.append(`<option value="${child_cat.id}">${child_cat.name}</option>`);
                    });
                }
            });
          });

        // Reusable Tagify initializer function
            function initializeTagify(selector, options = {}) {
                const $input = $(selector); // Select the input field
                const defaultOptions = {
                };

                // Merge user-provided options with default options
                const finalOptions = { ...defaultOptions, ...options };

                // Initialize Tagify
                const tagify = new Tagify($input[0], finalOptions);

                // Add event listeners
                $($input[0]).on('add', function (e, tagData) {
                    console.log(`Added tag to ${selector}:`, tagData.value);
                });

                $($input[0]).on('remove', function (e, tagData) {
                    console.log(`Removed tag from ${selector}:`, tagData.value);
                });

                // Return the Tagify instance for further customization if needed
                return tagify;
            }
            const tags= initializeTagify('#tags')
            const color= initializeTagify('#color')
            const size= initializeTagify('#size')

        });

    </script>
@endpush
