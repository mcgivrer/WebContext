<? $feature = __tget("feature");?><? $id = __tget("id");?>
<div id="b<?=$id?>" class="block lblock<?=($feature['style']!=''?' '.$feature['style']:'')?>">
	<? if(isset($feature['tags'])) { ?>
	<ul class="tags">
		<? foreach( $feature['tags'] as $id=>$tag ) : ?>
		<li><?= __linkto('tag',$tag['name']."/filter",$tag['name'],__s('tag','read',$tag['name']))?></li>
		<? endforeach;?>
	</ul>
	<?}?>
	<img src="<?= __mediapath('thumbs',$feature['url'],$feature['media']['header']['image'])?>"
		   title="<?= $feature['media']['header']['title']?>"
			 alt="<?= $feature['media']['header']['alternative_text']?>"
			 class="bandeau-x1"/>
	<h1><?= __linkto('feature',$feature['url']."/read",$feature['title'],__('feature','go_title'))?></h1>
	<div class="block-content">
		<?= __reduce($feature['header'],200,"...") ?>
	</div>
	<ul class="infos"><li><?= __slinkto('feature',$feature['url']."/read",'feature','go_label','go_title')?></li></ul>
</div>

