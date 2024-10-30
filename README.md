=== Categorías y páginas por familia y profundidad ===

Tags: categorias widget, paginas widget, related categories, related pages, paginas relacionadas, mejor seo, categorias relacionadas, categorias profundidad, paginas profundidad, better seo

Requires at least: 4.5

Tested up to: 5.4.1

Stable tag: 1.6

Requires PHP: 5.4

License: GPL2


License URI: https://tldrlegal.com/license/gnu-general-public-license-v2

Donate link: https://www.paypal.me/javibertolez

Muestra con widgets y shortcodes las páginas y categorías que necesites en base a sus relaciones y profundidad.

== Description ==

**[Categorías y páginas por familia y profundidad](https://javibertolez.es/nuestros-plugins-wordpress/categorias-y-paginas-por-familia-y-profundidad/)** Muestra con widgets y shortcodes las páginas y categorías que necesites en base a sus relaciones y profundidad.

Cuando actives el plugin tendrás dos nuevos widgets y shortcodes disponibles: categorías por familia y Páginas por familia

Widgets:

* Categorías por familia:

Este widget sirve para mostrar las categorías elegidas en base a la profundidad de la categoría.

En el ejemplo: Razas -&gt; Perros -&gt; Bull -&gt; Bull Terrier

La categoría maestra es "Razas", mientras que "perros" es profundidad 1, "Bull" es profundidad 2 y "Bull Terrier" es profundidad 3.

Así pues si elegimos mostrar "Hermanas" en profundidad 3, aparecerán elementos como "Pitbull" o "Bulldog Inglés".

Las casillas "Límite" sirven para limitar el número de elementos mostrados en el widget.

* Páginas por familia:

Widget con lógica idéntica al de categorías pero adaptado para páginas.

Ahora la profundidad de las páginas está determinada por la estructura: Página -&gt; Subpágina -&gt; Subpágina

Shortcodes:

* Categorias: 

[fwp_relatedcats tipo='padres' limite='4' cat='3' excluir="5,7"]

- Los atributos son opcionales:

  tipo = ["hermanas","padres","hijas"]  por defecto "hermanas"

  limite = ["integer"]  por defecto "5"

  cat = ["ID_CATEGORIA"]  Obligatorio si se usa fuera de categorías.

  excluir = ["ID_CATEGORIA"] separar por comas cada categoría a excluir.

  Si se usa en un categoría se puede omitir y se usa el id de la categoría donde se ha usado, de lo contrario se debe especificar el ID de la categoría deseada.

 

* Páginas: 

[fwp_relatedpages tipo='hermanas' limite='10' page='3' excluir="45" estilado="si"]
 
- Los atributos son opcionales:

  tipo = ["hermanas","padres","hijas"]  por defecto "hermanas"

  limite = ["integer"]  por defecto "5"

  page = ["ID_PAGINA"]  Obligatorio.

  excluir = ["ID_PAGINA"] separar por comas cada página a excluir.

  estilado = ["si"] Saca las imágenes de la página tabién.

        si se usa en un página se puede omitir y se usa el id de la página donde se ha usado, de lo contrario se debe especificar el ID de la página deseada.

== Installation ==

1. Extrae el zip al directorio /wp-content/plugins/

1. Activa el plugin a través del menu ‘Plugins’ en WordPress

1. Tendrás dos nuevos widgets y shortcodes disponibles: categorías por familia y Páginas por familia

== Screenshots ==

2. Ejemplo mostrar categorías en frontend

1. Ejemplo de configuración de widget

== Frequently Asked Questions ==

= ¿Se muestra el widget elegido en todas las páginas? =

No, cada widget aparecerá en los post de su tipo, el de categorías sólo aparece en categorías y el de páginas sólo en páginas.

= Si elijo mostrar hermanas en una categoría superior, ¿qué muestra? =

Entonces se mostrarán todas las categorías de nivel superior, es decir, que no tienen una padre o superior.

== Changelog ==

= 1.6.1 - 2020-07-08 =

* Fix when "try to show something option" is active and exclude pages too

= 1.6 - 2020-06-06 =

* Added possibility to exclude categories or pages on widgets and shortcodes
* Added css class to style the generated lists
* Added possibility to show image from page in the generated lists using the pages shortcode

= 1.5 - 2019-16-11 =

* Added new depth level

= 1.4 - 2019-28-01 =

* Added ability to "try to show something" when no content found for selection

= 1.3 - 2018-23-12 =

* Wordpress 5 compatibility
* Fix when put two widgets in footer & sidebar

= 1.2 - 2018-05-09 =

* característica: Posibilidad de limitar los elementos a mostrar

* característica: Generación estática de elementos basada en semillas para agradar al Seo

* característica: Cuatro niveles de profundidad para páginas y categorías, detección automática

* mejora: Algoritmo de selección de resultados