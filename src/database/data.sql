insert into users (name, email, birthDate, pass) values ('Tynan Kohnen', 'tkohnen0@ycombinator.com', '2016-02-27', 'f1816fd50f9c029bf7f0b3fd99fe80170cb');
insert into users (name, email, birthDate, pass) values ('Jane Dymott', 'jdymott1@examiner.com', '2013-03-08', '1df9f0c195a54038c0437244c86f89ea752');
insert into users (name, email, birthDate, pass) values ('Axel Jerg', 'ajerg2@bloglovin.com', '2014-07-02', 'f0967d8a2b50d1cb31b22ac9b8959a9f003');
insert into users (name, email, birthDate, pass) values ('Leigha Gravet', 'lgravet3@dedecms.com', '2012-08-15', 'dea4b3c8182eeb9f4374411d22b70ac262c');
insert into users (name, email, birthDate, pass) values ('Aldis Loren', 'aloren4@mediafire.com', '2019-01-22', 'd4d88ee5cbd69740f84063d3609f2052be5');
insert into users (name, email, birthDate, pass) values ('Wake Martinovsky', 'wmartinovsky5@so-net.ne.jp', '2011-10-19', '9a54964ae2495fe6104cf4866710b9cda78');
insert into users (name, email, birthDate, pass) values ('Wood Lages', 'wlages6@constantcontact.com', '2018-05-30', 'db4fcfe8b060424f9beebc8ad3e7d6983cb');
insert into users (name, email, birthDate, pass) values ('Reginald Chiommienti', 'rchiommienti7@fc2.com', '2020-02-17', 'a93eb19e24c05cfc40f19e4969293cb877c');
insert into users (name, email, birthDate, pass) values ('Lynda Baskeyfield', 'lbaskeyfield8@google.ru', '2016-10-29', 'efaf41c528c8bae0a4230e6f8fce9510c09');
insert into users (name, email, birthDate, pass) values ('Mikey Tunnah', 'mtunnah9@japanpost.jp', '2019-02-25', '000526527c515b08fad2030897f7e4e7b60');
insert into users (name, email, birthDate, pass) values ('Lonni Enderson', 'lendersona@walmart.com', '2018-04-28', '7071ca563d5443dc392d3af354d94d5c4dd');
insert into users (name, email, birthDate, pass) values ('Michaeline Dake', 'mdakeb@yahoo.com', '2017-12-26', 'b6d16fd8f73bffdc99ee1f7488aa8fa506b');
insert into users (name, email, birthDate, pass) values ('Jaquenetta Trevethan', 'jtrevethanc@php.net', '2010-05-14', 'e87aeb4fb4b88b66638b784ffe1f38662cd');
insert into users (name, email, birthDate, pass) values ('Aurel Garnall', 'agarnalld@lycos.com', '2013-09-28', 'b6d16fd8f73bffdc99ee1f7488a48fa506b');
insert into users (name, email, birthDate, pass) values ('Carlyle Fevier', 'cfevierf@ucla.edu', '2015-03-19', '5069ee14c07061adeafc66bf55ca236830f');
insert into users (name, email, birthDate, pass) values ('Karlens Bambery', 'kbamberyg@aol.com', '2012-11-24', 'b6d16fd8f73bffdc99ee1f7488a48fa506b');
insert into users (name, email, birthDate, pass) values ('Dame Doget', 'ddogeth@apple.com', '2019-02-04', '7071ca563d5443dc392d3afea77fbdef4dd');
insert into users (name, email, birthDate, pass) values ('Conrade Hasser', 'chasseri@weibo.com', '2017-11-10', 'e87aeb4fb4b88b66638beb264e3f38662cd');
insert into users (name, email, birthDate, pass) values ('Ashli Flippini', 'aflippinij@state.gov', '2011-07-15', '7071ca563d5443dc392d3afea4d94d5c4dd');

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

insert into address (street, postalCode, userID, cityID, countryID) values ('Calypso', '1121-015', 1, 1, 1);
insert into address (street, postalCode, userID, cityID, countryID) values ('Mitchell', '4700-001', 2, 2, 2);
insert into address (street, postalCode, userID, cityID, countryID) values ('Kedzie', '0652-380', 3, 3, 3);
insert into address (street, postalCode, userID, cityID, countryID) values ('Summerview', '1547-201', 4, 4, 4);
insert into address (street, postalCode, userID, cityID, countryID) values ('Claremont', '9005-007', 5, 5, 5);
insert into address (street, postalCode, userID, cityID, countryID) values ('Orin', '2154-212', 6, 6, 6);
insert into address (street, postalCode, userID, cityID, countryID) values ('Hudson', '7390-094', 7, 7, 7);
insert into address (street, postalCode, userID, cityID, countryID) values ('Kingsford', '1212-521', 8, 8, 8);
insert into address (street, postalCode, userID, cityID, countryID) values ('Barnett', '2124-154', 9, 9, 9);
insert into address (street, postalCode, userID, cityID, countryID) values ('Rieder', '2414-544', 10, 10, 10);
insert into address (street, postalCode, userID, cityID, countryID) values ('Hudson', '0054-515', 11, 11, 11);
insert into address (street, postalCode, userID, cityID, countryID) values ('Springs', '1545-174', 12, 12, 12);
insert into address (street, postalCode, userID, cityID, countryID) values ('Ohio', '0221-512', 13, 13, 13);
insert into address (street, postalCode, userID, cityID, countryID) values ('Kedzie Ohio', '8680-825', 14, 13, 13);
insert into address (street, postalCode, userID, cityID, countryID) values ('Ohiozz', '5145-541', 15, 12, 12);
insert into address (street, postalCode, userID, cityID, countryID) values ('Beilfuss', '4640-210', 16, 10, 10);
insert into address (street, postalCode, userID, cityID, countryID) values ('Acker', '1241-524', 17, 9, 9);
insert into address (street, postalCode, userID, cityID, countryID) values ('Sundown', '2540-541', 18, 8, 8);
insert into address (street, postalCode, userID, cityID, countryID) values ('Dovetail', '5241-545', 19, 7, 7);

/* FAQ */

insert into faq (question, answer) values ('How do I track my order?', 'All orders despatched with DPD are now trackable. Tracking updates will be provided by our delivery partner, with the links to follow your parcel. If your tracking number begins with RML, unfortunately, we are unable to track these parcels at present. Most parcels will reach their destination within 2 weeks, however, some destinations may require additional time allowed for parcels to arrive. As most parcels will reach their destination within 2 weeks, we are unable to query your parcel before this time. If this time has passed and you have still not received your parcel please contact our Customer Care Team.');
insert into faq (question, answer) values ('How long will my order take to arrive?', 'Generally our international parcels will arrive within 7 working days. However if your parcels tracking ID begins with RML, we advise that you allow up to 2 weeks to account for any postal delays within your country. Please note that UK Bank Holidays, Saturday and Sunday are not classed as working days.');
insert into faq (question, answer) values ('What do I do if there is a problem with my delivery?', 'Please contact our Customer Care team who are here to help with any problems.');
insert into faq (question, answer) values ('What is your online security policy?', 'We want to make sure that you are safe and secure when you are shopping with us online. As part of our commitment to this, we perform random checks on orders and this means that you may need to prove your identity. Customers will be contacted by phone or email and will have up to 24 hours to provide us with the required information.');


/* image */

insert into image (description, path) values ('brand_apple', 'https://www.apple.com/ac/structured-data/images/knowledge_graph_logo.png?202003310625');
insert into image (description, path) values ('brand_samsung', 'https://i.pinimg.com/originals/cc/63/3a/cc633ad293fb08831b0d635cb77e5405.jpg');
insert into image (description, path) values ('brand_xiaomi', 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/29/Xiaomi_logo.svg/1024px-Xiaomi_logo.svg.png');
insert into image (description, path) values ('brand_huawei', 'https://marcas-logos.net/wp-content/uploads/2019/12/Huawei-Logo.png');
insert into image (description, path) values ('phone_a50', 'https://www.worten.pt/i/7ed675c4b5f427bd31b7c0338d6b393575850ea3.jpg');
insert into image (description, path) values ('phone_a70', 'https://www.worten.pt/i/225792738ee10f255a667c38220369404f2fd1c6.jpg');
insert into image (description, path) values ('phone_tabS6', 'https://www.worten.pt/i/01454bc1f70e682f316e1490d58b0e5667606001.jpg');
insert into image (description, path) values ('phone_tabS5e', 'https://www.worten.pt/i/0e2f94e471bf2dc00d15e8ec26d3d3520b1e3344.jpg');
insert into image (description, path) values ('phone_ipad_pro2020', 'https://www.worten.pt/i/131dd37085ad35e1707960b572c09fbf9c2e114b.jpg');
insert into image (description, path) values ('phone_mediapad_t3', 'https://www.worten.pt/i/122f58f4ac8ca8837ca723662e5f12569e2b5553.jpg');
insert into image (description, path) values ('phone_11pro_max', 'https://www.worten.pt/i/5ceb869e409a740db0af336db9d970cb34feecd8.jpg');
insert into image (description, path) values ('phone_iphone7', 'https://www.worten.pt/i/f34136b7f4928e2aa882b08642dd691379c5431a.jpg');
insert into image (description, path) values ('phone_s20', 'https://www.worten.pt/i/72106d6b151514e6c9450f779f3c8281991cc956.jpg');
insert into image (description, path) values ('phone_mi9', 'https://www.worten.pt/i/b8f3b72988c3800057dad75b2de69431aa9cbfdb.jpg');
insert into image (description, path) values ('phone_p40', 'https://www.worten.pt/i/09655e5625dde94b06dc7d3a226453c8f97c67ba.jpg');

/* brand */

insert into brand (name, imageID) values ('Apple', 1);
insert into brand (name, imageID) values ('Samsung', 2);
insert into brand (name, imageID) values ('Xiaomi', 3);
insert into brand (name, imageID) values ('Huawei', 4);

/* waterProofing */

insert into waterProofing (value) values ('IP68');
insert into waterProofing (value) values ('None');
insert into waterProofing (value) values ('IP67');
insert into waterProofing (value) values ('IP53');

/* os */

insert into os (name) values ('android');
insert into os (name) values ('ios');


/* gpu */

insert into gpu (name, vram) values ('Mali-G71 MP2', 2);
insert into gpu (name, vram) values ('Mali-G72 MP3', 1);
insert into gpu (name, vram) values ('Adreno 612', 2);
insert into gpu (name, vram) values ('Mali-450MP4', 1);
insert into gpu (name, vram) values ('Apple GPU', 8);
insert into gpu (name, vram) values ('Mali-G77 MP11', 6);

/* screenSize */ 

insert into screenSize (value) values (6.4);
insert into screenSize (value) values (6.3);
insert into screenSize (value) values (9);
insert into screenSize (value) values (4);
insert into screenSize (value) values (4.5);
insert into screenSize (value) values (6);
insert into screenSize (value) values (10.5);
insert into screenSize (value) values (12.9);
insert into screenSize (value) values (6.7);

/* weight */

insert into weight (value) values (160);
insert into weight (value) values (150);
insert into weight (value) values (250);
insert into weight (value) values (212);
insert into weight (value) values (120);
insert into weight (value) values (420);
insert into weight (value) values (400);
insert into weight (value) values (640);
insert into weight (value) values (225);
insert into weight (value) values (180);

/* storage  */

insert into storage (value) values (32);
insert into storage (value) values (16);
insert into storage (value) values (64);
insert into storage (value) values (128);
insert into storage (value) values (256);
insert into storage (value) values (512);

/* battery */

insert into battery (value) values (5000);
insert into battery (value) values (4000);
insert into battery (value) values (3500);
insert into battery (value) values (3000);
insert into battery (value) values (2700);
insert into battery (value) values (7000);
insert into battery (value) values (9700);
insert into battery (value) values (2000);
insert into battery (value) values (4500);
insert into battery (value) values (3800);


/* Screen Res */

insert into screenRes (value) values (1080);
insert into screenRes (value) values (720);
insert into screenRes (value) values (1600);
insert into screenRes (value) values (2048);
insert into screenRes (value) values (1242);

/* cameraRes */

insert into cameraRes (value) values (5);
insert into cameraRes (value) values (12);
insert into cameraRes (value) values (8);
insert into cameraRes (value) values (16);
insert into cameraRes (value) values (25);
insert into cameraRes (value) values (32);
insert into cameraRes (value) values (13);
insert into cameraRes (value) values (2);
insert into cameraRes (value) values (64);
insert into cameraRes (value) values (50);

/* fingerprintType */

insert into fingerprintType (value) values ('rear-mounted');
insert into fingerprintType (value) values ('side-mounted');
insert into fingerprintType (value) values ('in-display optical');
insert into fingerprintType (value) values ('in-display ultrasonic');
insert into fingerprintType (value) values ('none');
insert into fingerprintType (value) values ('front-mounted');


/* cpu */

insert into cpu (freq, cores, threads, name) values (14.2, 4, 8, 'Snapdragon');
insert into cpu (freq, cores, threads, name) values (16, 4, 8, 'Exynos');
insert into cpu (freq, cores, threads, name) values (12, 4, 8, 'Apple A12Z Bionic');
insert into cpu (freq, cores, threads, name) values (5.1, 2, 4, 'Mediatek MT8127');
insert into cpu (freq, cores, threads, name) values (13, 4, 6, 'Apple A13 Bionic');
insert into cpu (freq, cores, threads, name) values (10, 2, 4, 'Apple A10 Fusion');
insert into cpu (freq, cores, threads, name) values (15, 4, 8, 'HiSilicon Kirin');


/* ram */

insert into ram (value) values (12);
insert into ram (value) values (4);
insert into ram (value) values (6);
insert into ram (value) values (2);
insert into ram (value) values (1);
insert into ram (value) values (8);

/* product */

insert into product (stock, price, model, category, brandID, cpuID, ramID, waterProofingID, osID, gpuID, screenSizeID, weightID, storageID, batteryID, screenResID, cameraResID, fingerprintTypeID) values (67, 349.99, 'Galaxy A50', 'Phones',            2, 2, 2, 1, 1, 2, 1, 1, 4, 2, 1, 5, 3);
insert into product (stock, price, model, category, brandID, cpuID, ramID, waterProofingID, osID, gpuID, screenSizeID, weightID, storageID, batteryID, screenResID, cameraResID, fingerprintTypeID) values (24, 470.39, 'Galaxy A70', 'Phones',            2, 1, 3, 1, 1, 3, 2, 1, 4, 3, 1, 6, 1); 
insert into product (stock, price, model, category, brandID, cpuID, ramID, waterProofingID, osID, gpuID, screenSizeID, weightID, storageID, batteryID, screenResID, cameraResID, fingerprintTypeID) values (57, 749.99, 'Galaxy Tab S6', 'Tablets',        2, 1, 3, 2, 1, 3, 7, 6, 4, 6, 3, 7, 3); 
insert into product (stock, price, model, category, brandID, cpuID, ramID, waterProofingID, osID, gpuID, screenSizeID, weightID, storageID, batteryID, screenResID, cameraResID, fingerprintTypeID) values (46, 459.99, 'Galaxy Tab S5e', 'Tablets',       2, 1, 2, 2, 1, 3, 7, 7, 4, 6, 3, 7, 2); 
insert into product (stock, price, model, category, brandID, cpuID, ramID, waterProofingID, osID, gpuID, screenSizeID, weightID, storageID, batteryID, screenResID, cameraResID, fingerprintTypeID) values (14, 1129.00, 'iPad Pro 2020', 'Tablets',       1, 3, 3, 2, 2, 5, 8, 8, 4, 7, 4, 2, 5); 
insert into product (stock, price, model, category, brandID, cpuID, ramID, waterProofingID, osID, gpuID, screenSizeID, weightID, storageID, batteryID, screenResID, cameraResID, fingerprintTypeID) values (9, 199.99, 'MediaPad T3', 'Tablets',           4, 4, 5, 2, 1, 4, 3, 3, 2, 4, 2, 8, 5); 
insert into product (stock, price, model, category, brandID, cpuID, ramID, waterProofingID, osID, gpuID, screenSizeID, weightID, storageID, batteryID, screenResID, cameraResID, fingerprintTypeID) values (30, 1599.99, 'iPhone 11 Pro Max', 'Phones',    1, 5, 2, 1, 2, 5, 1, 9, 5, 2, 5, 2, 5); 
insert into product (stock, price, model, category, brandID, cpuID, ramID, waterProofingID, osID, gpuID, screenSizeID, weightID, storageID, batteryID, screenResID, cameraResID, fingerprintTypeID) values (5, 721, 'iPhone 7', 'Phones',                  1, 6, 4, 3, 2, 5, 5, 5, 1, 8, 2, 2, 6);   
insert into product (stock, price, model, category, brandID, cpuID, ramID, waterProofingID, osID, gpuID, screenSizeID, weightID, storageID, batteryID, screenResID, cameraResID, fingerprintTypeID) values (9, 1099, 'Galaxy S20+', 'Phones',              2, 1, 6, 1, 1, 6, 9, 10, 4, 9, 3, 9, 4);
insert into product (stock, price, model, category, brandID, cpuID, ramID, waterProofingID, osID, gpuID, screenSizeID, weightID, storageID, batteryID, screenResID, cameraResID, fingerprintTypeID) values (12, 569, 'Mi 9', 'Phones',                     3, 2, 3, 1, 1, 4, 6, 2, 4, 5, 1, 6, 1);
insert into product (stock, price, model, category, brandID, cpuID, ramID, waterProofingID, osID, gpuID, screenSizeID, weightID, storageID, batteryID, screenResID, cameraResID, fingerprintTypeID) values (10, 829.99, 'P40', 'Phones',                   4, 7, 3, 4, 1, 6, 6, 10, 4, 10, 3, 6, 3);

/* cart */

insert into cart (productID, userID, quant) values (1, 1, 1);
insert into cart (productID, userID, quant) values (2, 2, 2);
insert into cart (productID, userID, quant) values (3, 3, 3);
insert into cart (productID, userID, quant) values (4, 4, 4);
insert into cart (productID, userID, quant) values (5, 5, 3);
insert into cart (productID, userID, quant) values (6, 8, 1);
insert into cart (productID, userID, quant) values (7, 10, 1);
insert into cart (productID, userID, quant) values (8, 12, 3);

/* wishlist */

insert into wishlist (productID, userID) values (1, 1);
insert into wishlist (productID, userID) values (2, 2);
insert into wishlist (productID, userID) values (3, 3);
insert into wishlist (productID, userID) values (4, 4);
insert into wishlist (productID, userID) values (5, 5);
insert into wishlist (productID, userID) values (6, 11);
insert into wishlist (productID, userID) values (7, 12);
insert into wishlist (productID, userID) values (8, 10);
insert into wishlist (productID, userID) values (9, 9);

/* history */

insert into history (productID, userID, purchaseDate) values (1, 1, '2012-12-12');
insert into history (productID, userID, purchaseDate) values (2, 2, '2012-12-13');
insert into history (productID, userID, purchaseDate) values (3, 3, '2015-08-16');
insert into history (productID, userID, purchaseDate) values (4, 4, '2013-04-08');
insert into history (productID, userID, purchaseDate) values (5, 5, '2017-04-06');
insert into history (productID, userID, purchaseDate) values (6, 8, '2015-03-16');
insert into history (productID, userID, purchaseDate) values (7, 9, '2013-02-18');
insert into history (productID, userID, purchaseDate) values (8, 11, '2017-01-26');

/* purchase State */

insert into purchaseState (stateChangedate, "comment", pState) values ('2012-12-13', 'payment please!','Aguarda Pagamento');
insert into purchaseState (stateChangedate, "comment", pState) values ('2012-12-14', 'please wait, in process','Em Processamento');
insert into purchaseState (stateChangedate, "comment", pState) values ('2012-12-15', 'shipped with success','Enviada');
insert into purchaseState (stateChangedate, "comment", pState) values ('2017-07-16', 'payment please!','Aguarda Pagamento');
insert into purchaseState (stateChangedate, "comment", pState) values ('2018-05-17', 'please wait, in process','Em Processamento');
insert into purchaseState (stateChangedate, "comment", pState) values ('2016-02-18', 'shipped with success','Enviada');
insert into purchaseState (stateChangedate, "comment", pState) values ('2019-01-16', 'payment please!','Aguarda Pagamento');
insert into purchaseState (stateChangedate, "comment", pState) values ('2015-04-17', 'please wait, in process','Em Processamento');
insert into purchaseState (stateChangedate, "comment", pState) values ('2015-08-18', 'shipped with success','Enviada');

/* payment */

insert into payment (type) values ('Tranferencia Bancaria');
insert into payment (type) values ('Paypal');

/* purchase */

insert into purchase (val, statusID, paid, userID) values (1600.37, 1, 1, 1);
insert into purchase (val, statusID, paid, userID) values (1588.99, 2, 2, 2);/*
insert into purchase (val, statusID, paid, userID) values (1599.99, 3, 1, 3);
insert into purchase (val, statusID, paid, userID) values (599.97, 4, 1, 4);
insert into purchase (val, statusID, paid, userID) values (721, 5, 2, 5);
insert into purchase (val, statusID, paid, userID) values (1099, 6, 2, 6);
insert into purchase (val, statusID, paid, userID) values (829.99, 8, 1, 13); */

/* product_purchase */

insert into product_purchase (productID, purchaseID, quantity) values (1, 1, 1);
insert into product_purchase (productID, purchaseID, quantity) values (2, 1, 1);
insert into product_purchase (productID, purchaseID, quantity) values (3, 1, 1);
insert into product_purchase (productID, purchaseID, quantity) values (4, 2, 1);
insert into product_purchase (productID, purchaseID, quantity) values (5, 2, 1);/*
insert into product_purchase (productID, purchaseID, quantity) values (6, 4, 2);
insert into product_purchase (productID, purchaseID, quantity) values (7, 3, 1);
insert into product_purchase (productID, purchaseID, quantity) values (8, 5, 1);
insert into product_purchase (productID, purchaseID, quantity) values (9, 6, 1);
insert into product_purchase (productID, purchaseID, quantity) values (11, 7, 1); */

/* discount */

insert into discount (val, beginDate, endDate) values (0.10, '2021-04-29', '2021-05-12');
insert into discount (val, beginDate, endDate) values (0.20, '2021-04-17', '2021-05-02');
insert into discount (val, beginDate, endDate) values (0.30, '2021-05-10', '2021-05-26');
insert into discount (val, beginDate, endDate) values (0.40, '2021-06-14', '2021-06-18');
insert into discount (val, beginDate, endDate) values (0.50, '2021-07-04', '2021-07-16');

/* discount product */

insert into discount_product (productID, discountID) values (1, 1);
insert into discount_product (productID, discountID) values (2, 2);
insert into discount_product (productID, discountID) values (3, 3);
insert into discount_product (productID, discountID) values (4, 4);
insert into discount_product (productID, discountID) values (5, 5);
insert into discount_product (productID, discountID) values (6, 1);
insert into discount_product (productID, discountID) values (7, 1);
insert into discount_product (productID, discountID) values (8, 2);
insert into discount_product (productID, discountID) values (9, 1);


/* image_product */

insert into image_product (productID, imageID) values (1, 5);
insert into image_product (productID, imageID) values (2, 6);
insert into image_product (productID, imageID) values (3, 7);
insert into image_product (productID, imageID) values (4, 8);
insert into image_product (productID, imageID) values (5, 9);
insert into image_product (productID, imageID) values (6, 10);
insert into image_product (productID, imageID) values (7, 11);
insert into image_product (productID, imageID) values (8, 12);
insert into image_product (productID, imageID) values (9, 13);
insert into image_product (productID, imageID) values (10, 14);
insert into image_product (productID, imageID) values (11, 15);

/* rating */

insert into rating (id, userID, val) values ('1', '1', '1');
insert into rating (id, userID, val) values ('2', '1', '2');
insert into rating (id, userID, val) values ('3', '1', '3');
insert into rating (id, userID, val) values ('4', '2', '4');
insert into rating (id, userID, val) values ('5', '2', '5'); /*
insert into rating (id, userID, val) values ('6', '4', '4');
insert into rating (id, userID, val) values ('7', '3', '4');
insert into rating (id, userID, val) values ('8', '5', '4'); */

/* comments */

insert into "comment" ("content", productID) values ('ok!!!', 1);
insert into "comment" ("content", productID) values ('great!!', 2);
insert into "comment" ("content", productID) values ('good phone', 3);
insert into "comment" ("content", productID) values ('yess!! i love it', 4);
insert into "comment" ("content", productID) values ('bad quality!', 5);
insert into "comment" ("content", productID) values ('ok!!!', 6);
insert into "comment" ("content", productID) values ('great!!', 7);
insert into "comment" ("content", productID) values ('good phone', 8);
insert into "comment" ("content", productID) values ('yess!! i love it', 9);
insert into "comment" ("content", productID) values ('bad quality!', 10);
