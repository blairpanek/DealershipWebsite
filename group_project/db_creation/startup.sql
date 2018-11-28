DROP TABLE Users CASCADE CONSTRAINTS;
DROP TABLE Dealerships CASCADE CONSTRAINTS;
DROP TABLE Vehicles CASCADE CONSTRAINTS;
DROP TABLE DealershipUsers CASCADE CONSTRAINTS;
DROP TABLE UserVehicleWatchlist CASCADE CONSTRAINTS;

Create Table Users (
  Name VARCHAR(50) NOT NULL,
  UserName VARCHAR(50) NOT NULL,
  Password VARCHAR(50) NOT NULL,
  PhoneNumber int NOT NULL,
  Email VARCHAR(50) NOT NULL,
  PRIMARY KEY (UserName)
);

Create Table Dealerships (
  Dealership_ID int NOT NULL,
  Name VARCHAR(50) NOT NULL,
  Location VARCHAR(50) NOT NULL,
  PRIMARY KEY (Dealership_ID)
);

Create Table Vehicles (
  Vehicle_ID int NOT NULL,
  Dealership_ID int NOT NULL,
  Color VARCHAR(50) NOT NULL,
  Model VARCHAR(50) NOT NULL,
  Year VARCHAR(50) NOT NULL,
  Mileage VARCHAR(50) NOT NULL,
  Price int NOT NULL,
  PRIMARY KEY (Vehicle_ID),
  FOREIGN KEY (Dealership_ID) REFERENCES Dealerships(Dealership_ID)
);

Create Table DealershipUsers (
  DealershipUsers_ID int NOT NULL,
  Dealership_ID int NOT NULL,
  Name VARCHAR(50) NOT NULL,
  Address VARCHAR(50) NOT NULL,
  PhoneNumber VARCHAR(50) NOT NULL,
  Username VARCHAR(50) NOT NULL,
  Password VARCHAR(50) NOT NULL,
  Email VARCHAR(50) NOT NULL,
  PRIMARY KEY (DealershipUsers_ID),
  FOREIGN KEY (Dealership_ID) REFERENCES Dealerships(Dealership_ID)
);

Create Table UserVehicleWatchlist (
  UserVehicleWatchlist_ID VARCHAR(50) NOT NULL,
  Vehicle_ID int NOT NULL,
  UserName VARCHAR(50) NOT NULL,
  Dealership_ID int NOT NULL,
  PRIMARY KEY (UserVehicleWatchlist_ID),
  FOREIGN KEY (Vehicle_ID)
    REFERENCES Vehicles(Vehicle_ID),
  FOREIGN KEY (UserName)
    REFERENCES Users(UserName),
  FOREIGN KEY (Dealership_ID)
    REFERENCES Dealerships(Dealership_ID)
);

INSERT INTO Users VALUES ('user', 'user', '123', 123, 'user@mail.com');
INSERT INTO Dealerships VALUES (1, 'Dealer X', 'Fargo, ND');
INSERT INTO Dealerships VALUES (2, 'Dealer Y', 'Fargo, ND');
INSERT INTO Dealerships VALUES (3, 'Dealer Z', 'Fargo, ND');
INSERT INTO Vehicles VALUES (1, 1, 'Blue', 'Ford Eclipse', '2017', '120000', 1500);
INSERT INTO UserVehicleWatchlist VALUES ( '1user1' , 1 , 'user' , 1 );
