<?php
$a[] = "Supreme Pizza";
$a[] = "Neapolitan Pizza";
$a[] = "Chicago Pizza";
$a[] = "New York-Style Pizza";
$a[] = "Greek Pizza";
$a[] = "Detroit Pizza";
$a[] = "St. Louis Pizza";
$a[] = "Meatlover Pizza";
$a[] = "Italian Sausage Pizza";
$a[] = "Mushroom Pizza";
$a[] = "Veggie Pizza";
$a[] = "Pepperoni Pizza";
$a[] = "BBQ Chicken Pizza";
$a[] = "Hawaiian Pizza";
$a[] = "Petunia";
$a[] = "Amanda Pizza";

$q = $_REQUEST["q"];

$hint = "";

if ($q !== "") {
  $q = strtolower($q);
  $len = strlen($q);
  foreach ($a as $name) {
    if (stristr($q, substr($name, 0, $len))) {
      if ($hint === "") {
        $hint = $name;
      } else {
        $hint .= ", $name";
      }
    }
  }
}
echo $hint === "" ? "NO HINT" : $hint;
