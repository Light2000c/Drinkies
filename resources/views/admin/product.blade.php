@extends('layouts.admin.app')

@section('content')

<div class="content ht-100v pd-0">
    <div class="content-header">
      <div class="content-search">
        <i data-feather="search"></i>
        <input type="search" class="form-control" placeholder="Search...">
      </div>
      <nav class="nav">
        <a href="" class="nav-link"><i data-feather="help-circle"></i></a>
        <a href="" class="nav-link"><i data-feather="grid"></i></a>
        <a href="" class="nav-link"><i data-feather="align-left"></i></a>
      </nav>
    </div><!-- content-header -->
  
    <div class="content-body">
      <div class="container pd-x-0">
        <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
          <div>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Products</li>
              </ol>
            </nav>
            <h4 class="mg-b-0 tx-spacing--1">View all products</h4>
          </div>
          <div class="d-none d-md-block">
            <button class="btn btn-sm pd-x-15 btn-primary btn-uppercase mg-l-5"><i data-feather="file" class="wd-10 mg-r-5"></i> Dashboard</button>
          </div>
        </div>

        <div class="card shadow vh-100 border-0 p-3">
          @if (session('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Message!</strong> {{ session('success') }}.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
      @endif

      @if (session('error'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Message!</strong> {{ session('error') }}.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
      @endif
            <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Price</th>
                      <th>Category</th>
                      <th>Image</th>
                      <th>Description</th>
                      <th>Create_at</th>
                      <th>Updated_at</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->product_name }}</td>
                        <td>₦{{ number_format($product->product_price, 2) }}</td>
                        <td>{{ $product->product_category }}</td>
                        <td><img class="img-fluid" src="/products/{{ $product->product_image }}" alt="" srcset="" width="70px" height="70px"></td>
                        <td>{{ $product->product_description }}</td>
                        <td>{{ $product->created_at }}</td>
                        <td>{{ $product->updated_at }}</td>
                        <td><a href="{{ route('admin_viewproduct', $product) }}" class="btn text-light btn-primary btn-sm">View</a></td>
                        <td>
                          <form action="{{ route('admin_deleteProduct', $product) }}" method="post">
                            @csrf
                            @method('delete')
                          <button type="submit" class="btn btn-primary btn-sm">Delete</button>
                        </form>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div><!-- table-responsive -->
              <div>{{ $products->links('pagination::bootstrap-4') }}</div>
      </div>
  
        
      </div><!-- container -->
    </div>
  </div>

@endsection