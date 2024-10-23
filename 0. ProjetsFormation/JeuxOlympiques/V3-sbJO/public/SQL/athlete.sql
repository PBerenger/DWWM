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
        eventDate   Datetime NOT NULL ,
        phase       Varchar (50) NOT NULL
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
        athletegender    Varchar (10) NOT NULL ,
        AthleteDateBirth Date NOT NULL ,
        gold             Int NOT NULL ,
        silver           Int NOT NULL ,
        bronze           Int NOT NULL ,
        id_country       Int NOT NULL
	,CONSTRAINT ATHLETE_PK PRIMARY KEY (id_athlete)

	,CONSTRAINT ATHLETE_COUNTRY_FK FOREIGN KEY (id_country) REFERENCES COUNTRY(id_country)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Participate
#------------------------------------------------------------

CREATE TABLE Participate(
        id_event   Int NOT NULL ,
        id_athlete Int NOT NULL ,
        manche1    Decimal NOT NULL ,
        manche2    Decimal NOT NULL ,
        scoreFinal Decimal NOT NULL
	,CONSTRAINT Participate_PK PRIMARY KEY (id_event,id_athlete)

	,CONSTRAINT Participate_EVENT_FK FOREIGN KEY (id_event) REFERENCES EVENT(id_event)
	,CONSTRAINT Participate_ATHLETE0_FK FOREIGN KEY (id_athlete) REFERENCES ATHLETE(id_athlete)
)ENGINE=InnoDB;

