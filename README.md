# Peluqueria canina 
Proyecto final de programación entorno servidor de 2do año basado en aplicación de registros para peluquería canina.

![status](https://img.shields.io/badge/status-running-green.svg?colorB=00C106) ![readme](https://img.shields.io/badge/readme-OK-green.svg?colorB=00C106) ![database](https://img.shields.io/badge/database-OK-green.svg?colorB=00C106) ![commits](https://img.shields.io/badge/commits-26-blue.svg) ![tag](https://img.shields.io/badge/tag-v0.3-orange.svg)
![template](https://img.shields.io/badge/template-twig-yellow.svg) ![techs](https://img.shields.io/badge/techs-javascript—php—css—bootstrap-yellow.svg)

---

## Estructura del proyecto
La estructura del proyecto está basada 
en MVC (modelo-vista-controlador) y en Api Restfull.
Crea su propia api a `JSON`.



### Contenido y características
- Registro de usuarios
- Login y logout
- Añadir registros, borrarlos y editarlos.


## Instalación

Debes renombrar el archivo `.env.example` a `.env`
con los datos correspondientes a la base de datos. 

## Cargar la base de datos

Para construir la base de datos, 
utiliza el script [`createdb.sql`](https://github.com/AdryDev92/peluqueria_canina/blob/master/createdb.sql)

## Instalación de dependencias
Desde la terminal, usa el siguiente comando:

```
composer update
```

Éste recibe las dependencias desde el `composer.json`

## Configuración de ruta de inicio

```
MAMP -> Preferences -> Web Server -> Document root(clic izquierdo) -> ruta/de/tu/proyecto/carpeta-public
```

### Tecnologías usadas

La aplicación está estructurada utilizando
`php`,`javascript`,`css`,`bootstrap` y `twig`.


