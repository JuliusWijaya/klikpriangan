@extends('layouts.index')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-lg-5">
            <h3>Tambah Category</h3>
            <div class="panel panel-default">
                <div class="panel-body">
                    <form action="" method="POST">
                        @csrf
                        <div class="input-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control @error('name')  has-error @enderror">
                        </div>
                        <div class="mt-3">
                            <button class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection