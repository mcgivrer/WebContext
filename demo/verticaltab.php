<?xml version="1.0" encoding="UTF-8" standalone="no"?>
<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
	<script type="text/javascript">
		<![CDATA[
		//this will create htmljavascriptfunctionname in html document and link it to changeText
		top.htmljavascriptfunctionname = changeText;
		function changeText(txt){
			targetText=document.getElementById("thetext");
			var newText = document.createTextNode(txt);
			targetText.replaceChild(newText,targetText.childNodes[0]);
		}
		// ]]>
	</script>
	<text id="thetext" transform="rotate(270, 90, 0)" font-size="12" x="3" y="-60" font-family="Verdana"><?php echo $_GET['text']?></text>
</svg>
