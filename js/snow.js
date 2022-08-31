
  //works only with canvas element and script under the canvas element
  //linking it to html page wont work because the get.Context method
  // cannot be accessed. and the photo must be in the correct folder,
  //othervise use the bottom part! 
function drawCanvas() {
    var can = document.getElementById("canvas"),
    //ctx is the brush to draw with
     ctx = can.getContext("2d");
     ctx.fillStyle="black";
     ctx.fillRect(0,0, can.width, can.height);
     var canh = can.height = window.innerHeight;
     var canw = can.width = window.innerWidth;
    //can.style.backgroundColor="rgba(97, 96, 96, 0.5)";
    //can.style.backgroundImage="url('/img/daylight-environment.jpg')"
    
    var flakes = [];
 
    function addFlakes() {
        var x = Math.floor(Math.random()*canw)+1;
        var y = 0;
        var s = Math.floor(Math.random() * 3) + 1;
        flakes.push({"x":x,"y":y,"s":s});
    };

    function snow() {
        addFlakes();

        for (var i = 0; i < flakes.length; i++) {
            ctx.fillStyle = "white";
            ctx.beginPath();
            //arc x, y, radius, startAngle, endAngle, clockwise or anticlockwise
            ctx.arc(flakes[i].x, flakes[i].y += flakes[i].s * .5, flakes[i].s * .5, 0, Math.PI * 2, false);
            ctx.fill();
            if (flakes[i].y > canh) {
                flakes.splice(i, 1);
            };
            ctx.closePath;
        };
    };

        function animatecan() {
            ctx.save();
            ctx.clearRect(0, 0, canw, canh);
            ctx.restore();
            //the bottom part
             ctx.strokeStyle = "#8080ff";
             ctx.fillStyle = "#8080ff";
             ctx.lineWidth = 5;
             ctx.beginPath();
             ctx.moveTo(0, 600);
             ctx.lineTo(1350, 600);
             ctx.bezierCurveTo(200, 500, 400, 30, 2, 350);
             ctx.stroke();
             ctx.fill();
             ctx.closePath();

            snow();
        
        };
        var interval = setInterval(animatecan, 30);
    };

    window.addEventListener("load", drawCanvas());

    