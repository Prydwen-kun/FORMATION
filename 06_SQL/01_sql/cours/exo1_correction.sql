

-- 1. Sélectionnez le nom et le prénom du ou des employé masculin qui gagne plus de 1800€.
SELECT `nom`, `prenom` FROM `employe` WHERE `sexe` = 'M' AND `salaire` > 1800;

-- 2. Sélectionnez le nom et le prénom des 3 employés qui gagnent plus et trier par salaire descendant.
SELECT `nom`, `prenom` FROM `employe` ORDER BY `salaire` DESC LIMIT 3;

-- 3. Sélectionnez le plus petit salaire aliasé en 'salaireMin'.
SELECT `salaire` `salaireMin` FROM `employe` ORDER BY `salaire` LIMIT 1;

-- 4. Sélectionnez les noms des employés et triez par nom ascendant.
SELECT `nom` FROM `employe` ORDER BY `nom`;

-- 5. Sélectionnez le salaire de l'employé qui n'a pas de service.
SELECT `salaire` FROM `employe` WHERE ISNULL(`service`);
SELECT `salaire` FROM `employe` WHERE `service` IS NULL;

-- 6. Sélectionnez les noms et les prénoms des employés triés par ancienneté, du plus ancien au plus récemment embauché.
SELECT `nom`, `prenom` FROM `employe` ORDER BY `dateContrat`;
SELECT CONCAT(`nom`, ' ',`prenom`) `nomComplet`, `dateContrat` FROM `employe` ORDER BY `dateContrat`;

-- 7. Sélectionnez les noms et prénoms des employés du service IT, triés par nom puis prénom.
SELECT `nom`, `prenom` FROM `employe` WHERE `service` = 'IT' ORDER BY `nom`, `prenom`;

-- 8. Sélectionnez le prénom du second employé qui gagne le plus.
SELECT `prenom` FROM `employe` ORDER BY `salaire` DESC LIMIT 1, 1; -- Syntaxe native de MySQL 
SELECT `prenom` FROM `employe` ORDER BY `salaire` DESC LIMIT 1 OFFSET 1; -- Syntaxe pour les autres mais fonctionne pour MySQL aussi

-- 9. Sélectionnez le service de l'employé qui gagne 1800€.
SELECT `service` FROM `employe` WHERE `salaire` = 1800;  

-- 10. Sélectionnez le service dans lequel travaille l'employé qui gagne le plus.
SELECT `service` FROM `employe` ORDER BY `salaire` DESC LIMIT 1;



