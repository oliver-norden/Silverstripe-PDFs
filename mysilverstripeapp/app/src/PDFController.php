<?php

namespace mynamespace;

use Dompdf\Dompdf;
use SilverStripe\Control\Controller;

class PDFController extends Controller {

  public function index($request) {

    $dompdf = new Dompdf();

    $dompdf->loadHtml('<h1>It works!</h1>');

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'portrait');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $dompdf->stream('My document');
  }
}