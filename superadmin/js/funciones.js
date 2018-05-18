$(document).ready(function(){
	document.oncontextmenu = function(){
		return false;
	}
	$("#menu").menu();
	$("#modfechanac").datepicker({
		yearRange:"1900:",
		showAnim: "fold",
		dateFormat:"yy/mm/dd",
		monthNames:["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
		dayNamesShort: [ "Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab" ],
		changeYear:true
	});

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
			$(".opacity").hide();
			$(".progressbar").progressbar("destroy");
			$("#content").html(xmlhttp.responseText);
			$("button").button();
			$("#modfechanac").datepicker({
				yearRange:"1900:",
				showAnim: "explode",
				dateFormat:"dd/mm/yy",
				monthNames:["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
				monthNamesShort:["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
				dayNamesMin: [ "Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab" ],
				changeYear:true,
				changeMonth:true
			});
		}
		else
		{
			$(".opacity").show();
			$(".progressbar").progressbar({
				value:xmlhttp.readyState*25,
			});
		}
	}
	xmlhttp.open("GET",str+".php", true);
	xmlhttp.send();
}
function buscaremp(cod)
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
			$("#contentuser").html(xmlhttp.responseText);
		}
	}
	xmlhttp.open("GET","instancias/usuarioespecifico.php?param="+cod, true);
	xmlhttp.send();
}
function Contrasena(opc)
{
	if(opc=="manual")
	{
		x="<label>Ingrese la contraseña</label><input type='password' id='pass'/>";
	}
	else if(opc=="generar")
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
				x="Contraseña: "+xmlhttp.responseText+"\n<input type='hidden' id='pass' value='"+xmlhttp.responseText+"'/>";
			}
			else
			{
				x="Procesando Peticion...";
			}
			document.getElementById('mostrcontr').innerHTML=x;
		}
		xmlhttp.open("GET","instancias/genpass.php",true);
		xmlhttp.send();
	}
	document.getElementById('mostrcontr').innerHTML=x;
}
function RegEmp()
{
	if(isNaN($("#iduser").val())||$("#iduser").val()=="")
	{
		$("<div>El documento de identidad de usuario no es valido</div>").dialog({
			modal:true,
			title:'Validacion de Registro',
			buttons:{
				"Aceptar":function()
				{
					$(this).dialog("close");
				}
			}
		})
	}
	else if($("#nombre1").val()=="")
	{
		$("<div>Debe ingresar el primer nombre</div>").dialog({
			modal:true,
			title:'Validacion de Registro',
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
		$("<div>Debe ingresar el primer apellido</div>").dialog({
			modal:true,
			title:'Validacion de Registro',
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
		$("<div>Debe ingresar la fecha de nacimiento</div>").dialog({
			modal:true,
			title:'Validacion de Registro',
			buttons:{
				"Aceptar":function()
				{
					$(this).dialog("close");
				}
			}
		});
	}
	else if($("#departamento").val()=="")
	{
		$("<div>Debe ingresar el departamento de nacimiento</div>").dialog({
			modal:true,
			title:'Validacion de Registro',
			buttons:{
				"Aceptar":function()
				{
					$(this).dialog("close");
				}
			}
		});
	}
	else if($("#ciudad").val()=="")
	{
		$("<div>Debe ingresar la ciudad de nacimiento</div>").dialog({
			modal:true,
			title:'Validacion de Registro',
			buttons:{
				"Aceptar":function()
				{
					$(this).dialog("close");
				}
			}
		});
	}
	else if($("#codmun").val()=="")
	{
		$("<div>Debe ingresar el municipio asignado "+$("#codmun").val()+"</div>").dialog({
			modal:true,
			title:'Validacion de Registro',
			buttons:{
				"Aceptar":function()
				{
					$(this).dialog("close");
				}
			}
		});
	}
	else if($("#nameuser").val()=="")
	{
		$("<div>Debe ingresa el nombre de usuario</div>").dialog({
			modal:true,
			title:'Validacion de Registro',
			buttons:{
				"Aceptar":function()
				{
					$(this).dialog("close");
				}
			}
		});
	}
	else if($("#pass").val()=="")
	{
		$("<div>Debe ingresar una contraseña</div>").dialog({
			modal:true,
			title:'Validacion de Registro',
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
				$(".opacity").hide();
				$(".progressbar").progressbar("destroy");
				$("<div>"+xmlhttp.responseText+"</div>").dialog({
					modal:true,
					title:"Registro",
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
				$(".opacity").show();
				$(".progressbar").progressbar({
					value:xmlhttp.readyState*25,
				});
			}
		}
		xmlhttp.open("POST","instancias/registroempleados.php", true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("iduser="+$("#iduser").val()+"&nombre1="+$("#nombre1").val()+"&nombre2="+$("#nombre2").val()+"&apellido1="+$("#apellido1").val()+"&apellido2="+$("#apellido2").val()+"&fechanac="+$("#fechanac").val()+"&departamento="+$("#departamento").val()+"&ciudad="+$("#ciudad").val()+"&codmun="+$("#codmun").val()+"&nameuser="+$("#nameuser").val()+"&pass="+$("#pass").val());
	}
}
function municipiosval(codmun)
{
	if(window.XMLHttpRequest)
	{
		xmlhttp=new XMLHttpRequest();
	}
	else
	{
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.open("GET","instancias/muni.php",false);
	xmlhttp.send();
	xmlDoc=xmlhttp.responseXML;
	var x=xmlDoc.getElementsByTagName("municipio");
	var y="";
	for(i=0;i<x.length;i++)
	{
		if(codmun==x[i].getElementsByTagName("codigo")[0].childNodes[0].nodeValue)
		{
			y=y+"<option selected value='"+x[i].getElementsByTagName("codigo")[0].childNodes[0].nodeValue+"'>"+x[i].getElementsByTagName("nombre")[0].childNodes[0].nodeValue+"</option>";
		}
		else
		{
			y=y+"<option value='"+x[i].getElementsByTagName("codigo")[0].childNodes[0].nodeValue+"'>"+x[i].getElementsByTagName("nombre")[0].childNodes[0].nodeValue+"</option>";
		}
	}
	return y;
}
function Modificaremp(cod)
{
	$.ajax({
		url:"instancias/getdatauserselected.php",
		contentType:"application/x-www-form-urlencoded",
		data:{
			"id":cod
		},
		dataType:"json",
		error:function(e)
		{
			alert('Ha ocurrido un error ahora'+e);
		},
		ifModified:false,
		processData:true,
		success:function(data)
		{
			var x="";
			departamento=["Amazonas","Antioquia","Arauca","Atlántico","Bolívar","Boyacá","Caldas","Caquetá","Casanare","Cauca","Cesar","Chocó","Córdoba","Cundinamarca","Guainía","Guaviare","Huila","La Guajira","Magdalena","Meta","Nariño","Norte de Santander","Putumayo","Quindío","Risaralda","San Andrés y Providencia","Santander","Sucre","Tolima","Valle del Cauca","Vaupés","Vichada"];
			for(i=0;i<departamento.length;i++)
			{
				if(departamento[i]==data['campodpto'])
				{
					x=x+"<option selected value='"+data['campodpto']+"'>"+data['campodpto']+"</option>";
				}
				else
				{
					x=x+"<option value='"+departamento[i]+"'>"+departamento[i]+"</option>";
				}
			}
			muni=municipiosval(data['campocodmun']);
			$("<div class='forms'><label>Primer Nombre</label><input type='text' id='modnom1' value='"+data['camponom1']+"'/><label>Segundo Nombre</label><input type='text' id='modnom2' value='"+data['camponom2']+"'/><label>Primer Apellido</label><input type='text' id='modape1' value='"+data['campoape1']+"'/><label>Segundo Apellido</label><input type='text' id='modape2' value='"+data['campoape2']+"'/><label>Fecha de Nacimiento</label><input type='date' id='modfechanac' value='"+data['campofechanac']+"'/><label>Departamento de Nacimiento</label><select id='moddepartamento' onchange='alert(hola)'>"+x+"</select><label>Ciudad de nacimiento</label><input type='text' id='modciudad' value='"+data['campociudad']+"'/><label>Municipio encargado</label><select id='modcodmun'>"+muni+"</select><label>Contraseña</label><input type='password' id='modpass' placeholder='Contraseña'/>").dialog({
				modal:true,
				show:{
					effect:"clip",
					duration:800
				},
				hide:{
					effect:"slide",
					duration:1000
				},
				width:'30%',
				title:'Modificacion',
				buttons:{
					"Aceptar":function()
					{
						$("<div><span class='ui-icon ui-icon-alert' style='float:left; margin:0 7px 20px 0;'></span>¿Esta seguro de realizar estas modificaciones</div>").dialog({
							modal:true,
							show:{
								effect:"clip",
								duration:800
							},
							hide:{
								effect:"slide",
								duration:1000
							},
							title:'Advertencia',
							buttons:{
								"Aceptar":function()
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
											$(".process").dialog("close");
											$("<div>"+xmlhttp.responseText+"</div>").dialog({
												modal:true,
												title:'Modificacion',
												buttons:{
													"Aceptar":function()
													{
														Page('buscarempleado');
														$(this).dialog("close");
													}
												}
											});
											if(xmlhttp.responseText=="Modificacion exitosa")
											{
												$(".forms").dialog("close");
												Page("buscarempleado");
												setTimeout(window.location.reload(),3500);
											}
										}
										else
										{
											$("<div class='process'><img src='../imagenes/cargando.gif'></div>").dialog({
												modal:true,
											});
										}
									}
									xmlhttp.open("POST","instancias/modusers.php",true);
									xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
									xmlhttp.send("iduser="+cod+"&nombre1="+$("#modnom1").val()+"&nombre2="+$("#modnom2").val()+"&apellido1="+$("#modape1").val()+"&apellido2="+$("#modape2").val()+"&fechanac="+$("#modfechanac").val()+"&dpto="+$("#moddepartamento").val()+"&ciudad="+$("#modciudad").val()+"&codmun="+$("#modcodmun").val()+"&pass="+$("#modpass").val());
									$(this).dialog("close");
									return false;
								},
								"Cancelar":function()
								{
									$(this).dialog("close");
									return false;
								}
							}
						});
					},
					"Cancelar":function()
					{
						$(this).dialog("close");
						return false;
					}
				}
			});
		},
		type:"POST",
		timeout:3000
	});
}
function Eliminaremp(cod)
{
	$("<div class='confirm'><span class='ui-icon ui-icon-alert' style='float:left; margin:0 7px 20px 0;'></span>¿Desea eliminar el usuario "+$("#nombre1"+cod).html()+" "+$("#nombre2"+cod).html()+" "+$("#apellido1"+cod).html()+" "+$("#apellido2"+cod).html()+"?</div>").dialog({
		modal:true,
		show:{
			effect:"clip",
			duration:800
		},
		hide:{
			effect:"slide",
			duration:1000
		},
		title:'Confirmacion de Eliminacion',
		buttons:{
			"Aceptar":function()
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
						$(".process").dialog("close");
						$("<div><span class='ui-icon ui-icon-circle-check' style='float:left; margin:0 7px 50px 0;'></span>"+xmlhttp.responseText+"</div>").dialog({
							modal:true,
							title:'Eliminacion',
							buttons:{
								"Aceptar":function()
								{
									$(".confirm").dialog("close");
									Page('buscarempleado');
									$(this).dialog("close");
								}
							}
						})
					}
					else
					{
						$("<div class='process'><img src='../imagenes/cargando.gif'></div>").dialog({
							modal:true,
						});
					}
				}
				xmlhttp.open("GET", "instancias/deleteuser.php?id="+cod, true);
				xmlhttp.send();
			},
			"Cancelar":function()
			{
				$(this).dialog("close");
			}
		}
	});
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
	else if($("#zona").val()=="")
	{
		$("<div>Por favor escoga la zona de residencia del usuario</div>").dialog({
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
	else if($("#"))
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
			y="observacion="+$("#observacion").val()+"&tipodoc="+$("#tipodocumento").val()+"&iddoc="+$("#idafiliado").val()+"&apellido1="+$("#apellido1").val()+"&apellido2="+$("#apellido2").val()+"&nombre1="+$("#nombre1").val()+"&nombre2="+$("#nombre2").val()+"&fechanac="+$("#fechanac").val()+"&dptoafi="+$("#dptoafi").val()+"&ciudadafi="+$("#ciudadafi").val()+"&codnov="+type+"&valor1="+$("#valor1").val()+"&valor2="+$("#valor2").val()+"&valor3="+$("#valor3").val()+"&valor4="+$("#valor4").val()+"&direccion="+$("#direcciondomi").val()+"&telefono="+$("#telefono").val()+"&ficha="+$("#ficha").val()+"&nivel="+$("#nivel").val()+"&tipopob="+$("#tipopob").val()+"&zona="+$("#zona").val()+"&genero="+$("input[name='genero']:checked").val();
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
			y="observacion="+$("#observacion").val()+"&tipodoc="+$("#tipodocumento").val()+"&iddoc="+$("#idafiliado").val()+"&apellido1="+$("#apellido1").val()+"&apellido2="+$("#apellido2").val()+"&nombre1="+$("#nombre1").val()+"&nombre2="+$("#nombre2").val()+"&fechanac="+$("#fechanac").val()+"&dptoafi="+$("#dptoafi").val()+"&ciudadafi="+$("#ciudadafi").val()+"&codnov="+type+"&valor1="+$("#valor1").val()+"&valor2="+$("#valor2").val()+"&direccion="+$("#direcciondomi").val()+"&telefono="+$("#telefono").val()+"&ficha="+$("#ficha").val()+"&nivel="+$("#nivel").val()+"&tipopob="+$("#tipopob").val()+"&zona="+$("#zona").val()+"&genero="+$("input[name='genero']:checked").val();
		}
	}
	else if(type=="N09")
	{
		y="observacion="+$("#observacion").val()+"&tipodoc="+$("#tipodocumento").val()+"&iddoc="+$("#idafiliado").val()+"&apellido1="+$("#apellido1").val()+"&apellido2="+$("#apellido2").val()+"&nombre1="+$("#nombre1").val()+"&nombre2="+$("#nombre2").val()+"&fechanac="+$("#fechanac").val()+"&dptoafi="+$("#dptoafi").val()+"&ciudadafi="+$("#ciudadafi").val()+"&codnov="+type;
	}
	else if(type=="N14"||type=="N20")
	{
		if(type=="N14")
		{
			y="observacion="+$("#observacion").val()+"&tipodoc="+$("#tipodocumento").val()+"&iddoc="+$("#idafiliado").val()+"&apellido1="+$("#apellido1").val()+"&apellido2="+$("#apellido2").val()+"&nombre1="+$("#nombre1").val()+"&nombre2="+$("#nombre2").val()+"&fechanac="+$("#fechanac").val()+"&dptoafi="+$("#dptoafi").val()+"&ciudadafi="+$("#ciudadafi").val()+"&codnov="+type+"&valor1="+$("#valor1").val()+"&direccion="+$("#direcciondomi").val()+"&telefono="+$("#telefono").val()+"&ficha="+$("#ficha").val()+"&nivel="+$("#nivel").val()+"&tipopob="+$("#tipopob").val()+"&zona="+$("#zona").val()+"&genero="+$("input[name='genero']:checked").val();;
		}
		else if(type=="N20")
		{
			y="observacion="+$("#observacion").val()+"&tipodoc="+$("#tipodocumento").val()+"&iddoc="+$("#idafiliado").val()+"&apellido1="+$("#apellido1").val()+"&apellido2="+$("#apellido2").val()+"&nombre1="+$("#nombre1").val()+"&nombre2="+$("#nombre2").val()+"&fechanac="+$("#fechanac").val()+"&dptoafi="+$("#dptoafi").val()+"&ciudadafi="+$("#ciudadafi").val()+"&codnov="+type+"&valor1="+$("#nivel").val()+"&direccion="+$("#direcciondomi").val()+"&telefono="+$("#telefono").val()+"&ficha="+$("#ficha").val()+"&nivel="+$("#nivel").val()+"&tipopob="+$("#tipopob").val()+"&zona="+$("#zona").val()+"&genero="+$("input[name='genero']:checked").val();
		}
	}
	else if(type=="N17")
	{
		y="observacion="+$("#observacion").val()+"&tipodoc="+$("#tipodocumento").val()+"&iddoc="+$("#idafiliado").val()+"&apellido1="+$("#apellido1").val()+"&apellido2="+$("#apellido2").val()+"&nombre1="+$("#nombre1").val()+"&nombre2="+$("#nombre2").val()+"&fechanac="+$("#fechanac").val()+"&dptoafi="+$("#dptoafi").val()+"&ciudadafi="+$("#ciudadafi").val()+"&codnov="+type+"&valor1="+$("input[name='genero']:checked").val()+"&direccion="+$("#direcciondomi").val()+"&telefono="+$("#telefono").val()+"&ficha="+$("#ficha").val()+"&nivel="+$("#nivel").val()+"&tipopob="+$("#tipopob").val()+"&zona="+$("#zona").val()+"&genero="+$("input[name='genero']:checked").val();
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
			y="observacion="+$("#observacion").val()+"&tipodoc="+$("#tipodocumento").val()+"&iddoc="+$("#idafiliado").val()+"&apellido1="+$("#apellido1").val()+"&apellido2="+$("#apellido2").val()+"&nombre1="+$("#nombre1").val()+"&nombre2="+$("#nombre2").val()+"&fechanac="+$("#fechanac").val()+"&dptoafi="+$("#dptoafi").val()+"&ciudadafi="+$("#ciudadafi").val()+"&codnov="+type+"&valor1="+$("#tipopob").val()+"&direccion="+$("#direcciondomi").val()+"&telefono="+$("#telefono").val()+"&ficha="+$("#ficha").val()+"&nivel="+$("#nivel").val()+"&tipopob="+$("#tipopob").val()+"&zona="+$("#zona").val()+"&genero="+$("input[name='genero']:checked").val();
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
			$("<div>"+xmlhttp.responseText+"</div>").dialog({
				modal:true,
				title:'Registro Novedad',
				buttons:{
					"Aceptar":function()
					{
						$(this).dialog("close");
						if(xmlhttp.responseText=="Registro de novedad exitoso")
						{
							$("<div>¿Desea imprimir el carnet?</div>").dialog({
								modal:true,
								title:"Imprimir",
								buttons:{
									"Imprimir":function()
									{
										icons:{
											primary:"ui-icon-print"
										}
										if(type=="N01")
										{
											Carnetnov($("#valor2").val(),type);
										}
										else
										{
											Carnetnov($("#idafiliado").val(),type);
										}
									},
									"Cancelar":function()
									{
										$(this).dialog("close");
									}
								}
							});
						}
					}
				}
			});
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
	else if($("#Codigo_Mpio_afi").val()=="")
	{
		$("<div>Por favor seleccione el municipio de traslado del usuario</div>").dialog({
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
				Codigo_Mpio_afi:$("#Codigo_Mpio_afi").val(),
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
	window.open("instancias/carnetizaciontraslado.php?id="+id,"_blank","toolbar=yes, scrollbars=yes, resizable=yes, top=500, left=500, width=700, height=700");
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
	else if($("#Codigo_Mpio_afi").val()=="")
	{
		$("<div>Por favor seleccione el municipio del nuevo afiliado</div>").dialog({
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
				mpioafi:$("#Codigo_Mpio_afi").val(),
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
	window.open("instancias/carnetizacionmaestro.php?id="+id,"_blank","toolbar=yes, scrollbars=yes, resizable=yes, top=500, left=500, width=700, height=700");
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
	else if($("#mpio").val()=="")
	{
		$("<div>Por favor seleccione el municipio</div>").dialog({
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
				municipio:$("#mpio").val(),
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
	window.open("instancias/carnetizacionactivo.php?id="+id,"_blank","toolbar=yes, scrollbars=yes, resizable=yes, top=500, left=500, width=700, height=700");
}
function GenerateNov()
{
	window.location.assign("instancias/generonov.php?beging="+$("#fechacom").val()+"&finish="+$("#fechafin").val());
}
function GenerateTras()
{
	window.location.assign("instancias/generotras.php?beging="+$("#fechacom").val()+"&finish="+$("#fechafin").val());
}
function GenerateMaster()
{
	window.location.assign("instancias/generomaster.php?beging="+$("#fechacom").val()+"&finish="+$("#fechafin").val());
}