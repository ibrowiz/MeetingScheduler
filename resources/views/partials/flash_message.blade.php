
@if(Session::has('flash_message'))

<script type="text/javascript">

	//swal("Good job!", "", "success");
	// swal({
	//   title: "Good Job!",
	//   text: "",
	//   timer: 3500,
	//   type: "success",
	//   showConfirmButton: true
	// });

	alertify.set({ delay: 5000 });
	alertify.success("{{Session::get('flash_message')}}");
</script>
@endif


@if(Session::has('danger_message'))

<script type="text/javascript">

	//swal("Good job!", "", "danger");
	alertify.set({ delay: 5000 });
	alertify.error("{{Session::get('danger_message')}}");


</script>

@endif