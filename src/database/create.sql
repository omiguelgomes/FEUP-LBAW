create table if not exists users (
	uid serial primary key,
	name text not null,
	email text unique not null,
	birthDate date not null,
	pass text not null
);

create table if not exists admins (
	uid serial primary key references users(uid) on delete cascade
);

create table if not exists faq (
	fid serial primary key,
	question text not null unique,
	answer text not null
);

create table if not exists address (
	aid serial primary key,
	street text not null,
	postalCode text not null,
	country text not null,
	city text not null,
	uid integer not null unique references users(uid) on delete cascade
);

create table if not exists image(
	iid serial primary key,
	description text not null,
	path text not null
);

create table if not exists brands(
	mid serial primary key,
	"name" text not null,
	iid integer unique not null references image(iid) on delete cascade
);

create table if not exists specs(
	esid serial primary key,
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
	pid serial primary key,
	stock integer not null, 
	price double precision not null, 
	model text not null,
	category text not null,
	mid integer not null references brands(mid) on delete cascade,
	esid integer not null references specs(esid) on delete cascade,
	constraint stock check (stock > 0),
	constraint price check (price > (0)::double precision),
	constraint category check ((category = any (array['Phones'::text, 'Tablets'::text])))
);

create table if not exists eval (
	pid serial primary key references product(pid) on delete cascade,
	uid integer not null references users(uid) on delete cascade,
	val double precision not null,
	constraint val check (val > (0)::double precision and val <= (5)::double precision)
);

--comment and comments are reserved words... sorry
create table if not exists coments (
	cid serial primary key,
	"content" text not null,
	pid integer not null unique references product(pid) on delete cascade
);

create table if not exists cart (
	pid serial references product(pid) on delete cascade,
	uid serial references users(uid) on delete cascade,
	quant integer not null,
	constraint quant check (quant > 0),
	primary key(pid, uid)
);

create table if not exists wishlist(
	pid serial references product(pid) on delete cascade,
	uid serial references users(uid) on delete cascade,
	primary key(pid, uid)
);

create table if not exists history(
	pid serial references product(pid) on delete cascade,
	uid serial references users(uid) on delete cascade,
	purchaseDate date not null,
	primary key(pid, uid)
);

create table if not exists purchaseState(
	eid serial primary key,
	stateChangedate date not null,
	coment text,
	pState text not null,
	constraint pState check ((pState = any (array['Aguarda Pagamento'::text, 'Em Processamento'::text, 'Enviada'::text])))
);

create table if not exists payment(
	paid serial primary key,
	"type" text not null
	constraint "type" check (("type" = any(array['Tranferencia Bancaria'::text, 'Paypal'::text])))
);

create table if not exists purchase(
	pid serial references product(pid) on delete cascade,
	uid serial references users(uid) on delete cascade,
	val double precision not null,
	eid integer not null references purchaseState(eid) on delete cascade,
	paid integer not null references payment(paid) on delete cascade,
	constraint val check (val > (0)::double precision),
	primary key(pid, uid)
);

create table if not exists discount(
	did serial primary key,
	val double precision not null,
	beginDate date not null,
	endDate date not null,
	constraint val check (val > (0)::double precision and val < (1)::double precision),
	constraint endDate check (endDate > beginDate)
);

create table if not exists disCounts(
	pid serial references product(pid) on delete cascade,
	did serial references discount(did) on delete cascade,
	primary key(pid, did)
);

create table if not exists image_product(
	pid serial references product(pid) on delete cascade,
	iid serial references image(iid) on delete cascade,
	primary key(pid, iid)
);

create table if not exists specs(
	esid serial primary key,
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