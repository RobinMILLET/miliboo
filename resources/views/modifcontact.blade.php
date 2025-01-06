@extends('layouts.moncompte')

@section('title', 'Modification des contacts')

@section('css-compte')
<link rel="stylesheet" type="text/css" href="{{asset('css/modifmdp.css')}}" />
@endsection

@section('content-compte')
<div id="container-modif-mdp">
    <h3 id="title-modif-mdp">Changer mes informations de contact</h3>
    <form method="POST" action="/modMail" id="form">
    @csrf
        <div id="div-input">
            <input name="email" class="input" type="mail" placeholder="Votre adresse mail" required value="{{$_SESSION['client']->emailclient}}">
        </div>
        <br>
        <div id="div-newsletters">
            <div class="newsletters-info">
                <input name="ckNewsletter" class="input-newsletters" id="checkbox-miliboo" type="checkbox" <?php

use App\Http\Controllers\ModifContactController;

 echo $_SESSION['client']->newslettermiliboo ? "checked" : "" ?>>
                <label class="label-newsletters" for="checkbox-miliboo">Je souhaite recevoir la newsletter de miliboo.com (Réductions, Nouveautés, Avant premières...).</label>
            </div>
            <br>
            <div class="newsletters-info">
                <input name="ckPartenaires" class="input-newsletters" id="checkbox-partenaire" type="checkbox" <?php echo $_SESSION['client']->newsletterpartenaires ? "checked" : "" ?>>
                <label class="label-newsletters" for="checkbox-partenaire">J'accepte de recevoir les newsletters des partenaires de Miliboo.com</label>
            </div>
        </div>

        <button type="submit" id="button-valide">Valider</button>
    </form>
</div>
<form method="POST" action="/sendVerifMail" id="form">
@csrf
    <h3>Vérification de l'adresse mail</h3>
    <?php ModifContactController::getBladeVerifMail() ?>
</form>
    <h3>Vérification du numéro de téléphone</h3>
<form method='POST' action='/sendVerifTel' id='form' style='display:inline'>
@csrf
    <?php ModifContactController::getBladeSendTel() ?>
</form><form method='POST' action='/verifTel' id='form' style='display:inline'>
@csrf
    <?php ModifContactController::getBladeVerifTel() ?>
</form>

<?php
if (session()->get('error')=="token") {
    echo "<script>alert('Lien de vérification invalide ou expiré.')</script>";
}
else if (session()->get('token')) {
    echo "<script>alert('Envoi de SMS uniquement disponible avec paiement.".
    "\\nCode de validation : ".session()->get('token')."')</script>";
}
?>
@endsection