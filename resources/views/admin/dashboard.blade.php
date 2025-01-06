@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('css')
<link rel="stylesheet" href="{{ asset('css/adminDashboard.css') }}">
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection


@section('content')
<body>
    <script src="{{asset('js/adminDashboard.js')}}" defer></script>

    <div class="admin-dashboard">
        <h1>Tableau de bord services Miliboo</h1>
        <div class="tabs">
            @if($_SESSION['admin']->idservice == 3)
                <button class="tab-button" data-tab="dpo-panel">Anonymisation</button>
            @else
                <button class="tab-button" data-tab="avis-panel">Avis</button>
                <button class="tab-button" data-tab="ajouter-produit-panel">Ajouter Produit</button>
                @if($_SESSION['admin']->idservice == 2)
                    <button class="tab-button" data-tab="directeur-panel">Directeur des ventes</button>
                @endif
            @endif
        </div>

        <div class="tab-content">
            <div id="avis-panel" class="tab-pane">
                <h2>Avis produits</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Nom Produit</th>
                            <th>Client</th>
                            <th>Note</th>
                            <th>Titre commentaire</th>
                            <th>Contenu commentaire</th>
                            <th>Reponse Miliboo</th>
                            <th>Date commentaire</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($avisData as $avis)
                        <tr>
                            <td><a href="{{ $avis['produitUrl'] }}">{{ $avis['nomProduit'] }}</a></td>
                            <td>{{ $avis['clientNom'] }} {{ $avis['clientPrenom'] }}</td>
                            <td>{{ $avis['note'] }} / 4</td>
                            <td>{{ $avis['titre'] }}</td>
                            <td>{{ $avis['commentaire'] }}</td>
                            <td>{{ $avis['reponse'] }}</td>
                            <td>{{ $avis['date'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div id="ajouter-produit-panel" class="tab-pane">
                <h2>Ajouter un nouveau produit</h2>
                <form id="ajouter-produit-form" action="{{ route('admin.ajouter.produit') }}" method="POST" enctype="multipart/form-data">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="form-group">
                        <label for="nom-produit">Nom produit</label>
                        <input type="text" id="nom-produit" name="nomProduit" required>
                    </div>

                    <div class="form-group">
                        <label for="idTypeProduit">Type de produit</label>
                        <select id="idTypeProduit" name="idTypeProduit" required>
                            @foreach($typesProduit as $type)
                            <option value="{{ $type->idtypeproduit }}">{{ $type->nomtypeproduit }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="idPays">Pays de fabrication</label>
                        <select id="idPays" name="idPays" required>
                            @foreach($pays as $paysItem)
                            <option value="{{ $paysItem->idpays }}">{{ $paysItem->nompays }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="sourceNotice">Notice (PDF)</label>
                        <input type="file" id="sourceNotice" name="sourceNotice" accept="application/pdf">
                    </div>

                    <div class="form-group">
                        <label for="sourceAspectTechnique">Aspect technique (TXT)</label>
                        <input type="file" id="sourceAspectTechnique" name="sourceAspectTechnique" accept="text/plain">
                    </div>

                    <div class="form-group">
                        <label for="delaiLivraison">Délai de livraison (heures)</label>
                        <input type="number" id="delaiLivraison" name="delaiLivraison" required>
                    </div>

                    <!-- <div class="form-group">
                        <label for="coutLivraison">Coût de livraison</label>
                        <input type="number" id="coutLivraison" name="coutLivraison" step="0.01" required>
                    </div>

                    <div class="form-group">
                        <label for="nbPaiementMax">Nombre de paiements maximum</label>
                        <input type="number" id="nbPaiementMax" name="nbPaiementMax" required>
                    </div> -->

                    <!-- Colorations -->
                    <div id="colorations-section">
                        <h3>Colorations</h3>

                        <div class="coloration-group">
                            <div class="form-group">
                                <label for="couleur-1">Couleur</label>
                                <select class="couleur-select" name="colorations[0][idCouleur]" required>
                                    @foreach($couleurs as $couleur)
                                    <option value="{{ $couleur->idcouleur }}">{{ $couleur->nomcouleur }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- <div class="form-group">
                                <label for="prixVente-1">Prix de vente</label>
                                <input type="number" class="prixVente" name="colorations[0][prixVente]" step="0.01" required>
                            </div>

                            <div class="form-group">
                                <label for="prixSolde-1">Prix soldé (optionnel)</label>
                                <input type="number" class="prixSolde" name="colorations[0][prixSolde]" step="0.01">
                            </div> -->

                            <div class="form-group">
                                <label for="quantiteStock-1">Quantité en stock</label>
                                <input type="number" class="quantiteStock" name="colorations[0][quantiteStock]" required>
                            </div>

                            <div class="form-group">
                                <label for="descriptionColoration-1">Description</label>
                                <textarea class="descriptionColoration" name="colorations[0][descriptionColoration]"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="photos-1">Photos</label>
                                <input type="file" class="photos" id="photos-1" name="colorations[0][photos][]" multiple accept="image/*">
                                <div id="image-preview-container-0" class="image-preview-container" style="display: flex; gap: 10px; margin-top: 10px;"></div>
                            </div>


                        </div>
                    </div>

                    <button type="button" id="add-coloration">Ajouter une coloration</button>
                    <button type="submit">Ajouter produit</button>

                </form>
            </div>

            <div id="directeur-panel" class="tab-pane">
                <h2>Directeur des ventes</h2>
                <table id="directeur-table">
                    <thead>
                        <tr>
                            <th>Nom produit</th>
                            <th>Prix</th>
                            <th>Prix solde</th>
                            <th>Nombre paiement max</th>
                            <th>Cout livraison</th>
                            <th>Est visible ?</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="directeur-table-body">

                    </tbody>
                </table>
            </div>

            <div id="dpo-panel" class="tab-pane">
                <h2>Directeur des ventes</h2>
                <table id="dpo-table">
                    <thead>
                        <tr>
                            <th>Nom client</th>
                            <th>Prénom client</th>
                            <th>Date de création</th>
                            <th>Nombre paiement max</th>
                            <th>Cout livraison</th>
                            <th>Est visible ?</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="directeur-table-body">

                    </tbody>
                </table>
            </div> 

        </div>
    </div>
    <div id="colorations-data" data-couleurs='@json($couleurs)'></div>
    <script>
        console.log('CSRF Token:', '{{ csrf_token() }}');
    </script>



</body>
@endsection