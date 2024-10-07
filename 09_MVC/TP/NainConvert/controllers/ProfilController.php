<?php 

  class ProfilController 
  {

    public function index($id)
    {

      try
      {

        $NainModel = new NainModel();
        $datas = $NainModel->readOne($id);

          $Nain = new Nain($datas[0]);

        include 'views/ProfilView.php';
      
      }
      catch(Exception $e)
      {
        throw new Exception($e->getMessage(), $e->getCode(), $e);
      }

    }

  }
?>
