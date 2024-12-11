-- Crear la tabla de marcas
CREATE TABLE brands (
  brandID       INT(11)        NOT NULL   AUTO_INCREMENT,
  brandName     VARCHAR(255)   NOT NULL,
  PRIMARY KEY (brandID)
);

-- Crear la tabla de zapatos
CREATE TABLE shoes (
  shoeID        INT(11)        NOT NULL   AUTO_INCREMENT,
  brandID       INT(11)        NOT NULL,
  shoeCode      VARCHAR(10)    NOT NULL   UNIQUE,
  shoeName      VARCHAR(255)   NOT NULL,
  listPrice     DECIMAL(10,2)  NOT NULL,
  PRIMARY KEY (shoeID),
  FOREIGN KEY (brandID) REFERENCES brands(brandID)
);

-- Crear la tabla de clientes
CREATE TABLE customers (
  customerID     INT(11)        NOT NULL   AUTO_INCREMENT,
  username       VARCHAR(50)    NOT NULL   UNIQUE,
  password_hash  VARCHAR(255)   NOT NULL,
  email          VARCHAR(255),
  firstName      VARCHAR(255),
  lastName       VARCHAR(255),
  PRIMARY KEY (customerID)
);

-- Crear la tabla de órdenes en línea
CREATE TABLE online_orders (
  orderID        INT(11)        NOT NULL   AUTO_INCREMENT,
  customerID     INT(11)        NOT NULL,
  orderDate      DATETIME       NOT NULL,
  PRIMARY KEY (orderID),
  FOREIGN KEY (customerID) REFERENCES customers(customerID)
);

-- Crear la tabla de artículos en las órdenes
CREATE TABLE items_in_order (
  id             INT(11)        NOT NULL   AUTO_INCREMENT,
  shoeID         INT(11)        NOT NULL,
  orderID        INT(11)        NOT NULL,
  item_quantity  INT(11)        NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (shoeID) REFERENCES shoes(shoeID),
  FOREIGN KEY (orderID) REFERENCES online_orders(orderID)
);



-- Insertar datos en la tabla de marcas
INSERT INTO brands (brandID, brandName) VALUES
(1, 'BCBG'),
(2, 'Steve Madden'),
(3, 'Frye');

-- Insertar datos en la tabla de zapatos
INSERT INTO shoes (shoeID, brandID, shoeCode, shoeName, listPrice) VALUES
(1, 1, 'runway_wedge', 'Runway Wedge', 275.00),
(2, 1, 'laceup_sandal', 'Lace-Up Sandal', 138.00),
(3, 2, 'proto_pump', 'Proto Pump', 79.98),
(4, 2, 'maryjane_pump', 'Mary Jane Pump', 119.95),
(5, 3, 'fringe_boot', 'Fringe Boot', 368.00),
(6, 3, 'riding_boot', 'Riding Boot', 448.00);

-- Insertar datos en la tabla de clientes (las contraseñas deben ser hash generados en PHP)
INSERT INTO customers (username, password_hash, email, firstName, lastName) VALUES
('john_doe', '$2y$10$eImGzIV7e/ZRk9fVb/yGBuWq/6jPv1lXcRgPz8AHEo4kZn9/.Yg2G', 'john.doe@example.com', 'John', 'Doe'),
('jane_smith', '$2y$10$A7C/eOl2r3Qp8cOdw/rrcOgibHOrl5QlUuiwD0Hc9Pc4kTQ4FyWi2', 'jane.smith@example.com', 'Jane', 'Smith');

-- Insertar datos en la tabla de órdenes en línea
INSERT INTO online_orders (orderID, customerID, orderDate) VALUES
(1, 1, '2016-04-05 13:00:00'),
(2, 2, '2016-04-05 15:00:00'),
(3, 1, '2016-04-06 20:00:00');
