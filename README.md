# Sistema de Facturación

Sistema de facturación desarrollado con Laravel que permite gestionar productos, facturas y clientes.

## Características

- Gestión de productos (CRUD)
- Gestión de facturas
- Gestión de clientes
- Roles de usuario (vendedor)
- Validaciones de datos
- Interfaz responsive con Bootstrap

## Requisitos

- PHP >= 8.2
- Composer
- SQLite o MySQL
- Node.js y NPM (para assets)

## Instalación

1. Clonar el repositorio:
```bash
git clone https://github.com/frankerondon/crediminuto_assessment.git
cd crediminuto_assessment
```

2. Instalar dependencias:
```bash
composer install
npm install
```

3. Configurar el entorno:
```bash
cp .env.example .env
php artisan key:generate
```

4. Configurar la base de datos en `.env`:
```
DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite
```

5. Crear archivo SQLite:
```bash
touch database/database.sqlite
```

6. Ejecutar migraciones y seeders:
```bash
php artisan migrate --seed
```

7. Iniciar el servidor:
```bash
php artisan serve
```

## Estructura

- `app/Models/`: Modelos de la aplicación
- `app/Http/Controllers/`: Controladores
- `app/Http/Middleware/`: Middlewares (incluye control de roles)
- `database/migrations/`: Migraciones de la base de datos
- `database/seeders/`: Seeders para datos de prueba
- `resources/views/`: Vistas Blade
- `routes/web.php`: Definición de rutas

## Uso

1. Acceder a http://localhost:8000
2. Navegar por las diferentes secciones:
   - Productos
   - Facturas
   - Clientes

### Roles y Permisos

- **Vendedor**: Puede crear/editar productos y generar facturas
- **Cliente**: Puede ver productos y sus facturas

## Testing

Para ejecutar las pruebas:

```bash
php artisan test
```

## Datos de Prueba

### Opción 1: Usando SQL
Para poblar la base de datos con datos de prueba, puedes ejecutar:

```bash
# Si usas SQLite
cat test_data/seedData.sql | sqlite3 database/database.sqlite

# Si usas MySQL
mysql -u usuario -p nombre_base_datos < database/seedData.sql
```

### Opción 2: Usando Seeders
Alternativamente, puedes usar los seeders de Laravel:

```bash
php artisan db:seed
```

Los datos de prueba incluyen:
- 2 vendedores
- 4 clientes
- 5 productos de ejemplo

### Opción 3: Manual

En la carpeta `test_data` encontrarás archivos con datos de prueba:

- `productosPrueba.txt`: Catálogo de productos para testing
- `usuariosPrueba.txt`: Usuarios (vendedores y clientes) para testing

Estos datos pueden ser utilizados para:
- Pruebas manuales del sistema
- Referencia para crear seeders
- Testing de funcionalidades



## Licencia

Distribuido bajo la Licencia MIT. Ver `LICENSE` para más información.

## Autor

Tu Nombre - [@frankerondon](https://github.com/frankerondon)

## Agradecimientos

- Laravel Framework
- Bootstrap
- SQLite