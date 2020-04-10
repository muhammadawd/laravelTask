<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-bordered table-hover" id="data_table">
                <thead>
                <tr>
                    <th>#</th>
                    <th class="text-capitalize">username</th>
                    <th class="text-capitalize">mobile</th>
                    <th class="text-capitalize">is verified</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $k=>$user)
                    <tr id="user_{{$user->id}}">
                        <td>{{$k+1}}</td>
                        <td>{{$user->username}}</td>
                        <td>{{$user->mobile}}</td>
                        <td>{!! $user->verified_at ? '<i class="la la-check text-info"></i>': '<i class="la la-remove text-danger"></i>' !!}</td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-info  btn-sm" href="{{route('editUser',$user->id)}}">
                                    <i class="la la-edit"></i>
                                </a>
                                <button class="btn btn-danger btn-sm" onclick="deleteUser('{{$user->id}}')">
                                    <i class="la la-remove"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="col-md-12 mb-5">
                {{$users->render('pagination::bootstrap-4') ?? ''}}
            </div>
        </div>
    </div>
</div>