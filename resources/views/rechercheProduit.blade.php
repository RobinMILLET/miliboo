@extends('layouts.app')
@section('title', 'Recherche')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('css/recherche.css')}}"/>  
@endsection
@section('content')
        <script type="text/javascript">
            // Récupère le GET et le transfère en variable globale dans l'environnement JS
            var $_GET = <?php
                use App\Http\Controllers\RechercheController;
                echo json_encode($_GET); 
            ?>;
        </script>
        <script src="{{asset('js/recherche.js')}}" defer></script>
        <section id="top">
            <?php
            $typeProduit = $typeProduit ?? null;
            $valeursActives = [];
            $valeursPossibles = [];
            if($typeProduit) {
                $attributs = $typeProduit->getAttributProduit();
                if (array_key_exists("filtres", $_GET)) {
                    $filtres = explode(" ", $_GET["filtres"]);
                }
                else $filtres = [];
                //Affichage categorie

                $categorie = $typeProduit->getCategorie();

                $nomCategorie = $categorie->nomcategorie;
                $descriptionCategorie = $categorie->descriptioncategorie;
                
                echo "<div class='headerCategorie'>";
                echo "<h1>$nomCategorie</h1>";
                echo "<p>$descriptionCategorie</p>";
                echo "</div>";
                
            }

            if ($typeProduit && $attributs->count()) {
                $idCount = 0; // On attribue un 'id' temporaire au filtre pour le reconnaitre depuis le GET
                echo "<section id='filtres'><ul class='ul-filtres'>";
                foreach ($attributs as $attribut) {
                    echo "<li class='li-nom-filtre'><h3>".$attribut->nomattribut."</h3><div class='div-select-filtre'>";
                    foreach ($attribut->getValeurAttribut() as $valeur) {
                        // Si la valeur a déjà été utilisée, on ne créer pas de doublons
                        if (in_array($valeur->idattribut, array_keys($valeursPossibles))) {
                            if (in_array($valeur->valeur, $valeursPossibles[$valeur->idattribut])) continue;
                        }
                        $valeursPossibles[$valeur->idattribut][] = $valeur->valeur;
                        // Si checké, insertion dans les valeurs à vérifier
                        if (in_array($idCount, $filtres)) {
                            if (!isset($valeursActives[$valeur->idattribut])) {
                                $valeursActives[$valeur->idattribut] = [];
                            }
                            $valeursActives[$valeur->idattribut][] = $valeur->valeur;
                        }
                        // Si l'idTemp de valeur est dans filtres, la case est pré-cochée
                        $checked = in_array($idCount, $filtres) ? " checked": "";
                        echo "<div class='div-container'><input class='checkbox-filtre' type='checkbox' id='filtre$idCount' onchange='filtre(this,$idCount)' autocomplete='off'$checked>";
                        echo "<label for='filtre$idCount' class='nom-filtre'>".$valeur->valeur."</label></div>";
                        $idCount++;
                    }
                    echo "</div></li>";
                }
                echo "<input id='button-valide' type='button' value='Valider' onclick='apply()'></ul></section>";
                $produits = RechercheController::filtre($produits, $valeursActives);
            }
            ?>
        <section id="mid">
            <div class='show-detail'>
            <p class="left"><b id="count">{{ count($produits) }}</b> produit(s)<img class="imgAide" src="{{ asset('img/question.png') }}"></p>
            <p class='p-detail right' style="top:0;transform:translateX(50px)">Nombre de produits renvoyés par la recherche et les filtres</p>
            </div>
            <select onchange="setGet('tri',this.value,true)" class="right">
                <option value="">Trier par:</option>
                <option value="nom">Alphabétique</option>
                <option value="min">Prix croissant</option>
                <option value="max">Prix décroissant</option>
            </select>
        </section>

        <section id="recherche">
            <grid class="grid">
                <?php 
                    // Si tri est null ou pas max, trier par prixMin
                    $triMin = (($_GET["tri"] ?? "nom") != "max");
                    foreach ($produits as $produit) {
                        echo $produit->afficheRecherche($triMin);
                    }
                ?>
            </grid>
        </section>
@endsection