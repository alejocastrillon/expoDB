$(document).ready(function(){
	document.oncontextmenu = function(){
		return false;
	}
	$("<fieldset id='login'><p><label>Ingrese su nombre de usuario:</label><input type='text' id='nameuser' placeholder='Nombre de Usuario'/></p><p><label>Seleccione su rol:<select id='rol'><option value=''>Seleccione....</option><option value='usuario'>Usuario</option><option value='superadmin'>Super Admin</option></select></p><p><label>Ingrese su contraseña:</label><input type='password' id='pass'/></p></fieldset>").dialog({
		modal:false,
		close:function(event, ui)
		{
			$("#login").dialog({
				modal:false
			});
		},
		title:'Login',
		marginTop:'20%',
		buttons:
		{
			"Iniciar Sesion":function()
			{
				if(($("#nameuser").val()=="")||($("#pass").val()=="")||($("#rol").val()==""))
				{
					$("<div>Por favor llene todos los campos</div>").dialog({
						modal:true,
						title:'Validacion',
						buttons:
						{
							"Aceptar":function()
							{
								$(this).dialog("close");
							}
						}
					})
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
							$(".process").dialog("close");
							if(xmlhttp.responseText==1)
							{
								setInterval(window.location.assign("superadmin/"),2000);
							}
							else if(xmlhttp.responseText==2)
							{
								setInterval(window.location.assign("usuario/"),2000);
							}
							else if(xmlhttp.responseText==0)
							{
								$("<div>Nombre de usuario o contraseña incorrectos</div>").dialog({
									modal:true,
									title:'Advertencia',
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
							$("<div class='process'><img src='imagenes/cargando.gif'></div>").dialog({
								modal:true,
							});
						}
					}
					xmlhttp.open("POST","instancias/login.php",true);
					xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
					xmlhttp.send("nameuser="+$("#nameuser").val()+"&pass="+$("#pass").val()+"&rol="+$("#rol").val());
				}
			}
		}
	});
});