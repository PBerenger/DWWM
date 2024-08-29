#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------

-- Supprimer la base de donnée précédente
DROP DATABASE IF EXISTS super7;
CREATE DATABASE super7;
USE super7;

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
# Table: seven
#------------------------------------------------------------

CREATE TABLE seven(
        id_seven      Int  Auto_increment  NOT NULL ,
        10familles    Int NOT NULL ,
        improvisation Int NOT NULL ,
        oieSport      Int NOT NULL ,
        septMille     Int NOT NULL ,
        cooperation   Int NOT NULL ,
        centSeptente  Int NOT NULL ,
        boulesCristal Int NOT NULL
	,CONSTRAINT seven_PK PRIMARY KEY (id_seven)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: competences
#------------------------------------------------------------

CREATE TABLE competences(
        id_competences Int  Auto_increment  NOT NULL ,
        questionMonde  Numeric NOT NULL ,
        devDurable     Numeric NOT NULL ,
        decisionRapide Numeric NOT NULL ,
        communication  Numeric NOT NULL ,
        creation       Numeric NOT NULL ,
        cooperation    Numeric NOT NULL
	,CONSTRAINT competences_PK PRIMARY KEY (id_competences)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: a les résultats
#------------------------------------------------------------

CREATE TABLE a_les_resultats(
        id_user  Int NOT NULL ,
        id_seven Int NOT NULL
	,CONSTRAINT a_les_resultats_PK PRIMARY KEY (id_user,id_seven)

	,CONSTRAINT a_les_resultats_USERS_FK FOREIGN KEY (id_user) REFERENCES USERS(id_user)
	,CONSTRAINT a_les_resultats_seven0_FK FOREIGN KEY (id_seven) REFERENCES seven(id_seven)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Obtient les comp
#------------------------------------------------------------

CREATE TABLE Obtient_les_comp(
        id_seven       Int NOT NULL ,
        id_competences Int NOT NULL
	,CONSTRAINT Obtient_les_comp_PK PRIMARY KEY (id_seven,id_competences)

	,CONSTRAINT Obtient_les_comp_seven_FK FOREIGN KEY (id_seven) REFERENCES seven(id_seven)
	,CONSTRAINT Obtient_les_comp_competences0_FK FOREIGN KEY (id_competences) REFERENCES competences(id_competences)
)ENGINE=InnoDB;