@extends('Layout.Admin')


@section('Title')
<title>Xen. Spirits® | Quản trị</title>
@endsection


@section('Content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('./Partial/content_header', ['url1' => 'Product List' ,'url2' => 'Product', 'url3' => 'List'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
      <div class="col-md-12">
        <a href="{{ route('foradmin.product.add') }}" class="btn btn-success float-right m-2">Add</a>
      </div>
     <div class="col-md-12">
        <table class="table">
     <thead>
    <tr>
      <th scope="col">Mã sản phẩm</th>
      <th scope="col">Loại sản phẩm</th>
      <th scope="col">Tên sản phẩm</th>
      <th scope="col">Giá sản phẩm</th>
      @foreach($sizes as $size)
      <th scope="col">Kích cỡ</th>
      <th scope="col">Số lượng</th>
      @endforeach
      <th scope="col">Mô tả sản phẩm</th>
      <th scope="col">Ngày thêm</th>
    </tr>
  </thead>
  <tbody>
    @foreach($products as $product)
    
       @php
       $category_name = DB::table('product_categories')->where('id', $product->productCategory_id)->value('name');
       $quantity_details =  DB::table('quantity_details')->where('product_id', $product->id)->get();
       @endphp


    <tr>
      <td> {{ $product->id }}</td>
      <td> {{ $category_name }}</td>
      <td> {{ $product->name }}</td>
      <td> {{ $product->price }}</td>

      @foreach($sizes as $size) 
      @php  
      $quantity_detail =  DB::table('quantity_details')->where( [ ['size_id','=',$size->id],
                                                                  ['product_id','=',$product->id] ])->first();
      @endphp
      <td> {{ $size->name }}</td> 
      @if(!is_null($quantity_detail))
      <td> {{ $quantity_detail->quantity }}</td>
      @else
      <td>0</td>
      @endif

      @endforeach

      <td> {{ $product->productDescription }}</td>
      <td> {{ $product->created_at }}</td>
      <td> 
        <a href="{{ route('foradmin.product.edit',['id' => $product->id]) }}" class="btn btn-success">Edit</a>
        <a href="#" class="btn btn-danger">Delete</a>
      </td>
    </tr>  

    @endforeach
  </tbody>
        </table>
          </div>

 
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
@endsection

