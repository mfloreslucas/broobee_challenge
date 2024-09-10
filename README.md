# Proyecto Laravel con XAMPP

## Versiones Utilizadas

- **PHP**: 7.4.3
- **Laravel**: 8.12
- **MySQL**: 5.7 (Incluido en XAMPP)
- **Node.js**: 14.15.4
- **NPM**: 6.14.10

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
