INSERT INTO kayttaja(tunnus, salasana)
VALUES ('test', '1234');

INSERT INTO elokuva(nimi, kesto, vuosi, kayttaja)
VALUES ('Alien', 116, 1979, 1);

INSERT INTO elokuva(nimi, kesto, ikaraja, vuosi, kayttaja)
VALUES ('Apocalypse Now', 147, K16, 1979, 1);

INSERT INTO elokuva(nimi, kesto, ikaraja, vuosi, kieli, kayttaja)
VALUES ('Goodfellas', 145, K16, 1990, englanti, 1);

INSERT INTO henkilo(nimi)
VALUES ('Martin Scorsese');

INSERT INTO kategoria(nimi)
VALUES ('Kauhu');
