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


