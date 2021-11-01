<?php


$nomeutente = $_SESSION['session_user'];
$qualifica1 = "";
$qualifica2 = "";
$qualifica3 = "";
$gara1 = "";
$gara2 = "";
$gara3 = "";
$giroveloce = "";
$nrit = "";
$sc = "";
$vsc = "";
if (isset($_SESSION['session_id'])) {
    try {
        $nomegara = CurrentRace();
        $qExec = new QExec();
        $dataRiepilogo = $qExec->loadPronoByRaceByUser($nomeutente, $nomegara);
        if (!empty($dataRiepilogo['data'])) {
            $qualifica1 = $dataRiepilogo['data'][0]['qp1'];
            $qualifica2 = $dataRiepilogo['data'][0]['qp2'];
            $qualifica3 = $dataRiepilogo['data'][0]['qp3'];
            $gara1 = $dataRiepilogo['data'][0]['gp1'];
            $gara2 = $dataRiepilogo['data'][0]['gp2'];
            $gara3 = $dataRiepilogo['data'][0]['gp3'];
            $giroveloce = $dataRiepilogo['data'][0]['giro_veloce'];
            $nrit = $dataRiepilogo['data'][0]['n_ritirati'];
            $sc = $dataRiepilogo['data'][0]['SC'];
            $vsc = $dataRiepilogo['data'][0]['VSC'];
        }
        if($dataRiepilogo['error'] != null) $text = $dataRiepilogo['error'];
    } catch (Exception $e) {
        $text = $e->getMessage();
    }
}
