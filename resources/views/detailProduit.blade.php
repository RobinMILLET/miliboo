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


<div class="product-detail">
    <h1>{{ $produit->nomproduit }}</h1>
    <!--<p><strong>IdPays:</strong> ${{ $produit->idpays }}</p>
    <p><strong>Source Notice:</strong> {{ $produit->sourcenotice }}</p>
    <p><strong>Type Produit:</strong> {{ $produit->idtypeproduit ?? 'Uncategorized' }}</p>-->
</div>


<body>

    <script src="{{asset('js/detailProduit.js')}}" defer></script>
    <div class="divProduit">
        <div class="columnsProduit">
            <div class="colImagesProduit">
                <?php

                use App\Http\Controllers\DetailProduitController;
                $colorDispos = $colorationsDispos;
                $colorationPrincipale = DetailProduitController::defColorationPrincipale($produit, $couleur);
                echo $colorationPrincipale->getCouleur()->nomcouleur;
                ?>
                <details id="descProduit" class="descProduitAccordion">
                    <summary class="titreDescAccordion">
                        Description
                        <span class="flecheAccordionDesc">^</span>
                    </summary>
                    <p class="pProduitDesc">
                        <?php
                        DetailProduitController::getDescriptionProduit($colorationPrincipale);
                        ?>
                    </p>
                </details>

                <details class="descProduitEntretien">
                    <summary class="titreEntretienAccordion">
                        Entretien
                        <span class="flecheAccordionEntretien">^</span>
                    </summary>
                    <p id="entretien" class="pProduitEntretien">
                        Pour les parties en tissu, utilisez simplement un chiffon doux ou un aspirateur pour dépoussiérer. En cas de tache, utilisez simplement un chiffon et de l'eau savonneuse. N'utilisez pas d'éponge abrasive qui pourrait endommager la microfibre, ni de produit d'entretien agressif.
                    </p>
                </details>
            </div>


            <div class="colPresentationProduit">
                <div class="cardProduit">
                    <h1 class="titreProduit"> {{ $produit->nomproduit }}</h1>

                    <?php
                    DetailProduitController::isPromotionProduit($colorationPrincipale);
                    ?>

                    <a class="aDescDetail" href="#descProduit">
                        Description détaillée
                    </a>

                    <div class="divNoteProduit">
                        <?php
                        $note = DetailProduitController::getNoteProduit($produit);
                        $noteEtoile = $note['noteEtoiles'];
                        $nbNote = $note['nbAvis'];
                        echo "$noteEtoile $nbNote";
                        ?>
                    </div>
                    <div class="divColoris">
                        <p class="pColoris"> Colori(s) disponible(s)</p>
                        <div class="divListColoris">

                            <?php
                            foreach ($produit->getCouleur() as $couleur) {
                                echo "<div class='carreCouleur' style='background-color: #$couleur->rgbcouleur;' title='$couleur->nomcouleur'></div>";
                            }
                            ?>

                        </div>

                        <div class="divPrixProduit">
                            <?php
                            DetailProduitController::affichagePrix($colorationPrincipale);
                            ?>
                        </div>

                        <div id="div-button-panier">
                            <select name="" id="select-quantite-produit">
                                <?php
                                    for($i = 0; $i<30; $i++){
                                        echo "<option value='$i'>$i</option>";
                                    }
                                ?>
                            </select>
                            <button id="button-achete">J'achète</button>
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
                    <?php
                    DetailProduitController::affichagePhotoHeaderAvis($colorationPrincipale);
                    ?>
                </div>
                <div class="noteAvis">
                    <h4 class="titreNoteAvis">
                        <?php
                        $noteMoy = $note['noteMoy'];
                        echo "$noteMoy/4";
                        ?>
                    </h4>
                    <p class="pNoteAvis">
                        <?php
                        $etoiles = $note['noteEtoiles'];
                        echo "$etoiles";
                        ?>
                    </p>
                    <p class="pNoteNbAvis">
                        <?php
                        echo "$nbNote avis";
                        ?>
                    </p>
                </div>
            </div>

            <div class="divAvisClient">
                <?php
                DetailProduitController::affichageCommentaire($produit);

                ?>
            </div>
        </div>
</body>

@endsection