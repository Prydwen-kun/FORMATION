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