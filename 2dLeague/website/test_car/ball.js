function Ball(x,y,r) {
    this.pos = createVector(x,y);
    this.r = r;
    this.vel = createVector(0,0);
    var ballspeed = 0;
    var ballx,bally=500;



    this.update = function () {
        if (this.pos.x < 0) {
            ballx = ballx + (balldirectionx * ballspeed);
          }
      
          if (this.pos.y < 0) {
            this.pos.y = this.pos.y * -1;
          }
          //define upper bounds for x and y. do this and basic physics are done for ball too. just defining touch and imapct is left.
          if (this.pos.x + 60 > width) {
            this.pos.x = width - 60;
      
          }
      
          if (this.pos.y + 60 > height) {                            //1210  =  1210 -2*1210%1200 ==1210 - 20 == 1190
            this.pos.y = height - 60;
          
          }
        


    }
    
        // ballx = ballx + (balldirectionx * ballspeed);
        // bally = bally + (balldirectiony * ballspeed);

        // if (ballx < 0) {
        //     balldirectionx = balldirectionx*-1;
        // }
        // if (bally < 0) {
        //     balldirectiony = balldirectiony*-1;
        // }
        // if (bally > heighty) {
        //     balldirectiony = balldirectiony*-1;
        // }
        // if (ballx > widthx) {
        //     balldirectionx = balldirectionx*-1;
        // }
        


    this.show = function() {
        fill(255);
        ellipse(this.pos.x, this.pos.y, this.r*2, this.r*2);
    }

}