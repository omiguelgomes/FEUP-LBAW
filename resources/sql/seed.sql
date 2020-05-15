--cleaning database
DROP SCHEMA public CASCADE;
CREATE SCHEMA public;

-------------------------------------------------------------------
--domain and type definition
-------------------------------------------------------------------
create domain TODAY as date not null default ('now'::text)::date;
create type category_type as enum ('Phones', 'Tablets');
create type purchase_state as enum ('Awaiting Payment', 'Payment in-store', 'Processing', 'Sent', 'Delivered');
create type pay_method as enum ('Tranferencia Bancaria', 'Paypal');


-------------------------------------------------------------------
--create tables
-------------------------------------------------------------------

create table image
(
    id          serial primary key,
    description text not null,
    path        text not null
);

create table users
(
    id        serial primary key,
    name      varchar        not null,
    email     varchar unique not null,
    birthdate date        not null default ('now'::text)::date,
    password      varchar        not null,
    image_id integer not null references image(id) on delete cascade default 1,
    isadmin   boolean default false
);

create table faq
(
    id       serial primary key,
    question text not null unique,
    answer   text not null
);

create table country
(
    id   serial primary key,
    name text not null unique
);

create table city
(
    id        serial primary key,
    name      text    not null unique,
    country_id integer not null references country (id) on delete cascade
);

create table address
(
    id         serial primary key,
    street     text    not null,
    postal_code text    not null,
    user_id     integer not null unique references users (id) on delete cascade,
    city_id     integer not null references city (id) on delete cascade,
    country_id  integer not null references country (id) on delete cascade
);

create table brand
(
    id      serial primary key,
    name  text           not null unique,
    image_id integer unique not null references image (id) on delete cascade
);

create table cpu
(
    id      serial primary key,
    freq    double precision not null,
    cores   integer          not null,
    threads integer          not null,
    name    text             not null unique,
    constraint freq check (freq > (0)::double precision),
    constraint cores check (cores > 0),
    constraint threads check (threads > 0)
);

create table ram
(
    id    serial primary key,
    value integer not null unique,
    constraint value check (value > 0)
);

create table waterproofing
(
    id    serial primary key,
    value text not null unique
);

create table os
(
    id   serial primary key,
    name text not null unique
);

create table gpu
(
    id   serial primary key,
    name text    not null unique,
    vram integer not null,
    constraint vram check (vram > 0)
);

create table screensize
(
    id    serial primary key,
    value double precision not null unique,
    constraint value check (value > (0)::double precision)
);

create table weight
(
    id    serial primary key,
    value double precision not null unique,
    constraint value check (value > (0)::double precision)
);

create table storage
(
    id    serial primary key,
    value integer not null unique,
    constraint value check (value > 0)
);

create table battery
(
    id    serial primary key,
    value integer not null unique,
    constraint value check (value > 0)
);

create table screenres
(
    id    serial primary key,
    value text not null unique
);

create table camerares
(
    id    serial primary key,
    value double precision not null unique,
    constraint value check (value > (0)::double precision)
);

create table fingerprinttype
(
    id    serial primary key,
    value text not null unique
);

create table description
(
    id serial primary key,
    content text not null unique
);

create table product
(
    id                serial primary key,
    stock             integer          not null,
    price             double precision not null,
    model             text             not null,
    category          category_type    not null,
    brand_id           integer          not null references brand (id) on delete cascade,
    cpu_id             integer          not null references cpu (id) on delete cascade,
    ram_id             integer          not null references ram (id) on delete cascade,
    waterproofing_id   integer          not null references waterProofing (id) on delete cascade,
    os_id              integer          not null references os (id) on delete cascade,
    gpu_id             integer          not null references gpu (id) on delete cascade,
    screensize_id      integer          not null references screensize (id) on delete cascade,
    weight_id          integer          not null references weight (id) on delete cascade,
    storage_id         integer          not null references storage (id) on delete cascade,
    battery_id         integer          not null references battery (id) on delete cascade,
    screenres_id       integer          not null references screenres (id) on delete cascade,
    camerares_id       integer          not null references camerares (id) on delete cascade,
    fingerprinttype_id integer          not null references fingerprinttype (id) on delete cascade,
    description_id text not null,
    constraint stock check (stock > 0),
    constraint price check (price > (0)::double precision)
);


create table rating
(
    id     serial primary key,
    user_id integer          not null references users (id) on delete cascade,
    product_id integer not null references product(id) on delete cascade,
    content text    default '',
    val    double precision default 1,
    constraint val check (val > (0)::double precision and val <= (5)::double precision)
);


create table cart
(
    product_id integer references product (id) on delete cascade,
    user_id    integer references users (id) on delete cascade,
    quant     integer not null default 1,
    primary key (product_id, user_id)
);

create table wishlist
(
    product_id integer references product (id) on delete cascade,
    user_id    integer references users (id) on delete cascade,
    primary key (product_id, user_id)
);

create table purchasestate
(
    id              serial          primary key,
    statechangedate date            not null,
    "comment"       text,
    pstate          purchase_state  not null
);

create table payment
(
    id     serial primary key,
    "type" pay_method not null 
);

create table purchase
(
    id       serial primary key,
    val      double precision not null,
    status_id integer          not null references purchasestate (id) on delete cascade,
    paid     integer          not null references payment (id) on delete cascade,
    user_id   integer          not null references users (id) on delete cascade,
    purchasedate date         not null,
    constraint val check (val > (0)::double precision)
);


create table discount
(
    id        serial primary key,
    val       double precision not null,
    beginDate date             not null,
    endDate   date             not null,
    constraint val check (val > (0)::double precision and val < (1)::double precision),
    constraint endDate check (endDate > beginDate)
    -- constraint beginDate check (beginDate >= ('now'::text)::date) doesnt allow for testing
);

create table discount_product
(
    product_id  integer references product (id) on delete cascade,
    discount_id integer references discount (id) on delete cascade,
    primary key (product_id, discount_id)
);

create table image_product
(
    product_id integer references product (id) on delete cascade,
    image_id   integer references image (id) on delete cascade,
    primary key (product_id, image_id)
);

create table product_purchase
(
    product_id  integer references product (id) on delete cascade,
    purchase_id integer references purchase (id) on delete cascade,
    quantity integer not null,
    primary key (product_id, purchase_id)
);

---------------------------------------------------------------------
--Triggers and UDF
---------------------------------------------------------------------

--Trigger and UDF 1
create function add_review() returns trigger as
$body$
begin
	if not exists(
		select product_purchase.product_id
		from purchase, product_purchase, users
		where product_purchase.purchase_id = purchase.id and
		New.user_id = purchase.user_id and
		New.product_id = product_purchase.product_id
	)
	then raise exception 'You cannot review a product you have not bought!';
	end if;
	
	return New;
end
$body$
language plpgsql;

create trigger add_review
before insert or update on rating
for each row
execute procedure add_review();


--Trigger and UDF 2
create function check_stock() returns trigger as
$body$
begin
	if exists(
		select product.stock 
			from product
			where product.id = New.product_id and
			product.stock < New.quantity
	)
	then raise exception 'Product out of stock!';
	end if;
	
	return New;
end
$body$
language plpgsql;

create trigger check_stock
before insert on product_purchase
for each row
execute procedure check_stock();


--Trigger and UDF 3
create function clear_cart() returns trigger as
$body$
begin
	delete from cart
	where cart.user_id = New.user_id;
	
	return new;
end
$body$
language plpgsql;

create trigger clear_cart
after insert on purchase
for each row
execute procedure clear_cart();


--Trigger and UDF 4
create function update_stock() returns trigger as
$body$
begin
	update product
	set stock = product.stock - New.quantity
	where product.id = New.product_id;
	
	return NEW;
end
$body$
language plpgsql;

create trigger update_stock
after insert on product_purchase
for each row
execute procedure update_stock();


---------------------------------------------------------------------
----Transactions
--------------------------------------------------------------------- 

-- -- Add new product with new images

--BEGIN TRANSACTION;
--SET TRANSACTION ISOLATION LEVEL REPEATABLE READ 
 
--Insert product
--  INSERT INTO product (stock, price, model, category, brandID, cpuID, ramID, waterProofingID, osID, gpuID, screenSizeID, weightID, storageID, batteryID, screenResID, cameraResID, fingerprintTypeID) 
--  VALUES ($stock, $price, $model, $category, $brandID, $cpuID, $ramID, $waterProofingID, $osID, $gpuID, $screenSizeID, $weightID, $storageID, $batteryID, $screenResID, $cameraResID, $fingerprintTypeID);

-- -- Insert image
--  INSERT INTO image (description, path)
-- VALUES ($description, $path);

 
-- -- Insert image_product
--  INSERT INTO image_product (product_id, image_id) 
-- VALUES (currval(g_get_serial_sequence('product', 'id')), currval(g_get_serial_sequence('image', 'id'))); 
 
-- COMMIT;



-- -- Add new discount associated with a product

-- BEGIN TRANSACTION;
-- SET TRANSACTION ISOLATION LEVEL REPEATABLE READ 
 
-- -- Insert discount
--  INSERT INTO discount (val, beginDate, endDate)
-- VALUES ($val, $beginDate, $endDate);
 
-- -- Insert discount_product
--  INSERT INTO discount_product (product_id, discount_id) 
-- VALUES ($product_id, currval(g_get_serial_sequence('discount', 'id'))); 
 
-- COMMIT;



-- -- New purchase
/*
BEGIN TRANSACTION;
SET TRANSACTION ISOLATION LEVEL REPEATABLE READ

INSERT INTO purchase (val, status_id, paid, user_id, purchasedate) VALUES ($val, $statusid, $paid, $userid, ('now'::text)::date));
INSERT INTO product_purchase (product_id, purchaseid) VALUES ($product_id, currval(g_get_serial_sequence('purchase', 'id')));

COMMIT;
*/

-------------------------------------------------------------------
--Indexes
------------------------------------------------------------------- 
create index email_users on users using hash (email);
create index user_address on address using hash (user_id);
create index product_reviews on rating using hash(id);

create index cpu_product on cpu using hash(id);
create index ram_product on ram using hash(id);
create index waterProofing_product on waterproofing using hash(id);
create index os_product on os using hash(id);
create index gpu_product on gpu using hash(id);
create index screensize_product on screensize using hash(id);
create index weight_product on weight using hash(id);
create index storage_product on storage using hash(id);
create index battery_product on battery using hash(id);
create index screenres_product on screenres using hash(id);
create index camerares_product on camerares using hash(id);
create index fingerprinttype_product on fingerprinttype using hash(id);


/* image */

insert into image (description, path) values ('user_default', 'profilepadrao.jpg');
insert into image (description, path) values ('brand_apple', 'apple.png');
insert into image (description, path) values ('brand_samsung', 'samsung.png');
insert into image (description, path) values ('brand_xiaomi', 'xiaomi.png');
insert into image (description, path) values ('brand_huawei', 'huawei.png');
insert into image (description, path) values ('brand_oneplus', 'oneplus.png');
insert into image (description, path) values ('brand_honor', 'honor.png');
insert into image (description, path) values ('brand_oppo', 'oppo.png');
insert into image (description, path) values ('brand_motorola', 'motorola.png');

insert into image (description, path) values ('phone_a50', 'sa50.jpg');
insert into image (description, path) values ('phone_a70', 'sa70.jpg');
insert into image (description, path) values ('phone_tabS6', 'tabs6.jpg');
insert into image (description, path) values ('phone_tabS5e', 'tabs5e.jpg');
insert into image (description, path) values ('phone_ipad_pro2020', 'ipadpro.jpg');
insert into image (description, path) values ('phone_mediapad_t3', 'mediapadt3.jpg');
insert into image (description, path) values ('phone_11pro_max', 'iphone11promax.jpg');
insert into image (description, path) values ('phone_iphone7', 'iphone7.jpg');
insert into image (description, path) values ('phone_s20', 's20Ultra1.png');
insert into image (description, path) values ('phone_mi9', 'mi9.jpg');
insert into image (description, path) values ('phone_p40', 'p40.jpg');
insert into image (description, path) values ('banner', 'teste.jpg');
insert into image (description, path) values ('user_ph', 'userpic.jpg');
insert into image (description, path) values ('user_ph2', 'userpic2.jpg');
insert into image (description, path) values ('user_ph3', 'userpic3.jpg');
insert into image (description, path) values ('user_ph4', 'userpic4.jpg');
insert into image (description, path) values ('user_ph5', 'userpic5.jpg');
insert into image (description, path) values ('user_ph6', 'userpic6.jpg');
insert into image (description, path) values ('phone_a70-2', 'sa70-2.jpg');

insert into image (description, path) values ('iphone_6s', 'iphone_6s.jpg');
insert into image (description, path) values ('iphone_x', 'iphone_x.jpg');
insert into image (description, path) values ('xiaomi_mi5s', 'xiaomi_mi5s.jpg');
insert into image (description, path) values ('xiaomi_minote10', 'xiaomi_minote10.jpg');
insert into image (description, path) values ('xiaomi_mi9t', 'xiaomi_mi9t.jpg');
insert into image (description, path) values ('xiaomi_redminote6', 'xiaomi_redminote6.jpg');
insert into image (description, path) values ('huawei_matex', 'huawei_matex.jpg');
insert into image (description, path) values ('huawei_p30', 'huawei_p30.jpg');
insert into image (description, path) values ('huawei_mate30pro', 'huawei_mate30pro.jpg');
insert into image (description, path) values ('oneplus_5t', 'oneplus_5t.jpg');
insert into image (description, path) values ('oneplus_6', 'oneplus_6.jpg');
insert into image (description, path) values ('oneplus_6t', 'oneplus_6t.jpg');
insert into image (description, path) values ('oneplus_7', 'oneplus_7.jpg');
insert into image (description, path) values ('oneplus_8', 'oneplus_8.jpg');
insert into image (description, path) values ('honor_play', 'honor_play.jpg');
insert into image (description, path) values ('honor_8x', 'honor_8x.jpg');
insert into image (description, path) values ('honor_20', 'honor_20.jpg');
insert into image (description, path) values ('honor_9', 'honor_9.jpg');
insert into image (description, path) values ('honor_9x', 'honor_9x.jpg');



/* users */

insert into users (name, email, birthDate, password, image_id, isadmin) values ('Tynan Kohnen', 'mail@mail.com', '2016-02-27', '$2y$10$HfzIhGCCaxqyaIdGgjARSuOKAcm1Uy82YfLuNaajn6JrjLWy9Sj/W', 23, true); /* Pass: 123456 (é igual em todas abaixo)*/
insert into users (name, email, birthDate, password, image_id) values ('Jane Dymott', 'jdymott1@examiner.com', '2013-03-08', '$2y$04$OPVL/mCdGDkihClFCOx72O5FwwFC3BcUcAZFgVOvweN.T9DCJvXU6', 24);
insert into users (name, email, birthDate, password, image_id) values ('Axel Jerg', 'ajerg2@bloglovin.com', '2014-07-02', '$2y$04$OPVL/mCdGDkihClFCOx72O5FwwFC3BcUcAZFgVOvweN.T9DCJvXU6', 25);
insert into users (name, email, birthDate, password, image_id) values ('Leigha Gravet', 'lgravet3@dedecms.com', '2012-08-15', '$2y$04$OPVL/mCdGDkihClFCOx72O5FwwFC3BcUcAZFgVOvweN.T9DCJvXU6', 26);
insert into users (name, email, birthDate, password, image_id) values ('Aldis Loren', 'aloren4@mediafire.com', '2019-01-22', '$2y$04$OPVL/mCdGDkihClFCOx72O5FwwFC3BcUcAZFgVOvweN.T9DCJvXU6', 27);
insert into users (name, email, birthDate, password, image_id) values ('Wake Martinovsky', 'wmartinovsky5@so-net.ne.jp', '2011-10-19', '$2y$04$OPVL/mCdGDkihClFCOx72O5FwwFC3BcUcAZFgVOvweN.T9DCJvXU6', 26);
insert into users (name, email, birthDate, password, image_id) values ('Wood Lages', 'wlages6@constantcontact.com', '2018-05-30', '$2y$04$OPVL/mCdGDkihClFCOx72O5FwwFC3BcUcAZFgVOvweN.T9DCJvXU6', 25);
insert into users (name, email, birthDate, password, image_id) values ('Reginald Chiommienti', 'rchiommienti7@fc2.com', '2020-02-17', '$2y$04$OPVL/mCdGDkihClFCOx72O5FwwFC3BcUcAZFgVOvweN.T9DCJvXU6', 24);
insert into users (name, email, birthDate, password, image_id) values ('Lynda Baskeyfield', 'lbaskeyfield8@google.pt', '2016-10-29', '$2y$04$OPVL/mCdGDkihClFCOx72O5FwwFC3BcUcAZFgVOvweN.T9DCJvXU6', 23);
insert into users (name, email, birthDate, password, image_id) values ('Mikey Tunnah', 'mtunnah9@japanpost.jp', '2019-02-25', '$2y$04$OPVL/mCdGDkihClFCOx72O5FwwFC3BcUcAZFgVOvweN.T9DCJvXU6', 24);
insert into users (name, email, birthDate, password, image_id) values ('Lonni Enderson', 'lendersona@walmart.com', '2018-04-28', '$2y$04$OPVL/mCdGDkihClFCOx72O5FwwFC3BcUcAZFgVOvweN.T9DCJvXU6', 25);
insert into users (name, email, birthDate, password, image_id) values ('Michaeline Dake', 'mdakeb@yahoo.com', '2017-12-26', '$2y$04$OPVL/mCdGDkihClFCOx72O5FwwFC3BcUcAZFgVOvweN.T9DCJvXU6', 26);
insert into users (name, email, birthDate, password, image_id) values ('Jaquenetta Trevethan', 'jtrevethanc@php.net', '2010-05-14', '$2y$04$OPVL/mCdGDkihClFCOx72O5FwwFC3BcUcAZFgVOvweN.T9DCJvXU6', 27);
insert into users (name, email, birthDate, password, image_id) values ('Aurel Garnall', 'agarnalld@lycos.com', '2013-09-28', '$2y$04$OPVL/mCdGDkihClFCOx72O5FwwFC3BcUcAZFgVOvweN.T9DCJvXU6', 26);
insert into users (name, email, birthDate, password, image_id) values ('Carlyle Fevier', 'cfevierf@ucla.edu', '2015-03-19', '$2y$04$OPVL/mCdGDkihClFCOx72O5FwwFC3BcUcAZFgVOvweN.T9DCJvXU6', 25);
insert into users (name, email, birthDate, password, image_id) values ('Karlens Bambery', 'kbamberyg@aol.com', '2012-11-24', '$2y$04$OPVL/mCdGDkihClFCOx72O5FwwFC3BcUcAZFgVOvweN.T9DCJvXU6', 24);
insert into users (name, email, birthDate, password, image_id) values ('Dame Doget', 'ddogeth@apple.com', '2019-02-04', '$2y$04$OPVL/mCdGDkihClFCOx72O5FwwFC3BcUcAZFgVOvweN.T9DCJvXU6', 23);
insert into users (name, email, birthDate, password, image_id) values ('Conrade Hasser', 'chasseri@weibo.com', '2017-11-10', '$2y$04$OPVL/mCdGDkihClFCOx72O5FwwFC3BcUcAZFgVOvweN.T9DCJvXU6', 24);
insert into users (name, email, birthDate, password, image_id) values ('Ashli Flippini', 'aflippinij@state.gov', '2011-07-15', '$2y$04$OPVL/mCdGDkihClFCOx72O5FwwFC3BcUcAZFgVOvweN.T9DCJvXU6', 25);
insert into users (name, email, birthDate, password, image_id, isadmin) values ('João Nunes','joaonunes@gmail.com','1999-09-02', '$2y$10$HfzIhGCCaxqyaIdGgjARSuOKAcm1Uy82YfLuNaajn6JrjLWy9Sj/W', 26, true); /* Pass: 1234*/ /* id = 20 */

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
insert into country (name) values ('Portugal');


/* city */

insert into city (name, country_id) values ('Moscow', 1);
insert into city (name, country_id) values ('Rio de Janeiro', 2);
insert into city (name, country_id) values ('Jacarta', 3);
insert into city (name, country_id) values ('Toronto', 4);
insert into city (name, country_id) values ('Kyoto', 5);
insert into city (name, country_id) values ('Nice', 6);
insert into city (name, country_id) values ('Managua', 7);
insert into city (name, country_id) values ('Beijing', 8);
insert into city (name, country_id) values ('Baku', 9);
insert into city (name, country_id) values ('Prague', 10);
insert into city (name, country_id) values ('Stockholm', 11);
insert into city (name, country_id) values ('Kiev', 12);
insert into city (name, country_id) values ('Seul', 13);
insert into city (name, country_id) values ('Paredes', 14);


/* address */

insert into address (street, postal_code, user_id, city_id, country_id) values ('Calypso', '1121-015', 1, 1, 1);
insert into address (street, postal_code, user_id, city_id, country_id) values ('Mitchell', '4700-001', 2, 2, 2);
insert into address (street, postal_code, user_id, city_id, country_id) values ('Kedzie', '0652-380', 3, 3, 3);
insert into address (street, postal_code, user_id, city_id, country_id) values ('Summerview', '1547-201', 4, 4, 4);
insert into address (street, postal_code, user_id, city_id, country_id) values ('Claremont', '9005-007', 5, 5, 5);
insert into address (street, postal_code, user_id, city_id, country_id) values ('Orin', '2154-212', 6, 6, 6);
insert into address (street, postal_code, user_id, city_id, country_id) values ('Hudson', '7390-094', 7, 7, 7);
insert into address (street, postal_code, user_id, city_id, country_id) values ('Kingsford', '1212-521', 8, 8, 8);
insert into address (street, postal_code, user_id, city_id, country_id) values ('Barnett', '2124-154', 9, 9, 9);
insert into address (street, postal_code, user_id, city_id, country_id) values ('Rieder', '2414-544', 10, 10, 10);
insert into address (street, postal_code, user_id, city_id, country_id) values ('Hudson', '0054-515', 11, 11, 11);
insert into address (street, postal_code, user_id, city_id, country_id) values ('Springs', '1545-174', 12, 12, 12);
insert into address (street, postal_code, user_id, city_id, country_id) values ('Ohio', '0221-512', 13, 13, 13);
insert into address (street, postal_code, user_id, city_id, country_id) values ('Kedzie Ohio', '8680-825', 14, 13, 13);
insert into address (street, postal_code, user_id, city_id, country_id) values ('Ohiozz', '5145-541', 15, 12, 12);
insert into address (street, postal_code, user_id, city_id, country_id) values ('Beilfuss', '4640-210', 16, 10, 10);
insert into address (street, postal_code, user_id, city_id, country_id) values ('Acker', '1241-524', 17, 9, 9);
insert into address (street, postal_code, user_id, city_id, country_id) values ('Sundown', '2540-541', 18, 8, 8);
insert into address (street, postal_code, user_id, city_id, country_id) values ('Dovetail', '5241-545', 19, 7, 7);
insert into address (street, postal_code, user_id, city_id, country_id) values ('Igreja Velha', '4501-505', 20, 14, 14);

/* FAQ */

insert into faq (question, answer) values ('How do I track my order?', 'All orders despatched with DPD are now trackable. Tracking updates will be provided by our delivery partner, with the links to follow your parcel. If your tracking number begins with RML, unfortunately, we are unable to track these parcels at present. Most parcels will reach their destination within 2 weeks, however, some destinations may require additional time allowed for parcels to arrive. As most parcels will reach their destination within 2 weeks, we are unable to query your parcel before this time. If this time has passed and you have still not received your parcel please contact our Customer Care Team.');
insert into faq (question, answer) values ('How long will my order take to arrive?', 'Generally our international parcels will arrive within 7 working days. However if your parcels tracking ID begins with RML, we advise that you allow up to 2 weeks to account for any postal delays within your country. Please note that UK Bank Holidays, Saturday and Sunday are not classed as working days.');
insert into faq (question, answer) values ('What do I do if there is a problem with my delivery?', 'Please contact our Customer Care team who are here to help with any problems.');
insert into faq (question, answer) values ('What is your online security policy?', 'We want to make sure that you are safe and secure when you are shopping with us online. As part of our commitment to this, we perform random checks on orders and this means that you may need to prove your identity. Customers will be contacted by phone or email and will have up to 24 hours to provide us with the required information.');



/* brand */

insert into brand (name, image_id) values ('Apple', 2);
insert into brand (name, image_id) values ('Samsung', 3);
insert into brand (name, image_id) values ('Xiaomi', 4);
insert into brand (name, image_id) values ('Huawei', 5);
insert into brand (name, image_id) values ('OnePlus', 6);
insert into brand (name, image_id) values ('Honor', 7);
insert into brand (name, image_id) values ('Oppo', 8);
insert into brand (name, image_id) values ('Motorola', 9);

/* waterProofing */

insert into waterproofing (value) values ('IP68');
insert into waterproofing (value) values ('None');
insert into waterproofing (value) values ('IP67');
insert into waterproofing (value) values ('IP53');

/* os */

insert into os (name) values ('Android 10.0');
insert into os (name) values ('IOS 11');
insert into os (name) values ('IOS 10');
insert into os (name) values ('Android 9.0 (Pie)');
insert into os (name) values ('Android 8.0 (Oreo)');
insert into os (name) values ('Android 7.0 (Nougat)');



/* gpu */

insert into gpu (name, vram) values ('Mali-G71 MP2', 2);
insert into gpu (name, vram) values ('Mali-G72 MP3', 1);
insert into gpu (name, vram) values ('Adreno 612', 2);
insert into gpu (name, vram) values ('Mali-450MP4', 1);
insert into gpu (name, vram) values ('Apple GPU', 8);
insert into gpu (name, vram) values ('Mali-G77 MP11', 6);

/* screenSize */ 

insert into screensize (value) values (6.4);
insert into screensize (value) values (6.3);
insert into screensize (value) values (9);
insert into screensize (value) values (4);
insert into screensize (value) values (4.5);
insert into screensize (value) values (6);
insert into screensize (value) values (10.5);
insert into screensize (value) values (12.9);
insert into screensize (value) values (6.7);

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

insert into screenres (value) values ('1080 x 1920');
insert into screenres (value) values ('720 x 1280');
insert into screenres (value) values ('1080 x 2340');
insert into screenres (value) values ('1440 x 2960');
insert into screenres (value) values ('1440 x 3200');

/* cameraRes */

insert into camerares (value) values (5);
insert into camerares (value) values (12);
insert into camerares (value) values (8);
insert into camerares (value) values (16);
insert into camerares (value) values (25);
insert into camerares (value) values (32);
insert into camerares (value) values (13);
insert into camerares (value) values (2);
insert into camerares (value) values (64);
insert into camerares (value) values (50);

/* fingerprintType */

insert into fingerprinttype (value) values ('Rear-mounted');
insert into fingerprinttype (value) values ('Side-mounted');
insert into fingerprinttype (value) values ('Under display optical sensor');
insert into fingerprinttype (value) values ('Under display ultrasonic sensor');
insert into fingerprinttype (value) values ('none');


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

/* payment */

insert into payment (type) values ('Tranferencia Bancaria');
insert into payment (type) values ('Paypal');

/*description*/

insert into description (content) values ('The Samsung Galaxy A50 specifications include a 6.4-inch AMOLED display with 1080 x 2340 pixels resolution, Exynos 9610 processor, 6GB of RAM and triple camera setup on the back. The phone is powered by 4000 mAh battery.');
insert into description (content) values ('The Samsung Galaxy A70 sports a 6.7-inch Infinity-U display, minimalist bezels, and in-display fingerprint. The phone is powered by octa-core processor, 6 GB RAM, and massive 4500 mAh battery. There is a triple-camera setup on the back and a 32-megapixel front shooter. The Galaxy A70 runs Android 9.0 Pie out of the box.');
insert into description (content) values ('The Galaxy Tab S6 features a Snapdragon 855 processor, 128 or 256GB internal storage options, and 6 or 8GB RAM. A 10.5-inch Super AMOLED panel with razor-thin bezels, quad AKG-tuned speakers, and an ''all-new'' S Pen are also included.');
insert into description (content) values ('The Samsung Galaxy Tab S5e specifications include a 10.5-inch display with 1600 x 2560 pixels resolution, Snapdragon 670 processor, 6 GB RAM, and 13-megapixel main rear camera. The tablet is powered by 7040 mAh battery.');
insert into description (content) values ('The new Apple iPad Pro 11-inch is powered by the new Apple A12Z Bionic chipset accompanied with a variety of storage options (128GB, 256GB,512GB, and 1TB). The most noticeable external change is the presence of a large iPhone 11 Pro-like camera system on the back, which includes two cameras and a powerful 3D sensing system. The 11-inch iPad Pro is available in Space Gray and Silver and starts at $799 with 128GB of storage. The 256GB, 512GB, and 1TB models retail at $899, $1,099, and $1,299 respectively. LTE connectivity is available for an extra $150.');
insert into description (content) values ('The Huawei MediaPad T3 features a quad speakers that have been co-developed with Harman Kardon. Also, the slate comes with Android 8.0 Oreo on board and a large 10.1-inch display with 1920 x 1200 pixels resolution. Although it''s a ''lite'' version of the original MediaPad M5, the new tablet is equipped with a decent Kirin 659 processor, and either 3GB RAM and 32GB storage or 4GB RAM and 64GB storage.');
insert into description (content) values ('The largest new iPhone has all the features of the iPhone 11 Pro, but comes with a much larger 6.5” display as well as a beefier battery that lasts up to 5 hours longer than the iPhone XS Max. There’s a triple camera setup - a ultra wide-angle F2.4 snapper joins the F1.8 regular and F2.0 telephoto cameras. The 7nm A13 Bionic chip provides a 20% increase in CPU and GPU performance, as well as improved battery life - up to 4 hours more. The iPhone 11 Pro is available in black, white, gold, and midnight green. Prices start at $1099 for the 64GB version, $1249 for the 256GB one, and $1449 for the 512GB one.');
insert into description (content) values ('The Apple iPhone 7 is the successor to the highly acclaimed iPhone 6s. As such, it brings a multitude of enhancements in key areas, including design, performance, and user experience. While the overall shape and size of the phone have been left intact, there are now glossy and matte black options available. Also, the handset is now IP67-certified, making it water-resistant. On its back, the refined 12MP camera features optical image stabilization, wider aperture of F1.8, and a quad LED TrueTone flash for better low-light performance. Battery life has been given a welcome boost that could provide users around 2 hours of additional use time. The new A10 Fusion chip is up to 40% more powerful than last-year''s A9, yet promises great power efficiency. And while the iPhone 7 lacks an audio jack, the box includes Lightning connector EarPods, as well as a Lightning to 3.5mm adapter.');
insert into description (content) values ('The Samsung Galaxy S20+ comes with a Snapdragon 865/Exynos 990 chipset, 12GB RAM and 128GB/256GB/512GB of storage, as well as a 4,500mAh battery. Quad-camera setup is on the back of the phone: a 12MP primary sensor, an ultra-wide-angle camera, a telephoto camera, and a Time of Flight sensor. The price of Galaxy S20+ starts at $1200.');
insert into description (content) values ('Xiaomi Mi 10 offers a 6.7-inch display with a 90HZ refresh rate, a quad-camera setup with a 108MP main and a 4500mAh battery. The phone is powered by Snapdragon 865 chipset, 8GB of RAM and 128GB/256GB storage. The Mi 10 runs Android 10 out of the box.');
insert into description (content) values ('Huawei P40 is powered by Huawei''s own Kirin 990 chip and a 3800mAh battery. At the front is presented a 6.1-inch OLED display with a 90HZ refresh rate, an in-screen fingerprint sensor, and a dual selfie camera. At the back is a triple-camera setup with an all-new 50-megapixel RYYB main sensor. The phone runs Android 10 (without Google’s apps and services out of the box) available across Europe for 799 euros (starting price for 6GB RAM/128GB storage variant).');
insert into description (content) values ('Not much has changed on the surface since the Apple iPhone 6 introduced an updated look with a laminated screen and comfortably round corners. This time around, though, Apple is beating its chest for incorporating Series 7000 aluminum instead of the anodized aluminum it''s been traditionally using. The screen on the iPhone 6s is virtually unchanged from what the iPhone 6 brought to the table, but the smartphone has gained 3D Touch control that lets users deliberately choose between a light tap, a press, and a ''deeper'' press, triggering a range of specific controls. Other notable additions include the Apple A9 chipset, and a 12MP rear camera with 4K resolution video recording.');
insert into description (content) values ('Marking the iPhone''s 10th anniversary, the Apple iPhone X is easily the most advanced iPhone yet. Its stand-out design feature is the HDR-capable OLED display strethcing from edge to edge, while the back is made of glass instead of metal to allow wireless charging. Instead of a traditional fingerprint scanner, the iPhone X uses Face ID facial recognition, while navigation gestures compensate for the lack of a home button. The dual camera at the back allows for 2X optical zoom, and Portrait mode with studio lighting effects is available both when taking selfies and regular photos. iOS 11 runs on it out of the box, introducing augmented reality applications, a redesigned App Store, a new Control Center layout, and a number of UI refinements.');
insert into description (content) values ('The Xiaomi Mi 5s keeps the same 5.15" 1080p screen with 600 nits of brightness of its predecessor, the Mi 5, but adds a Snapdragon 821 chipset, and a bunch of new tech, both for the company, and overall. The top 4 GB + 128 GB version of the Xiaomi Mi 5s employs a pressure-sensitive display, leveraging the Synaptics touch drivers to tell between a lighter push or a harder press of the cover glass on the display. Next in line for the Mi 5s is the Sense ID ultrasonic fingerprint sensing tech, made by Qualcomm which recognizes fingertips in a fraction of a second while being less prone to damage. The camera on the back of the 5s is a 12 MP affair with the new Sony IMX378 sensor, while the front-facing shooter doles out 4 MP selfies. As for the rest of the specs, there is a USB-C port on the bottom of the phones, as well as Quick Charge 3.0 technology for rapidly topping up the phones.');
insert into description (content) values ('The Mi Note 10 is not technically a flagship model, packing an upper mid-range Snapdragon 730G processor.Nonetheless, that''s not necessarily bad news because it''s the world-first 108MP sensor with not one but two different telephoto cameras. Coupled with an extra-large 5,260mAh battery, a 6.47-inch 3D curved AMOLED ''edge-to-edge'' screen (with a small notch), 6 GB RAM, 128 gigs of storage, and Android 9.0 Pie, all these make the phone a great bargain for around €400.');
insert into description (content) values ('Xiaomi Mi 9T is a rebranded Redmi K20 which is a mid-range phone. The handset sports a 6.4-inch AMOLED display, Snapdragon 730 processor, in-screen fingerprint scanner, and triple-camera setup on the back. The Mi 9T runs Android 9.0 Pie, powered by 4000 mAh battery.');
insert into description (content) values ('The Xiaomi Redmi Note 6 Pro carries a 6.26-inch notched display with a 1080 x 2280 resolution. The same Snapdragon 636 SOC that runs the Redmi Note 5 Pro, is under the hood, along with 4/6 GB of RAM and 64 GB of native storage. This is the first Xiaomi phone to sport four cameras - a 12MP primary camera and a 5MP secondary sensor, on the back, and a 20MP + 2MP combo at the front. A 4000mAh battery keeps the lights on, and Android 8.1 Oreo is pre-installed.');
insert into description (content) values ('The Mate X is Huawei''s first foldable smartphone with a display that folds in half. At its centerpiece, an OLED screen measures 6.6 inches in diagonal when folded, but offers twice the screen area when fully unfolded. The phone also stands out with support for 5G networks and for Huawei''s 55W fast charging. On the hardware side, a Kirin 980 rocks the show, along with 8GB of RAM and the plentiful 512GB of storage. And the camera arrangement offers all the features one might wish for: a 40MP main shooter backed by a super wide-angle camera, a telephoto lens for zooming, and a ToF sensor for better depth perception.');
insert into description (content) values ('The Huawei P30 is a high-end Android phone powered by Huawei''s Kirin 980 chip, backed by up to 8GB of RAM and 128GB of storage. A key selling point is the triple camera at the back, comprised of a main, 40MP camera promising great low-light shots, a super wide-angle camera, and a telephoto camera with 3x zoom. The 6.1-inch OLED screen stretches from one corner to the other and is only interrupted by a small notch housing the front, 32MP camera. The 3650mAh battery charges rapidly and supports reverse wireless charging.');
insert into description (content) values ('The regular Huawei Mate 30 comes along with a flat OLED display that spans across 6.62 inches and has a FHD+ resolution. The 7nm Kirin 990 chipset is powering the phone, along with 8GB of RAM and 128GB of storage. The 4,200mAh battery supports fast 40W wired and 27W wireless charging. There is a triple rear camera on the back, consisting of a 16MP ultra wide-angle (with f/2.2 aperture), 40MP SuperSensing (f/1.8 aperture), and 8MP telephoto camera (f/2.4 aperture), plus a laser focusing sensor. For selfies, Huawei offers a capable 24MP shooter with f/2.0 aperture. The device starts at EUR 799.');
insert into description (content) values ('OnePlus 5T features an immersive 6" 18:9 AMOLED display and a new dual camera system on the back that will help it take better pictures in low light. It can also take Portrait Mode photos with a blurred background.The fingerprint scanner is on the back and the phone also supports Face Unlock. Good old features like the 3.5mm headphone jack and Dash Charger, the quick charging solution from OnePlus, are still present on the 5T as well.');
insert into description (content) values ('As all of the company''s previous high-end smartphones, the OnePlus 6 offers great specs at a great price. A tall, 6.3-inch AMOLED display is at its centerpiece, a dual-camera setup enables bokeh effects and high-framerate video, and a Snapdragon 845 provides plenty of processing power. The lightweight user interface has a stock feel, but also brings useful extras like Face Unlock and optional navigation gestures to replace on-screen buttons. The phone is made of glass and metal and is resistant to rain and splashes.');
insert into description (content) values ('The OnePlus 6T is powerful, yet reasonably priced Android phone. Starting at $550, it offers top-of-the-line specs, including a Snapdragon 845 and up to 8GB of RAM. It is also one of the few smartphones with a fingerprint scanner built right into the display. On the lists of skipped features are a headphone jack, water resistance, and wireless charging. The OnePlus 6T is the company''s first to launch through a US carrier, namely T-Mobile.');
insert into description (content) values ('Just like previous OnePlus phones, OnePlus 7 is a high-end device at a reasonable price. The phone comes with the powerful Snapdragon 855 chip, 8 RAM and 256 GB of storage. There is a dual-camera setup on the back, as well as a 16-megapixel front shooter. The Oneplus 7 is powered by 3700 mAh battery.');
insert into description (content) values ('OnePlus 8 is a 5G-ready device that sports a 6.55-inch FHD+ AMOLED display that uses a 90Hz refresh rate, a Snapdragon 865 chipset with either 8 or 12GB of RAM, as well as ultra-fast storage, with either 128 or 256GB of capacity. The device comes with a 4,300mAh battery, ultra fast-charging, and a triple camera setup. Prices start at $699 and $799 for the 8/128 and 12/256GB versions respectively.');
insert into description (content) values ('The Honor Play comes with a 6.3-inch 19.5:9 display, 4/6 GB of RAM, 64 GB of storage (expandable via microSD) and a Kirin 970 octa-core chip clocked at 2.36 GHz. It comes with an AI powered camera setup consisting of a 16-megapixel main sensor and a 2-megapixel secondary unit. For selfies there is another 16-megapixel front facing unit.');
insert into description (content) values ('The Honor 8X comes with a 6.5-inch display, 2.2 GHz octa-core processor, 4 GB of RAM, 64/128 GB of storage (expandable via microSD) and Dual-SIM capability. On the back there is a dual-camera setup with 20-megapixel main sensor and a 2-megapixel secondary. Selfies are covered by a 16-megapixel front facing snapper.');
insert into description (content) values ('The Honor 20 features a 6.3-inch display with 1080 x 2340 pixels resolution, Kirin 980 processor with 6 GB RAM, and 3750 mAh battery. There is a quad-camera setup on the back, with a 48-megapixel main sensor, as well as a 32-megapixel selfie shooter.');
insert into description (content) values ('The Honor 9 has a dual-camera setup at the back, that consists of one 20MP monochrome sensor and one regular 12MP shooter. This is the exact same setup on the Huawei P10. Other specs include the Kirin 960 chipset paired up with 6GB of RAM. The device ships with the Android 7-based EMUI 5 out of the box.');
insert into description (content) values ('The Honor 9X comes with a triple-camera configuration, 6.6-inch IPS display, rear-mounted fingerprint sensors, and 4,000 mAh battery. The phone is powered by Kirin 710F processor, 4/6 GB RAM and 64/128 gigs of storage.');



/* product */

insert into product (stock, price, model, category, brand_id, cpu_id, ram_id, waterproofing_id, os_id, gpu_id, screensize_id, weight_id, storage_id, battery_id, screenres_id, camerares_id, fingerprinttype_id, description_id) values (67, 349.99, 'Galaxy A50', 'Phones',            2, 2, 2, 1, 4, 2, 1, 1, 4, 2, 1, 5, 3, 1);
insert into product (stock, price, model, category, brand_id, cpu_id, ram_id, waterproofing_id, os_id, gpu_id, screensize_id, weight_id, storage_id, battery_id, screenres_id, camerares_id, fingerprinttype_id, description_id) values (24, 470.39, 'Galaxy A70', 'Phones',            2, 1, 3, 1, 1, 3, 2, 1, 4, 3, 1, 6, 1, 2);

insert into product (stock, price, model, category, brand_id, cpu_id, ram_id, waterproofing_id, os_id, gpu_id, screensize_id, weight_id, storage_id, battery_id, screenres_id, camerares_id, fingerprinttype_id, description_id) values (57, 749.99, 'Galaxy Tab S6', 'Tablets',        2, 1, 3, 2, 5, 3, 7, 6, 4, 6, 3, 7, 3, 3);
insert into product (stock, price, model, category, brand_id, cpu_id, ram_id, waterproofing_id, os_id, gpu_id, screensize_id, weight_id, storage_id, battery_id, screenres_id, camerares_id, fingerprinttype_id, description_id) values (46, 459.99, 'Galaxy Tab S5e', 'Tablets',       2, 1, 2, 2, 4, 3, 7, 7, 4, 6, 3, 7, 2, 4);
insert into product (stock, price, model, category, brand_id, cpu_id, ram_id, waterproofing_id, os_id, gpu_id, screensize_id, weight_id, storage_id, battery_id, screenres_id, camerares_id, fingerprinttype_id, description_id) values (14, 1129.00, 'iPad Pro 2020', 'Tablets',       1, 3, 3, 2, 2, 5, 8, 8, 4, 7, 4, 2, 5, 5);
insert into product (stock, price, model, category, brand_id, cpu_id, ram_id, waterproofing_id, os_id, gpu_id, screensize_id, weight_id, storage_id, battery_id, screenres_id, camerares_id, fingerprinttype_id, description_id) values (9, 199.99, 'MediaPad T3', 'Tablets',           4, 4, 5, 2, 1, 4, 3, 3, 2, 4, 2, 8, 5, 6);
insert into product (stock, price, model, category, brand_id, cpu_id, ram_id, waterproofing_id, os_id, gpu_id, screensize_id, weight_id, storage_id, battery_id, screenres_id, camerares_id, fingerprinttype_id, description_id) values (30, 1599.99, 'iPhone 11 Pro Max', 'Phones',    1, 5, 2, 1, 3, 5, 1, 9, 5, 2, 5, 2, 5, 7);
insert into product (stock, price, model, category, brand_id, cpu_id, ram_id, waterproofing_id, os_id, gpu_id, screensize_id, weight_id, storage_id, battery_id, screenres_id, camerares_id, fingerprinttype_id, description_id) values (5, 721, 'iPhone 7', 'Phones',                  1, 6, 4, 3, 2, 5, 5, 5, 1, 8, 2, 2, 4, 8);   
insert into product (stock, price, model, category, brand_id, cpu_id, ram_id, waterproofing_id, os_id, gpu_id, screensize_id, weight_id, storage_id, battery_id, screenres_id, camerares_id, fingerprinttype_id, description_id) values (9, 1099, 'Galaxy S20+', 'Phones',              2, 1, 6, 1, 1, 6, 9, 10, 4, 9, 3, 9, 4, 9);
insert into product (stock, price, model, category, brand_id, cpu_id, ram_id, waterproofing_id, os_id, gpu_id, screensize_id, weight_id, storage_id, battery_id, screenres_id, camerares_id, fingerprinttype_id, description_id) values (12, 569, 'Mi 10', 'Phones',                     3, 2, 3, 1, 5, 4, 6, 2, 4, 5, 1, 6, 1, 10);
insert into product (stock, price, model, category, brand_id, cpu_id, ram_id, waterproofing_id, os_id, gpu_id, screensize_id, weight_id, storage_id, battery_id, screenres_id, camerares_id, fingerprinttype_id, description_id) values (10, 829.99, 'P40', 'Phones',                   4, 7, 3, 4, 4, 6, 6, 10, 4, 10, 3, 6, 3, 11);
insert into product (stock, price, model, category, brand_id, cpu_id, ram_id, waterproofing_id, os_id, gpu_id, screensize_id, weight_id, storage_id, battery_id, screenres_id, camerares_id, fingerprinttype_id, description_id) values (10, 198.99, 'iPhone 6s', 'Phones',             1, 3, 3, 4, 4, 6, 6, 10, 4, 10, 3, 6, 3, 12);
insert into product (stock, price, model, category, brand_id, cpu_id, ram_id, waterproofing_id, os_id, gpu_id, screensize_id, weight_id, storage_id, battery_id, screenres_id, camerares_id, fingerprinttype_id, description_id) values (10, 829.99, 'iPhone X', 'Phones',              1, 3, 3, 4, 5, 6, 2, 1, 1, 2, 3, 4, 5, 13);
insert into product (stock, price, model, category, brand_id, cpu_id, ram_id, waterproofing_id, os_id, gpu_id, screensize_id, weight_id, storage_id, battery_id, screenres_id, camerares_id, fingerprinttype_id, description_id) values (10, 123.99, 'Mi 5s', 'Phones',                 3, 3, 2, 1, 2, 3, 2, 3, 4, 5, 4, 2, 1, 14);
insert into product (stock, price, model, category, brand_id, cpu_id, ram_id, waterproofing_id, os_id, gpu_id, screensize_id, weight_id, storage_id, battery_id, screenres_id, camerares_id, fingerprinttype_id, description_id) values (10, 122.99, 'Mi Note 10', 'Phones',            3, 2, 1, 2, 3, 4, 5, 8, 2, 10, 3, 6, 3, 15);
insert into product (stock, price, model, category, brand_id, cpu_id, ram_id, waterproofing_id, os_id, gpu_id, screensize_id, weight_id, storage_id, battery_id, screenres_id, camerares_id, fingerprinttype_id, description_id) values (10, 329.99, 'Mi 9t', 'Phones',                 3, 6, 4, 3, 5, 3, 6, 10, 5, 10, 2, 5, 1, 16);
insert into product (stock, price, model, category, brand_id, cpu_id, ram_id, waterproofing_id, os_id, gpu_id, screensize_id, weight_id, storage_id, battery_id, screenres_id, camerares_id, fingerprinttype_id, description_id) values (10, 224.99, 'Redmi Note 6 Pro', 'Phones',          3, 1, 2, 4, 4, 6, 6, 10, 4, 1, 1, 3, 2, 17);
insert into product (stock, price, model, category, brand_id, cpu_id, ram_id, waterproofing_id, os_id, gpu_id, screensize_id, weight_id, storage_id, battery_id, screenres_id, camerares_id, fingerprinttype_id, description_id) values (10, 1029.99, 'Huawei Mate X', 'Phones',        4, 2, 3, 4, 2, 6, 6, 5, 4, 10, 3, 6, 3, 18);
insert into product (stock, price, model, category, brand_id, cpu_id, ram_id, waterproofing_id, os_id, gpu_id, screensize_id, weight_id, storage_id, battery_id, screenres_id, camerares_id, fingerprinttype_id, description_id) values (10, 629.99, 'P30', 'Phones',                   4, 3, 3, 4, 4, 6, 6, 10, 4, 10, 3, 6, 3, 19);
insert into product (stock, price, model, category, brand_id, cpu_id, ram_id, waterproofing_id, os_id, gpu_id, screensize_id, weight_id, storage_id, battery_id, screenres_id, camerares_id, fingerprinttype_id, description_id) values (10, 829.99, 'Mate 30', 'Phones',               4, 7, 3, 1, 5, 1, 6, 3, 4, 10, 3, 6, 3, 20);
insert into product (stock, price, model, category, brand_id, cpu_id, ram_id, waterproofing_id, os_id, gpu_id, screensize_id, weight_id, storage_id, battery_id, screenres_id, camerares_id, fingerprinttype_id, description_id) values (10, 229.99, '5t', 'Phones',                    5, 2, 3, 2, 4, 2, 2, 10, 4, 1, 3, 5, 3, 21);
insert into product (stock, price, model, category, brand_id, cpu_id, ram_id, waterproofing_id, os_id, gpu_id, screensize_id, weight_id, storage_id, battery_id, screenres_id, camerares_id, fingerprinttype_id, description_id) values (10, 329.99, '6', 'Phones',                     5, 7, 3, 4, 4, 3, 2, 2, 4, 1, 3, 5, 3, 22);
insert into product (stock, price, model, category, brand_id, cpu_id, ram_id, waterproofing_id, os_id, gpu_id, screensize_id, weight_id, storage_id, battery_id, screenres_id, camerares_id, fingerprinttype_id, description_id) values (10, 422.99, '6t', 'Phones',                    5, 7, 3, 4, 3, 4, 4, 3, 4, 1, 3, 5, 3, 23);
insert into product (stock, price, model, category, brand_id, cpu_id, ram_id, waterproofing_id, os_id, gpu_id, screensize_id, weight_id, storage_id, battery_id, screenres_id, camerares_id, fingerprinttype_id, description_id) values (10, 529.99, '7', 'Phones',                     5, 5, 3, 4, 4, 5, 8, 10, 4, 1, 3, 5, 3, 24);
insert into product (stock, price, model, category, brand_id, cpu_id, ram_id, waterproofing_id, os_id, gpu_id, screensize_id, weight_id, storage_id, battery_id, screenres_id, camerares_id, fingerprinttype_id, description_id) values (10, 729.99, '8', 'Phones',                     5, 7, 3, 2, 1, 6, 2, 1, 4, 1, 3, 5, 3, 25);
insert into product (stock, price, model, category, brand_id, cpu_id, ram_id, waterproofing_id, os_id, gpu_id, screensize_id, weight_id, storage_id, battery_id, screenres_id, camerares_id, fingerprinttype_id, description_id) values (10, 219.99, 'Play', 'Phones',                  6, 5, 3, 4, 4, 6, 7, 9, 2, 3, 2, 1, 4, 26);
insert into product (stock, price, model, category, brand_id, cpu_id, ram_id, waterproofing_id, os_id, gpu_id, screensize_id, weight_id, storage_id, battery_id, screenres_id, camerares_id, fingerprinttype_id, description_id) values (10, 119.99, '8x', 'Phones',                    6, 5, 3, 4, 4, 5, 6, 9, 1, 3, 3, 1, 4, 27);
insert into product (stock, price, model, category, brand_id, cpu_id, ram_id, waterproofing_id, os_id, gpu_id, screensize_id, weight_id, storage_id, battery_id, screenres_id, camerares_id, fingerprinttype_id, description_id) values (10, 300.99, '20', 'Phones',                    6, 5, 3, 3, 2, 2, 2, 7, 2, 3, 1, 1, 4, 28);
insert into product (stock, price, model, category, brand_id, cpu_id, ram_id, waterproofing_id, os_id, gpu_id, screensize_id, weight_id, storage_id, battery_id, screenres_id, camerares_id, fingerprinttype_id, description_id) values (10, 111.99, '9', 'Phones',                     6, 5, 3, 1, 3, 6, 2, 9, 1, 2, 2, 1, 4, 29);
insert into product (stock, price, model, category, brand_id, cpu_id, ram_id, waterproofing_id, os_id, gpu_id, screensize_id, weight_id, storage_id, battery_id, screenres_id, camerares_id, fingerprinttype_id, description_id) values (10, 270.99, '9x', 'Phones',                    6, 5, 3, 4, 4, 1, 9, 5, 2, 3, 2, 1, 4, 30);






/* purchase State */

insert into purchasestate (statechangedate, "comment", pstate) values ('2012-12-13', 'payment please!','Sent');
insert into purchasestate (statechangedate, "comment", pstate) values ('2012-12-14', 'please wait, in process','Processing');
insert into purchasestate (statechangedate, "comment", pstate) values ('2012-12-15', 'shipped with success','Delivered');
insert into purchasestate (statechangedate, "comment", pstate) values ('2017-07-16', 'payment please!','Delivered');
insert into purchasestate (statechangedate, "comment", pstate) values ('2018-05-17', 'please wait, in process','Processing');
insert into purchasestate (statechangedate, "comment", pstate) values ('2016-02-18', 'shipped with success','Sent');
insert into purchasestate (statechangedate, "comment", pstate) values ('2019-01-16', 'payment please!','Processing');
insert into purchasestate (statechangedate, "comment", pstate) values ('2015-04-17', 'please wait, in process','Processing');
insert into purchasestate (statechangedate, "comment", pstate) values ('2015-08-18', 'shipped with success','Sent');
insert into purchasestate (statechangedate, "comment", pstate) values ('2012-05-12', 'shipped with success','Sent');
insert into purchasestate (statechangedate, "comment", pstate) values ('2011-04-17', 'please wait, in process','Processing');
insert into purchasestate (statechangedate, "comment", pstate) values ('2010-12-10', 'shipped with success','Delivered');


/* purchase */

insert into purchase (val, status_id, paid, user_id, purchasedate) values (1600.37, 1, 1, 1, '2010-12-10');
insert into purchase (val, status_id, paid, user_id, purchasedate) values (1588.99, 2, 2, 2, '2010-12-11');
insert into purchase (val, status_id, paid, user_id, purchasedate) values (1599.99, 3, 1, 3, '2010-12-12');
insert into purchase (val, status_id, paid, user_id, purchasedate) values (599.97, 4, 1, 4, '2010-12-13');
insert into purchase (val, status_id, paid, user_id, purchasedate) values (721, 5, 2, 5, '2010-12-14');
insert into purchase (val, status_id, paid, user_id, purchasedate) values (1099, 6, 2, 6, '2010-12-15');
insert into purchase (val, status_id, paid, user_id, purchasedate) values (829.99, 8, 1, 13, '2010-12-16');
insert into purchase (val, status_id, paid, user_id, purchasedate) values (1090.37, 10, 1, 1, '2010-12-17');
insert into purchase (val, status_id, paid, user_id, purchasedate) values (1200.37, 11, 1, 1, '2010-12-18');
insert into purchase (val, status_id, paid, user_id, purchasedate) values (100.37, 12, 1, 1, '2010-12-19');
insert into purchase (val, status_id, paid, user_id, purchasedate) values (2728.99, 12, 1, 20, '2019-12-19');


/* product_purchase */

insert into product_purchase (product_id, purchase_id, quantity) values (21, 1, 1);
insert into product_purchase (product_id, purchase_id, quantity) values (22, 1, 1);
insert into product_purchase (product_id, purchase_id, quantity) values (23, 1, 1);
insert into product_purchase (product_id, purchase_id, quantity) values (24, 2, 1);
insert into product_purchase (product_id, purchase_id, quantity) values (25, 2, 1);
insert into product_purchase (product_id, purchase_id, quantity) values (26, 4, 2);
insert into product_purchase (product_id, purchase_id, quantity) values (27, 3, 1);
insert into product_purchase (product_id, purchase_id, quantity) values (28, 5, 1);
insert into product_purchase (product_id, purchase_id, quantity) values (29, 6, 1);
insert into product_purchase (product_id, purchase_id, quantity) values (1, 7, 1);
insert into product_purchase (product_id, purchase_id, quantity) values (30, 8, 1);
insert into product_purchase (product_id, purchase_id, quantity) values (25, 9, 3);
insert into product_purchase (product_id, purchase_id, quantity) values (22, 10, 2);
insert into product_purchase (product_id, purchase_id, quantity) values (25, 11, 1);
insert into product_purchase (product_id, purchase_id, quantity) values (27, 11, 1);


/* cart */

insert into cart (product_id, user_id, quant) values (1, 1, 1);
insert into cart (product_id, user_id, quant) values (2, 1, 2);
insert into cart (product_id, user_id, quant) values (5, 1, 3);
insert into cart (product_id, user_id, quant) values (2, 2, 2);
insert into cart (product_id, user_id, quant) values (3, 3, 3);
insert into cart (product_id, user_id, quant) values (4, 4, 4);
insert into cart (product_id, user_id, quant) values (5, 5, 3);
insert into cart (product_id, user_id, quant) values (6, 8, 1);
insert into cart (product_id, user_id, quant) values (7, 10, 1);
insert into cart (product_id, user_id, quant) values (8, 12, 3);

/* wishlist */

insert into wishlist (product_id, user_id) values (1, 1);
insert into wishlist (product_id, user_id) values (7, 1);
insert into wishlist (product_id, user_id) values (2, 1);
insert into wishlist (product_id, user_id) values (5, 1);
insert into wishlist (product_id, user_id) values (3, 1);
insert into wishlist (product_id, user_id) values (9, 1);
insert into wishlist (product_id, user_id) values (2, 2);
insert into wishlist (product_id, user_id) values (3, 3);
insert into wishlist (product_id, user_id) values (4, 4);
insert into wishlist (product_id, user_id) values (5, 5);
insert into wishlist (product_id, user_id) values (6, 11);
insert into wishlist (product_id, user_id) values (7, 12);
insert into wishlist (product_id, user_id) values (8, 10);
insert into wishlist (product_id, user_id) values (9, 9);

/* discount */

insert into discount (val, beginDate, endDate) values (0.10, '2020-04-23', '2021-05-12');
insert into discount (val, beginDate, endDate) values (0.20, '2019-04-17', '2021-05-02');
insert into discount (val, beginDate, endDate) values (0.30, '2018-05-10', '2021-05-26');
insert into discount (val, beginDate, endDate) values (0.40, '2018-06-14', '2021-06-18');
insert into discount (val, beginDate, endDate) values (0.50, '2019-07-04', '2021-07-16');

/* discount product */

insert into discount_product (product_id, discount_id) values (1, 1);
insert into discount_product (product_id, discount_id) values (2, 2);
insert into discount_product (product_id, discount_id) values (3, 3);
insert into discount_product (product_id, discount_id) values (4, 4);
insert into discount_product (product_id, discount_id) values (5, 5);
insert into discount_product (product_id, discount_id) values (6, 1);
insert into discount_product (product_id, discount_id) values (7, 1);
insert into discount_product (product_id, discount_id) values (8, 2);
insert into discount_product (product_id, discount_id) values (9, 1);
insert into discount_product (product_id, discount_id) values (26, 5);
insert into discount_product (product_id, discount_id) values (18, 5);
insert into discount_product (product_id, discount_id) values (25, 5);
insert into discount_product (product_id, discount_id) values (24, 4);
insert into discount_product (product_id, discount_id) values (14, 5);
insert into discount_product (product_id, discount_id) values (28, 3);
insert into discount_product (product_id, discount_id) values (19, 4);

/* image_product */

insert into image_product (product_id, image_id) values (1, 10);
insert into image_product (product_id, image_id) values (2, 11);
insert into image_product (product_id, image_id) values (2, 28);
insert into image_product (product_id, image_id) values (3, 12);
insert into image_product (product_id, image_id) values (4, 13);
insert into image_product (product_id, image_id) values (5, 14);
insert into image_product (product_id, image_id) values (6, 15);
insert into image_product (product_id, image_id) values (7, 16);
insert into image_product (product_id, image_id) values (8, 17);
insert into image_product (product_id, image_id) values (9, 18);
insert into image_product (product_id, image_id) values (10, 19);
insert into image_product (product_id, image_id) values (11, 20);

insert into image_product (product_id, image_id) values (12, 29);
insert into image_product (product_id, image_id) values (13, 30);
insert into image_product (product_id, image_id) values (14, 31);
insert into image_product (product_id, image_id) values (15, 32);
insert into image_product (product_id, image_id) values (16, 33);
insert into image_product (product_id, image_id) values (17, 34);
insert into image_product (product_id, image_id) values (18, 35);
insert into image_product (product_id, image_id) values (19, 36);
insert into image_product (product_id, image_id) values (20, 37);
insert into image_product (product_id, image_id) values (21, 38);
insert into image_product (product_id, image_id) values (22, 39);
insert into image_product (product_id, image_id) values (23, 40);
insert into image_product (product_id, image_id) values (24, 41);
insert into image_product (product_id, image_id) values (25, 42);
insert into image_product (product_id, image_id) values (26, 43);
insert into image_product (product_id, image_id) values (27, 44);
insert into image_product (product_id, image_id) values (28, 45);
insert into image_product (product_id, image_id) values (29, 46);
insert into image_product (product_id, image_id) values (30, 47);



/* rating */
--temp to test create comment
insert into rating (user_id, product_id, content, val) values ('2', '24', 'good phone', '3');
insert into rating (user_id, product_id, content, val) values ('2', '24', 'yess!! i love it', '4');
insert into rating (user_id, product_id, content, val) values ('2', '25', 'bad quality!', '5'); 
insert into rating (user_id, product_id, content, val) values ('1', '23', 'ok', '4');
insert into rating (user_id, product_id, content, val) values ('6', '29', 'terrible', '4'); 
