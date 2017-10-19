INSERT
INTO
  `users`(
    `userID`,
    `username`,
    `PASSWORD`,
    `firstName`,
    `lastName`,
    `email`,
    `address`
  )
VALUES(
  'U0001',
  'pizzahut',
  'pizza',
  'pizza',
  'hut',
  'pizzahutmy@mail.com',
  NULL
);

INSERT
INTO
  `users`(
    `userID`,
    `username`,
    `PASSWORD`,
    `firstName`,
    `lastName`,
    `email`,
    `address`
  )
VALUES(
  'U0002',
  'subway',
  'subway',
  'sub',
  'way',
  'subway@mail.com',
  NULL
);

INSERT
INTO
  `users`(
    `userID`,
    `username`,
    `PASSWORD`,
    `firstName`,
    `lastName`,
    `email`,
    `address`
  )
VALUES(
  'U0003',
  'barista',
  'barista',
  'bar',
  'ista',
  'barista@mail.com',
  NULL
);

INSERT
INTO
  `users`(
    `userID`,
    `username`,
    `PASSWORD`,
    `firstName`,
    `lastName`,
    `email`,
    `address`
  )
VALUES(
  'U0004',
  'papajohns',
  'papajohns',
  'Papa',
  'Johns',
  'papajohns@mail.com',
  NULL
);

INSERT
INTO
  `users`(
    `userID`,
    `username`,
    `PASSWORD`,
    `firstName`,
    `lastName`,
    `email`,
    `address`
  )
VALUES(
  'U0005',
  'dominos',
  'dominos',
  'Dominos',
  'Pizza',
  'dominos@mail.com',
  NULL
);

INSERT
INTO
  `users`(
    `userID`,
    `username`,
    `PASSWORD`,
    `firstName`,
    `lastName`,
    `email`,
    `address`
  )
VALUES(
  'U0006',
  'kfc',
  'kfc',
  'Kentucky',
  'Fried Chicken',
  'kfc@mail.com',
  NULL
);

INSERT
INTO
  `restaurant`(
    `restaurantID`,
    `restaurantName`,
    `location`,
    `phoneNumber`,
    `email`,
    `image`,
    `ownerID`
  )
VALUES(
  'R0001',
  'Pizza Hut',
  'SS15',
  '1-300-88-2525',
  'pizzahutmy@mail.com',
  './images/pizza_hut/main-logo.jpg',
  'U0001'
);

INSERT
INTO
  `restaurant`(
    `restaurantID`,
    `restaurantName`,
    `location`,
    `phoneNumber`,
    `email`,
    `image`,
    `ownerID`
  )
VALUES(
  'R0002',
  'Subway',
  'SS2',
  '03-9922-6655',
  'subway@mail.com',
  './images/subway/main-logo.jpg',
  'U0002'
);

INSERT
INTO
  `restaurant`(
    `restaurantID`,
    `restaurantName`,
    `location`,
    `phoneNumber`,
    `email`,
    `image`,
    `ownerID`
  )
VALUES(
  'R0003',
  'Barista',
  'Bangsar',
  '03-9911-3155',
  'barista@mail.com',
  './images/barista/main-logo.jpg',
  'U0003'
);

INSERT
INTO
  `restaurant`(
    `restaurantID`,
    `restaurantName`,
    `location`,
    `phoneNumber`,
    `email`,
    `image`,
    `ownerID`
  )
VALUES(
  'R0004',
  'Papa John\'s',
  'Setapak',
  '03-2322-1355',
  'papajohns@mail.com',
  './images/papa_johns/main-logo.jpg',
  'U0004'
);

INSERT
INTO
  `restaurant`(
    `restaurantID`,
    `restaurantName`,
    `location`,
    `phoneNumber`,
    `email`,
    `image`,
    `ownerID`
  )
VALUES(
  'R0005',
  'Domino\'s Pizza',
  'Section 14',
  '03-3232-1245',
  'dominos@mail.com',
  './images/dominos/main-logo.jpg',
  'U0005'
);

INSERT
INTO
  `restaurant`(
    `restaurantID`,
    `restaurantName`,
    `location`,
    `phoneNumber`,
    `email`,
    `image`,
    `ownerID`
  )
VALUES(
  'R0006',
  'KFC',
  'Sunway Pyramid',
  '03-4585-2366',
  'kfc@mail.com',
  './images/kfc/main-logo.jpg',
  'U0006'
);

INSERT INTO menuitem (foodID, foodName, price, status, image, avgRating, restaurantID)
VALUES ("F0001", "Pepperoni Pizza", "9.99", "Available", "./images/pizza_hut/pepperoni-pizza.png", 0, "R0001");
INSERT INTO menuitem (foodID, foodName, price, status, image, avgRating, restaurantID)
VALUES ("F0002", "Supreme Pizza", "15.99", "Available", "./images/pizza_hut/supreme-pizza.png", 0, "R0001");
INSERT INTO menuitem (foodID, foodName, price, status, image, avgRating, restaurantID)
VALUES ("F0003", "Primo Meat Pizza", "15.99", "Available", "./images/pizza_hut/primo-meat-pizza.png", 0, "R0001");
INSERT INTO menuitem (foodID, foodName, price, status, image, avgRating, restaurantID)
VALUES ("F0004", "Cheese Pizza", "9.99", "Available", "./images/pizza_hut/cheese-pizza.png", 0, "R0001");
INSERT INTO menuitem (foodID, foodName, price, status, image, avgRating, restaurantID)
VALUES ("F0005", "Meat Lover Pizza", "15.99", "Available", "./images/pizza_hut/meat-lover-pizza.png", 0, "R0001");
INSERT INTO menuitem (foodID, foodName, price, status, image, avgRating, restaurantID)
VALUES ("F0006", "Bacon Spinach Alfredo Pizza", "15.99", "Available", "./images/pizza_hut/bacon-spinach-alfredo-pizza.png", 0, "R0001");
