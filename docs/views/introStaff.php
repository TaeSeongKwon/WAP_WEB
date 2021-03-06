<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<title>W.A.P | Why Are you Programming?</title>
		<link rel='stylesheet' href='/css/bootstrap.css' />
		<link rel="stylesheet" href="/css/Treant.css">
		<script src="/js/raphael.js"></script>
    		<script src="/js/Treant.min.js"></script>
    
		<script type='text/javascript' src='/js/jquery-2.1.4.min.js'></script>
		<script type='text/javascript' src='/js/bootstrap.min.js'></script>
		<style type='text/css'>
			html, body{
				height:100%;
				width : 100%;
			}
			footer{
				margin-top: 10%;
				height: 200px;
				background-color: skyblue;
			}
			body{
				padding-top:50px !important;
				background-color: #eeeeee;
			}
			@media (min-width : 755px){
				#keyword{
					width:30%;
				}
			}
			.aboutTitle img{
				max-height:300px;
				width:100%;
			}
			.mainMenu{
				padding : 8px 8px;
			}
			/*body div{
				height:100%;
			}*/
			
			.aboutTitle{
				margin : 0px !important;
				/*height : 40%;*/
			/*	margin-bottom: 3%;*/
			}
			.dropdown-toggle{
				padding: 10px 15px !important;
			}

			.test{
				border : solid 1px silver;
			}
			.aboutTitle .col-xs-12, .simpleBoard .col-md-6{
				padding: 0px !important;
			}
			.mainBody{
				min-height:100%;
				/*height:100%;*/
				padding-bottom:10% !important;
				box-shadow: 1px 1px 5px silver;
				background: #ffffff;
			}
			.boardFrame{
				width : 100%;
				border : 1px solid silver;
			}
			.boardHead{
				background-color: burlywood;
				color: white;
				font-weight: bold;
				font-size: medium;
				height:30px;
			}
			.boardItem{
				height:25px;
			}
			#staffTree{
				/*height:inherit;*/
				float : none;
				margin:0px auto;
			}
			.listSec{
				min-height:inherit;
			}

			div,dl,dt,dd,ul,ol,li,h1,h2,h4,h5,h6,pre,form,fieldset,input,textarea,p,blockquote,th,td { margin:0; padding:0; }
			table { border-collapse:collapse; border-spacing:0; }
			fieldset,img { border:0; }
			address,caption,cite,code,dfn,em,strong,th,var { font-style:normal; font-weight:normal; }
			caption,th { text-align:left; }
			h1,h2,h3,h4,h5,h6 { font-size:100%; font-weight:normal; }
			q:before,q:after { content:''; }
			abbr,acronym { border:0; }

			body { background: #fff; }
			/* optional Container STYLES */
			.chart { height: 600px; margin: 5px; width: 900px; }
			.Treant > .node {  }
			.Treant > p { font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif; font-weight: bold; font-size: 12px; }
			.node-name { font-weight: bold;}

			.nodeExample1 {
			    padding: 2px;
			    -webkit-border-radius: 3px;
			    -moz-border-radius: 3px;
			    border-radius: 3px;
			    background-color: #ffffff;
			    border: 1px solid #000;
			    width: 200px;
			    font-family: Tahoma;
			    font-size: 12px;
			}

			.nodeExample1 img {
			    margin-right:  10px;
			}
		</style>
	</head>
	<body>
		<header class='navbar navbar-default navbar-fixed-top'>
			<section class='container'>
				<section class='navbar-header'>
					<button type='button' class='navbar-toggle collapsed' data-target='#contants' data-toggle='collapse'>
						<span class='sr-only'></span>
						<span class='icon-bar'></span>
						<span class='icon-bar'></span>
						<span class='icon-bar'></span>
					</button>
					<a class='navbar-brand' href='/'>W.A.P</a>
				</section>
				<section class='collapse navbar-collapse' id='contants'>
				<?php if($info['name'] == '') :?>
					<form class='navbar-form navbar-right' action='/member/login' method='post' name='userLoginForm'>
						<a href='/member/numberCheck'>Sign up</a>
						 <!-- <a href='/member/forget'>Forgot ID</a> -->
						<div class='form-group'>
							<input type='text' class='form-control' name ='userId' placeholder='ID' />
							<input type='password' class='form-control' name='userPwd' placeholder='PASSWORD' />
							<button type='submit' class='btn btn-primary'>Login</button> 
						</div>
						
					</form>
				<?php else :?>
					
					<ul class='nav navbar-nav navbar-right'>
						<li class='dropdown'>
							<a  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
							<img class='img-circle' src='/img/1.jpg' width='30px' height='30px'> <?=$info['name']?><span class='caret'></a>
							<ul class='dropdown-menu' role='menu'>
								<li><a href='/profile'>Profile</a></li>
								<li><a href='/project'>MyProject</a></li>
								<li><a href='/member/logout'>Logout</a></li>
							<?php if($info['levelIdx'] == '1') : ?>
								<li role='presentation' class='divider'></li>
								<li><a href='/manage/member'>Member Manage</a></li>
							<!-- 	<li><a href='/manage/board'>Board Manage</a></li> -->
							<?php endif; ?>
							</ul>
						</li>
						<li class='dropdown'>
							<a  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
							<span class='glyphicon glyphicon-menu-hamburger mainMenu' aria-hidden='true'></span></a>
							<ul class='dropdown-menu' role='menu'>
								<li class='active visible-xs'><a href='#'>Common</a></li>
								<li ><a href="#">Information</a></li>
								<li ><a href="#">Q&A</a></li>
								<li ><a href="#">Gallery</a></li>
								<li ><a href="#">Library</a></li>
							</ul>
						</li>
						
					</ul>
				<?php endif;?>
					<ul class='nav navbar-nav '>
					<?php if($info == '') : ?>
						<li><a class='' href="#">About</a></li>
						<li><a href="#">Staff</a></li>
					<?php else : ?>
						<li class='visible-xs'><a class='' href="#">About</a></li>
						<li class='visible-xs'><a href="#">Staff</a></li>
					<?php endif;?>
						
						
					</ul>
				<?php if($info != '') :?>
					<form class='navbar-form' action='/search' >
						
							<input type='text' class='form-control' id='keyword' name = 'keyword' placeholder='Input KeyWord for Search' />
						
						<button type='submit' class='btn btn-primary'>Search</button>
					</form>	
				<?php endif; ?>
				</section>
			</section>
		</header>
		
		<section class='container mainBody'>
			<article class='row'> 
				<div class='col-xs-12'>
					<h3>W.A.P Staff</h3>
				</div>
			</article>
			<hr>
			<article class='row listSec' >
				<div class='col-sm-10' id='staffTree'></div>
			</article>
		</section>
		<footer ></footer>
		<script>
			var config = {
		        container: "#staffTree",
		        nodeAlign: "BOTTOM",
		        // rootOrientation :"SOUTH",
		        padding:00,
		        connectors: {
		            type: 'step'
		        },
		        node: {
		            HTMLclass: 'nodeExample1'
		        }
		    },
		    ceo = {
		        text: {
		            name: "Mark Hill",
		            title: "Chief executive officer",
		            contact: "Tel: 01 213 123 134",
		        },
		        //image: "../headshots/2.jpg"
		    },

		    cto = {
		        parent: ceo,
		        text:{
		            name: "Joe Linux",
		            title: "Chief Technology Officer",
		        },
		        stackChildren: true,
		       //image: "../headshots/1.jpg"
		    },
		    cbo = {
		        parent: ceo,
		        stackChildren: true,
		        text:{
		            name: "Linda May",
		            title: "Chief Business Officer",
		        },
		        //image: "../headshots/5.jpg"
		    },
		    cdo = {
		        parent: ceo,
		        text:{
		            name: "John Green",
		            title: "Chief accounting officer",
		            contact: "Tel: 01 213 123 134",
		        },
		        //image: "../headshots/6.jpg"
		    },
		    cio = {
		        parent: cto,
		        text:{
		            name: "Ron Blomquist",
		            title: "Chief Information Security Officer"
		        },
		       // image: "../headshots/8.jpg"
		    },
		    ciso = {
		        parent: cto,
		        text:{
		            name: "Michael Rubin",
		            title: "Chief Innovation Officer",
		            contact: {val: "we@aregreat.com", href: "mailto:we@aregreat.com"}
		        },
		       //	image: "../headshots/9.jpg"
		    },
		    cio2 = {
		        parent: cdo,
		        text:{
		            name: "Erica Reel",
		            title: "Chief Customer Officer"
		        },
		        link: {
		            href: "http://www.google.com"
		        },
		        //image: "../headshots/10.jpg"
		    },
		    ciso2 = {
		        parent: cbo,
		        text:{
		            name: "Alice Lopez",
		            title: "Chief Communications Officer"
		        },
		       // image: "../headshots/7.jpg"
		    },
		    ciso3 = {
		        parent: cbo,
		        text:{
		            name: "Mary Johnson",
		            title: "Chief Brand Officer"
		        },
		       // image: "../headshots/4.jpg"
		    },
		    ciso4 = {
		        parent: cbo,
		        text:{
		            name: "Kirk Douglas",
		            title: "Chief Business Development Officer"
		        },
		       // image: "../headshots/11.jpg"
		    }

		    chart_config = [
		        config,
		        ceo,
		        cto,
		        cbo,
		        cdo,
		        cio,
		        ciso,
		        cio2,
		        ciso2,
		        ciso3,
		        ciso4
		    ];

		    new Treant( chart_config );
		</script>
		
	</body>
</html>	 