@extends('admin/layout')
@section('page_title','Manage Product')
@section('Product_select','active')
@section('container')
      <h1>Manage Product</h1>
      <a href="{{url('admin/product')}}">
         <button type="button" class="btn btn-success">Back</button>
      </a>
      <div class="row m-t-30">
                            <div class="col-md-12">
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{route('product.manage_product_process')}}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">Name</label>
                                                <input id="name" name="name" value="{{$name}}" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                                @error('name')
                                                 <div class="alert alert-danger" role="alert">
                                                 {{$message}}
                                                 </div>  
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="slug" class="control-label mb-1">Slug</label>
                                                <input id="slug" name="slug" value="{{$slug}}" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                                @error('slug')
                                                <div class="alert alert-danger" role="alert">
                                                 {{$message}}
                                                 </div>  
                                                @enderror
                                            </div> 
                                            <div class="form-group">
                                                <label for="image" class="control-label mb-1">Image</label>
                                                <input id="file" name="file" type="file" class="form-control" aria-required="true" aria-invalid="false" required>
                                                @error('image')
                                                 <div class="alert alert-danger" role="alert">
                                                 {{$message}}
                                                 </div>  
                                                @enderror
                                            </div>   
                                            <div class="form-group">
                                                <label for="category_id" class="control-label mb-1">Category</label>
                                                <select id="category_id" name="category_id" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                                           <option value="">Select Categories</option>
                                                           @foreach($category as $list)
                                                               <option value="{{$list->id}}">{{$list->category_name}}</option>
                                                           @endforeach
                                                </select>
                                    
                                            </div>                                  
                                            <div>
                                            <div class="form-group">
                                                <label for="brand" class="control-label mb-1">Brand</label>
                                                <input id="brand" name="brand" value="{{$brand}}" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                            </div> 
                                            <div class="form-group">
                                                <label for="model" class="control-label mb-1">Model</label>
                                                <input id="model" name="model" value="{{$model}}" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                            </div> 
                                            <div class="form-group">
                                                <label for="short_desc" class="control-label mb-1">Short Desc</label>
                                                <textarea id="short_desc" name="short_desc" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                                     {{$short_desc}}
                                                </textarea>
                                            </div> 
                                            <div class="form-group">
                                                <label for="desc" class="control-label mb-1">Desc</label>
                                                <textarea id="desc" name="desc" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                                     {{$desc}}
                                                </textarea>
                                            </div> 
                                            <div class="form-group">
                                                <label for="keywords" class="control-label mb-1">Keywords</label>
                                                <textarea id="keywords" name="keywords" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                                     {{$keywords}}
                                                </textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="technical_specification" class="control-label mb-1">Technical Specification</label>
                                                <textarea id="technical_specification" name="technical_specification" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                                     {{$technical_specification}}
                                                </textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="uses" class="control-label mb-1">Uses</label>
                                                <textarea id="uses" name="uses" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                                     {{$uses}}
                                                </textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="warranty" class="control-label mb-1">Warranty</label>
                                                <textarea id="warranty" name="warranty" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                                     {{$warranty}}
                                                </textarea>
                                            </div>
                                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                    Submit
                                                </button>
                                            </div>
                                            <input type="hidden" name="id" value="{{$id}}">
                                        </form>
                                    </div>
                                </div>
                            </div>
                    
                    
                        </div>
                </div>
      </div>
@endsection