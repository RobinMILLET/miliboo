/*==============================================================*/
/* Nom de SGBD :  PostgreSQL 8                                  */
/* Date de cr�ation :  14/11/2024 10:37:44                      */
/*==============================================================*/


alter table if exists ADRESSE drop constraint if exists FK_ADRESSE_ADRESSECL_CLIENT ;
alter table if exists ADRESSE drop constraint if exists FK_ADRESSE_ADRESSEPA_PAYS ;
alter table if exists ATTRIBUTPRODUIT drop constraint if exists FK_ATTRIBUT_ATTRIBUTT_TYPEPROD ;
alter table if exists AVISPRODUIT drop constraint if exists FK_AVISPROD_AVISCLIEN_CLIENT ;
alter table if exists AVISPRODUIT drop constraint if exists FK_AVISPROD_AVISPOURP_PRODUIT ;
alter table if exists CARTEBANCAIRE drop constraint if exists FK_CARTEBAN_CARTECLIE_CLIENT ;
alter table if exists CATEGORIEPRODUIT drop constraint if exists FK_CATEGORI_CATEGORIE_CATEGORI ;
alter table if exists CATEGORIEPRODUIT drop constraint if exists FK_CATEGORI_PHOTOCATE_PHOTO ;
alter table if exists CODEPROMO drop constraint if exists FK_CODEPROM_CLIENTCOD_CLIENT ;
alter table if exists COLORATION drop constraint if exists FK_COLORATI_COLORATIO_COULEUR ;
alter table if exists COLORATION drop constraint if exists FK_COLORATI_COLORATIO_PRODUIT ;
alter table if exists COMMANDE drop constraint if exists FK_COMMANDE_ADRESSEFA_ADRESSE ;
alter table if exists COMMANDE drop constraint if exists FK_COMMANDE_ADRESSELI_ADRESSE ;
alter table if exists COMMANDE drop constraint if exists FK_COMMANDE_CLIENTCOM_CLIENT ;
alter table if exists COMMANDE drop constraint if exists FK_COMMANDE_CODEPROMO_CODEPROM ;
alter table if exists COMMANDE drop constraint if exists FK_COMMANDE_COMMANDES_STATUTCO ;
alter table if exists COMMANDE drop constraint if exists FK_COMMANDE_TRANSPORT_TRANSPOR ;
alter table if exists DETAILCOMMANDE drop constraint if exists FK_DETAILCO_DETAILCOM_COLORATI ;
alter table if exists DETAILCOMMANDE drop constraint if exists FK_DETAILCO_DETAILCOM_COMMANDE ;
alter table if exists DETAILCOMPOSITION drop constraint if exists FK_DETAILCO_DETAILCOM_COLORATI ;
alter table if exists DETAILCOMPOSITION drop constraint if exists FK_DETAILCO_DETAILCOM_COMPOSIT ;
alter table if exists DETAILPANIER drop constraint if exists FK_DETAILPA_PANIERCLI_CLIENT ;
alter table if exists DETAILPANIER drop constraint if exists FK_DETAILPA_PANIERCOL_COLORATI ;
alter table if exists DETAILREGROUPEMENT drop constraint if exists FK_DETAILRE_DETAILREG_COLORATI ;
alter table if exists DETAILREGROUPEMENT drop constraint if exists FK_DETAILRE_DETAILREG_REGROUPE ;
alter table if exists HISTORIQUECONSULTATION drop constraint if exists FK_HISTORIQ_HISTORIQU_CLIENT ;
alter table if exists HISTORIQUECONSULTATION drop constraint if exists FK_HISTORIQ_HISTORIQU_PRODUIT ;
alter table if exists MESSAGECHATBOT drop constraint if exists FK_MESSAGEC_CLIENTCHA_CLIENT ;
alter table if exists PAIEMENT drop constraint if exists FK_PAIEMENT_PAIEMENTC_COMMANDE ;
alter table if exists PAIEMENT drop constraint if exists FK_PAIEMENT_PAIEMENTT_TYPEPAIE ;
alter table if exists PHOTOAVIS drop constraint if exists FK_PHOTOAVI_PHOTOAVIS_AVISPROD ;
alter table if exists PHOTOAVIS drop constraint if exists FK_PHOTOAVI_PHOTOAVIS_PHOTO ;
alter table if exists PHOTOPRODUITCOLORATION drop constraint if exists FK_PHOTOPRO_PHOTOPROD_COLORATI ;
alter table if exists PHOTOPRODUITCOLORATION drop constraint if exists FK_PHOTOPRO_PHOTOPROD_PHOTO ;
alter table if exists PRODUIT drop constraint if exists FK_PRODUIT_PAYSORIGI_PAYS ;
alter table if exists PRODUIT drop constraint if exists FK_PRODUIT_PRODUITTY_TYPEPROD ;
alter table if exists PRODUITSIMILAIRE drop constraint if exists FK_PRODUITS_PRODUITSI_PRODUIT ;
alter table if exists PRODUITSIMILAIRE drop constraint if exists FK_PRODUITS_PRODUITSI_PRODUIT2 ;
alter table if exists PROFESSIONEL drop constraint if exists FK_PROFESSI_HERITAGEP_CLIENT ;
alter table if exists PROFESSIONEL drop constraint if exists FK_PROFESSI_PROACTIVI_ACTIVITE ;
alter table if exists QUESTIONFORMULAIRE drop constraint if exists FK_QUESTION_QUESTIONA_ACTIONFO ;
alter table if exists SIGNALEMENTAVIS drop constraint if exists FK_SIGNALEM_AVISSIGNA_AVISPROD ;
alter table if exists SIGNALEMENTAVIS drop constraint if exists FK_SIGNALEM_SIGNALEME_TYPESIGN ;
alter table if exists TYPEPRODUIT drop constraint if exists FK_TYPEPROD_CATEGORIE_CATEGORI ;
alter table if exists VALEURATTRIBUT drop constraint if exists FK_VALEURAT_VALEURATT_ATTRIBUT ;
alter table if exists VALEURATTRIBUT drop constraint if exists FK_VALEURAT_VALEURATT_PRODUIT ;



drop index if exists ACTIONFORMULAIRE_PK;

drop table if exists ACTIONFORMULAIRE;

drop index if exists ACTIVITEPRO_PK;

drop table if exists ACTIVITEPRO;

drop index if exists ADRESSECLIENT_FK;

drop index if exists ADRESSEPAYS_FK;

drop index if exists ADRESSE_PK;

drop table if exists ADRESSE;

drop index if exists ATTRIBUTTYPEPRODUIT_FK;

drop index if exists ATTRIBUTPRODUIT_PK;

drop table if exists ATTRIBUTPRODUIT;

drop index if exists AVISPOURPRODUIT_FK;

drop index if exists AVISCLIENT_FK;

drop index if exists AVISPRODUIT_PK;

drop table if exists AVISPRODUIT;

drop index if exists CARTECLIENT_FK;

drop index if exists CARTEBANCAIRE_PK;

drop table if exists CARTEBANCAIRE;

drop index if exists CATEGORIECATEGORIE_FK;

drop index if exists PHOTOCATEGORIE_FK;

drop index if exists CATEGORIEPRODUIT_PK;

drop table if exists CATEGORIEPRODUIT;

drop index if exists CLIENT_PK;

drop table if exists CLIENT;

drop index if exists CLIENTCODEPROMO_FK;

drop index if exists CODEPROMO_PK;

drop table if exists CODEPROMO;

drop index if exists COLORATIONCOULEUR_FK;

drop index if exists COLORATIONPRODUIT_FK;

drop index if exists COLORATION_PK;

drop table if exists COLORATION;

drop index if exists ADRESSEFACTURATION_FK;

drop index if exists CLIENTCOMMANDE_FK;

drop index if exists ADRESSELIVRAISON_FK;

drop index if exists COMMANDESTATUT_FK;

drop index if exists TRANSPORTCOMMANDE_FK;

drop index if exists CODEPROMOCOMMANDE_FK;

drop index if exists COMMANDE_PK;

drop table if exists COMMANDE;

drop index if exists COMPOSITIONPRODUIT_PK;

drop table if exists COMPOSITIONPRODUIT;

drop index if exists COULEUR_PK;

drop table if exists COULEUR;

drop index if exists DETAILCOMMANDE2_FK;

drop index if exists DETAILCOMMANDE_FK;

drop index if exists DETAILCOMMANDE_PK;

drop table if exists DETAILCOMMANDE;

drop index if exists DETAILCOMPOSITION2_FK;

drop index if exists DETAILCOMPOSITION_FK;

drop index if exists DETAILCOMPOSITION_PK;

drop table if exists DETAILCOMPOSITION;

drop index if exists PANIERCLIENT_FK;

drop index if exists PANIERCOLORATION_FK;

drop index if exists DETAILPANIER_PK;

drop table if exists DETAILPANIER;

drop index if exists DETAILREGROUPEMENT2_FK;

drop index if exists DETAILREGROUPEMENT_FK;

drop index if exists DETAILREGROUPEMENT_PK;

drop table if exists DETAILREGROUPEMENT;

drop index if exists HISTORIQUECONSULTATION2_FK;

drop index if exists HISTORIQUECONSULTATION_FK;

drop index if exists HISTORIQUECONSULTATION_PK;

drop table if exists HISTORIQUECONSULTATION;

drop index if exists CLIENTCHATBOT_FK;

drop index if exists MESSAGECHATBOT_PK;

drop table if exists MESSAGECHATBOT;

drop index if exists PAIEMENTTYPAIEMENT_FK;

drop index if exists PAIEMENTCOMMANDE_FK;

drop index if exists PAIEMENT_PK;

drop table if exists PAIEMENT;

drop index if exists PAYS_PK;

drop table if exists PAYS;

drop index if exists PHOTO_PK;

drop table if exists PHOTO;

drop index if exists PHOTOAVIS2_FK;

drop index if exists PHOTOAVIS_FK;

drop index if exists PHOTOAVIS_PK;

drop table if exists PHOTOAVIS;

drop index if exists PHOTOPRODUITCOLORATION2_FK;

drop index if exists PHOTOPRODUITCOLORATION_FK;

drop index if exists PHOTOPRODUITCOLORATION_PK;

drop table if exists PHOTOPRODUITCOLORATION;

drop index if exists PAYSORIGINE_FK;

drop index if exists PRODUITTYPEPRODUIT_FK;

drop index if exists PRODUIT_PK;

drop table if exists PRODUIT;

drop index if exists PRODUITSIMILAIRE2_FK;

drop index if exists PRODUITSIMILAIRE_FK;

drop index if exists PRODUITSIMILAIRE_PK;

drop table if exists PRODUITSIMILAIRE;

drop index if exists PROACTIVITEPRO_FK;

drop index if exists PROFESSIONEL_PK;

drop table if exists PROFESSIONEL;

drop index if exists QUESTIONACTIONFORMULAIRE_FK;

drop index if exists QUESTIONFORMULAIRE_PK;

drop table if exists QUESTIONFORMULAIRE;

drop index if exists REGROUPEMENTPRODUIT_PK;

drop table if exists REGROUPEMENTPRODUIT;

drop index if exists SIGNALEMENTTYPESIGNALEMENT_FK;

drop index if exists AVISSIGNALEMENTAVIS_FK;

drop index if exists SIGNALEMENTAVIS_PK;

drop table if exists SIGNALEMENTAVIS;

drop index if exists STATUTCOMMANDE_PK;

drop table if exists STATUTCOMMANDE;

drop index if exists TRANSPORTEUR_PK;

drop table if exists TRANSPORTEUR;

drop index if exists TYPEPAIEMENT_PK;

drop table if exists TYPEPAIEMENT;

drop index if exists CATEGORIETYPEPRODUIT_FK;

drop index if exists TYPEPRODUIT_PK;

drop table if exists TYPEPRODUIT;

drop index if exists TYPESIGNALEMENT_PK;

drop table if exists TYPESIGNALEMENT;

drop index if exists VALEURATTRIBUT2_FK;

drop index if exists VALEURATTRIBUT_FK;

drop index if exists VALEURATTRIBUT_PK;

drop table if exists VALEURATTRIBUT;

/*==============================================================*/
/* Table : ACTIONFORMULAIRE                                     */
/*==============================================================*/
create table ACTIONFORMULAIRE (
   IDACTION             SERIAL               not null,
   NOMACTION            VARCHAR(64)          not null,
   constraint PK_ACTIONFORMULAIRE primary key (IDACTION)
);

/*==============================================================*/
/* Index : ACTIONFORMULAIRE_PK                                  */
/*==============================================================*/
create unique index ACTIONFORMULAIRE_PK on ACTIONFORMULAIRE (
IDACTION
);

/*==============================================================*/
/* Table : ACTIVITEPRO                                          */
/*==============================================================*/
create table ACTIVITEPRO (
   IDACTIVITEPRO        SERIAL               not null,
   NOMACTIVITEPRO       VARCHAR(64)          not null,
   constraint PK_ACTIVITEPRO primary key (IDACTIVITEPRO)
);

/*==============================================================*/
/* Index : ACTIVITEPRO_PK                                       */
/*==============================================================*/
create unique index ACTIVITEPRO_PK on ACTIVITEPRO (
IDACTIVITEPRO
);

/*==============================================================*/
/* Table : ADRESSE                                              */
/*==============================================================*/
create table ADRESSE (
   IDADRESSE            SERIAL               not null,
   IDPAYS               INT4                 not null,
   IDCLIENT             INT4                 not null,
   NOMADRESSE           VARCHAR(32)          null,
   NUMERORUE            VARCHAR(8)           null,
   NOMRUE               VARCHAR(128)         not null,
   CODEPOSTALADRESSE    CHAR(5)              not null,
   VILLE                VARCHAR(64)          not null,
   constraint PK_ADRESSE primary key (IDADRESSE)
);

/*==============================================================*/
/* Index : ADRESSE_PK                                           */
/*==============================================================*/
create unique index ADRESSE_PK on ADRESSE (
IDADRESSE
);

/*==============================================================*/
/* Index : ADRESSEPAYS_FK                                       */
/*==============================================================*/
create  index ADRESSEPAYS_FK on ADRESSE (
IDPAYS
);

/*==============================================================*/
/* Index : ADRESSECLIENT_FK                                     */
/*==============================================================*/
create  index ADRESSECLIENT_FK on ADRESSE (
IDCLIENT
);

/*==============================================================*/
/* Table : ATTRIBUTPRODUIT                                      */
/*==============================================================*/
create table ATTRIBUTPRODUIT (
   IDATTRIBUT           SERIAL               not null,
   IDTYPEPRODUIT        INT4                 not null,
   NOMATTRIBUT          VARCHAR(64)          not null,
   constraint PK_ATTRIBUTPRODUIT primary key (IDATTRIBUT)
);

/*==============================================================*/
/* Index : ATTRIBUTPRODUIT_PK                                   */
/*==============================================================*/
create unique index ATTRIBUTPRODUIT_PK on ATTRIBUTPRODUIT (
IDATTRIBUT
);

/*==============================================================*/
/* Index : ATTRIBUTTYPEPRODUIT_FK                               */
/*==============================================================*/
create  index ATTRIBUTTYPEPRODUIT_FK on ATTRIBUTPRODUIT (
IDTYPEPRODUIT
);

/*==============================================================*/
/* Table : AVISPRODUIT                                          */
/*==============================================================*/
create table AVISPRODUIT (
   IDAVIS               SERIAL               not null,
   IDPRODUIT            INT4                 not null,
   IDCLIENT             INT4                 not null,
   NOTEAVIS             INT4                 not null,
   DATEAVIS             DATE                 not null,
   COMMENTAIREAVIS      VARCHAR(1024)        null,
   REPONSEMILIBOO       VARCHAR(1024)        null,
   constraint PK_AVISPRODUIT primary key (IDAVIS)
);

/*==============================================================*/
/* Index : AVISPRODUIT_PK                                       */
/*==============================================================*/
create unique index AVISPRODUIT_PK on AVISPRODUIT (
IDAVIS
);

/*==============================================================*/
/* Index : AVISCLIENT_FK                                        */
/*==============================================================*/
create  index AVISCLIENT_FK on AVISPRODUIT (
IDCLIENT
);

/*==============================================================*/
/* Index : AVISPOURPRODUIT_FK                                   */
/*==============================================================*/
create  index AVISPOURPRODUIT_FK on AVISPRODUIT (
IDPRODUIT
);

/*==============================================================*/
/* Table : CARTEBANCAIRE                                        */
/*==============================================================*/
create table CARTEBANCAIRE (
   IDCARTEBANCAIRE      SERIAL               not null,
   IDCLIENT             INT4                 not null,
   NOMCARTEBANCAIRE     VARCHAR(32)          null,
   DATEENREGISTREMENT    DATE                 not null,
   NUMCARTEBANCAIRE     CHAR(16)             not null,
   DATEEXPIRATIONCARTE  DATE                 not null,
   constraint PK_CARTEBANCAIRE primary key (IDCARTEBANCAIRE)
);

/*==============================================================*/
/* Index : CARTEBANCAIRE_PK                                     */
/*==============================================================*/
create unique index CARTEBANCAIRE_PK on CARTEBANCAIRE (
IDCARTEBANCAIRE
);

/*==============================================================*/
/* Index : CARTECLIENT_FK                                       */
/*==============================================================*/
create  index CARTECLIENT_FK on CARTEBANCAIRE (
IDCLIENT
);

/*==============================================================*/
/* Table : CATEGORIEPRODUIT                                     */
/*==============================================================*/
create table CATEGORIEPRODUIT (
   IDCATEGORIE          SERIAL               not null,
   IDSOUSCATEGORIE   INT4                 null,
   IDPHOTO              INT4                 null,
   NOMCATEGORIE         VARCHAR(64)          not null,
   DESCRIPTIONCATEGORIE VARCHAR(512)         null,
   ESTFILTRABLE         BOOL                 not null,
   constraint PK_CATEGORIEPRODUIT primary key (IDCATEGORIE)
);

/*==============================================================*/
/* Index : CATEGORIEPRODUIT_PK                                  */
/*==============================================================*/
create unique index CATEGORIEPRODUIT_PK on CATEGORIEPRODUIT (
IDCATEGORIE
);

/*==============================================================*/
/* Index : PHOTOCATEGORIE_FK                                    */
/*==============================================================*/
create  index PHOTOCATEGORIE_FK on CATEGORIEPRODUIT (
IDPHOTO
);

/*==============================================================*/
/* Index : CATEGORIECATEGORIE_FK                                */
/*==============================================================*/
create  index CATEGORIECATEGORIE_FK on CATEGORIEPRODUIT (
IDSOUSCATEGORIE
);

/*==============================================================*/
/* Table : CLIENT                                               */
/*==============================================================*/
create table CLIENT (
   IDCLIENT             SERIAL               not null,
   NOMCLIENT            VARCHAR(64)          not null,
   PRENOMCLIENT         VARCHAR(64)          not null,
   CIVILITECLIENT       CHAR(1)              null,
   EMAILCLIENT          VARCHAR(256)         not null,
   TELFIXECLIENT        CHAR(11)             null,
   TELPORTABLECLIENT    CHAR(11)             not null,
   DATECREATIONCOMPTE   CHAR(11)             not null,
   SALTMDP              CHAR(11)            not null,
   HASHMDP              CHAR(256)            not null,
   POINTFIDELITECLIENT  INT4                 not null,
   NEWSLETTERMILIBOO    BOOL                 not null,
   NEWSLETTERPARTENAIRES BOOL                 not null,
   constraint PK_CLIENT primary key (IDCLIENT)
);

/*==============================================================*/
/* Index : CLIENT_PK                                            */
/*==============================================================*/
create unique index CLIENT_PK on CLIENT (
IDCLIENT
);

/*==============================================================*/
/* Table : CODEPROMO                                            */
/*==============================================================*/
create table CODEPROMO (
   IDCODEPROMO          SERIAL               not null,
   IDCLIENT             INT4                 null,
   DATEEXPIRATIONCODE   DATE                 null,
   NOMCODEPROMO         VARCHAR(16)          not null,
   VALEURREDUCTION      NUMERIC(5,2)         not null,
   ESTVALIDE            BOOL                 not null,
   constraint PK_CODEPROMO primary key (IDCODEPROMO)
);

/*==============================================================*/
/* Index : CODEPROMO_PK                                         */
/*==============================================================*/
create unique index CODEPROMO_PK on CODEPROMO (
IDCODEPROMO
);

/*==============================================================*/
/* Index : CLIENTCODEPROMO_FK                                   */
/*==============================================================*/
create  index CLIENTCODEPROMO_FK on CODEPROMO (
IDCLIENT
);

/*==============================================================*/
/* Table : COLORATION                                           */
/*==============================================================*/
create table COLORATION (
   IDPRODUIT            INT4                 not null,
   IDCOULEUR            INT4                 not null,
   PRIXVENTE            NUMERIC(10,2)        not null,
   PRIXSOLDE            NUMERIC(10,2)        null,
   QUANTITESTOCK        INT4                 not null,
   DESCRIPTIONCOLORATION VARCHAR(2048)        null,
   ESTVISIBLE           BOOL                 not null,
   constraint PK_COLORATION primary key (IDPRODUIT, IDCOULEUR)
);

/*==============================================================*/
/* Index : COLORATION_PK                                        */
/*==============================================================*/
create unique index COLORATION_PK on COLORATION (
IDPRODUIT,
IDCOULEUR
);

/*==============================================================*/
/* Index : COLORATIONPRODUIT_FK                                 */
/*==============================================================*/
create  index COLORATIONPRODUIT_FK on COLORATION (
IDPRODUIT
);

/*==============================================================*/
/* Index : COLORATIONCOULEUR_FK                                 */
/*==============================================================*/
create  index COLORATIONCOULEUR_FK on COLORATION (
IDCOULEUR
);

/*==============================================================*/
/* Table : COMMANDE                                             */
/*==============================================================*/
create table COMMANDE (
   IDCOMMANDE           SERIAL               not null,
   IDCLIENT             INT4                 not null,
   IDADRESSE            INT4                 not null,
   IDADRESSEFACT        INT4                 not null,
   IDSTATUTCOMMANDE     INT4                 not null,
   IDTRANSPORTEUR       INT4                 not null,
   IDCODEPROMO          INT4                 null,
   DATECOMMANDE         DATE                 not null,
   AVECASSURANCE        BOOL                 not null,
   AVECLIVRAISONEXPRESS BOOL                 not null,
   INSTRUCTIONLIVRAISON VARCHAR(512)         null,
   constraint PK_COMMANDE primary key (IDCOMMANDE)
);

/*==============================================================*/
/* Index : COMMANDE_PK                                          */
/*==============================================================*/
create unique index COMMANDE_PK on COMMANDE (
IDCOMMANDE
);

/*==============================================================*/
/* Index : CODEPROMOCOMMANDE_FK                                 */
/*==============================================================*/
create  index CODEPROMOCOMMANDE_FK on COMMANDE (
IDCODEPROMO
);

/*==============================================================*/
/* Index : TRANSPORTCOMMANDE_FK                                 */
/*==============================================================*/
create  index TRANSPORTCOMMANDE_FK on COMMANDE (
IDTRANSPORTEUR
);

/*==============================================================*/
/* Index : COMMANDESTATUT_FK                                    */
/*==============================================================*/
create  index COMMANDESTATUT_FK on COMMANDE (
IDSTATUTCOMMANDE
);

/*==============================================================*/
/* Index : ADRESSELIVRAISON_FK                                  */
/*==============================================================*/
create  index ADRESSELIVRAISON_FK on COMMANDE (
IDADRESSE
);

/*==============================================================*/
/* Index : CLIENTCOMMANDE_FK                                    */
/*==============================================================*/
create  index CLIENTCOMMANDE_FK on COMMANDE (
IDCLIENT
);

/*==============================================================*/
/* Index : ADRESSEFACTURATION_FK                                */
/*==============================================================*/
create  index ADRESSEFACTURATION_FK on COMMANDE (
IDADRESSEFACT
);

/*==============================================================*/
/* Table : COMPOSITIONPRODUIT                                   */
/*==============================================================*/
create table COMPOSITIONPRODUIT (
   IDCOMPOSITION        SERIAL               not null,
   NOMCOMPOSITION       VARCHAR(50)          not null,
   PRIXVENTECOMPOSITION NUMERIC(10,2)        not null,
   PRIXSOLDECOMPOSITION NUMERIC(10,2)        null,
   DESCRIPTIONCOMPOSITION VARCHAR(2048)        null,
   constraint PK_COMPOSITIONPRODUIT primary key (IDCOMPOSITION)
);

/*==============================================================*/
/* Index : COMPOSITIONPRODUIT_PK                                */
/*==============================================================*/
create unique index COMPOSITIONPRODUIT_PK on COMPOSITIONPRODUIT (
IDCOMPOSITION
);

/*==============================================================*/
/* Table : COULEUR                                              */
/*==============================================================*/
create table COULEUR (
   IDCOULEUR            SERIAL               not null,
   NOMCOULEUR           VARCHAR(64)          not null,
   RGBCOULEUR           CHAR(6)              not null,
   constraint PK_COULEUR primary key (IDCOULEUR)
);

/*==============================================================*/
/* Index : COULEUR_PK                                           */
/*==============================================================*/
create unique index COULEUR_PK on COULEUR (
IDCOULEUR
);

/*==============================================================*/
/* Table : DETAILCOMMANDE                                       */
/*==============================================================*/
create table DETAILCOMMANDE (
   IDPRODUIT            INT4                 not null,
   IDCOULEUR            INT4                 not null,
   IDCOMMANDE           INT4                 not null,
   QUANTITECOMMANDE     INT4                 not null,
   constraint PK_DETAILCOMMANDE primary key (IDPRODUIT, IDCOULEUR, IDCOMMANDE)
);

/*==============================================================*/
/* Index : DETAILCOMMANDE_PK                                    */
/*==============================================================*/
create unique index DETAILCOMMANDE_PK on DETAILCOMMANDE (
IDPRODUIT,
IDCOULEUR,
IDCOMMANDE
);

/*==============================================================*/
/* Index : DETAILCOMMANDE_FK                                    */
/*==============================================================*/
create  index DETAILCOMMANDE_FK on DETAILCOMMANDE (
IDPRODUIT,
IDCOULEUR
);

/*==============================================================*/
/* Index : DETAILCOMMANDE2_FK                                   */
/*==============================================================*/
create  index DETAILCOMMANDE2_FK on DETAILCOMMANDE (
IDCOMMANDE
);

/*==============================================================*/
/* Table : DETAILCOMPOSITION                                    */
/*==============================================================*/
create table DETAILCOMPOSITION (
   IDPRODUIT            INT4                 not null,
   IDCOULEUR            INT4                 not null,
   IDCOMPOSITION        INT4                 not null,
   QUANTITECOMPOSITION  INT4                 not null,
   constraint PK_DETAILCOMPOSITION primary key (IDPRODUIT, IDCOULEUR, IDCOMPOSITION)
);

/*==============================================================*/
/* Index : DETAILCOMPOSITION_PK                                 */
/*==============================================================*/
create unique index DETAILCOMPOSITION_PK on DETAILCOMPOSITION (
IDPRODUIT,
IDCOULEUR,
IDCOMPOSITION
);

/*==============================================================*/
/* Index : DETAILCOMPOSITION_FK                                 */
/*==============================================================*/
create  index DETAILCOMPOSITION_FK on DETAILCOMPOSITION (
IDPRODUIT,
IDCOULEUR
);

/*==============================================================*/
/* Index : DETAILCOMPOSITION2_FK                                */
/*==============================================================*/
create  index DETAILCOMPOSITION2_FK on DETAILCOMPOSITION (
IDCOMPOSITION
);

/*==============================================================*/
/* Table : DETAILPANIER                                         */
/*==============================================================*/
create table DETAILPANIER (
   IDPANIER             SERIAL               not null,
   IDCLIENT             INT4                 not null,
   IDPRODUIT            INT4                 not null,
   IDCOULEUR            INT4                 not null,
   QUANTITEPANIER       INT4                 not null,
   constraint PK_DETAILPANIER primary key (IDPANIER)
);

/*==============================================================*/
/* Index : DETAILPANIER_PK                                      */
/*==============================================================*/
create unique index DETAILPANIER_PK on DETAILPANIER (
IDPANIER
);

/*==============================================================*/
/* Index : PANIERCOLORATION_FK                                  */
/*==============================================================*/
create  index PANIERCOLORATION_FK on DETAILPANIER (
IDPRODUIT,
IDCOULEUR
);

/*==============================================================*/
/* Index : PANIERCLIENT_FK                                      */
/*==============================================================*/
create  index PANIERCLIENT_FK on DETAILPANIER (
IDCLIENT
);

/*==============================================================*/
/* Table : DETAILREGROUPEMENT                                   */
/*==============================================================*/
create table DETAILREGROUPEMENT (
   IDPRODUIT            INT4                 not null,
   IDCOULEUR            INT4                 not null,
   IDREGROUPEMENT       INT4                 not null,
   constraint PK_DETAILREGROUPEMENT primary key (IDPRODUIT, IDCOULEUR, IDREGROUPEMENT)
);

/*==============================================================*/
/* Index : DETAILREGROUPEMENT_PK                                */
/*==============================================================*/
create unique index DETAILREGROUPEMENT_PK on DETAILREGROUPEMENT (
IDPRODUIT,
IDCOULEUR,
IDREGROUPEMENT
);

/*==============================================================*/
/* Index : DETAILREGROUPEMENT_FK                                */
/*==============================================================*/
create  index DETAILREGROUPEMENT_FK on DETAILREGROUPEMENT (
IDREGROUPEMENT
);

/*==============================================================*/
/* Index : DETAILREGROUPEMENT2_FK                               */
/*==============================================================*/
create  index DETAILREGROUPEMENT2_FK on DETAILREGROUPEMENT (
IDPRODUIT,
IDCOULEUR
);

/*==============================================================*/
/* Table : HISTORIQUECONSULTATION                               */
/*==============================================================*/
create table HISTORIQUECONSULTATION (
   IDCLIENT             INT4                 not null,
   IDPRODUIT            INT4                 not null,
   DATECONSULTATION     DATE                 not null,
   constraint PK_HISTORIQUECONSULTATION primary key (IDCLIENT, IDPRODUIT)
);

/*==============================================================*/
/* Index : HISTORIQUECONSULTATION_PK                            */
/*==============================================================*/
create unique index HISTORIQUECONSULTATION_PK on HISTORIQUECONSULTATION (
IDCLIENT,
IDPRODUIT
);

/*==============================================================*/
/* Index : HISTORIQUECONSULTATION_FK                            */
/*==============================================================*/
create  index HISTORIQUECONSULTATION_FK on HISTORIQUECONSULTATION (
IDCLIENT
);

/*==============================================================*/
/* Index : HISTORIQUECONSULTATION2_FK                           */
/*==============================================================*/
create  index HISTORIQUECONSULTATION2_FK on HISTORIQUECONSULTATION (
IDPRODUIT
);

/*==============================================================*/
/* Table : MESSAGECHATBOT                                       */
/*==============================================================*/
create table MESSAGECHATBOT (
   IDMESSAGE            SERIAL               not null,
   IDCLIENT             INT4                 null,
   CONTENUMESSAGE       VARCHAR(512)         not null,
   REPONSEMESSAGE       VARCHAR(1024)        not null,
   constraint PK_MESSAGECHATBOT primary key (IDMESSAGE)
);

/*==============================================================*/
/* Index : MESSAGECHATBOT_PK                                    */
/*==============================================================*/
create unique index MESSAGECHATBOT_PK on MESSAGECHATBOT (
IDMESSAGE
);

/*==============================================================*/
/* Index : CLIENTCHATBOT_FK                                     */
/*==============================================================*/
create  index CLIENTCHATBOT_FK on MESSAGECHATBOT (
IDCLIENT
);

/*==============================================================*/
/* Table : PAIEMENT                                             */
/*==============================================================*/
create table PAIEMENT (
   IDPAIEMENT           SERIAL               not null,
   IDTYPEPAIEMENT       INT4                 not null,
   IDCOMMANDE           INT4                 not null,
   DATEPAIEMENT         DATE                 not null,
   MONTANTPAIEMENT      NUMERIC(10,2)        not null,
   INDICEPAIEMENT       VARCHAR(256)         null,
   constraint PK_PAIEMENT primary key (IDPAIEMENT)
);

/*==============================================================*/
/* Index : PAIEMENT_PK                                          */
/*==============================================================*/
create unique index PAIEMENT_PK on PAIEMENT (
IDPAIEMENT
);

/*==============================================================*/
/* Index : PAIEMENTCOMMANDE_FK                                  */
/*==============================================================*/
create  index PAIEMENTCOMMANDE_FK on PAIEMENT (
IDCOMMANDE
);

/*==============================================================*/
/* Index : PAIEMENTTYPAIEMENT_FK                                */
/*==============================================================*/
create  index PAIEMENTTYPAIEMENT_FK on PAIEMENT (
IDTYPEPAIEMENT
);

/*==============================================================*/
/* Table : PAYS                                                 */
/*==============================================================*/
create table PAYS (
   IDPAYS               SERIAL               not null,
   NOMPAYS              VARCHAR(32)          not null,
   constraint PK_PAYS primary key (IDPAYS)
);

/*==============================================================*/
/* Index : PAYS_PK                                              */
/*==============================================================*/
create unique index PAYS_PK on PAYS (
IDPAYS
);

/*==============================================================*/
/* Table : PHOTO                                                */
/*==============================================================*/
create table PHOTO (
   IDPHOTO              SERIAL               not null,
   SOURCEPHOTO          VARCHAR(256)         not null,
   DESCRIPTIONPHOTO     VARCHAR(256)         null,
   constraint PK_PHOTO primary key (IDPHOTO)
);

/*==============================================================*/
/* Index : PHOTO_PK                                             */
/*==============================================================*/
create unique index PHOTO_PK on PHOTO (
IDPHOTO
);

/*==============================================================*/
/* Table : PHOTOAVIS                                            */
/*==============================================================*/
create table PHOTOAVIS (
   IDAVIS               INT4                 not null,
   IDPHOTO              INT4                 not null,
   constraint PK_PHOTOAVIS primary key (IDAVIS, IDPHOTO)
);

/*==============================================================*/
/* Index : PHOTOAVIS_PK                                         */
/*==============================================================*/
create unique index PHOTOAVIS_PK on PHOTOAVIS (
IDAVIS,
IDPHOTO
);

/*==============================================================*/
/* Index : PHOTOAVIS_FK                                         */
/*==============================================================*/
create  index PHOTOAVIS_FK on PHOTOAVIS (
IDAVIS
);

/*==============================================================*/
/* Index : PHOTOAVIS2_FK                                        */
/*==============================================================*/
create  index PHOTOAVIS2_FK on PHOTOAVIS (
IDPHOTO
);

/*==============================================================*/
/* Table : PHOTOPRODUITCOLORATION                               */
/*==============================================================*/
create table PHOTOPRODUITCOLORATION (
   IDPRODUIT            INT4                 not null,
   IDCOULEUR            INT4                 not null,
   IDPHOTO              INT4                 not null,
   constraint PK_PHOTOPRODUITCOLORATION primary key (IDPRODUIT, IDCOULEUR, IDPHOTO)
);

/*==============================================================*/
/* Index : PHOTOPRODUITCOLORATION_PK                            */
/*==============================================================*/
create unique index PHOTOPRODUITCOLORATION_PK on PHOTOPRODUITCOLORATION (
IDPRODUIT,
IDCOULEUR,
IDPHOTO
);

/*==============================================================*/
/* Index : PHOTOPRODUITCOLORATION_FK                            */
/*==============================================================*/
create  index PHOTOPRODUITCOLORATION_FK on PHOTOPRODUITCOLORATION (
IDPHOTO
);

/*==============================================================*/
/* Index : PHOTOPRODUITCOLORATION2_FK                           */
/*==============================================================*/
create  index PHOTOPRODUITCOLORATION2_FK on PHOTOPRODUITCOLORATION (
IDPRODUIT,
IDCOULEUR
);

/*==============================================================*/
/* Table : PRODUIT                                              */
/*==============================================================*/
create table PRODUIT (
   IDPRODUIT            SERIAL               not null,
   IDTYPEPRODUIT        INT4                 not null,
   IDPAYS               INT4                 not null,
   NOMPRODUIT           VARCHAR(256)         not null,
   SOURCENOTICE         VARCHAR(256)         null,
   SOURCEASPECTTECHNIQUE VARCHAR(256)         null,
   DELAILIVRAISON       INTERVAL             not null,
   COUTLIVRAISON        NUMERIC(10,2)        not null,
   NBPAIEMENTMAX        INT4                 not null,
   constraint PK_PRODUIT primary key (IDPRODUIT)
);

/*==============================================================*/
/* Index : PRODUIT_PK                                           */
/*==============================================================*/
create unique index PRODUIT_PK on PRODUIT (
IDPRODUIT
);

/*==============================================================*/
/* Index : PRODUITTYPEPRODUIT_FK                                */
/*==============================================================*/
create  index PRODUITTYPEPRODUIT_FK on PRODUIT (
IDTYPEPRODUIT
);

/*==============================================================*/
/* Index : PAYSORIGINE_FK                                       */
/*==============================================================*/
create  index PAYSORIGINE_FK on PRODUIT (
IDPAYS
);

/*==============================================================*/
/* Table : PRODUITSIMILAIRE                                     */
/*==============================================================*/
create table PRODUITSIMILAIRE (
   IDPRODUIT            INT4                 not null,
   PRO_IDPRODUIT        INT4                 not null,
   constraint PK_PRODUITSIMILAIRE primary key (IDPRODUIT, PRO_IDPRODUIT)
);

/*==============================================================*/
/* Index : PRODUITSIMILAIRE_PK                                  */
/*==============================================================*/
create unique index PRODUITSIMILAIRE_PK on PRODUITSIMILAIRE (
IDPRODUIT,
PRO_IDPRODUIT
);

/*==============================================================*/
/* Index : PRODUITSIMILAIRE_FK                                  */
/*==============================================================*/
create  index PRODUITSIMILAIRE_FK on PRODUITSIMILAIRE (
IDPRODUIT
);

/*==============================================================*/
/* Index : PRODUITSIMILAIRE2_FK                                 */
/*==============================================================*/
create  index PRODUITSIMILAIRE2_FK on PRODUITSIMILAIRE (
PRO_IDPRODUIT
);

/*==============================================================*/
/* Table : PROFESSIONEL                                         */
/*==============================================================*/
create table PROFESSIONEL (
   IDCLIENT             INT4                 not null,
   IDACTIVITEPRO        INT4                 not null,
   NOMSOCIETE           VARCHAR(50)          not null,
   NUMTVA               CHAR(11)             not null,
   constraint PK_PROFESSIONEL primary key (IDCLIENT)
);

/*==============================================================*/
/* Index : PROFESSIONEL_PK                                      */
/*==============================================================*/
create unique index PROFESSIONEL_PK on PROFESSIONEL (
IDCLIENT
);

/*==============================================================*/
/* Index : PROACTIVITEPRO_FK                                    */
/*==============================================================*/
create  index PROACTIVITEPRO_FK on PROFESSIONEL (
IDACTIVITEPRO
);

/*==============================================================*/
/* Table : QUESTIONFORMULAIRE                                   */
/*==============================================================*/
create table QUESTIONFORMULAIRE (
   IDQUESTION           SERIAL               not null,
   IDACTION             INT4                 not null,
   NOMPERSONNE          VARCHAR(64)          not null,
   EMAILPERSONNE        VARCHAR(256)         not null,
   TELPERSONNE          CHAR(11)             not null,
   CONTENUQUESTION      VARCHAR(2048)        not null,
   DATEENVOI            DATE                 not null,
   constraint PK_QUESTIONFORMULAIRE primary key (IDQUESTION)
);

/*==============================================================*/
/* Index : QUESTIONFORMULAIRE_PK                                */
/*==============================================================*/
create unique index QUESTIONFORMULAIRE_PK on QUESTIONFORMULAIRE (
IDQUESTION
);

/*==============================================================*/
/* Index : QUESTIONACTIONFORMULAIRE_FK                          */
/*==============================================================*/
create  index QUESTIONACTIONFORMULAIRE_FK on QUESTIONFORMULAIRE (
IDACTION
);

/*==============================================================*/
/* Table : REGROUPEMENTPRODUIT                                  */
/*==============================================================*/
create table REGROUPEMENTPRODUIT (
   IDREGROUPEMENT       SERIAL               not null,
   NOMREGROUPEMENT      VARCHAR(64)          not null,
   constraint PK_REGROUPEMENTPRODUIT primary key (IDREGROUPEMENT)
);

/*==============================================================*/
/* Index : REGROUPEMENTPRODUIT_PK                               */
/*==============================================================*/
create unique index REGROUPEMENTPRODUIT_PK on REGROUPEMENTPRODUIT (
IDREGROUPEMENT
);

/*==============================================================*/
/* Table : SIGNALEMENTAVIS                                      */
/*==============================================================*/
create table SIGNALEMENTAVIS (
   IDSIGNALEMENT        SERIAL               not null,
   IDAVIS               INT4                 not null,
   IDTYPESIGNALEMENT    INT4                 not null,
   EMAILSIGNALEMENT     VARCHAR(256)         not null,
   DATESIGNALEMENT      DATE                 not null,
   CONTENUSIGNALEMENT   VARCHAR(512)         not null,
   constraint PK_SIGNALEMENTAVIS primary key (IDSIGNALEMENT)
);

/*==============================================================*/
/* Index : SIGNALEMENTAVIS_PK                                   */
/*==============================================================*/
create unique index SIGNALEMENTAVIS_PK on SIGNALEMENTAVIS (
IDSIGNALEMENT
);

/*==============================================================*/
/* Index : AVISSIGNALEMENTAVIS_FK                               */
/*==============================================================*/
create  index AVISSIGNALEMENTAVIS_FK on SIGNALEMENTAVIS (
IDAVIS
);

/*==============================================================*/
/* Index : SIGNALEMENTTYPESIGNALEMENT_FK                        */
/*==============================================================*/
create  index SIGNALEMENTTYPESIGNALEMENT_FK on SIGNALEMENTAVIS (
IDTYPESIGNALEMENT
);

/*==============================================================*/
/* Table : STATUTCOMMANDE                                       */
/*==============================================================*/
create table STATUTCOMMANDE (
   IDSTATUT             SERIAL               not null,
   NOMSTATUT            VARCHAR(64)          not null,
   constraint PK_STATUTCOMMANDE primary key (IDSTATUT)
);

/*==============================================================*/
/* Index : STATUTCOMMANDE_PK                                    */
/*==============================================================*/
create unique index STATUTCOMMANDE_PK on STATUTCOMMANDE (
IDSTATUT
);

/*==============================================================*/
/* Table : TRANSPORTEUR                                         */
/*==============================================================*/
create table TRANSPORTEUR (
   IDTRANSPORTEUR       SERIAL               not null,
   NOMTRANSPORTEUR      VARCHAR(64)          not null,
   DESCRIPTIONTRANSPORTEUR VARCHAR(512)         null,
   constraint PK_TRANSPORTEUR primary key (IDTRANSPORTEUR)
);

/*==============================================================*/
/* Index : TRANSPORTEUR_PK                                      */
/*==============================================================*/
create unique index TRANSPORTEUR_PK on TRANSPORTEUR (
IDTRANSPORTEUR
);

/*==============================================================*/
/* Table : TYPEPAIEMENT                                         */
/*==============================================================*/
create table TYPEPAIEMENT (
   IDTYPEPAIEMENT       SERIAL               not null,
   NOMTYPEPAIEMENT      VARCHAR(64)          not null,
   constraint PK_TYPEPAIEMENT primary key (IDTYPEPAIEMENT)
);

/*==============================================================*/
/* Index : TYPEPAIEMENT_PK                                      */
/*==============================================================*/
create unique index TYPEPAIEMENT_PK on TYPEPAIEMENT (
IDTYPEPAIEMENT
);

/*==============================================================*/
/* Table : TYPEPRODUIT                                          */
/*==============================================================*/
create table TYPEPRODUIT (
   IDTYPEPRODUIT        SERIAL               not null,
   IDCATEGORIE          INT4                 not null,
   NOMTYPEPRODUIT       VARCHAR(64)          not null,
   constraint PK_TYPEPRODUIT primary key (IDTYPEPRODUIT)
);

/*==============================================================*/
/* Index : TYPEPRODUIT_PK                                       */
/*==============================================================*/
create unique index TYPEPRODUIT_PK on TYPEPRODUIT (
IDTYPEPRODUIT
);

/*==============================================================*/
/* Index : CATEGORIETYPEPRODUIT_FK                              */
/*==============================================================*/
create  index CATEGORIETYPEPRODUIT_FK on TYPEPRODUIT (
IDCATEGORIE
);

/*==============================================================*/
/* Table : TYPESIGNALEMENT                                      */
/*==============================================================*/
create table TYPESIGNALEMENT (
   IDTYPESIGNALEMENT    SERIAL               not null,
   NOMTYPESIGNALEMENT   VARCHAR(64)          not null,
   constraint PK_TYPESIGNALEMENT primary key (IDTYPESIGNALEMENT)
);

/*==============================================================*/
/* Index : TYPESIGNALEMENT_PK                                   */
/*==============================================================*/
create unique index TYPESIGNALEMENT_PK on TYPESIGNALEMENT (
IDTYPESIGNALEMENT
);

/*==============================================================*/
/* Table : VALEURATTRIBUT                                       */
/*==============================================================*/
create table VALEURATTRIBUT (
   IDATTRIBUT           INT4                 not null,
   IDPRODUIT            INT4                 not null,
   VALEUR               VARCHAR(64)          not null,
   constraint PK_VALEURATTRIBUT primary key (IDATTRIBUT, IDPRODUIT)
);

/*==============================================================*/
/* Index : VALEURATTRIBUT_PK                                    */
/*==============================================================*/
create unique index VALEURATTRIBUT_PK on VALEURATTRIBUT (
IDATTRIBUT,
IDPRODUIT
);

/*==============================================================*/
/* Index : VALEURATTRIBUT_FK                                    */
/*==============================================================*/
create  index VALEURATTRIBUT_FK on VALEURATTRIBUT (
IDATTRIBUT
);

/*==============================================================*/
/* Index : VALEURATTRIBUT2_FK                                   */
/*==============================================================*/
create  index VALEURATTRIBUT2_FK on VALEURATTRIBUT (
IDPRODUIT
);

alter table ADRESSE
   add constraint FK_ADRESSE_ADRESSECL_CLIENT foreign key (IDCLIENT)
      references CLIENT (IDCLIENT)
      on delete restrict on update restrict;

alter table ADRESSE
   add constraint FK_ADRESSE_ADRESSEPA_PAYS foreign key (IDPAYS)
      references PAYS (IDPAYS)
      on delete restrict on update restrict;

alter table ATTRIBUTPRODUIT
   add constraint FK_ATTRIBUT_ATTRIBUTT_TYPEPROD foreign key (IDTYPEPRODUIT)
      references TYPEPRODUIT (IDTYPEPRODUIT)
      on delete restrict on update restrict;

alter table AVISPRODUIT
   add constraint FK_AVISPROD_AVISCLIEN_CLIENT foreign key (IDCLIENT)
      references CLIENT (IDCLIENT)
      on delete restrict on update restrict;

alter table AVISPRODUIT
   add constraint FK_AVISPROD_AVISPOURP_PRODUIT foreign key (IDPRODUIT)
      references PRODUIT (IDPRODUIT)
      on delete restrict on update restrict;

alter table CARTEBANCAIRE
   add constraint FK_CARTEBAN_CARTECLIE_CLIENT foreign key (IDCLIENT)
      references CLIENT (IDCLIENT)
      on delete restrict on update restrict;

alter table CATEGORIEPRODUIT
   add constraint FK_CATEGORI_CATEGORIE_CATEGORI foreign key (IDSOUSCATEGORIE)
      references CATEGORIEPRODUIT (IDCATEGORIE)
      on delete restrict on update restrict;

alter table CATEGORIEPRODUIT
   add constraint FK_CATEGORI_PHOTOCATE_PHOTO foreign key (IDPHOTO)
      references PHOTO (IDPHOTO)
      on delete restrict on update restrict;

alter table CODEPROMO
   add constraint FK_CODEPROM_CLIENTCOD_CLIENT foreign key (IDCLIENT)
      references CLIENT (IDCLIENT)
      on delete restrict on update restrict;

alter table COLORATION
   add constraint FK_COLORATI_COLORATIO_COULEUR foreign key (IDCOULEUR)
      references COULEUR (IDCOULEUR)
      on delete restrict on update restrict;

alter table COLORATION
   add constraint FK_COLORATI_COLORATIO_PRODUIT foreign key (IDPRODUIT)
      references PRODUIT (IDPRODUIT)
      on delete restrict on update restrict;

alter table COMMANDE
   add constraint FK_COMMANDE_ADRESSEFA_ADRESSE foreign key (IDADRESSEFACT)
      references ADRESSE (IDADRESSE)
      on delete restrict on update restrict;

alter table COMMANDE
   add constraint FK_COMMANDE_ADRESSELI_ADRESSE foreign key (IDADRESSE)
      references ADRESSE (IDADRESSE)
      on delete restrict on update restrict;

alter table COMMANDE
   add constraint FK_COMMANDE_CLIENTCOM_CLIENT foreign key (IDCLIENT)
      references CLIENT (IDCLIENT)
      on delete restrict on update restrict;

alter table COMMANDE
   add constraint FK_COMMANDE_CODEPROMO_CODEPROM foreign key (IDCODEPROMO)
      references CODEPROMO (IDCODEPROMO)
      on delete restrict on update restrict;

alter table COMMANDE
   add constraint FK_COMMANDE_COMMANDES_STATUTCO foreign key (IDSTATUTCOMMANDE)
      references STATUTCOMMANDE (IDSTATUT)
      on delete restrict on update restrict;

alter table COMMANDE
   add constraint FK_COMMANDE_TRANSPORT_TRANSPOR foreign key (IDTRANSPORTEUR)
      references TRANSPORTEUR (IDTRANSPORTEUR)
      on delete restrict on update restrict;

alter table DETAILCOMMANDE
   add constraint FK_DETAILCO_DETAILCOM_COLORATI foreign key (IDPRODUIT, IDCOULEUR)
      references COLORATION (IDPRODUIT, IDCOULEUR)
      on delete restrict on update restrict;

alter table DETAILCOMMANDE
   add constraint FK_DETAILCO_DETAILCOM_COMMANDE foreign key (IDCOMMANDE)
      references COMMANDE (IDCOMMANDE)
      on delete restrict on update restrict;

alter table DETAILCOMPOSITION
   add constraint FK_DETAILCO_DETAILCOM_COLORATI foreign key (IDPRODUIT, IDCOULEUR)
      references COLORATION (IDPRODUIT, IDCOULEUR)
      on delete restrict on update restrict;

alter table DETAILCOMPOSITION
   add constraint FK_DETAILCO_DETAILCOM_COMPOSIT foreign key (IDCOMPOSITION)
      references COMPOSITIONPRODUIT (IDCOMPOSITION)
      on delete restrict on update restrict;

alter table DETAILPANIER
   add constraint FK_DETAILPA_PANIERCLI_CLIENT foreign key (IDCLIENT)
      references CLIENT (IDCLIENT)
      on delete restrict on update restrict;

alter table DETAILPANIER
   add constraint FK_DETAILPA_PANIERCOL_COLORATI foreign key (IDPRODUIT, IDCOULEUR)
      references COLORATION (IDPRODUIT, IDCOULEUR)
      on delete restrict on update restrict;

alter table DETAILREGROUPEMENT
   add constraint FK_DETAILRE_DETAILREG_REGROUPE foreign key (IDREGROUPEMENT)
      references REGROUPEMENTPRODUIT (IDREGROUPEMENT)
      on delete restrict on update restrict;

alter table DETAILREGROUPEMENT
   add constraint FK_DETAILRE_DETAILREG_COLORATI foreign key (IDPRODUIT, IDCOULEUR)
      references COLORATION (IDPRODUIT, IDCOULEUR)
      on delete restrict on update restrict;

alter table HISTORIQUECONSULTATION
   add constraint FK_HISTORIQ_HISTORIQU_CLIENT foreign key (IDCLIENT)
      references CLIENT (IDCLIENT)
      on delete restrict on update restrict;

alter table HISTORIQUECONSULTATION
   add constraint FK_HISTORIQ_HISTORIQU_PRODUIT foreign key (IDPRODUIT)
      references PRODUIT (IDPRODUIT)
      on delete restrict on update restrict;

alter table MESSAGECHATBOT
   add constraint FK_MESSAGEC_CLIENTCHA_CLIENT foreign key (IDCLIENT)
      references CLIENT (IDCLIENT)
      on delete restrict on update restrict;

alter table PAIEMENT
   add constraint FK_PAIEMENT_PAIEMENTC_COMMANDE foreign key (IDCOMMANDE)
      references COMMANDE (IDCOMMANDE)
      on delete restrict on update restrict;

alter table PAIEMENT
   add constraint FK_PAIEMENT_PAIEMENTT_TYPEPAIE foreign key (IDTYPEPAIEMENT)
      references TYPEPAIEMENT (IDTYPEPAIEMENT)
      on delete restrict on update restrict;

alter table PHOTOAVIS
   add constraint FK_PHOTOAVI_PHOTOAVIS_AVISPROD foreign key (IDAVIS)
      references AVISPRODUIT (IDAVIS)
      on delete restrict on update restrict;

alter table PHOTOAVIS
   add constraint FK_PHOTOAVI_PHOTOAVIS_PHOTO foreign key (IDPHOTO)
      references PHOTO (IDPHOTO)
      on delete restrict on update restrict;

alter table PHOTOPRODUITCOLORATION
   add constraint FK_PHOTOPRO_PHOTOPROD_PHOTO foreign key (IDPHOTO)
      references PHOTO (IDPHOTO)
      on delete restrict on update restrict;

alter table PHOTOPRODUITCOLORATION
   add constraint FK_PHOTOPRO_PHOTOPROD_COLORATI foreign key (IDPRODUIT, IDCOULEUR)
      references COLORATION (IDPRODUIT, IDCOULEUR)
      on delete restrict on update restrict;

alter table PRODUIT
   add constraint FK_PRODUIT_PAYSORIGI_PAYS foreign key (IDPAYS)
      references PAYS (IDPAYS)
      on delete restrict on update restrict;

alter table PRODUIT
   add constraint FK_PRODUIT_PRODUITTY_TYPEPROD foreign key (IDTYPEPRODUIT)
      references TYPEPRODUIT (IDTYPEPRODUIT)
      on delete restrict on update restrict;

alter table PRODUITSIMILAIRE
   add constraint FK_PRODUITS_PRODUITSI_PRODUIT foreign key (IDPRODUIT)
      references PRODUIT (IDPRODUIT)
      on delete restrict on update restrict;

alter table PRODUITSIMILAIRE
   add constraint FK_PRODUITS_PRODUITSI_PRODUIT2 foreign key (PRO_IDPRODUIT)
      references PRODUIT (IDPRODUIT)
      on delete restrict on update restrict;

alter table PROFESSIONEL
   add constraint FK_PROFESSI_HERITAGEP_CLIENT foreign key (IDCLIENT)
      references CLIENT (IDCLIENT)
      on delete restrict on update restrict;

alter table PROFESSIONEL
   add constraint FK_PROFESSI_PROACTIVI_ACTIVITE foreign key (IDACTIVITEPRO)
      references ACTIVITEPRO (IDACTIVITEPRO)
      on delete restrict on update restrict;

alter table QUESTIONFORMULAIRE
   add constraint FK_QUESTION_QUESTIONA_ACTIONFO foreign key (IDACTION)
      references ACTIONFORMULAIRE (IDACTION)
      on delete restrict on update restrict;

alter table SIGNALEMENTAVIS
   add constraint FK_SIGNALEM_AVISSIGNA_AVISPROD foreign key (IDAVIS)
      references AVISPRODUIT (IDAVIS)
      on delete restrict on update restrict;

alter table SIGNALEMENTAVIS
   add constraint FK_SIGNALEM_SIGNALEME_TYPESIGN foreign key (IDTYPESIGNALEMENT)
      references TYPESIGNALEMENT (IDTYPESIGNALEMENT)
      on delete restrict on update restrict;

alter table TYPEPRODUIT
   add constraint FK_TYPEPROD_CATEGORIE_CATEGORI foreign key (IDCATEGORIE)
      references CATEGORIEPRODUIT (IDCATEGORIE)
      on delete restrict on update restrict;

alter table VALEURATTRIBUT
   add constraint FK_VALEURAT_VALEURATT_ATTRIBUT foreign key (IDATTRIBUT)
      references ATTRIBUTPRODUIT (IDATTRIBUT)
      on delete restrict on update restrict;

alter table VALEURATTRIBUT
   add constraint FK_VALEURAT_VALEURATT_PRODUIT foreign key (IDPRODUIT)
      references PRODUIT (IDPRODUIT)
      on delete restrict on update restrict;

/*
DROP CONSTRAINTS
*/

alter table ActionFormulaire
drop constraint if exists UQ_Action;
alter table ActivitePro
drop constraint if exists UQ_ActivitePro;
alter table Adresse
drop constraint if exists CK_codePostal;
alter table AttributProduit
drop constraint if exists UQ_Attribut;
alter table AvisProduit
drop constraint if exists UQ_Avis,
drop constraint if exists CK_dateAvis,
drop constraint if exists CK_noteAvis;
alter table CarteBancaire
drop constraint if exists UQ_nomCarte,
drop constraint if exists UQ_numCarte,
drop constraint if exists CK_numCarte,
drop constraint if exists CK_dateEnregistrement;
alter table CategorieProduit
drop constraint if exists UQ_Categorie;
alter table Client
drop constraint if exists UQ_Client,
drop constraint if exists CK_telFixe,
drop constraint if exists CK_telPortable,
drop constraint if exists CK_emailClient,
drop constraint if exists CK_civiliteClient,
drop constraint if exists CK_pointFideliteClient;
alter table CodePromo
drop constraint if exists CK_valeurReduction;
alter table Coloration
drop constraint if exists CK_quantiteStock,
drop constraint if exists CK_prixSolde,
drop constraint if exists CK_prixVente;
alter table Commande
drop constraint if exists CK_dateCommande;
alter table CompositionProduit
drop constraint if exists UQ_Composition,
drop constraint if exists CK_prixSoldeComposition,
drop constraint if exists CK_prixVenteComposition;
alter table Couleur
drop constraint if exists UQ_Couleur,
drop constraint if exists CK_rgbCouleur;
alter table DetailCommande
drop constraint if exists CK_quantiteCommande;
alter table DetailComposition
drop constraint if exists CK_quantiteComposition;
alter table DetailPanier
drop constraint if exists CK_quantitePanier;
alter table QuestionFormulaire
drop constraint if exists CK_telPersonne,
drop constraint if exists CK_dateEnvoi,
drop constraint if exists CK_emailPersonne;
alter table HistoriqueConsultation
drop constraint if exists CK_dateConsultation;
alter table Paiement
drop constraint if exists CK_datePaiement,
drop constraint if exists CK_montantPaiement;
alter table Pays
drop constraint if exists UQ_Pays;
alter table Produit
drop constraint if exists UQ_Produit,
drop constraint if exists CK_coutLivraison,
drop constraint if exists CK_nbPaiementMax;
alter table Professionel
drop constraint if exists CK_numTVA;
alter table RegroupementProduit
drop constraint if exists UQ_Regroupement;
alter table SignalementAvis
drop constraint if exists UQ_Signalement,
drop constraint if exists CK_emailSignalement;
alter table StatutCommande
drop constraint if exists UQ_Statut;
alter table Transporteur
drop constraint if exists UQ_Transporteur;
alter table TypePaiement
drop constraint if exists UQ_TypePaiement;
alter table TypeProduit
drop constraint if exists UQ_TypeProduit;
alter table TypeSignalement
drop constraint if exists UQ_TypeSignalement;

/*
UNIQUE
ActionFormulaire.(nomAction)
ActivitePro.(nomActivitePro)
AttributProduit.(idTypeProduit,nomAttribut)
AvisProduit.(idClient,idProduit)
CarteBancaire.(idClient,nomCarteBancaire)
CarteBancaire.(idClient,numCarteBancaire)
CategorieProduit.(nomCategorie)
Client.(nomClient,prenomClient,telPortableClient)
CompositionProduit.(nomComposition)
Couleur.(nomCouleur)
Pays.(nomPays)
Produit.(nomProduit)
RegroupementProduit.(nomRegroupement)
SignalementAvis.(idAvis,emailSignalement)
StatutCommande.(nomStatut)
Transporteur.(nomTransporteur)
TypePaiement.(nomTypePaiement)
TypeProduit.(nomTypeProduit)
TypeSignalement.(nomTypeSignalement)
*/

alter table ActionFormulaire
add constraint UQ_Action UNIQUE (nomAction);
alter table ActivitePro
add constraint UQ_ActivitePro UNIQUE (nomActivitePro);
alter table AttributProduit
add constraint UQ_Attribut UNIQUE (idTypeProduit, nomAttribut);
alter table AvisProduit
add constraint UQ_Avis UNIQUE (idClient, idProduit);
alter table CarteBancaire
add constraint UQ_nomCarte UNIQUE (idClient, nomCarteBancaire),
add constraint UQ_numCarte UNIQUE (idClient, numCarteBancaire);
alter table CategorieProduit
add constraint UQ_Categorie UNIQUE (nomCategorie);
alter table Client
add constraint UQ_Client UNIQUE (nomClient, prenomClient, telPortableClient);
alter table CompositionProduit
add constraint UQ_Composition UNIQUE (nomComposition);
alter table Couleur
add constraint UQ_Couleur UNIQUE (nomCouleur);
alter table Pays
add constraint UQ_Pays UNIQUE (nomPays);
alter table Produit
add constraint UQ_Produit UNIQUE (nomProduit);
alter table RegroupementProduit
add constraint UQ_Regroupement UNIQUE (nomRegroupement);
alter table SignalementAvis
add constraint UQ_Signalement UNIQUE (idAvis, emailSignalement);
alter table StatutCommande
add constraint UQ_Statut UNIQUE (nomStatut);
alter table Transporteur
add constraint UQ_Transporteur UNIQUE (nomTransporteur);
alter table TypePaiement
add constraint UQ_TypePaiement UNIQUE (nomTypePaiement);
alter table TypeProduit
add constraint UQ_TypeProduit UNIQUE (nomTypeProduit);
alter table TypeSignalement
add constraint UQ_TypeSignalement UNIQUE (nomTypeSignalement);

/*
NUMERIC
Adresse.codePostalAdresse
CarteBancaire.numCarteBancaire
Client.telFixeClient
Client.telPortableClient
QuestionFormulaire.telPersonne
Professionel.numTVA
*/


alter table Adresse -- Code postal corse : 0A000
add constraint CK_codePostal CHECK (codePostalAdresse ~ '^[A|0-9]+$');
alter table CarteBancaire
add constraint CK_numCarte CHECK (numCarteBancaire ~ '^[0-9]+$');
alter table Client
add constraint CK_telFixe CHECK (telFixeClient ~ '^[0-9]+$'),
add constraint CK_telPortable CHECK (telPortableClient ~ '^[0-9]+$');
alter table QuestionFormulaire
add constraint CK_telPersonne CHECK (telPersonne ~ '^[0-9]+$');
alter table Professionel
add constraint CK_numTVA CHECK (numTVA ~ '^[0-9]+$');

/*
NOT FUTURE
AvisProduit.dateAvis
CarteBancaire.dateEnregistrement
Commande.dateCommande
QuestionFormulaire.dateEnvoi
HistoriqueConsultation.dateConsultation
SignalementAvis.dateSignalement
Paiement.datePaiement
*/

alter table AvisProduit
add constraint CK_dateAvis CHECK (dateAvis <= CURRENT_DATE);
alter table CarteBancaire
add constraint CK_dateEnregistrement CHECK (dateEnregistrement <= CURRENT_DATE);
alter table Commande
add constraint CK_dateCommande CHECK (dateCommande <= CURRENT_DATE);
alter table QuestionFormulaire
add constraint CK_dateEnvoi CHECK (dateEnvoi <= CURRENT_DATE);
alter table HistoriqueConsultation
add constraint CK_dateConsultation CHECK (dateConsultation <= CURRENT_DATE);
alter table Paiement
add constraint CK_datePaiement CHECK (datePaiement <= CURRENT_DATE);

/*
FORMAT EMAIL
Client.emailClient
QuestionFormulaire.emailPersonne
SignalementAvis.emailSignalement
*/

alter table Client
add constraint CK_emailClient CHECK (emailClient ~ '^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9.-]+$');
alter table QuestionFormulaire
add constraint CK_emailPersonne CHECK (emailPersonne ~ '^^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9.-]+$');
alter table SignalementAvis
add constraint CK_emailSignalement CHECK (emailSignalement ~ '^^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9.-]+$');

/*
INLIST
Client.civiliteClient ('H','F','X')
*/

alter table Client
add constraint CK_civiliteClient CHECK (civiliteClient IN ('H','F','X'));

/*
MORE OR EQUAL TO 0
Client.pointFideliteClient
Coloration.quantiteStock
Coloration.prixSolde
Coloration.prixVente
CompositionProduit.prixSoldeComposition
CompositionProduit.prixVenteComposition
Produit.coutLivraison
*/

alter table Client
add constraint CK_pointFideliteClient CHECK (pointFideliteClient >= 0);
alter table Coloration
add constraint CK_quantiteStock CHECK (quantiteStock >= 0),
add constraint CK_prixSolde CHECK (prixSolde >= 0),
add constraint CK_prixVente CHECK (prixVente >= 0);
alter table CompositionProduit
add constraint CK_prixSoldeComposition CHECK (prixSoldeComposition >= 0),
add constraint CK_prixVenteComposition CHECK (prixVenteComposition >= 0);
alter table Produit
add constraint CK_coutLivraison CHECK (coutLivraison >= 0);

/*
MORE THAN 0
CodePromo.valeurReduction
DetailCommande.quantiteCommande
DetailComposition.quantiteComposition
DetailPanier.quantitePanier
Paiement.montantPaiement
Produit.nbPaiementMax
*/

alter table CodePromo
add constraint CK_valeurReduction CHECK (valeurReduction > 0);
alter table DetailCommande
add constraint CK_quantiteCommande CHECK (quantiteCommande > 0);
alter table DetailComposition
add constraint CK_quantiteComposition CHECK (quantiteComposition > 0);
alter table DetailPanier
add constraint CK_quantitePanier CHECK (quantitePanier > 0);
alter table Paiement
add constraint CK_montantPaiement CHECK (montantPaiement > 0);
alter table Produit
add constraint CK_nbPaiementMax CHECK (nbPaiementMax > 0);

/*
HEXADECIMAL
Couleur.rgbCouleur
*/

alter table Couleur
add constraint CK_rgbCouleur CHECK (rgbCouleur ~ '^[0-9|a-f]+$');

/*
BETWEEN
AvisProduit.noteAvis [0;4]
*/

alter table AvisProduit
add constraint CK_noteAvis CHECK (noteAvis BETWEEN 0 AND 4);

/*==============================================================*/
/*                                                              */
/*                                                              */
/*                           INSERT                             */
/*                                                              */
/*                                                              */
/*==============================================================*/

/*==============================================================*/
/* INSERT : ACTIONFORMULAIRE                                    */
/*==============================================================*/
insert into ACTIONFORMULAIRE (idaction, nomaction) values 
(1,'Remboursement'),
(2,'Colis non-livré'),
(3,'Problème de payement'),
(4,'Produit Défectueux '),
(5,'Question produit');
/*==============================================================*/
/* INSERT : ACTIVITEPRO                                         */
/*==============================================================*/
INSERT INTO ActivitePro(idActivitepro,nomActivitePro) VALUES (1,'Hôtel');
INSERT INTO ActivitePro(idActivitepro,nomActivitePro) VALUES (2,'Restauration');
INSERT INTO ActivitePro(idActivitepro,nomActivitePro) VALUES (3,'Bureaux');
INSERT INTO ActivitePro(idActivitepro,nomActivitePro) VALUES (4,'Architectes');

/*==============================================================*/
/* INSERT : PAYS                                                */
/*==============================================================*/
insert into Pays (idPays, nomPays) values
(1,'France'),
(2,'Italie'),
(3, 'Allemagne'),
(4, 'Chine'),
(5, 'Belgique'),
(6, 'Suisse');

/*==============================================================*/
/* INSERT : CLIENT                                              */
/*==============================================================*/
INSERT INTO Client (idclient,nomClient,prenomClient,civiliteClient,emailClient,telFixeClient,telPortableClient,dateCreationCompte,saltMdp,hashMdp,pointFideliteClient,newsletterMiliboo,newsletterPartenaires)
VALUES
  (1,'Leonard','Walker','H','walker1171@yahoo.com','33978274915','33730323274','2023-03-25','JUQ58knq5QH','LBC44IHT2M6TL6ng144Jgtn247X',6,True,True),
  (2,'Barton','Abigail','H','abigail9237@google.com','33115852779','33684113682','2023-09-26','FYC89jmo4FH','BFF15FRD9C5YY8mw747Hqiz493N',1,True,False),
  (3,'Washington','Xyla','F','xyla@google.com','33134955394','33725292962','2023-05-20','BQK58zjp3OV','LMK29SJO8P5MV3kn248Oibn841K',14,True,False),
  (4,'Atkins','Joan','F','joan@yahoo.com','33336875746','33732889596','2023-07-02','LJE40lde6ND','MIE57JLT8Y7QJ1ih584Jddg131X',7,True,True),
  (5,'Castro','Linus',null,'linus571@google.com','33286845747','33686484175','2023-10-04','SOA72kpz8XC','GTJ13YKF1J3OK4ee437Vcsy419S',3,False,False),
  (6,'Fry','Ori',null,'ori@google.com','33374887437','33694514841','2023-09-10','NKF60ojm5XU','EGW56JJC4P8BE1lb186Dymq376U',10,True,True),
  (7,'Cooper','Robin','H','robin@icloud.com','33128856477','33790968927','2023-03-10','FPW26cvf8KR','KIR07XLT8M1KY8lh285Rtqy662B',24,False,False),
  (8,'Valdez','Brynne','H','brynne@yahoo.com','33976207843','33793233282','2023-04-18','UPU83mva5RP','DSQ12WOX2A8GE7jr096Jrgg384N',16,True,True),
  (9,'Brock','Grady','F','grady@google.com','33583797716','33683855701','2023-12-09','SER79gbd1NX','FAJ55CBH5A6WF7gv767Zrsq938M',17,False,False),
  (10,'Bolton','Alexandra','F','alexandra526@icloud.com','33331466197','33710461874','2023-08-02','TFY52ckg3RT','XUN55MNR1G7TW1eh913Noku184M',14,True,False),
  (11,'Peterson','Murphy',null,'murphy2551@icloud.com','33261479712','33609378658','2023-10-04','RYU53ntn3KO','JRM89DOP4F7PS2ot373Cqkg819B',24,True,True),
  (12,'Johns','Leroy',null,'leroy8030@icloud.com','33461692838','33723089145','2023-05-25','NLG86pjd4LM','FMP78QHU1J2EF8pi068Reji123A',24,True,True),
  (13,'Garza','Rhea','H','rhea@icloud.com','33275716763','33773638746','2023-09-29','CKP12pim5NF','DSI91IED0N3SY8qa458Qcnz813O',19,True,True),
  (14,'Rowe','Clinton','H','clinton8144@icloud.com','33232293267','33781388753','2023-08-12','TPQ93vpd5JX','IKE48YNU5W0IU9wp574Dufq901K',5,False,False),
  (15,'Kemp','Ferris','F','ferris6399@icloud.com','33257171445','33675056992','2023-12-08','YBR93kix6PW','CPJ01BEL7N2IQ7xn217Yyps556R',23,False,False),
  (16,'Cherry','Nero','F','nero@yahoo.com','33555724445','33683121748','2023-04-17','HEH03cwx5HH','GCJ55CAO2S3VK0eq597Yium576H',20,True,False),
  (17,'Rivera','Hop',null,'hop437@icloud.com','33925512814','33729032368','2023-01-18','BEU12cco0EY','UCX49SZV8J4SE6kx536Pqcb677I',9,True,True),
  (18,'Vasquez','Mannix',null,'mannix@icloud.com','33543698679','33731916652','2023-12-19','JAF46ppv8AJ','EUU63CFK9D2OG6lu371Hort429C',9,True,False),
  (19,'Robbins','Lacey','H','lacey6588@icloud.com','33941857843','33615444457','2023-06-08','DYH47ctu1ZM','MPJ84WWI3C4BO9pj235Otjx283V',23,True,True),
  (20,'Matthews','Theodore','H','theodore7592@icloud.com','33564725437','33742317107','2023-03-19','EGV65uwq7TE','VCJ40CBC1R0BC5pt882Vwys782N',6,False,False),
  (21,'Gonzalez','Kellie','F','kellie@google.com','33333886218','33717443389','2023-03-14','VFT44akk2HR','AIE77HXE2S5HQ2qs557Gbcw290O',22,False,False),
  (22,'Gonzalez','Sonya','F','sonya9752@icloud.com','33336454426','33725697744','2023-09-08','MNX96mwt5WX','JRC61HAD4S1WU5gc861Srkh080Q',17,True,False),
  (23,'Atkins','Nichole',null,'nichole@icloud.com','33296348795','33764122278','2023-10-13','DFN01tue4GD','JHP14SBE7N6WE1qz074Pqjx293Q',14,True,True),
  (24,'Greer','Delilah',null,'delilah@google.com','33216596853','33713383062','2023-03-18','ZEX67qie0EI','DWB33OLK7Z8KH3ah707Jnmg143X',22,False,True),
  (25,'Fox','Ivan','H','ivan3742@yahoo.com','33537147457','33619619892','2023-07-16','ALP70quk3RQ','PFN93URV7W7QJ7dh678Gfte538E',4,False,False),
  (26,'Battle','Roanna','H','roanna@icloud.com','33544765485','33754322866','2023-09-15','HYK76ibb0BO','MEG08GWA1W8TH8sd326Tjxw046S',24,True,True),
  (27,'Frye','Ria','F','ria@icloud.com','33158285426','33717466152','2023-05-13','OGK22ksu3EC','VSV56POF4R4YY6is212Xuxc871T',3,True,False),
  (28,'Young','Upton','F','upton@icloud.com','33854224854','33645473787','2023-01-23','QFF74qoh8BO','GQT64FKO7H0HM1di647Jixf961K',20,True,False),
  (29,'Quinn','Bo',null,'bo7180@icloud.com','33453541672','33618032936','2023-10-21','DGK81ijp3CW','FPS86DVE7J8PS2tv247Qklb571R',19,False,True),
  (30,'Cherry','Shannon',null,'shannon@google.com','33927723136','33680345388','2023-04-24','VLE06dtr6LB','KQH45WFQ8V4QX5vb186Ryxl224I',7,False,False),
  (31,'Byers','Fulton','H','fulton7661@yahoo.com','33246623219','33650144094','2023-12-09','IGR85ueu6IC','YQZ76BBO8E1XY9rn171Rchp736C',22,False,True),
  (32,'Wilder','Cassandra','H','cassandra@icloud.com','33257818977','33712129217','2023-03-27','VQX23rgw1KW','UTN58IMT5J2PN0lg189Xfks906Y',7,False,False),
  (33,'Velasquez','Sydnee','F','sydnee1445@yahoo.com','33551353532','33717264054','2023-01-28','ROI55ped2PQ','LQD19OQP4G6ZX8ze421Wjbt675D',21,False,True),
  (34,'Witt','Jamalia','F','jamalia2012@google.com','33567463534','33683829228','2023-09-04','NBD31xwc9WM','PEW64AXP5J2VY8ii684Hhku314J',8,True,True),
  (35,'Smith','Rose',null,'rose2234@google.com','33563727764','33683514773','2023-10-18','SHD86hfq2YS','LRI04HVX9B2TR9zo187Jxyc765X',2,True,True),
  (36,'Benton','Ignacia',null,'ignacia894@icloud.com','33226336671','33665826305','2023-05-18','LGG75csm2YA','DZM84XTB6U6EE0wp366Hyvv251M',12,True,True),
  (37,'Freeman','Rafael','H','rafael@icloud.com','33437866732','33776053147','2023-10-28','BKM55yuf9MW','KOD13WAT2I6DM7on097Ltet357S',2,False,False),
  (38,'George','Hilel','H','hilel6964@icloud.com','33917863651','33647126716','2023-12-15','LDQ35tjs4UY','VVV07IVW8C2QQ0qs721Sgzh109N',16,False,True),
  (39,'Chambers','Hakeem','F','hakeem@icloud.com','33931836771','33709597258','2023-12-21','UIN79diw2RG','KAG58QNO8R4OH5nw643Rhhs881S',17,True,False),
  (40,'Workman','Hyatt','F','hyatt4443@yahoo.com','33151538482','33646660612','2023-12-15','JJC87enz4GR','EWZ66EBX8Q2VQ2gg770Cgbb833M',18,True,True),
  (41,'Mitchell','Cameran',null,'cameran8720@icloud.com','33372323857','33611127329','2023-09-07','WAY75kuo2ZC','CGK70IHR2U5RN4ux149Ozxp188O',12,True,False),
  (42,'Koch','Jael',null,'jael9888@yahoo.com','33344752635','33629278495','2023-01-26','FWR12uft7WQ','KIM58JYE5B2OM2gj837Awco381G',10,True,False),
  (43,'Garza','Levi','H','levi@yahoo.com','33549433181','33674188368','2023-01-21','UYS53nhm7GA','CLT87HAC2N3XD8oi884Nobf615F',19,True,False),
  (44,'Wilder','Clarke','H','clarke9527@icloud.com','33842462371','33646127156','2023-10-19','JHG67tkw0GJ','DRU22OGG9L6NV4ju673Akkr347Y',25,False,True),
  (45,'Webb','Quemby','F','quemby@yahoo.com','33328482523','33712216688','2023-01-15','CSJ56bis5BZ','NLN88ZHN6B9ND7hl433Llfx246G',1,True,True),
  (46,'Patton','Cassady','F','cassady9248@google.com','33472762166','33665714034','2023-12-13','YWH12dct6WS','DBI02CUY9C8DJ2lx156Vjmy911J',8,True,True),
  (47,'Hays','Brent',null,'brent9988@yahoo.com','33276914478','33730671116','2023-03-22','MMM34hmi3QJ','GRD03FLW5Q7FC0is939Jhpi631E',18,False,False),
  (48,'Adams','Quamar',null,'quamar3771@yahoo.com','33868817649','33649215380','2023-12-10','PRZ73gvy7QZ','MOK43QIO3M7SW2jc436Iymk161S',14,False,False),
  (49,'Drake','Ivor','H','ivor@yahoo.com','33922638123','33615117295','2023-10-12','UCI63ckw6VF','IPB94JRW0T2II5dx421Gxpp134B',5,True,True),
  (50,'Hill','Macy','H','macy5455@icloud.com','33145324337','33613290239','2023-03-02','RLT25sck3XE','SYR58WSG4N7IL3cj218Oooe278S',24,True,True);

/*==============================================================*/
/* INSERT : ADRESSE                                             */
/*==============================================================*/
INSERT INTO Adresse(idClient,idPays,nomAdresse,numeroRue,nomRue,codepostaladresse,ville) VALUES (1,1,'Maison',12,'Rue de la République',74000,'Annecy');
INSERT INTO Adresse(idClient,idPays,nomAdresse,numeroRue,nomRue,codepostaladresse,ville) VALUES (2,1,NULL,22,'Avenue de Genève',74000,'Annecy');
INSERT INTO Adresse(idClient,idPays,nomAdresse,numeroRue,nomRue,codepostaladresse,ville) VALUES (3,1,'Travail',8,'Rue des Alpes',74300,'Cluses');
INSERT INTO Adresse(idClient,idPays,nomAdresse,numeroRue,nomRue,codepostaladresse,ville) VALUES (4,1,NULL,5,'Rue de la Paix',74500,'Publier');
INSERT INTO Adresse(idClient,idPays,nomAdresse,numeroRue,nomRue,codepostaladresse,ville) VALUES (5,1,'Maison',10,'Boulevard de la Rive',74000,'Annecy');
INSERT INTO Adresse(idClient,idPays,nomAdresse,numeroRue,nomRue,codepostaladresse,ville) VALUES (6,1,NULL,50,'Rue de la Liberté',74320,'Sévrier');
INSERT INTO Adresse(idClient,idPays,nomAdresse,numeroRue,nomRue,codepostaladresse,ville) VALUES (7,1,NULL,19,'Avenue des Aravis',74940,'Annecy-le-Vieux');
INSERT INTO Adresse(idClient,idPays,nomAdresse,numeroRue,nomRue,codepostaladresse,ville) VALUES (8,1,'Maison',33,'Rue de la Mairie',74600,'Seynod');
INSERT INTO Adresse(idClient,idPays,nomAdresse,numeroRue,nomRue,codepostaladresse,ville) VALUES (9,1,NULL,3,'Rue du Clos',74490,'Saint-Jorioz');
INSERT INTO Adresse(idClient,idPays,nomAdresse,numeroRue,nomRue,codepostaladresse,ville) VALUES (10,1,'Travail',17,'Rue des Cerisiers',74000,'Annecy');
INSERT INTO Adresse(idClient,idPays,nomAdresse,numeroRue,nomRue,codepostaladresse,ville) VALUES (11,1,'Maison',14,'Rue des Frères Lumière',74330,'Epagny');
INSERT INTO Adresse(idClient,idPays,nomAdresse,numeroRue,nomRue,codepostaladresse,ville) VALUES (12,1,NULL,4,'Rue des Érables',74600,'Seynod');
INSERT INTO Adresse(idClient,idPays,nomAdresse,numeroRue,nomRue,codepostaladresse,ville) VALUES (13,1,'Travail',11,'Rue des Pommiers',74510,'Sammy');
INSERT INTO Adresse(idClient,idPays,nomAdresse,numeroRue,nomRue,codepostaladresse,ville) VALUES (14,1,'Maison',99,'Rue de la Montagne',74500,'Publier');
INSERT INTO Adresse(idClient,idPays,nomAdresse,numeroRue,nomRue,codepostaladresse,ville) VALUES (15,1,NULL,27,'Rue de la Gare',74130,'Contamine-sur-Arve');
INSERT INTO Adresse(idClient,idPays,nomAdresse,numeroRue,nomRue,codepostaladresse,ville) VALUES (16,1,NULL,18,'Rue de la Rive',74800,'La Roche-sur-Foron');
INSERT INTO Adresse(idClient,idPays,nomAdresse,numeroRue,nomRue,codepostaladresse,ville) VALUES (17,1,'IUT',60,'Chemin des Sables',74410,'Saint-Jorioz');
INSERT INTO Adresse(idClient,idPays,nomAdresse,numeroRue,nomRue,codepostaladresse,ville) VALUES (18,1,NULL,25,'Rue du Pré de l''Etang',74410,'Doussard');
INSERT INTO Adresse(idClient,idPays,nomAdresse,numeroRue,nomRue,codepostaladresse,ville) VALUES (19,1,NULL,30,'Avenue de la Poste',74540,'Alby-sur-Chéran');
INSERT INTO Adresse(idClient,idPays,nomAdresse,numeroRue,nomRue,codepostaladresse,ville) VALUES (20,1,NULL,7,'Route de Montée',74930,'Péron');
INSERT INTO Adresse(idClient,idPays,nomAdresse,numeroRue,nomRue,codepostaladresse,ville) VALUES (21,1,NULL,13,'Rue des Coteaux',74540,'Iserand');
INSERT INTO Adresse(idClient,idPays,nomAdresse,numeroRue,nomRue,codepostaladresse,ville) VALUES (22,1,'Travail',23,'Chemin de la Combe',74500,'Publier');
INSERT INTO Adresse(idClient,idPays,nomAdresse,numeroRue,nomRue,codepostaladresse,ville) VALUES (23,1,'Maison',2,'Avenue de la Plage',74320,'Sévrier');
INSERT INTO Adresse(idClient,idPays,nomAdresse,numeroRue,nomRue,codepostaladresse,ville) VALUES (24,1,NULL,10,'Rue des Pins',74500,'Veyrier');
INSERT INTO Adresse(idClient,idPays,nomAdresse,numeroRue,nomRue,codepostaladresse,ville) VALUES (25,1,'Travail',9,'Rue de la Montagne',74210,'Faverges');
INSERT INTO Adresse(idClient,idPays,nomAdresse,numeroRue,nomRue,codepostaladresse,ville) VALUES (26,1,NULL,6,'Rue des Vergers',74000,'Annecy');
INSERT INTO Adresse(idClient,idPays,nomAdresse,numeroRue,nomRue,codepostaladresse,ville) VALUES (27,1,'Maison',44,'Rue des Berges',74510,'Sammy');
INSERT INTO Adresse(idClient,idPays,nomAdresse,numeroRue,nomRue,codepostaladresse,ville) VALUES (28,1,NULL,15,'Rue du Val Claret',74400,'Chamonix');
INSERT INTO Adresse(idClient,idPays,nomAdresse,numeroRue,nomRue,codepostaladresse,ville) VALUES (29,1,'Travail',28,'Avenue des Alpes',74960,'Cran-Gevrier');
INSERT INTO Adresse(idClient,idPays,nomAdresse,numeroRue,nomRue,codepostaladresse,ville) VALUES (30,1,'Maison',50,'Rue de la Forêt',74600,'Seynod');
INSERT INTO Adresse(idClient,idPays,nomAdresse,numeroRue,nomRue,codepostaladresse,ville) VALUES (31,1,NULL,3,'Rue de la Roseraie',74400,'Chamonix');
INSERT INTO Adresse(idClient,idPays,nomAdresse,numeroRue,nomRue,codepostaladresse,ville) VALUES (32,1,'Travail',12,'Rue du Coteau',74350,'Cruseilles');
INSERT INTO Adresse(idClient,idPays,nomAdresse,numeroRue,nomRue,codepostaladresse,ville) VALUES (33,1,'Maison',11,'Rue de la Combe',74520,'La Clusaz');
INSERT INTO Adresse(idClient,idPays,nomAdresse,numeroRue,nomRue,codepostaladresse,ville) VALUES (34,1,NULL,22,'Rue des 3 Fontaines',74370,'Pringy');
INSERT INTO Adresse(idClient,idPays,nomAdresse,numeroRue,nomRue,codepostaladresse,ville) VALUES (35,1,NULL,4,'Rue des Moulins',74100,'Annemasse');
INSERT INTO Adresse(idClient,idPays,nomAdresse,numeroRue,nomRue,codepostaladresse,ville) VALUES (36,1,NULL,18,'Rue du Lac',74400,'Chamonix');
INSERT INTO Adresse(idClient,idPays,nomAdresse,numeroRue,nomRue,codepostaladresse,ville) VALUES (37,1,NULL,16,'Rue de la Fraternité',74380,'Bonneville');
INSERT INTO Adresse(idClient,idPays,nomAdresse,numeroRue,nomRue,codepostaladresse,ville) VALUES (38,1,NULL,32,'Rue de la Ville',74500,'Publier');
INSERT INTO Adresse(idClient,idPays,nomAdresse,numeroRue,nomRue,codepostaladresse,ville) VALUES (39,1,'Maison',21,'Avenue des Genêts',74400,'Chamonix');
INSERT INTO Adresse(idClient,idPays,nomAdresse,numeroRue,nomRue,codepostaladresse,ville) VALUES (40,1,NULL,12,'Rue du Château',74380,'Bonneville');
INSERT INTO Adresse(idClient,idPays,nomAdresse,numeroRue,nomRue,codepostaladresse,ville) VALUES (41,1,NULL,7,'Avenue des Ecoles',74000,'Annecy');
INSERT INTO Adresse(idClient,idPays,nomAdresse,numeroRue,nomRue,codepostaladresse,ville) VALUES (42,1,NULL,40,'Rue du Bourg',74500,'Veyrier');
INSERT INTO Adresse(idClient,idPays,nomAdresse,numeroRue,nomRue,codepostaladresse,ville) VALUES (43,1,NULL,8,'Rue des Cèdres',74600,'Seynod');
INSERT INTO Adresse(idClient,idPays,nomAdresse,numeroRue,nomRue,codepostaladresse,ville) VALUES (44,1,'Travail',27,'Rue de la Croix Blanche',74200,'Thonon-les-Bains');
INSERT INTO Adresse(idClient,idPays,nomAdresse,numeroRue,nomRue,codepostaladresse,ville) VALUES (45,1,'Maison',5,'Rue de la Gare',74370,'Pringy');
INSERT INTO Adresse(idClient,idPays,nomAdresse,numeroRue,nomRue,codepostaladresse,ville) VALUES (46,1,NULL,34,'Rue du Pont',74500,'Publier');
INSERT INTO Adresse(idClient,idPays,nomAdresse,numeroRue,nomRue,codepostaladresse,ville) VALUES (47,1,'Travail',14,'Rue des Platanes',74000,'Annecy');
INSERT INTO Adresse(idClient,idPays,nomAdresse,numeroRue,nomRue,codepostaladresse,ville) VALUES (48,1,'Maison',24,'Rue de la Croix',74600,'Seynod');
INSERT INTO Adresse(idClient,idPays,nomAdresse,numeroRue,nomRue,codepostaladresse,ville) VALUES (49,1,NULL,20,'Rue des Tilleuls',74410,'Doussard');
INSERT INTO Adresse(idClient,idPays,nomAdresse,numeroRue,nomRue,codepostaladresse,ville) VALUES (50,1,NULL,31,'Rue des Lilas',74600,'Seynod');

/*==============================================================*/
/* INSERT : CARTEBANCAIRE                                       */
/*==============================================================*/
INSERT INTO CarteBancaire(idClient,nomCarteBancaire,dateEnregistrement,numCarteBancaire,dateExpirationCarte) VALUES (3,NULL,'2023-01-12','4532019876325170','2023-12-25');
INSERT INTO CarteBancaire(idClient,nomCarteBancaire,dateEnregistrement,numCarteBancaire,dateExpirationCarte) VALUES (4,'John Doe','2023-02-18','5123456789101230','2023-11-24');
INSERT INTO CarteBancaire(idClient,nomCarteBancaire,dateEnregistrement,numCarteBancaire,dateExpirationCarte) VALUES (6,'Alice Smith','2023-03-05','6012345678901120','2023-08-23');
INSERT INTO CarteBancaire(idClient,nomCarteBancaire,dateEnregistrement,numCarteBancaire,dateExpirationCarte) VALUES (12,NULL,'2023-04-22','4111222233334440','2023-09-26');
INSERT INTO CarteBancaire(idClient,nomCarteBancaire,dateEnregistrement,numCarteBancaire,dateExpirationCarte) VALUES (15,'Bob Johnson','2023-05-10','4532019876327850','2023-01-27');
INSERT INTO CarteBancaire(idClient,nomCarteBancaire,dateEnregistrement,numCarteBancaire,dateExpirationCarte) VALUES (16,'Marie Dupont','2023-06-03','5123456789105640','2023-06-27');
INSERT INTO CarteBancaire(idClient,nomCarteBancaire,dateEnregistrement,numCarteBancaire,dateExpirationCarte) VALUES (17,NULL,'2023-07-16','6012345678908760','2023-03-24');
INSERT INTO CarteBancaire(idClient,nomCarteBancaire,dateEnregistrement,numCarteBancaire,dateExpirationCarte) VALUES (17,'Mark Taylor','2023-08-09','4111222233331120','2023-05-26');
INSERT INTO CarteBancaire(idClient,nomCarteBancaire,dateEnregistrement,numCarteBancaire,dateExpirationCarte) VALUES (18,'Emily White','2023-09-14','4532019876322200','2023-12-27');
INSERT INTO CarteBancaire(idClient,nomCarteBancaire,dateEnregistrement,numCarteBancaire,dateExpirationCarte) VALUES (28,NULL,'2023-10-01','5123456789104560','2023-02-27');
INSERT INTO CarteBancaire(idClient,nomCarteBancaire,dateEnregistrement,numCarteBancaire,dateExpirationCarte) VALUES (36,'Jack Miller','2023-11-07','6012345678901120','2023-07-24');
INSERT INTO CarteBancaire(idClient,nomCarteBancaire,dateEnregistrement,numCarteBancaire,dateExpirationCarte) VALUES (39,'Sarah Brown','2023-12-15','4111222233336670','2023-09-25');
INSERT INTO CarteBancaire(idClient,nomCarteBancaire,dateEnregistrement,numCarteBancaire,dateExpirationCarte) VALUES (45,NULL,'2023-12-30','4532019876329980','2023-10-26');

/*==============================================================*/
/* INSERT : PHOTO                                               */
/*==============================================================*/
INSERT INTO Photo(sourcePhoto,descriptionPhoto) VALUES ('https://exemple.com/photo1.jpg','Photo avis 1');
INSERT INTO Photo(sourcePhoto,descriptionPhoto) VALUES ('https://exemple.com/photo2.jpg','Photo avis 2');
INSERT INTO Photo(sourcePhoto,descriptionPhoto) VALUES ('https://exemple.com/photo3.jpg','Photo avis 3');
INSERT INTO Photo(sourcePhoto,descriptionPhoto) VALUES ('https://exemple.com/photo4.jpg','Photo avis 4');
INSERT INTO Photo(sourcePhoto,descriptionPhoto) VALUES ('https://exemple.com/photo5.jpg','Photo avis 5');
INSERT INTO Photo(sourcePhoto,descriptionPhoto) VALUES ('https://exemple.com/photo6.jpg','Photo avis 6');
INSERT INTO Photo(sourcePhoto,descriptionPhoto) VALUES ('https://exemple.com/photo7.jpg','Photo avis 7');
INSERT INTO Photo(sourcePhoto,descriptionPhoto) VALUES ('https://exemple.com/photo8.jpg','Photo avis 8');
INSERT INTO Photo(sourcePhoto,descriptionPhoto) VALUES ('https://exemple.com/photo9.jpg','Photo avis 9');
INSERT INTO Photo(sourcePhoto,descriptionPhoto) VALUES ('https://exemple.com/photo10.jpg','Photo avis 10');
INSERT INTO Photo(sourcePhoto,descriptionPhoto) VALUES ('https://exemple.com/photo11.jpg','Photo avis 11');
INSERT INTO Photo(sourcePhoto,descriptionPhoto) VALUES ('https://exemple.com/photo12.jpg','Photo avis 12');
INSERT INTO Photo(sourcePhoto,descriptionPhoto) VALUES ('https://exemple.com/photo13.jpg','Photo avis 13');
INSERT INTO Photo(sourcePhoto,descriptionPhoto) VALUES ('https://exemple.com/photo14.jpg','Photo avis 14');
INSERT INTO Photo(sourcePhoto,descriptionPhoto) VALUES ('https://exemple.com/photo15.jpg','Photo Categorie 1');
INSERT INTO Photo(sourcePhoto,descriptionPhoto) VALUES ('https://exemple.com/photo16.jpg','Photo Categorie 2');
INSERT INTO Photo(sourcePhoto,descriptionPhoto) VALUES ('https://exemple.com/photo17.jpg','Photo Categorie 3');
INSERT INTO Photo(sourcePhoto,descriptionPhoto) VALUES ('https://exemple.com/photo18.jpg','Photo Categorie 4');
INSERT INTO Photo(sourcePhoto,descriptionPhoto) VALUES ('https://exemple.com/photo19.jpg','Photo Categorie 5');
INSERT INTO Photo(sourcePhoto,descriptionPhoto) VALUES ('https://exemple.com/photo20.jpg','Photo Categorie 6');
INSERT INTO Photo(sourcePhoto,descriptionPhoto) VALUES ('https://exemple.com/photo21.jpg','Photo Categorie 7');
INSERT INTO Photo(sourcePhoto,descriptionPhoto) VALUES ('https://exemple.com/photo22.jpg','Photo Categorie 8');
INSERT INTO Photo(sourcePhoto,descriptionPhoto) VALUES ('https://exemple.com/photo23.jpg','Photo Categorie 9');
INSERT INTO Photo(sourcePhoto,descriptionPhoto) VALUES ('https://exemple.com/photo24.jpg','Photo Categorie 10');
INSERT INTO Photo(sourcePhoto,descriptionPhoto) VALUES ('https://exemple.com/photo25.jpg','Photo Categorie 11');
INSERT INTO Photo(sourcePhoto,descriptionPhoto) VALUES ('https://exemple.com/photo26.jpg','Photo Categorie 12');
INSERT INTO Photo(sourcePhoto,descriptionPhoto) VALUES ('https://exemple.com/photo27.jpg','Photo Categorie 13');
INSERT INTO Photo(sourcePhoto,descriptionPhoto) VALUES ('https://exemple.com/photo28.jpg','Photo Categorie 14');
INSERT INTO Photo(sourcePhoto,descriptionPhoto) VALUES ('https://exemple.com/photo29.jpg','Photo Categorie 15');
INSERT INTO Photo(sourcePhoto,descriptionPhoto) VALUES ('https://exemple.com/photo30.jpg','Photo Categorie 16');
INSERT INTO Photo(sourcePhoto,descriptionPhoto) VALUES ('https://exemple.com/photo31.jpg','Photo Produit 1 Coloration 5');
INSERT INTO Photo(sourcePhoto,descriptionPhoto) VALUES ('https://exemple.com/photo32.jpg','Photo Produit 2 Coloration 1');
INSERT INTO Photo(sourcePhoto,descriptionPhoto) VALUES ('https://exemple.com/photo33.jpg','Photo Produit 3 Coloration 1');
INSERT INTO Photo(sourcePhoto,descriptionPhoto) VALUES ('https://exemple.com/photo34.jpg','Photo Produit 4 Coloration 1');
INSERT INTO Photo(sourcePhoto,descriptionPhoto) VALUES ('https://exemple.com/photo35.jpg','Photo Produit 5 Coloration 5');
INSERT INTO Photo(sourcePhoto,descriptionPhoto) VALUES ('https://exemple.com/photo36.jpg','Photo Produit 6 Coloration 3');
INSERT INTO Photo(sourcePhoto,descriptionPhoto) VALUES ('https://exemple.com/photo37.jpg','Photo Produit 7 Coloration 1');
INSERT INTO Photo(sourcePhoto,descriptionPhoto) VALUES ('https://exemple.com/photo38.jpg','Photo Produit 8 Coloration 1');
INSERT INTO Photo(sourcePhoto,descriptionPhoto) VALUES ('https://exemple.com/photo39.jpg','Photo Produit 9 Coloration 1');
INSERT INTO Photo(sourcePhoto,descriptionPhoto) VALUES ('https://exemple.com/photo40.jpg','Photo Produit 10 Coloration 3');
INSERT INTO Photo(sourcePhoto,descriptionPhoto) VALUES ('https://exemple.com/photo41.jpg','Photo Produit 11 Coloration 2');
INSERT INTO Photo(sourcePhoto,descriptionPhoto) VALUES ('https://exemple.com/photo42.jpg','Photo Produit 12 Coloration 2');
INSERT INTO Photo(sourcePhoto,descriptionPhoto) VALUES ('https://exemple.com/photo43.jpg','Photo Produit 13 Coloration 3');
INSERT INTO Photo(sourcePhoto,descriptionPhoto) VALUES ('https://exemple.com/photo44.jpg','Photo Produit 14 Coloration 4');
INSERT INTO Photo(sourcePhoto,descriptionPhoto) VALUES ('https://exemple.com/photo45.jpg','Photo Produit 15 Coloration 4');
INSERT INTO Photo(sourcePhoto,descriptionPhoto) VALUES ('https://exemple.com/photo46.jpg','Photo Produit 16 Coloration 1');
INSERT INTO Photo(sourcePhoto,descriptionPhoto) VALUES ('https://exemple.com/photo47.jpg','Photo Produit 17 Coloration 4');

/*==============================================================*/
/* INSERT : CATEGORIEPRODUIT                                    */
/*==============================================================*/
insert into CategorieProduit (idCategorie, IDSOUSCATEGORIE, idphoto, nomcategorie, descriptionCategorie, estFiltrable) values 
(1,null,null ,'Canapé & Fauteuil', 'Contient les canapés & les fauteuils', TRUE),
(2,null,15 ,'Chaise & tabouret', 'Contient les chaises et les tabourets', TRUE),
(3,null,null ,'Bureau', 'Contient les différents éléments d''un bureau', TRUE),
(4,null,16 ,'Table', 'Contient les Tables', TRUE),
(5,null,17 ,'Rangement', 'Contient les meubles de Rangement', TRUE),
(6,null,null ,'Chambre', 'Contient les éléments d''une Chambre', TRUE),
(7,null,18 ,'Enfant', 'Contient les meubles pour enfant', TRUE),
(8,null,null ,'Jardin', 'Contient les éléments de Jardin', TRUE),
(9,null,null ,'Luminaire', 'Contient les Luminaires', TRUE),
(10,null,20 ,'Déco', 'Contient les éléments de Déco', TRUE),
(11,null,null ,'Meubles reconditionnée', 'Contient les Meubles reconditionnée', TRUE),
(12,1,null ,'Canapé', 'Contient les canapés', TRUE),
(13,1,null ,'Canapé design', 'Contient les Canapés design', TRUE),
(14,1,28 ,'Fauteuil', 'Contient les Fauteuils', TRUE),
(15,2,null ,'Chaise', 'Contient les Chaises', TRUE),
(16,2,null ,'Chaise design', 'Contient les Chaises design', TRUE),
(17,2,21 ,'Tabouret', 'Contient les Tabourets', TRUE),
(18,3,null ,'Fauteuil de bureau', 'Contient Fauteuils de bureau', TRUE),
(19,3,null ,'Bureau design', 'Contient les Bureaux design', TRUE),
(20,4,19 ,'Table a manger', 'Contient les Tables a manger', TRUE),
(21,4,null ,'Table basse', 'Contient les Tables basse', TRUE),
(22,5,null ,'Bibliothèque et étagère', 'Contient les Bibliothèques et étagères', TRUE),
(23,5,25 ,'meuble TV', 'Contient les meubles TV', TRUE),
(24,6,null ,'Lit adulte', 'Contient les Lits adulte', TRUE),
(25,6,null ,'Tête de lit', 'Contient les Têtes de lit', TRUE),
(26,7,null ,'Fauteuil enfant', 'Contient les Fauteuils enfant', TRUE),
(27,7,24 ,'Rangement enfant', 'Contient les Rangements enfant', TRUE),
(28,8,null ,'Salon de jardin', 'Contient les Salons de jardin', TRUE),
(29,8,null ,'Chaise de jardin', 'Contient les Chaises de jardin', TRUE),
(30,9,29 ,'Lampe à poser', 'Contient les Lampes a poser', TRUE),
(31,9,null ,'Suspension', 'Contient les Suspensions', TRUE),
(32,10,null ,'Etagère mural', 'Contient les Etagères mural', TRUE),
(33,10,null ,'Décoration mural', 'Contient les Décorations mural', TRUE);

/*==============================================================*/
/* INSERT : STATUTCOMMANDE                                      */
/*==============================================================*/
INSERT INTO statutcommande(idStatut,nomStatut) VALUES (1,'Devis');
INSERT INTO statutcommande(idStatut,nomStatut) VALUES (2,'En Attente de liTRUEson');
INSERT INTO statutcommande(idStatut,nomStatut) VALUES (3,'Livrée');
INSERT INTO statutcommande(idStatut,nomStatut) VALUES (4,'Contentieux');

/*==============================================================*/
/* INSERT : CODEPROMO                                           */
/*==============================================================*/
INSERT INTO codepromo(idCodePromo,idClient,dateExpirationCode,nomCodePromo,valeurReduction, estValide) VALUES (1,14,'2024-12-31','BIENVENUE10',10, False);
INSERT INTO codepromo(idCodePromo,idClient,dateExpirationCode,nomCodePromo,valeurReduction, estValide) VALUES (2,41,'2024-12-31','BIENVENUE10',10, False);
INSERT INTO codepromo(idCodePromo,idClient,dateExpirationCode,nomCodePromo,valeurReduction, estValide) VALUES (3,3,'2024-12-31','BIENVENUE10',10, True);
INSERT INTO codepromo(idCodePromo,idClient,dateExpirationCode,nomCodePromo,valeurReduction, estValide) VALUES (4,24,'2024-12-31','BIENVENUE10',10, True);
INSERT INTO codepromo(idCodePromo,idClient,dateExpirationCode,nomCodePromo,valeurReduction, estValide) VALUES (5,17,'2024-12-31','BIENVENUE10',10, True);
INSERT INTO codepromo(idCodePromo,idClient,dateExpirationCode,nomCodePromo,valeurReduction, estValide) VALUES (6,15,'2024-12-31','BIENVENUE10',10, True);
INSERT INTO codepromo(idCodePromo,idClient,dateExpirationCode,nomCodePromo,valeurReduction, estValide) VALUES (7,18,'2024-12-31','BIENVENUE10',10, True);
INSERT INTO codepromo(idCodePromo,idClient,dateExpirationCode,nomCodePromo,valeurReduction, estValide) VALUES (8,36,'2024-12-31','BIENVENUE10',10, False);
INSERT INTO codepromo(idCodePromo,idClient,dateExpirationCode,nomCodePromo,valeurReduction, estValide) VALUES (9,25,'2024-12-31','BIENVENUE10',10, True);
INSERT INTO codepromo(idCodePromo,idClient,dateExpirationCode,nomCodePromo,valeurReduction, estValide) VALUES (10,6,'2024-12-31','BIENVENUE10',10, True);
INSERT INTO codepromo(idCodePromo,idClient,dateExpirationCode,nomCodePromo,valeurReduction, estValide) VALUES (11,10,'2024-12-31','BIENVENUE10',10, True);
INSERT INTO codepromo(idCodePromo,idClient,dateExpirationCode,nomCodePromo,valeurReduction, estValide) VALUES (12,19,'2024-12-31','BIENVENUE10',10, True);
INSERT INTO codepromo(idCodePromo,idClient,dateExpirationCode,nomCodePromo,valeurReduction, estValide) VALUES (13,39,'2024-12-31','BIENVENUE10',10, True);
INSERT INTO codepromo(idCodePromo,idClient,dateExpirationCode,nomCodePromo,valeurReduction, estValide) VALUES (14,16,'2024-12-31','BIENVENUE10',10, True);
INSERT INTO codepromo(idCodePromo,idClient,dateExpirationCode,nomCodePromo,valeurReduction, estValide) VALUES (15,NULL,'2024-12-31','FETEDUMEUBLE15',15, True);
INSERT INTO codepromo(idCodePromo,idClient,dateExpirationCode,nomCodePromo,valeurReduction, estValide) VALUES (16,NULL,'2024-12-31','ANNIVERSAIRE20',20, True);

/*==============================================================*/
/* INSERT : TYPEPRODUIT                                         */
/*==============================================================*/
insert into TypeProduit(idTypeProduit, idCategorie, nomTypeProduit) VALUES
(1,1, 'Canapé & Fauteuil'),
(2,2, 'Chaise & tabouret'),
(3,3, 'Bureau'),
(4,4, 'Table'),
(5,5, 'Rangement'),
(6,6, 'Chambre'),
(7,7, 'Enfant'),
(8,8, 'Jardin'),
(9,9, 'Luminaire'),
(10,10, 'Déco'),
(11,11, 'Meubles reconditionnée'),
(12,12, 'Canapé'),
(13,13, 'Canapé design'),
(14,14, 'Fauteuil'),
(15,15, 'Chaise'),
(16,16, 'Chaise design'),
(17,17, 'Tabouret'),
(18,18, 'Fauteuil de bureau'),
(19,19, 'Bureau design'),
(20,20, 'Table a manger'),
(21,21, 'Table basse'),
(22,22, 'Bibliothèque et étagère'),
(23,23, 'meuble TV'),
(24,24, 'Lit adulte'),
(25,25, 'Tête de lit'),
(26,26, 'Fauteuil enfant'),
(27,27, 'Rangement enfant'),
(28,28, 'Salon de jardin'),
(29,29, 'Chaise de jardin'),
(30,30, 'Lampe à poser'),
(31,31, 'Suspension'),
(32,32, 'Etagère mural'),
(33,33, 'Décoration mural');

/*==============================================================*/
/* INSERT : ATTRIBUTPRODUIT                                     */
/*==============================================================*/
insert into ATTRIBUTPRODUIT (idattribut, idtypeproduit, nomattribut) values
(1,1,'Matiere'),
(2,2,'Matiere'),
(3,4,'Matiere'),
(4,4,'Largeur'),
(5,8,'Longueur');

/*==============================================================*/
/* INSERT : PRODUIT                                             */
/*==============================================================*/
INSERT INTO Produit(idProduit,idTypeProduit,idPays,nomProduit,sourceNotice,sourceAspectTechnique,delaiLivraison,coutLivraison,nbPaiementMax) VALUES (1,16,4,'Chaises vintage en bois foncé et noir (lot de 2) WALFORD','files/notice/Chaise_vintage.pdf','files/AspectTechnique/Chaise_vintage.txt','72 hours',64.47,4);
INSERT INTO Produit(idProduit,idTypeProduit,idPays,nomProduit,sourceNotice,sourceAspectTechnique,delaiLivraison,coutLivraison,nbPaiementMax) VALUES (2,16,4,'Chaises scandinaves en bois clair et tissu gris clair (lot de 2) ELION','files/notice/Chaise_Scandinave.pdf','files/AspectTechnique/Chaise_Scandinave.txt','72 hours',56.57,1);
INSERT INTO Produit(idProduit,idTypeProduit,idPays,nomProduit,sourceNotice,sourceAspectTechnique,delaiLivraison,coutLivraison,nbPaiementMax) VALUES (3,16,4,'Chaises scandinaves en tissu effet velours texturé beige et bois clair (lot de 2) COSETTE','files/notice/Chaise_Scandinave_en_tissue.pdf','files/AspectTechnique/Chaise_Scandinave_en_tissue.txt','72 hours',44.61,4);
INSERT INTO Produit(idProduit,idTypeProduit,idPays,nomProduit,sourceNotice,sourceAspectTechnique,delaiLivraison,coutLivraison,nbPaiementMax) VALUES (4,22,2,'Bibliothèque séparateur design finition bois noyer L139 cm COMO','files/notice/Bibliothéque_séparateur_design.pdf','files/AspectTechnique/Bibliothéque_séparateur_design.txt','72 hours',87.91,4);
INSERT INTO Produit(idProduit,idTypeProduit,idPays,nomProduit,sourceNotice,sourceAspectTechnique,delaiLivraison,coutLivraison,nbPaiementMax) VALUES (5,22,6,'Bibliothèque murale en bois clair chêne avec rangement 2 portes coulissantes L90 cm EPIC','files/notice/Bibliothèque_mural.pdf','files/AspectTechnique/Bibliothèque_mural.txt','72 hours',44.73,4);
INSERT INTO Produit(idProduit,idTypeProduit,idPays,nomProduit,sourceNotice,sourceAspectTechnique,delaiLivraison,coutLivraison,nbPaiementMax) VALUES (6,22,1,'Bibliothèque ouverte séparateur design finition bois clair chêne L139 cm COMO','files/notice/Bibliothéque_ouverte.pdf','files/AspectTechnique/Bibliothéque_ouverte.txt','72 hours',99.28,4);
INSERT INTO Produit(idProduit,idTypeProduit,idPays,nomProduit,sourceNotice,sourceAspectTechnique,delaiLivraison,coutLivraison,nbPaiementMax) VALUES (7,20,4,'Table à manger extensible carrée en bois clair L90-130 cm NORDECO','files/notice/Table_à_manger_extensible.pdf','files/AspectTechnique/Table_à_manger_extensible.txt','72 hours',59.36,4);
INSERT INTO Produit(idProduit,idTypeProduit,idPays,nomProduit,sourceNotice,sourceAspectTechnique,delaiLivraison,coutLivraison,nbPaiementMax) VALUES (8,20,4,'Table à manger extensible ovale en bois clair L150-200 cm MARIK','files/notice/Table_à_manger_extensible_ovale.pdf','files/AspectTechnique/Table_à_manger_extensible_ovale.txt','72 hours',34.19,4);
INSERT INTO Produit(idProduit,idTypeProduit,idPays,nomProduit,sourceNotice,sourceAspectTechnique,delaiLivraison,coutLivraison,nbPaiementMax) VALUES (9,20,4,'Table à manger extensible rectangulaire en bois clair L130-160 cm NORDECO','files/notice/Table_à_manger_extensible_rectangulaire.pdf','files/AspectTechnique/Table_à_manger_extensible_rectangulaire.txt','72 hours',16.27,1);
INSERT INTO Produit(idProduit,idTypeProduit,idPays,nomProduit,sourceNotice,sourceAspectTechnique,delaiLivraison,coutLivraison,nbPaiementMax) VALUES (10,11,4,'Tabourets de bar design noirs H65 cm (lot de 2) ELLA','files/notice/Tabourets_de_bar_design.pdf','files/AspectTechnique/Tabourets_de_bar_design.txt','72 hours',0.59,4);
INSERT INTO Produit(idProduit,idTypeProduit,idPays,nomProduit,sourceNotice,sourceAspectTechnique,delaiLivraison,coutLivraison,nbPaiementMax) VALUES (11,11,4,'Tabourets de bar design blancs (lot de 2) STEEVY','files/notice/Tabourets_de_bar_design.pdf','files/AspectTechnique/Tabourets_de_bar_design.txt','72 hours',98.44,4);
INSERT INTO Produit(idProduit,idTypeProduit,idPays,nomProduit,sourceNotice,sourceAspectTechnique,delaiLivraison,coutLivraison,nbPaiementMax) VALUES (12,12,1,'Canapé 3 places en tissu effet velours texturé terracotta et bois clair L200 cm ODEON','files/notice/Canapé_3_place_en_tissue.pdf','files/AspectTechnique/Canapé_3_place_en_tissue.txt','72 hours',27.06,4);
INSERT INTO Produit(idProduit,idTypeProduit,idPays,nomProduit,sourceNotice,sourceAspectTechnique,delaiLivraison,coutLivraison,nbPaiementMax) VALUES (13,13,4,'Canapé scandinave déhoussable 2 places en tissu beige et bois clair OSLO','files/notice/Canapé_scandinave_dehoussable.pdf','files/AspectTechnique/Canapé_scandinave_dehoussable.txt','72 hours',4.16,4);
INSERT INTO Produit(idProduit,idTypeProduit,idPays,nomProduit,sourceNotice,sourceAspectTechnique,delaiLivraison,coutLivraison,nbPaiementMax) VALUES (14,14,4,'Fauteuil en tissu vert de gris et métal noir BELEY','files/notice/Fauteuil_en_tissue.pdf','files/AspectTechnique/Fauteuil_en_tissue.txt','72 hours',56.59,1);
INSERT INTO Produit(idProduit,idTypeProduit,idPays,nomProduit,sourceNotice,sourceAspectTechnique,delaiLivraison,coutLivraison,nbPaiementMax) VALUES (15,15,4,'Chaises en rotin et métal noir (lot de 2) MALACCA','files/notice/Chaise_en_rotin.pdf','files/AspectTechnique/Chaise_en_rotin.txt','72 hours',42.87,4);
INSERT INTO Produit(idProduit,idTypeProduit,idPays,nomProduit,sourceNotice,sourceAspectTechnique,delaiLivraison,coutLivraison,nbPaiementMax) VALUES (16,16,4,'Chaise design blanc et bois clair BENT','files/notice/Chaise_design.pdf','files/AspectTechnique/Chaise_design.txt','72 hours',18.14,1);
INSERT INTO Produit(idProduit,idTypeProduit,idPays,nomProduit,sourceNotice,sourceAspectTechnique,delaiLivraison,coutLivraison,nbPaiementMax) VALUES (17,17,4,'Tabouret de bar scandinave pivotant blanc et bois clair GARBO','files/notice/Tabourets_de_bar_scandinave.pdf','files/AspectTechnique/Tabourets_de_bar_scandinave.txt','72 hours',51.74,4);
INSERT INTO Produit(idProduit,idTypeProduit,idPays,nomProduit,sourceNotice,sourceAspectTechnique,delaiLivraison,coutLivraison,nbPaiementMax) VALUES (18,18,4,'Chaise de bureau à roulettes design blanc, bois clair et acier chromé BENT','files/notice/Chaise_de_bureau_roulettes.pdf','files/AspectTechnique/Chaise_de_bureau_roulettes.txt','72 hours',94.6,1);
INSERT INTO Produit(idProduit,idTypeProduit,idPays,nomProduit,sourceNotice,sourceAspectTechnique,delaiLivraison,coutLivraison,nbPaiementMax) VALUES (19,19,4,'Bureau modulable scandinave blanc et bois chêne massif L140-203 cm GILDA','files/notice/Bureau_modulable _candinave.pdf','files/AspectTechnique/Bureau_modulable _candinave.txt','72 hours',67.04,4);
INSERT INTO Produit(idProduit,idTypeProduit,idPays,nomProduit,sourceNotice,sourceAspectTechnique,delaiLivraison,coutLivraison,nbPaiementMax) VALUES (20,20,4,'Table extensible rallonges intégrées rectangulaire en bois foncé noyer L180-230 cm FIFTIES','files/notice/Table_extensible_rallonges_intégrées.pdf','files/AspectTechnique/Table_extensible_rallonges_intégrées.txt','72 hours',13.94,4);
INSERT INTO Produit(idProduit,idTypeProduit,idPays,nomProduit,sourceNotice,sourceAspectTechnique,delaiLivraison,coutLivraison,nbPaiementMax) VALUES (21,21,4,'Tables basses gigognes scandinaves bois clair chêne (lot de 2) ARTIK','files/notice/Table_basse_gigognes_scandinave.pdf','files/notice/Table_basse_gigognes_scandinave.txt','72 hours',97.51,1);
INSERT INTO Produit(idProduit,idTypeProduit,idPays,nomProduit,sourceNotice,sourceAspectTechnique,delaiLivraison,coutLivraison,nbPaiementMax) VALUES (22,22,5,'Bibliothèque basse finition bois clair chêne L140 cm EPURE','files/notice/Bibliothéque_basse_definition.pdf','files/AspectTechnique/Bibliothéque_basse_definition.txt','72 hours',61.9,1);
INSERT INTO Produit(idProduit,idTypeProduit,idPays,nomProduit,sourceNotice,sourceAspectTechnique,delaiLivraison,coutLivraison,nbPaiementMax) VALUES (23,23,4,'Meuble TV bois foncé noyer 3 portes L180 cm SANAA','files/notice/Meuble_tv.pdf','files/AspectTechnique/Meuble_tv.txt','72 hours',84.2,1);
INSERT INTO Produit(idProduit,idTypeProduit,idPays,nomProduit,sourceNotice,sourceAspectTechnique,delaiLivraison,coutLivraison,nbPaiementMax) VALUES (24,24,4,'Lit 2 places 160x200 cm en tissu lin beige capitonné MARQUISE','files/notice/Lit_2_places.pdf','files/AspectTechnique/Lit_2_places.txt','72 hours',22.42,4);
INSERT INTO Produit(idProduit,idTypeProduit,idPays,nomProduit,sourceNotice,sourceAspectTechnique,delaiLivraison,coutLivraison,nbPaiementMax) VALUES (25,25,4,'Tête de lit ronde en tissu beige L160 cm NAOMY','files/notice/Tête_de_lit.pdf','files/AspectTechnique/Tête_de_lit.txt','72 hours',64.32,4);
INSERT INTO Produit(idProduit,idTypeProduit,idPays,nomProduit,sourceNotice,sourceAspectTechnique,delaiLivraison,coutLivraison,nbPaiementMax) VALUES (26,26,4,'Fauteuil enfant scandinave en tissu effet laine bouclée blanc et bois clair NORKID','files/notice/Fauteuil_enfant_scandinave.pdf','files/AspectTechnique/Fauteuil_enfant_scandinave.txt','72 hours',60.79,4);
INSERT INTO Produit(idProduit,idTypeProduit,idPays,nomProduit,sourceNotice,sourceAspectTechnique,delaiLivraison,coutLivraison,nbPaiementMax) VALUES (27,27,5,'Armoire scandinave avec penderie et étagères gris anthracite et bois clair L90 cm EILIE','files/notice/Armoire_scandinave_penderie.pdf','files/AspectTechnique/Armoire_scandinave_penderie.txt','72 hours',84.47,4);
INSERT INTO Produit(idProduit,idTypeProduit,idPays,nomProduit,sourceNotice,sourceAspectTechnique,delaiLivraison,coutLivraison,nbPaiementMax) VALUES (28,28,4,'Salon de jardin d''angle 6 places en bois massif avec coussins déhoussables beige naturel BELIZE','files/notice/Salon_jardin_angle.pdf','files/AspectTechnique/Salon_jardin_angle.txt','72 hours',59.1,4);
INSERT INTO Produit(idProduit,idTypeProduit,idPays,nomProduit,sourceNotice,sourceAspectTechnique,delaiLivraison,coutLivraison,nbPaiementMax) VALUES (29,29,4,'Fauteuils de jardin en bois massif (lot de 2) AKIS','files/notice/Fauteuils_de_jardin.pdf','files/AspectTechnique/Fauteuils_de_jardin.txt','72 hours',19.28,4);
INSERT INTO Produit(idProduit,idTypeProduit,idPays,nomProduit,sourceNotice,sourceAspectTechnique,delaiLivraison,coutLivraison,nbPaiementMax) VALUES (30,30,4,'Lampe à poser en céramique blanc mat et abat-jour en lin naturel TIGA','files/notice/Lampe_a_poser_en_céramique.pdf','files/AspectTechnique/Lampe_a_poser_en_céramique.txt','72 hours',87.58,1);
INSERT INTO Produit(idProduit,idTypeProduit,idPays,nomProduit,sourceNotice,sourceAspectTechnique,delaiLivraison,coutLivraison,nbPaiementMax) VALUES (31,31,1,'Suspension cylindrique en lin brique et rabane naturelle D50 cm TRAVES','files/notice/Suspension_cylindrique.pdf','files/AspectTechnique/Suspension_cylindrique.txt','72 hours',97.52,4);
INSERT INTO Produit(idProduit,idTypeProduit,idPays,nomProduit,sourceNotice,sourceAspectTechnique,delaiLivraison,coutLivraison,nbPaiementMax) VALUES (32,32,4,'Etagère murale en bois manguier massif et cannage rotin L90 cm ACANGE','files/notice/Etagère_mural_en_bois.pdf','files/AspectTechnique/Etagère_mural_en_bois.txt','72 hours',43.9,4);
INSERT INTO Produit(idProduit,idTypeProduit,idPays,nomProduit,sourceNotice,sourceAspectTechnique,delaiLivraison,coutLivraison,nbPaiementMax) VALUES (33,33,1,'Kakémono tableau en toile suspendue forêt tropicale noir et blanc L40 x H60 cm BORNEO','files/notice/Kakémono_tableau.pdf','files/AspectTechnique/Kakémono_tableau.txt','72 hours',91.59,1);
INSERT INTO Produit(idProduit,idTypeProduit,idPays,nomProduit,sourceNotice,sourceAspectTechnique,delaiLivraison,coutLivraison,nbPaiementMax) VALUES (34,31,1,'Suspension en lin bleu paon et rabane naturelle D55 cm AZAMI','files/notice/Suspension_en_lin.pdf','files/AspectTechnique/Suspension_en_lin.txt','72 hours',96.96,4);
INSERT INTO Produit(idProduit,idTypeProduit,idPays,nomProduit,sourceNotice,sourceAspectTechnique,delaiLivraison,coutLivraison,nbPaiementMax) VALUES (35,31,1,'Abat-jour pour suspension double en tissu blanc et cannage rotin naturel L62 cm TIWY','files/notice/Abat_jour_pour_suspension.pdf','files/AspectTechnique/Abat_jour_pour_suspension.txt','72 hours',36.81,4);
INSERT INTO Produit(idProduit,idTypeProduit,idPays,nomProduit,sourceNotice,sourceAspectTechnique,delaiLivraison,coutLivraison,nbPaiementMax) VALUES (36,31,1,'Suspension en tulle blanc L33 cm SHELL','files/notice/Suspension_en_tulle.pdf','files/AspectTechnique/Suspension_en_tulle.txt','72 hours',99.39,1);
INSERT INTO Produit(idProduit,idTypeProduit,idPays,nomProduit,sourceNotice,sourceAspectTechnique,delaiLivraison,coutLivraison,nbPaiementMax) VALUES (37,31,1,'Abat-jour pour suspension double en tissu effet laine bouclée écru L62 cm TESSA','files/notice/Abat_jour_pour_double_suspension.pdf','files/AspectTechnique/Abat_jour_pour_double_suspension.txt','72 hours',68.8,1);
INSERT INTO Produit(idProduit,idTypeProduit,idPays,nomProduit,sourceNotice,sourceAspectTechnique,delaiLivraison,coutLivraison,nbPaiementMax) VALUES (38,24,4,'Lit 2 places 160x200 cm en bois et tissu beige LYNN','files/notice/Lit_2_place.pdf','files/AspectTechnique/Lit_2_place.pdf','72 hours',33.68,4);
INSERT INTO Produit(idProduit,idTypeProduit,idPays,nomProduit,sourceNotice,sourceAspectTechnique,delaiLivraison,coutLivraison,nbPaiementMax) VALUES (39,24,4,'Lit 2 places 160x200 en tissu beige SIDONIE','files/notice/Lit_2_place.pdf','files/AspectTechnique/Lit_2_place.pdf','72 hours',12.52,4);
INSERT INTO Produit(idProduit,idTypeProduit,idPays,nomProduit,sourceNotice,sourceAspectTechnique,delaiLivraison,coutLivraison,nbPaiementMax) VALUES (40,24,2,'Sommiers tapissiers blancs 80x200 cm (lot de 2) JAMI','files/notice/Sommier_tapissiers.pdf','files/AspectTechnique/Sommier_tapissiers.txt','72 hours',12.79,4);
INSERT INTO Produit(idProduit,idTypeProduit,idPays,nomProduit,sourceNotice,sourceAspectTechnique,delaiLivraison,coutLivraison,nbPaiementMax) VALUES (41,24,4,'Lit 2 places 160x200 en tissu gris clair capitonné DANAE','files/notice/Lit_2_place.pdf','files/AspectTechnique/Lit_2_place.txt','72 hours','15.37',1);
INSERT INTO Produit(idProduit,idTypeProduit,idPays,nomProduit,sourceNotice,sourceAspectTechnique,delaiLivraison,coutLivraison,nbPaiementMax) VALUES (42,30,5,'Lampe à poser en céramique vert foncé et abat-jour en raphia naturel H40 cm TIGA','files/notice/Lampe_à_poser.pdf','files/AspectTechnique/Lampe_à_poser.txt','72 hours',37.51,1);
INSERT INTO Produit(idProduit,idTypeProduit,idPays,nomProduit,sourceNotice,sourceAspectTechnique,delaiLivraison,coutLivraison,nbPaiementMax) VALUES (43,30,5,'Lampe à poser verte en céramique et abat-jour en rabane H64 cm MAJES','files/notice/Lampe_à_poser.pdf','files/AspectTechnique/Lampe_à_poser.txt','72 hours',22.53,4);
INSERT INTO Produit(idProduit,idTypeProduit,idPays,nomProduit,sourceNotice,sourceAspectTechnique,delaiLivraison,coutLivraison,nbPaiementMax) VALUES (44,30,5,'Lampe à poser taupe en céramique mate et abat-jour en raphia H49 cm PYRUS','files/notice/Lampe_à_poser.pdf','files/AspectTechnique/Lampe_à_poser.txt','72 hours',89.1,4);
INSERT INTO Produit(idProduit,idTypeProduit,idPays,nomProduit,sourceNotice,sourceAspectTechnique,delaiLivraison,coutLivraison,nbPaiementMax) VALUES (45,30,5,'Lampe à poser taupe en céramique brillante et abat-jour en tissu plissé blanc H49 cm TROIA','files/notice/Lampe_à_poser.pdf','files/AspectTechnique/Lampe_à_poser.txt','72 hours',15.05,1);
INSERT INTO Produit(idProduit,idTypeProduit,idPays,nomProduit,sourceNotice,sourceAspectTechnique,delaiLivraison,coutLivraison,nbPaiementMax) VALUES (46,33,1,'Kakemono enfant tableau en toile suspendue abécédaire L40 x H60 cm PEPS','files/notice/Kakémono_tableau.pdf','files/AspectTechnique/Kakémono_tableau.txt','72 hours',89.12,1);
INSERT INTO Produit(idProduit,idTypeProduit,idPays,nomProduit,sourceNotice,sourceAspectTechnique,delaiLivraison,coutLivraison,nbPaiementMax) VALUES (47,33,1,'Kakemono enfant tableau en toile suspendue arc-en-ciel L40 x H60 cm HAPPY','files/notice/Kakémono_tableau.pdf','files/AspectTechnique/Kakémono_tableau.txt','72 hours',64.01,1);
INSERT INTO Produit(idProduit,idTypeProduit,idPays,nomProduit,sourceNotice,sourceAspectTechnique,delaiLivraison,coutLivraison,nbPaiementMax) VALUES (48,33,1,'Kakemono enfant tableau en toile suspendue illustration forêt d''automne L40 x H60 cm FORET','files/notice/Kakémono_tableau.pdf','files/AspectTechnique/Kakémono_tableau.txt','72 hours',87.86,1);
INSERT INTO Produit(idProduit,idTypeProduit,idPays,nomProduit,sourceNotice,sourceAspectTechnique,delaiLivraison,coutLivraison,nbPaiementMax) VALUES (49,33,1,'Kakemono enfant tableau en toile suspendue illustration biche L40 x H60cm LOVELY','files/notice/Kakémono_tableau.pdf','files/AspectTechnique/Kakémono_tableau.txt','72 hours',45.62,1);
INSERT INTO Produit(idProduit,idTypeProduit,idPays,nomProduit,sourceNotice,sourceAspectTechnique,delaiLivraison,coutLivraison,nbPaiementMax) VALUES (50,13,1,'Canapé design 3-4 places en tissu velours bleu gris et métal noir ALMAR','files/notice/Canapé_design_4places.pdf','files/AspectTechnique/Canapé_design_4places.txt','72 hours',67.59,1);

/*==============================================================*/
/* INSERT : AVISPRODUIT                                         */
/*==============================================================*/
INSERT INTO AvisProduit(idClient,idProduit,noteAvis,dateAvis,commentaireavis,reponseMiliboo) VALUES (1,5,4,'2023-01-15',NULL,NULL);
INSERT INTO AvisProduit(idClient,idProduit,noteAvis,dateAvis,commentaireavis,reponseMiliboo) VALUES (2,9,3,'2023-02-10','Bon produit mais un peu bruyant à mon goût.','Nous sommes désolés pour la gêne occasionnée, nous allons prendre en compte votre remarque.');
INSERT INTO AvisProduit(idClient,idProduit,noteAvis,dateAvis,commentaireavis,reponseMiliboo) VALUES (3,3,4,'2023-03-02','J''adore ce produit ! Très pratique et design élégant.','Merci beaucoup pour votre retour. À bientôt sur notre site !');
INSERT INTO AvisProduit(idClient,idProduit,noteAvis,dateAvis,commentaireavis,reponseMiliboo) VALUES (4,11,4,'2023-03-25','La qualité est excellente et le prix très abordable !','Merci beaucoup pour votre évaluation élevée. Cela nous motive !');
INSERT INTO AvisProduit(idClient,idProduit,noteAvis,dateAvis,commentaireavis,reponseMiliboo) VALUES (5,14,3,'2023-04-01',NULL,NULL);
INSERT INTO AvisProduit(idClient,idProduit,noteAvis,dateAvis,commentaireavis,reponseMiliboo) VALUES (6,7,2,'2023-04-10','Déçu, le produit ne correspond pas aux photos sur le site.','Nous sommes désolés pour votre expérience. Nous ferons mieux la prochaine fois.');
INSERT INTO AvisProduit(idClient,idProduit,noteAvis,dateAvis,commentaireavis,reponseMiliboo) VALUES (7,3,4,'2023-05-02','Très bon produit, mais j''aurais aimé une option de couleur différente.','Merci pour votre suggestion, nous allons l''étudier pour les prochaines versions.');
INSERT INTO AvisProduit(idClient,idProduit,noteAvis,dateAvis,commentaireavis,reponseMiliboo) VALUES (8,15,4,'2023-05-20','Très satisfait, il fait son job à la perfection.','Merci pour votre retour positif ! Nous espérons vous revoir bientôt.');
INSERT INTO AvisProduit(idClient,idProduit,noteAvis,dateAvis,commentaireavis,reponseMiliboo) VALUES (9,20,4,'2023-06-02',NULL,NULL);
INSERT INTO AvisProduit(idClient,idProduit,noteAvis,dateAvis,commentaireavis,reponseMiliboo) VALUES (10,25,3,'2023-06-10','Le produit est bon, mais il a pris un peu de temps à arriver.','Nous nous excusons pour le délai de liTRUEson et ferons notre possible pour améliorer cela.');
INSERT INTO AvisProduit(idClient,idProduit,noteAvis,dateAvis,commentaireavis,reponseMiliboo) VALUES (11,30,4,'2023-06-20','Très bonne qualité, je suis satisfait de mon achat.','Merci pour votre retour ! À bientôt pour de nouvelles expériences.');
INSERT INTO AvisProduit(idClient,idProduit,noteAvis,dateAvis,commentaireavis,reponseMiliboo) VALUES (12,35,2,'2023-07-01','Pas satisfait, le produit est arrivé abîmé.','Nous sommes TRUEment désolés pour cet incident. Veuillez contacter notre support.');
INSERT INTO AvisProduit(idClient,idProduit,noteAvis,dateAvis,commentaireavis,reponseMiliboo) VALUES (13,13,4,'2023-07-15','Produit fonctionnel et pratique. Le design est également très bien pensé.','Merci beaucoup pour votre retour, nous sommes ravis que le produit vous convienne.');
INSERT INTO AvisProduit(idClient,idProduit,noteAvis,dateAvis,commentaireavis,reponseMiliboo) VALUES (14,8,4,'2023-07-30','Très bon produit, je l’utilise tous les jours sans problème.','Merci pour ce super avis ! À bientôt.');
INSERT INTO AvisProduit(idClient,idProduit,noteAvis,dateAvis,commentaireavis,reponseMiliboo) VALUES (15,6,4,'2023-08-03','Parfait ! Je l’utilise tous les jours, rien à redire.','Merci beaucoup pour ce super retour.');
INSERT INTO AvisProduit(idClient,idProduit,noteAvis,dateAvis,commentaireavis,reponseMiliboo) VALUES (16,4,3,'2023-08-18','Bon produit, mais j’espérais qu''il soit un peu plus durable.','Nous prenons votre retour en compte et allons vérifier la durabilité du produit.');
INSERT INTO AvisProduit(idClient,idProduit,noteAvis,dateAvis,commentaireavis,reponseMiliboo) VALUES (17,2,4,'2023-09-05','Très content de mon achat, facile à utiliser et de bonne qualité.','Merci pour votre commentaire positif, nous sommes ravis de vous satisfaire !');
INSERT INTO AvisProduit(idClient,idProduit,noteAvis,dateAvis,commentaireavis,reponseMiliboo) VALUES (18,12,4,'2023-09-19','Le produit est très pratique et léger, parfait pour mon utilisation.','Merci pour votre évaluation ! Nous espérons que cela vous apportera entière satisfaction.');
INSERT INTO AvisProduit(idClient,idProduit,noteAvis,dateAvis,commentaireavis,reponseMiliboo) VALUES (19,9,4,'2023-09-25','Produit super ! Fonctionne à merveille, je recommande vivement.','Merci pour ce retour enthousiaste, à bientôt !');
INSERT INTO AvisProduit(idClient,idProduit,noteAvis,dateAvis,commentaireavis,reponseMiliboo) VALUES (20,1,3,'2023-10-02','Bon produit, mais je trouve que la description ne correspond pas entièrement à ce que j’ai reçu.','Nous nous excusons pour ce malentendu et ferons attention à l''exactitude des descriptions à l''avenir.');
INSERT INTO AvisProduit(idClient,idProduit,noteAvis,dateAvis,commentaireavis,reponseMiliboo) VALUES (21,4,4,'2023-10-15','Très bonne qualité pour ce produit. Un peu cher mais ça vaut le coup.','Merci pour votre retour ! Nous espérons vous revoir bientôt.');
INSERT INTO AvisProduit(idClient,idProduit,noteAvis,dateAvis,commentaireavis,reponseMiliboo) VALUES (22,10,2,'2023-10-22',NULL,NULL);
INSERT INTO AvisProduit(idClient,idProduit,noteAvis,dateAvis,commentaireavis,reponseMiliboo) VALUES (23,6,4,'2023-11-05','Super produit, TRUEment facile à utiliser et performant.','Merci beaucoup pour votre évaluation ! Nous sommes heureux que notre produit vous convienne.');
INSERT INTO AvisProduit(idClient,idProduit,noteAvis,dateAvis,commentaireavis,reponseMiliboo) VALUES (24,16,4,'2023-11-10',NULL,NULL);
INSERT INTO AvisProduit(idClient,idProduit,noteAvis,dateAvis,commentaireavis,reponseMiliboo) VALUES (25,18,3,'2023-11-12','Fonctionne bien, mais j’aurais aimé plus de variété dans les couleurs.','Nous prenons note de votre suggestion et allons l''examiner.');
INSERT INTO AvisProduit(idClient,idProduit,noteAvis,dateAvis,commentaireavis,reponseMiliboo) VALUES (26,3,4,'2023-11-20','Excellent produit, TRUEment top ! Je suis totalement satisfait.','Nous vous remercions pour ce retour positif, à bientôt !');
INSERT INTO AvisProduit(idClient,idProduit,noteAvis,dateAvis,commentaireavis,reponseMiliboo) VALUES (27,5,4,'2023-11-25','Très bonne qualité, conforme à mes attentes.','Merci pour votre retour, nous sommes heureux de vous satisfaire !');
INSERT INTO AvisProduit(idClient,idProduit,noteAvis,dateAvis,commentaireavis,reponseMiliboo) VALUES (28,20,4,'2023-12-02',NULL,NULL);
INSERT INTO AvisProduit(idClient,idProduit,noteAvis,dateAvis,commentaireavis,reponseMiliboo) VALUES (29,17,3,'2023-12-10','Bon produit, mais j’ai eu quelques difficultés à le configurer.','Merci pour votre retour, nous allons simplifier la configuration.');
INSERT INTO AvisProduit(idClient,idProduit,noteAvis,dateAvis,commentaireavis,reponseMiliboo) VALUES (30,19,4,'2023-12-15','Très bon produit, répond à toutes mes attentes.','Merci pour votre confiance et votre retour positif !');
INSERT INTO AvisProduit(idClient,idProduit,noteAvis,dateAvis,commentaireavis,reponseMiliboo) VALUES (31,4,0,'2023-06-03','Produit defectueux je ne recommande pas !',NULL);

/*==============================================================*/
/* INSERT : COULEUR                                             */
/*==============================================================*/
insert into Couleur (idcouleur, nomcouleur, rgbcouleur) values
(1, 'Rouge', 'ff0000'),
(2, 'Bleu', '0000ff'),
(3, 'Vert', '00ff00'),
(4, 'Blanc', 'ffffff'),
(5, 'Noir', '000000');

/*==============================================================*/
/* INSERT : COLORATION                                          */
/*==============================================================*/
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (1,1,187.99,NULL,27,'Couleur Rouge',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (1,2,187.99,NULL,27,'Couleur Bleu',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (1,3,106.99,NULL,19,'Couleur Vert',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (1,4,205.99,NULL,27,'Couleur Blanc',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (1,5,127.99,NULL,3,'Couleur Noir',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (2,1,117.99,65.99,1,'Couleur Rouge',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (2,2,236.99,120.99,25,'Couleur Bleu',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (2,3,226.99,122.99,29,'Couleur Vert',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (2,4,154.99,127.99,30,'Couleur Blanc',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (2,5,232.99,128.99,19,'Couleur Noir',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (3,1,175.99,131.99,19,'Couleur Rouge',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (3,2,225.99,140.99,4,'Couleur Bleu',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (3,3,309.99,163.99,4,'Couleur Vert',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (3,4,353.99,201.99,19,'Couleur Blanc',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (3,5,389.99,205.99,23,'Couleur Noir',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (4,1,405.99,215.99,25,'Couleur Rouge',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (4,2,221.99,220.99,16,'Couleur Bleu',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (4,3,261.99,230.99,21,'Couleur Vert',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (4,4,300.99,238.99,1,'Couleur Blanc',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (4,5,323.99,240.99,23,'Couleur Noir',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (5,1,399.99,267.99,12,'Couleur Rouge',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (5,2,595.99,298.99,12,'Couleur Bleu',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (5,3,406.99,315.99,6,'Couleur Vert',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (5,4,532.99,325.99,22,'Couleur Blanc',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (5,5,527.99,365.99,25,'Couleur Noir',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (6,1,724.99,367.99,4,'Couleur Rouge',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (6,2,419.99,390.99,14,'Couleur Bleu',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (6,3,738.99,421.99,27,'Couleur Vert',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (6,4,849.99,428.99,13,'Couleur Blanc',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (6,5,715.99,441.99,8,'Couleur Noir',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (7,1,576.99,453.99,27,'Couleur Rouge',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (7,2,703.99,473.99,3,'Couleur Bleu',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (7,3,878.99,478.99,13,'Couleur Vert',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (7,4,848.99,488.99,2,'Couleur Blanc',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (7,5,853.99,508.99,18,'Couleur Noir',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (8,1,862.99,520.99,28,'Couleur Rouge',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (8,2,576.99,540.99,18,'Couleur Bleu',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (8,3,879.99,540.99,8,'Couleur Vert',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (8,4,840.99,558.99,6,'Couleur Blanc',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (8,5,867.99,559.99,7,'Couleur Noir',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (9,1,783.99,571.99,20,'Couleur Rouge',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (9,2,865.99,585.99,8,'Couleur Bleu',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (9,3,633.99,593.99,2,'Couleur Vert',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (9,4,780.99,600.99,18,'Couleur Blanc',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (9,5,795.99,600.99,14,'Couleur Noir',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (10,1,824.99,603.99,12,'Couleur Rouge',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (10,2,806.99,651.99,9,'Couleur Bleu',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (10,3,1202.99,668.99,22,'Couleur Vert',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (10,4,1118.99,686.99,25,'Couleur Blanc',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (10,5,874.99,688.99,26,'Couleur Noir',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (11,1,844.99,691.99,2,'Couleur Rouge',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (11,2,940.99,701.99,30,'Couleur Bleu',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (11,3,1207.99,702.99,19,'Couleur Vert',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (11,4,1170.99,726.99,9,'Couleur Blanc',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (11,5,955.99,735.99,28,'Couleur Noir',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (12,1,854.99,738.99,18,'Couleur Rouge',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (12,2,1462.99,747.99,26,'Couleur Bleu',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (12,3,881.99,763.99,10,'Couleur Vert',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (12,4,1212.99,783.99,4,'Couleur Blanc',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (12,5,1150.99,786.99,29,'Couleur Noir',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (13,1,1520.99,808.99,5,'Couleur Rouge',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (13,2,1097.99,809.99,22,'Couleur Bleu',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (13,3,966.99,821.99,22,'Couleur Vert',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (13,4,1346.99,824.99,23,'Couleur Blanc',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (13,5,1264.99,842.99,30,'Couleur Noir',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (14,1,1041.99,850.99,4,'Couleur Rouge',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (14,2,1408.99,868.99,12,'Couleur Bleu',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (14,3,1611.99,870.99,17,'Couleur Vert',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (14,4,1002.99,892.99,7,'Couleur Blanc',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (14,5,1098.99,898.99,9,'Couleur Noir',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (15,1,1534.99,899.99,7,'Couleur Rouge',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (15,2,1609.99,899.99,12,'Couleur Bleu',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (15,3,1768.99,907.99,24,'Couleur Vert',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (15,4,1242.99,926.99,10,'Couleur Blanc',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (15,5,1417.99,929.99,16,'Couleur Noir',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (16,1,996.99,933.99,10,'Couleur Rouge',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (16,2,1386.99,945.99,2,'Couleur Bleu',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (16,3,1334.99,962.99,6,'Couleur Vert',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (16,4,1426.99,979.99,20,'Couleur Blanc',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (16,5,1519.99,980.99,5,'Couleur Noir',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (17,1,1168.99,983.99,20,'Couleur Rouge',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (17,2,1889.99,1000.99,13,'Couleur Bleu',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (17,3,1872.99,1018.99,4,'Couleur Vert',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (17,4,1431.99,1030.99,23,'Couleur Blanc',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (17,5,1464.99,1040.99,11,'Couleur Noir',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (18,1,1549.99,1089.99,27,'Couleur Rouge',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (18,2,1913.99,1102.99,14,'Couleur Bleu',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (18,3,1543.99,1135.99,3,'Couleur Vert',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (18,4,1819.99,1152.99,27,'Couleur Blanc',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (18,5,1418.99,1177.99,16,'Couleur Noir',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (19,1,1236.99,1179.99,23,'Couleur Rouge',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (19,2,1953.99,1190.99,24,'Couleur Bleu',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (19,3,1713.99,1193.99,27,'Couleur Vert',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (19,4,1861.99,1210.99,24,'Couleur Blanc',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (19,5,1745.99,1221.99,19,'Couleur Noir',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (20,1,1589.99,1240.99,24,'Couleur Rouge',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (20,2,1718.99,1255.99,8,'Couleur Bleu',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (20,3,1625.99,1258.99,17,'Couleur Vert',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (20,4,1460.99,1262.99,9,'Couleur Blanc',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (20,5,1966.99,1264.99,3,'Couleur Noir',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (21,1,1942.99,1277.99,25,'Couleur Rouge',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (21,2,1822.99,1345.99,26,'Couleur Bleu',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (21,3,1351.99,1348.99,29,'Couleur Vert',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (21,4,1366.99,1360.99,8,'Couleur Blanc',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (21,5,1659.99,1361.99,9,'Couleur Noir',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (22,1,1705.99,1364.99,15,'Couleur Rouge',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (22,2,1675.99,1396.99,28,'Couleur Bleu',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (22,3,1664.99,1427.99,17,'Couleur Vert',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (22,4,1505.99,1471.99,4,'Couleur Blanc',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (22,5,1863.99,1494.99,20,'Couleur Noir',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (23,1,1933.99,1507.99,6,'Couleur Rouge',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (23,2,1843.99,1595.99,27,'Couleur Bleu',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (23,3,1697.99,1612.99,4,'Couleur Vert',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (23,4,1942.99,1615.99,4,'Couleur Blanc',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (23,5,1744.99,1619.99,15,'Couleur Noir',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (24,1,1710.99,1704.99,20,'Couleur Rouge',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (24,2,1994.99,1789.99,22,'Couleur Bleu',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (24,3,1997.99,1899.99,6,'Couleur Vert',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (24,4,1859.99,NULL,22,'Couleur Blanc',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (24,5,912.99,NULL,19,'Couleur Noir',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (25,1,1898.99,NULL,22,'Couleur Rouge',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (25,2,1658.99,NULL,16,'Couleur Bleu',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (25,3,500.99,NULL,14,'Couleur Vert',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (25,4,1377.99,NULL,17,'Couleur Blanc',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (25,5,373.99,NULL,20,'Couleur Noir',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (26,1,984.99,NULL,24,'Couleur Rouge',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (26,2,1898.99,NULL,23,'Couleur Bleu',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (26,3,725.99,NULL,16,'Couleur Vert',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (26,4,1587.99,NULL,13,'Couleur Blanc',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (26,5,1975.99,NULL,19,'Couleur Noir',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (27,1,1560.99,NULL,17,'Couleur Rouge',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (27,2,1885.99,NULL,9,'Couleur Bleu',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (27,3,893.99,NULL,3,'Couleur Vert',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (27,4,691.99,NULL,10,'Couleur Blanc',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (27,5,960.99,NULL,4,'Couleur Noir',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (28,1,414.99,NULL,13,'Couleur Rouge',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (28,2,1673.99,NULL,21,'Couleur Bleu',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (28,3,386.99,NULL,10,'Couleur Vert',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (28,4,1989.99,NULL,10,'Couleur Blanc',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (28,5,1394.99,NULL,9,'Couleur Noir',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (29,1,1223.99,NULL,9,'Couleur Rouge',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (29,2,1167.99,NULL,4,'Couleur Bleu',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (29,3,467.99,NULL,26,'Couleur Vert',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (29,4,1951.99,NULL,7,'Couleur Blanc',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (29,5,1975.99,NULL,6,'Couleur Noir',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (30,1,1555.99,NULL,17,'Couleur Rouge',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (30,2,590.99,NULL,20,'Couleur Bleu',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (30,3,1209.99,NULL,28,'Couleur Vert',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (30,4,822.99,NULL,15,'Couleur Blanc',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (30,5,1301.99,NULL,30,'Couleur Noir',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (31,1,1231.99,NULL,18,'Couleur Rouge',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (31,2,1740.99,NULL,14,'Couleur Bleu',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (31,3,1026.99,NULL,2,'Couleur Vert',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (31,4,1297.99,NULL,4,'Couleur Blanc',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (31,5,759.99,NULL,8,'Couleur Noir',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (32,1,1009.99,NULL,18,'Couleur Rouge',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (32,2,439.99,NULL,2,'Couleur Bleu',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (32,3,962.99,NULL,13,'Couleur Vert',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (32,4,1971.99,NULL,25,'Couleur Blanc',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (32,5,567.99,NULL,21,'Couleur Noir',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (33,1,1585.99,NULL,10,'Couleur Rouge',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (33,2,518.99,NULL,14,'Couleur Bleu',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (33,3,215.99,NULL,28,'Couleur Vert',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (33,4,1930.99,NULL,26,'Couleur Blanc',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (33,5,1115.99,NULL,9,'Couleur Noir',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (34,1,1316.99,NULL,27,'Couleur Rouge',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (34,2,1389.99,NULL,28,'Couleur Bleu',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (34,3,1665.99,NULL,12,'Couleur Vert',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (34,4,1513.99,NULL,10,'Couleur Blanc',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (34,5,1698.99,NULL,21,'Couleur Noir',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (35,1,1067.99,NULL,10,'Couleur Rouge',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (35,2,1189.99,NULL,13,'Couleur Bleu',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (35,3,1731.99,NULL,5,'Couleur Vert',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (35,4,1102.99,NULL,16,'Couleur Blanc',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (35,5,1787.99,NULL,15,'Couleur Noir',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (36,1,1384.99,NULL,18,'Couleur Rouge',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (36,2,164.99,NULL,9,'Couleur Bleu',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (36,3,1075.99,NULL,28,'Couleur Vert',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (36,4,226.99,NULL,6,'Couleur Blanc',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (36,5,1671.99,NULL,11,'Couleur Noir',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (37,1,1523.99,NULL,9,'Couleur Rouge',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (37,2,1803.99,NULL,13,'Couleur Bleu',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (37,3,862.99,NULL,9,'Couleur Vert',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (37,4,750.99,NULL,21,'Couleur Blanc',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (37,5,543.99,NULL,20,'Couleur Noir',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (38,1,393.99,NULL,22,'Couleur Rouge',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (38,2,1195.99,NULL,29,'Couleur Bleu',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (38,3,156.99,NULL,14,'Couleur Vert',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (38,4,1364.99,NULL,17,'Couleur Blanc',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (38,5,527.99,NULL,9,'Couleur Noir',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (39,1,1307.99,NULL,25,'Couleur Rouge',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (39,2,268.99,NULL,13,'Couleur Bleu',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (39,3,1122.99,NULL,11,'Couleur Vert',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (39,4,809.99,NULL,15,'Couleur Blanc',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (39,5,441.99,NULL,30,'Couleur Noir',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (40,1,1774.99,NULL,24,'Couleur Rouge',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (40,2,1988.99,NULL,19,'Couleur Bleu',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (40,3,767.99,NULL,27,'Couleur Vert',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (40,4,1373.99,NULL,16,'Couleur Blanc',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (40,5,1520.99,NULL,13,'Couleur Noir',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (41,1,541.99,NULL,19,'Couleur Rouge',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (41,2,417.99,NULL,29,'Couleur Bleu',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (41,3,282.99,NULL,24,'Couleur Vert',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (41,4,1320.99,NULL,3,'Couleur Blanc',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (41,5,778.99,NULL,1,'Couleur Noir',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (42,1,1756.99,NULL,6,'Couleur Rouge',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (42,2,1167.99,NULL,18,'Couleur Bleu',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (42,3,435.99,NULL,9,'Couleur Vert',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (42,4,986.99,NULL,5,'Couleur Blanc',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (42,5,1517.99,NULL,18,'Couleur Noir',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (43,1,1365.99,NULL,6,'Couleur Rouge',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (43,2,941.99,NULL,21,'Couleur Bleu',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (43,3,1293.99,NULL,20,'Couleur Vert',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (43,4,934.99,NULL,26,'Couleur Blanc',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (43,5,877.99,NULL,18,'Couleur Noir',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (44,1,366.99,NULL,29,'Couleur Rouge',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (44,2,828.99,NULL,20,'Couleur Bleu',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (44,3,280.99,NULL,13,'Couleur Vert',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (44,4,1940.99,NULL,26,'Couleur Blanc',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (44,5,1180.99,NULL,19,'Couleur Noir',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (45,1,1777.99,NULL,10,'Couleur Rouge',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (45,2,524.99,NULL,12,'Couleur Bleu',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (45,3,1355.99,NULL,18,'Couleur Vert',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (45,4,1483.99,NULL,6,'Couleur Blanc',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (45,5,1419.99,NULL,3,'Couleur Noir',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (46,1,613.99,NULL,12,'Couleur Rouge',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (46,2,404.99,NULL,19,'Couleur Bleu',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (46,3,1965.99,NULL,8,'Couleur Vert',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (46,4,839.99,NULL,26,'Couleur Blanc',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (46,5,1477.99,NULL,5,'Couleur Noir',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (47,1,1854.99,NULL,20,'Couleur Rouge',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (47,2,633.99,NULL,22,'Couleur Bleu',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (47,3,615.99,NULL,30,'Couleur Vert',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (47,4,845.99,NULL,21,'Couleur Blanc',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (47,5,1103.99,NULL,11,'Couleur Noir',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (48,1,1774.99,NULL,20,'Couleur Rouge',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (48,2,975.99,NULL,9,'Couleur Bleu',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (48,3,1471.99,NULL,24,'Couleur Vert',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (48,4,1727.99,NULL,13,'Couleur Blanc',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (48,5,1960.99,NULL,29,'Couleur Noir',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (49,1,1048.99,NULL,11,'Couleur Rouge',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (49,2,1032.99,NULL,9,'Couleur Bleu',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (49,3,1564.99,NULL,12,'Couleur Vert',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (49,4,1587.99,NULL,12,'Couleur Blanc',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (49,5,781.99,NULL,17,'Couleur Noir',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (50,1,275.99,NULL,21,'Couleur Rouge',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (50,2,1211.99,NULL,10,'Couleur Bleu',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (50,3,257.99,NULL,28,'Couleur Vert',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (50,4,355.99,NULL,13,'Couleur Blanc',TRUE);
INSERT INTO coloration(idProduit,idCouleur,prixVente,prixSolde,quantiteStock,DescriptionColoration,estVisible) VALUES (50,5,1340.99,NULL,2,'Couleur Noir',TRUE);

/*==============================================================*/
/* INSERT : TRANSPORTEUR                                        */
/*==============================================================*/
INSERT INTO transporteur(idTransporteur,nomTransporteur,descriptionTransporteur) VALUES (1,'France Express','LiTRUEson 24H/48H');
INSERT INTO transporteur(idTransporteur,nomTransporteur,descriptionTransporteur) VALUES (2,'Geodis','LiTRUEson sous 2 à 5 jours');
INSERT INTO transporteur(idTransporteur,nomTransporteur,descriptionTransporteur) VALUES (3,'Trusk','LiTRUEson sous 2 à 5 jours');
INSERT INTO transporteur(idTransporteur,nomTransporteur,descriptionTransporteur) VALUES (4,'Heppner','LiTRUEson sous 2 à 5 jours');
INSERT INTO transporteur(idTransporteur,nomTransporteur,descriptionTransporteur) VALUES (5,'Chronopost','LiTRUEson sous 2 à 5 jours');

/*==============================================================*/
/* INSERT : COMMANDE                                            */
/*==============================================================*/
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (1,9,9,9,2,5,NULL,'2023-01-01',false,false,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (2,29,29,29,3,2,NULL,'2023-01-04',false,false,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (3,19,19,19,2,3,NULL,'2023-01-05',false,false,'<Instructions particulières>');
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (4,22,22,22,2,2,NULL,'2023-01-16',false,false,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (5,25,25,25,2,2,NULL,'2023-01-17',true,false,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (6,21,21,21,4,5,NULL,'2023-01-18',false,false,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (7,31,31,31,3,5,NULL,'2023-01-19',false,false,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (8,38,38,38,3,1,NULL,'2023-01-25',false,true,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (9,36,36,36,3,3,8,'2023-01-28',false,false,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (10,21,21,21,3,2,NULL,'2023-01-28',false,false,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (11,27,27,27,3,3,NULL,'2023-02-02',false,false,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (12,39,39,39,3,5,NULL,'2023-02-13',false,false,'<Instructions particulières>');
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (13,36,36,36,3,4,NULL,'2023-02-20',false,false,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (14,14,14,14,2,3,1,'2023-02-27',false,false,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (15,6,6,6,3,5,15,'2023-02-28',false,false,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (16,17,17,17,3,2,NULL,'2023-03-01',false,false,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (17,25,25,25,3,2,NULL,'2023-03-02',true,false,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (18,28,28,28,4,2,15,'2023-03-08',false,false,'<Instructions particulières>');
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (19,39,39,39,3,5,NULL,'2023-03-09',true,false,'<Instructions particulières>');
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (20,7,7,7,3,1,16,'2023-03-13',false,true,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (21,13,13,13,3,2,NULL,'2023-03-17',true,false,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (22,24,24,24,2,1,NULL,'2023-03-19',false,true,'<Instructions particulières>');
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (23,13,13,13,3,1,NULL,'2023-03-28',false,true,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (24,11,11,11,3,2,NULL,'2023-03-29',false,false,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (25,2,2,2,3,5,16,'2023-03-30',false,false,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (26,22,22,22,4,1,NULL,'2023-04-05',false,true,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (27,25,25,25,2,3,NULL,'2023-04-11',false,false,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (28,1,1,1,3,4,NULL,'2023-04-13',false,false,'<Instructions particulières>');
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (29,33,33,33,2,2,NULL,'2023-04-19',false,false,'<Instructions particulières>');
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (30,28,28,28,3,2,NULL,'2023-04-20',false,false,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (31,41,41,41,3,1,2,'2023-04-30',false,true,'<Instructions particulières>');
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (32,14,14,14,3,5,16,'2023-05-05',true,false,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (33,18,18,18,3,5,NULL,'2023-05-09',false,false,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (34,3,3,3,2,2,NULL,'2023-05-11',false,false,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (35,27,27,27,2,3,NULL,'2023-05-14',false,false,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (36,2,2,2,4,4,NULL,'2023-05-15',false,false,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (37,26,26,26,2,3,NULL,'2023-05-23',false,false,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (38,25,25,25,3,3,NULL,'2023-05-23',false,false,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (39,17,17,17,2,4,NULL,'2023-05-29',true,false,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (40,18,18,18,2,3,NULL,'2023-05-30',true,false,'<Instructions particulières>');
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (41,22,22,22,3,2,NULL,'2023-06-02',false,false,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (42,3,3,3,3,2,NULL,'2023-06-12',false,false,'<Instructions particulières>');
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (43,1,1,1,2,4,NULL,'2023-06-13',true,false,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (44,44,44,44,4,3,NULL,'2023-06-17',false,false,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (45,47,47,47,3,2,16,'2023-06-29',false,false,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (46,9,9,9,4,3,NULL,'2023-07-02',false,false,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (47,41,41,41,2,1,NULL,'2023-07-03',true,true,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (48,16,16,16,2,3,NULL,'2023-07-07',false,false,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (49,32,32,32,3,1,NULL,'2023-07-07',false,true,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (50,4,4,4,3,5,NULL,'2023-07-09',true,false,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (51,12,12,12,2,4,NULL,'2023-07-09',true,false,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (52,5,5,5,4,5,NULL,'2023-07-15',false,false,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (53,48,48,48,3,3,NULL,'2023-07-15',true,false,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (54,31,31,31,2,2,NULL,'2023-07-16',false,false,'<Instructions particulières>');
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (55,1,1,1,2,4,NULL,'2023-07-19',false,false,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (56,39,39,39,2,1,NULL,'2023-07-21',false,true,'<Instructions particulières>');
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (57,30,30,30,3,5,NULL,'2023-07-25',false,false,'<Instructions particulières>');
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (58,34,34,34,2,4,NULL,'2023-07-26',true,false,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (59,49,49,49,2,5,NULL,'2023-08-03',false,false,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (60,32,32,32,2,3,NULL,'2023-08-10',true,false,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (61,30,30,30,3,1,NULL,'2023-08-13',true,true,'<Instructions particulières>');
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (62,44,44,44,2,4,NULL,'2023-08-21',false,false,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (63,10,10,10,3,1,NULL,'2023-08-21',true,true,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (64,19,19,19,2,2,NULL,'2023-08-21',false,false,'<Instructions particulières>');
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (65,30,30,30,3,4,NULL,'2023-08-27',false,false,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (66,26,26,26,3,4,NULL,'2023-09-06',true,false,'<Instructions particulières>');
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (67,42,42,42,2,3,15,'2023-09-14',true,false,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (68,24,24,24,2,1,NULL,'2023-09-23',false,true,'<Instructions particulières>');
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (69,12,12,12,4,2,NULL,'2023-10-04',false,false,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (70,31,31,31,3,3,NULL,'2023-10-08',false,false,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (71,18,18,18,2,3,NULL,'2023-10-12',false,false,'<Instructions particulières>');
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (72,14,14,14,2,5,NULL,'2023-10-15',false,false,'<Instructions particulières>');
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (73,40,40,40,2,5,NULL,'2023-10-16',false,false,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (74,7,7,7,3,2,NULL,'2023-10-17',true,false,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (75,3,3,3,3,1,NULL,'2023-10-18',true,true,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (76,45,45,45,2,4,NULL,'2023-10-18',false,false,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (77,33,33,33,3,4,NULL,'2023-10-19',false,false,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (78,9,9,9,4,5,NULL,'2023-10-21',false,false,'<Instructions particulières>');
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (79,26,26,26,2,2,NULL,'2023-10-23',false,false,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (80,24,24,24,3,4,NULL,'2023-10-26',false,false,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (81,36,36,36,3,1,NULL,'2023-11-02',true,true,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (82,10,10,10,3,3,NULL,'2023-11-07',true,false,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (83,23,23,23,2,5,16,'2023-11-13',true,false,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (84,35,35,35,2,2,NULL,'2023-11-17',false,false,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (85,37,37,37,3,5,15,'2023-11-18',false,false,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (86,39,39,39,4,2,NULL,'2023-11-18',false,false,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (87,21,21,21,1,3,NULL,'2023-11-18',false,false,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (88,25,25,25,2,4,NULL,'2023-11-20',false,false,'<Instructions particulières>');
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (89,36,36,36,2,2,NULL,'2023-11-27',true,false,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (90,33,33,33,2,2,NULL,'2023-11-28',false,false,'<Instructions particulières>');
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (91,5,5,5,1,1,NULL,'2023-12-04',true,true,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (92,15,15,15,2,4,NULL,'2023-12-07',false,false,'<Instructions particulières>');
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (93,3,3,3,3,3,NULL,'2023-12-08',true,false,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (94,6,6,6,2,3,NULL,'2023-12-09',true,false,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (95,49,49,49,2,2,NULL,'2023-12-11',true,false,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (96,18,18,18,1,2,NULL,'2023-12-14',true,false,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (97,9,9,9,4,3,NULL,'2023-12-16',false,false,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (98,8,8,8,3,2,NULL,'2023-12-17',false,false,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (99,17,17,17,3,5,NULL,'2023-12-24',true,false,NULL);
INSERT INTO commande(idCommande,idClient,idAdresse,idAdresseFact,idStatutCommande,idTransporteur,idCodePromo,dateCommande,avecAssurance,avecLivraisonExpress,instructionLivraison) VALUES (100,24,24,24,3,3,NULL,'2023-12-26',true,false,NULL);

/*==============================================================*/
/* INSERT : COMPOSITIONPRODUIT                                  */
/*==============================================================*/
INSERT INTO COMPOSITIONPRODUIT(idComposition, nomcomposition,PrixVenteComposition,PrixSoldeComposition,DescriptionComposition) VALUES (1,'Table et chaise de jardin',622.1,497.68,'Contient une compositon de produit pour un jardin');
INSERT INTO COMPOSITIONPRODUIT(idComposition, nomcomposition,PrixVenteComposition,PrixSoldeComposition,DescriptionComposition) VALUES (2,'Lit et armoire',211.6,169.28,'Contient une compositon de produit pour une chambre');
INSERT INTO COMPOSITIONPRODUIT(idComposition, nomcomposition,PrixVenteComposition,PrixSoldeComposition,DescriptionComposition) VALUES (3,'Table basse et canapé',568.23,454.58,'Contient une compositon de produit pour un salon');
INSERT INTO COMPOSITIONPRODUIT(idComposition, nomcomposition,PrixVenteComposition,PrixSoldeComposition,DescriptionComposition) VALUES (4,'Lot de chaise',487.84,390.27,'Contient une compositon de chaise');
INSERT INTO COMPOSITIONPRODUIT(idComposition, nomcomposition,PrixVenteComposition,PrixSoldeComposition,DescriptionComposition) VALUES (5,'Lot de table',922.77,738.21,'Contient une compositon de table');

/*==============================================================*/
/* INSERT : DETAILCOMMANDE                                      */
/*==============================================================*/
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (1,30,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (1,31,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (1,3,3,6);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (1,42,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (1,38,2,2);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (1,42,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (1,11,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (2,31,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (2,26,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (2,44,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (2,43,5,4);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (2,8,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (2,4,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (2,8,1,3);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (3,39,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (4,1,1,2);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (4,2,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (4,33,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (4,2,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (4,14,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (4,31,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (4,34,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (4,1,3,5);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (5,45,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (5,15,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (5,44,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (5,40,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (6,12,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (6,9,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (6,8,4,2);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (6,49,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (6,2,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (6,4,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (6,1,1,6);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (6,23,5,4);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (6,9,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (6,17,5,6);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (7,32,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (7,20,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (7,8,5,3);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (7,23,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (7,10,2,2);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (7,23,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (8,15,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (8,22,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (8,6,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (9,2,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (9,21,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (9,28,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (9,10,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (9,15,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (9,20,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (9,9,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (9,24,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (9,23,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (10,31,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (10,17,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (10,40,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (10,30,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (10,17,1,3);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (10,1,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (10,34,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (10,48,4,6);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (11,11,1,3);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (11,8,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (11,41,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (11,21,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (11,41,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (11,38,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (11,4,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (11,21,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (11,25,3,2);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (12,42,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (12,28,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (13,18,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (13,2,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (13,3,1,3);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (13,6,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (13,9,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (13,50,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (13,14,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (13,22,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (13,44,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (14,14,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (14,30,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (15,23,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (15,28,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (15,45,4,3);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (15,2,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (15,29,2,4);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (15,5,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (15,27,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (15,28,1,5);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (16,6,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (16,42,2,2);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (16,32,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (16,3,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (16,10,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (16,2,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (16,30,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (17,49,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (17,23,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (17,39,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (17,28,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (17,20,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (17,32,1,6);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (17,45,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (17,43,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (18,2,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (18,24,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (18,40,4,5);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (18,10,3,5);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (18,4,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (18,36,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (18,44,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (19,6,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (19,2,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (20,20,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (20,1,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (20,28,5,6);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (20,8,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (20,17,5,5);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (20,30,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (21,17,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (21,40,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (21,46,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (21,38,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (21,18,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (21,36,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (21,30,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (21,41,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (21,3,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (21,50,1,4);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (22,33,5,2);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (22,34,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (22,38,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (22,24,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (22,47,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (23,29,5,3);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (23,34,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (23,13,1,4);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (23,24,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (23,22,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (23,12,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (23,5,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (23,19,5,2);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (24,13,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (24,19,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (24,27,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (24,46,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (25,45,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (25,28,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (25,27,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (25,7,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (25,10,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (26,27,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (26,5,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (26,36,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (26,43,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (26,24,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (26,33,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (26,2,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (26,18,3,6);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (26,23,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (26,46,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (27,11,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (27,10,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (27,4,4,6);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (27,12,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (28,8,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (28,37,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (28,33,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (29,13,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (29,35,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (29,29,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (30,7,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (30,33,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (30,17,5,5);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (30,24,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (30,27,1,5);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (30,41,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (31,40,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (31,4,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (31,26,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (31,33,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (31,19,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (31,49,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (31,24,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (31,10,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (32,9,2,2);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (32,39,1,6);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (32,32,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (32,7,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (32,3,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (32,46,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (33,2,2,2);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (34,47,4,5);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (34,23,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (34,47,3,2);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (34,48,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (34,19,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (34,31,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (34,23,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (34,43,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (34,32,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (34,42,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (35,9,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (35,11,5,5);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (35,16,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (35,3,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (35,26,1,5);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (35,31,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (35,5,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (35,15,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (36,24,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (36,20,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (37,41,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (37,34,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (38,22,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (38,11,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (38,35,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (39,43,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (39,35,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (39,17,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (39,34,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (39,15,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (40,18,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (40,48,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (40,29,5,4);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (40,24,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (40,2,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (41,19,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (41,12,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (41,10,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (41,15,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (41,22,5,4);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (41,50,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (41,40,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (41,1,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (41,48,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (42,43,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (43,22,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (43,43,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (43,36,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (43,26,1,5);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (43,1,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (43,30,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (43,38,4,2);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (43,5,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (44,47,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (44,15,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (44,42,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (44,3,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (44,12,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (44,22,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (44,38,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (45,22,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (45,46,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (45,15,3,6);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (45,32,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (46,47,1,3);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (46,19,5,5);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (46,24,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (46,23,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (46,6,1,4);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (47,12,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (47,47,4,3);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (47,4,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (47,21,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (47,34,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (47,25,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (47,2,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (47,40,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (47,41,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (48,31,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (48,17,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (48,46,3,2);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (48,28,1,4);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (48,44,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (48,18,5,4);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (49,46,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (49,41,5,2);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (49,48,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (49,16,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (49,25,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (49,1,3,4);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (49,11,5,2);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (49,44,4,5);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (49,31,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (49,34,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (50,30,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (50,15,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (50,35,1,3);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (50,31,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (50,1,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (50,13,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (50,43,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (50,45,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (50,10,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (50,35,4,4);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (51,40,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (52,39,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (52,11,2,6);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (52,40,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (52,44,4,4);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (52,17,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (52,10,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (52,12,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (52,14,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (52,14,4,3);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (52,34,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (53,40,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (53,8,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (54,9,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (54,22,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (54,7,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (54,18,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (54,15,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (54,42,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (54,25,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (54,10,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (54,23,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (54,27,2,6);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (55,50,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (55,15,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (55,1,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (55,6,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (55,30,4,4);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (55,2,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (55,40,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (56,31,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (57,13,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (57,37,3,2);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (57,48,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (57,44,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (57,49,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (57,29,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (57,35,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (57,17,2,2);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (57,2,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (58,40,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (59,6,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (59,42,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (59,10,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (59,45,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (59,27,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (60,14,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (60,2,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (60,43,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (61,32,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (61,2,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (62,10,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (62,31,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (62,23,1,6);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (62,44,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (62,9,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (62,4,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (62,17,3,2);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (63,42,3,5);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (63,13,4,3);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (63,43,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (63,27,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (63,33,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (64,31,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (64,14,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (64,46,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (64,1,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (64,27,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (64,50,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (64,6,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (64,35,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (65,24,1,4);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (65,46,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (65,7,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (65,7,3,5);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (65,5,2,5);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (66,11,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (66,46,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (66,42,5,5);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (66,28,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (66,46,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (66,40,2,3);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (67,5,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (67,25,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (67,27,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (67,9,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (67,34,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (68,31,2,5);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (68,1,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (68,11,5,2);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (68,9,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (68,48,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (68,14,3,5);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (68,41,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (68,36,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (68,3,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (69,33,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (69,7,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (69,42,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (70,19,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (70,14,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (70,26,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (70,17,3,6);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (70,42,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (70,42,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (70,46,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (71,49,5,2);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (71,16,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (71,25,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (71,28,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (72,41,2,6);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (72,8,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (72,11,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (72,3,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (72,36,2,4);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (72,8,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (72,26,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (73,23,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (73,9,2,6);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (73,30,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (73,39,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (73,48,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (73,11,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (73,13,3,5);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (73,40,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (73,34,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (73,36,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (74,19,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (74,9,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (74,33,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (74,39,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (74,12,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (74,31,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (74,40,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (75,46,3,5);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (75,12,2,6);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (75,7,4,6);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (75,5,4,5);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (75,31,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (76,2,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (76,11,1,5);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (76,36,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (77,33,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (77,5,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (77,19,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (77,9,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (77,49,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (77,42,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (78,28,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (78,43,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (78,24,1,2);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (78,28,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (78,19,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (79,49,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (79,20,2,4);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (79,42,2,6);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (79,45,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (79,10,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (79,9,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (79,11,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (79,7,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (80,13,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (80,49,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (80,37,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (80,44,1,3);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (81,13,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (81,45,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (81,11,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (81,7,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (82,43,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (82,3,4,6);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (82,30,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (82,18,1,4);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (82,9,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (83,24,2,3);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (83,38,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (83,6,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (83,42,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (83,26,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (83,18,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (83,25,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (83,7,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (84,36,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (84,18,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (85,37,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (85,41,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (86,38,1,5);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (86,9,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (86,24,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (86,2,3,5);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (86,27,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (86,26,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (87,15,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (87,25,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (87,43,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (87,28,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (88,40,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (88,35,4,5);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (89,17,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (89,34,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (89,32,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (89,49,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (90,32,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (90,5,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (90,30,2,4);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (90,7,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (90,26,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (91,43,2,2);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (91,39,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (91,35,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (91,46,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (91,45,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (91,24,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (91,7,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (92,34,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (92,18,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (92,41,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (92,10,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (93,30,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (93,49,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (93,4,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (93,38,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (93,6,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (93,13,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (94,4,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (94,14,4,6);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (94,6,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (94,43,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (94,3,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (94,12,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (94,32,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (94,25,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (94,44,5,6);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (95,8,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (95,23,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (96,40,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (97,23,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (97,10,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (97,28,2,4);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (98,30,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (98,24,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (98,23,1,6);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (98,12,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (98,39,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (99,50,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (99,18,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (99,28,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (99,6,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (99,5,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (99,45,2,2);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (99,41,5,6);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (99,16,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (100,49,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (100,31,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (100,42,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (100,46,5,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (100,1,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (100,16,2,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (100,30,4,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (100,7,1,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (100,8,3,1);
INSERT INTO detailCommande(idCommande,idProduit,idCouleur,quantitecommande) VALUES (100,7,4,1);

/*==============================================================*/
/* INSERT : DETAILCOMPOSITION                                   */
/*==============================================================*/
Insert into DetailComposition(  idproduit, idcouleur, idcomposition, quantitecomposition) VALUES
(1,1,1,4),
(2,2,1,2),
(3,3,2,3),
(4,4,2,2),
(5,5,2,3);

/*==============================================================*/
/* INSERT : DETAILPANIER                                        */
/*==============================================================*/
INSERT INTO DETAILPANIER(IDCLIENT, IDPRODUIT, IDCOULEUR, QUANTITEPANIER) VALUES (23, 4, 4, 6);
INSERT INTO DETAILPANIER(IDCLIENT, IDPRODUIT, IDCOULEUR, QUANTITEPANIER) VALUES (45, 2, 2, 3);
INSERT INTO DETAILPANIER(IDCLIENT, IDPRODUIT, IDCOULEUR, QUANTITEPANIER) VALUES (16, 3, 3, 8);
INSERT INTO DETAILPANIER(IDCLIENT, IDPRODUIT, IDCOULEUR, QUANTITEPANIER) VALUES (37, 1, 1, 5);
INSERT INTO DETAILPANIER(IDCLIENT, IDPRODUIT, IDCOULEUR, QUANTITEPANIER) VALUES (29, 4, 4, 9);
INSERT INTO DETAILPANIER(IDCLIENT, IDPRODUIT, IDCOULEUR, QUANTITEPANIER) VALUES (13, 5, 5, 7);
INSERT INTO DETAILPANIER(IDCLIENT, IDPRODUIT, IDCOULEUR, QUANTITEPANIER) VALUES (34, 2, 2, 4);
INSERT INTO DETAILPANIER(IDCLIENT, IDPRODUIT, IDCOULEUR, QUANTITEPANIER) VALUES (2, 3, 3, 10);
INSERT INTO DETAILPANIER(IDCLIENT, IDPRODUIT, IDCOULEUR, QUANTITEPANIER) VALUES (41, 1, 1, 2);
INSERT INTO DETAILPANIER(IDCLIENT, IDPRODUIT, IDCOULEUR, QUANTITEPANIER) VALUES (25, 5, 5, 6);
INSERT INTO DETAILPANIER(IDCLIENT, IDPRODUIT, IDCOULEUR, QUANTITEPANIER) VALUES (12, 4, 4, 7);
INSERT INTO DETAILPANIER(IDCLIENT, IDPRODUIT, IDCOULEUR, QUANTITEPANIER) VALUES (8, 2, 2, 5);
INSERT INTO DETAILPANIER(IDCLIENT, IDPRODUIT, IDCOULEUR, QUANTITEPANIER) VALUES (18, 3, 3, 9);
INSERT INTO DETAILPANIER(IDCLIENT, IDPRODUIT, IDCOULEUR, QUANTITEPANIER) VALUES (47, 1, 1, 4);
INSERT INTO DETAILPANIER(IDCLIENT, IDPRODUIT, IDCOULEUR, QUANTITEPANIER) VALUES (10, 5, 5, 3);
INSERT INTO DETAILPANIER(IDCLIENT, IDPRODUIT, IDCOULEUR, QUANTITEPANIER) VALUES (21, 2, 2, 8);
INSERT INTO DETAILPANIER(IDCLIENT, IDPRODUIT, IDCOULEUR, QUANTITEPANIER) VALUES (5, 4, 4, 10);
INSERT INTO DETAILPANIER(IDCLIENT, IDPRODUIT, IDCOULEUR, QUANTITEPANIER) VALUES (32, 3, 3, 2);
INSERT INTO DETAILPANIER(IDCLIENT, IDPRODUIT, IDCOULEUR, QUANTITEPANIER) VALUES (44, 1, 1, 6);
INSERT INTO DETAILPANIER(IDCLIENT, IDPRODUIT, IDCOULEUR, QUANTITEPANIER) VALUES (9, 5, 5, 4);


/*==============================================================*/
/* INSERT : REGROUPEMENTPRODUIT                                 */
/*==============================================================*/
INSERT INTO REGROUPEMENTPRODUIT(nomRegroupement) VALUES ('Nouveautés');
INSERT INTO REGROUPEMENTPRODUIT(nomRegroupement) VALUES ('Promotions');
INSERT INTO REGROUPEMENTPRODUIT(nomRegroupement) VALUES ('Made in France');

/*==============================================================*/
/* INSERT : DETAILREGROUPEMENT                                  */
/*==============================================================*/
INSERT INTO DetailRegroupement(idProduit,idCouleur, idRegroupement) VALUES (1,1,1);
INSERT INTO DetailRegroupement(idProduit,idCouleur, idRegroupement) VALUES (5,5,2);
INSERT INTO DetailRegroupement(idProduit,idCouleur, idRegroupement) VALUES (3,3,3);
INSERT INTO DetailRegroupement(idProduit,idCouleur, idRegroupement) VALUES (2,2,2);
INSERT INTO DetailRegroupement(idProduit,idCouleur, idRegroupement) VALUES (4,4,3);

/*==============================================================*/
/* INSERT : HISTORIQUECONSULTATION                              */
/*==============================================================*/
insert into historiqueConsultation (idclient, idproduit, dateconsultation) values
(7,4,'2024-11-08'),
(7,5,'2023-05-15'),
(8,6,'2022-08-06'),
(9,18,'2024-01-21'),
(14,24,'2023-11-18');
/*==============================================================*/
/* INSERT : MESSAGECHATBOT                                      */
/*==============================================================*/
INSERT INTO MessageChatBot(idMessage,idClient,contenuMessage,reponseMessage) VALUES (1,34,'Bonjour, je souhaiterais obtenir de l''aide pour ma commande','Bienvenue sur le chatbot support Miliboo, notre conversation sera enregistrée afin de mieux répondre aux besoins clients. En quoi puis-je vous aider ?');
INSERT INTO MessageChatBot(idMessage,idClient,contenuMessage,reponseMessage) VALUES (2,NULL,'Bonsoir c''est quoi votre meilleur canapé ?','Bienvenue sur le chatbot support Miliboo, notre conversation sera enregistrée afin de mieux répondre aux besoins clients. Je vous invite à consulter nos nouveautés pour découvrir les dernières tendances !');
INSERT INTO MessageChatBot(idMessage,idClient,contenuMessage,reponseMessage) VALUES (3,34,'Je souhaiterais avoir plus d''informations sur les modalités de liTRUEson','Vous avez à votre disposition la liTRUEson express ou la liTRUEson sous 2 à 5 jours ouvrables. Le transporteur pour la liTRUEson express est France Express.');
INSERT INTO MessageChatBot(idMessage,idClient,contenuMessage,reponseMessage) VALUES (4,NULL,'Sa marche vrmt votre truc ?','Bienvenue sur le chatbot support Miliboo, notre conversation sera enregistrée afin de mieux répondre aux besoins clients. En quoi puis-je vous aider ?');
INSERT INTO MessageChatBot(idMessage,idClient,contenuMessage,reponseMessage) VALUES (5,NULL,'1 2 1 2 Test','Bienvenue sur le chatbot support Miliboo, notre conversation sera enregistrée afin de mieux répondre aux besoins clients. Je suis prêt à répondre à vos questions ! :)');
INSERT INTO MessageChatBot(idMessage,idClient,contenuMessage,reponseMessage) VALUES (6,45,'Je souhaite vendre des meubles','Bienvenue sur le chatbot support Miliboo, notre conversation sera enregistrée afin de mieux répondre aux besoins clients. Si vous souhaitez devenir un de nos partenaires, je vous invite à nous contacter par mail à l''adresse partenaire@miliboo.fr');
INSERT INTO MessageChatBot(idMessage,idClient,contenuMessage,reponseMessage) VALUES (7,29,'Bonsoir je cherche une nouvelle table basse','Bienvenue sur le chatbot support Miliboo, notre conversation sera enregistrée afin de mieux répondre aux besoins clients.  Cherchez-vous un modèle en particulier ?');
INSERT INTO MessageChatBot(idMessage,idClient,contenuMessage,reponseMessage) VALUES (8,34,'Merci, dois-je être présent à la réception ?','Votre signature sera nécessaire, votre présence sera donc requise. Avez-vous d''autres questions ?');
INSERT INTO MessageChatBot(idMessage,idClient,contenuMessage,reponseMessage) VALUES (9,NULL,'Comment faire pour commander ?','Bienvenue sur le chatbot support Miliboo, notre conversation sera enregistrée afin de mieux répondre aux besoins clients. Pour cela il vous suffit de créer un compte client. Vos produits déjà ajoutées au panier seront alors disponibles à la commande.');
INSERT INTO MessageChatBot(idMessage,idClient,contenuMessage,reponseMessage) VALUES (10,34,'Comment faire si je suis absent ?','En cas d''absence, votre commande sera stockée dans un entrepot du transporteur, en attentes de nouvelles modalités de liTRUEson. Le transporteur prendra contact avec vous afin de les établir.');
INSERT INTO MessageChatBot(idMessage,idClient,contenuMessage,reponseMessage) VALUES (11,NULL,'Bonjour le produit que je voulais n''est plus disponible !!!','Bienvenue sur le chatbot support Miliboo, notre conversation sera enregistrée afin de mieux répondre aux besoins clients. Ce produit étant en rupture de stock, il n''est pas possible de le commander pour l''instant. Nous vous présentons nos excuses pour la gêne occasionée.');
INSERT INTO MessageChatBot(idMessage,idClient,contenuMessage,reponseMessage) VALUES (12,37,'Bonsoir je cherche une nouvelle TV','Bienvenue sur le chatbot support Miliboo, notre conversation sera enregistrée afin de mieux répondre aux besoins clients. Malhereusement, nous ne disposons pas de téléviseur sur notre site. Avez-vous d''autres demandes ?');
INSERT INTO MessageChatBot(idMessage,idClient,contenuMessage,reponseMessage) VALUES (13,50,'Bonjour où se trouve mon panier ?','Bienvenue sur le chatbot support Miliboo, notre conversation sera enregistrée afin de mieux répondre aux besoins clients. Il se trouve dans le coin droit de notre page web. Il vous suffit de cliquer sur l''icône "Panier" pour l''afficher.');
INSERT INTO MessageChatBot(idMessage,idClient,contenuMessage,reponseMessage) VALUES (14,10,'Le chatbot fonctionne ?','Bienvenue sur le chatbot support Miliboo, notre conversation sera enregistrée afin de mieux répondre aux besoins clients. En quoi puis-je vous aider ?');
INSERT INTO MessageChatBot(idMessage,idClient,contenuMessage,reponseMessage) VALUES (15,34,'Merci !','Je suis ravi d''avoir pu vous aider. Avez-vous d''autres questions ?');
INSERT INTO MessageChatBot(idMessage,idClient,contenuMessage,reponseMessage) VALUES (16,12,'Bonjour je veux supprimer mon compte svp','Bienvenue sur le chatbot support Miliboo, notre conversation sera enregistrée afin de mieux répondre aux besoins clients. Sans problème ! Il vous suffit d''envoyer un mail à l''adresse support-client@miliboo.fr afin de formuler votre demande. Un de nos conseiller vous répondrera sous 48H.');
INSERT INTO MessageChatBot(idMessage,idClient,contenuMessage,reponseMessage) VALUES (17,21,'Bonjour c''est ChatGpt ?','Bienvenue sur le chatbot support Miliboo, notre conversation sera enregistrée afin de mieux répondre aux besoins clients. Je ne suis perfectionné à ce point, mais je souhaite faire de mon mieux pour vous aider ! Comment puis-je répondre à vos questions ?');
INSERT INTO MessageChatBot(idMessage,idClient,contenuMessage,reponseMessage) VALUES (18,50,'Merci c''est bon','Avec plaisir ! Avez-vous d''autres questions ?');


/*==============================================================*/
/* INSERT : TYPEPAIEMENT                                        */
/*==============================================================*/
INSERT INTO typepaiement(idTypePaiement,nomTypePaiement) VALUES (1,'Carte Bancaire');
INSERT INTO typepaiement(idTypePaiement,nomTypePaiement) VALUES (2,'Paypal');
INSERT INTO typepaiement(idTypePaiement,nomTypePaiement) VALUES (3,'Virement Bancaire');

/*==============================================================*/
/* INSERT : PAIEMENT                                            */
/*==============================================================*/
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (1,1,1,'2023-01-07',329.99,'3696');
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (2,3,2,'2023-01-07',389.99,NULL);
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (3,1,3,'2023-01-08',159.99,'5184');
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (4,1,4,'2023-01-17',599.99,'8757');
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (5,1,6,'2023-01-20',3629.99,'2130');
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (6,3,5,'2023-01-21',979.99,NULL);
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (7,1,7,'2023-01-25',2569.99,'7527');
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (8,1,8,'2023-01-30',1609.99,'9474');
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (9,2,9,'2023-01-30',3879.99,NULL);
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (10,2,10,'2023-02-02',2489.99,NULL);
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (11,2,11,'2023-02-04',2939.99,NULL);
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (12,3,12,'2023-02-19',2019.99,NULL);
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (13,1,13,'2023-02-25',1339.99,'1632');
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (14,3,14,'2023-02-28',2779.99,NULL);
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (15,2,15,'2023-03-03',2079.99,NULL);
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (16,1,16,'2023-03-03',1539.99,'6007');
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (17,1,17,'2023-03-03',399.99,'9436');
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (18,2,18,'2023-03-10',2729.99,NULL);
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (19,1,3,'2023-03-11',159.99,'5184');
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (20,1,19,'2023-03-14',2409.99,'5983');
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (21,1,20,'2023-03-19',2679.99,'4701');
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (22,3,22,'2023-03-20',3959.99,NULL);
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (23,1,17,'2023-03-20',399.99,'9436');
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (24,3,21,'2023-03-21',1869.99,NULL);
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (25,1,23,'2023-03-29',3129.99,'2232');
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (26,2,24,'2023-04-01',3269.99,NULL);
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (27,1,25,'2023-04-05',2579.99,'2106');
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (28,1,3,'2023-04-06',159.99,'5184');
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (29,3,26,'2023-04-07',1229.99,NULL);
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (30,2,27,'2023-04-15',2929.99,NULL);
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (31,1,17,'2023-04-15',399.99,'9436');
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (32,1,28,'2023-04-16',39.99,'3469');
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (33,2,29,'2023-04-25',129.99,NULL);
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (34,1,30,'2023-04-26',2129.99,'6200');
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (35,2,31,'2023-05-04',1399.99,NULL);
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (36,3,32,'2023-05-06',3919.99,NULL);
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (37,1,34,'2023-05-12',1869.99,'1817');
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (38,2,33,'2023-05-13',1999.99,NULL);
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (39,2,15,'2023-05-13',29.99,NULL);
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (40,2,35,'2023-05-16',409.99,NULL);
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (41,1,36,'2023-05-20',799.99,'4814');
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (42,1,17,'2023-05-21',399.99,'9436');
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (43,3,37,'2023-05-24',3979.99,NULL);
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (44,2,38,'2023-05-25',2209.99,NULL);
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (45,2,39,'2023-06-02',3719.99,NULL);
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (46,2,41,'2023-06-03',1979.99,NULL);
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (47,2,40,'2023-06-05',2359.99,NULL);
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (48,3,22,'2023-06-05',2829.99,NULL);
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (49,1,42,'2023-06-14',1619.99,'4757');
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (50,2,43,'2023-06-14',669.99,NULL);
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (51,1,44,'2023-06-21',2979.99,'4325');
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (52,2,47,'2023-07-04',1449.99,NULL);
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (53,1,45,'2023-07-05',2879.99,'1716');
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (54,2,46,'2023-07-08',1589.99,NULL);
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (55,3,48,'2023-07-09',949.99,NULL);
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (56,3,49,'2023-07-13',419.99,NULL);
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (57,3,50,'2023-07-14',2719.99,NULL);
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (58,2,46,'2023-07-14',3249.99,NULL);
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (59,1,51,'2023-07-15',3539.99,'9441');
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (60,3,52,'2023-07-18',89.99,NULL);
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (61,1,53,'2023-07-19',1419.99,'1843');
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (62,3,54,'2023-07-20',999.99,NULL);
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (63,1,36,'2023-07-21',799.99,'4814');
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (64,3,55,'2023-07-21',819.99,NULL);
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (65,2,56,'2023-07-24',3589.99,NULL);
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (66,1,57,'2023-07-30',689.99,'6358');
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (67,3,52,'2023-07-31',1829.99,NULL);
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (68,2,58,'2023-07-31',2529.99,NULL);
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (69,2,59,'2023-08-07',2779.99,NULL);
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (70,2,60,'2023-08-14',159.99,NULL);
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (71,2,61,'2023-08-16',1019.99,NULL);
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (72,2,62,'2023-08-23',2349.99,NULL);
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (73,2,63,'2023-08-23',359.99,NULL);
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (74,1,64,'2023-08-26',1069.99,'2598');
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (75,3,65,'2023-08-31',3709.99,NULL);
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (76,1,66,'2023-09-10',1019.99,'9524');
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (77,3,67,'2023-09-16',2269.99,NULL);
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (78,1,68,'2023-09-24',2859.99,'9354');
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (79,1,69,'2023-10-10',819.99,'9414');
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (80,1,70,'2023-10-10',2749.99,'7733');
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (81,2,71,'2023-10-14',3219.99,NULL);
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (82,2,72,'2023-10-17',3039.99,NULL);
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (83,1,73,'2023-10-17',99.99,'1855');
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (84,1,75,'2023-10-21',939.99,'8457');
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (85,1,76,'2023-10-22',899.99,'8987');
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (86,3,74,'2023-10-23',2519.99,NULL);
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (87,2,78,'2023-10-24',599.99,NULL);
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (88,1,73,'2023-10-25',99.99,'1855');
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (89,2,77,'2023-10-25',2599.99,NULL);
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (90,3,79,'2023-10-28',1379.99,NULL);
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (91,1,80,'2023-10-29',1209.99,'4470');
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (92,1,81,'2023-11-04',959.99,'2295');
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (93,2,82,'2023-11-08',899.99,NULL);
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (94,2,83,'2023-11-17',3869.99,NULL);
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (95,2,82,'2023-11-17',3019.99,NULL);
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (96,1,86,'2023-11-20',959.99,'1096');
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (97,2,88,'2023-11-21',2489.99,NULL);
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (98,3,84,'2023-11-22',429.99,NULL);
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (99,1,85,'2023-11-23',1259.99,'6918');
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (100,3,89,'2023-11-28',819.99,NULL);
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (101,1,85,'2023-11-29',1259.99,'6918');
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (102,2,90,'2023-11-29',2799.99,NULL);
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (103,3,92,'2023-12-10',2199.99,NULL);
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (104,3,93,'2023-12-12',1389.99,NULL);
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (105,2,94,'2023-12-13',2999.99,NULL);
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (106,2,95,'2023-12-13',3059.99,NULL);
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (107,2,98,'2023-12-19',879.99,NULL);
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (108,3,97,'2023-12-21',2639.99,NULL);
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (109,1,85,'2023-12-28',1259.99,'6918');
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (110,2,99,'2023-12-28',2169.99,NULL);
INSERT INTO paiement(idpaiement,idtypepaiement,idcommande,datepaiement,montantpaiement,indicepaiement) VALUES (111,3,100,'2023-12-30',429.99,NULL);

/*==============================================================*/
/* INSERT : PHOTOAVIS                                           */
/*==============================================================*/
INSERT INTO PhotoAvis(idPhoto,idAvis) VALUES (1,1);
INSERT INTO PhotoAvis(idPhoto,idAvis) VALUES (2,2);
INSERT INTO PhotoAvis(idPhoto,idAvis) VALUES (3,3);
INSERT INTO PhotoAvis(idPhoto,idAvis) VALUES (4,4);
INSERT INTO PhotoAvis(idPhoto,idAvis) VALUES (5,5);
INSERT INTO PhotoAvis(idPhoto,idAvis) VALUES (6,6);
INSERT INTO PhotoAvis(idPhoto,idAvis) VALUES (7,7);
INSERT INTO PhotoAvis(idPhoto,idAvis) VALUES (8,8);
INSERT INTO PhotoAvis(idPhoto,idAvis) VALUES (9,9);
INSERT INTO PhotoAvis(idPhoto,idAvis) VALUES (10,10);
INSERT INTO PhotoAvis(idPhoto,idAvis) VALUES (11,11);
INSERT INTO PhotoAvis(idPhoto,idAvis) VALUES (12,12);
INSERT INTO PhotoAvis(idPhoto,idAvis) VALUES (13,13);
INSERT INTO PhotoAvis(idPhoto,idAvis) VALUES (14,14);

/*==============================================================*/
/* INSERT : PHOTOPRODUITCOLORATION                              */
/*==============================================================*/
INSERT INTO PhotoProduitColoration(idPhoto,idProduit,idCouleur) VALUES (31,1,1);
INSERT INTO PhotoProduitColoration(idPhoto,idProduit,idCouleur) VALUES (32,1,1);
INSERT INTO PhotoProduitColoration(idPhoto,idProduit,idCouleur) VALUES (33,1,1);
INSERT INTO PhotoProduitColoration(idPhoto,idProduit,idCouleur) VALUES (34,2,2);
INSERT INTO PhotoProduitColoration(idPhoto,idProduit,idCouleur) VALUES (35,2,2);
INSERT INTO PhotoProduitColoration(idPhoto,idProduit,idCouleur) VALUES (36,2,2);
INSERT INTO PhotoProduitColoration(idPhoto,idProduit,idCouleur) VALUES (37,3,3);
INSERT INTO PhotoProduitColoration(idPhoto,idProduit,idCouleur) VALUES (38,3,3);
INSERT INTO PhotoProduitColoration(idPhoto,idProduit,idCouleur) VALUES (39,3,3);
INSERT INTO PhotoProduitColoration(idPhoto,idProduit,idCouleur) VALUES (40,3,3);
INSERT INTO PhotoProduitColoration(idPhoto,idProduit,idCouleur) VALUES (41,4,4);
INSERT INTO PhotoProduitColoration(idPhoto,idProduit,idCouleur) VALUES (42,4,4);
INSERT INTO PhotoProduitColoration(idPhoto,idProduit,idCouleur) VALUES (43,4,4);
INSERT INTO PhotoProduitColoration(idPhoto,idProduit,idCouleur) VALUES (44,4,4);
INSERT INTO PhotoProduitColoration(idPhoto,idProduit,idCouleur) VALUES (45,5,5);
INSERT INTO PhotoProduitColoration(idPhoto,idProduit,idCouleur) VALUES (46,5,5);
INSERT INTO PhotoProduitColoration(idPhoto,idProduit,idCouleur) VALUES (47,5,5);

/*==============================================================*/
/* INSERT : PRODUITSIMILAIRE                                    */
/*==============================================================*/
insert into ProduitSimilaire (idproduit, pro_idproduit) values
(1,2),
(2,1),
(4,5),
(5,4),
(8,9),
(9,8);
/*==============================================================*/
/* INSERT : PROFESSIONEL                                        */
/*==============================================================*/
INSERT INTO professionel(idClient,idActivitePro,nomSociete,numTVA) VALUES (13,4,'Goupil&co',66517918934);
INSERT INTO professionel(idClient,idActivitePro,nomSociete,numTVA) VALUES (2,2,'Gou''Beers',84537031207);
INSERT INTO professionel(idClient,idActivitePro,nomSociete,numTVA) VALUES (5,3,'Rob''computing',50902419471);
INSERT INTO professionel(idClient,idActivitePro,nomSociete,numTVA) VALUES (11,1,'Trouba''sleep',89667578639);
INSERT INTO professionel(idClient,idActivitePro,nomSociete,numTVA) VALUES (14,4,'Quent''inside',80683386968);
INSERT INTO professionel(idClient,idActivitePro,nomSociete,numTVA) VALUES (18,2,'StapleFood',28627203649);
INSERT INTO professionel(idClient,idActivitePro,nomSociete,numTVA) VALUES (25,3,'MaelOffice',32842170408);
INSERT INTO professionel(idClient,idActivitePro,nomSociete,numTVA) VALUES (27,1,'Colin Horizon',84282478798);
INSERT INTO professionel(idClient,idActivitePro,nomSociete,numTVA) VALUES (36,2,'la table de Vincent',19823543357);
INSERT INTO professionel(idClient,idActivitePro,nomSociete,numTVA) VALUES (39,3,'DamaSynergie',56771559606);
INSERT INTO professionel(idClient,idActivitePro,nomSociete,numTVA) VALUES (42,2,'le festin d''Alexis',17958701309);
INSERT INTO professionel(idClient,idActivitePro,nomSociete,numTVA) VALUES (44,2,'bistro merveille',15476180293);
INSERT INTO professionel(idClient,idActivitePro,nomSociete,numTVA) VALUES (48,1,'oasis urban',91983408720);

/*==============================================================*/
/* INSERT : QUESTIONFORMULAIRE                                  */
/*==============================================================*/
INSERT INTO QuestionFormulaire(idquestion,idaction,nompersonne,emailpersonne,telpersonne,contenuquestion,dateenvoi) VALUES (1,1,'Verreau','verreau@gmail.com','33655555555','Je ne suis pas satisfait de mon meuble, je souhaite être remboursé','2024-11-14');
INSERT INTO QuestionFormulaire(idquestion,idaction,nompersonne,emailpersonne,telpersonne,contenuquestion,dateenvoi) VALUES (2,2,'Jodion','jodion@gmail.com','33666666666','Mon colis n''a jamais été livrée','2024-09-10');
INSERT INTO QuestionFormulaire(idquestion,idaction,nompersonne,emailpersonne,telpersonne,contenuquestion,dateenvoi) VALUES (3,3,'Cotuand','cotuand@gmail.com','33677777777','J''ai été débité 2 fois au lieux d''une seul','2024-08-09');
INSERT INTO QuestionFormulaire(idquestion,idaction,nompersonne,emailpersonne,telpersonne,contenuquestion,dateenvoi) VALUES (4,4,'Fecteau','fecteau@gmail.com','33688888888','J''ai reçu ma table avec un pied manquand','2024-01-17');
INSERT INTO QuestionFormulaire(idquestion,idaction,nompersonne,emailpersonne,telpersonne,contenuquestion,dateenvoi) VALUES (5,5,'Arcouet','arcouet@gmail.com','33699999999','Vos chaise sont-elle livrée avec des vis supplémentaire ?','2023-11-18');

/*==============================================================*/
/* INSERT : TYPESIGNALEMENT                                     */
/*==============================================================*/
INSERT INTO TYPESIGNALEMENT(nomTypeSignalement) VALUES ('Discours haineux');
INSERT INTO TYPESIGNALEMENT(nomTypeSignalement) VALUES ('Harcèlement');
INSERT INTO TYPESIGNALEMENT(nomTypeSignalement) VALUES ('Propos vulgaires');
INSERT INTO TYPESIGNALEMENT(nomTypeSignalement) VALUES ('Spam');
INSERT INTO TYPESIGNALEMENT(nomTypeSignalement) VALUES ('Faux avis');
INSERT INTO TYPESIGNALEMENT(nomTypeSignalement) VALUES ('Contenu choquant');
INSERT INTO TYPESIGNALEMENT(nomTypeSignalement) VALUES ('Propagande politique');
INSERT INTO TYPESIGNALEMENT(nomTypeSignalement) VALUES ('Propos sexistes');
INSERT INTO TYPESIGNALEMENT(nomTypeSignalement) VALUES ('Propos homophobes');
INSERT INTO TYPESIGNALEMENT(nomTypeSignalement) VALUES ('Contenu illégal');

/*==============================================================*/
/* INSERT : SIGNALEMENTAVIS                                     */
/*==============================================================*/
INSERT INTO SignalementAvis(idAvis,idTypeSignalement,emailSignalement,dateSignalement,contenuSignalement) VALUES (31,5,'leroy8030@icloud.com','2023-08-20','C''est un avis frauduleux');

/*==============================================================*/
/* INSERT : VALEURATTRIBUT                                      */
/*==============================================================*/
insert into valeurAttribut(idAttribut, idProduit, Valeur) Values
(1,1,'Bois foncé'),
(2,2,'Bois Clair'),
(3,4,'Bois noyer'),
(4,4,'139 cm'),
(5,8,'150-200cm');