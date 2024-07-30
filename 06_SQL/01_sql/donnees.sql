--SELECT (Read dans le CRUD)
SELECT
    *
FROM
    `employe`;

-- 
SELECT
    `nom`
FROM
    `employe`;

-- 
SELECT
    `nom`,
    `prenom`,
    `salaire`
FROM
    `employe`;

-- 
SELECT
    `service`
FROM
    `employe`;

-- 
SELECT DISTINCT
    `service`
FROM
    `employe`;

-- 
SELECT DISTINCT
    `service`,
    `sexe`
FROM
    `employe`;

-- LIMIT
SELECT
    `prenom`
FROM
    `employe`
LIMIT
    2;

SELECT
    `prenom`
FROM
    `employe`
LIMIT
    2, 3;

-- WHERE
SELECT
    `prenom`
FROM
    `employe`
WHERE
    `sexe` = 'F';

SELECT
    `prenom`
FROM
    `employe`
WHERE
    `sexe` != 'F';

SELECT
    `prenom`,
    `salaire`
FROM
    `employe`
WHERE
    `salaire` >= 2000;

SELECT
    `prenom`,
    `dateContrat`
FROM
    `employe`
WHERE
    `dateContrat` < '2016-01-01';

-- IS NULL
SELECT
    `prenom`
FROM
    `employe`
WHERE
    `service` IS NULL;

SELECT
    `prenom`
FROM
    `employe`
WHERE
    `service` IS NOT NULL;

SELECT
    `prenom`
FROM
    `employe`
WHERE
    ISNULL (`service`);

SELECT
    `prenom`
FROM
    `employe`
WHERE
    NOT ISNULL (`service`);

-- BETWEEN
SELECT
    `prenom`,
    `salaire`
FROM
    `employe`
WHERE
    `salaire` BETWEEN 1800 AND 3000;

SELECT
    `prenom`
FROM
    `employe`
WHERE
    `prenom` BETWEEN 'A' AND 'G';

SELECT
    `prenom`,
    `dateContrat`
FROM
    `employe`
WHERE
    `dateContrat` BETWEEN '2016-01-01' AND '2022-01-01';

-- IN ()
SELECT
    prenom
FROM
    employe
WHERE
    salaire IN (1800, 1700, 3000);

SELECT
    prenom
FROM
    employe
WHERE
    nom IN ('Roche', 'Péron');

SELECT
    prenom
FROM
    employe
WHERE
    dateContrat IN ('2016-01-01', '2022-01-01');

-- LIKE
SELECT
    nom,
    prenom
FROM
    employe
WHERE
    nom LIKE 'T%';

SELECT
    nom,
    prenom,
    salaire
FROM
    employe
WHERE
    salaire LIKE '_0%';

-- AND
SELECT
    nom,
    prenom,
    salaire
FROM
    employe
WHERE
    sexe = 'F'
    AND salaire > 2000;

-- OR
SELECT
    nom,
    prenom,
    salaire
FROM
    employe
WHERE
    sexe = 'F'
    OR salaire > 2000;

-- + - * / %
SELECT
    nom,
    prenom,
    salaire
FROM
    employe
WHERE
    salaire * 12 < 25000;

-- CONCAT()
SELECT
    CONCAT (`nom`, '', `prenom`)
FROM
    `employe`;

-- AS (ALIAS)
SELECT
    CONCAT (`nom`, ' ', `prenom`) AS `nomComplet`
FROM
    `employe`;

SELECT
    CONCAT (`nom`, ' ', `prenom`) `nomComplet`
FROM
    `employe`;

-- ALIAS ne fonctionne pas avec le WHERE
SELECT
    CONCAT (nom, ' ', prenom) AS nomComplet
FROM
    employe
WHERE
    nomComplet LIKE 'R%';

-- ALIAS fonctionne avec le HAVING
SELECT
    CONCAT (nom, ' ', prenom) AS nomComplet
FROM
    employe
HAVING
    nomComplet LIKE 'R%';

-- ORDER BY
SELECT
    `nom`,
    `prenom`
FROM
    `employe`
ORDER BY
    `nom`;

-- ORDER BY ASC
SELECT
    `nom`,
    `prenom`
FROM
    `employe`
ORDER BY
    `nom` ASC;

-- ORDER BY DESC
SELECT
    `nom`,
    `prenom`,
    `salaire`
FROM
    `employe`
ORDER BY
    `salaire` DESC;

-- 
SELECT
    `nom`,
    `prenom`
FROM
    `employe`
ORDER BY
    `nom`,
    `prenom`;
    