-- Sitio Web Creado por ITred Spa.
-- Direccion: Guido Reni #4190
-- Pedro Aguirre Cerda - Santiago - Chile
-- contacto@itred.cl o itred.spa@gmail.com
-- https://www.itred.cl
-- Creado, Programado y Diseñado por ITred Spa.
-- BPPJ

-- -----------------------------------------------------------------------------------------------------------------------------
-- ------------------------------------- INICIO SCRIPT DE BASE DE DATOS editor_cotizacion_bd .SQL ---------------------------------------
-- -----------------------------------------------------------------------------------------------------------------------------

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- -
-- base de datos: `editor_cotizacion_bd`
-- -
-- Selección de la base de datos para usar
CREATE DATABASE IF NOT EXISTS `editor_cotizacion_bd` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE editor_cotizacion_bd;

-- ----------------------------------------------------------
-- ESTRUCTURA DE TABLA PARA LA TABLA `FP_FOTOSPERFIL`
-- ----------------------------------------------------------

-- ----------------------------------------------------------
-- ELIMINAR LA TABLA FOTOSPERFIL-----------------------------
-- ----------------------------------------------------------

DROP TABLE IF EXISTS FP_FotosPerfil; 
-- elimina  la tabla si esta ya existe

-- ----------------------------------------------------------
-- CREAR LA TABLA FOTOSPERFIL--------------------------------
-- ----------------------------------------------------------

CREATE TABLE FP_FotosPerfil (
    id_foto INT NOT NULL AUTO_INCREMENT, -- Identificador único de la foto
    ruta_foto VARCHAR(255) NOT NULL, -- Ruta del archivo de la foto
    fecha_subida DATETIME DEFAULT CURRENT_TIMESTAMP, -- Fecha de carga de la foto
    PRIMARY KEY (id_foto) -- Definición de la clave primaria
) ENGINE=InnoDB;

-- ----------------------------------------------------------
-- Estructura de tabla para la tabla `Tp_giro`
-- ----------------------------------------------------------

-- ----------------------------------------------------------
-- CREAR LA TABLA Tp_giro----------------------------------
-- ----------------------------------------------------------

CREATE TABLE Tp_Giro (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tipo VARCHAR(50) NOT NULL UNIQUE
) ENGINE=InnoDB;

-- ----------------------------------------------------------
-- Estructura de tabla para la tabla `pais`
-- ----------------------------------------------------------

-- ----------------------------------------------------------
-- CREAR LA TABLA pais----------------------------------
-- ----------------------------------------------------------
CREATE TABLE pais (
    id_pais INT NOT NULL AUTO_INCREMENT, -- Identificador único del país
    nombre_pais VARCHAR(255) NOT NULL, -- Nombre del país
    PRIMARY KEY (id_pais) -- Definición de la clave primaria
) ENGINE=InnoDB;

-- ----------------------------------------------------------
-- Estructura de tabla para la tabla `ciudades`
-- ----------------------------------------------------------

-- ----------------------------------------------------------
-- CREAR LA TABLA ciudades----------------------------------
-- ----------------------------------------------------------
CREATE TABLE ciudades (
    id_ciudad INT NOT NULL AUTO_INCREMENT, -- Identificador único de la ciudad
    nombre_ciudad VARCHAR(255) NOT NULL, -- Nombre de la ciudad
    id_pais INT NOT NULL, -- Identificador del país (clave foránea)
    PRIMARY KEY (id_ciudad), -- Definición de la clave primaria
    FOREIGN KEY (id_pais) REFERENCES pais(id_pais) ON DELETE CASCADE -- Clave foránea para referenciar el país
) ENGINE=InnoDB;

-- ----------------------------------------------------------
-- Estructura de tabla para la tabla `comuna`
-- ----------------------------------------------------------

-- ----------------------------------------------------------
-- CREAR LA TABLA comuna----------------------------------
-- ----------------------------------------------------------
CREATE TABLE comuna (
    id_comuna INT NOT NULL AUTO_INCREMENT, -- Identificador único de la comuna
    nombre_comuna VARCHAR(255) NOT NULL, -- Nombre de la comuna
    id_ciudad INT NOT NULL, -- Identificador de la ciudad (clave foránea)
    PRIMARY KEY (id_comuna), -- Definición de la clave primaria
    FOREIGN KEY (id_ciudad) REFERENCES ciudades(id_ciudad) ON DELETE CASCADE -- Clave foránea para referenciar la ciudad
) ENGINE=InnoDB;
-- ----------------------------------------------------------
-- Estructura de tabla para la tabla `Tp_Pago`
-- ----------------------------------------------------------

-- -----------------------------------------------------------
-- Crear la tabla Tp_Pago-------------------------------------
-- -----------------------------------------------------------

CREATE TABLE Tp_Pago (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tipo VARCHAR(50) NOT NULL UNIQUE
) ENGINE=InnoDB;
-- ----------------------------------------------------------
-- Estructura de tabla para la tabla `Tp_Cliente`
-- ----------------------------------------------------------

-- ----------------------------------------------------------
-- CREAR LA TABLA Tp_Cliente---------------------------------
-- ----------------------------------------------------------

CREATE TABLE Tp_Cliente (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tipo VARCHAR(50) NOT NULL UNIQUE
) ENGINE=InnoDB;

-- ----------------------------------------------------------
-- Estructura de tabla para la tabla `Tp_Firma`
-- ----------------------------------------------------------

-- ----------------------------------------------------------
-- CREAR LA TABLA Tp_Firma----------------------------------
-- ----------------------------------------------------------
CREATE TABLE Tp_Firma (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tipo VARCHAR(50) NOT NULL UNIQUE
);


-- ----------------------------------------------------------
-- Estructura de tabla para la tabla `Tp_Area´---------------
-- ----------------------------------------------------------

-- ----------------------------------------------------------
-- Eliminar la tabla Tp_Area_ si existe----------------------
-- ----------------------------------------------------------

DROP TABLE IF EXISTS Tp_Area; -- elimina  la tabla si existe

-- ----------------------------------------------------------
-- Crear la tabla de áreas de la empresa---------------------
-- ----------------------------------------------------------
CREATE TABLE Tp_Area (
    id_area INT NOT NULL AUTO_INCREMENT, -- Identificador único del área de la empresa
    nombre_area VARCHAR(255) NOT NULL, -- Nombre del área de la empresa
    PRIMARY KEY (id_area) -- Definir clave primaria
) ENGINE=InnoDB;



-- ----------------------------------------------------------
-- Estructura de tabla para la tabla `E_Empresa--------------
-- ----------------------------------------------------------

-- -----------------------------------------------------------
-- Eliminar la tabla Empresa si existe-----------------------
-- -----------------------------------------------------------

DROP TABLE IF EXISTS E_Empresa; -- elimina  la tabla si existe

-- -----------------------------------------------------------
-- Crear la tabla Empresa con la nueva columna id_area_empresa
-- -----------------------------------------------------------

    CREATE TABLE E_Empresa (
        id_empresa INT NOT NULL AUTO_INCREMENT, -- Identificador único de la empresa
        id_foto INT, -- Identificador de la foto de la empresa
        rut_empresa VARCHAR(20) NOT NULL, -- RUT de la empresa
        nombre_empresa VARCHAR(255) NOT NULL, -- Nombre de la empresa
        id_area_empresa INT NOT NULL, -- Identificador del área de la empresa (clave foránea)
        direccion_empresa VARCHAR(255), -- Dirección de la empresa
        ciudad_empresa VARCHAR(100), -- Ciudad de la empresa
        pais_empresa VARCHAR(100), -- País de la empresa
        telefono_empresa VARCHAR(20), -- Teléfono de la empresa
        email_empresa VARCHAR(100), -- Email de la empresa
        web_empresa VARCHAR(255), -- Sitio web de la empresa
        fecha_creacion DATE, -- Fecha de creación de la empresa
        dias_validez INT, -- Días de validez
        id_tipo_firma INT, -- Identificador del tipo de firma
        PRIMARY KEY (id_empresa), -- Clave primaria
        FOREIGN KEY (id_foto) REFERENCES FP_FotosPerfil(id_foto) ON DELETE CASCADE, -- Clave foránea de fotos
        FOREIGN KEY (id_tipo_firma) REFERENCES Tp_Firma(id) ON DELETE SET NULL, -- Clave foránea de tipo de firma
        FOREIGN KEY (id_area_empresa) REFERENCES Tp_Area(id_area) -- Clave foránea del área de la empresa
    ) ENGINE=InnoDB;


-- ----------------------------------------------------------
-- ESTRUCTURA DE TABLA PARA LA TABLA `TP_CARGO`--------------
-- ----------------------------------------------------------

-- -----------------------------------------------------------
-- ELIMINAR LA TABLA TP_CARGO SI EXISTE----------------------
-- -----------------------------------------------------------

DROP TABLE IF EXISTS Tp_cargo; -- elimina  la tabla si existe

-- -----------------------------------------------------------
-- CREAR LA TABLA DE TIPOS DE CARGOS DEL ENCARGADO O PERSONAL-
-- -----------------------------------------------------------
CREATE TABLE Tp_cargo (
    id_tp_cargo INT NOT NULL AUTO_INCREMENT, -- Identificador único del tipo de cargo
    nombre_cargo VARCHAR(255) NOT NULL, -- Nombre del tipo de cargo
    PRIMARY KEY (id_tp_cargo) -- Definir clave primaria
) ENGINE=InnoDB;

-- ----------------------------------------------------------
-- Estructura de tabla para la tabla `Em_Encargado`----------
-- ----------------------------------------------------------

--  -----------------------------------------------------------
-- Eliminar la tabla Em_Encargados si existe-----------------
-- -----------------------------------------------------------

DROP TABLE IF EXISTS Em_Encargados; -- elimina  la tabla si existe

-- -----------------------------------------------------------
-- Crear la tabla E_Encargados-------------------------------
-- -----------------------------------------------------------
CREATE TABLE Em_Encargados (
    id_encargado INT NOT NULL AUTO_INCREMENT, -- Identificador único del encargado
    rut_encargado VARCHAR(20) UNIQUE, -- RUT del encargado (debe ser único)
    nombre_encargado VARCHAR(255) NOT NULL, -- Nombre del encargado
    id_tp_cargo INT  NULL, -- Identificador del tipo de cargo del encargado (fk)
    email_encargado VARCHAR(100), -- Email del encargado
    fono_encargado VARCHAR(20), -- Teléfono del encargado
    celular_encargado VARCHAR(20), -- Celular del encargado
    id_empresa INT NULL, -- Identificador de la empresa a la que pertenece el encargado
    PRIMARY KEY (id_encargado), -- Definición de la clave primaria
    FOREIGN KEY (id_empresa) REFERENCES E_Empresa(id_empresa) ON DELETE SET NULL, -- Clave foránea para referenciar la empresa
    FOREIGN KEY (id_tp_cargo) REFERENCES Tp_cargo(id_tp_cargo) ON DELETE SET NULL -- Clave foránea para referenciar el tipo de cargo
) ENGINE=InnoDB;

-- ----------------------------------------------------------
-- ESTRUCTURA DE TABLA PARA LA TABLA `tp_lugar`-------------
-- ----------------------------------------------------------

-- -----------------------------------------------------------
-- ELIMINAR LA TABLA CLIENTES SI EXISTE----------------------
-- -----------------------------------------------------------

DROP TABLE IF EXISTS tp_lugar; -- elimina  la tabla si ya existe

-- ----------------------------------------------------------
-- ESTRUCTURA DE TABLA PARA LA TABLA `tp_lugar`-------------
-- ----------------------------------------------------------

-- Crear la tabla Tp_Lugar
CREATE TABLE Tp_Lugar (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre_lugar VARCHAR(255) NOT NULL
) ENGINE=InnoDB;

-- -----------------------------------------------------------
-- ELIMINAR LA TABLA CLIENTES SI EXISTE----------------------
-- -----------------------------------------------------------

DROP TABLE IF EXISTS C_Clientes; -- elimina  la tabla si ya existe

-- -----------------------------------------------------------
-- CREAR LA TABLA CLIENTES----------------------------------
-- -----------------------------------------------------------
CREATE TABLE C_Clientes (
    id_cliente int NOT NULL AUTO_INCREMENT, -- Identificador único del cliente
    id_empresa_creadora INT, -- Identificador de la empresa a la que pertenece el encargado
    rut_empresa_cliente varchar(20), -- RUT de la empresa del cliente (debe ser único)
    nombre_empresa_cliente varchar(255), -- Nombre Empresa del cliente
    telefono_empresa_cliente varchar(20), -- Teléfono de la empresa del cliente 
    email_empresa_cliente varchar(100), -- Email de la empresa del cliente
    id_giro INT, -- Identificador del giro de la empresa del cliente (clave foránea)
    id_tipo_empresa INT, -- Identificador del tipo de empresa del cliente (clave foránea)
    id_lugar INT, -- Identificador del lugar de la empresa del cliente (clave foránea)
    ciudad_empresa_cliente varchar(255), -- Ciudad de la empresa del cliente
    comuna_empresa_cliente varchar(255), -- Comuna de la empresa del cliente
    direccion_empresa_cliente varchar(255), -- Direccion de la empresa del cliente
    observacion varchar(255), -- Observacion de la empresa del cliente
    rut_encargado_cliente varchar(20), -- RUT del encargado del cliente (debe ser único)
    nombre_encargado_cliente varchar(255) NOT NULL, -- Nombre del cliente
    direccion_encargado_cliente varchar(255), -- Dirección del cliente
    telefono_encargado_cliente varchar(20), -- Teléfono del cliente    
    email_encargado_cliente varchar(100), -- Email del cliente
    comuna_encargado_cliente varchar(255), -- Comuna del cliente
    ciudad_encargado_cliente varchar(255), -- Ciudad del cliente
    estado_empresa_cliente varchar(20) DEFAULT 'activo', -- estado empresa
    estado_encargado_cliente varchar(20) DEFAULT 'activo', -- estado cliente
    id_cargo INT, -- Identificador del cargo (clave foránea)
    PRIMARY KEY (id_cliente), -- Definición de la clave primaria
    FOREIGN KEY (id_empresa_creadora) REFERENCES E_Empresa(id_empresa) ON DELETE SET NULL, -- Clave foránea para referenciar la empresa
    FOREIGN KEY (id_lugar) REFERENCES Tp_Lugar(id) ON DELETE SET NULL, -- Clave foránea para referenciar el lugar
    FOREIGN KEY (id_giro) REFERENCES Tp_Giro(id) ON DELETE SET NULL, -- Clave foránea para referenciar el giro
    FOREIGN KEY (id_tipo_empresa) REFERENCES Tp_Cliente(id) ON DELETE SET NULL, -- Clave foránea para referenciar el tipo de empresa
    FOREIGN KEY (id_cargo) REFERENCES Tp_Cargo(id_tp_cargo) ON DELETE SET NULL -- Clave foránea para referenciar el cargo
) ENGINE=InnoDB;

-- ----------------------------------------------------------
-- Estructura de tabla para la tabla `P_Proveedor`-----------
-- ----------------------------------------------------------

-- -----------------------------------------------------------
-- Eliminar la tabla Proveedor si existe---------------------
-- -----------------------------------------------------------

DROP TABLE IF EXISTS P_Proveedor; -- elimina  la tabla si esta ya existe

-- -----------------------------------------------------------
-- Crear la tabla Proveedor----------------------------------
-- -----------------------------------------------------------
CREATE TABLE P_Proveedor (
    id_proveedor int NOT NULL AUTO_INCREMENT, -- Identificador único del proveedor
    nombre_proveedor varchar(255) NOT NULL, -- Nombre del proveedor
    rut_proveedor varchar(20) , -- RUT del proveedor (debe ser único)
    direccion_proveedor varchar(255), -- Dirección del proveedor
    telefono_proveedor varchar(20), -- Teléfono del proveedor
    email_proveedor varchar(100), -- Email del proveedor
    cargo_proveedor varchar(255), -- Cargo del proveedor
    comuna_proveedor varchar(255), -- Comuna del proveedor
    ciudad_proveedor varchar(255), -- Ciudad del proveedor
    tipo_proveedor varchar(255), -- Tipo del proveedor
    empresa_proveedor varchar(255), -- Empresa del proveedor(empresa)
    rut_empresa_proveedor varchar(20) , -- RUT del proveedor(debe ser único)(empresa)
    direccion_empresa_proveedor varchar(255), -- Dirección del proveedor(empresa)
    telefono_empresa_proveedor varchar(20), -- Teléfono del proveedor(empresa)
    email_empresa_proveedor varchar(100), -- Email del proveedor(empresa)
    comuna_empresa_proveedor varchar(255), -- Comuna del proveedor(empresa)
    ciudad_empresa_proveedor varchar(255), -- Ciudad del proveedor(empresa)
    giro_proveedor varchar(255), -- Giro del proveedor(empresa)
    PRIMARY KEY (id_proveedor) -- Definición de la clave primaria
) ENGINE=InnoDB ;


-- ----------------------------------------------------------
-- Estructura de tabla para la tabla `Tp_trabajo`------------
-- ----------------------------------------------------------

-- -----------------------------------------------------------
-- Eliminar la tabla Tp_trabajo si existe--------------------
-- -----------------------------------------------------------

DROP TABLE IF EXISTS Tp_trabajo; 
-- elimina  la tabla si ya existe

-- -----------------------------------------------------------
-- Crear la tabla de tipos de trabajo del proyecto-----------
-- -----------------------------------------------------------
CREATE TABLE Tp_trabajo (
    id_tp_trabajo INT NOT NULL AUTO_INCREMENT, -- Identificador único del tipo de trabajo
    nombre_trabajo VARCHAR(255) NOT NULL, -- Nombre del tipo de trabajo
    PRIMARY KEY (id_tp_trabajo) -- Definir clave primaria
) ENGINE=InnoDB;


-- ----------------------------------------------------------
-- Estructura de tabla para la tabla `Tp_Riesgo`-------------
-- ----------------------------------------------------------

-- -----------------------------------------------------------
-- Eliminar la tabla Tp_Riesgo si existe---------------------
-- -----------------------------------------------------------
DROP TABLE IF EXISTS Tp_Riesgo; -- elimina  la tabla si existe

-- -----------------------------------------------------------
-- Crear la tabla de tipos de riesgo del proyecto------------
-- -----------------------------------------------------------

CREATE TABLE Tp_Riesgo (
    id_tp_riesgo INT NOT NULL AUTO_INCREMENT, -- Identificador único del tipo de riesgo
    nombre_riesgo VARCHAR(255) NOT NULL, -- Nombre del tipo de riesgo
    PRIMARY KEY (id_tp_riesgo) -- Definir clave primaria
) ENGINE=InnoDB;


-- ----------------------------------------------------------
-- ESTRUCTURA DE TABLA PARA LA TABLA `C_PROYECTO`------------
-- ---------------------------------------------------------- 

-- -----------------------------------------------------------
-- Eliminar la tabla C_Proyectos si existe-------------------
-- -----------------------------------------------------------
DROP TABLE IF EXISTS C_Proyectos; -- elimina  la tabla si existe

-- -----------------------------------------------------------
-- Crear la tabla Proyectos----------------------------------
-- -----------------------------------------------------------
CREATE TABLE C_Proyectos (
    id_proyecto INT NOT NULL AUTO_INCREMENT, -- Identificador único del proyecto
    nombre_proyecto VARCHAR(255), -- Nombre del proyecto
    codigo_proyecto VARCHAR(50) NOT NULL, -- Código del proyecto
    id_tp_trabajo INT NOT NULL, -- Reemplazar tipo_trabajo por la FK
    id_area INT NOT NULL, -- Identificador del área de la empresa (clave foránea)
    id_tp_riesgo INT NULL, -- Identificador del tipo de riesgo (FK)
    descripcion_riesgo VARCHAR(255), -- Descripción del riesgo
    dias_compra VARCHAR(50), -- Días de compra relacionados con la cotización
    dias_trabajo VARCHAR(50), -- Días de trabajo relacionados con la cotización
    trabajadores INT, -- Número de trabajadores asignados
    horario VARCHAR(50), -- Horario de trabajo
    colacion VARCHAR(50), -- Colación incluida
    entrega VARCHAR(50), -- Entrega especificada
    PRIMARY KEY (id_proyecto), -- Definición de la clave primaria
    FOREIGN KEY (id_area) REFERENCES Tp_Area(id_area), -- Clave foránea del área de la empresa
    FOREIGN KEY (id_tp_trabajo) REFERENCES Tp_trabajo(id_tp_trabajo) ON DELETE CASCADE, -- Clave foránea para referenciar el tipo de trabajo
    FOREIGN KEY (id_tp_riesgo) REFERENCES Tp_Riesgo(id_tp_riesgo) ON DELETE SET NULL -- Clave foránea para referenciar el tipo de riesgo
) ENGINE=InnoDB;



-- ----------------------------------------------------------
-- Estructura de tabla para la tabla `C_Encargado`-----------
-- ----------------------------------------------------------

-- -----------------------------------------------------------
-- Eliminar la tabla Encargados si existe--------------------
-- -----------------------------------------------------------

DROP TABLE IF EXISTS C_Encargados;-- elimina  la tabla si ya existe

-- -----------------------------------------------------------
-- Crear la tabla Encargados---------------------------------
-- -----------------------------------------------------------
CREATE TABLE C_Encargados (
    id_encargado int NOT NULL AUTO_INCREMENT, -- Identificador único del encargado
    rut_encargado varchar(20), -- RUT del cliente (debe ser único)
    nombre_encargado varchar(255) NOT NULL, -- Nombre del encargado
    email_encargado varchar(100), -- Email del encargado
    fono_encargado varchar(20), -- Teléfono del encargado
    celular_encargado varchar(20), -- Celular del encargado
    proyecto_asignado varchar(255), -- Proyecto asignado al encargado
    PRIMARY KEY (id_encargado) -- Definición de la clave primaria
) ENGINE=InnoDB;

-- ----------------------------------------------------------
-- Estructura de tabla para la tabla `Em_Vendedores`---------
-- ----------------------------------------------------------

-- -----------------------------------------------------------
-- Eliminar la tabla Em_Vendedores si existe-----------------
-- -----------------------------------------------------------

DROP TABLE IF EXISTS Em_Vendedores;-- elimina  la tabla si ya existe

-- -----------------------------------------------------------
-- Crear la tabla Em_Vendedores------------------------------
-- -----------------------------------------------------------
CREATE TABLE Em_Vendedores (
    id_vendedor INT NOT NULL AUTO_INCREMENT, -- Identificador único del vendedor
    rut_vendedor VARCHAR(20), -- RUT del vendedor (debe ser único)
    nombre_vendedor VARCHAR(255) NOT NULL, -- Nombre del vendedor
    email_vendedor VARCHAR(100), -- Email del vendedor
    fono_vendedor VARCHAR(20), -- Teléfono del vendedor
    celular_vendedor VARCHAR(20), -- Celular del vendedor
    id_tp_cargo INT DEFAULT 3, -- Identificador del tipo de cargo del vendedor (FK), con valor por defecto de 3
    PRIMARY KEY (id_vendedor), -- Definición de la clave primaria
    FOREIGN KEY (id_tp_cargo) REFERENCES Tp_cargo(id_tp_cargo) ON DELETE SET NULL -- Clave foránea para referenciar el tipo de cargo
) ENGINE=InnoDB;


-- ----------------------------------------------------------
-- Estructura de tabla para la tabla `Tp_Banco`--------------
-- ----------------------------------------------------------

-- -----------------------------------------------------------
-- Eliminar la tabla Tp_Banco si existe----------------------
-- -----------------------------------------------------------

DROP TABLE IF EXISTS Tp_Banco;-- elimina  la tabla si ya existe

-- -----------------------------------------------------------
-- Crear la tabla Tp_Banco-----------------------------------
-- -----------------------------------------------------------
CREATE TABLE Tp_Banco (
    id_banco INT AUTO_INCREMENT PRIMARY KEY,
    nombre_banco VARCHAR(255) NOT NULL UNIQUE
);

-- ----------------------------------------------------------
-- Estructura de tabla para la tabla `Tp_Cuenta`-------------
-- ----------------------------------------------------------

-- -----------------------------------------------------------
-- Eliminar la tabla Tp_Cuenta si existe---------------------
-- -----------------------------------------------------------

DROP TABLE IF EXISTS Tp_Cuenta;-- elimina  la tabla si ya existe

-- -----------------------------------------------------------
-- Crear la tabla Tp_Cuenta----------------------------------
-- -----------------------------------------------------------

CREATE TABLE Tp_Cuenta (
    id_tipocuenta INT AUTO_INCREMENT PRIMARY KEY,
    tipocuenta VARCHAR(255) NOT NULL,
    descripcion VARCHAR(255)
);

-- ----------------------------------------------------------
-- Estructura de tabla para la tabla `Em_Cuenta_Bancaria`----
-- ----------------------------------------------------------

-- -----------------------------------------------------------
-- Eliminar la tabla Em_Cuenta_Bancaria si existe------------
-- -----------------------------------------------------------

DROP TABLE IF EXISTS Em_Cuenta_Bancaria; -- elimina  la tabla si existe

-- -----------------------------------------------------------
-- crea la tabla Em_Cuenta_Bancaria---------------------------
-- -----------------------------------------------------------
CREATE TABLE Em_Cuenta_Bancaria (
    id_cuenta INT AUTO_INCREMENT PRIMARY KEY,
    rut_titular VARCHAR(12) NOT NULL,
    nombre_titular VARCHAR(255) NOT NULL,
    id_banco INT NOT NULL,
    id_tipocuenta INT NOT NULL,
    numero_cuenta VARCHAR(20) NOT NULL,
    celular INT ,
    email_banco VARCHAR(255) NOT NULL,
    id_empresa INT NOT NULL,
    FOREIGN KEY (id_banco) REFERENCES Tp_Banco(id_banco),
    FOREIGN KEY (id_tipocuenta) REFERENCES Tp_Cuenta(id_tipocuenta),
    FOREIGN KEY (id_empresa) REFERENCES E_Empresa(id_empresa)
);


-- ----------------------------------------------------------
-- Estructura de tabla para la tabla `C_Cotizaciones`--------
-- ----------------------------------------------------------

-- -----------------------------------------------------------
-- Eliminar la tabla Cotizaciones si existe------------------
-- -----------------------------------------------------------

DROP TABLE IF EXISTS C_Cotizaciones; -- elimina  la tabla si esta ya existe 

-- -----------------------------------------------------------
-- Crear la tabla Cotizaciones actualizada-------------------
-- -----------------------------------------------------------
CREATE TABLE C_Cotizaciones (
    id_cotizacion INT NOT NULL AUTO_INCREMENT,
    numero_cotizacion VARCHAR(50) NOT NULL,
    fecha_emision DATE, 
    fecha_validez DATE, 
    estado varchar(50),
    id_cliente INT, 
    id_proyecto INT, 
    id_empresa INT, 
    id_vendedor INT, 
    id_encargado INT,
    PRIMARY KEY (id_cotizacion),
    FOREIGN KEY (id_cliente) REFERENCES C_Clientes(id_cliente) ON DELETE CASCADE, 
    FOREIGN KEY (id_proyecto) REFERENCES C_Proyectos(id_proyecto) ON DELETE CASCADE, 
    FOREIGN KEY (id_empresa) REFERENCES E_Empresa(id_empresa) ON DELETE CASCADE, 
    FOREIGN KEY (id_vendedor) REFERENCES Em_Vendedores(id_vendedor) ON DELETE SET NULL,
    FOREIGN KEY (id_encargado) REFERENCES Em_Encargados(id_encargado) ON DELETE SET NULL
) ENGINE=InnoDB ;

-- ----------------------------------------------------------
-- Estructura de tabla para la tabla `C_Titulos`-------------
-- ----------------------------------------------------------

-- -----------------------------------------------------------
-- Eliminar la tabla Titulos si existe-----------------------
-- -----------------------------------------------------------

DROP TABLE IF EXISTS C_Titulos; -- elimina  la tabla si existe

-- -----------------------------------------------------------
-- Crear la tabla Titulos------------------------------------
-- -----------------------------------------------------------
CREATE TABLE C_Titulos (
    id_titulo INT NOT NULL AUTO_INCREMENT,
    id_cotizacion INT NOT NULL,
    nombre VARCHAR(255) NOT NULL,
    PRIMARY KEY (id_titulo),
    FOREIGN KEY (id_cotizacion) REFERENCES C_Cotizaciones(id_cotizacion) ON DELETE CASCADE
) ENGINE=InnoDB ;




-- ----------------------------------------------------------
-- Estructura de tabla para la tabla `C_Subtitulos`----------
-- ----------------------------------------------------------

-- -----------------------------------------------------------
-- Crear la tabla C_Subtitulos-------------------------------
-- -----------------------------------------------------------
CREATE TABLE C_Subtitulos (
    id_subtitulo INT NOT NULL AUTO_INCREMENT,
    id_titulo INT NOT NULL,     -- ID del título
    nombre VARCHAR(255),
    color VARCHAR(255),
    PRIMARY KEY (id_subtitulo),
    FOREIGN KEY (id_titulo) REFERENCES C_Titulos(id_titulo) ON DELETE CASCADE
) ENGINE=InnoDB ;

-- ----------------------------------------------------------
-- Estructura de tabla para la tabla `C_Notas`---------------
-- ----------------------------------------------------------

-- -----------------------------------------------------------
-- Crear la tabla C_Notas------------------------------------
-- -----------------------------------------------------------
CREATE TABLE C_Notas (
    id_nota INT NOT NULL AUTO_INCREMENT,    -- ID de la nota
    id_titulo INT NOT NULL,                 -- ID del título (relación con C_Titulos)
    contenido TEXT,                         -- Contenido de la nota
    color VARCHAR(50),                      -- Color de la nota
    PRIMARY KEY (id_nota),
    FOREIGN KEY (id_titulo) REFERENCES C_Titulos(id_titulo) ON DELETE CASCADE
) ENGINE=InnoDB;



-- ----------------------------------------------------------
-- Estructura de tabla para la tabla `C_Detalle`-------------
-- ----------------------------------------------------------

-- -----------------------------------------------------------
-- Eliminar la tabla C_Detalles si existe--------------------
-- -----------------------------------------------------------

DROP TABLE IF EXISTS C_Detalles; -- elimina  la tabla si existe

-- -----------------------------------------------------------
-- Crear la tabla C_Detalles---------------------------------
-- -----------------------------------------------------------
CREATE TABLE C_Detalles (
    id_detalle INT NOT NULL AUTO_INCREMENT,
    id_titulo INT,
    id_subtitulo INT,
    tipo VARCHAR(50),
    nombre_producto VARCHAR(255),
    descripcion TEXT,
    cantidad INT NOT NULL,
    precio_unitario DECIMAL(10,2) NOT NULL,
    descuento_porcentaje DECIMAL(5,2) DEFAULT 0,
    color VARCHAR(255),
    total DECIMAL(10,2),
    PRIMARY KEY (id_detalle),
    FOREIGN KEY (id_subtitulo) REFERENCES C_Subtitulos(id_subtitulo) ON DELETE CASCADE,
    FOREIGN KEY (id_titulo) REFERENCES C_Titulos(id_titulo) ON DELETE CASCADE
) ENGINE=InnoDB ;

-- ----------------------------------------------------------
-- Estructura de tabla para la tabla `C-Totales`-------------
-- ----------------------------------------------------------

-- -----------------------------------------------------------
-- Eliminar la tabla C_Totales si existe---------------------
-- -----------------------------------------------------------

DROP TABLE IF EXISTS C_Totales; -- elimina  la tabla si existe

-- -----------------------------------------------------------
-- Crear la tabla C_Totales----------------------------------
-- -----------------------------------------------------------
CREATE TABLE C_Totales (
    id_total INT NOT NULL AUTO_INCREMENT,
    id_cotizacion INT NOT NULL,
    sub_total INT,                 
    descuento_global INT,           
    monto_neto INT,                 
    iva_valor INT,             
    total_iva INT,                
    total_final INT,                
    total_final_letras VARCHAR(100),
    PRIMARY KEY (id_total),
    FOREIGN KEY (id_cotizacion) REFERENCES C_Cotizaciones(id_cotizacion) ON DELETE CASCADE
) ENGINE=InnoDB;

-- ----------------------------------------------------------
-- Estructura de tabla para la tabla `p_tipo_producto`-------
-- ----------------------------------------------------------

CREATE TABLE p_tipo_producto (
    id_tipo_producto INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    tipo_producto VARCHAR(255) NOT NULL,
    titulo VARCHAR(255)
) ENGINE=InnoDB ;

-- ----------------------------------------------------------
-- Estructura de tabla para la tabla `productos`-------
-- --------------------------------------------------------

CREATE TABLE productos (
    id_producto INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre_producto VARCHAR(255) NOT NULL,
    tipo_producto INT NOT NULL,
    precio DECIMAL(10, 2) NOT NULL,
    descripcion TEXT,
    cantidad INT NOT NULL,
    ruta_foto VARCHAR(255),
    FOREIGN KEY (tipo_producto) REFERENCES p_tipo_producto(id_tipo_producto)
) ENGINE=InnoDB;

-- ----------------------------------------------------------
-- Estructura de tabla para la tabla `C_pago`----------------
-- ----------------------------------------------------------

-- -----------------------------------------------------------
-- Eliminar la tabla pago si existe--------------------------
-- -----------------------------------------------------------

DROP TABLE IF EXISTS C_pago; -- elimina  la tabla si existe

-- -----------------------------------------------------------
-- Crear la tabla pago---------------------------------------
-- -----------------------------------------------------------
CREATE TABLE C_pago (
    id_pago INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_cotizacion INT NOT NULL, -- ID de la cotización (clave foránea)
    numero_pago INT,
    descripcion VARCHAR(255),
    porcentaje_pago INT(3) DEFAULT 0, 
    monto_pago INT(10) DEFAULT 0,
    fecha_pago DATE,
    id_forma_pago INT, -- Identificador de la forma de pago (clave foránea)
    FOREIGN KEY (id_cotizacion) REFERENCES C_Cotizaciones(id_cotizacion) ON DELETE CASCADE,
    FOREIGN KEY (id_forma_pago) REFERENCES Tp_Pago(id) ON DELETE SET NULL
) ENGINE=InnoDB;

COMMIT;

-- ------------------------------------------------------------
-- Estructura de tabla para la tabla `Em_Condiciones_generales`
-- ------------------------------------------------------------

-- -------------------------------------------------------------
-- elimina  la tabla Em_Condiciones_Generales--------------------
-- -------------------------------------------------------------

DROP TABLE IF EXISTS Em_Condiciones_Generales; -- elimina  la tabla si existe

-- -------------------------------------------------------------
-- Crear la tabla Condiciones_Generales------------------------
-- -------------------------------------------------------------
CREATE TABLE Em_Condiciones_Generales (
    id_condiciones INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_empresa INT NOT NULL, -- ID de la cotización (clave foránea)
    descripcion_condiciones TEXT NOT NULL, -- Descripción de las condiciones generales
    estado BOOLEAN DEFAULT FALSE, -- Estado de la condición (por defecto, falso)
    FOREIGN KEY (id_empresa) REFERENCES E_Empresa(id_empresa) ON DELETE CASCADE -- Clave foránea hacia Cotizaciones
) ENGINE=InnoDB ;

-- ----------------------------------------------------------
-- Estructura de tabla para la tabla `C_Cotizacion_Condiciones`
-- ----------------------------------------------------------

-- -----------------------------------------------------------
-- elimina  la tabla C_Cotizacion_Condiciones------------------
-- -----------------------------------------------------------

DROP TABLE IF EXISTS C_Cotizacion_Condiciones; -- elimina  la tabla si existe

-- -----------------------------------------------------------
-- Crear la tabla intermedia Cotizacion_Condiciones----------
-- -----------------------------------------------------------

CREATE TABLE C_Cotizacion_Condiciones (
    id_cotizacion_condiciones INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_cotizacion INT NOT NULL, -- Clave foránea hacia Cotizaciones
    id_condiciones INT NOT NULL, -- Clave foránea hacia Condiciones Generales
    FOREIGN KEY (id_cotizacion) REFERENCES C_Cotizaciones(id_cotizacion) ON DELETE CASCADE,
    FOREIGN KEY (id_condiciones) REFERENCES Em_Condiciones_Generales(id_condiciones) ON DELETE CASCADE
  --  UNIQUE KEY (id_cotizacion, id_condiciones) Para evitar duplicados
) ENGINE=InnoDB ;

-- ----------------------------------------------------------
-- Estructura de tabla para la tabla `Em_Requisitos_Basicos`-
-- ----------------------------------------------------------

-- -----------------------------------------------------------
-- elimina  la tabla Em_Requisitos_basicos---------------------
-- -----------------------------------------------------------

DROP TABLE IF EXISTS Em_Requisitos_Basicos; -- elimina  la tabla si existe

-- -----------------------------------------------------------
-- Crear la tabla Requisitos_Basicos-------------------------
-- -----------------------------------------------------------
CREATE TABLE Em_Requisitos_Basicos (
    id_requisitos INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    indice INT NOT NULL, -- nueva tabla?
    descripcion_condiciones VARCHAR(255) NOT NULL,
    estado BOOLEAN DEFAULT FALSE, -- Estado de la condición (por defecto, falso)
    id_empresa INT NOT NULL, -- ID de la empresa (clave foránea)

    FOREIGN KEY (id_empresa) REFERENCES E_Empresa(id_empresa) ON DELETE CASCADE -- Clave foránea hacia Empresa
) ENGINE=InnoDB ;

-- -------------------------------------------------------------
-- Estructura de tabla para la tabla `C_Cotizaciones_Requisitos`
-- -------------------------------------------------------------

-- ---------------------------------------------------------------
-- eliminar la tabla intermedia Cotizaciones_Requisitos si existe
-- ---------------------------------------------------------------

DROP TABLE IF EXISTS C_Cotizaciones_Requisitos; -- elimina  la tabla si existe

-- Crear la tabla intermedia Cotizaciones_Requisitos
CREATE TABLE C_Cotizaciones_Requisitos (
    id_cotizacion_requisito INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_cotizacion INT NOT NULL, -- Clave foránea hacia Cotizaciones
    id_requisitos INT NOT NULL, -- Clave foránea hacia Requisitos Básicos
    FOREIGN KEY (id_cotizacion) REFERENCES C_Cotizaciones(id_cotizacion) ON DELETE CASCADE,
    FOREIGN KEY (id_requisitos) REFERENCES Em_Requisitos_Basicos(id_requisitos) ON DELETE CASCADE
   -- UNIQUE KEY (id_cotizacion, id_requisitos) -- Para evitar duplicados
) ENGINE=InnoDB;


-- ----------------------------------------------------------
-- Estructura de tabla para la tabla `Em_obligaciones_cliente
-- ----------------------------------------------------------

-- -----------------------------------------------------------
-- eliminar la tabla Em_obligaciones_cliente si existe-------
-- -----------------------------------------------------------

DROP TABLE IF EXISTS Em_obligaciones_cliente; -- elimina  la tabla si existe

-- -----------------------------------------------------------
-- Crear la tabla Em_obligaciones_cliente--------------------
-- -----------------------------------------------------------
CREATE TABLE Em_obligaciones_cliente (
    id INT AUTO_INCREMENT PRIMARY KEY,
    indice INT NOT NULL,
    descripcion TEXT NOT NULL,
    estado BOOLEAN DEFAULT FALSE, -- Estado de la condición (por defecto, falso)
    id_empresa INT NOT NULL,
    FOREIGN KEY (id_empresa) REFERENCES E_Empresa(id_empresa) ON DELETE CASCADE 
);

-- ---------------------------------------------------------------
-- Estructura de tabla para la tabla `C_Cotizaciones_Obligaciones`
-- ---------------------------------------------------------------

-- ----------------------------------------------------------------
-- elimina  la tabla C_Cotizaciones_Obligaciones--------------------
-- ----------------------------------------------------------------

DROP TABLE IF EXISTS C_Cotizaciones_Obligaciones; -- elimina  la tabla si existe

-- ----------------------------------------------------------------
-- Crear la tabla intermedia Cotizaciones_Obligaciones------------
-- ----------------------------------------------------------------

CREATE TABLE C_Cotizaciones_Obligaciones (
    id_cotizacion_obligacion INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_cotizacion INT NOT NULL, -- Clave foránea hacia Cotizaciones
    id_obligacion INT NOT NULL, -- Clave foránea hacia Obligaciones del Cliente
    FOREIGN KEY (id_cotizacion) REFERENCES C_Cotizaciones(id_cotizacion) ON DELETE CASCADE,
    FOREIGN KEY (id_obligacion) REFERENCES Em_obligaciones_cliente(id) ON DELETE CASCADE
    -- UNIQUE KEY (id_cotizacion, id_obligacion) -- Para evitar duplicados
) ENGINE=InnoDB;




-- ----------------------------------------------------------
-- Estructura de tabla para la tabla `C_Observaciones`-------
-- ----------------------------------------------------------

-- -----------------------------------------------------------
-- Elimina la tabla Observaciones----------------------------
-- -----------------------------------------------------------

DROP TABLE IF EXISTS C_Observaciones; -- elimina  la tabla si existe

-- -----------------------------------------------------------
-- crea la tabla C_Oberservaciones----------------------------
-- -----------------------------------------------------------
CREATE TABLE C_Observaciones (
    id_observacion INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_cotizacion INT NOT NULL, -- Clave foránea hacia Cotizaciones
    observacion TEXT , -- Campo para guardar la observación
    FOREIGN KEY (id_cotizacion) REFERENCES C_Cotizaciones(id_cotizacion) ON DELETE CASCADE
) ENGINE=InnoDB;


-- ----------------------------------------------------------
-- Estructura de tabla para la tabla `C_mensaje_despedida`---
-- ----------------------------------------------------------

-- -----------------------------------------------------------
-- Crear la tabla C_Mensaje_Despedida------------------------
-- -----------------------------------------------------------

DROP TABLE IF EXISTS C_mensaje_despedida; -- elimina  la tabla si existe

-- -----------------------------------------------------------
-- Crea la tabla C-Mensaje_Despedida-------------------------
-- -----------------------------------------------------------
CREATE TABLE C_Mensaje_Despedida (
    id_mensaje_despedida INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_cotizacion INT NOT NULL, -- Clave foránea hacia Cotizaciones
    mensaje_despedida TEXT , -- Campo para guardar el mensaje
    FOREIGN KEY (id_cotizacion) REFERENCES C_Cotizaciones(id_cotizacion) ON DELETE CASCADE
) ENGINE=InnoDB;


-- ----------------------------------------------------------
-- Estructura de tabla para la tabla `Em_Firmas`-------------
-- ----------------------------------------------------------

-- -----------------------------------------------------------
-- crea la tabla Em_Firmas------------------------------------
-- -----------------------------------------------------------
CREATE TABLE Em_Firmas (
    id_firma INT AUTO_INCREMENT PRIMARY KEY,
    id_empresa INT NOT NULL,
    titulo_firma VARCHAR(255) NOT NULL,
    nombre_encargado_firma VARCHAR(255) NULL,
    cargo_encargado_firma VARCHAR(100) NULL, -- Campo de cargo del encargado
    telefono_encargado_firma VARCHAR(20) NULL,
    nombre_empresa_firma VARCHAR(255) NULL,
    area_empresa_firma VARCHAR(255) NULL,
    telefono_empresa_firma VARCHAR(20) NULL,
    firma_digital VARCHAR(255) NULL,
    email_firma VARCHAR(100) NULL,
    direccion_firma VARCHAR(255) NULL,
    ciudad_firma VARCHAR(100) NULL, -- Campo para la ciudad
    pais_firma VARCHAR(100) NULL, -- Campo para el país
    rut_firma VARCHAR(20) NULL,
    web_firma VARCHAR(255) NULL, -- Campo para el sitio web
    FOREIGN KEY (id_empresa) REFERENCES E_Empresa(id_empresa)
);


-- ------------------------------------------------------------------------------------------------------------
-- ------------------------------------- INDICES  ----------------------------------------------
-- ------------------------------------------------------------------------------------------------------------ 




-- ------------------------------------------------------------------------------------------------------------
-- ------------------------------------- INSERT DATOS ----------------------------------------------
-- ------------------------------------------------------------------------------------------------------------ 
-- Insertar áreas de ejemplo en la tabla E_AreaEmpresa
INSERT INTO Tp_cargo (nombre_cargo) VALUES ('Gerente General'),
                                            ('Administrador'),
                                             ('Vendedor'),
                                              ('Representante'),
                                               ('Encargado');

-- Insertar áreas de ejemplo en la tabla E_AreaEmpresa
INSERT INTO Tp_Area (nombre_area) VALUES ('Recursos Humanos'),
                                           ('Finanzas'),
                                             ('Tecnología'),
                                               ('Marketing'),
                                                 ('Ventas');

-- Insertar áreas de ejemplo en la tabla E_AreaEmpresa
INSERT INTO Tp_Trabajo (nombre_trabajo) VALUES ('Instalaciones'),
                                                 ('Desarrollo de Software'),
                                                   ('Contrucción'),
                                                    ('Pagina Web'),
                                                     ('Diseño web');
-- Insertar áreas de ejemplo en la tabla Tp_Firma
INSERT INTO Tp_firma (tipo) VALUES ('automatica'),
                                    ('manual'),
                                     ('digital'),
                                      ('foto');

-- Insertar áreas de ejemplo en la tabla Tp_Firma
INSERT INTO Tp_Riesgo (nombre_riesgo) VALUES ('sin riesgo'),
                                              ('bajo riesgo'),
                                               ('medio riesgo'),
                                                ('alto riesgo');

-- Insertar datos en la tabla pais
INSERT INTO pais (nombre_pais) VALUES 
('Chile'),
('Argentina'),
('Brasil'),
('Perú'),
('Colombia'),
('México'),
('Estados Unidos'),
('Canadá'),
('España'),
('Francia');

-- Insertar datos en la tabla ciudades
INSERT INTO ciudades (nombre_ciudad, id_pais) VALUES 
('Santiago', 1), -- Chile
('Valparaíso', 1), -- Chile
('Concepción', 1), -- Chile
('Buenos Aires', 2), -- Argentina
('São Paulo', 3), -- Brasil
('Lima', 4), -- Perú
('Bogotá', 5), -- Colombia
('Ciudad de México', 6), -- México
('Nueva York', 7), -- Estados Unidos
('Toronto', 8); -- Canadá

-- Insertar datos en la tabla comuna para la ciudad de Santiago
INSERT INTO comuna (nombre_comuna, id_ciudad) VALUES 
('Las Condes', 1), -- Santiago
('Providencia', 1), -- Santiago
('Ñuñoa', 1), -- Santiago
('La Florida', 1), -- Santiago
('Santiago Centro', 1), -- Santiago
('Vitacura', 1), -- Santiago
('Recoleta', 1), -- Santiago
('Macul', 1), -- Santiago
('Peñalolén', 1), -- Santiago
('Lo Barnechea', 1); -- Santiago

-- Insertar datos en la tabla comuna para otras ciudades
INSERT INTO comuna (nombre_comuna, id_ciudad) VALUES 
('Valparaíso', 2), -- Valparaíso
('Concepción', 3), -- Concepción
('Palermo', 4), -- Buenos Aires
('Jardins', 5), -- São Paulo
('Miraflores', 6), -- Lima
('Chapinero', 7), -- Bogotá
('Polanco', 8), -- Ciudad de México
('Manhattan', 9), -- Nueva York
('Downtown', 10); -- Toronto
                                                
-- Insertar datos en la tabla+ tp_pago

INSERT INTO Tp_Pago (tipo) VALUES ('Efectivo');
INSERT INTO Tp_Pago (tipo) VALUES ('Tarjeta de Crédito');
INSERT INTO Tp_Pago (tipo) VALUES ('Tarjeta de Débito');
INSERT INTO Tp_Pago (tipo) VALUES ('Transferencia Bancaria');
INSERT INTO Tp_Pago (tipo) VALUES ('Cheque');
INSERT INTO Tp_Pago (tipo) VALUES ('PayPal');
INSERT INTO Tp_Pago (tipo) VALUES ('Crédito a 30 días');
INSERT INTO Tp_Pago (tipo) VALUES ('Crédito a 60 días');
INSERT INTO Tp_Pago (tipo) VALUES ('Crédito a 90 días');
INSERT INTO Tp_Pago (tipo) VALUES ('Pago Contra Entrega');
INSERT INTO Tp_Pago (tipo) VALUES ('Pago en Cuotas');
INSERT INTO Tp_Pago (tipo) VALUES ('Pago por Adelantado');
INSERT INTO Tp_Pago (tipo) VALUES ('Pago con Puntos de Fidelidad');
INSERT INTO Tp_Pago (tipo) VALUES ('Pago con Criptomonedas');
INSERT INTO Tp_Pago (tipo) VALUES ('Pago con Vale Vista');

-- Insertar datos en la tabla Tp_giro

INSERT INTO Tp_Giro (tipo) VALUES ('Comercio');
INSERT INTO Tp_Giro (tipo) VALUES ('Servicios');
INSERT INTO Tp_Giro (tipo) VALUES ('Manufactura');
INSERT INTO Tp_Giro (tipo) VALUES ('Construcción');
INSERT INTO Tp_Giro (tipo) VALUES ('Tecnología');
INSERT INTO Tp_Giro (tipo) VALUES ('Alimentos y Bebidas');
INSERT INTO Tp_Giro (tipo) VALUES ('Educación');
INSERT INTO Tp_Giro (tipo) VALUES ('Salud');
INSERT INTO Tp_Giro (tipo) VALUES ('Finanzas');
INSERT INTO Tp_Giro (tipo) VALUES ('Agricultura');
INSERT INTO Tp_Giro (tipo) VALUES ('Logística y Transporte');
INSERT INTO Tp_Giro (tipo) VALUES ('Inmobiliario');
INSERT INTO Tp_Giro (tipo) VALUES ('Minería');
INSERT INTO Tp_Giro (tipo) VALUES ('Energía');
INSERT INTO Tp_Giro (tipo) VALUES ('Turismo');
INSERT INTO Tp_Giro (tipo) VALUES ('Arte y Cultura');

-- Insertar datos en la tabla Tp_cliente
INSERT INTO Tp_Cliente (tipo) VALUES ('Corporativo');
INSERT INTO Tp_Cliente (tipo) VALUES ('Individual');
INSERT INTO Tp_Cliente (tipo) VALUES ('Gobierno');
INSERT INTO Tp_Cliente (tipo) VALUES ('ONG');
INSERT INTO Tp_Cliente (tipo) VALUES ('Educativo');
INSERT INTO Tp_Cliente (tipo) VALUES ('Salud');
INSERT INTO Tp_Cliente (tipo) VALUES ('Tecnología');
INSERT INTO Tp_Cliente (tipo) VALUES ('Financiero');
INSERT INTO Tp_Cliente (tipo) VALUES ('Retail');
INSERT INTO Tp_Cliente (tipo) VALUES ('Manufactura');
INSERT INTO Tp_Cliente (tipo) VALUES ('Construcción');
INSERT INTO Tp_Cliente (tipo) VALUES ('Transporte');
INSERT INTO Tp_Cliente (tipo) VALUES ('Agricultura');
INSERT INTO Tp_Cliente (tipo) VALUES ('Turismo');
INSERT INTO Tp_Cliente (tipo) VALUES ('Energía');

-- Insertar datos en la tabla Tp_Lugar
INSERT INTO Tp_Lugar (nombre_lugar) VALUES 
('Oficina'),
('Casa'),
('Local Comercial'),
('Almacén'),
('Bodega'),
('Fábrica'),
('Taller'),
('Consultorio'),
('Laboratorio'),
('Centro de Distribución'),
('Depósito'),
('Sucursal'),
('Planta Industrial'),
('Estación de Servicio'),
('Centro Comercial'),
('Parque Empresarial'),
('Edificio Corporativo'),
('Showroom'),
('Centro Logístico'),
('Punto de Venta');

 -- Insertar datos en la tabla Bancos
INSERT INTO Tp_Banco (nombre_banco) VALUES
('Banco de Chile'),
('Banco Santander Chile'),
('Banco Estado'),
('Banco BICE'),
('Banco Itaú'),
('Banco Security'),
('Banco Consorcio'),
('Banco BBVA'),
('Banco Falabella'),
('Banco Penta'),
('Scotiabank Chile'),
('HSBC Bank Chile'),
('Coopeuch'),
('Banco del Desarrollo');

 -- Insertar datos en la tabla Tipo_cuenta
INSERT INTO Tp_Cuenta (tipocuenta, descripcion) VALUES
('Cuenta RUT', 'Cuenta de ahorro o corriente con disponibilidad inmediata de fondos'),
('Cuenta Vista', 'Cuenta de ahorro o corriente con disponibilidad inmediata de fondos'),
('Cuenta Corriente', 'Cuenta con chequera y posibilidad de sobregiro'),
('Cuenta Ahorro', 'Cuenta de ahorro con interés sobre el saldo'),
('Cuenta Chequera Electrónica', 'Cuenta corriente con chequera electrónica'),
('Cuenta Vista en Moneda Extranjera', 'Cuenta en divisas extranjeras'),
('Cuenta de Ahorro a Plazo', 'Cuenta con interés a plazo fijo'),
('Cuenta Corriente Internacional', 'Cuenta corriente con uso internacional'),
('Cuenta Nómina', 'Cuenta para recibir pagos de nómina'),
('Cuenta de Inversión', 'Cuenta asociada a productos de inversión');

-- Título para la sección tipos de productos
INSERT INTO p_tipo_producto (tipo_producto, titulo) VALUES ('Nuevo', 'Título: Productos');
INSERT INTO p_tipo_producto (tipo_producto, titulo) VALUES ('Insumo', 'Título: Productos');
INSERT INTO p_tipo_producto (tipo_producto, titulo) VALUES ('Producto', 'Título: Productos');
INSERT INTO p_tipo_producto (tipo_producto, titulo) VALUES ('Material', 'Título: Productos');
INSERT INTO p_tipo_producto (tipo_producto, titulo) VALUES ('Ferretería', 'Título: Productos');
INSERT INTO p_tipo_producto (tipo_producto, titulo) VALUES ('Profesional', 'Título: Profesionales');
INSERT INTO p_tipo_producto (tipo_producto, titulo) VALUES ('Técnico', 'Título: Profesionales');
INSERT INTO p_tipo_producto (tipo_producto, titulo) VALUES ('Maestro', 'Título: Profesionales');
INSERT INTO p_tipo_producto (tipo_producto, titulo) VALUES ('Ayudante', 'Título: Profesionales');
INSERT INTO p_tipo_producto (tipo_producto, titulo) VALUES ('Producto con Imagen', 'Título: Productos con Imagen');
INSERT INTO p_tipo_producto (tipo_producto, titulo) VALUES ('Otros', 'Título: Otros');
INSERT INTO p_tipo_producto (tipo_producto, titulo) VALUES ('Extras del Proyecto', 'Título: Otros');
INSERT INTO p_tipo_producto (tipo_producto, titulo) VALUES ('Horas Extras', 'Título: Otros');
INSERT INTO p_tipo_producto (tipo_producto, titulo) VALUES ('Seguro', 'Título: Otros');
INSERT INTO p_tipo_producto (tipo_producto, titulo) VALUES ('Viático', 'Título: Otros');
INSERT INTO p_tipo_producto (tipo_producto, titulo) VALUES ('Bodega', 'Título: Otros');
INSERT INTO p_tipo_producto (tipo_producto, titulo) VALUES ('Gastos Generales', 'Título: Otros');
INSERT INTO p_tipo_producto (tipo_producto, titulo) VALUES ('Utilidades de la Empresa', 'Título: Otros');
INSERT INTO p_tipo_producto (tipo_producto, titulo) VALUES ('Garantías', 'Título: Otros');
INSERT INTO p_tipo_producto (tipo_producto, titulo) VALUES ('Eventos o Pérdidas', 'Título: Otros');
INSERT INTO p_tipo_producto (tipo_producto, titulo) VALUES ('Asesoría', 'Título: Otros');

INSERT INTO productos (nombre_producto, tipo_producto, precio, descripcion, cantidad) VALUES ('Producto Nuevo 1', 1, 100.00, 'Descripción del Producto Nuevo 1', 10);
INSERT INTO productos (nombre_producto, tipo_producto, precio, descripcion, cantidad) VALUES ('Producto Nuevo 2', 1, 150.00, 'Descripción del Producto Nuevo 2', 20);
INSERT INTO productos (nombre_producto, tipo_producto, precio, descripcion, cantidad) VALUES ('Producto Insumo 1', 2, 200.00, 'Descripción del Producto Insumo 1', 30);
INSERT INTO productos (nombre_producto, tipo_producto, precio, descripcion, cantidad) VALUES ('Producto Insumo 2', 2, 250.00, 'Descripción del Producto Insumo 2', 40);
INSERT INTO productos (nombre_producto, tipo_producto, precio, descripcion, cantidad) VALUES ('Producto Producto 1', 3, 300.00, 'Descripción del Producto Producto 1', 50);
INSERT INTO productos (nombre_producto, tipo_producto, precio, descripcion, cantidad) VALUES ('Producto Producto 2', 3, 350.00, 'Descripción del Producto Producto 2', 60);
INSERT INTO productos (nombre_producto, tipo_producto, precio, descripcion, cantidad) VALUES ('Producto Material 1', 4, 400.00, 'Descripción del Producto Material 1', 70);
INSERT INTO productos (nombre_producto, tipo_producto, precio, descripcion, cantidad) VALUES ('Producto Material 2', 4, 450.00, 'Descripción del Producto Material 2', 80);
INSERT INTO productos (nombre_producto, tipo_producto, precio, descripcion, cantidad) VALUES ('Producto Ferretería 1', 5, 500.00, 'Descripción del Producto Ferretería 1', 90);
INSERT INTO productos (nombre_producto, tipo_producto, precio, descripcion, cantidad) VALUES ('Producto Ferretería 2', 5, 550.00, 'Descripción del Producto Ferretería 2', 100);
INSERT INTO productos (nombre_producto, tipo_producto, precio, descripcion, cantidad) VALUES ('Producto Profesional 1', 6, 600.00, 'Descripción del Producto Profesional 1', 110);
INSERT INTO productos (nombre_producto, tipo_producto, precio, descripcion, cantidad) VALUES ('Producto Profesional 2', 6, 650.00, 'Descripción del Producto Profesional 2', 120);
INSERT INTO productos (nombre_producto, tipo_producto, precio, descripcion, cantidad) VALUES ('Producto Técnico 1', 7, 700.00, 'Descripción del Producto Técnico 1', 130);
INSERT INTO productos (nombre_producto, tipo_producto, precio, descripcion, cantidad) VALUES ('Producto Técnico 2', 7, 750.00, 'Descripción del Producto Técnico 2', 140);
INSERT INTO productos (nombre_producto, tipo_producto, precio, descripcion, cantidad) VALUES ('Producto Maestro 1', 8, 800.00, 'Descripción del Producto Maestro 1', 150);
INSERT INTO productos (nombre_producto, tipo_producto, precio, descripcion, cantidad) VALUES ('Producto Maestro 2', 8, 850.00, 'Descripción del Producto Maestro 2', 160);
INSERT INTO productos (nombre_producto, tipo_producto, precio, descripcion, cantidad) VALUES ('Producto Ayudante 1', 9, 900.00, 'Descripción del Producto Ayudante 1', 170);
INSERT INTO productos (nombre_producto, tipo_producto, precio, descripcion, cantidad) VALUES ('Producto Ayudante 2', 9, 950.00, 'Descripción del Producto Ayudante 2', 180);
INSERT INTO productos (nombre_producto, tipo_producto, precio, descripcion, cantidad) VALUES ('Producto con Imagen 1', 10, 1000.00, 'Descripción del Producto con Imagen 1', 190);
INSERT INTO productos (nombre_producto, tipo_producto, precio, descripcion, cantidad) VALUES ('Producto con Imagen 2', 10, 1050.00, 'Descripción del Producto con Imagen 2', 200);
INSERT INTO productos (nombre_producto, tipo_producto, precio, descripcion, cantidad) VALUES ('Producto Otros 1', 11, 1100.00, 'Descripción del Producto Otros 1', 210);
INSERT INTO productos (nombre_producto, tipo_producto, precio, descripcion, cantidad) VALUES ('Producto Otros 2', 11, 1150.00, 'Descripción del Producto Otros 2', 220);
INSERT INTO productos (nombre_producto, tipo_producto, precio, descripcion, cantidad) VALUES ('Producto Extras del Proyecto 1', 12, 1200.00, 'Descripción del Producto Extras del Proyecto 1', 230);
INSERT INTO productos (nombre_producto, tipo_producto, precio, descripcion, cantidad) VALUES ('Producto Extras del Proyecto 2', 12, 1250.00, 'Descripción del Producto Extras del Proyecto 2', 240);
INSERT INTO productos (nombre_producto, tipo_producto, precio, descripcion, cantidad) VALUES ('Producto Horas Extras 1', 13, 1300.00, 'Descripción del Producto Horas Extras 1', 250);
INSERT INTO productos (nombre_producto, tipo_producto, precio, descripcion, cantidad) VALUES ('Producto Horas Extras 2', 13, 1350.00, 'Descripción del Producto Horas Extras 2', 260);
INSERT INTO productos (nombre_producto, tipo_producto, precio, descripcion, cantidad) VALUES ('Producto Seguro 1', 14, 1400.00, 'Descripción del Producto Seguro 1', 270);
INSERT INTO productos (nombre_producto, tipo_producto, precio, descripcion, cantidad) VALUES ('Producto Seguro 2', 14, 1450.00, 'Descripción del Producto Seguro 2', 280);
INSERT INTO productos (nombre_producto, tipo_producto, precio, descripcion, cantidad) VALUES ('Producto Viático 1', 15, 1500.00, 'Descripción del Producto Viático 1', 290);
INSERT INTO productos (nombre_producto, tipo_producto, precio, descripcion, cantidad) VALUES ('Producto Viático 2', 15, 1550.00, 'Descripción del Producto Viático 2', 300);
INSERT INTO productos (nombre_producto, tipo_producto, precio, descripcion, cantidad) VALUES ('Producto Bodega 1', 16, 1600.00, 'Descripción del Producto Bodega 1', 310);
INSERT INTO productos (nombre_producto, tipo_producto, precio, descripcion, cantidad) VALUES ('Producto Bodega 2', 16, 1650.00, 'Descripción del Producto Bodega 2', 320);
INSERT INTO productos (nombre_producto, tipo_producto, precio, descripcion, cantidad) VALUES ('Producto Gastos Generales 1', 17, 1700.00, 'Descripción del Producto Gastos Generales 1', 330);
INSERT INTO productos (nombre_producto, tipo_producto, precio, descripcion, cantidad) VALUES ('Producto Gastos Generales 2', 17, 1750.00, 'Descripción del Producto Gastos Generales 2', 340);
INSERT INTO productos (nombre_producto, tipo_producto, precio, descripcion, cantidad) VALUES ('Producto Utilidades de la Empresa 1', 18, 1800.00, 'Descripción del Producto Utilidades de la Empresa 1', 350);
INSERT INTO productos (nombre_producto, tipo_producto, precio, descripcion, cantidad) VALUES ('Producto Utilidades de la Empresa 2', 18, 1850.00, 'Descripción del Producto Utilidades de la Empresa 2', 360);
INSERT INTO productos (nombre_producto, tipo_producto, precio, descripcion, cantidad) VALUES ('Producto Garantías 1', 19, 1900.00, 'Descripción del Producto Garantías 1', 370);
INSERT INTO productos (nombre_producto, tipo_producto, precio, descripcion, cantidad) VALUES ('Producto Garantías 2', 19, 1950.00, 'Descripción del Producto Garantías 2', 380);
INSERT INTO productos (nombre_producto, tipo_producto, precio, descripcion, cantidad) VALUES ('Producto Eventos o Pérdidas 1', 20, 2000.00, 'Descripción del Producto Eventos o Pérdidas 1', 390);
INSERT INTO productos (nombre_producto, tipo_producto, precio, descripcion, cantidad) VALUES ('Producto Eventos o Pérdidas 2', 20, 2050.00, 'Descripción del Producto Eventos o Pérdidas 2', 400);
INSERT INTO productos (nombre_producto, tipo_producto, precio, descripcion, cantidad) VALUES ('Producto Asesoría 1', 21, 2100.00, 'Descripción del Producto Asesoría 1', 410);
INSERT INTO productos (nombre_producto, tipo_producto, precio, descripcion, cantidad) VALUES ('Producto Asesoría 2', 21, 2150.00, 'Descripción del Producto Asesoría 2', 420);

-- Insertar datos en la tabla E_FotosPerfil
INSERT INTO FP_FotosPerfil (id_foto, ruta_foto, fecha_subida)
VALUES (1, '../../../imagenes/editor_cotizacion/menu1_inicio/crear_nuevo/editor_menu2/menu2/programa_cotizacion/prueba2.png', '2024-09-09 17:25:20');



-- Insertar datos en la tabla E_Empresa
INSERT INTO E_Empresa (
    id_foto, 
    rut_empresa, 
    nombre_empresa, 
    id_area_empresa,
    direccion_empresa, 
    ciudad_empresa,
    pais_empresa,
    telefono_empresa, 
    email_empresa, 
    web_empresa,
    fecha_creacion,
    dias_validez,
    id_tipo_firma
) VALUES (
    1, -- ID de la foto asociada
    '12345678-9', -- RUT de la empresa
    'ITred Spa', -- Nombre de la empresa
    2, -- Área de la empresa
    'Guido Reni #4190', -- Dirección de la empresa
    'Pedro Aguirre Cerda', -- Ciudad de la empresa
    'Chile', -- Pais de la empresa
    '1234567890', -- Teléfono de la empresa
    'contacto@itred.cl', -- Email de la empresa
    'www.Iteredspa.cl', -- web de la empresa
    '2024-09-01', -- Fecha de creación
    10, -- validez de cotizacion
    1
);

-- Insertar datos en la tabla E_Encargados
INSERT INTO Em_Encargados (
    rut_encargado, 
    nombre_encargado, 
    email_encargado, 
    fono_encargado, 
    celular_encargado, 
    id_empresa
) VALUES (
    '12345678-9', -- RUT del encargado
    'Barner Piña', -- Nombre del encargado
    'Barner.Piña@itred.cl', -- Email del encargado
    '123456789', -- Teléfono del encargado
    '987654321', -- Celular del encargado
    1 -- ID de la empresa
);

-- Insertar datos en la tabla em_Condiciones_Generales
INSERT INTO Em_Condiciones_Generales (id_empresa, descripcion_condiciones, estado) VALUES
(1, 'Condición general 1: Cumplir con todas las normativas legales vigentes.', TRUE),
(1, 'Condición general 2: Realizar informes mensuales de avance del proyecto.', TRUE),
(1, 'Condición general 3: Proveer acceso a la documentación necesaria para el trabajo.', TRUE),
(1, 'Condición general 4: Garantizar la confidencialidad de la información compartida.', TRUE),
(1, 'Condición general 5: Proporcionar un plan de trabajo detallado antes del INICIO.', TRUE),
(1, 'Condición general 6: Realizar reuniones quincenales de seguimiento con el equipo.', TRUE),
(1, 'Condición general 7: Responder a los correos electrónicos en un plazo no mayor a 24 horas.', TRUE),
(1, 'Condición general 8: Asegurar la disponibilidad de los recursos necesarios para el proyecto.', TRUE),
(1, 'Condición general 9: Proveer retroalimentación constructiva durante el proceso.', TRUE),
(1, 'Condición general 10: Cumplir con los plazos establecidos en el cronograma del proyecto.', TRUE);

-- Insertar datos en la tabla em_Requisitos_Basicos
INSERT INTO Em_Requisitos_Basicos (indice, descripcion_condiciones, estado, id_empresa) VALUES
(1, 'Requisito básico 1: Registro de la empresa en el sistema.', TRUE, 1),
(2, 'Requisito básico 2: Presentar documentación legal actualizada.', TRUE, 1),
(3, 'Requisito básico 3: Cumplimiento de normativas de seguridad laboral.', TRUE, 1),
(4, 'Requisito básico 4: Tener un responsable de gestión de calidad.', TRUE, 1),
(5, 'Requisito básico 5: Disponer de un plan de contingencia ante emergencias.', TRUE, 1),
(6, 'Requisito básico 6: Realizar capacitaciones periódicas para los empleados.', TRUE, 1),
(7, 'Requisito básico 7: Implementar un sistema de gestión de recursos humanos.', TRUE, 1),
(8, 'Requisito básico 8: Mantener un inventario actualizado de los bienes.', TRUE, 1),
(9, 'Requisito básico 9: Contar con un canal de comunicación interna eficiente.', TRUE, 1),
(10, 'Requisito básico 10: Cumplir con las auditorías internas programadas.', TRUE, 1);

-- Insertar datos en la tabla em_obligaciones_cliente
INSERT INTO Em_obligaciones_cliente (indice, descripcion, estado, id_empresa) VALUES
(1, 'Obligación 1: Proporcionar información veraz sobre la empresa.', TRUE, 1),
(2, 'Obligación 2: Cumplir con los plazos de pago establecidos en el contrato.', TRUE, 1),
(3, 'Obligación 3: Colaborar en la entrega de documentación requerida.', TRUE, 1),
(4, 'Obligación 4: Mantener actualizados los datos de contacto.', TRUE, 1),
(5, 'Obligación 5: Notificar cambios relevantes en la operación de la empresa.', TRUE, 1),
(6, 'Obligación 6: Garantizar el acceso a las instalaciones para auditorías.', TRUE, 1),
(7, 'Obligación 7: Cumplir con las normativas de seguridad establecidas.', TRUE, 1),
(8, 'Obligación 8: Proveer capacitación al personal sobre el uso de servicios.', TRUE, 1),
(9, 'Obligación 9: Responder a las consultas realizadas por la empresa en tiempo y forma.', TRUE, 1),
(10, 'Obligación 10: Colaborar en la implementación de mejoras sugeridas.', TRUE, 1);


-- Insertar datos en la tabla C_Clientes
INSERT INTO C_Clientes (
    rut_empresa_cliente, 
    nombre_empresa_cliente, 
    telefono_empresa_cliente, 
    email_empresa_cliente, 
    id_giro, 
    id_tipo_empresa, 
    ciudad_empresa_cliente, 
    comuna_empresa_cliente, 
    direccion_empresa_cliente, 
    observacion, 
    rut_encargado_cliente, 
    nombre_encargado_cliente, 
    direccion_encargado_cliente, 
    telefono_encargado_cliente, 
    email_encargado_cliente, 
    id_cargo, 
    comuna_encargado_cliente, 
    ciudad_encargado_cliente
) VALUES (
    '98765432-1', -- RUT de la empresa del cliente
    'Ejemplo S.A.', -- Nombre de la empresa del cliente
    '0987654321', -- Teléfono de la empresa del cliente
    'contacto@ejemplo.com', -- Email de la empresa del cliente
    '1', -- Giro de la empresa del cliente
    '1', -- Tipo de empresa del cliente
    'Santiago', -- Ciudad de la empresa del cliente
    'Providencia', -- Comuna de la empresa del cliente
    'Av. Siempre Viva 123', -- Dirección de la empresa del cliente
    'Cliente con alta prioridad', -- Observación de la empresa del cliente
    '98765432-1', -- RUT del encargado
    'Juan Pérez', -- Nombre del encargado
    'Calle Falsa 123', -- Dirección del encargado
    '0987654321', -- Teléfono del encargado
    'juan.perez@ejemplo.com', -- Email del encargado
    1, -- Cargo del encargado
    'Providencia', -- Comuna del encargado
    'Santiago' -- Ciudad del encargado
);


-- Insertar datos en la tabla C_Proyectos
INSERT INTO C_Proyectos (
    nombre_proyecto, 
    codigo_proyecto, 
    id_tp_trabajo, 
    id_area, 
    id_tp_riesgo, 
    dias_compra, 
    dias_trabajo, 
    trabajadores, 
    horario, 
    colacion, 
    entrega
) VALUES (
    'Proyecto Alpha', -- Nombre del proyecto
    'PROJ-001', -- Código del proyecto
    2, -- Tipo de trabajo
    3, -- Área de trabajo
    2, -- Riesgo asociado
    '5', -- Días de compra
    '10', -- Días de trabajo
    5, -- Número de trabajadores
    '09:00 - 18:00', -- Horario de trabajo
    'Sí', -- Colación incluida
    'Finalización en 30 días' -- Entrega especificada
);

-- Insertar datos en la tabla C_Encargados
INSERT INTO C_Encargados (
    rut_encargado, 
    nombre_encargado, 
    email_encargado, 
    fono_encargado, 
    celular_encargado
) VALUES (
    '12345678-9', -- RUT del encargado
    'Ana Gómez', -- Nombre del encargado
    'ana.gomez@itred.cl', -- Email del encargado
    '123456789', -- Teléfono del encargado
    '987654321' -- Celular del encargado
);

-- Insertar datos en la tabla Em_Vendedores
INSERT INTO Em_Vendedores (
    rut_vendedor, 
    nombre_vendedor, 
    email_vendedor, 
    fono_vendedor, 
    celular_vendedor
) VALUES (
    '23456789-0', -- RUT del vendedor
    'Luis Martínez', -- Nombre del vendedor
    'luis.martinez@itred.cl', -- Email del vendedor
    '234567890', -- Teléfono del vendedor
    '876543210' -- Celular del vendedor
);

-- Insertar datos en la tabla C_Cotizaciones
INSERT INTO C_Cotizaciones (
    numero_cotizacion, 
    fecha_emision, 
    fecha_validez,
    estado, 
    id_cliente, 
    id_proyecto, 
    id_empresa, 
    id_vendedor, 
    id_encargado
) VALUES (
    '1', -- Número de cotización
    '2024-09-01', -- Fecha de emisión
    '2024-09-30', -- Fecha de validez
    'Pendiente',
    1, -- ID del cliente
    1, -- ID del proyecto
    1, -- ID de la empresa
    1, -- ID del vendedor
    1 -- ID del encargado
);

-- Insertar datos en la tabla C_Titulos
INSERT INTO C_Titulos (
    id_cotizacion, 
    nombre
) VALUES (
    1, -- ID de la cotización
    'Título Ejemplo' -- Nombre del título
);

-- Insertar datos en la tabla C_Subtitulos
INSERT INTO C_Subtitulos (
    id_titulo, 
    nombre
) VALUES (
    1, -- ID del título
    'Subtítulo Ejemplo' -- Nombre del subtítulo
);

-- Insertar datos en la tabla C_Detalles
INSERT INTO C_Detalles (
    id_titulo, 
    tipo, 
    nombre_producto, 
    descripcion, 
    cantidad, 
    precio_unitario, 
    descuento_porcentaje, 
    total
) VALUES (
    1, -- ID del título
    'Producto', -- Tipo
    'Producto Ejemplo', -- Nombre del producto
    'Descripción del producto ejemplo', -- Descripción
    10, -- Cantidad
    100.00, -- Precio unitario
    5.00, -- Descuento porcentaje
    950.00 -- Total
);

-- Insertar datos en la tabla C_Totales
INSERT INTO C_Totales (
    id_cotizacion, 
    sub_total, 
    descuento_global, 
    monto_neto, 
    iva_valor, 
    total_iva, 
    total_final,
    total_final_letras
) VALUES (
    1, -- ID de la cotización
    950.00, -- Sub total
    50.00, -- Descuento global
    900.00, -- Monto neto
    19.00, -- IVA valor
    171.00, -- Total IVA
    1071.00, -- Total final
    'MIL SETENTA y UN'
);


-- Insertar datos en la tabla C_pago
INSERT INTO C_pago (
    id_cotizacion, 
    descripcion, 
    porcentaje_pago, 
    monto_pago, 
    fecha_pago
) VALUES (
    1, -- ID de la cotización
    'pago por trabajo inicial', -- Descripción
    20, -- Porcentaje de pago
    180.00, -- Monto del pago
    '2024-09-05' -- Fecha del pago
);

-- Insertar datos en la tabla em_Condiciones_Generales
INSERT INTO Em_Condiciones_Generales (
    id_empresa, 
    descripcion_condiciones, 
    estado
) VALUES (
    1, -- ID de la empresa
    'Condiciones generales del contrato', -- Descripción de las condiciones generales
    TRUE -- Estado (verdadero)
);

-- Insertar datos en la tabla em_Requisitos_Basicos
INSERT INTO Em_Requisitos_Basicos (
    indice, 
    descripcion_condiciones, 
    id_empresa
) VALUES (
    1, -- Índice del requisito
    'Requisito básico para la empresa', -- Descripción de las condiciones
    1 -- ID de la empresa
);

-- Insertar cuentas bancarias ficticias
INSERT INTO Em_Cuenta_Bancaria (
    rut_titular, 
    nombre_titular, 
    id_banco, 
    id_tipocuenta, 
    numero_cuenta, 
    celular, 
    email_banco, 
    id_empresa
) VALUES 
('87654321-0', 'Pedro González', 1, 1, '2345678901', 987654321, 'pedro.gonzalez@empresa.com', 1),
('13579246-8', 'María Rodríguez', 1, 1, '3456789012', 987654321, 'maria.rodriguez@empresa.com', 1),
('24681357-9', 'Luis Fernández', 1, 1, '4567890123', 987654321, 'luis.fernandez@empresa.com', 1),
('35792468-0', 'Ana Torres', 1, 1, '5678901234', 987654321, 'ana.torres@empresa.com', 1);

-- Insertar una firma para la empresa 1
INSERT INTO Em_Firmas (
    id_empresa, 
    titulo_firma, 
    nombre_encargado_firma, 
    cargo_encargado_firma, 
    telefono_encargado_firma, 
    nombre_empresa_firma, 
    area_empresa_firma, 
    telefono_empresa_firma, 
    firma_digital, 
    email_firma, 
    direccion_firma, 
    ciudad_firma,
    pais_firma,
    rut_firma,
    web_firma
) VALUES (
    1, -- ID de la empresa
    'Firma de Ejemplo', -- Título de la firma
    'Carlos Ruiz', -- Nombre del encargado de la firma
    'Gerente General', -- Cargo del encargado
    '123456789', -- Teléfono del encargado
    'ITred Spa', -- Nombre de la empresa
    'Tecnología de Información', -- Área de la empresa
    '9876543210', -- Teléfono de la empresa
    'firma_digital.png', -- Ruta de la firma digital
    'carlos.ruiz@itred.cl', -- Email del encargado
    'Guido Reni #4190', -- Dirección de la firma
    'Pedro Aguirre Cerda', -- Ciudad firma 
    'Santiago-Chile', -- País de la firma
    '12345678-9', -- RUT de la firma
    'www.Itredspa.cl' -- web firma
);

INSERT INTO C_Mensaje_Despedida (
    id_cotizacion, 
    mensaje_despedida
) VALUES (
    1, -- ID de la cotización
    'SI EL CLIENTE, NO PUEDE CUMPLIR CON ALGUNO DE LOS REQUISITOS ANTES MENCIONADOS, POR FAVOR, COMUNICAR AL MOMENTO DE ACEPTAR EL PRESUPUESTO, PARA DAR SOLUCIÓN, ANTES DE COMENZAR LOS TRABAJOS Y DE SER NECESARIO AGREGAR LOS GASTOS EXTRAS Y RECALCULAR EL PRESUPUESTO'
);

-- Confirmar cambios
COMMIT;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


-- ------------------------------------------------------------------------------------------------------------
-- ------------------------------------- FIN SCRIPT DE BASE DE DATOS ------------------------------------------
-- ------------------------------------------------------------------------------------------------------------

-- Sitio Web Creado por ITred Spa.
-- Direccion: Guido Reni #4190
-- Pedro Aguirre Cerda - Santiago - Chile
-- contacto@itred.cl o itred.spa@gmail.com
-- https://www.itred.cl
-- Creado, Programado y Diseñado por ITredSpa.