function Ball(x,y,r) {
    this.pos = createVector(x,y);
    this.r = r;
    this.vel = createVector(0,0);

    var ballx = 525;
    var bally = 237.5;
    var heighty = 495;
    var widthx = 1195;
    var balldirectionx = 1;
    var balldirectiony = 1;
    var ballspeed = 3;

    // this.update = function () {
        
    //     var newvel = createVector(0,0);
    //     this.pos.add(this.vel);

    // }

    this.bounce = function () {
        ballx = ballx + (balldirectionx * ballspeed);
        bally = bally + (balldirectiony * ballspeed);

        if (ballx < 0) {
            balldirectionx = balldirectionx*-1;
        }
        if (bally < 0) {
            balldirectiony = balldirectiony*-1;
        }
        if (bally > heighty) {
            balldirectiony = balldirectiony*-1;
        }
        if (ballx > widthx) {
            balldirectionx = balldirectionx*-1;
        }


    }


    this.touch = function(other) {
        var d = p5.Vector.dist(this.pos, other.pos);
        if ( d < this.r + other.r) {
            newvel.setMag(other.mag());
            this.vel.lerp(newvel, 0, 0.2);

            return true;
        }
        else {
            return false;
        }

        
    }


    this.show = function() {
        fill(255);
        ellipse(this.pos.x, this.pos.y, this.r*2, this.r*2);
    }

}