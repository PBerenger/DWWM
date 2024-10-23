#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: EVENT
#------------------------------------------------------------

CREATE TABLE EVENT(
        id_event    Int  Auto_increment  NOT NULL ,
        eventName   Varchar (50) NOT NULL ,
        eventTown   Varchar (50) NOT NULL ,
        eventRegion Varchar (50) NOT NULL ,
        eventHour   Varchar (50) NOT NULL
	,CONSTRAINT EVENT_PK PRIMARY KEY (id_event)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: COUNTRY
#------------------------------------------------------------

CREATE TABLE COUNTRY(
        id_country       Int  Auto_increment  NOT NULL ,
        countryName      Varchar (50) NOT NULL ,
        countryShortName Varchar (50) NOT NULL
	,CONSTRAINT COUNTRY_PK PRIMARY KEY (id_country)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: ATHLETE
#------------------------------------------------------------

CREATE TABLE ATHLETE(
        id_athlete       Int  Auto_increment  NOT NULL ,
        athleteLastName  Varchar (50) NOT NULL ,
        athleteFirstName Varchar (50) NOT NULL ,
        athletegender    Varchar (2) NOT NULL ,
        AthleteDateBirth Int NOT NULL ,
        id_country       Int NOT NULL
	,CONSTRAINT ATHLETE_PK PRIMARY KEY (id_athlete)

	,CONSTRAINT ATHLETE_COUNTRY_FK FOREIGN KEY (id_country) REFERENCES COUNTRY(id_country)
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
        userLastName  Varchar (50) NOT NULL ,
        userFirstName Varchar (50) NOT NULL ,
        userEmail     Varchar (50) NOT NULL ,
        userPassword  Varchar (60) NOT NULL ,
        userDateBirth Date NOT NULL ,
        userGender    Varchar (10) NOT NULL ,
        UserPhone     Numeric NOT NULL ,
        role_id       Int NOT NULL
	,CONSTRAINT USERS_PK PRIMARY KEY (id_user)

	,CONSTRAINT USERS_userroles_FK FOREIGN KEY (role_id) REFERENCES userroles(role_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Participate
#------------------------------------------------------------

CREATE TABLE Participate(
        id_event   Int NOT NULL ,
        id_athlete Int NOT NULL
	,CONSTRAINT Participate_PK PRIMARY KEY (id_event,id_athlete)

	,CONSTRAINT Participate_EVENT_FK FOREIGN KEY (id_event) REFERENCES EVENT(id_event)
	,CONSTRAINT Participate_ATHLETE0_FK FOREIGN KEY (id_athlete) REFERENCES ATHLETE(id_athlete)
)ENGINE=InnoDB;


-- Ajout rôle
INSERT INTO userroles(roleDescription) VALUES ("Admin"), ("Non Admin");

