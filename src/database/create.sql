create table if not exists users (
	uid integer primary key,
	name text not null,
	email text unique not null,
	birthDate date not null,
	pass text not null
);

create table if not exists admins (
	uid integer primary key references users(uid) on delete cascade
);

create table if not exists faq (
	fid integer primary key,
	question text not null unique,
	answer text not null
);

create table if not exists address (
	aid int primary key,
	street text not null,
	postalCode text not null,
	country text not null,
	city text not null,
	uid integer not null unique references users(uid) on delete cascade
);

create table if not exists product (
	pid integer primary key,
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
	pid integer primary key references users(pid) on delete cascade,
	uid integer not null references users(uid) on delete cascade,
	val double precision not null,
	constraint val check (val > (0)::double precision and val <= (5)::double precision)
);

--comment and comments are reserved words... sorry
create table if not exists coments (
	cid integer primary key,
	"content" text not null,
	pid integer not null unique references product(pid) on delete cascade
);

create table if not exists cart (
	pid integer references product(pid) on delete cascade,
	uid integer references users(uid) on delete cascade,
	quant integer not null,
	constraint quant check (quant > 0),
	primary key(pid, uid)
);

create table if not exists wishlist(
	pid integer references product(pid) on delete cascade,
	uid integer references users(uid) on delete cascade,
	primary key(pid, uid)
);

create table if not exists history(
	pid integer references product(pid) on delete cascade,
	uid integer references users(uid) on delete cascade,
	purchaseDate date not null,
	primary key(pid, uid)
);

create table if not exists purchase(
	pid integer references product(pid) on delete cascade,
	uid integer references users(uid) on delete cascade,
	val double precision not null,
	eid integer not null references purchaseState(eid) on delete cascade,
	paid integer not null references payment(paid) on delete cascade,
	constraint val check (val > (0)::double precision),
	primary key(pid, uid)
);

create table if not exists purchaseState(
	eid integer primary key,
	stateChangedate date not null,
	coment text,
	pState text not null,
	constraint pState check ((pState = any (array['Aguarda Pagamento'::text, 'Em Processamento'::text, 'Enviada'::text])))
);

create table if not exists payment(
	paid integer primary key,
	"type" text not null
	constraint "type" check (("type" = any(array['Tranferencia Bancaria'::text, 'Paypal'::text])))
);

create table if not exists disCounts(
	pid integer references product(pid) on delete cascade,
	did integer references discount(did) on delete cascade,
	primary key(pid, did)
);

create table if not exists discount(
	did integer primary key,
	val double precision not null,
	beginDate date not null,
	endDate date not null,
	constraint val check (val > (0)::double precision and val < (1)::double precision),
	constraint endDate check (endDate > beginDate)
);