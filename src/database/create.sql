--cleaning database
drop domain if exists today;
drop type if exists category_type cascade;
drop type if exists purchase_state cascade;
drop type if exists pay_method cascade;

drop function if exists add_review() cascade;
drop function if exists check_stock() cascade;
drop function if exists clear_cart() cascade;
drop function if exists remove_wishlist() cascade;
drop function if exists update_stock() cascade;

drop trigger if exists add_review on eval;
drop trigger if exists check_stock on product_purchase;
drop trigger if exists clear_cart on purchase;
drop trigger if exists remove_wishlist on purchase;
drop trigger if exists update_stock on product_purchase;

drop table if exists users cascade;
drop table if exists faq cascade;
drop table if exists country cascade;
drop table if exists city cascade;
drop table if exists address cascade;
drop table if exists image cascade;
drop table if exists brand cascade;
drop table if exists cpu cascade;
drop table if exists ram cascade;
drop table if exists waterResRat cascade;
drop table if exists os cascade;
drop table if exists gpu cascade;
drop table if exists screenSize cascade;
drop table if exists weight cascade;
drop table if exists storage cascade;
drop table if exists battery cascade;
drop table if exists screenRes cascade;
drop table if exists cameraRes cascade;
drop table if exists fingerprintType cascade;
drop table if exists product cascade;
drop table if exists eval cascade;
drop table if exists coment cascade;
drop table if exists cart cascade;
drop table if exists wishlist cascade;
drop table if exists history cascade;
drop table if exists purchaseState cascade;
drop table if exists payment cascade;
drop table if exists purchase cascade;
drop table if exists discount cascade;
drop table if exists discount_product cascade;
drop table if exists image_product cascade;
drop table if exists product_purchase cascade;

drop index if exists email_users;
drop index if exists user_address;
drop index if exists product_reviews;

-------------------------------------------------------------------
--domain and type definition
-------------------------------------------------------------------
create domain TODAY as date not null default ('now'::text)::date;
create type category_type as enum ('Phones', 'Tablets');
create type purchase_state as enum ('Aguarda Pagamento', 'Em Processamento', 'Enviada');
create type pay_method as enum ('Tranferencia Bancaria', 'Paypal');


-------------------------------------------------------------------
--create tables
-------------------------------------------------------------------
create table users
(
    id        serial primary key,
    name      text        not null,
    email     text unique not null,
    birthDate date        not null,
    pass      text        not null,
    isAdmin   boolean default false
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
    countryID integer not null references country (id) on delete cascade
);

create table address
(
    id         serial primary key,
    street     text    not null,
    postalCode text    not null,
    userID     integer not null unique references users (id) on delete cascade,
    cityID     integer not null references city (id) on delete cascade,
    countryID  integer not null references country (id) on delete cascade
);

create table image
(
    id          serial primary key,
    description text not null,
    path        text not null
);

create table brand
(
    id      serial primary key,
    "name"  text           not null,
    imageID integer unique not null references image (id) on delete cascade
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
    value integer not null,
    constraint value check (value > 0)
);

create table waterResRat
(
    id    serial primary key,
    value text not null
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

create table screenSize
(
    id    serial primary key,
    value double precision not null,
    constraint value check (value > (0)::double precision)
);

create table weight
(
    id    serial primary key,
    value double precision not null,
    constraint value check (value > (0)::double precision)
);

create table storage
(
    id    serial primary key,
    value integer not null,
    constraint value check (value > 0)
);

create table battery
(
    id    serial primary key,
    value integer not null,
    constraint value check (value > 0)
);

create table screenRes
(
    id    serial primary key,
    value double precision not null
        constraint value check (value > (0)::double precision)
);

create table cameraRes
(
    id    serial primary key,
    value double precision not null,
    constraint value check (value > (0)::double precision)
);

create table fingerprintType
(
    id    serial primary key,
    value text not null
);

create table product
(
    id                serial primary key,
    stock             integer          not null,
    price             double precision not null,
    model             text             not null,
    category          category_type    not null,
    brandID           integer          not null references brand (id) on delete cascade,
    cpuID             integer          not null references cpu (id) on delete cascade,
    ramID             integer          not null references ram (id) on delete cascade,
    waterResID        integer          not null references waterResRat (id) on delete cascade,
    osID              integer          not null references os (id) on delete cascade,
    gpuID             integer          not null references gpu (id) on delete cascade,
    screenSizeID      integer          not null references screenSize (id) on delete cascade,
    weightID          integer          not null references weight (id) on delete cascade,
    storageID         integer          not null references storage (id) on delete cascade,
    batteryID         integer          not null references battery (id) on delete cascade,
    screenResID       integer          not null references screenRes (id) on delete cascade,
    cameraResID       integer          not null references cameraRes (id) on delete cascade,
    fingerprintTypeID integer          not null references fingerprintType (id) on delete cascade,
    constraint stock check (stock > 0),
    constraint price check (price > (0)::double precision)
);

create table eval
(
    id     integer primary key references product (id) on delete cascade,
    userID integer          not null references users (id) on delete cascade,
    val    double precision not null,
    constraint val check (val > (0)::double precision and val <= (5)::double precision)
);

--comment and comments are reserved words... sorry
create table coment
(
    id        serial primary key,
    "content" text    not null,
    productID integer not null unique references product (id) on delete cascade
);

create table cart
(
    productID integer references product (id) on delete cascade,
    userID    integer references users (id) on delete cascade,
    quant     integer not null,
    constraint quant check (quant > 0),
    primary key (productID, userID)
);

create table wishlist
(
    productID integer references product (id) on delete cascade,
    userID    integer references users (id) on delete cascade,
    primary key (productID, userID)
);

create table history
(
    productID    integer references product (id) on delete cascade,
    userID       integer references users (id) on delete cascade,
    purchaseDate date not null,
    primary key (productID, userID)
);

create table purchaseState
(
    id              serial primary key,
    stateChangedate date           not null,
    coment          text,
    pState          purchase_state not null
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
    statusID integer          not null references purchaseState (id) on delete cascade,
    paid     integer          not null references payment (id) on delete cascade,
    userID   integer          not null references users (id) on delete cascade,
    constraint val check (val > (0)::double precision)
);


create table discount
(
    id        serial primary key,
    val       double precision not null,
    beginDate date             not null,
    endDate   date             not null,
    constraint val check (val > (0)::double precision and val < (1)::double precision),
    constraint endDate check (endDate > beginDate),
    constraint beginDate check (beginDate >= ('now'::text)::date)
);

create table discount_product
(
    productID  integer references product (id) on delete cascade,
    discountID integer references discount (id) on delete cascade,
    primary key (productID, discountID)
);

create table image_product
(
    productID integer references product (id) on delete cascade,
    imageID   integer references image (id) on delete cascade,
    primary key (productID, imageID)
);

create table product_purchase
(
    productID  integer references product (id) on delete cascade,
    purchaseID integer references purchase (id) on delete cascade,
    primary key (productID, purchaseID)
);

---------------------------------------------------------------------
--Triggers and UDF
---------------------------------------------------------------------

--Trigger and UDF 1
create function add_review() returns trigger as
$body$
begin
	if not exists(
		select Product.productID
		from purchase, product_purchase as Product, users
		where purchase.id = Product.purchaseID and
		New.userID = purchase.userID and
		New.productID = Product.productID
	)
	then raise exception 'You cannot review a product you have not bought!';
	end if;
	
	return New;
end
$body$
language plpgsql;

create trigger add_review
before insert or update on eval
for each row
execute procedure add_review();


--Trigger and UDF 2
create function check_stock() returns trigger as
$body$
begin
	if not exists(
		select stock from product
		where id = New.productID
		and stock < 1
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
	where userID = New.userID;
end
$body$
language plpgsql;

create trigger clear_cart
after insert on purchase
execute procedure clear_cart();


-- Trigger and UDF 4
create function remove_wishlist() returns trigger as
$body$
begin
	delete from wishlist
	where userID = New.userID
	and productID = New.productID;
end
$body$
language plpgsql;

create trigger remove_wishlist
after insert on cart
execute procedure remove_wishlist();


--Trigger and UDF 5
create function update_stock() returns trigger as
$body$
begin
	update product
	set stock = stock - 1
	where productID = New.productID;
end
$body$
language plpgsql;

create trigger update_stock
after insert on product_purchase
execute procedure update_stock();


-------------------------------------------------------------------
--Indexes
-------------------------------------------------------------------
create index email_users on users using hash (email);
create index user_address on address using hash (userID);
create index product_reviews on eval using hash(id);

/*this deletes all tables*/
/*DROP SCHEMA public CASCADE;
CREATE SCHEMA public;*/
