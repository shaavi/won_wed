





<div class="container">
    <div class="section">
        <div class="row">

            <div class="col s3" style="position:fixed; width:280px;">
            <!-- LEFT SIDEBAR	 -->
            <ul id="sidenav-1" class="sidebar sidebar-fixed">
                <li><a class="subheader">Always out except on mobile</a></li>
                <li><a href="https://github.com/dogfalo/materialize/" target="_blank">Github</a></li>
                <li><a href="https://twitter.com/MaterializeCSS" target="_blank">Twitter</a></li>
                <li><a href="http://next.materializecss.com/getting-started.html" target="_blank">Docs</a></li>
            </ul>
            </div>

            <div class="row" style="margin-left: 280px;">
            <?php for($i=0; $i<9; $i++){?>
                <div class="col s9 m4">
                <div class="card">
                    <div class="card-image">
                    <img src="https://images.pexels.com/photos/1670559/pexels-photo-1670559.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500">
                    <span class="card-title">Card Title</span>
                    </div>
                    <div class="card-content">
                    <a href="#">This is a link</a>
                    </div>
                </div>
                </div>
            <?php }?>
            </div>

        </div>
    </div>
</div>



<script>
 $(document).ready(function(){
    $('.sidebar').sidebar();
    $('#sidenav-1').sidenav({ edge: 'left' });
  });

</script>

  </body>