@extends('layouts.index')

@section('content')
<div class="row" style="padding: 0 18px;">
    <div class="col-12 col-lg-8">
        <h3>Details {{ $data->username }}</h3>
       
        <div class="panel panel-default">
            <div class="panel-body">
                <div>
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <label for="username">Username</label>
                    <p>{{ $data->name }}</p>
                </div>
                <div>
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                    <label for="username">Email</label>
                    <p>{{ $data->email }}</p>
                </div>
                <div>
                    <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                    <label for="username">Status</label>
                    <p>{{ $data->status }}</p>
                </div>
            </div>
            <div style="margin: 15px 15px;">
                <a href="/users" class="btn btn-primary">
                    <i class="fa fa-reply" aria-hidden="true"></i>
                    Back
                </a>
                @if ($data->status == 'active')
                <a href="/users/{{ $data->username }}/edit" class="btn btn-warning" style="margin: 0 10px;">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    Edit
                </a>
                @if ($data->post_count == 0)
                <form action="{{ route('users.destroy', $data->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger"  onclick="return confirm('Are You Sure Delete {{ $data->name }} ?')">
                        <i class="fa fa-times-circle" aria-hidden="true"></i>
                        Delete
                    </button>
                </form>
                @endif
                @else
                <form action="{{ route('status.active', $data->id) }}" method="POST" style="display: inline; margin: 0 15px;">
                    @csrf
                    <button class="btn btn-info" onclick="return confirm('Are You Sure Approve ?')">Approved</button>
                </form>
                @endif
            </div>
        </div>
    </div>
</div>
</div>
@endsection

@push('js')
<script>
    $(document).ready(function () {
        $('#myBtn').click(function () {
            var btn = $('#myBtn');
            var id = $(this).data("id");
            var token = $(this).data("token");
            var path  = '/users/delete/'+id;
            btn = 'Are You Sure?';

            if (confirm(btn)) {
                $.ajax({
                    url: path,
                    type: 'DELETE',
                    dataType: "JSON",
                    data: {
                        "id": id,
                        "_method": 'DELETE',
                        "_token": token,
                    },
                    success: function () {
                        window.location.href = '/users';  
                        console.log("it Work");
                        btn.closest(".panel-default").remove();
                    }
                });
            } else {
                console.log("It failed");
            }
        });
    });
</script>
@endpush
