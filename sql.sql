CREATE DATABASE malifudbal 
CHARACTER SET utf8 
COLLATE utf8_unicode_ci;

create table korisnici(
	korisnik_id int AUTO_INCREMENT PRIMARY KEY,
	naziv_korisnika varchar(100) character set utf8 not null unique,
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

create table drzave(
	drzava_id int AUTO_INCREMENT PRIMARY KEY,
	naziv_drzave varchar(50) character set utf8 not null
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

CREATE TABLE ekipe(
	ekipa_id int AUTO_INCREMENT PRIMARY KEY,
	naziv_ekipe varchar(100) character set utf8 not null,
    drzava_id int not null,
    Mesto varchar(100) character set utf8 not null,
    email varchar(100) character set utf8 null unique,
	turnir_id int not null,
	datum_registracije datetime not null,
    FOREIGN KEY (drzava_id) REFERENCES drzave(drzava_id),
    FOREIGN KEY (turnir_id) REFERENCES turniri(turnir_id)
)engine=myisam;

CREATE TABLE igraci(
	igrac_id int AUTO_INCREMENT PRIMARY KEY,
	ime varchar(100) character set utf8 not null,
    prezime varchar(100) character set utf8 not null,
    datum_rodjenja datetime not null,
    ekipa_id int not null,
    FOREIGN KEY (ekipa_id) REFERENCES ekipe(ekipa_id)
)engine=myisam;

insert into drzave values(null,'Srbija');
insert into drzave values(null,'Bosna');
insert into drzave values(null,'Crna Gora');
insert into drzave values(null,'Makedonija');
insert into drzave values(null,'Hrvatska');

insert into prava values(null,'Admin');
insert into korisnici values(null,'Nikola Bibercic','nikola.bibercic@gmail.com','123');
insert into korisnici_prava values(null,1,1);

insert into statusi_turnira values(null,'Aktivan');
insert into statusi_turnira values(null,'Neaktivan');