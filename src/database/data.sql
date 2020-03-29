
/* users */

insert into users (name, email, birthDate, pass) values ('Tynan Kohnen', 'tkohnen0@ycombinator.com', '2016-02-27', 'f1816fd50f9c029bf7f0b3fae46de65f616fcfabb5d69b944d37d99fe80170cb');
insert into users (name, email, birthDate, pass) values ('Jane Dymott', 'jdymott1@examiner.com', '2013-03-08', '1df9f0c195a54038c0437244c86b766c0fa8fe2a42593add935a9ea1f89ea752');
insert into users (name, email, birthDate, pass) values ('Axel Jerg', 'ajerg2@bloglovin.com', '2014-07-02', 'f0967d8a2b50d1cb31b22ac9b8959a3ef3e922d4400e06d3c31f86d9ecc9f003');
insert into users (name, email, birthDate, pass) values ('Leigha Gravet', 'lgravet3@dedecms.com', '2012-08-15', 'dea4b3c8182eeb9f4374411d2255b405b3b69a3d855284bc2291d7eb70ac262c');
insert into users (name, email, birthDate, pass) values ('Aldis Loren', 'aloren4@mediafire.com', '2019-01-22', 'd4d88ee5cbd69740f84063d3609b7706752ff0ac3267c5d220a7ce94f2052be5');
insert into users (name, email, birthDate, pass) values ('Wake Martinovsky', 'wmartinovsky5@so-net.ne.jp', '2011-10-19', '9a54964ae2495fe61da57dfae08e12daf6cd4819d432f704cf4866710b9cda78');
insert into users (name, email, birthDate, pass) values ('Wood Lages', 'wlages6@constantcontact.com', '2018-05-30', 'db4fcfe8b060424f9beebc03242e157617579eda7eff549669d8ad3e7d6983cb');
insert into users (name, email, birthDate, pass) values ('Reginald Chiommienti', 'rchiommienti7@fc2.com', '2020-02-17', 'a93eb19e24c05cfc40d0ff4bfee706694d3f953a5aa7d93f19e4969293cb877c');
insert into users (name, email, birthDate, pass) values ('Lynda Baskeyfield', 'lbaskeyfield8@google.ru', '2016-10-29', 'efaf41c528c8bae0a42c03578e814569060fdecee20fd03630e6f8fce9510c09');
insert into users (name, email, birthDate, pass) values ('Mikey Tunnah', 'mtunnah9@japanpost.jp', '2019-02-25', '000526527c515b08fad2030897251a9f9fa2ca6e584f5e48617ec87f7e4e7b60');
insert into users (name, email, birthDate, pass) values ('Lonni Enderson', 'lendersona@walmart.com', '2018-04-28', '7071ca563d5443dc392d3afea77fbdefa5707dad1087295e5639354d94d5c4dd');
insert into users (name, email, birthDate, pass) values ('Michaeline Dake', 'mdakeb@yahoo.com', '2017-12-26', 'b6d16fd8f73bffdc99ee1f7488aacf765beb665604c26a9033da096348fa506b');
insert into users (name, email, birthDate, pass) values ('Jaquenetta Trevethan', 'jtrevethanc@php.net', '2010-05-14', 'e87aeb4fb4b88b66638beb264e3173068a819802cc6e92560784ffe1f38662cd');
insert into users (name, email, birthDate, pass) values ('Aurel Garnall', 'agarnalld@lycos.com', '2013-09-28', 'b6d16fd8f73bffdc99ee1f7488aacf765beb665604c26a9033da096348fa506b');
insert into users (name, email, birthDate, pass) values ('Carlyle Fevier', 'cfevierf@ucla.edu', '2015-03-19', '5069ee14c07061adeafc66bf55ca679c3098ece1be5ae2a67b8d429f1236830f');
insert into users (name, email, birthDate, pass) values ('Karlens Bambery', 'kbamberyg@aol.com', '2012-11-24', 'b6d16fd8f73bffdc99ee1f7488aacf765beb665604c26a9033da096348fa506b');
insert into users (name, email, birthDate, pass) values ('Dame Doget', 'ddogeth@apple.com', '2019-02-04', '7071ca563d5443dc392d3afea77fbdefa5707dad1087295e5639354d94d5c4dd');
insert into users (name, email, birthDate, pass) values ('Conrade Hasser', 'chasseri@weibo.com', '2017-11-10', 'e87aeb4fb4b88b66638beb264e3173068a819802cc6e92560784ffe1f38662cd');
insert into users (name, email, birthDate, pass) values ('Ashli Flippini', 'aflippinij@state.gov', '2011-07-15', '7071ca563d5443dc392d3afea77fbdefa5707dad1087295e5639354d94d5c4dd');

/* country */

insert into country (name) values ('Russia');
insert into country (name) values ('Brazil');
insert into country (name) values ('Indonesia');
insert into country (name) values ('Canada');
insert into country (name) values ('Japan');
insert into country (name) values ('France');
insert into country (name) values ('Nicaragua');
insert into country (name) values ('China');
insert into country (name) values ('Azerbaijan');
insert into country (name) values ('Czech Republic');
insert into country (name) values ('Sweden');
insert into country (name) values ('Ukraine');
insert into country (name) values ('South Korea');


/* city */

insert into city (name, countryID) values ('Moscow', 1);
insert into city (name, countryID) values ('Rio de Janeiro', 2);
insert into city (name, countryID) values ('Jacarta', 3);
insert into city (name, countryID) values ('Toronto', 4);
insert into city (name, countryID) values ('Kyoto', 5);
insert into city (name, countryID) values ('Nice', 6);
insert into city (name, countryID) values ('Managua', 7);
insert into city (name, countryID) values ('Beijing', 8);
insert into city (name, countryID) values ('Baku', 9);
insert into city (name, countryID) values ('Prague', 10);
insert into city (name, countryID) values ('Stockholm', 11);
insert into city (name, countryID) values ('Kiev', 12);
insert into city (name, countryID) values ('Seul', 13);


/* address */

insert into address (street, postalCode, userID, cityIDinteger, countryID) values ('Calypso', '1121-015', 1, 1, 1);
insert into address (street, postalCode, userID, cityIDinteger, countryID) values ('Mitchell', '4700-001', 2, 2, 2);
insert into address (street, postalCode, userID, cityIDinteger, countryID) values ('Kedzie', '0652-380', 3, 3, 3);
insert into address (street, postalCode, userID, cityIDinteger, countryID) values ('Summerview', '1547-201', 4, 4, 4);
insert into address (street, postalCode, userID, cityIDinteger, countryID) values ('Claremont', '9005-007', 5, 5, 5);
insert into address (street, postalCode, userID, cityIDinteger, countryID) values ('Orin', '2154-212', 6, 6, 6);
insert into address (street, postalCode, userID, cityIDinteger, countryID) values ('Hudson', '7390-094', 7, 7, 7);
insert into address (street, postalCode, userID, cityIDinteger, countryID) values ('Kingsford', '1212-521', 8, 8, 8);
insert into address (street, postalCode, userID, cityIDinteger, countryID) values ('Barnett', '2124-154', 9, 9, 9);
insert into address (street, postalCode, userID, cityIDinteger, countryID) values ('Rieder', '2414-544', 10, 10, 10);
insert into address (street, postalCode, userID, cityIDinteger, countryID) values ('Hudson', '0054-515', 11, 11, 11);
insert into address (street, postalCode, userID, cityIDinteger, countryID) values ('Springs', '1545-174', 12, 12, 12);
insert into address (street, postalCode, userID, cityIDinteger, countryID) values ('Ohio', '0221-512', 13, 13, 13);
insert into address (street, postalCode, userID, cityIDinteger, countryID) values ('Kedzie Ohio', '8680-825', 14, 14, 14);
insert into address (street, postalCode, userID, cityIDinteger, countryID) values ('Ohiozz', '5145-541', 15, 15, 15);
insert into address (street, postalCode, userID, cityIDinteger, countryID) values ('Beilfuss', '4640-210', 16, 16, 16);
insert into address (street, postalCode, userID, cityIDinteger, countryID) values ('Acker', '1241-524', 17, 17, 17);
insert into address (street, postalCode, userID, cityIDinteger, countryID) values ('Sundown', '2540-541', 18, 18, 18);
insert into address (street, postalCode, userID, cityIDinteger, countryID) values ('Dovetail', '5241-545', 19, 19, 19);
insert into address (street, postalCode, userID, cityIDinteger, countryID) values ('Blue Bill Park', '3002-060', 20, 20, 20);

/* FAQ */

insert into faq (question, answer) values ('How do I track my order?', 'All orders despatched with DPD are now trackable. Tracking updates will be provided by our delivery partner, with the links to follow your parcel. If your tracking number begins with RML, unfortunately, we are unable to track these parcels at present. Most parcels will reach their destination within 2 weeks, however, some destinations may require additional time allowed for parcels to arrive. As most parcels will reach their destination within 2 weeks, we are unable to query your parcel before this time. If this time has passed and you have still not received your parcel please contact our Customer Care Team.');
insert into faq (question, answer) values ('How long will my order take to arrive?', 'Generally our international parcels will arrive within 7 working days. However if your parcels tracking ID begins with RML, we advise that you allow up to 2 weeks to account for any postal delays within your country. Please note that UK Bank Holidays, Saturday and Sunday are not classed as working days.');
insert into faq (question, answer) values ('What do I do if there is a problem with my delivery?', 'Please contact our Customer Care team who are here to help with any problems.');
insert into faq (question, answer) values ('What is your online security policy?', 'We want to make sure that you are safe and secure when you are shopping with us online. As part of our commitment to this, we perform random checks on orders and this means that you may need to prove your identity. Customers will be contacted by phone or email and will have up to 24 hours to provide us with the required information.');


/* image */

insert into image (description, path) values ('brand_apple', 'https://dummyimage.com/1000x810.jpg/5fa2dd/ffffff');
insert into image (description, path) values ('brand_samsung', 'https://dummyimage.com/1000x810.jpg/5fa2dd/ffffff');
insert into image (description, path) values ('brand_xiaomi', 'https://dummyimage.com/1000x810.jpg/5fa2dd/ffffff');
insert into image (description, path) values ('phone_s20', 'https://dummyimage.com/1000x810.jpg/5fa2dd/ffffff');
insert into image (description, path) values ('phone_11pro', 'https://dummyimage.com/1000x810.jpg/5fa2dd/ffffff');


/* waterResRat */

insert into waterResRat (value) values ('500');
insert into waterResRat (value) values ('1000');
insert into waterResRat (value) values ('200');
insert into waterResRat (value) values ('100');
insert into waterResRat (value) values ('50');

/* os */

insert into os (name) values ('android');
insert into os (name) values ('ios');


/* gpu */

insert into gpu (name, vram) values ('Mali-G71 MP2', '2');
insert into gpu (name, vram) values ('Mali-G21 MP1', '1');
insert into gpu (name, vram) values ('Mali-G01 MP0', '8');

/* screenSize */ 

insert into screenSize (value) values ('5');
insert into screenSize (value) values ('9');
insert into screenSize (value) values ('4');
insert into screenSize (value) values ('4.5');
insert into screenSize (value) values ('6');

/* weight */

insert into weight (value) values ('200');
insert into weight (value) values ('150');
insert into weight (value) values ('256');
insert into weight (value) values ('212');
insert into weight (value) values ('120');

/* storage  */

insert into storage (value) values ('32');
insert into storage (value) values ('16');
insert into storage (value) values ('64');
insert into storage (value) values ('128');
insert into storage (value) values ('256');

/* battery */

insert into battery (value) values ('5000');
insert into battery (value) values ('4000');
insert into battery (value) values ('2900');
insert into battery (value) values ('3000');
insert into battery (value) values ('2700');

/* Screen Res */

insert into screenRes (value) values ('1080');
insert into screenRes (value) values ('720');
insert into screenRes (value) values ('4000');

/* cameraRes */

insert into cameraRes (value) values ('5');
insert into cameraRes (value) values ('12');
insert into cameraRes (value) values ('8');
insert into cameraRes (value) values ('16');
insert into cameraRes (value) values ('24');

/* fingerprintType */

insert into fingerprintType (value) values ('rear-mounted');
insert into fingerprintType (value) values ('??');
insert into fingerprintType (value) values ('???');


/* cpu */

insert into cpu (freq, cores, threads, name) values ('3.4', '8', '16', 'snapdragon');
insert into cpu (freq, cores, threads, name) values ('2.5', '4', '8', 'enxoys');
insert into cpu (freq, cores, threads, name) values ('5.52', '2', '4', 'trivi');
insert into cpu (freq, cores, threads, name) values ('5.1', '1', '2', 'Mi');


/* ram */

insert into ram (value) values ('12');
insert into ram (value) values ('4');
insert into ram (value) values ('2');
insert into ram (value) values ('1');
insert into ram (value) values ('8');


/* brand */

insert into brand (name, imageID) values ('Apple', 1);
insert into brand (name, imageID) values ('Samsung', 2);
insert into brand (name, imageID) values ('Xiaomi', 3);

/* product */

insert into product (stock, price, model, category, brandID, cpuID, ramID, waterResID, osID, gpuID, screenSizeID, weightID, storageID, batteryID, screenResID, cameraResID, fingerprintTypeID) values ('67', '622', 'A50', 'Phones', 2, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);
insert into product (stock, price, model, category, brandID, cpuID, ramID, waterResID, osID, gpuID, screenSizeID, weightID, storageID, batteryID, screenResID, cameraResID, fingerprintTypeID) values ('24', '410', 'A60', 'Phones', 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2);
insert into product (stock, price, model, category, brandID, cpuID, ramID, waterResID, osID, gpuID, screenSizeID, weightID, storageID, batteryID, screenResID, cameraResID, fingerprintTypeID) values ('57', '639', 'Tab S3', 'Tablets', 2, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3);
insert into product (stock, price, model, category, brandID, cpuID, ramID, waterResID, osID, gpuID, screenSizeID, weightID, storageID, batteryID, screenResID, cameraResID, fingerprintTypeID) values ('46', '759', 'Tab S4', 'Tablets', 2, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4);
insert into product (stock, price, model, category, brandID, cpuID, ramID, waterResID, osID, gpuID, screenSizeID, weightID, storageID, batteryID, screenResID, cameraResID, fingerprintTypeID) values ('7', '999', 'S20', 'Phones', 2, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5);
insert into product (stock, price, model, category, brandID, cpuID, ramID, waterResID, osID, gpuID, screenSizeID, weightID, storageID, batteryID, screenResID, cameraResID, fingerprintTypeID) values ('9', '659', '7 plus', 'Phones', 1, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6);
insert into product (stock, price, model, category, brandID, cpuID, ramID, waterResID, osID, gpuID, screenSizeID, weightID, storageID, batteryID, screenResID, cameraResID, fingerprintTypeID) values ('30', '1599', '11 pro max', 'Phones', 1, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7, 7);
insert into product (stock, price, model, category, brandID, cpuID, ramID, waterResID, osID, gpuID, screenSizeID, weightID, storageID, batteryID, screenResID, cameraResID, fingerprintTypeID) values ('6', '752', 'xs max', 'Phones', 1, 8, 8, 8, 8, 8, 8, 8, 8, 8, 8, 8, 8);
insert into product (stock, price, model, category, brandID, cpuID, ramID, waterResID, osID, gpuID, screenSizeID, weightID, storageID, batteryID, screenResID, cameraResID, fingerprintTypeID) values ('14', '699', 'pro 2018', 'Tablets', 1, 9, 9, 9, 9, 9, 9, 9, 9, 9, 9, 9, 9);
insert into product (stock, price, model, category, brandID, cpuID, ramID, waterResID, osID, gpuID, screenSizeID, weightID, storageID, batteryID, screenResID, cameraResID, fingerprintTypeID) values ('0', '779', '8 plus', 'Phones', 1, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10);
insert into product (stock, price, model, category, brandID, cpuID, ramID, waterResID, osID, gpuID, screenSizeID, weightID, storageID, batteryID, screenResID, cameraResID, fingerprintTypeID) values ('5', '721', '8', 'Phones', 1, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11, 11);
insert into product (stock, price, model, category, brandID, cpuID, ramID, waterResID, osID, gpuID, screenSizeID, weightID, storageID, batteryID, screenResID, cameraResID, fingerprintTypeID) values ('7', '744', 'S10', 'Phones', 2, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12);
insert into product (stock, price, model, category, brandID, cpuID, ramID, waterResID, osID, gpuID, screenSizeID, weightID, storageID, batteryID, screenResID, cameraResID, fingerprintTypeID) values ('9', '1199', 'S20+', 'Phones', 2, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13, 13);
insert into product (stock, price, model, category, brandID, cpuID, ramID, waterResID, osID, gpuID, screenSizeID, weightID, storageID, batteryID, screenResID, cameraResID, fingerprintTypeID) values ('5', '558', 'P20', 'Phones', 3, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14, 14);
insert into product (stock, price, model, category, brandID, cpuID, ramID, waterResID, osID, gpuID, screenSizeID, weightID, storageID, batteryID, screenResID, cameraResID, fingerprintTypeID) values ('50', '889', 'P30', 'Phones', 3, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15, 15);
insert into product (stock, price, model, category, brandID, cpuID, ramID, waterResID, osID, gpuID, screenSizeID, weightID, storageID, batteryID, screenResID, cameraResID, fingerprintTypeID) values ('1', '1207', '11 pro', 'Phones', 1, 16, 16, 16, 16, 16, 16, 16, 16, 16, 16, 16, 16);
insert into product (stock, price, model, category, brandID, cpuID, ramID, waterResID, osID, gpuID, screenSizeID, weightID, storageID, batteryID, screenResID, cameraResID, fingerprintTypeID) values ('12', '584', 'Mi 9', 'Phones', 3, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17, 17);
insert into product (stock, price, model, category, brandID, cpuID, ramID, waterResID, osID, gpuID, screenSizeID, weightID, storageID, batteryID, screenResID, cameraResID, fingerprintTypeID) values ('9', '109', 'P smart 2019', 'Phones', 3, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18);
insert into product (stock, price, model, category, brandID, cpuID, ramID, waterResID, osID, gpuID, screenSizeID, weightID, storageID, batteryID, screenResID, cameraResID, fingerprintTypeID) values ('83', '980', 'Mi Note 10', 'Phones', 3, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19, 19);
insert into product (stock, price, model, category, brandID, cpuID, ramID, waterResID, osID, gpuID, screenSizeID, weightID, storageID, batteryID, screenResID, cameraResID, fingerprintTypeID) values ('31', '99', 'Redmi 7A', 'Phones', 3, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20, 20);

/* eval */

insert into eval (id, userID, val) values ('1', '2', '5');
insert into eval (id, userID, val) values ('2', '1', '3');
insert into eval (id, userID, val) values ('3', '3', '4');
insert into eval (id, userID, val) values ('4', '4', '1');
insert into eval (id, userID, val) values ('5', '5', '2');

/* comments */

insert into coment ("content", productID) values ('ok!!!', 1);
insert into coment ("content", productID) values ('great!!', 2);
insert into coment ("content", productID) values ('good phone', 3);
insert into coment ("content", productID) values ('yess!! i love it', 4);
insert into coment ("content", productID) values ('bad quality!', 5);

/* cart */

insert into cart (productID, userID, quant) values (1, 1, 1);
insert into cart (productID, userID, quant) values (2, 2, 2);
insert into cart (productID, userID, quant) values (3, 3, 3);
insert into cart (productID, userID, quant) values (4, 4, 4);
insert into cart (productID, userID, quant) values (5, 5, 5);

/* wishlist */

insert into wishlist (productID, userID) values (1, 1);
insert into wishlist (productID, userID) values (2, 2);
insert into wishlist (productID, userID) values (3, 3);
insert into wishlist (productID, userID) values (4, 4);
insert into wishlist (productID, userID) values (5, 5);

/* history */

insert into history (productID, userID, purchaseDate) values (1, 1, '2012-12-12');
insert into history (productID, userID, purchaseDate) values (2, 2, '2012-12-13');
insert into history (productID, userID, purchaseDate) values (3, 3, '2015-08-16');
insert into history (productID, userID, purchaseDate) values (4, 4, '2013-04-08');
insert into history (productID, userID, purchaseDate) values (5, 5, '2017-04-06');
