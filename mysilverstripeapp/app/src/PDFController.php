<?php

namespace mynamespace;

use Dompdf\Dompdf;
use Dompdf\Options;
use SilverStripe\Control\Controller;

class PDFController extends Controller {

  private static $url_handlers = [
    '$id' => 'index',
  ];

  // Changes status code of response and sets an error message
  private function error($code, $msg) {
    $this->getResponse()->setStatusCode($code);
    $this->getResponse()->addHeader('Content-Type', 'text/plain');
    return $msg;
  }

  public function index($request) {

    // Check for ID
    if (!isset($request->params()['id'])) {
      return $this->error(400, 'No id supplied');
    }

    // Get MyDataObject by id
    $objectID = $request->params()['id'];
    $myObject = MyDataObject::get_by_id($objectID);

    // Check if object exists
    if (!$myObject) {
      return $this->error(404, 'Object not found');
    }

    // Allow access to remote resources such as images
    $options = new Options();
    $options->set('isRemoteEnabled', true);

    $dompdf = new Dompdf($options);

    // Process MyPDF template using MyDataObject and load its html
    $dompdf->loadHtml($myObject->renderWith('MyPDF'));

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'portrait');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $dompdf->stream('My document');
  }
}