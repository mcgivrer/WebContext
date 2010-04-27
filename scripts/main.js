/**
 * Non obstrusive javascript intialization
 */
$(document).ready(function(){

	// Search textbox
	$('#search').focus(function(){
		$(this).addClass("active");
		if(this.value=="input your search"){
			this.value="";
		}
	});
	$('#search').blur(function(){
		$(this).removeClass("active");
		if(this.value==""){
			this.value="input your search";
		}else{
			$('#formsearch').submit();
		}
	});
	// JQuery Lightbox plugin initialisation
	$(function() {
		// Select all links that contains lightbox in the attribute rel
		$('.smart-gallery a').lightBox();
	});

	// Initialize onclick action on .block to display articles
	$(".block").each(function(){
		var url="'/#/read/"+this.id+"'";
		$(this).onclick="window.url="+url;
	});

$('#debug .action a.switchview').toggle(
	function() {
		$("#debug .view").hide();
		$("#debug .action a.switchview").html("show");
	},
	function() {
		$("#debug .view").show();
		$("#debug .action a.switchview").html("hide");
	});
});

$('#debug-remove').click(
	function() {
		$('#debug .view').height($('#debug .view').height()-48);
});

$('#debug-add').click(
	function() {
		$('#debug .view').height(eval($('#debug .view').height()+48));
});

