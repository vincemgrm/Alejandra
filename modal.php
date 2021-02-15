<h2>1st Modal</h2>

<button id="myBtn">Open Model</button>

<div id="myModal" class"modal">

	<div class="modal-content">
	<div class="modal-header">
	<span class="close">x</span>
	<h2>Header</h2>
</div>
<div class="modal-body">
<p>blabalah</p>
</div>
<div class="modal-footer">
	<h3>Footer</h3>
</div>

<!-- //get the modal -->

<script type="text/javascript">
var modal=document.getElementById('myModal');

var btn=document.getElementById('myBtn');
var span=document.getElementsByClassName("close")[0];

btn.onclick=function(){
	modal.style.display="block";
}

span.onclick=function(){

	modal.style.display="none";
}

window.onclick=function(event){
if (event.target==modal){
	modal.style.display="none";
}

}



</script>
