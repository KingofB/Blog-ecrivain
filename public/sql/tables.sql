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
    passw CHAR(255),
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
        ('Chapitre 2', 'welcome.jpg', 'Arrivée à Fairbanks le 13 septembre, 4°c.',
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
Fieri, inquam, Triari, nullo pacto potest, ut non dicas, quid non probes eius, a quo dissentias. quid enim me prohiberet Epicureum esse, si probarem, quae ille diceret? cum praesertim illa perdiscere ludus esset. Quam ob rem dissentientium inter se reprehensiones non sunt vituperandae, maledicta, contumeliae, tum iracundiae, contentiones concertationesque in disputando pertinaces indignae philosophia mihi videri solent.', 1, '2019-11-18 09:40:00'),
        ('Chapitre 7', 'man-near-lake.jpg', 'Tour du lac, près de ma cabane, l\'ange gardien de ma survie.',
'Martinus agens illas provincias pro praefectis aerumnas innocentium graviter gemens saepeque obsecrans, ut ab omni culpa inmunibus parceretur, cum non inpetraret, minabatur se
discessurum: ut saltem id metuens perquisitor malivolus tandem desineret quieti coalitos homines in aperta pericula proiectare.
Et licet quocumque oculos flexeris feminas adfatim multas spectare cirratas, quibus, si nupsissent, per aetatem ter iam nixus poterat suppetere liberorum, ad usque taedium pedibus
pavimenta tergentes iactari volucriter gyris, dum exprimunt innumera simulacra, quae finxere fabulae theatrales.
Fieri, inquam, Triari, nullo pacto potest, ut non dicas, quid non probes eius, a quo dissentias. quid enim me prohiberet Epicureum esse, si probarem, quae ille diceret? cum praesertim illa perdiscere ludus esset. Quam ob rem dissentientium inter se reprehensiones non sunt vituperandae, maledicta, contumeliae, tum iracundiae, contentiones concertationesque in disputando pertinaces indignae philosophia mihi videri solent.', 1, '2019-11-25 09:00:00');



-- Insertion dans la table Comment :

INSERT INTO Comment (article_id, author_id, comment_date, content)
VALUES (1, 2, '2019-10-11 10:00:00', 'Les écrivains me fascineront toujours pour exprimer avec autant d\'exactitude les sentiments que l\'on peut tous ressentir dans cette situation !'),
        (1, 4, '2019-10-12 16:00:00', 'Super premier chapitre qui décrit bien l\'excitation et le stress d\'un départ pour une aventure de ce type !'),
        (1, 3, '2019-10-13 22:00:00', 'Très bonne introduction à l\'histoire ! On sent que cette aventure va être inoubliable, j\'ai hâte de lire la suite !'),
        (1, 4, '2019-10-13 22:10:00', 'Exact ! Moi aussi j\'ai hâte !'),
        (1, 1, '2019-10-13 03:45:00', 'Merci pour vos retours chers lecteurs-lectrices ! Je travaille à la suite. Elle sera disponible d\'ici une semaine maximum.'),
        (1, 2, '2019-10-14 08:15:00', 'Trop bien ! Jean Forteroche nous répond en personne ! Super ce blog !'),
        (1, 3, '2019-10-14 10:20:00', 'Ah oui, trop cool ! Allez Jean au boulot, j\'attends la suite avec impatience !'),
        (2, 3, '2019-10-18 11:30:00', 'Ah enfin la suite ! Il a l\'air trop gentil ce Kinlunkut !'),
        (2, 4, '2019-10-18 21:30:00', 'Quel accueil en effet ! Très étonné aussi par le fait qu\'en été la température puisse grimper jusqu\'à 30° dans cette région !'),
        (2, 2, '2019-10-19 12:20:00', 'Oui, super accueil ! Ce Kinlunkut va être un personnage important de ce roman, je le sens !'),
        (2, 1, '2019-10-20 14:30:00', 'Cool ! Je voulais que mes lecteurs apprécient Kinlunkut à sa juste valeur dès le premier chapitre où j\'en parle ! Mission réussie apparemment !'),
        (2, 3, '2019-10-21 11:30:00', 'Ah enfin la suite ! Il a l\'air trop gentil ce Kinlunkut !'),
        (2, 3, '2019-10-21 12:10:00', '0h oui, c\'est réussi ! Je l\'ai déjà adopté ce Kinlunkut !'),
        (2, 2, '2019-10-22 12:45:00', 'Moi aussi ! J\'aurais été trop déçue de ne pas le revoir dans le roman.'),
        (2, 4, '2019-10-22 18:00:00', 'S\'ils sont tous aussi gentils les indiens du coin, ça donne envie de les rencontrer !'),
        (2, 1, '2019-10-22 14:30:00', 'La suite dans 3 ou 4 jours !'),
        (3, 4, '2019-10-25 22:25:00', 'Wow cette cabane ! Elle a l\'air tellement isolée ! Urbain comme je suis, ce n\'est vraiment pas pour moi !'),
        (3, 1, '2019-10-26 19:50:00', 'Croyez-moi, moi aussi je suis un citadin, et pourtant j\'écris ce livre après cette expérience.'),
        (3, 4, '2019-10-26 20:15:00', 'Bah chapeau, car moi je ne m\'y serais pas aventuré !'),
        (3, 3, '2019-10-26 22:40:00', 'Chauffage au bois qu\'il faut aller ramasser tous les jours ! La galère...'),
        (3, 1, '2019-10-27 21:25:00', 'Pas le choix, sinon on gèle dans la cabane ! Toutes les priorités sont différentes là-bas.'),
        (3, 2, '2019-10-28 08:05:00', 'Oui, ça doit apprendre à relativiser ! Dire que je râle quand je dois aller chercher du bois pour mon poêle...'),
        (3, 1, '2019-10-29 02:15:00', 'C\'est vrai que je m\'énerve moins pour des broutilles aujourd\'hui ! Sortie du chapitre 4 demain.'),
        (4, 1, '2019-10-30 04:00:00', 'Ouf, chapitre 4 fini ! Il relate ma première grosse frayeur en Alaska ! J\'espère que ça vous plaira.'),
        (4, 2, '2019-10-30 08:30:00', 'Ouh la la ! Quelle flippe ! Voilà pourquoi moi j\'aurais trop peur de tenter ce genre d\'aventure !'),
        (4, 4, '2019-10-30 22:30:00', 'Oh mon dieu ! Je crois que j\'aurais fait la même connerie en plus, de sortir sans armes !'),
        (4, 1, '2019-10-30 23:00:00', 'Ah non, surtout pas ! On ne sait jamais ce que l\'on peut croiser là-bas ! C\'est une question de vie ou de mort.'),
        (4, 3, '2019-10-31 18:30:00', 'Ceci explique peut-être l\'attachement pour les armes à feu des Américains. Tout ça pour du bois !'),
        (4, 1, '2019-10-31 18:45:00', 'Malgré mon séjour là-bas, je reste opposé à ça, mais je comprends maintenant que ça peut être indispensable dans ces régions sauvages.'),
        (4, 4, '2019-11-02 02:30:00', 'Etrange ce comportement de l\'ours quand même ! Vous avez eu de la chance non ? Moi je me serai barré en courant !'),
        (4, 1, '2019-11-03 01:40:00', 'Ah non justement ! Je l\'ai su après, mais si j\'avais fui en courant, il m\'aurait attaqué ! J\'ai eu un bon réflexe en fait !'),
        (4, 4, '2019-11-03 17:50:00', 'Bon bah voilà ! Maintenant, je sais que mon aventure là-bas ce serait terminée au bout de 5 jours, la loose...'),
        (5, 1, '2019-11-09 09:15:00', 'Et voici le chapitre 5, tout frais livré. Bonne lecture.'),
        (5, 3, '2019-11-09 16:55:00', 'Incroyable cette rencontre marine ! C\'est tellement bien décrit en plus...'),
        (5, 2, '2019-11-10 08:05:00', 'Génial en effet ! Trop mignonnes ces orques ! Ca doit être tellement beau de les voir comme ça à l\'état sauvage !'),
        (5, 4, '2019-11-11 21:55:00', 'Euh les orques trop mignonnes, trop mignonnes... J\'aurais pas fait le fier moi !'),
        (5, 1, '2019-11-12 01:10:00', 'Oui c\'est impressionant, mais c\'est un animal vraiment beau à voir. Elles ne sont pas agressives normalement.'),
        (5, 4, '2019-11-12 14:00:00', 'Mouais... C\'est le normalement qui me fait flipper ! En tout cas, c\'est toujours aussi bien.'),
        (5, 1, '2019-11-12 15:28:00', 'Merci ! Heureux que ça vous plaise ! La suite dans une semaine normalement.'),
        (6, 1, '2019-11-18 09:45:00', 'Livraison du chapitre 6. Bonne lecture !'),
        (6, 3, '2019-11-18 19:20:00', 'Chapitre 6 validé Mr Forteroche ! Ce Kinlunkut quelle perle quand même !'),
        (6, 1, '2019-11-18 21:45:00', 'Oui une vraie perle en effet. Sans lui je ne serai pas là aujourd\'hui pour témoigner de cette aventure. Bises Kinlunkut !'),
        (6, 2, '2019-11-19 08:40:00', 'Et ben, pas si facile apparemment la maîtrise du traîneau ! Et oui grosses bises à Kinlunkut, je l\'adore...'),
        (6, 1, '2019-11-19 09:10:00', 'Je lui transmettrai promis, il sera très fier !'),
        (6, 4, '2019-11-19 22:10:00', 'Ouais pas facile en effet ! Punaise, fin septembre déjà des T° négatives et de la neige. Brrrrr...'),
        (6, 1, '2019-11-20 02:15:00', 'La suite tardera un peu plus d\'une semaine, je suis en salon du livre à Saint-Malo, désolé.');

