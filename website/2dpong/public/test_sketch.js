var socket;



function setup () {
    createCanvas(200,200);
    background(51);
    socket = io.connect('http://localhost:3000')
    socket.on('mouse', newDrawing);
}

function newDrawing(data) {
    noStroke();
    fill(255, 0, 100);
    ellipse(data.x, data.y, 36,36);
}

function mouseDragged() {
    console.log('sending' + mouseX + ',' + mouseY);

    var data = {
        x: mouseX,
        y: mouseY
    }
    noStroke();
    fill(255);
    ellipse(data.x, data.y, 36,36);

    socket.emit('mouse', data);
}

function draw() {
    
}