@extends('layouts.index')

@section('content')
<link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
<style>
    trix-toolbar [data-trix-button-group="file-tools"] {
        display: none;
    }

</style>

<div class="row" style="margin: 0 3.5rem;">
    <div class="col-12 ">
        <h3>Create New Post</h3>
        @if ($errors->any())
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger">{{ $error }}</div>
        @endforeach
        @endif

        <div class="panel panel-primary" style="margin: 0 0 45px; width: 130%;">
            <div class="panel-heading">
                <a href="/posts" class="btn btn-default "><i class="fa fa-reply" aria-hidden="true"></i></a>
            </div>
            <div class="panel-body">
                <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group @error('title') has-error @enderror">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Title Post"
                            required autofocus value="{{ old('title') }}" style="margin-bottom: 15px">
                        <span class="label label-info" id="text"></span>
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
                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select class="form-control" name="category_id" id="category_id">
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @selected(old('category_id'))>{{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group @error('excerpt') has-error @enderror">
                        <label for="excerpt">Meta Deskripsi</label>
                        <input type="text" name="excerpt" id="excerpt" class="form-control" placeholder="Deskripsi Post"
                            value="{{ old('excerpt') }}" required>
                        @error('excerpt')
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <img class="img-preview img-fluid col-sm-5" style="padding: 15px;">
                        <input type="file" class="form-control" name="photo" id="photo" onchange="previewImage()">
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
                    <div class="form-group">
                        <select name="user_id" id="user_id" class="form-control">
                            @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->username }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary text-end">Publish</button>
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
        var txt = $('#text').text('Length Character');

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

        $('#title').keyup(function(){
            var title = $('#title').val();
            var text = title.length;

            if(text >= 1){
                if(text >= 110){
                    $('#text').removeClass('label label-info')
                    $('#text').addClass('label label-danger')
                } else {
                    $('#text').addClass('label label-info')
                }
                $('#text').text('Lenght Character ' + text);
            } else {
                txt.text('Length Character');
            }
        })
    });

    function previewImage() {
        const image = document.getElementById('photo');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function (oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }

    document.addEventListener('trix-file-accept', function (e) {
        e.preventDefault();
    })

</script>
@endpush
