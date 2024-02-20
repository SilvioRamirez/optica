<?php
if (! function_exists('current_user')) {
    function current_user()
    {
        return auth()->user();
    }
}

if (! function_exists('statusLenteColumn')){
    function statusLenteColumn($query){
        $badgeStatus='primary';
        $iconStatus='';
        if($query->status=='REGISTRADO'){
            $badgeStatus='primary';
            $iconStatus='check-circle';
        }
        if($query->status=='LABORATORIO DE MONTAJE'){
            $badgeStatus='info';
            $iconStatus='vial-circle-check';
        }
        if($query->status=='LABORATORIO DE TALLADO'){
            $badgeStatus='info';
            $iconStatus='vial-circle-check';
        }
        if($query->status=='POR ENTREGAR'){
            $badgeStatus='warning';
            $iconStatus='person-circle-check';
        }
        if($query->status=='ENTREGADO'){
            $badgeStatus='success';
            $iconStatus='check-to-slot';
        }
        return '<span class="badge bg-'.$badgeStatus.'"><i class="fa fa-'.$iconStatus.'"></i> '.$query->status.'</span>';
    }
}

if (! function_exists('statusPagoColumn')){
    function statusPagoColumn($query){
        $badgeStatus='primary';
        $iconStatus='';
        if($query->status=='SIN PAGOS'){
            $badgeStatus='danger';
            $iconStatus='circle-exclamation';
        }
        if($query->status=='CON ABONOS'){
            $badgeStatus='warning';
            $iconStatus='vial-circle-check';
        }
        if($query->status=='LABORATORIO DE TALLADO'){
            $badgeStatus='info';
            $iconStatus='vial-circle-check';
        }
        if($query->status=='POR ENTREGAR'){
            $badgeStatus='warning';
            $iconStatus='person-circle-check';
        }
        if($query->status=='PAGADO'){
            $badgeStatus='success';
            $iconStatus='check-to-slot';
        }
        return '<span class="badge bg-'.$badgeStatus.'"><i class="fa fa-'.$iconStatus.'"></i> '.$query->status.'</span>';
    }
}

if (! function_exists('formulaLenteColumn')){
    function formulaLenteColumn($query){
        $str='';
        foreach($query->formulas as $formula){
            $str .=
            '<span class="badge bg-info">'.$formula->ojo.'</span>'.
            '<span class="badge bg-info"> Esf: '.$formula->esfera.'</span>'.
            '<span class="badge bg-info"> Cil: '.$formula->cilindro.'</span>'.
            '<span class="badge bg-info"> Eje: '.$formula->eje.'</span>'.
            '<br>'
            ;
        }
        return $str;
    }
}

if (! function_exists('tratamientoLenteColumn')){
    function tratamientoLenteColumn($query){
        $str='';
        foreach($query->tratamientos as $tratamiento){
            $str .=
            '<span class="badge bg-primary">'.$tratamiento->tratamiento.'</span>'
            .'<br>'
            ;
        }
        return $str;
    }
}
                