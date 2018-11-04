DROP TABLE Users;

CREATE TABLE Users(int userID, varchar(50) name, int phoneNumber, varchar())

Create Table Users (
  User_ID int NOT NULL,
  Name VARCHAR(50) NOT NULL,
  UserName VARCHAR(50) NOT NULL,
  Password VARCHAR(50) NOT NULL,
  PhoneNumber int NOT NULL,
  Email VARCHAR(50) NOT NULL,
  CONSTRAINT USER_PK PRIMARY KEY (User_ID),
  CONSTRAINT UserName_Unique UNIQUE (Username)
);

INSERT INTO Users VALUES (1, 'user_name', 'user', '123', 123, 'user@mail.com');
