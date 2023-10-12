@extends('layouts.index')

@section('content')
<div class="row" style="padding: 0 30px;">
    <div class="col-12">
        <h3>Change Password</h3>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
        @endif

        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
     
        <div class="panel panel-default">
            <div class="panel-body">
                <form action="{{ route('password.action') }}" method="POST">
                    @csrf
                    <div>
                        <i class="fa fa-lock" aria-hidden="true"></i>
                        <label for="old_password">Password</label>
                        <input type="password" class="form-control" name="old_password" id="old_password" required autofocus>
                    </div>
                    <div style="margin: 10px 0;">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                        <label for="new_password">New Password</label>
                        <input type="password" class="form-control" name="new_password" id="new_password" required>
                    </div>
                    <div>
                        <i class="fa fa-lock" aria-hidden="true"></i>
                        <label for="password_confirmation">Password Confirmation</label>
                        <input type="password" class="form-control" name="new_password_confirmation" id="new_password_confirmation" required>
                    </div>
                    <div style="margin: 15px 15px;">
                        <a href="/dashboard" class="btn btn-primary" style="margin: 0 5px;">
                            <i class="fa fa-reply" aria-hidden="true"></i>
                            Back
                        </a>
                        <button type="submit" class="btn btn-success">Change Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection