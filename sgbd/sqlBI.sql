/* View */
CREATE OR REPLACE VIEW miliboo.v_fait_ventes AS
SELECT 
    dc.idcommande,
    dc.idproduit,
    dc.idcouleur,
    dc.quantitecommande,
    c.datecommande,
    col.prixvente,
    col.prixsolde,
    COALESCE(col.prixsolde, col.prixvente) * dc.quantitecommande as montant_total,
    c.idclient,
    c.idadresse,
    p.idtypeproduit,
    p.idpays as pays_origine
FROM miliboo.detailcommande dc
JOIN miliboo.commande c ON dc.idcommande = c.idcommande
JOIN miliboo.coloration col ON dc.idproduit = col.idproduit AND dc.idcouleur = col.idcouleur
JOIN miliboo.produit p ON dc.idproduit = p.idproduit;

CREATE OR REPLACE VIEW miliboo.v_dim_temps AS
SELECT DISTINCT
    datecommande,
    EXTRACT(YEAR FROM datecommande) as annee,
    EXTRACT(MONTH FROM datecommande) as mois,
    EXTRACT(QUARTER FROM datecommande) as trimestre
FROM miliboo.commande;

CREATE OR REPLACE VIEW miliboo.v_dim_produit AS
SELECT 
    p.idproduit,
    p.nomproduit,
    tp.idtypeproduit,
    tp.nomtypeproduit,
    cp.idcategorie,
    cp.nomcategorie,
    p.coutlivraison,
    p.delailivraison
FROM miliboo.produit p
JOIN miliboo.typeproduit tp ON p.idtypeproduit = tp.idtypeproduit
JOIN miliboo.categorieproduit cp ON tp.idcategorie = cp.idcategorie;

CREATE OR REPLACE VIEW miliboo.v_dim_geographie AS
SELECT 
    a.idadresse,
    a.nomrue,
    a.codepostaladresse,
    v.nomville,
    d.nomdepartement,
    p.idpays,
    p.nompays
FROM miliboo.adresse a
JOIN miliboo.ville v ON a.codeinsee = v.codeinsee
JOIN miliboo.departement d ON a.iddepartement = d.iddepartement
JOIN miliboo.pays p ON a.idpays = p.idpays;

CREATE OR REPLACE VIEW miliboo.v_dim_client AS
SELECT 
    c.idclient,
    c.nomclient,
    c.prenomclient,
    c.civiliteclient,
    c.datecreationcompte,
    c.pointfideliteclient
FROM miliboo.client c