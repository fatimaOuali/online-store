@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
<div class="card mb-4">
  <div class="card-header" style="background-color: rgb(215, 176, 251);">
    Add Products
  </div>
  <div class="card-body">
    @if($errors->any())
    <ul class="alert alert-danger list-unstyled">
      @foreach($errors->all() as $error)
      <li>- {{ $error }}</li>
      @endforeach
    </ul>
    @endif

    <form method="POST" action="{{ route('admin.product.store') }}" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Name:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <input name="name" value="{{ old('name') }}" type="text" class="form-control">
            </div>
          </div>
        </div>

        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Prix:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <input name="price" value="{{ old('price') }}" type="number" class="form-control">
            </div>
          </div>
        </div>
        
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">sale:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <input name="sale" value="{{ old('sale') }}" type="number" class="form-control">
            </div>
          </div>
        </div>
      </div>

     

      <div class="row">
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Image:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <input class="form-control" type="file" multiple name="image[]">
            </div>
          </div>
        </div>
        <div class="col">
          &nbsp;
        </div>
      </div>


      
      <div class="mb-3">
        <label class="form-label">Category</label>
        <select name="category" id="category">
            <option value="">Catalogue</option>
            @foreach ($viewData['categories'] as $category)
                <option value="{{$category->getId()}}">{{$category->getName()}}</option>
            @endforeach
        </select>
      </div>

    <div class="mb-3">
        <label class="form-label">Type</label>
        <select name="type" id="type">
            <option value="">Type</option>
            @foreach ($viewData['types'] as $type)
                <option value="{{ $type->getId() }}">{{ $type->getName() }}</option>
            @endforeach
        </select>
    </div>

      <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea class="form-control" name="description" rows="3">{{ old('description') }}</textarea>
      </div>
      <button type="submit" id="ajoute_prodcut" class="btn btn-primary">Ajouter</button>
    </form>
  </div>
</div>

<div class="card">
  <div class="card-header" style="background-color: rgb(215, 176, 251);">
    Manage Produits
  </div>
  <div class="card-body">
    <table class="table table-bordered table-striped">
      <thead>
        <tr style="background-color: rgb(215, 176, 251);">
          <th scope="col">id</th>
          <th scope="col">Name</th>
          <th scope="col">Price</th>
          <th scope="col">sale</th>
          <th scope="col">Catalogue</th>
          <th scope="col">Type</th>
          <th scope="col">Description</th>
          <th scope="col">edit</th>
          <th scope="col">delete</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($viewData["products"] as $product)
        <tr>
          <td>{{ $product->getId() }}</td>
          <td>{{ $product->getName() }}</td>
          <td>{{ $product->getPrice() }} DH</td>
          <td>{{ $product->getSale() }}</td>
          <td>{{$product->category->name}}</td>
          <td>{{$product->type->name}}</td>
          <td>{{ $product->getDescription() }}</td>
          <td>
            <a  class="btn btn-primary" style="background-color: blueviolet; border-radius: 20px;" href="{{route('admin.product.edit', ['id'=> $product->getId()])}}">
              <i  class="bi-pencil"></i>
            </a>
          </td>
          <td>
            <form action="{{ route('admin.product.delete', $product->getId())}}" method="POST">
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
