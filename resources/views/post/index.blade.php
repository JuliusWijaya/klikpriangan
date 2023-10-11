@extends('layouts.index')

@section('content')
<div class="row" style="padding: 0 50px;">
    <div class="col-12">
        <h3>Post</h3>

        <div style="padding: 15px 0;" class="pull-left">
            <a href="{{ route('posts.create') }}" class="btn btn-primary pull-right">Create Post</a>
        </div>

        <div class="table-responsive" style="margin-top: 10px; width: 150%;">
            <table id="example" class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $post->title }}</td>
                        <td>
                            <a href="/posts/details/{{ $post->slug }}" class="btn btn-info" style="margin: 0 5px;">
                                <i class="fa fa-eye" aria-hidden="true"></i>
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

@push('js')
<script>
    new DataTable('#example');
</script>
@endpush
