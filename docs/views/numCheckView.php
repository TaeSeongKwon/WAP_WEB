<style type='text/css'>
	
	.centerSec{
		margin: auto auto;

	}
	.checkBody{
		display: flex;
		display: -webkit-flex;
		align-items : center;
		height: inherit;
	}
	.checkNumberBtn{
		width:100%;
	}
</style>


<section class='container mainBody'>
	<article class='row '>
		<div class='col-xs-12'>
			<h3>회원가입</h3>
		</div>
	</article>
	<hr>
	<article class='row container checkBody'>
		<div class='col-md-5 col-sm-6 col-xs-12 centerSec'>
			<h3>학번인증</h3>
			<form method='post' name='checkForm' action='/member/join'>
				<div class='form-group'>
					<input type='text' name='sNumber' placeholder='학번을 입력하세요' class='form-control'>
				</div>
				<hr>
				<a  href='javascript:;' class='btn btn-primary checkNumberBtn' >확인</a>
			</form>
			 
		</div>
	</article>
</section>
<script>
	$('.checkNumberBtn').click(function(){
		var sNumber = document.checkForm.sNumber.value;
		sNumber = sNumber.trim();
		sNumber = sNumber.replace(/\s|[a-zA-Z]/g, "");
		if(sNumber.length < 9 || document.checkForm.sNumber.value.length != sNumber.length){
			alert("학번은 9자리 이상 숫자로 구성되어야 합니다.");
			return;
		}
		document.checkForm.submit();
	});
</script>