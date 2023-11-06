# laravel 9
Creando un proyecto desde cero con laravel 9

## Requerimientos
* php >= 8.8

## Crear nuevo proyecto 
composer create-project laravel/laravel NOMBRE_PROYECTO 9.*

## Modificando las rutas

Si una ruta no lleva algún tipo de parametro (como las paginas web) puede ir de la siguiente manera, **El primer parámetro es el nombre de la ruta y el segundo el nombre de la vista**
```php
Route::view('/','welcome');
Route::view('/contacto','concact');
Route::view('/blog','blog');
Route::view('/about','about');
```

## Renombrando rutas (names)
El nombre de las rutas se pueden cambiar (lo que se ve en el navegador) y el link debe referenciar al **name**, con esto no afecta el vinculo.

**web**
```php
Route::view('/','welcome');
Route::view('/otronombre','concact')->name('contact');
Route::view('/blog','blog');
Route::view('/about','about');
```
**view (welcome.blade)**
```html
<body>
    <ul>
        <li><a href="/">Home</a></li>
        <li><a href="/blog">Blog</a></li>
        <li><a href="/about">About</a></li>
        <li><a href="<?= route('contact') ?>">Contacto</a></li>
    </ul>
    <h3>Home</h3>
</body>

```
**Es recomendable utilizar los names**
```php
Route::view('/','welcome')->name('home');
Route::view('/otronombre','concact')->name('contact');
Route::view('/blog','blog')->name('blog');
Route::view('/about','about')->name('about');
```
```html
<body>
    <ul>
        <li><a href="<?= route('home') ?>">Home</a></li>
        <li><a href="<?= route('blog') ?>">Blog</a></li>
        <li><a href="<?= route('about') ?>">About</a></li>
        <li><a href="<?= route('contact') ?>">Contacto</a></li>
    </ul>
    <h3>Home</h3>
</body>
```

## Include()
Funciona como un include comun de php, laravel ya sabe que tienen que dirigirse al **view**, entonces solo vamos a especificar la carpeta en donde se encuentra.  

```html
<body>
    @include('partials.navigation')
    <h3>Home</h3>
</body>
```
**view/partials/navigation**
```html
<ul>
  <li><a href="{{ route('home') }}">Home</a></li>
  <li><a href="{{ route('blog') }}">Blog</a></li>
  <li><a href="{{ route('about') }}">About</a></li>
  <li><a href="{{ route('contact') }}">Contacto</a></li>
</ul>
```
## Plantillas con **Herencias**
Primero se crea una carpeta donde va a estar la pantilla general **view/layout/app.blade.php**.  
En **app.blade.php** se determina que va a heredar con la directiva **@yield**, y en los archivos se consume esta directiva a traves de la directiva **@section**, Para que esto funcione en los archivos a consumir (contacto, home, blog...) tiene que extender con la directiva **@extends**, laravel ya sabe que esta en **view**.  

**view/layout/app.blade.php**
```php
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
</head>
<body>
    @include('partials.navigation')
    @yield('content')
</body>
</html>
```

**view/contacto.blade.php - y otros**
```php
@extends('layout.app')

@section('title','contacto')

@section('content')
	<h2>contacto</h2>
@endsection
```

## Plantillas con **componentes**
Importante! se debe de crear una carpeta que se llame **components** (es estandar), despues dentro la carpeta **layout** (o algun otro nombre), en el **components/layout/app.blade** el contenedor principal se pone como *{{ $slot }}* y los parametros como *{{$title ?? ''}}* y en los otros archivos se consumen como *<x-layout.app title="Home">*.  
```
 x-: "views/components".  
 layout.app: "/layout/app.blade.php".  
 $slot: es propia de PHP.  
```  

**components/layout/app.blade.php**
```php
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DevGala - {{$title ?? ''}}</title>
</head>
<body>
    {{-- @include('partials.navigation') --}}
    <x-layout.navigation />
    {{-- @yield('content') --}}
    {{ $slot }}
</body>
</html>
```
**view/contacto.blade.php - y otros**
```html
<x-layout.app title="Home">
    <h3>Home</h3>
</x-layout.app>
```

## Controladores

Para crear controlador **vacio**
```
php artisan make:controller PostController
```
Para crear un controlador **7 metodos**
```
php artisan make:controller PostController -r

```
Para crear un controlador **api**
```
php artisan make:controller PostController --api

```  

**Como llamarlo en las rutas**: Se tiene que importar *use App\Http\Controllers\PostController;* esto dependiento si el controlador esté dentro de una carpeta.

```php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;



Route::view('/','welcome')->name('home');
Route::view('/otronombre','concact')->name('contact');
Route::get('/blog',[PostController::class,'index'])->name('blog');
Route::view('/about','about')->name('about');

```
**Controlador**
```php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller{
   function index(){
      $post = [
         ['title' =>'Titulo 1'],
         ['title' =>'Titulo 2'],
         ['title' =>'Titulo 3'],
         ['title' =>'Titulo 4'],
      ];
      return view('blog', ['post'=>$post]);
   }
}
```

## Conexión a base de datos
La configuración se encuentra en el archivo **.env** que esta en la raiz del proyecto, se tiene que crear la BD y ponerlo en la variable **DB_DATABASE**.
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel9
DB_USERNAME=root
DB_PASSWORD=
```
Si solo se esta utilizando xampp o wampp sin configuraciones adicionales, el **username = root** y el **password =** (vacio).

## Migraciones
Las migraciones son ejecuciones para crear, editar, eliminar tablas y se lleva un control en la BD. Estas migraciones se encuentran en **database/migrations/**, cada uno de los archivos contienen 2 metodo.  

**public function up():** Es lo que crea o actualiza.  
**public function down():** Es lo inverso elimina o desase.
```php
public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
```
**Para ejecutar las migraciones**
```
php artisan migrate
```
**Se crean estas tablas en la BD**
```
failed_jobs
migrations
password_resets
personal_access_tokens
users
```
En la tabla **migrations** existe 2 columnas.  

**migration:** Donde se registran las migraciones que se llevaron acabo *(si vuelven a ejecutar php artisan migrate no las tomara encuenta)*.  

**batch:** Cada cuando se ejecuta una migracion este se incrementa, se le conoce como lotes *Si requieren ajecutar una migracion y en esta columna ya tiene un lote deben de realizar un rollback al lote en especifico.*

**Para desaser las migraciones**  

Borra todas las tablas menos migrations.  
**IMPORTANTE:** solo se borran las migraciones del ultimo lote.
```
php artisan migrate:rollback
```

**Si se requiere actualizar o añadir una columna despues de la migracion**  

Actualizamos el archivo.
```php
Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('lastname'); // se agrego una columna despues de la migracion
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
```

Podemos utilizar el siguiente comando para que se realice la migracion a todos los archivos nuevamente.
```
php artisan migrate:fresh
```
**IMPORTANTE:** Solo se debe de realizar esta ejecucion si no tenemos datos en productivo, ya que lo que hace es borrar todos los datos de las tablas, truncarlas y volverlas a crear.  

**Para crear una migracion**  

Se utiliza **create_NOMBRE-DE-LA-TABLA_table**.
```
php artisan make:migration create_post_table
```
Y se crea un archivo con los metodos **up()** y **down**.
```
2023_11_06_042221_create_post_table.php
```
**Modificamos el archivo creado**
```php
public function up()
    {
        Schema::create('post', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->timestamps();
        });
    }
```
**Ejecutamos la migracion**
```
php artisan migrate
```
## Migraciones (Resumen)
### Puntos importantes

Para encontrar todos los tipos de columnas.
[link](https://laravel.com/docs/9.x/migrations#available-column-types "Title")

### Comandos

1. Crear una migracion.  

Se utiliza **create_NOMBRE-DE-LA-TABLA_table**.
```
php artisan make:migration create_post_table
```
2. Ejecutar una migración.
```
php artisan migrate
```
3. Añadir o cambiar de nombre una columna, *este comando hace un truncate a todas las tablas y las vuelve a crear*.
```
php artisan migrate:fresh
```
4. Añadir o cambiar de nombre una comuna, *este comando no actualiza los datos ya insertados*.

**Primero creamos un archivo especificando a que tabla le vamos a modificar**
```
php artisan make:migration add_body_to_post_table
```
Nos crea un archivo haciendo refencia a la tabla
```php
public function up()
{
    Schema::table('post', function (Blueprint $table) {
        //
    });
}
public function down()
{
    Schema::table('post', function (Blueprint $table) {
        //
    });
}
```
**Segundo añadimos/modificamos la columna**
```php
public function up()
    {
        Schema::table('post', function (Blueprint $table) {
            // agrega la columna 'body' despues de la columna 'tittle'
            $table->longText('body')->after('title');
        });
    }
    public function down()
    {
        Schema::table('post', function (Blueprint $table) {
            $table->dropColumn('body');
        });
    }
```
**Tercero Volvemos a ejecutar la migracion**
```
php artisan migrate
```
