<div class="container-fluid">
    {{Form::open([
        'method'=>'post',
        'route'=>'handleCreateUser',
    ])}}
    <div class="row">
        <div class="col-md-12">
            <fieldset>
                <legend>{{__('admin.add_user')}}</legend>
                <div class="row">
                    <div class="col-md-4">
                        <label class="font-weight-bold">{{__('admin.username')}}</label>
                        <input type="text" class="form-control" name="username" value="{{old('username')}}"/>
                        <span class="text-danger">{{$errors->first('username') ?? ''}}</span>
                    </div>
                    <div class="col-md-4">
                        <label class="font-weight-bold">{{__('admin.mobile')}}</label>
                        <input type="text" class="form-control" name="mobile" value="{{old('mobile')}}"/>
                        <span class="text-danger">{{$errors->first('mobile') ?? ''}}</span>
                    </div>
                    <div class="col-md-4">
                        <label class="font-weight-bold">{{__('admin.password')}}</label>
                        <input type="password" class="form-control" name="password" value="{{old('password')}}"/>
                        <span class="text-danger">{{$errors->first('password') ?? ''}}</span>
                    </div>
                </div>
            </fieldset>
        </div>

        <div class="col-md-12 text-center mt-5 mb-5">
            <button class="btn btn-primary">
                {{__('admin.add')}}
            </button>
        </div>
    </div>

    {{Form::close()}}
</div>