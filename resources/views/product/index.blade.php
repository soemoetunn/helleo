@extends('layouts.main')
@section('title','Hello CRUD')
@section('content')
<div class="container">
    <a href="{{route('products.create')}}" class="btn btn-success"> Create New Product</a>
    @if(session()->get('success'))
    <div class="alert alert-success mt-3">
      <h1 style="font-family:'Times New Roman', Times, serif; font-weight:bolder; font-size:20px; text-transform:uppercase; text-align:center">
        {{ session()->get('success') }}
       </h1>
    </div>
@endif
@if(session()->get('error'))
    <div class="alert alert-danger mt-3">
      {{ session()->get('error') }}
    </div>
@endif
    <div class="card">
        <div class="card-header" style="background-color:skyblue">
            <h1 style="font-family:'Times New Roman', Times, serif;font-weight:bold;font-size:20px;color:;text-align:center">Product Lists</h1>
        </div>
        <div class="card-content">
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th width="20px">No</th>
                        <th width="100px">Product Image</th>
                        <th width="100px">Product Title</th>
                        <th width="100px">Product Name</th>
                        <th width="100px">Product Code</th>
                        <th width="100px">Price</th>
                        <th width="150px">Operation</th>
                        <th width="280px">Action</th>
                    </tr>
                    @foreach($products as $Key=>$product)
                    <tr>
                        <td>{{$Key+1}}</td>
                        <td><img src="{{ asset('images/' .$product->product_image) }}" alt="" style="width:70px; height:30px"</td>
                        <td>{{$product->product_title}}</td>
                        <td>{{$product->product_name}}</td>
                        <td>{{$product->product_code}}</td>
                        <td>{{$product->product_price}}</td>
                        <td >{{$product->product_description}}</td>
                        <td class="table-buttons">
                            <a href="{{route('products.show',$product->id)}}" class="btn btn-primary"><i class="fa fa-tag"></i></a>
                            <a href="{{route('products.edit',$product->id)}}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                            <form action="{{route('products.destroy',$product->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are You Sure')">
                                    <i class="fas fa-trash"></i>
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="card-footer" style="background-color: skyblue">
            {{$products->links()}}
            <h1 style="font-family:'Times New Roman', Times, serif;font-weight:bold;font-size:20px;text-align:right"> <b>Total Product Lists = </b> {{$products->count()}}</h1>
        </div>
    </div>

</div>
@endsection
