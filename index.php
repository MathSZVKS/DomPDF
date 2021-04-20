<?php
use Dompdf\Dompdf;
require __DIR__."/vendor/autoload.php";

// inicializando o objeto Dompdf
$dompdf = new Dompdf();

// Entrada do Codigo HTML
$codigo_html = '<div class="panel-body">
                  <p>O Gerador de Texto Lorem Ipsum pode ser utilizado para você que está desenvolvendo seu projeto e precisa de texto aleatório para preencher os espaços e fazer testes. Assim, dá para testar o layout e a formatação antes de utilizar com conteúdo real.</p><p>Exemplo de texto gerado: <i>"lorem ipsum dolor sit amet consectetur adipiscing elit sagittis velit torquent class ornare lobortis litora a duis lectus congue porttitor cubilia turpis inceptos lacinia ex suspendisse maximus tortor enim consequat feugiat pharetra penatibus curae tristique ligula eleifend at auctor tempus"</i></p><p>Palavras-chave: gerador de lorem ipsum, gerar texto aleatório.                </p></div>';

// Inserindo o código HTML no nosso arquivo PDF
$dompdf->loadHtml($codigo_html);

// Orientações do papel
$dompdf->setPaper('A4', 'portrait');

// Renderizar o documento
$dompdf->render();

// ----------------------------- SAIDAS ------------------------------------------------ //


// PDF será gerado automaticamente
// $dompdf->stream("file.pdf");



// Attachment em false fará com que o PDF não seja baixado automaticamente
$dompdf->stream("file.pdf", ["Attachment" => false]);

