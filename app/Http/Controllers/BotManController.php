<?php
namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use BotMan\BotMan\Messages\Incoming\Answer;


class BotManController extends Controller
{

 public function handle()
   {
       $botman = app('botman');
       $botman->hears('.*problème.*chargement.*|chargement.*page.*|Problèmes.*de.*chargement.*de.*page.*|chargement.*',
      function (BotMan $bot) {
       $response = "Je suis désolé d'entendre que vous rencontrez des problèmes de chargement de pages. Voici quelques suggestions :
       <br> 1. Assurez-vous d'avoir une connexion Internet stable.
       <br> 2. Essayez de rafraîchir la page.
       <br> 3. Vérifiez si d'autres navigateurs ou appareils
      fonctionnent correctement.";
      
       $bot->reply($response);
       });
       $botman->hears('.*problème.*navigation.*|navigation.*|naviguer.*|naviguez.*|Navigation.*sur.*le.* site.*',
      function (BotMan $bot) {
       $response = "Si vous avez des problèmes de navigation, essayez ceci :
       <br>1. Vérifiez le menu de navigation principal.
       <br>2. Essayez de vider le cache de votre navigateur.";
       $bot->reply($response);
       });


       $botman->hears('.delais*.livraison.*|livraison.*|livrer.*|Délais.*de.*livraison.*',
      function (BotMan $bot){
         $response= 'Nos delais de livraison sont compris principalement entre 24 et 72 heures
         selon la disponibilité de nos stocks et la zone géographique de livraison.
         Les frais de port sont toujours offerts.
         Vous pouvez consulter notre page de livraison pour plus d\'informations.';
      $bot->reply($response);
      });


      $botman->hears('.suivie*.commande.*|voir.*mes*.commande.*|commande.*|Suivi.*de.*commande.*',
      function (BotMan $bot){
         $response= 'Vos commandes en cours sont disponibles dans votre espace client,
         Vous trouverez vos commandes passée dans l\'onglet "Voir mes commandes" de votre espace client.';
      $bot->reply($response);
      });


      $botman->hears('.retour*.produit.*|contentieux.*|retourner.*produit.*|Retour.*de.*produit.*',
      function (BotMan $bot){
         $response= 'Nous possédons un service de contentieux pour le retour de vos produits dans un délais de 31 jours
         conformément aux lois européennes. Vous pouvez contacter le service en cas de besoin au 01 23 45 67 89.';
      $bot->reply($response);
      });


      $botman->hears('.meuble.*assemblé.*|monter.*|Assemblage.*de.*meubles.*',
      function (BotMan $bot){
         $response= 'Nos meubles sont livrées désasemblés pour faciliter le transport,
         certain meubles encombrant peuvent être livré pré-monté, la notice de montage est fournie avec le produit.
         Cependant vous pouvez les retrouver sur la fiche du produit';
      $bot->reply($response);
      });


      $botman->hears('.article.*promotion.*|promotion.*|promo.*|Promotions.*en.*cours.*',
      function (BotMan $bot){
         $response= 'Nous possédons un regroupement "Promotion" en dessous de la barre de recherche, elle vous permet de retrouver nos articles en promotion.';
      $bot->reply($response);
      });


      $botman->hears('.article.*aimer.*|aimer.*|produit.*aimer.*|like.*|liker.*|produit.*liker.*|produit.*like.*|Produits.*que.*vous.*aimez.*',
      function (BotMan $bot){
         $response= 'Les produits que vous avez aimés se retrouve dans votre espace client, sous l\'onglet "Mes Produits aimés"';
      $bot->reply($response);
      });


      $botman->hears('paiement.*virement.*|carte.*bancaire.*|paypal.*|paiement.*|virement.*|reglement.*commande.*|regler.*commande.*|Modes.*de.*paiement.*|payer.*',
      function (BotMan $bot){
         $response= 'Vous pouvez règler vos commandes avec les types de payement suivant : 
         <br>Par Virement jusqu\'à 4 fois, 
         <br>Avec une Carte Bancaire,
         <br>Ou avec PayPal.';
      $bot->reply($response);
      });


      $botman->hears('donnée.*personnel.*|donnee.*|rgpd.*|traitement.*|donnée.*|Traitement.*des.*données.*personnelles.*',
      function (BotMan $bot){
         $response= 'Si vous avez des questions sur la façon dont nous traitons vos données,
         vous retrouverez notre Politique de protection des données personnelles en bas de la page.
         <br>Vous pouvez également contacter notre service de support à l\'adresse suivante : s234miliboo@gmail.com';
      $bot->reply($response);
      });



      $botman->hears('support.*|contact.*|contacter.*|supports.*',
      function (BotMan $bot){
         $response= 'Si vous avez des questions sur lesquelles je ne peux vous aider
          <br>Vous pouvez également contacter notre service de support à l\'adresse suivante : s234miliboo@gmail.com';
      $bot->reply($response);
      });
      
      $botman->fallback(function (BotMan $bot) {
         $response = "Je n'ai pas bien compris votre demande. Pouvez-vous préciser ? 
         <br>Voici quelques sujets sur lesquels je peux vous aider : 
         <br>- Problèmes de chargement de page 
         <br>- Navigation sur le site 
         <br>- Délais de livraison 
         <br>- Suivi de commande 
         <br>- Retour de produit 
         <br>- Assemblage de meubles 
         <br>- Promotions en cours 
         <br>- Produits que vous aimez 
         <br>- Modes de paiement 
         <br>- Traitement des données personnelles
         <br>- Contact Support"
         ;
     
         $bot->reply($response);
     });
      
 
      $botman->listen();
   }
}

    

