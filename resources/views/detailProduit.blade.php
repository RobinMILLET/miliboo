@extends('layouts.app')

@section('title', $produit->nomproduit)

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('css/produit.css')}}" />
<link rel="stylesheet" href="{{ asset('css/deposeavis.css') }}">
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')

@include('partials.deposeavis')

<body>

    <script src="{{asset('js/detailProduit.js')}}" defer></script>
    <script src="{{asset('js/panier.js')}}" defer></script>
    <div class="divProduit">
        <div class="columnsProduit">
            <div class="colImagesProduit">
                <?php

                use App\Http\Controllers\DetailProduitController;

                $colorDispos = $colorationsDispos;
                $colorationProduit = $colorationChoisie;
                $colorationPrincipale = DetailProduitController::defColorationPrincipale($colorationChoisie);

                $consultationActuelle = array("coloration" => $colorationPrincipale);
                if (!in_array($consultationActuelle, $_SESSION['historiqueConsultation'])) {
                    array_unshift($_SESSION['historiqueConsultation'], $consultationActuelle);
                }
                $_SESSION['historiqueConsultation'] = array_slice($_SESSION['historiqueConsultation'], 0, 10);
                // Stockage dans les cookies pour garder l'historique apres fermeture session
                //setcookie('cookieDernieresConsultations', json_encode($_SESSION['historiqueConsultation']), time() + $cookieDuration, '/')

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

                <details id="aspectTechProduit" class="aspectTechAccordion">
                    <summary class="titreDescAccordion">
                        Aspect Technique
                        <span class="flecheAccordionDesc">^</span>
                    </summary>
                    <p class="pProduitAspectTech">
                        <?php
                        DetailProduitController::getAspectTechnique($produit);
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
                    <a class="aDescDetail show-detail" href="#descProduit">
                        Description détaillée<img class="imgAide" src="{{ asset('img/question.png') }}">
                        <p class="p-detail right">Cliquez pour obtenir une descripton détaillée du produit</p>
                    </a>


                    <div class="divNoteProduit">
                        <?php
                        $note = DetailProduitController::getNoteProduit($produit);
                        $noteEtoile = $note['noteEtoiles'];
                        $nbNote = $note['nbAvis'] ? $note['nbAvis'] : "";
                        echo "<a class='aNoteUser show-detail' href='#divAvis'> $noteEtoile $nbNote";
                        echo "<img class='imgAide' src='" .asset('img/question.png') . "'>";
                        echo "<p class='p-detail right'>Cliquez pour accéder aux avis du produit</p></a>";
                        ?>
                    </div>
                    <div class="divColoris">
                        <div class="show-detail" style="width:fit-content">
                        <p class="pColoris"> Colori(s) disponible(s)<img class="imgAide" src="{{ asset('img/question.png') }}"></p>
                        <p class="p-detail right" style='left:100%'>Sélectionnez le coloris souhaité</p></div>
                        <div class="divListColoris">

                            <?php
                            foreach ($produit->getColoration() as $coloration) {
                                $couleur = $coloration->getCouleur();
                                $urlColoration = route('produit.show', ['id' => $produit->idproduit, 'idcoloration' => $coloration->idcouleur]);

                                echo "<a href='$urlColoration' class='carreCouleur' style='background-color: #$couleur->rgbcouleur;' title='$couleur->nomcouleur $couleur->idcouleur'></a>";
                            }
                            ?>

                        </div>

                        <div class="divPrixProduit">
                            <?php
                            DetailProduitController::affichagePrix($colorationPrincipale);
                            ?>
                        </div>
                        <div class="divStockRestant">
                            <?php
                            $qteStock = $colorationChoisie->quantitestock;
                            switch ($qteStock) {
                                case 0:
                                    echo "<p class=\"infer10stock\">Rupture de stock!</p>";
                                    break;
                                case 1:
                                    echo "<p class=\"infer10stock\">Il ne reste qu'un seul exemplaire !</p>";
                                    break;
                                case ($qteStock < 10):
                                    echo "<p class=\"infer10stock\">Il ne reste que $colorationChoisie->quantitestock exemplaires !</p>";
                                    break;
                                default:
                                    echo "<p class=\"super10stock\"><B>Cette article est en stock</B></p>";
                                    break;
                            }


                            //   ______          _                        __      _                      
                            //   |  ____|        | |                      / _|    (_)                     
                            //   | |__ __ _ _   _| |_   _ __   __ _ ___  | |_ __ _ _ _ __ ___    ___ __ _ 
                            //   |  __/ _` | | | | __| | '_ \ / _` / __| |  _/ _` | | '__/ _ \  / __/ _` |
                            //   | | | (_| | |_| | |_  | |_) | (_| \__ \ | || (_| | | | |  __/ | (_| (_| |
                            //   |_|  \__,_|\__,_|\__| | .__/ \__,_|___/ |_| \__,_|_|_|  \___|  \___\__,_|
                            //                         | |                                                
                            //                         |_|                                                

                            // if ($colorationChoisie->quantitestock == 1) {
                            //     echo "<br><p class=\"infer10stock\">Il ne reste qu'un seul exemplaire !</p><br>";
                            // } else {
                            //     if ($colorationChoisie->quantitestock == 0) {
                            //         echo "<br><p class=\"infer10stock\">Il ne reste que un seul exemplaire !</p><br>";
                            //     } else {
                            //         if ($colorationChoisie->quantitestock < 10) {
                            //             echo "<br><p class=\"infer10stock\">Il ne reste que $colorationChoisie->quantitestock exemplaires !</p><br>";
                            //         } else {
                            //             echo "<br><p class=\"super10stock\"><B>Cette article est en stock</B></p><br>";
                            //         }
                            //     }
                            // }
                            ?>

                        </div>
                        <div id="div-button-panier">
                            <div>
                                <?php
                                $stock = $colorationChoisie->quantitestock;
                                $disablePlus = $stock <= 1 ? " disabled" : "";
                                $disabled = $stock <= 0 ? " disabled" : "";
                                $start = $stock >= 1 ? 1 : 0;
                                ?>
                                <button id='minusOne' class='button-quantite' disabled onclick="minusOne()">-</button>
                                <input id='quant' class='input-quantite' type="text" value="{{$start}}" onchange='verif(<?php echo $stock ?>)'></input>
                                <button id='plusOne' class='button-quantite' onclick='plusOne(<?php echo $stock ?>)' {{$disablePlus}}>+</button>
                            </div>
                            <button id="button-achete" onclick='achete(
                            <?php
                            echo $colorationChoisie->idproduit;
                            echo ",";
                            echo $colorationChoisie->idcouleur;
                            ?>)' {{$disabled}}>J'achète</button>
                            
                            <div class="show-detail">
                                <img id="img-like" src="{{ $isLiked ? asset('img/coeur-like.png') : asset('img/coeur.png') }}" data-liked="{{ $isLiked ? 'true' : 'false' }}" data-idproduit="{{ $produit->idproduit }}" alt="">
                                <p class="p-detail bottom">Cliquez pour ajouter à vos favoris</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="divAvis" id="divAvis">
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
                <div id="imagePreview" class="elementPreview">
                    <span class="closePreview" onclick="closePreview()">&times;</span>
                    <img class="contentPreview" id="previewImage">
                </div>

                <div class="ajouterAvis">
                    <?php
                    DetailProduitController::affichageDeposerAvis($produit);
                    ?>
                </div>
            </div>
        </div>

        <div class="divListeProduits marge">

            <div class="divProduitsSimilaire">
            
            <?php


                $lesProduitsSimilaire = DetailProduitController::getProduitsSimilaire($produit);
                DetailProduitController::affichageProduitsSimilaire($lesProduitsSimilaire);

                ?>
            </div>

            <div class="divProduitsAimes">
                <?php
                $topProduits = DetailProduitController::getProduitsLikes($produit);
                DetailProduitController::affichageTopProduitsLikes($topProduits);
                ?>
            </div>

            <div class="divProduitsConsultes">
                <?php
                $sessionHistorique = $_SESSION['historiqueConsultation'];
                $produitsConsultes = DetailProduitController::getProduitsConsultes($sessionHistorique);
                DetailProduitController::affichageProduitsConsultes($produitsConsultes);
                ?>
            </div>
        </div>
</body>

@endsection