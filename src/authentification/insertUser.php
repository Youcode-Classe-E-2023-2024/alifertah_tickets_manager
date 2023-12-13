<?php
/**
 * Inserts a new record into the specified table.
 *
 * @param string $pass - Password of the user.
 * @param string $table - Table name.
 * @param string $uname - Username of the user.
 * @param string $email - Email of the user.
 * @return int - 1 in success, 0 in fail.
 */
function insertion($pass, $table, $uname, $email, $conn)
{
    $query = "INSERT INTO $table
    (`username`, `password`, `email`)
     VALUES
    ('$uname', '$pass', '$email')";
    if ($conn->query($query)) {
        echo("<script>alert('yes')</script>");
        return 1;
    } else {
        echo "ERROR: " . $query . $conn->error;
        return 0;
    }
}
?>
