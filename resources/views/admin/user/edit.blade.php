@extends('layouts.admin.master')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="col-lg-12">
            <div class="card">
                @if(Session::has('success'))
                <div class="alert alert-info" role="alert">
                    <span class="invalid-feedback" style="display:block;">
                                        <strong>{{ Session::get('success') }}</strong></span>
                </div>
                    @endif()
                <form action="{{ route('admin_users.update',['id' => $item->id]) }}" method="POST" class="form-horizontal"  enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT" /> {{ csrf_field() }}
                    <div class="card-body card-block">
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="hf-email" class=" form-control-label">Tên</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="name" id="name" value="{{ old('name',$item->name) }}" placeholder="Vui lòng diền tên" class="form-control">
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
                                <label for="hf-email" class=" form-control-label">Email</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="email" id="email" value="{{ old('email',$item->email) }}" placeholder="Vui lòng diền tên" class="form-control">
                                <span class="invalid-feedback" style="display:block;">
                            @if ($errors->has('email'))
                            <div class="alert alert-success" role="alert">
                                <span class="invalid-feedback" style="display:block;">
                                <strong>{{ $errors->first('email') }}</strong></span>
                            </div>
                            @endif
                        </div>
                        </div>
                        {{--  <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="hf-email" class=" form-control-label">Password</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="password" name="password" id="password"  placeholder="Vui lòng điền mật khẩu" class="form-control">
                                <span class="invalid-feedback" style="display:block;">
                            @if ($errors->has('password'))
                            <div class="alert alert-success" role="alert">
                                <span class="invalid-feedback" style="display:block;">
                                <strong>{{ $errors->first('password') }}</strong></span>
                            </div>
                            @endif
                        </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="hf-email" class=" form-control-label">Password Confirm</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="password" name="password_confirmation" id="password_confirmation"  placeholder="Vui lòng điền lại mật khẩu" class="form-control">
                                <span class="invalid-feedback" style="display:block;">
                        </div>  --}}
                    {{--  </div>  --}}
                    <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="hf-email" class=" form-control-label">Quyền</label>
                            </div>
                            <div class="col-12 col-md-9">
                               <select name="role"  id="selectLg" class="form-control-lg form-control">
                                <option value="1">Admin</option>
                                <option value="0">Bình Thường</option>
                                </select>

                        </div>
                    </div>
            </div>

            <input type="submit" class="btn btn-primary" name="publish" value="Lưu">
        </div>
    </div>
</div>
</form>
</div>
</div>
</div>
</div>

@endsection
