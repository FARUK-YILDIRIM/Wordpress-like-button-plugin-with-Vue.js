<?php 

      global $post;
      $post_id = $post->ID;
      $get_like = get_metadata( 'post', $post_id, '_faruklikepul_metabox_data', 'true' );   
      if(!$get_like){
        $get_like = 0;
      }

      echo "<script> var faruklikepul_get_like = $get_like </script>"; 
      
      $faruklikepul_cookie = "";
      $check_cookie = "faruklikepul_like_cookie_".$post_id;

      if(isset($_COOKIE[$check_cookie])) {
        $faruklikepul_cookie = $_COOKIE[$check_cookie];
      }

      if($faruklikepul_cookie != "" && $faruklikepul_cookie == $post_id){
          echo "<script> var liked_cookie_set = false </script>"; 
          }else{
            echo "<script> var liked_cookie_set = true </script>";
      }
      
      echo $content.'
      <div id="faruklikepul-like-unlike">
      <div class="fyheart" v-on:click="like('.$post_id.')" v-if="liked"> <p class="liketext"> {{ total }} <span>people like it.</span></p> </div>
      <div class="fyheart is_animating" v-on:click="unlike('.$post_id.')" v-else> <p class="liketext">{{ total }} <span>You like this.</span> </p> </div>
      </div>
      ';
      
?>

