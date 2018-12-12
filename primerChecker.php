<?php

  // INFO: PRIMER SEQUENCE
  $p_fwd = "AGCAGCACT";

  // INFO: GENOMIC SEQUENCE
  $sequence = "TAGCATCAGCAGCTACAGGACACAGCAGCACTACGACGAGCAAGCAGCAT";


  // INFO: STRIPPED STRINGS IN LOWER CASE AND dna rna CHECK
  $p_fwd = preg_replace('/[^atgcu]/', '', strtolower($p_fwd));
  $sequence = preg_replace('/[^atgcu]/', '', strtolower($sequence));

  if ( strpos( $p_fwd, "u") > 0 && strpos( $p_fwd, "t") > 0 ) {

    die("The primer sequence contains both U and T");

  } else if ( strpos( $sequence, "u") > 0 && strpos( $sequence, "t") > 0 ) {

    die("The gene sequence contains both U and T");

  }


  // INFO: AUTO GENERATED SEQUENCES
  $p_rev = "";
  $t_fwd = "";
  $t_rev = "";


  // INFO: CONVERTS THE FORWARD PRIMER TO ITS TARGET
  function primerToTarget() {
    global $p_fwd, $p_rev, $t_fwd, $t_rev;

    for ($i = 0; $i < strlen($p_fwd); $i++) {

      $curr = substr($p_fwd, $i, 1);
      switch ($curr) {

        case "a": $t_fwd .= "t"; break;
        case "t": $t_fwd .= "a"; break;
        case "g": $t_fwd .= "c"; break;
        case "c": $t_fwd .= "g"; break;
        case "u": $t_fwd .= "a"; break;

      }
    }

    $p_rev = strrev( $p_fwd );
    $t_rev = strrev( $t_fwd );
  }


  // INFO: CHECKS IF SEQUENCES EXIST IN SEQUENCE
  function checkSequence() {
    global $p_fwd, $p_rev, $t_fwd, $t_rev, $sequence;

    echo( strpos( $sequence, $p_fwd ) > 0 ? "pf1:" : "pf0:" );
    echo( strpos( $sequence, $p_rev ) > 0 ? "pr1:" : "pr0:" );
    echo( strpos( $sequence, $t_fwd ) > 0 ? "tf1:" : "tf0:" );
    echo( strpos( $sequence, $t_rev ) > 0 ? "tr1" : "tr0" );

  }


  primerToTarget();
  checkSequence();

?>
