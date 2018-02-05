<link href="../assets/css/calendario.css" rel="stylesheet" />
<?php
//echo "<link rel='stylesheet' type='text/css' href='".BASE_URL."/assets/css/calendario.css' media='screen' />";
$data=date('Y-m-d');
class calendario{  
  var $mes = array( '01' => 'JANEIRO', '02' => 'FEVEREIRO', '03' => 'MARÇO', '04' => 'ABRIL', '05' => 'MAIO', '06' => 'JUNHO', '07' => 'JULHO', '08' => 'AGOSTO', '09' => 'SETEMBRO', '10' => 'OUTUBRO', '11' => 'NOVEMBRO', '12' => 'DEZEMBRO' ); 

  function mes_anterior($dia,$mes,$ano){ 
    if($mes == 1){ $man = 12; $aan = $ano - 1; } else { $man = $mes - 1; $aan = $ano; } 

    $val = checkdate($man,$dia,$aan); 
    if($val == 0){ $dia = 1; } 
	
    echo '<a href="calendario.php?data='.sprintf("%02.0f",$dia).'/'.sprintf("%02.0f",$man).'/'.$aan.'">
	<img src="../assets/images/estrutura/back_cal.png" title="Voltar a página anterior" alt="Voltar" border="0" width="16" height="11" /></a>'; } 

  function mes_proximo($dia,$mes,$ano){ 
    if($mes == 12){ $mpr = 1; $apr = $ano + 1; 
    } else { $mpr = $mes + 1; $apr = $ano; } 

    $val = checkdate($mpr,$dia,$apr); 
    if($val == 0){ $dia = 1; }
	 
    echo '<a href="calendario.php?data='.sprintf("%02.0f",$dia).'/'.sprintf("%02.0f",$mpr).'/'.$apr.'"><img src="../assets/images/estrutura/next_cal.png" title="próximor" alt="next" border="0" width="16" height="11" /></a>'; 
  } 

  function ano_anterior($dia,$mes,$ano){ 
    $aan = $ano - 1; 
    echo '<a href="calendario.php?data='.sprintf("%02.0f",$dia).'/'.sprintf("%02.0f",$mes).'/'.$aan.'"><img src="../assets/images/estrutura/back_cal.png" title="Voltar a página anterior" alt="Voltar" border="0" width="16" height="11" /></a>'; 
  } 

  function ano_proximo($dia,$mes,$ano){ 
    $apr = $ano + 1; 
    echo '<a href="calendario.php?data='.sprintf("%02.0f",$dia).'/'.sprintf("%02.0f",$mes).'/'.$apr.'"><img src="../assets/images/estrutura/next_cal.png" title="próximor" alt="next" border="0" width="16" height="11" /></a>'; 
  } 
   
  function cria($data){ $arr = explode("/",$data); 
    $dia = $arr[0]; $mes = $arr[1]; $ano = $arr[2]; 

    if(($dia == '') OR ($mes = '') OR ($ano = '')){ 
      $data = date("d/m/Y");  $arr = explode("/",$data); 
      $dia = $arr[0]; $mes = $arr[1]; $ano = $arr[2]; 
    } 

    $arr = explode("/",$data); 
    $dia = $arr[0]; $mes = $arr[1]; $ano = $arr[2]; 

    $val = checkdate($mes,$dia,$ano); // Verifica se a data é válida 
    if($val == 1){ 
      $ver = date('d/m/Y', mktime(0,0,0,$mes,$dia,$ano)); 
    } else { 
      $ver = date('d/m/Y', mktime(0,0,0,date(m),date(d),date(Y))); 
    } 

    $arr = explode("/",$ver); $dia = $arr[0]; $mes = $arr[1]; $ano = $arr[2]; 

    $ult = date("d", mktime(0,0,0,$mes+1,0,$ano)); 
    $dse = date("w", mktime(0,0,0,$mes,1,$ano)); 

    $tot = $ult+$dse; 
    if($tot != 0){ $tot = $tot+7-($tot%7); } 

    for($i=0;$i<$tot;$i++){ 
      $dat = $i-$dse+1; 
      if(($i >= $dse) AND ($i < ($dse+$ult))){ 
        $aux[$i]  = ' 
          <td '; 

        if(($dat == date(d)) AND ($mes == date(m)) AND ($ano == date(Y))){ 
          $aux[$i] .= 'class="calendario_dias_hoje"'; 
        } else { 
          $aux[$i] .= 'class="calendario_dias"'; 
        } 

        if(($dat == date(d)) AND ($mes == date(m)) AND ($ano == date(Y))){ 
          $aux[$i] .= 'class="calendario_links_hoje"'; 
        } else { 
          $aux[$i] .= 'class="calendario_links"'; 
        } 
         
        $aux[$i] .= '><a href="calendario.php?data='.sprintf("%02.0f",$dat).'/'.$mes.'/'.$ano.'">'.$dat.'</a> 
          </td> 
        '; 
      } else { 
        $aux[$i] = ' 
          <td> 
          </td> 
        '; 
    } 

    if(($i%7) == 0){ 
      $aux[$i] = '<tr align="center">'.$aux[$i]; 
    } 

    if(($i%7) == 6){ 
      $aux[$i] .= '</tr>'; 
    } 
  } 

  echo ' 
  <table width="100%" cellspacing="0" cellpadding="0" class="calendario_tabela"> 
    <tr> 
      <td> 
        <table width="100%" cellspacing="1" cellpadding="1"> 
          <tr class="calendario_mes_ano"> 
            <td> 
  '; 
  $this->mes_anterior($dia,$mes,$ano); 
  echo ' 
            </td> 
            <td colspan="5">'.$this->mes[$mes].'</td> 
            <td> 
  '; 
  $this->mes_proximo($dia,$mes,$ano); 
  echo ' 
</td> 
          </tr> 

          <tr class="calendario_mes_ano"> 
            <td> 
  '; 
  $this->ano_anterior($dia,$mes,$ano); 
  echo ' 
            </td> 
            <td colspan="5">'.$ano.'</td> 
            <td> 
  '; 
  $this->ano_proximo($dia,$mes,$ano); 
  echo ' 
            </td> 
          </tr> 

          <tr class="calendario_semana"> 
            <td WIDTH="30">D</td> 
            <td WIDTH="30">S</td> 
            <td WIDTH="30">T</td> 
            <td WIDTH="30">Q</td> 
            <td WIDTH="30">Q</td> 
            <td WIDTH="30">S</td> 
            <td WIDTH="30">S</td> 
          </tr> 
  '; 
  echo implode(' ',$aux); 
  if(count($aux) == 35){ 
    echo ' 
          <tr> 
            <td colspan="7">&nbsp;</td> 
          </tr> 
    '; 
  }; 
  echo ' 
          <tr> 
            <td class="calendario_odia" colspan="7" align="center"> <a href="calendario.php?data='.date(d).'/'.date(m).'/'.date(Y).'">Hoje</a> </td> 
          </tr> 
        </table> 
      </td> 
    </tr> 
  </table> 
  '; 
   }  
}  

$teste = new calendario; 
$teste->cria($_GET["data"]); 
?>
