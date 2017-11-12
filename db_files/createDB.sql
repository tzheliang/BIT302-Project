CREATE TABLE Users(
  userID INT(5) UNIQUE NOT NULL AUTO_INCREMENT,
  username VARCHAR(20) NOT NULL,
  password VARCHAR(30) NOT NULL,
  firstName VARCHAR(20) NOT NULL,
  lastName VARCHAR(20) NOT NULL,
  email VARCHAR(30) NOT NULL,
  contactNumber VARCHAR(15) NOT NULL,
  address VARCHAR(30),
  isCustomer int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY(userID)
);

CREATE TABLE Restaurant(
  restaurantID INT(5) UNIQUE NOT NULL AUTO_INCREMENT,
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
  foodID INT(5) UNIQUE NOT NULL AUTO_INCREMENT,
  timestamp TIMESTAMP NOT NULL,
  foodName VARCHAR(30) NOT NULL,
  price DECIMAL(6, 2) NOT NULL,
  status VARCHAR(20) NOT NULL,
  image VARCHAR(100) NOT NULL,
  avgRating INT(1) NOT NULL,
  restaurantID INT(5),
  PRIMARY KEY(foodID),
  FOREIGN KEY(restaurantID) REFERENCES Restaurant(restaurantID)
);

CREATE TABLE FoodOrder(
  orderID INT(5) UNIQUE NOT NULL AUTO_INCREMENT,
  timestamp TIMESTAMP NOT NULL,
  deliveryStatus VARCHAR(20) NOT NULL,
  totalPrice DECIMAL(6, 2) NOT NULL,
  customerID INT(5) NOT NULL,
  ownerID INT(5) NOT NULL,
  PRIMARY KEY(orderID),
  FOREIGN KEY(customerID) REFERENCES Users(userID),
  FOREIGN KEY(ownerID) REFERENCES Users(userID)
);

CREATE TABLE OrderItem(
  orderID INT(5) NOT NULL,
  foodID INT(5) NOT NULL,
  quantity int(3),
  PRIMARY KEY(orderID, foodID),
  FOREIGN KEY(orderID) REFERENCES FoodOrder(orderID),
  FOREIGN KEY(foodID) REFERENCES MenuItem(foodID)
);

CREATE TABLE Feedback(
  feedbackID INT(5) UNIQUE NOT NULL AUTO_INCREMENT,
  timestamp TIMESTAMP NOT NULL,
  comments VARCHAR(400) NOT NULL,
  orderID INT(5),
  PRIMARY KEY(feedbackID),
  FOREIGN KEY(orderID) REFERENCES FoodOrder(orderID)
);

CREATE TABLE Rating(
  ratingID INT(5) UNIQUE NOT NULL AUTO_INCREMENT,
  ratingValue INT(1) NOT NULL,
  feedbackID INT(5) NOT NULL,
  foodID INT(5) NOT NULL,
  PRIMARY KEY(ratingID),
  FOREIGN KEY(feedbackID) REFERENCES Feedback(feedbackID),
  FOREIGN KEY(foodID) REFERENCES MenuItem(foodID)
);
