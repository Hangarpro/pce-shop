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
            'nombre' => 'Funko Pop Football: PSG - Lionel Messi',
            'precio' => 289.00,
            'existencia' => 10,
            'tipo' => 'Nuevo',
            'imagen' => 'images/psg-messi-cover.webp',
            'imagen_secundaria' => 'images/psg-messi-cover.webp',
            'marca' => 'Funko Pop Football',
            'descripcion' => '3.7 pulgadas (9.5 cm). Hecho de Vinyl. Figura no articulada. Empaque listo para mostrar en tu colección'
        ]);
        $producto->save(); 

        $producto = new Producto([
            'nombre' => 'Funko Pop Marvel: SpiderMan - Web Man',
            'precio' => 319.00,
            'existencia' => 10,
            'tipo' => 'Exclusivo',
            'imagen' => 'images/marvel-web-man-cover.webp',
            'imagen_secundaria' => 'images/marvel-web-man-cover.webp',
            'marca' => 'Marvel Funko Pop',
            'descripcion' => '¡Exclusivo de Entertainment Earth! ¡Spider-Man ha sido clonado! El Dr. Doom busca capturar al superhéroe araña y usó su Twin Machine para crear una copia de Spider-Man. Inspirado en el cómic Spidey Super Stories #25 de 1977, este exclusivo Spider-Man Web-Man Pop! Figura de vinilo n.° 1560: Entertainment Earth Exclusive presenta a Web-Man balanceándose a través de Earth-57780. Mide alrededor de 3 3/4 pulgadas de alto y viene empaquetado en una caja de exhibición de ventana. ¡Haz tu pedido ahora para que no te pierdas la oportunidad de agregar este increíble Pop! a tu colección Marvel.'
        ]);
        $producto->save(); 

        $producto = new Producto([
            'nombre' => 'Funko Pop Disney: Disney 100 - Minnie Mouse Facet',
            'precio' => 319.00,
            'existencia' => 10,
            'tipo' => 'Regular',
            'imagen' => 'images/disney100-minnie-mouse-cover.webp',
            'imagen_secundaria' => 'images/disney100-minnie-mouse-cover.webp',
            'marca' => 'Funko Pop Disney',
            'descripcion' => 'Únete a nosotros y celebremos juntos el 100 Aniversario de Disney, añadiendo a tu colección este nuevo modelo exclusivo Pop Disney de Minnie Mouse con un aspecto facetado que seguramente agregará algo de glamour a su colección de Disney. Sin duda es imprescindible para todo fanático de Disney y engrandece tu colección.'
        ]);
        $producto->save(); 

        $producto = new Producto([
            'nombre' => 'Funko Pop Football: PSG - Lionel Messi',
            'precio' => 289.00,
            'existencia' => 10,
            'tipo' => 'Nuevo',
            'imagen' => 'images/psg-messi-cover.webp',
            'imagen_secundaria' => 'images/psg-messi-cover.webp',
            'marca' => 'Funko Pop Football',
            'descripcion' => '3.7 pulgadas (9.5 cm). Hecho de Vinyl. Figura no articulada. Empaque listo para mostrar en tu colección'
        ]);
        $producto->save(); 

        $producto = new Producto([
            'nombre' => 'Funko Pop Marvel: SpiderMan - Web Man',
            'precio' => 319.00,
            'existencia' => 10,
            'tipo' => 'Exclusivo',
            'imagen' => 'images/marvel-web-man-cover.webp',
            'imagen_secundaria' => 'images/marvel-web-man-cover.webp',
            'marca' => 'Marvel Funko Pop',
            'descripcion' => '¡Exclusivo de Entertainment Earth! ¡Spider-Man ha sido clonado! El Dr. Doom busca capturar al superhéroe araña y usó su Twin Machine para crear una copia de Spider-Man. Inspirado en el cómic Spidey Super Stories #25 de 1977, este exclusivo Spider-Man Web-Man Pop! Figura de vinilo n.° 1560: Entertainment Earth Exclusive presenta a Web-Man balanceándose a través de Earth-57780. Mide alrededor de 3 3/4 pulgadas de alto y viene empaquetado en una caja de exhibición de ventana. ¡Haz tu pedido ahora para que no te pierdas la oportunidad de agregar este increíble Pop! a tu colección Marvel.'
        ]);
        $producto->save(); 

        $producto = new Producto([
            'nombre' => 'Funko Pop Disney: Disney 100 - Minnie Mouse Facet',
            'precio' => 319.00,
            'existencia' => 10,
            'tipo' => 'Regular',
            'imagen' => 'images/disney100-minnie-mouse-cover.webp',
            'imagen_secundaria' => 'images/disney100-minnie-mouse-cover.webp',
            'marca' => 'Funko Pop Disney',
            'descripcion' => 'Únete a nosotros y celebremos juntos el 100 Aniversario de Disney, añadiendo a tu colección este nuevo modelo exclusivo Pop Disney de Minnie Mouse con un aspecto facetado que seguramente agregará algo de glamour a su colección de Disney. Sin duda es imprescindible para todo fanático de Disney y engrandece tu colección.'
        ]);
        $producto->save(); 
        $producto = new Producto([
            'nombre' => 'Funko Pop Football: PSG - Lionel Messi',
            'precio' => 289.00,
            'existencia' => 10,
            'tipo' => 'Nuevo',
            'imagen' => 'images/psg-messi-cover.webp',
            'imagen_secundaria' => 'images/psg-messi-cover.webp',
            'marca' => 'Funko Pop Football',
            'descripcion' => '3.7 pulgadas (9.5 cm). Hecho de Vinyl. Figura no articulada. Empaque listo para mostrar en tu colección'
        ]);
        $producto->save(); 

        $producto = new Producto([
            'nombre' => 'Funko Pop Marvel: SpiderMan - Web Man',
            'precio' => 319.00,
            'existencia' => 10,
            'tipo' => 'Exclusivo',
            'imagen' => 'images/marvel-web-man-cover.webp',
            'imagen_secundaria' => 'images/marvel-web-man-cover.webp',
            'marca' => 'Marvel Funko Pop',
            'descripcion' => '¡Exclusivo de Entertainment Earth! ¡Spider-Man ha sido clonado! El Dr. Doom busca capturar al superhéroe araña y usó su Twin Machine para crear una copia de Spider-Man. Inspirado en el cómic Spidey Super Stories #25 de 1977, este exclusivo Spider-Man Web-Man Pop! Figura de vinilo n.° 1560: Entertainment Earth Exclusive presenta a Web-Man balanceándose a través de Earth-57780. Mide alrededor de 3 3/4 pulgadas de alto y viene empaquetado en una caja de exhibición de ventana. ¡Haz tu pedido ahora para que no te pierdas la oportunidad de agregar este increíble Pop! a tu colección Marvel.'
        ]);
        $producto->save(); 

        $producto = new Producto([
            'nombre' => 'Funko Pop Disney: Disney 100 - Minnie Mouse Facet',
            'precio' => 319.00,
            'existencia' => 10,
            'tipo' => 'Regular',
            'imagen' => 'images/disney100-minnie-mouse-cover.webp',
            'imagen_secundaria' => 'images/disney100-minnie-mouse-cover.webp',
            'marca' => 'Funko Pop Disney',
            'descripcion' => 'Únete a nosotros y celebremos juntos el 100 Aniversario de Disney, añadiendo a tu colección este nuevo modelo exclusivo Pop Disney de Minnie Mouse con un aspecto facetado que seguramente agregará algo de glamour a su colección de Disney. Sin duda es imprescindible para todo fanático de Disney y engrandece tu colección.'
        ]);
        $producto->save(); 

        $producto = new Producto([
            'nombre' => 'Funko Pop Football: PSG - Lionel Messi',
            'precio' => 289.00,
            'existencia' => 10,
            'tipo' => 'Nuevo',
            'imagen' => 'images/psg-messi-cover.webp',
            'imagen_secundaria' => 'images/psg-messi-cover.webp',
            'marca' => 'Funko Pop Football',
            'descripcion' => '3.7 pulgadas (9.5 cm). Hecho de Vinyl. Figura no articulada. Empaque listo para mostrar en tu colección'
        ]);
        $producto->save(); 

        $producto = new Producto([
            'nombre' => 'Funko Pop Marvel: SpiderMan - Web Man',
            'precio' => 319.00,
            'existencia' => 10,
            'tipo' => 'Exclusivo',
            'imagen' => 'images/marvel-web-man-cover.webp',
            'imagen_secundaria' => 'images/marvel-web-man-cover.webp',
            'marca' => 'Marvel Funko Pop',
            'descripcion' => '¡Exclusivo de Entertainment Earth! ¡Spider-Man ha sido clonado! El Dr. Doom busca capturar al superhéroe araña y usó su Twin Machine para crear una copia de Spider-Man. Inspirado en el cómic Spidey Super Stories #25 de 1977, este exclusivo Spider-Man Web-Man Pop! Figura de vinilo n.° 1560: Entertainment Earth Exclusive presenta a Web-Man balanceándose a través de Earth-57780. Mide alrededor de 3 3/4 pulgadas de alto y viene empaquetado en una caja de exhibición de ventana. ¡Haz tu pedido ahora para que no te pierdas la oportunidad de agregar este increíble Pop! a tu colección Marvel.'
        ]);
        $producto->save(); 

        $producto = new Producto([
            'nombre' => 'Funko Pop Disney: Disney 100 - Minnie Mouse Facet',
            'precio' => 319.00,
            'existencia' => 10,
            'tipo' => 'Regular',
            'imagen' => 'images/disney100-minnie-mouse-cover.webp',
            'imagen_secundaria' => 'images/disney100-minnie-mouse-cover.webp',
            'marca' => 'Funko Pop Disney',
            'descripcion' => 'Únete a nosotros y celebremos juntos el 100 Aniversario de Disney, añadiendo a tu colección este nuevo modelo exclusivo Pop Disney de Minnie Mouse con un aspecto facetado que seguramente agregará algo de glamour a su colección de Disney. Sin duda es imprescindible para todo fanático de Disney y engrandece tu colección.'
        ]);
        $producto->save(); 
        $producto = new Producto([
            'nombre' => 'Funko Pop Football: PSG - Lionel Messi',
            'precio' => 289.00,
            'existencia' => 10,
            'tipo' => 'Nuevo',
            'imagen' => 'images/psg-messi-cover.webp',
            'imagen_secundaria' => 'images/psg-messi-cover.webp',
            'marca' => 'Funko Pop Football',
            'descripcion' => '3.7 pulgadas (9.5 cm). Hecho de Vinyl. Figura no articulada. Empaque listo para mostrar en tu colección'
        ]);
        $producto->save(); 

        $producto = new Producto([
            'nombre' => 'Funko Pop Marvel: SpiderMan - Web Man',
            'precio' => 319.00,
            'existencia' => 10,
            'tipo' => 'Exclusivo',
            'imagen' => 'images/marvel-web-man-cover.webp',
            'imagen_secundaria' => 'images/marvel-web-man-cover.webp',
            'marca' => 'Marvel Funko Pop',
            'descripcion' => '¡Exclusivo de Entertainment Earth! ¡Spider-Man ha sido clonado! El Dr. Doom busca capturar al superhéroe araña y usó su Twin Machine para crear una copia de Spider-Man. Inspirado en el cómic Spidey Super Stories #25 de 1977, este exclusivo Spider-Man Web-Man Pop! Figura de vinilo n.° 1560: Entertainment Earth Exclusive presenta a Web-Man balanceándose a través de Earth-57780. Mide alrededor de 3 3/4 pulgadas de alto y viene empaquetado en una caja de exhibición de ventana. ¡Haz tu pedido ahora para que no te pierdas la oportunidad de agregar este increíble Pop! a tu colección Marvel.'
        ]);
        $producto->save(); 

        $producto = new Producto([
            'nombre' => 'Funko Pop Disney: Disney 100 - Minnie Mouse Facet',
            'precio' => 319.00,
            'existencia' => 10,
            'tipo' => 'Regular',
            'imagen' => 'images/disney100-minnie-mouse-cover.webp',
            'imagen_secundaria' => 'images/disney100-minnie-mouse-cover.webp',
            'marca' => 'Funko Pop Disney',
            'descripcion' => 'Únete a nosotros y celebremos juntos el 100 Aniversario de Disney, añadiendo a tu colección este nuevo modelo exclusivo Pop Disney de Minnie Mouse con un aspecto facetado que seguramente agregará algo de glamour a su colección de Disney. Sin duda es imprescindible para todo fanático de Disney y engrandece tu colección.'
        ]);
        $producto->save(); 

        $producto = new Producto([
            'nombre' => 'Funko Pop Football: PSG - Lionel Messi',
            'precio' => 289.00,
            'existencia' => 10,
            'tipo' => 'Nuevo',
            'imagen' => 'images/psg-messi-cover.webp',
            'imagen_secundaria' => 'images/psg-messi-cover.webp',
            'marca' => 'Funko Pop Football',
            'descripcion' => '3.7 pulgadas (9.5 cm). Hecho de Vinyl. Figura no articulada. Empaque listo para mostrar en tu colección'
        ]);
        $producto->save(); 

        $producto = new Producto([
            'nombre' => 'Funko Pop Marvel: SpiderMan - Web Man',
            'precio' => 319.00,
            'existencia' => 10,
            'tipo' => 'Exclusivo',
            'imagen' => 'images/marvel-web-man-cover.webp',
            'imagen_secundaria' => 'images/marvel-web-man-cover.webp',
            'marca' => 'Marvel Funko Pop',
            'descripcion' => '¡Exclusivo de Entertainment Earth! ¡Spider-Man ha sido clonado! El Dr. Doom busca capturar al superhéroe araña y usó su Twin Machine para crear una copia de Spider-Man. Inspirado en el cómic Spidey Super Stories #25 de 1977, este exclusivo Spider-Man Web-Man Pop! Figura de vinilo n.° 1560: Entertainment Earth Exclusive presenta a Web-Man balanceándose a través de Earth-57780. Mide alrededor de 3 3/4 pulgadas de alto y viene empaquetado en una caja de exhibición de ventana. ¡Haz tu pedido ahora para que no te pierdas la oportunidad de agregar este increíble Pop! a tu colección Marvel.'
        ]);
        $producto->save(); 

        $producto = new Producto([
            'nombre' => 'Funko Pop Disney: Disney 100 - Minnie Mouse Facet',
            'precio' => 319.00,
            'existencia' => 10,
            'tipo' => 'Regular',
            'imagen' => 'images/disney100-minnie-mouse-cover.webp',
            'imagen_secundaria' => 'images/disney100-minnie-mouse-cover.webp',
            'marca' => 'Funko Pop Disney',
            'descripcion' => 'Únete a nosotros y celebremos juntos el 100 Aniversario de Disney, añadiendo a tu colección este nuevo modelo exclusivo Pop Disney de Minnie Mouse con un aspecto facetado que seguramente agregará algo de glamour a su colección de Disney. Sin duda es imprescindible para todo fanático de Disney y engrandece tu colección.'
        ]);
        $producto->save(); 
        $producto = new Producto([
            'nombre' => 'Funko Pop Football: PSG - Lionel Messi',
            'precio' => 289.00,
            'existencia' => 10,
            'tipo' => 'Nuevo',
            'imagen' => 'images/psg-messi-cover.webp',
            'imagen_secundaria' => 'images/psg-messi-cover.webp',
            'marca' => 'Funko Pop Football',
            'descripcion' => '3.7 pulgadas (9.5 cm). Hecho de Vinyl. Figura no articulada. Empaque listo para mostrar en tu colección'
        ]);
        $producto->save(); 

        $producto = new Producto([
            'nombre' => 'Funko Pop Marvel: SpiderMan - Web Man',
            'precio' => 319.00,
            'existencia' => 10,
            'tipo' => 'Exclusivo',
            'imagen' => 'images/marvel-web-man-cover.webp',
            'imagen_secundaria' => 'images/marvel-web-man-cover.webp',
            'marca' => 'Marvel Funko Pop',
            'descripcion' => '¡Exclusivo de Entertainment Earth! ¡Spider-Man ha sido clonado! El Dr. Doom busca capturar al superhéroe araña y usó su Twin Machine para crear una copia de Spider-Man. Inspirado en el cómic Spidey Super Stories #25 de 1977, este exclusivo Spider-Man Web-Man Pop! Figura de vinilo n.° 1560: Entertainment Earth Exclusive presenta a Web-Man balanceándose a través de Earth-57780. Mide alrededor de 3 3/4 pulgadas de alto y viene empaquetado en una caja de exhibición de ventana. ¡Haz tu pedido ahora para que no te pierdas la oportunidad de agregar este increíble Pop! a tu colección Marvel.'
        ]);
        $producto->save(); 

        $producto = new Producto([
            'nombre' => 'Funko Pop Disney: Disney 100 - Minnie Mouse Facet',
            'precio' => 319.00,
            'existencia' => 10,
            'tipo' => 'Regular',
            'imagen' => 'images/disney100-minnie-mouse-cover.webp',
            'imagen_secundaria' => 'images/disney100-minnie-mouse-cover.webp',
            'marca' => 'Funko Pop Disney',
            'descripcion' => 'Únete a nosotros y celebremos juntos el 100 Aniversario de Disney, añadiendo a tu colección este nuevo modelo exclusivo Pop Disney de Minnie Mouse con un aspecto facetado que seguramente agregará algo de glamour a su colección de Disney. Sin duda es imprescindible para todo fanático de Disney y engrandece tu colección.'
        ]);
        $producto->save(); 

        $producto = new Producto([
            'nombre' => 'Funko Pop Football: PSG - Lionel Messi',
            'precio' => 289.00,
            'existencia' => 10,
            'tipo' => 'Nuevo',
            'imagen' => 'images/psg-messi-cover.webp',
            'imagen_secundaria' => 'images/psg-messi-cover.webp',
            'marca' => 'Funko Pop Football',
            'descripcion' => '3.7 pulgadas (9.5 cm). Hecho de Vinyl. Figura no articulada. Empaque listo para mostrar en tu colección'
        ]);
        $producto->save(); 

        $producto = new Producto([
            'nombre' => 'Funko Pop Marvel: SpiderMan - Web Man',
            'precio' => 319.00,
            'existencia' => 10,
            'tipo' => 'Exclusivo',
            'imagen' => 'images/marvel-web-man-cover.webp',
            'imagen_secundaria' => 'images/marvel-web-man-cover.webp',
            'marca' => 'Marvel Funko Pop',
            'descripcion' => '¡Exclusivo de Entertainment Earth! ¡Spider-Man ha sido clonado! El Dr. Doom busca capturar al superhéroe araña y usó su Twin Machine para crear una copia de Spider-Man. Inspirado en el cómic Spidey Super Stories #25 de 1977, este exclusivo Spider-Man Web-Man Pop! Figura de vinilo n.° 1560: Entertainment Earth Exclusive presenta a Web-Man balanceándose a través de Earth-57780. Mide alrededor de 3 3/4 pulgadas de alto y viene empaquetado en una caja de exhibición de ventana. ¡Haz tu pedido ahora para que no te pierdas la oportunidad de agregar este increíble Pop! a tu colección Marvel.'
        ]);
        $producto->save(); 

        $producto = new Producto([
            'nombre' => 'Funko Pop Disney: Disney 100 - Minnie Mouse Facet',
            'precio' => 319.00,
            'existencia' => 10,
            'tipo' => 'Regular',
            'imagen' => 'images/disney100-minnie-mouse-cover.webp',
            'imagen_secundaria' => 'images/disney100-minnie-mouse-cover.webp',
            'marca' => 'Funko Pop Disney',
            'descripcion' => 'Únete a nosotros y celebremos juntos el 100 Aniversario de Disney, añadiendo a tu colección este nuevo modelo exclusivo Pop Disney de Minnie Mouse con un aspecto facetado que seguramente agregará algo de glamour a su colección de Disney. Sin duda es imprescindible para todo fanático de Disney y engrandece tu colección.'
        ]);
        $producto->save(); 
    }
}
