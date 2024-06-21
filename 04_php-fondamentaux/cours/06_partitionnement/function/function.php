<?php

function speAlumni(array $alumnis) : array {

    $classOption = [];

    foreach($alumnis as $alumni){
      $classOption[] = $alumni['classOption'];
    }

   return array_count_values($classOption);

  }

  // 4. Calculer le pourcentage d'alumnis en poste et l'afficher.
  function statAlumnisJob(array $alumnis) : float{

    $inJobCounter = 0;
    foreach($alumnis as $alumni){
      if(!empty($alumni['currentCompany']['name'])){
        $inJobCounter++;
      }
      // if($alumni['currentCompany']['name'] != ''){
      //   $inJobCounter++;
      // }
    }
    return round($inJobCounter / count($alumnis) * 100, 1);
  }


  // 5. (Bonus) Calculer le pourcentage d'alumnis en poste par spécialité et l'afficher.
  function statSpeJob(array $alumnis) : array{

    $specialities = speAlumni($alumnis);
    $emlpoyedInSpe = [];

    foreach($specialities as $speciality => $count){

      $emlpoyedInSpe[$speciality] = 0 ;

      foreach($alumnis as $alumni){

        if((!empty($alumni['currentCompany']['name']) && $alumni['classOption'] === $speciality)){
          $emlpoyedInSpe[$speciality]++; 
        }

      }
      // $emlpoyedInSpe = [
      //   'dwwm' => 2,
      //   'dm' => 2,
      //   'dj' => 1,
      //   'cdui' => 0
      // ]

      $emlpoyedInSpe[$speciality] = round($emlpoyedInSpe[$speciality] / $specialities[$speciality] * 100, 1);
      
      // $emlpoyedInSpe = [
      //   'dwwm' => 50,
      //   'dm' => 100,
      //   'dj' => 50,
      //   'cdui' => 0
      // ]

    }

    return $emlpoyedInSpe;
  }

?>