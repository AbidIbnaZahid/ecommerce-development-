@extends('dashboard.dashboard_master')
@section('page_title')
Add Category 
@endsection


@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Add Category
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                @endif
                <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="onclick">Enter Product Name:</label>
                                <input type="text" name="product_name" id="onclick"  class="form-control">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="onclick">Enter Product Regular price:</label>
                                <input type="number" name="product_regular_price" id="onclick"  class="form-control">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="onclick">Enter Product Discount price:</label>
                                <input type="number" name="product_discounted_price" id="onclick"  class="form-control">
                            </div>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="onclick">Select Category:</label>
                                <select name="category_id" id="category_dropdown" class="form-control">
                                    <option value="">-Select Category Id-</option>
                                    @foreach ($categories as $category)
                                     <option value="{{$category->id}}">{{$category->category_name}}</option>    
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="onclick">Select Sub Category:</label>
                                 <select name="subcategory_id" id="subcategory_dropdown" class="form-control">
                                    <option value="">-Select Sub Category Id-</option>
                                    
                                </select>
                            </div>
                        </div>
                     </div>
                    <div class="row">
                           <div class="col">
                            <div class="form-group">
                                <label for="onclick">Enter Product Short Description:</label>
                                <input type="text" name="product_short_description" id="onclick"  class="form-control">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="onclick">Enter Product Weight</label>
                                <input type="text" name="product_weight" id="onclick"  class="form-control">
                            </div>
                        </div>
                          <div class="col">
                            <div class="form-group">
                                <label for="onclick">Enter Product Dimensions:</label>
                                <input type="text" name="product_dimensions" id="onclick"  class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                         <div class="col">
                            <div class="form-group">
                                <label for="onclick">Enter Product Materials:</label>
                                <input type="text" name="product_materials" id="onclick"  class="form-control">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="onclick">Enter Product Other Info</label>
                                <textarea name="product_other_info"  class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                          <div class="col">
                            <div class="form-group">
                                <label for="onclick">Enter Product Long Description</label>
                                <textarea id="product_long_description" name="product_long_description"  class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="onclick">Enter Product Photo</label>
                                 <input type="file" name="product_thumbnail_photo" id="onclick"  class="form-control">
                            </div>
                        </div>
                    </div>
                         
                    <div class="form-group mt-2">
                        <button type="submit" class="btn btn-rounded btn-info"><span class="btn-icon-left text-info"><i class="fa fa-plus color-info"></i>
                            </span>Add</button>
                    </div>         
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer_script')
<script>
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('#product_long_description').summernote()
        $('#category_dropdown').select2();
        $('#subcategory_dropdown').select2();
        $('#category_dropdown').change(function(){
           let category_id = $(this).val()

        // Ajax start
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type:'POST',
            url:'/get/subcategory',
            data: {category_id:category_id},
            success:function(data){
                $('#subcategory_dropdown').html(data)
            }
        })
        // Ajax end
        })
    })
</script>
@endsection