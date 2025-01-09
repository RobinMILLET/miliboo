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
       $botman->hears('.*problème.*chargement.*|chargement.*page.*',
      function (BotMan $bot) {
       $response = "Je suis désolé d'entendre que vous rencontrez des problèmes de chargement de pages. Voici quelques suggestions :
       <br> 1. Assurez-vous d'avoir une connexion Internet stable.
       <br> 2. Essayez de rafraîchir la page.
       <br> 3. Vérifiez si d'autres navigateurs ou appareils
      fonctionnent correctement.";
      
       $bot->reply($response);
       });
       $botman->hears('.*problème.*navigation.*|navigation.*|naviguer.*|naviguez.*',
      function (BotMan $bot) {
       $response = "Si vous avez des problèmes de navigation, essayez ceci :
       <br>1. Vérifiez le menu de navigation principal.
       <br>2. Essayez de vider le cache de votre navigateur.";
       $bot->reply($response);
       });


       $botman->hears('.delais*.livraison.*|livraison.*|livrer.*',
      function (BotMan $bot){
         $response= 'Nos delais de livraison son compris principalement entre 24 et 72 heures
         selon la disponibilité de nos stocks et la zone géographique de livraison.
         Les frais de port sont toujours offets.
         Vous pouvez consulter notre page de livraison pour plus d\'informations.';
      $bot->reply($response);
      });


      $botman->hears('.suivie*.commande.*|voir.*mes*.commande.*|commande.*',
      function (BotMan $bot){
         $response= 'Vos commandes en cours son disponible dans votre l\'espace client,
         Vous trouverez vos commandes passer dans l\'ongles "Voir mes commandes" de votre espace client.';
      $bot->reply($response);
      });


      $botman->hears('.retour*.produit.*|contentieux.*|retourner.*produit.*',
      function (BotMan $bot){
         $response= 'Nous possédons un service de contentieux pour le retour de vos produits (dans un delais de 31 jours
         conformément au lois Européenne, vous pouvez contacter le service en cas de besoin au 01 23 45 67 89.';
      $bot->reply($response);
      });


      $botman->hears('.meuble.*assemblé.*|monter.*',
      function (BotMan $bot){
         $response= 'Nos meubles sont livrée désasembler pour facilité le transport,
         certain meuble encombrant peuvent être livrée pré-monter, en général la notice de montage est fournie avec le produit.
         Cependant vous pouvez les retrouvers sur la fiche du produit';
      $bot->reply($response);
      });


      $botman->hears('.article.*promotion.*|promotion.*|promo.*',
      function (BotMan $bot){
         $response= 'Nous possédons un regroupement "Promotion" en dessous de la barre de recherche, elle vous permet de retrouver nos articles en promotion.';
      $bot->reply($response);
      });


      $botman->hears('.article.*aimer.*|aimer.*|produit.*aimer.*|like.*|liker.*|produit.*liker.*|produit.*like.*',
      function (BotMan $bot){
         $response= 'Les produit que vous avez aimer se retrouve dans votre espace client, onglet "Mes Produits aimés"';
      $bot->reply($response);
      });


      $botman->hears('paiement.*virement.*|carte.*bancaire.*|paypal.*|paiement.*|virement.*|reglement.*commande.*|regler.*commande.*',
      function (BotMan $bot){
         $response= 'Vous pouvez règler vos commandes avec les type de payement suivant : 
         <br>Par Virement jusqu\'à 4 fois, 
         <br>Avec une Carte Bancaire,
         <br>Ou avec PayPal.';
      $bot->reply($response);
      });


      $botman->hears('donnée.*personnel.*|donnee.*|rgpd.*|traitement.*|donnée.*',
      function (BotMan $bot){
         $response= 'Si vous avez des questions sur la façons dont nous traitons vos données,
         vous retrouverez notre Politique de protection des données personnelles en bas de la page.
         <br>Vous pouvez également contacter notre service de support à l\'adresse suivante : support@monsite.com';
      $bot->reply($response);
      });
      $botman->listen();
   }
}

      

