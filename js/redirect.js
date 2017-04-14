
function showDeck(){
	var decks = document.getElementById('decks').value;
	
	if (decks =="0"){
		document.getElementById("container").innerHTML = "";
		return;
	}
	else{
		if (window.XMLHttpRequest){
			xmlhttp = new XMLHttpRequest();
		}
		
		else{
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		
		xmlhttp.onreadystatechange = function(){
			if(this.readyState == 4 && this.status == 200){
				document.getElementById("container").innerHTML = this.responseText;
			}
		};
		
	xmlhttp.open("GET", "getdeck.php?q="+decks,true);
	xmlhttp.send();		
	}
	
}

function showHands(){
	 var hands = document.getElementById('drawHand').value;
		if (window.XMLHttpRequest){
			xmlhttp = new XMLHttpRequest();
		}
		
		else{
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		
		xmlhttp.onreadystatechange = function(){
			if(this.readyState == 4 && this.status == 200){
				document.getElementById("handCards").innerHTML = this.responseText;
			
			}
		};
		
	xmlhttp.open("GET", "reset.php?q="+hands,true);
	xmlhttp.send();		
	$("#newCards").empty(); 
}

function addHand(){
	
	var list = document.getElementById('addCard').value;
	
		if (window.XMLHttpRequest){
			xmlhttp = new XMLHttpRequest();
		}
	
		else{
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		
		xmlhttp.onreadystatechange = function(){
			if(this.readyState == 4 && this.status == 200){
				document.getElementById("newCards").innerHTML = document.getElementById("newCards").innerHTML + this.responseText;
			}
		};
	xmlhttp.open("GET", "add.php?q="+list,true);
	xmlhttp.send();	
	

}