@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
<div class="card mb-4">
  <div class="card-header" style="background-color: rgb(226, 203, 248);">
    Ajouter Categories
  </div>
  <div class="card-body">
    @if($errors->any())
    <ul class="alert alert-danger list-unstyled">
      @foreach($errors->all() as $error)
      <li>- {{ $error }}</li>
      @endforeach
    </ul>
    @endif

    <form method="POST" action="{{ route('admin.category.store') }}" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Nom :</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <input name="name" value="{{ old('name') }}" type="text" class="form-control">
            </div>
          </div>
        </div>
      </div>
      <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea class="form-control" name="description" rows="3">{{ old('description') }}</textarea>
      </div>
      <button type="submit" style="background-color: rgb(141, 32, 243);" class="btn btn-primary">Enregistrer</button>
    </form>
  </div>
</div>

<div class="card">
  <div class="card-header" style="background-color: rgb(231, 211, 250);">
    Manage Categories
  </div>
  <div class="card-body">
    <table class="table table-bordered table-striped">
      <thead>
        <tr style="background-color: rgb(215, 176, 251);">
          <th scope="col">ID</th>
          <th scope="col">nom </th>
          <th scope="col">Modifier</th>
          <th scope="col">Supprime</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($viewData["categories"] as $category)
        <tr>
          <td>{{ $category->getId() }}</td>
          <td>{{ $category->getName() }}</td>
          <td>
            <a class="btn btn-primary" style="background-color: blueviolet; border-radius: 20px;" href="{{route('admin.category.edit', ['id'=> $category->getId()])}}">
              <i class="bi-pencil"></i>
            </a>
          </td>
          <td>
            <form action="{{ route('admin.category.delete', $category->getId())}}" method="POST">
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
