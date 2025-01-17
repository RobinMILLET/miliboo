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
            @elseif($_SESSION['admin']->idservice == 4)
                <button class="tab-button" data-tab="expedition-panel">Expedition</button>
                <button class="tab-button" data-tab="livraison-panel">Livraison</button>
            @else
                <button class="tab-button" data-tab="avis-panel">Avis</button>
                <button class="tab-button" data-tab="ajouter-produit-panel">Ajouter Produit</button>
                <button class="tab-button" data-tab="directeur-panel">Modification Produit</button>
            @endif
            <button class="tab-button" data-tab="metrics-panel">Métriques</button>
            <a href="/pulse" class="tab-button pulse" target="_blank">Pulse Dashboard</a>
            <a href="/logoutAdmin" class="logout-btn">Se déconnecter</a>
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
                        
                    </tbody>
                </table>
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
            
            @if($_SESSION['admin']->idservice == 3)
                <div id="dpo-panel" class="tab-pane active">
            @else
                <div id="dpo-panel" class="tab-pane">
            @endif
                <h2>Délégué à la protection des données</h2>
                <form method="GET" action="{{ route('admin.dashboard') }}">
                    <label for="filter_date">Afficher les clients avant :</label>
                    <input type="date" name="filter_date" id="filter_date" value="{{ request('filter_date') }}">
                    <button type="submit">Filtrer</button>
                </form>
                <table id="dpo-table">
                    <thead>
                        <tr>
                            <th>Nom client</th>
                            <th>Prénom client</th>
                            <th>Date de création</th>
                            <th>Dernière utilisation</th>
                            <th>Anonymiser</th>
                        </tr>
                    </thead>
                    <tbody id="dpo-table-body">
                        @foreach ($clients as $client)
                            <tr>
                                <td>{{ $client->nomclient }}</td>
                                <td>{{ $client->prenomclient }}</td>
                                <td>{{ date('d/m/Y', strtotime($client->derniereutilisation)) }}</td>
                                <td>{{ date('d/m/Y', strtotime($client->derniereutilisation)) }}</td>
                                <td><button type="button" id="anonymiser-client" data-client-id="{{ $client->idclient }}"
                                    onclick="window.location.href='/anonym/{{$client->idclient}}'">Anonymiser</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div> 

            <div id="expedition-panel" class="tab-pane">
                <h2>Avertir les clients</h2>
                <table>
                <thead>
                    <tr>
                        <th>Nom client</th>
                        <th>Prénom client</th>
                        <th>Numéro de commande</th>
                        <th>Status de commande</th>
                        <th>Avertir de l'expedition</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($commandesStatut as $commande)
                            <tr>
                                <td>{{ $commande->getClient()->nomclient }}</td>
                                <td>{{ $commande->getClient()->prenomclient }}</td>
                                <td>{{ $commande->idcommande }}</td>
                                <td>{{ $commande->getStatut()->nomstatut }}</td>
                                <td><a href="{{ route('expedie', $commande->idcommande)}}"><button type="button" id="avertir-client" data-client-id="{{ $commande->idcommande }}">Expédier</button></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            @if (request('filtreTransporteur'))
                <div id="livraison-panel" class="tab-pane active">
            @else
            <div id="livraison-panel" class="tab-pane">
            @endif
                <h2>Consulter les commandes à livrer</h2>
                <form method="GET" action="{{ route('admin.dashboard') }}">
                    <label for="filtreTransporteur">Filtrer par :</label>
                    <select name="filtreTransporteur" id="filtreTransporteur">
                        <option value="">-- Choisir une option --</option>
                        <option value="tout" {{ request('filtreTransporteur') == 'tout' ? 'selected' : '' }}>Tout les transporteur</option>
                        <option value="domicile" {{ request('filtreTransporteur') == 'domicile' ? 'selected' : '' }}>Transport à domicile</option>
                        <option value="autre" {{ request('filtreTransporteur') == 'autre' ? 'selected' : '' }}>Autre transporteur</option>
                    </select>
                    <button type="submit">Filtrer</button>
                </form>
                <table>
                    <thead>
                        <tr>
                            <th>Nom client</th>
                            <th>Prénom client</th>
                            <th>Numéro de commande</th>
                            <th>Transporteur</th>
                            <th>Coût</th>
                            <th>Date de la commande</th>
                            <th>Livraison estimée</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        use App\Http\Controllers\AdminDashboardController;
                        ?>
                        @foreach ($commandes as $commande)
                            <tr>
                                <td>{{ $commande->getClient()->nomclient }}</td>
                                <td>{{ $commande->getClient()->prenomclient }}</td>
                                <td>{{ $commande->idcommande }}</td>
                                <td>{{ $commande->getTransporteur()->nomtransporteur }}</td>
                                <td>{{ number_format(AdminDashboardController::calculPrixCommande($commande), 2, ',', ' ') }}€</td>
                                <td>{{ date('d/m/y', strtotime($commande->datecommande)) }}</td>
                                <td>{{ date('d/m/y H:i', strtotime(htmlspecialchars(AdminDashboardController::getDelai($commande)->format('Y-m-d H:i:s')))) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div id="metrics-panel" class="tab-pane">
            <h2>Métriques de Performance</h2>
            
            @if(isset($benchmarks))
            <div class="card">
                <div class="card-header">
                    <h3>Performances Générales</h3>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Opération</th>
                                <th>Temps (ms)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($benchmarks as $operation => $time)
                            <tr>
                                <td>{{ $operation }}</td>
                                <td>{{ number_format($time, 2) }} ms</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endif

            @if(isset($commandesMetrics))
            <div class="card mt-4">
                <div class="card-header">
                    <h3>Analyse Détaillée des Commandes</h3>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Opération</th>
                                <th>Détails</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($commandesMetrics as $operation => $metric)
                                <tr>
                                    <td>{{ $operation }}</td>
                                    <td>
                                        @if(is_array($metric))
                                            <ul class="list-unstyled">
                                                <li>Nombre total de commandes: {{ $metric['total'] }}</li>
                                                <li>Commandes traitées: {{ $metric['processed'] }}</li>
                                                <li>Temps de calcul moyen: {{ $metric['avg_delay_calc'] }} ms</li>
                                                <li>Temps de calcul minimum: {{ $metric['min_delay_calc'] }} ms</li>
                                                <li>Temps de calcul maximum: {{ $metric['max_delay_calc'] }} ms</li>
                                            </ul>
                                        @else
                                            {{ number_format($metric, 2) }} ms
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endif
        </div>
        </div>
    </div>

    <div id="colorations-data" data-couleurs='@json($couleurs)'></div>
    <script>
        console.log('CSRF Token:', '{{ csrf_token() }}');
    </script>



</body>
@endsection