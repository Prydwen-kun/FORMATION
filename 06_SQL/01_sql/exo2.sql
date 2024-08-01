SELECT
    `service`,
    COUNT(COALESCE(service, 'debug')) AS `nb`
FROM
    `employe`
GROUP BY
    `service`
ORDER BY
    `nb` DESC,
    `service` ASC;

-- without NULL services
SELECT
    `service`,
    COUNT(COALESCE(service, 'debug')) AS `nb`
FROM
    `employe`
WHERE
    `service` IS NOT NULL
GROUP BY
    `service`
ORDER BY
    `nb` DESC,
    `service` ASC;

-- _____________________
SELECT
    `service`,
    COUNT(COALESCE(service, 'debug')) AS `nb`
FROM
    `employe`
WHERE
    `service` IS NOT NULL
    AND `salaire` < 2000
GROUP BY
    `service`
ORDER BY
    `nb` DESC,
    `service` ASC;

-- _____________________
SELECT
    `service`,
    COUNT(COALESCE(service, 'debug')) AS `nb`
FROM
    `employe`
WHERE
    `service` IS NOT NULL
GROUP BY
    `service`
HAVING
    `nb` >= 2
ORDER BY
    `nb` DESC,
    `service` ASC;