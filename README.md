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
**x-**: "views/components".  
**layout.app**: "/layout/app.blade.php".  
**$slot**: es propia de PHP.  
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