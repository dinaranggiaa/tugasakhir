<?php

	defined('BASEPATH') OR exit('No direct script access allowed');

	require_once('assets/dompdf/autoload.inc.php');
	use Dompdf\Dompdf;

	class Mypdf
	{
		protected $ci;

		function __construct()
		{
			$this->ci =& get_instance();
		}

		public function generate($view, $data = array(), $filename = 'Laporan', $paper = 'A4', $orientation = 'potrait')
		{
			$dompdf = new Dompdf();
			$html = $this->ci->load->view($view, $data, TRUE);
			$dompdf->loadHtml($html);
			$dompdf->setPaper($paper, $orientation);

			// Render the HTML as PDF
			$dompdf->render();
			ob_clean();
		    $dompdf->stream($filename. ".pdf", array("Attachment" => FALSE));

		}

		public function checkup($view, $data = array(), $filename = 'laporan', $paper = 'A7', $orientation = 'landscape')
		{
			$dompdf = new Dompdf();
			$html = $this->ci->load->view($view, $data, TRUE);
			$dompdf->loadHtml($html);
			$dompdf->setPaper($paper, $orientation);
			$dompdf->render();
		    ob_clean();
		    $dompdf->stream($filename. ".pdf", array("Attachment" => FALSE));

		}
	}

?> 