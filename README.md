# Proyecto Laravel con XAMPP

## Versiones Utilizadas

- **PHP**: 8.12
- **Laravel**: 10.X(10.48.2)
- **MySQL**: 8.0.28
- **Node.js**: 16.13.0
- **NPM**: 9.6.2

## Requisitos Previos

- [XAMPP](https://www.apachefriends.org/index.html) (Incluye Apache, MySQL, PHP)
- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/)

## Instrucciones para Levantar el Proyecto

### 1. Clonar el Repositorio

```bash
git clone https://github.com/tu_usuario/tu_proyecto.git
cd tu_proyecto
```

### 2. Configurar el Archivo .env ya existente de ser necesario 

### 3. Instalar Dependencias
```bash
composer install
npm install
```

### 4. Generar la clave de Aplicacion para el funcionamiento de Laravel
```bash
php artisan key:generate
```

### 5. Ejecutar Migraciones y Seeders
```bash
php artisan migrate --seed
```
### 6. Iniciar XAMPP y npm
- Abre el Panel de Control de XAMPP.
- Inicia Apache y MySQL.

### 6. Levantar el Servidor de Desarrollo y el de npm

```bash
php artisan serve
npm run dev
```
