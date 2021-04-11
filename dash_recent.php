<html>
<head>
</head>

<body>
    <table class="table table-sm bg-light text-center table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Student ID</th>
                <th scope="col">Student Name</th>
                <th scope="col">Room Number</th>
                <th scope="col">Date</th>
                <th scope="col">Session</th>
            </tr>
        </thead>
        <tbody>
            <?php
                include_once ('dbcons.php');

                //get data
                $query = "SELECT `booking_id`, `student_id`, `student_name`, `room_num`, `date`, `session`
                        FROM `booking` ORDER BY `booking_id` DESC LIMIT 10";
                $query_run = mysqli_query($conn, $query);

                if(mysqli_num_rows($query_run) > 0){
                    while($row = mysqli_fetch_array($query_run)){
                        echo '<tr><td>' . $row["booking_id"]. '</td><td>' . $row["student_id"]. '</td><td>' .$row["student_name"]. '</td><td>' . $row["room_num"] . '</td><td>' . $row["date"] . '</td><td>' . $row["session"] . '</td></tr>';
                    }
                }

            ?>

        </tbody>
    </table>

    
    
</body>
</html>
