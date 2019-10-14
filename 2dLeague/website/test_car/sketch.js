// var ball;



function setup () {
                //x,  y
    var cnv = createCanvas(1200,600);
    var x = (windowWidth - width) / 2;
    var y = (windowHeight - height) / 2;
    cnv.position(x, y);


    oct = new Octane(50,50,50);
    ball = new Ball(600,300,30);
    // oct2 = new Octane(100,100,50);


}

function draw() {
    rect(0,0,1200,600);
    line(600,0,600,600);
    background('rgba(0,255,0, 0.25)');

    // background(0);
    //ball.show();
    oct.show();
    //ball.touch();
    //oct.bounds();
    oct.update();
    
    //ball.update();

    // oct2.show();
    // oct2.update();

}
