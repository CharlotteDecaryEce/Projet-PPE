
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Emmanuelle Thiroloix, Léa Blanchard, Charlotte Decary">
    <link rel="shortcut icon" href="images/favcon.png">

    <title>NetWire: <?php echo $title ?></title>





            <script type="text/javascript">
                    function clock() {
                var days = ["Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche"];
                var months = ["janvier", "février", "mars", "avril", "mai", "juin", "juillet", "aout", "septembre", "octobre", "novembre", "décembre"];
                localTime     = new Date();
                date      = localTime.getDate();
                day       = localTime.getDay()-1;
                full_year = localTime.getFullYear();
                hours     = localTime.getHours();
                minutes   = localTime.getMinutes();
                month     = localTime.getMonth();
                seconds   = localTime.getSeconds();
                value     = "";
                if (hours < 10) {
                    hours = "0" + hours;
                }
                if (minutes < 10) {
                    minutes = "0" + minutes;
                }
                if (seconds < 10) {
                    seconds = "0" + seconds;
                }
                value = days[day] + " " + date + " " + months[month] + " " + full_year + " " + hours + ":" + minutes + ":" + seconds;
               
                document.clock.date.value = value ;
               
                setTimeout(clock,1000);
                    }
            </script>


    <!--Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
</head>
