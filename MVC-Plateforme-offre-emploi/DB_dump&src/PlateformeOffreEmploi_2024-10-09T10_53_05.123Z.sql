CREATE TABLE `users` (
	`id` INT NOT NULL AUTO_INCREMENT UNIQUE,
	`username` VARCHAR(255),
	`password` VARCHAR(255),
	`email` VARCHAR(255),
	`last_login` TIMESTAMP,
	`role_id_fk` INT COMMENT '1=admin 2=entreprise 3=etudiant',
	`spe_id_fk` INT,
	PRIMARY KEY(`id`)
);


CREATE TABLE `offres` (
	`id` INT NOT NULL AUTO_INCREMENT UNIQUE,
	`auteur_id` INT,
	`title` VARCHAR(255),
	`content` VARCHAR(255),
	`salaire` INT,
	`cover` VARCHAR(255),
	`localisation` VARCHAR(255),
	PRIMARY KEY(`id`)
) COMMENT='cover = link to cover';


CREATE TABLE `skills` (
	`id` INT NOT NULL AUTO_INCREMENT UNIQUE,
	`label` VARCHAR(255),
	`spe_id_fk` INT,
	PRIMARY KEY(`id`)
);


CREATE TABLE `specialite` (
	`id` INT NOT NULL AUTO_INCREMENT UNIQUE,
	`label` VARCHAR(255),
	`user_id_fk` INT,
	PRIMARY KEY(`id`)
);


CREATE TABLE `candidature` (
	`id` INT NOT NULL AUTO_INCREMENT UNIQUE,
	`user_id_fk` INT,
	`offre_id_fk` INT,
	`cv_path` VARCHAR(255),
	`m_motivation` TEXT(65535),
	`statut` SMALLINT,
	PRIMARY KEY(`id`)
) COMMENT='statut 1=en cours 2=acceptee 3=refusée';


CREATE TABLE `role` (
	`id` INT NOT NULL AUTO_INCREMENT UNIQUE,
	`label` VARCHAR(255),
	PRIMARY KEY(`id`)
);


CREATE TABLE `required_skills` (
	`id` INT NOT NULL AUTO_INCREMENT UNIQUE,
	`skill_id_fk` INT,
	`offre_id_fk` INT,
	PRIMARY KEY(`id`)
);


ALTER TABLE `offres`
ADD FOREIGN KEY(`auteur_id`) REFERENCES `users`(`id`)
ON UPDATE NO ACTION ON DELETE NO ACTION;
ALTER TABLE `candidature`
ADD FOREIGN KEY(`user_id_fk`) REFERENCES `users`(`id`)
ON UPDATE NO ACTION ON DELETE NO ACTION;
ALTER TABLE `candidature`
ADD FOREIGN KEY(`offre_id_fk`) REFERENCES `offres`(`id`)
ON UPDATE NO ACTION ON DELETE NO ACTION;
ALTER TABLE `skills`
ADD FOREIGN KEY(`spe_id_fk`) REFERENCES `specialite`(`id`)
ON UPDATE NO ACTION ON DELETE NO ACTION;
ALTER TABLE `users`
ADD FOREIGN KEY(`role_id_fk`) REFERENCES `role`(`id`)
ON UPDATE NO ACTION ON DELETE NO ACTION;
ALTER TABLE `required_skills`
ADD FOREIGN KEY(`skill_id_fk`) REFERENCES `skills`(`id`)
ON UPDATE NO ACTION ON DELETE NO ACTION;
ALTER TABLE `required_skills`
ADD FOREIGN KEY(`offre_id_fk`) REFERENCES `offres`(`id`)
ON UPDATE NO ACTION ON DELETE NO ACTION;
ALTER TABLE `users`
ADD FOREIGN KEY(`spe_id_fk`) REFERENCES `specialite`(`id`)
ON UPDATE NO ACTION ON DELETE NO ACTION;