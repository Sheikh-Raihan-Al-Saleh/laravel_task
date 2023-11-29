@extends('Layout.LayoutView')
@section('content')
    
<div class="container-fluid mt-4">
    <div class="card">
        <div class="card-header">
            <h4>Create Product</h4>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-end my-4">
                <a class="btn btn-secondary" href="{{route('logout')}}"><i class="fas fa-power-off"></i> Logout</a>
            </div>
            <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                       <label>Product Name</label>
                       <input type="text" class="form-control" name="name" id="name" value="" placeholder="Enter Product Name">
                    </div>
                    <div class="col-md-4">
                       <label>Product Quanity</label>
                       <input type="number" class="form-control" name="quantity" id="quantity" value="" placeholder="0">
                    </div>
                    <div class="col-md-4">
                       <label>Product Price</label>
                       <input type="text" class="form-control" name="price" id="price" value="" placeholder="0">
                    </div>
                 </div>

                 <div class="mt-3 d-flex justify-content-end">
                    <button type="submit" class="btn btn-success">Save</button>
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
                    <th>Created By</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($product as $i=>$item)
                <tr class="text-center">
                    <td>{{$i+1}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->quantity}}</td>
                    <td>{{$item->price}}</td>
                    <td></td>
                    <td>
                        <a href="{{route('product.edit',$item->id)}}" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                        <a href="{{route('product.delete',$item->id)}}" class="btn btn-danger delete-btn"><i class="fas fa-trash"></i> Delete</a>
                    </td>
                   
                </tr>
                @endforeach
            </tbody>
          </table>
       </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Add click event to elements with class 'delete-btn'
        $('.delete-btn').on('click', function(event) {
            event.preventDefault(); // Prevent the default behavior (navigating to the link)

            // Ask for confirmation before deleting
            if (confirm('Are you sure you want to delete this item?')) {
                // If confirmed, proceed to the deletion URL
                window.location.href = $(this).attr('href');
            }
        });
    });
</script>


@endsection