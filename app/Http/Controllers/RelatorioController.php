<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\OrdemServico;

use PDF;
use Dompdf\Dompdf;

//require __DIR__ . "/vendor/autoload.php";

class RelatorioController extends Controller
{

    public function gerarRelatorioOs(){
        $ordens = OrdemServico::all();
        return view('relatorios.rel_os');
    }

    public function gerarRelatorioCliente(){
        $ordens = OrdemServico::all();
        return view('relatorios.rel_cliente');
    }

    /*
    public function geraPdf(){

        $cliente = Cliente::all();
        $pdf = PDF::loadview('pdf', compact('cliente'));
        //$dompdf->render('pdf', compact('cliente'));

        return $pdf->setPaper('a4')->stream('Relatório.pdf');

    } */



    /*
    public function geraPdfOs(){

        $ordens = OrdemServico::all();
        $pdf = PDF::loadview('pdf', compact('ordens'));
        //$dompdf->render('pdf', compact('cliente'));

        return $pdf->setPaper('a4')->stream('Relatório.pdf');

    } */



    /*
    public function geraPdf(){


        $cliente = Cliente::all();
        $dompdf = New Dompdf();
        //$dompdf->loadHtml(); 
        ob_start();
        //require_once ('/views/clientes/relatorio.blade.php');
        $template = ob_get_clean();
        $dompdf->loadHtml($template);
        $dompdf->setPaper('a4');
        $dompdf->render();
        $dompdf->stream('Relatório.pdf');


    }*/

   
} 
