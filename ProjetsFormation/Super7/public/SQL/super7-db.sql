#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------

-- Supprimer la base de donnée précédente
DROP DATABASE IF EXISTS users_super7;
CREATE DATABASE users_super7;
USE users_super7;

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


-- Créer table 'questions'

USE users_super7;

CREATE TABLE questions (
    question_id INT AUTO_INCREMENT PRIMARY KEY,
    responsesQuestions TEXT NOT NULL
);


-- Créer table 'questions'

USE users_super7;

CREATE TABLE questions_games (
    question_id INT AUTO_INCREMENT PRIMARY KEY,
    responsesQuestions TEXT NOT NULL
);