
create database tech_motors;
use tech_motors;

create table usuario(
user_id int auto_increment primary key,
user_rank varchar(5) not null,
user_name varchar(30),
user_last_name varchar(30),
user_nick varchar(30) not null,
user_mail varchar(100),
user_pass varchar(20) not null,
user_bday date,
user_number varchar(20),
user_cpf char(11) not null,

constraint un_user_nick unique(user_nick),
constraint un_user_mail unique(user_mail),
constraint un_user_cpf unique(user_cpf)
);

create table brand(
brand_id int auto_increment primary key,
brand_name varchar(30),

constraint un_brand_name unique(brand_name)
);

create table oil_cod(
oil_id int auto_increment primary key,
oil_cod varchar(10) not null,

constraint un_oil_cod unique (oil_cod)
);


create table model(
model_id int auto_increment primary key,
model_name varchar(30) not null,
model_cc int not null,
model_oil_km int not null,

oil_id int not null,
brand_id int not null,

constraint un_model_name unique(model_name),

constraint fk_brand_id foreign key(brand_id) references brand(brand_id),
constraint fk_oil_id foreign key(oil_id) references oil_cod(oil_id)
);

create table moto_user(
moto_id int auto_increment primary key,
moto_nick varchar(25) not null,
moto_year_fab varchar(4) not null,
moto_year_mod varchar(4) not null,
moto_color varchar(10) not null,
moto_plate varchar(10) not null,
moto_desc varchar(280),

model_id int not null,
oil_id int not null,
user_id int not null,

constraint fk_user__model_id foreign key(model_id) references model(model_id),
constraint fk_user_oil_id foreign key(oil_id) references model(oil_id),
constraint fk_user__user_id foreign key(user_id) references usuario(user_id)

);

create table service(
service_id int auto_increment primary key,
service_price int not null,
service_type varchar(10) not null,
service_desc varchar(280),

moto_id int,

constraint fk_service_moto_id foreign key(moto_id) references moto_user(moto_id)

);


insert into usuario(user_rank,user_nick,user_pass,user_cpf) values("owner","Owner acount","owner_1234","11122233345");
