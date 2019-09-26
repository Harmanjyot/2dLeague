// var ball;



function setup () {
                //x,  y
    createCanvas(1200,500);
    oct = new Octane(50,50,50);
    ball = new Ball(525,237.5,30);
    // oct2 = new Octane(100,100,50);


}

function draw() {
    rect(25,25,1000,450);
    line(525,25,525,475);
    background('rgba(0,255,0, 0.25)');

    // background(0);
    ball.show();
    ball.bounce();
    //oct.show();
    //ball.touch();

    //oct.update();
    //ball.update();

    // oct2.show();
    // oct2.update();

}
