<?php

namespace Delta;

function bruker_har_tilgang($type){
  if($type === "skjulte"){
    // Sjekk om bruker har tilgang til skjulte filer
    $komiteer = ['arrkom', 'bedkom', 'fagkom', 'kvinnekom', 'komkom', 'medkom'];

    if(is_user_logged_in()){
      foreach($komiteer as $komite){
        foreach(get_field("medlemmer_".$komite, "option") as $bruker){
          if($bruker["ID"] === get_current_user_id()){
            return true; // User is logged in and part of a komite
          }
        }
      }
      return false; // User is logged in but not part of a komite
    }
  }
  return false;
}