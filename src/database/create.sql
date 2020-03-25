create table if not exists users (
	id serial primary key,
	name text not null,
	email text unique not null,
	birthDate date not null,
	pass text not null
);

create table if not exists admins (
	id integer primary key references users(id) on delete cascade
);

create table if not exists faq (
	id serial primary key,
	question text not null unique,
	answer text not null
);

create table if not exists address (
	id serial primary key,
	street text not null,
	postalCode text not null,
	country text not null,
	city text not null,
	userID integer not null unique references users(id) on delete cascade
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

create table if not exists specs(
	id serial primary key,
	screenSize double precision not null,
	cameraRes integer not null,
	ram integer not null,
	battery integer not null,
	os text not null,
	"storage" integer not null,
	cpu text not null,
	gpu text not null,
	screenRes double precision not null,
	headphoneJack boolean not null,
	weight double precision not null,
	waterResRat text not null,
	fingerprintType text not null,
	constraint screenSize check (screenSize > (0)::double precision),
	constraint cameraRes check (cameraRes > 0),
	constraint ram check (ram > 0),
	constraint battery check (battery > 0),
	constraint "storage" check ("storage" > 0),
	constraint screenRes check (screenRes > (0)::double precision),
	constraint weight check (weight > (0)::double precision)
);

create table if not exists product (
	id serial primary key,
	stock integer not null, 
	price double precision not null, 
	model text not null,
	category text not null,
	brandID integer not null references brand(id) on delete cascade,
	specsID integer not null references specs(id) on delete cascade,
	constraint stock check (stock > 0),
	constraint price check (price > (0)::double precision),
	constraint category check ((category = any (array['Phones'::text, 'Tablets'::text])))
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
	pState text not null,
	constraint pState check ((pState = any (array['Aguarda Pagamento'::text, 'Em Processamento'::text, 'Enviada'::text])))
);

create table if not exists payment(
	id serial primary key,
	"type" text not null
	constraint "type" check (("type" = any(array['Tranferencia Bancaria'::text, 'Paypal'::text])))
);

create table if not exists purchase(
	productID integer references product(id) on delete cascade,
	userID integer references users(id) on delete cascade,
	val double precision not null,
	statusID integer not null references purchaseState(id) on delete cascade,
	paid integer not null references payment(id) on delete cascade,
	constraint val check (val > (0)::double precision),
	primary key(productID, userID)
);

create table if not exists discount(
	id serial primary key,
	val double precision not null,
	beginDate date not null,
	endDate date not null,
	constraint val check (val > (0)::double precision and val < (1)::double precision),
	constraint endDate check (endDate > beginDate)
);

create table if not exists discountProduct(
	productID integer references product(id) on delete cascade,
	discountID integer references discount(id) on delete cascade,
	primary key(productID, discountID)
);

create table if not exists image_product(
	productID integer references product(id) on delete cascade,
	imageID integer references image(id) on delete cascade,
	primary key(productID, imageID)
);

