<!doctype html>
<html>
<head lang="en">
    <meta charset="utf-8">
    <title>Ajax File Upload with jQuery and PHP</title>
    <link rel="stylesheet" href="../assets/css/style.css" type="text/css" />
    <!-- fullcalendar css -->
    <!-- <link href='fullcalendar/main.css' rel='stylesheet' /> -->
    <!-- <link rel='stylesheet' type='text/css' href='fullcalendar.css' /> -->
    <!-- fullcalendar js -->
    <!-- <script src='fullcalendar/main.js'></script> -->
    <!-- <script type='text/javascript' src='fullcalendar.js'></script> -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- <script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script> -->
    <script type="text/javascript" src="../assets/js/script.js"></script>
    <script type="text/javascript" src="../assets/js/fullcalendar@5.5.1.main.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth'
            ,
            weekends: false // will hide Saturdays and Sundays
            // ,
            // dayClick: function() {
            //     alert('a day has been clicked!');
            // }
            });
            calendar.render();
        });
    </script>
    <!-- fullcalendar js -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/fullcalendar@5.5.1/main.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/fullcalendar@5.5.1/main.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/fullcalendar@5.5.1/locales-all.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/fullcalendar@5.5.1/locales-all.min.js"></script>
    <!-- fullcalendar css -->
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.5.1/main.min.css' rel='stylesheet' />
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.5.1/main.min.css' rel='stylesheet' />
    <!-- fullcalendar other -->
    <!-- https://cdn.jsdelivr.net/npm/fullcalendar@5.5.1/package.json
    https://cdn.jsdelivr.net/npm/fullcalendar@5.5.1/LICENSE.txt
    https://cdn.jsdelivr.net/npm/fullcalendar@5.5.1/README.md -->
</head>

<body>
    <div class="container">
        <div class="row">

            <div class="col-md-8">

            <h1><a href="#" target="_blank"><img src="../assets/images/folder.png" width="80px"/> Ajax File Uploading with Database MySql</a></h1>
            <hr> 

            <form id="form" action="../controllers/ajaxupload.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">NAME</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required />
                </div>

                <div class="form-group">
                    <label for="email">EMAIL</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required />
                </div>

                <input id="uploadImage" type="file" accept="image/*" name="image" />
                <div id="preview" class="mt-3">
                    <img src="../assets/images/docs.png" width="150" height="200"/>
                </div>
                <br>
                <input class="btn btn-success" type="submit" value="Upload">
            </form>

            <div id="err">
            </div>
            <hr>
            <div id="calendar">
            </div>
            <!-- <p><a href="https://www.cloudways.com" target="_blank">www.Cloudways.com</a></p> -->
            </div>
        </div>
    </div>

    <!-- <?php include "../assets/js/script.js" ;?> -->

    <script>
        // $('#calendar').fullCalendar({
        //     dayClick: function() {
        //         alert('a day has been clicked!');
        //     }
        // });

        $(document).ready(function (e) {
            // page is now ready
            
            // Submit form data via Ajax
            $("#form").on('submit',(function(e) {
                e.preventDefault();
                $.ajax({
                    url: "../controllers/ajaxupload.php",
                    type: "POST",
                    data:  new FormData(this),
                    //best practice is to extract these for easy data manipulation whether single or multiple
                    //dataType: 'json',
                    contentType: false,
                    cache: false,
                    processData:false,
                //execute before submit
                beforeSend : function(){
                //$("#preview").fadeOut();
                $("#err").fadeOut();
                },
                    success: function(data){
                        if(data=='invalid'){
                            // invalid file format.
                            $("#err").html("Invalid File !").fadeIn();
                        } else {
                            // view uploaded file.
                            $("#preview").html(data).fadeIn();
                            $("#form")[0].reset(); 
                            }
                        },
                    error: function(e){
                        $("#err").html(e).fadeIn();
                    } 
                    //also add 
                    //complete: function(e){}  
                    //for execution after success and/or error       
                });
            }));
        });
    </script>


</body>

</html>