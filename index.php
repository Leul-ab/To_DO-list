<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Task Management System</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Arial', sans-serif;
      background-color: #222;
      color: black;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .container {
      width: 100%;
      max-width: 1200px;
      height: 100vh;
      display: flex;
      flex-direction: column;
      background-color: #d3d3d3;
      border-radius: 12px;
      padding: 20px;
    }

    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: #d3d3d3;
      padding: 10px 20px;
      font-size: 24px;
      font-weight: bold;
      color: black;
    }

    header a {
      text-decoration: none;
      color: black;
      font-size: 14px;
      font-weight: bold;
      margin-left: 10px;
    }

    .task-input-section {
      background-color: #e0e0e0;
      padding: 20px;
      border-radius: 12px;
      text-align: center;
    }

    input[type="text"] {
      width: 60%;
      max-width: 500px;
      padding: 10px;
      border-radius: 8px;
      border: 1px solid #999;
      background-color: #b0b0b0;
      font-size: 14px;
    }

    button {
      padding: 10px 20px;
      border: none;
      border-radius: 8px;
      background-color: black;
      color: white;
      font-size: 14px;
      cursor: pointer;
      margin-left: 10px;
    }

    button:hover {
      background-color: #333;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
      text-align: center;
      color: black;
      table-layout: fixed;
    }

    th, td {
      padding: 12px;
      border: 1px solid #ddd;
      font-size: 14px;
      word-wrap: break-word;
      overflow-wrap: break-word;
    }

    th {
      background-color: #bcbcbc;
    }

    tbody tr:hover {
      background-color: #f0f0f0;
    }

    .delete-btn {
      background-color: red;
      color: white;
      padding: 5px 10px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .delete-btn:hover {
      background-color: darkred;
    }
  </style>
</head>
<body>
  <div class="container">
    <header>
      <span>TASK MANAGEMENT SYSTEM</span>
      <div>
        <a href="#">Home</a>
        <a href="logout.php">Logout</a>
      </div>
    </header>

    <section class="task-input-section">
      <form action="add_task.php" method="POST">
        <h2>ADD YOUR TASKS HERE</h2>
        <input type="text" name="task" placeholder="Enter your tasks" required>
        <button type="submit">Add Task</button>
      </form>
    </section>

    <table>
      <thead>
        <tr>
          <th style="width: 5%;">#</th>
          <th style="width: 45%;">Task</th>
          <th style="width: 20%;">Status</th>
          <th style="width: 20%;">Time</th>
          <th style="width: 10%;">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include 'get_task.php';
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>
