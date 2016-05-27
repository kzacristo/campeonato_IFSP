<!DOCTYPE html>
<html>
<head>
<title>Index Comprar</title>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1" />
   <link rel="stylesheet" href="../../css/style.css" />
</head>
 
<body>
<div class="table-responcive">
      
      <table>
      <thead>
         <tr>
             <th>Nome Time</th>
               <th>Dinheiro</th> 
            </tr>
            </thead>
            <tbody>
      <?php
         require_once('../../../_model\_bancodedados/modelBancodeDados.php');
         session_start();
         $donoTime = $_SESSION['idDono'];

         $consultaFinanceira = 'SELECT nome, dinheiro FROM time WHERE dono = ?';
         $preparaConsultaFinanceira = $conn->prepare($consultaFinanceira);
         $preparaConsultaFinanceira->bindValue(1, $donoTime);
         $preparaConsultaFinanceira->execute();

         $result = $preparaConsultaFinanceira->setFetchMode(PDO::FETCH_NUM);
         while ($row = $preparaConsultaFinanceira->fetch()) {
               
              $row[1] = number_format($row[1], 2, ',', '.');

               echo '<tr  class = "active">';
               echo "<td>{$row[0]}</td>";
               echo "<td> IF$ : ".$row[1]."</td>";
               echo "</tr>";
            }  
      ?>

      </tbody>
     </table>
      </div>
       

<?php
      require_once('../../../_controller/conequicaoBancoMelhorias.php');
      
      $sql = "SELECT * FROM produtos";
      $qr = mysql_query($sql) or die(mysql_error());
      while($ln = mysql_fetch_assoc($qr)){
         echo '<h2>'.$ln['nome'].'</h2> <br />';
         echo 'Preço : R$ '.number_format($ln['preco'], 2, ',', '.').'<br />';
         echo '<a href="carrinho.php?acao=add&id='.$ln['id'].'"><img src="../../../_view/_imagens/arquibancadas_1.jpg" 
                  alt="Mercado" style="width:150px;height:150px;border:1"></a> <br />';
         echo '<br /><hr />';
      }
?>
 

</body>
 
