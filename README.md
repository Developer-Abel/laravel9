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

## Renombrando rutas (namesp)
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