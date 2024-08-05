
-- JOIN : jointure interne

-- ne marche pas 
SELECT employe.nom, employe.prenom, service.nom nomService FROM `employe`, `service`;

-- jointure implicite (moins lisible et ancienne méthode)
SELECT employe.nom, employe.prenom, service.nom nomService FROM `employe`, `service` WHERE employe.idService = service.idService;

-- jointure explicite (plus lisible et méthode moderne, bonne pratique) on peut utiliser INNER JOIN ou JOIN
SELECT `employe`.`nom`, `employe`.`prenom`, `service`.`nom` `nomService` 
FROM `employe`
INNER JOIN `service`
ON `employe`.`idService` = `service`.`idService`;

-- on peut intervertir l'odre du nom des tables pour from et join mais seulement pour les jointures internes
SELECT `employe`.`nom`, `employe`.`prenom`, `service`.`nom` `nomService` 
FROM `service`
JOIN `employe`
ON `employe`.`idService` = `service`.`idService`;

-- clé primaire et la clé étrangère portent le meme nom on peut utiliser USING()
SELECT `employe`.`nom`, `employe`.`prenom`, `service`.`nom` `nomService` 
FROM `service`
JOIN `employe`
USING(`idService`)

-- Ici ça ne fonctionnerait pas car nous avons 2 colonnes qui portent le meme nom : idService et nom
-- Cela fonctionnerait si nous avions préfixé nos colonnes (ex: emp_nom, serv_nom) car il y aurait eu que la colonne idService en commun
SELECT `employe`.`nom`, `employe`.`prenom`, `service`.`nom` `nomService` 
FROM `employe`
NATURAL JOIN `service`;


-- jointure externes : LEFT JOIN et RIGHT JOIN

-- LEFT JOIN : on inclut les données communes + les donnees de la table se trouvant à gauche du mot cle JOIN, ici c'est la table employe
SELECT `employe`.`nom`, `employe`.`prenom`, `service`.`nom` `nomService` 
FROM `employe` LEFT JOIN `service`
USING(`idService`);

-- RIGHT JOIN : on inclut les données communes + les donnees de la table se trouvant à droite du mot cle JOIN, ici c'est la table service
SELECT `employe`.`nom`, `employe`.`prenom`, `service`.`nom` `nomService` 
FROM `employe` RIGHT JOIN `service`
USING(`idService`);

-- exemple en changeant l'odre 
-- Dans une jointure externe, l'odre des tables a un importance et donc ici les 2 requêtes produisent le même résultat 
SELECT `employe`.`nom`, `employe`.`prenom`, `service`.`nom` `nomService` 
FROM `employe` LEFT JOIN `service`
USING(`idService`);

SELECT `employe`.`nom`, `employe`.`prenom`, `service`.`nom` `nomService` 
FROM `service` RIGHT JOIN `employe`
USING(`idService`);

-- Par habitude /en génral la jointure LEFT est la plus utilisée.
-- Pour avoir les 2 (LEFT et RIGHT en même temps) pour les autres SGBD (ex: oracle) il y a le FULL JOIN mais pas avec MySQL il faudra utiliser UNION.


-- Alias de table 
SELECT `e`.`nom`, `e`.`prenom`, `s`.`nom` `nomService` 
FROM `employe` `e`
LEFT JOIN `service` `s`
USING(`idService`);


-- jointure externes entre plus de 2 tables 
SELECT CONCAT(`e`.`nom`, ' ' ,`e`.`prenom`) emp, `s`.`nom` `nomService`, CONCAT(`r`.`nom`, ' ' ,`r`.`prenom`) resp
FROM `employe` `e`
LEFT JOIN `service` `s`
USING(`idService`)
LEFT JOIN `responsable` `r`
USING(`idResponsable`);
-- Attention à l'ordre des jointures. C'est impossible d'aller directement de employ à responsable, il faut obligatoiremetn passer par service


-- jointure réflexive (table employereflex)
SELECT CONCAT(`e`.`nom`, ' ' ,`e`.`prenom`) `emp`, CONCAT(`r`.`nom`, ' ' ,`r`.`prenom`) `resp`
FROM `employe` `e`
JOIN `employe` `r`
ON `e`.`idResponsable` = `r`.`idEmploye`;


-- sous-requetes
SELECT nom, prenom, salaire 
FROM `employe` 
GROUP BY nom 
HAVING salaire > (SELECT AVG(salaire) FROM `employe`);

-- astuce / ruse pour ne pas faire de sous requete
SELECT `e1`.`nom`, `e1`.`prenom`, `e1`.`salaire` 
FROM `employe` `e1`
JOIN `employe` `e2`
GROUP BY `e1`.`idEmploye` 
HAVING `e1`.`salaire` > AVG(`e2`.`salaire`);


-- sous requete comme table après un FROM
SELECT nomComplet 
FROM (
  SELECT CONCAT(`prenom`, ' ', `nom`) `nomComplet` FROM `responsable`
  ) `r`;

-- sous requete comme table après un JOIN
SELECT `e`.`nom`, `e`.`prenom`
FROM `employe` `e`
JOIN ( SELECT * FROM `service`) `s`
USING(`idService`)
WHERE `s`.`nom`= 'IT';

-- N'oubliez pas, chaque fois qu'une sous requete est utilisée à la façon d'une table temporaire, elle DOIT avoir un alias meme si il n'est pas utilisé ailleur dans l'ensemble de la requete 


-- UNION 
-- les unions de requetes permettent d'assembler les résultats de plusieurs requetes
SELECT `nom`, `prenom` FROM `employe`
UNION 
SELECT `nom`, `prenom` FROM `responsable`
ORDER BY `nom`

-- REGLES 
-- les SELECT doivent selectionner le meme nombre de colonne
-- Une seul clause ORDER BY portant uniquement sur les colonnes de la premier requete
-- dans le resultat, le nom des colonnes seront ceux de la premiere requete


-- avec UNION les doublons sont éliminé (donc il en garde qu'un) 
SELECT `nom`FROM `employe`
UNION 
SELECT `nom` FROM `responsable`
ORDER BY `nom`

-- UNION ALL on garde tout
SELECT `nom`FROM `employe`
UNION ALL
SELECT `nom` FROM `responsable`
ORDER BY `nom`