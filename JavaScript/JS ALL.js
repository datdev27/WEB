<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <head>
        <script>
        document.addEventListener('DOMContentLoaded',function(){
            document.querySelector('#red').onclick=function(){
                document.querySelector('#hello').style.color='red';
            };
            //red
            document.querySelector('#blue').onclick=function(){
                document.querySelector('#hello').style.color='blue';
            };
            //blue
            document.querySelector('#green').onclick=function(){
                document.querySelector('#hello').style.color='green';
            };
            //green
        });
        </script>
      </head>
</head>
<body>
    <h1 id="hello">Hello!</h1>
    <button id="red">Red</button>
    <button id="blue">Blue</button>
    <button id="green">Green</button>



</body>
</html>