# Gestor ADSO

Proyecto integrador del programa **ADSO** (Análisis y Desarrollo de Software), SENA Regional Antioquia · CTMA.
Gestor ADSO es una aplicación web construida con **PHP y Laravel** que crecerá de forma incremental durante el trimestre (metodología ABP). En la Semana 2 incorpora el módulo **Aprendices** (rutas, controlador REST y vistas Blade).

- Resultado de aprendizaje: **EL02 / NORMA 220501094** — Elaborar propuesta técnica del software según especificaciones.

## Entorno de desarrollo

Este proyecto fue montado sobre **CachyOS (Arch Linux)** con herramientas instaladas de forma nativa (sin XAMPP, ya que XAMPP es exclusivo de Windows).

| Herramienta | Versión real instalada | Comando de verificación |
|---|---|---|
| Sistema operativo | CachyOS (Arch Linux) | `cat /etc/os-release` |
| PHP | 8.5.11 (CLI) | `php -v` |
| Composer | 2.10.3 | `composer -V` |
| Laravel | 13.36.0 | `php artisan --version` |
| MariaDB | 13.0.2 | `mariadb --version` |
| Git | 2.56.0 | `git --version` |
| VS Code | 1.135.0 | `code --version` |
| Node.js | 26.11.1 | `node -v` |

### Equivalencias Windows (XAMPP) → Linux (nativo)

| Guía (Windows) | Este entorno (CachyOS / Arch) |
|---|---|
| XAMPP (Apache + MariaDB + PHP + phpMyAdmin) | Paquetes nativos: `php`, `mariadb`, `apache` |
| PHP en `C:\xampp\php\php.exe` | PHP en `/usr/bin/php` (no requiere configurar PATH) |
| Panel XAMPP → Start MySQL | `sudo systemctl start mariadb` |
| `C:\xampp\php\php.ini` | `/etc/php/php.ini` |
| `copy .env.example .env` | `cp .env.example .env` |
| `notepad .env` | `code .env` o `nano .env` |
| phpMyAdmin | Cliente `mariadb`, DBeaver o adminer (opcional) |

### Extensiones PHP requeridas (`php -m`)

`openssl`, `PDO`, `pdo_mysql`, `mbstring`, `fileinfo`, `zip`.

> En este entorno `pdo_mysql` venía comentada en `/etc/php/php.ini` y fue habilitada:
> ```bash
> sudo sed -i 's/^;extension=pdo_mysql/extension=pdo_mysql/' /etc/php/php.ini
> ```

## Módulo Aprendices (Semana 2)
Flujo MVC implementado: **Navegador → routes/web.php → AprendizController → Vista Blade → Respuesta HTML**.

| Ruta | Método | Acción | Vista |
|---|---|---|---|
| `/` | ANY | redirige a `/aprendices` | — |
| `/aprendices` | GET | `AprendizController@index` | `aprendices.index` |
| `/aprendices/create` | GET | `AprendizController@create` | `aprendices.create` |
| `/aprendices` | POST | `AprendizController@store` | validación + redirect |

Verificación de rutas:

```bash
php artisan route:list
php artisan route:clear   # si las rutas no se reflejan por caché
```

El método `store()` valida `nombre`, `documento` y `correo` y, por ahora, simula el guardado (el almacenamiento real en BD con Eloquent se implementará en la Semana 4).

## Evidencias del proceso

Capturas incluidas en la entrega de Classroom:

1. `php -v` y `which php` (PHP funcionando).
2. `php -m` (extensiones requeridas activas).
3. `composer -V`, `git --version`, `php artisan --version`.
4. Pantalla de bienvenida/servidor en `http://127.0.0.1:8000`.
5. `php artisan migrate` exitoso + tablas en `gestor_adso`.
6. `php artisan route:list` con las rutas `aprendices.*`.
7. Vistas `/aprendices` y `/aprendices/create` en el navegador.
8. Mensaje "Aprendiz recibido (simulado)" tras enviar el formulario.
9. Proyecto abierto en VS Code y commits de Git.
