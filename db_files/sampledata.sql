INSERT
INTO
  `users`(
    `username`,
    `PASSWORD`,
    `firstName`,
    `lastName`,
    `email`,
    `contactNumber`
  )
VALUES(
  'pizzahut',
  'pizza',
  'pizza',
  'hut',
  'pizzahutmy@mail.com',
  '012-5201314'
);

INSERT
INTO
  `users`(
    `username`,
    `PASSWORD`,
    `firstName`,
    `lastName`,
    `email`,
    `contactNumber`
  )
VALUES(
  'subway',
  'subway',
  'sub',
  'way',
  'subway@mail.com',
  '012-3456789'
);

INSERT
INTO
  `users`(
    `username`,
    `PASSWORD`,
    `firstName`,
    `lastName`,
    `email`,
    `contactNumber`
  )
VALUES(
  'barista',
  'barista',
  'bar',
  'ista',
  'barista@mail.com',
  '019-9999999'
);

INSERT
INTO
  `users`(
    `username`,
    `PASSWORD`,
    `firstName`,
    `lastName`,
    `email`,
    `contactNumber`
  )
VALUES(
  'papajohns',
  'papajohns',
  'Papa',
  'Johns',
  'papajohns@mail.com',
  '013-5791113'
);

INSERT
INTO
  `users`(
    `username`,
    `PASSWORD`,
    `firstName`,
    `lastName`,
    `email`,
    `contactNumber`
  )
VALUES(
  'dominos',
  'dominos',
  'Dominos',
  'Pizza',
  'dominos@mail.com',
  '012-4681012'
);

INSERT
INTO
  `users`(
    `username`,
    `PASSWORD`,
    `firstName`,
    `lastName`,
    `email`,
    `contactNumber`
  )
VALUES(
  'kfc',
  'kfc',
  'Kentucky',
  'Fried Chicken',
  'kfc@mail.com',
  '011-1111111'
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
