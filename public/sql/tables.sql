--TABLES DE LA BDD :

-- Création de la bdd :

CREATE DATABASE proj4 CHARACTER SET 'utf8';


-- Création de la table des articles :

CREATE TABLE Article (
    id TINYINT UNSIGNED AUTO_INCREMENT,
    title CHAR(11) NOT NULL,
    image VARCHAR(50),
    summary VARCHAR(150),
    content TEXT NOT NULL,
    author_id INT UNSIGNED NOT NULL,
    publication_date DATETIME NOT NULL,
    PRIMARY KEY (id),
    INDEX ind_date (publication_date)
)
ENGINE=INNODB;


-- Création de la table des commentaires :

CREATE TABLE Comment (
    id INT UNSIGNED AUTO_INCREMENT,
    article_id TINYINT UNSIGNED NOT NULL,
	author_id INT UNSIGNED,
	content TEXT NOT NULL,
	comment_date DATETIME NOT NULL,
	PRIMARY KEY(id)
)
ENGINE=INNODB;


-- Création de la table des membres/utilisateurs :

CREATE TABLE Member (
    id INT UNSIGNED AUTO_INCREMENT,
    pseudo VARCHAR(50),
    email VARCHAR(100),
    passw CHAR(40),
    PRIMARY KEY (id)
)
ENGINE=INNODB;


-- Ajout des clés étrangères aux tables :

ALTER TABLE Article
ADD CONSTRAINT fk_author_art FOREIGN KEY (author_id) REFERENCES Member(id);

ALTER TABLE Comment
ADD CONSTRAINT fk_author_com FOREIGN KEY (author_id) REFERENCES Member(id),
ADD CONSTRAINT fk_article_com FOREIGN KEY (article_id) REFERENCES Article(id);



-- Ajout d'index aux tables :

CREATE UNIQUE INDEX ind_unique_email ON Member(email);

CREATE UNIQUE INDEX ind_unique_pseudo ON Member(pseudo);

CREATE INDEX ind_com_date ON Comment(comment_date);



