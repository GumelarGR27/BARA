<?php

namespace App\Controllers;
// use \Mpdf\Mpdf;

class pdf extends BaseController
{
    public function index()
    {
        $dompdf = new \Dompdf\Dompdf(); 
        $dompdf->loadHtml(view('ingpois'));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream();
        // $mpdf = new \Mpdf\Mpdf();
        // $mpdf->WriteHTML(view('ingpois'));
        // return redirect()->to($mpdf->Output('htmltopdf.pdf', 'I'));

        // $mpdf = new Mpdf();
        // $html = view('ingpois',[]);
        // $mpdf->WriteHTML($html);
        // $this->response->setHeader('Content-Type', 'application/pdf');
        // $mpdf->Output('arjun.pdf','D');
        //echo view('rimainder',$data);
        //return view('admin/pages/index');
        // return view('index');
    }
}


        