create table kayttaja(
	id serial primary key,
	tunnus varchar(32) unique not null,
	salasana varchar(32) not null
);

create table elokuva(
	id serial primary key,
	nimi varchar(100) not null,
	vuosi integer,
	kesto integer,
	ikaraja integer,
	kieli varchar(50),
	kayttaja integer,
	foreign key(kayttaja) references kayttaja ON DELETE CASCADE
);

create table henkilo(
	id serial primary key,
	nimi varchar(50)
);

create table ohjaus(
	elokuva integer,
	ohjaaja integer,
	foreign key(elokuva) references elokuva ON DELETE CASCADE, 
	foreign key(ohjaaja) references henkilo
);

create table roolityo(
	elokuva integer,
	nayttelija integer,
	foreign key(elokuva) references elokuva ON DELETE CASCADE,
	foreign key(nayttelija) references henkilo
);

create table kategoria(
	id serial primary key,
	nimi varchar(30)
);

create table luokitus(
	elokuva integer,
	kategoria integer,
	foreign key(elokuva) references elokuva ON DELETE CASCADE,
	foreign key(kategoria) references kategoria
);
