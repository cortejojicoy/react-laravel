@extends('layouts.app')

@section('content')
<div class="container">
	<form action="" method="post">
		@csrf

		@if(session('success'))
			<b>{{ session('success') }}</b>
		@endif
		 <div class="form-group">
		    <label>Email</label>
		    <input type="email" name="email" class="form-control" placeholder="name@example.com">
		  </div>

		  <div class="form-group">
		  	<label>Subject</label>
		  	<input type="text" name="subject" class="form-control" placeholder="Subject">
		  </div>

		  <div class="form-group">
		  	<label>Message</label>
		  	<textarea name="content" class="form-control" placeholder="Type text.."></textarea>
		  </div>

		  <button class="btn btn-primary">Send</button>
	</form>
</div>
@endsection
