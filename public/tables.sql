-- Creating tables and example data

-- Tables (3) and grants

DROP TABLE IF EXISTS rider;
CREATE TABLE rider (
idrider INT UNSIGNED AUTO_INCREMENT, 
nimi varchar(50) NOT NULL, 
email varchar(50) NOT NULL,
salasana VARCHAR(255) NOT NULL,
admin             BOOLEAN NOT NULL DEFAULT (false),
vahvistettu       BOOLEAN NOT NULL DEFAULT (false),
vahvavain         CHAR(40),
kirjautunut       TIMESTAMP,
CONSTRAINT pk_rider PRIMARY KEY (idrider)
);
GRANT SELECT, INSERT, UPDATE, DELETE ON rider TO 'DB_USER'@'localhost';

DROP TABLE IF EXISTS class;
CREATE TABLE class (
idclass INT UNSIGNED AUTO_INCREMENT, 
nimi varchar(50) NOT NULL, 
luokka varchar(30) NOT NUL, 
kuvaus text, 
alkaa DATETIME,
laji varchar(10) NOT NULL,
CONSTRAINT pk_class PRIMARY KEY (idclass)
);
GRANT SELECT, INSERT, UPDATE, DELETE ON class TO 'DB_USER'@'localhost';

DROP TABLE IF EXISTS reg;
CREATE TABLE reg (
idreg INT UNSIGNED AUTO_INCREMENT, 
idclass INT UNSIGNED NOT NULL,
idrider INT UNSIGNED NOT NULL,
horse varchar(50) NOT NULL, 
ilmAika TIMESTAMP,
CONSTRAINT pk_reg PRIMARY KEY (idreg),
CONSTRAINT fk_regclass FOREIGN KEY (idclass) REFERENCES class(idclass),
CONSTRAINT fk_regrider FOREIGN KEY (idrider) REFERENCES rider(idrider)
);
GRANT SELECT, INSERT, UPDATE, DELETE ON reg TO 'DB_USER'@'localhost';



-- Example data

insert into rider (nimi, email, salasana) values ('Kalle Fazer', 'kalle@fazer.com', 'salasana'); 
insert into rider (nimi, email, salasana) values ('John Whitaker', 'john@whitaker.com', 'salasana'); 
insert into rider (nimi, email, salasana) values ('Brita Dahlström', 'brita@dahlstrom.com', 'salasana'); 
insert into rider (nimi, email, salasana) values ('Anne-Marie Kynsilehto', 'anne-marie@kynsilehto.com', 'salasana');
insert into rider (nimi, email, salasana) values ('Silja Pursiainen', 'silja@pursiainen.com', 'salasana');
insert into rider (nimi, email, salasana) values ('Polly Phillips', 'polly@phillips.com', 'salasana');
insert into rider (nimi, email, salasana) values ('Peta Beckett', 'peta@beckett.com', 'salasana');
insert into rider (nimi, email, salasana) values ('Simon Long', 'simon@long.com', 'salasana');
insert into rider (nimi, email, salasana) values ('Robert Slade', 'robert@slade.com', 'salasana');
insert into rider (nimi, email, salasana) values ('Peter McLean', 'peter@mclean.com', 'salasana');
insert into rider (nimi, email, salasana) values ('Hugo Simon', 'hugo@simon.com', 'salasana');
insert into rider (nimi, email, salasana) values ('Hertta Upari', 'hertta@upari.com', 'salasana');
insert into rider (nimi, email, salasana) values ('Märta Rosenius', 'marta@rosenius.com', 'salasana');
insert into rider (nimi, email, salasana) values ('Harry deLeyer', 'harry@deleyer.com', 'salasana');
insert into rider (nimi, email, salasana) values ('Kyra Kyrklund', 'kyra@kyrklund.com', 'salasana');
insert into rider (nimi, email, salasana) values ('Isabell Werth', 'isabell@werth.com', 'salasana');
insert into rider (nimi, email, salasana) values ('Minna Virtanen ', 'minna@virtanen.com', 'salasana');
insert into rider (nimi, email, salasana) values ('Hanna Nieminen ', 'hanna@nieminen.com', 'salasana');

insert into class (nimi, luokka, kuvaus, alkaa, laji) values ('Tuntiratsastajien Spesiaali', 'HeB', 'Kaikenikäisille ratsastuskoulujen tuntiratsastajille avoin luokka.', '2026-06-12 14:00:00', 'KOULU');
insert into class (nimi, luokka, kuvaus, alkaa, laji) values ('Grand Prix 130 cm', 'A.0.1', 'Vaativan tason esteluokka', '2026-06-13 09:00:00', 'ESTE');
insert into class (nimi, luokka, kuvaus, alkaa, laji) values ('Dressage for Stressed', 'Intermediate II', 'Vaikean tason kouluratsastusluokka', '2026-06-13 10:30:00', 'KOULU');
insert into class (nimi, luokka, kuvaus, alkaa, laji) values ('Junior Jumpers 80 cm', 'AM 5', 'Junioriratsastajien luokka', '2026-06-13 12:30:00', 'ESTE');
insert into class (nimi, luokka, kuvaus, alkaa, laji) values ('Eventing Memorial Trophy', '130 cm', 'Vaikean tason maastoesterata. Käytämme vain irtoavia esteitä (frangibles only).', '2026-06-14 09:00:00', 'MAASTO');
insert into class (nimi, luokka, kuvaus, alkaa, laji) values ('Obstacles Cup 60 cm', 'A.0.1', 'Helppo luokka, tuntiratsastajien este-cup', '2026-06-14 11:00:00', 'ESTE');
insert into class (nimi, luokka, kuvaus, alkaa, laji) values ('Grand Prix 160 cm', 'AM 5', 'Kansainvälinen vaativan tason luokka', '2026-06-14 12:30:00', 'ESTE');
insert into class (nimi, luokka, kuvaus, alkaa, laji) values ('Prix de St Suomenhevonen', 'VaA', 'Suomenhevosille avoin vaativa luokka', '2026-06-14 14:00:00', 'KOULU');
insert into class (nimi, luokka, kuvaus, alkaa, laji) values ('Entiset ravihevoset Spesiaali', 'HeA', 'Kouluratsastusluokka entisille ravihevosille', '2026-06-14 15:30:00', 'KOULU');

insert into reg (idclass, idrider, horse) values (44, 10, 'Hot Chocolate'); 
insert into reg (idclass, idrider, horse) values (49, 10, 'Hot Chocolate');
insert into reg (idclass, idrider, horse) values (44, 11, 'Milton'); 
insert into reg (idclass, idrider, horse) values (49, 11, 'Milton');
insert into reg (idclass, idrider, horse) values (44, 12, 'Barbara'); 
insert into reg (idclass, idrider, horse) values (49, 12, 'Sans Souci');
insert into reg (idclass, idrider, horse) values (44, 13, 'US Neopolitan'); 
insert into reg (idclass, idrider, horse) values (49, 13, 'US Neopolitan'); 
insert into reg (idclass, idrider, horse) values (44, 14, 'Ben Hur'); 
insert into reg (idclass, idrider, horse) values (45, 14, 'Ben Hur');
insert into reg (idclass, idrider, horse) values (47, 15, 'Coral Cove'); 
insert into reg (idclass, idrider, horse) values (47, 16, 'Twemlous Pathfinder'); 
insert into reg (idclass, idrider, horse) values (47, 17, 'Springleaze Macaroo'); 
insert into reg (idclass, idrider, horse) values (47, 18, 'Not Known'); 
insert into reg (idclass, idrider, horse) values (47, 19, 'Gracious Me II'); 
insert into reg (idclass, idrider, horse) values (49, 20, 'E.T.'); 
insert into reg (idclass, idrider, horse) values (44, 20, 'E.T.'); 
insert into reg (idclass, idrider, horse) values (49, 21, 'Mixtura'); 
insert into reg (idclass, idrider, horse) values (45, 24, 'Piccolo'); 
insert into reg (idclass, idrider, horse) values (45, 24, 'Matador');
insert into reg (idclass, idrider, horse) values (44, 21, 'Mixtura');
insert into reg (idclass, idrider, horse) values (45, 22, 'Duell'); 
insert into reg (idclass, idrider, horse) values (49, 23, 'Snowman'); 
insert into reg (idclass, idrider, horse) values (50, 26, 'Suven-Voitto');
insert into reg (idclass, idrider, horse) values (51, 27, 'Cesar Webs');
insert into reg (idclass, idrider, horse) values (45, 25, 'Wendy de Fontaine');
