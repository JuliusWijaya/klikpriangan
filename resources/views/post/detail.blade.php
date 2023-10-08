@extends('layouts.index')

@section('content')
<div class="row" style="padding: 15px;">
    <div class="col-12 col-lg-12">
        <div style="margin-bottom: 18px;">
            <a href="/posts" class="btn btn-success"><i class="fa fa-reply" aria-hidden="true"></i> Back</a>
            <a href="/posts/{{ $data->slug }}/edit" class="btn btn-warning" style="margin: 0 15px;">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
            </a>
            <form action="{{ route('posts.destroy', $data->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger"
                    onclick="return confirm('Apakah anda yakin ingin menghapus category {{ $data->title }}')">
                    <i class="fa fa-times-circle" aria-hidden="true"></i>
                    Delete
                </button>
            </form>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Details post {{ $data->title }}</div>
            <div class="panel-body">
                <input type="text" class="form-control" value="{{ $data->title }}" readonly>
                <div style="padding: 5px;">
                </div>
                <input type="text" class="form-control" value="{{ $data->category->name }}" readonly>
                <div style="padding: 5px;">
                </div>
                <input type="text" class="form-control" value="{{ $data->excerpt }}" readonly>
                <div style="padding: 5px;">
                </div>
                <img src="{{ asset('/storage/image/'.$data->image) }}" width="200px" alt="{{ $data->title }}">
                <div style="padding: 5px;">
                </div>
                <textarea cols="30" rows="12" class="form-control" readonly>{{ strip_tags($data->body) }}</textarea>
                <div style="padding: 5px;">
                </div>
                <input type="text" class="form-control" 
                    value="{{ \Carbon\Carbon::parse($data->published_at)->diffForHumans() }}" readonly>
            </div>
        </div>
    </div>
</div>
@endsection
