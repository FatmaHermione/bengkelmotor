<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sign Up</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f5821f; /* Orange background */
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }
    .card {
      background-color: #f 3c799; /* Light peach card */
      width: 400px;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.2);
      text-align: center;
    }
    .tabs {
      display: flex;
      justify-content: space-around;
      font-size: 20px;
      font-weight: bold;
      margin-bottom: 20px;
    }
    .tabs span {
      cursor: pointer;
    }
    .tabs .active {
      border-bottom: 2px solid #000;
      padding-bottom: 3px;
    }
    input {
      width: 90%;
      padding: 10px;
      margin: 10px auto;
      border: 1px solid #ccc;
      border-radius: 5px;
      display: block;
    }
    button {
      width: 90%;
      padding: 12px;
      background-color: #98a6e3; /* Light blue button */
      border: none;
      border-radius: 5px;
      font-size: 18px;
      font-weight: bold;
      cursor: pointer;
    }
  </style>
</head>
<body>

<div class="card">
  <div class="tabs">
    <span id="loginTab">Login</span>
    <span id="signupTab" class="active">Sign Up</span>
  </div>

  <form>
    <input type="text" placeholder="ENTER YOUR USERNAME" required>
    <input type="password" placeholder="ENTER YOUR PASSWORD" required>
    <input type="password" placeholder="ENTER YOUR CONFIRM PASSWORD" required>
    <button type="submit">Sign Up</button>
  </form>
</div>

</body>
</html>
