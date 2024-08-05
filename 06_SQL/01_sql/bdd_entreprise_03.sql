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
    service.idService NOT IN (
        SELECT
            employe.idService
        FROM
            employe
    )
ORDER BY
    nomComplet ASC;

-- 6
SELECT
    CONCAT (employe.nom, ' ', employe.prenom) AS nomComplet,
    service.nom serv
FROM
    employe
    LEFT JOIN service USING (idService)
WHERE
    employe.idService IS NULL
UNION
SELECT
    CONCAT (employe.nom, ' ', employe.prenom) AS nomComplet,
    service.nom serv
FROM
    employe
    LEFT JOIN service USING (idService)
WHERE
    service.idService NOT IN (
        SELECT
            employe.idService
        FROM
            employe
    )
ORDER BY
    nomComplet ASC;

-- 7
SELECT
    `employe`.`prenom` emp,
    `responsable`.`prenom` resp
FROM
    employe
    LEFT JOIN service ON employe.idService = service.idService
    LEFT JOIN responsable ON service.idResponsable = responsable.idResponsable
ORDER BY
    emp ASC;

-- 8
SELECT DISTINCT
    ROUND(
        (
            SELECT
                AVG(salaire)
            FROM
                employe
            WHERE
                sexe = 'M'
        ) - (
            SELECT
                AVG(salaire)
            FROM
                employe
            WHERE
                sexe = 'F'
        ),
        1
    ) diff
FROM
    employe;

-- 9
SELECT
    service.nom AS nomService,
    COUNT(
        CASE
            WHEN employe.salaire < avg_salaire.average_salaire THEN 1
        END
    ) AS nb
FROM
    employe
    LEFT JOIN service ON employe.idService = service.idService
    CROSS JOIN (
        SELECT
            AVG(salaire) AS average_salaire
        FROM
            employe
    ) AS avg_salaire
GROUP BY
    nomService
ORDER BY
    nomService ASC;

-- 10
SELECT
    service.nom,
    COUNT(*) AS nb
FROM
    service
    LEFT JOIN employe USING (idService)
GROUP BY
    service.nom
ORDER BY
    service.nom ASC;