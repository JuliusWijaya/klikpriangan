@extends('layouts.index')

@section('content')
<div class="row" style="padding: 0 15px;">
    <div class="col-12 col-lg-6">
        <h3>Profile {{ $user->name }}</h3>
        <div class="panel panel-default">
            <div class="panel-body">
                <div>
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <label for="username">Username</label>
                    <p>{{ $user->name }}</p>
                </div>
                <div>
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                    <label for="username">Email</label>
                    <p>{{ $user->email }}</p>
                </div>
                <div>
                    <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                    <label for="username">Status</label>
                    <p>{{ $user->status }}</p>
                </div>
                <div>
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                    <label for="username">Role</label>
                    <p>{{ $user->role->name }}</p>
                </div>
            </div>
            <div style="margin: 15px 15px;">
                <a href="/dashboard" class="btn btn-primary" style="margin: 0 15px;">
                    <i class="fa fa-reply" aria-hidden="true"></i>
                    Back
                </a>
                <a href="/setting-password" class="btn btn-danger">
                    <i class="fa fa-gear" aria-hidden="true"></i>
                    Password
                </a>
            </div>
        </div>
    </div>
</div>
@endsection