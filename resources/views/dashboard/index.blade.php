@extends('layouts.index')

@section('box')
<div class="row">
    <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>{{ $categories }}</h3>
                <p>Category</p>
            </div>
            <div class="icon">
                <i class="ion ion-folder"></i>
            </div>
            <a href="/categories" class="small-box-footer">
                More info 
                <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>{{ $post}}</h3>
                <p>Postingan</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="/posts" class="small-box-footer">
                More info 
                <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>{{ $users }}</h3>
                <p>User</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="/users" class="small-box-footer">
                More info 
              <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>
@endsection