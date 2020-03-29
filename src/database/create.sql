create domain "TODAY" as date not null default ('now'::text)::date;
create type category_type as enum ('Phones', 'Tablets');
create type purchase_state as enum ('Aguarda Pagamento', 'Em Processamento', 'Enviada');
create type pay_method as enum ('Tranferencia Bancaria', 'Paypal');

create table if not exists users (
	id serial primary key,
	name text not null,
	email text unique not null,
	birthDate date not null,
	pass text not null,
        isAdmin boolean default false
);

create table if not exists faq (
	id serial primary key,
	question text not null unique,
	answer text not null
);

create table if not exists country (
       id serial primary key,
       name text not null unique
);

create table if not exists city (
       id serial primary key,
       name text not null unique,
       countryID integer not null references country(id) on delete cascade
);

create table if not exists address (
	id serial primary key,
	street text not null,
	postalCode text not null,
	userID integer not null unique references users(id) on delete cascade,
        cityIDinteger not null references city(id) on delete cascade,
        countryID integer not null references country(id) on delete cascade
);

create table if not exists image(
	id serial primary key,
	description text not null,
	path text not null
);

create table if not exists brand(
	id serial primary key,
	"name" text not null,
	imageID integer unique not null references image(id) on delete cascade
);

create table if not exists cpu(
       id serial primary key,
       freq double precision not null,
       cores integer not null,
       threads integer not null,
       name text not null unique,
       constraint freq check (freq > (0)::double precision),
       constraint cores check (nucleos > 0),
       constraint threads check (threads > 0)
);

create table if not exists ram(
       id serial primary key,
       value integer not null,
       constraint value check (valor > 0)
);

create table if not exists waterResRat(
       id serial primary key,
       value text not null
);

create table if not exists os(
       id serial primary key,
       name text not null unique
);

create table if not exists gpu(
       id serial primary key,
       name text not null unique,
       vram integer not null,
       constraint vram check (vram > 0)
);

create table if not exists screenSize(
       id serial primary key,
       value double precision not null,
       constraint value check (value > (0)::double precision)
);

create table if not exists weight(
       id serial primary key,
       value double precision not null,
       constraint value check (value > (0)::double precision)
);

create table if not exists storage(
       id serial primary key,
       value integer not null,
       constraint value check (value > 0)
);

create table if not exists battery(
       id serial primary key,
       value integer not null,
       constraint value check (value > 0)
);

create table if not exists screenRes(
       id serial primary key,
       value double precision not null
       constraint value check (value > (0)::double precision)
);

create table if not exists cameraRes(
       id serial primary key,
       value double precision not null,
       constraint value check (value > (0)::double precision)
);

create table if not exists fingerprintType(
       id serial primary key,
       value text not null
);

create table if not exists product (
	id serial primary key,
	stock integer not null, 
	price double precision not null, 
	model text not null,
	category category_type not null,
	brandID integer not null references brand(id) on delete cascade,
        cpuID integer not null references cpu(id) on delete cascade,
        ramID integer not null references ram(id) on delete cascade,
        waterResID integer not null references waterResRat(id) on delete cascade,
        osID integer not null references os(id) on delete cascade,
        gpuID integer not null references gpu(id) on delete cascade,
        screenSizeID integer not null references screenSize(id) on delete cascade,
        weightID integer not null references weight(id) on delete cascade,
        storageID integer not null references storage(id) on delete cascade,
        batteryID integer not null references battery(id) on delete cascade,
        screenResID integer not null references screenRes(id) on delete cascade,
        cameraResID integer not null references cameraRes(id) on delete cascade,
        fingerprintTypeID integer not null references fingerprintType(id) on delete cascade,
	constraint stock check (stock > 0),
	constraint price check (price > (0)::double precision)
);

create table if not exists eval (
	id integer primary key references product(id) on delete cascade,
	userID integer not null references users(id) on delete cascade,
	val double precision not null,
	constraint val check (val > (0)::double precision and val <= (5)::double precision)
);

--comment and comments are reserved words... sorry
create table if not exists coment (
	id serial primary key,
	"content" text not null,
	productID integer not null unique references product(id) on delete cascade
);

create table if not exists cart (
	productID integer references product(id) on delete cascade,
	userID integer references users(id) on delete cascade,
	quant integer not null,
	constraint quant check (quant > 0),
	primary key(productID, userID)
);

create table if not exists wishlist(
	productID integer references product(id) on delete cascade,
	userID integer references users(id) on delete cascade,
	primary key(productID, userID)
);

create table if not exists history(
	productID integer references product(id) on delete cascade,
	userID integer references users(id) on delete cascade,
	purchaseDate date not null,
	primary key(productID, userID)
);

create table if not exists purchaseState(
	id serial primary key,
	stateChangedate date not null,
	coment text,
	pState purchase_state not null
);

create table if not exists payment(
	id serial primary key,
	"type" pay_method not null
);

create table if not exists purchase(
	id serial primary key,
	val double precision not null,
	statusID integer not null references purchaseState(id) on delete cascade,
	paid integer not null references payment(id) on delete cascade,
        userID integer not null references users(id) on delete cascade,
	constraint val check (val > (0)::double precision)
);

create table if not exists product_purchase(
       productID integer references product(id) on delete cascade,
       purchaseID integer references purchase(id) on delete cascade,
       primary key(productID, purchaseID)
);

create table if not exists discount(
	id serial primary key,
	val double precision not null,
	beginDate date not null,
	endDate date not null,
	constraint val check (val > (0)::double precision and val < (1)::double precision),
	constraint endDate check (endDate > beginDate),
        constraint beginDate check (beginDate >= TODAY)
);

create table if not exists discount_product(
	productID integer references product(id) on delete cascade,
	discountID integer references discount(id) on delete cascade,
	primary key(productID, discountID)
);

create table if not exists image_product(
	productID integer references product(id) on delete cascade,
	imageID integer references image(id) on delete cascade,
	primary key(productID, imageID)
);

