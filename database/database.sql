PRAGMA foreign_key = on;
DROP TABLE IF EXISTS account;
CREATE TABLE account(
	username VARCHAR(16) PRIMARY KEY NOT NULL,
	password VARCHAR(33) NOT NULL,
	email VARCHAR(254),
	name VARCHAR(100),
	birth DATE,
	city VARCHAR(50),
	country VARCHAR(50),
	description VARCHAR(256),
	type VARCHAR(10),
	image VARCHAR(32) DEFAULT 'generic_user.png'
);

DROP TABLE IF EXISTS reviews;
CREATE TABLE reviews(
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	username VARCHAR REFERENCES account(username),
	restaurant_id INTEGER REFERENCES restaurants(id),
	review_date DATETIME NOT NULL,
	review_text VARCHAR(5000) NOT NULL,
	score INTEGER NOT NULL,
	CHECK(score > 0),
	CHECK(score <= 10)
);

DROP TABLE IF EXISTS restaurants;
CREATE TABLE restaurants(
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	owner_id VARCHAR(16) REFERENCES account(username) NOT NULL,
	name VARCHAR(50) NOT NULL,
	phone INTEGER(15),
	email VARCHAR(254),
	address VARCHAR(100) NOT NULL,
	city VARCHAR(50) NOT NULL,
	country VARCHAR(50) NOT NULL,
	average_price INTEGER(15) NOT NULL,
	description VARCHAR(1000),
	average_score INTEGER DEFAULT 5,
	image VARCHAR(32) DEFAULT 'generic_rest.png'
);

DROP TABLE IF EXISTS comments;
CREATE TABLE comments(
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	username VARCHAR(32) REFERENCES account(username) NOT NULL,
	review_id INTEGER REFERENCES reviews(id) NOT NULL,
	comment_date DATETIME NOT NULL,
	comment_text VARCHAR(1000) NOT NULL
);

CREATE TRIGGER update_score AFTER INSERT ON reviews
FOR EACH ROW
BEGIN
    UPDATE restaurants SET average_score = 
    (SELECT AVG(score)
     FROM reviews
     WHERE reviews.restaurant_id = NEW.restaurant_id)
    WHERE restaurants.id = NEW.restaurant_id;
END;

CREATE TRIGGER update_user_reviews AFTER DELETE ON restaurants
FOR EACH ROW
BEGIN
	DELETE FROM reviews
	WHERE reviews.restaurant_id = OLD.id;
END;

INSERT INTO account (username,password,email,name,birth,city,country,type,description) VALUES
('Jorge77','81dc9bdb52d04dc20036dbd8313ed055','jorge77@gmail.com','Jorge','1977-10-28','Porto','Portugal','owner','Ola sou o Jorge gosto muito de peixe,venham ver o meu restaurante!'),
('Josefin4','81dc9bdb52d04dc20036dbd8313ed055','josefina_4@gmail.com','Josefina','1992-10-25','Lisboa','Portugal','reviewer','Sou a Josefina!'),
('Reviewz','81dc9bdb52d04dc20036dbd8313ed055','reviewzzz@hotmail.com','Carlos','1989-10-22','Porto','Portugal','reviewer','Faço reviews de muitos restaurantes em Portugal, e poucos me surpreendem.'),
('Nunoo','81dc9bdb52d04dc20036dbd8313ed055','nunoOoO@gmail.com','Nuno','1983-10-21','Chaves','Portugal','reviewer',null),
('Ambrosio47','81dc9bdb52d04dc20036dbd8313ed055','ambrosio@hotmail.com','Ambrosio','1947-05-21','Porto','Portugal','reviewer','Sou o Ambrosio e possuo uma vasta cadeia de restaurantes.Visite-nos um dia!');



INSERT INTO restaurants (owner_id,name,phone,email,address,city,country,average_price,description) VALUES
	('Ambrosio47','D. Tonho',221236543,'dtonho@gmail.com','Cais da Ribeira','Porto','Portugal',17,'Venha-nos visitar, o nosso bacalhau, cabrito, enchidos, trutas e francesinhas são do melhor!'),
	('Ambrosio47','Restaurante Carpa',221234566,'restcarpaa@hotmail.com','Avenida da Republica','Porto','Portugal',15,null),
	('Ambrosio47','Lisboa Marina',221234566,'lmarina@hotmail.com','Parque das nações','Lisboa','Portugal',20,'Temos os melhores cocktails!'),
	('Ambrosio47','Casa da Comida',221234566,'casadacomida@gmail.com','Travessa das Amoreiras','Lisboa','Portugal',30,'Os melhores pratos portugueses'),
	('Jorge77','Restaurante Avo Maria',null,null,'Cais da Ribeira','Porto','Portugal',20,'Temos do melhor peixe!');

INSERT INTO reviews (username,restaurant_id,review_date,review_text,score) VALUES 
('Josefin4',5,'2016-08-25','Estava muito bom, e o ambiente era adequado aos pratos servidos, recomendo!',9),
('Josefin4',2,'2016-08-20','Foi uma boa experiencia embora o serviço tenha demorado bastante.',5),
('Reviewz',5,'2016-08-20','O peixe que me foi servido estava quase podre, nunca mais aqui volto.',3),
('Reviewz',2,'2016-08-20','Estive 43 minutos à espera, e a comida que me foi servida era repugnante',2),
('Reviewz',1,'2016-08-20','O restaurante tem uma boa vista, mas não tão boa comida',4),
('Reviewz',4,'2016-08-20','Nada mau',6),
('Nunoo',3,'2016-08-20','Bastante bom.',10);

INSERT INTO comments (username,review_id,comment_date,comment_text) VALUES
('Jorge77',3,'2016-08-21','Nunca foi antes reportado tal, as nossas desculpas pelo sucedido.'),
('Ambrosio47',4,'2016-08-22','O nosso restaurante teve muitos clientes nesse dia, pelo que houve alguns descuidos.Não voltará a acontecer!'),
('Reviewz',4,'2016-08-23','Espero que não!'),
('Ambrosio47',7,'2016-09-23','Muito obrigado!');

