@extends('layouts.index')

@section('content')
<link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
<style>
    trix-toolbar [data-trix-button-group="file-tools"] {
        display: none;
    }
</style>

<div class="row" style="padding: 0 30px;">
    <div class="col-12 ">
        <h3>Create New Post</h3>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p class="text-danger">{{ $error }}</p>
            @endforeach
        @endif
        <div class="panel panel-primary">
            <div class="panel-heading">
                <a href="/posts" class="btn btn-default "><i class="fa fa-reply" aria-hidden="true"></i></a>
            </div>
            <div class="panel-body">
                <form action="{{ route('posts.store') }}" method="POST">
                    @csrf
                    <div class="form-group @error('title') has-error @enderror">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Title Post"
                            required autofocus value="{{ old('title') }}">
                        @error('title')
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="form-group @error('slug') has-error @enderror">
                        <label for="slug">Slug</label>
                        <input type="text" name="slug" id="slug" class="form-control" placeholder="Slug Post"
                            value="{{ old('slug') }}" required>
                        @error('slug')
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="form-group @error('excerpt') has-error @enderror">
                        <label for="excerpt">Excerpt</label>
                        <input type="text" name="excerpt" id="excerpt" class="form-control" placeholder="Excerpt Post"
                            value="{{ old('excerpt') }}" required>
                        @error('excerpt')
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control">
                    </div>
                    <div class="form-group @error('body') has-error @enderror">
                        <label for="body">Body</label>
                        @error('body')
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                        @enderror
                        <input id="body" type="hidden" name="body" value="{{ old('body') }}">
                        <trix-editor input="body"></trix-editor>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary text-end">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
<script>
    $(document).ready(function () {
        $('#title').on('change', function () {
            const title = $('#title').val();
            var path = '/posts/create/checkSlug?title=' + title;

            $.ajax({
                url: path,
                type: 'GET',
                dataType: 'json',
                success: function (response) {
                    $('#slug').val(response.slug);
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });
    });

    document.addEventListener('trix-file-accept', function (e) {
        e.preventDefault();
    })

</script>
@endpush
