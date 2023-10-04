@extends('layouts.index')

@section('content')
<div class="row" style="padding: 0 20px;">
    <div class="col-12 col-lg-9">
        <h3>Data User</h3>
        <div style="margin: 15px 0;">
            <a href="/users/inactive" class="btn btn-primary">Inactive</a>
        </div>

        <div class="table-responsive" style="padding: 10px 0;">
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
                        <td>{{ $data->username }}</td>
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