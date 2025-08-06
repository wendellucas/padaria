function inicio(){
	$("#usuario").hide();
	$("#produtos").hide();
	
}






function verificaruser(){
	var e=$("#email").val();
	var s=$("#senha").val();
	
	$.ajax({
		url:"verificauser.php",
		dataType:"jSON",
		data:{email:e,senha:s},
		method:"POST",
		error:function(){
			$("#mensagem").html("Deu Pal Tente de novo");
		},
		success:function(r){
			console.log(r);
			
			if (r.resposta[0]=="1"){
			
			$("#logon").hide();
			$("#usuario").show();
				
				
				//exibir informçaões do usário
				
				var saida="";
				saida+="<p>Id: " + r.id_user;
				saida+="</p><p><br>Nome: " + r.nome;
				saida+="</p></br><p>Email: " + r.email;
				//saida+="<p><br>Adm: " + r.adm;
				saida+="</p></br>";
				
				
				if(r.adm=="1"){
					saida+="<p>Você é um ADM</p>";
				}else{
					saida+="<p>Você não é um adm</p>";
				}
				
				var foto="";
				
				foto="<img src=img/" + r.perfil + ">";
				
				
				$("#info").html(saida);
				$("#foto").html(foto);
				
				//chama função que exibe produtos
				exibeProdutos();
				
				
			}
			
			else if (r.resposta[0]=="0"){
			$("#mensagem").html("Usuario e/ou senha inválidos!!");
			}
		}
		
	});
	
	
}

function exibeProdutos(){
	
	$("#produtos").show();
	
	$.ajax({
		
		url:"exibeProdutos.php",
		dataType:"jSON",
		method:"POST",
		error:function(){
			alert("Houve erro de conexão com o banco de dados !!!!");
		},
		success:function(r){
			console.log(r);
			var dados="";
			var total=r.length;
			var i;
			
			for (i=0;i<total;i++){
				
				dados+="id:" + r[i].id + "<br>";
				dados+="Produto:" + r[i].produto + "<br>";
				dados+="Quantidade:" + r[i].quantidade + "<br>";
				dados+="preço:" + r[i].preco + "<br>";
				dados+="departamento:" + r[i].departamento + "<br>";
				dados+="Descrição:" + r[i].descricao + "<br><hr>";
				
				$("#produtos").append(dados);
			}
		}
		
	});
	
}








































