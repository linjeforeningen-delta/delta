<?php 
namespace Delta;

class Bedpress{
  public $post_id;
  public $tidspunkt;
  public $sted;
  public $pameldte;
  public $tilgjengelige_plasser;
  public $pamelding_starter;
  public $trinn;
  public $studieretninger;
  public $status;
  public $bruker_id;
  function __construct($post_id){
    $this->post_id = $post_id;
    $this->settFelter();
    $this->handlePost();
    $this->settFelter();
    $this->settStatus();
  }
  public function settFelter(){
    $this->tidspunkt = get_field('tidspunkt', $post_id);
    $this->pamelding_starter = get_field("pamelding_starter", $post_id);
    $this->pameldte = get_field('pameldte', $post_id);
    $this->sted = get_field('sted', $post_id);
    $this->tilgjengelige_plasser = get_field('tilgjengelige_plasser', $post_id);
    $this->trinn = get_field('trinn', $post_id);
    $this->pameldingsinndeling = get_field('pameldingsinndeling', $post_id);
    $this->studieretninger = get_field('apent_for', $post_id);
    $this->bruker_id = get_current_user_ID();
  }
  public function debug(){
    //$tid = $this->getTidSidenPameldingStarter();
    //var_dump($this->pameldingsinndeling[3]);
    /*var_dump($tid);
    foreach( $this->pameldingsinndeling as $inndeling ){
      var_dump($tid > $inndeling["siden_start"]*3600);
      var_dump($inndeling["siden_start"]);
    }*/
  }
  public function getTidSidenPameldingStarter(){
    return strtotime("now") - strtotime($this->pamelding_starter);
  }
  public function hentDato(){
    return date_i18n('d. F Y',strtotime($this->tidspunkt)); 
  }
  public function hentTidspunkt(){
    return date_i18n('H:i',strtotime($this->tidspunkt));
  }
  public function tellPameldte(){
    return is_array($this->pameldte) ? count($this->pameldte) : 0;
  }
  public function printTrinn(){
    $inndeling = $this->getRiktigInndeling();
    if(count($inndeling["trinn"]) > 1){
      return $inndeling["trinn"][0] . " - " . end($inndeling["trinn"]) . " klasse"; 
    }
    return $inndeling["trinn"][0] . " klasse";
  }
  public function printTrinnFraInndeling($inndeling){
    return $inndeling["trinn"][0] . " - " . end($inndeling["trinn"]) . " klasse";
  }
  public function getRiktigInndeling(){
    $tid = $this->getTidSidenPameldingStarter();
    $temp = $this->pameldingsinndeling[0];
    foreach( $this->pameldingsinndeling as $inndeling ){
      if($tid > 3600*$inndeling["siden_start"]){
        $temp = $inndeling;
      }
    }
    return $temp;
  }
  public function forStudieretning($retning){
    $inndeling = $this->getRiktigInndeling();
    return in_array($retning, $inndeling["apent_for"]);
  }
  public function flereStudieretninger(){
    $inndeling = $this->getRiktigInndeling();
    return count($inndeling["apent_for"]) > 1;
  }
  public function iRiktigTrinn($arstrinn, $bruker){
    $klasse = $this->getKlasse(get_the_author_meta('kull', $bruker));
    $riktigTrinn = false;
    foreach($arstrinn as $trinn){
      if( intval($trinn) == $klasse){
        $riktigTrinn = true;
      }
    }
    return $riktigTrinn;
  }
  public function iRiktigStudieretning($bruker, $studieretninger){
    if(! in_array(get_the_author_meta('studieretning', $bruker), $studieretninger)){
      return false;
    }
    return true;
  }
  public function narKanBliMed(){
    foreach($this->pameldingsinndeling as $inndeling){
      if($this->iRiktigTrinn($inndeling["trinn"], $bruker) &&  $this->iRiktigStudieretning($bruker, $inndeling["apent_for"])){
        return $inndeling["siden_start"];
      }
    }
    return false;
  }
  public function kanBliMed($bruker = false){
    $inndeling = $this->getRiktigInndeling();
      $studieretninger = $inndeling["apent_for"];
      $arstrinn = $inndeling["trinn"];
    if(!$bruker)
      $bruker = $this->bruker_id;
    $timer = $this->narKanBliMed();
    $tid = strtotime($this->pamelding_starter) + $timer*3600;
    $now = strtotime("now");
    if($now > $tid){
      // Kan bli med!
      return true;
    }
    return false;
  }
  public function erMed(){
    if(! is_array($this->pameldte))
      return false;
    foreach($this->pameldte as $bruker){
      if($this->bruker_id == $bruker["ID"]){
        return true;
      }
    }
    return false;
  }
  private function sjekkKanBliMed($post_id = false, $user_id = false){
    if(!$post_id)
      $post_id = $this->post_id;
    if(!$user_id)
      $user_id = get_current_user_ID();

    return $this->kanBliMed($user_id);
  }
  private function getKlasse($kull){
    return floor((time() - strtotime($kull.'-07-07')) / 31556926) + 1;
  }
  private function meldPaa($user_id, $post_id){
      if(! $this->sjekkKanBliMed($post_id, $user_id)){
        return false;
      }
      \ACFUpdater::leggTil('pameldte', $user_id, $post_id);
  }
  private function meldAv($user_id, $post_id){
    \ACFUpdater::fjern('pameldte', $user_id, $post_id);
  }
  public function handlePost(){
    if(!isset($_POST) && !empty($_POST))
      return false;
    if(!isset($_POST['bruker']) && empty($_POST['bruker']))
      return false;
    if(!isset($_POST['handling']) && empty($_POST['handling']))
      return false;
    if(!isset($_POST['bedriftspresentasjon']) && empty($_POST['bedriftspresentasjon']))
      return false;
    switch($_POST['handling']){
      case "meld_paa":
        $this->meldPaa($_POST['bruker'], $_POST['bedriftspresentasjon']);
        $this->settFelter();
        break;
      case "meld_av":
        $this->meldAv($_POST['bruker'], $_POST['bedriftspresentasjon']);
        $this->settFelter();
        break;
    }
  }
  public function settStatus(){
    if($this->erMed()){
      $this->status = "Du er meldt på denne bedriftspresentasjonen!";
    }else{
      $timer = $this->narKanBliMed();
      if($timer === false){
        $this->status = false;
      }else{
        // Kan bli med.
        $tid = strtotime($this->pamelding_starter) + $timer*3600;
        $now = strtotime("now");
        if($now > $tid){
          $this->status = "Du kan melde deg på nå!";
        }else{
          if($timer > 0){
            $this->status = "Påmeldingen åpner ".date("d. M H:i", $tid). " for deg"; 
          }else{
            $this->status = "Påmeldingen åpner ".date("d. M H:i", $tid);
          }
        }
      }
    }
  }
}