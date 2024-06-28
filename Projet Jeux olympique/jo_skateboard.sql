#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: EVENT
#------------------------------------------------------------

CREATE TABLE EVENT(
        id_event Int  Auto_increment  NOT NULL ,
        nom      Varchar (50) NOT NULL ,
        type     Varchar (50) NOT NULL
	,CONSTRAINT EVENT_PK PRIMARY KEY (id_event)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: userroles
#------------------------------------------------------------

CREATE TABLE userroles(
        role_id         Int  Auto_increment  NOT NULL ,
        roleDescription Varchar (60) NOT NULL
	,CONSTRAINT userroles_PK PRIMARY KEY (role_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: USERS
#------------------------------------------------------------

CREATE TABLE USERS(
        id_user       Int  Auto_increment  NOT NULL ,
        nom           Varchar (50) NOT NULL ,
        prenom        Varchar (50) NOT NULL ,
        email         Varchar (50) NOT NULL ,
        mdp           Char (60) NOT NULL ,
        dateNaissance Date NOT NULL ,
        genre         Varchar (10) NOT NULL ,
        phone         Numeric NOT NULL ,
        role_id       Int NOT NULL
	,CONSTRAINT USERS_PK PRIMARY KEY (id_user)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: ATHLETE
#------------------------------------------------------------

CREATE TABLE ATHLETE(
        id_athlete    Int  Auto_increment  NOT NULL ,
        nom           Varchar (50) NOT NULL ,
        genre         Varchar (2) NOT NULL ,
        dateNaissance Date NOT NULL ,
        id_country    Int NOT NULL
	,CONSTRAINT ATHLETE_PK PRIMARY KEY (id_athlete)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: COUNTRY
#------------------------------------------------------------

CREATE TABLE COUNTRY(
        id_country Int  Auto_increment  NOT NULL ,
        nom        Varchar (50) NOT NULL ,
        id_athlete Int NOT NULL
	,CONSTRAINT COUNTRY_PK PRIMARY KEY (id_country)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Participate
#------------------------------------------------------------

CREATE TABLE Participate(
        id_event   Int NOT NULL ,
        id_athlete Int NOT NULL
	,CONSTRAINT Participate_PK PRIMARY KEY (id_event,id_athlete)
)ENGINE=InnoDB;




ALTER TABLE USERS
	ADD CONSTRAINT USERS_userroles0_FK
	FOREIGN KEY (role_id)
	REFERENCES userroles(role_id);

ALTER TABLE ATHLETE
	ADD CONSTRAINT ATHLETE_COUNTRY0_FK
	FOREIGN KEY (id_country)
	REFERENCES COUNTRY(id_country);

ALTER TABLE ATHLETE 
	ADD CONSTRAINT ATHLETE_COUNTRY0_AK 
	UNIQUE (id_country);

ALTER TABLE COUNTRY
	ADD CONSTRAINT COUNTRY_ATHLETE0_FK
	FOREIGN KEY (id_athlete)
	REFERENCES ATHLETE(id_athlete);

ALTER TABLE COUNTRY 
	ADD CONSTRAINT COUNTRY_ATHLETE0_AK 
	UNIQUE (id_athlete);

ALTER TABLE Participate
	ADD CONSTRAINT Participate_EVENT0_FK
	FOREIGN KEY (id_event)
	REFERENCES EVENT(id_event);

ALTER TABLE Participate
	ADD CONSTRAINT Participate_ATHLETE1_FK
	FOREIGN KEY (id_athlete)
	REFERENCES ATHLETE(id_athlete);

-- Ajout rôle
INSERT INTO userroles(roleDescription) VALUES ("Admin"), ("Non Admin");

