@extends('layouts.master')

@section('page-title')

    Dashboard

@endsection

@section('content')


<div class="row">
    <div class="col-md-12 margin-t2">
        <ol class="breadcrumb">
            <li class='active'> Dashboard</li>
        </ol>
    </div>

</div>


<!-- Current Stats Start -->
<div class="current-stats">
    <div class="row margin-t2">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
            <div class="danger-bg center-align-text device-link link">
                <div class="spacer-xs">
                    <i class="fa fa-tablet fa-2x"></i>
                    <small class="text-white"> No. Of Devices </small>
                    <h3 class="no-margin no-padding"> {{ count($devices) }} </h3>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
            <div class="success-bg center-align-text room-link link">
                <div class="spacer-xs">
                    <i class="fa fa-handshake-o fa-2x"></i>
                    <small class="text-white"> No. Of Rooms</small>
                    <h3 class="no-margin no-padding text-white"> {{ count($rooms) }} </h3>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
            <div class="info-bg center-align-text meeting-link link">
                <div class="spacer-xs">
                    <i class="fa fa-link fa-2x"></i>
                    <small class="text-white"> No. Of Meetings </small>
                    <h3 class="no-margin no-padding"> {{ count($meetings) }} </h3>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
            <div class="brown-bg center-align-text user-link link">
                <div class="spacer-xs">
                    <i class="fa fa-users fa-2x"></i>
                    <small class="text-white"> No. Of Users </small>
                    <h3 class="no-margin no-padding"> {{ count($users) }} </h3>
                </div>
            </div>
        </div>
 
    </div>
</div>
<!-- Current Stats End -->



<div class="row margin-t4">

    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
        <div class="blog blog-info">
            <div class="blog-header"> <h5 class="blog-title"> OverAll Room Utilization </h5>  </div>
            <div class="blog-body">
                <canvas id="numCallChart" width="400" height="200"></canvas>
            </div>
        </div>
    </div>

     <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
        <div class="blog blog-success">
            <div class="blog-header"> <h5 class="blog-title"> Daily Room Utilization </h5> </div>
            <div class="blog-body">
                <canvas id="callMinsChart" width="400" height="200"></canvas>
            </div>
        </div>
    </div>

</div>

<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="blog blog-success">
            <div class="blog-header"> <h5 class="blog-title"> Daily Room Utilization </h5> </div>
            <div class="blog-body">
                

<div id = "colmns" class="row">
  <div class="column" >
    
  </div>
  <div class="column" >
   
  </div>
  <div class="column" >
    
  </div>
  <div class="column" >
    
  </div>
  <div class="column" >
    
  </div>
  <div class="column" >
    
  </div>
  <div class="column" >
    
  </div>
  <div class="column" >
    
  </div>
  <div class="column" >
    
  </div>
  <div class="column" >
    
  </div>
  <div class="column" >
    
  </div>
  <div class="column" >
    
  </div>
  <div class="column" >
    
  </div>
  <div class="column" >
    
  </div>
  <div class="column" >
    
  </div>
  <div class="column" >
    
  </div>
  <div class="column" >
    
  </div>
  <div class="column" >
    
  </div>
  <div class="column" >
    
  </div>
  <div class="column" >
    
  </div>
  <div class="column" >
    
  </div>
  <div class="column" >
    
  </div>
  <div class="column" >
    
  </div>
  <div class="column" >
    
  </div>
</div>
            </div>
        </div>
    </div>
</div>


  <script>

    window.onload = loadCharts;

    var numCallChartOptions = {
        scales: {
            xAxes: [{
                scaleLabel: {
                    display: true,
                    labelString: 'Rooms'
                }
            }],
            yAxes: [{
                ticks: {
                    beginAtZero:true
                },
                scaleLabel: {
                    display: true,
                    labelString: 'Number Of Meetings'
                }
            }]
        }
    };

    var callMinsChartOptions = {
        scales: {
            xAxes: [{
                scaleLabel: {
                    display: true,
                    labelString: 'Rooms'
                }
            }],
            yAxes: [{
                ticks: {
                    beginAtZero:true
                },
                scaleLabel: {
                    display: true,
                    labelString: 'Number Of Meetings'
                }
            }]
        }
    };

    // var dailyCallChartOptions = {
    //     scales: {
    //         xAxes: [{
    //             type: "time",
    //             time: {
    //                 unit: 'day'
    //             },
    //             scaleLabel: {
    //                 display: true,
    //                 labelString: 'Date'
    //             }
    //         }],

    //         yAxes: [{
    //             ticks: {
    //                 beginAtZero:true
    //             },
    //             scaleLabel: {
    //                 display: true,
    //                 labelString: 'Number of Calls for each day'
    //             }
    //         }]
    //     }
    // };

    // var dailyMinsChartOptions = {
    //     scales: {
    //         xAxes: [{
    //             type: "time",
    //             time: {
    //                 unit: 'day'
    //             },
    //             scaleLabel: {
    //                 display: true,
    //                 labelString: 'Date'
    //             }
    //         }],

    //         yAxes: [{
    //             ticks: {
    //                 beginAtZero:true
    //             },
    //             scaleLabel: {
    //                 display: true,
    //                 labelString: 'Call Duration for each day'
    //             }
    //         }]
    //     }
    // };

    function loadCharts() {

        var numCallChart = document.getElementById('numCallChart').getContext('2d');

        var labels = [], data = [];

        @foreach ($rooms as $room)
            labels.push("{{$room->room_name}}");
            data.push("{{$room->meetings->count()}}");
        @endforeach

        var numCallChart = new Chart(numCallChart, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Room',
                    data: data,
                    backgroundColor: '#167F92',
                    borderColor: [
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },

            options: numCallChartOptions
        })


        var callMinsChart = document.getElementById('callMinsChart').getContext('2d');

        var labels = [], data = [];

      	@foreach ($currentMeetings as $currentMeetings)
            labels.push("{{$currentMeetings->room_email}}");
            data.push("{{$currentMeetings->meeting_count}}");
        @endforeach

        var callMinsChart = new Chart(callMinsChart, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Room',
                    data: data,
                    backgroundColor: '#167F92',
                    borderColor: [
                        'rgba(255,99,132,1)',
                    ],
                    borderWidth: 1
                }]
            },

            options: callMinsChartOptions
        })



    }

        $mn_list = $('#menu > ul > li.dashboard');
        $('#menu > ul > li').removeClass('highlight active');
        $mn_list.addClass('highlight');
        $mn_list.find('a').append('<span class="current-page"> </span>');
        
	/*var MONTHS = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        var config = {
            type: 'line',
            data: {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [{
                    label: "My First dataset",
                    backgroundColor: window.chartColors.red,
                    borderColor: window.chartColors.red,
                    data: [
                        randomScalingFactor(), 
                        randomScalingFactor(), 
                        randomScalingFactor(), 
                        randomScalingFactor(), 
                        randomScalingFactor(), 
                        randomScalingFactor(), 
                        randomScalingFactor()
                    ],
                    fill: false,
                }, {
                    label: "My Second dataset",
                    fill: false,
                    backgroundColor: window.chartColors.blue,
                    borderColor: window.chartColors.blue,
                    data: [
                        randomScalingFactor(), 
                        randomScalingFactor(), 
                        randomScalingFactor(), 
                        randomScalingFactor(), 
                        randomScalingFactor(), 
                        randomScalingFactor(), 
                        randomScalingFactor()
                    ],
                }]
            },
            options: {
                responsive: true,
                title:{
                    display:true,
                    text:'Chart.js Line Chart'
                },
                tooltips: {
                    mode: 'index',
                    intersect: false,
                },
                hover: {
                    mode: 'nearest',
                    intersect: true
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Month'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Value'
                        }
                    }]
                }
            }
        };*/

       /* window.onload = function() {
            var ctx = document.getElementById("canvas").getContext("2d");
            window.myLine = new Chart(ctx, config);
        };*/
	
    </script>

@endsection

@section('extra-css')

    <style type="text/css" >
        .link:hover{
            cursor: pointer;
        }

       * {
    box-sizing: border-box;
}

/* Create four equal columns that floats next to each other */
.column {
    float: left;
    width: 33px;
    height: 300px; /* Should be removed. Only for demonstration */
border-right:  1px solid  #808080;
border-bottom: 1px solid  #808080;
    

}

/* Clear floats after the columns */

#colmns{
    margin-left: 10px;
    overflow-x: scroll;
    min-width: 720px;
    width: 100%;
    
}

#colmns:after {
    content: "";
    display: table;
    clear: both;

}

    </style>


@endsection

@section('extra-script')

    <script type="text/javascript">
        
        $('.user-link').on('click', function(e){
            window.location = "{{ url('user') }}";
        });

        $('.device-link').on('click', function(e){
            window.location = "{{ url('device') }}";
        });

        $('.room-link').on('click', function(e){
            window.location = "{{ url('room') }}";
        });

        $('.meeting-link').on('click', function(e){
            window.location = "{{ url('meeting') }}";
        });

    </script>   
    

@endsection