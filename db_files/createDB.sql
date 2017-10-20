CREATE TABLE Users(
  userID INT(5) UNIQUE NOT NULL AUTO_INCREMENT,
  username VARCHAR(20) NOT NULL,
  password VARCHAR(30) NOT NULL,
  firstName VARCHAR(20) NOT NULL,
  lastName VARCHAR(20) NOT NULL,
  email VARCHAR(30) NOT NULL,
  contactNumber VARCHAR(15) NOT NULL,
  address VARCHAR(30),
  PRIMARY KEY(userID)
);

CREATE TABLE Restaurant(
  restaurantID CHAR(5) UNIQUE NOT NULL,
  restaurantName VARCHAR(30) NOT NULL,
  location VARCHAR(20) NOT NULL,
  phoneNumber VARCHAR(15) NOT NULL,
  email VARCHAR(30) NOT NULL,
  image VARCHAR(100) NOT NULL,
  ownerID INT(5),
  PRIMARY KEY(restaurantID),
  FOREIGN KEY(ownerID) REFERENCES Users(userID)
);

CREATE TABLE MenuItem(
  foodID CHAR(5) UNIQUE NOT NULL,
  foodName VARCHAR(30) NOT NULL,
  price DECIMAL(6, 2) NOT NULL,
  status VARCHAR(20) NOT NULL,
  image VARCHAR(100) NOT NULL,
  avgRating INT(1) NOT NULL,
  restaurantID CHAR(5),
  PRIMARY KEY(foodID),
  FOREIGN KEY(restaurantID) REFERENCES Restaurant(restaurantID)
);

CREATE TABLE FoodOrder(
  orderID CHAR(5) UNIQUE NOT NULL,
  TIMESTAMP TIMESTAMP NOT NULL,
  deliveryStatus VARCHAR(20) NOT NULL,
  totalPrice DECIMAL(6, 2) NOT NULL,
  customerID INT(5) NOT NULL,
  ownerID INT(5) NOT NULL,
  PRIMARY KEY(orderID),
  FOREIGN KEY(customerID) REFERENCES Users(userID),
  FOREIGN KEY(ownerID) REFERENCES Users(userID)
);

CREATE TABLE OrderItem(
  orderID CHAR(5) NOT NULL,
  foodID CHAR(5) NOT NULL,
  PRIMARY KEY(orderID, foodID),
  FOREIGN KEY(orderID) REFERENCES FoodOrder(orderID),
  FOREIGN KEY(foodID) REFERENCES MenuItem(foodID)
);

CREATE TABLE Feedback(
  feedBackID CHAR(5) UNIQUE NOT NULL,
  TIMESTAMP TIMESTAMP NOT NULL,
  comments VARCHAR(400) NOT NULL,
  orderID CHAR(5),
  PRIMARY KEY(feedbackID),
  FOREIGN KEY(orderID) REFERENCES FoodOrder(orderID)
);

CREATE TABLE Rating(
  ratingID CHAR(5) UNIQUE NOT NULL,
  ratingValue INT(1) NOT NULL,
  feedbackID CHAR(5) NOT NULL,
  foodID CHAR(5) NOT NULL,
  FOREIGN KEY(feedbackID) REFERENCES Feedback(feedbackID),
  FOREIGN KEY(foodID) REFERENCES MenuItem(foodID)
);
