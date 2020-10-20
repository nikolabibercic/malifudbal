CREATE DATABASE malifudbal 
CHARACTER SET utf8 
COLLATE utf8_unicode_ci;

create table korisnici(
	korisnik_id int AUTO_INCREMENT PRIMARY KEY,
	naziv_korisnika varchar(100) character set utf8 not null,
    email varchar(100) character set utf8 not null unique,
    sifra varchar(100) character set utf8 not null
)engine=myisam;

CREATE TABLE prava(
	pravo_id int AUTO_INCREMENT PRIMARY KEY,
	naziv_prava varchar(50) character set utf8 not null unique
)engine=myisam;

CREATE TABLE korisnici_prava(
	korisnik_pravo_id int AUTO_INCREMENT PRIMARY KEY,
	korisnik_id int not null,
	pravo_id int not null,
	FOREIGN KEY (korisnik_id) REFERENCES korisnici(korisnik_id),
	FOREIGN KEY (pravo_id) REFERENCES prava(pravo_id)
)engine=myisam;

create table statusi_drzava(
	status_drzave_id int AUTO_INCREMENT PRIMARY KEY,
	status_drzave varchar(50) character set utf8 not null
)engine=myisam;

create table drzave(
	drzava_id int AUTO_INCREMENT PRIMARY KEY,
	naziv_drzave varchar(50) character set utf8 not null unique,
	status_drzave_id int not null,
	FOREIGN KEY (status_drzave_id) REFERENCES statusi_drzava(status_drzave_id)
)engine=myisam;

create table statusi_turnira(
	status_turnira_id int AUTO_INCREMENT PRIMARY KEY,
	status_turnira varchar(50) character set utf8 not null
)engine=myisam;

CREATE TABLE turniri(
	turnir_id int AUTO_INCREMENT PRIMARY KEY,
	naziv_turnira varchar(100) character set utf8 not null unique,
    datum_pocetka datetime not null,
	status_turnira_id int not null,
	napomena varchar(300) character set utf8 null,
	FOREIGN KEY (status_turnira_id) REFERENCES statusi_turnira(status_turnira_id)
)engine=myisam;

create table statusi_uplata(
	status_uplate_id int AUTO_INCREMENT PRIMARY KEY,
	status_uplate varchar(50) character set utf8 not null
)engine=myisam;

CREATE TABLE ekipe(
	ekipa_id int AUTO_INCREMENT PRIMARY KEY,
	naziv_ekipe varchar(100) character set utf8 not null,
    drzava_id int not null,
    Mesto varchar(100) character set utf8 not null,
    email varchar(100) character set utf8 null,
	telefon varchar(100) character set utf8 null,
	turnir_id int not null,
	datum_registracije datetime not null,
	status_uplate_id int not null,
    FOREIGN KEY (drzava_id) REFERENCES drzave(drzava_id),
    FOREIGN KEY (turnir_id) REFERENCES turniri(turnir_id),
	FOREIGN KEY (status_uplate_id) REFERENCES statusi_uplata(status_uplate_id)
)engine=myisam;

CREATE TABLE igraci(
	igrac_id int AUTO_INCREMENT PRIMARY KEY,
	ime varchar(100) character set utf8 not null,
    prezime varchar(100) character set utf8 not null,
    datum_rodjenja datetime null,
    ekipa_id int not null,
    FOREIGN KEY (ekipa_id) REFERENCES ekipe(ekipa_id)
)engine=myisam;

create table statusi_poruka(
	status_poruke_id int AUTO_INCREMENT PRIMARY KEY,
	status_poruke varchar(50) character set utf8 not null
)engine=myisam;

CREATE TABLE poruke(
	poruka_id int AUTO_INCREMENT PRIMARY KEY,
	naslov varchar(250) character set utf8 not null,
    tekst varchar(10000) character set utf8 not null,
    datum_poruke datetime not null,
    korisnik_id int not null,
	status_poruke_id int not null,
	FOREIGN KEY (korisnik_id) REFERENCES korisnici(korisnik_id),
	FOREIGN KEY (status_poruke_id) REFERENCES statusi_poruka(status_poruke_id)
)engine=myisam;

create table statusi_fotografija(
	status_fotografije_id int AUTO_INCREMENT PRIMARY KEY,
	status_fotografije varchar(50) character set utf8 not null
)engine=myisam;

CREATE TABLE fotografije(
	fotografija_id int AUTO_INCREMENT PRIMARY KEY,
	naziv_fotografije varchar(250) character set utf8 not null,
	datum_inserta datetime not null,
	status_fotografije_id int not null,
	FOREIGN KEY (status_fotografije_id) REFERENCES statusi_fotografija(status_fotografije_id)
)engine=myisam;

insert into drzave values(null,'Srbija',1);
insert into drzave values(null,'Bosna i Hercegovina',1);
insert into drzave values(null,'Crna Gora',1);
insert into drzave values(null,'Makedonija',1);
insert into drzave values(null,'Hrvatska',1);

insert into prava values(null,'Admin');
insert into prava values(null,'Bloger');

insert into korisnici values(null,'Nikola Bibercic','nikolabibercic@gmail.com','123');
insert into korisnici values(null,'Proba','proba@gmail.com','123');
insert into korisnici_prava values(null,1,1);

insert into statusi_turnira values(null,'Aktivno');
insert into statusi_turnira values(null,'Neaktivno');

insert into statusi_poruka values(null,'Aktivno');
insert into statusi_poruka values(null,'Neaktivno');

insert into statusi_drzava values(null,'Aktivno');
insert into statusi_drzava values(null,'Neaktivno');

insert into statusi_uplata values(null,'Uplaćeno');
insert into statusi_uplata values(null,'Nije uplaćeno');

insert into statusi_fotografija values(null,'Aktivno');
insert into statusi_fotografija values(null,'Neaktivno');

insert into turniri values(null,'Tasmajdan 2020','2020-11-01 00:00:00',1,'Odlican turnir');