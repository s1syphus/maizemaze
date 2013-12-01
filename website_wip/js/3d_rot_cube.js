var c = document.querySelector('canvas').getContext('2d');
var sin = Math.sin;
var cos = Math.cos;
var tan = Math.tan;
var sqrt = Math.sqrt;
var tau = Math.PI * 2;
var qu = tau/4;
var timescale = 4000;
var size = 70;

c.translate(100,100);
c.fillStyle="black";
c.strokeStyle="2px solid black";

function loop() {
    c.clearRect(-100,-100,200,200);
    c.beginPath();
    var t = Date.now() % timescale / timescale;
    var a = t * tau/4;
    var ps = [];
    for(var i = 0; i < 4; i++) {
	ps[i] = {x:cos(a+i*qu),y:-sqrt(2)/2,z:sin(a+i*qu)};
	ps[i+4] = {x:cos(a+i*qu),y:sqrt(2)/2,z:sin(a+i*qu)};
    }
    for(var i = 0; i < 8; i++) {
	// Turn z into a radial dilation.
	var z = Math.max(-.5, ps[i].z);
	var scale = z*.6 + 1;
	ps[i].x *= scale;
	ps[i].y *= scale;
	// Scale points by size
	ps[i].x *= size;
	ps[i].y *= size;
	// Draw the points
	//drawPoint(ps[i]);
    }
    // Draw the connecting lines
    for(var i = 0; i < 4; i++) {
	connectPoints(ps[i], ps[(i+1)%4]);
	connectPoints(ps[i+4], ps[(i+1)%4+4]);
	connectPoints(ps[i], ps[i+4]);
    }
    c.stroke();
    c.fill();
    requestAnimationFrame(loop);
}
requestAnimationFrame(loop);

function drawPoint(p) {
    c.moveTo(p.x, p.y);
    c.arc(p.x, p.y, 5, 0, tau);
}

function connectPoints(p1,p2) {
    c.moveTo(p1.x, p1.y);
    c.lineTo(p2.x, p2.y);
}