<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="{{ asset('js/cookieData.js') }}"></script>
    <!-- CSS Layout -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cookie.css') }}">

    <!-- CSS Views -->
     @yield('css')
</head>
<body>

    @include('partials.cookie')
    
    <div class="info-bar-haut">    
        Livraison gratuite & expédition en 24/72h !<sup>(1)</sup>    
    </div>
    
    <nav class="barre-recherche-info marge">
        <a class="Miliboologo" href="{{ route('homepage')}}">
            <img class="Miliboologo" href="{{ route('homepage')}}" src="{{ asset('/img/logo_Miliboo_fr.svg') }}" alt="Logomiliboo">    
        </a>
        <div id="contenu-recherchebar">
            <div id="recherche-zone">    
                <form id="form-style" action="{{ route('produit.recherche') }}" method="GET">
                    <span><img id="imgsearch" src="{{asset('img/search.png')}}" alt="image recherche"></span>
                    <input id="recherchebar" type="text" placeholder="Je recherche..." name="motclef" value="{{ request()->input('q') }}" >
                </form>
            </div>
            <ul id="test">
                <li>    <a href=""> <img class="imgtest" src="{{ asset('img/question.png') }}" alt="image d'aide"></li>    </a>
                <li><a href="{{ route('espaceclient')}}"> <img class='imgtest' src='/img/user.png' alt='image compte'>
            </li>        </a>
                <li>    <a href="{{ route('panier') }}"> <img class="imgtest" src="{{ asset('img/basket.png') }}" alt="image panier"></li>      </a>
            </ul>
        </div>
    </nav>
    <div class="marge" id="navigation">
        <div id="navigation-regroupement">
            <a href="{{ route('produits.parRegroupement', 1)}}" class="navigation-regroupement">Nouveautés</a>
            <a href="{{ route('produits.parRegroupement', 2)}}" class="navigation-regroupement">Promotion</a>
            <a href="{{ route('produits.parRegroupement', 3)}}" class="navigation-regroupement">Made in FRANCE</a>
        </div>
        <div>
            <a href="" class="navigation-pro">Espace Pro</a>
        </div>
    </div>
    <div id="div-cat">
        <nav class="marge" id="navcategorie">
            <ul id="ul-cat">
                <li class="licategorie" id="a-canape">
                    <a href="{{ route('produits.parCategorieMere', 1)}}">Canapé & Fauteuil</a>
                    <div class="categorie-menu" id="cat-canape">
                        <div class="cat-colonne">
                            <ul class="ul-sous-cat">
                                <li><a href="{{route('produits.parCategorie', 12)}}">Canapé</a></li>
                                <li><a href="{{route('produits.parCategorie', 13)}}">Canapé design</a></li>
                            </ul>
                        </div>
                        <div class="cat-colonne">
                            <ul class="ul-sous-cat">
                                <li><a href="{{route('produits.parCategorie', 14)}}">Fauteuil</a></li>
                               
                            </ul>
                        </div>
                        <div class="cat-colonne div-cat-img" >
                            <img class="img-cat" src="{{ asset('img/canape.jpg') }}" alt="">
                        </div>
                    </div>
                </li>
                <li class="licategorie">
                    <a id="a-chaise" href="{{route('produits.parCategorieMere', 2)}}">Chaise & tabouret</a>
                    <div class="categorie-menu" id="cat-chaise">
                        <div class="cat-colonne">
                            <ul class="ul-sous-cat">
                                <li><a href="{{route('produits.parCategorie', 15)}}">Chaise</a></li>
                                <li><a href="{{route('produits.parCategorie', 16)}}">Chaise design</a></li>
                                
                                
                            </ul>
                        </div>
                        <div class="cat-colonne">                            
                            <ul class="ul-sous-cat">
                            <li><a href="{{route('produits.parCategorie', 17)}}">Tabouret</a></li>
                            </ul>
                        </div>
                        <div class="cat-colonne">
                            <img class="img-cat" src="{{asset('img/chaise.jpg') }}" alt="">
                        </div>
                    </div>
                </li>
                <li class="licategorie">
                    <a id="a-bureau" href="{{route('produits.parCategorieMere', 3)}}">Bureau</a>
                    <div class="categorie-menu" id="cat-bureau">
                        <div class="cat-colonne">
                            <ul class="ul-sous-cat">
                                <li><a href="{{route('produits.parCategorie', 18)}}">Fauteuil de bureau</a></li>
                                <li><a href="{{route('produits.parCategorie', 19)}}">Bureau design</a></li>
                            </ul>
                        </div>
                        <div class="cat-colonne">
                            <ul class="ul-sous-cat">
                            </ul>
                        </div>
                        <div class="cat-colonne">
                            <img class="img-cat" src="{{asset ('img/bureau.jpg') }}" alt="">
                        </div>
                    </div>
                </li>
                <li class="licategorie">
                <a id="a-table" href="{{route('produits.parCategorieMere', 4)}}">Table</a>
                    <div class="categorie-menu" id="cat-table">
                        <div class="cat-colonne">
                            <ul class="ul-sous-cat">
                                <li><a href="{{route('produits.parCategorie', 20)}}">Table à manger</a></li>
                                <li><a href="{{route('produits.parCategorie', 21)}}">Table basse</a></li>
                            </ul>
                        </div>
                        <div class="cat-colonne"></div>
                        <div class="cat-colonne"><img class="img-cat"src="{{asset('img/tableimg.jpg')}}" alt=""></div>
                    </div>
                </li>
                <li class="licategorie">
                    <a id="a-rangement" href="{{route('produits.parCategorieMere', 5)}}">Rangement</a>
                    <div class="categorie-menu" id="cat-rangement">
                        <div class="cat-colonne">
                            <ul class="ul-sous-cat">
                                <li><a href="{{route('produits.parCategorie', 22)}}">Bibliothèque et étagère</a></li>
                            </ul>
                        </div>
                        <div class="cat-colonne">
                            <ul class="ul-sous-cat">
                                <li><a href="{{route('produits.parCategorie', 23)}}">Meuble TV</a></li>
                            </ul>
                        </div>
                        <div class="cat-colonne">
                            <img class="img-cat" src="{{asset('img/rangement.jpg')}}" alt="">
                        </div>
                    </div>
                </li>
                <li class="licategorie">
                    <a id="a-chambre" href="{{route('produits.parCategorieMere', 6)}}">Chambre</a>
                    <div class="categorie-menu" id="cat-chambre">
                        <div class="cat-colonne">
                        <ul class="ul-sous-cat">
                                <li><a href="{{route('produits.parCategorie', 24)}}">Lit adulte</a></li>
                                <li><a href="{{route('produits.parCategorie', 25)}}">Tête de Lit</a></li>
                            </ul>
                        </div>
                        <div class="cat-colonne"></div>
                        <div class="cat-colonne">
                            <img class="img-cat" src="{{asset('img/chambre.jpg')}}" alt="">
                        </div>
                    </div>
                </li>
                <li class="licategorie">
                    <a id="a-enfant" href="{{route('produits.parCategorieMere', 7)}}">Enfant</a>
                    <div class="categorie-menu" id="cat-enfant">
                        <div class="cat-colonne">
                        <ul class="ul-sous-cat">
                                <li><a href="{{route('produits.parCategorie', 26)}}">Fauteuil enfant</a></li>
                                <li><a href="{{route('produits.parCategorie', 27)}}">Rangement enfant</a></li>
                            </ul>
                        </div>
                        <div class="cat-colonne"></div>
                        <div class="cat-colonne"><img class="img-cat" src="{{asset('img/chambre-enfant.jpg')}}" alt=""></div>
                    </div>
                </li>
                <li class="licategorie">
                    <a id="a-jardin" href="{{route('produits.parCategorieMere', 8)}}">Jardin</a>
                    <div class="categorie-menu" id="cat-jardin">
                        <div class="cat-colonne">
                            <ul class="ul-sous-cat">
                                <li><a href="{{route('produits.parCategorie', 28)}}">Salon de jardin</a></li>
                                <li><a href="{{route('produits.parCategorie', 29)}}">Chaise de jardin</a></li>
                            </ul>
                        </div>
                        <div class="cat-colonne"></div>
                        <div class="cat-colonne">
                            <img src="{{asset ('img/jardin.jpg')}}" alt="" class="img-cat">
                        </div>
                    </div>
                </li>
                <li class="licategorie">
                    <a id="a-luminaire" href="{{route('produits.parCategorieMere', 9)}}">Luminaire</a>
                    <div class="categorie-menu" id="cat-luminaire">
                        <div class="cat-colonne">
                            <ul class="ul-sous-cat">
                                <li><a href="{{route('produits.parCategorie', 30)}}">Lampe à poser</a></li>
                                <li><a href="{{route('produits.parCategorie', 31)}}">Suspension</a></li>
                                
                            </ul>
                        </div>
                        <div class="cat-colonne"></div>
                        <div class="cat-colonne"><img class="img-cat" src="{{asset('img/luminaire.jpg')}}" alt=""></div>
                    </div>
                </li>
                <li class="licategorie">
                    <a id="a-deco" href="{{route('produits.parCategorieMere', 10)}}">Déco</a>
                    <div class="categorie-menu" id="cat-deco">
                        <div class="cat-colonne">
                        <ul class="ul-sous-cat">
                                <li><a href="{{route('produits.parCategorie', 32)}}"> Etagère murale</a></li>
                                <li><a href="{{route('produits.parCategorie', 33)}}">Décoration murale</a></li>
                        </ul>
                        </div>
                        <div class="cat-colonne">
                        <ul class="ul-sous-cat">
                        </ul>
                        </div>
                        <div class="cat-colonne"><img class="img-cat" src="{{asset('img/deco.jpg')}}" alt=""></div>
                    </div>
                </li>
                <li class="licategorie">
                    <a href="{{route('produits.parCategorie', 11)}}">Meubles reconditionnés</a>
                </li>
            </ul>
        </nav>
    </div>
        <br><br><br>
    <div class="container">
        @yield('content')
    </div>
    
    <div id="service">
        <div class="marge" id="div-bandeau">
        <ul id="ul-service">
            <li class="bandeau-service">
                <img src="" alt="">
                <p style="text-align: center;">
                    Miliboo, c'est aussi
                    <B>des services uniques !</B>
                </p>
            </li>
            <li class="bandeau-service">
                <img class="img-bandeau" src="{{asset ('img/livraison-rapide.png')}}" alt="">
                <p>
                    Livraison <B>Gratuite(1)</B>
                </p>
            </li>
            <li class="bandeau-service">
                <img class="img-bandeau" src="{{asset ('img/medaille.png')}}" alt="">
                <p>
                    Fidélité <B>récompensée</B>
                </p>
            </li>
            <li class="bandeau-service">
                <img class="img-bandeau" src="{{asset ('img/colis.png')}}" alt="">
                <p>
                    Expédition <B>en 24h</B>
                </p>
            </li>
            <li class="bandeau-service">
                <img class="img-bandeau" src="{{asset ('img/appel.png')}}" alt="">
                <p>
                    Appel gratuit <B>0 805 14 44 44</B>
                </p>
            </li>
        </ul>
        </div>
    </div>
    <footer>
        <div id="container-footer"> 
            <div class="lignes">
                <div id="c1"> 
                    <h3 class="title-footer">à propos de Miliboo</h3>
                    <ul class="ul-footer">
                        <li><a href="">Qui sommes nous et nos engagements</a></li>
                        <li><a href="">Mentions légales</a></li>
                        <li><a href="">Moyens de paiement</a></li>
                        <li><a href="">Livraison</a></li>
                        <li><a href="">Conditions générales de Vente</a></li>
                        <li><a href="{{ route('confidentialite') }}">Politique de protection des données personnelles</a></li>
                        <li><a href="">Conditions générales d'utilisation du site</a></li>
                        <li><a href="">Droit informatique et libertés</a></li>
                        <li><a href="">Carte de fidelité et parrainage</a></li>
                        <li><a href="">Valeurs éco-responsables</a></li>
                        <li><a href="">Rejoignez-nous</a></li>
                        <li><a href="">Index égalité femme homme</a></li>
                        <li><a href="">Espace investisseurs</a></li>
                    </ul>
                </div>
                <div id="c2">
                    <h3 class="title-footer">Aide & Contact</h3>
                    <ul class="ul-footer">
                        <li><a href="">Besoin d'aide</a></li>
                        <li><a href="">Espace presse</a></li>
                        <li><a href="">Avis Clients</a></li>
                        <li><a href="">Plan du site</a></li>
                        <li><a href="">Promotions meubles</a></li>
                        <li><a href="">Recherche féquentes</a></li>
                    </ul>
                    <h3 class="title-footer">Miliboo sur le Net</h3>
                    <ul class="ul-footer">
                        <li><a href="">Miliboo-blog</a></li>
                        <li><a href="">Nos Partenaires</a></li>
                    </ul>
                </div>
                <div id="c3"> 
                    <img src="{{asset('img/logo_Miliboo_fr.svg')}}" alt="salut" class="Miliboologo">
                </div>
            </div>  
            <div class="lignes"> 
                <h3>Moyens de paiement</h3>
            </div>
            <div></div>
        </div>
    </footer>
</body>
</html>