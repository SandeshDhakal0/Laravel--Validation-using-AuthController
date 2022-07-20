<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Full Calendar js</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
</head>
<body>

<div class="modal fade" id="logModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Log</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <input type="text" class="form-control" id="title" name="title">
                <span id="titleError" class="text-danger"></span>
            </div>
            <div class="modal-footer">
                <button type="button" id="saveBtn" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h3 class="text-center mt-5">Log Calendar</h3>
            <div class="col-md-11 offset-1 mt-5 mb-5">

                <div id="calendar"></div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var log = @json($events);
        $('#calendar').fullCalendar({
            header: {
                left : 'prev next today',
                center : 'title',
                right : 'month, agendaWeek, agendaDay',
            },
            events: log,
            selectable: true,
            selectHelper: true,
            select: function(start,end,allDays){
               $('#logModal').modal('toggle');

               $('#saveBtn').click(function(){
                   var title = $('#title').val();
                   var start_date = moment(start).format('YYYY-MM-DD');
                   var end_date = moment(end).format('YYYY-MM-DD');

                   $.ajax({
                        url : "{{route('calendar.store')}}",
                       type : "POST",
                       dataType : 'json',
                       data : {title,start_date,end_date},
                       success:function(response)
                       {
                           $('#logModal').modal('hide')
                           $('#calendar').fullCalendar('renderEvent', {
                               'title' : response.title,
                               'start' : response.start_date,
                               'end' : response.end_date
                           })
                       },
                          error:function(error)
                        {
                            if(error.responseJSON.errors){
                                $('#titleError').html(error.responseJSON.errors.title);
                            }
                       },
                   });
                });
            },
            editable : true,
            eventDrop : function(event){
                var id = event.id;
                var start_date = moment(event.start).format('YYYY-MM-DD');
                var end_date = moment(event.end).format('YYYY-MM-DD');

                $.ajax({
                    url: "{{route('calendar.update','')}}" +'/'+ id,
                    type: "PATCH",
                    data: {start_date, end_date},
                    success: function (response)
                    {
                        swal("Good job!", "Event updated successfully!", "success");
                    },
                    error: function (error)
                    {
                       console.log(error)
                    },
                });
            }
        })
    });
</script>

</body>
</html>

