@extends('layouts.index')

@section('content')
<div class="row" style="margin: 0 15px;">
    <div class="col-12 col-lg-10">
        <h3 style="margin: 20px 0;">Edit User </h3>

        <div class="panel panel-primary">
            <div class="panel-heading">
                <a href="/users" class="btn btn-default "><i class="fa fa-reply" aria-hidden="true"></i></a>
            </div>
            <div class="panel-body">
                <form action="{{ route('users.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group @error('title') has-error @enderror">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Name User"
                             autofocus value="{{ old('name', $data->name) }}">
                        @error('name')
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="form-group @error('slug') has-error @enderror">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Username"
                            value="{{ old('username', $data->username) }}" >
                        @error('username')
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                  
                    <div class="form-group @error('email') has-error @enderror">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Example: diana@gmail.com"
                            value="{{ old('email', $data->email) }}" >
                        @error('email')
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    
                    <div class="form-group @error('role_id') has-error @enderror">
                        <label for="role_id">Roles</label>
                        <select name="role_id" id="role_id" class="form-control">
                            @foreach ($datas as $val)
                            <option value="{{ $val->id }}" @selected($data->role_id == $val->id)>{{ $val->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group @error('status') has-error @enderror">
                        <label for="status">Roles</label>
                        <select name="status" id="status" class="form-control">
                            <option>-- Choose Status --</option>
                            <option value="active" @selected(old('status', $data->status) == 'active')>active</option>
                            <option value="inactive" @selected(old('status', $data->status) == 'inactive')>inactive</option>
                        </select>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary text-end">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
