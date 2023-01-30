<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <h1> Our <span>football</span> dream start here !</h1>
    <div >
      <img src="Coupe.jpg" class="img-fluid" alt="coupr-du-monde" width="100%">
      </div>
    
      <form action ="index.php" method="post">
        <div>
             equipe1:<input type="number" name="equipe1-matche1">   <!-- maroco-->
            <input type="number" name="equipe2-matche1"> equipe2<br>   <!-- croitia-->
        </div>
       <div>
            equipe3:<input type="number" name="equipe3-matche1">     <!-- belgica-->
            <input type="number" name="equipe4-matche1">equipe4<br>   <!-- canada-->
       </div>
       <div>
            equipe4:<input type="number" name="equipe4-matche2">    <!-- canada-->
            <input type="number" name="equipe1-matche2">equipe1<br>    <!-- maroco-->
       </div>
        <div>
            equipe3:<input type="number" name="equipe3-matche2">     <!-- belgica-->
            <input type="number" name="equipe2-matche2">equipe2<br>    <!-- croitia-->
        </div>
        <div>
            equipe1:<input type="number" name="equipe1-matche3">   <!-- maroco-->
            <input type="number" name="equipe3-matche3">equipe3<br>  <!-- belgica-->
        </div>
        <div>
            equipe2:<input type="number" name="equipe2-matche3">   <!-- croitia-->
            <input type="number"name="equipe4-matche3">equipe4<br> <!-- canada-->
        </div>

       <input type="submit" value="sumuler" name="submit" id="submit"> 
    </form>

    <table class="table table-danger table-sm">
        <tbody>
            <tr>
                <th scope="col">Equipes</th>
                <th scope="col">pts</th>
                <th scope="col">MJ</th>
                <th scope="col">MG</th>
                <th scope="col">Null</th>
                <th scope="col">MP</th>
                <th scope="col">BM</th>
                <th scope="col">BE</th>
                <th scope="col">dif</th>
            </tr>
    <?php

        if(isset($_POST['submit'])){
        $equipes = ["equipe1"=>["nom"=>"equipe1","point"=>0,"MJ"=>0,"MG"=>0,"null"=>0,"MP"=>0,"BM"=>0,"BE"=>0,"dif"=>0],
        "equipe2"=>["nom"=>"equipe2","point"=>0,"MJ"=>0,"MG"=>0,"null"=>0,"MP"=>0,"BM"=>0,"BE"=>0,"dif"=>0],
        "equipe3"=>["nom"=>"equipe3","point"=>0,"MJ"=>0,"MG"=>0,"null"=>0,"MP"=>0,"BM"=>0,"BE"=>0,"dif"=>0],
        "equipe4"=>["nom"=>"equipe4","point"=>0,"MJ"=>0,"MG"=>0,"null"=>0,"MP"=>0,"BM"=>0,"BE"=>0,"dif"=>0]];
            // MATCHE1
            if(@$_POST['equipe1-matche1'] ==''and @$_POST['equipe2-matche1']==''){
                $equipes["equipe1"]["point"]+=0;
                $equipes["equipe2"]["point"]+=0;
                
            }elseif(@$_POST['equipe1-matche1'] > @$_POST['equipe2-matche1']){
                $equipes["equipe1"]["point"]+=3;
                $equipes["equipe1"]["MJ"]+=1;
                $equipes["equipe2"]["MJ"]+=1;
                $equipes["equipe1"]["MG"]+=1;
                $equipes["equipe2"]["MP"]+=1;
                $equipes["equipe1"]["BM"]+=$_POST['equipe1-matche1'];
                $equipes["equipe2"]["BE"]+=$_POST['equipe1-matche1'];

            }elseif(@$_POST['equipe1-matche1'] < @$_POST['equipe2-matche1']){
                $equipes["equipe2"]["point"]+=3;
                $equipes["equipe1"]["MJ"]+=1;
                $equipes["equipe2"]["MJ"]+=1;
                $equipes["equipe2"]["MG"]+=1;
                $equipes["equipe1"]["MP"]+=1;
                $equipes["equipe2"]["BM"]+=$_POST['equipe2-matche1'];
                $equipes["equipe1"]["BE"]+=$_POST['equipe2-matche1'];
            }elseif(@$_POST['equipe1-matche1'] == @$_POST['equipe2-matche1']){
                $equipes["equipe1"]["point"]+=1;
                $equipes["equipe2"]["point"]+=1;
                $equipes["equipe1"]["MJ"]+=1;
                $equipes["equipe2"]["MJ"]+=1;
                $equipes["equipe1"]["null"]+=1;
                $equipes["equipe2"]["null"]+=1;
            }
        // MATCHE2
            if(@$_POST['equipe3-matche1'] ==''and @$_POST['equipe4-matche1']==''){
                $equipes["equipe3"]["point"]+=0;
                $equipes["equipe4"]["point"]+=0;
            }elseif(@$_POST['equipe3-matche1'] > @$_POST['equipe4-matche1']){
                $equipes["equipe3"]["point"]+=3;
                $equipes["equipe3"]["MJ"]+=1;
                $equipes["equipe4"]["MJ"]+=1;
                $equipes["equipe3"]["MG"]+=1;
                $equipes["equipe4"]["MP"]+=1;
                $equipes["equipe3"]["BM"]+=$_POST['equipe3-matche1'];
                $equipes["equipe4"]["BE"]+=$_POST['equipe3-matche1'];
            }elseif(@$_POST['equipe3-matche1'] < @$_POST['equipe4-matche1']){
                $equipes["equipe4"]["point"]+=3;
                $equipes["equipe3"]["MJ"]+=1;
                $equipes["equipe4"]["MJ"]+=1;
                $equipes["equipe4"]["MG"]+=1;
                $equipes["equipe3"]["MP"]+=1;
                $equipes["equipe4"]["BM"]+=$_POST['equipe4-matche1'];
                $equipes["equipe3"]["BE"]+=$_POST['equipe4-matche1'];
            }elseif(@$_POST['equipe3-matche1'] == @$_POST['equipe4-matche1']){
                $equipes["equipe3"]["point"]+=1;
                $equipes["equipe4"]["point"]+=1;
                $equipes["equipe3"]["MJ"]+=1;
                $equipes["equipe4"]["MJ"]+=1;
                $equipes["equipe3"]["null"]+=1;
                $equipes["equipe4"]["null"]+=1;
            }
        //  MATCHE3
            if(@$_POST['equipe1-matche2'] ==''and @$_POST['equipe4-matche2']==''){
                $equipes["equipe1"]["point"]+=0;
                $equipes["equipe4"]["point"]+=0;
            }elseif(@$_POST['equipe1-matche2'] > @$_POST['equipe4-matche2']){
                $equipes["equipe1"]["point"]+=3;
                $equipes["equipe1"]["MJ"]+=1;
                $equipes["equipe4"]["MJ"]+=1;
                $equipes["equipe1"]["MG"]+=1;
                $equipes["equipe4"]["MP"]+=1;
                $equipes["equipe1"]["BM"]+=$_POST['equipe1-matche2'];
                $equipes["equipe4"]["BE"]+=$_POST['equipe1-matche2'];
            }elseif(@$_POST['equipe1-matche2'] < @$_POST['equipe4-matche2']){
                $equipes["equipe4"]["point"]+=3;
                $equipes["equipe1"]["MJ"]+=1;
                $equipes["equipe4"]["MJ"]+=1;
                $equipes["equipe4"]["MG"]+=1;
                $equipes["equipe1"]["MP"]+=1;
                $equipes["equipe4"]["BM"]+=$_POST['equipe4-matche2'];
                $equipes["equipe1"]["BE"]+=$_POST['equipe4-matche2'];
            }elseif(@$_POST['equipe1-matche2'] == @$_POST['equipe4-matche2']){
                $equipes["equipe1"]["point"]+=1;
                $equipes["equipe4"]["point"]+=1;
                $equipes["equipe1"]["MJ"]+=1;
                $equipes["equipe4"]["MJ"]+=1;
                $equipes["equipe1"]["null"]+=1;
                $equipes["equipe4"]["null"]+=1;
            }
         //  MATCHE4
            if(@$_POST['equipe2-matche2'] ==''and @$_POST['equipe3-matche2']==''){
                $equipes["equipe2"]["point"]+=0;
                $equipes["equipe3"]["point"]+=0;
            }elseif(@$_POST['equipe2-matche2'] > @$_POST['equipe3-matche2']){
                $equipes["equipe2"]["point"]+=3;
                $equipes["equipe2"]["MJ"]+=1;
                $equipes["equipe3"]["MJ"]+=1;
                $equipes["equipe2"]["MG"]+=1;
                $equipes["equipe3"]["MP"]+=1;
                $equipes["equipe2"]["BM"]+=$_POST['equipe2-matche2'];
                $equipes["equipe3"]["BE"]+=$_POST['equipe2-matche2'];
            }elseif(@$_POST['equipe2-matche2'] < @$_POST['equipe3-matche2']){
                $equipes["equipe3"]["point"]+=3;
                $equipes["equipe2"]["MJ"]+=1;
                $equipes["equipe3"]["MJ"]+=1;
                $equipes["equipe3"]["MG"]+=1;
                $equipes["equipe2"]["MP"]+=1;
                $equipes["equipe3"]["BM"]+=$_POST['equipe3-matche2'];
                $equipes["equipe2"]["BE"]+=$_POST['equipe3-matche2'];
            }elseif(@$_POST['equipe2-matche2'] == @$_POST['equipe3-matche2']){
                $equipes["equipe2"]["point"]+=1;
                $equipes["equipe3"]["point"]+=1;
                $equipes["equipe2"]["MJ"]+=1;
                $equipes["equipe3"]["MJ"]+=1;
                $equipes["equipe2"]["null"]+=1;
                $equipes["equipe3"]["null"]+=1;
            }
          //  MATCHE5
            if(@$_POST['equipe1-matche3'] ==''and @$_POST['equipe3-matche3']==''){
                $equipes["equipe1"]["point"]+=0;
                $equipes["equipe3"]["point"]+=0;
            }elseif(@$_POST['equipe1-matche3'] > @$_POST['equipe3-matche3']){
                $equipes["equipe1"]["point"]+=3;
                $equipes["equipe1"]["MJ"]+=1;
                $equipes["equipe3"]["MJ"]+=1;
                $equipes["equipe1"]["MG"]+=1;
                $equipes["equipe3"]["MP"]+=1;
                $equipes["equipe1"]["BM"]+=$_POST['equipe1-matche3'];
                $equipes["equipe3"]["BE"]+=$_POST['equipe1-matche3'];
            }elseif(@$_POST['equipe1-matche3'] < @$_POST['equipe3-matche3']){
                $equipes["equipe3"]["point"]+=3; 
                $equipes["equipe1"]["MJ"]+=1;
                $equipes["equipe3"]["MJ"]+=1;
                $equipes["equipe3"]["MG"]+=1;
                $equipes["equipe1"]["MP"]+=1;
                $equipes["equipe3"]["BM"]+=$_POST['equipe3-matche3'];
                $equipes["equipe1"]["BE"]+=$_POST['equipe3-matche3'];
            }elseif(@$_POST['equipe1-matche3'] == @$_POST['equipe3-matche3']){
                $equipes["equipe1"]["point"]+=1;
                $equipes["equipe3"]["point"]+=1;
                $equipes["equipe1"]["MJ"]+=1;
                $equipes["equipe3"]["MJ"]+=1;
                $equipes["equipe1"]["null"]+=1;
                $equipes["equipe3"]["null"]+=1;
            }
         //  MATCHE6
            if(@$_POST['equipe2-matche3'] ==''and @$_POST['equipe4-matche3']==''){
                $equipes["equipe2"]["point"]+=0;
                $equipes["equipe4"]["point"]+=0;
            }elseif(@$_POST['equipe2-matche3'] > @$_POST['equipe4-matche3']){
                $equipes["equipe2"]["point"]+=3;
                $equipes["equipe2"]["MJ"]+=1;
                $equipes["equipe4"]["MJ"]+=1;
                $equipes["equipe2"]["MG"]+=1;
                $equipes["equipe4"]["MP"]+=1;
                $equipes["equipe2"]["BM"]+=$_POST['equipe2-matche3'];
                $equipes["equipe4"]["BE"]+=$_POST['equipe2-matche3'];
            }elseif(@$_POST['equipe2-matche3'] < @$_POST['equipe4-matche3']){
                $equipes["equipe4"]["point"]+=3;
                $equipes["equipe2"]["MJ"]+=1;
                $equipes["equipe4"]["MJ"]+=1;
                $equipes["equipe4"]["MG"]+=1;
                $equipes["equipe2"]["MP"]+=1;
                $equipes["equipe4"]["BM"]+=$_POST['equipe4-matche3'];
                $equipes["equipe2"]["BE"]+=$_POST['equipe4-matche3'];
            }elseif(@$_POST['equipe2-matche3'] == @$_POST['equipe4-matche3']){
                $equipes["equipe2"]["point"]+=1;
                $equipes["equipe4"]["point"]+=1;
                $equipes["equipe2"]["MJ"]+=1;
                $equipes["equipe4"]["MJ"]+=1;
                $equipes["equipe2"]["null"]+=1;
                $equipes["equipe4"]["null"]+=1;
            }

            foreach($equipes as $equipe){
                echo "<tbody><td>".$equipe["nom"]."</td>
                <td>".$equipe["point"]."</td>
                <td>".$equipe["MJ"]."</td>
                <td>".$equipe["MG"]."</td>
                <td>".$equipe["null"]."</td>
                <td>".$equipe["MP"]."</td>
                <td>".$equipe["BM"]."</td>
                <td>".$equipe["BE"]."</td>
                <td>".$equipe["dif"]=$equipe["BM"]-$equipe["BE"] ."</td>
                </tbody>";
            }
        }     
        
    ?>
        </tbody>
    </table>
   
       

   
</body>
</html>