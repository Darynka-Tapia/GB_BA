function cambiarVisibilidad(){
	var libro1 = document.getElementById('libro1');

	if(libro1.style.display == 'none'){
		libro1.style.display = 'block' ;


	}else{
		libro1.style.display ='none';
	}

}
function cambiarVisibilidad1(){
	var libro2 = document.getElementById('libro2');

	if(libro2.style.display == 'none'){
		libro2.style.display = 'block' ;



	}else{
		libro2.style.display ='none';
	}
}
function cambiarVisibilidad2(){
	var libro1 = document.getElementById('libro1');
	var libro2 = document.getElementById('libro2');

	if(libro1.style.display == 'none'){
		libro1.style.display = 'block' ;
		libro2.style.display ='none';


	}else{
		libro1.style.display ='none';
	}

}
function cambiarVisibilidad3(){

	var libro1 = document.getElementById('libro1');
	var libro2 = document.getElementById('libro2');

	if(libro2.style.display == 'none'){
		libro2.style.display = 'block' ;
		libro1.style.display ='none';


	}else{
		libro2.style.display ='none';
	}
}