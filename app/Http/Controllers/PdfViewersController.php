<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;

class PdfViewersController extends Controller
{
    public function showPdfViewer($requiredArgument)
    {
        $pdfViewer = new PdfViewersController();
        $pdfViewer->showPdfViewer($requiredArgument);
    }
}
