<?php

$textPtTotali = "";
$textPtPron = "";
$textPtPag = "";
if (isset($_SESSION['session_id'])) {
    $id_p = $_SESSION['session_user'];
    try {
        $qExec = new QExec();
        $dataPt = $qExec->loadPtProfile($id_p);
        if (!empty($dataPt['data'])) {
            $textPtTotali = $dataPt['data'][0]['puntiTot'];
            $textPtPron = $dataPt['data'][0]['puntiPron'];
            $textPtPag = $dataPt['data'][0]['puntiPag'];
        }
        if ($dataPt['error'] != null) $text = $dataPt['error'];
    } catch (Exception $ex) {
        $text = $ex->getMessage();
    }
}
