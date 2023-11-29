@extends('Layout.LayoutView')
@section('content')
    
<div class="container-fluid mt-4">
    <div class="card">
        <div class="card-header">
            <h4>Edit Product</h4>
        </div>
        <div class="card-body">
            <div class="my-2 d-flex justify-content-end">
               <a href="{{route('product.view')}}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Back</a>
            </div>
            <form action="{{route('product.update',$product->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                       <label>Product Name</label>
                       <input type="hidden" name="id" value="{{$product->id}}">
                       <input type="text" class="form-control" name="name" id="name" value="{{$product->name}}" placeholder="Enter Product Name">
                    </div>
                    <div class="col-md-4">
                       <label>Product Quanity</label>
                       <input type="number" class="form-control" name="quantity" id="quantity" value="{{$product->quantity}}" placeholder="0">
                    </div>
                    <div class="col-md-4">
                       <label>Product Price</label>
                       <input type="text" class="form-control" name="price" id="price" value="{{$product->price}}" placeholder="0">
                    </div>
                 </div>

                 <div class="mt-3 d-flex justify-content-end">
                    <button type="submit" class="btn btn-success">Update</button>
                 </div>
            </form>
        </div>

    </div>
    <div class="card mt-4">
       <div class="card-header">
         <h4>Product List</h4>
       </div>
       <div class="card-body">
         
        <table class="mt-4 table">
            <thead>
                <tr class="text-center text-white bg-success">
                    <th>Sl</th>
                    <th>Product Name</th>
                    <th>Product Quantity</th>
                    <th>Product Price</th>
                    
                </tr>
            </thead>

            <tbody>
                @foreach ($data as $i=>$item)
                <tr class="text-center">
                    <td>{{$i+1}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->quantity}}</td>
                    <td>{{$item->price}}</td>
                    
                </tr>
                @endforeach
            </tbody>
          </table>
       </div>
    </div>
</div>


@endsection