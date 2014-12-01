<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">登陆</h4>
      </div>
      <div class="modal-body">
        <form role="form">
		  <div class="form-group">
			<label for="exampleInputEmail1">用户名：</label>
			<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
		  </div>
		  <div class="form-group">
			<label for="exampleInputPassword1">密码</label>
			<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
		  </div>
		  <button type="submit" class="btn btn-default">Submit</button>
		</form>

		
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<div class="page-header">
        <h1>Carousel</h1>
      </div>
  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
	<ol class="carousel-indicators">
	  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
	  <li data-target="#carousel-example-generic" data-slide-to="1"></li>
	  <li data-target="#carousel-example-generic" data-slide-to="2"></li>
	</ol>
	<div class="carousel-inner" role="listbox">
	  <div class="item active">
		<img data-src="holder.js/1140x500/auto/#777:#555/text:First slide" alt="First slide">
	  </div>
	  <div class="item">
		<img data-src="holder.js/1140x500/auto/#666:#444/text:Second slide" alt="Second slide">
	  </div>
	  <div class="item">
		<img data-src="holder.js/1140x500/auto/#555:#333/text:Third slide" alt="Third slide">
	  </div>
	</div>
	<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
	  <span class="glyphicon glyphicon-chevron-left"></span>
	  <span class="sr-only">Previous</span>
	</a>
	<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
	  <span class="glyphicon glyphicon-chevron-right"></span>
	  <span class="sr-only">Next</span>
	</a>
  </div>


