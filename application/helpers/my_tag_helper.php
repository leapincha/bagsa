 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 if ( ! function_exists('my_validation_errors')){
  function my_validation_errors($errors) {
   $salida = '';
 
   if ($errors) {
    $salida = '<div class="alert alert-danger alert-dismissable">';
    $salida = $salida.'<h4><i class="icon fa fa-ban"></i>Error</h4>';
    $salida = $salida.'<button type="button" class="close" data-dismiss="alert"> × </button>';
    $salida = $salida.'<small>'.$errors.'</small>';
    $salida = $salida.'</div>';
   }
   return $salida;
  }
}

  ?>