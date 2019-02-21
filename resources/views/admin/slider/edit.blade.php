@extends('layouts.admin.master')
@section('content')
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
                            <input type="file" name="image" id="image" value="{{ old('image', $item->image) }}" class="form-control">
                            <span class="invalid-feedback" style="display:block;">
                                @if(!empty($item->image) && $item->image != '')
                                <img src="{{ asset('image/slide/'.$item->image) }}" alt="" style="width:200px;200px">
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
                            <label for="hf-password" class=" form-control-label">Thương Hiệu</label>
                        </div>
                        <div class="col-12 col-md-9">
                                <input type="text" name="logan" id="" value="{{ old('logan', $item->logan) }}" class="form-control">
                                <span class="invalid-feedback" style="display:block;">

                                @if($errors->has('logan'))
                                <div class="alert alert-success" role="alert">
                                    <span class="invalid-feedback" style="display:block;">
                                    <strong>{{ $errors->first('logan') }}</strong></span>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="hf-password" class=" form-control-label">Thông tin</label>
                        </div>
                        <div class="col-12 col-md-9">
                                <textarea  class="form-control" name="info" id="" cols="30" rows="10">{{ old('info', $item->info) }}</textarea>
                                <span class="invalid-feedback" style="display:block;">

                                @if($errors->has('info'))
                                <div class="alert alert-success" role="alert">
                                    <span class="invalid-feedback" style="display:block;">
                                    <strong>{{ $errors->first('info') }}</strong></span>
                            </div>
                            @endif
                        </div>
                    </div>
            </div>

            <input type="submit" class="btn btn-primary" name="publish" value="Publish">
            <input type="submit" class="btn btn-warning" name="draff" value="Draff">
        </div>
    </div>
</div>
</form>
</div>
</div>
</div>
</div>

@endsection
