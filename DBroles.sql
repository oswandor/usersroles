-- Crear la tabla Usuario
CREATE TABLE Usuario (
  id_usuario INT PRIMARY KEY,
  nombre VARCHAR(50),
  contraseña VARCHAR(50)
);



-- Crear la tabla Rol
CREATE TABLE Rol (
  id_rol INT PRIMARY KEY,
  nombre VARCHAR(50)
);

-- Crear la tabla Asignación_Rol
CREATE TABLE Asignacion_Rol (
  id_asignacion INT PRIMARY KEY,
  id_usuario INT,
  id_rol INT,
  FOREIGN KEY (id_usuario) REFERENCES Usuario(id_usuario),
  FOREIGN KEY (id_rol) REFERENCES Rol(id_rol)
);



INSERT INTO Usuario (nombre, contraseña)
VALUES ('Usuario1', 'contraseña1');

INSERT INTO Usuario (nombre, contraseña)
VALUES ('Usuario2', 'contraseña2');



INSERT INTO Rol (nombre)
VALUES ('Administrador');

INSERT INTO Rol (nombre)
VALUES ('Desarrollador');


INSERT INTO Asignacion_Rol (id_usuario, id_rol)
VALUES (1, 1); -- Asignar el rol de Administrador al Usuario1

INSERT INTO Asignacion_Rol (id_usuario, id_rol)
VALUES (2, 2); -- Asignar el rol de Desarrollador al Usuario2








