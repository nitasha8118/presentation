<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            margin-top: 20px;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: #fff;
        }

        tr:hover {
            background-color: #f2f2f2;
        }

        img {
            max-width: 100px;
            height: auto;
        }

        .add-button {
            display: block;
            width: 150px;
            margin: 20px auto;
            padding: 10px 20px;
            text-align: center;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .add-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
  
    <table>
        
            
        <?php
       
    // Database details
       $host = "localhost";
       $username = "root";
       $password = "";
       $dbname = "presentation";
       
       // Create connection
       $conn = new mysqli($host, $username, $password, $dbname);
       
       // Check connection
       if ($conn->connect_error) {
           die("Connection failed: " . $conn->connect_error);
       }
       
       // Fetch data from the customers table
       $sql = "SELECT * FROM customers";
       $result = $conn->query($sql);
       ?>
       
       <!DOCTYPE html>
       <html lang="en">
       <head>
           <meta charset="UTF-8">
           <meta name="viewport" content="width=device-width, initial-scale=1.0">
           <title>Customers Table</title>
           
       </head>
       <body>
       
       <h2>Customers Table</h2>
       
       <table>
           <tr>
               <th>ID</th>
               <th>Name</th>
               <th>Email</th>
               <th>Message</th>
               <th>Image</th>
           </tr>
           <?php
           if ($result->num_rows > 0) {
               while($row = $result->fetch_assoc()) {
                   echo "<tr>";
                   echo "<td>" . $row["id"] . "</td>";
                   echo "<td>" . $row["cus_name"] . "</td>";
                   echo "<td>" . $row["cus_email"] . "</td>";
                   echo "<td>" . $row["cus_message"] . "</td>";
                   echo "<td><img src='" . $row["cus_image"] . "' alt='Customer Image'></td>";
                   echo "</tr>";
                   echo "<td>
                   <form method='POST' action='delete.php'> <!-- Adjust action according to your delete script -->
                       <input type='hidden' name='id' value='" . $row["id"] . "'>
                       <button type='submit' onclick='return confirm(\"Are you sure you want to delete this record?\")'>Delete</button>
                   </form>
                 </td>";
           echo "</tr>";
               }
           } else {
               echo "0 results";
           }
           ?>
       </table>
       
      
       
       </body>
       </html>
       
       <?php
       // Close connection
       $conn->close();
       ?>
        ?>
    </table>
    <a href="form.html" class="add-button">Go to form</a>
</body>
</html>