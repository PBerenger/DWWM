#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------

#------------------------------------------------------------
# Table: questions_games
#------------------------------------------------------------

CREATE TABLE questions_games (
    id             INT AUTO_INCREMENT NOT NULL,
    `name`         VARCHAR(250) NOT NULL,
    score          INT NOT NULL,
    `date`         DATE NOT NULL,
    likes          INT NOT NULL,
    user_id        INT NOT NULL,
    game_id        INT NOT NULL,
    game_played_id INT NOT NULL,
    CONSTRAINT pk_questions_games PRIMARY KEY (id)
) ENGINE=InnoDB;

#------------------------------------------------------------
# Table: responses
#------------------------------------------------------------

CREATE TABLE responses (
    id               INT AUTO_INCREMENT NOT NULL,
    result           INT NOT NULL,
    question_game_id INT NOT NULL,
    CONSTRAINT pk_responses PRIMARY KEY (id),
    CONSTRAINT fk_responses_questions_games FOREIGN KEY (question_game_id) REFERENCES questions_games(id)
) ENGINE=InnoDB;

#------------------------------------------------------------
# Table: games
#------------------------------------------------------------

CREATE TABLE games (
    id             INT AUTO_INCREMENT NOT NULL,
    `list`         VARCHAR(255) NOT NULL,
    CONSTRAINT pk_games PRIMARY KEY (id)
) ENGINE=InnoDB;

#------------------------------------------------------------
# Table: game_played
#------------------------------------------------------------

CREATE TABLE game_played (
    id         INT AUTO_INCREMENT NOT NULL,
    game_id    INT NOT NULL,
    CONSTRAINT pk_game_played PRIMARY KEY (id),
    CONSTRAINT fk_game_played_games FOREIGN KEY (game_id) REFERENCES games(id)
) ENGINE=InnoDB;

