-- Supprimer la base de données précédente
DROP DATABASE IF EXISTS super7_db;
CREATE DATABASE super7_db;
USE super7_db;

#------------------------------------------------------------
# Table: skills
#------------------------------------------------------------
CREATE TABLE skills(
    id_skill INT AUTO_INCREMENT NOT NULL,
    s_skills VARCHAR(50) NOT NULL,
    CONSTRAINT skills_PK PRIMARY KEY (id_skill)
) ENGINE=InnoDB;

#------------------------------------------------------------
# Table: gamesbg
#------------------------------------------------------------
CREATE TABLE gamesbg(
    id_gamesbg INT AUTO_INCREMENT NOT NULL,
    bg_name VARCHAR(256) NOT NULL,
    bg_category VARCHAR(256) NOT NULL,
    bg_nbr_players INT NOT NULL,
    bg_duration INT NOT NULL,
    bg_likes INT NOT NULL,
    CONSTRAINT gamesbg_PK PRIMARY KEY (id_gamesbg)
) ENGINE=InnoDB;

#------------------------------------------------------------
# Table: questions
#------------------------------------------------------------
CREATE TABLE questions(
    id_question INT AUTO_INCREMENT NOT NULL,
    q_score VARCHAR(256) NOT NULL,
    q_date DATE NOT NULL,
    q_likes INT NOT NULL,
    q_type VARCHAR(256) NOT NULL,
    id_skill INT NOT NULL,
    q_players INT NOT NULL,
    CONSTRAINT questions_PK PRIMARY KEY (id_question),
    CONSTRAINT questions_skill_FK FOREIGN KEY (id_skill) REFERENCES skills(id_skill)
) ENGINE=InnoDB;

#------------------------------------------------------------
# Table: user_responses
#------------------------------------------------------------
CREATE TABLE user_responses(
    id_response INT AUTO_INCREMENT NOT NULL,
    re_score INT NOT NULL,
    re_date DATE NOT NULL,
    re_likes INT NOT NULL,
    id_skill INT NOT NULL,
    re_type VARCHAR(10) NOT NULL,
    CONSTRAINT user_responses_PK PRIMARY KEY (id_response),
    CONSTRAINT user_responses_skill_FK FOREIGN KEY (id_skill) REFERENCES skills(id_skill)
) ENGINE=InnoDB;

#------------------------------------------------------------
# Table: users
#------------------------------------------------------------
CREATE TABLE users(
    id_user INT AUTO_INCREMENT NOT NULL,
    u_lname VARCHAR(256) NOT NULL,
    u_fname VARCHAR(256) NOT NULL,
    u_email VARCHAR(256) NOT NULL UNIQUE,
    u_password VARCHAR(256) NOT NULL,
    u_date_birth DATE NOT NULL,
    u_gender VARCHAR(10) NOT NULL,
    u_phone VARCHAR(25) NOT NULL,
    u_profil_img VARCHAR(100) NOT NULL,
    u_games_played INT NOT NULL,
    u_opponents INT NOT NULL,
    u_wins INT NOT NULL,
    u_losses INT NOT NULL,
    u_scores INT NOT NULL,
    u_skills INT NOT NULL,
    u_time INT NOT NULL,
    CONSTRAINT users_PK PRIMARY KEY (id_user)
) ENGINE=InnoDB;

#------------------------------------------------------------
# Table: questionnaire
#------------------------------------------------------------
CREATE TABLE questionnaire(
    question_id INT NOT NULL,
    response_id INT NOT NULL,
    CONSTRAINT questionnaire_PK PRIMARY KEY (question_id, response_id),
    CONSTRAINT questionnaire_question_FK FOREIGN KEY (question_id) REFERENCES questions(id_question),
    CONSTRAINT questionnaire_response_FK FOREIGN KEY (response_id) REFERENCES user_responses(id_response)
) ENGINE=InnoDB;

#------------------------------------------------------------
# Table: obtient
#------------------------------------------------------------
CREATE TABLE obtient(
    id_response INT NOT NULL,
    id_question INT NOT NULL,
    CONSTRAINT obtient_PK PRIMARY KEY (id_response, id_question),
    CONSTRAINT obtient_responses_FK FOREIGN KEY (id_response) REFERENCES user_responses(id_response),
    CONSTRAINT obtient_questions_FK FOREIGN KEY (id_question) REFERENCES questions(id_question)
) ENGINE=InnoDB;

#------------------------------------------------------------
# Table: game_skills
#------------------------------------------------------------
CREATE TABLE game_skills(
    id_skill INT NOT NULL,
    id_gamesbg INT NOT NULL,
    CONSTRAINT game_skills_PK PRIMARY KEY (id_skill, id_gamesbg),
    CONSTRAINT game_skills_skill_FK FOREIGN KEY (id_skill) REFERENCES skills(id_skill),
    CONSTRAINT game_skills_gamesbg_FK FOREIGN KEY (id_gamesbg) REFERENCES gamesbg(id_gamesbg)
) ENGINE=InnoDB;

#------------------------------------------------------------
# Table: joue
#------------------------------------------------------------
CREATE TABLE joue(
    id_gamesbg INT NOT NULL,
    id_user INT NOT NULL,
    CONSTRAINT joue_PK PRIMARY KEY (id_gamesbg, id_user),
    CONSTRAINT joue_gamesbg_FK FOREIGN KEY (id_gamesbg) REFERENCES gamesbg(id_gamesbg),
    CONSTRAINT joue_users_FK FOREIGN KEY (id_user) REFERENCES users(id_user)
) ENGINE=InnoDB;

#------------------------------------------------------------
# Table: repondre
#------------------------------------------------------------
CREATE TABLE repondre(
    question_id INT NOT NULL,
    id_user INT NOT NULL,
    CONSTRAINT repondre_PK PRIMARY KEY (question_id, id_user),
    CONSTRAINT repondre_questions_FK FOREIGN KEY (question_id) REFERENCES questions(id_question),
    CONSTRAINT repondre_users_FK FOREIGN KEY (id_user) REFERENCES users(id_user)
) ENGINE=InnoDB;

#------------------------------------------------------------
# Table: user_roles
#------------------------------------------------------------
CREATE TABLE user_roles(
    id_role INT AUTO_INCREMENT NOT NULL,
    role_description VARCHAR(100) NOT NULL,
    id_user INT NOT NULL,
    CONSTRAINT user_roles_PK PRIMARY KEY (id_role),
    CONSTRAINT user_roles_users_FK FOREIGN KEY (id_user) REFERENCES users(id_user)
) ENGINE=InnoDB;

#------------------------------------------------------------
# Ajout des index --facilite le filtrage
#------------------------------------------------------------
CREATE INDEX idx_gamesbg_id_user ON joue(id_gamesbg, id_user);
CREATE INDEX idx_questions_id_user ON repondre(question_id, id_user);

#------------------------------------------------------------
# Ajout de la colonne 'id_role' dans la table 'users'
#------------------------------------------------------------

-- Ajouter la colonne id_role à la table users
ALTER TABLE users
ADD COLUMN id_role INT;

-- Ajouter une contrainte de clé étrangère à la colonne id_role
ALTER TABLE users
ADD CONSTRAINT users_role_FK
FOREIGN KEY (id_role) REFERENCES user_roles(id_role);









 --facilite le filtrage