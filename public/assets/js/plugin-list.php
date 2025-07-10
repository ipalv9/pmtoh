 <?php
 
  header('Access-Control-Allow-Origin: *');
  
  print_r( file_get_contents('http://dharansh.in/oscarhtml/documentation/assets/js/plugin-list.json') );
