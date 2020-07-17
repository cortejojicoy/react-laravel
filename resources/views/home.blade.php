@extends('layouts.app')

@section('content')

<div class="row">
  <div class="container">
      <div class="col-lg-6">
          <form role="form" action=" " method="post">
              <div class="form-group  ">
                  <textarea placeholder="What's up  " name="status" class="form-control" rows="2"></textarea>

            <span class="help-block"> </span>

              </div>
              <button type="submit" class="btn btn-default">Update status</button>
              <input type="hidden" name="_token" value=" ">
          </form>
          <hr>
      </div>

	    <div class="col-lg-5">

	        	<p>There's nothing in your timeline, yet.</p>

	        		<div class="media">
                 <a class="pull-left" href=" ">

					        <img class="media-object" alt=" " src=" ">
					    </a>
					    <div class="media-body">
					        <h4 class="media-heading"><a href=" "> </a></h4>
					        <p> Status body</p>
					        <ul class="list-inline">

					            <li>created at : now</li>

					            <li><a href=" ">Like</a></li>

					            <li>21</li>
					        </ul>

						        <div class="media">
						            <a class="pull-left" href="">
						                <img class="media-object" alt=" " src=" ">
						            </a>
						            <div class="media-body">
						                <h5 class="media-heading"><a href="">username</a></h5>
						                <p>reply body</p>
						                <ul class="list-inline">
						                    <li>Created at: now</li>
						                    <li><a href=" ">Like</a></li>

					                        <li>21</li>
						                </ul>
						            </div>
						        </div>


					        <form role="form" action="" method="post">
					            <div class="form-group">
					                <textarea name="" class="form-control" rows="2" placeholder="Reply to this status"></textarea>
					                	<span class="help-block"></span>

					            </div>
					            <input type="submit" value="Reply" class="btn btn-default btn-sm">
					            <input type="hidden" name="_token" value="">
					        </form>
					    </div>
					</div>

	    </div>

    </div>
	</div>

@endsection
