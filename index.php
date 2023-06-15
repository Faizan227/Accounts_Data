<?php
include 'connection.php'
?>
<!DOCTYPE html>
<html>
<head>
    <title>Form with PDF Upload</title>
</head>
<body>
    <h1>Form with PDF Upload</h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $IBAN = $_POST['IBAN'];
        $falligkeit = $_POST['falligkeit'];
        $verwendungszweck = $_POST['verwendungszweck'];
        $beitrag = $_POST['beitrag'];
        $zahlungszweck = $_POST['zahlungszweck'];
        $tag = $_POST['tag'];
        $checks = $_POST['checks'];

    $rechnungspath = $_FILES["rechnungspath"]["name"];
    $rechnungspath = str_replace(" ", "",$rechnungspath);
    $pdfTmpName = $_FILES["rechnungspath"]["tmp_name"];
    $pdfError = $_FILES["rechnungspath"]["error"];

    if ($pdfError === UPLOAD_ERR_OK) {
        $uploadDir = "pdfs/";
        $targetPath = $uploadDir . $rechnungspath;

        if (move_uploaded_file($pdfTmpName, $targetPath)) {
            echo "PDF uploaded successfully!";
        } else {
            echo "Error uploading PDF.";
        }
    }

    $target_dir = "uploads/";
    // Handle form submission
        // Insert form data into the database
        $sql = "INSERT INTO rechnungseingang (name, IBAN, falligkeit, verwendungszweck, beitrag, zahlungszweck, tag, checks, rechnungspath) VALUES ('$name',' $IBAN', '$falligkeit',' $verwendungszweck',' $beitrag','$zahlungszweck','$tag','$checks', '$targetPath')";
        if ($conn->query($sql) === TRUE) {
            echo "Data saved successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    ?>

    <form method="POST" enctype="multipart/form-data">
        <label for="name">Name:</label>
        <input type="text" name="name" required><br><br>

        <label for="IBAN">IBAN:</label>
        <input type="IBAN" name="IBAN" required><br><br>

        <label for="falligkeit">falligkeit:</label>
        <input type="Date" name="falligkeit" required><br><br>

        <label for="verwendungszweck">verwendungszweck:</label>
        <input type="text" name="verwendungszweck" required><br><br>

        <label for="beitrag">beitrag:</label>
        <input type="text" name="beitrag" required><br><br>

        <label for="zahlungszweck">zahlungszweck:</label>
        <input type="text" name="zahlungszweck" required><br><br>

        <label for="tag">tag:</label>
       <input type="text" name="tag" required><br><br>

        <label for="checks">checks:</label>
        <input type="radio" name="checks"><br><br>


        <label for="rechnungspath">Upload PDF:</label>
        <input type="file" name="rechnungspath" accept="application/pdf"><br><br>

        <input type="submit" value="Submit">
    </form>


    <table>
        <tr>
            <th>Column 1</th>
            <th>Column 2</th>
            <th>Column 2</th>
            <th>Column 2</th>
            <th>Column 2</th>
            <th>Column 2</th>
            <th>Column 2</th>
            <th>Column 2</th>
            <th>Column 2</th>
            <!-- Add more column headers as needed -->
        </tr>
        <?php
        $query = "SELECT * FROM rechnungseingang";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['IBAN'] . "</td>";
            echo "<td>" . $row['falligkeit'] . "</td>";
            echo "<td>" . $row['verwendungszweck'] . "</td>";
            echo "<td>" . $row['beitrag'] . "</td>";
            echo "<td>" . $row['zahlungszweck'] . "</td>";
            echo "<td>" . $row['tag'] . "</td>";
            echo "<td>" . $row['checks'] . "</td>";
            echo "<td><a href=" . $row['rechnungspath'] . ">Download PDF</a></td>";
            // Add more table cells for additional columns
            echo "</tr>";
        }
        echo "No records found.";
        }
        ?>
    </table>
</body>
</html>
