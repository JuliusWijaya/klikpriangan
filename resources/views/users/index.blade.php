@extends('layouts.index')

@section('content')
<div class="row" style="padding: 0 20px;">
    <div class="col-12 col-lg-9">
        <h3>Data User</h3>
        <div class="row">
            <div class="col-12" style="margin: 10px 0;">
                <a href="/users/status-inactive" class="btn btn-success" style="margin: 0 15px;">Inactive</a>
                <a href="{{ route('users.create') }}" class="btn btn-primary pull-right">Create User</a>
            </div>
        </div>

      

        <div class="table-responsive" style="padding: 10px 0; width: 120%;">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->name }}</td>
                        <td>
                            <a href="/users/details/{{ $data->username }}" class="btn btn-info"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection