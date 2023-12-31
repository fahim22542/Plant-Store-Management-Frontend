<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')

    <style type="text/css">
        .center
        {
            margin: auto;
            width: 50%;
            border: 2px solid white;
            text-align: center;
            margin-top: 40px;
        }

        .font_size
        {
            text-align: center;
            font-size: 40px;
            padding-top: 20px;
        }

        .img_size
        {
            width: 200px;
            height: 100px;
        }

        .th_color
        {
            background: yellowgreen;
        }

        .th_dg
        {
            padding: 30px;
        }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
        <!-- partial:partials/_navbar.html -->
        @include('admin.header')
        <!-- partial -->
         <div class="main-panel">
            <div class="content-wrapper">
                @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{session()->get('message')}}
                </div>
                @endif
                <h2 class="font_size">All Products</h2>
                <table class="center">
                    <tr class="th_color">
                        <th class="th_dg">Product Title</th>
                        <th class="th_dg">Description</th>
                        <th class="th_dg">Quantity</th>
                        <th class="th_dg">Catagory</th>
                        <th class="th_dg">Price</th>
                        <th class="th_dg">Discount Price</th>
                        <th class="th_dg">Image</th>
                        <th class="th_dg">Delete</th>
                        <th class="th_dg">Edit</th>
                    </tr>
                    @foreach ($product as $product)
                        <tr>
                            <td>{{$product->title}}</td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->quantity}}</td>
                            <td>{{$product->catagory}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->discount_price}}</td>
                            <td>
                                <img class="img_size" src="/product/{{$product->image}}">
                            </td>
                            <td><a class="btn btn-danger" onclick="return confirm('Are You Sure To Delete This')" href="{{url('delete_product',$product->id)}}">Delete</a></td>
                            <td><a class="btn btn-success" href="{{url('edit_product',$product->id)}}">Edit</a></td>
                        </tr>
                    @endforeach
                </table>
            </div>
         </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>