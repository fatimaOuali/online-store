@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
<div>
  @if(session()->has('message'))
  <div class="alert alert-success">
<button type="button" class="close" data-dismiss="alert">x</button>
  {{session()->get('message')}}
</div>
  @endif
</div>
<div class="card">
  <div class="card-header" style="background-color: rgb(206, 158, 255);">
    Gestion des Orders
  </div>
  <div class="card-body">
    <table class="table table-bordered table-striped" style="background-color: rgb(235, 216, 252);">
      <thead>
        <tr>
          <th scope="col">Orders ID</th>
          <th scope="col">Nom</th>
          <th scope="col">Nom de Produit</th>
          <th scope="col">email</th>
          <th scope="col">telephone</th>
          <th scope="col">adresse</th>
          <th scope="col">Quantity</th>
          <th scope="col">Date</th>
          <th scope="col">total</th>
          <th scope="col">Supprime</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($viewData["items"] as $item)
        <tr>
          <td>{{  $item->getId() }}</td>
          <td>
          {{  $item->getOrder()->getUser()->getName() }}
          </td>
          <td>
            <a class="link-success" href="{{ route('product.show', ['id'=> $item->getProduct()->getId()]) }}">
            {{ $item->getProduct()->getName() }}
            </a>
        </td>
        <td>{{  $item->getOrder()->getUser()->getEmail() }}</td>
        <td>{{  $item->getOrder()->getUser()->getPhone() }}</td>
        <td>{{  $item->getOrder()->getUser()->getAddress() }}</td>
            <td>
              
              {{  $item->getQuantity()  }}
          </td>
          <td>{{ $item->getCreatedAt() }}</td>
          <td>
            
            {{$item->getOrder()->getTotal() }}</td>
          <td>
<a href="{{ url('admin/orders/'.$item->id.'/destroy')}}" class="d-block" ><i id="icon_itm_delete" class="bi-trash"></i></a>
            
           
            {{-- <form  action="{{ route('admin.orders.delete', )}}" method="POST">
              @csrf
              @method('DELETE')
              <button  class="btn btn-danger">
                <i class="bi-trash"></i>
              </button>
            </form> --}}
          </td>
        </tr>
        {{-- @empty
<tr class="alert alert-danger" role="alert">
  <td>
    not orders availabe
  </td>
 
</tr> --}}
@endforeach

      </tbody>
    </table>
    <div>
      {{$viewData["items"] ->links()}}
    </div>
  </div>
</div>
<style>
  #icon_itm_delete{
  font-size: 40px;
  }
</style>
@endsection
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

{{-- @extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
<div class="card">
  <div class="card-header">
    Gestion des Orders
  </div>
  <div class="card-body">
    <table class="table table-bordered table-striped text-center mt-3">
      <thead>
        <tr>
          <th scope="col">orders ID</th>
          <th scope="col">Product Name</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">date</th>
          <th scope="col">Price</th>
          <th scope="col">Total</th>
          <th scope="col">Quantity</th>
          <th scope="col">Delete</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($viewData["orders"] as $order)

        <tr>
          <td>{{ $order->id }}</td>
          <td>{{ $order->total }}</td>
          <td>
         
        </td>
         
        </tr>
        @empty
<tr class="alert alert-danger" role="alert">
  <td>
    not orders availabe
  </td>
 
</tr>
      </tbody>
    </table>
    <div>
      {{$viewData["orders"] ->links()}}
    </div>
  </div>
</div>

@endforelse
@endsection --}}
