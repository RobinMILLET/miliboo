@extends('layouts.app')

@section('title', 'Paiement')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('css/paiement.css')}}" />
@endsection

@section('content')

<div class="div-input">
            <form id="form-carte" method="POST" action="{{ route('paieNouvCB') }}">
            @csrf
                <input name="nom" class="input" type="text" placeholder="Nom de la carte bancaire (requis pour sauvegarder)">
                <input name="num" class="input" type="text" placeholder="0000-0000-0000-0000*" onchange="validate(this, 16, true)" required>
                <p id="p-title-expiration">Expiration</p>
                <div id="div-expiration">
                    <input name="mois" class="input" type="text" placeholder="Mois d'expiration (deux chiffres)*" maxlength="2" onchange="validate(this, 2)" required>
                    <input name="an" class="input" type="text" placeholder="Année d'expiration (deux chiffres)*" maxlength="2" onchange="validate(this, 2)" required>
                </div>
                <input name="crypt" class="input" type="text" placeholder="Cryptogramme visuel (3 chiffres)* (non conservé)" maxlength="3" onchange="validate(this, 3)" required>
                <p class="p-obligatoire">* obligatoire</p>

                <div id="div-sace-info">
                    <input name="save" type="checkbox" class="input-check" id="checkbox-save" name="checkbox-save">
                    <label for="checkbox-save">Sauvegarder les coordonnées bancaire</label>
                </div>
                <script src="https://js.stripe.com/v3/"></script>
                <script>
                    var stripe = Stripe("{{ config('services.stripe.key') }}");
                    var elements = stripe.elements();
                    var cardElement = elements.create('card');
                    cardElement.mount('.input');

                    var form = document.getElementById('form-carte');
                    form.addEventListener('submit', function(event) {
                        event.preventDefault();

                        stripe.createPaymentMethod({
                            type: 'card',
                            card: cardElement,
                        }).then(function(result) {
                            if (result.error) {
                                var errorElement = document.getElementById('card-errors');
                                errorElement.textContent = result.error.message;
                            } else {
                                // Ajoutez le PaymentMethod ID au formulaire
                                var hiddenInput = document.createElement('input');
                                hiddenInput.setAttribute('type', 'hidden');
                                hiddenInput.setAttribute('name', 'pay   ment_method');
                                hiddenInput.setAttribute('value', result.paymentMethod.id);
                                form.appendChild(hiddenInput);

                                // Soumettez le formulaire
                                form.submit();
                            }
                        });
                    });
                </script>
                <button id="submit" type="submit" class="button">Valider</button>
            </form>
        </div>

@endsection