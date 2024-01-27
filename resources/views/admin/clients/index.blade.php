@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
<div class="card">
  <div class="card-header" style="background-color: rgb(206, 158, 255);">
    Gestion des clients
  </div>
  <div class="card-body">
    <table class="table table-bordered table-striped" style="background-color: rgb(235, 216, 252);">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nom</th>
          <th scope="col">email</th>
          <th scope="col">telephone</th>
          <th scope="col">adresse</th>
          <th scope="col">Role</th>
          <th scope="col">Supprime</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($viewData["users"] as $user)
        <tr>
          <td>{{ $user->getId() }}</td>
          <td>{{ $user->getName() }}</td>
          <td>{{ $user->getEmail() }}</td>
          <td>{{ $user->getPhone() }}</td>
          <td>{{ $user->getAddress() }}</td>
          <td>{{ $user->getRole() }}</td>
          
         
          <td>
            <form action="{{ route('admin.clients.delete', $user->getId())}}" method="POST">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger" style="background-color: rgb(252, 31, 186); border-radius: 20px;">
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
