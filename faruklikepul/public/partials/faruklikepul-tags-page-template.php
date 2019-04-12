<?php

global $wpdb;
$sql = " SELECT wp_terms.term_id AS TagID, wp_terms.name AS TagName, SUM( tax.count ) AS TagPostCount
FROM wp_terms
INNER JOIN wp_term_taxonomy tax ON tax.term_id = wp_terms.term_id AND tax.taxonomy = 'post_tag'
GROUP BY wp_terms.term_id";

$result = $wpdb->get_results($sql ,ARRAY_A);

get_header(); 

?>

    <div class="tags_table">
    <div class="tags_table_head"><?php the_title(); ?></div> 

        <table id="faruklikepul-tags-table" class="ui celled table" style="width:100%">
            <thead>
                <tr>
                    <th><?php _e('Tag Name') ?></th>
                    <th><?php _e('Total Use') ?></th>
                    
                </tr>
            </thead>
            <tbody>
            <?php foreach($result as $tag) {?>
                <tr>
                    <td><?= $tag["TagName"] ?></td>
                    <td><?= $tag["TagPostCount"] ?></td>
                
                </tr>
            <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <th><?php _e('Tag Name') ?></th>
                    <th><?php _e('Total Use') ?></th>
                </tr>
            </tfoot>
        </table>
        </div>       
     
<?php 
get_footer(); 