<div class="card beliefs-cycle">
		          <div class="inner">

		            <div class="contents">
		              <h1>What we believe</h1>

		              <div class="beliefs-carousel">
		                <button class="control prev" aria-hidden="true"></button>
		                <button class="control next" aria-hidden="true"></button>
		                <ol class="beliefs">
		                  <li class="active">Everyone should be able to live a full and dignified life.</li>
		                  <li>The economy must be run democratically; none shall be poor so another can be rich.</li>
		                  <li>The abolition of poverty.</li>
		                  <li>Affordable, humane housing for all.</li>
		                  <li>Universal Medicare-for-all.</li>
		                  <li>Free education: from pre-K to trades, college and beyond.</li>
		                  <li>Democracy in the workplace; all workers have the right to organize.</li>
		                  <li>Complete reproductive freedom in all forms.</li>
		                  <li>An end to racial, gender and all other forms of oppression.</li>
		                  <li>An end to punitive justice and mass incarceration.</li>
		                  <li>An end to military and police aggression.</li>
		                  <li>Democratic control over the environment to preserve the planet.</li>
		                  <li>Total freedom to migrate; humanity has no borders.</li>
		                  <!-- ?php echo apply_filters('the_content', get_post_meta($post->ID, '_dsa_slide1', true)); ? -->
		                </ol>
		              </div>

		              <div class="action">
		                <a href="https://seattledsa.org/platform/" class="dark small">Read full platform</a>
		              </div>
		            </div>

		          </div>

		        </div>

				<script async>jQuery(document).ready(function($) {
		  if($(".beliefs-carousel").length) {


		    var curActive = $(".beliefs-carousel .active");
		    var totalBeliefs = $(".beliefs-carousel li").length;
		    var curIndex = 1;


		    //console.log("curIndex is: " + curIndex);

		    function beliefAdvance() {
		      curActive = curActive.next();
		      if(curIndex == totalBeliefs) {
		        curActive = $(".beliefs-carousel li:eq(0)")
		        $(curActive).addClass("active");
		        curIndex = 1;
		      } else {
		        curIndex = curActive.index() + 1;
		        $(curActive).addClass("active");
		      }
		    }

		    function beliefRewind() {
		      curActive = curActive.prev();
		      if(curIndex == 1) {
		        curActive = $(".beliefs-carousel li:eq(11)")
		        $(curActive).addClass("active");
		        curIndex = totalBeliefs;
		      } else {
		        curIndex = curIndex - 1;
		        $(curActive).addClass("active");
		      }
		    }


		    $(".control").click(function(){

		      $(".beliefs-carousel li").removeClass("active");
		      if($(this).hasClass("next")) {
		        beliefAdvance();
		        //console.log("curIndex is: " + curIndex);
		      } else {
		        beliefRewind();
		        //console.log("curIndex is: " + curIndex);
		      }

		    });

		  }





		}); // end doc ready
		</script>