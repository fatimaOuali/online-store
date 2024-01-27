<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
    crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
  <script src='https://kit.fontawesome.com/4c729db828.js' crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  
  <link href="{{ asset('/css/admin.css') }}" rel="stylesheet" />
 <title>@yield('title', 'FINTIC')</title>
</head>

<body>
  <div class="row g-0">
    <!-- sidebar -->
    <div id="admin_space" class="p-3 col fixed text-white ">
      <a href="{{ route('admin.home.index') }}" class="text-white text-decoration-none">
        <span class="fs-4">Panneau d'administration</span>
      </a>
      <hr />
      <ul class="nav flex-column">
        <li><a href="{{ route('admin.home.index') }}" class="link-contact"> <span class="btn-hover"></span>Accueil Admin</a></li>
        <li><a href="{{ route('admin.product.index') }}" class="link-contact"><span class="btn-hover"></span> Products</a></li>
        <li><a href="{{ route('admin.category.index') }}" class="link-contact"><span class="btn-hover"></span> Categories</a></li>
        <li><a href="{{ route('admin.type.index') }}" class="link-contact"><span class="btn-hover"></span> types</a></li>
        <li><a href="{{ route('admin.clients.index') }}" class="link-contact"><span class="btn-hover"></span>Gestion comptes</a></li>
        <li><a href="{{ route('admin.message.index') }}" class="link-contact"><span class="btn-hover"></span>Messages des clients</a></li>
        <li><a href="{{ route('admin.orders.orders') }}" class="link-contact"><span class="btn-hover"></span>Gestion commandes</a></li> 
        <li >
         <a id="icon_dc" href="{{ route('home.about') }}" class="mt-2 btn  text-white"> <i class="fa-solid fa-circle-left"></i> Déconnexion</a>
        </li>
      </ul>
    </div>
    <!-- sidebar -->
    <div class="col content-grey">
      {{-- <nav class="p-3 shadow text-end">
        <span class="profile-font">Admin</span>
        <img class="img-profile rounded-circle" src="{{ asset('/img/undraw_profile.svg') }}">
      </nav> --}}

      <div class="g-0 m-5">
        @yield('content')
      </div>
    </div>
  </div>

  <!-- footer -->
  <div class="copyright py-4 text-center text-white">
    <div class="container">
      <small>
        Copyright - <a class="text-reset fw-bold text-decoration-none" target="_blank"
          {{-- href="https://twitter.com/danielgarax" --}}>
          Fintic
        </a> - <b></b>
      </small>
    </div>
  </div>
  <!-- footer -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
  </script>
  <style>
    .fa-solid{
      size: 200px;
    }
    #icon_dc{
      background-color: #fc61dd
    }






.link-contact{
    text-decoration: none;
    display: inline-block;
    text-transform: lowercase;
    font-size: 19px;
    padding: 12px 20px;
    background-image: linear-gradient(to right top, #460a52,
    #460a52,#460a52,#460a52);
    color: white;
    border-radius: 10px;
    margin: 6px 0px;
    z-index: 5;
    position: relative;

}
.btn-hover{
    text-decoration: none;
    display: inline-block;
    position: absolute;
    top: 0%;
    left: 0%;
    width: 0%;
    height: 100%;
    background-image: linear-gradient(to right , #ff85e7,
    #ff85e7 , #ff85e7, #ff85e7,#ff85e7);
    border-radius: 10px;
    overflow: hidden;
    z-index: -1;
    transition: 0.6s ease-in-out;


}
.link-contact:hover{
    color: white;
}
.link-contact:hover .btn-hover{
    width: 100%;

}







  </style>
</body>

</html>
