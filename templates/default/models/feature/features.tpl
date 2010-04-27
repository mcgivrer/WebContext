<div>
	<?
	$features = __tget("features");
	foreach($features as $id => $feature) :
		__tset("feature",$feature);
		__tset("id",$id);
		__timport("models/feature/feature");
	endforeach;
	?>
</div>
<div class="clear"></div>
