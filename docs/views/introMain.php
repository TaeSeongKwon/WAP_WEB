
		<style>
			body{
				padding-top: 0px;
			}
			header{
				display: none;
			}
			.main{
				min-height: 100%;
			}
			.introMain{
				min-height: 100%;
				background: url("img/intro/main_2_light.jpg") no-repeat center center fixed;
				background-size: cover;
				display: flex;
				display: -webkit-flex;
				align-items: center;
    				justify-content: center;
			}
			.mainLogo{
				min-width: 40%;
   				max-width: 80%;
			}
			.title{
				font-size: xx-large;
			    display: block;
			    margin-bottom: 25px;
			    
			}
			.string{
				font-size: large;
    			font-weight: normal;
    			
			}
			.introMainDetail{
				text-align: center;
    			padding: 70px 0px;
			}
			.intro2{
			    background: url("img/intro/intro2.jpg")no-repeat center center;
			    background-size: cover;
			    text-align: center;
			    min-height: 70%;
			    /* display: flex; */
			    padding: 10% 0px;
			}
			.intro3{
			    background: url("img/intro/intro3.jpg") no-repeat center center;
			    background-size: cover;
			    /*text-align: center;*/
			    min-height: 100%;
			    /* display: flex; */
			    padding: 10% 5%;
			}
			.intro4{
			    background: url("img/intro/intro4.jpg") no-repeat center center;
			    background-size: cover;
			    text-align: right;
			    min-height: 100%;
			    /* display: flex; */
			    padding: 10% 5%;
			}
			.intro5{
			    background: url("img/intro/intro5.jpg")no-repeat center center;
			    background-size: cover;
			    text-align: center;
			    min-height: 70%;
			    /* display: flex; */
			    padding: 10% 0px;
			}
			.end{
			    background: url("img/intro/end.jpg")no-repeat center center fixed;
			    background-size: cover;
			    text-align: center;
			    min-height: 70%;
			    /* display: flex; */
			    padding: 10% 0px;
			}
			.intro2 .title, .intro2 .string{
				/*color :white;*/
			}
			.intro3 .title, .intro3 .string{
				color :#dddddd;
			}
			.intro5 .title, .intro5 .string{
				color: #dddddd;
			}
			.end .title, .end .string{
				color : #ffffff;
			}
			.intro2Sec{
				margin: 0px auto;
			    padding: 35px 0px;
			    background: rgba(255,255,255,0.7);
			    border-radius: 25px;
			}
			@media (min-width : 970px){
				.intro2Sec{
					max-width: 35%;
				}
			}
			@media (max-width : 969px){
				.intro2Sec{
					max-width: 55%;
				}
			}
			@media (max-width : 768px){
				.intro2Sec{
					max-width: 80%;
				}
				.intro3Sec, .intro4Sec{
					padding: 35px 10px;
				    background: rgba(255,255,255,0.7);
				    border-radius: 25px;
				    color : #111111 !important;
				}
				.intro3 .title, .intro3 .string, .intro4 .title, .intro4 .string{
					color : #444444 !important;
				}
			}

			.delay-25{
			    animation-delay : 0.25s;
			    -webkit-animation-delay : 0.25s;
			}
			.delay-50{
			    animation-delay : 0.5s;
			    -webkit-animation-delay : 0.5s;
			}
			.delay-75{
			    animation-delay : 0.75s;
			    -webkit-animation-delay : 0.75s;
			}
			.delay-100{
			    animation-delay : 1.0s;
			    -webkit-animation-delay : 1.0s;
			}
			.delay-125{
			    animation-delay : 1.25s;
			    -webkit-animation-delay : 1.25s;   
			}
			.fadeIn{
			    visibility: visible !important;
			}
			.notVisible{
			    visibility: hidden;
			}
			.visible{
			    visibility: visible;
			}

		</style>
		
		<section class='introMain'>
			<img src='img/intro/logo_high.png' class='mainLogo' style='display:none;'>
		</section>
		<section class='introMainDetail'>
			
				<strong class='title notVisible'>열정과 꿈을 가지고 새로운 경험을 해보십시요</strong>
				<p class='string notVisible'>우리 부경대학교 컴퓨터 IT 학과 학생들은 열정과 꿈을 가지고 <br>
				학업에 열중합니다. 하지만 자신의 장점을 갈고 닦아 자신의 색깔을 찾아야 <br>
				하는데 우리 W.A.P은 여러분의 색깔을 찾도록 도와줍니다.</p>
			

		</section>
		<section class='intro2'>
			<article class='intro2Sec notVisible'>
				<div class='titleSec'>
					<strong class='title notVisible'>새롭고 다양한 경험</strong>
				</div>
				<div class='stringSec'>
					<p class='string notVisible'>대학교를 입학하여 우리는 이전과 다른 생활을 하게 됩니다. <br>
					모두가 공부하는것이 아닌 우리의 흥미를 유발시키며 <br>
					적극적으로 공부를 해야합니다. 하지만 공부만으로는 부족하죠 <br>
					우리 W.A.P에서는 학교 공부보다 회원들이 원하는 공부와<br>
					프로젝트를 통하여 우리의 전문적인 기술을 쌓을 수 있습니다
					</p>
					<br>
					<p class='string notVisible'>
						자체적인 세미나 진행, 팀 프로젝트, 공모전 등의 각종 대외활동 
					</p>
				</div>
			</article>
		</section>
		<section class='intro3'>
			<article class='intro3Sec'>
				<strong class='title notVisible'>2000년 9월 첫 시작 그리고 2015년 새로운 시작</strong>
				<p class='string notVisible'>열악한 환경속에서도 매번 놀라운 성과를 얻어냈습니다. <br>
				이러한 성과들은 우리 W.A.P의 회원들의 노력으로 <br>
				얻어낸 결과물입니다. 우리는 더욱 발전하고자 <br>
				우리의 환경을 더 쾌적하고 더 좋은 보금자리로 바꾸어 놓았으며 <br>
				새로운 성과를 얻어내기 위하여 노력 할 것입니다.</p>
				<br>
				<br>
				<strong class='string notVisible' style='font-size:x-large; '>최근 주요 연혁</strong>
				<br><br>
				<p class='string notVisible'>2015 삼성전자, SK, 한국자산관리공사 등등 배출<br>
				2015 창의도전형 R&D사업 참여 (약 7000만원 규모)<br>
				2015 삼성소프트웨어 경진대회 최우수, 우수, 장려 수상<br>
				2015 부경대학교 창업동아리 선정 <br>
				2014 삼성소프트웨어 멤버십 3명 활동<br>
				2014 ACM ICPC 본선진출<br>
				2013 삼성 소프트웨어 Friendship 선정<br>
				</p>
			</article>
		</section>
		<section class='intro4'>
			<article class='intro4Sec '>
				<strong class='title notVisible'>15년동안의 시간 그리고 계속 나아갈 앞으로의 시간</strong>
				<p class='string notVisible'>우리는 긴 시간동안 멈추지않고 <br>
				사회에 나아가기 위하여 꾸준히 전공을 쌓을것입니다.<br>
				또한 외부로의 활동을 나아가 사회에 일원이되어 <br>
				어디서든 우리 W.A.P의 구성원으로써 활동해 나갈 것입니다.<br>
				</p>
			</article>
		</section>
		<section class='intro5'>
			<article class='intro5Sec'>
				<strong class='title notVisible'>새로운 만남은 언제나 흥미로운 경험입니다</strong>
				<p class='string notVisible'>우리는 새로운 만남을 위하여 언제나 기다리고 있으며 <br>
				여러분과 새로운 경험을 통하여 목표를 이룰 것이며 <br>
				같이 발전해 나아갈 것입니다.<br>
				</p>
			</article>
		</section>	
		<section class='end'>
			<strong class='title notVisible'>Why Are you Programming?</strong>
			<p class='string notVisible'>우리는 여러분을 기다립니다</p>
		</section>	
	
		<script>
			$('.introMain').waypoint(function(){
				console.log("111");
				$(".mainLogo").fadeIn();
			});
			$('.introMainDetail').waypoint(function(){
				$('.introMainDetail .title').addClass('visible animated fadeIn');
				$('.introMainDetail .string').addClass('delay-50 visible animated fadeIn');

			},{offset: "75%"});

			$('.intro2').waypoint(function(){
				$('.intro2Sec').addClass('visible animated fadeIn');
				$('.intro2 .title').addClass('delay-50 visible animated fadeIn');
				$('.intro2 .string').addClass('delay-100 visible animated fadeIn');
			},{offset: "75%"});

			$('.intro3').waypoint(function(){
				$('.intro3Sec').addClass('visible animated fadeIn');
				$('.intro3 .title').addClass('delay-50 visible animated fadeIn');
				$('.intro3 .string').addClass('delay-100 visible animated fadeIn');
			},{offset: "75%"});
			$('.intro4').waypoint(function(){
				$('.intro4Sec').addClass('visible animated fadeIn');
				$('.intro4 .title').addClass('delay-50 visible animated fadeIn');
				$('.intro4 .string').addClass('delay-100 visible animated fadeIn');
			},{offset: "75%"});
			$('.intro5').waypoint(function(){
				// $('.intro4Sec').addClass('visible animated fadeIn');
				$('.intro5 .title').addClass('visible animated fadeIn');
				$('.intro5 .string').addClass('delay-50 visible animated fadeIn');
			},{offset: "75%"});
			$('.end').waypoint(function(){
				$('.end .title').addClass('visible animated fadeIn');
				$('.end .string').addClass('delay-50 visible animated fadeIn');
			},{offset: "75%"});

			 $('.introMain').waypoint(function(){
	            // $("#main_img_div").addClass("delay-25 animated fadeIn");
	            // $("#sub_title").addClass("delay-50 animated fadeInLeft");
	            console.log("나는 호출됨 ");
	            $('header').fadeOut();
	        },{offset:'-25%'});
			$('.introMainDetail').waypoint(function(){
	        	$('header').fadeIn();    
	        },{offset: "15%"});
		</script>
