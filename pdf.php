<?php   
require_once("email.php");
    require_once 'vendor/autoload.php';

    use Spipu\Html2Pdf\Html2Pdf;

    if(!empty($_POST['ville']))
    {
        $ville = htmlspecialchars($_POST['ville']);
        $html2pdf = new Html2Pdf('P', 'A4', 'fr');
        $rejet=file_get_contents('pdf_accordtotal.php');
        //echo $rejet; exit();

        $html = '
            <page>
                <page_header>
                    '.file_get_contents('entetepdf.php').'
                </page_header>
                <br />
                '.$rejet.'

                <page_footer>'.
                file_get_contents('footerpdf.php').'
                </page_footer>
            </page>

        ';

        $html2pdf->writeHTML($html);
        $nom=$ville.'.pdf';
        $lefichier='D:/dev/htdocs/maildarrv/'.$nom;;
        $html2pdf->output($lefichier,'F');
        // $cheminEnvoi=" \"".$html2pdf.".pdf";
        // $html2pdf->Output($cheminEnvoi,"F");
       //send_mail_soumission('brouakanda@gmail.com',$lefichier);
    }

    