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
                                <li class="breadcrumb-item active" aria-current="page">Product Name:
                                    {{ $product->product_name }}</li>
                            </ol>
                        </nav>
                        <h4 class="mg-b-0 tx-spacing--1">Make Changes to product</h4>
                    </div>
                    <div class="d-none d-md-block">
                        <button class="btn btn-sm pd-x-15 btn-primary btn-uppercase mg-l-5"><i data-feather="file"
                                class="wd-10 mg-r-5"></i> Dashboard</button>
                    </div>
                </div>

                <div class="card shadow border-0 p-3">
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
                    <div class="row">
                        <div class="col-sm-6 col-6">
                            <div>
                                <img class="img-fluid" src="/products/{{ $product->product_image }}" alt="">
                            </div>

                            <div class="">
                                <form action="{{ route('admin_viewproduct', $product->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <input type="text" name="image" value="image" hidden>
                                    <div class="form-group">
                                      <input type="text"
                                          class="form-control @error('product_name') invalid @enderror"
                                          name="product_name" value="{{ $product->product_name }}"
                                          placeholder="Product Name" hidden>
                                  </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlFile1">Product Image</label>
                                        <input type="file" class="form-control-file" name="product_image"
                                            value="{{ old('product_image') }}" id="exampleFormControlFile1">
                                        @error('product_image')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-brand-02">Update Image</button>
                                </form>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="sign-wrapper mg-lg-r-50 mg-xl-r-60">
                                <form action="{{ route('admin_viewproduct', $product->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('put')

                                    <div class="pd-t-20 wd-100p">

                                        <div class="form-group">
                                            <input type="text" name="properties" value="properties" hidden>
                                            <label>Product Name</label>
                                            <input type="text"
                                                class="form-control @error('product_name') invalid @enderror"
                                                name="product_name" value="{{ $product->product_name }}"
                                                placeholder="Product Name">
                                            @error('product_name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <div class="d-flex justify-content-between mg-b-5">
                                                <label class="mg-b-0-f">Product Price</label>
                                            </div>
                                            <input type="number"
                                                class="form-control @error('product_price') invalid @enderror"
                                                name="product_price" value="{{ $product->product_price }}"
                                                placeholder="Product Price">
                                            @error('product_price')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Product Category</label>
                                            <select class="form-control" name="product_category"
                                                value="{{ old('product_category') }}" id="">
                                                <option selected value="">Please select a category</option>
                                                <option value="Beer">Beer</option>
                                                <option value="Whiskeys">Whiskeys</option>
                                                <option value="Non-Alcohol">Non-Alcohol</option>
                                            </select>
                                            @error('product_category')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Product Description</label>
                                            <textarea class="form-control" name="product_description" rows="4" placeholder="Description......">{{ $product->product_description }}</textarea>
                                            @error('product_description')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <button type="submit" class="btn btn-brand-02 btn-block">Save Changes</button>
                                    </div>
                                </form>
                            </div><!-- sign-wrapper -->
                        </div>
                    </div>
                </div>


            </div><!-- container -->
        </div>
    </div>
@endsection
