<?php 

  class NainController 
  {

    public function index()
    {

      try
      {

        $NainModel = new NainModel();
        $datas = $NainModel->readAll();

        foreach($datas as $data)
        {
          $Nains[] = new Nain($data);
        }

        include 'views/NainsView.php';
      
      }
      catch(Exception $e)
      {
        throw new Exception($e->getMessage(), $e->getCode(), $e);
      }

    }

  }
?>
