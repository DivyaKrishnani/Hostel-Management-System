<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Feedback</title>

<!-- Include HeaderScripts -->
<?php include_once "includes/headerScripts.php";?>

</head>



<body>


    <div class="container">
        <div class="row">
            <section class="col-md-12">

                <div class="table-responsive">

                    <table class="table table-bordered table-hover table-striped" style="table-layout: fixed">


                        <thead>
                            <tr class="tableizer-firstrow">
                                <th>Name</th>
                                <th>Complaint </th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php

try {

    # Sql Query
    $sql = "SELECT * FROM complaints";

    # Prepare Query
    $result = $conn->prepare($sql);

    # Execute Query
    $result->execute();

    # Checking Wether Count Greater than 0
    if ($result->rowCount() > 0) {

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

            ?>

                            <tr>
                                <td><?php echo $row["userName"]; ?></td>
                                <td><?php echo $row["student_complaint"]; ?></td>
                            </tr>


                            <?php

        }

        ?>

                        </tbody>
                    </table>

                    <?php

    } else {
        echo "<tr><td colspan='2'>No Records Found</td></tr>";
    }

} catch (PDOException $e) {
    echo "<script>alert('We are sorry, there seems to be a problem with our systems. Please try again.');</script>";
    # Development Purpose Error Only
    echo "Error " . $e->getMessage();
}

?>
                </div>

            </section>
        </div>
    </div>


    <!-- Include FooterScripts -->
    <?php include_once "includes/footerScripts.php";?>

</body>

</html>