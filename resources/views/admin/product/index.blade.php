@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> {{ $pageTitle }}</h1>
            <p>{{ $subTitle }}</p>
        </div>
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary pull-right">Add New</a>
    </div>
    @include('admin.partials.flash')
    @php
    $category_id = (isset($_GET['category_id']) && $_GET['category_id']!='')?$_GET['category_id']:'';
    $name = (isset($_GET['name']) && $_GET['name']!='')?$_GET['name']:'';
    $code = (isset($_GET['code']) && $_GET['code']!='')?$_GET['code']:'';
    @endphp
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <form action="">
                    <table class="table table-hover custom-data-table-style table-striped" id="">
                        <tbody>
                            <tr>
                                <td>
                                    <select class="form-control " name="category_id" id="category_id">
                                        <option value="">Choose Category</option>
                                        @foreach($categories as $n)
                                        <option value="{{$n->id}}" @if($n->id==$category_id){{'selected'}} @endif>{{$n->name}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="name" placeholder="Product Title" value="{{$name}}">
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="code" placeholder="Product Code" value="{{$code}}">
                                </td>
                                <td>
                                    <button class="btn btn-primary" type="submit" id="btnSave"><i class="fa fa-fw fa-lg fa-check-circle"></i>Search</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    </form>
                    <table class="table table-hover custom-data-table-style table-striped" id="sampleTable">
                        <thead>
                        <tr>
                            <th>Sl No</th>
                            <th>Name</th>
                           
                            <th>Category</th>
                            <th>SKU Code</th>
                            <!--<th>Shipping</th>-->
                            <!--<th>Price</th>-->
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php $slno =1; @endphp
                            @foreach($products as $products)
                                <tr>
                                    <td>{{ $slno }}</td>
                                    <td>{{ $products->name }}</td>
                                    
                                    <td>{{ empty($products->category->name) ? '' : $products->category->name }}</td>
                                    <td>{{ $products->code }}</td>
                                    <!--<td>@if($products->shipping==1){{'Yes'}} @elseif($products->shipping==2){{'No'}} @else {{'Not specified'}} @endif
                                    </td>-->
                                    <!--<td>Price : {{ $products->price }} <br>
                                        Offer : {{ $products->offered_price }}
                                    </td>-->
                                    
                                    <td class="text-center">
                                        <div class="toggle-button-cover margin-auto">
                                             <div class="button-cover">
                                                <div class="button-togglr b2" id="button-11">
                                                    <input id="toggle-block" type="checkbox" name="is_active" class="checkbox" data-category_id="{{ $products['id'] }}" {{ $products['is_active'] == true ? 'checked' : '' }}>
                                                    <div class="knobs"><span>Inactive</span></div>
                                                    <div class="layer"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Second group">
                                            <a href="{{ route('admin.products.edit', $products->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                            <!--@if($products->is_bestseller==1)
                                    <a href="{{ route('admin.products.bestseller',['id' => $products->id, 'idd'=>'0'] ) }}" class="btn btn-sm btn-primary">Bestseller</a>
                                            @else
                                    <a href="{{ route('admin.products.bestseller', ['id' => $products->id, 'idd'=>'1']) }}" class="btn btn-sm btn-primary">Not Bestseller</a>
                                            @endif-->

                                            @if($products->is_today_deal==1)
                                    <a href="{{ route('admin.products.todaydeal',['id' => $products->id, 'idd'=>'0'] ) }}" class="btn btn-sm btn-primary">Flash Deal</a>
                                            @else
                                    <a href="{{ route('admin.products.todaydeal', ['id' => $products->id, 'idd'=>'1']) }}" class="btn btn-sm btn-primary">Not Flash Deal</a>
                                            @endif

                                            @if($products->is_new==1)
                                    <a href="{{ route('admin.products.newarrival',['id' => $products->id, 'idd'=>'0'] ) }}" class="btn btn-sm btn-primary">Trending</a>
                                            @else
                                    <a href="{{ route('admin.products.newarrival', ['id' => $products->id, 'idd'=>'1']) }}" class="btn btn-sm btn-primary">Not Trending</a>
                                            @endif


                                            <!--@if($products->is_pre_order==1)
                                    <a href="{{ route('admin.products.preorder',['id' => $products->id, 'idd'=>'0'] ) }}" class="btn btn-sm btn-primary">Pre Order</a>
                                            @else
                                    <a href="{{ route('admin.products.preorder', ['id' => $products->id, 'idd'=>'1']) }}" class="btn btn-sm btn-primary">Not Pre Order</a>
                                            @endif-->

                                            @if($products->stock==1)
                                    <a href="{{ route('admin.products.stock',['id' => $products->id, 'idd'=>'0'] ) }}" class="btn btn-sm btn-primary">In Stock</a>
                                            @else
                                    <a href="{{ route('admin.products.stock', ['id' => $products->id, 'idd'=>'1']) }}" class="btn btn-sm btn-primary">Out Of Stock</a>
                                            @endif
                                            <!-- <a href="{{ route('admin.products.addsize', $products->id) }}" class="btn btn-sm btn-primary">Add Size</a>
                                            <a href="{{ route('admin.products.sizelist', $products->id) }}" class="btn btn-sm btn-primary">Size list</a> -->
                                            <a href="{{ route('admin.products.detail', $products->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                                            
                                             <a href="#" data-id="{{$products['id']}}" class="sa-remove btn btn-sm btn-danger edit-btn"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @php $slno++ @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('styles')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
@endpush
@push('scripts')
    <!-- <script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable({"ordering": false});
    </script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
    <script type="text/javascript">
    $('.sa-remove').on("click",function(){
        var categoryId = $(this).data('id');
        swal({
          title: "Are you sure?",
          text: "Your will not be able to recover the record!",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: "btn-danger",
          confirmButtonText: "Yes, delete it!",
          closeOnConfirm: false
        },
        function(isConfirm){
          if (isConfirm) {
            window.location.href = "products/"+categoryId+"/delete";
            } else {
              swal("Cancelled", "Record is safe", "error");
            }
        });
    });
    </script>
    <script type="text/javascript">
        $('input[id="toggle-block"]').change(function() {
            var category_id = $(this).data('category_id');
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            var is_active = 0;
          if($(this).is(":checked")){
              is_active = 1;
          }else{
            is_active = 0;
          }
          $.ajax({
                type:'POST',
                dataType:'JSON',
                url:"{{route('admin.products.updateStatus')}}",
                data:{ _token: CSRF_TOKEN, id:category_id, is_active:is_active},
                success:function(response)
                {
                  swal("Success!", response.message, "success");
                },
                error: function(response)
                {
                  swal("Error!", response.message, "error");
                }
              });
        });
    </script>
@endpush