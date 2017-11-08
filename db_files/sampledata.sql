INSERT
INTO
  `users`(
    `username`,
    `PASSWORD`,
    `firstName`,
    `lastName`,
    `email`,
    `contactNumber`,
    `isCustomer`
  )
VALUES(
  'pizzahut',
  'pizza',
  'Richard',
  'Tan',
  'pizzahutmy@mail.com',
  '012-5201314',
  0
);

INSERT
INTO
  `users`(
    `username`,
    `PASSWORD`,
    `firstName`,
    `lastName`,
    `email`,
    `contactNumber`,
    `isCustomer`
  )
VALUES(
  'subway',
  'subway',
  'Ronald',
  'Johnson',
  'subway@mail.com',
  '012-3456789',
  0
);

INSERT
INTO
  `users`(
    `username`,
    `PASSWORD`,
    `firstName`,
    `lastName`,
    `email`,
    `contactNumber`,
    `isCustomer`
  )
VALUES(
  'barista',
  'barista',
  'bar',
  'ista',
  'barista@mail.com',
  '019-9999999',
  0
);

INSERT
INTO
  `users`(
    `username`,
    `PASSWORD`,
    `firstName`,
    `lastName`,
    `email`,
    `contactNumber`,
    `isCustomer`
  )
VALUES(
  'papajohns',
  'papajohns',
  'Cory',
  'Maxson',
  'papajohns@mail.com',
  '013-5791113',
  0
);

INSERT
INTO
  `users`(
    `username`,
    `PASSWORD`,
    `firstName`,
    `lastName`,
    `email`,
    `contactNumber`,
    `isCustomer`
  )
VALUES(
  'dominos',
  'dominos',
  'Robert',
  'Baratheon',
  'dominos@mail.com',
  '012-4681012',
  0
);

INSERT
INTO
  `users`(
    `username`,
    `PASSWORD`,
    `firstName`,
    `lastName`,
    `email`,
    `contactNumber`,
    `isCustomer`
  )
VALUES(
  'kfc',
  'kfc',
  'Eddard',
  'Stark',
  'kfc@mail.com',
  '011-1111111',
  0
);

INSERT
INTO
  `restaurant`(

    `restaurantName`,
    `location`,
    `phoneNumber`,
    `email`,
    `image`,
    `ownerID`
  )
VALUES(

  'Pizza Hut',
  'SS15',
  '1-300-88-2525',
  'pizzahutmy@mail.com',
  './images/pizza_hut/main-logo.jpg',
  1
);

INSERT
INTO
  `restaurant`(

    `restaurantName`,
    `location`,
    `phoneNumber`,
    `email`,
    `image`,
    `ownerID`
  )
VALUES(

  'Subway',
  'SS2',
  '03-9922-6655',
  'subway@mail.com',
  './images/subway/main-logo.jpg',
  2
);

INSERT
INTO
  `restaurant`(

    `restaurantName`,
    `location`,
    `phoneNumber`,
    `email`,
    `image`,
    `ownerID`
  )
VALUES(

  'Barista',
  'Bangsar',
  '03-9911-3155',
  'barista@mail.com',
  './images/barista/main-logo.jpg',
  3
);

INSERT
INTO
  `restaurant`(

    `restaurantName`,
    `location`,
    `phoneNumber`,
    `email`,
    `image`,
    `ownerID`
  )
VALUES(

  'Papa John\'s',
  'Setapak',
  '03-2322-1355',
  'papajohns@mail.com',
  './images/papa_johns/main-logo.jpg',
  4
);

INSERT
INTO
  `restaurant`(

    `restaurantName`,
    `location`,
    `phoneNumber`,
    `email`,
    `image`,
    `ownerID`
  )
VALUES(

  'Domino\'s Pizza',
  'Section 14',
  '03-3232-1245',
  'dominos@mail.com',
  './images/dominos/main-logo.jpg',
  5
);

INSERT
INTO
  `restaurant`(

    `restaurantName`,
    `location`,
    `phoneNumber`,
    `email`,
    `image`,
    `ownerID`
  )
VALUES(

  'KFC',
  'Sunway Pyramid',
  '03-4585-2366',
  'kfc@mail.com',
  './images/kfc/main-logo.jpg',
  6
);

INSERT INTO menuitem (foodName, price, status, image, avgRating, restaurantID)
VALUES ("Pepperoni Pizza", "9.99", "Available", "./images/pizza_hut/pepperoni-pizza.png", 0, 1);
INSERT INTO menuitem (foodName, price, status, image, avgRating, restaurantID)
VALUES ("Supreme Pizza", "15.99", "Available", "./images/pizza_hut/supreme-pizza.png", 0, 1);
INSERT INTO menuitem (foodName, price, status, image, avgRating, restaurantID)
VALUES ("Primo Meat Pizza", "15.99", "Available", "./images/pizza_hut/primo-meat-pizza.png", 0, 1);
INSERT INTO menuitem (foodName, price, status, image, avgRating, restaurantID)
VALUES ("Cheese Pizza", "9.99", "Available", "./images/pizza_hut/cheese-pizza.png", 0, 1);
INSERT INTO menuitem (foodName, price, status, image, avgRating, restaurantID)
VALUES ("Meat Lover Pizza", "15.99", "Available", "./images/pizza_hut/meat-lover-pizza.png", 0, 1);
INSERT INTO menuitem (foodName, price, status, image, avgRating, restaurantID)
VALUES ("Bacon Spinach Alfredo Pizza", "15.99", "Available", "./images/pizza_hut/bacon-spinach-alfredo-pizza.png", 0, 1);

/* This part no need already ah
UPDATE `Users` SET `address` = 'SS15' WHERE `Users`.`userID` = 1
UPDATE `Users` SET `address` = 'SS2' WHERE `Users`.`userID` = 2
UPDATE `Users` SET `address` = 'Bangsar' WHERE `Users`.`userID` = 3
UPDATE `Users` SET `address` = 'Setapak' WHERE `Users`.`userID` = 4
UPDATE `Users` SET `address` = 'Section 14' WHERE `Users`.`userID` = 5
UPDATE `Users` SET `address` = 'Sunway Pyramid' WHERE `Users`.`userID` = 6
*/
