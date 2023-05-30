<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $producto = new Producto([
            'nombre' => 'PSG - Lionel Messi',
            'precio' => 289.00,
            'existencia' => 10,
            'tipo' => 'Nuevo',
            'imagen' => 'images/psg-messi-cover.png',
            'imagen_secundaria' => 'images/psg-messi-alt.png',
            'marca' => 'Football',
            'descripcion' => '¡Rinde homenaje a los iconos e ídolos mundiales del fútbol con Funko! 
            Lleva a casa este increíble modelo Pop Football de icónico Lionel Messi con el jersey del Paris Saint. Completa tu once ideal y arma tu colección Pop Football con las estrellas del Fútbol.'
        ]);
        $producto->save(); 

        $producto = new Producto([
            'nombre' => 'SpiderMan - Web Man',
            'precio' => 319.00,
            'existencia' => 10,
            'tipo' => 'Exclusivo',
            'imagen' => 'images/marvel-web-man-cover.png',
            'imagen_secundaria' => 'images/marvel-web-man-alt.png',
            'marca' => 'Marvel',
            'descripcion' => '¡Exclusivo de Entertainment Earth y PCE! ¡Spider-Man ha sido clonado! El Dr. Doom busca capturar al superhéroe araña y usó su Twin Machine para crear una copia de Spider-Man. Inspirado en el cómic Spidey Super Stories #25 de 1977, este exclusivo Spider-Man Web-Man Pop! Figura de vinilo n.° 1560: Entertainment Earth Exclusive presenta a Web-Man balanceándose a través de Earth-57780. Mide alrededor de 3 3/4 pulgadas de alto y viene empaquetado en una caja de exhibición de ventana. ¡Haz tu pedido ahora para que no te pierdas la oportunidad de agregar este increíble Pop! a tu colección Marvel.'
        ]);
        $producto->save(); 

        $producto = new Producto([
            'nombre' => 'Disney 100 - Minnie Mouse Facet',
            'precio' => 319.00,
            'existencia' => 10,
            'tipo' => 'Regular',
            'imagen' => 'images/disney100-minnie-mouse-cover.webp',
            'imagen_secundaria' => 'images/disney100-minnie-mouse-alt.webp',
            'marca' => 'Disney',
            'descripcion' => 'Únete a nosotros y celebremos juntos el 100 Aniversario de Disney, añadiendo a tu colección este nuevo modelo exclusivo Pop Disney de Minnie Mouse con un aspecto facetado que seguramente agregará algo de glamour a su colección de Disney. Sin duda es imprescindible para todo fanático de Disney y engrandece tu colección.'
        ]);
        $producto->save(); 

        $producto = new Producto([
            'nombre' => 'Disney 100 - Tinker Bell Facet',
            'precio' => 211.00,
            'existencia' => 10,
            'tipo' => 'Limitado',
            'imagen' => 'images/disney100-tinkerbell-cover.webp',
            'imagen_secundaria' => 'images/disney100-tinkerbell-alt.webp',
            'marca' => 'Disney',
            'descripcion' => 'Únete a nosotros y celebremos juntos el 100 Aniversario de Disney. ¡Lleva tu colección de Disney a nuevas alturas con un poco de polvo de hadas con este nuevo modelo exclusivo Pop Disney de Campanita. El aspecto facetado seguramente agregará algo de glamour a su colección de Disney. Sin duda es imprescindible para todo fanático de Disney. '
        ]);
        $producto->save(); 

        $producto = new Producto([
            'nombre' => 'Peacemaker Amor y Paz SDCC 2022',
            'precio' => 389.00,
            'existencia' => 10,
            'tipo' => 'Exclusivo',
            'imagen' => 'images/peacemaker-cover.webp',
            'imagen_secundaria' => 'images/peacemaker-alt.webp',
            'marca' => 'DC',
            'descripcion' => 'Funko pone a tu alcance una nueva adición a la colección de Pop TV, traída de la popular serie de televisión "Peacemaker" de HBO, llega Peacemaker Amor y Paz inspirado en el Anti-héroe de DC Comics cuyo nombre da vida a la exitosa serie. Lleva a casa este increíble modelo exclusivo de la San Diego Comic Con, imprescindible para todo fanático de Peacemaker y de DC Comics.'
        ]);
        $producto->save(); 

        $producto = new Producto([
            'nombre' => 'La Sirenita - Ariel Y Sus Amigos',
            'precio' => 482.00,
            'existencia' => 10,
            'tipo' => 'Regular',
            'imagen' => 'images/disney-ariel-cover.webp',
            'imagen_secundaria' => 'images/disney-ariel-alt.webp',
            'marca' => 'Disney',
            'descripcion' => '¡Está lista para pararse y explorar el mundo fuera del mar! ¡Da la bienvenida a la hija menor del Rey Tritón a la superficie con sus increíbles amigos para vivir aventuras juntos!
            El diseño está basado en la nueva película de live action «La Sirenita».'
        ]);
        $producto->save(); 
        $producto = new Producto([
            'nombre' => 'Guardianes De La Galaxia 3 - Adam Warlock',
            'precio' => 191.00,
            'existencia' => 10,
            'tipo' => 'Nuevo',
            'imagen' => 'images/adam-warlock-cover.webp',
            'imagen_secundaria' => 'images/adam-warlock-alt.webp',
            'marca' => 'Marvel',
            'descripcion' => '¡De Marvel llegan tus personajes favoritos de la increíble película Guardianes De La Galaxia 3!. Sin duda el Funko Pop de Adam Warlock, es imprescindible para todo fanático de Marvel y esta gran película Guardianes De La Galaxia 3, así que no esperes más y haz crecer tu colección llevando a casa este Pop.'
        ]);
        $producto->save(); 

        $producto = new Producto([
            'nombre' => 'Manchester City - Jack Grealish',
            'precio' => 182.00,
            'existencia' => 10,
            'tipo' => 'Regular',
            'imagen' => 'images/mc-jack-cover.png',
            'imagen_secundaria' => 'images/mc-jack-alt.png',
            'marca' => 'Football',
            'descripcion' => '¡Rinde homenaje a los iconos e ídolos mundiales del fútbol con Funko! Lleva a casa este increíble modelo Pop Football de Jack Grealish con el jersey del Manchester City. Completa tu once ideal y arma tu colección Pop Futbol con las estrellas del Fútbol.'
        ]);
        $producto->save(); 

        $producto = new Producto([
            'nombre' => 'Los Simpsons - Homero en arbusto',
            'precio' => 224.00,
            'existencia' => 10,
            'tipo' => 'Nuevo',
            'imagen' => 'images/homer-hedge-cover.webp',
            'imagen_secundaria' => 'images/homer-hedge-alt.webp',
            'marca' => 'Animation',
            'descripcion' => 'Prepárate para que te invada la fiebre Amarilla, Funko pone a tu alcance esta nueva colección Pop Animation, colecciona estos diseños parte de la colección de la familia más querida de la televisión, Los Simpsons!.'
        ]);
        $producto->save(); 

        $producto = new Producto([
            'nombre' => 'Mandalorian Volando Con Grogu',
            'precio' => 289.00,
            'existencia' => 10,
            'tipo' => 'Regular',
            'imagen' => 'images/mandalorian-grogu-cover.webp',
            'imagen_secundaria' => 'images/mandalorian-grogu-alt.png',
            'marca' => 'Star Wars',
            'descripcion' => 'Adéntrate más en la nueva saga de Star Wars con Funko y llévate a casa este diseño ¡Inspirado en la serie de acción de Disney + The Mandalorian, se parte de la aventura intergaláctica con estos increíbles personajes.'
        ]);
        $producto->save(); 

        $producto = new Producto([
            'nombre' => 'Twenty One Pilots - Josh',
            'precio' => 201.00,
            'existencia' => 10,
            'tipo' => 'Exclusivo',
            'imagen' => 'images/TOP-Josh-cover.webp',
            'imagen_secundaria' => 'images/TOP-Josh-alt.webp',
            'marca' => 'Rocks',
            'descripcion' => 'Celebra y conmemora a tus iconos y bandas de Rock con Funko a uno de los mejores Duos conocido por los sencillos "Stressed Out", "Ride" y "Heathens". Funko trae hasta ti esta nueva colección Funko Pop Rocks: Twenty One Pilots basado en el album Stressed Out, el grupo es un dúo musical estadounidense de Columbus, Ohio. La banda se formó en 2009 por el vocalista Tyler Joseph junto con Josh Dun, El grupo recibió un Premio Grammy al mejor pop de grupo en los Premios Grammy de 2017.'
        ]);
        $producto->save(); 

        $producto = new Producto([
            'nombre' => 'Gotham Knights - Robin',
            'precio' => 191.00,
            'existencia' => 10,
            'tipo' => 'Regular',
            'imagen' => 'images/GK-Robin-cover.webp',
            'imagen_secundaria' => 'images/GK-Robin-alt.webp',
            'marca' => 'Games',
            'descripcion' => 'Del popular videojuego de rol de acción y mundo abierto Gotham Knights llega este increíble modelo Pop Games de Robin. Celebra Halloween con tus personajes favoritos de Gotham Knights patrulla los cinco distritos de Gotham y detén cualquier actividad criminal que encuentres en tu camino con Pop Games: Gotham Knights.'
        ]);
        $producto->save(); 
        $producto = new Producto([
            'nombre' => 'Machine Gun Kelly - Tickets to my Downfall',
            'precio' => 209.00,
            'existencia' => 10,
            'tipo' => 'Nuevo',
            'imagen' => 'images/MGK-MS-cover.png',
            'imagen_secundaria' => 'images/MGK-MS-alt.png',
            'marca' => 'Rocks',
            'descripcion' => 'Celebra y conmemora a tus iconos y bandas de Rock con Funko. Inspirado en el quinto álbum de estudio Tickets to my Downfall, uno de los más representativo de la música de ¡Machine Gun Kelly! ¡Atrévete a coleccionar este Funko Pop Rocks: Machine Gun Kelly - Tickets to my Downfall, este modelo es imprescindible para cualquier fan del Pop Punk y de Machine Gun Kelly.'
        ]);
        $producto->save(); 

        $producto = new Producto([
            'nombre' => 'Coraje el Perro Cobarde',
            'precio' => 289.00,
            'existencia' => 10,
            'tipo' => 'Exclusivo',
            'imagen' => 'images/coraje-cobarde-cover.webp',
            'imagen_secundaria' => 'images/coraje-cobarde-alt.webp',
            'marca' => 'Animation',
            'descripcion' => 'Directo desde la clasica y popular serie de dibujos animados de Cartoon Network llega Coraje el Perro Cobarde!  con la nueva adición de la linea Funko Pop Animation. lleva a casa y recuerda todas las aventuras de coraje el perro tímido y asustadizo. Este modelo es parte de un lanzamiento exclusivo de Funko Cartoon Classsics.'
        ]);
        $producto->save(); 

        $producto = new Producto([
            'nombre' => 'The Batman - Batman 10 Pulgadas',
            'precio' => 726.00,
            'existencia' => 10,
            'tipo' => 'Limitado',
            'imagen' => 'images/The-Batman-Jumbo-cover.png',
            'imagen_secundaria' => 'images/The-Batman-Jumbo-alt.png',
            'marca' => 'DC',
            'descripcion' => 'Funko pone a tu alcance este nuevo modelo Pop Jumbo, directo de la próxima película The Batman, llega Batman con el tamaño perfecto para coleccionistas, con este increíble Modelo y haz crecer tu colección del personaje homónimo, Batman.'
        ]);
        $producto->save(); 
    }
}
