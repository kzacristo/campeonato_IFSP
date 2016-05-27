
function debitar($total, $desconto, $caixa){
      if($caixa >=  $total){
          $deb = $caixa - $total;
            $sql = "UPDATE time SET dinheiro = '$deb' WHERE id = '$donotime'";
              $qr    = mysql_query($sql); 
               $qr    = mysql_error($sql);

                return '../../_view/viewEstadio.php';
                  }
                    else{
                      echo =  "Não Passo";
                        return 'error';
                    }
} 
