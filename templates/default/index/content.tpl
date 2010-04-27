<? $categories = __tget("categories"); ?>
<?= __debug($categories)?>
<div id="sidebar">
	<div class="sub">
		<ul>
			<li><?= __linkto('home','index',"<u>h</u>ome","back to welcome page","h")?></li>
			<? foreach( $categories as $id =>$category) : ?>
				<li><?= __linkto('category',$category['url']."/filter",$category['title'],$category['tooltip'],$category['shortcut'])?></a></li>
			<? endforeach;?>
		</ul>
	</div>
</div>
<div id="inner-content">
	<div id="upperbar">
		<? __timport("models/feature/lastfeatures");?>
	</div>
<?php
if (__tget('searchText')=="") {
	__timport("models/feature/features");
}else{
	__timport("index/search");
} ?>
</div>

