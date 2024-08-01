-- SELECT (Read dans le CRUD)
SELECT * FROM `employe`;
SELECT `nom` FROM `employe`;
SELECT `nom`, `prenom`, `salaire` FROM `employe`;
SELECT DISTINCT `service` FROM `employe`;
SELECT DISTINCT `service`, `sexe` FROM `employe`;

-- LIMIT
SELECT `prenom` FROM `employe` LIMIT 2;
SELECT `prenom` FROM `employe` LIMIT 2, 3;
SELECT `prenom` FROM `employe` LIMIT 2 OFFSET 3;

-- WHERE
SELECT `prenom` FROM `employe` WHERE `sexe` = 'F';
SELECT `prenom` FROM `employe` WHERE `sexe` != 'F';
SELECT `prenom`, `salaire` FROM `employe` WHERE `salaire` >= 2000;
SELECT `prenom`, `dateContrat` FROM `employe` WHERE `dateContrat` < '2016-01-01';

-- IS NULL
SELECT `prenom` FROM `employe` WHERE `service` IS NULL;
SELECT `prenom` FROM `employe` WHERE `service` IS NOT NULL;
SELECT `prenom` FROM `employe` WHERE ISNULL(`service`);
SELECT `prenom` FROM `employe` WHERE NOT ISNULL(`service`);

-- BETWEEN
SELECT `prenom`, `salaire` FROM `employe` WHERE `salaire` BETWEEN 1800 AND 3000;
SELECT `prenom` FROM `employe` WHERE `prenom` BETWEEN 'A' AND 'G';
SELECT `prenom`, `dateContrat` FROM `employe` WHERE `dateContrat` BETWEEN '2016-01-01' AND '2022-01-01';

-- IN
SELECT prenom FROM employe WHERE salaire IN (1800, 3000);
SELECT prenom FROM employe WHERE salaire IN (1700, 1800, 3000);
SELECT prenom FROM employe WHERE nom IN ('Roche', 'Péron');
SELECT prenom FROM employe WHERE dateContrat IN ('2016-01-01', '2022-01-01');

-- LIKE
SELECT `nom`, `prenom` FROM `employe` WHERE `nom` LIKE 'T%';
SELECT `nom`, `prenom` FROM `employe` WHERE `nom` LIKE '%E';
SELECT `nom`, `prenom` FROM `employe` WHERE `nom` LIKE 'R%E';
SELECT `nom`, `prenom` FROM `employe` WHERE `nom` LIKE '%E%';
SELECT `nom`, `prenom`, `salaire` FROM `employe` WHERE `salaire` LIKE '_0__';
SELECT `nom`, `prenom`, `salaire` FROM `employe` WHERE `salaire` LIKE '_0%';

-- AND
SELECT `nom`, `prenom`, `salaire` FROM `employe` WHERE `sexe` = 'F' AND `salaire` > 2000;
-- OR 
SELECT `nom`, `prenom`, `salaire` FROM `employe` WHERE `sexe` = 'F' OR `salaire` > 2000;
-- +, -, *, /, %
SELECT `nom`, `prenom`, `salaire` FROM `employe` WHERE `salaire`*12 < 25000;


-- CONCAT()
SELECT CONCAT(`nom`, ' ' , `prenom`) FROM `employe`;

-- AS (ALIAS)
SELECT CONCAT(`nom`, ' ' , `prenom`) AS `nomComplet` FROM `employe`;
SELECT CONCAT(`nom`, ' ' , `prenom`) `nomComplet` FROM `employe`;
SELECT CONCAT(`nom`, ' ' , `prenom`) `nomComplet`, `salaire` `salary` FROM `employe`;

-- ALIAS ne fonctionne pas avec le WHERE
SELECT CONCAT(`nom`, ' ' , `prenom`) AS `nomComplet` FROM `employe` WHERE `nomComplet` LIKE 'R%';
-- ALIAS fonctionne avec le HAVING
SELECT CONCAT(`nom`, ' ' , `prenom`) AS `nomComplet` FROM `employe` HAVING `nomComplet` LIKE 'R%';


-- ORDER BY
SELECT `nom`, `prenom` FROM `employe` ORDER BY `nom`;
SELECT `nom`, `prenom` FROM `employe` ORDER BY `nom`, `prenom`;
-- ORDER BY ASC (croissant) / ORDER BY DESC (décroissant)
SELECT `nom`, `prenom` FROM `employe` ORDER BY `nom` ASC;
SELECT `nom`, `prenom` FROM `employe` ORDER BY `nom` DESC;
SELECT `nom`, `prenom`, `salaire` FROM `employe` ORDER BY `salaire` DESC;
SELECT `nom`, `prenom`, `salaire` FROM `employe` ORDER BY `sexe` ASC,`salaire` DESC;


-- Fonctions d'aggrégation
-- COUNT(nomCol) ne dénombre pas les NULL
SELECT COUNT(`service`) `nbService`  FROM `employe`;
SELECT COUNT(DISTINCT `service`) `nbService`  FROM `employe`;

-- COUNT(*) compte tous employe
SELECT COUNT(`idEmploye`) `nbEmploye`  FROM `employe`;

-- COUNT(COALESCE(nomCol, caractere vide)) permet de compter les éléments NULL en les remplaçant par une chaine de caractère vide
SELECT COUNT(COALESCE(service, '')) AS total_service FROM employe;

-- COUNT(COALESCE(nomCol, chaine de caractere)) permet remplacer les valeurs NULL d'une colonne par un chaine de caractère ici par test
SELECT COUNT(COALESCE(service, 'test')) AS total_service FROM employe;

SELECT COUNT(`service` FROM `employe` WHERE `service` IS NULL) FROM `employe`;

-- MIN() / MAX()
SELECT MIN(`salaire`) `salaireMin` FROM `employe`; 
-- Attention avec les chaines de caracteres cela revient a avoir par ordre aphabétique si vous voulez avoir la longueur utilsez LENGTH()
SELECT MIN(`nom`) `nomMax` FROM `employe`; 

SELECT MAX(`dateContrat`) `dateMAx` FROM `employe`; 

-- SUM()
SELECT SUM(`salaire`) `totalSalaire` FROM `employe`;

SELECT SUM(`salaire`) / COUNT(*) `moyenne` FROM `employe`;

-- AVG()
SELECT AVG(`salaire`) `moyenne` FROM `employe`;
-- AVG() calcul de la moyenne avec changement de typage en INT grace au CAST()
SELECT CAST(AVG(`salaire`) AS SIGNED INTEGER) `moyenne` FROM `employe`;
-- AVG() calcul de la moyenne arrondi avec changement de typage en INT grace au ROUND() (preferer dans ce cas la )
SELECT ROUND(AVG(`salaire`)) `moyenne` FROM `employe`;
-- arrondi avec 2 chiffres apres la virgule
SELECT ROUND(AVG(`salaire`), 2) `moyenne` FROM `employe`;


-- GROUP BY
SELECT `sexe`, ROUND(AVG(`salaire`), 2) `salaireMoyen` FROM `employe` GROUP BY `sexe`;

/*
 Ordre des clauses :
  SELECT FROM
  WHERE
  GROUP BY
  HAVING
  ORDER BY
  LIMIT
*/

--HAVING 
-- attention la clause WHERE est lue en début de requete ce qui pose probleme si vous faite une comparaison basée sur un alias cela la rend impossible
-- pas de WHERE sur un alias
SELECT `service`, ROUND(AVG(`salaire`), 2) `salaireMoyen`
FROM `employe`
WHERE `salaireMoyen` > 2000
GROUP BY `service`;

-- la clause HAVING est lue en fin de requete donc une comparaison basée sur un alias est possible
SELECT `service`, ROUND(AVG(`salaire`), 2) `salaireMoyen`
FROM `employe`
GROUP BY `service`
HAVING `salaireMoyen` > 2000;


SELECT `service`, ROUND(AVG(`salaire`), 2) `salaireMoyen`
FROM `employe`
WHERE `salaire` > 1800
GROUP BY `service`
HAVING `salaireMoyen` > 2000;

SELECT `sexe`, ROUND(AVG(`salaire`), 2) `salaireMoyen`
FROM `employe`
WHERE `sexe` = 'F'
GROUP BY `service`;

SELECT `sexe`, ROUND(AVG(`salaire`), 2) `salaireMoyen`
FROM `employe`
GROUP BY `service`
HAVING `sexe` = 'F';


