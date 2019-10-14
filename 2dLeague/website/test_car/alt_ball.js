function Ball () {
    ball_x = 600;
    ball_y = 300;
    var ball_w = 50;
    var ball_h = 50;
    var dir_x = 1;
    var dir_y = -1;
    var ballspeed = 1;

    
    this.update = function () {
        ball_x = ball_x + (dir_x*ballspeed);
        ball_y = ball_y + (dir_y*ballspeed);

        if (ball_x < 0) {
            dir_x = dir_x *   -1;
        }
        if (ball_y < 0) {
            dir_y = dir_y * -1;
        }
        if (ball_x > width) {
            dir_x = dir_x * -1;
        }
        if (ball_y > height) {
            dir_y = dir_y * -1;
        }
    }

    this.show = function () {
        fill(255);
        ellipse(ball_x, ball_y, ball_w, ball_h);
    }
        //create a range for dist b/w ball and car. range is: max=diag of car and rad of ball;
        //min=halfwidth/halfheight of car and radius of ball; hope fully it can run through obj file.
        //if required do it in sketch.js
    this.comp_dist = function () {
    }
}