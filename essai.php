<?php
 
  try {
 
    $password = 'Toto';
 
    if('Emacs' !== $password) {
      throw new Exception('Votre password est incorrect !');
    }
 
    echo 'Bonjour Emacs';
  }
  catch(Exception $e)
  {
    echo 'L\'erreur suivante a été générée : '."\n";
    echo $e->getMessage();
    
  }
?>
