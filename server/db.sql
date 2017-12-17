DROP TABLE Member;
DROP TABLE News;
DROP TABLE Question;
DROP TABLE Reply;
DROP TABLE Image;

CREATE TABLE Member(
    id SERIAL,
    firstName VARCHAR(20),
    lastName VARCHAR(20),
    username VARCHAR(11) UNIQUE NOT NULL,
    email VARCHAR(254) UNIQUE NOT NULL,
    password VARCHAR(164) NOT NULL,
    isAdmin BOOLEAN,
    PRIMARY KEY(id)
);

CREATE TABLE News(
  id SERIAL,
  authorId BIGINT UNSIGNED,
  title VARCHAR(100),
  content LONGTEXT,
  dateCreated TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  dateEdited TIMESTAMP,
  type VARCHAR(10),
  PRIMARY KEY(id)
);

CREATE TABLE Question(
  id SERIAL,
  authorId BIGINT UNSIGNED,
  title VARCHAR(100),
  content LONGTEXT,
  dateCreated TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  dateEdited TIMESTAMP,
  PRIMARY KEY(id)
);

CREATE TABLE Reply(
  id SERIAL,
  authorId BIGINT,
  content LONGTEXT,
  dateCreated TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  dateEdited TIMESTAMP,
  PRIMARY KEY(id)
);



CREATE TABLE Image(
  id SERIAL,
  authorId BIGINT,
  newsId BIGINT UNSIGNED,
  caption TEXT,
  img LONGBLOB,
  position INTEGER DEFAULT -1,
  dateCreated TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  inGallery BOOLEAN
);
/*
DROP TABLE Member;

CREATE TABLE Member(
    id SERIAL,
    firstName VARCHAR(20),
    lastName VARCHAR(20),
    username VARCHAR(11) UNIQUE,
    email VARCHAR(254) UNIQUE,
    isAdmin BOOLEAN,
    PRIMARY KEY(id)
);

CREATE TABLE News(
  id SERIAL,
  authorId BIGINT UNSIGNED,
  title VARCHAR(100),
  content LONGTEXT,
  dateCreated TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  dateEdited TIMESTAMP,
  type VARCHAR(10),
  PRIMARY KEY(id)
  -- FOREIGN KEY(authorId) REFERENCES Member(id)
);

CREATE TABLE Question(
  id SERIAL,
  authorId BIGINT UNSIGNED,
  title VARCHAR(100),
  content LONGTEXT,
  dateCreated TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  dateEdited TIMESTAMP,
  PRIMARY KEY(id)
  --FOREIGN KEY(authorId) REFERENCES Member(id) ON DELETE CASCADE
);

CREATE TABLE Reply(
  id SERIAL,
  authorId BIGINT,
  content LONGTEXT,
  dateCreated TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  dateEdited TIMESTAMP,
  PRIMARY KEY(id)
  --FOREIGN KEY(authorId) REFERENCES Member(id) ON DELETE CASCADE
);*/


/* position is the position it's in top to bottom on the post page, -1 if not in a post page */
/* if account deleted, image won't be deleted*/
/*CREATE TABLE Image(
  id SERIAL,
  authorId BIGINT,
  newsId BIGINT UNSIGNED,
  caption TEXT,
  img LONGBLOB,
  position INTEGER DEFAULT -1,
  dateCreated TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  inGallery BOOLEAN
);

/* News with id 0 is for the Photo Gallery, author 0 is nobody.*/
-- INSERT INTO Member(id) VALUES(0);
-- INSERT INTO News VALUES(0, 0, "Photos Only",  )*/
