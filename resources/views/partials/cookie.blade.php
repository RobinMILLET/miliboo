<body>
    <div id="background">
        <div id="cookie-container">
            <div id="container-content">
                <div class="container" id="container-default">
                    <h3>Nous prenons à coeur de protéger vos données</h3>
                    <p>
                    Nous stockons et accédons à des données personnelles, telles que des données de navigation ou des 
                    identifiants uniques, sur votre appareil. Si vous choisissez « Tout refuser » ou que vous retirez votre 
                    consentement, elles seront désactivées. Si les traceurs sont désactivés, certains contenus et annonces
                    que vous voyez peuvent ne pas être pertinents pour vous. Vous pouvez faire réapparaître ce menu pour 
                    modifier vos choix ou pour retirer votre consentement à tout moment en cliquant sur le lien Gérer mes 
                    cookies en bas de la page web ou sur l’icône flottante en bas à gauche le cas échéant. Vos choix 
                    modifieront notre Site Web. Pour plus d’informations, reportez-vous à notre politique de confidentialité.
                    </p>
                </div>
                <div class="container" id="container-detail-hide">
                    <div id="header-cookie-detail">
                        <img id="imgLogoMiliboo" src="{{asset('img/logo_Miliboo_fr.svg')}}" alt="">
                        <div>
                            <button id="button-close-cookie-detail" onclick="CloseDetail()">X</button>
                        </div>
                    </div>
                    <div id="container-detail">
                        <div id="info-accepte-cookie-detail">
                            <h2 class="h2-title">
                                En savoir plus sur la protection de vos données
                            </h2>
                            <p id="small">
                                Nous traitons vos données pour fournir du contenu. Nous analysons la diffusion de ce contenu pour en tirer des informations concernant notre site Web. Nous partageons ces informations avec nos partenaires sur la base du consentement et de l’intérêt légitime. Vous pouvez exercer votre droit à consentir ou à vous opposer à un intérêt légitime, finalité par finalité spécifique ci-dessous. Ces choix seront indiqués à nos fournisseurs.
                            </p>
                            <button id="button-accepte-all">Tout accepter</button>
                        </div>
                        <div id="cookie-detail">
                            <h2 class="h2-title">Gérer les préférences de consentement</h2>
                            <section id="container-button-choice">
                                <details class="detail-cookie">
                                    <summary class="detail-titre marge-cookie">
                                        <div class="div-title-detail">
                                            <span class="deployant">+</span>
                                            <p class="title-cookie">Cookie dernières consultations </p>
                                        </div>
                                        <label class="switch">
                                            <input id="cookieDernieresConsultations" data="derniereConsultation" type="checkbox" autocomplete="off">
                                            <span class="slider round"></span>
                                        </label>
                                    </summary>
                                    <div class="detail-div-cookie marge-cookie">
                                        <p>Cookies pour les 10 derniers produits consultés :  
                                        Ces cookies sont utiles afin que vous puissiez retrouver facilement les produits qui vous ont intéressé. 
                                        </p>
                                    </div>
                                </details>
                                <details class="detail-cookie">
                                    <summary class="detail-titre marge-cookie">
                                        <div class="div-title-detail">
                                            <span class="deployant">+</span>
                                            <p class="title-cookie">Cookie conservation panier </p>
                                        </div>
                                        <label class="switch">
                                            <input id="cookieConservationPanier" data="conservationPanier" type="checkbox" autocomplete="off">
                                            <span class="slider round"></span>
                                        </label>
                                    </summary>
                                    <div class="detail-div-cookie marge-cookie">
                                        <p> 
                                        Ces cookies permettent de garder votre panier quand vous n’êtes pas connecte afin de ne pas le perdre quand vous quitter le Site et que vous n’avez pas de compte ou que vous n’êtes pas connecté. 
                                        </p>
                                    </div>
                                </details>
                                <details class="detail-cookie">
                                    <summary class="detail-titre marge-cookie">
                                        <div class="div-title-detail">
                                            <span class="deployant">+</span>
                                            <p class="title-cookie">Cookie consentement </p>
                                        </div>
                                        <label class="switch" id="switch-consentement">
                                            <input id="cookieConsentement" data="consentement" type="checkbox" checked autocomplete="off">
                                            <span class="slider round" id="span-consentement"></span>
                                        </label>
                                    </summary>
                                    <div class="detail-div-cookie marge-cookie">
                                        <p>Ces cookies permettent de garder en mémoire si vous avez accepté les cookies pour que nous ne vous demandions pas à chaque interaction votre consentement. Vous pourrez tout de même revenir sur votre décision en cliquant sur le logo des cookies afin de les reconfigurer à n’importe quel moment. </p>
                                    </div>
                                </details>
                               
                                <details class="detail-cookie">
                                    <summary class="detail-titre marge-cookie">
                                        <div class="div-title-detail">
                                            <span class="deployant">+</span>
                                            <p class="title-cookie">Cookie préférence affichage </p>
                                        </div>
                                        <label class="switch">
                                            <input id="cookiePreferenceAffichage" data="preferenceAffichage" type="checkbox" autocomplete="off">
                                            <span class="slider round"></span>
                                        </label>
                                    </summary>
                                    <div class="detail-div-cookie marge-cookie">
                                        <p>Ces cookies permettent de conserver les choix en termes de langue, couleur d’affichage et préférences diverses</p>
                                    </div>
                                </details>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
            <div id="container-button">
                <button class="button" id="personnaliser" onclick="ShowDetail()">Personnaliser</button>
                <div id="container-choice-button">
                    <button class="button" id="button-refuse" onclick="CloseCookies()">Refuser</button>
                    <button class="button" id="button-accepte" onclick="CloseCookies()">Accepter</button>
                    <button class="button" id="button-confirme" onclick="CloseCookies()" style="display:none">Confirmer la sélection</button>
                </div>
            </div>
        </div>

    </div>
    <button id="but-affiche-cookie"><img id="img-cookie" src="{{asset('img/cookie.svg')}}" alt=""></button>
    <script src="{{ asset('js/cookiePopup.js') }}"></script>

</body>
</html>