    <div class="col-md-9">
        <div id="dataList"></div>
        <!--<div class="row">
        	<hr/>
        	<div class="col-md-6">
        		<div class="panel panel-primary">
			        <div class="panel-heading">
			          <h3 class="panel-title" style='font-size:15px'><b>Facebook</b></h3>
			        </div>
			        <div class="panel-body">
			          	<div id="fb-root"></div>
						<script>
							(function(d, s, id) {
								var js, fjs = d.getElementsByTagName(s)[0];
								if (d.getElementById(id)) return;
								js = d.createElement(s); js.id = id;
								 js.src = "//connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.6&appId=923440137750844";
								fjs.parentNode.insertBefore(js, fjs);
							}(document, 'script', 'facebook-jssdk'));
						</script>
						<div class="fb-page" data-href="https://www.facebook.com/AldhinyaWeb/?fref=ts" data-tabs="timeline" data-height="300" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/AldhinyaWeb/?fref=ts" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/AldhinyaWeb/?fref=ts">Jurit Online</a></blockquote></div>
				    </div>
			     </div>
        	</div>
        	<div class="col-md-6">
        		<div class="panel panel-primary">
			        <div class="panel-heading">
			          <h3 class="panel-title" style='font-size:15px'><b>Twitter</b></h3>
			        </div>
			        <div class="panel-body">
                <a href="https://twitter.com/aldhinya" class="twitter-follow-button" data-show-count="true" data-lang="en">Follow @duranduren2</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
			        </div>
			     </div>
        	</div>
        </div>-->
    </div>
<script>
$(document).ready(function(){
	pageLoad(1);
});
function pageLoad(i){
	var limit 	= 9;
	var cari 	= '';

	$.ajax({
		url		: '<?php echo base_url()?>home/read/'+i,
		type	: 'post',
		dataType: 'html',
		data	: {limit:limit,cari:cari},
		beforeSend : function(){

		},
		success : function(result){

			$('#dataList').html(result);
		}
	})
}
</script>
