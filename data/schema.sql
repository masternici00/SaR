create Database SaR;

use SaR;

create Table user(id int primary key auto_increment not null, firstname varchar(45), lastname varchar(45), username varchar(45), password varchar(100));

create Table password(id int primary key auto_increment not null, konto varchar(45), username varchar(45), password varchar(45), comment varchar(100));
