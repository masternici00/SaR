create Database SaR;

use SaR;

create Table user(id int primary key auto_increment not null, firstname varchar(45), lastname varchar(45), username varchar(45), passwort varchar(20));

create Table passwort(id int primary key auto_increment not null, user_id int, konto varchar(45), username varchar(45), passwort varchar(45), comment varchar(100),
foreign key (user_id) references user (id));
