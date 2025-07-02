<?php 
/*
Template Name: Schedule
*/
defined('ABSPATH') || die("!");

error_reporting(E_ALL);
ini_set('display_errors',1);
date_default_timezone_set("Asia/Bangkok");

$schedule = new GOV_schedule;
//custom scedule
$schedule->setSchedule([
	"anime_id" => 66, // post id of anime series
	"days" => 7, //release every 7 days
	"libur" => 2, //relese every n rotation
]);
$the_array = $schedule->get_schedule_data();
$the_keys = $schedule->get_day_names();

?>

<?php get_header(); ?>
<div class="postbody"><div class="bixbox">
<div class="releases"><h1><span><?php echo get_the_title(); ?></span></h1></div>
<div class="listupd" style="line-height: 22px;"><?php echo GOV_lang::get('schedule_head');?><br/>
</div></div>

	<?php foreach($the_keys as $k => $v) { $the_array[$v] = isset($the_array[$v]) && is_array($the_array[$v]) ? $the_array[$v] : [];ksort($the_array[$v]);?>
		<div class="clear"></div>
		<div class="bixbox">
			<div class="releases"><h3><span><?php echo $schedule->sch_translate($v); ?></span></h3></div>
		<div class="listupd">
		<?php foreach($the_array[$v] as $k2 => $v2) { ?>
			<?php if ( ! is_numeric($v2['current_episode'])) continue; ?>
			<div class="bs">
				<div class="bsx">
					<a href="<?php echo get_site_url();?><?php echo $schedule->getAnimeSlug(); ?><?=$v2['post_name'];?>" title="<?=$v2['post_title']?>">
					<div class="limit">
						<div class="ply"><i class="fa fa-play-circle-o" aria-hidden="true"></i></div>
						<div class="bt">
							<?php if ($v2['already_posted']) { ?>
								<span class="epx"><?php echo GOV_lang::get('schedule_released');?></span>
								<span class="sb Sub"><?=$v2['current_episode'];?></span>
							<?php } elseif ($v2['countdown'] < 0) { ?>
								<span class="epx"><?php echo GOV_lang::get('schedule_released', ["time" => $v2['release_time']]);?></span>
								<span class="sb Sub"><?=$v2['next_episode'];?></span>
							<?php } else { ?>
								<span class="epx cndwn" data-rlsdt="<?=$v2['release_date']?>" data-cndwn="<?=$v2['countdown'];?>"><?php echo GOV_lang::get('schedule_released', ["time" => $v2['release_time']]);?></span>
								<span class="sb Sub"><?=$v2['next_episode'];?></span>
							<?php } ?>
						</div>
						<img width="225" height="321" src="<?=$v2['image'];?>" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="<?=$v2['post_title']?>">		</div>
						<div class="tt"><?=$v2['post_title']?></div>
					</a>
				</div>
			</div>
		<?php } ?>
		</div>
	</div>
	<?php } ?>
	<?php if(isset($the_array["random"])!=0){ ?>
	<div class="bixbox">
			<div class="releases"><h3><span><?php echo GOV_lang::get('schedule_random_update');?></span></h3></div>
		<div class="listupd">
	<?php foreach($the_array["random"] as $k2 => $v2) { ?>
		<?php if ( ! is_numeric($v2['next_episode'])) continue; ?>
		<div class="bs">
			<div class="bsx">
				<a href="<?php echo get_site_url();?><?php echo $schedule->getAnimeSlug(); ?><?=$v2['post_name'];?>" title="<?=$v2['post_title']?>">
				<div class="limit">
					<div class="ply"><i class="fa fa-play-circle-o" aria-hidden="true"></i></div>
					<div class="bt">
						<span class="epx"><?php echo GOV_lang::get('schedule_countdown_unknown');?></span>
						<span class="sb Sub"><?=$v2['next_episode'];?></span>
					</div>
					<img width="225" height="321" src="<?=$v2['image'];?>" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="<?=$v2['post_title']?>">		</div>
					<div class="tt"><?=$v2['post_title']?></div>
				</a>
			</div>
		</div>
	<?php } ?>
		</div>
	</div>
	<?php } ?>
</div>
<script>
var format = "<?php echo GOV_lang::get('schedule_countdown_format');?>";
function convert_dhms(s){
	var seconds = parseInt(s, 10);
	var days = Math.floor(seconds / (3600*24));
	seconds  -= days*3600*24;
	var hrs   = Math.floor(seconds / 3600);
	seconds  -= hrs*3600;
	var mnts = Math.floor(seconds / 60);
	seconds  -= mnts*60;
	var res = format;
	if (days) res = res.replace("{{days}}", days);
	else res = res.replace("{{days}}", "0");
	if (hrs) res = res.replace("{{hours}}", hrs);
	else res = res.replace("{{hours}}", "0");
	if (mnts) res = res.replace("{{minutes}}", mnts);
	else res = res.replace("{{minutes}}", "0");
	return res;
}
function update_ts(){
	$('.cndwn').each(function(k,v){
		try{
			var thcd = this.getAttribute('data-cndwn');
			if (isNaN(thcd)) return true;
			var rlsdt = parseInt(this.getAttribute('data-rlsdt'));
			var s = rlsdt - new Date().getTime() / 1000;
			if (s < 0) return true;
			this.innerHTML = convert_dhms(s);
		}catch(e){
			console.error(e);
		}
	});
}
update_ts();
setInterval(function(){update_ts();}, 60 * 1000);
</script>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
