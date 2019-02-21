@extends('layouts.admin.master') @section('content')
<div class="row">

</div>

<div class="row">

    <div class="col-md-12">


        <div class="col-lg-12">
            <div class="card">
                @if(Session::has('status'))
                <div class="alert alert-info" role="alert">
                    <span class="invalid-feedback" style="display:block;">
                                        <strong>{{ Session::get('status') }}</strong></span>
                </div>
                    @endif()
                <form action="{{ $item->urlAdminUpdate($product->slug) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT"> {!! csrf_field() !!}
                    <div class="card-body card-block">
                        <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="selectSm" class=" form-control-label">Size</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="size"  id="selectLg" class="form-control-lg form-control">
                                <option value="0">Lớn</option>
                                <option value="1">Nhỏ</option>
                                <option value="2">Không Có Size</option>
                            </select> @if ($errors->has('size'))
                            <div class="alert alert-success" role="alert">
                                <span class="invalid-feedback" style="display:block;">
                                <strong>{{ $errors->first('size') }}</strong></span>
                            </div>
                            @endif
                        </div>
                    </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="hf-email" class="form-control-label">Giá</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="price" id="size" value="{{ old('price', $item->price) }}" placeholder="Giá" class="form-control">
                                <span class="invalid-feedback" style="display:block;">
                            @if ($errors->has('price'))
                            <div class="alert alert-success" role="alert">
                                <span class="invalid-feedback" style="display:block;">
                                <strong>{{ $errors->first('price') }}</strong></span>
                            </div>
                            @endif
                        </div>
                    </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="hf-email" class=" form-control-label">Số Lượng</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="number" name="amount" id="amount" value="{{ old('amount', $item->amount) }}" placeholder="Số lượng" class="form-control">
                                <span class="invalid-feedback" style="display:block;">
                            @if ($errors->has('amount'))
                            <div class="alert alert-success" role="alert">
                                <span class="invalid-feedback" style="display:block;">
                                <strong>{{ $errors->first('amount') }}</strong></span>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="hf-password" class=" form-control-label">Hình Ảnh</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="file" name="image" id="image" value="{{ old('image', $item->imgae) }}" class="form-control">
                            <span class="invalid-feedback" style="display:block;">
                                @if(!empty($item->image) && $item->image != '')
                                <img src="{{ asset('image/product/'.$item->image) }}" alt="" style="width:200px;200px">
                                @endif
                            @if($errors->has('image'))
                            <div class="alert alert-success" role="alert">
                                <span class="invalid-feedback" style="display:block;">
                                <strong>{{ $errors->first('image') }}</strong></span>
                        </div>
                        @endif
                    </div>

            </div>
                <input type="submit" class="btn btn-primary" name="publish" value="Hiển Thị Trên Web">
                <input type="submit" class="btn btn-warning" name="draff" value="Chưa Hiển Thị ">
        </div>
    </div>
    </form>
</div>
</div>
</div>
</div>
@endsection
