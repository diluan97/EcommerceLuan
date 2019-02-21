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
                <form action="{{ $item->urlAdminUpdate() }}" method="POST" class="form-horizontal">
                    <input type="hidden" name="_method" value="PUT"> {!! csrf_field() !!}
                    <div class="card-body card-block">
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="hf-email" class=" form-control-label">Tên</label>
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
                            <label for="selectLg" class=" form-control-label">Danh Mục</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="hot"  id="selectLg" class="form-control-lg form-control">
                                @foreach(config('custom.hot_display') as $key => $hot)
                                <option value="{{ $key }}" @if($key == $item->hot) selected @endif>{{ $hot }}</option>
                                @endforeach
                            </select> @if ($errors->has('hot'))
                            <div class="alert alert-success" role="alert">
                                <span class="invalid-feedback" style="display:block;">
                                <strong>{{ $errors->first('hot') }}</strong></span>
                            </div>
                            @endif
                        </div>

                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="selectLg" class=" form-control-label">Danh Mục</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="category_id"  id="selectLg" class="form-control-lg form-control">
                                @foreach($categories as $cate)
                                <option value="{{ $cate->id }}" @if($cate->id == $item->category_id) selected @endif>{{ $cate->name }}</option>
                                @endforeach
                            </select> @if ($errors->has('category_id'))
                            <div class="alert alert-success" role="alert">
                                <span class="invalid-feedback" style="display:block;">
                                <strong>{{ $errors->first('category_id') }}</strong></span>
                            </div>
                            @endif
                        </div>

                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="hf-password" class=" form-control-label">Mô Tả Ngắn</label>
                        </div>
                        <div class="col-12 col-md-9">

                            <textarea class="ckeditor" name="short_description" cols="80" rows="10">{{ old('short_description',$item->short_description) }}</textarea>
                            @if ($errors->has('short_description'))
                            <div class="alert alert-success" role="alert">
                                <span class="invalid-feedback" style="display:block;">
                                <strong>{{ $errors->first('short_description') }}</strong></span>
                            </div>
                            @endif
                        </div>
                    </div>
            </div>
                <input type="submit" class="btn btn-primary" name="publish" value="Hiển Thị Trên Web ">
                <input type="submit" class="btn btn-warning" name="draff" value="Chưa Hiển Thị">
                <input type="submit" class="btn btn-info" name="variant" value="Thêm Biến Thể">
        </div>
    </div>
    </form>
</div>
</div>
</div>
</div>
@endsection
