@extends('layouts.admin.master')
@section('content')

<div class="row">
    <div class="col-md-12">

        <div class="col-lg-12">
            <div class="card">
                @if(Session::has('stt'))
        <div class="alert alert-info" role="alert">
            <span class="invalid-feedback" style="display:block;">
                                <strong>{{ Session::get('stt') }}</strong></span>
        </div>
        @endif()
                <form action="{{ $item->urlAdminUpdate() }}" method="POST" class="form-horizontal"  enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT"> {!! csrf_field() !!}
                    <div class="card-body card-block">
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="hf-email" class=" form-control-label">Tên Danh Mục</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="name" id="name" value="{{ old('name', $item->name) }}" placeholder="Vui lòng diền tên" class="form-control">
                                <span class="invalid-feedback" style="display:block;">
                            @if ($errors->has('name'))
                            <div class="alert alert-success" role="alert">
                                <span class="invalid-feedback" style="display:block;">
                                <strong>{{ $errors->first('name') }}</strong></span>
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
                                <img src="{{ asset('image/category/'.$item->image) }}" alt="" style="width:200px;200px">
                                @endif
                            @if($errors->has('image'))
                            <div class="alert alert-success" role="alert">
                                <span class="invalid-feedback" style="display:block;">
                                <strong>{{ $errors->first('image') }}</strong></span>
                        </div>
                        @endif
                    </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="hf-password" class=" form-control-label">Mô Tả</label>
                </div>
                <div class="col-12 col-md-9">

                    <textarea class="ckeditor" id="ckeditor" name="description" cols="80" rows="10">{{old('description',$item->description)}}</textarea>
                    @if ($errors->has('description'))
                            <div class="alert alert-success" role="alert">
                                <span class="invalid-feedback" style="display:block;">
                                <strong>{{ $errors->first('description') }}</strong></span>
                            </div>
                    @endif
                </div>
            </div>
            <input type="submit" class="btn btn-primary" name="publish" value="Hiển Thị Trên Web">
            <input type="submit" class="btn btn-warning" name="draff" value="Chưa Hiển Thị ">
        </div>
    </div>
</div>
</form>
</div>
</div>
</div>
</div>

@endsection
