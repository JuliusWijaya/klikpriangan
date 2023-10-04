@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-12">
        <h3>Data User Inactive</h3>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Details</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->username }}</td>
                    <td>
                        <a href="#" class="btn btn-info">
                            <i class="fa fa-eye"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection