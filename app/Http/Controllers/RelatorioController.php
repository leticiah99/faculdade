<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\OrdemServico;

use PDF;
use Dompdf\Dompdf;


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
   
} 
