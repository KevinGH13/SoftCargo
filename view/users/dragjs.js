
		var strUser ;
		var intAcc =0  ;

		var  txtCampo;
		$(document).ready(function() {


			

				$("#txtCampo24").change(function(){
            strUser = $('select[id=txtCampo24]').val();
             
            changuser(strUser);
			});

     
			

		});

 function changuser(strUser){
 	var drdiv =	document.getElementById("columns");
 	var stdiv =	document.getElementById("soltar");
  var trAge = document.getElementById("trAgente")
 	if(strUser == 1){
    
 		drdiv.style.visibility = 'visible';
 		drdiv.disabled = "false";
 		stdiv.style.visibility = 'visible';
 		stdiv.disabled = "false";
    trAge.style.visibility = 'hidden';

 	}
  if(strUser == 2){
 	
 	drdiv.style.visibility = 'hidden';
 	drdiv.disabled = "true";
 	stdiv.style.visibility = 'hidden';
 	stdiv.disabled = "true";
  trAge.style.visibility = 'visible';

 	txtCampo = "txtCampoExt3=on&txtCampoExt1=on";

 	}
  if (strUser == 3){
    
  drdiv.style.visibility = 'hidden';
  drdiv.disabled = "true";
  stdiv.style.visibility = 'hidden';
  stdiv.disabled = "true";
  trAge.style.visibility = 'hidden';

  txtCampo = "txtCampo13=on";

  }
 }







    var dragSrcEl = null;
function handleDragStart(e) {
  this.style.opacity = '0.4';  // this / e.target is the source node.
   dragSrcEl = this;

  e.dataTransfer.effectAllowed = 'move';
  e.dataTransfer.setData('text/html', this.innerHTML);

}

function handleDragOver(e) {
  if (e.preventDefault) {
    e.preventDefault(); // Necessary. Allows us to drop.
  }

  e.dataTransfer.dropEffect = 'move';  // See the section on the DataTransfer object.

  return false;
}

function handleDragEnter(e) {
  // this / e.target is the current hover target.
  this.classList.add('over');
 
}

function handleDragLeave(e) {
  this.classList.remove('over');  // this / e.target is previous target element.
 

} 
var cuenta = "" ; 
function handleDrop(e) {
  // this / e.target is current target element.
if (e.stopPropagation) {
    e.stopPropagation(); // Stops some browsers from redirecting.
  }

  // Don't do anything if dropping the same column we're dragging.
  if (dragSrcEl != this) {
  	
    // Set the source column's HTML to the HTML of the columnwe dropped on.
    //dragSrcEl.innerHTML = this.innerHTML;
  var midato = e.dataTransfer.getData('text/html');
  var divsoltar = document.getElementById("soltar");

        var count = dragSrcEl.querySelector('.count');
      var newCount = String(count.getAttribute('data-col-moves')) ;
           if(txtCampo ==null){
    txtCampo = newCount+"=on" ;setTimeout(function(){add_toast('showSuccessToast','Item Agregado');},960);}
    else{txtCampo = txtCampo+"&"+newCount+"=on"; setTimeout(function(){add_toast('showSuccessToast','Item Agregado');},960);}
    cuenta = (dragSrcEl.innerHTML)+cuenta;
    divsoltar.style.background='#F15958';
     // count.setAttribute('data-col-moves', newCount);
      this.querySelector('.count').innerHTML = cuenta ;

   
     dragSrcEl.style.visibility = 'hidden' ;
     document.getElementById("txtCampo24").disabled = true;
  }

  return false;
}

function handleDragEnd(e) {
  // this/e.target is the source node.

  [].forEach.call(cols, function (col) {
    col.classList.remove('over');
    
  });
}



var cols = document.querySelectorAll('#columns .column');
[].forEach.call(cols, function(col) {
  col.addEventListener('dragstart', handleDragStart, false);
  col.addEventListener('dragenter', handleDragEnter, false)
  col.addEventListener('dragover', handleDragOver, false);
  col.addEventListener('dragleave', handleDragLeave, false);
  col.addEventListener('drop', handleDrop, false);
  col.addEventListener('dragend', handleDragEnd, false);
});




