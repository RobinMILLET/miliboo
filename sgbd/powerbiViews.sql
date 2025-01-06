DROP VIEW IF EXISTS ViewCommandeDetails;
CREATE VIEW ViewCommandeDetails AS
SELECT 
    com.idcommande AS commande_id, 
    com.datecommande AS commande_date, 
    det.idproduit AS produit_id, 
    pro.nomproduit AS produit_nom, 
    coul.nomcouleur AS couleur_nom, 
    typ.nomtypeproduit AS type_produit, 
    col.prixvente AS prix_vente, 
    vil.nomville AS ville_nom, 
    adr.codepostaladresse AS code_postal, 
    pays.nompays AS pays_nom
FROM commande com
JOIN detailcommande det ON com.idcommande = det.idcommande
JOIN produit pro ON det.idproduit = pro.idproduit
JOIN typeproduit typ ON pro.idtypeproduit = typ.idtypeproduit
JOIN coloration col ON det.idproduit = col.idproduit AND det.idcouleur = col.idcouleur
JOIN couleur coul ON col.idcouleur = coul.idcouleur
JOIN adresse adr ON com.idclient = adr.idclient
JOIN ville vil ON adr.codeinsee = vil.codeinsee
JOIN pays ON adr.idpays = pays.idpays
ORDER BY com.idcommande ASC;
SELECT * FROM ViewCommandeDetails;

/* postgresql-s234.alwaysdata.net 
s234_postgresql*/

CREATE VIEW ViewCommandeClientDetails AS
SELECT 
    com.idcommande AS commande_id, 
    cli.idclient AS client_id, 
    cli.nomclient AS client_nom
FROM commande com
JOIN client cli ON com.idclient = cli.idclient
ORDER BY cli.idclient ASC;