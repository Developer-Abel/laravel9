# laravel 9
Creando un proyecto desde cero con laravel 9

## Requerimientos
* php >= 8.8

## Crear nuevo proyecto 
#### en este caso laravel 9
composer create-project laravel/laravel NOMBRE_PROYECTO 9.*

## Modificando las rutas

Si una ruta no lleva algún tipo de parametro (como las paginas web) puede ir de la siguiente manera, **El primer parámetro es el nombre de la ruta y el segundo el nombre de la vista**
```html
Route::view('/','welcome');
Route::view('/contacto','concact');
Route::view('/blog','blog');
Route::view('/about','about');
```
