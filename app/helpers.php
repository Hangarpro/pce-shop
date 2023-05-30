<?php
if(! function_exists('getBadgeColor')) {
    function getBadgeColor($tipo)
    {
        $color = 'text-bg-secondary';
        switch($tipo) {
            case 'Exclusivo':
                $color = 'text-bg-primary'; break;
            case 'Limitado':
                $color = 'text-bg-warning'; break;
            case 'Nuevo':
                $color = 'text-bg-success'; break;
            case 'Regular':
                $color = 'text-bg-secondary'; break;
        }
        return $color;
    }
}

if(! function_exists('getBrandColor')) {
    function getBrandColor($marca)
    {
        $color = 'text-bg-secondary';
        switch($marca) {
            case 'Marvel':
                $color = 'text-bg-danger'; break;
            case 'DC':
                $color = 'text-bg-primary'; break;
            case 'Disney':
                $color = 'text-bg-info'; break;
            case 'Football':
                $color = 'text-bg-secondary'; break;
            case 'Games':
                $color = 'text-bg-warning'; break;
            case 'Animation':
                $color = 'text-bg-success'; break;
            case 'Star Wars':
                $color = 'text-bg-dark'; break;
            case 'Rocks':
                $color = 'text-bg-light'; break;
        }
        return $color;
    }
}
?>