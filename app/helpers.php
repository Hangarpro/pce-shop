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
?>