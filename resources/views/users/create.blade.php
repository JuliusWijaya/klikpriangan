@extends('layouts.index')

@section('content')
<div class="row" style="margin: 0 15px;">
    <div class="col-12 col-lg-10">
        <h3>Create User</h3>

        <div class="panel panel-primary">
            <div class="panel-heading">
                <a href="/users" class="btn btn-default "><i class="fa fa-reply" aria-hidden="true"></i></a>
            </div>
            <div class="panel-body">
                <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group @error('title') has-error @enderror">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Name User"
                             autofocus value="{{ old('name') }}">
                        @error('name')
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="form-group @error('slug') has-error @enderror">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Username"
                            value="{{ old('username') }}" >
                        @error('username')
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                  
                    <div class="form-group @error('email') has-error @enderror">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Example: diana@gmail.com"
                            value="{{ old('email') }}" >
                        @error('email')
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="form-group @error('password') has-error @enderror">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="******"
                            value="{{ old('password') }}" >
                        @error('password')
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    
                    <div class="form-group @error('role_id') has-error @enderror">
                        <label for="role_id">Roles</label>
                        <select name="role_id" id="role_id" class="form-control">
                            @foreach ($datas as $data)
                            <option value="{{ $data->id }}">{{ $data->name }}</option>
                            @endforeach
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