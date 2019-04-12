<?php 
global $post;
$liked_post = get_post_meta( $post->ID, '_faruklikepul_metabox_data', true );

?>
Like: <input type="number"  min="0" value="<?php echo ($liked_post ) > 0 ? $liked_post : 0 ?>" name="_faruklikepul_metabox_data" />
<br/>
<em>If you want to change the value, you can intervene.</em>