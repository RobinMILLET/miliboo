@extends('layouts.app')

@section('title', $produit->nomproduit)

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('css/produit.css')}}" />
@endsection

@section('content')


<div class="product-detail">
    <h1>{{ $produit->nomproduit }}</h1>
</div>


<body>

    <script src="{{asset('js/detailProduit.js')}}" defer></script>
    <div class="divProduit">
        <div class="columnsProduit">
            <div class="colImagesProduit">
                <?php

                use App\Http\Controllers\DetailProduitController;

                $colorDispos = $colorationsDispos;
                $colorationProduit = $colorationChoisie;
                $colorationPrincipale = DetailProduitController::defColorationPrincipale($colorationChoisie);

                $consultationActuelle = array("coloration" => $colorationPrincipale);
                if(!in_array($consultationActuelle, $_SESSION['historiqueConsultation'])) {
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

                        <div id="div-button-panier">
                            <button id='minusOne' class='button-quantite' disabled onclick="minusOne()">-</button>
                            <input id='quant' class='input-quantite' type="text" value="1" onchange='verif(<?php echo $colorationChoisie->quantitestock ?>)'></input>
                            <button id='plusOne' class='button-quantite' onclick='plusOne(<?php echo $colorationChoisie->quantitestock ?>)'>+</button>
                            <button id="button-achete" onclick='achete(
                            <?php
                            echo $colorationChoisie->idproduit;
                            echo ",";
                            echo $colorationChoisie->idcouleur;
                            ?>)'>J'achète</button>
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
                <div id="imagePreview" class="elementPreview">
                    <span class="closePreview" onclick="closePreview()">&times;</span>
                    <img class="contentPreview" id="previewImage">
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