<?php

include("config.php");
if (isset($_POST['request'])) {
    $request = $_POST['request'];
    $today = strtotime('today');

    if ($request == "true") {
        $query = "SELECT * FROM post WHERE p_tmg > DATE(NOW())";
    } else {
        $query = "SELECT * FROM post";
    }

    $result = mysqli_query($con, $query);
    $count = mysqli_num_rows($result);
?>

    <table class="table">
        <?php

        if ($count) {

        ?>
            <thead>
                <tr>
                    <th>Sr No.</th>
                    <th>Username</th>
                    <th>Date</th>
                    <th>Post Title</th>
                    <th>Post Image</th>
                </tr>

            <?php
        } else {
            echo "Sorry! no record found.";
        }
            ?>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
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
<?php
}
?>