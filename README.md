# Proyecto Laravel BROOBE con XAMPP

<div align="center">
<img src="https://i.pinimg.com/originals/58/99/a5/5899a55898e329daca9ec8a5a31713c5.gif" alt="GitHub Logo" width="150" height="150" />
</div>


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
git clone https://github.com/mfloreslucas/broobee_challenge.git
cd your_local_path
```

### 2. Configurar el Archivo .env ya existente de ser necesario (username + password para db en entorno local)

### 3. Instalar Dependencias
```bash
composer install
npm install
```

### 4. Generar la clave de Aplicacion para el funcionamiento de Laravel
```bash
php artisan key:generate
```
### 5. Iniciar XAMPP
- Abre el Panel de Control de XAMPP.
- Inicia Apache y MySQL.

### 6. Ejecutar Migraciones y Seeders
```bash
php artisan migrate
php artisan db:seed --class=CategorySeeder
php artisan db:seed --class=StrategySeeder
```

### 7. Levantar el Servidor de Desarrollo y el de npm

```bash
php artisan serve
npm run dev
```

## Notas adicionales
- Si en el paso 5 hay problemas, hacer rollback y tirar primero
```bash
php artisan migrate:fresh
```
Y luego
```bash
php artisan db:seed 
```
- La tabla utilizada que utiliza el sistema en MySQL es tiene el nombre 'broobe_challenge', se puede cambiar el nombre en el .env
