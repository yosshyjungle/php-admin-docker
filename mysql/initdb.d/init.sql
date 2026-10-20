USE test_db;

CREATE TABLE users (
    id         INT         NOT NULL,
    first_name VARCHAR(14) NOT NULL,
    age        INT,
    PRIMARY KEY (id)
);

INSERT INTO users VALUES (1, 'nissho', 30);