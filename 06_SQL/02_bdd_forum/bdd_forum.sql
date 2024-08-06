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

-- 5
SELECT
    m_contenu AS Contenu_Message,
    u_login AS user_login,
    r_libelle AS rank
FROM
    message
    LEFT JOIN user ON m_auteur_fk = u_id
    LEFT JOIN rang ON u_rang_fk = r_id
WHERE
    r_libelle = 'admin'
    AND TIMESTAMPDIFF (YEAR, u_date_naissance, CURRENT_DATE()) >= 18
ORDER BY
    m_date DESC
LIMIT
    5;

-- 6
SELECT
    m_contenu AS Contenu_Message,
    u_login AS user_login,
    m_conversation_fk AS numero_convo
FROM
    message
    LEFT JOIN user ON m_auteur_fk = u_id
WHERE
    TIMESTAMPDIFF (YEAR, u_date_naissance, CURRENT_DATE()) >= 18
    AND TIMESTAMPDIFF (YEAR, u_date_naissance, CURRENT_DATE()) <= 30
ORDER BY
    m_date DESC
LIMIT
    10;

-- 7
SELECT
    c_id AS convo_id,
    m_contenu AS msg,
    m_date AS date_msg,
    u_prenom AS prenom,
    u_nom AS nom
FROM
    conversation
    LEFT JOIN message ON c_id = m_conversation_fk
    LEFT JOIN user ON m_auteur_fk = u_id
WHERE
    c_id = 10
ORDER BY
    m_date DESC;

-- 8
SELECT
    c_id AS convo_id,
    c_date AS convo_date,
    u_id AS user
FROM
    conversation
    LEFT JOIN message ON c_id = m_conversation_fk
    LEFT JOIN user ON m_auteur_fk = u_id
WHERE
    u_id = 10
    AND c_date BETWEEN '2007-01-01 00:00:00' AND '2020-01-01 00:00:00'
ORDER BY
    convo_date DESC;

-- 9
SELECT DISTINCT
    c_id AS convo_id,
    u_id AS user_id,
    u_login
FROM
    conversation
    JOIN message ON m_conversation_fk = c_id
    JOIN user ON m_auteur_fk = u_id
WHERE
    c_id IN (
        SELECT
            c_id
        FROM
            conversation
            JOIN message ON c_id = m_conversation_fk
            JOIN user ON m_auteur_fk = u_id
        WHERE
            u_id = 8
    )
GROUP BY
    u_id
ORDER BY
    u_id;

-- 10
SELECT
    c_id AS convo_id,
    u_id AS user_id,
    u_login AS user_login,
    COUNT(
        SELECT
            *
        FROM
            conversation
            JOIN message ON m_conversation_fk = c_id
            JOIN user ON m_auteur_fk = u_id
        GROUP BY
            u_id
    ) AS Total_message
FROM
    conversation
    JOIN message ON m_conversation_fk = c_id
    JOIN user ON m_auteur_fk = u_id
GROUP BY
    user_id
ORDER BY
    convo_id,
    user_id ASC;

-- 11
SELECT
    m_contenu,
    m_date
FROM
    message
    LEFT JOIN conversation ON m_conversation_fk = c_id
WHERE
    m_date < c_date
ORDER BY
    m_date ASC;

-- 12
SELECT
    u_id AS user_id,
    u_login AS user_login
FROM
    user
    JOIN message ON m_auteur_fk = u_id
    JOIN conversation ON m_conversation_fk = c_id
WHERE
    c_termine != 0
GROUP BY
    u_id
ORDER BY
    u_id ASC;

-- 13
SELECT
    r_libelle AS Rank,
    u_login AS user_login,
    m_contenu AS message_contenu,
    u_date_inscription AS inscription
FROM
    conversation
    JOIN message ON m_conversation_fk = c_id
    JOIN user ON m_auteur_fk = u_id
    JOIN rang ON u_rang_fk = r_id
WHERE
    r_libelle = 'admin'
    AND u_date_inscription LIKE '2010%'
    AND c_termine = 0
ORDER BY
    u_date_inscription ASC;

-- 14
SELECT
    m_id,
    m_contenu AS Contenu_Message,
    m_date AS message_date,
    r_libelle,
    u_id,
    u_login,
    u_prenom,
    u_nom
FROM
    message
    JOIN user ON u_id = m_auteur_fk
    JOIN rang ON u_rang_fk = r_id
WHERE
    r_libelle = 'none'
    AND TIMESTAMPDIFF (YEAR, u_date_naissance, CURRENT_DATE()) < 18
    AND m_contenu LIKE '%o%o%o%'
ORDER BY
    RAND ()
LIMIT
    5;

-- 15
SELECT
    m_id,
    m_contenu AS message_contenu,
    m_date,
    m_auteur_fk,
    m_conversation_fk
FROM
    conversation
    JOIN message ON m_conversation_fk = c_id
    JOIN user ON m_auteur_fk = u_id
WHERE
    m_date > (
        SELECT
            MAX(m_date)
        FROM
            message
        WHERE
            m_auteur_fk = 88
    );

-- 
-- dernier message de 88