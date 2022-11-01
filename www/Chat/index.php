<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<label for="message">Message:</label>
<input type="text" id="message">
<button>Send</button>

<script>
    let button = document.querySelector('button');
    let input = document.querySelector('input');
    // Then some JavaScript in the browser:
    var conn = new WebSocket('ws://localhost:8080/echo');
    conn.onopen = function(e) {
        console.log("Connection established!");
    };
    conn.onmessage = function(e) {
        console.log(e.data);
    };
    button.addEventListener('click', () => {
        conn.send(input.value);
    })
</script>

</body>
</html>