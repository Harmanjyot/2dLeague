//var socket;
var started = false;

var score_p1 = 0;
var score_p2 = 0;
var touch_p1 = 0;
var touch_p2 = 0;
var miss_p1 = 0;
var miss_p2 = 0;
var goal_p1 = 0;
var goal_p2 = 0;
console.log(pixelDensity());

function setup() {
    var cnv = createCanvas(1200,600);
    console.log(pixelDensity());
    var x = (windowWidth - width) / 2;
    var y = (windowHeight - height) / 2;
    cnv.position(x, y);
    //socket = io.connect('http://localhost:3000');
    paddie0 = new Paddle(75,300,50);
    paddie1 = new Paddle(1100,300,50);

    ball = new Ball(600,300,50);

}


function draw() {
    // rect(0,0,1200,600);
    background('rgba(0,255,0, 0.9)');

    line(600,0,600,600);

    line(75,0,75,600);
    line(1125,0,1125,600);

    ball.show();
    ball.update();


    paddie0.show();
    paddie0.colour(1,1,1);
    paddie0.update();
    paddie0.moveP0();


    paddie1.show();
    paddie1.colour(255,204,100);
    paddie1.update();


    fill(0, 255, 255);
    textSize(26);
    text("Score_ p1: " + score_p1, 10, 25);

    fill(0, 255, 255);
    textSize(26);
    text("Score_ p2: " + score_p2, 1000, 25);

    if (score_p2 >= 21){
        
        var url = "http://localhost/2dLeague/2dLeague/website/winnerPage.php?p1Score=" + score_p1 + "&p2Score=" + score_p2 + "&p1Touch=" + touch_p1 + "&p2Touch=" + touch_p2 + "&p1Miss="+ miss_p1 + "&p2Miss=" + miss_p2 + "&p2Name=" + p2name + "&p1Goals=" + goal_p1 + "&p2Goals=" + goal_p2;
        window.location.assign(url);
        // paddie0.hide();
        // paddie1.hide();
        // ball.hide();

        fill(0, 255, 255);
        textSize(48);
        text("Player 2 has won!! " + score_p2, 600, 300);


    }
    if (score_p1 >= 21){
        var url = "http://localhost/2dLeague/2dLeague/website/winnerPage.php?p1Score=" + score_p1 + "&p2Score=" + score_p2 + "&p1Touch=" + touch_p1 + "&p2Touch=" + touch_p2 + "&p1Miss="+ miss_p1 + "&p2Miss=" + miss_p2 + "&p2Name=" + p2name + "&p1Goals=" + goal_p1 + "&p2Goals=" + goal_p2;
        window.location.assign(url);
        // paddie0.hide();
        // paddie1.hide();
        // ball.hide();

        fill(0, 255, 255);
        textSize(48);
        text("Player 1 has won!! " + score_p1, 600, 300);

        
    }
    


    
    //ball.update();
}

