@extends('layouts.guest')

@section('content')

<div id="top" class="container">
    <div class="row">
        <div class="col text-center mt-4 ms-5">
            <h2>Les fruits & légumes c’est meilleur quand c’est bon.</h1>
                <h4>Les paniers de fruits & légumes en direct des producteurs 🚜</h3>
        </div>
        <div class="col text-center">
            <img class="" src="/image/accueil.jpeg" alt="">
        </div>
    </div>
</div>
<div class="text-center">
    <h3 class="mt-4">Chaque semaine, des paniers de fruits et légumes vraiment bons</h3>
    <p class="mt-4">Le bon pour Potager City, c’est d’abord du goût ! Un produit qui a du goût,
        c’est un produit choisi avec bon sens. En direct des producteurs grâce à un système en flux-tendu,
        pas de stock mais toujours de saison !</p>
</div>
<div class="container mt-5">
    <div class="row align-items-center">
        <div class="col">
            <img src="/image/legume1.jpg" alt="">
        </div>
        <div class="col text-center">
            <img src="/image/legume2.jpeg" alt="">
        </div>
        <div class="col">
            <img src="/image/legume3.jpeg" alt="">
        </div>
    </div>
</div>
@endsection


<style>
    h2 {
        color: #249224;
    }

    h4 {
        color: #249224;
    }

    #top {
        background-color: #A1DCA1;
    }
</style>