<?php
    use Dompdf\Dompdf;
    use Dompdf\Options;
    require __DIR__."/vendor/autoload.php";

    $options = new Options();
    $options->setIsRemoteEnabled(true);
    $dompdf = new Dompdf($options);
    $url = "https://plsweb.unimeduberaba.com.br:6100/webresources/web/pep/pacienteDocumento/0E2DF55A-EF14-4222-B464-DCD3C67D83B8?id=".$_GET['id']."&simples=true";
    $documento = json_decode(file_get_contents($url));
    $DocumentoFinal = $documento->dados[0]->modelo;
    $dompdf->loadHtml($DocumentoFinal);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    
    if (isset($_GET['file'])) {
        $dompdf->stream("file.pdf", ["Attachment" => false]);
    } else {
        $output = $dompdf->output();
        echo base64_encode($output);
    } 
?>