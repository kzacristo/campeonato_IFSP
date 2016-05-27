<?php
       session_start();

        $desconto                  = $_SESSION['desconto'];
        $total_gastos              = $_SESSION['total'];
        $caixa                     = $_SESSION['caixa'];
        $donoTime                  = $_SESSION['idDono'];
        $quantidade                = $_SESSION['quantidade'];

            require_once('../../../_model/_bancodedados/modelBancodeDados.php');

            if($caixa >= $total_gastos){

              $updateDinhero = "UPDATE time as t
                                SET   t.dinheiro   = '$desconto'
                                    , t.capacidade = '$quantidade' + t.capacidade
                                WHERE t.id = $donoTime";

              $conn->exec($updateDinhero); 
               
              
                      echo "<script>
                            alert('Compra efetuada com sucesso!'); location= '../../../_view/viewEstadio.php';
                            </script>";
    
              }
            else{
                 
                 echo "<script>
                       alert('SALDO INSUFICIENTE PARA COMPLETAR ESSE OPERAÇÃO!'); location= '../../../_view/viewEstadio.php';
                       </script>";


              }
?>
