<?
	Data::getInstance()->load();
	$features = Data::getInstance()->get('features');
?>
<ul>
	<? foreach($features as $id => $post) :?>
		<li><?= __linkto('post',$post['url']."/read",$post['title'],__s('post','read',$post['title'])) ?></li>
  <? endforeach;?>
</ul>

