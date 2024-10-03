-- Supprimer la base de données précédente
DROP DATABASE IF EXISTS super7_main_bdd;
CREATE DATABASE super7_main_bdd;
USE super7_main_bdd;

#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: games_board_game
#------------------------------------------------------------

CREATE TABLE games_board_game(
        id_games_bg    Int  Auto_increment  NOT NULL ,
        bg_name        Varchar (256) NOT NULL ,
        bg_category    Varchar (256) NOT NULL ,
        bg_max_players Int NOT NULL ,
        bg_duration    Int NOT NULL ,
        bg_likes       Int NOT NULL
	,CONSTRAINT games_board_game_PK PRIMARY KEY (id_games_bg)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: user_roles
#------------------------------------------------------------

CREATE TABLE user_roles(
        id_role          Int  Auto_increment  NOT NULL ,
        role_description Varchar (100) NOT NULL
	,CONSTRAINT user_roles_PK PRIMARY KEY (id_role)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: users
#------------------------------------------------------------

CREATE TABLE users(
        id_user      Int  Auto_increment  NOT NULL ,
        u_lname      Varchar (256) NOT NULL ,
        u_fname      Varchar (256) NOT NULL ,
        u_email      Varchar (256) NOT NULL ,
        u_password   Varchar (256) NOT NULL ,
        u_date_birth Date NOT NULL ,
        u_gender     Varchar (10) NOT NULL ,
        u_phone      Varchar (25) NOT NULL ,
        u_profil_img Varchar (100) NOT NULL ,
        id_role      Int NOT NULL
	,CONSTRAINT users_PK PRIMARY KEY (id_user)

	,CONSTRAINT users_user_roles_FK FOREIGN KEY (id_role) REFERENCES user_roles(id_role)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: questionnaire
#------------------------------------------------------------

CREATE TABLE questionnaire(
    questionnaire_id        INT AUTO_INCREMENT NOT NULL,
    responses_questionnaire TEXT NOT NULL,
    id_user                 INT NOT NULL,
    CONSTRAINT questionnaire_PK PRIMARY KEY (questionnaire_id),
    CONSTRAINT questionnaire_users_FK FOREIGN KEY (id_user) REFERENCES users(id_user)
) ENGINE=InnoDB;


#------------------------------------------------------------
# Table: skills
#------------------------------------------------------------

CREATE TABLE skills(
        id_skill Int  Auto_increment  NOT NULL ,
        s_skills Varchar (50) NOT NULL
	,CONSTRAINT skills_PK PRIMARY KEY (id_skill)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: played
#------------------------------------------------------------

CREATE TABLE played(
        id_games_bg   Int NOT NULL ,
        id_user       Int NOT NULL ,
        score         Int NOT NULL ,
        has_won       Bool NOT NULL ,
        date          Date NOT NULL ,
        likes_round   Int NOT NULL ,
        players_round Int NOT NULL
	,CONSTRAINT played_PK PRIMARY KEY (id_games_bg,id_user)

	,CONSTRAINT played_games_board_game_FK FOREIGN KEY (id_games_bg) REFERENCES games_board_game(id_games_bg)
	,CONSTRAINT played_users0_FK FOREIGN KEY (id_user) REFERENCES users(id_user)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: give
#------------------------------------------------------------

CREATE TABLE give(
        id_skill    Int NOT NULL ,
        id_games_bg Int NOT NULL
	,CONSTRAINT give_PK PRIMARY KEY (id_skill,id_games_bg)

	,CONSTRAINT give_skills_FK FOREIGN KEY (id_skill) REFERENCES skills(id_skill)
	,CONSTRAINT give_games_board_game0_FK FOREIGN KEY (id_games_bg) REFERENCES games_board_game(id_games_bg)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: likes
#------------------------------------------------------------

CREATE TABLE likes(
        id_games_bg Int NOT NULL ,
        id_user     Int NOT NULL
	,CONSTRAINT likes_PK PRIMARY KEY (id_games_bg,id_user)

	,CONSTRAINT likes_games_board_game_FK FOREIGN KEY (id_games_bg) REFERENCES games_board_game(id_games_bg)
	,CONSTRAINT likes_users0_FK FOREIGN KEY (id_user) REFERENCES users(id_user)
)ENGINE=InnoDB;