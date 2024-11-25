                <!-- TODO: Fleches menus a faire -->


<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <link rel="stylesheet" type="text/css" href="{{asset('css/produit.css')}}"/>   

    </head>
    
    <body>
        <div class="divProduit">
            <div class="columnsProduit">
                <!-- Colonne images produits + menus accordions -->
                <div class="colImagesProduit">
                    <img src="img/imagesProduitTest/creep1.jpg">
                    <img src="img/imagesProduitTest/creep2.jpg">
                    <img src="img/imagesProduitTest/creep3.png">
                    <img src="img/imagesProduitTest/creep4.png">
                    <img src="img/imagesProduitTest/creep5.png">
                    <img src="img/imagesProduitTest/creep6.png">
                    <img src="img/imagesProduitTest/creep7.png">
                    <img src="img/imagesProduitTest/creep8.png">

                    <details class="descProduitAccordion">
                        <summary class="titreDescAccordion">
                            Description
                            <span class="flecheAccordionDesc">^</span> 
                        </summary>
                        <p id="description" class="pProduitDesc"> 
                            Design et sobriété : voilà qui définit parfaitement ce<strong> canapé made in France</strong> !<br /><br />D'inspiration <strong>scandinave</strong>, le <strong>canapé 3 places CREEP</strong> trouvera sa place dans de nombreux salons grâce à sa ligne épurée et ses courbes intemporelles. Son joli revêtement en polyester gris chiné apporte une touche moderne et chaleureuse à cet ensemble à la sobriété élégante. Solide et au caractère authentique, il sublime l'assise au design réussi. Le canapé CREEP est <strong>fabriqué en France</strong>, on retrouve, dans ses matériaux et sa forme élégante, la qualité et le savoir-faire français.<br /><br />Grâce à ses dimensions, ce canapé scandinave peut accueillir confortablement 3 personnes. Son assise garnie de mousse et ses coussins de dossier en font le compagnon idéal pour les instants détente dans le salon. Pour donner à la pièce un esprit scandinave chaleureux et moderne, on accompagne ce <strong>canapé 3 places</strong> d'une <a href=&quot;https://www.miliboo.com/tables-basses-bois.html&quot;><strong>table basse en bois</strong></a>.<br /><br />Ce <strong>canapé français</strong> est habillé d'un <strong>tissu déperlant</strong> qui limite l'absorption et la pénétration des taches. Les liquides glissent sur la surface du tissu et forment des gouttes que vous pourrez enlever facilement à l'aide d'un chiffon doux. <br /><br /><strong>Canapé gris clair</strong> livré prêt à monter. Coussins d'appoint inclus.<br /><br />Le colis étant volumineux, nous vous conseillons de vérifier que portes et escaliers permettent son passage."
                        </p>
                    </details>

                    <details class="descProduitEntretien">
                        <summary class="titreEntretienAccordion">
                            Entretien
                            <span class="flecheAccordionEntretien">^</span> 
                        </summary>
                        <p id="entretien" class="pProduitEntretien"> 
                        Pour les parties en tissu, utilisez simplement un chiffon doux ou un aspirateur pour dépoussiérer.  En cas de tache, utilisez simplement un chiffon et de l'eau savonneuse. N'utilisez pas d'éponge abrasive qui pourrait endommager la microfibre, ni de produit d'entretien agressif.
                        </p>
                    </details>
            </div>

                            <!-- Colonne de la vignette prix, couleurs etc.. -->
            <div class="colPresentationProduit">
                <div class="cardProduit">
                    <h1 class="titreProduit">Canapé scandinave 3 places en tissu gris clair chiné et bois clair CREEP</h1>
                    <a class="aDescDetail" href="#description" >
                        Description détaillée
                    </a>

                    <div class="divNoteProduit">
                        <p class="pNoteProduit">
                            ★★★★
                        </p>
                        <p class="pNbAvis">
                            (49 avis)
                        </p>
                    </div>
                    <div class="divColoris">
                        <p class="pColoris"> Colori(s) disponible(s)</p>
                        <div class="divListColoris">
                            <a id="couleur1" href="LIEN COULEUR 1"></a> 
                            <a id="couleur2" href="LIEN COULEUR 2"></a>
                            <a id="couleur3" href="LIEN COULEUR 3"></a>   
                            <a id="couleur4" href="LIEN COULEUR 4"></a>   
                            <a id="couleur5" href="LIEN COULEUR 5"></a>
                        </div>   
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>