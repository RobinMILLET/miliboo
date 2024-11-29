<!-- <!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <link rel="stylesheet" type="text/css" href="{{asset('css/produit.css')}}"/>   

    </head> -->

@extends('layouts.app')

@section('title', $produit->nomproduit)

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('css/produit.css')}}" />
@endsection

@section('content')

<!--
<div class="product-detail">
    <h1>{{ $produit->nomproduit }}</h1>
    <p><strong>IdPays:</strong> ${{ $produit->idpays }}</p>
    <p><strong>Source Notice:</strong> {{ $produit->sourcenotice }}</p>
    <p><strong>Type Produit:</strong> {{ $produit->idtypeproduit ?? 'Uncategorized' }}</p>
</div>
-->

    <body>
        <div class="divProduit">
            <div class="columnsProduit">
                <div class="colImagesProduit">

                <?php

                $colorationPrincipale = $produit->colorationPrixMin();
                // dd($colorationPrincipale);
                //var_dump($colorationPrincipale->getPhotos());
                // Récupération d'une photo
                 foreach ( $colorationPrincipale->getPhotos() as $photo) {
                        if ($photo) {
                            $source = $photo->sourcephoto;
                            $description = $photo->descriptionphoto;
                            } // Si pas de photo, on prend la photo par défaut
                        else { $source = "PLACEHOLDER.PNG";
                                $description ="Non"; }
                    echo "<img src='$source' alt='$description'>";
                }

                ?>
                
                    <!-- <img src="{{asset ('img/imagesProduitTest/creep1.jpg') }}">  -->
                    <!-- <img src="{{asset ('img/imagesProduitTest/creep2.jpg') }}">  -->
                    <!-- <img src="{{asset ('img/imagesProduitTest/creep3.png') }}">  -->
                    <!-- <img src="{{asset ('img/imagesProduitTest/creep4.png') }}">  -->
                    <!-- <img src="{{asset ('img/imagesProduitTest/creep5.png') }}">  -->
                    <!-- <img src="{{asset ('img/imagesProduitTest/creep6.png') }}">  -->
                    <!-- <img src="{{asset ('img/imagesProduitTest/creep7.png') }}">  -->
                    <!-- <img src="{{asset ('img/imagesProduitTest/creep8.png') }}">  -->

                    <details class="descProduitAccordion">
                        <summary class="titreDescAccordion">
                            Description
                            <span class="flecheAccordionDesc">^</span> 
                        </summary>
                        <p id="description" class="pProduitDesc"> 
                            Design et sobriété : voilà qui définit parfaitement ce<strong> canapé made in France</strong> !<br /><br />D'inspiration <strong>scandinave</strong>, le <strong>canapé 3 places CREEP</strong> trouvera sa place dans de nombreux salons grâce à sa ligne épurée et ses courbes intemporelles. Son joli revêtement en polyester gris chiné apporte une touche moderne et chaleureuse à cet ensemble à la sobriété élégante. Solide et au caractère authentique, il sublime l'assise au design réussi. Le canapé CREEP est <strong>fabriqué en France</strong>, on retrouve, dans ses matériaux et sa forme élégante, la qualité et le savoir-faire français.<br /><br />Grâce à ses dimensions, ce canapé scandinave peut accueillir confortablement 3 personnes. Son assise garnie de mousse et ses coussins de dossier en font le compagnon idéal pour les instants détente dans le salon. Pour donner à la pièce un esprit scandinave chaleureux et moderne, on accompagne ce <strong>canapé 3 places</strong> d'une table basse en bois.<br/><br />Ce <strong>canapé français</strong> est habillé d'un <strong>tissu déperlant</strong> qui limite l'absorption et la pénétration des taches. Les liquides glissent sur la surface du tissu et forment des gouttes que vous pourrez enlever facilement à l'aide d'un chiffon doux. <br /><br /><strong>Canapé gris clair</strong> livré prêt à monter. Coussins d'appoint inclus.<br /><br />Le colis étant volumineux, nous vous conseillons de vérifier que portes et escaliers permettent son passage."
                        </p>
                    </details>

                    <details class="descProduitEntretien">
                        <summary class="titreEntretienAccordion">
                            Entretien
                            <span class="flecheAccordionEntretien">^</span> 
                        </summary>
                        <p id="entretien" class="pProduitEntretien"> 
                        Pour les parties en tissu, utilisez simplement un chiffon doux ou un aspirateur pour dépoussiérer.  En cas de tache, utilisez simplement un chiffon et de l'eau savonneuse. N'utilisez pas d'éponge abrasive qui pourrait endommager la microfibre, ni de produit d'entretien agressif.
                        </p>
                    </details>
            </div>


            <div class="colPresentationProduit">
                <div class="cardProduit">
                    <h1 class="titreProduit"> {{ $produit->nomproduit }}</h1>
                    <a class="aDescDetail" href="#description" >
                        Description détaillée
                    </a>

                    <div class="divNoteProduit">
                        <p class="pNoteProduit">
                            ★★★★
                        </p>
                        <p class="pNbAvis">
                            (49 avis)
                        </p>
                    </div>
                    <div class="divColoris">
                        <p class="pColoris"> Colori(s) disponible(s)</p>
                        <div class="divListColoris">

                        <?php
                            foreach ($produit->getCouleurs as $couleur) {
                                echo "<div class='carreCouleur' style='background-color: #$couleur->rgbcouleur;' title='$couleur->nomcouleur'></div>";
                            }
                        ?>

                        </div>   
                    </div>
                </div>
            </div>
        </div>

        <div class="divAvis">
            <h2 class="titreAvis">
                Avis clients
            </h2>
            <div class="headerAvis">
                <div class="divImageAvis">
                    <img class="imgHeaderAvis" src="{{ asset('img/imagesProduitTest/creep1.jpg') }}">
                </div>
                <div class="noteAvis">
                    <h4 class="titreNoteAvis">
                        4/4
                    </h4>
                    <p class="pNoteAvis">
                        ★★★★
                    </p>
                    <p class="pNoteNbAvis">
                        (49 avis)
                    </p>
                </div>
            </div>
            
            <div class="divAvisClient">
                <div class="divCommentaireClient">
                    <div class="divClient">
                        <p class="nomClient">
                            Caroline
                        </p>
                        <div class="divNoteClient">
                            <i class="noteEtoileClient">★</i>
                            <i class="noteEtoileClient">★</i>
                            <i class="noteEtoileClient">★</i>
                            <i class="noteEtoileClient">★</i>
                        </div>
                    </div>
                    <div class="commentaireClient">
                        <h4 class="titreCommentaire">
                            Très belles chaises 
                        </h4>
                        <div class="contentCommentaire">
                            Très belles chaises
                        </div>     
                    </div>
                    <div class="timestampAvis">
                        <span class="timestampAvis">
                            Jeudi 23 Mai 2024
                        </span>
                    </div>
                </div>                                  
            </div>
        </div>
    </body>

@endsection