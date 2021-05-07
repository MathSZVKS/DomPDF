<?php
use Dompdf\Dompdf;
use Dompdf\Options;
require __DIR__."/vendor/autoload.php";

$options = new Options();
$options->setIsRemoteEnabled(true);

$dompdf = new Dompdf($options);

$url = "https://plsweb.unimeduberaba.com.br:6400/webresources/web/pep/pacienteDocumento/8249f8a4-461b-43bd-9ba8-c0380b1c23ee?id=".$_GET['id']."&simples=true&excluido=false";

$documento = json_decode(file_get_contents($url));

$DocumentoFinal = $documento->dados[0]->modelo;

$dompdf->loadHtml($DocumentoFinal);

$dompdf->setPaper('A4', 'portrait');

$dompdf->render();

// $dompdf->stream("file.pdf");

// Attachment em false fará com que o PDF não seja baixado automaticamente
$dompdf->stream("file.pdf", ["Attachment" => false]);





$output = $dompdf->output();
$fileConv = file_put_contents('file.pdf', $output);
echo base64_encode($fileConv);







?>





