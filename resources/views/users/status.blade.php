@extends('layouts.index')

@section('content')
<div class="row" style="margin: 0 20px;">
    <div class="col-12 col-lg-10">
        <h3 style="margin: 20px 0;">Data User Inactive</h3>
        <div style="margin: 15px 0;">
            <a href="/users" class="btn btn-primary">Back</a>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($status as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->name }}</td>
                        <td>
                            <a href="/users/details/{{ $data->username }}" class="btn btn-info">
                                <i class="fa fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection