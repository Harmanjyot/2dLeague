function setup () {
    createCanvas(1200,500);
    oct = new Octane(50,50,50);


}

function draw() {
    rect(25,25,1000,450);
    line(525,25,525,475);
    background('rgba(0,255,0, 0.25)');
    // background(0);
    oct.show();
    oct.update();
}