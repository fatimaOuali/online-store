@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
        <!-- About us section start -->
        <section class="about" style="background-image: url('{{ asset('/img/props.jpg')}}');">
            <h2 class="headings">Qu'est-ce que la Fintic ?</h2>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="content">
        <h1 class="heading-content fw-bold">à propos de fintic</h1>
        <p class="paragraph">
            FINTIC est une jeune entreprise dynamique spécialisée depuis 2016 dans le conseil et les services en nouvelles technologies actives au Maroc.
             Elle assiste les entreprises de toutes tailles, les PME comme les grandes entreprises, les organisations, 
             les associations nationales, les administrations publiques et les collectivités locales. Ainsi que elle les conseille et les accompagne dans la conception de tous les systèmes d’information concernant les programmes de gestion, dans la conception et la réalisation de leurs projets internet et fournit à ses clients tous les logiciels indispensables et légaux.
        </p>
       
        <a href="{{ route('message.index') }}" class="link-contact">
             <span class="btn-hover">
        
        </span> Contact</a>
                        </div>
        
                    </div>
        <div class="col-lg-6 col-md-12">
            <div class="img-settings">
                <img src="{{ asset('/img/about.jpg') }}" class="img-fluid img-scnd" alt="img">
            </div>
        </div>
                </div>
        
            </div>
        
        
         </section>
        <!-- About us section end -->

        {{-- Qui sommes nous? --}}
        
  <section class="me">
    <h3 class="heading_me">Qui sommes <span>nous</span>?</h3>
     <div class="container_me container">
       <div class="container">

        <div class="row me_container">
            <div class="col-lg-6">
                <div class="me_img">
                      <div class="image_me"></div>
                </div>
            </div>
            
    <div class="col-lg-6">
        <div class="content_me">
            <h4 class="heading_me_content">
                Domaines d’activité
            </h4>
            <p class="para_content_me">
                Création des applications et  <span>(des sites WEB)</span>. 
                Réparation et maintenance informatique.
                Formations et cours informatique .
                Vente et achat des accessoires informatiques  <span>(PC, Tablette…)</span>.
                Installation des caméras de surveillance et réseaux Internet
                Service technique : Informatique et Téléphonique<span> (ADSL, WIFI …)</span>.
                Communication  Publicité et Distribution : <span> cartes visites, les Flyers, Logo …</span> 


            </p>
        </div>
    </div>
        </div>
       </div>
     </div>

  </section>

        {{-- Qui sommes nous? --}}
@endsection