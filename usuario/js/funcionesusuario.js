$(document).ready(function(){
	$("#menu").menu();
	document.oncontextmenu = function(){
		return false;
	}
});
function Page(str)
{
	var xmlhttp;
	if(window.XMLHttpRequest)
	{
		xmlhttp=new XMLHttpRequest();
	}
	else
	{
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function()
	{
		if(xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			$("#content").html(xmlhttp.responseText);
		}
	}
	xmlhttp.open("GET",str+".php",true);
	xmlhttp.send();
}
function Registrarnov(type)
{
	if($("#tipodocumento").val()=="")
	{
		$("<div>Por favor escoga el tipo de documento de identidad</div>").dialog({
			modal:true,
			title:'Validacion',
			buttons:{
				"Aceptar":function()
				{
					$(this).dialog("close");
				}
			}
		});
		return false;
	}
	else if($("#idafiliado").val()==""||isNaN($("#idafiliado").val()))
	{
		$("<div>Por favor ingrese el documento de identidad del afiliado</div>").dialog({
			modal:true,
			title:'Validacion',
			buttons:{
				"Aceptar":function()
				{
					$(this).dialog("close");
				}
			}
		});
		return false;
	}
	else if($("#nombre1").val()=="")
	{
		$("<div>Por favor llene el nombre del usuario</div>").dialog({
			modal:true,
			title:'Validacion',
			buttons:{
				"Aceptar":function()
				{
					$(this).dialog("close");
				}
			}
		});
		return false;
	}
	else if($("#apellido1").val()=="")
	{
		$("<div>Por favor llene el apellido del usuario</div>").dialog({
			modal:true,
			title:'Validacion',
			buttons:{
				"Aceptar":function()
				{
					$(this).dialog("close");
				}
			}
		});
		return false;
	}
	else if($("#fechanac").val()=="")
	{
		$("<div>Por favor llene la fecha de nacimiento del usuario</div>").dialog({
			modal:true,
			title:'Validacion',
			buttons:{
				"Aceptar":function()
				{
					$(this).dialog("close");
				}
			}
		});
		return false;
	}
	else if($("#dptoafi").val()=="")
	{
		$("<div>Por favor escoga el departamento de proveniencia del usuario</div>").dialog({
			modal:true,
			title:'Validacion',
			buttons:{
				"Aceptar":function()
				{
					$(this).dialog("close");
				}
			}
		});
		return false;
	}
	else if($("#ciudadafi").val()=="")
	{
		$("<div>Por favor escoga la ciudad de proveniencia del usuario</div>").dialog({
			modal:true,
			title:'Validacion',
			buttons:{
				"Aceptar":function()
				{
					$(this).dialog("close");
				}
			}
		});
		return false;
	}
	if(type=="N01")
	{
		if($("#valor1").val()=="")
		{
			$("<div>Escoga el tipo de documento de identidad del usuario a modificar</div>").dialog({
				modal:true,
				title:'Validacion',
				buttons:{
					"Aceptar":function()
					{
						$(this).dialog("close");
					}
				}
			});
			return false;
		}
		else if($("#valor2").val()=="")
		{
			$("<div>Ingrese el numero de documento de identidad a modificar</div>").dialog({
				modal:true,
				title:'Validacion',
				buttons:{
					"Aceptar":function()
					{
						$(this).dialog("close");
					}
				}
			});
			return false;
		}
		else if($("#valor3").val()=="")
		{
			$("<div>Escoga la fecha de nacimiento a modificar</div>").dialog({
				modal:true,
				title:'Validacion',
				buttons:{
					"Aceptar":function()
					{
						$(this).dialog("close");
					}
				}
			});
			return false;
		}
		else if($("#valor4").val()=="")
		{
			$("<div>Escoga el tipo de actualizacion</div>").dialog({
				modal:true,
				title:'Validacion',
				buttons:{
					"Aceptar":function()
					{
						$(this).dialog("close");
					}
				}
			});
			return false;
		}
		else
		{
			y="observacion="+$("#observacion").val().toUpperCase()+"&tipodoc="+$("#tipodocumento").val().toUpperCase()+"&iddoc="+$("#idafiliado").val()+"&apellido1="+$("#apellido1").val().toUpperCase()+"&apellido2="+$("#apellido2").val().toUpperCase()+"&nombre1="+$("#nombre1").val().toUpperCase()+"&nombre2="+$("#nombre2").val().toUpperCase()+"&fechanac="+$("#fechanac").val()+"&dptoafi="+$("#dptoafi").val()+"&ciudadafi="+$("#ciudadafi").val()+"&codnov="+type+"&valor1="+$("#valor1").val().toUpperCase()+"&valor2="+$("#valor2").val().toUpperCase()+"&valor3="+$("#valor3").val().toUpperCase()+"&valor4="+$("#valor4").val().toUpperCase()+"&direccion="+$("#direcciondomi").val().toUpperCase()+"&telefono="+$("#telefono").val()+"&ficha="+$("#ficha").val()+"&nivel="+$("#nivel").val()+"&formulario="+$("#formulario").val()+"&tipopob="+$("#tipopob").val()+"&zona="+$("#zona").val()+"&genero="+$("input[name='genero']:checked").val();
		}
	}
	else if(type=="N02"||type=="N03"||type=="N04")
	{
		if($("#valor1").val()=="")
		{
			$("<div>Ingrese el primer valor</div>").dialog({
				modal:true,
				title:'Validacion',
				buttons:{
					"Aceptar":function()
					{
						$(this).dialog("close");
					}
				}
			});
			return false;
		}
		else
		{
			if(type=="N04")
			{
				y="observacion="+$("#observacion").val().toUpperCase()+"&tipodoc="+$("#tipodocumento").val().toUpperCase()+"&iddoc="+$("#idafiliado").val()+"&apellido1="+$("#apellido1").val().toUpperCase()+"&apellido2="+$("#apellido2").val().toUpperCase()+"&nombre1="+$("#nombre1").val().toUpperCase()+"&nombre2="+$("#nombre2").val().toUpperCase()+"&fechanac="+$("#fechanac").val()+"&dptoafi="+$("#dptoafi").val()+"&ciudadafi="+$("#ciudadafi").val()+"&codnov="+type+"&valor1="+$("#valor1").val().toUpperCase()+"&direccion="+$("#direcciondomi").val().toUpperCase()+"&telefono="+$("#telefono").val()+"&ficha="+$("#ficha").val()+"&nivel="+$("#nivel").val()+"&formulario="+$("#formulario").val()+"&tipopob="+$("#tipopob").val()+"&zona="+$("#zona").val()+"&genero="+$("input[name='genero']:checked").val();
			}
			else
			{
				y="observacion="+$("#observacion").val().toUpperCase()+"&tipodoc="+$("#tipodocumento").val().toUpperCase()+"&iddoc="+$("#idafiliado").val()+"&apellido1="+$("#apellido1").val().toUpperCase()+"&apellido2="+$("#apellido2").val().toUpperCase()+"&nombre1="+$("#nombre1").val().toUpperCase()+"&nombre2="+$("#nombre2").val().toUpperCase()+"&fechanac="+$("#fechanac").val()+"&dptoafi="+$("#dptoafi").val()+"&ciudadafi="+$("#ciudadafi").val()+"&codnov="+type+"&valor1="+$("#valor1").val().toUpperCase()+"&valor2="+$("#valor2").val().toUpperCase()+"&direccion="+$("#direcciondomi").val().toUpperCase()+"&telefono="+$("#telefono").val()+"&ficha="+$("#ficha").val()+"&nivel="+$("#nivel").val()+"&formulario="+$("#formulario").val()+"&tipopob="+$("#tipopob").val()+"&zona="+$("#zona").val()+"&genero="+$("input[name='genero']:checked").val();
			}
		}
	}
	else if(type=="N09")
	{
		y="observacion="+$("#observacion").val().toUpperCase()+"&tipodoc="+$("#tipodocumento").val().toUpperCase()+"&iddoc="+$("#idafiliado").val()+"&apellido1="+$("#apellido1").val().toUpperCase()+"&apellido2="+$("#apellido2").val().toUpperCase()+"&nombre1="+$("#nombre1").val().toUpperCase()+"&nombre2="+$("#nombre2").val().toUpperCase()+"&fechanac="+$("#fechanac").val()+"&dptoafi="+$("#dptoafi").val()+"&ciudadafi="+$("#ciudadafi").val()+"&codnov="+type;
	}
	else if(type=="N14"||type=="N20")
	{
		if(type=="N14")
		{
			y="observacion="+$("#observacion").val().toUpperCase()+"&tipodoc="+$("#tipodocumento").val().toUpperCase()+"&iddoc="+$("#idafiliado").val()+"&apellido1="+$("#apellido1").val().toUpperCase()+"&apellido2="+$("#apellido2").val().toUpperCase()+"&nombre1="+$("#nombre1").val().toUpperCase()+"&nombre2="+$("#nombre2").val().toUpperCase()+"&fechanac="+$("#fechanac").val()+"&dptoafi="+$("#dptoafi").val()+"&ciudadafi="+$("#ciudadafi").val()+"&codnov="+type+"&valor1="+$("#valor1").val().toUpperCase()+"&direccion="+$("#direcciondomi").val().toUpperCase()+"&telefono="+$("#telefono").val()+"&ficha="+$("#ficha").val()+"&nivel="+$("#nivel").val()+"&formulario="+$("#formulario").val()+"&tipopob="+$("#tipopob").val()+"&zona="+$("#zona").val()+"&genero="+$("input[name='genero']:checked").val();;
		}
		else if(type=="N20")
		{
			y="observacion="+$("#observacion").val().toUpperCase()+"&tipodoc="+$("#tipodocumento").val().toUpperCase()+"&iddoc="+$("#idafiliado").val()+"&apellido1="+$("#apellido1").val().toUpperCase()+"&apellido2="+$("#apellido2").val().toUpperCase()+"&nombre1="+$("#nombre1").val().toUpperCase()+"&nombre2="+$("#nombre2").val().toUpperCase()+"&fechanac="+$("#fechanac").val()+"&dptoafi="+$("#dptoafi").val()+"&ciudadafi="+$("#ciudadafi").val()+"&codnov="+type+"&valor1="+$("#nivel").val().toUpperCase()+"&direccion="+$("#direcciondomi").val().toUpperCase()+"&telefono="+$("#telefono").val()+"&ficha="+$("#ficha").val()+"&nivel="+$("#nivel").val()+"&formulario="+$("#formulario").val()+"&tipopob="+$("#tipopob").val()+"&zona="+$("#zona").val()+"&genero="+$("input[name='genero']:checked").val();;
		}
	}
	else if(type=="N17")
	{
		if($("#valor1M").is(':checked'))
		{
			sexo="M"
		}
		else if($("#valor1F").is(':checked'))
		{
			sexo="F";
		}
		y="observacion="+$("#observacion").val().toUpperCase()+"&tipodoc="+$("#tipodocumento").val().toUpperCase()+"&iddoc="+$("#idafiliado").val()+"&apellido1="+$("#apellido1").val().toUpperCase()+"&apellido2="+$("#apellido2").val().toUpperCase()+"&nombre1="+$("#nombre1").val().toUpperCase()+"&nombre2="+$("#nombre2").val().toUpperCase()+"&fechanac="+$("#fechanac").val()+"&dptoafi="+$("#dptoafi").val()+"&ciudadafi="+$("#ciudadafi").val()+"&codnov="+type+"&valor1="+sexo+"&direccion="+$("#direcciondomi").val().toUpperCase()+"&telefono="+$("#telefono").val()+"&ficha="+$("#ficha").val()+"&nivel="+$("#nivel").val()+"&formulario="+$("#formulario").val()+"&tipopob="+$("#tipopob").val()+"&zona="+$("#zona").val()+"&genero="+$("input[name='genero']:checked").val();;
	}
	else if(type=="N21")
	{
		if($("#tipopob").val()=="")
		{
			$("<div>Por favor escoge el tipo de poblacion</div>").dialog({
				modal:true,
				title:'Validacion',
				buttons:{
					"Aceptar":function()
					{
						$(this).dialog("close");
					}
				}
			});
			return false;
		}
		else
		{
			y="observacion="+$("#observacion").val().toUpperCase()+"&tipodoc="+$("#tipodocumento").val().toUpperCase()+"&iddoc="+$("#idafiliado").val()+"&apellido1="+$("#apellido1").val().toUpperCase()+"&apellido2="+$("#apellido2").val().toUpperCase()+"&nombre1="+$("#nombre1").val().toUpperCase()+"&nombre2="+$("#nombre2").val().toUpperCase()+"&fechanac="+$("#fechanac").val()+"&dptoafi="+$("#dptoafi").val()+"&ciudadafi="+$("#ciudadafi").val()+"&codnov="+type+"&valor1="+$("#tipopob").val().toUpperCase()+"&direccion="+$("#direcciondomi").val().toUpperCase()+"&telefono="+$("#telefono").val()+"&ficha="+$("#ficha").val()+"&nivel="+$("#nivel").val()+"&formulario="+$("#formulario").val()+"&tipopob="+$("#tipopob").val()+"&zona="+$("#zona").val()+"&genero="+$("input[name='genero']:checked").val();;
		}
	}
	var xmlhttp;
	if(window.XMLHttpRequest)
	{
		xmlhttp=new XMLHttpRequest();
	}
	else
	{
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function()
	{
		if(xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			$(".process").dialog("close");
			if(xmlhttp.responseText=="Registro de novedad exitoso" && type!="N09" || type!="N14")
			{
				$("<div>"+xmlhttp.responseText+"</div>").dialog({
					modal:true,
					title:'Registro Novedad',
					buttons:{
						"Aceptar":function()
						{
							$(this).dialog("close");
						},
						"Imprimir":function()
						{
							if(type=="N01")
							{
								Carnetnov($("#valor2").val(),type);
							}
							else
							{
								Carnetnov($("#idafiliado").val(),type);
							}
						}
					}
				});
			}
			else if(xmlhttp.responseText=="Registro de novedad exitoso" && type=="N09" || type=="N14")
			{
				$("<div>"+xmlhttp.responseText+"</div>").dialog({
					modal:true,
					title:'Registro Novedad',
					buttons:{
						"Aceptar":function()
						{
							$(this).dialog("close");
						}
					}
				});
			}
			else
			{
				$("<div>"+xmlhttp.responseText+"</div>").dialog({
					modal:true,
					title:'Registro Novedad',
					buttons:{
						"Aceptar":function()
						{
							$(this).dialog("close");
						}
					}
				});
			}
		}
		else
		{
			$("<div class='process'><img src='../imagenes/cargando.gif'></div>").dialog({
				modal:true,
			});
		}
	}
	xmlhttp.open("POST","instancias/registranovedad.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send(y);
}
function Carnetnov(id,type)
{
	window.open("instancias/carnetizacionovedades.php?id="+id+"&nov="+type,"_blank","toolbar=yes, scrollbars=yes, resizable=yes, top=500, left=500, width=700, height=700");
}
function RegistrarTraslado()
{
	if($("#Tipo_Document_fosyga").val()=="")
	{
		$("<div>Por favor ingrese el tipo de documento que aparece en el FOSYGA</div>").dialog({
			modal:true,
			title:"Validacion de Registro",
			buttons:{
				"Aceptar":function()
				{
					$(this).dialog("close");
				}
			}
		});
	}
	else if($("#Numero_Identificacion_Afil_fosyga").val()=="")
	{
		$("<div>Por favor ingrese el numero de documento de identidad que aparece en FOSYGA</div>").dialog({
			modal:true,
			title:"Validacion de Registro",
			buttons:{
				"Aceptar":function()
				{
					$(this).dialog("close");
				}
			}
		});
	}
	else if(isNaN($("#Numero_Identificacion_Afil_fosyga").val()))
	{
		$("<div>Por favor ingrese un formato valido para el numero de documento de identidad</div>").dialog({
			modal:true,
			title:"Validacion de Registro",
			buttons:{
				"Aceptar":function()
				{
					$(this).dialog("close");
				}
			}
		});
	}
	else if($("#Apellido_1_fosyga").val()=="")
	{
		$("<div>Por favor ingrese el primer apellido del usuario que aparece en FOSYGA</div>").dialog({
			modal:true,
			title:"Validacion de Registro",
			buttons:{
				"Aceptar":function()
				{
					$(this).dialog("close");
				}
			}
		});
	}
	else if($("#Nombre_1_fosyga").val()=="")
	{
		$("<div>Por favor ingrese el primer nombre del usuario que aparece en FOSYGA</div>").dialog({
			modal:true,
			title:"Validacion de Registro",
			buttons:{
				"Aceptar":function()
				{
					$(this).dialog("close");
				}
			}
		});
	}
	else if($("#Fecha_Nacimiento_fosyga").val()=="")
	{
		$("<div>Por favor ingrese la fecha de nacimiento del usuario que aparece en FOSYGA</div>").dialog({
			modal:true,
			title:"Validacion de Registro",
			buttons:{
				"Aceptar":function()
				{
					$(this).dialog("close");
				}
			}
		});
	}
	else if($("#Genero_afil_fosygaM").prop("checked")==false&&$("#Genero_afil_fosygaF").prop("checked")==false)
	{
		$("<div>Por favor seleccione el sexo del usuario que aparece en FOSYGA</div>").dialog({
			modal:true,
			title:"Validacion de Registro",
			buttons:{
				"Aceptar":function()
				{
					$(this).dialog("close");
				}
			}
		});
	}
	else if($("#Tipo_Documento").val()=="")
	{
		$("<div>Por favor ingrese el tipo de documento del usuario</div>").dialog({
			modal:true,
			title:"Validacion de Registro",
			buttons:{
				"Aceptar":function()
				{
					$(this).dialog("close");
				}
			}
		});
	}
	else if($("#Numero_IdentificacionAfil").val()=="")
	{
		$("<div>Por favor ingrese el numero de documento de identidad del usuario</div>").dialog({
			modal:true,
			title:"Validacion de Registro",
			buttons:{
				"Aceptar":function()
				{
					$(this).dialog("close");
				}
			}
		});
	}
	else if(isNaN($("#Numero_IdentificacionAfil").val()))
	{
		$("<div>Por favor ingrese un formato valido para el numero de documento de identidad</div>").dialog({
			modal:true,
			title:"Validacion de Registro",
			buttons:{
				"Aceptar":function()
				{
					$(this).dialog("close");
				}
			}
		});
	}
	else if($("#Apellido1").val()=="")
	{
		$("<div>Por favor ingrese el primer apellido del usuario</div>").dialog({
			modal:true,
			title:"Validacion de Registro",
			buttons:{
				"Aceptar":function()
				{
					$(this).dialog("close");
				}
			}
		});
	}
	else if($("#Nombre1").val()=="")
	{
		$("<div>Por favor ingrese el primer nombre del usuario</div>").dialog({
			modal:true,
			title:"Validacion de Registro",
			buttons:{
				"Aceptar":function()
				{
					$(this).dialog("close");
				}
			}
		});
	}
	else if($("#FechaNacimiento").val()=="")
	{
		$("<div>Por favor ingrese la fecha de nacimiento del usuario</div>").dialog({
			modal:true,
			title:"Validacion de Registro",
			buttons:{
				"Aceptar":function()
				{
					$(this).dialog("close");
				}
			}
		});
	}
	else if($("#Genero_afiliadoM").prop("checked")==false&&$("#Genero_afiliadoF").prop("checked")==false)
	{
		$("<div>Por favor seleccione el sexo del usuario</div>").dialog({
			modal:true,
			title:"Validacion de Registro",
			buttons:{
				"Aceptar":function()
				{
					$(this).dialog("close");
				}
			}
		});
	}
	else if($("#zona").val()=="")
	{
		$("<div>Por favor seleccione la zona de residencia del usuario</div>").dialog({
			modal:true,
			title:"Validacion de Registro",
			buttons:{
				"Aceptar":function()
				{
					$(this).dialog("close");
				}
			}
		});
	}
	else if($("#Tipo_Poblacion_Beneficiarios_subisidio").val()=="")
	{
		$("<div>Por favor seleccione el tipo de poblacion del usuario</div>").dialog({
			modal:true,
			title:"Validacion de Registro",
			buttons:{
				"Aceptar":function()
				{
					$(this).dialog("close");
				}
			}
		});
	}
	else if($("#EPSS").val()=="")
	{
		$("<div>Por favor seleccione la eps del usuario</div>").dialog({
			modal:true,
			title:"Validacion de Registro",
			buttons:{
				"Aceptar":function()
				{
					$(this).dialog("close");
				}
			}
		});
	}
	else if($("#estado").val()=="")
	{
		$("<div>Por favor seleccione el estado que aparece en FOSYGA del usuario</div>").dialog({
			modal:true,
			title:"Validacion de Registro",
			buttons:{
				"Aceptar":function()
				{
					$(this).dialog("close");
				}
			}
		});
	}
	else if($("#Nivel_Sisben").val()=="")
	{
		$("<div>Por favor seleccione el nivel del sisben del usuario</div>").dialog({
			modal:true,
			title:"Validacion de Registro",
			buttons:{
				"Aceptar":function()
				{
					$(this).dialog("close");
				}
			}
		});
	}
	else if($("#DPTO").val()=="")
	{
		$("<div>Por favor seleccione el departamento del usuario</div>").dialog({
			modal:true,
			title:"Validacion de Registro",
			buttons:{
				"Aceptar":function()
				{
					$(this).dialog("close");
				}
			}
		});
	}
	else if($("#MUNICIPIO").val()=="")
	{
		$("<div>Por favor seleccione el municipio del usuario</div>").dialog({
			modal:true,
			title:"Validacion de Registro",
			buttons:{
				"Aceptar":function()
				{
					$(this).dialog("close");
				}
			}
		});
	}
	else
	{
		$.ajax({
			url:"instancias/registrotraslado.php",
			type:"POST",
			data:{
				Tipo_Document_fosyga:$("#Tipo_Document_fosyga").val(),
				Numero_Identificacion_Afil_fosyga:$("#Numero_Identificacion_Afil_fosyga").val(),
				Apellido_1_fosyga:$("#Apellido_1_fosyga").val().toUpperCase(),
				Apellido_2_fosyga:$("#Apellido_2_fosyga").val().toUpperCase(),
				Nombre_1_fosyga:$("#Nombre_1_fosyga").val().toUpperCase(),
				Nombre_2_fosyga:$("#Nombre_2_fosyga").val().toUpperCase(),
				Fecha_Nacimiento_fosyga:$("#Fecha_Nacimiento_fosyga").val(),
				Genero_afil_fosyga:$("input[name='sexofosyga']:checked").val(),
				Tipo_Documento:$("#Tipo_Documento").val(),
				Numero_IdentificacionAfil:$("#Numero_IdentificacionAfil").val(),
				Apellido1:$("#Apellido1").val().toUpperCase(),
				Apellido2:$("#Apellido2").val().toUpperCase(),
				Nombre1:$("#Nombre1").val().toUpperCase(),
				Nombre2:$("#Nombre2").val().toUpperCase(),
				FechaNacimiento:$("#FechaNacimiento").val(),
				Genero_afiliado:$("input[name='sexocedula']:checked").val(),
				zona:$("#zona").val(),
				Tipopob:$("#Tipopob").val(),
				Nivel_Sisben:$("#Nivel_Sisben").val(),
				observacion:$("#observacion").val().toUpperCase(),
				estado:$("#estado").val().toUpperCase(),
				EPSS:$("#EPSS").val().toUpperCase(),
				MUNICIPIO:$("#MUNICIPIO").val().toUpperCase(),
				DPTO:$("#DPTO").val().toUpperCase(),
				Direccion:$("#Direccion").val().toUpperCase(),
				Telefono:$("#Telefono").val(),
				Ficha:$("#Ficha").val()
			},
			success:function(data)
			{
				$("<div>"+data+"</div>").dialog({
					modal:true,
					buttons:{
						"Aceptar":function()
						{
							$(this).dialog("close");
						},
						"Imprimir":function()
						{
							CarnetTraslado($("#Numero_IdentificacionAfil").val());
						}
					}
				});
			}
		});
	}
}
function CarnetTraslado(id)
{
	window.open("../superadmin/instancias/carnetizaciontraslado.php?id="+id,"_blank","toolbar=yes, scrollbars=yes, resizable=yes, top=500, left=500, width=700, height=700");
}
function RegistraMaestro()
{
	if($("#tipodoc").val()=="")
	{
		$("<div>Por favor ingrese el tipo de documento de identidad del nuevo afiliado</div>").dialog({
			modal:true,
			title:"Validacion Maestro",
			buttons:{
				"Aceptar":function()
				{
					$(this).dialog("close");
				}
			}
		});
	}
	else if($("#numeroafil").val()=="")
	{
		$("<div>Por favor ingrese el numero de documento de identidad del nuevo afiliado</div>").dialog({
			modal:true,
			title:"Validacion Maestro",
			buttons:{
				"Aceptar":function()
				{
					$(this).dialog("close");
				}
			}
		});
	}
	else if($("#apellido1").val()=="")
	{
		$("<div>Por favor ingrese el primer apellido del nuevo afiliado</div>").dialog({
			modal:true,
			title:"Validacion Maestro",
			buttons:{
				"Aceptar":function()
				{
					$(this).dialog("close");
				}
			}
		});
	}
	else if($("#nombre1").val()=="")
	{
		$("<div>Por favor ingrese el primer apellido nuevo afiliado</div>").dialog({
			modal:true,
			title:"Validacion Maestro",
			buttons:{
				"Aceptar":function()
				{
					$(this).dialog("close");
				}
			}
		});
	}
	else if($("#fechanac").val()=="")
	{
		$("<div>Por favor ingrese el tipo de documento de identidad del nuevo afiliado</div>").dialog({
			modal:true,
			title:"Validacion Maestro",
			buttons:{
				"Aceptar":function()
				{
					$(this).dialog("close");
				}
			}
		});
	}
	else if($("#Genero_afiliadoM").prop("checked")==false&&$("#Genero_afiliadoF").prop("checked")==false)
	{
		$("<div>Por favor seleccione el sexo del usuario</div>").dialog({
			modal:true,
			title:"Validacion Maestro",
			buttons:{
				"Aceptar":function()
				{
					$(this).dialog("close");
				}
			}
		});
	}
	else if($("#zona").val()=="")
	{
		$("<div>Por favor seleccione la zona del nuevo afiliado</div>").dialog({
			modal:true,
			title:"Validacion Maestro",
			buttons:{
				"Aceptar":function()
				{
					$(this).dialog("close");
				}
			}
		});
	}
	else if($("#tipopob").val()=="")
	{
		$("<div>Por favor seleccione el tipo de poblacion del nuevo afiliado</div>").dialog({
			modal:true,
			title:"Validacion Maestro",
			buttons:{
				"Aceptar":function()
				{
					$(this).dialog("close");
				}
			}
		});
	}
	else if($("#direccion").val()=="")
	{
		$("<div>Por favor ingrese la direccion de domicilio del nuevo afiliado</div>").dialog({
			modal:true,
			title:"Validacion Maestro",
			buttons:{
				"Aceptar":function()
				{
					$(this).dialog("close");
				}
			}
		});
	}
	else if($("#telefono").val()=="")
	{
		$("<div>Por favor ingrese el telefono del nuevo afiliado</div>").dialog({
			modal:true,
			title:"Validacion Maestro",
			buttons:{
				"Aceptar":function()
				{
					$(this).dialog("close");
				}
			}
		});
	}
	else
	{
		$.ajax({
			url:"instancias/registrarmaestro.php",
			type:"POST",
			data:{
				ccmadre:$("#CC_MADRE").val(),
				tipodocumento:$("#tipodoc").val(),
				numeroafiliado:$("#numeroafil").val(),
				apellido1:$("#apellido1").val(),
				apellido2:$("#apellido2").val(),
				nombre1:$("#nombre1").val(),
				nombre2:$("#nombre2").val(),
				fechanac:$("#fechanac").val(),
				genero:$("input[name='genero']:checked").val(),
				zona:$("#zona").val(),
				tipopob:$("#tipopob").val(),
				nivel:$("#nivel").val(),
				observacion:$("#observacion").val(),
				direccion:$("#direccion").val(),
				telefono:$("#telefono").val(),
				ficha:$("#ficha").val()
			},
			success:function(data)
			{
				$("<div>"+data+"</div>").dialog({
					modal:true,
					buttons:{
						"Aceptar":function()
						{
							$(this).dialog("close");
						}
					}
				});
				if(data=="Registro exitoso")
				{
					$("<div>¿Desea imprimir el carnet?</div>").dialog({
						modal:true,
						title:"Imprimir",
						buttons:{
							"Imprimir":function()
							{
								imprimirmaster($("#numeroafil").val());
							},
							"Cancelar":function()
							{
								$(this).dialog("close");
							}
						}
					});
				}
			}
		});
	}
}
function imprimirmaster(id)
{
	window.open("../superadmin/instancias/carnetizacionmaestro.php?id="+id,"_blank","toolbar=yes, scrollbars=yes, resizable=yes, top=500, left=500, width=700, height=700");
}
function RegistrarActiFos()
{
	if($("#tipodoc").val()=="")
	{
		$("<div>Por favor seleccione el tipo de documento</div>").dialog({
			modal:true,
			title:"Validacion",
			buttons:{
				"Aceptar":function()
				{
					$(this).dialog("close");
				}
			}
		});
	}
	else if($("#num_afi").val()=="")
	{
		$("<div>Por favor ingrese el numero de documento de identidad</div>").dialog({
			modal:true,
			title:"Validacion",
			buttons:{
				"Aceptar":function()
				{
					$(this).dialog("close");
				}
			}
		});
	}
	else if(isNaN($("#num_afi").val()))
	{
		$("<div>Por favor ingrese un formato valido de numero de documento de identidad</div>").dialog({
			modal:true,
			title:"Validacion",
			buttons:{
				"Aceptar":function()
				{
					$(this).dialog("close");
				}
			}
		});
	}
	else if($("#apellido1").val()=="")
	{
		$("<div>Por favor ingrese el primer apellido</div>").dialog({
			modal:true,
			title:"Validacion",
			buttons:{
				"Aceptar":function()
				{
					$(this).dialog("close");
				}
			}
		});
	}
	else if($("#nombre1").val()=="")
	{
		$("<div>Por favor ingrese el primer nombre</div>").dialog({
			modal:true,
			title:"Validacion",
			buttons:{
				"Aceptar":function()
				{
					$(this).dialog("close");
				}
			}
		});
	}
	else if($("#fechanac").val()=="")
	{
		$("<div>Por favor ingrese la fecha de nacimiento</div>").dialog({
			modal:true,
			title:"Validacion",
			buttons:{
				"Aceptar":function()
				{
					$(this).dialog("close");
				}
			}
		});
	}
	else if($("#fecha_entidad").val()=="")
	{
		$("<div>Por favor ingrese la fecha de afiliacion a esta entidad</div>").dialog({
			modal:true,
			title:"Validacion",
			buttons:{
				"Aceptar":function()
				{
					$(this).dialog("close");
				}
			}
		});
	}
	else if($("#direccion").val()=="")
	{
		$("<div>Por favor ingrese la direccion de domicilio</div>").dialog({
			modal:true,
			title:"Validacion",
			buttons:{
				"Aceptar":function()
				{
					$(this).dialog("close");
				}
			}
		});
	}
	else if($("#Genero_afil_fosygaM").prop("checked")==false&&$("#Genero_afil_fosygaF").prop("checked")==false)
	{
		$("<div>Por favor seleccione el sexo del usuario que aparece en FOSYGA</div>").dialog({
			modal:true,
			title:"Validacion de Registro",
			buttons:{
				"Aceptar":function()
				{
					$(this).dialog("close");
				}
			}
		});
	}
	else if($("#zona").val()=="")
	{
		$("<div>Por favor seleccione la zona de residencia</div>").dialog({
			modal:true,
			title:"Validacion",
			buttons:{
				"Aceptar":function()
				{
					$(this).dialog("close");
				}
			}
		});
	}
	else if($("#nivelsisben").val()=="")
	{
		$("<div>Por favor seleccione el nivel del sisben del usuario</div>").dialog({
			modal:true,
			title:"Validacion de Registro",
			buttons:{
				"Aceptar":function()
				{
					$(this).dialog("close");
				}
			}
		});
	}
	else
	{
		$("<div class='process'><img src='../imagenes/cargando.gif'></div>").dialog({
			modal:true,
		});
		$.ajax({
			url:"instancias/registrofosyga.php",
			type:"POST",
			data:{
				tipodoc:$("#tipodoc").val(),
				numafi:$("#num_afi").val(),
				apellido1:$("#apellido1").val(),
				apellido2:$("#apellido2").val(),
				nombre1:$("#nombre1").val(),
				nombre2:$("#nombre2").val(),
				fechanac:$("#fechanac").val(),
				fecha_afiliacion:$("#fecha_entidad").val(),
				ficha:$("#ficha").val(),
				direccion:$("#direccion").val(),
				zona:$("#zona").val(),
				telefono:$("#telefono").val(),
				sexo:$("input[name='genero']:checked").val(),
				nivelsisben:$("#nivelsisben").val(),
			},
			success:function(data)
			{
				$(".process").dialog("close");
				$("<div>"+data+"</div>").dialog({
					modal:true,
					title:"Registro de Activos FOSYGA",
					buttons:{
						"Aceptar":function()
						{
							if(data=="Registro de Activo exitoso")
							{
								$("<div>¿Desea imprimir el carnet?</div>").dialog({
									modal:true,
									title:"Imprimir",
									buttons:{
										"Aceptar":function()
										{
											CarnetizacionActivo($("#num_afi").val());
										},
										"Cancelar":function()
										{
											$(this).dialog("close");
										}
									}
								});
							}
							$(this).dialog("close");
						}
					}
				});
			}
		});
	}
}
function CarnetizacionActivo(id)
{
	window.open("../superadmin/instancias/carnetizacionactivo.php?id="+id,"_blank","toolbar=yes, scrollbars=yes, resizable=yes, top=500, left=500, width=700, height=700");
}