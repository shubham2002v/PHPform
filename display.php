<?php
include 'connection.php';

$selectqry = "SELECT * FROM collegedb";
$qry = mysqli_query($connect, $selectqry);

if (!$qry) {
    die("Query failed: " . mysqli_error($connect));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css">

    <style>
        th, td {
            border: 0.2px solid black;
            padding: 8px;
            text-align: center;
        }
        table {
            width: 100%;
        }
        h5 {
            height: 2px;
            width: 2px;
        }
        body {
            background-color: rgba(0, 128, 128, 0.281);
        }
        * {
            margin: 0;
            padding: 0;
        }
        h5 {
            animation-name: myani;
            animation-duration: 10s;
            animation-delay: 1s;
            animation-iteration-count: infinite;
            animation-direction: alternate;
            margin: auto;
        }
        @keyframes myani {
            0% {background-color: green; border-radius: 0%; height: 8px; width: 100%;}
            10% {background-color: white; border-radius: 0%; height: 8px; width: 100%;}
            20% {background-color: green; border-radius: 0%; height: 8px; width: 100%;}
            30% {background-color: white; border-radius: 0%; height: 8px; width: 100%;}
            40% {background-color: green; border-radius: 0%; height: 8px; width: 100%;}
            50% {background-color: white; border-radius: 0%; height: 8px; width: 100%;}
            60% {background-color: green; border-radius: 0%; height: 8px; width: 100%;}
            70% {background-color: white; border-radius: 0%; height: 8px; width: 100%;}
            80% {background-color: green; border-radius: 0%; height: 8px; width: 100%;}
            90% {background-color: white; border-radius: 0%; height: 8px; width: 100%;}
            100% {background-color: green; border-radius: 0%; height: 8px; width: 100%;}
        }
        h1 {
            background-color: rgb(0, 46, 46);
            color: white;
            text-align: center;
            padding: 20px;
        }
    </style>
</head>
<body>
    <!-- Form Name -->
    <legend><h1>College Admission Enquiry Form Details</h1></legend>
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>Course</th>
                <th>Email</th>
                <th>Contact</th>
                <th colspan="2">Modify</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($res = mysqli_fetch_array($qry)) { ?>
            <tr>
                <td><?php echo $res['id']; ?></td>
                <td><?php echo $res['sname']; ?></td>
                <td><?php echo $res['course']; ?></td>
                <td><?php echo $res['email']; ?></td>
                <td><?php echo $res['contact']; ?></td>
                <td>
                    <a href="update.php?id=<?php echo htmlspecialchars($res['id']); ?>" class="btn btn-primary">
                        <i class="bi bi-pencil-square"></i> Edit
                    </a>
                </td>
                <td>
                    <a href="delete.php?id=<?php echo htmlspecialchars($res['id']); ?>" class="btn btn-danger">
                        <i class="bi bi-trash"></i> Delete
                    </a>
                </td>
                
            </tr>
        <?php } ?>
        </tbody>
    </table>
</body>
</html>
