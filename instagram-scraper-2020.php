<?php
/****************************
 * Instagram Scraper 2020   *
 * c0de by yogi@kortisa.com *
 ****************************/

error_reporting(0);
$username = 'jokowi'; // Sample of instagram account @jokowi
$instaResult = file_get_contents('https://www.instagram.com/'.$username.'/?__a=1');
$insta = json_decode($instaResult);
$instagram_photos = $insta->graphql->user->edge_owner_to_timeline_media->edges;
?>

<div>
<?php foreach($instagram_photos as $key => $instagram_photo) { ?>
   <div>
       <div><img src="<?php echo $instagram_photo->node->display_url ?>"></div>
       <div>
			<p><pre><?php echo $instagram_photo->node->edge_media_to_caption->edges[0]->node->text ?></pre></p>
			<p><?php echo $instagram_photo->node->edge_media_to_comment->count ?> comments</p>
			<p><?php echo date('d M Y', $instagram_photo->node->taken_at_timestamp) ?></p>
       </div>
   </div>
   <br /><br />
<?php } ?>
</div>
