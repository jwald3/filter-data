<?php
include("config.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <title>Document</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: "Helvetica", sans-serif;
        }

        #filters {
            margin-left: 10%;
            margin-top: 2%;
            margin-bottom: 2%;
        }
    </style>
</head>

<body>
    <div id="filters">
        <span>Fetch results by &nbsp;</span>
        <select name="fetchval" id="fetchval">
            <option value="" disabled="" selected="">Select Filter</option>
            <option value="Advertisement">Advertisement</option>
            <option value="Technology">Technology</option>
            <option value="Education">Education</option>
            <option value="Fashion">Fashion</option>

        </select>
    </div>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>Sr No.</th>
                    <th>Username</th>
                    <th>Date</th>
                    <th>Post Title</th>
                    <th>Post Image</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM post";
                $r = mysqli_query($con, $query);
                while ($row = mysqli_fetch_assoc($r)) {

                ?>
                    <tr>
                        <td><?php echo $row['p_no']; ?></td>
                        <td><?php echo $row['p_username']; ?></td>
                        <td><?php echo $row['p_tmg']; ?></td>
                        <td><?php echo $row['p_title']; ?></td>
                        <td><img src="uploads/<?php echo $row['p_img']; ?>" class="img-responsive img-thumbnail" width="150" /></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#fetchval").on('change', function() {
                var value = $(this).val();

                $.ajax({
                    url: "fetch.php",
                    type: "POST",
                    data: 'request=' + value,
                    beforeSend: function() {
                        $(".container").html("<span>Working...</span>");
                    },
                    success: function(data) {
                        $(".container").html(data);
                    }
                })
            })
        });
    </script>
</body>

</html>