-- 1
SELECT
    *
FROM
    message
WHERE
    m_auteur_fk = 10
ORDER BY
    message.m_date DESC
LIMIT
    10;

-- 2
SELECT
    *
FROM
    user
ORDER BY
    user.u_date_naissance ASC;

-- 3
SELECT
    *
FROM
    user
ORDER BY
    u_date_inscription DESC
LIMIT
    5;

-- 4
SELECT
    m_contenu AS Contenu_Message,
    u_login AS user_login,
    r_libelle AS rank
FROM
    message
    LEFT JOIN user ON m_auteur_fk = u_id
    RIGHT JOIN rang ON m_auteur_fk = r_id
ORDER BY
    m_date DESC
LIMIT
    20;