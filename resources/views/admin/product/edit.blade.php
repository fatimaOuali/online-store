@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
<div class="card mb-4">
  <div class="card-header" style="background-color: rgb(215, 176, 251);">
    Modifier Produit
  </div>
  <div class="card-body">
    @if($errors->any())
    <ul class="alert alert-danger list-unstyled">
      @foreach($errors->all() as $error)
      <li>- {{ $error }}</li>
      @endforeach
    </ul>
    @endif

    <form method="POST" action="{{ route('admin.product.update', ['id'=> $viewData['product']->getId()]) }}"
      enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Nom:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <input name="name" value="{{ $viewData['product']->getName() }}" type="text" class="form-control">
            </div>
          </div>
        </div>
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Prix:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <input name="price" value="{{ $viewData['product']->getPrice() }}" type="number" class="form-control">
            </div>
          </div>
        </div>
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">sale:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <input name="sale" value="{{ $viewData['product']->getSale() }}" type="number" class="form-control">
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
        <div>
          @if($viewData['product']->productImages)
          <div class="row">
          @foreach($viewData['product']->productImages as $image)
          <div class="col-md-2">
          <img src="{{ asset($image->image)}}" style="width: 50px; height:50px;" class="me-4 border" alt="Img">
         <a href="{{ url('admin/product-image/'.$image->id.'/delete')}}" class="d-block">supprime</a>
          </div>
         @endforeach
        </div>
        @else 
        <h5>No image added</h5>
        @endif
        </div>
      
      <div class="mb-3">
        <label class="form-label">Category</label>
        <select name="category" id="category">
            <option value="">Catalogue</option>
            @foreach ($viewData['categories'] as $category)
                <option {{ $category == $viewData['product']->getCategory()?"selected":"" }} value="{{$category->getId()}}">{{$category->getName()}}</option>
            @endforeach
        </select>
      </div>
      <div class="mb-3">
        <label class="form-label">Type</label>
        <select name="type" id="type">
            <option value="">Type</option>
            @foreach ($viewData['types'] as $type)
                <option {{ $type == $viewData['product']->getType()?"selected":"" }} value="{{$type->getId()}}">{{$type->getName()}}</option>
            @endforeach
        </select>
      </div>
      <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea class="form-control" name="description"
          rows="3">{{ $viewData['product']->getDescription() }}</textarea>
      </div>
      <button type="submit" id="ajoute_prodcut" class="btn btn-primary">Enregistrer</button>
    </form>
  </div>
</div>
@endsection
