function Ball(x,y,r) {
    this.pos = createVector(x,y);
    this.r = r;
    this.vel = createVector(0,0);

    this.update = function () {
        
        var newvel = createVector(0,0);
        this.pos.add(this.vel);

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