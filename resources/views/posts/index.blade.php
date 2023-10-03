@extends('layouts.index')

@section('content')
<div class="row" style="padding: 0 20px;">
    <div class="col-12 col-lg-9">
        <h3>Post</h3>
        <div style="padding: 15px 0;">
            <a href="{{ route('posts.create') }}" class="btn btn-primary">Cread Post</a>
        </div>

        <div class="table-responsive">
            <table class="tabel table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $post->title }}</td>
                        <td>
                            <a href="#" class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection