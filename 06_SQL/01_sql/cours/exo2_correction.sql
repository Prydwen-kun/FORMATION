

-- 1. Sélectionnez le salaire moyen du service IT. Alias salaireMoyenIT
SELECT AVG(`salaire`) `salaireMoyenIT` FROM `employe` WHERE `service` = 'IT';

-- 2. Sélectionnez le salaire moyen (arrondi à un entier) par service. Alias salaireMoyen. Triez par salaire moyen descendant.
SELECT `service`, ROUND(AVG(`salaire`)) `salaireMoyen` 
FROM `employe` 
GROUP BY `service` 
ORDER BY `salaireMoyen` 
DESC;

-- 3. Idem -2- mais sans le service NULL.
SELECT `service`, ROUND(AVG(`salaire`)) `salaireMoyen` 
FROM `employe`
WHERE `service` IS NOT NULL 
GROUP BY `service` 
ORDER BY `salaireMoyen` 
DESC;

-- 4. Sélectionnez le nombre d'employés par service. Alias nb. Tri par nombre descendant puis service ascendant.
SELECT `service`, COUNT(*) `nb`
FROM `employe`
GROUP BY `service`
ORDER BY `nb`DESC, `service`;

-- 5. Idem -4- mais sans le service NULL.
SELECT `service`, COUNT(*) `nb`
FROM `employe`
WHERE `service` IS NOT NULL
GROUP BY `service`
ORDER BY `nb`DESC, `service`;

-- 6. Idem -5- mais uniquement pour les employés gagnant moins de 15000 par an.
SELECT `service`, COUNT(*) `nb`
FROM `employe`
WHERE `service` IS NOT NULL AND `salaire`*12 < 15000
GROUP BY `service`
ORDER BY `nb`DESC, `service`;

-- 7. Idem -5- mais uniquement si le nombre est au moins 2.
SELECT `service`, COUNT(*) `nb`
FROM `employe`
WHERE `service` IS NOT NULL
GROUP BY `service`
HAVING `nb` >= 2
ORDER BY `nb`DESC, `service`;

SELECT `service`, COUNT(*) `nb`
FROM `employe`
GROUP BY `service`
HAVING `nb` >= 2 AND `service` IS NOT NULL
ORDER BY `nb`DESC, `service`;

-- 8. sélectionnez les employés dont le nom commence par 'Ro'.
SELECT `nom`, `prenom`
FROM `employe`
WHERE `nom` LIKE `Ro%`;