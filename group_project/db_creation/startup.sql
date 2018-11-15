DROP TABLE Users;
DROP TABLE Vehicles;
DROP TABLE Dealerships;
DROP TABLE DealershipUsers;
DROP TABLE DealershipVehicleConnection;
DROP TABLE UserPayments;

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

Create Table Vehicles (
  Vehicle_ID int NOT NULL,
  Color VARCHAR(50) NOT NULL,
  Model VARCHAR(50) NOT NULL,
  Year VARCHAR(50) NOT NULL,
  Mileage VARCHAR(50) NOT NULL,

  CONSTRAINT Vehicle_PK PRIMARY KEY (Vehicle_ID)
);

Create Table Dealerships (
  Dealership_ID int NOT NULL,

  Name VARCHAR(50) NOT NULL,
  Location VARCHAR(50) NOT NULL,

  CONSTRAINT Dealership_PK PRIMARY KEY (Dealership_ID)
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

  CONSTRAINT DealershipUsers_PK PRIMARY KEY (DealershipUsers_ID),

  CONSTRAINT Dealership_FK
    FOREIGN KEY (Dealership_ID)
    REFERENCES Dealerships(Dealership_ID)
);

Create Table DealershipVehicleConnection (
  DealershipVehicleConnection_ID int NOT NULL,
  Dealership_ID int NOT NULL,
  Vehicle_ID int NOT NULL,

  Price VARCHAR(7) NOT NULL,

  CONSTRAINT DealershipVehicleConnection_PK PRIMARY KEY (DealershipVehicleConnection_ID),

  CONSTRAINT Dealership_FK
    FOREIGN KEY (Dealership_ID)
    REFERENCES Dealership_PK(Dealership_ID),

  CONSTRAINT Vehicle_FK
    FOREIGN KEY (Vehicle_ID)
    REFERENCES Vehicles(Vehicle_ID)
);

Create Table UserPayments (
  UserPayments_ID int NOT NULL,
  Vehicle_ID int NOT NULL,
  User_ID int NOT NULL,
  Dealership_ID int NOT NULL,

  CONSTRAINT UserPayments_PK PRIMARY KEY (UserPayments_ID),

  CONSTRAINT Vehicle_FK
    FOREIGN KEY (Vehicle_ID)
    REFERENCES Vehicles(Vehicle_ID),

  CONSTRAINT USER_FK
    FOREIGN KEY (User_ID)
    REFERENCES Users(User_ID),

  CONSTRAINT Dealership_FK
    FOREIGN KEY (Dealership_ID) REFERENCES
    Dealerships(Dealership_ID)
);

INSERT INTO Users VALUES (1, 'user_name', 'user', '123', 123, 'user@mail.com');
