@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
<div class="card">
<div class="card-header">
Dashboard
</div>
<br>


<div class="row">
    <div class="col-md-3">
        <div class="card card-body bg-primary text-white mb-3">
<label for="">Total Orders</label>
<h1>{{ $viewData["TotalOrders"] }}</h1>
<a id="view" href="{{ route('admin.orders.orders') }}">Plus infos</a>
        </div>

    </div>

    <div class="col-md-3">
        <div class="card card-body bg-success text-white mb-3">
<label for="">Today Orders</label>
<h1>{{$viewData["TodayOrders"]}}</h1>
<a id="view" href="{{ route('admin.orders.orders') }}">Plus infos</a>
        </div>

    </div>

    <div class="col-md-3">
        <div class="card card-body bg-warning text-white mb-3">
<label for="">this Month Orders</label>
<h1>{{$viewData["thisMonthOrders"] }}</h1>
<a id="view" href="{{ route('admin.orders.orders') }}">Plus infos</a>
        </div>

</div>


    <div class="col-md-3">
        <div class="card card-body bg-danger text-white mb-3">
<label for="">this Year Orders</label>
<h1>{{$viewData["thisYearOrders"]}}</h1>
<a id="view" href="{{ route('admin.orders.orders') }}">Plus infos</a>
        </div>

    </div>



    <div class="col-md-3">
        <div class="card card-body bg-primary text-white mb-3">
<label for="">Total Products</label>
<h1>{{$viewData["TotalProducts"]}}</h1>
<a id="view" href="{{ route('admin.product.index') }}">Plus infos</a>
        </div>

    </div>

    <div class="col-md-3">
        <div class="card card-body bg-success text-white mb-3">
<label for="">Total Categorie</label>
<h1>{{$viewData["TotalCategories"]}}</h1>
<a id="view" href="{{ route('admin.category.index') }}">Plus infos</a>
        </div>

    </div>

    <div class="col-md-3">
        <div class="card card-body bg-success text-white mb-3">
<label for="">Total Messages</label>
<h1>{{$viewData["TotalMessage"]}}</h1>
<a id="view" href="{{ route('admin.message.index') }}">Plus infos</a>
        </div>

    </div>

<div class="col-md-3">
    <div class="card card-body bg-primary text-white mb-3">
<label for="">All Clients</label>
<h1>{{$viewData["TotalAllUsers"]}}</h1>
<a id="view" href="{{ route('admin.clients.index') }}">Plus infos</a>
    </div>

</div>

<div class="col-md-3">
    <div class="card card-body bg-success text-white mb-3">
<label for="">Total Users</label>
<h1>{{$viewData["TotalUsers"]}}</h1>
<a id="view" href="{{ route('admin.clients.index') }}">Plus infos</a>
    </div>

</div>

<div class="col-md-3">
    <div class="card card-body bg-success text-white mb-3">
<label for="">Total Admin</label>
<h1>{{$viewData["TotalAdmin"]}}</h1>
<a id="view" href="{{ route('admin.clients.index') }}">Plus infos</a>
    </div>

</div>



</div>
<style>
    #view{
        color: white;
        text-decoration: none;

    }
</style>
@endsection