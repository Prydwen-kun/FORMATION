SELECT
    prenom,
    salaire
FROM
    employe
WHERE
    salaire > (
        SELECT
            AVG(salaire)
        FROM
            employe
    )
ORDER BY
    prenom ASC
    -- 2.
SELECT
    prenom,
    salaire
FROM
    employe
WHERE
    salaire > 1.4 * (
        SELECT
            AVG(salaire)
        FROM
            employe
    )
ORDER BY
    prenom ASC
    -- 3.
SELECT
    CONCAT (employe.nom, ' ', employe.prenom) AS nomComplet,
    service.nom serv
FROM
    employe
    LEFT JOIN service USING (idService)
ORDER BY
    nomComplet ASC;

-- 4.
SELECT
    CONCAT (employe.nom, ' ', employe.prenom) AS nomComplet,
    service.nom serv
FROM
    employe
    LEFT JOIN service USING (idService)
WHERE
    employe.idService IS NULL
ORDER BY
    nomComplet ASC;

-- 5.
SELECT
    CONCAT (employe.nom, ' ', employe.prenom) AS nomComplet,
    service.nom serv
FROM
    employe
    LEFT JOIN service USING (idService)
WHERE
    (
        SELECT
            COUNT(employe.idService)
        FROM
            employe
    ) = 0
ORDER BY
    nomComplet ASC;