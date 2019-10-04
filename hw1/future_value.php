<?php
  $investment = 1000;
  $interest_rate = .1;
  $years = 25;
  $future_value = $investment;

  for ($i = 1; $i <= $years; $i++) {
    $future_value = ( $future_value + ($future_value * $interest_rate)); 
  }

  echo "future value: ".$future_value;
?>


