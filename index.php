<?php

require_once 'Dice.php';

$num_of_dice = 1; 
if (isset($_GET['num_of_dice'])) {
  $num_of_dice = $_GET['num_of_dice'];
}

$sides = 0; 
if (isset($_GET['side_number'])) {
  $sides = $_GET['side_number'];
}

$dice = [];
for($i=0; $i < $num_of_dice; $i++){
  $die = new Dice($sides);
  $die->roll(); 
  $dice[] = $die;

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Dice-Throwing</title>
</head>
<body>

<form action="" method="get">
  <input type="text" name="num_of_dice" value="<?= htmlspecialchars($num_of_dice)?>">
  <select name="side_number">
    <option value="4" <?= $sides == 4 ? 'selected' : '' ?>>4</option>
    <option value="6" <?= $sides == 6 ? 'selected' : '' ?>>6</option>
    <option value="10" <?= $sides == 10 ? 'selected' : '' ?>>10</option>
    <option value="20" <?= $sides == 20 ? 'selected' : '' ?>>20</option>
    <!-- could also do like 
    <option value="4">4</option>
    <option value="6">6</option>
    <option value="10">10</option>
    <option value="20" >20</option> 
    -->

  <input type="submit" name="Roll!">
</form>

<div class="dice">
  <?php
    foreach($dice as $die){
      echo $die;
  }
  ?>
</div>
  
  <style>
  .dice {
    display:flex;
    flex-flow:row wrap;
  }
  .die {
    border: 1.3px solid black;
    margin:.2em;
    padding:.4em;
    font-size:2em;
  }
  </style>

</body>
</html>