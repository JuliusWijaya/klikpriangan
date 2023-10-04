@extends('layouts.index')

@section('content')
<div class="row" style="padding: 0 18px;">
    <div class="col-12 col-lg-8">
        <h3>Details {{ $data->username }}</h3>

        <div class="panel panel-default">
            <div class="panel-body">
                <div>
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <label for="username">Username</label>
                    <p>{{ $data->username }}</p>
                </div>
                <div>
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                    <label for="username">Email</label>
                    <p>{{ $data->email }}</p>
                </div>
                <div>
                    <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                    <label for="username">Status</label>
                    <p>{{ $data->status }}</p>
                </div>
                <div style="margin: 18px 0;">
                    <a href="/users" class="btn btn-primary">
                        <i class="fa fa-reply" aria-hidden="true"></i>
                        Back
                    </a>
                    <a href="#" class="btn btn-warning" style="margin: 0 10px;">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        Edit
                    </a>
                    <form action="" style="display: inline; ">
                        <button class="btn btn-danger"><i class="fa fa-times-circle" aria-hidden="true"></i>
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
