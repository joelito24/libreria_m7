<## Text Stories

> Es tracta d'una llibreta online


## Portada inicial
Apareix una landing amb capçalera, peu de pàgina i logo, on podem trobar diversos apartats com: alguna valoració de la web i els llibres, el top 3 llibres millor valorats i un banner promocional. 
inspeccionar el cataleg de llibres i registrar-no o iniciar sessio.


## Catàleg de llibres
Incorpora dades bàsiques de llibres com autor, isbn i títol, carregats de la base de dades.

## Tipus d'usuari
**Administrador** Té autoritcació per poder manipular llibres i usuaris.
**Usuari** Pot iniciar sessió i consultar estat de lloguer

## Accions
1. Registre (sing up)
2. Login (sing in)
3. Lloguer
4. Administració de llibres
5. Administració d'usuaris

## Login/Register

A la capçalera tenim dos links que ens facilitaràn el fewt de registrar-nos o bé inciar sessió si ja estem registrats.


## LLoguer

Un cop es clica el botó d'afegir un llibre a la cistella, aquest botó canviarà al color vermell per remarcar que ja ha estat seleccionat i quan es carregui la pàgina desapareixerà del catàlog

## Administració de llibres

Desde el panel d'administració de llibres, podrem tenir un control quasi total de l'estat i l'informació dels llibres. 
També es podran afegir nous lliubres a la base de dades omplint els camps necessaris que es demanen a la parta inferior.

## Administració d'usuaris

Desde el panel d'administració d'usuaris podem consultar l'informació dels diversos usuaris i el rol que tenen en la nostra web.

## Profile

A la capçalera podem trobar el botó amb l'icona de perfil, si naveguem fins aquesta vista podrem trobar un formulari on editar les dades del nostre usuari y una tabla amb els llibres prestats actualment y un buton per tornarlo.

## Maquetació

La maquetació d'aquest framework s'ha fet utilitzant el bootsrap de manera correcta afegint rows i cols per tal de que en el moment de fer el responsive, el nostre treball sigui mes simple seguint auqesta mateixa estructura.





## Creacion bbdd

CREATE TABLE libros(
	idlibro INT NOT NULL UNIQUE AUTO_INCREMENT,
	isbn VARCHAR(40) NOT NULL UNIQUE,
	titulo VARCHAR(30) NOT NULL,
	link VARCHAR(250) NOT NULL,
	npaginas INT,
	descripcion VARCHAR(250),
	autor VARCHAR(100),
	CONSTRAINT PRIMARY KEY (idlibro)
);

CREATE TABLE usuarios(
	idusuario INT NOT NULL AUTO_INCREMENT,
	usuario VARCHAR(35) NOT NULL,
	contrasenia VARCHAR(250) NOT NULL,
	nombre VARCHAR(40) NOT NULL,
	apellidos VARCHAR(100) NOT NULL,
	email VARCHAR(100) NOT NULL UNIQUE,
	telefono VARCHAR(10) ,
	rol VARCHAR(15),
	CONSTRAINT PRIMARY KEY (idusuario)
);	

CREATE TABLE prestamo(
	idprestamo INT NOT NULL UNIQUE AUTO_INCREMENT,
	idusuario INT NOT NULL ,
	idlibro INT NOT NULL ,
	fecha DATE NOT NULL,
	CONSTRAINT PRIMARY KEY (idprestamo),
	CONSTRAINT clientes_prestamo_fk FOREIGN KEY (idusuario) REFERENCES usuarios(idusuario) ON UPDATE CASCADE ON DELETE CASCADE,
	CONSTRAINT libro_prestamo_fk FOREIGN KEY (idlibro) REFERENCES libros(idlibro) ON UPDATE CASCADE ON DELETE CASCADE

);


La base de dades consta de 3 taules; Libros, Usuarios y Prestamo.

