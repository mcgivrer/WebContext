<? $feature = __tget("feature");?><? $id = __tget("id");?>
<div id="b<?=$id?>" class="read">
	<? if(isset($feature['tags'])) { ?>
	<ul class="tags">
		<? foreach( $feature['tags'] as $id=>$tag ) : ?>
		<li><?= __linkto('tag',$tag['name'],$tag['name'],__s('tag','read',$tag['name']))?></li>
		<? endforeach;?>
	</ul>
	<?}?>
	<h1><?= __linkto('feature',$feature['url'],$feature['title'],__('feature','go_title'))?></h1>
	<div class="block-header">
		<?= $feature['header']?>
	</div>
	<div class="block-content">
		<?= $feature['content']?>
	</div>
	<ul class="infos">
	    <li>auteur : </li>
	    <li>date : </li>
	    <li>rate : </li>
	</ul>
</div>

