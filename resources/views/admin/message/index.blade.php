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
    Gestion des massages
  </div>
  <div class="card-body">
    <table class="table table-bordered table-striped" style="background-color: rgb(235, 216, 252);">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">email</th>
          <th scope="col">Messages</th>
          <th scope="col">Supprime</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($viewData["message"] as $message)
        <tr>
          <td>{{ $message->getId() }}</td>
          <td>{{ $message->getEmail() }}</td>
          <td>{{ $message->getMessage() }}</td>
          <td>
            <form  action="{{ route('admin.message.delete', $message->getId())}}" method="POST">
              @csrf
              @method('DELETE')
              <button  class="btn btn-danger" style="background-color: rgb(252, 31, 186); border-radius: 20px;">
                <i class="bi-trash"></i>
              </button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

    

   