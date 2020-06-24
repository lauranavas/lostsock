  
-- CREATE

CREATE TABLE cliente(
	idCliente SERIAL PRIMARY KEY, 
	nombres VARCHAR(25) NOT NULL,
	apellidos VARCHAR(25) NOT NULL,
	email VARCHAR(100) UNIQUE NOT NULL,
	telefono CHAR(9) UNIQUE NOT NULL,
	usuario VARCHAR(25) UNIQUE NOT NULL,
	clave VARCHAR(100) NOT NULL,
	imagen VARCHAR(100) DEFAULT 'default.png',
	estado BIT DEFAULT '1'
);

CREATE TABLE talla(
	idTalla SERIAL PRIMARY KEY,
	talla VARCHAR(5) NOT NULL
);

CREATE TABLE categoria(
	idCategoria SERIAL PRIMARY KEY,
	categoria VARCHAR(25) NOT NULL
);


CREATE TABLE estadoCompra(
	idEstadoCompra SERIAL PRIMARY KEY, 
	estado VARCHAR(15) NOT NULL
);

CREATE TABLE departamento(
	idDepartamento SERIAL PRIMARY KEY,
	departamento VARCHAR(20) NOT NULL,
	costoEnvio NUMERIC(5,2) 
);


CREATE TABLE tipoProducto(
	idTipoProducto SERIAL PRIMARY KEY,
	tipo VARCHAR(30) NOT NULL
);

CREATE TABLE tipoUsuario(
	idTipoUsuario SERIAL PRIMARY KEY,
	tipo VARCHAR(25) NOT NULL
);

CREATE TABLE frecuencia(
	idFrecuencia SERIAL PRIMARY KEY, 
	frecuencia VARCHAR(25) NOT NULL
);

CREATE TABLE direccion(
	idDireccion SERIAL PRIMARY KEY,
	detalleDireccion VARCHAR(200) NOT NULL,
	idDepartamento INTEGER REFERENCES departamento(idDepartamento),
	idCliente INTEGER REFERENCES cliente(idCliente)
);

CREATE TABLE administrador(
	idAdministrador SERIAL PRIMARY KEY,
	nombres VARCHAR(25) NOT NULL,
	apellidos VARCHAR(25) NOT NULL,
	email VARCHAR(100) NOT NULL,
	usuario VARCHAR(25) NOT NULL,
	clave VARCHAR(100) DEFAULT 'LostSock20$20' NOT NULL ,
	estado BIT DEFAULT '1',
	idTipoUsuario INTEGER REFERENCES tipoUsuario(idTipoUsuario)
);

CREATE TABLE producto(
	idProducto SERIAL PRIMARY KEY,
	nombre VARCHAR(75) NOT NULL,
	descripcion VARCHAR(200) NOT NULL,
	precio NUMERIC (5,2) NOT NULL,
	descuento NUMERIC(2) DEFAULT '0',
	imagen VARCHAR(50) DEFAULT 'default.png',
	idCategoria INTEGER REFERENCES categoria(idCategoria),
	idTipoProducto INTEGER REFERENCES tipoProducto(idTipoProducto)
);

CREATE TABLE detalleProducto(
	idDetalleProducto SERIAL PRIMARY KEY,
	existencia INTEGER NOT NULL,
	idTalla INTEGER REFERENCES talla(idTalla),
	idProducto INTEGER REFERENCES producto(idProducto)
);

CREATE TABLE compra(
	idCompra SERIAL PRIMARY KEY,
	fechaCompra DATE NOT NULL,
	fechaEnvio DATE NOT NULL,
	total NUMERIC(6,2) NOT NULL,
	idEstadoCompra INTEGER REFERENCES estadoCompra(idEstadoCompra),
	idCliente INTEGER REFERENCES cliente(idCliente),
	idDireccion INTEGER REFERENCES direccion(idDireccion)
);

CREATE TABLE color(
	idColor SERIAL PRIMARY KEY,
	color VARCHAR(20) NOT NULL
);

CREATE TABLE detalleCompra(
	idDetalleCompra SERIAL PRIMARY KEY,
	cantidad INTEGER NOT NULL,
	precio NUMERIC(6,2) NOT NULL,
	idProducto INTEGER REFERENCES producto(idProducto)NOT NULL,
	idCompra INTEGER REFERENCES compra(idCompra)NOT NULL,
	idTalla INTEGER REFERENCES talla(idTalla)NOT NULL
);

CREATE TABLE comentario(
	idComentario SERIAL PRIMARY KEY,
	comentario VARCHAR(150) NOT NULL,
	fecha DATE NOT NULL,
	calificacion INTEGER NOT NULL,
	estado BIT DEFAULT '1',
	idDetalleCompra INTEGER REFERENCES detalleCompra(idDetalleCompra)
);

CREATE TABLE planSuscripcion(
	idPlanSuscripcion SERIAL PRIMARY KEY,
	cantidadPares INTEGER NOT NULL,
	precio NUMERIC(5,2) NOT NULL
);

CREATE TABLE suscripcion(
	idSuscripcion SERIAL PRIMARY KEY,
	estado BIT DEFAULT '1',
	fecha DATE NOT NULL,
	idTalla INTEGER REFERENCES talla(idTalla),
	idFrecuencia INTEGER REFERENCES frecuencia(idFrecuencia),
	idCategoria INTEGER REFERENCES categoria(idCategoria),
	idCliente INTEGER REFERENCES cliente(idCliente),
	idPlanSuscripcion INTEGER REFERENCES planSuscripcion(idPlanSuscripcion),
	idTipoProducto INTEGER REFERENCES tipoProducto(idTipoProducto),
	idDireccion INTEGER REFERENCES direccion(idDireccion)
);

-- Función requerida para que se muestre el mes a partir de la fecha

CREATE OR REPLACE FUNCTION to_month(double precision) RETURNS varchar AS
$$
    SELECT to_char(to_timestamp(to_char($1, '999'), 'MM'), 'Month');
$$ LANGUAGE SQL;


-- INSERT


INSERT INTO tipoUsuario
VALUES	(DEFAULT, 'Superadministrador'),
		(DEFAULT, 'Administrador');

INSERT INTO tipoProducto
VALUES	(DEFAULT, 'Calcetas'),
		(DEFAULT, 'Calcetines'),
		(DEFAULT, 'Calcetines deportivas'),
		(DEFAULT, 'Calcetines gruesos'),
		(DEFAULT, 'Medias altas');

INSERT INTO talla VALUES (DEFAULT, 'S');
INSERT INTO talla VALUES (DEFAULT, 'M');
INSERT INTO talla VALUES (DEFAULT, 'L');
		
INSERT INTO categoria 
VALUES	(DEFAULT, 'Mujer'),
		(DEFAULT, 'Hombre'),
		(DEFAULT, 'Niños'),
		(DEFAULT, 'Mixtos'),
		(DEFAULT, 'Edición limitada');

INSERT INTO estadoCompra 
VALUES	(DEFAULT, 'En proceso'),
		(DEFAULT, 'Cancelada'),
		(DEFAULT, 'Enviada'),
		(DEFAULT, 'Finalizada'),
		(DEFAULT, 'Iniciada');

INSERT INTO planSuscripcion
VALUES	(DEFAULT, 1, 5.00),
		(DEFAULT, 2, 10.00),
		(DEFAULT, 3, 15.00);

INSERT INTO departamento 
VALUES	(DEFAULT, 'San Salvador', 0.00),
		(DEFAULT, 'Chalatenango', 0.50),
		(DEFAULT, 'La Libertad', 2.50),
		(DEFAULT, 'Santa Ana', 3.50),
		(DEFAULT, 'San Miguel', 1.50);

INSERT INTO frecuencia
VALUES	(DEFAULT, 'Mensual'),
		(DEFAULT, 'Trimestral'),
		(DEFAULT, 'Cuatrimestral'),
		(DEFAULT, 'Bimensual'),
		(DEFAULT, 'Quincenal');

INSERT INTO administrador
VALUES	(DEFAULT, 'Jason Anthony ', 'Peraza Cruz', 'jasonapcx@gmail.com', 'jasonperaza', '$2y$10$dhPILZIJgBKY4x5GaOLDsuQV56JCb1zpKtjL6cQTLpy5RicBJmWeO' ,DEFAULT, '1'),
		(DEFAULT, 'Laura Ana', 'Cañas Navas', 'lauranavasv@gmail.com', 'lauranavas', '$2y$10$dhPILZIJgBKY4x5GaOLDsuQV56JCb1zpKtjL6cQTLpy5RicBJmWeO',DEFAULT, '1');

INSERT INTO cliente 
VALUES	(DEFAULT, 'Jason Anthony', 'Peraza Cruz', 'japc@gmail.com', '7878-9562', 'jasonpcx', '$2y$10$dhPILZIJgBKY4x5GaOLDsuQV56JCb1zpKtjL6cQTLpy5RicBJmWeO', DEFAULT, DEFAULT),
		(DEFAULT, 'Ana Laura', 'Navas Cañas', 'luunavasv@gmail.com', '7957-0450', 'luunavasv', '$2y$10$dhPILZIJgBKY4x5GaOLDsuQV56JCb1zpKtjL6cQTLpy5RicBJmWeO', DEFAULT, DEFAULT),
		(DEFAULT, 'Yoselin Abigail', 'Navas Cañas', 'yanavasv@gmail.com', '7967-4338', 'yanavasv', '$2y$10$dhPILZIJgBKY4x5GaOLDsuQV56JCb1zpKtjL6cQTLpy5RicBJmWeO', DEFAULT, DEFAULT),
		(DEFAULT, 'David José', 'Navas Cañas', 'djnavas@gmail.com', '7452-3010', 'djnavasv', '$2y$10$dhPILZIJgBKY4x5GaOLDsuQV56JCb1zpKtjL6cQTLpy5RicBJmWeO', DEFAULT, DEFAULT),
		(DEFAULT, 'Alba Milagro', 'Cañas de Navas', 'alba@gmail.com', '7033-6064', 'albacanas', '$2y$10$dhPILZIJgBKY4x5GaOLDsuQV56JCb1zpKtjL6cQTLpy5RicBJmWeO', DEFAULT, DEFAULT),
		(DEFAULT, 'José David', 'Navas Chavarría', 'david@gmail.com', '6153-2318', 'davidnavas', '$2y$10$dhPILZIJgBKY4x5GaOLDsuQV56JCb1zpKtjL6cQTLpy5RicBJmWeO', DEFAULT, DEFAULT),
		(DEFAULT, 'Sofía Camila', 'Navas Perla', 'sofi@gmail.com', '7020-6064', 'sofianavas', '$2y$10$dhPILZIJgBKY4x5GaOLDsuQV56JCb1zpKtjL6cQTLpy5RicBJmWeO', DEFAULT, DEFAULT),
		(DEFAULT, 'Angela Isabel', 'Navas Perla', 'alita@gmail.com', '7033-7064', 'alitanavas', '$2y$10$dhPILZIJgBKY4x5GaOLDsuQV56JCb1zpKtjL6cQTLpy5RicBJmWeO', DEFAULT, DEFAULT),
		(DEFAULT, 'Rafael Alejandro','Anaya Romero','rafael@gmail.com','7845-1304','rufux','$2y$10$dhPILZIJgBKY4x5GaOLDsuQV56JCb1zpKtjL6cQTLpy5RicBJmWeO',DEFAULT, DEFAULT),
		(DEFAULT, 'Juan Carlos', 'Anaya Rodriguez', 'juan@gmail.com', '7815-6714', 'juananaya', '$2y$10$dhPILZIJgBKY4x5GaOLDsuQV56JCb1zpKtjL6cQTLpy5RicBJmWeO', DEFAULT, DEFAULT),
		(DEFAULT, 'Marcos Javier', 'Hernandez Menjivar', 'marcos@hernandez.com', '7754-1264', 'marcosdvm', '$2y$10$dhPILZIJgBKY4x5GaOLDsuQV56JCb1zpKtjL6cQTLpy5RicBJmWeO', DEFAULT, DEFAULT),
		(DEFAULT, 'Victor Alejandro', 'Ventura de Paz', 'victor@ventura.com', '6678-4983', 'victorventura', '$2y$10$dhPILZIJgBKY4x5GaOLDsuQV56JCb1zpKtjL6cQTLpy5RicBJmWeO', DEFAULT, DEFAULT),
		(DEFAULT, 'Marcos Benjamin','Granillo Flores','marcos@gmail.com','7934-5127','marcosgranillo','$2y$10$dhPILZIJgBKY4x5GaOLDsuQV56JCb1zpKtjL6cQTLpy5RicBJmWeO',DEFAULT, DEFAULT);

INSERT INTO direccion
VALUES	(DEFAULT, 'Final autopista nte. y quinta avenida nte.', 1, 1),
		(DEFAULT, 'Calle Siempreviva, casa 203', 2, 2),
		(DEFAULT, 'Urbanización Maquillishuat, casa 201', 3, 3),
		(DEFAULT, 'PLAZA CONSTITUCION NO. 1, Depto 4', 5, 4),
		(DEFAULT, 'AV. LIC. VICENTE AGUIRRE, Depto 3', 4, 5),
		(DEFAULT, 'PLAZA JUAREZ NO.1, Depto 15', 2, 6),
		(DEFAULT, 'AVENIDA NIÑOS HEROES NO. 3, Depto 21', 3, 7);
		
INSERT INTO producto VALUES	(DEFAULT, 'Cat Sock', 'Divertidos calcetines con un llamativo patron de gatos', 5.00, DEFAULT, DEFAULT, 1, 1);
INSERT INTO producto VALUES	(DEFAULT, 'Banana Sock', 'Divertidos calcetines con un llamativo patron de bananas', 5.00, DEFAULT, DEFAULT, 2, 2);
INSERT INTO producto VALUES	(DEFAULT, 'Happy Face Sock', 'Divertidos calcetines con un llamativo patron de caritas felices', 4.00, DEFAULT, DEFAULT, 3, 3);
INSERT INTO producto VALUES	(DEFAULT, 'Calcetines de perritos', 'Divertidos calcetines con un llamativo patron de perritos animados', 6.00, DEFAULT, DEFAULT, 5, 3);
INSERT INTO producto VALUES	(DEFAULT, 'Calcetines de gatos', 'Divertidos calcetines con un llamativo patron de gatos animados', 5.00, DEFAULT, DEFAULT, 1, 2);
INSERT INTO producto VALUES	(DEFAULT, 'Calcetines de perritos divertidos', 'Divertidos calcetines con un llamativo patron de perritos', 5.00, DEFAULT, DEFAULT, 3, 2);
INSERT INTO producto VALUES	(DEFAULT, 'Calcetines de gatos divertidos', 'Divertidos calcetines con un llamativo patron de gatos', 5.50, DEFAULT, DEFAULT, 3, 4);
INSERT INTO producto VALUES	(DEFAULT, 'Calcetines rayados rojo y negro', 'Divertidos calcetines con un llamativo patron de lineas rojas y negras', 5.00, DEFAULT, DEFAULT, 2, 3);
INSERT INTO producto VALUES	(DEFAULT, 'Calcetines rayados azul y anaranjado', 'Divertidos calcetines con un llamativo patron de lineas azules y anaranjadas', 5.50, DEFAULT, DEFAULT, 2, 5);
INSERT INTO producto VALUES	(DEFAULT, 'Caja de dos pares de medias', 'Calcetines divertidos para niños de diseño exclusivo', 9.00, DEFAULT, DEFAULT, 5, 1);
INSERT INTO producto VALUES	(DEFAULT, 'Calcetines de tigre', 'Divertidos calcetines con un llamativo patron de piel de tigre', 5.00, DEFAULT, DEFAULT, 2, 1);
INSERT INTO producto VALUES	(DEFAULT, 'Calcetines de corazones rojos', 'Divertidos calcetines con un llamativo patron de corazones rojos', 4.99, DEFAULT, DEFAULT, 4, 2);
INSERT INTO producto VALUES	(DEFAULT, 'Calcetines de hamburguesas', 'Divertidos calcetines con un llamativo patron de hamburguesas', 6.40, DEFAULT, DEFAULT, 2, 5);
INSERT INTO producto VALUES	(DEFAULT, 'Calcetines de corazones blancos', 'Divertidos calcetines con un llamativo patrón de corazones blancos', 4.99, DEFAULT, DEFAULT, 4, 3);
INSERT INTO producto VALUES	(DEFAULT, 'Calcetines de tacos', 'Divertidos calcetines con un llamativo patrón de tacos', 6.00, DEFAULT, DEFAULT, 2, 4);
INSERT INTO producto VALUES	(DEFAULT, 'Calcetines de corazones rotos', 'Divertidos calcetines con un llamativo patrón de corazones rotos', 4.99, DEFAULT, DEFAULT, 5, 5);
INSERT INTO producto VALUES	(DEFAULT, 'Calcetines de arcoiris', 'Divertidos calcetines con un llamativo patrón de arcoíris', 6.00, DEFAULT, DEFAULT, 2, 2);
INSERT INTO producto VALUES	(DEFAULT, 'Calcetines de dinosaurio', 'Divertidos calcetines con un llamativo patrón de dinosaurios', 5.00, DEFAULT, DEFAULT, 3, 1);
INSERT INTO producto VALUES	(DEFAULT, 'Calcetines de payasos', 'Divertidos calcetines con un llamativo patrón de payasos', 6.00, DEFAULT, DEFAULT, 3, 4);
INSERT INTO producto VALUES	(DEFAULT, 'Calcetines de navidad', 'Divertidos calcetines con un llamativo patrón de lineas rojas verdes y rojas', 5.00, DEFAULT, DEFAULT, 5, 4);
		
		
INSERT INTO compra
VALUES	(DEFAULT, '2020-02-17', NOW(), 9.98, 1, 1, 1),
		(DEFAULT, '2020-02-17', NOW(), 9.00, 4, 2, 2),
		(DEFAULT, '2020-02-11', NOW(), 9.00, 3, 3, 3),
		(DEFAULT, '2020-02-7', NOW(), 10.00, 5, 4, 2),
		(DEFAULT, '2020-02-12', NOW(), 9.98, 2, 5, 3),
		(DEFAULT, '2020-02-12', NOW(), 12.00, 3, 6, 4),
		(DEFAULT, '2020-02-16', NOW(), 9.00, 4, 7, 5),
		(DEFAULT, '2020-02-15', NOW(), 10.00, 3, 8, 3),
		(DEFAULT, '2020-02-9', NOW(), 10.00, 4, 9, 2),
		(DEFAULT, '2020-02-17', NOW(), 9.98, 1, 10, 3),
		(DEFAULT, '2020-02-17', NOW(), 16.00, 3, 11, 5),
		(DEFAULT, '2020-02-17', NOW(), 15.00, 4, 12, 2),
		(DEFAULT, '2020-02-17', NOW(), 15.00, 5, 13, 4),
		(DEFAULT, '2020-02-8', NOW(), 14.00, 3, 14, 3),
		(DEFAULT, '2020-02-17', NOW(), 15.00, 1, 15, 4),
		(DEFAULT, '2020-02-17', NOW(), 15.00, 2, 15, 3),
		(DEFAULT, '2020-02-17', NOW(), 18.00, 4, 14, 5),
		(DEFAULT, '2020-02-17', NOW(), 14.00, 3, 13, 1),
		(DEFAULT, '2020-02-17', NOW(), 16.00, 3, 12, 2),
		(DEFAULT, '2020-02-17', NOW(), 15.00, 3, 11, 2),
		(DEFAULT, '2020-02-17', NOW(), 18.00, 3, 10, 5),
		(DEFAULT, '2020-02-17', NOW(), 20.00, 5, 9, 4),
		(DEFAULT, '2020-02-17', NOW(), 19.00, 4, 8, 4),
		(DEFAULT, '2020-02-17', NOW(), 20.00, 1, 7, 2),
		(DEFAULT, '2020-02-17', NOW(), 19.96, 2, 6, 3),
		(DEFAULT, '2020-02-17', NOW(), 20.00, 3, 5, 1),
		(DEFAULT, '2020-02-17', NOW(), 24.00, 1, 4, 2),
		(DEFAULT, '2020-02-17', NOW(), 16.00, 3, 3, 4),
		(DEFAULT, '2020-02-17', NOW(), 24.00, 2, 2, 1),
		(DEFAULT, '2020-02-17', NOW(), 20.00, 1, 1, 4),
		(DEFAULT, '2020-02-17', NOW(), 24.95, 5, 1, 4),
		(DEFAULT, '2020-02-17', NOW(), 22.50, 2, 2, 2),
		(DEFAULT, '2020-02-17', NOW(), 30.00, 1, 3, 3),
		(DEFAULT, '2020-02-16', NOW(), 25.00, 1, 4, 5),
		(DEFAULT, '2020-02-11', NOW(), 25.00, 1, 5, 4),
		(DEFAULT, '2020-02-12', NOW(), 22.50, 4, 6, 5),
		(DEFAULT, '2020-06-1', NOW(), 24.95, 2, 7, 2),
		(DEFAULT, '2020-06-7', NOW(), 30.00, 3, 8, 4),
		(DEFAULT, '2020-06-5', NOW(), 22.50, 4, 9, 2),
		(DEFAULT, '2020-06-2', NOW(), 25.00, 5, 10, 3);

INSERT INTO detalleCompra
VALUES	(DEFAULT, 1, 5.00, 14, 1, 1),
		(DEFAULT, 1, 5.00, 10, 1, 1),
		(DEFAULT, 3, 15.00, 7, 2, 1),
		(DEFAULT, 2, 10.00, 2, 2, 1),
		(DEFAULT, 3, 15.00, 1, 3, 1),
		(DEFAULT, 2, 10.00, 2, 3, 1),
		(DEFAULT, 1, 5.00, 18, 4, 1),
		(DEFAULT, 3, 15.00, 10, 4, 1),
		(DEFAULT, 1, 5.00, 12, 5, 1),
		(DEFAULT, 1, 5.00, 16, 5, 1),
		(DEFAULT, 1, 5.00, 2, 6, 1),
		(DEFAULT, 2, 10.00, 14, 6, 1),
		(DEFAULT, 1, 5.00, 17, 7, 1),
		(DEFAULT, 2, 10.00, 20, 7, 1),
		(DEFAULT, 3, 15.00, 19, 8, 1),
		(DEFAULT, 2, 10.00, 6, 8, 1),
		(DEFAULT, 2, 10.00, 7, 9, 1),
		(DEFAULT, 3, 15.00, 3, 9, 1),
		(DEFAULT, 2, 10.00, 13, 10, 1),
		(DEFAULT, 1, 5.00, 4, 10, 1),
		(DEFAULT, 3, 15.00, 11, 11, 1),
		(DEFAULT, 2, 10.00, 6, 11, 1),
		(DEFAULT, 2, 10.00, 1, 11, 1),
		(DEFAULT, 3, 15.00, 3, 12, 1),
		(DEFAULT, 2, 10.00, 13, 12, 1),
		(DEFAULT, 1, 5.00, 7, 12, 1),
		(DEFAULT, 3, 15.00, 19, 13, 1),
		(DEFAULT, 2, 10.00, 6, 13, 1),
		(DEFAULT, 2, 10.00, 16, 13, 1),
		(DEFAULT, 3, 15.00, 3, 14, 1),
		(DEFAULT, 2, 10.00, 13, 14, 1),
		(DEFAULT, 1, 5.00, 18, 14, 1),
		(DEFAULT, 3, 15.00, 19, 15, 1),
		(DEFAULT, 2, 10.00, 2, 15, 1),
		(DEFAULT, 2, 10.00, 11, 15, 1),
		(DEFAULT, 3, 15.00, 1, 16, 1),
		(DEFAULT, 2, 10.00, 13, 16, 1),
		(DEFAULT, 1, 5.00, 15, 16, 1),
		(DEFAULT, 3, 15.00, 10, 17, 1),
		(DEFAULT, 2, 10.00, 3, 17, 1),
		(DEFAULT, 2, 10.00, 9, 17, 1),
		(DEFAULT, 3, 15.00, 15, 18, 1),
		(DEFAULT, 2, 10.00, 10, 18, 1),
		(DEFAULT, 1, 5.00, 9, 18, 1),
		(DEFAULT, 3, 15.00, 4, 19, 1),
		(DEFAULT, 2, 10.00, 17, 19, 1),
		(DEFAULT, 2, 10.00, 8, 19, 1),
		(DEFAULT, 3, 15.00, 14, 20, 1),
		(DEFAULT, 2, 10.00, 19, 20, 1),
		(DEFAULT, 1, 5.00, 20, 20, 1),
		(DEFAULT, 2, 10.00, 10, 21, 1),
		(DEFAULT, 1, 5.00, 20, 21, 1),
		(DEFAULT, 1, 5.00, 1, 21, 1),
		(DEFAULT, 1, 5.00, 11, 21, 1),
		(DEFAULT, 2, 10.00, 18, 22, 1),
		(DEFAULT, 2, 10.00, 17, 22, 1),
		(DEFAULT, 1, 10.00, 6, 22, 1),
		(DEFAULT, 2, 10.00, 12, 22, 1),
		(DEFAULT, 2, 10.00, 13, 23, 1),
		(DEFAULT, 1, 5.00, 16, 23, 1),
		(DEFAULT, 1, 5.00, 4, 23, 1),
		(DEFAULT, 2, 10.00, 8, 23, 1),
		(DEFAULT, 1, 5.00, 3, 24, 1),
		(DEFAULT, 3, 15.00, 7, 24, 1),
		(DEFAULT, 1, 5.00, 4, 24, 1),
		(DEFAULT, 1, 5.00, 19, 24, 1),
		(DEFAULT, 3, 15.00, 14, 25, 1),
		(DEFAULT, 1, 5.00, 15, 25, 1),
		(DEFAULT, 2, 10.00, 4, 25, 1),
		(DEFAULT, 2, 10.00, 3, 25, 1),
		(DEFAULT, 1, 5.00, 19, 26, 1),
		(DEFAULT, 1, 5.00, 4, 26, 1),
		(DEFAULT, 1, 5.00, 6, 26, 1),
		(DEFAULT, 1, 5.00, 10, 26, 1),
		(DEFAULT, 2, 10.00, 8, 27, 1),
		(DEFAULT, 1, 5.00, 2, 27, 1),
		(DEFAULT, 1, 5.00, 18, 27, 1),
		(DEFAULT, 1, 5.00, 13, 27, 1),
		(DEFAULT, 2, 10.00, 8, 28, 1),
		(DEFAULT, 1, 5.00, 16, 28, 1),
		(DEFAULT, 2, 10.00, 10, 28, 1),
		(DEFAULT, 1, 5.00, 9, 28, 1),
		(DEFAULT, 2, 10.00, 7, 29, 1),
		(DEFAULT, 1, 5.00, 9, 29, 1),
		(DEFAULT, 3, 15.00, 3, 29, 1),
		(DEFAULT, 1, 5.00, 17, 29, 1),
		(DEFAULT, 1, 5.00, 8, 30, 1),
		(DEFAULT, 3, 15.00, 5, 30, 1),
		(DEFAULT, 2, 10.00, 12, 30, 1),
		(DEFAULT, 1, 5.00, 4, 30, 1),
		(DEFAULT, 2, 10.00, 10, 31, 1),
		(DEFAULT, 1, 5.00, 12, 31, 1),
		(DEFAULT, 2, 10.00, 4, 31, 1),
		(DEFAULT, 1, 5.00, 3, 31, 1),
		(DEFAULT, 3, 15.00, 20, 31, 1),
		(DEFAULT, 1, 5.00, 11, 32, 1),
		(DEFAULT, 1, 5.00, 18, 32, 1),
		(DEFAULT, 3, 15.00, 16, 32, 1),
		(DEFAULT, 2, 10.00, 5, 32, 1),
		(DEFAULT, 1, 5.00, 8, 32, 1),
		(DEFAULT, 2, 10.00, 6, 33, 1),
		(DEFAULT, 1, 5.00, 9, 33, 1),
		(DEFAULT, 2, 10.00, 4, 33, 1),
		(DEFAULT, 1, 5.00, 19, 33, 1),
		(DEFAULT, 3, 15.00, 13, 33, 1),
		(DEFAULT, 1, 5.00, 17, 34, 1),
		(DEFAULT, 1, 5.00, 18, 34, 1),
		(DEFAULT, 3, 15.00, 15, 34, 1),
		(DEFAULT, 2, 10.00, 12, 34, 1),
		(DEFAULT, 1, 5.00, 14, 34, 1),
		(DEFAULT, 2, 10.00, 2, 35, 1),
		(DEFAULT, 1, 5.00, 5, 35, 1),
		(DEFAULT, 2, 10.00, 6, 35, 1),
		(DEFAULT, 1, 5.00, 8, 35, 1),
		(DEFAULT, 3, 15.00, 3, 35, 1),
		(DEFAULT, 1, 5.00, 14, 36, 1),
		(DEFAULT, 1, 5.00, 8, 36, 1),
		(DEFAULT, 3, 15.00, 5, 36, 1),
		(DEFAULT, 2, 10.00, 11, 36, 1),
		(DEFAULT, 1, 5.00, 16, 36, 1),
		(DEFAULT, 2, 10.00, 20, 37, 1),
		(DEFAULT, 1, 5.00, 9, 37, 1),
		(DEFAULT, 2, 10.00, 1, 37, 1),
		(DEFAULT, 1, 5.00, 13, 37, 1),
		(DEFAULT, 3, 15.00, 3, 37, 1),
		(DEFAULT, 1, 5.00, 14, 38, 1),
		(DEFAULT, 1, 5.00, 20, 38, 1),
		(DEFAULT, 3, 15.00, 13, 38, 1),
		(DEFAULT, 2, 10.00, 11, 38, 1),
		(DEFAULT, 1, 5.00, 4, 38, 1),
		(DEFAULT, 2, 10.00, 10, 39, 1),
		(DEFAULT, 1, 5.00, 1, 39, 1),
		(DEFAULT, 2, 10.00, 15, 39, 1),
		(DEFAULT, 1, 5.00, 16, 39, 1),
		(DEFAULT, 3, 15.00, 3, 39, 1),
		(DEFAULT, 1, 5.00, 17, 40, 1),
		(DEFAULT, 1, 5.00, 8, 40, 1),
		(DEFAULT, 3, 15.00, 5, 40, 1),
		(DEFAULT, 2, 10.00, 12, 40, 1),
		(DEFAULT, 1, 5.00, 2, 40, 1);
	
INSERT INTO comentario
VALUES	(DEFAULT, 'Están preciosos, como lo esperaba.', '2020-01-12', 5, DEFAULT, 5),
		(DEFAULT, 'Están bien pero no son de calidad.', '2019-12-11', 3, DEFAULT, 23),
		(DEFAULT, 'No me gustaron en absoluto, pésima calidad.', '2020-03-03', 1, DEFAULT, 4),
		(DEFAULT, 'Se me rompio al primer uso.', '2020-06-15', 2, DEFAULT, 18),
		(DEFAULT, 'No hay de mi talla.', '2020-01-15', 2, DEFAULT, 6),
		(DEFAULT, 'No me gustaron en absoluto, pésima servicio.', '2020-02-26', 1, DEFAULT, 11);

INSERT INTO suscripcion
VALUES	(DEFAULT, DEFAULT, NOW(), 1, 1, 5, 1, 2, 1, 1),
		(DEFAULT, DEFAULT, NOW(), 2, 1, 2, 4, 1, 1, 4),
		(DEFAULT, DEFAULT, NOW(), 3, 5, 1, 2, 1, 1, 2),
		(DEFAULT, DEFAULT, NOW(), 1, 2, 4, 3, 3, 1, 3),
		(DEFAULT, DEFAULT, NOW(), 2, 1, 1, 5, 1, 1, 5),
		(DEFAULT, DEFAULT, NOW(), 3, 3, 3, 3, 1, 1, 3),
		(DEFAULT, DEFAULT, NOW(), 2, 4, 2, 4, 2, 1, 4),
		(DEFAULT, DEFAULT, NOW(), 2, 1, 3, 6, 1, 1, 6);
		
-- SELECTS

SELECT * FROM cliente;
SELECT * FROM talla;
SELECT * FROM categoria;
SELECT * FROM estadoCompra;
SELECT * FROM departamento;
SELECT * FROM tipoProducto;
SELECT * FROM tipoUsuario;
SELECT * FROM frecuencia;
SELECT * FROM direccion;
SELECT * FROM administrador;
SELECT * FROM producto;
SELECT * FROM detalleProducto;
SELECT * FROM compra;
SELECT * FROM color;
SELECT * FROM detalleCompra;
SELECT * FROM comentario;
SELECT * FROM suscripcion;
SELECT * FROM planSuscripcion;

-- Consultas para reportes

/* 1. Reporte de las compras realizadas por un cliente que recibe como parametro el id del cliente */

SELECT idCompra AS "No. Compra", concat_ws(' ',nombres,apellidos) AS "Cliente", concat_ws(' Depto. ',detalleDireccion, departamento) 
AS "Dirección", fechaCompra AS "Fecha de compra", estado AS "Estado de la compra", total AS "Total a pagar" FROM compra c 
JOIN cliente cl ON c.idCliente = cl.idCliente JOIN direccion d ON c.idDireccion = d.idDireccion 
JOIN estadoCompra ec ON c.idEstadoCompra = ec.idEstadoCompra JOIN departamento depto 
ON d.idDepartamento = depto.idDepartamento WHERE c.idCliente = 1

/* 2. Reporte que muestra la existencia de productos por la talla que recibe como parametro el id del producto */

SELECT talla, existencia FROM detalleProducto dP JOIN talla ON dP.idTalla = talla.idTalla WHERE idProducto = 1

/* 3. Obtiene los productos agrupados por su categoría */

SELECT * FROM producto WHERE idCategoria = 3;

/* 4. Obtiene las suscripciones agrupadas por el plan de suscripción */

SELECT * FROM suscripcion WHERE idPlanSuscripcion = 1;

/* 5. Obtiene los productos agrupados por su tipo */

SELECT * FROM producto WHERE idTipoProducto = 3;


-- Consultas con rangos de fecha

/* 1. Obtiene las compras realizadas en un mes según la fecha en que fueron realizadas, con el fin de comparar entre otros meses */

CREATE OR REPLACE FUNCTION comprasMensuales(fechaInicio DATE, fechaFinal DATE) RETURNS TABLE(
	idCompra INT,
	fechaCompra DATE,
	fechaEnvio DATE,
	total NUMERIC,
	idEstadoCompra INT,
	idCliente INT, 
	idDireccion INT
)
AS $$
BEGIN
	RETURN QUERY SELECT * FROM compra c WHERE c.fechaCompra BETWEEN fechaInicio AND fechaFinal;
END;
$$ LANGUAGE plpgsql;

SELECT * FROM comprasMensuales('2020-02-01', '2020-02-29');

/* 2. Obtiene las compras hechas en un mes, utilizando los envíos como parámetros, con el fin de comparar entre otros meses */

CREATE OR REPLACE FUNCTION enviosMensuales(fechaInicio DATE, fechaFinal DATE) RETURNS TABLE(
	idCompra INT,
	fechaCompra DATE,
	fechaEnvio DATE,
	total NUMERIC,
	idEstadoCompra INT,
	idCliente INT, 
	idDireccion INT
)
AS $$
BEGIN
	RETURN QUERY SELECT * FROM compra c WHERE c.fechaEnvio BETWEEN fechaInicio AND fechaFinal;
END;
$$ LANGUAGE plpgsql;

SELECT * FROM enviosMensuales('2020-04-01', '2020-04-30');

/* 3. Obtiene los comentarios hechos en un mes, con el fin de comparar entre otros meses */

CREATE OR REPLACE FUNCTION comentariosMensuales(fechaInicio DATE, fechaFinal DATE) RETURNS TABLE(
	idComentario INT,
	comentario VARCHAR,
	fecha DATE,
	calificacion INT,
	estado BIT,
	idDetalleCompra INT
)
AS $$
BEGIN
	RETURN QUERY SELECT * FROM comentario cm WHERE cm.fecha BETWEEN fechaInicio AND fechaFinal;
END;
$$ LANGUAGE plpgsql;

SELECT * FROM comentariosMensuales('2020-01-01', '2020-01-31');


-- Consultas estadísticos para gráficos

-- Función requerida para que se muestre el mes a partir de la fecha

CREATE OR REPLACE FUNCTION to_month(double precision) RETURNS varchar AS
$$
    SELECT to_char(to_timestamp(to_char($1, '999'), 'MM'), 'Month');
$$ LANGUAGE SQL;

/* 1. Cantidad de ventas realizadas por mes */

SELECT to_month(date_part('month', fechaCompra)) AS "Mes", COUNT(date_part('month', fechaCompra)) AS "N° de compras" 
FROM compra GROUP BY date_part('month', fechaCompra);

/* 2. Nùmero de productos vendidos por cada tipo de producto */

SELECT tipo AS "Tipo de producto", COUNT(p.idTipoProducto)  AS "Cantidad" FROM detalleCompra dC JOIN producto p 
ON dc.idProducto = p.idProducto JOIN tipoProducto tP ON p.idTipoProducto = tP.idTipoProducto GROUP BY tipo

/* 3. Nùmero de productos vendidos por cada categoria de producto */

SELECT categoria AS "Categoria de producto", COUNT(p.idCategoria)  AS "Cantidad" FROM detalleCompra dC JOIN producto p 
ON dc.idProducto = p.idProducto JOIN categoria cat ON p.idCategoria = cat.idCategoria GROUP BY categoria

/* 4. Ganancias total por compras mensuales */

SELECT to_month(date_part('month', fechaCompra)) AS "Mes", concat('$',SUM(total)) AS "Ganancia" 
FROM compra GROUP BY date_part('month', fechaCompra);

/* 5. Ganancias por cada plan de suscripción */

SELECT concat_ws(' ', 'Plan de ', cantidadPares, ' pares') AS "Plan", concat('$',SUM(precio)) AS "Ganancia" FROM suscripcion s 
JOIN planSuscripcion pS ON s.idPlanSuscripcion = pS.idPlanSuscripcion GROUP BY concat_ws(' ', 'Plan de ', cantidadPares, ' pares')


/*
* Función que crea el detalle de un producto por cada talla registrada
*/
CREATE OR REPLACE FUNCTION crearDetalleProducto() 
RETURNS TRIGGER AS $$
DECLARE
	rec RECORD;
	query text;
BEGIN
	query := 'INSERT INTO detalleProducto (existencia, idTalla, idProducto) VALUES ( 0, $1, (SELECT idproducto FROM producto ORDER BY idproducto DESC LIMIT 1))';
    FOR rec IN SELECT idtalla FROM talla ORDER BY idtalla 
    LOOP 
	RAISE NOTICE '%', rec.idtalla;
	EXECUTE query USING rec.idtalla;
    END LOOP;
	RETURN null;
END;
$$ LANGUAGE plpgsql;

/*
* Disparador que ejecuta la función crearDetalleProducto
*/
CREATE TRIGGER crearDetalleProducto AFTER INSERT ON producto
FOR EACH ROW EXECUTE PROCEDURE crearDetalleProducto();
/*
* Función que crea el detalle con la nueva talla por cada producto existente
*/
CREATE OR REPLACE FUNCTION actualizarDetalleProducto() 
RETURNS TRIGGER AS $$
DECLARE
	rec RECORD;
	query text;
BEGIN
	query := 'INSERT INTO detalleProducto (existencia, idTalla, idProducto) VALUES ( 0, (SELECT idtalla FROM talla ORDER BY idtalla DESC LIMIT 1), $1)';
    FOR rec IN SELECT DISTINCT idproducto FROM detalleProducto ORDER BY idproducto
    LOOP 
	RAISE NOTICE '%', rec.idproducto;
	EXECUTE query USING rec.idproducto;
    END LOOP;
	RETURN null;
END;
$$ LANGUAGE plpgsql;
/*
* Disparador que se activa luego de agregar una talla y agrega un detalle para cada prdoducto existente
*/
CREATE TRIGGER actualizarDetalleProducto AFTER INSERT ON talla
FOR EACH ROW EXECUTE PROCEDURE actualizarDetalleProducto();