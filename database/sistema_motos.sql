-- Crear la base de datos si no existe
CREATE DATABASE IF NOT EXISTS sistema_motos;

-- Seleccionar la base de datos
USE sistema_motos;

-- Tabla de usuarios del sistema
CREATE TABLE usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    usuario VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    rol ENUM('ADMINISTRADOR', 'EMPLEADO') NOT NULL DEFAULT 'EMPLEADO',
    estado TINYINT DEFAULT 1,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabla de clientes
CREATE TABLE clientes (
    id_cliente INT AUTO_INCREMENT PRIMARY KEY,
    cedula VARCHAR(20) NOT NULL UNIQUE,
    nombres VARCHAR(100) NOT NULL,
    apellidos VARCHAR(100) NOT NULL,
    telefono VARCHAR(20),
    correo VARCHAR(100),
    direccion VARCHAR(150),
    estado TINYINT DEFAULT 1,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabla de motos
CREATE TABLE motos (
    id_moto INT AUTO_INCREMENT PRIMARY KEY,
    id_cliente INT NOT NULL,
    placa VARCHAR(20) NOT NULL UNIQUE,
    marca VARCHAR(50) NOT NULL,
    modelo VARCHAR(50) NOT NULL,
    anio INT,
    color VARCHAR(30),
    cilindraje VARCHAR(30),
    estado TINYINT DEFAULT 1,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    -- Relación con la tabla clientes
    FOREIGN KEY (id_cliente) REFERENCES clientes(id_cliente)
);

-- Usuario administrador inicial
-- Contraseña: admin123
INSERT INTO usuarios (
    nombre,
    usuario,
    password,
    rol
) VALUES (
    'Administrador',
    'admin',
    '1234',
    'ADMINISTRADOR'
);

-- Clientes de prueba
INSERT INTO clientes (
    cedula,
    nombres,
    apellidos,
    telefono,
    correo,
    direccion
) VALUES
('0912345678', 'Carlos', 'Mendoza', '0991234567', 'carlos@email.com', 'Guayaquil - Centro'),
('0923456789', 'María', 'Zambrano', '0987654321', 'maria@email.com', 'Guayaquil - Norte');

-- Motos de prueba
INSERT INTO motos (
    id_cliente,
    placa,
    marca,
    modelo,
    anio,
    color,
    cilindraje
) VALUES
(1, 'ABC123', 'Yamaha', 'FZ 150', 2021, 'Azul', '150cc'),
(2, 'XYZ789', 'Honda', 'CB 190R', 2022, 'Rojo', '190cc');