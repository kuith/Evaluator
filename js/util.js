//(function () {
//	var expresion = /^[0-9]+([,][0-9]+)?$/,
//		celdasAEscuchar = document.getElementsByClassName('celdaNota'),
//		i,
//        cuenta = celdasAEscuchar.length,
//		
//	soloNumeros = function (e) {
//			var contenido = limpiarNota(e.target.innerHTML),
//				ok = expresion.exec(contenido);
//			if (!ok){
//				window.alert(contenido + "No es un número válido");
//			} else{
// 				window.alert("ok");
//			}
//			concole.log(contenido)
//        };
//		
//   		for (i = 0; i < cuenta; i++) {
//       		celdasAEscuchar[i].addEventListener("blur", soloNumeros, false);
//
//   		}
//
//
//}());
