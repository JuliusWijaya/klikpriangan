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
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
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
                            <button type="button" data-id="{{ $item->id }}" id="btnUbah" class="btn btn-info mybtn"
                                data-toggle="modal" data-target='#modalEdit{{ $item->id }}' style="margin-right: 5px;">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </button>
                            <form action="{{ route('category.destroy', $item->id) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger"
                                    onclick="return confirm('Apakah anda yakin ingin menghapus category {{ $item->name }}')">
                                    <i class="fa fa-times-circle" aria-hidden="true"></i>
                                </button>
                            </form>
                        </td>
                    </tr>

                    <!-- Modal Edit -->
                    <div class="modal fade" id="modalEdit{{ $item->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Edit Category</h4>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('category.update', $item->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group @error('name') has-error @enderror">
                                            <label for="name">Nama Category</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                name="name" id="name" value="{{ $item->name }}"
                                                placeholder="Nama category">
                                            @error('name')
                                                <div class="text-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                     
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" id="myBtn" class="btn btn-primary">Edit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                    id="name" value="" placeholder="Nama category">
                                @error('name')
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
