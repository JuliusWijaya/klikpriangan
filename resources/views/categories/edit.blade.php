@extends('layouts.index')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-lg-6">
            <h3>Edit Category</h3>

            <div style="margin: 10px 0;">
                <a href="/categories" class="btn btn-success btn-sm"><i class="fa fa-reply" aria-hidden="true"></i></a>
            </div>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">{{ $error }}</div>
                @endforeach
            @endif

            <div class="panel panel-default">
                <div class="panel-body">
                    <form action="{{ route('categories.update', $data->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" value="{{ $data->name }}" class="form-control">
                        <div style="padding: 5px 0;">
                        </div>
                        <label for="slug">Slug</label>
                        <input type="text" name="slug" id="slug" value="{{ $data->slug }}" class="form-control">
                        <div style="padding: 18px 0;">
                            <button class="btn btn-primary form-control" name="submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    $(document).ready(function () {
        $('#name').change(function () {
            const name = $('#name').val();
            var path = '/category/create/checkSlug?name=' + name;

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

</script>
@endpush
