<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Inzerat;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function widget()
    {
        $inzeraty = Inzerat::whereBetween('druh_id', array(11, 16))->orderBy('cena', 'ASC')->limit(3)->get();
        /*if(empty($inzeraty)){
            $inzeraty = Inzerat::whereBetween('druh_id',array(11,16))->orderBy('cena', 'ASC')->limit(3)->get();
        }
        if(empty($inzeraty)){
            $inzeraty = Inzerat::whereBetween('druh_id',array(18,28))->orderBy('cena', 'ASC')->limit(3)->get();
        }
        if(empty($inzeraty)){
            $inzeraty = Inzerat::orderBy('cena', 'ASC')->limit(3)->get();
        }*/
        foreach ($inzeraty as $inzerat) {
            $inzerat->cena = number_format($inzerat->cena, 2, ",", " ");
            if ($inzerat->jednaFotografia()->value('url') == null) {
                $inzerat->obrazok = 'images/demo/348x261.png';
            } else {
                $inzerat->obrazok = $inzerat->jednaFotografia()->value('url');
            }
        }
        return $inzeraty;
    }

}
