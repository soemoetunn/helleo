@extends('layouts.main')
@section('title','Add Product')
@section('content')
<div class="row">
    <div class="col-lg-6 mx-auto">
        @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div>
    @endif

        <div class="card">
            <div class="card-header" style="background-color:green">
                <h1 style="font-family: 'Times New Roman', Times, serif;font-weight:bold;font-size:20px;color:white;text-align:center">Add new Product</h1>
            </div>
            <div class="card-body">
            <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="form-row">
                        <div class="col-md-6">
                            <label for="title">Product Title</label>
                            <input type="text" name="product_title" placeholder="Enter Product Title" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="name">Product Name</label>
                            <input type="text" name="product_name" placeholder="Enter Product Name" class="form-control">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <label for="price">Product Price</label>
                            <input type="text" name="product_price" placeholder="Enter Product Price" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="code">Product Code</label>
                            <input type="text" name="product_code" placeholder="Enter Product Code" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="descripption"></label>
                        <textarea name="product_description" placeholder="Enter Product Desctiption" cols="5" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Import Image</label>
                        <input type="file" name="product_image" class="form-control">
                    </div>
                    <button class="btn btn-success" type="submit">Save Product</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
