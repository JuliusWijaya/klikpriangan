@extends('layouts.index')

@section('content')
<div class="row" style="padding: 10px;">
    <div class="col-12 col-lg-8">
        <h3>Categories</h3>
        <div style="margin-top: 15px;">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
                Create category
            </button>
        </div>

        @if ($errors->any())
        <div style="margin: 15px 0;">
            <ul>
                @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{ $error }}
                </div>
                @endforeach
            </ul>
        </div>
        @endif

        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            <strong>{{ session('success') }}</strong>
        </div>
        @endif

        <div class="table-responsive" style="margin-top: 15px;">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                            <a href="/category/{{ $item->slug }}/edit" class="btn btn-warning" style="margin: 0 5px;">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </a>
                            @if ($item->posts_count == 0)
                            <form action="{{ route('category.destroy', $item->id) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger"
                                    onclick="return confirm('Apakah anda yakin ingin menghapus category {{ $item->name }}')">
                                    <i class="fa fa-times-circle" aria-hidden="true"></i>
                                </button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Tambah Category</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('category.store') }}" method="POST">
                            @csrf
                            <div class="form-group @error('name') has-error @enderror">
                                <label for="name">Nama Category</label>
                                <input type="text" class="form-control" name="name"
                                    id="check" placeholder="Nama category">
                                @error('name')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group @error('slug') has-error @enderror">
                                <input type="hidden" class="form-control" name="slug"
                                    id="slug" placeholder="Slug category">
                                @error('slug')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" id="myBtn" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

