@if(count($errors))

<script type="text/javascript">

	//swal("Good job!", "", "danger");


	alertify.set({ delay: 2000 });
	alertify.error("Invalid Input submited to form");

</script>
	<ul class="list-group bg-danger">
	@foreach($errors->all() as $error)

	<li class="bg-danger text-danger list-group-item">
	  {{$error}}
	</li>
	@endforeach
	</ul>
@endif