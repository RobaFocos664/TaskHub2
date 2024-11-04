create database Taskub

use Taskub

CREATE TABLE ROL (
    codigo VARCHAR(5) PRIMARY KEY,
    nombre VARCHAR(50), /* solo va haber 6: Gerente de departamento y area, Lider de equipo, miembro de equipo, empleado regular, invitado*/
    descripcion TEXT
)

CREATE TABLE AVANCE (
    numero INT PRIMARY KEY AUTO_INCREMENT,
    progreso ENUM('En progreso', 'Pendiente', 'Terminado')
)

CREATE TABLE PRIORIDAD (
    numero INT PRIMARY KEY AUTO_INCREMENT,
    descripcion ENUM('Alta', 'Baja')
)

CREATE TABLE USUARIO (
    numero INT PRIMARY KEY AUTO_INCREMENT,
    nickName VARCHAR(50),
    contrasena VARCHAR(50),
    rol VARCHAR(5),
    FOREIGN KEY (rol) REFERENCES ROL(numero)
)

CREATE TABLE DEPARTAMENTO (
    codigo VARCHAR(5) PRIMARY KEY,
    nombre VARCHAR(100),
    gerente INT
)

CREATE TABLE AREA (
    codigo VARCHAR(5) PRIMARY KEY,
    nombre VARCHAR(100),
    departamento VARCHAR(5),
    FOREIGN KEY (departamento) REFERENCES DEPARTAMENTO(codigo)
)

CREATE TABLE PUESTO (
    numero INT PRIMARY KEY,
    nombre VARCHAR(100),
    departamento VARCHAR(5),
    FOREIGN KEY (departamento) REFERENCES DEPARTAMENTO(codigo)
)

CREATE TABLE EMPLEADO (
    numero INT PRIMARY KEY,
    nombre VARCHAR(50),
    primerApell VARCHAR(50),
    segundoApell VARCHAR(50),
    numTel VARCHAR(15) CHECK (CHAR_LENGTH(numTel) BETWEEN 10 AND 15),
    dirCalle VARCHAR(100),
    dirNum BIGINT CHECK (dirNum >= 1000000000 AND dirNum <= 9999999999),
    dirColonia INT,
    dirCP VARCHAR(5) CHECK (CHAR_LENGTH(dirCP) = 5)
    curp VARCHAR(18) CHECK (CHAR_LENGTH(curp) = 18),
    rfc VARCHAR(13) CHECK (CHAR_LENGTH(rfc) = 13),
    departamento VARCHAR(5),
    area VARCHAR(5),
    usuario INT,
    puesto INT,
    FOREIGN KEY (departamento) REFERENCES DEPARTAMENTO(codigo),
    FOREIGN KEY (area) REFERENCES AREA(codigo),
    FOREIGN KEY (usuario) REFERENCES USUARIO(numero),
    FOREIGN KEY (puesto) REFERENCES PUESTO(numero)
)

ALTER TABLE DEPARTAMENTO
ADD CONSTRAINT fk_gerente FOREIGN KEY (gerente) REFERENCES EMPLEADO(numero);

CREATE TABLE EQUIPO (
    numero INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100),
    tareaAsignadas INT,
    area VARCHAR(5),
    lider INT,
    FOREIGN KEY (area) REFERENCES AREA(codigo),
    FOREIGN KEY (lider) REFERENCES EMPLEADO(numero)
)

CREATE TABLE EMPLEADO_EQUIPO (
    equipo INT,
    empleado INT,
    PRIMARY KEY (equipo, empleado),
    FOREIGN KEY (equipo) REFERENCES EQUIPO(numero),
    FOREIGN KEY (empleado) REFERENCES EMPLEADO(numero)
)

CREATE TABLE PLANIFICACION (
    numero INT PRIMARY KEY,
    fechaInicio DATE,
    fechaLimite DATE,
    usuario INT,
    FOREIGN KEY (usuario) REFERENCES USUARIO(numero)
)

CREATE TABLE EMPLEADO_PLANIFICACION (
    empleado INT,
    planificacion INT,
    PRIMARY KEY (empleado, planificacion),
    FOREIGN KEY (empleado) REFERENCES EMPLEADO(numero),
    FOREIGN KEY (planificacion) REFERENCES PLANIFICACION(codigo)
)

CREATE TABLE TAREA (
    numero int PRIMARY KEY,
    titulo VARCHAR(100),
    descripcion TEXT,
    tiempoEstimado INT,
    fechaEntrega DATE,
    tiempoAtrasado INT,
    tiempoRestante INT,
    porcentajeAvance DECIMAL(5, 2),
    avance INT,
    creador INT,
    empleado INT,
    equipo INT,
    area VARCHAR(5),
    prioridad INT,
    FOREIGN KEY (avance) REFERENCES AVANCE(numero),
    FOREIGN KEY (creador) REFERENCES USUARIO(numero),
    FOREIGN KEY (empleado) REFERENCES EMPLEADO(numero),
    FOREIGN KEY (equipo) REFERENCES EQUIPO(numero),
    FOREIGN KEY (area) REFERENCES AREA(codigo),
    FOREIGN KEY (prioridad) REFERENCES PRIORIDAD(numero)
)

CREATE TABLE SUBTAREA (
    numero INT PRIMARY KEY,
    titulo VARCHAR(100),
    descripcion TEXT,
    tiempoEstimado INT,
    comentario TEXT,
    planificacion INT,
    avance INT,
    tarea INT,
    FOREIGN KEY (planificacion) REFERENCES PLANIFICACION(codigo),
    FOREIGN KEY (avance) REFERENCES AVANCE(numero),
    FOREIGN KEY (tarea) REFERENCES TAREA(codigo)
)

CREATE TABLE REPORTE (
    numero INT PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR(100),
    descripcion TEXT,
    fechaCreacion DATE,
    empleado INT,
    tarea INT,
    FOREIGN KEY (empleado) REFERENCES EMPLEADO(numero),
    FOREIGN KEY (tarea) REFERENCES TAREA(codigo)
)

CREATE TABLE DIFICULTAD (
    numero INT PRIMARY KEY AUTO_INCREMENT,
    nombre ENUM('Fácil', 'Medio', 'Difícil'),
    tarea INT,
    FOREIGN KEY (tarea) REFERENCES TAREA(codigo)
)

CREATE TABLE TIPO (
    numero INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50),
    tarea INT,
    FOREIGN KEY (tarea) REFERENCES TAREA(codigo)
)

CREATE TABLE ESTATUS (
    numero INT PRIMARY KEY AUTO_INCREMENT,
    nombre ENUM('Activo', 'Inactivo'),
    tarea INT,
    FOREIGN KEY (tarea) REFERENCES TAREA(codigo)
)