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

                use App\Models\Produit;

                $colorationPrincipale = $produit->colorationPrixMin();
                // dd($colorationPrincipale);
                //var_dump($colorationPrincipale->getPhotos());
                // Récupération d'une photo
                foreach ($colorationPrincipale->getPhotos() as $photo) {
                    if ($photo) {
                        $source = $photo->sourcephoto;
                        $description = $photo->descriptionphoto;
                    } // Si pas de photo, on prend la photo par défaut
                    else {
                        $source = "PLACEHOLDER.png";
                        $description = "Non";
                    }
                    $source = '\\img\\' . $source;
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
                 
                <details id="descProduit" class="descProduitAccordion">
                    <summary class="titreDescAccordion">
                        Description
                        <span class="flecheAccordionDesc">^</span>
                    </summary>
                    <p  class="pProduitDesc">
                        <?php
                        echo $colorationPrincipale->descriptioncoloration;
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
                    if ($colorationPrincipale->prixsolde) {
                        echo "<h2 class='h2Promotion' style=background-color: black; text-color: white;>Promotion</h2>";
                    }
                    ?>

                    <a class="aDescDetail" href="#descProduit">
                        Description détaillée
                    </a>

                    <div class="divNoteProduit">
                        <?php
                        $note = $produit->affficheNote();
                        $noteEtoile = $note['noteEtoiles'];
                        $nbNote = $note['nbAvis'];
                        echo "$noteEtoile $nbNote";

                        ?>
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

                        <div class="divPrixProduit">
                            <?php
                            if ($colorationPrincipale->prixsolde) {
                                echo "<p class='pPrixSoldeProduit'> $colorationPrincipale->prixsolde €</p>";
                                echo "<p class=pPrixVenteProduit' style=text-decoration-line:line-through;> $colorationPrincipale->prixvente €</p>";
                            } else {
                                echo "<p class=pPrixVenteProduit'> $colorationPrincipale->prixvente €</p>";
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
                <?php
                    $photos = ($colorationPrincipale->getPhotos());
                    $photoAvis = current($photos);
                    if ($photoAvis) {
                        $sourceAvis = $photoAvis->sourcephoto;
                    }
                    else {
                        $sourceAvis = "PLACEHOLDER.png";
                    }
                    $sourceAvis = '\\img\\' . $source;
                    echo "<img class='imgHeaderAvis' src='$source'>";

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
                $listAvis = $produit->getAvis();
                foreach ($listAvis as $avis) {
                    echo "<div class='divCommentaireClient'>";

                    echo "<div class='divClient'>";
                    echo "<p class='nomClient'> Id client temporaire: $avis->idclient</p>";
                    //A METTRE EN ETOILES
                    echo "<p class='noteClient'> $avis->noteavis/4</p>";
                    echo "</div>"; //FIN DIV CLIENT

                    echo "<div class='divCommentaire'>";
                    if ($avis->commentaireavis) {
                        echo "<h4 class='titreCommentaire'> $avis->commentaireavis </h4>";
                        echo "<div class='contentCommentaire'> $avis->commentaireavis </div>";
                    }
                    echo "</div>"; //FIN DIV COMMENTAIRE

                    echo "<div class='timestampAvis'>";
                    echo "<span class='timestampAvis'> $avis->dateavis </span>";
                    echo "</div>"; //FIN DIV TIMESTAMPAVIS

                    echo "</div>"; //FIN DIV COMMENTAIRECLIENT
                }
                ?>
            </div>
        </div>
</body>

@endsection