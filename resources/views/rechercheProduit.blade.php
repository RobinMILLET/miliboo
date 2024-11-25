<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Recherche</title>
        <link rel="stylesheet" type="text/css" href="{{asset('css/recherche.css')}}"/>   
    </head>
    <body>
        <section id="top">

        </section>
        <section id="filtres">
            <ul class="dropdown">
                <li>
                    <h3>Filtre 1</h3>
                    <ul  class="dropdownitem">
                        <li>
                            <input type="checkbox" name="opt11"/>
                            <label for="opt11">Option 1</label>
                        </li>
                        <li>
                            <input type="checkbox" name="opt12"/>
                            <label for="opt12">Option 2</label>
                        </li>
                    </ul>
                </li>
                <li>
                    <h3>Filtre 2</h3>
                    <ul class="dropdownitem">
                        <li>
                            <input type="checkbox" name="opt21"/>
                            <label for="opt21">Option 3</label>
                        </li>
                        <li>
                            <input type="checkbox" name="opt22"/>
                            <label for="opt22">Option 4</label>
                        </li>
                    </ul>
                </li>
            </ul>
        </section>

        <section id="mid">
            <p class="left">123 produits</p>
            <select class="right">
                <option>Trier par:</option>
                <option>Prix croissant</option>
                <option>Prix décroissant</option>
            </select>
        </section>

        <section id="recherche">
            <grid id="grid">

                <div class="produit">
                    <img src="img/imagesProduitTest/creep1.jpg">
                    <h3>Canapé de l'infini</h3>
                    <p><span>Expedié sous 24h</span><span>★★★★<span class="small">(32)</span></span></p>
                    <p><span>299.99 €</span><s><span>399.99 €</span></s><span class="reduc">-25%</span></p>
                    <div class="circles">
                        <div style="background-color:red"></div>
                        <div style="background-color:green"></div>
                        <div style="background-color:blue"></div>
                        <p>+ 4</p>
                    </div>
                </div>

                <div class="produit">
                    <img src="img/imagesProduitTest/creep1.jpg">
                    <h3>Canapé de l'infini</h3>
                    <p><span>Expedié sous 24h</span><span>★★★★<span class="small">(32)</span></span></p>
                    <p><span>299.99 €</span><s><span>399.99 €</span></s><span class="reduc">-25%</span></p>
                    <div class="circles">
                        <div style="background-color:red"></div>
                        <div style="background-color:green"></div>
                        <div style="background-color:blue"></div>
                        <p>+ 4</p>
                    </div>
                </div>

                <div class="produit">
                    <img src="img/imagesProduitTest/creep1.jpg">
                    <h3>Canapé de l'infini</h3>
                    <p><span>Expedié sous 24h</span><span>★★★★<span class="small">(32)</span></span></p>
                    <p><span>299.99 €</span><s><span>399.99 €</span></s><span class="reduc">-25%</span></p>
                    <div class="circles">
                        <div style="background-color:red"></div>
                        <div style="background-color:green"></div>
                        <div style="background-color:blue"></div>
                        <p>+ 4</p>
                    </div>
                </div>

                <div class="produit">
                    <img src="img/imagesProduitTest/creep1.jpg">
                    <h3>Canapé de l'infini</h3>
                    <p><span>Expedié sous 24h</span><span>★★★★<span class="small">(32)</span></span></p>
                    <p><span>299.99 €</span><s><span>399.99 €</span></s><span class="reduc">-25%</span></p>
                    <div class="circles">
                        <div style="background-color:red"></div>
                        <div style="background-color:green"></div>
                        <div style="background-color:blue"></div>
                        <p>+ 4</p>
                    </div>
                </div>

                <div class="produit">
                    <img src="img/imagesProduitTest/creep1.jpg">
                    <h3>Canapé de l'infini</h3>
                    <p><span>Expedié sous 24h</span><span>★★★★<span class="small">(32)</span></span></p>
                    <p><span>299.99 €</span><s><span>399.99 €</span></s><span class="reduc">-25%</span></p>
                    <div class="circles">
                        <div style="background-color:red"></div>
                        <div style="background-color:green"></div>
                        <div style="background-color:blue"></div>
                        <p>+ 4</p>
                    </div>
                </div>

                <div class="produit">
                    <img src="img/imagesProduitTest/creep1.jpg">
                    <h3>Canapé de l'infini</h3>
                    <p><span>Expedié sous 24h</span><span>★★★★<span class="small">(32)</span></span></p>
                    <p><span>299.99 €</span><s><span>399.99 €</span></s><span class="reduc">-25%</span></p>
                    <div class="circles">
                        <div style="background-color:red"></div>
                        <div style="background-color:green"></div>
                        <div style="background-color:blue"></div>
                        <p>+ 4</p>
                    </div>
                </div>

                <div class="produit">
                    <img src="img/imagesProduitTest/creep1.jpg">
                    <h3>Canapé de l'infini</h3>
                    <p><span>Expedié sous 24h</span><span>★★★★<span class="small"> (32)</span></span></p>
                    <p><span>299.99 €</span><s><span>399.99 €</span></s><span class="reduc">-25%</span></p>
                    <div class="circles">
                        <div style="background-color:red"></div>
                        <div style="background-color:green"></div>
                        <div style="background-color:blue"></div>
                        <p>+ 4</p>
                    </div>
                </div>

            </grid>
        </section>
    </body>
</html>