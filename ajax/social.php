<script type="text/javascript">
$(document).ready(function() {
//rollover function
$("#.rollover img").hover(
 function()
 {
  this.src = this.src.replace("_off","_on");
 },
 function()
 {
  this.src = this.src.replace("_on","_off");
 }
);
$(function() {
		$(".dragdrop").draggable({ revert: true, containment: '#container' });
	});
});
</script>
<div id="window">
  <a href="#" onclick="$('#window').hide();"><div id="button"></div></a>
  <h1>Social Network</h1>
  <div id="content">
      <ul>
      	<li class="dragdrop"><a href="http://www.facebook.com/harrypujols" target="_blank" class="rollover">
        <img src="<?php bloginfo('stylesheet_directory'); ?>/images/facebook_off.png" alt="facebook" />
        <p>facebook</p>
        </a></li>
        <li class="dragdrop"><a href="http://www.twitter.com/harrypujols" target="_blank" class="rollover">
        <img src="images/twitter_off.png" alt="twitter" />
        <p>twitter</p>
        </a></li>
        <li class="dragdrop"><a href="http://www.linkedin.com/in/harrypujols" target="_blank" class="rollover">
        <img src="images/linkedin_off.png" alt="linkedin" />
        <p>linkedin</p>
        </a></li>
        <li class="dragdrop"><a href="http://www.vimeo.com/harrypujols" target="_blank" class="rollover">
        <img src="images/vimeo_off.png" alt="vimeo" />
        <p>vimeo</p>
        </a></li>
        <li class="dragdrop"><a href="http://www.flickr.com/harrypujols" target="_blank" class="rollover">
        <img src="images/flickr_off.png" alt="flickr" />
        <p>flickr</p>
        </a></li>
        <li class="dragdrop"><a href="http://www.harrypujols.blogspot.com" target="_blank" class="rollover">
        <img src="images/blogger_off.png" alt="blogger" />
        <p>blogger</p>
        </a></li>
        <li class="dragdrop"><a href="aim:goim?screenname=harrymfa" class="rollover">
        <img src="images/aim_off.png" alt="blogger" />
        <p>aim</p>
        </a></li>
      </ul>
  </div>
</div>
