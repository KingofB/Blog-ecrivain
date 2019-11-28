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


-- Insertion de membres dans la table Membre :

INSERT INTO Member (pseudo, email, passw)
VALUES ('Jean', 'jf@gmail.com', 'Jean'),
        ('Aude', 'a@gmail.com', 'Aude'),
        ('Vanessa', 'v@gmail.com', 'Vanessa'),
        ('David', 'blanchet.bzh@gmail.com', 'Op04Er08Ki16');


-- Insertion dans la table Article :

INSERT INTO Article (title, image, summary, content, author_id, publication_date)
VALUES ('Chapitre 1', 'man-in-airport.jpg', 'Un billet simple c\'est à la fois un début et une fin.',
'Martinus agens illas provincias pro praefectis aerumnas innocentium graviter gemens saepeque obsecrans, ut ab omni culpa inmunibus parceretur, cum non inpetraret, minabatur se
discessurum: ut saltem id metuens perquisitor malivolus tandem desineret quieti coalitos homines in aperta pericula proiectare.
Et licet quocumque oculos flexeris feminas adfatim multas spectare cirratas, quibus, si nupsissent, per aetatem ter iam nixus poterat suppetere liberorum, ad usque taedium pedibus
pavimenta tergentes iactari volucriter gyris, dum exprimunt innumera simulacra, quae finxere fabulae theatrales.
Fieri, inquam, Triari, nullo pacto potest, ut non dicas, quid non probes eius, a quo dissentias. quid enim me prohiberet Epicureum esse, si probarem, quae ille diceret? cum praesertim illa perdiscere ludus esset. Quam ob rem dissentientium inter se reprehensiones non sunt vituperandae, maledicta, contumeliae, tum iracundiae, contentiones concertationesque in disputando pertinaces indignae philosophia mihi videri solent.', 1, '2019-10-11 09:00:00'),
        ('Chapitre 2', 'welcome.jpg', 'Arrivée à Fairbanks le 13 spetembre, 4°c.',
'Martinus agens illas provincias pro praefectis aerumnas innocentium graviter gemens saepeque obsecrans, ut ab omni culpa inmunibus parceretur, cum non inpetraret, minabatur se
discessurum: ut saltem id metuens perquisitor malivolus tandem desineret quieti coalitos homines in aperta pericula proiectare.
Et licet quocumque oculos flexeris feminas adfatim multas spectare cirratas, quibus, si nupsissent, per aetatem ter iam nixus poterat suppetere liberorum, ad usque taedium pedibus
pavimenta tergentes iactari volucriter gyris, dum exprimunt innumera simulacra, quae finxere fabulae theatrales.
Fieri, inquam, Triari, nullo pacto potest, ut non dicas, quid non probes eius, a quo dissentias. quid enim me prohiberet Epicureum esse, si probarem, quae ille diceret? cum praesertim illa perdiscere ludus esset. Quam ob rem dissentientium inter se reprehensiones non sunt vituperandae, maledicta, contumeliae, tum iracundiae, contentiones concertationesque in disputando pertinaces indignae philosophia mihi videri solent.', 1, '2019-10-18 10:00:00'),
        ('Chapitre 3', 'wooden-cabin.jpg', 'Découverte de ma cabane en rondins de bois, proche de la rivière Hudson, spartiate mais chaleureuse.',
'Martinus agens illas provincias pro praefectis aerumnas innocentium graviter gemens saepeque obsecrans, ut ab omni culpa inmunibus parceretur, cum non inpetraret, minabatur se
discessurum: ut saltem id metuens perquisitor malivolus tandem desineret quieti coalitos homines in aperta pericula proiectare.
Et licet quocumque oculos flexeris feminas adfatim multas spectare cirratas, quibus, si nupsissent, per aetatem ter iam nixus poterat suppetere liberorum, ad usque taedium pedibus
pavimenta tergentes iactari volucriter gyris, dum exprimunt innumera simulacra, quae finxere fabulae theatrales.
Fieri, inquam, Triari, nullo pacto potest, ut non dicas, quid non probes eius, a quo dissentias. quid enim me prohiberet Epicureum esse, si probarem, quae ille diceret? cum praesertim illa perdiscere ludus esset. Quam ob rem dissentientium inter se reprehensiones non sunt vituperandae, maledicta, contumeliae, tum iracundiae, contentiones concertationesque in disputando pertinaces indignae philosophia mihi videri solent.', 1, '2019-10-25 10:30:00'),
        ('Chapitre 4', 'wood-mountains.jpg', 'Première sortie dans la forêt près de la cabane. Un conseil : ne jamais sortir sans arme !',
'Martinus agens illas provincias pro praefectis aerumnas innocentium graviter gemens saepeque obsecrans, ut ab omni culpa inmunibus parceretur, cum non inpetraret, minabatur se
discessurum: ut saltem id metuens perquisitor malivolus tandem desineret quieti coalitos homines in aperta pericula proiectare.
Et licet quocumque oculos flexeris feminas adfatim multas spectare cirratas, quibus, si nupsissent, per aetatem ter iam nixus poterat suppetere liberorum, ad usque taedium pedibus
pavimenta tergentes iactari volucriter gyris, dum exprimunt innumera simulacra, quae finxere fabulae theatrales.
Fieri, inquam, Triari, nullo pacto potest, ut non dicas, quid non probes eius, a quo dissentias. quid enim me prohiberet Epicureum esse, si probarem, quae ille diceret? cum praesertim illa perdiscere ludus esset. Quam ob rem dissentientium inter se reprehensiones non sunt vituperandae, maledicta, contumeliae, tum iracundiae, contentiones concertationesque in disputando pertinaces indignae philosophia mihi videri solent.', 1, '2019-10-30 10:50:00'),
        ('Chapitre 5', 'eagle-on-seashore.jpg', 'Kinlunkut m\'emmène sur son bateau pour une partie de pêche. Il n\'était pas prévu que des orques participent à la fête !',
'Martinus agens illas provincias pro praefectis aerumnas innocentium graviter gemens saepeque obsecrans, ut ab omni culpa inmunibus parceretur, cum non inpetraret, minabatur se
discessurum: ut saltem id metuens perquisitor malivolus tandem desineret quieti coalitos homines in aperta pericula proiectare.
Et licet quocumque oculos flexeris feminas adfatim multas spectare cirratas, quibus, si nupsissent, per aetatem ter iam nixus poterat suppetere liberorum, ad usque taedium pedibus
pavimenta tergentes iactari volucriter gyris, dum exprimunt innumera simulacra, quae finxere fabulae theatrales.
Fieri, inquam, Triari, nullo pacto potest, ut non dicas, quid non probes eius, a quo dissentias. quid enim me prohiberet Epicureum esse, si probarem, quae ille diceret? cum praesertim illa perdiscere ludus esset. Quam ob rem dissentientium inter se reprehensiones non sunt vituperandae, maledicta, contumeliae, tum iracundiae, contentiones concertationesque in disputando pertinaces indignae philosophia mihi videri solent.', 1, '2019-11-09 09:10:00'),
        ('Chapitre 6', 'adventure-alaska.jpg', 'Kinlunkut m\'apprend à maîtriser l\'art du traîneau à chiens. Je commence à sérieusement stresser avec l\'arrivée de l\'automne.',
'Martinus agens illas provincias pro praefectis aerumnas innocentium graviter gemens saepeque obsecrans, ut ab omni culpa inmunibus parceretur, cum non inpetraret, minabatur se
discessurum: ut saltem id metuens perquisitor malivolus tandem desineret quieti coalitos homines in aperta pericula proiectare.
Et licet quocumque oculos flexeris feminas adfatim multas spectare cirratas, quibus, si nupsissent, per aetatem ter iam nixus poterat suppetere liberorum, ad usque taedium pedibus
pavimenta tergentes iactari volucriter gyris, dum exprimunt innumera simulacra, quae finxere fabulae theatrales.
Fieri, inquam, Triari, nullo pacto potest, ut non dicas, quid non probes eius, a quo dissentias. quid enim me prohiberet Epicureum esse, si probarem, quae ille diceret? cum praesertim illa perdiscere ludus esset. Quam ob rem dissentientium inter se reprehensiones non sunt vituperandae, maledicta, contumeliae, tum iracundiae, contentiones concertationesque in disputando pertinaces indignae philosophia mihi videri solent.', 1, '2019-11-18 09:40:00');



