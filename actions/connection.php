<?php
     $servername = "localhost";
     $database = "krylov_kurs";
     $username = "root";
     $password = "";
     // Создаем соединение
     $connection = mysqli_connect($servername, $username, $password, $database);
     // Проверяем соединение
     if (!$connection) {
         die("Connection failed: " . mysqli_connect_error());
     }
?>