function Ball(x,y,r) {
    this.pos = createVector(x, y);
    this.r = r;
    var diameter = 50;
    this.pos.x = Math.floor(Math.random() * 500) + 50;
    this.pos.y = 50;
    //delay = new p5.Delay();

    var xBallChange = 5;
    var yBallChange = 5;

    this.update = function () {
        this.pos.x += xBallChange;
        this.pos.y += yBallChange;


        //ball with wall interactions
        if (this.pos.x < diameter/2 || this.pos.x > windowWidth - 7*diameter) {
            xBallChange *= -1;
        }
        if (this.pos.y < diameter/2 || this.pos.y > windowHeight - diameter/0.3) {
            yBallChange *= -1;
        }

        if ((this.pos.x <= paddie0.pos.x+25) && 
            (this.pos.y >= paddie0.pos.y && this.pos.y <paddie0.pos.y+100)) {
            if (this.pos.y < windowWidth/2){
                xBallChange *= -1;
                yBallChange *= 1;
                //score_p1++;
                touch_p1++;
                //goal_p1++;
                }
            else {
                xBallChange *= -1;
                yBallChange *= -1;
                //score_p1++;
                touch_p1++;
                //goal_p1++;
                }

            }

        if ((this.pos.x >= paddie1.pos.x) && 
            (this.pos.y >= paddie1.pos.y && this.pos.y < paddie1.pos.y+100)) {
                
                if (this.pos.y < windowWidth/2){
                    xBallChange *= -1;
                    yBallChange *= -1;
                    //score_p2++;
                    touch_p2++;
                    //goal_p2++;
                    }
                else {
                    xBallChange *= -1;
                    yBallChange *= 1;
                    //score_p2++;
                    touch_p2++;
                    //goal_p2++;
                    }
    
                }

        if (this.pos.x <25 ){
            score_p2=score_p2+3;
            //delayTime(3000);
            this.pos.x = Math.floor(Math.random() * 500) + 50;
            this.pos.y = 50;

        }

        if (this.pos.x > 1150){
            score_p1 = score_p1 +3 ;
            //delayTime(3000);
            this.pos.x = Math.floor(Math.random() * 500) + 50;
            this.pos.y = 50;
            
        }

    }


    this.show = function () {
        fill(255);
        ellipse(this.pos.x, this.pos.y, diameter, diameter);
        
    }
}